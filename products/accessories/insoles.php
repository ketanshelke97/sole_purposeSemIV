<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Insoles & Inserts | Sole Purpose</title>
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
            <h1>Shoe Insoles & Inserts</h1>
            
            <div class="collection-description">
                <p>Upgrade your comfort and support with our range of shoe insoles. Whether you're looking for extra cushioning for all-day wear, enhanced arch support, or a bit of a height boost, the right inserts can transform the fit and feel of your favorite shoes. Improve your comfort with every step.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/insoles1.jpg" alt="Fovera Gel Shoe Inserts" class="product-image">
                    <h3 class="product-title">Fovera Gel Shoe Inserts</h3>
                    <p class="product-description">Premium massaging gel insoles with arch support for all-day comfort and shock absorption.</p>
                    <p class="product-price">₹342</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/insoles2.jpg" alt="Purastep Height Increasing Shoes Insoles" class="product-image">
                    <h3 class="product-title">Purastep 4 Layers 9 cm Height Increasing Shoes Insoles</h3>
                    <p class="product-description">Adjustable and comfortable shoe lifts with an air cushion for a discreet height increase.</p>
                    <p class="product-price">₹349</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>