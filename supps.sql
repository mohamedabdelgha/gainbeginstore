-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 03:29 PM
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
-- Database: `supps`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comments`) VALUES
(3, 'محمد عبد الغني', 'انا سعيد بالتعامل معكم وساعاود التعامل قريبا');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `prod_name`, `quantity`, `price`, `user_id`, `image`, `date`) VALUES
(48, 'mr.x iso testo', '3', '750', 4, 'prod-images/IMG_20230422_012213_513.jpeg', '2023-10-15'),
(49, 'omega 3', '2', '110', 4, 'prod-images/IMG_20230422_012213_205.jpeg', '2023-10-15'),
(50, 'high quality checker', '1', '99', 4, 'prod-images/IMG_20230510_004943_962.jpg', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `sort` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`id`, `name`, `image`, `description`, `price`, `sort`) VALUES
(7, 'mr.x', 'prod-images/IMG_20230422_012213_513.jpeg', 'its an amazing supplement helps your muscles get stronger and bigger', '500', 'Mass gainers'),
(8, 'anabolic mass', 'prod-images/IMG_20230422_012213_244.jpeg', 'its an amazing supplement helps your muscles get stronger and bigger', '500', 'Whey protein'),
(9, 'mr.x iso testo', 'prod-images/IMG_20230422_012213_513.jpeg', 'its an amazing supplement helps your muscles get stronger and bigger', '750', 'Whey protein'),
(10, 'mr.x bcaa', 'prod-images/IMG_20230422_012213_306.jpeg', 'its an amazing supplement helps your muscles get stronger and bigger', '110', 'Post workout & Recovery'),
(11, 'bad ass', 'prod-images/IMG_20230422_012254_015.jpg', 'its an amazing supplement helps your muscles get stronger and bigger', '750', 'Whey protein'),
(12, 'bad ass BCAA', 'prod-images/IMG_20230422_012258_169.jpg', 'its an amazing supplement helps your muscles get stronger and bigger', '350', 'Post workout & Recovery'),
(13, 'anabolic criaten', 'prod-images/IMG_20230422_012245_362.jpg', 'its an amazing supplement helps your muscles get stronger and bigger', '110', 'Pre-workout & energy'),
(14, 'v-complex pro whey', 'prod-images/IMG_20230422_012250_204.jpg', 'its an amazing supplement helps your muscles get stronger and bigger', '750', 'Whey protein'),
(15, 'vs BCAA', 'prod-images/IMG_20230510_173753_985.jpg', 'its an amazing supplement helps your muscles get stronger and bigger', '110', 'Pre-workout & energy'),
(16, 'omega 3', 'prod-images/IMG_20230422_012213_205.jpeg', 'its an amazing supplement helps your muscles get stronger and bigger', '110', 'Post workout & Recovery'),
(17, 'collagen', 'prod-images/IMG_20230422_012237_603.jpg', 'its an amazing supplement helps your muscles get stronger and bigger', '110', 'Fat burners'),
(18, 'high quality checker', 'prod-images/IMG_20230510_004943_962.jpg', 'its an amazing supplement helps your muscles get stronger and bigger', '99', 'Pre-workout & energy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `number` int(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `number`, `country`, `city`, `address`) VALUES
(4, 'mohamed', 'elghani888@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 1014805573, 'egypt', 'damnhur', 'abo elrish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
