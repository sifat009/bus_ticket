-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2017 at 10:01 AM
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
  `route` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seat_number`, `available`, `bus_id`) VALUES
(1, 'A1', '1', 1),
(2, 'A2', '1', 1),
(3, 'A3', '1', 1),
(4, 'A4', '1', 1),
(5, 'A5', '1', 1),
(6, 'A6', '1', 1),
(7, 'A7', '1', 1),
(8, 'A8', '1', 1),
(9, 'A9', '1', 1),
(10, 'A10', '1', 1),
(11, 'B1', '1', 1),
(12, 'B2', '1', 1),
(13, 'B3', '1', 1),
(14, 'B4', '1', 1),
(15, 'B5', '1', 1),
(16, 'B6', '1', 1),
(17, 'B7', '1', 1),
(18, 'B8', '1', 1),
(19, 'B9', '1', 1),
(20, 'B10', '1', 1),
(21, 'C1', '1', 1),
(22, 'C2', '1', 1),
(23, 'C3', '1', 1),
(24, 'C4', '1', 1),
(25, 'C5', '1', 1),
(26, 'C6', '1', 1),
(27, 'C7', '1', 1),
(28, 'C8', '1', 1),
(29, 'C9', '1', 1),
(30, 'C10', '1', 1),
(31, 'A1', '1', 2),
(32, 'A2', '1', 2),
(33, 'A3', '1', 2),
(34, 'A4', '1', 2),
(35, 'A5', '1', 2),
(36, 'A6', '1', 2),
(37, 'A7', '1', 2),
(38, 'A8', '1', 2),
(39, 'A9', '1', 2),
(40, 'A10', '1', 2),
(41, 'B1', '1', 2),
(42, 'B2', '1', 2),
(43, 'B3', '1', 2),
(44, 'B4', '1', 2),
(45, 'B5', '1', 2),
(46, 'B6', '1', 2),
(47, 'B7', '1', 2),
(48, 'B8', '1', 2),
(49, 'B9', '1', 2),
(50, 'B10', '1', 2),
(51, 'C1', '1', 2),
(52, 'C2', '1', 2),
(53, 'C3', '1', 2),
(54, 'C4', '1', 2),
(55, 'C5', '1', 2),
(56, 'C6', '1', 2),
(57, 'C7', '1', 2),
(58, 'C8', '1', 2),
(59, 'C9', '1', 2),
(60, 'C10', '1', 2),
(61, 'A1', '1', 3),
(62, 'A2', '1', 3),
(63, 'A3', '1', 3),
(64, 'A4', '1', 3),
(65, 'A5', '1', 3),
(66, 'A6', '1', 3),
(67, 'A7', '1', 3),
(68, 'A8', '1', 3),
(69, 'A9', '1', 3),
(70, 'A10', '1', 3),
(71, 'B1', '1', 3),
(72, 'B2', '1', 3),
(73, 'B3', '1', 3),
(74, 'B4', '1', 3),
(75, 'B5', '1', 3),
(76, 'B6', '1', 3),
(77, 'B7', '1', 3),
(78, 'B8', '1', 3),
(79, 'B9', '1', 3),
(80, 'B10', '1', 3),
(81, 'C1', '1', 3),
(82, 'C2', '1', 3),
(83, 'C3', '1', 3),
(84, 'C4', '1', 3),
(85, 'C5', '1', 3),
(86, 'C6', '1', 3),
(87, 'C7', '1', 3),
(88, 'C8', '1', 3),
(89, 'C9', '1', 3),
(90, 'C10', '1', 3),
(91, 'A1', '1', 4),
(92, 'A2', '1', 4),
(93, 'A3', '1', 4),
(94, 'A4', '1', 4),
(95, 'A5', '1', 4),
(96, 'A6', '1', 4),
(97, 'A7', '1', 4),
(98, 'A8', '1', 4),
(99, 'A9', '1', 4),
(100, 'A10', '1', 4),
(101, 'B1', '1', 4),
(102, 'B2', '1', 4),
(103, 'B3', '1', 4),
(104, 'B4', '1', 4),
(105, 'B5', '1', 4),
(106, 'B6', '1', 4),
(107, 'B7', '1', 4),
(108, 'B8', '1', 4),
(109, 'B9', '1', 4),
(110, 'B10', '1', 4),
(111, 'C1', '1', 4),
(112, 'C2', '1', 4),
(113, 'C3', '1', 4),
(114, 'C4', '1', 4),
(115, 'C5', '1', 4),
(116, 'C6', '1', 4),
(117, 'C7', '1', 4),
(118, 'C8', '1', 4),
(119, 'C9', '1', 4),
(120, 'C10', '1', 4),
(121, 'A1', '1', 5),
(122, 'A2', '1', 5),
(123, 'A3', '1', 5),
(124, 'A4', '1', 5),
(125, 'A5', '1', 5),
(126, 'A6', '1', 5),
(127, 'A7', '1', 5),
(128, 'A8', '1', 5),
(129, 'A9', '1', 5),
(130, 'A10', '1', 5),
(131, 'B1', '1', 5),
(132, 'B2', '1', 5),
(133, 'B3', '1', 5),
(134, 'B4', '1', 5),
(135, 'B5', '1', 5),
(136, 'B6', '1', 5),
(137, 'B7', '1', 5),
(138, 'B8', '1', 5),
(139, 'B9', '1', 5),
(140, 'B10', '1', 5),
(141, 'C1', '1', 5),
(142, 'C2', '1', 5),
(143, 'C3', '1', 5),
(144, 'C4', '1', 5),
(145, 'C5', '1', 5),
(146, 'C6', '1', 5),
(147, 'C7', '1', 5),
(148, 'C8', '1', 5),
(149, 'C9', '1', 5),
(150, 'C10', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL,
  `action` tinyint(1) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'sifat', '44d67420cadef41722bb82e96e3a6c0c');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
