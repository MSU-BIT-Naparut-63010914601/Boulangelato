-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 05:48 AM
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
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(7) NOT NULL,
  `c_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'เค้ก'),
(2, 'คุกกี้'),
(3, 'ขนมปัง'),
(4, 'เพสทรี');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `flat` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(7) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_detail` text NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_stock` int(7) NOT NULL,
  `p_ext` varchar(50) NOT NULL,
  `c_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_stock`, `p_ext`, `c_id`) VALUES
(1, 'เค้กชิฟฟ่อนช็อกโกแลต', 'เค้กชิฟฟ่อนช็อกโกแลตรสเข้มข้น สูตรเนื้อเค้กใส่ผงโกโก้ เติมนมจืดและกลิ่นวานิลลา อบจนสุกแล้วปาดด้วยวิปครีม แต่งด้วยเกล็ดน้ำตาลช็อกโกแลต หั่นเป็นชิ้นเล็ก ๆ แต่งด้วยสตรอว์เบอร์รีอีกนิด น่ารักน่าหม่ำทีเดียว', 120, 8, 'jpg', 1),
(2, 'เค้กช๊อคโกแลต', 'เค้กอร่อยที่คุณภาพดีเยี่ยมจำเป็นต้องเริ่มต้นด้วยวัตถุดิบที่ดีที่สุดเท่านั้น และต้องใช้เนยสดแท้ 100%  นี่คือหลักการที่เมซโซ่ยึดถือมาตลอด!  ด้วยวัตถุดิบนำเข้าเช่น ช็อคโกแลต ถั่วอัลมอนด์ และบลูเบอร์รี่', 99, 10, 'jpg', 1),
(3, 'คุกกี้เรดเวลเวท', 'คุกกี้เรดเวลเวทเนื้อนุ่ม หลักๆจะมีโกโก้และสีผสมอาหารสีแดง แปะหน้าด้วยช็อคโกแลตกระดุมเพื่อความสวยงามและอร่อย', 99, 10, 'jpg', 2),
(4, 'ซอฟต์คุกกี้ดาร์กช็อกโกแลต', 'ขนมหวานอย่างคุกกี้ เป็นขนมที่ใครหลายๆคนชื่นชอบ ทำเเล้วสามารถเก็บไว้ได้นาน รับประทานกับนมสด ทั้งอิ่มเเละอร่อย ซอฟต์คุกกี้ดาร์กช็อกโก เป็นคุกกี้ที่มีความนุ่ม และกรอบเล็กน้อย เพราะมีส่วนผสมจากน้ำตาลทรายเเดง ที่ให้รสหวานหอมและให้ความนุ่มกับคุกกี้ แถมยังหอมกลิ่นคาราเมลที่ทำจากเนยสดที่เคี่ยวจนเปลี่ยนสีและอร่อย', 99, 12, 'jpg', 2),
(5, 'French Toast 1', 'Custardy, fluffy French toast with a touch of vanilla and cinnamon.', 89, 15, 'jpg', 3),
(6, 'Homemade Nutella Croissants', 'ครัวซองต์นูเทลล่านี้อัดแน่นไปด้วยแป้งครัวซองต์เนยแข็งหลายชั้น พร้อมด้วยช็อคโกแลตเฮเซลนัทสเปรดที่คุณชื่นชอบ', 79, 15, 'jpg', 3),
(7, 'Blueberry Cream Cheese Pie', 'ขนมหวาน ที่หลาย ๆ คน ชอบรับประทาน ด้วยตัวของ บลูเบอร์รี่ ผลไม้ ที่มี รสชาติเปรี้ยวอมหวาน และตัดกับ ความหอมมัน ของ ชีสพาย และ แครกเกอร์ด้านล่าง ที่ให้รสสัมผัส ที่ กรุบกรอบ จึงทำให้มี รสชาติ ที่เป็น เอกลักษณ์', 89, 10, 'jpg', 4),
(8, 'Blackberry Apple Pie', 'พายแอปเปิ้ลและแบล็กเบอร์รี่แสนอร่อยของฉันคือ บิดอัมพิล บนพายแอปเปิ้ลอเมริกาน่าสุดคลาสสิก! เป็นขนมคลาสสิกแบบดั้งเดิมของอังกฤษและเป็นอีกวิธีที่ยอดเยี่ยมในการใช้ประโยชน์จากผลไม้ที่ร่วงหล่นของคุณ! ฉันเป็นแฟนของแบล็กเบอร์รี่และเพลิดเพลินกับการผสมผสานระหว่างแบล็กเบอร์รี่และแอปเปิ้ลเหมือนใน แอปเปิ้ล แบล็คเบอร์รี่ ครัมเบิ้ล.', 109, 15, 'jpg', 4),
(9, 'เค้กสตรอเบอรี่เยลลี่', 'เค้กหน้านิ่ม ที่จะทำให้ได้รสชาติของ สตรอว์เบอร์รี่ แบบเต็ม ๆ โดยวิธีการทำก็ไม่ยาก เพียงแค่ผสมผงเจลาตินกลิ่นสตรอเบอรี่กับน้ำเปล่า ต้มจนเดือด แล้วพักทิ้งไว้ให้เย็น ให้เจลาตินเซ็ตตัว เสร็จแล้ว นำไปราดลงบนหน้าเค้ก ก็จะทำให้ได้เค้กหน้านิ่มสุดน่ารับประทาน', 129, 10, 'jpg', 1),
(10, 'Strawberry shortcake', 'เค้กสตรอเบอรี่ สไตล์ใหม่ที่กำลังฮิตมากทั้งในเกาหลีและญี่ปุ่น ปรับสูตรจากเค้กธรรมดาปกติ มาเป็นช็อทเค้ก เพื่อให้ง่ายต่อการรับประทาน เหมาะกับทำทานสำหรับคนเดียว หรือ 2 – 3 คน หากใครอยากทำเค้กเพื่อคนพิเศษ ', 139, 10, 'jpg', 1),
(11, 'Chocolate Chip Cookies', 'คุกกี้ช็อกโกแลตชิปเหล่านี้มีความนุ่มและเคี้ยวหนึบอย่างน่าอัศจรรย์ และอัดแน่นไปด้วยช็อกโกแลตชิป (และชิ้น!) ง่ายมากและยอดเยี่ยมมาก!', 79, 12, 'jpg', 2),
(12, 'Korean Cream Cheese Garlic Bread', 'ขนมปังกระเทียมครีมชีสเกาหลีนี้อร่อยมากอย่างไม่น่าเชื่อ! ภายนอกมีความกรุบกรอบอย่างสมบูรณ์แบบ ในขณะที่ด้านในเป็นแบบคัสตาร์ดแต่ยังคงความเคี้ยวหนุบหนับเหมือนขนมปังชั้นดี สอดไส้ครีมชีสรสหวานเล็กน้อย และเต็มไปด้วยสิ่งที่คุณต้องการในขนมปังกระเทียม', 89, 14, 'jpg', 3),
(13, 'Strawberry Pie', 'พายสตรอเบอร์รี่นี้เป็นสูตรขนมฤดูร้อนที่สมบูรณ์แบบที่ทำจากเปลือกเนยทั้งหมดและสตรอเบอร์รี่สด', 109, 10, 'jpg', 4),
(14, 'Gluten-Free New York Cheesecake ', 'ชีสเค้กนิวยอร์กที่ปราศจากกลูเตนและมีปริมาณต่ำนี้เป็นแนวคิดสูตรขนมหวานสุดหวานที่สมบูรณ์แบบสำหรับความบันเทิงในงานเลี้ยงอาหารค่ำครั้งถัดไปของคุณในทุกฤดูกาล', 159, 15, 'jpg', 1),
(15, 'Berries and Cream Puff Pastries with Cream Cheese Drizzle', 'พัฟพัฟเบอร์รี่และครีมชีส - ชั้นเนยสอดไส้ครีมชีสกลิ่นวานิลลา โรยหน้าด้วยผลเบอร์รี่ฉ่ำ เบาและโปร่งสบาย', 79, 10, 'jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `urole`, `created_at`) VALUES
(1, 'akabin', 'boodaapang', 'A@msu.ac.th', '$2y$10$L0Yv9hty/DGWR2w/CJMt.u/XovmID6QhZbGpaYr.8AfTRFnUo7Pv.', 'user', '2024-03-10 21:24:13'),
(2, 'admid', 'gg', 'B@msu.ac.th', '$2y$10$OmTYAsHkN7lHns9xyqv/HefGTMJH6/H0mUB5lRAIQoOP4GOhGeRh.', 'admin', '2024-03-10 23:28:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
