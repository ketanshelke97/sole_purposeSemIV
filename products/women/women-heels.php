<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Heels | Sole Purpose</title>
    <?php include __DIR__ . '/../../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include __DIR__ . '/../../header.php'; ?>
    <main>
        <section class="product-page">
            <h1>Women's Eco-Friendly Heels</h1>
            <div class="collection-description">
                <p>Step out in style with our collection of eco-friendly heels. Crafted from innovative, sustainable materials like plant-based leathers and recycled fabrics, these heels offer sophisticated elegance without compromising on your values. Look sharp and feel good knowing your footwear is ethically made.</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heels.jpg" alt="Brown Oxford Shoe" class="product-image">
                    <h3 class="product-title">The Merlot Pointed Heel</h3>
                    <p class="product-description">A chic pointed-toe heel in a rich merlot hue, made from recycled vegan leather and featuring a delicate bow detail.</p>
                    <p class="product-price">₹7,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
    <?php include __DIR__ . '/../../footer.php'; ?>
    
</body>
</html>
