<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Shoes for Flat Feet | Sole Purpose</title>
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
            <h1>Women's Shoes for Flat Feet</h1>
            
            <div class="collection-description">
                <p>Flat feet, a condition where the arches of the foot collapse, can lead to discomfort and overpronation. The right footwear is essential for providing the necessary support and stability. Shoes designed for flat feet often feature firm midsoles and structured heel counters. These features help control motion, support the arch, and promote a more natural foot alignment, reducing strain and improving overall comfort.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/flat_f(wom).jpg" alt="Vionic Women's 23Walk Classic Sneaker" class="product-image">
                    <h3 class="product-title">Vionic Women's 23Walk Classic Sneaker</h3>
                    <p class="product-description">Designed with podiatrist-developed technology for excellent stability and arch support.</p>
                    <p class="product-price">₹16,598</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/flat_f(wom2).jpg" alt="Brooks Addiction Walker 2" class="product-image">
                    <h3 class="product-title">Brooks Addiction Walker 2</h3>
                    <p class="product-description">A certified diabetic shoe that provides maximum support for low arches and overpronation.</p>
                    <p class="product-price">₹10,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>