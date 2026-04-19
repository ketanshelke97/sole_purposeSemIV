<?php session_start(); ?>
<?php include __DIR__ . '/../config.php'; ?>
<?php
// =====================================================
// Shopping Cart Page (Database-Driven)
// =====================================================

$loggedin = isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == true;
$cartItems = [];
$total = 0;

if ($loggedin) {
    include __DIR__ . '/../partials/_dbconnect.php';
    $username = $_SESSION['username'];
    
    // Get user ID
    $userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
    $userData = mysqli_fetch_assoc($userQuery);
    
    if ($userData) {
        $user_id = $userData['sno'];
        
        // Get cart items with product details
        $sql = "SELECT c.id as cart_id, c.size, c.quantity, p.title, p.price, p.image_url 
                FROM `cart_items` c 
                INNER JOIN `products` p ON c.product_id = p.id 
                WHERE c.user_id = $user_id 
                ORDER BY c.added_at DESC";
        $result = mysqli_query($connection, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $cartItems[] = $row;
            $total += $row['price'] * $row['quantity'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Sole Purpose</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>var BASE_URL = '<?php echo BASE_URL; ?>';</script>
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main class="product-page">
        <h1>Your Shopping Cart</h1>

        <?php if (!$loggedin): ?>
            <!-- Guest users: show localStorage cart -->
            <div id="cart-items-container"></div>
            <div id="cart-total" style="text-align: right; margin-top: 2rem;"></div>
            <div style="text-align: right; margin-top: 1rem;">
                <button id="clear-cart-btn" class="btn-secondary">Clear Cart</button>
            </div>
            <p style="text-align: center; margin-top: 2rem; color: #777;">
                <a href="<?php echo BASE_URL; ?>auth/login.php">Log in</a> to save your cart items across sessions.
            </p>
        <?php elseif (count($cartItems) === 0): ?>
            <div class="no-results">
                <h3>Your cart is empty</h3>
                <p>Browse our collection and add your favourite products!</p>
                <a href="<?php echo BASE_URL; ?>shop.php" class="btn-secondary">Browse Products</a>
            </div>
        <?php else: ?>
            <!-- Logged-in users: show database cart -->
            <div id="cart-items-container">
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item" data-cart-id="<?php echo $item['cart_id']; ?>">
                        <img src="<?php echo BASE_URL . $item['image_url']; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="cart-item-image">
                        <div class="cart-item-details">
                            <h4 class="cart-item-title"><?php echo htmlspecialchars($item['title']); ?></h4>
                            <p class="cart-item-size">Size: US <?php echo htmlspecialchars($item['size']); ?></p>
                            <p class="cart-item-qty">Qty: <?php echo $item['quantity']; ?></p>
                        </div>
                        <div class="cart-item-price">
                            <p>₹<?php echo number_format($item['price'] * $item['quantity'], 0); ?></p>
                            <button class="cart-remove-btn" data-cart-id="<?php echo $item['cart_id']; ?>" title="Remove">✕</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="cart-total" style="text-align: right; margin-top: 2rem;">
                <h3 style="font-size: 1.5rem;">Total: ₹<?php echo number_format($total, 0); ?></h3>
            </div>

            <div class="cart-actions">
                <button id="clear-cart-btn" class="btn-secondary">Clear Cart</button>
                <button id="buy-now-btn" class="btn-primary btn-buy-now">Buy Now</button>
            </div>
        <?php endif; ?>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>
</html>
