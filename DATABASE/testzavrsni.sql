-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 08:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testzavrsni`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `salary` int(8) NOT NULL,
  `phone_number` int(13) NOT NULL,
  `address` varchar(60) NOT NULL,
  `uid` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `dob` date NOT NULL,
  `perks` int(11) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`first_name`, `last_name`, `id`, `salary`, `phone_number`, `address`, `uid`, `join_date`, `dob`, `perks`, `admin`) VALUES
('Domagoj', 'Subotic', 001, 1500, 123123, 'Brace Radica, Nijemci', 123123, '2023-10-31', '2003-10-01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
`id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id`, `admin`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 2),
('martin', '925d7518fc597af0e43f5606f9a51512', 2, 2),
('marko', 'c28aa76990994587b0e907683792297c', 3, 2),
('domagoj', 'deb9cfda7d9a8d0837f607ec5d461cbf', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `supplier_id` int(6) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `market_price` int(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `supplier_id`, `product_name`, `quantity`, `market_price`) VALUES
(100, 1, 'JD filter ulja motora', 3, 23),
(101, 1, 'JD filter zraka', 2, 106),
(102, 2, 'DF alternator 14V 150A', 1, 914),
(200, 2, 'BASF CORUM', 15, 68),
(201, 3, 'BASF REVYCARE', 28, 66),
(300, 3, 'KWS sjemenski kukuruz', 590, 50),
(301, 3, 'RWA smjeme pšenice', 950, 19);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `sdealer` varchar(20) NOT NULL,
  `semail` varchar(40) NOT NULL,
  `sid` int(11) NOT NULL,
  `saddress` varchar(50) NOT NULL,
  `sphone` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sdealer`, `semail`, `sid`, `saddress`, `sphone`) VALUES
('Novocommerce', 'dario.sokic@novocommerce.hr', 1, 'Jablanova 16 31000 Osijek', '456456'),
('Santini', 'santini@vk.t-com.hr', 2, 'Ante Starcevica 79 32100 Vinkovci', '789789'),
('Cezareja', 'cezareja@cezareja.hr', 3, 'Gorjani 175 32281 Ivankovo', '102030');

-- --------------------------------------------------------

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
