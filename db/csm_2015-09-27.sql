-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2015 at 04:02 PM
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
(18, 'ssssssssssssssssssssssssssss'),
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
(9, 'p code', 'p name', 23, 16, '24.00', '22.00', 10, '2015-09-12'),
(10, 'kane nga product', 'ssdf', 23, 13, '3.00', '3.00', 3, '2015-09-23'),
(11, 'dzf', 'sdf', 25, 14, '0.00', '2.00', 0, '2015-09-26');

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
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
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
(1, 'admin', 'admin', 'Jameshwart', 'Lopez', 'Male', '09336888305', 'jameshwartlopez@gmail.com', 'http://localhost/csm/public/img/profile-pics/2.jpg', 0, 0),
(13, 'user', 'kk', 'usersdf', 'LastName', 'Male', '3', 'user', 'http://localhost/csm/public/img/profile-pics/1.jpg', 1, 0),
(14, 'sss', 'ss', 'ss', 'ss', 'Male', 'ss', 'ss', 'http://localhost/csm/public/img/profile-pics/2.jpg', 1, 0),
(15, 'sdf', 'sdflj', 'sdlfkj', 'lsdkjf', 'Male', 'lsdkjf', 'sdlfj', 'http://localhost/csm/public/img/profile-pics/2.jpg', 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
