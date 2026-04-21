<?php session_start(); ?>
<?php include __DIR__ . '/../config.php'; ?>
<?php
// =====================================================
// Professional Checkout Page
// =====================================================

$loggedin = isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == true;

// Redirect guests to login
if (!$loggedin) {
    header('Location: ' . BASE_URL . 'auth/login.php');
    exit;
}

include __DIR__ . '/../partials/_dbconnect.php';
$username = $_SESSION['username'];

// Get user ID
$userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
$userData = mysqli_fetch_assoc($userQuery);
$cartItems = [];
$total = 0;

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

// Handle form submission (place order)
$orderPlaced = false;
$orderId = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    // Generate a mock order ID
    $orderId = 'SP-' . strtoupper(substr(md5(time() . $username), 0, 8));
    
    // Clear the user's cart after "placing" the order
    if ($userData) {
        mysqli_query($connection, "DELETE FROM `cart_items` WHERE `user_id`=" . $userData['sno']);
    }
    
    $orderPlaced = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $orderPlaced ? 'Order Confirmed' : 'Checkout'; ?> | Sole Purpose</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>var BASE_URL = '<?php echo BASE_URL; ?>';</script>
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main>
        <?php if ($orderPlaced): ?>
            <!-- ===== ORDER SUCCESS STATE ===== -->
            <div class="checkout-container">
                <div class="checkout-success">
                    <div class="success-icon">🎉</div>
                    <h2>Order Placed Successfully!</h2>
                    <div class="order-id">Order ID: <?php echo $orderId; ?></div>
                    <p>Thank you for shopping with Sole Purpose, <?php echo htmlspecialchars($username); ?>!<br>
                    Your order has been confirmed. In a real application, you'd receive a confirmation email and tracking details.</p>
                    <a href="<?php echo BASE_URL; ?>shop.php" class="btn-primary">Continue Shopping</a>
                </div>
            </div>

        <?php elseif (count($cartItems) === 0): ?>
            <!-- ===== EMPTY CART ===== -->
            <div class="checkout-container">
                <div class="no-results">
                    <h3>Your cart is empty</h3>
                    <p>Add some products before checking out.</p>
                    <a href="<?php echo BASE_URL; ?>shop.php" class="btn-secondary">Browse Products</a>
                </div>
            </div>

        <?php else: ?>
            <!-- ===== CHECKOUT FORM ===== -->
            <div class="checkout-container">
                <h1>Checkout</h1>

                <form method="POST" action="" id="checkout-form">
                    <div class="checkout-grid">

                        <!-- LEFT: Shipping + Payment -->
                        <div>
                            <!-- Shipping Details -->
                            <div class="checkout-form-section">
                                <h2>Shipping Details</h2>
                                
                                <div class="checkout-form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                                </div>

                                <div class="checkout-form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="you@example.com" required>
                                </div>

                                <div class="checkout-form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" placeholder="+91 98765 43210" required>
                                </div>

                                <div class="checkout-form-group">
                                    <label for="address">Street Address</label>
                                    <input type="text" id="address" name="address" placeholder="House No., Street, Locality" required>
                                </div>

                                <div class="checkout-form-row">
                                    <div class="checkout-form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" name="city" placeholder="Mumbai" required>
                                    </div>
                                    <div class="checkout-form-group">
                                        <label for="state">State</label>
                                        <select id="state" name="state" required>
                                            <option value="">Select State</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="West Bengal">West Bengal</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="checkout-form-group">
                                    <label for="pincode">PIN Code</label>
                                    <input type="text" id="pincode" name="pincode" placeholder="400001" required maxlength="6">
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="checkout-form-section" style="margin-top: 1.5rem;">
                                <h2>Payment Method</h2>
                                <div class="payment-methods">
                                    <label class="payment-option" id="pay-cod">
                                        <input type="radio" name="payment" value="cod" checked>
                                        <span>💵 Cash on Delivery</span>
                                    </label>
                                    <label class="payment-option" id="pay-upi">
                                        <input type="radio" name="payment" value="upi">
                                        <span>📱 UPI / Google Pay</span>
                                    </label>
                                    <label class="payment-option" id="pay-card">
                                        <input type="radio" name="payment" value="card">
                                        <span>💳 Credit / Debit Card</span>
                                    </label>
                                    <label class="payment-option" id="pay-nb">
                                        <input type="radio" name="payment" value="netbanking">
                                        <span>🏦 Net Banking</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- RIGHT: Order Summary -->
                        <div class="order-summary">
                            <h2>Order Summary</h2>
                            <?php foreach ($cartItems as $item): ?>
                                <div class="order-summary-item">
                                    <span class="item-name"><?php echo htmlspecialchars($item['title']); ?></span>
                                    <span class="item-qty">×<?php echo $item['quantity']; ?></span>
                                    <span class="item-price">₹<?php echo number_format($item['price'] * $item['quantity'], 0); ?></span>
                                </div>
                            <?php endforeach; ?>

                            <div class="order-total">
                                <span>Total</span>
                                <span>₹<?php echo number_format($total, 0); ?></span>
                            </div>

                            <button type="submit" name="place_order" class="checkout-place-btn" style="margin-top: 1.5rem;">
                                Place Order
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        <?php endif; ?>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>
</html>
