-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for eshope24
CREATE DATABASE IF NOT EXISTS `eshope24` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `eshope24`;

-- Dumping structure for table eshope24.cart_items_tbl
CREATE TABLE IF NOT EXISTS `cart_items_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cart_items_tbl_products_tbl` (`product_id`),
  KEY `FK_cart_items_tbl_users_tbl` (`user_id`),
  KEY `FK_cart_items_tbl_orders_tbl` (`order_id`),
  CONSTRAINT `FK_cart_items_tbl_orders_tbl` FOREIGN KEY (`order_id`) REFERENCES `orders_tbl` (`id`),
  CONSTRAINT `FK_cart_items_tbl_products_tbl` FOREIGN KEY (`product_id`) REFERENCES `products_tbl` (`id`),
  CONSTRAINT `FK_cart_items_tbl_users_tbl` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.cart_items_tbl: ~30 rows (approximately)
/*!40000 ALTER TABLE `cart_items_tbl` DISABLE KEYS */;
INSERT INTO `cart_items_tbl` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`, `order_id`) VALUES
	(31, 2, 1, '2024-12-22 19:47:11', '2024-12-22 19:47:11', NULL),
	(34, 1, 13, '2024-12-24 22:00:35', '2024-12-26 21:52:07', '1198932476'),
	(35, 1, 13, '2024-12-24 22:08:36', '2024-12-26 21:52:07', '1198932476'),
	(39, 2, 13, '2024-12-24 22:14:26', '2024-12-26 21:52:07', '1198932476'),
	(55, 1, 36, '2024-12-24 22:16:42', '2024-12-24 22:16:42', NULL),
	(73, 1, 36, '2024-12-24 22:20:22', '2024-12-24 22:20:22', NULL),
	(74, 1, 36, '2024-12-24 22:20:25', '2024-12-24 22:20:25', NULL),
	(75, 1, 36, '2024-12-24 22:20:26', '2024-12-24 22:20:26', NULL),
	(76, 1, 36, '2024-12-24 22:20:26', '2024-12-24 22:20:26', NULL),
	(77, 1, 36, '2024-12-24 22:20:26', '2024-12-24 22:20:26', NULL),
	(78, 1, 36, '2024-12-24 22:20:26', '2024-12-24 22:20:26', NULL),
	(79, 1, 36, '2024-12-24 22:20:28', '2024-12-24 22:20:28', NULL),
	(80, 1, 36, '2024-12-24 22:20:28', '2024-12-24 22:20:28', NULL),
	(81, 1, 36, '2024-12-24 22:22:22', '2024-12-24 22:22:22', NULL),
	(82, 1, 36, '2024-12-24 22:22:23', '2024-12-24 22:22:23', NULL),
	(83, 1, 36, '2024-12-24 22:22:24', '2024-12-24 22:22:24', NULL),
	(84, 1, 36, '2024-12-24 22:22:25', '2024-12-24 22:22:25', NULL),
	(85, 1, 36, '2024-12-24 22:22:26', '2024-12-24 22:22:26', NULL),
	(86, 1, 36, '2024-12-24 22:22:27', '2024-12-24 22:22:27', NULL),
	(87, 1, 36, '2024-12-24 22:22:27', '2024-12-24 22:22:27', NULL),
	(88, 1, 36, '2024-12-24 22:25:32', '2024-12-24 22:25:32', NULL),
	(94, 1, 36, '2024-12-24 22:36:18', '2024-12-24 22:36:18', NULL),
	(101, 2, 13, '2024-12-26 18:41:34', '2024-12-26 21:52:07', '1198932476'),
	(104, 1, 38, '2024-12-26 20:58:25', '2024-12-26 22:06:38', '2130428572'),
	(105, 1, 38, '2024-12-26 20:58:32', '2024-12-26 22:06:38', '2130428572'),
	(106, 3, 38, '2024-12-26 20:58:37', '2024-12-26 22:06:38', '2130428572'),
	(107, 2, 13, '2024-12-26 21:46:15', '2024-12-26 21:52:07', '1198932476'),
	(108, 1, 38, '2024-12-26 22:04:23', '2024-12-26 22:06:38', '2130428572'),
	(109, 2, 38, '2024-12-26 22:04:32', '2024-12-26 22:06:38', '2130428572'),
	(110, 1, 38, '2024-12-26 22:06:22', '2024-12-26 22:06:38', '2130428572'),
	(111, 1, 39, '2024-12-27 10:38:28', '2024-12-27 13:17:01', '302831837'),
	(112, 2, 39, '2024-12-27 10:38:31', '2024-12-27 13:17:01', '302831837'),
	(113, 1, 39, '2024-12-27 11:07:55', '2024-12-27 13:17:01', '302831837'),
	(114, 1, 39, '2024-12-27 11:08:57', '2024-12-27 13:17:01', '302831837'),
	(115, 2, 39, '2024-12-27 13:16:47', '2024-12-27 13:17:01', '302831837'),
	(129, 1, 39, '2024-12-27 14:02:37', '2024-12-27 14:02:37', NULL),
	(130, 1, 13, '2024-12-27 14:08:49', '2024-12-27 14:08:49', NULL),
	(131, 1, 13, '2024-12-27 14:11:46', '2024-12-27 14:11:46', NULL);
/*!40000 ALTER TABLE `cart_items_tbl` ENABLE KEYS */;

-- Dumping structure for table eshope24.orders_tbl
CREATE TABLE IF NOT EXISTS `orders_tbl` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `token` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(500) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_checkouts_tbl_users_tbl` (`user_id`),
  CONSTRAINT `FK_checkouts_tbl_users_tbl` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.orders_tbl: ~8 rows (approximately)
/*!40000 ALTER TABLE `orders_tbl` DISABLE KEYS */;
INSERT INTO `orders_tbl` (`id`, `token`, `user_id`, `status`, `created_at`, `updated_at`, `address`, `postal_code`, `name`, `phone`, `email`) VALUES
	('1198932476', 'ecf41f91-c374-447c-9dd8-101d2aa6e58e', 13, 0, '2024-12-26 21:52:07', '2024-12-26 21:52:07', '', '', 'TestUserInvi', 'ds', 'ivanime027@gmail.com'),
	('1338880016', 'dfb9961f-9425-4d3b-9a6f-40d0a9daee71', 13, 0, '2024-12-26 21:37:20', '2024-12-26 21:37:20', '', '', 'Ivan Pakpahan', '085268018218', 'ivanpakpahanchrst@gmail.com'),
	('1342519321', '3cc8817f-5757-4062-9054-5e50f1e9807b', 13, 0, '2024-12-26 21:30:20', '2024-12-26 21:30:20', '', '', 'Ivan Pakpahan', '\r\n085268018218', 'ivanpakpahanchrst@gmail.com'),
	('1537723519', '0ef7daff-e7bc-4dc5-bf25-ccc519c5e43e', 39, 0, '2024-12-27 11:08:35', '2024-12-27 11:08:35', '', '', 'IVAN PAKPAHAN', '000888', 'ivanpakpahanchrst@gmail.com'),
	('1544825296', 'be672c49-82e8-4114-8427-a8dc97f69104', 38, 0, '2024-12-26 22:02:11', '2024-12-26 22:02:11', '', '', 'Dus', 'Dus', 'dus@mail.co'),
	('1601571473', '78bce78a-9cdd-481f-8ad3-bddc3a901bab', 38, 0, '2024-12-26 22:04:47', '2024-12-26 22:04:47', '', '', 'IVAN PAKPAHAN', '44', 'ivanpakpahanchrst@gmail.com'),
	('1772392754', '7c5f8930-0ecb-43ed-aad1-d7af23e02127', 13, 0, '2024-12-26 21:39:09', '2024-12-26 21:39:09', '', '', 'Ivan Pakpahan', '085268018218', 'ivanpakpahanchrst@gmail.com'),
	('2060832721', '69802320-0c74-4c72-a8b8-493fcfeb138d', 39, 0, '2024-12-27 11:09:08', '2024-12-27 11:09:08', '', '', 'IVAN PAKPAHAN', '000888', 'ivanpakpahanchrst@gmail.com'),
	('2130428572', 'b246780c-78c0-4094-8ae9-a6b623e800a8', 38, 0, '2024-12-26 22:06:38', '2024-12-26 22:06:38', '', '', 'Bli', '123', 'ivanpakpahanchrst@gmail.com'),
	('302831837', 'b10b02f2-4c5f-4e18-8a9d-b64ca9a7e1c6', 39, 0, '2024-12-27 13:17:00', '2024-12-27 13:17:00', '', '', 'IVAN PAKPAHAN', '000888', 'ivanpakpahanchrst@gmail.com'),
	('557490870', '6e409cc6-de62-4f94-87a4-1809b8da3498', 39, 0, '2024-12-27 10:39:09', '2024-12-27 10:39:09', 'Bengkulu', '37656', 'IVAN PAKPAHAN', '082345334444', 'ivanpakpahanchrst@gmail.com'),
	('577274148', '3c48efda-eeb1-4756-a14b-45eba34945dd', 13, 0, '2024-12-26 21:28:44', '2024-12-26 21:28:44', '', '', 'Ivan Pakpahan', '\r\n085268018218', 'ivanpakpahanchrst@gmail.com');
/*!40000 ALTER TABLE `orders_tbl` ENABLE KEYS */;

-- Dumping structure for table eshope24.products_tbl
CREATE TABLE IF NOT EXISTS `products_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.products_tbl: ~7 rows (approximately)
/*!40000 ALTER TABLE `products_tbl` DISABLE KEYS */;
INSERT INTO `products_tbl` (`id`, `name`, `description`, `price`, `stock`, `image`, `created_at`, `update_at`) VALUES
	(1, 'Apel Merah', 'Nikmati kesegaran buah apel merah yang siap memanjakan lidah Anda! Apel merah tidak hanya lezat, tetapi juga kaya akan vitamin dan serat, bermanfaat untuk kesehatan tubuh. Dengan rasa manis yang seimbang dan tekstur renyah, apel merah adalah camilan sempurna untuk setiap kesempatan. Dapatkan manfaat antioksidan dari apel merah yang dapat meningkatkan sistem imun Anda. Segera tambahkan buah apel merah segar ke daftar belanjaan Anda dan rasakan manfaatnya setiap hari!', 10000, 5, 'apel1.jpg', '2024-12-18 20:36:35', '2024-12-18 20:36:36'),
	(2, 'Apel Hijau', 'Nikmati kesegaran apel hijau yang juara! Setiap gigitan buah ini memberikan rasa renyah yang menyegarkan serta kandungan vitamin C yang tinggi untuk membantu menjaga kesehatan Anda. Apel hijau juga kaya serat, sehingga dapat mendukung sistem pencernaan yang optimal. Dengan rasa yang sedikit asam dan manis, apel hijau cocok dijadikan camilan sehat atau tambahan dalam sajian salad. Segera dapatkan apel hijau segar kita dan rasakan manfaat serta kelezatannya setiap hari!', 15000, 10, 'apel-hijau1.jpg', '2024-12-18 20:38:00', '2024-12-18 20:38:01'),
	(3, 'Jambu Biji Merah', 'Rasakan kesegaran luar biasa dari buah jambu biji merah! Dengan daging buah yang manis dan aroma yang menggoda, jambu biji merah bukan hanya lezat tetapi juga kaya akan vitamin C dan serat. Cocok sebagai camilan sehat, jus segar, atau tambahan dalam salad buah, jambu biji merah memberikan manfaat kesehatan yang tidak terhitung. Segera nikmati jambu biji merah yang segar dan rasakan perbedaannya! Dapatkan sekarang dan bawa pulang kelezatan alami yang penuh nutrisi ini!', 12000, 7, 'jambu1.jpg', '2024-12-18 20:42:20', '2024-12-18 20:42:22'),
	(4, 'Mangga', 'Buah mangga segar memiliki kulit yang berwarna kuning, hijau, atau merah, tergantung pada varietasnya. Daging buahnya yang juicy dan manis sering kali menggoda selera, terutama saat dimakan langsung. Aroma harum yang khas dari mangga membuatnya menjadi buah yang sangat disukai banyak orang. Tekstur daging buahnya yang lembut dan sedikit berserat memberikan sensasi yang menyenangkan saat dikunyah. Selain lezat, mangga juga kaya akan vitamin A dan C, menjadikannya pilihan yang sehat dan bergizi.', 30000, 10, 'mangga1.jpg', '2024-12-18 20:43:46', '2024-12-18 20:43:47'),
	(5, 'Pisang', 'Buah pisang adalah buah yang populer dan mudah ditemukan di berbagai belahan dunia. Rasanya yang manis dan teksturnya yang lembut menjadikannya camilan yang menyenangkan. Pisang juga kaya akan nutrisi, seperti potassium dan vitamin C, yang baik untuk kesehatan. Selain dimakan langsung, pisang sering digunakan dalam berbagai olahan, seperti smoothie, kue, dan pancake. Dengan bentuknya yang praktis, pisang bisa dibawa ke mana saja sebagai sumber energi instan yang sehat.', 5000, 50, 'pisang1.jpg', '2024-12-18 20:44:49', '2024-12-18 20:44:50'),
	(6, 'Semangka', 'Buah semangka memiliki kulit yang tebal dan berwarna hijau dengan pola garis-garis yang khas. Daging buahnya berwarna merah atau kuning cerah, sangat juicy, dan kaya akan air, membuatnya menjadi pilihan yang menyegarkan di hari yang panas. Selain rasanya yang manis, semangka juga mengandung vitamin C dan A, serta lycopene, yang bermanfaat bagi kesehatan. Teksturnya yang renyah dan segar membuat semangka mudah dinikmati, baik dimakan langsung maupun sebagai bahan campuran dalam salad atau smoothie. Buah ini biasanya berukuran besar, dan sering kali menjadi buah favorit di berbagai acara, seperti piknik dan pesta musim panas.', 20000, 10, 'semangka1.jpg', '2024-12-18 20:46:02', '2024-12-18 20:46:03'),
	(7, 'Strawberry', 'Buah strawberry segar memiliki bentuk yang khas, dengan kulit berwarna merah cerah yang dihiasi dengan biji kecil berwarna kuning di permukaannya. Saat digigit, daging buahnya yang lembut dan juicy memberikan sensasi manis dan sedikit asam yang menyegarkan. Aroma khasnya yang harum juga menggugah selera dan menambah daya tarik buah ini. Strawberry kaya akan vitamin C dan antioksidan, menjadikannya pilihan sehat untuk dinikmati kapan saja. Cocok dimakan langsung, digunakan dalam salad, atau dijadikan bahan tambahan dalam berbagai dessert, strawberry selalu menjadi favorit banyak orang.', 14000, 20, 'strawberry1.jpg', '2024-12-18 20:47:09', '2024-12-18 20:47:09');
/*!40000 ALTER TABLE `products_tbl` ENABLE KEYS */;

-- Dumping structure for table eshope24.users_tbl
CREATE TABLE IF NOT EXISTS `users_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.users_tbl: ~7 rows (approximately)
/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
INSERT INTO `users_tbl` (`id`, `username`, `password`, `name`, `address`, `email`) VALUES
	(1, 'ivan', '123', 'Ivan', 'Bengkulu', 'ivanpakpahan@mail.com'),
	(11, 'raka', '$2y$10$IYmOpe4GsstXgbaxpIMc4uDwUNhby2ogq2k7ISIAGS219u6ja3ccm', 'raka', NULL, NULL),
	(13, 'user', '$2y$10$dmzD2JRcs8IbEsXiwsseA.tUbDOVPgle01utA4dkwoa.khhaLqQuy', 'user', NULL, NULL),
	(35, 'sun', '$2y$10$Zl/gptfwlMlOZuGFjvyhuOWh1Q0BsxrdNVeiZSaUN.weajB5xh2gy', 'Sun', NULL, NULL),
	(36, 'navi', '$2y$10$Zd6BWE4hgQ2YNcUGuQub2eOwWjUhMfTQuNYvkGJ70R86dbir38Us2', 'navi', NULL, NULL),
	(37, 'van', '$2y$10$2nKmkPExj5wHXDjuVMo6.euj5F9O8micceoeFImEqAwKa6gsH8XUO', 'van', NULL, NULL),
	(38, 'bill', '$2y$10$K9VOVB36afWk8PKSO7OseOK39T1uc2y2lLj1WnFG80CJaNfupeGJK', 'bill', NULL, NULL),
	(39, 'bil', '$2y$10$jwhqvGaVWRed1BQF52BVyeIXkGWsbE/llUj488o8ksn5C5VTxH8be', 'bil', NULL, NULL);
/*!40000 ALTER TABLE `users_tbl` ENABLE KEYS */;

-- Dumping structure for table eshope24.wishlist_items_tbl
CREATE TABLE IF NOT EXISTS `wishlist_items_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__products_tbl` (`product_id`),
  KEY `FK_wishlist_items_tbl_users_tbl` (`user_id`),
  CONSTRAINT `FK__products_tbl` FOREIGN KEY (`product_id`) REFERENCES `products_tbl` (`id`),
  CONSTRAINT `FK_wishlist_items_tbl_users_tbl` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.wishlist_items_tbl: ~8 rows (approximately)
/*!40000 ALTER TABLE `wishlist_items_tbl` DISABLE KEYS */;
INSERT INTO `wishlist_items_tbl` (`id`, `product_id`, `created_at`, `updated_at`, `user_id`) VALUES
	(47, 1, '2024-12-24 13:51:46', '2024-12-24 13:51:46', 1),
	(59, 1, '2024-12-24 18:47:49', '2024-12-24 18:47:49', 36),
	(67, 6, '2024-12-24 20:54:23', '2024-12-24 20:54:23', 36),
	(68, 5, '2024-12-24 20:57:49', '2024-12-24 20:57:49', 36),
	(69, 3, '2024-12-24 20:59:30', '2024-12-24 20:59:30', 36),
	(74, 1, '2024-12-26 17:32:27', '2024-12-26 17:32:27', 13),
	(76, 7, '2024-12-26 17:33:09', '2024-12-26 17:33:09', 13),
	(77, 4, '2024-12-26 17:33:12', '2024-12-26 17:33:12', 13),
	(78, 2, '2024-12-27 13:56:31', '2024-12-27 13:56:31', 13),
	(79, 1, '2024-12-27 14:01:55', '2024-12-27 14:01:55', 39),
	(80, 2, '2024-12-27 14:01:56', '2024-12-27 14:01:56', 39),
	(81, 3, '2024-12-27 14:01:58', '2024-12-27 14:01:58', 39);
/*!40000 ALTER TABLE `wishlist_items_tbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
