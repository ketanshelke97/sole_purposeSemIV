<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socks | Sole Purpose</title>
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
            <h1>Comfortable & Supportive Socks</h1>
            
            <div class="collection-description">
                <p>The right pair of socks is the foundation of foot comfort. Our collection features a variety of styles, from ankle-length to crew, designed with breathable materials and cushioned support. A good sock not only prevents blisters but also helps manage moisture and provides an extra layer of shock absorption for all-day wear.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/socks1.jpg" alt="SJeware Unisex Solid Ankle Length Socks" class="product-image">
                    <h3 class="product-title">SJeware Unisex Solid Ankle Length Socks</h3>
                    <p class="product-description">A versatile pack of soft, breathable ankle socks perfect for everyday use and athletic activities.</p>
                    <p class="product-price">₹117</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/socks2.jpg" alt="Jockey Men's Cotton Terry Crew Length Socks" class="product-image">
                    <h3 class="product-title">Jockey Compact Cotton Terry Crew Length Socks</h3>
                    <p class="product-description">Plush terry cotton provides superior cushioning and comfort in a classic crew length.</p>
                    <p class="product-price">₹249</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>