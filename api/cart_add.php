<?php
// =====================================================
// Cart Add API
// =====================================================
// Adds a product to the logged-in user's cart in the database.
// Called via AJAX (POST with product_id and size).
// =====================================================

session_start();
header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true) {
    echo json_encode(['success' => false, 'message' => 'login_required']);
    exit;
}

if (!isset($_POST['product_id']) || !isset($_POST['size'])) {
    echo json_encode(['success' => false, 'message' => 'Missing product ID or size.']);
    exit;
}

include __DIR__ . '/../partials/_dbconnect.php';

$username = $_SESSION['username'];
$product_id = intval($_POST['product_id']);
$size = mysqli_real_escape_string($connection, $_POST['size']);

// Get user ID
$userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
$userData = mysqli_fetch_assoc($userQuery);

if (!$userData) {
    echo json_encode(['success' => false, 'message' => 'User not found.']);
    exit;
}

$user_id = $userData['sno'];

// Check if this exact product+size combo already exists in cart
$checkQuery = mysqli_query($connection, "SELECT `id`, `quantity` FROM `cart_items` WHERE `user_id`=$user_id AND `product_id`=$product_id AND `size`='$size'");

if (mysqli_num_rows($checkQuery) > 0) {
    // Update quantity
    $row = mysqli_fetch_assoc($checkQuery);
    $newQty = $row['quantity'] + 1;
    mysqli_query($connection, "UPDATE `cart_items` SET `quantity`=$newQty WHERE `id`=" . $row['id']);
    echo json_encode(['success' => true, 'message' => 'Quantity updated in cart!']);
} else {
    // Insert new cart item
    mysqli_query($connection, "INSERT INTO `cart_items` (`user_id`, `product_id`, `size`, `quantity`) VALUES ($user_id, $product_id, '$size', 1)");
    echo json_encode(['success' => true, 'message' => 'Added to cart!']);
}
?>
