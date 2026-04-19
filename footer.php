<?php
// Include the central config if not already loaded
if (!defined('BASE_URL')) {
    require_once __DIR__ . '/config.php';
}
?>
<footer>
    <div class="social-icons">
        <a href="#">Instagram</a> |
        <a href="#">Facebook</a> |
        <a href="#">Twitter</a>
    </div>
    <p>&copy; 2025 Sole Purpose. All Rights Reserved.</p>
</footer>

<!-- We include the script tag in the footer -->
<!-- It's good practice, and it ensures our hamburger menu code runs -->
<script src="<?php echo BASE_URL; ?>script.js"></script>
