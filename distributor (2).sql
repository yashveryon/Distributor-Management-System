-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 04:31 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(10) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pwd`) VALUES
('yash', 'yash');

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
('', ''),
('C0023', 'frst');

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
('d', 'd', '', '', ''),
('E0011', 'uuhui', 'hiiy', 'uiui', 'yuyu'),
('E0013', 'done', 'done', '2022-01-20', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `idgen`
--

CREATE TABLE `idgen` (
  `catid` varchar(10) DEFAULT NULL,
  `protypid` varchar(10) DEFAULT NULL,
  `empid` varchar(10) DEFAULT NULL,
  `venid` varchar(10) DEFAULT NULL,
  `proid` varchar(10) DEFAULT NULL,
  `transid` varchar(10) DEFAULT NULL,
  `warid` varchar(10) DEFAULT NULL,
  `manuid` varchar(10) DEFAULT NULL,
  `purid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idgen`
--

INSERT INTO `idgen` (`catid`, `protypid`, `empid`, `venid`, `proid`, `transid`, `warid`, `manuid`, `purid`) VALUES
('14', '17', '14', '20', '12', '4', '16', '13', '12');

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
('m004', 'uuh', 'h'),
('M0012', 'khuyyy', 'yiyi');

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
('d', 'd', 238),
('d', 'd', 198),
('test1', 'test1', 69);

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

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `serial_number`, `product_type_id`, `category_id`, `manufacturer_id`, `vendor_id`, `purchase_id`, `status_type`) VALUES
('P001', 'ugut', 'PT0010', 'C0023', 'M0012', 'v006', 'p004', 'gg'),
('P0010', 'uuiui', 'PT0010', 'C0010', 'm004', 'V0010', 'p001', 'iio');

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
('P001', 'YASH', 'RAJ'),
('PT0010', 'uyy', 'C0023'),
('PT0016', 'done', 'C0023');

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
('p004', 'ff', 'ff'),
('P0010', 'ggjgk', 'jy');

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

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `employee_id`, `product_id`, `product_issueDate`, `product_returnDate`) VALUES
('T00', 'Select the', 'Select the', '', '');

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
('v006', 'yiooiy', 'io'),
('V0010', 'yuu', 'uy'),
('V0012', 'yash', '2022-01-06'),
('V0012', 'yash', '2022-01-06');

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
