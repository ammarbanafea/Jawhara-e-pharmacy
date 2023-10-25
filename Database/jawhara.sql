-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 12:43 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jawhara`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productCode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `productName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `productDesc` varchar(500) CHARACTER SET latin1 NOT NULL,
  `productPrice` double(9,2) NOT NULL,
  `productImage` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productCode`, `productName`, `productDesc`, `productPrice`, `productImage`) VALUES
(1, 'm001', 'Panadol', 'Panadol-Extra Tablet 24 pcs', 6.95, 'Panadol.jpg'),
(2, 'm002', 'Fevadol', 'Fevadol 500 mg Tablet 20pcs\r\n\r\n', 10.50, 'Fevadol.jpg'),
(3, 'p001', 'Agiolax', 'Agiolax Granules 250 gm\r\n\r\n', 18.70, 'Agiolax.webp'),
(4, 'p002', 'Gaviscon', 'Gaviscon Peppermint 600ml', 25.35, 'Gaviscon.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `user_type` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `fullName`, `address`, `phoneNumber`, `create_datetime`, `user_type`) VALUES
(1, 'Ammar', '94d15762b4db0972cf48f99cdbb580c1', 'ammar@segi.edu.my', 'Ammar Ali Abdullah Ba Nafea', 'Casa Indah 1', 1162011778, '2020-04-30 02:22:11', 'admin'),
(2, 'Asif', '6f3c4bd06e7c378d955b9901c6b0c537', 'asifkhan@segi.edu.my', 'Asif Khan', 'Cova Suites', 1174869502, '2020-04-30 02:23:39', 'user'),
(3, 'Banafea', '3c2720ed911430e0df97f1d60bbed321', 'ammar@segi.com', 'Ammar Ba Nafea', 'Kota Damansara, Petaling Jaya, Selangor, Malaysia', 1162011778, '2020-04-30 09:45:33', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `productCode` (`productCode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
