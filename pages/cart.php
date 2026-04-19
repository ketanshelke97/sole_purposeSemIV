<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Sole Purpose</title>
    <?php include __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main class="product-page">
        <h1>Your Shopping Cart</h1>

        <div id="cart-items-container">
            </div>

        <div id="cart-total" style="text-align: right; margin-top: 2rem;">
            </div>

        <div style="text-align: right; margin-top: 1rem;">
            <button id="clear-cart-btn" class="btn-secondary">Clear Cart</button>
        </div>

    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

    

</body>
</html>
