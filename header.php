<?php
// We start the session on the header file,
// which will be included by *every* other page.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the central config file for BASE_URL
require_once __DIR__ . '/config.php';

$loggedin = false;
if (isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == true){
    $loggedin = true;
}
?>

<header>
    <nav class="navbar">
        <a href="<?php echo BASE_URL; ?>index.php" class="logo">Sole Purpose</a>
        <button class="hamburger-menu" aria-label="Toggle navigation">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <ul class="nav-menu">
            <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>pages/about.php">About</a></li>

            <li class="nav-item-dropdown">
                <a href="#">Men</a>
                <div class="mega-menu">
                    <div class="mega-menu-column">
                        <h4><a href="<?php echo BASE_URL; ?>pages/bestseller.php">Best Sellers</a></h4>
                        <h4>New Arrivals</h4>
                        <h4>Orthopedic</h4>
                        <h4>Sale</h4>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Shoes</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>products/men/men-all-shoes.php">All Shoes</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/men/men-loafers.php">Loafers</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/men/men-dress-shoes.php">Dress</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/men/men-boots.php">Boots</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/men/men-slides.php">Slides</a></li>
                        </ul>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Accessories</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/shoe-care.php">Shoe Care</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/insoles.php">Insoles</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/laces.php">Laces</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/socks.php">Socks</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/bunion-correctors.php">Bunion Correctors</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/toe-separators.php">Toe Separators</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/arch-cushions.php">Arch Cushions</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/heel-pads.php">Heel Pads</a></li>
                        </ul>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Foot Pain</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>products/conditions/orthopedic-men.php">Orthopedic</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/conditions/heel-pain-men.php">Heel Pain</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/conditions/arch-support-men.php">Arch Support</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/conditions/flat-feet-men.php">Flat Feet</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="nav-item-dropdown">
                <a href="#">Women</a>
                <div class="mega-menu">
                    <div class="mega-menu-column">
                        <h4><a href="<?php echo BASE_URL; ?>pages/bestseller.php">Best Sellers</a></h4>
                        <h4>New Arrivals</h4>
                        <h4>Orthopedic</h4>
                        <h4>Sale</h4>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Shoes</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>products/women/women-all-shoes.php">All Shoes</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/women/women-loafers.php">Loafers</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/women/women-heels.php">Heels</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/women/women-boots.php">Boots</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/women/women-slides.php">Slides</a></li>
                        </ul>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Accessories</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/shoe-care.php">Shoe Care</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/insoles.php">Insoles</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/laces.php">Laces</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/socks.php">Socks</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/bunion-correctors.php">Bunion Correctors</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/toe-separators.php">Toe Separators</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/arch-cushions.php">Arch Cushions</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/accessories/heel-pads.php">Heel Pads</a></li>
                        </ul>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Foot Pain</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>products/conditions/orthopedic-women.php">Orthopedic</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/conditions/heel-pain-women.php">Heel Pain</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/conditions/arch-support-women.php">Arch Support</a></li>
                            <li><a href="<?php echo BASE_URL; ?>products/conditions/flat-feet-women.php">Flat Feet</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li><a href="<?php echo BASE_URL; ?>pages/cart.php">Cart</a></li>

            <!-- DYNAMIC LOGIN/LOGOUT LINKS -->
            <?php
            if(!$loggedin){
                echo '<li><a href="' . BASE_URL . 'auth/login.php">Login</a></li>';
                echo '<li><a href="' . BASE_URL . 'auth/signup.php">Signup</a></li>';
            }
            if($loggedin){
                echo '<li><a href="' . BASE_URL . 'auth/profile.php">Profile</a></li>';
                echo '<li><a href="' . BASE_URL . 'auth/logout.php">Logout</a></li>';
            }
            ?>
            <!-- END DYNAMIC LINKS -->

        </ul>
    </nav>
</header>
