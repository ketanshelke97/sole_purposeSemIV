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
                        <h4><a href="<?php echo BASE_URL; ?>shop.php?gender=men" style="color: inherit;">Best Sellers</a></h4>
                        <h4><a href="<?php echo BASE_URL; ?>shop.php?gender=men" style="color: inherit;">New Arrivals</a></h4>
                        <h4><a href="<?php echo BASE_URL; ?>shop.php?gender=men&comfort=Orthopedic" style="color: inherit;">Orthopedic</a></h4>
                        <h4><a href="<?php echo BASE_URL; ?>shop.php?gender=men" style="color: inherit;">Sale</a></h4>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Shoes</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men">All Shoes</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men&category=loafers">Loafers</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men&category=dress-shoes">Dress</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men&category=boots">Boots</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men&category=slides">Slides</a></li>
                        </ul>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Accessories</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=shoe-care">Shoe Care</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=insoles">Insoles</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=laces">Laces</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=socks">Socks</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=bunion-correctors">Bunion Correctors</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=toe-separators">Toe Separators</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=arch-cushions">Arch Cushions</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=heel-pads">Heel Pads</a></li>
                        </ul>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Foot Pain</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men&comfort=Orthopedic">Orthopedic</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men&comfort=Heel+Pain">Heel Pain</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men&comfort=Arch+Support">Arch Support</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=men&comfort=Flat+Feet">Flat Feet</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="nav-item-dropdown">
                <a href="#">Women</a>
                <div class="mega-menu">
                    <div class="mega-menu-column">
                        <h4><a href="<?php echo BASE_URL; ?>shop.php?gender=women" style="color: inherit;">Best Sellers</a></h4>
                        <h4><a href="<?php echo BASE_URL; ?>shop.php?gender=women" style="color: inherit;">New Arrivals</a></h4>
                        <h4><a href="<?php echo BASE_URL; ?>shop.php?gender=women&comfort=Orthopedic" style="color: inherit;">Orthopedic</a></h4>
                        <h4><a href="<?php echo BASE_URL; ?>shop.php?gender=women" style="color: inherit;">Sale</a></h4>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Shoes</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women">All Shoes</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women&category=loafers">Loafers</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women&category=heels">Heels</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women&category=boots">Boots</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women&category=slides">Slides</a></li>
                        </ul>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Accessories</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=shoe-care">Shoe Care</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=insoles">Insoles</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=laces">Laces</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=socks">Socks</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=bunion-correctors">Bunion Correctors</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=toe-separators">Toe Separators</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=arch-cushions">Arch Cushions</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?category=heel-pads">Heel Pads</a></li>
                        </ul>
                    </div>
                    <div class="mega-menu-column">
                        <h4>Foot Pain</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women&comfort=Orthopedic">Orthopedic</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women&comfort=Heel+Pain">Heel Pain</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women&comfort=Arch+Support">Arch Support</a></li>
                            <li><a href="<?php echo BASE_URL; ?>shop.php?gender=women&comfort=Flat+Feet">Flat Feet</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li><a href="<?php echo BASE_URL; ?>pages/foot-quiz.php">Foot Quiz</a></li>
            <li><a href="<?php echo BASE_URL; ?>shop.php">Shop</a></li>
            <li>
                <a href="<?php echo BASE_URL; ?>pages/cart.php" class="cart-nav-link">Cart<?php
                    // Calculate cart item count for badge
                    $cartCount = 0;
                    if ($loggedin) {
                        require_once __DIR__ . '/partials/_dbconnect.php';
                        $cartUsername = $_SESSION['username'];
                        $cartUserQ = mysqli_query($connection, "SELECT `sno` FROM `users` WHERE `username`='$cartUsername'");
                        $cartUserData = mysqli_fetch_assoc($cartUserQ);
                        if ($cartUserData) {
                            $cartCountQ = mysqli_query($connection, "SELECT SUM(`quantity`) as cnt FROM `cart_items` WHERE `user_id`=" . $cartUserData['sno']);
                            $cartCountRow = mysqli_fetch_assoc($cartCountQ);
                            $cartCount = $cartCountRow['cnt'] ? intval($cartCountRow['cnt']) : 0;
                        }
                    }
                    if ($cartCount > 0) {
                        echo '<span class="cart-badge" id="cart-badge" data-count="' . $cartCount . '">' . $cartCount . '</span>';
                    } else {
                        echo '<span class="cart-badge" id="cart-badge" data-count="0"></span>';
                    }
                ?></a>
            </li>

            <!-- DYNAMIC LOGIN/LOGOUT LINKS -->
            <?php
            if(!$loggedin){
                echo '<li><a href="' . BASE_URL . 'auth/login.php">Login</a></li>';
                echo '<li><a href="' . BASE_URL . 'auth/signup.php">Signup</a></li>';
            }
            if($loggedin){
                echo '<li><a href="' . BASE_URL . 'pages/wishlist.php">Wishlist</a></li>';
                echo '<li><a href="' . BASE_URL . 'auth/profile.php">Profile</a></li>';
                echo '<li><a href="' . BASE_URL . 'auth/logout.php">Logout</a></li>';
            }
            ?>
            <!-- END DYNAMIC LINKS -->

        </ul>
    </nav>
</header>
