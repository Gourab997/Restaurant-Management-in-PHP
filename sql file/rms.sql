-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 02:24 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(50) NOT NULL,
  `foodname` varchar(20) NOT NULL,
  `foodprice` varchar(20) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `fcategory` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `foodname`, `foodprice`, `availability`, `fcategory`) VALUES
(5, 'polao', '100', 'Yes', 'Bangla'),
(8, 'biriyani', '220', 'Yes', 'Bangla'),
(9, 'Chicken Fry', '120', 'Yes', 'Chinese'),
(10, 'Thai Food', '520', 'Yes', 'Thai');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderno` int(100) NOT NULL,
  `foodname` varchar(255) NOT NULL,
  `foodprice` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `Cusname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderno`, `foodname`, `foodprice`, `availability`, `Cusname`, `email`, `phone`, `address`, `status`) VALUES
(1, 'polao', '100', 'Yes', 'Gourab', 'gourabg998@gmail.com', '01777581626', 'dhaka', ''),
(2, 'polao', '100', 'Yes', 'Gourab', 'gourabg998@gmail.com', '01777581626', 'comilla', ''),
(3, 'polao', '100', 'Yes', 'Gourab', 'gourabg998@gmail.com', '01777581626', 'yes', ''),
(4, 'polao', '100', 'Yes', 'Gourab', 'gourabg998@gmail.com', '01777581626', 'dhaka', 'yes'),
(5, 'polao', '100', 'Yes', 'Gourab', 'gourabg998@gmail.com', '01855570816', 'dhaka', '');

-- --------------------------------------------------------

--
-- Table structure for table `revervation`
--

CREATE TABLE `revervation` (
  `Bookingno` int(100) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `bdate` varchar(10) NOT NULL,
  `ptime` varchar(20) NOT NULL,
  `psize` varchar(20) NOT NULL,
  `srequest` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revervation`
--

INSERT INTO `revervation` (`Bookingno`, `uname`, `email`, `phone`, `bdate`, `ptime`, `psize`, `srequest`) VALUES
(1, 'gourab', 'gourabg998@gmail.com', '01777581626', '2020-05-22', '12:50', '100', 'asdldas'),
(2, 'shrabanti', 'gourabg98@gmail.com', '01777581626', '2020-05-22', '16:55', '50', 'adf'),
(3, 'Ratan', 'Ratan@gmail.com', '01627478941', '2020-05-16', '18:10', '200', 'no'),
(4, 'shrabanti', 'sgdf@gmail.com', '01855570816', '2020-05-15', '12:01', '20', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `usertype`, `username`, `firstname`, `lastname`, `phone`, `address`, `email`, `join_date`) VALUES
(18, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'productmanager', 'Gourab', 'gourab', 'ghosh', '01777581626', 'h-433', 'gourabg998@gmail.com', '2020-05-14'),
(19, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'deliveryman', 'Kotha', 'Kotha', 'Mandal', '01777581626', 'comilla', 'sgdf@gmail.com', '2020-05-14'),
(20, '8cb2237d0679ca88db6464eac60da96345513964', 'deliveryman', 'kotha', 'Kotha', 'Mandal', '01777581626', 'dhaka', 'ahemtonmoy@gmail.com', '2020-05-15'),
(21, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'productmanager', 'kotha123', 'Kotha', 'Mandal', '01855570816', 'comilla', 'shrabanti@gmail.com', '2020-05-15'),
(22, '8cb2237d0679ca88db6464eac60da96345513964', 'admin', 'Gourab', 'gourab', 'ghosh', '01777581626', 'dhaka', 'gourabg998@gmail.com', '2020-05-16'),
(23, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'productmanager', 'Kotha', 'Shrabanti', 'Mandal', '01855570816', 'dhaka', 'kotha@gmail.com', '2020-05-16'),
(24, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'deliveryman', 'Gourab', 'gourab', 'ghosh', '01777581626', 'dhaka', 'gourabg998@gmail.com', '2020-05-17'),
(25, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 'Gourab1997', 'gourab', 'ghosh', '01627478941', 'comilla', 'gourabg98@gmail.com', '2020-05-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderno`);

--
-- Indexes for table `revervation`
--
ALTER TABLE `revervation`
  ADD PRIMARY KEY (`Bookingno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `revervation`
--
ALTER TABLE `revervation`
  MODIFY `Bookingno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
