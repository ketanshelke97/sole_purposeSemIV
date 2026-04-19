<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco-Friendly Practices | Sole Purpose</title>
    <?php include __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main class="eco-container">
        <section class="eco-hero">
            <h1>Our Sustainable Journey</h1>
            <p>From the materials we choose to the end of your shoe's life, we are committed to practices that protect our planet.</p>
        </section>

        <!-- Section 1: Materials -->
        <section class="eco-section">
            <h2>It Starts with the Earth: Our Materials</h2>
            <div class="materials-grid">
                <div class="material-card">
                    <div class="material-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    </div>
                    <h3>Recycled Plastics</h3>
                    <p>We transform discarded plastic bottles into durable, breathable fabrics for our uppers and laces.</p>
                </div>
                <div class="material-card">
                    <div class="material-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"></path></svg>
                    </div>
                    <h3>Natural Rubber</h3>
                    <p>Our outsoles are made from responsibly sourced natural rubber, offering flexibility and grip without harming forests.</p>
                </div>
                <div class="material-card">
                    <div class="material-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 16.9c0-1.2-1.4-2.4-3.5-2.4-1.8 0-3.3 1-3.5 2.4"></path><path d="M16 14.5c0-2 2-3.5 4-3.5s4 1.5 4 3.5"></path><path d="M6.5 16.9c0-1.2-1.4-2.4-3.5-2.4-1.8 0-3.3 1-3.5 2.4"></path><path d="M2 14.5c0-2 2-3.5 4-3.5s4 1.5 4 3.5"></path><path d="M14 10.5c0-2 2-3.5 4-3.5s4 1.5 4 3.5"></path><path d="M12 2a4 4 0 0 0-4 4v2c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4z"></path></svg>
                    </div>
                    <h3>Plant-Based Leather</h3>
                    <p>We use innovative leather alternatives made from pineapple leaves and apples, reducing our reliance on animal products.</p>
                </div>
            </div>
        </section>

        <!-- Section 2: Shoe Care -->
        <section class="eco-section">
            <h2>A Longer Journey: Care For Your Shoes</h2>
            <p>The most sustainable shoe is one that lasts. Proper care can dramatically extend the life of your footwear. Explore our guides for cleaning, protecting, and repairing your shoes.</p>
            <a href="<?php echo BASE_URL; ?>products/accessories/shoe-care.php" class="btn-primary">Shop Shoe Care Products</a>
        </section>
        
        <!-- Section 3: Recycling -->
        <section class="eco-section">
            <h2>Closing the Loop: Our Recycling Program</h2>
            <p>Ready to give your old shoes a new purpose? Find a recycling drop-off location near you and receive a 15% discount on your next purchase as our thank you.</p>
            <div class="recycling-finder">
                <input type="text" id="pincode-input" placeholder="Enter your Pincode">
                <button id="find-location-btn" class="btn-primary">Find Locations</button>
            </div>
            <div id="location-result">
                <!-- Drop-off locations will be displayed here -->
            </div>
        </section>

    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

    

</body>
</html>
