<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Sole Purpose</title>
    <?php include __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
<?php include __DIR__ . '/../header.php'; ?>

<main class="about-page-container">
    <div class="about-content">
        <h1>Our Mission</h1>
        <p class="about-intro">Sole Purpose was born from a simple idea: shoe shopping can be both personal and planetary-friendly. We connect you with sustainable footwear while providing tools to ensure comfort and long-term foot health. Our platform is designed to be inclusive, conscious, and community-focused.</p>
    </div>

    <div class="about-highlights">
        <div class="highlight-item">
            <div class="highlight-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"></path><path d="M12 2v20"></path><path d="M22 12H2"></path></svg>
            </div>
            <h3>Eco-Friendly Focus</h3>
            <p>We champion brands that use sustainable materials and ethical manufacturing processes to minimize our environmental footprint.</p>
        </div>
        <div class="highlight-item">
            <div class="highlight-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            </div>
            <h3>Inclusive Sizing &amp; Health</h3>
            <p>Our specialized guides and smart sizing tools help users with various foot conditions find comfortable and stylish shoes.</p>
        </div>
        <div class="highlight-item">
            <div class="highlight-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </div>
            <h3>Supporting Local</h3>
            <p>We provide a platform for local, artisanal shoe brands to reach a wider audience and help communities thrive.</p>
        </div>
    </div>
    <div class="about-footer">
        <a href="<?php echo BASE_URL; ?>index.php" class="btn-secondary">Back to Home</a>
    </div>
</main>

    <?php include __DIR__ . '/../footer.php'; ?>
    

</body>

</html>
