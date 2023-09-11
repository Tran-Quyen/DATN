-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 10:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Logitech', 'lg', 0, NULL, '2023-02-27 04:56:39', '2023-03-02 08:12:27', 2),
(2, 'DELL', 'dell', 0, NULL, '2023-02-27 05:04:51', '2023-03-02 08:12:17', 3),
(3, 'HP', 'hp', 0, NULL, '2023-02-27 05:05:01', '2023-03-02 08:11:59', 3),
(4, 'Asus', 'asus', 0, NULL, '2023-02-27 05:05:16', '2023-03-02 08:12:38', 3),
(5, 'Logitech', 'lg', 0, NULL, '2023-03-02 08:20:19', '2023-03-02 08:20:19', 4),
(6, 'Asus', 'asus', 0, NULL, '2023-03-02 08:20:44', '2023-03-07 09:45:52', 6),
(7, 'Akko', 'akko', 0, NULL, '2023-03-02 09:35:23', '2023-03-02 09:35:23', 2),
(8, 'NVIDIA', 'nvidia', 0, NULL, '2023-03-07 09:24:43', '2023-03-07 09:24:43', 6),
(9, 'SteelSeries', 'steelseries', 0, NULL, '2023-03-07 09:25:12', '2023-03-07 09:25:12', 4),
(10, 'Gigabyte', 'gigabyte', 0, NULL, '2023-03-07 09:48:13', '2023-03-07 09:48:13', 6);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(47, 3, 22, 1, '2023-03-14 01:31:06', '2023-03-14 01:31:06'),
(48, 3, 23, 3, '2023-03-14 01:31:12', '2023-03-14 01:31:12'),
(49, 3, 24, 1, '2023-03-14 01:31:17', '2023-03-14 01:31:17'),
(50, 3, 25, 1, '2023-03-14 01:31:23', '2023-03-14 01:31:23'),
(62, 2, 3, 1, '2023-04-02 15:13:14', '2023-04-02 15:13:14'),
(63, 2, 16, 4, '2023-04-02 18:08:39', '2023-04-02 18:08:43'),
(85, 6, 4, 1, '2023-05-08 22:52:53', '2023-05-08 22:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Keyboard', 'keyboard', 'This is Keyboard', '1677702560.jpg', 'Keyboard', 'Keyboard', 'This is Keyboard', 0, '2023-02-27 00:03:54', '2023-03-01 13:29:20', NULL),
(3, 'Laptop', 'laptop', 'This is Laptop', '1677702512.png', 'Laptop', 'Laptop', 'This is Laptop', 0, '2023-02-27 00:09:26', '2023-03-01 13:28:32', NULL),
(4, 'Mouse', 'mouse', 'This is Mouse', '1677702575.jpg', 'Mouse', 'Mouse', 'This is Mouse', 0, '2023-02-27 00:15:54', '2023-03-01 13:29:35', NULL),
(5, 'CPU', 'cpu', 'This is CPU', NULL, 'CPU', 'CPU', 'This is CPU', 1, '2023-02-27 00:16:51', '2023-03-01 13:23:15', NULL),
(6, 'VGA', 'vga', 'This is VGA', '1677702399.jpg', 'VGA', 'VGA', 'This is VGA', 0, '2023-02-27 00:17:07', '2023-03-01 13:26:39', NULL),
(7, 'aaa', 'aaaa', 'aaa', NULL, 'aaaa', 'aaa', 'aaa', 1, '2023-03-22 03:13:26', '2023-03-22 03:13:31', '2023-03-22 03:13:31'),
(8, 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', NULL, 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', 0, '2023-03-22 08:01:06', '2023-03-22 08:01:13', '2023-03-22 08:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_26_154300_add_details_to_users_table', 2),
(7, '2023_02_26_174458_create_categories_table', 3),
(8, '2023_02_27_084125_add_soft_deletes_to_categories_table', 4),
(9, '2023_02_27_093257_create_brands_table', 5),
(10, '2023_02_27_154555_create_products_table', 6),
(11, '2023_02_27_155600_create_product_images_table', 6),
(12, '2023_02_28_055322_add_soft_deletes_to_products_table', 7),
(14, '2023_03_01_105150_create_sliders_table', 8),
(15, '2023_03_02_145140_add_category_id_to_brands_table', 9),
(16, '2023_03_02_205015_create_wishlists_table', 10),
(18, '2023_03_05_060015_create_carts_table', 11),
(20, '2023_03_05_172113_create_orders_table', 12),
(21, '2023_03_05_172528_create_order_items_table', 12),
(23, '2023_03_22_000836_create_settings_table', 13),
(24, '2023_04_02_103710_create_user_details_table', 14),
(25, '2023_04_03_003103_create_jobs_table', 15),
(26, '2023_05_07_175546_add_total_to_orders_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`, `total`) VALUES
(1, 2, 'LC-DoPwjRYA5b', 'Admin', 'admin1@gmail.com', '1111111111', '500000', 'shesssssssh', 'completed', 'COD', NULL, '2023-01-05 12:27:20', '2023-03-05 12:27:20', 600),
(2, 2, 'LC-F93PHIm7Cd', 'Admin', 'admin1@gmail.com', '22222222222', '123123', '123123123', 'In progress', 'COD', NULL, '2023-03-05 12:30:00', '2023-03-05 12:30:00', 420),
(3, 2, 'LC-LHA3w1Jgqh', 'Admin', 'admin1@gmail.com', '11111111111', '500000', 'aaaaaaaaaaa', 'pending', 'COD', NULL, '2023-03-07 12:46:17', '2023-03-07 06:35:17', 840),
(4, 2, 'LC-0nMRUnLH0u', 'Admin', 'admin1@gmail.com', '11111111111', '111111', '11111111', 'completed', 'COD', NULL, '2023-03-05 13:00:48', '2023-03-05 13:00:48', 140),
(5, 1, 'LC-neORLXwUVn', 'dang tran quyen', 'user1@gmail.com', '10397140665', '100000', 'Emilio Mitre 281', 'completed', 'COD', NULL, '2023-03-14 01:17:38', '2023-03-14 01:17:38', 140),
(6, 2, 'LC-irGZEHcqEF', 'Admin', 'admin1@gmail.com', '0397140665', '100000', 'Viet Tri Phu Tho', 'completed', 'COD', NULL, '2023-04-02 15:09:26', '2023-04-02 15:09:26', 72),
(15, 1, 'LC-0cFvdcVDUn', 'dang tran quyen', 'user1@gmail.com', '0123456789', '111111', 'aaaaaaaaaaaa', 'completed', 'COD', NULL, '2023-05-08 12:37:56', '2023-05-08 12:37:56', 800),
(16, 1, 'LC-rWGe4WV3DD', 'dang tran quyen', 'user1@gmail.com', '0123456789', '111111', 'aaaaaaaaaaaa', 'completed', 'COD', NULL, '2023-05-08 12:38:38', '2023-05-08 12:38:38', 750),
(17, 6, 'LC-wye8wV51Sd', 'park ki cho', 'user2@gmail.com', '0397140665', '111111', 'aaaa', 'completed', 'COD', NULL, '2023-05-08 12:43:24', '2023-05-08 12:43:24', 150),
(18, 1, 'LC-FwC6dIPB7f', 'dang tran quyen', 'user1@gmail.com', '0123456789', '111111', 'aaaaaaaaaaaa', 'In progress', 'Paid by Paypal', '0XH27948NC114370M', '2023-05-09 01:19:29', '2023-05-09 01:19:29', 140);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 3, 140, '2023-03-05 12:27:20', '2023-03-05 12:27:20'),
(2, 1, 17, 1, 180, '2023-03-05 12:27:20', '2023-03-05 12:27:20'),
(3, 2, 4, 3, 140, '2023-03-05 12:30:00', '2023-03-05 12:30:00'),
(4, 3, 4, 6, 140, '2023-03-05 12:46:17', '2023-03-05 12:46:17'),
(5, 4, 4, 1, 140, '2023-03-05 13:00:48', '2023-03-05 13:00:48'),
(6, 5, 16, 1, 140, '2023-03-14 01:17:38', '2023-03-14 01:17:38'),
(7, 6, 28, 1, 72, '2023-04-02 15:09:26', '2023-04-02 15:09:26'),
(8, 7, 16, 1, 140, '2023-05-08 12:13:00', '2023-05-08 12:13:00'),
(9, 7, 27, 2, 126, '2023-05-08 12:13:00', '2023-05-08 12:13:00'),
(10, 7, 29, 2, 106, '2023-05-08 12:13:00', '2023-05-08 12:13:00'),
(11, 8, 3, 1, 150, '2023-05-08 12:16:19', '2023-05-08 12:16:19'),
(12, 8, 4, 1, 140, '2023-05-08 12:16:19', '2023-05-08 12:16:19'),
(13, 8, 16, 1, 140, '2023-05-08 12:16:19', '2023-05-08 12:16:19'),
(14, 9, 3, 1, 150, '2023-05-08 12:18:32', '2023-05-08 12:18:32'),
(15, 9, 4, 1, 140, '2023-05-08 12:18:32', '2023-05-08 12:18:32'),
(16, 9, 16, 1, 140, '2023-05-08 12:18:32', '2023-05-08 12:18:32'),
(17, 10, 18, 1, 1200, '2023-05-08 12:20:06', '2023-05-08 12:20:06'),
(18, 10, 19, 1, 800, '2023-05-08 12:20:06', '2023-05-08 12:20:06'),
(19, 11, 22, 1, 200, '2023-05-08 12:26:53', '2023-05-08 12:26:53'),
(20, 11, 23, 1, 500, '2023-05-08 12:26:53', '2023-05-08 12:26:53'),
(21, 12, 18, 1, 1200, '2023-05-08 12:31:07', '2023-05-08 12:31:07'),
(22, 12, 20, 1, 680, '2023-05-08 12:31:07', '2023-05-08 12:31:07'),
(23, 13, 18, 1, 1200, '2023-05-08 12:32:05', '2023-05-08 12:32:05'),
(24, 14, 26, 1, 118, '2023-05-08 12:32:48', '2023-05-08 12:32:48'),
(25, 15, 19, 1, 800, '2023-05-08 12:37:56', '2023-05-08 12:37:56'),
(26, 16, 22, 1, 200, '2023-05-08 12:38:38', '2023-05-08 12:38:38'),
(27, 16, 24, 1, 550, '2023-05-08 12:38:38', '2023-05-08 12:38:38'),
(28, 17, 3, 1, 150, '2023-05-08 12:43:24', '2023-05-08 12:43:24'),
(29, 18, 16, 1, 140, '2023-05-09 01:19:29', '2023-05-09 01:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=trending, 0=not trending',
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=featured,0=not-featured',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden, 0=visible',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 4, 'G Pro X Superlight Black', 'G Pro X Superlight Black', 'Logitech', 'Thông số sản phẩm\r\nChuột không dây Logitech Pro X Superlight Black\r\nPhiên bản nâng cấp của Gpro Wireless nổi tiếng\r\nTrọng lượng siêu nhẹ chỉ 63g\r\nKết nối không dây Lightspeed độ trễ cực thấp\r\nMắt cảm biến Hero 25k DPI cho hiệu năng cao và tiết kiệm pin\r\nFeet chuột lớn làm bằng chất liệu PTFE cho cảm giác di chuột mượt mà', 'Không có đối thủ\r\nLà kết quả của sự hợp tác liên tục với những chuyên gia thể thao điện tử hàng đầu, PRO X SUPERLIGHT được chế tạo với một mục đích duy nhất - tạo ra con chuột chơi game không dây PRO nhẹ nhất có thể trong khi vẫn giữ được chất lượng, tính toàn vẹn về cấu trúc và các tiêu chuẩn chuyên nghiệp mà Logitech G mang lại. Về đích sớm nhất, nhanh hơn bao giờ hết.\r\nKết cấu siêu nhẹ.\r\nKết nối LightSpeed siêu nhanh \r\nTập trung duy nhất vào việc giành chiến thắng với LIGHTSPEED, công nghệ không dây đổi mới, đẳng cấp chuyên nghiệp của chúng tôi, đem lại hiệu suất nhạy bén và khả năng kết nối mạnh mẽ.', 150, 200, 17, 1, 1, 0, 'G Pro X Superlight Black', 'G Pro X Superlight Black', 'G Pro X Superlight Black', '2023-02-27 23:38:41', '2023-05-08 12:43:24', NULL),
(4, 2, 'Logitech G913 TKL wireless', 'Logitech G913 TKL wireless', 'Logitech', NULL, NULL, 140, 200, 7, 1, 1, 0, 'Logitech G913 TKL wireless', NULL, 'Logitech G913 TKL wireless', '2023-02-28 03:19:59', '2023-05-08 12:18:32', NULL),
(15, 2, 'Logitech G715 TKL Aurora Off White Linear Wireless', 'Logitech G715 TKL Aurora Off White Linear Wireless', 'Logitech', 'Thiết kế phần tựa bàn tay hình đám mây thoải mái\r\nKết nối không dây LIGHTSPEED siêu nhạy\r\nCông nghệ Switch GX cao cấp đến từ Logitech\r\nBố cục nhỏ gọn, không có bàn phím số\r\nĐộ cao điều chỉnh được đem lại cảm giác tuyệt vời suốt cả ngày.', 'G715 TKL phối màu Off White là một trong những dòng bàn phím cơ mới nhất trong series Aurora từ Logitech. Với thiết kế bàn phím TKL nhỏ gọn, cùng các phím bấm media bố trí thông minh giúp bạn thuận lợi trong mọi nhu cầu sử dụng. Logitech G715 TKL Off White là một trong những dòng bàn phím máy tính sở hữu thiết kế nhỏ gọn dễ dàng mang đi bất kỳ đâu. Được đánh giá là một trong những dòng bàn phím TKL mang đến cho người chơi trải nghiệm gõ độc đáo cùng thiết kế nổi bật.  Để tăng thêm phần độc đáo cho mọi không gian, Logitech G715 TKL Off White được trang bị hệ thống led RGB cùng nhiều hiệu ứng chiếu sáng ấn tượng, lung linh có thể tinh chỉnh qua LIGHTSYNC. Người chơi hoàn toàn có thể đồng bộ các thiết bị như chuột máy tính, tai nghe và các thiết bị trong “Hệ sinh thái Logitech” vô cùng dễ dàng. Để tối ưu khả năng di chuyển cho mọi nhu cầu sử dụng, Logitech G715 TKL được trang bị công nghệ kết nối Bluetooth siêu nhanh, kết nối ổn định, độ trễ cực thấp tránh làm gián đoạn khi sử dụng. Đặc biệt, với công nghệ LIGHTSPEED siêu nhạy bạn sẽ có những trải nghiệm ấn tượng cùng Logitech G715.', 200, 250, 10, 0, 0, 0, 'Logitech G715 TKL Aurora Off White Linear Wireless', NULL, 'Logitech G715 TKL Aurora Off White Linear Wireless', '2023-03-02 09:00:26', '2023-03-07 16:35:29', NULL),
(16, 2, 'Bàn phím cơ AKKO 3084B Plus Black Pink (Bluetooth 5.0 / Wireless 2.4Ghz / Hotswap / Foam tiêu âm / AKKO CS Jelly sw)', 'AKKO 3084B Plus Black Pink', 'Akko', 'Model: 3084 (84 keys)\r\nLED nền RGB (6028 SMD LED) với nhiều chế độ\r\nPin 3000mah (Tiêu thụ 12ma / giờ ở chế độ không dây và không bật LED)\r\nCấu trúc Leveled-Top mount\r\nKích thước: 315x126x38 mm | Trọng lượng ~ 0.75kg\r\nKeycap PBT Double-Shot, ASA Profile\r\nLoại switch: AKKO CS Switch (Jelly Pink / Jelly Purple)\r\nKết nối: USB Type C, có thể tháo rời / Bluetooth 5.0 (tối đa 3 thiết bị)/ Wireless 2.4Ghz (1 trong 3)\r\nHỗ trợ NKRO / Multimedia / Macro / Khóa phím Win\r\nTích hợp sẵn foam tiêu âm PCB và foam đáy\r\nHotswap 5 pin TTC socket\r\nPhụ kiện: 1 sách hướng dẫn sử dụng + 1 dây USB Type-C to USB + 1 USB Receiver 2.4Ghz + 20 Keycap tặng kèm\r\nPhần mềm: AKKO Cloud (Hỗ trợ Audio Visualizer ở chế độ kết nối 2.4Ghz) có thể keymap và chỉnh LED\r\nTương thích: Windows / MacOS / Linux\r\nBàn phím AKKO khi kết nối với MacOS: (Ctrl -> Control | Windows -> Command | Alt -> Option, Mojave OS trở lên sẽ điều chỉnh được thứ tự của các phím này)', 'Các sản phẩm bàn phím AKKO B Plus (3084B Plus / PC75B Plus) vẫn sử dụng chip Beken tương tự như 3098B và 3068B trước đó tuy nhiên sẽ có các cải tiến mới với 2.4G:\r\n\r\nB Plus sẽ hỗ trợ audio visualizer ở chế độ 2.4G\r\nNgười dùng có thể tùy chỉnh thời gian nghỉ của phím khi không sử dụng cho chế độ kết nối Bluetooth / 2.4G ở phần mềm AKKO Cloud Driver\r\nNgười dùng có thể check lượng pin còn lại trong phần mềm AKKO Cloud Driver\r\nNgười dùng có thể tùy chỉnh độ nhạy phím\r\nBàn phím khi kết nối không dây sẽ ở chế độ tiết kiệm năng lượng khi người dùng tắt đèn LED nền. Chế độ này sẽ tiêu tốn 12mA / giờ (người dùng bàn phím phiên bản không phải Plus có thể update firmware mới nhất, và giữ Fn + Shift phải để vào chế độ tiết kiệm pin)', 140, 90, 0, 1, 1, 0, 'AKKO 3084 v2 RGB – Black', NULL, 'AKKO 3084B Plus Black Pink', '2023-03-02 09:07:19', '2023-05-09 01:19:29', NULL),
(17, 2, 'AKKO 3084B Plus World Tour Tokyo R2', 'AKKO 3084B Plus World Tour Tokyo R2', 'Akko', 'AKKO 3084B Plus World Tour Tokyo R2 hứa hẹn sẽ là bàn phím cơ nổi bật ở phân khúc giá trong khoảng 2 triệu Đồng nhờ những ưu điểm dưới đây\r\n\r\nKeycap PBT Dye-Subbed, OSA profile với tông màu trắng / hồng thiết kế theo chủ đề đặc trưng của Nhật Bản\r\nLayout 84 phím 75% có hàng F1 – F12 tiện dụng cho mọi loại nhu cầu sử dụng\r\n3 chế độ kết nối tùy chọn (Dây / Bluetooth 5.0 / Wireless 2.4Ghz)\r\nAKKO CS Jelly switch kết hợp cùng foam tiêu âm PCB cho trải nghiệm gõ tối ưu và êm ái\r\nCó LED RGB và hotswap cho người dùng phím cơ thích tự vọc vạch, mày mò, nghiên cứu (custom theo sở thích cá nhân)', 'Model: 3084 (84 keys)\r\nLED nền RGB (6028 SMD LED) với nhiều chế độ\r\nPin 3000mah (Tiêu thụ 12ma / giờ ở chế độ không dây và không bật LED)\r\nKích thước: 315x126x38 mm | Trọng lượng ~ 0.75kg\r\nKeycap PBT Dye-Subbed, OSA Profile\r\nLoại switch: AKKO CS Switch Jelly Pink\r\nKết nối: USB Type C, có thể tháo rời / Bluetooth 5.0 (tối đa 3 thiết bị)/ Wireless 2.4Ghz (1 trong 3). NSX khuyến cáo chỉ nên cắm USB receiver 2.4ghz vào cổng USB 2.0 để được tín hiệu không dây tốt nhất.\r\nHỗ trợ NKRO / Multimedia / Macro / Khóa phím Win\r\nTích hợp sẵn foam tiêu âm PCB và foam đáy\r\nHotswap 5 pin TTC socket (Riêng nút F1 và F2 3 pin do thiết kế gần với đầu cắm USB)\r\nPhụ kiện: 1 sách hướng dẫn sử dụng + 1 dây USB Type-C to USB + 1 USB Receiver 2.4Ghz\r\nPhần mềm: AKKO Cloud (Hỗ trợ Audio Visualizer ở chế độ kết nối 2.4Ghz) có thể keymap và chỉnh LED\r\nTương thích: Windows / MacOS / Linux\r\nBàn phím AKKO khi kết nối với MacOS: (Ctrl -> Control | Windows -> Command | Alt -> Option, Mojave OS trở lên sẽ điều chỉnh được thứ tự của các phím này)', 180, 150, 6, 0, 0, 0, 'AKKO 3084B Plus World Tour Tokyo R2', NULL, 'AKKO 3084B Plus World Tour Tokyo R2', '2023-03-02 09:08:26', '2023-03-02 11:33:43', NULL),
(18, 3, 'Laptop Asus Gaming ROG Strix G513IM-HN008W (R7 4800H/16GB RAM/512GB SSD/15.6 FHD 144hz/RTX 3060 6GB/Win11/Xám)', 'Laptop Asus Gaming ROG Strix G513IM-HN008W', 'Asus', 'Thông số sản phẩm\r\no	CPU: AMD R7 4800H\r\no	RAM: 16GB\r\no	Ổ cứng: 512GB SSD\r\no	VGA: Nvidia RTX 3060 6GB\r\no	Màn hình: 15.6 FHD 144Hz\r\no	Bàn phím: led RGB\r\no	HĐH: Win 11\r\no	Màu: Xám', 'ROG Strix series là laptop gaming esports với màn hình nhanh nhất thế giới 300Hz. Ngoài ra, ASUS cũng cung cấp tùy chọn 2K 165Hz và Full HD 60/144hz cho một số phiên bản. Năm nay, Strix SCAR được trang bị khả năng làm mát đột phá với keo tản nhiệt kim loại lỏng trên CPU.\r\nNăm nay, Strix SCAR có thân máy nhỏ gọn hơn tới 7% và được trang bị chiếu nghỉ tay soft-touch dễ chịu cùng với viên pin 90Wh và sạc type-C cung cấp đủ năng lượng cho bạn trong mọi hành trình. Ngoài ra, máy cũng hỗ trợ dải đèn LED đa màu sắc, tính năng Keystone II và khả năng thay đổi Armor Cap để người dùng thể hiện phong cách và cá tính riêng.\r\nHiệu năng mạnh mẽ\r\nHỗ trợ lên đến CPU Ryzen ™ 7  và GPU GeForce® RTX/GTX mới nhất cho tốc độ nhanh, hiệu năng mạnh mẽ và hoạt động yên tĩnh (dưới 45dB ở Chế độ Turbo)/ Với hiệu suất đáng nể này, không có tựa games nào có thể làm khó ROG Strix SCAR15. Mãy cũng hỗ trợ 2 khe RAM DDR4 3200MHz, nâng cấp lên đến 64GB và 2 khe SSD M.2 PCIe NVMe.\r\nTản nhiệt siêu khủng\r\nNhiệt độ là vấn đề quan ngại nhất với các mẫu laptop gaming. Tuy nhiên trên mẫu laptop Asus này có khả năng làm mát đột phá với keo tản nhiệt kim loại lỏng trên CPU, giúp hệ thống hoạt động mát hơn keo tản nhiệt gốm truyền thống. Hệ thống tản nhiệt nâng cấp mạnh lên đến 6 ống đồng và 4 khe tản nhiệt có kích thước lớn. Nhờ đó, ROG Strix series có thể hoạt động mạnh - mát - êm ái. Độ ồn không quá 45dB ở chế độ turbo, yên tĩnh hơn so với các sản phẩm đối thủ.\r\nChiến game tốc độ cao siêu mượt\r\nChiến game mượt mà với màn hình FHD 144Hz với Adaptive-Sync giúp triệt tiêu hiện tượng xé hình. Viền mỏng 4,5mm ở 3 cạnh giúp giảm thiểu sự phân tâm cho trải nghiệm đắm chìm.', 1200, 1300, 1, 1, 1, 0, 'Laptop Asus Gaming ROG Strix G513IM-HN008W', NULL, 'Laptop Asus Gaming ROG Strix G513IM-HN008W', '2023-03-07 09:28:18', '2023-05-08 12:32:05', NULL),
(19, 3, 'Laptop Asus VivoBook M513UA-EJ710W (R7 5700U/16GB RAM/512GB SSD/15.6 FHD/Win11/Bạc)', 'Laptop Asus VivoBook M513UA-EJ710W', 'Asus', 'Thông số sản phẩm\r\no	CPU: AMD Ryzen 7 5700U (1.8Ghz upto 4.3GHz, 16MB l3, 4MB L2)\r\no	RAM: 8GB DDR4 onboard + 8GB cắm rời\r\no	Ổ cứng: 512GB M.2 NVMe™ PCIe® 3.0 SSD (không hỗ trợ ổ 2.5)\r\no	VGA: AMD Radeon Graphics\r\no	Màn hình: 15.6 WUXGA (1920 x 1200) 16:10 , IPS, 300nits, 45% NTSC\r\no	Màu sắc: Bạc\r\no	OS: Windows 11 Home', NULL, 800, 820, 12, 0, 0, 0, 'Laptop Asus VivoBook M513UA-EJ710W', NULL, 'Laptop Asus VivoBook M513UA-EJ710W', '2023-03-07 09:30:38', '2023-05-08 12:37:56', NULL),
(20, 3, 'Laptop Asus Gaming TUF FA506ICB-HN355W (R5 4600H/8GB RAM/512GB SSD/15.6 FHD 144hz/RTX 3050 4GB/Win11/Đen)', 'Laptop Asus Gaming TUF FA506ICB-HN355W', 'Asus', 'Thông số sản phẩm\r\no	CPU: AMD R5 4600H\r\no	RAM: 8GB\r\no	Ổ cứng: 512GB SSD\r\no	VGA: NVIDIA RTX 3050 4GB\r\no	Màn hình: 15.6 FHD 144hz\r\no	Bàn phím: có đèn led\r\no	HĐH: Win 11\r\no	Màu: Đen', 'HIỆU NĂNG TUYỆT VỜI\r\nTrang bị sức mạnh để giải quyết mọi tác vụ, mẫu laptop ASUS TUF Gaming A15 mang đến hiệu năng tin cậy để chơi game, phát trực tiếp và thực hiện mọi hoạt động. CPU AMD Ryzen™ tốc độ cao có thể kích hoạt tới 16 luồng để xử lý đa nhiệm nặng. Kết hợp với GPU rời GeForce GTX/RTX™ , máy có thể đáp ứng tốc độ khung hình cao của nhiều tựa game phổ biến. Tăng tốc độ tải ứng dụng với ổ SSD NVMe PCIe® và không gian cho ổ SSD thứ hai.\r\nNHỎ GỌN, PIN LÂU\r\nMặc dù có khung máy nhỏ hơn và nhẹ hơn so với thế hệ trước, A15 có pin lớn hơn và tuổi thọ pin dài hơn. Máy được trang bị bộ xử lý AMD Ryzen™ hiệu suất sử dụng năng lượng cao và pin dung lượng 90Wh, có thể chiếu video trong 12,3 giờ. Nhẹ hơn và thời lượng pin dài hơn, bạn có thể tự do sử dụng chiếc máy này khi di chuyển như mong muốn.PIN\r\nTHIẾT KẾ THANH THOÁT VÀ ẤN TƯỢNG\r\nHai kiểu thiết kế tinh xảo giúp game thủ tự do thể hiện phong cách cá nhân của mình. Lựa chọn giữa thiết kế Fortress Gray thanh thoát ấn tượng hoặc thiết kế Bonfire Black bắt mắt với các sọc đỏ. Hoạ tiết tổ ong xung quanh đế máy thêm các sọc và tấm gia cường hình lục giác xung quanh khung máy, trong khi các đường kẻ ở phần kê tay giúp máy trông thanh thoát và gọn gàng.\r\nĐỘ BỀN BỈ ĐẠT TIÊU CHUẨN QUÂN ĐỘI\r\nĐể xứng đáng với tên gọi TUF Gaming, chiếc laptop này phải vượt qua bài thử nghiệm độ bền MIL-STD-810H. Thiết bị được thử nghiệm thả rơi, rung lắc, hoạt động trong độ ẩm và nhiệt độ khắc nghiệt để đảm bảo độ bền. Hoạt động được trong cả những điều kiện khắc nghiệt nhất, A15 dễ dàng chịu đựng được các va đập trong cuộc sống hàng ngày.', 680, 700, 21, 0, 0, 0, 'Laptop Asus Gaming TUF FA506ICB-HN355W', NULL, 'Laptop Asus Gaming TUF FA506ICB-HN355W', '2023-03-07 09:31:47', '2023-05-08 12:31:07', NULL),
(21, 3, 'Laptop Asus VivoBook A1503ZA-L1421W (i5 12500H/8GB RAM/512GB SSD/15.6 Oled/Win11/Bạc/Balo)', 'Laptop Asus VivoBook A1503ZA-L1421W', 'Asus', 'Thông số sản phẩm\r\no	CPU Intel® Core™ i5-12500H Processor (18MB cache, up to 4.5GHz)\r\no	RAM 8GB DDR4 Onboard ( còn 1 khe ram trống)\r\no	SSD 512GB M.2 NVMe™ PCIe® 3.0\r\no	VGA Intel® Iris® Xe Graphics\r\no	Màn hình 15.6Inch OLED FHD\r\no	Backlit Chiclet Keyboard\r\no	Màu: Bạc\r\no	OS Windows 11 Home SL', 'THIẾT KẾ HIỆN ĐẠI\r\nLaptop Asus mang đến hai màu bắt mắt Bạc/Xanh. Cân nặng chỉ 1.7kg, không quá nhẹ nhưng cũng không quá vất vả nếu bạn là một người bận rộn.\r\nHIỆU NĂNG KHỦNG \r\nLaptop ASUS Vivobook 15X OLED là người bạn đồng hành hàng ngày của bạn, luôn sẵn sàng đáp ứng mọi nhu cầu công việc, cho dù đó là văn phòng hay cá nhân, thuyết trình hay giải trí. Bộ vi xử lý Intel ® Core ™ thế hệ thứ 12 mới nhất được tăng cường với bộ nhớ DDR4 kênh đôi và SSD Nvme Gen 4 tốc độ cao, không công việc nào làm khó được cấu hình này.\r\nMÀN HÌNH OLED CAO CẤP\r\nMàn hình của Vivobook 15X OLED có  độ phủ màu tốt nhất trong phân khúc. Nó tái tạo màu sắc với độ chính xác cho hình ảnh cấp độ chuyên nghiệp. Màn hình OLED, do bản chất của các hợp chất phát sáng hữu cơ đặc biệt, làm giảm ánh sáng xanh có hại lên đến 70% so với màn hình LCD giảm nguy cơ tổn thương võng mạc.\r\nBÀN PHÍM CÔNG THÁI HỌC\r\nSứ mệnh của chúng tôi tại ASUS là nâng cao khả năng tương tác của con người với công nghệ lên một cấp độ cao hơn và trực quan hơn bao giờ hết. Bàn phím ASUS ErgoSense mới nhất được thiết kế để mang lại trải nghiệm nhập liệu tốt. Sự thoải mái của bạn là ưu tiên cao nhất. Trải nghiệm bàn phím ErgoSense và bạn sẽ sớm thấy thoải mái khi làm việc lâu với chiếc Vivobook 15X của mình.\r\nAN TOÀN VÀ BẢO MẬT\r\nTấm chắn webcam vật lý và mở khóa bằng một lần chạm với cảm biến vân tay tích hợp', 1190, 1200, 5, 0, 0, 0, 'Laptop Asus VivoBook A1503ZA-L1421W', NULL, 'Laptop Asus VivoBook A1503ZA-L1421W', '2023-03-07 09:32:43', '2023-03-07 17:32:51', NULL),
(22, 6, 'Asus PH GTX 1650-O4G GDDR6 (4GB GDDR6, 128-bit, DVI+HDMI+DP)', 'Asus PH GTX 1650-O4G GDDR6', 'Asus', 'Thông số sản phẩm\r\no	Phiên bản GTX 1650 Super nhỏ gọn giá rẻ không yêu cầu nguồn phụ đến từ Asus\r\no	Số nhân CUDA: 896\r\no	Xung nhịp tối đa: 1710 MHz\r\no	Giao tiếp bộ nhớ: 128-bit\r\no	Loại bộ nhớ: 4GB GDDR5', 'Card màn hình Asus PH GTX 1650-O4G GDDR6 là phiên bản nâng cấp bộ nhớ từ GDDR5 lên GDDR6 cho hiệu năng cải thiện rất nhiều. Đây là dòng card đồ họa Entry-Level với giá thành dễ chịu đủ đáp ứng nhu cầu chơi game của đại đa số người dùng phổ thông. \r\nHiệu năng đột phá\r\nNhân đồ họa GTX 1650 kết hợp cùng bộ nhớ GDDR6 cho hiệu năng được cải thiện rất nhiều so với thế hệ trước là GTX 1050, thậm chí còn đem lại hiệu năng chơi game trên độ phân giải 1080p cao hơn đáng kể so với GTX 1050Ti. \r\nThiết kế nhỏ gọn\r\nCard màn hình Asus PH GTX 1650-O4G GDDR6 sở hữu thiết kế 1 quạt nhỏ gọn, nhã nhặn. Kích thước này phù hợp cho 99% các hệ thống trên thị trường, bất chấp kích thước hạn chế của thùng máy. \r\nTản nhiệt\r\nChỉ sử dụng 1 quạt tản nhiệt song có kích thước lớn nên Card màn hình Asus PH GTX 1650-O4G GDDR6 vẫn giữ được mức nhiệt độ rất tốt khi chạy hết công suất.', 200, 210, 1, 1, 1, 0, 'Asus PH GTX 1650-O4G GDDR6', NULL, 'Asus PH GTX 1650-O4G GDDR6', '2023-03-07 09:47:15', '2023-05-08 12:38:38', NULL),
(23, 6, 'Card màn hình Gigabyte RTX 3060 Ti GAMING OC-8GD-V2', 'Gigabyte RTX 3060 Ti GAMING OC-8GD-V2', 'Gigabyte', 'Thông số sản phẩm\r\no	Nhân đồ họa Nvidia RTX 3060Ti\r\no	Số nhân Cuda: 4864\r\no	Xung nhịp GPU tối đa: 1770 Mhz\r\no	Bộ nhớ Vram: 8GB GDDR6', 'Thiết kế tối ưu hệ thống làm mát', 500, 550, 5, 0, 0, 0, 'Gigabyte RTX 3060 Ti GAMING OC-8GD-V2', NULL, 'Gigabyte RTX 3060 Ti GAMING OC-8GD-V2', '2023-03-07 09:49:29', '2023-05-08 12:26:53', NULL),
(24, 6, 'Card màn hình Gigabyte RTX 3060 Ti VISION OC-8GD-V2', 'Gigabyte RTX 3060 Ti VISION OC-8GD-V2', 'Logitech', 'Thông số sản phẩm\r\no	Dung lượng bộ nhớ: 8Gb GDDR6\r\no	4864 CUDA Cores\r\no	Core Clock: 1755Mhz\r\no	Kết nối: DisplayPort 1.4a, HDMI 2.1\r\no	Nguồn yêu cầu: 650W\r\no	*Phiên bản V2- LHR: Hạn chế khả năng đào coin, hiệu năng chơi game không đổi', 'Card màn hình Gigabyte RTX 3060 Ti VISION OC-8GD-V2 là một trong những sản phẩm cao cấp nhất của Gigabyte phục vụ cho nhu cầu gaming ở độ phân giải 4K. Đây là card đồ họa sử dụng kiến trúc Ampare hoàn toàn mới cùng nhân RT thế hệ 2, nhân Tensor thế hệ 3, Nvidia RTX IO, VRAM GDDR6 và sản xuất trên tiến trình 8nm được Samsung làm riêng. \r\nCải tiến toàn diện trong thiết kế \r\nTừ trên xuống dưới, Card màn hình Gigabyte RTX 3060 Ti VISION OC-8GD đã được cải tiến hoàn toàn để phù hợp với nền tảng Ampere hoàn toàn mới từ NVIDIA để mang đến  hiệu suất chơi game vượt trội so với thế hệ trước. Dòng card đồ họa này mang một thiết kế mới và nhiều kim loại hơn bao quanh 3 quạt làm mát với công nghệ 3x. Cách bố trí tất cả các quạt xoay cùng 1 hướng đã lỗi thời, ở thế hệ mới nhất 3 quạt trên dòng card đồ họa Eagle được phân làm 2 nhiệm vụ quạt chính và phụ trợ quay đảo chiều nhau đem lại hiệu suất tốt hơn hẳn. Bên dưới các cánh quạt, một bộ tản nhiệt lớn hơn, ấn tượng hơn đã sẵn sàng cho các mức nhiệt độ \"khủng\" nhất. \r\nCánh quạt hiệu suất cao và độ bền tăng 2.1 lần\r\nCác cánh quạt có thiết kế rãnh tản nhiệt giúp gia tăng hiệu suất và phần bearing cải tiến có độ bền tốt hơn 2.1 lần. \r\nTích hợp đèn LED RGB bắt mắt có thể tùy chỉnh\r\nPhần thân của VGA giờ đây được tích hợp dải đèn LED bắt mắt và tinh tế. Chủ nhân của mỗi chiếc VGA có thể tùy ý sáng tạo với phần mềm.', 550, 600, 68, 0, 0, 0, 'Gigabyte RTX 3060 Ti VISION OC-8GD-V2', NULL, 'Gigabyte RTX 3060 Ti VISION OC-8GD-V2', '2023-03-07 09:53:48', '2023-05-08 12:38:38', NULL),
(25, 6, 'Card màn hình Colorful iGame RTX 4090 Neptune OC-V', 'Colorful iGame RTX 4090 Neptune OC-V', 'NVIDIA', 'Thông số sản phẩm\r\no	Dung lượng bộ nhớ: 24Gb GDDR6X\r\no	Số nhân CUDA : 16384\r\no	Xung nhịp cơ bản: 2235\r\no	Xung nhịp tối da: 2520 MHz\r\no	TDP: 450W\r\no	Nguồn đề xuất: >850W', 'Được cung cấp sức mạnh bởi kiến trúc Ada Lovelace NVIDIA, thế hệ thứ ba của dòng card đồ họa RTX, GeForce RTX 40-Series sẽ mang đến cho game thủ và người dùng sáng tạo một bước nhảy vọt về hiệu suất, kết xuất hình ảnh và sức mạnh cho các nền tảng hàng đầu khác. Sự tiến bộ vượt bậc trong công nghệ GPU là chìa khóa mang đến những trải nghiệm chơi game sống động nhất, các tính năng AI đáng kinh ngạc và quy trình tạo nội dung nhanh nhất.\r\nCard màn hình iGame GeForce RTX ® 40 Series Neptune Series hoàn toàn mới sẽ mang một diện mạo mới và giải pháp làm mát bằng chất lỏng được nâng cấp so với thế hệ trước. Colorful iGame RTX 4090 Neptune mới có tông màu bạc và trắng.\r\nCard đồ họa 2 khe mỏng đi kèm với một lớp vỏ kim loại với lớp hoàn thiện mờ - hai dải đèn RGB chạy qua lớp vỏ cung cấp ánh sáng xung quanh. Ánh sáng RGB hoàn toàn có thể tùy chỉnh bằng ứng dụng iGame Center.\r\nCard đồ họa GeForce RTX ® 4090 Series Neptune có giải pháp làm mát bằng chất lỏng tất cả trong một với bộ tản nhiệt 360mm - lớn hơn so với các card đồ họa Neptune thế hệ trước. Bộ tản nhiệt được trang bị ba quạt PWM 120mm với ánh sáng RGB - cũng có thể tùy chỉnh bằng ứng dụng iGame Center. Hơn nữa, Neptune sử dụng một tấm chắn nước bằng đồng có vỏ bọc toàn bộ bao phủ GPU và VRAM.\r\nCác tính năng chính\r\n•	Ép xung một phím: Một nút được đặt thuận tiện nằm ở I / O phía sau kích hoạt chức năng ép xung để tăng hiệu suất nhanh chóng và dễ dàng mà không cần mở phần mềm.\r\n•	Yếu tố hình thức 2 khe mỏng: Độ dày 2 khe PCI mỏng sẽ phù hợp với hầu hết các bản dựng PC.\r\n•	Làm mát bằng chất lỏng: Khai thác hiệu suất làm mát vượt trội của làm mát bằng chất lỏng để ép xung cao hơn với mức độ ồn thấp hơn.\r\n•	Full-Cover Copper Waterblock: Khóa waterblock bằng đồng full-cover hiệu suất cao bao phủ GPU, bộ nhớ và các thành phần quan trọng khác trong card đồ họa.\r\n\r\nHiệu năng RTX 4090\r\nGPU NVIDIA Ada Lovelace sẽ là nền tảng cung cấp sức mạnh cho các card đồ họa GeForce RTX 40 series thế hệ tiếp theo. Mức tiêu thụ điện năng lớn của RTX 4090 đem lại hiệu năng mạnh hơn so với thế hệ đời trước cũng như đối thủ AMD Radeon RX 7000 dựa trên RDNA 3.', 2600, 2900, 4, 0, 0, 0, 'Colorful iGame RTX 4090 Neptune OC-V', NULL, 'Colorful iGame RTX 4090 Neptune OC-V', '2023-03-07 09:55:20', '2023-03-07 09:55:20', NULL),
(26, 4, 'Chuột gaming không dây SteelSeries Aerox 9 Wireless 62618', 'SteelSeries Aerox 9 Wireless 62618', 'SteelSeries', NULL, NULL, 118, 130, 6, 0, 0, 0, 'SteelSeries Aerox 9 Wireless 62618', NULL, 'SteelSeries Aerox 9 Wireless 62618', '2023-03-07 09:59:30', '2023-05-08 12:32:48', NULL),
(27, 4, 'Chuột game không dây Steelseries Aerox 3 Snow (USB/RGB)', 'Steelseries Aerox 3 Snow ', 'SteelSeries', NULL, NULL, 126, 130, 2, 0, 0, 0, 'Steelseries Aerox 3 Snow (USB/RGB)', NULL, 'Steelseries Aerox 3 Snow (USB/RGB)', '2023-03-07 10:00:15', '2023-05-08 12:13:00', NULL),
(28, 4, 'Chuột Steelseries Rival 5 (USB/RGB)', 'Steelseries Rival 5 ', 'SteelSeries', 'Thông số sản phẩm\r\no	Chuột Steelseries Rival 5\r\no	thiết kế hoàn hảo cho tất cả các trò chơi Battle Royale, FPS, MOBA, MMO...\r\no	Mắt đọc TrueMove Air với tính năng Tracking 1:1 độ chính xác cực cao\r\no	Layout 9 nút có thể lập trình với 5 nút bên hành động nhanh\r\no	Trọng lượng 85g nhẹ và siêu bền\r\no	Switch bấm Golden Micro IP54 thế hệ tiếp theo\r\no	Hệ thống chiếu sáng PrismSync rực rỡ với 10 vùng 16,8 triệu màu sắc nét đẹp mắt', '9 Nút có thể lập trình\r\nMọi nút trên Steelseries Rival 5 đều có thể tuỳ chỉnh, 5 nút bên hông dùng cho các thao tác ngón tay cái nhanh chóng, giúp thực hiện thêm nhiều thao tác trong các trò chơi một cách dễ dàng.\r\nMắt cảm biến TrueMove Air\r\nLà sự hợp tác của Pixart và Steelseries, TrueMove Air mang lại khả năng tracking 1:1 vượt trội, 18.000 CPI, 400 IPS, gia tốc 40G và cảm biến độ nghiêng, giúp cho bạn có những pha xử lý mượt mà với tốc độ nhanh mà không gặp trở ngại nào\r\nTrọng lượng nhẹ nhàng\r\nSteelseries Rival 5 nặng 85g, trọng lượng rất nhẹ, vô cùng hợp lý khi bạn sử dụng trong thời gian dài mà không lo lắng việc bị mỏi tay do quá nặng\r\nSwitch Golden Micro cải tiến\r\nĐược đánh giá cao với độ bền 80 triệu lần nhấn, switch bấm này mang lại khả năng chống bụi. chống nước hiệu quả, được cải tiến để mang lại những cú nhấn chuột hoàn hảo ngay cả trong những điều kiện khắt khe nhất', 72, 89, 23, 0, 0, 0, 'Steelseries Rival 5 (USB/RGB)', NULL, 'Steelseries Rival 5 (USB/RGB)', '2023-03-07 10:00:56', '2023-04-02 15:09:26', NULL),
(29, 4, 'Chuột game Không dây Logitech G502 Hero Lightspeed (USB/RGB/Đen)', 'Logitech G502 Hero Lightspeed', 'Logitech', 'Thông số sản phẩm\r\no	Chuột Chơi game Không dây Logitech G502 Lightspeed\r\no	Phiên bản không dây của huyền thoại Logitech G502\r\no	Công nghệ không dây Lightspeed với độ trễ cực thấp\r\no	Mắt đọc Hero 16K cho độ chính xác cực cao và tiết kiệm pin\r\no	Tương thích vơi bàn di chuột kèm sạc không dây Logitech PowerPlay\r\no	Led RGB LightSync 16.8 triệu màu đồng bộ với các thiết bị Logitech khác', NULL, 106, 112, 8, 1, 1, 0, 'Logitech G502 Hero Lightspeed', 'Logitech G502 Hero Lightspeed', 'Logitech G502 Hero Lightspeed', '2023-03-07 10:02:05', '2023-05-08 12:13:00', NULL),
(30, 2, 'Bàn phím cơ Akko 3108 Honkai Impact 3rd – Yae Sakura (Akko switch)', 'Akko 3108 Honkai Impact 3rd – Yae Sakura', 'Akko', 'Model: 3108 (Fullsize, 108 keys)\r\nKết nối: USB Type C, có thể tháo rời – Kích thước: 442 x 140 x 40mm\r\nHỗ trợ NKRO\r\nKeycap: PBT Dye-Subbed, OEM profile\r\nBàn phím lấy cảm hứng từ nhân vật Yae Sakura trong trò chơi Honkai Impact III với tông màu chủ đạo là xanh/trắng\r\nLoại switch: Akko (Blue/Orange/Pink)\r\nHỗ trợ multimedia, macro và có thể khóa phím windows\r\nPhụ kiện: 1 sách hướng dẫn sử dụng + 1 keypuller + 1 cover che bụi + 1 dây cáp USB', NULL, 180, 195, 3, 0, 0, 0, 'Akko 3108 Honkai Impact 3rd – Yae Sakura', NULL, 'Akko 3108 Honkai Impact 3rd – Yae Sakura', '2023-03-07 16:34:01', '2023-03-07 16:34:01', NULL),
(32, 2, 'aaaaaaa', 'aaaaaaaaa', 'Logitech', NULL, NULL, 200, 250, 3, 1, 1, 0, 'aaaaaa', 'aaaaaa', 'aaaaaa', '2023-03-22 03:23:47', '2023-03-22 03:28:02', '2023-03-22 03:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'uploads/products/1677566321.jpg', '2023-02-27 23:38:41', '2023-02-27 23:38:41'),
(2, 4, 'uploads/products/16775795991.jpg', '2023-02-28 03:19:59', '2023-02-28 03:19:59'),
(16, 15, 'uploads/products/16777728261.jpg', '2023-03-02 09:00:26', '2023-03-02 09:00:26'),
(18, 17, 'uploads/products/16777733061.jpg', '2023-03-02 09:08:26', '2023-03-02 09:08:26'),
(19, 18, 'uploads/products/16782064981.jpg', '2023-03-07 09:28:18', '2023-03-07 09:28:18'),
(20, 19, 'uploads/products/16782066381.png', '2023-03-07 09:30:38', '2023-03-07 09:30:38'),
(21, 20, 'uploads/products/16782067071.jpg', '2023-03-07 09:31:47', '2023-03-07 09:31:47'),
(22, 21, 'uploads/products/16782067631.png', '2023-03-07 09:32:43', '2023-03-07 09:32:43'),
(23, 22, 'uploads/products/16782076351.jpg', '2023-03-07 09:47:15', '2023-03-07 09:47:15'),
(24, 23, 'uploads/products/16782077691.jpeg', '2023-03-07 09:49:29', '2023-03-07 09:49:29'),
(25, 24, 'uploads/products/16782080281.jpg', '2023-03-07 09:53:48', '2023-03-07 09:53:48'),
(26, 25, 'uploads/products/16782081201.jpg', '2023-03-07 09:55:20', '2023-03-07 09:55:20'),
(27, 26, 'uploads/products/16782083701.jpg', '2023-03-07 09:59:30', '2023-03-07 09:59:30'),
(28, 27, 'uploads/products/16782084151.jpg', '2023-03-07 10:00:15', '2023-03-07 10:00:15'),
(29, 28, 'uploads/products/16782084561.jpg', '2023-03-07 10:00:56', '2023-03-07 10:00:56'),
(30, 29, 'uploads/products/16782085251.jpg', '2023-03-07 10:02:05', '2023-03-07 10:02:05'),
(31, 16, 'uploads/products/16782318131.jpg', '2023-03-07 16:30:13', '2023-03-07 16:30:13'),
(32, 16, 'uploads/products/16782318132.jpg', '2023-03-07 16:30:13', '2023-03-07 16:30:13'),
(33, 17, 'uploads/products/16782318521.jpg', '2023-03-07 16:30:52', '2023-03-07 16:30:52'),
(34, 30, 'uploads/products/16782320411.jpg', '2023-03-07 16:34:01', '2023-03-07 16:34:01'),
(35, 30, 'uploads/products/16782320412.jpg', '2023-03-07 16:34:01', '2023-03-07 16:34:01'),
(36, 4, 'uploads/products/16782320861.jpg', '2023-03-07 16:34:46', '2023-03-07 16:34:46'),
(37, 15, 'uploads/products/16782321291.jpg', '2023-03-07 16:35:29', '2023-03-07 16:35:29'),
(39, 3, 'uploads/products/16782340932.jpg', '2023-03-07 17:08:13', '2023-03-07 17:08:13'),
(40, 3, 'uploads/products/16782340933.jpg', '2023-03-07 17:08:13', '2023-03-07 17:08:13'),
(41, 20, 'uploads/products/16782355071.jpg', '2023-03-07 17:31:47', '2023-03-07 17:31:47'),
(42, 18, 'uploads/products/16782355231.jpg', '2023-03-07 17:32:03', '2023-03-07 17:32:03'),
(43, 19, 'uploads/products/16782355401.png', '2023-03-07 17:32:20', '2023-03-07 17:32:20'),
(44, 21, 'uploads/products/16782355711.png', '2023-03-07 17:32:51', '2023-03-07 17:32:51'),
(45, 24, 'uploads/products/16782357121.jpg', '2023-03-07 17:35:12', '2023-03-07 17:35:12'),
(46, 23, 'uploads/products/16782357481.jpeg', '2023-03-07 17:35:48', '2023-03-07 17:35:48'),
(47, 22, 'uploads/products/16782357751.jpg', '2023-03-07 17:36:15', '2023-03-07 17:36:15'),
(48, 25, 'uploads/products/16782357961.jpg', '2023-03-07 17:36:36', '2023-03-07 17:36:36'),
(49, 29, 'uploads/products/16782358291.jpg', '2023-03-07 17:37:09', '2023-03-07 17:37:09'),
(50, 28, 'uploads/products/16782358461.jpg', '2023-03-07 17:37:26', '2023-03-07 17:37:26'),
(51, 27, 'uploads/products/16782358671.jpg', '2023-03-07 17:37:47', '2023-03-07 17:37:47'),
(52, 26, 'uploads/products/16782358871.jpg', '2023-03-07 17:38:07', '2023-03-07 17:38:07'),
(53, 3, 'uploads/products/16782777181.jpg', '2023-03-08 05:15:18', '2023-03-08 05:15:18'),
(63, 32, 'uploads/products/16794806271.jpg', '2023-03-22 03:23:47', '2023-03-22 03:23:47'),
(64, 32, 'uploads/products/16794806272.jpg', '2023-03-22 03:23:47', '2023-03-22 03:23:47'),
(65, 32, 'uploads/products/16794806273.jpg', '2023-03-22 03:23:47', '2023-03-22 03:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `adress` varchar(500) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_description`, `adress`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(2, 'QComputer', 'http://localhost:8000/', 'QComputer ecommerce', 'QComputer ecommerce, shopping online', 'QComputer ecommerce, shopping online', '#69, some street, Hanoi, Vietnam - 100000', '0397140665', '0397140665', 'tranduyloc140601@gmail.com', 'tranduyloc140601@gmail.com', 'facebook.com', 'twitter.com', 'instagram.com', 'youtube.com', '2023-03-21 17:33:30', '2023-03-21 17:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden, 0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ecommerce Slider One', 'Ecommerce Slider One Description', 'uploads/slider/1677678204.jpg', 1, '2023-03-01 06:43:24', '2023-03-14 01:29:13'),
(2, 'Ecommerce Slider Two', 'Ecommerce Slider Two Description', 'uploads/slider/1677678235.jpg', 1, '2023-03-01 06:43:55', '2023-03-01 10:09:37'),
(3, 'Ecommerce Slider Three', 'Ecommerce Slider Three Description', 'uploads/slider/1677678255.png', 1, '2023-03-01 06:44:15', '2023-03-01 10:09:32'),
(4, 'Ecommerce Slider Four', 'Ecommerce Slider Four Description', 'uploads/slider/1677678272.jpg', 1, '2023-03-01 06:44:32', '2023-03-01 10:09:27'),
(5, 'Ecommerce Slider Five', 'Ecommerce Slider Five Description', 'uploads/slider/1677678286.png', 1, '2023-03-01 06:44:46', '2023-03-01 10:09:21'),
(6, 'Máy tính xách tay Dòng GeForce RTX™ 40', 'Thế hệ mới', 'uploads/slider/1677690632.jpg', 0, '2023-03-01 10:10:32', '2023-03-14 01:29:18'),
(7, 'GeForce RTX™ 4070 Ti', 'Nhanh hơn cả người yêu cũ trở mặt', 'uploads/slider/1677690648.jpg', 0, '2023-03-01 10:10:48', '2023-03-14 01:29:23'),
(8, 'NVIDIA DLSS', 'Sẵn sàng cho tựa game yêu thích của bạn.', 'uploads/slider/1677690665.jpg', 0, '2023-03-01 10:11:05', '2023-03-14 01:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'dang tran quyen', 'user1@gmail.com', NULL, '$2y$10$qRPs3B7C07tvkf0PmAH/Ee.N/01ZpLz8TEbH7CzWpWCRjB2TN7kle', NULL, '2023-02-26 03:41:59', '2023-02-26 03:41:59', 0),
(2, 'Admin', 'admin1@gmail.com', '2023-02-26 09:09:02', '$2y$10$.WIwRkUMHYKHWGwIsDR1NuCBGujBwyBZ7B2Qj6BfszqGi6GLwx2pu', 'P527Jvr35qWXCova7fdjzG2YXe4EbVsdBOWxWoXyb5pmVndk27Q9WAgyJsvI', '2023-02-26 09:09:02', '2023-02-26 09:09:02', 1),
(3, 'abc', 'abc@gmail.com', NULL, '$2y$10$l8Vp1jCByIhmL15lC8ePqeuA05Kkaasp1bRyyN.8oBA9gF2H2kQYq', NULL, '2023-03-14 01:23:12', '2023-03-14 01:23:12', 0),
(4, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$oKqjGxgu0hrwjrKxCVV0ZeTiPRK39oo9GtxtL9qigTE3Qvt.1EVh6', NULL, '2023-03-22 04:35:36', '2023-03-22 04:52:40', 1),
(6, 'park ki cho', 'user2@gmail.com', NULL, '$2y$10$nywVHae/iJLmqs2DRhQpGOhOsyYdxdSz4xaJuFvmQuJzjSZVphvUy', NULL, '2023-05-08 12:39:35', '2023-05-08 12:39:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `zip_code`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, '0397140665', '100000', 'a', '2023-04-02 04:51:02', '2023-04-02 04:51:02'),
(2, 1, '0123456789', '111111', 'aaaaaaaaaaaa', '2023-05-08 11:49:41', '2023-05-08 11:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 2, 4, '2023-03-07 17:04:09', '2023-03-07 17:04:09'),
(13, 1, 16, '2023-03-14 01:16:41', '2023-03-14 01:16:41'),
(14, 3, 3, '2023-03-14 01:24:23', '2023-03-14 01:24:23'),
(15, 2, 16, '2023-04-02 18:08:46', '2023-04-02 18:08:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_user_id_unique` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
