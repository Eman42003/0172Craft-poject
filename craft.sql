-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 02:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craft`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Skin Care', 'Photos/SkinCare.jpg'),
(2, 'Stainless', 'Photos/Stainless.jpg'),
(3, 'Knitting', 'Photos/Knitting.jpg'),
(4, 'Mirrors', 'Photos/Mirrors.jpg'),
(5, 'Beads', 'Photos/Beads.jpeg'),
(6, 'Concrete', 'Photos/Concrete.jpg'),
(7, 'Embroidery', 'Photos/Embroidery.jpg'),
(8, 'Candles', 'Photos/Candles.jpg'),
(10, 'Rasin', 'Photos/Resin.jpg'),
(11, 'Pride', 'Photos/pride.jpg'),
(13, 'Handmade Palm', 'Photos/Handmadepalm.jpg'),
(14, 'Other', 'Photos/Other.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Name`, `Price`, `Image`, `category_id`) VALUES
(14, 'Tatchar', '300', 'images/Tatchar.jpeg', 1),
(16, 'Olay Regenerist Micro-Sculpting Cream', '750', 'images/Olay Regenerist Micro-Sculpting Cream.jpeg', 1),
(17, 'Neutrogena Hydro Boost Water Gel Cleanser', '975', 'images/Neutrogena Hydro Boost Water Gel Cleanser.jpeg', 1),
(18, 'retinol', '495', 'images/retinol.jpg', 1),
(19, 'Laneige Lip Sleeping Mask', '345', 'images/Laneige Lip Sleeping Mask (ترطيب الشفاه).jpeg', 1),
(24, 'LAROCH', '680', 'images/dddd.jpg', 1),
(25, 'La Roche-Posay ', '850', 'images/La Roche-Posay Toleriane Purifying Foaming Cleanser.jpeg', 1),
(26, 'Luna Lipgloss', '550', 'images/Luna Lipgloss.jpeg', 1),
(27, 'Lip Gloss', '320', 'images/Lip Gloss.jpeg', 1),
(29, 'KIKO', '550', 'images/KIKO.jpeg', 1),
(30, 'Castor', '670', 'images/images (8).jpeg', 1),
(31, 'Plumpy Lipgloss', '460', 'images/Plumpy Lipgloss.jpeg', 1),
(32, 'Acrylic Knitting Yarn', '960', 'images/Acrylic Knitting Yarn.jpeg', 3),
(33, 'Knitted Doll', '110', 'images/Knitted Doll.jpeg', 3),
(34, 'Knitted Dress', '1400', 'images/Knitted Dress 2.jpeg', 3),
(35, 'Knitted Plant Pot Cover', '700', 'images/Knitted Plant Pot Cover.jpeg', 3),
(36, 'Knitted Rug', '4500', 'images/Knitted Rug.jpeg', 3),
(37, 'Knitted Tank Top', '580', 'images/Knitted Tank Top.jpeg', 3),
(38, 'Merino Wool Yarn', '850', 'images/Merino Wool Yarn.jpeg', 3),
(39, 'Knitted Bookmark', '150', 'images/Knitted Bookmark.jpeg', 3),
(40, 'Knitted Table Runner', '490', 'images/Knitted Table Runner.jpeg', 3),
(41, 'Knitted Octopus', '640', 'images/Knitted Octopus.jpeg', 3),
(42, 'Knitted Dress', '350', 'images/Knitted Dress.jpeg', 3),
(43, 'Knitted Cushion Cover', '230', 'images/Knitted Cushion Cover.jpeg', 3),
(44, 'Knitted Christmas Stockings', '300', 'images/Knitted Christmas Stockings.jpeg', 3),
(45, 'Knitted Baby Rattle', '720', 'images/Knitted Baby Rattle.jpeg', 3),
(46, 'Infinity Scarf', '200', 'images/Infinity Scarf.jpeg', 3),
(47, 'Teshert', '460', 'images/images (11).jpeg', 3),
(48, 'Cotton Knitting Yarn', '280', 'images/Cotton Knitting Yarn.jpeg', 3),
(49, 'Blanket Knitting Kit', '1680', 'images/Blanket Knitting Kit.jpeg', 3),
(50, 'Beanie Knitting Kit', '300', 'images/Beanie Knitting Kit.jpeg', 3),
(51, 'DIY Scarf Knitting Kit', '400', 'images/DIY Scarf Knitting Kit.jpeg', 3),
(52, 'CND Solar Oil Nail', '120', 'images/CND Solar Oil Nail & Cuticle Conditioner.jpeg', 1),
(53, 'Augustinus Bader The Rich Cream', '450', 'images/Augustinus Bader The Rich Cream.jpeg', 1),
(54, 'Dermalogica Daily Microfoliant', '220', 'images/Dermalogica Daily Microfoliant.jpeg', 1),
(55, 'Glow', '310', 'images/Glow.jpeg', 1),
(56, 'La Mer Crème de la Mer', '190', 'images/La Mer Crème de la Mer.jpeg', 1),
(57, 'SK-II Facial Treatment Essence', '500', 'images/SK-II Facial Treatment Essence.jpeg', 1),
(58, 'Tatcha The Dewy Skin Cream', '200', 'images/Tatcha The Dewy Skin Cream.jpeg', 1),
(59, 'Rouge', '140', 'images/rouge.jpeg', 1),
(60, 'Infinity Bracelet', '90', 'images/Infinity Bracelet.jpeg', 2),
(61, 'Personalized Silver Name Necklace', '160', 'images/Personalized Silver Name Necklace.jpeg', 2),
(62, 'Layered Chain Necklace', '200', 'images/Layered Chain Necklace.jpeg', 2),
(63, 'Gold-Plated Necklace', '1600', 'images/Gold-Plated Necklace.jpeg', 2),
(64, 'Silver Heart Pendant Necklace', '500', 'images/Silver Heart Pendant Necklace.jpeg', 2),
(65, 'Silver Heart Pendant Necklace', '430', 'images/Silver Tennis Bracelet.jpeg', 2),
(66, 'Sterling Silver Chain Necklace', '170', 'images/Sterling Silver Chain Necklace.jpeg', 2),
(67, 'yyy', '500', 'images/Augustinus Bader The Rich Cream.jpeg', 1),
(68, 'mmm', '400', 'images/Acrylic Knitting Yarn.jpeg', 3),
(69, 'kkkk', '888', 'images/download (2).jpeg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `k_category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `k_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
