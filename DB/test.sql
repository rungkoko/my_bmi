-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 08:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_info`
--

CREATE TABLE `child_info` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `addnow` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `child_info`
--

INSERT INTO `child_info` (`id`, `member_id`, `first_name`, `last_name`, `birthday`, `address`, `addnow`) VALUES
(1, 339827, 'ฟกฟหกทฟา', 'า่ไฟาำ่ฟไ่กฟห', '2023-08-16', 'ฟกฟไำๆำๆไก', 'ๆไกๆไกไๆพๆไำๆไ'),
(2, 339827, 'waeawewe', 'qweqweqweqweq', '2023-08-16', 'wqeqweqw', 'ewqeqweqweq'),
(3, 549063, 'sadas', 'dsadasda', '2023-08-06', 'adadasdadada', 'ewqeqweqweq'),
(4, 549063, 'asdasdawewqe', 'qweqweqwew', '2023-08-08', 'asewq4rwqrqw', 'asdawewewq'),
(5, 339827, 'asdasdawewqe', 'qweqweqwew', '2023-08-10', 'asewq4rwqrqw', 'ewqeqweqweq');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `firstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phonenumber` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `member_id`, `username`, `password`, `gender`, `firstName`, `lastName`, `birthday`, `email`, `address`, `phonenumber`) VALUES
(1, 549063, 'rung123', '$2y$10$CGHDeJKB8hJfehzt86YV4.XYxkGknvMRbJtgRUOWIxnNMquz4DhR.', 'Male', 'rungchukiat', 'klangkeaw', '2023-08-01', 'asdjhasuj@gmail.com', 'sadasda', '0856987524'),
(2, 339827, 'sakda556', '$2y$10$LnQNVxNtODXInBUGqqCWxeBUwelhOTYh1yMo9zc3KGfZG8u3lNli.', 'Male', 'sadas', 'dsadasda', '2023-08-14', 'dasdsada@asdjka.com', 'adadasdadada', '1234567891'),
(3, 948045, 'rung555', '$2y$10$w1fcfMk1EVKwyR22Z2cfJ.MhT0XBf868fAvOOjmS77yQ9wiO9G6Fy', 'Male', 'sadas', 'dsadasda', '2023-08-16', 'dasdsada@asdjka.com', 'adadasdadada', '1234567891'),
(4, 557168, 'rung555', '$2y$10$5ZyfcFUWAvNKKDAV36XHjuBTuM.vh2CaOXaJsves1uo0XjC9L3gVC', 'Male', 'adaweweqwe', 'qwewqerwrqweqw', '2023-08-09', 'asdada@adasda.com', 'aewrwrqweqweq', '4568978954');

-- --------------------------------------------------------

--
-- Table structure for table `weight_data`
--

CREATE TABLE `weight_data` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `bmi_result` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `weight_data`
--

INSERT INTO `weight_data` (`id`, `member_id`, `timestamp`, `weight`, `height`, `age`, `bmi_result`) VALUES
(1, 0, '2023-08-25 20:17:49', 54, 180, 25, 16.67),
(2, 0, '2014-08-14 20:18:21', 54, 192, 47, 14.65),
(3, 0, '2023-08-25 20:19:21', 80, 192, 19, 21.7),
(4, 0, '2018-08-17 20:19:40', 50, 193, 24, 21.7),
(5, 0, '2023-08-25 20:31:39', 60, 170, 18, 20.76),
(6, 0, '2023-08-25 20:36:18', 115, 186, 23, 33.24),
(7, 0, '2023-08-25 21:53:55', 63, 187, 20, 18.02),
(8, 0, '2023-08-26 04:56:21', 56, 174, 23, 18.5),
(9, 0, '2023-08-26 05:19:07', 54, 180, 29, 16.67),
(10, 1, '2023-08-26 05:23:21', 54, 180, 29, 16.67),
(11, 2, '2023-08-26 05:24:04', 54, 180, 31, 16.67),
(12, 1, '2023-08-26 05:24:34', 54, 180, 15, 16.67),
(13, 1, '2023-08-26 05:26:43', 54, 180, 4, 16.67),
(14, 549063, '2023-08-26 05:27:47', 54, 180, 8, 16.67),
(15, 339827, '2023-08-26 05:28:26', 56, 177, 23, 17.87),
(16, 339827, '2023-08-26 05:28:48', 56, 177, 56, 17.87),
(17, 339827, '2023-08-26 05:36:43', 75, 201, 25, 18.56),
(18, 339827, '2023-08-26 05:39:47', 54, 180, 9, 16.67),
(19, 339827, '2023-08-26 05:44:15', 54, 180, 52, 16.67),
(20, 339827, '2023-08-26 05:45:31', 54, 180, 80, 16.67),
(21, 549063, '2023-08-26 05:52:12', 69, 175, 18, 22.53),
(22, 339827, '2023-08-28 01:37:56', 58, 203, 18, 14.07);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_info`
--
ALTER TABLE `child_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id` (`member_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `weight_data`
--
ALTER TABLE `weight_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_info`
--
ALTER TABLE `child_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `weight_data`
--
ALTER TABLE `weight_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_info`
--
ALTER TABLE `child_info`
  ADD CONSTRAINT `child_info_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `registration` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
