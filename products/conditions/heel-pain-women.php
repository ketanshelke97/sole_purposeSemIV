<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Shoes for Heel Pain | Sole Purpose</title>
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
            <h1>Women's Shoes for Heel Pain</h1>

            <div class="collection-description">
                <p>Heel pain is often caused by stress and impact on the feet. The shoes in this collection are selected
                    for their superior cushioning, shock absorption, and supportive construction to help reduce pressure
                    on the heel and provide lasting comfort throughout the day.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heel_pain(wom).jpg"
                        alt="Skechers Women's ARCH FIT" class="product-image">
                    <h3 class="product-title">Skechers Women's ARCH FIT Pink Multi Casual Sneakers</h3>
                    <p class="product-description">Features podiatrist-certified arch support for maximum comfort and
                        stability.</p>
                    <p class="product-price">₹4,249</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heel_pain2(wom).jpg"
                        alt="New Balance Women's 880 Running Shoes" class="product-image">
                    <h3 class="product-title">New Balance Women's 880 Running Shoes</h3>
                    <p class="product-description">A reliable daily trainer with soft Fresh Foam cushioning for a
                        comfortable run.</p>
                    <p class="product-price">₹6,369</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>
    

</body>

</html>