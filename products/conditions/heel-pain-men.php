<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Shoes for Heel Pain | Sole Purpose</title>
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
            <h1>Men's Shoes for Heel Pain</h1>

            <div class="collection-description">
                <p>Heel pain, often a symptom of plantar fasciitis or Achilles tendonitis, results from excessive strain
                    on the foot. The right footwear is crucial for treatment and relief. Shoes with features like a firm
                    heel counter for stability, deep cushioning to absorb impact, and strong arch support help
                    distribute pressure evenly across the foot. This reduces the load on the heel, alleviates pain, and
                    promotes proper foot alignment, allowing for comfortable movement.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heel_pain(men).jpg"
                        alt="HOKA Men's Mach 6 Shoes" class="product-image">
                    <h3 class="product-title">HOKA Men's Mach 6 Shoes</h3>
                    <p class="product-description">Engineered for a lightweight feel with responsive cushioning for
                        high-performance comfort.</p>
                    <p class="product-price">₹1,769</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heel_pain2(men).jpg"
                        alt="ASICS Men Gel-Nimbus 26" class="product-image">
                    <h3 class="product-title">ASICS Men Gel-Nimbus 26 Running Shoes</h3>
                    <p class="product-description">Features PureGEL technology for enhanced shock absorption and a
                        softer landing.</p>
                    <p class="product-price">₹1,599</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heel_pain3(men).jpg"
                        alt="Brooks Adrenaline GTS 22" class="product-image">
                    <h3 class="product-title">Brooks Adrenaline GTS 22 Running Shoes</h3>
                    <p class="product-description">Offers a perfect balance of soft cushioning and reliable support for
                        a smooth ride.</p>
                    <p class="product-price">₹1,249</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>
    

</body>

</html>