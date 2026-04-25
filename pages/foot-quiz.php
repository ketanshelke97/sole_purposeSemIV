<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Foot Quiz | Sole Purpose</title>
    <?php include __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <main class="quiz-container">
        <section class="quiz-hero">
            <h1>The Perfect Fit Quiz</h1>
            <p>Analyze your foot shape and arch type to find your ideal sustainable footwear.</p>
        </section>

        <section class="quiz-box shadow-premium" id="quiz-box">
            <!-- Progress Bar -->
            <div class="quiz-progress-wrapper">
                <div class="quiz-progress-bar" id="quiz-progress" style="width: 25%;"></div>
            </div>

            <!-- Step 1: Gender -->
            <div class="quiz-step active" data-step="1">
                <h2>I am shopping for...</h2>
                <div class="quiz-options grid-2">
                    <button class="quiz-option-btn" data-key="gender" data-value="men">
                        <span class="option-icon">👞</span>
                        <span class="option-label">Men</span>
                    </button>
                    <button class="quiz-option-btn" data-key="gender" data-value="women">
                        <span class="option-icon">👠</span>
                        <span class="option-label">Women</span>
                    </button>
                </div>
            </div>

            <!-- Step 2: Arch Type -->
            <div class="quiz-step" data-step="2">
                <h2>What describes your arch type?</h2>
                <div class="quiz-options grid-3">
                    <button class="quiz-option-btn" data-key="arch" data-value="flat">
                        <span class="option-icon">👣</span>
                        <span class="option-label">Low / Flat</span>
                        <small>Arch touches the ground</small>
                    </button>
                    <button class="quiz-option-btn" data-key="arch" data-value="medium">
                        <span class="option-icon">👟</span>
                        <span class="option-label">Medium / Neutral</span>
                        <small>Standard height arch</small>
                    </button>
                    <button class="quiz-option-btn" data-key="arch" data-value="high">
                        <span class="option-icon">⛰️</span>
                        <span class="option-label">High Arch</span>
                        <small>Significant space under arch</small>
                    </button>
                </div>
                <button class="btn-text back-btn">Previous Step</button>
            </div>

            <!-- Step 3: Width -->
            <div class="quiz-step" data-step="3">
                <h2>How do most shoes fit you?</h2>
                <div class="quiz-options grid-3">
                    <button class="quiz-option-btn" data-key="width" data-value="narrow">
                        <span class="option-label">Too Loose / Narrow</span>
                        <small>Shoes often slide off</small>
                    </button>
                    <button class="quiz-option-btn" data-key="width" data-value="regular">
                        <span class="option-label">Just Right</span>
                        <small>Standard fit works well</small>
                    </button>
                    <button class="quiz-option-btn" data-key="width" data-value="wide">
                        <span class="option-label">Too Tight / Wide</span>
                        <small>Need more space in toe box</small>
                    </button>
                </div>
                <button class="btn-text back-btn">Previous Step</button>
            </div>

            <!-- Step 4: Results (Dynamic) -->
            <div class="quiz-step" data-step="4" id="quiz-results">
                <div class="results-loading">
                    <div class="loader"></div>
                    <p>Analyzing your profile...</p>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>
</html>
