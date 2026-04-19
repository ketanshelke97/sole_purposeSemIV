<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Orthopedic Shoes | Sole Purpose</title>
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
            <h1>Men's Orthopedic Collection</h1>
            <div class="collection-description">
                <p>Orthopedic conditions involve disorders of the musculoskeletal system, particularly affecting bones,
                    joints, and muscles in the feet and lower limbs, leading to issues like plantar fasciitis, bunions,
                    and arthritis. Specialized footwear serves as a key treatment by providing features standard shoes
                    lack. These include enhanced arch support to distribute pressure, a wide toe box to accommodate
                    deformities, and superior cushioning to absorb shock and reduce joint strain. By correcting
                    alignment and offering targeted support, orthopedic footwear effectively alleviates pain, improves
                    stability, and helps restore mobility for daily activities.</p>
            </div>
            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/diabetic.jpg"
                        alt="HEALTH FIT Orthopedic Shoe" class="product-image">
                    <h3 class="product-title">HEALTH FIT Orthopedic & Diabetic Shoes</h3>
                    <p class="product-description">Breathable Soft Sole Ultra-Lightweight Shoes for Men's 1731</p>
                    <p class="product-price">₹1,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/orthopedic.jpg"
                        alt="Dr. Ortho Flexi Ease Shoe" class="product-image">
                    <h3 class="product-title">Dr. Ortho Men's Flexi Ease Orthopedic Shoes</h3>
                    <p class="product-description">Comfortable and stylish support for everyday wear.</p>
                    <p class="product-price">₹2,499</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/comfort(men).jpg"
                        alt="HEALTH FIT Super Comfortable Shoe" class="product-image">
                    <h3 class="product-title">HEALTH FIT Men's Super Comfortable Shoe</h3>
                    <p class="product-description">Breathable Soft Sole Ultra-Lightweight design for all-day ease.</p>
                    <p class="product-price">₹1,850</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>
    

</body>

</html>