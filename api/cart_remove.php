<?php
// =====================================================
// Cart Remove API
// =====================================================
// Removes a specific item from the user's cart.
// =====================================================

session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true) {
    echo json_encode(['success' => false, 'message' => 'login_required']);
    exit;
}

if (!isset($_POST['cart_item_id'])) {
    echo json_encode(['success' => false, 'message' => 'Missing cart item ID.']);
    exit;
}

include __DIR__ . '/../partials/_dbconnect.php';

$username = $_SESSION['username'];
$cart_item_id = intval($_POST['cart_item_id']);

// Get user ID
$userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
$userData = mysqli_fetch_assoc($userQuery);

if (!$userData) {
    echo json_encode(['success' => false, 'message' => 'User not found.']);
    exit;
}

$user_id = $userData['sno'];

// Delete the cart item (only if it belongs to this user)
mysqli_query($connection, "DELETE FROM `cart_items` WHERE `id`=$cart_item_id AND `user_id`=$user_id");

echo json_encode(['success' => true, 'message' => 'Item removed from cart.']);
?>
