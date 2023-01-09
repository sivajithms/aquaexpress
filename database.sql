-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 05:52 PM
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
('aq12', 2, 'marine', 'fort ', 22, 0),
('dcsd', 3, 'marine', 'marine ', 33, 0),
('a122', 4, 'fort', 'vypin ', 20, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `payment_id` int(4) NOT NULL,
  `payment_amount` int(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `starting_time` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `boat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `book_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `payment_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

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
