-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 04:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects_c1`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'B1'),
(5, 'C1'),
(7, 'C2'),
(8, 'D2'),
(9, 'E5');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `person_id` varchar(10) NOT NULL,
  `level_id` varchar(10) NOT NULL,
  `member_status` varchar(10) NOT NULL,
  `member_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `password`, `firstname`, `lastname`, `person_id`, `level_id`, `member_status`, `member_img`) VALUES
(3, 'admin', '123', 'admin', 'admin', '55555', '1', 'admin', '่่่'),
(12, 'ikla', '778', 'ikla', 'nahngo', '1000123', '', 'user', ''),
(13, 'coll', '789', 'coll789', 'aio', '26', '', 'user', ''),
(14, 'chutipon ', '123456', 'chutipon ', 'shawprakan', '10', '', 'user', ''),
(15, 'saharat', '1234', '799aa', '799aa', '', '7', 'user', ''),
(16, 'tonkla79', '789', 'tonkla', 'khuen', '85', '', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `datecreate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `member_id`, `type`, `datecreate`) VALUES
(6, 17, 'service', '2021-03-27 18:34:09'),
(7, 17, 'service', '2021-03-27 18:35:03'),
(8, 17, 'service', '2021-03-27 18:36:41'),
(9, 17, 'service', '2021-03-27 18:37:08'),
(10, 17, 'service', '2021-03-27 18:37:24'),
(11, 17, 'product', '2021-03-27 18:40:55'),
(12, 18, 'service', '2021-03-27 19:49:57'),
(13, 18, 'product', '2021-03-27 19:54:28'),
(14, 18, 'product', '2021-03-27 19:54:57'),
(15, 18, 'product', '2021-03-27 19:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `detail_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`detail_id`, `orders_id`, `service_id`, `product_id`, `amount`) VALUES
(17, 6, 1, 0, 2),
(18, 7, 1, 0, 1),
(19, 7, 2, 0, 2),
(20, 8, 1, 0, 2),
(21, 8, 2, 0, 1),
(22, 9, 1, 0, 3),
(23, 9, 2, 0, 1),
(24, 10, 1, 0, 3),
(25, 10, 2, 0, 1),
(26, 11, 0, 1, 1),
(27, 11, 0, 2, 2),
(28, 12, 2, 0, 3),
(29, 12, 3, 0, 1),
(30, 13, 0, 2, 9),
(31, 13, 0, 2, 9),
(32, 14, 0, 2, 9),
(33, 15, 0, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_cost`, `product_amount`, `product_img`) VALUES
(2, 'ปกใส', 3, 20, '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_cost` int(11) NOT NULL,
  `service_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_cost`, `service_img`) VALUES
(2, 'ปริ้นสี', 10, ''),
(3, 'ปริ้นรูปฟ', 19, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
