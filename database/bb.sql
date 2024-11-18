-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 06:00 PM
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
-- Table structure for table `blood_dispatches`
--

CREATE TABLE `blood_dispatches` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `dispatch_units` int(11) DEFAULT NULL,
  `request_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `dispatch_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_dispatches`
--

INSERT INTO `blood_dispatches` (`id`, `hospital_name`, `blood_group`, `dispatch_units`, `request_id`, `driver_id`, `dispatch_date`) VALUES
(1, NULL, NULL, NULL, 5, 6, '2024-10-22 00:00:00'),
(2, NULL, NULL, NULL, 5, 6, '2024-10-22 00:00:00'),
(3, NULL, NULL, NULL, 4, 6, '2024-10-22 00:00:00'),
(4, NULL, NULL, NULL, 6, 6, '2024-10-22 00:00:00'),
(5, NULL, NULL, NULL, 7, 6, '2024-10-22 00:00:00'),
(6, 'osro', 'O+', 10, 9, 6, '2024-10-24 00:00:00'),
(7, 'Asiri', 'O+', 49, 8, 6, '2024-10-24 00:00:00'),
(8, 'Asiri', 'A+', 100, 10, 6, '2024-10-24 00:00:00');

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
  `hospital_address` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
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

INSERT INTO `blood_requests` (`id`, `hospital_name`, `hospital_address`, `contact_number`, `email`, `blood_group`, `quantity`, `urgency_level`, `date_needed`, `additional_info`, `created_at`, `updated_at`, `status`) VALUES
(3, 'osro', '', '', '', 'AB+', 150, 'routine', '2024-10-15', 'operation', '2024-10-05 07:38:46', '2024-10-06 11:44:09', 'rejected'),
(4, 'Asiri', '', '', 'Mhdaathi124@gmail.com', 'O+', 300, 'routine', '2024-02-10', 'For a Operation', '2024-10-08 16:03:18', '2024-10-22 16:04:24', 'dispatched'),
(5, 'Medi Sewana', '', '', 'Medisewana@gmail.com', 'O+', 150, 'routine', '2024-10-17', 'For Surjery', '2024-10-22 14:54:03', '2024-10-22 15:34:14', 'dispatched'),
(6, 'Medi Sewana', '', '', 'Mhdaathi124@gmail.com', 'A+', 100, 'routine', '2024-10-24', 'Surjery', '2024-10-22 16:09:26', '2024-10-22 16:10:10', 'dispatched'),
(7, 'Osro', '', '', 'Mhdaathi124@gmail.com', 'O+', 100, 'routine', '2024-10-24', '!', '2024-10-22 16:17:12', '2024-10-22 16:18:02', 'dispatched'),
(8, 'Asiri', '', '', 'Mhdaathi124@gmail.com', 'O+', 49, 'routine', '2024-10-19', '.', '2024-10-24 14:18:18', '2024-10-24 15:08:34', 'dispatched'),
(9, 'osro', '', '', 'Mhdaathi124@gmail.com', 'O+', 10, 'routine', '2024-10-16', 'asa', '2024-10-24 14:41:33', '2024-10-24 15:07:48', 'dispatched'),
(10, 'Asiri', '', '', 'Mhdaathi124@gmail.com', 'A+', 100, 'routine', '2024-10-25', '.', '2024-10-24 15:24:35', '2024-10-24 15:24:51', 'dispatched'),
(11, 'Medi Sewana', '', '', 'kavinda.perera@gmail.com', 'O+', 100, 'routine', '2024-11-15', 'Surgery', '2024-11-11 15:55:00', '2024-11-11 15:55:18', 'accepted');

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
  `email` varchar(100) NOT NULL,
  `last_donation_date` date DEFAULT NULL,
  `donation_status` tinyint(1) DEFAULT 0,
  `date_of_collection` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_history`
--

INSERT INTO `donor_history` (`id`, `donor_name`, `dob`, `gender`, `blood_group`, `contact_number`, `email`, `last_donation_date`, `donation_status`, `date_of_collection`) VALUES
(1, 'Arshak', '2003-12-25', 'male', 'O+', '0778211464', 'Arshak@gmail.com', '2024-10-10', 2, '2024-10-24 13:52:46'),
(4, 'Ahamed', '1999-10-12', 'male', 'A+', '0775486211', 'ahamed@gmail.com', '2024-10-25', 2, '2024-10-24 13:52:46'),
(5, 'Mohamed Aathif', '2001-07-16', 'male', 'O+', '0769183535', 'Mhdaathi124@gmail.com', '2024-10-16', 2, '2024-10-24 13:52:46'),
(6, 'Aathief Asrak', '2024-11-19', 'male', 'A+', '0769183535', 'kavinda.perera@gmail.com', NULL, 0, '2024-11-18 15:53:53'),
(7, 'Aathief Asrak', '0000-00-00', 'male', 'A+', '0769183535', 'kavinda.perera@gmail.com', NULL, 0, '2024-11-18 16:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `license_number` varchar(50) NOT NULL,
  `emergency_contact_number` varchar(191) NOT NULL,
  `work_days` set('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`driver_id`, `driver_name`, `contact_number`, `email`, `license_number`, `emergency_contact_number`, `work_days`, `status`, `registration_date`) VALUES
(4, '', '071 987 6543', 'kavinda.perera@gmail.com', 'B 123456', '071 987 6543', 'Monday,Tuesday,Wednesday,Thursday,Friday', 1, '2024-10-16 08:55:22'),
(5, '', '0770543928', 'ahamedasrak@gmail.com', 'B 254163', '0770543928', 'Monday,Tuesday,Wednesday,Thursday,Friday', 1, '2024-10-22 14:21:47'),
(6, 'Ahamed Asrak', '0770543928', 'ahamedasrak@gmail.com', 'B 254163', '0770543928', 'Monday,Tuesday,Wednesday,Thursday,Friday', 1, '2024-10-22 14:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Donor','Hospital','Staff','Driver') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Aathif', 'fathi@gmail.com', '111', 'Donor', '2024-11-17 14:21:10'),
(2, 'Aathif', 'Mhdaathi124@gmail.com', '111', 'Admin', '2024-11-17 14:21:48'),
(3, 'Arshak', 'Arshak1@gmail.com', '111', 'Staff', '2024-11-17 14:25:24'),
(4, 'Aathif', 'Arshak11@gmail.com', '111', 'Staff', '2024-11-17 14:27:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_dispatches`
--
ALTER TABLE `blood_dispatches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `driver_id` (`driver_id`);

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
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_dispatches`
--
ALTER TABLE `blood_dispatches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donation_schedule`
--
ALTER TABLE `donation_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donor_history`
--
ALTER TABLE `donor_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_dispatches`
--
ALTER TABLE `blood_dispatches`
  ADD CONSTRAINT `blood_dispatches_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `blood_requests` (`id`),
  ADD CONSTRAINT `blood_dispatches_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `driver_details` (`driver_id`);

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
