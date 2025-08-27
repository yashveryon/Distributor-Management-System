-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 09:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distributor`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` varchar(10) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
('', ''),
('gdd', 'gfdfg'),
('gdd', 'gfdfg'),
('y001', 'yash'),
('y001', 'yash'),
('y001', 'yash'),
('y001', 'yash'),
('p010', 'sumit'),
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` varchar(10) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `designation` varchar(10) DEFAULT NULL,
  `date_of_joining` varchar(10) DEFAULT NULL,
  `email` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `designation`, `date_of_joining`, `email`) VALUES
('e001', 'iyiyo', 'o', 'yoiy', 'oiy'),
('d', 'd', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `idgen`
--

CREATE TABLE `idgen` (
  `catid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `manuid` int(11) DEFAULT NULL,
  `prodid` int(11) DEFAULT NULL,
  `purid` int(11) DEFAULT NULL,
  `transid` int(11) DEFAULT NULL,
  `venid` int(11) DEFAULT NULL,
  `warrid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idgen`
--

INSERT INTO `idgen` (`catid`, `eid`, `manuid`, `prodid`, `purid`, `transid`, `venid`, `warrid`) VALUES
(23, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` varchar(10) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `contactNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `contactNumber`) VALUES
('m001', 'iutiut', 'uiut'),
('m004', 'uuh', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `mylogin`
--

CREATE TABLE `mylogin` (
  `id` varchar(10) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL,
  `counter` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mylogin`
--

INSERT INTO `mylogin` (`id`, `pwd`, `counter`) VALUES
('d', 'd', 90),
('d', 'd', 50);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(10) DEFAULT NULL,
  `serial_number` varchar(10) DEFAULT NULL,
  `product_type_id` varchar(10) DEFAULT NULL,
  `category_id` varchar(10) DEFAULT NULL,
  `manufacturer_id` varchar(10) DEFAULT NULL,
  `vendor_id` varchar(10) DEFAULT NULL,
  `purchase_id` varchar(10) DEFAULT NULL,
  `status_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` varchar(10) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `category_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `category_id`) VALUES
('P001', 'YASH', 'RAJ');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` varchar(10) DEFAULT NULL,
  `dateOfPurchase` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `dateOfPurchase`, `price`) VALUES
('p001', 'uy', 'uyu'),
('p004', 'ff', 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` varchar(10) DEFAULT NULL,
  `employee_id` varchar(10) DEFAULT NULL,
  `product_id` varchar(10) DEFAULT NULL,
  `product_issueDate` varchar(10) DEFAULT NULL,
  `product_returnDate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` varchar(10) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `contact_number`) VALUES
('v006', 'yiooiy', 'io');

-- --------------------------------------------------------

--
-- Table structure for table `warranty`
--

CREATE TABLE `warranty` (
  `id` varchar(10) DEFAULT NULL,
  `product_id` varchar(10) DEFAULT NULL,
  `vendor_id` varchar(10) DEFAULT NULL,
  `manufacturer_id` varchar(10) DEFAULT NULL,
  `purchase_id` varchar(10) DEFAULT NULL,
  `product__SerialNumber` varchar(10) DEFAULT NULL,
  `validity` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
