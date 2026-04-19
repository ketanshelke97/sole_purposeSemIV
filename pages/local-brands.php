<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Brand Spotlight | Sole Purpose</title>
    <?php include __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main class="showcase-container">
        <h1>Spotlight on Indian Brands</h1>
        <p class="article-intro">Discover the stories, craftsmanship, and passion behind the sustainable local brands we are proud to partner with.</p>

        <section class="brand-profile">
            <div class="brand-image">
                <img src="<?php echo BASE_URL; ?>images/local_brand1.jpg" alt="Durable rubber-based sandals">
            </div>
            <div class="brand-story">
                <h2>Paragon</h2>
                <h3>Established in Kerala, 1975</h3>
                <p>Paragon is a household name in India, known for its durable and affordable footwear. The brand offers a wide range of products, including slippers, sandals, and formal shoes for men, women, and children. They are particularly recognized for their rubber-based footwear that is well-suited for everyday use.</p>
                <a href="#" class="btn-primary">Shop Paragon</a>
            </div>
        </section>

        <section class="brand-profile reversed">
            <div class="brand-image">
                <img src="<?php echo BASE_URL; ?>images/local_brand2.jpg" alt="Stylish formal leather shoes">
            </div>
            <div class="brand-story">
                <h2>Liberty Shoes</h2>
                <h3>Founded in Karnal, 1954</h3>
                <p>Founded in 1954 in Karnal, Haryana, Liberty is another iconic Indian footwear brand. It has a diverse portfolio that includes casual shoes, formal wear, sports shoes, and sandals. Liberty caters to a wide audience with its various sub-brands and is known for its focus on comfort and style.</p>
                <a href="#" class="btn-primary">Shop Liberty</a>
            </div>
        </section>

    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

    

</body>
</html>
