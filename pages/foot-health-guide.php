<?php
session_start();
include __DIR__ . '/../config.php';
include __DIR__ . '/../partials/_dbconnect.php';

// Check login status for wishlist
$loggedin = isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == true;
$userWishlist = [];
if ($loggedin) {
    $username = $_SESSION['username'];
    $userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
    $userData = mysqli_fetch_assoc($userQuery);
    if ($userData) {
        $uid = $userData['sno'];
        $wlQuery = mysqli_query($connection, "SELECT `product_id` FROM `wishlist_items` WHERE `user_id`=$uid");
        while ($wlRow = mysqli_fetch_assoc($wlQuery)) {
            $userWishlist[] = intval($wlRow['product_id']);
        }
    }
}

// Helper function to render a product card
function renderProductCard($product, $userWishlist) {
    $isWishlisted = in_array($product['id'], $userWishlist);
    $sizes = explode(',', $product['available_sizes']);
    
    $html = '<div class="product-card" data-product-id="' . $product['id'] . '">';
    $html .= '<img src="' . BASE_URL . htmlspecialchars($product['image_url']) . '" alt="' . htmlspecialchars($product['title']) . '" class="product-image">';
    $html .= '<h3 class="product-title">' . htmlspecialchars($product['title']) . '</h3>';
    $html .= '<p class="product-description">' . htmlspecialchars($product['description']) . '</p>';
    $html .= '<p class="product-price">₹' . number_format($product['price'], 0) . '</p>';

    // Size Selector
    if ($sizes[0] !== 'One Size') {
        $html .= '<div class="size-selector">';
        $html .= '<label class="size-label">US Size:</label>';
        $html .= '<div class="size-options">';
        foreach ($sizes as $index => $size) {
            $activeClass = ($index === 0) ? 'active' : '';
            $html .= '<button type="button" class="size-btn ' . $activeClass . '" data-size="' . trim($size) . '">' . trim($size) . '</button>';
        }
        $html .= '</div>';
        $html .= '</div>';
    } else {
        $html .= '<div class="size-selector">';
        $html .= '<p class="size-label" style="margin-bottom: 0.5rem; text-align: center;">One Size</p>';
        $html .= '</div>';
    }

    // Action Buttons
    $wishlistText = $isWishlisted ? '♥ Wishlisted' : '♡ Wishlist';
    $wishlistedClass = $isWishlisted ? 'wishlisted' : '';
    $html .= '<div class="product-action-buttons">';
    $html .= '<button class="btn-primary add-to-cart-btn" data-product-id="' . $product['id'] . '">Add to Cart</button>';
    $html .= '<button class="btn-secondary wishlist-btn ' . $wishlistedClass . '" data-product-id="' . $product['id'] . '">' . $wishlistText . '</button>';
    $html .= '</div>';
    
    $html .= '</div>';
    return $html;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foot Health Guide | Sole Purpose</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Pass BASE_URL to JavaScript -->
    <script>var BASE_URL = '<?php echo BASE_URL; ?>';</script>

    <style>
        /* Modern, premium styles for recommended products inside articles */
        .recommended-products {
            background-color: #FFFDF9;
            border: 1px solid rgba(139, 69, 19, 0.1);
            border-radius: 12px;
            padding: 2rem;
            margin-top: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .recommended-products h4 {
            font-size: 1.3rem;
            color: #991B1B;
            border-bottom: 2px solid #5A7D3A;
            display: inline-block;
            padding-bottom: 0.3rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .recommended-products .product-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
        }

        .recommended-products .product-card {
            border: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.2rem;
            background-color: #fff;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .recommended-products .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.1);
            border-color: rgba(139, 69, 19, 0.2);
        }

        .recommended-products .product-image {
            height: 160px;
            margin-bottom: 1rem;
        }

        .recommended-products .product-title {
            font-size: 1.05rem;
            margin-bottom: 0.4rem;
        }

        .recommended-products .product-description {
            font-size: 0.8rem;
            line-height: 1.4;
            margin-bottom: 1rem;
        }

        .recommended-products .product-price {
            font-size: 1.15rem;
            margin-bottom: 1rem;
            color: #991B1B;
        }

        .recommended-products .size-selector {
            margin-bottom: 1rem;
        }

        .recommended-products .size-options {
            justify-content: center;
        }

        .recommended-products .size-btn {
            width: 32px;
            height: 32px;
            font-size: 0.75rem;
        }

        .recommended-products .product-action-buttons {
            gap: 0.4rem;
        }

        .recommended-products .add-to-cart-btn {
            padding: 0.6rem 1rem;
            font-size: 0.85rem;
        }

        .recommended-products .wishlist-btn {
            padding: 0.6rem 0.8rem;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main>
        <div class="article-container" style="padding: 2rem 1rem;">
            <h1>Foot Health Guide</h1>
            <p class="article-intro">Understanding your feet is the first step towards comfort. This guide covers common foot conditions and explains how the right footwear can provide relief and support.</p>

            <div class="table-of-contents">
                <h2>In This Guide:</h2>
                <ul>
                    <li><a href="#plantar-fasciitis">1. Understanding Plantar Fasciitis</a></li>
                    <li><a href="#flat-feet">2. Living with Flat Feet</a></li>
                    <li><a href="#bunions">3. What are Bunions?</a></li>
                </ul>
            </div>

            <article id="plantar-fasciitis">
                <h2>1. Understanding Plantar Fasciitis</h2>
                <p>Plantar Fasciitis is one of the most common causes of heel pain. It involves inflammation of a thick band of tissue (the plantar fascia) that runs across the bottom of your foot. The pain is often most intense with your first steps in the morning.</p>
                <p>Supportive footwear is crucial. Shoes with excellent arch support and deep heel cushioning help reduce tension on the plantar fascia. Accessories like heel pads and arch cushions can provide targeted relief.</p>
                <div class="recommended-products">
                    <h4>Recommended Products for Plantar Fasciitis:</h4>
                    <div class="product-grid">
                        <?php
                        $plantar_query = "SELECT * FROM `products` WHERE `comfort_tag` = 'Heel Pain' OR `category` = 'heel-pain' OR `category` = 'heel-pads' ORDER BY FIELD(`category`, 'heel-pain', 'heel-pads'), `id` ASC LIMIT 4";
                        $plantar_result = mysqli_query($connection, $plantar_query);
                        if ($plantar_result && mysqli_num_rows($plantar_result) > 0) {
                            while ($product = mysqli_fetch_assoc($plantar_result)) {
                                echo renderProductCard($product, $userWishlist);
                            }
                        } else {
                            echo '<p>No recommended products found.</p>';
                        }
                        ?>
                    </div>
                </div>
            </article>

            <article id="flat-feet">
                <h2>2. Living with Flat Feet</h2>
                <p>Flat feet is a condition where the arches on the inside of your feet are flattened, allowing the entire sole to touch the floor when you stand up. This can sometimes lead to pain in the heels or arches and cause overpronation (when your ankles roll inward).</p>
                <p>Stability shoes are the best solution. Look for footwear with firm midsoles and structured heel counters that prevent your foot from rolling inward. Good arch support is also key to distributing pressure evenly.</p>
                <div class="recommended-products">
                    <h4>Recommended Products for Flat Feet:</h4>
                    <div class="product-grid">
                        <?php
                        $flat_query = "SELECT * FROM `products` WHERE `comfort_tag` = 'Flat Feet' OR `category` = 'flat-feet' ORDER BY `id` ASC LIMIT 4";
                        $flat_result = mysqli_query($connection, $flat_query);
                        if ($flat_result && mysqli_num_rows($flat_result) > 0) {
                            while ($product = mysqli_fetch_assoc($flat_result)) {
                                echo renderProductCard($product, $userWishlist);
                            }
                        } else {
                            echo '<p>No recommended products found.</p>';
                        }
                        ?>
                    </div>
                </div>
            </article>

            <article id="bunions">
                <h2>3. What are Bunions?</h2>
                <p>A bunion is a bony bump that forms on the joint at the base of the big toe, causing it to lean towards the other toes. This can cause pain, swelling, and discomfort, especially in tight-fitting shoes.</p>
                <p>Footwear with a wide toe box is essential to avoid putting pressure on the bunion. Additionally, bunion correctors and toe separators can help realign the toe and provide significant pain relief, especially when worn at rest.</p>
                <div class="recommended-products">
                    <h4>Recommended Products for Bunions:</h4>
                    <div class="product-grid">
                        <?php
                        $bunion_query = "SELECT * FROM `products` WHERE `category` IN ('bunion-correctors', 'toe-separators') ORDER BY FIELD(`category`, 'bunion-correctors', 'toe-separators'), `id` ASC LIMIT 4";
                        $bunion_result = mysqli_query($connection, $bunion_query);
                        if ($bunion_result && mysqli_num_rows($bunion_result) > 0) {
                            while ($product = mysqli_fetch_assoc($bunion_result)) {
                                echo renderProductCard($product, $userWishlist);
                            }
                        } else {
                            echo '<p>No recommended products found.</p>';
                        }
                        ?>
                    </div>
                </div>
            </article>
        </div>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>
</html>
