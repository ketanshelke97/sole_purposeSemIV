<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arch Cushions & Support | Sole Purpose</title>
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
            <h1>Arch Cushions & Support</h1>
            
            <div class="collection-description">
                <p>Arch cushions provide targeted support directly to the arch of your foot, helping to alleviate pain from conditions like plantar fasciitis and flat feet. These cushions can be worn directly on the foot or placed in shoes to provide extra comfort, absorb shock, and reduce strain on the plantar fascia ligament.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/archcushions_1.jpg" alt="Wonderwin Arch Support Sleeves" class="product-image">
                    <h3 class="product-title">Wonderwin Arch Support Sleeves (3 Pairs)</h3>
                    <p class="product-description">Compression cushioned sleeves for plantar fasciitis relief and arch support.</p>
                    <p class="product-price">₹399</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/archcushions_2.jpg" alt="Dr. Frederick's Arch Support Gel Pads" class="product-image">
                    <h3 class="product-title">Dr. Frederick's Original Arch Support Gel Pads</h3>
                    <p class="product-description">Peel and stick gel pads that provide targeted cushioning for high arches directly in your shoes.</p>
                    <p class="product-price">₹299</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>