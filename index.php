<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sole Purpose | Step Sustainably</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <?php include 'header.php'; ?>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Step Smart. Step Sustainably.</h1>
                <p>Find shoes that fit your feet, your planet, and your style.</p>
                <a href="<?php echo BASE_URL; ?>pages/bestseller.php" class="btn-primary">Shop Now</a>
            </div>
        </section>

        <section class="features">
            <div class="feature-card" id="open-size-converter">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="12" y1="6" x2="6" y2="12"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <h3>Smart Size Converter</h3>
                <p>Get the perfect fit every time with our AI-powered size guide.</p>
            </div>

            <a href="<?php echo BASE_URL; ?>pages/foot-health-guide.php" class="feature-link">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <h3>Foot Health Guide</h3>
                    <p>Tips and articles to keep your feet happy and healthy.</p>
                </div>
            </a>

            <a href="<?php echo BASE_URL; ?>pages/local-brands.php" class="feature-link">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <h3>Local Brand Spotlight</h3>
                    <p>Discover and support amazing sustainable Indian footwear brands.</p>
                </div>
            </a>

            <a href="<?php echo BASE_URL; ?>pages/eco-friendly-practices.php" class="feature-link">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="17 1 21 5 17 9"></polyline>
                            <path d="M3 11V9a4 4 0 0 1 4-4h14"></path>
                            <polyline points="7 23 3 19 7 15"></polyline>
                            <path d="M21 13v2a4 4 0 0 1-4 4H3"></path>
                        </svg>
                    </div>
                    <h3>Eco-Friendly Practices</h3>
                    <p>Learn how to care for your shoes and discover our responsible recycling program.</p>
                </div>
            </a>
        </section>

        <section class="about-preview">
            <h2>About Sole Purpose</h2>
            <p>We are dedicated to making shoe shopping a conscious choice. By supporting local artisans, promoting
                eco-friendly materials, and providing tools for better foot health, we aim to create a community that
                walks with purpose.</p>
            <a href="<?php echo BASE_URL; ?>pages/about.php" class="btn-secondary">Learn More</a>
        </section>
    </main>

    <div id="size-modal" class="modal-overlay">
        <div class="modal-content">
            <button id="close-modal" class="close-btn">&times;</button>
            <h2>Find Your Perfect Fit</h2>
            <p class="modal-intro">Follow these simple steps to find your most accurate shoe size.</p>

            <div class="modal-steps">
                <div class="step">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                    </div>
                    <h4>Step 1: Trace</h4>
                    <p>Place a blank paper on a hard floor and trace the outline of your foot.</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="12" y1="6" x2="6" y2="12"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                    <h4>Step 2: Measure</h4>
                    <p>Use a ruler to measure the length from your heel to your longest toe in Centimeters (CM).</p>
                </div>
            </div>

            <div class="modal-input-section">
                <label for="cm-input">Enter your measurement (CM)</label>
                <input type="number" id="cm-input" placeholder="e.g., 27.5">
                <button id="calculate-size-btn" class="btn-primary">Calculate Size</button>
            </div>

            <div id="size-result">
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    

</body>

</html>