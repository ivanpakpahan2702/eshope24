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
  `status_transaction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cart_items_tbl_products_tbl` (`product_id`),
  KEY `FK_cart_items_tbl_users_tbl` (`user_id`),
  CONSTRAINT `FK_cart_items_tbl_products_tbl` FOREIGN KEY (`product_id`) REFERENCES `products_tbl` (`id`),
  CONSTRAINT `FK_cart_items_tbl_users_tbl` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.cart_items_tbl: ~3 rows (approximately)
/*!40000 ALTER TABLE `cart_items_tbl` DISABLE KEYS */;
INSERT INTO `cart_items_tbl` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`, `status_transaction`) VALUES
	(1, 3, 1, '2024-12-21 19:37:32', '2024-12-21 19:37:32', NULL),
	(2, 1, 1, '2024-12-21 19:50:54', '2024-12-21 19:50:54', NULL),
	(3, 2, 1, '2024-12-21 19:51:03', '2024-12-21 19:51:03', NULL),
	(4, 2, 1, '2024-12-21 19:56:28', '2024-12-21 19:56:28', NULL);
/*!40000 ALTER TABLE `cart_items_tbl` ENABLE KEYS */;

-- Dumping structure for table eshope24.checkouts_tbl
CREATE TABLE IF NOT EXISTS `checkouts_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.checkouts_tbl: ~0 rows (approximately)
/*!40000 ALTER TABLE `checkouts_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkouts_tbl` ENABLE KEYS */;

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
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.users_tbl: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
INSERT INTO `users_tbl` (`id`, `username`, `password`, `name`, `address`, `email`) VALUES
	(1, 'ivan', '123', 'Ivan', 'Bengkulu', 'ivanpakpahan@mail.com');
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table eshope24.wishlist_items_tbl: ~1 rows (approximately)
/*!40000 ALTER TABLE `wishlist_items_tbl` DISABLE KEYS */;
INSERT INTO `wishlist_items_tbl` (`id`, `product_id`, `created_at`, `updated_at`, `user_id`) VALUES
	(46, 3, '2024-12-21 19:37:16', '2024-12-21 19:37:16', 1);
/*!40000 ALTER TABLE `wishlist_items_tbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
