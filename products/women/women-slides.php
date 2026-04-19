<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Slides | Sole Purpose</title>
    <?php include __DIR__ . '/../../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include __DIR__ . '/../../header.php'; ?>
    <main>
        <section class="product-page">
            <h1>Women's Eco-Friendly Slides</h1>
            <div class="collection-description">
                <p>Experience ultimate comfort with our collection of slides, crafted from plant-based materials and recycled foam. Perfect for relaxing at home or taking on a summer day.</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/slides(unisex).jpg" alt="Comfortable Slide" class="product-image">
                    <h3 class="product-title">The Recycled Slide</h3>
                    <p class="product-description">A cushioned slide with a strap made from recycled materials and a bio-foam sole.</p>
                    <p class="product-price">₹2,499</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
    <?php include __DIR__ . '/../../footer.php'; ?>
    
</body>
</html>
