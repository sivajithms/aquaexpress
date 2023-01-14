-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 07:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aquaexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `boat`
--

CREATE TABLE `boat` (
  `name` varchar(25) NOT NULL,
  `boat_id` int(4) NOT NULL,
  `origin` varchar(10) NOT NULL,
  `destination` varchar(10) NOT NULL,
  `capacity` int(4) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boat`
--

INSERT INTO `boat` (`name`, `boat_id`, `origin`, `destination`, `capacity`, `status`) VALUES
('mdfk1', 34, 'marine', 'fort ', 20, 0),
('mkv1', 35, 'marine', 'vypin ', 25, 0),
('mdk1', 36, 'marine', 'kakkanad ', 30, 0),
('fkmd1', 37, 'fort', 'marine ', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `seat_count` int(3) NOT NULL,
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `book_id` int(4) NOT NULL,
  `payment_id` int(4) NOT NULL,
  `book_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`seat_count`, `id`, `user_id`, `book_id`, `payment_id`, `book_date`) VALUES
(6, 17, 2, 1, 7, '2023-01-19'),
(1, 17, 2, 2, 8, '2023-01-19'),
(5, 17, 2, 3, 9, '2023-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `payment_id` int(4) NOT NULL,
  `payment_amount` int(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_table`
--

INSERT INTO `payment_table` (`payment_id`, `payment_amount`, `date`) VALUES
(1, 30, '2023-01-19'),
(2, 30, '2023-01-19'),
(3, 30, '2023-01-19'),
(4, 30, '2023-01-19'),
(5, 30, '2023-01-19'),
(6, 60, '2023-01-19'),
(7, 60, '2023-01-19'),
(8, 10, '2023-01-19'),
(9, 50, '2023-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `place` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`place`) VALUES
('marine drive'),
('fort kochi'),
('vypin'),
('kakkanad');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(4) NOT NULL,
  `boat_id` int(11) NOT NULL,
  `starting_time` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `boat_id`, `starting_time`) VALUES
(15, 34, '10:00'),
(16, 34, '11:00'),
(17, 34, '12:00'),
(18, 34, '13:00'),
(19, 34, '14:00'),
(20, 34, '16:00'),
(21, 35, '10:00'),
(22, 35, '12:00'),
(23, 35, '16:00'),
(24, 36, '11:00'),
(25, 36, '13:00'),
(26, 36, '16:00'),
(27, 37, '10:00'),
(28, 37, '11:00'),
(29, 37, '12:00'),
(30, 37, '13:00'),
(31, 37, '14:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phno` int(12) NOT NULL,
  `age` int(2) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `phno`, `age`, `address`, `password`) VALUES
(1, 'admin', 3243243, 20, 'ponekkaara', 'admin'),
(2, 'homee', 3456323, 20, 'ponekkaara', 'admin'),
(3, 'admin', 324324332, 20, 'ponekkaara', 'admin'),
(5, 'admina', 2147483647, 0, '', 'admin'),
(6, 'admin', 123456789, 20, 'ponekkaara', 'admin'),
(7, 'admin1', 4356754, 20, 'ponekkaara', 'admin'),
(8, 'admin', 6547, 20, 'ponekkaara', 'admin'),
(9, 'admin', 23432, 20, 'ponekkaara', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boat`
--
ALTER TABLE `boat`
  ADD PRIMARY KEY (`boat_id`);

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boat_id` (`boat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boat`
--
ALTER TABLE `boat`
  MODIFY `boat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `book_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `payment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `time_table` (`id`),
  ADD CONSTRAINT `payment_id` FOREIGN KEY (`payment_id`) REFERENCES `payment_table` (`payment_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `boat_id` FOREIGN KEY (`boat_id`) REFERENCES `boat` (`boat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
