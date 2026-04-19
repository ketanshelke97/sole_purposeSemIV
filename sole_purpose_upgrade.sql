-- =====================================================
-- Sole Purpose - Database Upgrade Script
-- =====================================================
-- This script creates the new tables needed for:
-- 1. Dynamic product listings with smart filters
-- 2. Wishlist functionality
-- 3. Persistent cart (linked to user accounts)
--
-- HOW TO IMPORT IN PHPMYADMIN:
-- 1. Open phpMyAdmin (http://localhost/phpmyadmin)
-- 2. Click on your "users" database on the left sidebar
-- 3. Click the "Import" tab at the top
-- 4. Click "Choose File" and select this file (sole_purpose_upgrade.sql)
-- 5. Click "Go" at the bottom
-- That's it! The tables will be created and products will be inserted.
-- =====================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- Table structure for table `products`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `gender` enum('men','women','unisex') NOT NULL DEFAULT 'unisex',
  `category` varchar(50) NOT NULL,
  `comfort_tag` varchar(100) DEFAULT NULL,
  `brand_type` enum('Local','Premium') NOT NULL DEFAULT 'Local',
  `available_sizes` varchar(100) NOT NULL DEFAULT '6,7,8,9,10,11',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `wishlist_items`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `wishlist_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_wishlist` (`user_id`, `product_id`),
  KEY `fk_wishlist_user` (`user_id`),
  KEY `fk_wishlist_product` (`product_id`),
  CONSTRAINT `fk_wishlist_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`sno`) ON DELETE CASCADE,
  CONSTRAINT `fk_wishlist_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `cart_items`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL DEFAULT '8',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_cart_user` (`user_id`),
  KEY `fk_cart_product` (`product_id`),
  CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`sno`) ON DELETE CASCADE,
  CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Inserting product data (migrated from static PHP files)
-- --------------------------------------------------------

-- ===== MEN'S LOAFERS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('The Weekend Loafer', 'A comfortable slip-on made from recycled vegan suede with a natural cork insole.', 4999.00, 'images/TWL(men).jpg', 'men', 'loafers', 'Comfort', 'Local', '6,7,8,9,10,11'),
('The Classic Loafer', 'A timeless black loafer crafted from apple leather with a durable recycled rubber sole.', 5499.00, 'images/TCL(men).jpg', 'men', 'loafers', 'Comfort', 'Local', '6,7,8,9,10,11');

-- ===== MEN'S DRESS SHOES =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('The Oxford Classic', 'A sleek brown Oxford made from pineapple leaf fiber (Piñatex) for a sustainable finish.', 7999.00, 'images/TOC(men).jpg', 'men', 'dress', 'Comfort', 'Local', '6,7,8,9,10,11');

-- ===== MEN'S BOOTS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('The All-Weather Boot', 'A waterproof boot made with recycled plastics and a sole of natural rubber.', 9999.00, 'images/boots(unisex).jpg', 'men', 'boots', 'Comfort', 'Local', '6,7,8,9,10,11');

-- ===== MEN'S SLIDES =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('The Recycled Slide', 'A cushioned slide with a strap made from recycled materials and a bio-foam sole.', 2499.00, 'images/slides(unisex).jpg', 'men', 'slides', 'Comfort', 'Local', '6,7,8,9,10,11');

-- ===== WOMEN'S LOAFERS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('The Weekend Loafer', 'A comfortable slip-on made from recycled vegan suede with a natural cork insole.', 4999.00, 'images/TWL(Women).jpg', 'women', 'loafers', 'Comfort', 'Local', '4,5,6,7,8,9'),
('The Classic Loafer', 'A timeless black loafer crafted from apple leather with a durable recycled rubber sole.', 5499.00, 'images/TCL(women).jpg', 'women', 'loafers', 'Comfort', 'Local', '4,5,6,7,8,9');

-- ===== WOMEN'S HEELS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('The Merlot Pointed Heel', 'A chic pointed-toe heel in a rich merlot hue, made from recycled vegan leather and featuring a delicate bow detail.', 7999.00, 'images/heels.jpg', 'women', 'heels', 'Comfort', 'Local', '4,5,6,7,8,9');

-- ===== WOMEN'S BOOTS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('The All-Weather Boot', 'A waterproof boot made with recycled plastics and a sole of natural rubber.', 9999.00, 'images/boots(unisex).jpg', 'women', 'boots', 'Comfort', 'Local', '4,5,6,7,8,9');

-- ===== WOMEN'S SLIDES =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('The Recycled Slide', 'A cushioned slide with a strap made from recycled materials and a bio-foam sole.', 2499.00, 'images/slides(unisex).jpg', 'women', 'slides', 'Comfort', 'Local', '4,5,6,7,8,9');

-- ===== ACCESSORIES - SHOE CARE =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Sneakare Quick Shoe Cleaning Kit', 'An easy-to-use foam cleaner and brush for removing dirt and stains from all types of shoes.', 299.00, 'images/shoe_clean.jpg', 'unisex', 'shoe-care', NULL, 'Local', 'One Size'),
('Shoegr Instant Shoe Cleaning Kit', 'A quick and effective solution for cleaning sneakers and casual shoes on the go.', 305.00, 'images/shoe_clean2.jpg', 'unisex', 'shoe-care', NULL, 'Local', 'One Size'),
('Cherry Blossom Black Wax Shoe Polish', 'The classic wax polish to nourish, protect, and add a brilliant shine to your leather shoes.', 75.00, 'images/shoe_clean3.jpg', 'unisex', 'shoe-care', NULL, 'Premium', 'One Size');

-- ===== ACCESSORIES - INSOLES =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Fovera Gel Shoe Inserts', 'Premium massaging gel insoles with arch support for all-day comfort and shock absorption.', 342.00, 'images/insoles1.jpg', 'unisex', 'insoles', 'Arch Support', 'Local', '6,7,8,9,10,11'),
('Purastep 4 Layers 9 cm Height Increasing Shoes Insoles', 'Adjustable and comfortable shoe lifts with an air cushion for a discreet height increase.', 349.00, 'images/insoles2.jpg', 'unisex', 'insoles', NULL, 'Local', '6,7,8,9,10,11');

-- ===== ACCESSORIES - LACES =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('30 Colors Flat Sneaker Shoelaces', 'A wide variety of colors to perfectly match or contrast with any pair of sneakers.', 329.00, 'images/laces1.jpg', 'unisex', 'laces', NULL, 'Local', 'One Size'),
('Shoeshine Flat Shoelace (2 Pair)', 'Hollow, thick, and durable white laces perfect for casual shoes and sneakers.', 149.00, 'images/laces2.jpg', 'unisex', 'laces', NULL, 'Local', 'One Size');

-- ===== ACCESSORIES - SOCKS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('SJeware Unisex Solid Ankle Length Socks', 'A versatile pack of soft, breathable ankle socks perfect for everyday use and athletic activities.', 117.00, 'images/socks1.jpg', 'unisex', 'socks', 'Comfort', 'Local', 'One Size'),
('Jockey Compact Cotton Terry Crew Length Socks', 'Plush terry cotton provides superior cushioning and comfort in a classic crew length.', 249.00, 'images/socks2.jpg', 'unisex', 'socks', 'Comfort', 'Premium', 'One Size');

-- ===== ACCESSORIES - BUNION CORRECTORS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Bunion Relief Foot Brace Splint', 'An adjustable toe straightener that provides gentle pressure to realign the big toe.', 199.00, 'images/bunion_1.jpg', 'unisex', 'bunion-correctors', 'Orthopedic', 'Local', 'One Size'),
('Frido Orthotics Bunion Corrector', 'Features toe alignment and a gel cushion for universal fit and foot support.', 499.00, 'images/bunion_2.jpg', 'unisex', 'bunion-correctors', 'Orthopedic', 'Local', 'One Size'),
('Adjustable Knob Bunion Corrector', 'A bunion fixer with an adjustable knob for precise control over the correction angle.', 599.00, 'images/bunion_3.jpg', 'unisex', 'bunion-correctors', 'Orthopedic', 'Local', 'One Size');

-- ===== ACCESSORIES - TOE SEPARATORS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('YOGAMEDIC Silicone Toe Separators', 'An orthopedic bunion corrector and toe spreader for fast pain relief and toe alignment.', 185.00, 'images/toe1.jpg', 'unisex', 'toe-separators', 'Orthopedic', 'Local', 'One Size'),
('Toe Separators By Envelop', 'Durable silicone spacers that support and comfort toes while improving circulation.', 299.00, 'images/toe2.jpg', 'unisex', 'toe-separators', 'Orthopedic', 'Local', 'One Size');

-- ===== ACCESSORIES - ARCH CUSHIONS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Wonderwin Arch Support Sleeves (3 Pairs)', 'Compression cushioned sleeves for plantar fasciitis relief and arch support.', 399.00, 'images/archcushions_1.jpg', 'unisex', 'arch-cushions', 'Arch Support', 'Local', 'One Size'),
('Dr. Frederick''s Original Arch Support Gel Pads', 'Peel and stick gel pads that provide targeted cushioning for high arches directly in your shoes.', 299.00, 'images/archcushions_2.jpg', 'unisex', 'arch-cushions', 'Arch Support', 'Premium', 'One Size');

-- ===== ACCESSORIES - HEEL PADS =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Fovera Heel Cup Sleeve with Gel Padding', 'Provides gel padding for plantar fasciitis and heel pain relief, absorbing shock as you walk.', 449.00, 'images/heel_pad.jpg', 'unisex', 'heel-pads', 'Heel Pain', 'Local', 'One Size'),
('Welnove 2PCS Heel Protectors', 'Heel support pads that cushion and protect from heel pain and plantar fasciitis.', 3113.00, 'images/heel_pad2.jpg', 'unisex', 'heel-pads', 'Heel Pain', 'Premium', 'One Size');

-- ===== CONDITIONS - ORTHOPEDIC MEN =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('HEALTH FIT Orthopedic & Diabetic Shoes', 'Breathable Soft Sole Ultra-Lightweight Shoes for Men''s 1731', 1999.00, 'images/diabetic.jpg', 'men', 'orthopedic', 'Orthopedic', 'Local', '6,7,8,9,10,11'),
('Dr. Ortho Men''s Flexi Ease Orthopedic Shoes', 'Comfortable and stylish support for everyday wear.', 2499.00, 'images/orthopedic.jpg', 'men', 'orthopedic', 'Orthopedic', 'Local', '6,7,8,9,10,11'),
('HEALTH FIT Men''s Super Comfortable Shoe', 'Breathable Soft Sole Ultra-Lightweight design for all-day ease.', 1850.00, 'images/comfort(men).jpg', 'men', 'orthopedic', 'Orthopedic', 'Local', '6,7,8,9,10,11');

-- ===== CONDITIONS - ORTHOPEDIC WOMEN =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Dr. Ortho Women''s Flexi Ease Walking Sports Shoes', 'Stylish and supportive footwear designed for active comfort.', 2249.00, 'images/orthopedic(wom).jpg', 'women', 'orthopedic', 'Orthopedic', 'Local', '4,5,6,7,8,9'),
('Campus Women Annie Casual Shoes Sock-like Fit', 'Lightweight and flexible with a snug, comfortable fit for daily wear.', 1599.00, 'images/orthopedic(wom2).jpg', 'women', 'orthopedic', 'Orthopedic', 'Local', '4,5,6,7,8,9');

-- ===== CONDITIONS - HEEL PAIN MEN =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('HOKA Men''s Mach 6 Shoes', 'Engineered for a lightweight feel with responsive cushioning for high-performance comfort.', 1769.00, 'images/heel_pain(men).jpg', 'men', 'heel-pain', 'Heel Pain', 'Premium', '6,7,8,9,10,11'),
('ASICS Men Gel-Nimbus 26 Running Shoes', 'Features PureGEL technology for enhanced shock absorption and a softer landing.', 1599.00, 'images/heel_pain2(men).jpg', 'men', 'heel-pain', 'Heel Pain', 'Premium', '6,7,8,9,10,11'),
('Brooks Adrenaline GTS 22 Running Shoes', 'Offers a perfect balance of soft cushioning and reliable support for a smooth ride.', 1249.00, 'images/heel_pain3(men).jpg', 'men', 'heel-pain', 'Heel Pain', 'Premium', '6,7,8,9,10,11');

-- ===== CONDITIONS - HEEL PAIN WOMEN =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Skechers Women''s ARCH FIT Pink Multi Casual Sneakers', 'Features podiatrist-certified arch support for maximum comfort and stability.', 4249.00, 'images/heel_pain(wom).jpg', 'women', 'heel-pain', 'Heel Pain', 'Premium', '4,5,6,7,8,9'),
('New Balance Women''s 880 Running Shoes', 'A reliable daily trainer with soft Fresh Foam cushioning for a comfortable run.', 6369.00, 'images/heel_pain2(wom).jpg', 'women', 'heel-pain', 'Heel Pain', 'Premium', '4,5,6,7,8,9');

-- ===== CONDITIONS - ARCH SUPPORT MEN =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Skechers Men ARCH FIT 2.0 - VALLO', 'Features a patented Arch Fit insole system with podiatrist-certified arch support.', 2939.00, 'images/arch_sup_men_1.jpg', 'men', 'arch-support', 'Arch Support', 'Premium', '6,7,8,9,10,11'),
('Hoka S Transport', 'Combines city-ready style with Hoka''s signature cushioning and supportive structure.', 20999.00, 'images/arch_sup_men_2.jpg', 'men', 'arch-support', 'Arch Support', 'Premium', '6,7,8,9,10,11'),
('Nike Men''s Motiva Walking Shoes', 'Designed with a unique rocker shape to help you move smoothly and comfortably.', 9207.00, 'images/arch_sup_men_3.jpg', 'men', 'arch-support', 'Arch Support', 'Premium', '6,7,8,9,10,11');

-- ===== CONDITIONS - ARCH SUPPORT WOMEN =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('HOKA Bondi 8 Running Shoes', 'Maximum cushioning for ultimate comfort on long walks or runs.', 14999.00, 'images/arch_sup_wo_1.jpg', 'women', 'arch-support', 'Arch Support', 'Premium', '4,5,6,7,8,9'),
('Brooks Womens Addiction Walker 2 Shoe', 'Provides sturdy support and slip-resistant traction for comfortable walking.', 9999.00, 'images/arch_sup_wo_2.jpg', 'women', 'arch-support', 'Arch Support', 'Premium', '4,5,6,7,8,9'),
('New Balance Women 880 Running Shoes', 'A dependable and soft shoe designed for everyday performance.', 6369.00, 'images/arch_sup_wo_3.jpg.png', 'women', 'arch-support', 'Arch Support', 'Premium', '4,5,6,7,8,9');

-- ===== CONDITIONS - FLAT FEET MEN =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Men Brooks Adrenaline GTS 23 Road Running Shoes', 'A popular stability shoe known for its GuideRails support system that aids alignment.', 13499.00, 'images/flat_f(men).jpg', 'men', 'flat-feet', 'Flat Feet', 'Premium', '6,7,8,9,10,11'),
('Asics Men''s GT-2000 13 Black Running Shoes', 'A reliable choice for runners needing extra stability and arch support for overpronation.', 12999.00, 'images/flat_f(men2).jpg', 'men', 'flat-feet', 'Flat Feet', 'Premium', '6,7,8,9,10,11');

-- ===== CONDITIONS - FLAT FEET WOMEN =====
INSERT INTO `products` (`title`, `description`, `price`, `image_url`, `gender`, `category`, `comfort_tag`, `brand_type`, `available_sizes`) VALUES
('Vionic Women''s 23Walk Classic Sneaker', 'Designed with podiatrist-developed technology for excellent stability and arch support.', 16598.00, 'images/flat_f(wom).jpg', 'women', 'flat-feet', 'Flat Feet', 'Premium', '4,5,6,7,8,9'),
('Brooks Addiction Walker 2', 'A certified diabetic shoe that provides maximum support for low arches and overpronation.', 10999.00, 'images/flat_f(wom2).jpg', 'women', 'flat-feet', 'Flat Feet', 'Premium', '4,5,6,7,8,9');

COMMIT;
