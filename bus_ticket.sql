-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 08:22 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bus_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE IF NOT EXISTS `buses` (
  `id` int(11) NOT NULL,
  `route_id` varchar(50) NOT NULL,
  `total_seats` int(11) NOT NULL DEFAULT '30',
  `time` varchar(20) NOT NULL,
  `active` char(1) NOT NULL DEFAULT '1',
  `price` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `route_id`, `total_seats`, `time`, `active`, `price`, `date`) VALUES
(1, '1', 30, '1:45 PM', '1', '500', '2017-08-23 13:31:39'),
(2, '2', 30, '9:45 AM', '1', '700', '2017-08-23 13:32:22'),
(3, '5', 30, '4:45 PM', '0', '500', '2017-08-23 13:32:35'),
(4, '1', 30, '8:15 PM', '1', '700', '2017-08-23 16:04:45'),
(5, '5', 30, '4:30 PM', '1', '500', '2017-08-24 13:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE IF NOT EXISTS `passengers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `start_place` varchar(20) NOT NULL,
  `depart_place` varchar(20) NOT NULL,
  `transection_id` varchar(50) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `name`, `mobile_number`, `start_place`, `depart_place`, `transection_id`, `bus_id`) VALUES
(3, 'sifat haque', '01932391487', 'Dhaka', 'Chittagong', '123456', 5),
(4, 'rifat haque', '01675545631', 'Dhaka', 'Chittagong', '12345', 5);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL,
  `direction` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `direction`) VALUES
(1, 'Dhaka to Comilla'),
(2, 'place (A) to place (B)'),
(3, 'place (E) to place (F)'),
(4, 'Dhanmondi to Sylhet'),
(5, 'Dhaka to Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `id` int(11) NOT NULL,
  `seat_number` varchar(11) NOT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  `bus_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seat_number`, `available`, `bus_id`, `passenger_id`) VALUES
(1, 'A1', '1', 1, 0),
(2, 'A2', '1', 1, 0),
(3, 'A3', '1', 1, 0),
(4, 'A4', '1', 1, 0),
(5, 'A5', '1', 1, 0),
(6, 'A6', '1', 1, 0),
(7, 'A7', '1', 1, 0),
(8, 'A8', '1', 1, 0),
(9, 'A9', '1', 1, 0),
(10, 'A10', '1', 1, 0),
(11, 'B1', '1', 1, 0),
(12, 'B2', '1', 1, 0),
(13, 'B3', '1', 1, 0),
(14, 'B4', '1', 1, 0),
(15, 'B5', '1', 1, 0),
(16, 'B6', '1', 1, 0),
(17, 'B7', '1', 1, 0),
(18, 'B8', '1', 1, 0),
(19, 'B9', '1', 1, 0),
(20, 'B10', '1', 1, 0),
(21, 'C1', '1', 1, 0),
(22, 'C2', '1', 1, 0),
(23, 'C3', '1', 1, 0),
(24, 'C4', '1', 1, 0),
(25, 'C5', '1', 1, 0),
(26, 'C6', '1', 1, 0),
(27, 'C7', '1', 1, 0),
(28, 'C8', '1', 1, 0),
(29, 'C9', '1', 1, 0),
(30, 'C10', '1', 1, 0),
(31, 'A1', '1', 2, 0),
(32, 'A2', '1', 2, 0),
(33, 'A3', '1', 2, 0),
(34, 'A4', '1', 2, 0),
(35, 'A5', '1', 2, 0),
(36, 'A6', '1', 2, 0),
(37, 'A7', '1', 2, 0),
(38, 'A8', '1', 2, 0),
(39, 'A9', '1', 2, 0),
(40, 'A10', '1', 2, 0),
(41, 'B1', '1', 2, 0),
(42, 'B2', '1', 2, 0),
(43, 'B3', '1', 2, 0),
(44, 'B4', '1', 2, 0),
(45, 'B5', '1', 2, 0),
(46, 'B6', '1', 2, 0),
(47, 'B7', '1', 2, 0),
(48, 'B8', '1', 2, 0),
(49, 'B9', '1', 2, 0),
(50, 'B10', '1', 2, 0),
(51, 'C1', '1', 2, 0),
(52, 'C2', '1', 2, 0),
(53, 'C3', '1', 2, 0),
(54, 'C4', '1', 2, 0),
(55, 'C5', '1', 2, 0),
(56, 'C6', '1', 2, 0),
(57, 'C7', '1', 2, 0),
(58, 'C8', '1', 2, 0),
(59, 'C9', '1', 2, 0),
(60, 'C10', '1', 2, 0),
(61, 'A1', '1', 3, 0),
(62, 'A2', '1', 3, 0),
(63, 'A3', '1', 3, 0),
(64, 'A4', '1', 3, 0),
(65, 'A5', '1', 3, 0),
(66, 'A6', '1', 3, 0),
(67, 'A7', '1', 3, 0),
(68, 'A8', '1', 3, 0),
(69, 'A9', '1', 3, 0),
(70, 'A10', '1', 3, 0),
(71, 'B1', '1', 3, 0),
(72, 'B2', '1', 3, 0),
(73, 'B3', '1', 3, 0),
(74, 'B4', '1', 3, 0),
(75, 'B5', '1', 3, 0),
(76, 'B6', '1', 3, 0),
(77, 'B7', '1', 3, 0),
(78, 'B8', '1', 3, 0),
(79, 'B9', '1', 3, 0),
(80, 'B10', '1', 3, 0),
(81, 'C1', '1', 3, 0),
(82, 'C2', '1', 3, 0),
(83, 'C3', '1', 3, 0),
(84, 'C4', '1', 3, 0),
(85, 'C5', '1', 3, 0),
(86, 'C6', '1', 3, 0),
(87, 'C7', '1', 3, 0),
(88, 'C8', '1', 3, 0),
(89, 'C9', '1', 3, 0),
(90, 'C10', '1', 3, 0),
(91, 'A1', '1', 4, 0),
(92, 'A2', '1', 4, 0),
(93, 'A3', '1', 4, 0),
(94, 'A4', '1', 4, 0),
(95, 'A5', '1', 4, 0),
(96, 'A6', '1', 4, 0),
(97, 'A7', '1', 4, 0),
(98, 'A8', '1', 4, 0),
(99, 'A9', '1', 4, 0),
(100, 'A10', '1', 4, 0),
(101, 'B1', '1', 4, 0),
(102, 'B2', '1', 4, 0),
(103, 'B3', '1', 4, 0),
(104, 'B4', '1', 4, 0),
(105, 'B5', '1', 4, 0),
(106, 'B6', '1', 4, 0),
(107, 'B7', '1', 4, 0),
(108, 'B8', '1', 4, 0),
(109, 'B9', '1', 4, 0),
(110, 'B10', '1', 4, 0),
(111, 'C1', '1', 4, 0),
(112, 'C2', '1', 4, 0),
(113, 'C3', '1', 4, 0),
(114, 'C4', '1', 4, 0),
(115, 'C5', '1', 4, 0),
(116, 'C6', '1', 4, 0),
(117, 'C7', '1', 4, 0),
(118, 'C8', '1', 4, 0),
(119, 'C9', '1', 4, 0),
(120, 'C10', '1', 4, 0),
(121, 'A1', '2', 5, 3),
(122, 'A2', '2', 5, 4),
(123, 'A3', '1', 5, 0),
(124, 'A4', '1', 5, 0),
(125, 'A5', '1', 5, 0),
(126, 'A6', '1', 5, 0),
(127, 'A7', '1', 5, 0),
(128, 'A8', '1', 5, 0),
(129, 'A9', '1', 5, 0),
(130, 'A10', '1', 5, 0),
(131, 'B1', '2', 5, 3),
(132, 'B2', '2', 5, 4),
(133, 'B3', '1', 5, 0),
(134, 'B4', '1', 5, 0),
(135, 'B5', '1', 5, 0),
(136, 'B6', '1', 5, 0),
(137, 'B7', '1', 5, 0),
(138, 'B8', '1', 5, 0),
(139, 'B9', '1', 5, 0),
(140, 'B10', '1', 5, 0),
(141, 'C1', '2', 5, 3),
(142, 'C2', '1', 5, 0),
(143, 'C3', '1', 5, 0),
(144, 'C4', '1', 5, 0),
(145, 'C5', '1', 5, 0),
(146, 'C6', '1', 5, 0),
(147, 'C7', '1', 5, 0),
(148, 'C8', '1', 5, 0),
(149, 'C9', '1', 5, 0),
(150, 'C10', '1', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL,
  `action` char(1) NOT NULL DEFAULT '2',
  `bus_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `action`, `bus_id`, `passenger_id`) VALUES
(2, '2', 1, 2),
(3, '2', 5, 3),
(4, '2', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'sifat', '44d67420cadef41722bb82e96e3a6c0c'),
(2, 'rifat', '35c0c28414ac08bb8b6729631f69ee01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
