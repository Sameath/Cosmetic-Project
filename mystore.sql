-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 11:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Ban Sameath', 'meath@gamil.com', '123'),
(2, 'Ban samai', 'mai@gmail.com', '123'),
(3, 'Ban sreytey', 'tey@gmail.com', '123'),
(4, 'Ban nirot', 'rot@gmail.com', '123'),
(5, 'Srey nit', 'nit@gmail.com', '123'),
(6, 'sal', 'sal@gmail.com', '$2y$10$fsOU77Jr1OVkhL9mnBfLJe802OcTTgLjR6aHTiKHzaJkCbndRF9E.'),
(7, 'Orn', 'Orn@gmail.com', '$2y$10$fj9rAmQIXLpfvKd9LmWYnOX/hf197Jnca4cY5851Uk4UhQL8ZbMIi');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(6, 'សាខាស្ទឹងមានជ័យ'),
(7, 'សាខាបឹងកេងកង'),
(8, 'សាខាចាក់អង្រែ'),
(9, 'សាខាទឹកថ្លា');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(22, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(9, 'Hair Dye'),
(10, 'Hair oil'),
(11, 'Hair Cream'),
(12, 'Hair Gels'),
(13, 'Hair Removing Cream'),
(16, 'Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 13, 331432347, 18, 1, 'pending'),
(2, 1, 264961630, 18, 1, 'pending'),
(3, 1, 1674361559, 21, 1, 'pending'),
(4, 1, 764531547, 17, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_discription` varchar(100) NOT NULL,
  `product_keyword` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_discription`, `product_keyword`, `category_id`, `brand_id`, `product_image`, `product_price`, `date`, `status`) VALUES
(22, 'Amla Oil', 'ប្រេងលាបសក់​អា​ហ្គេ​ន​ធម្មជាតិ​គុណភាព​ខ្ពស់​ពី​ប្រទេស​ម៉ូរ៉ូកូ​។​ ​ប្រេងលាបសក់​ភារ​ព្រី​មៀម​អាច​ប្រើ', 'amla', 10, 0, 'Amla.jpg', '15$', '2024-01-24 07:39:29', 'true'),
(23, 'Roasted Oil', 'ប្រេងលាបសក់​អា​ហ្គេ​ន​ធម្មជាតិ​គុណភាព​ខ្ពស់​ពី​ប្រទេស​ម៉ូរ៉ូកូ​។​ ​ប្រេងលាបសក់​ភារ​ព្រី​មៀម​អាច​ប្រើ', 'roasted', 10, 6, 'Roasted Hair Oil.jpg', '10$', '2024-01-24 08:06:44', 'true'),
(24, 'Rosmary Oil', 'ប្រេងលាបសក់​អា​ហ្គេ​ន​ធម្មជាតិ​គុណភាព​ខ្ពស់​ពី​ប្រទេស​ម៉ូរ៉ូកូ​។​ ​ប្រេងលាបសក់​ភារ​ព្រី​មៀម​អាច​ប្រើ', 'rosmary', 10, 6, 'Rosemary Oil.jpg', '5$', '2024-01-24 08:07:16', 'true'),
(25, 'Sanyasl Oil', 'ប្រេងលាបសក់​អា​ហ្គេ​ន​ធម្មជាតិ​គុណភាព​ខ្ពស់​ពី​ប្រទេស​ម៉ូរ៉ូកូ​។​ ​ប្រេងលាបសក់​ភារ​ព្រី​មៀម​អាច​ប្រើ', 'sanyasl', 10, 7, 'Sanyasl Oil.jpg', '15$', '2024-01-24 08:07:55', 'true'),
(26, 'Yeka Moriga', 'ប្រេងលាបសក់​អា​ហ្គេ​ន​ធម្មជាតិ​គុណភាព​ខ្ពស់​ពី​ប្រទេស​ម៉ូរ៉ូកូ​។​ ​ប្រេងលាបសក់​ភារ​ព្រី​មៀម​អាច​ប្រើ', 'yeka', 10, 8, 'Yeka Moriga.jpg', '10$', '2024-01-24 08:08:33', 'true'),
(27, '2Black', 'Perfect for a stylish look. 𝗖𝗞 𝗣𝗼𝗺𝗮𝗱𝗲 គឺជាប្រភេទជែលលាបសក់ធ្វើឲ្យសក់មានសំណើម ភ្លឺរលោង រឹងជាប់ម៉ូតពេញម', '2black', 11, 6, '2Black Cream.jpg', '5$', '2024-01-24 08:14:46', 'true'),
(28, 'Billy Cream', 'Perfect for a stylish look. 𝗖𝗞 𝗣𝗼𝗺𝗮𝗱𝗲 គឺជាប្រភេទជែលលាបសក់ធ្វើឲ្យសក់មានសំណើម ភ្លឺរលោង រឹងជាប់ម៉ូតពេញម', 'billy', 11, 7, 'Billy Cream.jpg', '5$', '2024-01-24 08:15:16', 'true'),
(29, 'Hima Cream', 'Perfect for a stylish look. 𝗖𝗞 𝗣𝗼𝗺𝗮𝗱𝗲 គឺជាប្រភេទជែលលាបសក់ធ្វើឲ្យសក់មានសំណើម ភ្លឺរលោង រឹងជាប់ម៉ូតពេញម', 'hima', 11, 8, 'Hima Cream.jpg', '10$', '2024-01-24 08:15:53', 'true'),
(30, 'Pliable Cream', 'Perfect for a stylish look. 𝗖𝗞 𝗣𝗼𝗺𝗮𝗱𝗲 គឺជាប្រភេទជែលលាបសក់ធ្វើឲ្យសក់មានសំណើម ភ្លឺរលោង រឹងជាប់ម៉ូតពេញម', 'pliable', 11, 9, 'PLIABLE Cream.jpg', '10$', '2024-01-24 08:16:37', 'true'),
(31, 'Hair Gel', 'ប្រើបានគ្រប់ប្រភេទសក់, មិនឡើងអង្កែល, មិនបែកសរពេញសក់, មិនរឹងខ្លាំង, មិនធ្វើអោយរមាស់ស្បែកក្បាល, មានក្ល', 'gel', 12, 6, 'Haii gel.jpg', '5$', '2024-01-24 08:44:31', 'true'),
(32, 'JAM Gel', 'ប្រើបានគ្រប់ប្រភេទសក់, មិនឡើងអង្កែល, មិនបែកសរពេញសក់, មិនរឹងខ្លាំង, មិនធ្វើអោយរមាស់ស្បែកក្បាល, មានក្ល', 'gel', 12, 7, 'Jam gel.jpg', '10$', '2024-01-24 08:45:34', 'true'),
(33, 'Set wet Gel', 'ប្រើបានគ្រប់ប្រភេទសក់, មិនឡើងអង្កែល, មិនបែកសរពេញសក់, មិនរឹងខ្លាំង, មិនធ្វើអោយរមាស់ស្បែកក្បាល, មានក្ល', 'gel', 12, 8, 'Set Wet gel.jpg', '10$', '2024-01-24 08:46:30', 'true'),
(34, 'Zetiling Gel', 'ប្រើបានគ្រប់ប្រភេទសក់, មិនឡើងអង្កែល, មិនបែកសរពេញសក់, មិនរឹងខ្លាំង, មិនធ្វើអោយរមាស់ស្បែកក្បាល, មានក្ល', 'gel', 12, 9, 'Zetiling gel.jpg', '5$', '2024-01-24 08:47:00', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 13, 22, 331432347, 1, '2024-01-17 07:43:04', 'pending'),
(2, 13, 0, 288301151, 0, '2024-01-17 07:43:21', 'pending'),
(3, 1, 42, 264961630, 2, '2024-01-17 07:52:11', 'Complete'),
(4, 1, 11, 1674361559, 1, '2024-01-17 10:53:35', 'Complete'),
(5, 1, 40, 764531547, 3, '2024-01-17 10:59:43', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 3, 264961630, 42, 'ACLEDA', '2024-01-17 07:52:11'),
(2, 4, 1674361559, 11, 'ABA', '2024-01-17 10:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_mobile` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'Ban sameath', 'Sameath@gmail.com', '123', 'Screenshot (216).png', '::1', 'PP', '098765432');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`) USING BTREE;

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
