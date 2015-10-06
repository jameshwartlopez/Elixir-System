-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2015 at 12:35 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(22, 'kane'),
(23, 'categories'),
(24, 'sdf'),
(25, 'sir van'),
(26, 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE IF NOT EXISTS `tbl_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` tinytext NOT NULL,
  `telphone_number` varchar(50) NOT NULL,
  `fax_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_person` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`id`, `name`, `address`, `telphone_number`, `fax_number`, `email`, `contact_person`) VALUES
(1, 'df', 'cebu', 'dfsdf', 'df', 'df', 'df'),
(2, 'df', 'df', 'df', 'df', 'df', 'df'),
(3, 'james', 'lopezdd', 'ksdf', 'sdf', 'sdf', 'sf'),
(4, 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf'),
(5, 'sd', 'sdf', 'sdf', 'dsf', 'sdf', 'sdf'),
(6, 'SDF', 'SDF', 'SDF', 'SDFD', 'SDF', 'SD'),
(7, 'sdlfjksldf', 'sldfj', 'slfkj', 'ljkjlk', 'ljlj', 'lkjl');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemunits`
--

CREATE TABLE IF NOT EXISTS `tbl_itemunits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_itemunits`
--

INSERT INTO `tbl_itemunits` (`id`, `name`) VALUES
(12, 'sdfii'),
(13, 'sdf'),
(14, 'sdfsdfsdfds'),
(15, 'sdf'),
(16, 'new item unit'),
(17, 'kanennenene'),
(18, 'ssssss'),
(19, 'kkkkkkkkkkkkkk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(50) NOT NULL,
  `item_unit` int(20) NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  `selling_price` decimal(12,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `code`, `name`, `category`, `item_unit`, `unit_price`, `selling_price`, `quantity`, `date`) VALUES
(9, 'p code', 'p name', 23, 16, '24.00', '22.00', 37, '2015-09-12'),
(10, 'kane nga product', 'ssdf', 23, 13, '3.00', '3.00', 4, '2015-09-23'),
(11, 'dzf', 'sdf', 25, 14, '0.00', '2.00', 2, '2015-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE IF NOT EXISTS `tbl_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `printer_model` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `date`, `client_id`, `printer_model`, `remarks`, `status`, `user_id`) VALUES
(1, '2015-09-29', 3, 'sdf', 'sdfsdasdasd', 'Machine operating satisfactorily', 1),
(2, '2015-09-29', 3, 'sdf', 'sdf', 'Machine operating satisfactorily', 1),
(3, '2015-09-29', 3, 'sdf', 'sdfdfsdfdf', 'Machine operating satisfactorily', 1),
(4, '2015-09-29', 3, 'sdf', 'sdfsdfsdfsdf', 'For in house repair', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockin`
--

CREATE TABLE IF NOT EXISTS `tbl_stockin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_no` varchar(6) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_stockin`
--

INSERT INTO `tbl_stockin` (`id`, `transaction_no`, `product_id`, `date`, `quantity`, `user`) VALUES
(1, '000015', 9, '2015-09-29', 1, 13),
(3, '000016', 10, '2015-09-30', 1, 1),
(4, '000017', 11, '2015-09-30', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockout`
--

CREATE TABLE IF NOT EXISTS `tbl_stockout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_no` varchar(6) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `cash` decimal(12,2) NOT NULL,
  `terms` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE IF NOT EXISTS `tbl_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `store_address` int(100) NOT NULL,
  `contact_number` int(30) NOT NULL,
  `contact_person` int(50) NOT NULL,
  `email_address` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE IF NOT EXISTS `tbl_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `No` varchar(6) NOT NULL,
  `type` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `balance` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `No`, `type`, `product_id`, `date`, `balance`, `user`) VALUES
(18, '000001', 'STOCK IN', 9, '2015-09-28', 10, 1),
(19, '000002', 'STOCK IN', 9, '2015-09-28', 11, 1),
(20, '000003', 'STOCK IN', 9, '2015-09-28', 15, 1),
(21, '000004', 'STOCK IN', 9, '2015-09-28', 16, 1),
(22, '000005', 'STOCK IN', 9, '2015-09-28', 20, 1),
(23, '000006', 'STOCK IN', 9, '2015-09-28', 21, 1),
(24, '000007', 'STOCK IN', 9, '2015-09-28', 22, 1),
(25, '000008', 'STOCK IN', 9, '2015-09-28', 32, 1),
(26, '000009', 'STOCK IN', 9, '2015-09-29', 32, 1),
(27, '000010', 'STOCK IN', 9, '2015-09-29', 33, 1),
(28, '000011', 'STOCK IN', 9, '2015-09-29', 33, 1),
(29, '000012', 'STOCK IN', 9, '2015-09-29', 34, 1),
(30, '000013', 'STOCK IN', 9, '2015-09-29', 35, 1),
(31, '000014', 'STOCK IN', 9, '2015-09-29', 36, 1),
(32, '000015', 'STOCK IN', 9, '2015-09-29', 37, 1),
(33, '000016', 'STOCK IN', 10, '2015-09-30', 4, 1),
(34, '000017', 'STOCK IN', 11, '2015-09-30', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `avatar` text NOT NULL,
  `user_type` int(11) NOT NULL,
  `deactivated` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `Firstname`, `LastName`, `gender`, `Contact`, `Email`, `avatar`, `user_type`, `deactivated`) VALUES
(1, 'admin', 'admin', 'Jameshwart', 'Lopez', 'Male', '09336888305', 'jameshwartlopez@gmail.com', 'http://csm.com/public/img/profile-pics/2.jpg', 0, 0),
(13, 'assistant', 'assistant', 'usersdf', 'LastName', 'Male', '3', 'user', 'http://localhost/csm/public/img/profile-pics/1.jpg', 1, 0),
(14, 'specialist', 'specialist', 'ss', 'ss', 'Male', 'ss', 'ss', 'http://localhost/csm/public/img/profile-pics/2.jpg', 2, 0),
(15, 'tech', 'tech', 'sdlfkj', 'lsdkjf', 'Male', 'lsdkjf', 'sdlfj', 'http://localhost/csm/public/img/profile-pics/2.jpg', 3, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
