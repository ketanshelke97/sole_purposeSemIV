<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Boots | Sole Purpose</title>
    <?php include __DIR__ . '/../../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include __DIR__ . '/../../header.php'; ?>
    <main>
        <section class="product-page">
            <h1>Men's Eco-Friendly Boots</h1>
            <div class="collection-description">
                <p>From rugged hikers to stylish boots, our collection is built to last using durable, eco-friendly materials. Step confidently with footwear that's kind to the planet.</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/boots(unisex).jpg" alt="Brown Work Boot" class="product-image">
                    <h3 class="product-title">The All-Weather Boot</h3>
                    <p class="product-description">A waterproof boot made with recycled plastics and a sole of natural rubber.</p>
                    <p class="product-price">₹9,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
    <?php include __DIR__ . '/../../footer.php'; ?>
    
</body>
</html>
