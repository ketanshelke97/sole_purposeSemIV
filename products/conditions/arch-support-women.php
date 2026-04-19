<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Shoes for Arch Support | Sole Purpose</title>
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
            <h1>Women's Shoes for Arch Support</h1>
            
            <div class="collection-description">
                <p>Proper arch support is vital for distributing weight across your feet and aligning your body. A lack of it can lead to pain in the feet, knees, and back. The shoes in this collection are designed with enhanced midsole structures and supportive insoles that contour to your arch. This provides stability, absorbs shock, and reduces strain, making every step more comfortable.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/arch_sup_wo_1.jpg" alt="HOKA Bondi 8 Running Shoes" class="product-image">
                    <h3 class="product-title">HOKA Bondi 8 Running Shoes</h3>
                    <p class="product-description">Maximum cushioning for ultimate comfort on long walks or runs.</p>
                    <p class="product-price">₹14,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/arch_sup_wo_2.jpg" alt="Brooks Addiction Walker 2" class="product-image">
                    <h3 class="product-title">Brooks Womens Addiction Walker 2 Shoe</h3>
                    <p class="product-description">Provides sturdy support and slip-resistant traction for comfortable walking.</p>
                    <p class="product-price">₹9,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/arch_sup_wo_3.jpg.png" alt="New Balance Women 880 Running Shoes" class="product-image">
                    <h3 class="product-title">New Balance Women 880 Running Shoes</h3>
                    <p class="product-description">A dependable and soft shoe designed for everyday performance.</p>
                    <p class="product-price">₹6,369</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>