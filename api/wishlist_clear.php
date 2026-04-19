<?php
// =====================================================
// Wishlist Clear API
// =====================================================
// Removes ALL items from the user's wishlist.
// =====================================================

session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true) {
    echo json_encode(['success' => false, 'message' => 'login_required']);
    exit;
}

include __DIR__ . '/../partials/_dbconnect.php';

$username = $_SESSION['username'];

// Get user ID
$userQuery = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$username'");
$userData = mysqli_fetch_assoc($userQuery);

if (!$userData) {
    echo json_encode(['success' => false, 'message' => 'User not found.']);
    exit;
}

$user_id = $userData['sno'];

mysqli_query($connection, "DELETE FROM `wishlist_items` WHERE `user_id`=$user_id");

echo json_encode(['success' => true, 'message' => 'Wishlist cleared.']);
?>
