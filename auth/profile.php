<?php
    // This is the new "welcome.php" page, styled to match your site
    session_start();
    include __DIR__ . '/../config.php';
    if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] != true){
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> | Sole Purpose</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php include __DIR__ . '/../header.php'; ?>

<main class="login-container">
    <div class="profile-container active" style="text-align: center;">
        <!-- Use htmlspecialchars to prevent XSS attacks -->
        <h2 id="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>You are successfully logged into your Sole Purpose account.</p>
        
        <div class="profile-buttons" style="margin-top: 2rem;">
            <a href="<?php echo BASE_URL; ?>shop.php" class="btn-primary">Continue Shopping</a>
            <a href="logout.php" class="btn-secondary">Logout</a>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../footer.php'; ?>

</body>
</html>
