<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bunion Correctors | Sole Purpose</title>
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
            <h1>Bunion Correctors & Relief</h1>
            
            <div class="collection-description">
                <p>A bunion is a bony bump that forms on the joint at the base of your big toe, which can cause pain and discomfort. Our bunion correctors are designed to gently realign the toe, reduce pressure on the joint, and alleviate pain. Consistent use can help manage symptoms and slow the progression of the bunion.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/bunion_1.jpg" alt="Bunion Relief Foot Brace Splint" class="product-image">
                    <h3 class="product-title">Bunion Relief Foot Brace Splint</h3>
                    <p class="product-description">An adjustable toe straightener that provides gentle pressure to realign the big toe.</p>
                    <p class="product-price">₹199</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/bunion_2.jpg" alt="Frido Orthotics Bunion Corrector" class="product-image">
                    <h3 class="product-title">Frido Orthotics Bunion Corrector</h3>
                    <p class="product-description">Features toe alignment and a gel cushion for universal fit and foot support.</p>
                    <p class="product-price">₹499</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
                
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/bunion_3.jpg" alt="Adjustable Knob Bunion Corrector" class="product-image">
                    <h3 class="product-title">Adjustable Knob Bunion Corrector</h3>
                    <p class="product-description">A bunion fixer with an adjustable knob for precise control over the correction angle.</p>
                    <p class="product-price">₹599</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>