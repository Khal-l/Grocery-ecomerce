-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2022 at 08:23 PM
-- Server version: 5.7.37-cll-lve
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moki_productdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `City` text COLLATE utf8_unicode_ci NOT NULL,
  `Zip` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`Address`, `City`, `Zip`) VALUES
('Bqosta', 'Saida', '0'),
('Bqosta', 'Saida', '0000'),
('aaramoon', 'bey', '9999'),
('Bqosta', 'Saida', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Producttb`
--

CREATE TABLE `Producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Producttb`
--

INSERT INTO `Producttb` (`id`, `product_name`, `product_price`, `product_image`, `Category`) VALUES
(5, 'Milk', 4, './upload/milk.jpg', 'Beverages'),
(6, '7Up', 2, './upload/7up.jpg', 'Beverages'),
(7, 'Orange Juice', 5, './upload/orange.jpeg', 'Beverages'),
(8, 'Cranberry\r\n              ', 4, './upload/cranberry.jpeg', 'Beverages'),
(9, 'Miranda', 2, './upload/miranda.jpg', 'Beverages'),
(10, 'Apple Juice', 4, './upload/apple.jpg', 'Beverages'),
(11, 'Bread', 2, './upload/bread.jpg', 'Bread'),
(12, 'Croissant', 1.5, './upload/croissant.jpg', 'Bread'),
(13, 'Doughnut', 1.65, './upload/doughnut.jpg', 'Bread'),
(14, 'Eclaire', 3, './upload/eclaire.jpg', 'Bread'),
(15, 'Cheescake', 4, './upload/cheescake.jpg', 'Bread'),
(16, 'Tiramisu', 5, './upload/tiramisu.jpg', 'Bread'),
(17, 'Tuna', 4, './upload/tuna.jpg', 'Canned'),
(20, 'Mushrooms', 4, './upload/mushroom.jpg', 'Canned'),
(21, 'Hummus', 4, './upload/hummus.jpg', 'Canned'),
(22, 'Mortadella', 3, './upload/mortadella.jpg', 'Canned'),
(23, 'Corn', 5, './upload/corn.jpg', 'Canned'),
(24, 'Beans', 4, './upload/beans.jpg', 'Canned'),
(25, 'Tomato Sauce', 5, './upload/tomato.jpg', 'Canned'),
(26, 'Sparklin Water', 3, './upload/sparkling.jpg', 'Beverages'),
(27, 'Cake', 4, './upload/cake.jpg', 'Bread');

-- --------------------------------------------------------

--
-- Table structure for table `Subscriber`
--

CREATE TABLE `Subscriber` (
  `ID` int(11) NOT NULL,
  `Email` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `ID` int(10) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `b-date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone_number` int(10) NOT NULL,
  `Email_address` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`ID`, `name`, `b-date`, `username`, `password`, `Phone_number`, `Email_address`, `user_type`) VALUES
(1, '', '', 'admin', '$2y$10$z78vzUwwCkWBm/9J5C0W7eP/xOFNK7NlXp4CXVOpz44mgD2SE5Uu2', 0, '', 1), //password is 12345
(8, 'Khalil Hijazi', '03/01/2022', 'khalil1', '$2y$10$A6UUirxKlhvzhsJjvsCRPeutpx28V91L0HtFt673Kj0Kscudu.OEm', 760000, 'khalil@gmail.com', 0),
(9, 'Nabil Kais', '08/11/2002', 'Nabil1', '$2y$10$vp03KA4RUu6QVREWFoRnLeb3OlnGQQStSKw0H7eCHRryY2Zj96aje', 76969002, 'nabilkays1@gmail.com', 0),
(10, 'Nabil kays', '08/11/2001', 'nabil', '$2y$10$ZP5tgUwe7VAfMik1i1hBRO2eMOcbI05wFmiCGWWq2PcmvEgYf/PYu', 76969002, 'kaisnabil@gmail.com', 0),
(11, 'Nabil kais', '08/11/2001', 'nabilk', '$2y$10$lqUzSS7Z5ywbN35ETq0g4..onZDf7uGIFiydXI0gEN.YhtSAywW9y', 76969002, 'nabilkais1@gmail.com', 0),
(12, 'nabil kais', '8/11/2001', 'NabilS', '$2y$10$dGAOMQMv1kAxOMhS7vMKFO1dpH/ohOGCrAPgfm4AzBYJG1ZHPcmeq', 76969002, 'kaisns@students.rhu.edu.lb', 0),
(13, 'Yara Abu Adla', '06/16/2021', 'yaraa', '$2y$10$PrQvFvpdlF19wpMEb0sxpuZOwjaEHdThui3ncoerlBYy1RyyUKnRS', 70625825, 'yaraabouadla4@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Producttb`
--
ALTER TABLE `Producttb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Subscriber`
--
ALTER TABLE `Subscriber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Producttb`
--
ALTER TABLE `Producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `Subscriber`
--
ALTER TABLE `Subscriber`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
