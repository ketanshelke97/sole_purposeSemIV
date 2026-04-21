<?php session_start(); ?>
<?php include __DIR__ . '/config.php'; ?>
<?php include __DIR__ . '/partials/_dbconnect.php'; ?>
<?php
// =====================================================
// Dynamic Shop Page with Smart Filters + Search + Sort
// =====================================================

// --- Read filter parameters from URL ---
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

// Comfort and Brand are now arrays (checkboxes)
$comforts = isset($_GET['comfort']) ? (array)$_GET['comfort'] : [];
$brands = isset($_GET['brand']) ? (array)$_GET['brand'] : [];
$budget = isset($_GET['budget']) ? $_GET['budget'] : '';

// --- Build SQL query dynamically ---
$where = [];

if ($gender && $gender !== 'all') {
    $where[] = "(gender = '" . mysqli_real_escape_string($connection, $gender) . "' OR gender = 'unisex')";
}
if ($category) {
    $where[] = "category = '" . mysqli_real_escape_string($connection, $category) . "'";
}
if ($search) {
    $escapedSearch = mysqli_real_escape_string($connection, $search);
    $where[] = "(title LIKE '%$escapedSearch%' OR description LIKE '%$escapedSearch%' OR category LIKE '%$escapedSearch%')";
}
if (!empty($comforts)) {
    $comfortConditions = [];
    foreach ($comforts as $c) {
        $comfortConditions[] = "comfort_tag = '" . mysqli_real_escape_string($connection, $c) . "'";
    }
    $where[] = "(" . implode(" OR ", $comfortConditions) . ")";
}
if (!empty($brands)) {
    $brandConditions = [];
    foreach ($brands as $b) {
        $brandConditions[] = "brand_type = '" . mysqli_real_escape_string($connection, $b) . "'";
    }
    $where[] = "(" . implode(" OR ", $brandConditions) . ")";
}
if ($budget) {
    switch ($budget) {
        case 'under-1000':
            $where[] = "price < 1000";
            break;
        case '1000-3000':
            $where[] = "price BETWEEN 1000 AND 3000";
            break;
        case '3000-7000':
            $where[] = "price BETWEEN 3000 AND 7000";
            break;
        case '7000-15000':
            $where[] = "price BETWEEN 7000 AND 15000";
            break;
        case 'above-15000':
            $where[] = "price > 15000";
            break;
    }
}

$sql = "SELECT * FROM `products`";
if (count($where) > 0) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

// --- Sort logic ---
switch ($sort) {
    case 'price-asc':
        $sql .= " ORDER BY `price` ASC";
        break;
    case 'price-desc':
        $sql .= " ORDER BY `price` DESC";
        break;
    case 'newest':
        $sql .= " ORDER BY `created_at` DESC";
        break;
    case 'name-asc':
        $sql .= " ORDER BY `title` ASC";
        break;
    default:
        $sql .= " ORDER BY `price` ASC";
        break;
}

$result = mysqli_query($connection, $sql);

// --- Generate page title ---
$pageTitle = 'All Products';
if ($search) {
    $pageTitle = 'Search: "' . htmlspecialchars($search) . '"';
} elseif ($gender === 'men') {
    $pageTitle = "Men's Collection";
} elseif ($gender === 'women') {
    $pageTitle = "Women's Collection";
}
if ($category) {
    $catDisplay = ucwords(str_replace('-', ' ', $category));
    $pageTitle = ($gender ? ucfirst($gender) . "'s " : '') . $catDisplay;
}

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | Sole Purpose</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Pass BASE_URL to JavaScript -->
    <script>var BASE_URL = '<?php echo BASE_URL; ?>';</script>
</head>
<body>

    <?php include __DIR__ . '/header.php'; ?>

    <main>
        <section class="product-page">
            <h1><?php echo htmlspecialchars($pageTitle); ?></h1>

            <div class="shop-layout">

                <!-- ===== PRODUCT GRID (SHOWS FIRST) ===== -->
                <div class="shop-products">
                    <?php if ($result && mysqli_num_rows($result) > 0): ?>
                        <p class="results-count"><?php echo mysqli_num_rows($result); ?> product(s) found</p>
                        <div class="product-grid">
                            <?php while ($product = mysqli_fetch_assoc($result)): ?>
                                <?php
                                    $isWishlisted = in_array($product['id'], $userWishlist);
                                    $sizes = explode(',', $product['available_sizes']);
                                ?>
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
                                        <button class="btn-secondary wishlist-btn <?php echo $isWishlisted ? 'wishlisted' : ''; ?>" data-product-id="<?php echo $product['id']; ?>"><?php echo $isWishlisted ? '♥ Wishlisted' : '♡ Wishlist'; ?></button>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <div class="no-results">
                            <h3>No products found</h3>
                            <p>Try adjusting your filters to find what you're looking for.</p>
                            <a href="<?php echo BASE_URL; ?>shop.php" class="btn-secondary">View All Products</a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- ===== RIGHT SIDEBAR FILTERS ===== -->
                <aside class="filter-sidebar" id="filter-sidebar">
                    <div class="filter-header">
                        <h3>Filters</h3>
                        <a href="<?php echo BASE_URL; ?>shop.php<?php echo $gender ? '?gender='.$gender : ''; ?>" class="filter-clear-link">Clear All</a>
                    </div>

                    <form id="filter-form" method="GET" action="<?php echo BASE_URL; ?>shop.php">
                        <?php if ($gender): ?>
                            <input type="hidden" name="gender" value="<?php echo htmlspecialchars($gender); ?>">
                        <?php endif; ?>
                        <?php if ($category): ?>
                            <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
                        <?php endif; ?>

                        <!-- Search Bar -->
                        <input type="text" name="search" class="filter-search-input" placeholder="Search products..." value="<?php echo htmlspecialchars($search); ?>">

                        <!-- Sort Dropdown -->
                        <select name="sort" class="sort-select">
                            <option value="" <?php echo $sort === '' ? 'selected' : ''; ?>>Sort by: Default</option>
                            <option value="price-asc" <?php echo $sort === 'price-asc' ? 'selected' : ''; ?>>Price: Low to High</option>
                            <option value="price-desc" <?php echo $sort === 'price-desc' ? 'selected' : ''; ?>>Price: High to Low</option>
                            <option value="newest" <?php echo $sort === 'newest' ? 'selected' : ''; ?>>Newest First</option>
                            <option value="name-asc" <?php echo $sort === 'name-asc' ? 'selected' : ''; ?>>Name: A to Z</option>
                        </select>

                        <!-- Budget Filter -->
                        <div class="filter-group">
                            <h4 class="filter-group-title">Budget</h4>
                            <label class="filter-option">
                                <input type="radio" name="budget" value="under-1000" <?php echo $budget === 'under-1000' ? 'checked' : ''; ?>>
                                <span>Under ₹1,000</span>
                            </label>
                            <label class="filter-option">
                                <input type="radio" name="budget" value="1000-3000" <?php echo $budget === '1000-3000' ? 'checked' : ''; ?>>
                                <span>₹1,000 - ₹3,000</span>
                            </label>
                            <label class="filter-option">
                                <input type="radio" name="budget" value="3000-7000" <?php echo $budget === '3000-7000' ? 'checked' : ''; ?>>
                                <span>₹3,000 - ₹7,000</span>
                            </label>
                            <label class="filter-option">
                                <input type="radio" name="budget" value="7000-15000" <?php echo $budget === '7000-15000' ? 'checked' : ''; ?>>
                                <span>₹7,000 - ₹15,000</span>
                            </label>
                            <label class="filter-option">
                                <input type="radio" name="budget" value="above-15000" <?php echo $budget === 'above-15000' ? 'checked' : ''; ?>>
                                <span>Above ₹15,000</span>
                            </label>
                        </div>

                        <!-- Comfort Filter (CHECKBOXES) -->
                        <div class="filter-group">
                            <h4 class="filter-group-title">Comfort Type</h4>
                            <label class="filter-option">
                                <input type="checkbox" name="comfort[]" value="Orthopedic" <?php echo in_array('Orthopedic', $comforts) ? 'checked' : ''; ?>>
                                <span>Orthopedic</span>
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" name="comfort[]" value="Arch Support" <?php echo in_array('Arch Support', $comforts) ? 'checked' : ''; ?>>
                                <span>Arch Support</span>
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" name="comfort[]" value="Heel Pain" <?php echo in_array('Heel Pain', $comforts) ? 'checked' : ''; ?>>
                                <span>Heel Pain Relief</span>
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" name="comfort[]" value="Flat Feet" <?php echo in_array('Flat Feet', $comforts) ? 'checked' : ''; ?>>
                                <span>Flat Feet</span>
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" name="comfort[]" value="Comfort" <?php echo in_array('Comfort', $comforts) ? 'checked' : ''; ?>>
                                <span>General Comfort</span>
                            </label>
                        </div>

                        <!-- Brand Type Filter (CHECKBOXES) -->
                        <div class="filter-group">
                            <h4 class="filter-group-title">Brand Type</h4>
                            <label class="filter-option">
                                <input type="checkbox" name="brand[]" value="Local" <?php echo in_array('Local', $brands) ? 'checked' : ''; ?>>
                                <span>Local Brands</span>
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" name="brand[]" value="Premium" <?php echo in_array('Premium', $brands) ? 'checked' : ''; ?>>
                                <span>Premium Brands</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-primary filter-apply-btn">Apply Filters</button>
                    </form>
                </aside>

            </div>

        </section>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>

</body>
</html>
