-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 07:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_inventory`
--

CREATE TABLE `blood_inventory` (
  `id` int(11) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `blood_quantity` int(11) NOT NULL,
  `dispatch_units` int(11) NOT NULL,
  `collection_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_inventory`
--

INSERT INTO `blood_inventory` (`id`, `blood_type`, `blood_quantity`, `dispatch_units`, `collection_date`, `expiry_date`, `donor_id`, `donor_name`) VALUES
(1, 'O+', 0, 0, '2024-10-10', '2024-11-17', 1, 'Arshak'),
(2, 'A+', 0, 0, '2024-10-25', '2024-11-20', 4, 'Ahamed'),
(3, 'O+', 150, 150, '2024-10-16', '2024-12-03', 5, 'Mohamed Aathif'),
(4, 'O+', 41, 41, '2024-10-10', '2024-12-05', 1, 'Arshak'),
(5, 'A+', 200, 100, '2024-10-25', '2024-12-05', 4, 'Ahamed');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `urgency_level` varchar(20) NOT NULL,
  `date_needed` date NOT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','accepted','rejected','dispatched') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`id`, `hospital_name`, `email`, `blood_group`, `quantity`, `urgency_level`, `date_needed`, `additional_info`, `created_at`, `updated_at`, `status`) VALUES
(3, 'osro', '', 'AB+', 150, 'routine', '2024-10-15', 'operation', '2024-10-05 07:38:46', '2024-10-06 11:44:09', 'rejected'),
(4, 'Asiri', 'Mhdaathi124@gmail.com', 'O+', 300, 'routine', '2024-02-10', 'For a Operation', '2024-10-08 16:03:18', '2024-10-22 16:04:24', 'dispatched'),
(5, 'Medi Sewana', 'Medisewana@gmail.com', 'O+', 150, 'routine', '2024-10-17', 'For Surjery', '2024-10-22 14:54:03', '2024-10-22 15:34:14', 'dispatched'),
(6, 'Medi Sewana', 'Mhdaathi124@gmail.com', 'A+', 100, 'routine', '2024-10-24', 'Surjery', '2024-10-22 16:09:26', '2024-10-22 16:10:10', 'dispatched'),
(7, 'Osro', 'Mhdaathi124@gmail.com', 'O+', 100, 'routine', '2024-10-24', '!', '2024-10-22 16:17:12', '2024-10-22 16:18:02', 'dispatched'),
(8, 'Asiri', 'Mhdaathi124@gmail.com', 'O+', 49, 'routine', '2024-10-19', '.', '2024-10-24 14:18:18', '2024-10-24 15:08:34', 'dispatched'),
(9, 'osro', 'Mhdaathi124@gmail.com', 'O+', 10, 'routine', '2024-10-16', 'asa', '2024-10-24 14:41:33', '2024-10-24 15:07:48', 'dispatched'),
(10, 'Asiri', 'Mhdaathi124@gmail.com', 'A+', 100, 'routine', '2024-10-25', '.', '2024-10-24 15:24:35', '2024-10-24 15:24:51', 'dispatched');

-- --------------------------------------------------------

--
-- Table structure for table `donation_schedule`
--

CREATE TABLE `donation_schedule` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `scheduled_date` date NOT NULL,
  `time_slot` time NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_schedule`
--

INSERT INTO `donation_schedule` (`id`, `donor_id`, `scheduled_date`, `time_slot`, `location`) VALUES
(1, 1, '2024-10-10', '11:20:00', 'Center 1'),
(2, 4, '2024-10-25', '10:15:00', 'Center 1'),
(3, 1, '2024-10-24', '16:23:00', 'Center 1'),
(4, 4, '2024-10-17', '17:00:00', 'Center 1'),
(5, 4, '2024-10-17', '17:00:00', 'Center 1'),
(6, 5, '2024-10-16', '16:23:00', 'Center 1');

-- --------------------------------------------------------

--
-- Table structure for table `donor_history`
--

CREATE TABLE `donor_history` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `health_history` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `last_donation_date` date DEFAULT NULL,
  `donation_status` tinyint(1) DEFAULT 0,
  `date_of_collection` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_history`
--

INSERT INTO `donor_history` (`id`, `donor_name`, `dob`, `gender`, `blood_group`, `contact_number`, `health_history`, `email`, `last_donation_date`, `donation_status`, `date_of_collection`) VALUES
(1, 'Arshak', '2003-12-25', 'male', 'O+', '0778211464', 'Fine', 'Arshak@gmail.com', '2024-10-10', 2, '2024-10-24 13:52:46'),
(4, 'Ahamed', '1999-10-12', 'male', 'A+', '0775486211', 'Fine', 'ahamed@gmail.com', '2024-10-25', 2, '2024-10-24 13:52:46'),
(5, 'Mohamed Aathif', '2001-07-16', 'male', 'O+', '0769183535', 'Fine!', 'Mhdaathi124@gmail.com', '2024-10-16', 2, '2024-10-24 13:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `role_as`, `status`, `created_at`) VALUES
(1, 'Aathief', 'Asrak', 'Mhdaathi124@gmail.com', '111', 0, 0, '2024-07-14 10:49:22'),
(2, 'Arshak', 'Asrak', 'Arshak@gmail.com', '111', 1, 0, '2024-07-14 13:09:22'),
(3, 'Fathima', 'Fathi', 'fathi@gmail.com', '111', 0, 0, '2024-10-12 06:20:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_schedule`
--
ALTER TABLE `donation_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `donor_history`
--
ALTER TABLE `donor_history`
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
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donation_schedule`
--
ALTER TABLE `donation_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donor_history`
--
ALTER TABLE `donor_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  ADD CONSTRAINT `blood_inventory_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor_history` (`id`);

--
-- Constraints for table `donation_schedule`
--
ALTER TABLE `donation_schedule`
  ADD CONSTRAINT `donation_schedule_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor_history` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
