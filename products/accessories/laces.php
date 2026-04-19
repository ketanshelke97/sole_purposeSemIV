<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoelaces | Sole Purpose</title>
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
            <h1>Shoelaces</h1>
            
            <div class="collection-description">
                <p>Instantly refresh the look of your favorite shoes with a new pair of laces. From classic flats to durable rounds, the right shoelaces not only secure your fit but also add a touch of personal style. Explore our collection to find the perfect color, length, and material to complete your look.</p>
            </div>

            <div class="product-grid">

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/laces1.jpg" alt="30 Colors Flat Sneaker Shoelaces" class="product-image">
                    <h3 class="product-title">30 Colors Flat Sneaker Shoelaces</h3>
                    <p class="product-description">A wide variety of colors to perfectly match or contrast with any pair of sneakers.</p>
                    <p class="product-price">₹329</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/laces2.jpg" alt="Shoeshine Flat Shoelace 2 Pair" class="product-image">
                    <h3 class="product-title">Shoeshine Flat Shoelace (2 Pair)</h3>
                    <p class="product-description">Hollow, thick, and durable white laces perfect for casual shoes and sneakers.</p>
                    <p class="product-price">₹149</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../../footer.php'; ?>

    

</body>
</html>