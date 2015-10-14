-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2015 at 12:24 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `vat_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemunits`
--

CREATE TABLE IF NOT EXISTS `tbl_itemunits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `image_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `terms` int(11) NOT NULL,
  `date` date NOT NULL,
  `discount` decimal(12,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `o_return` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `Firstname`, `LastName`, `gender`, `Contact`, `Email`, `avatar`, `user_type`, `deactivated`) VALUES
(1, 'admin', 'admin2', 'Jameshwart', 'Lopezk', 'Male', '(93) 3688-8305', 'jameshwartlopez@gmail.com', 'http://csm.com/public/img/profile-pics/2.jpg', 0, 0),
(24, 'tech', 'james', 'james', 'james', 'Male', '(09) 0809-0809', 'tec@gmail.com', 'http://csm.com/public/img/profile-pics/2.jpg', 3, 0),
(25, 'specialist', 'specialist', 'Neil', 'sdfsdf', 'Male', '(89) 3482-3489', 'specialist@gmail.com', 'http://csm.com/public/img/profile-pics/1.jpg', 2, 0),
(26, 'assistant', 'assistant', 'assistan', 'assistatn', 'Male', '(34) 8934-3948', 'assistan@gmail.com', 'http://localhost/csm/public/img/profile-pics/2.jpg', 1, 0),
(27, 'james', 'james', 'sdf', 'sdf', 'Male', '(23) 2323-2323', 'james@gmail.com', 'http://csm.com/public/img/profile-pics/2.jpg', 2, 0),
(28, 'sdferewrwer', 'werwer', 'SDF', 'SDF', 'Male', '(34) 3434-3434', 'WER@GMAIL.COM', 'http://csm.com/public/img/profile-pics/2.jpg', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
