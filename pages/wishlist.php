<?php session_start(); ?>
<?php include __DIR__ . '/../config.php'; ?>
<?php
// =====================================================
// Wishlist Page
// =====================================================

$loggedin = isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == true;

if (!$loggedin) {
    header("location: " . BASE_URL . "auth/login.php");
    exit;
}

include __DIR__ . '/../partials/_dbconnect.php';

$username = $_SESSION['username'];

// Get user ID
$userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
$userData = mysqli_fetch_assoc($userQuery);
$user_id = $userData['sno'];

// Get all wishlisted products with full product details
$sql = "SELECT p.*, w.id as wishlist_id FROM `products` p 
        INNER JOIN `wishlist_items` w ON p.id = w.product_id 
        WHERE w.user_id = $user_id 
        ORDER BY w.added_at DESC";
$result = mysqli_query($connection, $sql);
$itemCount = $result ? mysqli_num_rows($result) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist | Sole Purpose</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>var BASE_URL = '<?php echo BASE_URL; ?>';</script>
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main>
        <section class="product-page">
            <h1>My Wishlist</h1>

            <?php if ($itemCount > 0): ?>
                <p class="results-count" style="text-align:center; margin-bottom: 1rem;"><?php echo $itemCount; ?> item(s) in your wishlist</p>
                
                <!-- Wishlist Action Buttons -->
                <div class="wishlist-actions">
                    <button id="add-all-to-cart-btn" class="btn-primary">Add All to Cart</button>
                    <button id="clear-wishlist-btn" class="btn-secondary">Clear Wishlist</button>
                </div>

                <div class="product-grid">
                    <?php while ($product = mysqli_fetch_assoc($result)): ?>
                        <?php $sizes = explode(',', $product['available_sizes']); ?>
                        <div class="product-card" data-product-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo BASE_URL . $product['image_url']; ?>" alt="<?php echo htmlspecialchars($product['title']); ?>" class="product-image">
                            <h3 class="product-title"><?php echo htmlspecialchars($product['title']); ?></h3>
                            <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="product-price">₹<?php echo number_format($product['price'], 0); ?></p>

                            <!-- Size Selector -->
                            <?php if ($sizes[0] !== 'One Size'): ?>
                            <div class="size-selector">
                                <label class="size-label">US Size:</label>
                                <div class="size-options">
                                    <?php foreach ($sizes as $index => $size): ?>
                                        <button type="button" class="size-btn <?php echo $index === 0 ? 'active' : ''; ?>" data-size="<?php echo trim($size); ?>"><?php echo trim($size); ?></button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="size-selector">
                                <p class="size-label" style="margin-bottom: 0.5rem;">One Size</p>
                            </div>
                            <?php endif; ?>

                            <!-- Action Buttons -->
                            <div class="product-action-buttons">
                                <button class="btn-primary add-to-cart-btn" data-product-id="<?php echo $product['id']; ?>">Add to Cart</button>
                                <button class="btn-secondary wishlist-btn wishlisted" data-product-id="<?php echo $product['id']; ?>">♥ Wishlisted</button>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="no-results">
                    <h3>Your wishlist is empty</h3>
                    <p>Browse our collection and click "Wishlist" on products you love!</p>
                    <a href="<?php echo BASE_URL; ?>shop.php" class="btn-secondary">Browse Products</a>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>
</html>
