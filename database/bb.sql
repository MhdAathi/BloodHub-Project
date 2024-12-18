-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 11:05 AM
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
  `request_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `dispatch_units` int(11) NOT NULL,
  `dispatch_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_dispatches`
--

INSERT INTO `blood_dispatches` (`id`, `request_id`, `driver_id`, `hospital_name`, `hospital_address`, `contact_number`, `blood_group`, `dispatch_units`, `dispatch_date`) VALUES
(1, 2, 1, 'Kandy General Hospital', 'Kandy', '0812233445', 'A+', 3, '2024-11-23'),
(2, 3, 2, 'Galle Teaching Hospital', 'Galle', '0912233445', 'B+', 4, '2024-11-23'),
(3, 3, 2, 'Galle Teaching Hospital', 'Galle', '0912233445', 'B+', 4, '2024-11-23'),
(4, 1, 2, 'Colombo National Hospital', 'Colombo 10', '0112233445', 'O+', 2, '2024-11-26'),
(5, 16, 3, 'Colombo National Hospital', 'Main road 30, Colombo', '0357784166', 'B+', 3, '2024-11-26'),
(6, 9, 3, 'Anuradhapura Teaching Hospital', 'Anuradhapura', '0252233445', 'O+', 7, '2024-11-26');

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
(0, 'A+', 1, 0, '2024-12-04', '2025-01-07', 19, 'Mohammed Munsiff'),
(1, 'O+', 1, 0, '2024-11-22', '2025-01-07', 8, 'Mohammed Ijlan'),
(2, 'AB+', 1, 0, '2024-11-20', '2025-01-07', 9, 'Mohammed Raazim'),
(3, 'A+', 1, 0, '2024-11-30', '2025-01-07', 18, 'Mohammed Munsif'),
(4, 'B+', 1, 0, '2024-11-28', '2025-01-07', 20, 'Thilini Hettiarachi');

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
(1, 'Colombo National Hospital', 'Colombo 10', '0112233445', 'cnh@gmail.com', 'O+', 2, 'Routine', '2024-12-01', 'Major Surgeries', '2024-11-23 07:24:43', '2024-11-26 08:19:11', 'dispatched'),
(2, 'Kandy General Hospital', 'Kandy', '0812233445', 'kgh@gmail.com', 'A+', 3, 'Urgent', '2024-11-27', 'Trauma Cases', '2024-11-23 07:24:43', '2024-11-23 08:15:53', 'dispatched'),
(3, 'Galle Teaching Hospital', 'Galle', '0912233445', 'gth@gmail.com', 'B+', 4, 'Emergency', '2024-11-24', 'Cancer Treatment', '2024-11-23 07:24:43', '2024-11-23 08:21:19', 'dispatched'),
(4, 'Jaffna Teaching Hospital', 'Jaffna', '0212233445', 'jth@gmail.com', 'AB+', 2, 'Routine', '2024-12-05', 'Obstetric Emergencies', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(5, 'Matara General Hospital', 'Matara', '0412233445', 'mgh@gmail.com', 'O-', 6, 'Urgent', '2024-11-28', 'Gastrointestinal Bleeding', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(6, 'Kurunegala Teaching Hospital', 'Kurunegala', '0372233445', 'kth@gmail.com', 'A-', 3, 'Emergency', '2024-11-25', 'Trauma Cases', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(7, 'Ratnapura General Hospital', 'Ratnapura', '0452233445', 'rgh@gmail.com', 'B-', 5, 'Routine', '2024-12-02', 'Cancer Treatment', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(8, 'Badulla General Hospital', 'Badulla', '0552233445', 'bgh@gmail.com', 'AB-', 4, 'Urgent', '2024-11-30', 'Obstetric Emergencies', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(9, 'Anuradhapura Teaching Hospital', 'Anuradhapura', '0252233445', 'ath@gmail.com', 'O+', 7, 'Emergency', '2024-11-23', 'Major Surgeries', '2024-11-23 07:24:43', '2024-11-26 08:52:50', 'dispatched'),
(10, 'Kalutara General Hospital', 'Kalutara', '0342233445', 'kgh@gmail.com', 'A+', 6, 'Routine', '2024-12-03', 'Trauma Cases', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(11, 'Batticaloa Teaching Hospital', 'Batticaloa', '0652233445', 'bth@gmail.com', 'B+', 8, 'Urgent', '2024-11-29', 'Gastrointestinal Bleeding', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(12, 'Trincomalee General Hospital', 'Trincomalee', '0262233445', 'tgh@gmail.com', 'AB+', 3, 'Emergency', '2024-11-26', 'Cancer Treatment', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(13, 'Hambantota General Hospital', 'Hambantota', '0472233445', 'hgh@gmail.com', 'O-', 2, 'Routine', '2024-12-04', 'Obstetric Emergencies', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(14, 'Polonnaruwa General Hospital', 'Polonnaruwa', '0272233445', 'pgh@gmail.com', 'A-', 4, 'Urgent', '2024-11-28', 'Major Surgeries', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(15, 'Vavuniya General Hospital', 'Vavuniya', '0242233445', 'vgh@gmail.com', 'B-', 5, 'Emergency', '2024-11-25', 'Trauma Cases', '2024-11-23 07:24:43', '2024-11-23 07:24:43', 'pending'),
(16, 'Colombo National Hospital', 'Main road 30, Colombo', '0357784166', 'cnh@gmail.com', 'B+', 3, 'routine', '2024-11-30', 'trauma_cases', '2024-11-26 06:44:01', '2024-11-26 08:24:49', 'dispatched');

-- --------------------------------------------------------

--
-- Table structure for table `donation_schedule`
--

CREATE TABLE `donation_schedule` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `scheduled_date` date NOT NULL,
  `time_slot_category` varchar(50) DEFAULT NULL,
  `time_slot` time NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_schedule`
--

INSERT INTO `donation_schedule` (`id`, `donor_id`, `scheduled_date`, `time_slot_category`, `time_slot`, `location`) VALUES
(1, 1, '2024-10-10', NULL, '11:20:00', 'Center 1'),
(2, 4, '2024-10-25', NULL, '10:15:00', 'Center 1'),
(3, 1, '2024-10-24', NULL, '16:23:00', 'Center 1'),
(4, 4, '2024-10-17', NULL, '17:00:00', 'Center 1'),
(5, 4, '2024-10-17', NULL, '17:00:00', 'Center 1'),
(6, 5, '2024-10-16', NULL, '16:23:00', 'Center 1'),
(7, 6, '2024-11-20', NULL, '09:38:00', 'Center 1'),
(8, 8, '2024-11-22', NULL, '10:15:00', 'Kandy Central Blood Donation Center'),
(9, 9, '2024-11-20', NULL, '09:00:00', 'Peradeniya Blood Donation Hub'),
(10, 10, '2024-11-28', '', '10:00:00', 'Peradeniya Blood Donation Hub'),
(11, 7, '2024-11-29', '', '01:00:00', 'Kandy Central Blood Donation Center'),
(12, 7, '2024-12-05', '', '10:00:00', 'Peradeniya Blood Donation Hub'),
(13, 6, '2024-11-27', '', '09:00:00', 'Kandy Central Blood Donation Center'),
(14, 8, '2024-11-30', '', '01:00:00', 'Gampola Blood Donation Center'),
(15, 9, '2024-11-30', '', '06:00:00', 'Mahiyangana Blood Donation Center'),
(16, 19, '2024-12-04', '', '01:00:00', 'Gampola Blood Donation Center'),
(17, 18, '2024-11-30', '', '01:00:00', 'Peradeniya Blood Donation Hub'),
(18, 20, '2024-11-28', '', '01:00:00', 'Kandy Central Blood Donation Center');

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
(1, 'Nimal Fernando', '1990-05-15', 'male', 'O+', '0771234567', 'nimal.fernando@gmail.com', '2024-10-01', 0, '2024-11-22 16:48:59'),
(2, 'Thilini Gamage', '1995-11-20', 'female', 'A+', '0779876543', 'thilini@gmail.com', NULL, 0, '2024-11-22 16:48:59'),
(3, 'Amal Rajapaksa', '1988-07-10', 'male', 'B+', '0712345678', 'amal.rajapaksa@gmail.com', '2024-09-15', 0, '2024-11-22 16:48:59'),
(4, 'Fathima Nazeema', '1993-03-25', 'female', 'AB+', '0755671234', 'fathima.nazeema@gmail.com', NULL, 0, '2024-11-22 16:48:59'),
(5, 'Rifka Najla', '1997-02-18', 'female', 'O-', '0762345678', 'rifka.najla@gmail.com', '2024-08-30', 0, '2024-11-22 16:48:59'),
(6, 'Mohamed Aathif', '2001-07-16', 'male', 'O+', '0773216548', 'mhdaathi124@gmail.com', '2024-11-20', 2, '2024-11-22 16:50:54'),
(7, 'Jacob Brian Micheal', '2001-09-15', 'male', 'B-', '0776549876', 'jbm@gmail.com', '2024-11-29', 2, '2024-11-22 16:50:54'),
(8, 'Mohammed Ijlan', '2002-11-02', 'male', 'O+', '0783214567', 'mhdijji@gmail.com', '2024-11-22', 2, '2024-11-22 16:50:54'),
(9, 'Mohammed Raazim', '2000-11-02', 'male', 'AB+', '0789876543', 'mhdraaz@gmail.com', '2024-11-20', 2, '2024-11-22 16:50:54'),
(10, 'Nuwan Karunaratne', '1994-02-10', 'male', 'A-', '0778765432', 'nuwan@gmail.com', '2024-02-15', 0, '2024-11-22 16:50:54'),
(11, 'Sanath Abeysekara', '1996-01-05', 'male', 'O-', '0771237890', 'sanath@gmail.com', NULL, 0, '2024-11-22 16:50:54'),
(12, 'Ruwan Ranatunga', '1991-10-19', 'male', 'B+', '0787654321', 'ruwan@gmail.com', NULL, 0, '2024-11-22 16:50:54'),
(13, 'Tharushi Manjula', '1995-11-25', 'female', 'A+', '0775432109', 'tharushi@gmail.com', NULL, 0, '2024-11-22 16:50:54'),
(14, 'Faisal Ibrahim', '1997-04-17', 'male', 'AB-', '0764321098', 'faisal@gmail.com', NULL, 0, '2024-11-22 16:50:54'),
(15, 'Sharmeen Ayesha', '1998-12-12', 'female', 'O+', '0753216547', 'sharmeen.ayesha@gmail.com', '2024-10-10', 0, '2024-11-22 16:50:54'),
(18, 'Mohammed Munsiff', '1998-09-20', 'male', 'A+', '0754060112', 'MunsiffMhd@gmail.com', '2024-11-30', 2, '2024-11-25 12:13:30'),
(19, 'Mohammed Munsiff', '1998-09-20', 'male', 'A+', '0754060112', 'MunsiffMhd@gmail.com', '2024-12-04', 2, '2024-11-25 12:14:22'),
(20, 'Thilini Hettiarachi', '2002-08-14', 'female', 'B+', '0751185764', 'thilini@gmail.com', '2024-11-28', 2, '2024-11-25 16:09:49'),
(21, 'Aravindhan Raj', '1992-04-10', 'male', 'A+', '0771234567', 'aravindhan.raj@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(22, 'Chamari Perera', '1989-11-25', 'female', 'B+', '0772345678', 'chamari.perera@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(23, 'Yasir Munir', '1990-06-17', 'male', 'O+', '0783456789', 'yasir.munir@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(24, 'Selina Nadeesha', '1994-02-12', 'female', 'AB+', '0774567890', 'selina.nadeesha@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(25, 'Haris Mohamed', '1985-09-28', 'male', 'A-', '0775678901', 'haris.mohamed@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(26, 'Tharindu Kumara', '1993-07-07', 'male', 'O+', '0786789012', 'tharindu.kumara@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(27, 'Nadeeka Samarakoon', '1991-04-22', 'female', 'B-', '0777890123', 'nadeeka.samarakoon@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(28, 'Manjula Senanayake', '1990-01-30', 'female', 'AB-', '0788901234', 'manjula.senanayake@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(29, 'Ashwin Pillai', '1988-10-05', 'male', 'O-', '0779012345', 'ashwin.pillai@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(30, 'Ravindra Jayasinghe', '1987-08-14', 'male', 'A+', '0770123456', 'ravindra.jayasinghe@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(31, 'Shanika Silva', '1992-12-25', 'female', 'B+', '0781234567', 'shanika.silva@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(32, 'Zainab Ahmed', '1995-03-20', 'female', 'O+', '0772345678', 'zainab.ahmed@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(33, 'Deepika Fernando', '1996-06-17', 'female', 'A-', '0783456789', 'deepika.fernando@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(34, 'Kumara Rajapaksa', '1983-05-10', 'male', 'AB+', '0774567890', 'kumara.rajapaksa@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43'),
(35, 'Fareed Hameed', '1994-11-11', 'male', 'O-', '0785678901', 'fareed.hameed@gmail.com', '2024-09-01', 0, '2024-11-26 09:57:43');

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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`driver_id`, `driver_name`, `contact_number`, `email`, `license_number`, `emergency_contact_number`, `work_days`, `status`, `registration_date`, `status_expiration`) VALUES
(1, 'Nuwan Karunaratne', '0771234567', 'nuwan@gmail.com', 'D12345', '0781234567', 'Monday', 1, '2024-11-22 17:06:21', NULL),
(2, 'Sanath Abeysekara', '0779876543', 'sanath@gmail.com', 'D67890', '0789876543', 'Tuesday', 1, '2024-11-22 17:06:21', '2024-11-26 09:49:17'),
(3, 'Ruwan Ranatunga', '0776543210', 'ruwan@gmail.com', 'D54321', '0786543210', 'Monday', 1, '2024-11-22 17:06:21', '2024-11-26 10:22:55'),
(4, 'Faisal Ibrahim', '0764321098', 'faisal@gmail.com', 'D11223', '0774321098', 'Monday', 1, '2024-11-22 17:06:21', NULL),
(5, 'Junaid Mubarak', '0773216548', 'junaid.mubarak@gmail.com', 'D99887', '0783216548', 'Tuesday', 1, '2024-11-22 17:06:21', NULL),
(6, 'Jilal Mubarak', '0771244322', 'jilal.mubarak@gmail.com', 'D66887', '0783323231', 'Tuesday,Wednesday,Friday,Saturday,Sunday', 1, '2024-11-22 17:09:55', NULL);

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
(1, 'Mohamed Aathif', 'Mhdaathi124@gmail.com', '111', 'Admin', '2024-11-22 16:22:04'),
(2, 'Jacob Brian Micheal', 'jbm@gmail.com', '222', 'Staff', '2024-11-22 16:23:55'),
(3, 'Mohammed Ijlan', 'mhdijji@gmail.com', '222', 'Staff', '2024-11-22 16:23:55'),
(4, 'Mohammed Raazim', 'mhdraaz@gmail.com', '222', 'Staff', '2024-11-22 16:23:55'),
(5, 'Nimal Fernando', 'nimal.fernando@gmail.com', '333', 'Donor', '2024-11-22 16:25:40'),
(6, 'Thilini Gamage', 'thilini@gmail.com', '333', 'Donor', '2024-11-22 16:25:40'),
(7, 'Amal Rajapaksa', 'amal.rajapaksa@gmail.com', '333', 'Donor', '2024-11-22 16:25:40'),
(8, 'Colombo National Hospital', 'cnh@gmail.com', '444', 'Hospital', '2024-11-22 16:27:00'),
(9, 'Kandy General Hospital', 'kgh@gmail.com', '444', 'Hospital', '2024-11-22 16:27:00'),
(10, 'Galle Teaching Hospital', 'gth@gmail.com', '444', 'Hospital', '2024-11-22 16:27:00'),
(11, 'Nuwan Karunaratne', 'nuwan@gmail.com', '555', 'Driver', '2024-11-22 16:27:55'),
(12, 'Sanath Abeysekara', 'sanath@gmail.com', '555', 'Driver', '2024-11-22 16:27:55'),
(13, 'Ruwan Ranatunga', 'ruwan@gmail.com', '555', 'Driver', '2024-11-22 16:27:55'),
(14, 'Fathima Nazeema', 'fathima.nazeema@gmail.com', '333', 'Donor', '2024-11-22 16:31:17'),
(15, 'Ahmed Thasleem', 'ahmed.thasleem@gmail.com', '222', 'Staff', '2024-11-22 16:31:17'),
(16, 'Rifka Najla', 'rifka.najla@gmail.com', '333', 'Donor', '2024-11-22 16:31:17'),
(17, 'Junaid Mubarak', 'junaid.mubarak@gmail.com', '555', 'Driver', '2024-11-22 16:31:17'),
(18, 'Sharmeen Ayesha', 'sharmeen.ayesha@gmail.com', '444', 'Hospital', '2024-11-22 16:31:17'),
(19, 'Atheek', 'atheek@gmail.com', '333', 'Donor', '2024-11-25 13:37:45');

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
  ADD KEY `blood_inventory_ibfk_1` (`donor_id`);

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
  ADD KEY `donation_schedule_ibfk_1` (`donor_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `donation_schedule`
--
ALTER TABLE `donation_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `donor_history`
--
ALTER TABLE `donor_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_dispatches`
--
ALTER TABLE `blood_dispatches`
  ADD CONSTRAINT `blood_dispatches_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `blood_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_dispatches_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `driver_details` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
