<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Care Products | Sole Purpose</title>
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
            <h1>Shoe Care Essentials</h1>
            
            <div class="collection-description">
                <p>Extend the life and look of your favorite footwear with our essential shoe care products. Regular cleaning, polishing, and protecting your shoes not only keeps them looking great but also preserves the materials, ensuring they last for years to come. From quick cleaning kits to classic wax polish, we have everything you need to maintain your collection.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/shoe_clean.jpg" alt="Sneakare Quick Shoe Cleaning Kit" class="product-image">
                    <h3 class="product-title">Sneakare Quick Shoe Cleaning Kit</h3>
                    <p class="product-description">An easy-to-use foam cleaner and brush for removing dirt and stains from all types of shoes.</p>
                    <p class="product-price">₹299</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/shoe_clean2.jpg" alt="Shoegr Instant Shoe Cleaning Kit" class="product-image">
                    <h3 class="product-title">Shoegr Instant Shoe Cleaning Kit</h3>
                    <p class="product-description">A quick and effective solution for cleaning sneakers and casual shoes on the go.</p>
                    <p class="product-price">₹305</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/shoe_clean3.jpg" alt="Cherry Blossom Black Wax Shoe Polish" class="product-image">
                    <h3 class="product-title">Cherry Blossom Black Wax Shoe Polish</h3>
                    <p class="product-description">The classic wax polish to nourish, protect, and add a brilliant shine to your leather shoes.</p>
                    <p class="product-price">₹75</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>