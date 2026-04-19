<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Loafers | Sole Purpose</title>
    <?php include __DIR__ . '/../../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include __DIR__ . '/../../header.php'; ?>

    <main>
        <section class="product-page">
            <h1>Women's Eco-Friendly Loafers</h1>
            <div class="collection-description">
                <p>Discover loafers crafted from sustainable materials like recycled fabrics and natural cork. Perfect for casual comfort with a conscience, these shoes combine timeless style with modern responsibility.</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/TWL(Women).jpg" alt="Tan Suede Loafer" class="product-image">
                    <h3 class="product-title">The Weekend Loafer</h3>
                    <p class="product-description">A comfortable slip-on made from recycled vegan suede with a natural cork insole.</p>
                    <p class="product-price">₹4,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/TCL(women).jpg" alt="Black Classic Loafer" class="product-image">
                    <h3 class="product-title">The Classic Loafer</h3>
                    <p class="product-description">A timeless black loafer crafted from apple leather with a durable recycled rubber sole.</p>
                    <p class="product-price">₹5,499</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>
    

</body>
</html>