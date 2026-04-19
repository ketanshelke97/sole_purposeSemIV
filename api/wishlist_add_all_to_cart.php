<?php
// =====================================================
// Wishlist Add All to Cart API
// =====================================================
// Moves ALL wishlist items to the cart for the logged-in user.
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

// Get all wishlist items with their available sizes
$sql = "SELECT p.id, p.available_sizes FROM `products` p 
        INNER JOIN `wishlist_items` w ON p.id = w.product_id 
        WHERE w.user_id = $user_id";
$result = mysqli_query($connection, $sql);

$addedCount = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['id'];
    $sizes = explode(',', $row['available_sizes']);
    $defaultSize = trim($sizes[0]); // Use first available size as default

    // Check if already in cart
    $checkQuery = mysqli_query($connection, "SELECT `id` FROM `cart_items` WHERE `user_id`=$user_id AND `product_id`=$product_id AND `size`='$defaultSize'");
    
    if (mysqli_num_rows($checkQuery) === 0) {
        mysqli_query($connection, "INSERT INTO `cart_items` (`user_id`, `product_id`, `size`, `quantity`) VALUES ($user_id, $product_id, '$defaultSize', 1)");
        $addedCount++;
    }
}

echo json_encode(['success' => true, 'message' => "$addedCount item(s) added to cart!", 'count' => $addedCount]);
?>
