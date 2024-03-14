-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 10:15 PM
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
-- Database: `airline_meal`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_ID` int(11) NOT NULL,
  `customer_ID` int(11) DEFAULT NULL,
  `isAdmin` bit(1) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_ID`, `customer_ID`, `isAdmin`, `email`, `password`, `username`) VALUES
(1001, 101, b'1', 'caira_lee@gmail.com', 'cmleeDLSU1001', 'cairalee'),
(1002, 102, b'0', 'cymbeline_lignes@gmail.com', 'calignesDLSU1002', 'cymlignes'),
(1003, 103, b'0', 'marc_Baroja@gmail.com', 'mjbarojaDLSU1003', 'marcbaroja'),
(1004, 104, b'0', 'marius_manoloto@gmail.com', 'memanolotoDLSU1004', 'mariusm'),
(1005, 105, b'0', 'laiven_banez@gmail.com', 'lbanezDLSU1005', 'laivenb'),
(1006, 106, b'0', 'jean_mariano@gmail.com', 'jmmarianoDLSU1006', 'jeanm'),
(1007, 107, b'0', 'josheart_adrienne@gmail.com', 'jadreinneDLSU1007', 'joshearta');

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE `combo` (
  `combo_ID` int(11) NOT NULL,
  `combo_Name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `combo`
--

INSERT INTO `combo` (`combo_ID`, `combo_Name`, `price`) VALUES
(10, 'Combo 10', 652.50),
(15, 'Combo 15', 578.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(11) NOT NULL,
  `customer_Name` varchar(255) DEFAULT NULL,
  `contact_Number` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `customer_Name`, `contact_Number`) VALUES
(101, 'Cayra Maxine Lee', 9124351248),
(102, 'Cymbeline Anne Lignes', 9126134760),
(103, 'Marc Jethro Baroja', 9514829529),
(104, 'Marius Enrico Manaloto', 9482756274),
(105, 'Laiven Banez', 9574829057),
(106, 'Jean Mikael Mariano', 9572850382),
(107, 'Josheart Adrienne', 9582017582);

-- --------------------------------------------------------

--
-- Table structure for table `discountedorderitem`
--

CREATE TABLE `discountedorderitem` (
  `discount_ID` int(11) NOT NULL,
  `order_ID` int(11) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `isPWD` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discountedorderitem`
--

INSERT INTO `discountedorderitem` (`discount_ID`, `order_ID`, `discount_amount`, `isPWD`) VALUES
(10001, 11002, 86.70, 0);

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `drink_ID` int(11) NOT NULL,
  `drink_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`drink_ID`, `drink_name`, `price`) VALUES
(1, 'Orange Juice', 100.00),
(2, 'Coca-Cola Can', 100.00),
(3, 'Coffee (Hot/Cold)', 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `maindish`
--

CREATE TABLE `maindish` (
  `dish_ID` int(11) NOT NULL,
  `dish_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maindish`
--

INSERT INTO `maindish` (`dish_ID`, `dish_name`, `price`) VALUES
(1, 'Carbonara', 350.00),
(2, 'Chicken Adobo', 350.00),
(3, 'Salmon Steak', 400.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(11) NOT NULL,
  `customer_ID` int(11) DEFAULT NULL,
  `main_ID` int(11) DEFAULT NULL,
  `side_ID` int(11) DEFAULT NULL,
  `drink_ID` int(11) DEFAULT NULL,
  `combo_ID` int(11) DEFAULT NULL,
  `flight_no` int(11) DEFAULT NULL,
  `orderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `customer_ID`, `main_ID`, `side_ID`, `drink_ID`, `combo_ID`, `flight_no`, `orderDate`) VALUES
(11001, 106, 1, 3, 3, NULL, 217, '2024-03-10'),
(11002, 103, NULL, NULL, NULL, 15, 220, '2024-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `sidedish`
--

CREATE TABLE `sidedish` (
  `side_ID` int(11) NOT NULL,
  `side_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sidedish`
--

INSERT INTO `sidedish` (`side_ID`, `side_name`, `price`) VALUES
(1, 'Fruit Cocktail', 180.00),
(2, 'Mashed Potato', 150.00),
(3, 'Mac N\' Cheese', 175.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_ID` int(11) NOT NULL,
  `order_ID` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `isPaid` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_ID`, `order_ID`, `total_price`, `transaction_date`, `isPaid`) VALUES
(10001, 11001, 600.00, NULL, 0),
(10002, 11002, 578.00, '2024-03-11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`combo_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `discountedorderitem`
--
ALTER TABLE `discountedorderitem`
  ADD PRIMARY KEY (`discount_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`drink_ID`);

--
-- Indexes for table `maindish`
--
ALTER TABLE `maindish`
  ADD PRIMARY KEY (`dish_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `customer_ID` (`customer_ID`),
  ADD KEY `main_ID` (`main_ID`),
  ADD KEY `side_ID` (`side_ID`),
  ADD KEY `drink_ID` (`drink_ID`),
  ADD KEY `combo_ID` (`combo_ID`);

--
-- Indexes for table `sidedish`
--
ALTER TABLE `sidedish`
  ADD PRIMARY KEY (`side_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`);

--
-- Constraints for table `discountedorderitem`
--
ALTER TABLE `discountedorderitem`
  ADD CONSTRAINT `discountedorderitem_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`main_ID`) REFERENCES `maindish` (`dish_ID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`side_ID`) REFERENCES `sidedish` (`side_ID`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`drink_ID`) REFERENCES `drink` (`drink_ID`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`combo_ID`) REFERENCES `combo` (`combo_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
