<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Shoes for Arch Support | Sole Purpose</title>
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
            <h1>Men's Shoes for Arch Support</h1>
            
            <div class="collection-description">
                <p>Proper arch support is vital for distributing weight across your feet and aligning your body. A lack of it can lead to pain in the feet, knees, and back. The shoes in this collection are designed with enhanced midsole structures and supportive insoles that contour to your arch. This provides stability, absorbs shock, and reduces strain, making every step more comfortable.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/arch_sup_men_1.jpg" alt="Skechers Men ARCH FIT 2.0 - VALLO" class="product-image">
                    <h3 class="product-title">Skechers Men ARCH FIT 2.0 - VALLO</h3>
                    <p class="product-description">Features a patented Arch Fit insole system with podiatrist-certified arch support.</p>
                    <p class="product-price">₹2,939</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/arch_sup_men_2.jpg" alt="Hoka S Transport" class="product-image">
                    <h3 class="product-title">Hoka S Transport</h3>
                    <p class="product-description">Combines city-ready style with Hoka's signature cushioning and supportive structure.</p>
                    <p class="product-price">₹20,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/arch_sup_men_3.jpg" alt="Nike Men's Motiva Walking Shoes" class="product-image">
                    <h3 class="product-title">Nike Men's Motiva Walking Shoes</h3>
                    <p class="product-description">Designed with a unique rocker shape to help you move smoothly and comfortably.</p>
                    <p class="product-price">₹9,207</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>
    

</body>
</html>