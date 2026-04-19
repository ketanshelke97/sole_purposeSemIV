<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foot Health Guide | Sole Purpose</title>
    <?php include __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main>
        <div class="article-container">
            <h1>Foot Health Guide</h1>
            <p class="article-intro">Understanding your feet is the first step towards comfort. This guide covers common foot conditions and explains how the right footwear can provide relief and support.</p>

            <div class="table-of-contents">
                <h2>In This Guide:</h2>
                <ul>
                    <li><a href="#plantar-fasciitis">1. Understanding Plantar Fasciitis</a></li>
                    <li><a href="#flat-feet">2. Living with Flat Feet</a></li>
                    <li><a href="#bunions">3. What are Bunions?</a></li>
                </ul>
            </div>

            <article id="plantar-fasciitis">
                <h2>1. Understanding Plantar Fasciitis</h2>
                <p>Plantar Fasciitis is one of the most common causes of heel pain. It involves inflammation of a thick band of tissue (the plantar fascia) that runs across the bottom of your foot. The pain is often most intense with your first steps in the morning.</p>
                <p>Supportive footwear is crucial. Shoes with excellent arch support and deep heel cushioning help reduce tension on the plantar fascia. Accessories like heel pads and arch cushions can provide targeted relief.</p>
                <div class="recommended-products">
                    <h4>Recommended Products:</h4>
                    <a href="<?php echo BASE_URL; ?>products/conditions/heel-pain-men.php" class="btn-secondary">Shop Men's Heel Pain Shoes</a>
                    <a href="<?php echo BASE_URL; ?>products/conditions/heel-pain-women.php" class="btn-secondary">Shop Women's Heel Pain Shoes</a>
                    <a href="<?php echo BASE_URL; ?>products/accessories/heel-pads.php" class="btn-secondary">Shop Heel Pads</a>
                </div>
            </article>

            <article id="flat-feet">
                <h2>2. Living with Flat Feet</h2>
                <p>Flat feet is a condition where the arches on the inside of your feet are flattened, allowing the entire sole to touch the floor when you stand up. This can sometimes lead to pain in the heels or arches and cause overpronation (when your ankles roll inward).</p>
                <p>Stability shoes are the best solution. Look for footwear with firm midsoles and structured heel counters that prevent your foot from rolling inward. Good arch support is also key to distributing pressure evenly.</p>
                <div class="recommended-products">
                    <h4>Recommended Products:</h4>
                    <a href="<?php echo BASE_URL; ?>products/conditions/flat-feet-men.php" class="btn-secondary">Shop Men's Flat Feet Shoes</a>
                    <a href="<?php echo BASE_URL; ?>products/conditions/flat-feet-women.php" class="btn-secondary">Shop Women's Flat Feet Shoes</a>
                </div>
            </article>

            <article id="bunions">
                <h2>3. What are Bunions?</h2>
                <p>A bunion is a bony bump that forms on the joint at the base of the big toe, causing it to lean towards the other toes. This can cause pain, swelling, and discomfort, especially in tight-fitting shoes.</p>
                <p>Footwear with a wide toe box is essential to avoid putting pressure on the bunion. Additionally, bunion correctors and toe separators can help realign the toe and provide significant pain relief, especially when worn at rest.</p>
                <div class="recommended-products">
                    <h4>Recommended Products:</h4>
                    <a href="<?php echo BASE_URL; ?>products/accessories/bunion-correctors.php" class="btn-secondary">Shop Bunion Correctors</a>
                    <a href="<?php echo BASE_URL; ?>products/accessories/toe-separators.php" class="btn-secondary">Shop Toe Separators</a>
                </div>
            </article>
        </div>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

    

</body>
</html>
