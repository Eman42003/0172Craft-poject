-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 11:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduation_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcategary`
--

CREATE TABLE `addcategary` (
  `id` int(11) NOT NULL,
  `newcategoury` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcategary`
--

INSERT INTO `addcategary` (`id`, `newcategoury`) VALUES
(5, 'Stainless'),
(6, 'Skin Care'),
(7, 'knitting'),
(8, 'khos'),
(9, 'embroidery'),
(10, 'candles'),
(11, 'Beads'),
(12, 'Mirrors'),
(13, 'pride'),
(14, 'Concrete'),
(15, 'resin'),
(16, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'teamcraft@gmail.com', 'teamcraft1');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `image`) VALUES
(1, 'Beads', 'Beads.jpeg'),
(2, 'Skin Care', 'Skin Care.jpg'),
(4, 'Handmade palm', 'khos.png'),
(5, 'embroidery', 'embroidery.png'),
(6, 'candles', 'candles.jpg'),
(7, 'Beads', 'Beads.jpeg'),
(8, 'Mirrors', 'Mirrors.jpg'),
(9, 'pottery', 'pride.jpg'),
(10, 'Knitting', 'Knitting.jpg'),
(11, 'Concrete', 'Concrete.jpg'),
(12, 'resin', 'resin.jpg'),
(13, 'Other', 'Other.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Beads', 'Beads.jpeg'),
(2, 'candles', 'candles.jpg'),
(3, 'Concrete', 'Concrete.jpg'),
(4, 'Embroidery', 'Embroidery.jpg'),
(5, 'Handmade palm', 'Handmade palm.jpg'),
(6, 'Knitting', 'Knitting.jpg'),
(7, 'Mirrors', 'Mirrors.jpg'),
(8, 'pottery', 'pride.jpg'),
(9, 'resin', 'resin.jpg'),
(10, 'Skin Care', 'Skin Care.jpg'),
(11, 'Stainless', 'Stainless.jpg'),
(12, 'Other', 'Other.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `full_name`, `course`, `price`, `phone`, `address`, `video_path`) VALUES
(21, 'emma', 'risen', '410', '01091398406', 'cairo', 'uploads/videos/6834a197b842b_WhatsApp Video 2025-05-26 at 19.53.13_999084dd.mp4'),
(22, 'emma', 'risen', '410', '01091398406', 'cairo', 'uploads/videos/6834a1b7d0912_WhatsApp Video 2025-05-26 at 19.53.13_999084dd.mp4'),
(23, 'emma', 'risen', '410', '01091398406', 'cairo', 'uploads/videos/6834a1be0406a_WhatsApp Video 2025-05-26 at 19.53.13_999084dd.mp4'),
(25, 'youssef hassan', 'risen', '100', '01032342996', 'abshaway', 'uploads/videos/6838c3d585bc3_682b6d46089f7_IMG_1499.MP4'),
(26, 'يوسف', 'risen', '300', '01032342996', 'abshaway', 'uploads/videos/6838c77a805ec_682b6d46089f7_IMG_1499.MP4'),
(27, 'محمد احمد', 'risen', '100', '01032342996', 'abshaway', 'uploads/videos/6838c8ec53ca6_6834a1b7d0912_WhatsApp Video 2025-05-26 at 19.53.13_999084dd.mp4'),
(28, 'youssefjoo', 'risen', '100', '01032342996', 'abshaway', 'uploads/videos/6839ed452a6ad_682b6d46089f7_IMG_1499.MP4');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `rating`, `message`, `created_at`) VALUES
(1, 'youssef', 'youssefhassan22m@icloud.com', 5, 'كويس جدا', '2025-05-19 22:30:00'),
(2, 'youssef', 'youssefhassan22m@icloud.com', 4, 'الف الف', '2025-05-20 00:59:13'),
(3, 'youssef', 'youssefhassan22m@icloud.com', 4, 'الف الف', '2025-05-20 00:59:43'),
(4, 'youssef', 'youssefhassan22m@icloud.com', 5, 'كويس ', '2025-05-29 20:37:36'),
(5, 'youssef', 'youssefhassan22m@icloud.com', 4, 'جميل جدا الموقع ', '2025-05-29 20:55:40'),
(6, 'youssef', 'youssefhassan22m@icloud.com', 4, 'جميل جدا الموقع ', '2025-05-29 20:59:25'),
(7, 'youssefjoo', 'youssefjoo@icloud.com', 4, 'جميل جدا الموقع ', '2025-05-30 17:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `ills`
--

CREATE TABLE `ills` (
  `id` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Type` enum('Seller','Buyer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ills`
--

INSERT INTO `ills` (`id`, `FullName`, `Email`, `PasswordHash`, `Type`) VALUES
(32, 'bsd111', 'midooo1@gmial.com', '$2y$10$88jRi0HP440a51MLSsT5UOp.EbFfpFFte36Q6D8fw1mSLpAHnrhAa', ''),
(51, 'lolo2025', 'lolo2025@gmiail.com', '$2y$10$1BI7F.UeAgpvaBFzuLPeDeXeOhQOf7vXjrnOxz15.HNv6IWVV5Pd.', ''),
(52, 'bsd33333', 'hassanttt@email.com', '$2y$10$0hwQPtch.fvFIM/Zfjr/bOjpvh53uhk8iJKkVD3ngXbR0NmZE4.J2', ''),
(53, 'joohassan', 'joohassan22m@icloud.com', '$2y$10$KySbsMcE5qMrXTbyt2bclupR2kRdB9QLidsNPp1YzCuImBJQzIGmW', ''),
(54, 'youssef', 'hassan11@email.com', '$2y$10$zJzMGZho7e.RCx60kYJIB.VgHOIaDK1RLOOtX0LbMvRNEgVE745bK', ''),
(55, 'omar', 'omar1@gmail.com', '$2y$10$vsF7ZIujiRfAPaJdiUHEAuPDhCeeBaBTqhpdW6ZoOymIaDmuiW7rS', ''),
(58, 'yyyyyyyy1', 'y1@gmail.com', '$2y$10$dSa72v/1l5VxasMiRGeel.PTykTTeT42cpVR.Fv7DtWUooDoOvCDe', ''),
(59, 'zz', 'zz11@gmail.com', '$2y$10$sGBOUy36PdXNEs.AYWBOueGBShXOiyqxoxdgl4TKe/iejXptOOMuG', ''),
(60, 'joohassan', 'youssefhassan22m@icloud.com', '$2y$10$cVFiuptbTrPHoLqSI0/r6OnAzz8aYLaqjHXXA0J7uTpp4GYTHRk3m', ''),
(62, 'abdo', 'abdo123@icloud.com', '$2y$10$g57.oW9Vsh8Sa6KKTErBQuQcjMKxEPamnK98ft3ovxtRrzGaIQ.o6', ''),
(63, 'محمد احمد ', 'mohamedahmed@icloud.com', '$2y$10$7t46IThR24KvmTmzwCD4NuwdlkKvCVyWzD9mUQKWPoiRWwVtlUm72', ''),
(68, 'omar hamdy', 'omarhamdy@icloud.com', '$2y$10$FfOuCRku1uOUtEP0apUKPe06IfBw6T6CmVs4Q.HbUDunalClsN4zS', ''),
(69, 'abdalla', 'abdo@icloud.com', '$2y$10$o5jAcd2Dh6rCOFkBh7A89ej2Zc6rq0BmPTZ.dkBasb7iN4EmEqjMu', ''),
(70, 'sayed', 'sayed@icloud.com', '$2y$10$oXy0yik7VzwOa1WlXLgiwe0IXlnqf0oTVNNh/8GEXJtv2jZqMk85q', ''),
(71, 'ali', 'ali@icloud.com', '$2y$10$5C9zifuTSWjYziYVtqofoeV67tOnbNAZMXwgiSNjA14vgLt1G3Hja', ''),
(72, 'Eman', 'eman65540@gmail.com', '$2y$10$VWGoxlVt6DENtRL9n1K3KetgSSDzh.Orl5gQhLvSHpnEr2texOvNa', ''),
(73, 'sama', 'sama233@gmail.com', '$2y$10$mIYRugOGBTCrHFe0.pYG9uozKuJNDoCa1xbta2Degu.SJE6gsd4Nu', ''),
(74, 'Nada', 'nada300@gmail.com', '$2y$10$dnaSrLOxfwoS4nv1RQheEOEMKDsgB7QhP9gN3hzJg1sD4FP78F8qm', ''),
(75, 'Ahmed', 'ahmed200@gmail.com', '$2y$10$cfp57tP5QbgkvNtRBSlrautf9FPXrU7L7FLpJN3p.nqMs0vSPauGC', ''),
(76, 'doaa', 'doaaa3@gmail.com', '$2y$10$lWD.DJ4.HEzLQ7DBAiGZp.IWUfdFXjENux6i.ffMaeITKX4bFrg7m', ''),
(77, 'mohamed ahmed ', 'mohamedahmed1@icloud.com', '$2y$10$3i3Yz1vFpm7sF39PjfO.h.SuoqQR9H9s9o/CGI.OE2CClcmd7WF4G', ''),
(78, 'youssef joo', 'youssefjoo@icloud.com', '$2y$10$v/a4i900ZsOwH4ZiDCKR8.He5Rq0zFDHgMKhxTFiVD0osokd1Rvy.', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'قيد المعالجة'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_price`, `status`) VALUES
(54, 71, '2025-05-24 12:00:52', 120.00, 'Pending'),
(55, 60, '2025-05-24 15:56:00', 220.00, 'Pending'),
(56, 72, '2025-05-26 03:13:02', 440.00, 'Pending'),
(57, 72, '2025-05-27 19:05:29', 360.00, 'Pending'),
(58, 76, '2025-05-28 01:30:20', 150.00, 'Pending'),
(59, 60, '2025-05-29 19:35:25', 150.00, 'Pending'),
(60, 77, '2025-05-29 19:52:56', 350.00, 'Pending'),
(61, 78, '2025-05-30 16:39:53', 250.00, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `quantity`, `price`) VALUES
(51, 55, 'beads', 1, 220.00),
(52, 56, 'beads', 2, 220.00),
(53, 57, 'Rose candle', 1, 360.00),
(54, 58, 'Heart dishe', 1, 150.00),
(55, 59, 'Bracelet and ring set', 1, 150.00),
(56, 60, 'Clay Dishes', 1, 350.00),
(57, 61, 'bag', 1, 250.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category_id`, `user_id`) VALUES
(26, 'Small crochet bag', 280.00, 'images/download.jpeg', 6, 72),
(27, ' crochet bag', 310.00, 'images/download (1).jpeg', 6, 72),
(28, ' crochet bag', 350.00, 'images/download (2).jpeg', 6, 72),
(29, 'crochet jacket', 710.00, 'images/download (3).jpeg', 6, 72),
(30, 'Cherry crochet jacket', 750.00, 'images/download (4).jpeg', 6, 72),
(31, 'Clay Dishes', 350.00, 'images/Clay Dishes Made by @artbylizx.jpeg', 3, 73),
(32, 'Heart dishe', 150.00, 'images/download (5).jpeg', 3, 73),
(33, 'dishes', 315.00, 'images/download (6).jpeg', 3, 73),
(35, 'Summer chains', 200.00, 'images/download9.jpeg', 11, 73),
(36, 'golden earring', 260.00, 'images/download (7).jpeg', 11, 73),
(37, 'Rose candle', 360.00, 'images/Rose candle.jpeg', 2, 74),
(38, 'red flower candles', 400.00, 'images/download (8).jpeg', 2, 74),
(39, 'Spring scents', 530.00, 'images/Spring scents.jpeg', 2, 74),
(40, 'flower resin', 350.00, 'images/Handmade Resin and Pressed Flower Coasters _ Aesthetic Coasters _ Pressed Flowers, Gold Flake, Epoxy Resin Coasters I Made to Order - Etsy.jpeg', 9, 74),
(41, 'resin tray and coasters', 410.00, 'images/resin tray and coasters.jpeg', 9, 74),
(42, 'bag', 260.00, 'images/download (9).jpeg', 6, 72),
(43, 'Beuatiful Crochet Bag,Short Bag', 240.00, 'images/Beuatiful Crochet Bag,Short Bag.jpeg', 6, 72),
(44, 'sunflower jacket', 750.00, 'images/winter clothe.jpeg', 6, 72),
(45, 'Totty Bag Sunflower', 290.00, 'images/download (10).jpeg', 6, 72),
(46, 'Lavender Flower Jacket', 800.00, 'images/download (11).jpeg', 6, 72),
(47, 'Hearts jacket', 790.00, 'images/follow me 🫧🌷.jpeg', 6, 72),
(48, 'Macron candles', 150.00, 'images/7b757a2a-435c-4861-8b93-c851dc0af80d.jpeg', 2, 74),
(49, 'Babylon candle', 60.00, 'images/939033a7-f476-4a27-b77d-0c9814c5de5d.jpeg', 2, 74),
(50, 'berry candles', 300.00, 'images/Blueberry Bliss_ Infused with a harmonious blend….jpeg', 2, 74),
(52, 'Babylon Candle Set', 450.00, 'images/Candles .jpeg', 2, 74),
(53, 'Valentine\'s candles', 570.00, 'images/love.jpeg', 2, 74),
(54, 'decor', 100.00, 'images/decor.jpeg', 9, 74),
(55, 'Decoration', 250.00, 'images/Decoration.jpeg', 9, 74),
(56, 'Letters Medal', 50.00, 'images/Letters Medal.jpeg', 9, 74),
(57, 'wall clock', 650.00, 'images/wall clock.jpeg', 9, 74),
(58, 'toilet set', 980.00, 'images/toilet set.jpeg', 9, 74),
(59, 'X O', 730.00, 'images/X O.jpeg', 9, 74),
(60, 'Tray and coasters', 690.00, 'images/Tray and coasters.jpeg', 9, 74),
(61, 'Bracelet and ring set', 150.00, 'images/Bracelet and ring set.jpeg', 11, 73),
(62, 'bracelet', 110.00, 'images/bracelet.jpeg', 11, 73),
(63, 'Butterfly necklace', 140.00, 'images/Butterfly necklace.jpeg', 11, 73),
(64, 'Heart necklace', 160.00, 'images/Heart necklace.jpeg', 11, 73),
(65, 'Necklace and bracelet', 290.00, 'images/Necklace and bracelet.jpeg', 11, 73),
(66, 'Necklace set', 350.00, 'images/Necklace set.jpeg', 11, 73),
(67, 'necklace', 170.00, 'images/necklace.jpeg', 11, 73),
(68, 'necklace', 180.00, 'images/necklace1.jpeg', 11, 73),
(70, 'Ring set', 360.00, 'images/Ring set.jpeg', 11, 73),
(71, 'necklace', 100.00, 'images/necklace2.jpeg', 11, 73),
(72, 'Ring ', 70.00, 'images/Ring .jpeg', 11, 73),
(73, 'Concrete Bubble ', 150.00, 'images/Concrete Bubble .jpeg', 3, 73),
(74, 'concrete cloud', 130.00, 'images/concrete cloud.jpeg', 3, 73),
(75, 'concrete coaster', 30.00, 'images/concrete coaster.jpeg', 3, 73),
(76, 'shell concrete', 140.00, 'images/shell concrete.jpeg', 3, 73),
(77, 'Concrete decor', 180.00, 'images/Concrete decor.jpeg', 3, 73),
(78, 'Concrete Flower ', 170.00, 'images/Concrete Flower .jpeg', 3, 73),
(79, 'Concrete set ', 410.00, 'images/Concrete set 2.jpeg', 3, 73),
(80, 'seashell concrete', 260.00, 'images/seashell concrete.jpeg', 3, 73),
(81, 'concrete Set', 430.00, 'images/concrete Set.jpeg', 3, 73),
(82, 'Concrete set ', 500.00, 'images/Concrete set 1.jpeg', 3, 73),
(83, 'Body cream', 300.00, 'images/Body cream.jpeg', 10, 72),
(84, 'body cream', 250.00, 'images/body cream1.jpeg', 10, 72),
(85, 'Body lotion', 270.00, 'images/Body lotion.jpeg', 10, 72),
(86, 'body oil', 590.00, 'images/body oil.jpeg', 10, 72),
(87, 'body scrub', 310.00, 'images/body scrub.jpeg', 10, 72),
(88, 'eye cream', 670.00, 'images/eye cream.jpeg', 10, 72),
(89, 'Serum', 530.00, 'images/Serum.jpeg', 10, 72),
(90, 'Face Serum ', 830.00, 'images/Face Serum .jpeg', 10, 72),
(91, 'Coaster', 40.00, 'images/Coaster.jpeg', 5, 75),
(92, 'Heart palm', 60.00, 'images/Heart palm.jpeg', 5, 75),
(93, 'palm leaf ', 45.00, 'images/palm leaf 1.jpeg', 5, 75),
(94, 'palm leaf ', 35.00, 'images/palm leaf .jpeg', 5, 75),
(95, 'Palm Leaf Hand ', 70.00, 'images/Palm Leaf Hand .jpeg', 5, 75),
(96, 'decorative vase', 90.00, 'images/decorative vase.jpeg', 8, 75),
(97, 'Engraved vase', 75.00, 'images/Engraved vase.jpeg', 8, 75),
(98, 'vase set', 150.00, 'images/vase set1.jpeg', 8, 75),
(99, 'Terracotta Vase', 85.00, 'images/Terracotta Vase.jpeg', 8, 75),
(100, 'vase set', 170.00, 'images/vase set.jpeg', 8, 75),
(101, 'vase', 50.00, 'images/vase.jpeg', 8, 75),
(102, 'Mirror ', 150.00, 'images/Mirror (1).jpeg', 7, 75),
(103, 'Mirror ', 350.00, 'images/Mirror (8).jpeg', 7, 75),
(104, 'Mirror ', 250.00, 'images/Mirror (9).jpeg', 7, 75),
(105, 'Mirror ', 190.00, 'images/Mirror (2).jpeg', 7, 75),
(106, 'Mirror ', 390.00, 'images/Mirror (4).jpeg', 7, 75),
(107, 'Mirror ', 290.00, 'images/Mirror (5).jpeg', 7, 75),
(108, 'Mirror ', 330.00, 'images/Mirror (7).jpeg', 7, 75),
(109, 'Mirror ', 230.00, 'images/Mirror (6).jpeg', 7, 75),
(110, 'bag', 250.00, 'images/Bag (1).jpeg', 1, 76),
(111, 'bag', 500.00, 'images/Bag (2).jpeg', 1, 76),
(112, 'bag', 290.00, 'images/Bag (3).jpeg', 1, 76),
(113, 'bag', 390.00, 'images/Bag (4).jpeg', 1, 76),
(114, 'Bracelet ', 30.00, 'images/Bracelet .jpeg', 1, 76),
(115, 'sunflower necklace', 60.00, 'images/sunflower necklace.jpeg', 1, 76),
(116, 'Bracelet and ring', 50.00, 'images/Bracelet and ring.jpeg', 1, 76),
(117, 'hoop', 100.00, 'images/hoop 5.jpeg', 4, 76),
(118, 'hoop', 130.00, 'images/hoop.jpeg', 4, 76),
(119, 'hoop', 250.00, 'images/hoop1.jpeg', 4, 76),
(120, 'hoop', 210.00, 'images/hoop2.jpeg', 4, 76),
(121, 'hoop', 120.00, 'images/hoop4.jpeg', 4, 76),
(122, 'hoop', 180.00, 'images/hoop3.jpeg', 4, 76),
(123, 'Tootie Bag', 240.00, 'images/Tootie Bag.jpeg', 4, 76),
(124, 'stainless', 70.00, 'images/Butterfly necklace.jpeg', 11, 60),
(125, 'stainless', 99.00, 'images/download9.jpeg', 11, 77),
(126, 'knitting', 500.00, 'images/Acrylic Knitting Yarn.jpeg', 6, 78);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `about_you` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `full_name`, `email`, `phone`, `address`, `about_you`, `user_id`) VALUES
(19, 'bsd', 'youssefhassan22m@icloud.com', '01032342996', 'yyyyyyyyy', 'تمام كد', NULL),
(36, 'joohassan', 'youssefhassan22m@icloud.com', '01032342996', 'abshaway', 'يوسف 22 سنه', 60),
(40, 'ali', 'ali@icloud.com', '01023161119', 'elfayoum', '33sana', 71),
(41, 'Eman', 'eman65540@gmail.com', '01091398406', 'Fayium', 'I\'m just craftswoman, I love made things with my hands', 72),
(42, 'sama', 'sama233@gmail.com', '01022357610', 'cairo', 'Hello, I\'m here...', 73),
(43, 'Nada', 'nada300@gmail.com', '01022358810', 'Alex', '', 74),
(44, 'Ahmed', 'ahmed200@gmail.com', '011336176610', 'Alex', 'I\'m  craftsman......', 75),
(45, 'doaa', 'doaaa3@gmail.com', '0123336974', 'Fayium', '', 76),
(46, 'mohamed ahmed', 'mohamedahmed1@icloud.com', '01032342996', 'abshaway', '20سنه', 77),
(47, 'youssef joo', 'youssefjoo@icloud.com', '01032342996', 'abshaway', '23 sana', 78);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('Seller','Buyer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcategary`
--
ALTER TABLE `addcategary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ills`
--
ALTER TABLE `ills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profile_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcategary`
--
ALTER TABLE `addcategary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ills`
--
ALTER TABLE `ills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_user` FOREIGN KEY (`user_id`) REFERENCES `ills` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
