<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Dress Shoes | Sole Purpose</title>
    <?php include __DIR__ . '/../../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include __DIR__ . '/../../header.php'; ?>
    <main>
        <section class="product-page">
            <h1>Men's Eco-Friendly Dress Shoes</h1>
            <div class="collection-description">
                <p>Elevate your formalwear with sophisticated dress shoes made from innovative, sustainable materials. Look sharp and feel good knowing your footwear is ethically crafted and eco-conscious.</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/TOC(men).jpg" alt="Brown Oxford Shoe" class="product-image">
                    <h3 class="product-title">The Oxford Classic</h3>
                    <p class="product-description">A sleek brown Oxford made from pineapple leaf fiber (Piñatex) for a sustainable finish.</p>
                    <p class="product-price">₹7,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
    <?php include __DIR__ . '/../../footer.php'; ?>
    
</body>
</html>
