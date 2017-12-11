-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 01:01 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1001, 'Fastrack'),
(2001, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1000, 'Book'),
(2000, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `negotiation`
--

CREATE TABLE `negotiation` (
  `prodId` varchar(100) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodId` varchar(100) NOT NULL,
  `prodName` varchar(50) NOT NULL,
  `prodPrice` float NOT NULL,
  `prodBrand` varchar(50) NOT NULL,
  `prodDesc` varchar(100) NOT NULL,
  `prodImg` varchar(50) NOT NULL,
  `prodCat` varchar(20) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodId`, `prodName`, `prodPrice`, `prodBrand`, `prodDesc`, `prodImg`, `prodCat`, `user`) VALUES
('1', 'Milton Bottle', 479, 'Milton', '500ml,Thermosteel', 'img/prodImg/bot1.jpg', 'Home', 'John'),
('2', 'Nivia Radar Bottle', 250, 'Nivia', '600ml', 'img/prodImg/bot2.jpg', 'Home', 'Smith'),
('3', 'IShake Hercules Bottle', 215, 'IShake', '700ml', 'img/prodImg/bot3.jpg', 'Home', 'Mary'),
('4', 'Nivia Ultra Sipper', 130, 'Nivia', '600ml', 'img/prodImg/bot4.jpg', 'Home', 'John'),
('5', 'Cello Lunch Box', 360, 'Cello', 'Polypropylene,225ml,4 piece', 'img/prodImg/lb1.jpg', 'Home', 'John'),
('6', 'Milton Double Decker Lunch Box', 250, 'Milton', 'Double Decker', 'img/prodImg/lb2.jpg', 'Home', 'Mary'),
('7', 'Signoraware Lunch Box', 461, 'Signoraware', 'Bag provided', 'img/prodImg/lb3.jpg', 'Home', 'Susan'),
('8', 'Espoir Analogue Watch', 500, 'Espoir', 'Men\'s watch', 'img/prodImg/wa1.jpg', 'Personal', 'Akshat'),
('9', 'Timex Analogue Watch', 710, 'Timex', 'Men\'s watch', 'img/prodImg/wa2.jpg', 'Personal', 'Akshat'),
('10', 'Fossil Touchscreen Watch', 1300, 'Fossil', 'Men\'s watch,Touchscreen', 'img/prodImg/wa3.jpg', 'Personal', 'Anuj'),
('11', 'Geneva Analogue Watch', 350, 'Geneva', 'Women\'s watch', 'img/prodImg/wa4.jpg', 'Personal', 'Antara'),
('12', 'Kitcone Analogue Watch', 500, 'Kitcone', 'Women\'s watch', 'img/prodImg/wa5.jpg', 'Personal', 'Antara'),
('13', 'Geneva Analogue Watch', 350, 'Geneva', 'Women\'s watch', 'img/prodImg/wa6.jpg', 'Personal', 'Antara'),
('14', 'General Knowledge 2018', 20, 'Manohar Pandey', 'Paperback', 'img/prodImg/bo1.jpg', 'Book', 'Shubhadeep'),
('15', 'Indian Economy', 345, 'Ramesh Singh', 'Paperback', 'img/prodImg/bo2.jpg', 'Book', 'Allan'),
('16', 'Theory of Computation', 220, 'Mishra K.L.P', 'Paperback', 'img/prodImg/bo3.jpg', 'Book', 'Allan'),
('17', 'Cup', 150, 'Milton', 'asd', 'img/prodImg/bo4.jpg', '123', 'Shubhadeep');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contactno` bigint(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `emailid` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`username`, `password`, `name`, `contactno`, `Address`, `emailid`) VALUES
('wgufga', 'jgvjbcs', 'gfdjak', 7659823, 'jbzlkfbakjs\r\nakhgkadf', 'jsjfa@dsaj.com'),
('gruqi', '4322', 'dkslbgds', 87427441, 'bfdjbfs', 'vbsdkv@jsba'),
('akshatc', 'akshat1234567', 'Akshat Chhabra', 7528953123, 'dkasfnklan\r\nosahjfposaj', 'akshat@gmail.com'),
('dshubh', 'dshubh', 'shubhadeep', 1234567890, 'VIT Vellore', 'sd@gmail.com'),
('Allan', 'allan123', 'Allan', 1234567890, 'VIT Vellore                            ', 'allan@vit.in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `negotiation`
--
ALTER TABLE `negotiation`
  ADD PRIMARY KEY (`prodId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodId`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
