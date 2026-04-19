<?php
// =====================================================
// Wishlist Toggle API
// =====================================================
// Adds or removes a product from the logged-in user's wishlist.
// Called via AJAX (POST request with product_id).
// Returns JSON response.
// =====================================================

session_start();
header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true) {
    echo json_encode(['success' => false, 'message' => 'login_required']);
    exit;
}

// Check if product_id was sent
if (!isset($_POST['product_id'])) {
    echo json_encode(['success' => false, 'message' => 'No product ID provided.']);
    exit;
}

include __DIR__ . '/../partials/_dbconnect.php';

$username = $_SESSION['username'];
$product_id = intval($_POST['product_id']);

// Get user's sno (ID) from the users table
$userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
$userData = mysqli_fetch_assoc($userQuery);

if (!$userData) {
    echo json_encode(['success' => false, 'message' => 'User not found.']);
    exit;
}

$user_id = $userData['sno'];

// Check if the product is already in the wishlist
$checkQuery = mysqli_query($connection, "SELECT `id` FROM `wishlist_items` WHERE `user_id`=$user_id AND `product_id`=$product_id");

if (mysqli_num_rows($checkQuery) > 0) {
    // Product exists in wishlist → REMOVE it
    mysqli_query($connection, "DELETE FROM `wishlist_items` WHERE `user_id`=$user_id AND `product_id`=$product_id");
    echo json_encode(['success' => true, 'action' => 'removed', 'message' => 'Removed from wishlist.']);
} else {
    // Product NOT in wishlist → ADD it
    mysqli_query($connection, "INSERT INTO `wishlist_items` (`user_id`, `product_id`) VALUES ($user_id, $product_id)");
    echo json_encode(['success' => true, 'action' => 'added', 'message' => 'Added to wishlist!']);
}
?>
