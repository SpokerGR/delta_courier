-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 03:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delta_courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `appointment_name` varchar(60) NOT NULL,
  `appointment_number` varchar(60) NOT NULL,
  `appointment_location` varchar(60) NOT NULL,
  `appointment_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_name`, `appointment_number`, `appointment_location`, `appointment_date`) VALUES
(1, 'test1', 'test2', 'test3', 'test4'),
(2, 'Ιωάννης Λιτσαρδόπουλος', '6986257812', 'Ιπποκράτους 22, Αθήνα', '05/06/2024 13:00'),
(3, 'Ιωάννης Λιτσαρδόπουλος', '6986257812', 'Ιπποκράτους 22, Αθήνα', '05/06/2024 13:00'),
(4, 'fs', '64536', 'Σταδίου 26, Αθήνα', '05/06/2024 13:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointments_free_dates`
--

CREATE TABLE `appointments_free_dates` (
  `appointments_free_dates_id` int(11) NOT NULL,
  `appointments_free_dates` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments_free_dates`
--

INSERT INTO `appointments_free_dates` (`appointments_free_dates_id`, `appointments_free_dates`) VALUES
(1, '05/06/2024 13:00'),
(2, '05/06/2024 12:00');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` int(11) NOT NULL,
  `tracking_name` varchar(60) NOT NULL,
  `tracking_phone` varchar(60) NOT NULL,
  `tracking_number` varchar(60) NOT NULL,
  `tracking_status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`tracking_id`, `tracking_name`, `tracking_phone`, `tracking_number`, `tracking_status`) VALUES
(1, 'Ιωάννης Λιτσαρδόπουλος', '6986257812', '03423250123', 'Διαλογή'),
(2, 'Ιωάννης Λιτσαρδόπουλος', '6986257812', '03423250122', 'Απεστάλη'),
(3, 'Ιωάννης Λιτσαρδόπουλος', '6986257812', '03423250121', 'Ακυρώθηκε');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_username` varchar(60) NOT NULL,
  `users_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_username`, `users_password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments_free_dates`
--
ALTER TABLE `appointments_free_dates`
  ADD PRIMARY KEY (`appointments_free_dates_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointments_free_dates`
--
ALTER TABLE `appointments_free_dates`
  MODIFY `appointments_free_dates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
