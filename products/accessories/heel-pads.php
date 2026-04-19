<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heel Pads & Protectors | Sole Purpose</title>
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
            <h1>Heel Pads & Protectors</h1>
            
            <div class="collection-description">
                <p>Heel pads provide crucial cushioning and shock absorption for one of the most high-impact areas of your foot. Ideal for relieving pain from plantar fasciitis, heel spurs, and general soreness, these protectors offer a soft gel or foam layer to reduce pressure with every step. Wear them directly on your foot for targeted relief.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heel_pad.jpg" alt="Fovera Heel Cup Sleeve" class="product-image">
                    <h3 class="product-title">Fovera Heel Cup Sleeve with Gel Padding</h3>
                    <p class="product-description">Provides gel padding for plantar fasciitis and heel pain relief, absorbing shock as you walk.</p>
                    <p class="product-price">₹449</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heel_pad2.jpg" alt="Welnove Heel Protectors" class="product-image">
                    <h3 class="product-title">Welnove 2PCS Heel Protectors</h3>
                    <p class="product-description">Heel support pads that cushion and protect from heel pain and plantar fasciitis.</p>
                    <p class="product-price">₹3,113</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>