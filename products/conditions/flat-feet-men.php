<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Shoes for Flat Feet | Sole Purpose</title>
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
            <h1>Men's Shoes for Flat Feet</h1>
            
            <div class="collection-description">
                <p>Flat feet, a condition where the arches of the foot collapse, can lead to discomfort and overpronation. The right footwear is essential for providing the necessary support and stability. Shoes designed for flat feet often feature firm midsoles and structured heel counters. These features help control motion, support the arch, and promote a more natural foot alignment, reducing strain and improving overall comfort.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/flat_f(men).jpg" alt="Men Brooks Adrenaline GTS 23" class="product-image">
                    <h3 class="product-title">Men Brooks Adrenaline GTS 23 Road Running Shoes</h3>
                    <p class="product-description">A popular stability shoe known for its GuideRails support system that aids alignment.</p>
                    <p class="product-price">₹13,499</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/flat_f(men2).jpg" alt="Asics Men's GT-2000 13" class="product-image">
                    <h3 class="product-title">Asics Men's GT-2000 13 Black Running Shoes</h3>
                    <p class="product-description">A reliable choice for runners needing extra stability and arch support for overpronation.</p>
                    <p class="product-price">₹12,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>