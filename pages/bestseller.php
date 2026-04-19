<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Best Sellers | Sole Purpose</title>
    <?php include __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- This will load your existing navigation bar -->
    <?php include __DIR__ . '/../header.php'; ?>

    <main>
        <section class="product-page">
            <h1>Our Best Sellers</h1>
            <div class="collection-description">
                <p>Browse our complete collection of men's and women's most popular footwear. All crafted with a commitment to sustainability, durability, and style.</p>
            </div>
            <div class="product-grid">

                <!-- Products from men-all-shoes.html -->
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/TWL(men).jpg" alt="Tan Suede Loafer" class="product-image">
                    <h3 class="product-title">The Weekend Loafer (Men's)</h3>
                    <p class="product-description">A comfortable slip-on made from recycled vegan suede with a natural cork insole.</p>
                    <p class="product-price">₹4,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/TCL(men).jpg" alt="Black Classic Loafer" class="product-image">
                    <h3 class="product-title">The Classic Loafer (Men's)</h3>
                    <p class="product-description">A timeless black loafer crafted from apple leather with a durable recycled rubber sole.</p>
                    <p class="product-price">₹5,499</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/TOC(men).jpg" alt="Brown Oxford Shoe" class="product-image">
                    <h3 class="product-title">The Oxford Classic</h3>
                    <p class="product-description">A sleek brown Oxford made from pineapple leaf fiber (Piñatex) for a sustainable finish.</p>
                    <p class="product-price">₹7,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/boots(unisex).jpg" alt="Brown Work Boot" class="product-image">
                    <h3 class="product-title">The All-Weather Boot (Unisex)</h3>
                    <p class="product-description">A waterproof boot made with recycled plastics and a sole of natural rubber.</p>
                    <p class="product-price">₹9,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/slides(unisex).jpg" alt="Comfortable Slide" class="product-image">
                    <h3 class="product-title">The Recycled Slide (Unisex)</h3>
                    <p class="product-description">A cushioned slide with a strap made from recycled materials and a bio-foam sole.</p>
                    <p class="product-price">₹2,499</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

                <!-- Products from women-all-shoes.html -->
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/TWL(Women).jpg" alt="Tan Suede Loafer" class="product-image">
                    <h3 class="product-title">The Weekend Loafer (Women's)</h3>
                    <p class="product-description">A comfortable slip-on made from recycled vegan suede with a natural cork insole.</p>
                    <p class="product-price">₹4,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/TCL(women).jpg" alt="Black Classic Loafer" class="product-image">
                    <h3 class="product-title">The Classic Loafer (Women's)</h3>
                    <p class="product-description">A timeless black loafer crafted from apple leather with a durable recycled rubber sole.</p>
                    <p class="product-price">₹5,499</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>
                <div class="product-card">
                    <img src="<?php echo BASE_URL; ?>images/heels.jpg" alt="Merlot Pointed Heel" class="product-image">
                    <h3 class="product-title">The Merlot Pointed Heel</h3>
                    <p class="product-description">A chic pointed-toe heel in a rich merlot hue, made from recycled vegan leather.</p>
                    <p class="product-price">₹7,999</p>
                    <button class="btn-primary">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

    

</body>
</html>
