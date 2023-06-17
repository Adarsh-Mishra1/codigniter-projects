-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2022 at 07:38 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `category` int DEFAULT '0',
  `sub_category` int DEFAULT '0',
  `title` varchar(50) DEFAULT '0',
  `description` varchar(50) DEFAULT '0',
  `amount` varchar(50) DEFAULT '0',
  `discount` varchar(50) DEFAULT '0',
  `payable_amount` varchar(50) DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `user_id`, `category`, `sub_category`, `title`, `description`, `amount`, `discount`, `payable_amount`) VALUES
(1, 11, 3, 3, 'Shopping', 'just', '300', '10', '200'),
(20, 11, 1, 1, 'Adarsg', 'student', '1000', '50%', '500'),
(3, 11, 1, 1, 'Adarsg', 'student', '1000', '50%', '500'),
(2, 11, 3, 3, 'Adarsg', 'student', '1000', '50%', '500'),
(19, 11, 1, 2, 'Adarsh1', 'Desc1', '341', '441', '41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
