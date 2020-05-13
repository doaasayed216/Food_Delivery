-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 07:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `food_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`food_name`, `price`, `quantity`, `username`) VALUES
('Pizza Sea Food', 70, 3, 'sara'),
('Pizza Sea Food', 70, 2, 'doaa');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` int(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`fullname`, `username`, `email`, `password`, `address`, `contact`) VALUES
('alaa diaa', 'alaa', 'alaa@gmail.com', 123, 'cairo', 1245626),
('ashraf saeed', 'ashraf', 'ashraf@gmail.com', 123, 'cairo', 12354488),
('doaa sayed', 'doaa', 'doaa@gmail.com', 123, 'cairo', 123456789),
('fady nader', 'fady', 'fady@gmail.com', 123, 'cairo', 124596),
('sara selim', 'sara', 'sara@gmail.com', 123, 'cairo', 12589566);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `img_path` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`food_id`, `food_name`, `description`, `price`, `img_path`) VALUES
(1, 'Chicken BBQ', 'All dishes served with two of your choice \"rice, sauteed, mashed potato and fries\" or pasta', 79, 'images/Chicken BBQ.jpeg'),
(2, 'Chili Beef Burger', 'Bread bun, mayo, capucha, minced meat, pickles, cheddar slice,cheddar sauce, beef burger, fries', 55, 'images/chilli.jpeg'),
(3, 'Grilled Salmon', 'All dishes served with two of your choice ', 169, 'images/grilledsalmon.jpeg'),
(4, 'Pizza Sea Food', 'Sea crustacean mix shrimp, crap, calamari , green pepper, fresh tomato,onion, black olive, tomato sauce, mozzarella', 70, 'images/seafood.jpeg'),
(5, 'Spring Rolls', 'Delicious Spring Rolls by Dragon Hut, Delhi. Order now!!!', 65, 'images/Spring_Rolls.jpg'),
(6, 'Meurig Fish', 'Try Meurig - A whole Pomfret fish grilled with tangy marination & served with grilled onions and tomatoes.', 60, 'images/Meurig.jpg'),
(7, 'Baahubali Thali', 'Baahubali Thali is accompanied by Kattapa Biriyani, Devasena Paratha, Bhalladeva Patiala Lassi', 75, 'images/Baahubali_Thali.jpg'),
(8, 'Juicy Masala', 'Juicy Masala Paneer Kathi Roll loaded with Masala Paneer chunks, onion & Mayo.', 40, 'images/Masala_Paneer_Kathi_Roll.jpg'),
(9, 'Chocolate Truffle', 'Lose all senses over this very delicious chocolate hazelnut truffle.', 99, 'images/Chocolate_Hazelnut_Truffle.jpg'),
(10, 'Choco Chip Shake', 'Happy Happy Choco Chip Shake - a perfect party sweet treat.', 80, 'images/Happy_Happy_Choco_Chip_Shake.jpg'),
(11, 'Cheese Blast Sandwich', 'Lose all senses over this very delicious Cheese Blast Sandwich', 56, 'images/Cheese_Blast_Sandwich.jpg'),
(12, 'Chicken Burger', 'Lose all senses over this very delicious shot gun Chicken Burger', 54, 'images/Shot_Gun_Chicken_Burger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`fullname`, `username`, `email`, `password`, `contact`) VALUES
('alaa diaa', 'alaa', 'alaa@gmail.com', '123', 123446896),
('ashraf saeed', 'ashraf', 'ashraf@gmail.com', '123', 145896),
('doaa sayed', 'doaa', 'doaa@gmail.com', '123', 1234566795),
('fady nader', 'fady', 'fady@gmail.com', '123', 1254786),
('sara selim', 'sara', 'sara@gmail.com', '123', 12589566);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `food_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`food_name`, `price`, `quantity`, `username`) VALUES
('Chili Beef Burger', 55, 1, 'ashraf'),
('Pizza Sea Food', 70, 2, 'ashraf'),
('Grilled Salmon', 169, 1, 'alaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `username` (`username`),
  ADD KEY `food_name` (`food_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`food_id`),
  ADD UNIQUE KEY `food_name` (`food_name`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `username` (`username`),
  ADD KEY `orders_ibfk_3` (`food_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`food_name`) REFERENCES `items` (`food_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`food_name`) REFERENCES `items` (`food_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
