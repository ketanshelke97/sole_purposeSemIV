<?php
// =====================================================
// Wishlist Check API
// =====================================================
// Returns a list of product IDs that the logged-in user
// has in their wishlist. Used on page load to highlight
// the correct heart icons.
// =====================================================

session_start();
header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true) {
    echo json_encode(['loggedin' => false, 'wishlist' => []]);
    exit;
}

include __DIR__ . '/../partials/_dbconnect.php';

$username = $_SESSION['username'];

// Get user's sno (ID) from the users table
$userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
$userData = mysqli_fetch_assoc($userQuery);

if (!$userData) {
    echo json_encode(['loggedin' => true, 'wishlist' => []]);
    exit;
}

$user_id = $userData['sno'];

// Get all wishlisted product IDs for this user
$wishlistQuery = mysqli_query($connection, "SELECT `product_id` FROM `wishlist_items` WHERE `user_id`=$user_id");
$wishlist = [];
while ($row = mysqli_fetch_assoc($wishlistQuery)) {
    $wishlist[] = intval($row['product_id']);
}

echo json_encode(['loggedin' => true, 'wishlist' => $wishlist]);
?>
