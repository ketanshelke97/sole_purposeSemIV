<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toe Separators | Sole Purpose</title>
    <?php include __DIR__ . '/../../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family/Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include __DIR__ . '/../../header.php'; ?>

    <main>
        <section class="product-page">
            <h1>Toe Separators & Spreaders</h1>
            
            <div class="collection-description">
                <p>Toe separators are designed to gently space out your toes, helping to realign them to their natural position. This can alleviate pressure from bunions, overlapping toes, and other foot conditions. By improving alignment and circulation, these simple tools can provide significant relief from foot pain and discomfort.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/toe1.jpg" alt="YOGAMEDIC Silicone Toe Separators" class="product-image">
                    <h3 class="product-title">YOGAMEDIC Silicone Toe Separators</h3>
                    <p class="product-description">An orthopedic bunion corrector and toe spreader for fast pain relief and toe alignment.</p>
                    <p class="product-price">₹185</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/toe2.jpg" alt="Toe Separators By Envelop" class="product-image">
                    <h3 class="product-title">Toe Separators By Envelop</h3>
                    <p class="product-description">Durable silicone spacers that support and comfort toes while improving circulation.</p>
                    <p class="product-price">₹299</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>