-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 06:16 AM
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
-- Database: `adms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_mngmt`
--

CREATE TABLE `account_mngmt` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accreditation_role`
--

CREATE TABLE `accreditation_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `task` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accreditation_schedule`
--

CREATE TABLE `accreditation_schedule` (
  `id` int(11) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `datestart` datetime NOT NULL,
  `dateend` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archived_documents`
--

CREATE TABLE `archived_documents` (
  `id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `campus` varchar(225) NOT NULL,
  `college` varchar(225) NOT NULL,
  `program` varchar(225) NOT NULL,
  `benchmark` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `archived_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `campus` varchar(225) NOT NULL,
  `college` varchar(225) NOT NULL,
  `program` varchar(225) NOT NULL,
  `benchmark` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `parent_benchmark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter_configuration`
--

CREATE TABLE `filter_configuration` (
  `id` int(11) NOT NULL,
  `area` varchar(150) NOT NULL,
  `parameter` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filter_configuration`
--

INSERT INTO `filter_configuration` (`id`, `area`, `parameter`) VALUES
(1, 'Area 1', 'Parameter A'),
(2, 'Area 1', 'Parameter B'),
(3, 'Area 2', 'Parameter A'),
(4, 'Area 2', 'Parameter B'),
(5, 'Area 2', 'Parameter C'),
(6, 'Area 2', 'Parameter D'),
(7, 'Area 2', 'Parameter E'),
(8, 'Area 2', 'Parameter F'),
(9, 'Area 2', 'Parameter G'),
(10, 'Area 3', 'Parameter A'),
(11, 'Area 3', 'Parameter B'),
(12, 'Area 3', 'Parameter C'),
(13, 'Area 3', 'Parameter D'),
(14, 'Area 3', 'Parameter E'),
(15, 'Area 3', 'Parameter F'),
(16, 'Area 4', 'Parameter A'),
(17, 'Area 4', 'Parameter B'),
(18, 'Area 4', 'Parameter C'),
(19, 'Area 4', 'Parameter D'),
(20, 'Area 4', 'Parameter E'),
(21, 'Area 5', 'Parameter A'),
(22, 'Area 5', 'Parameter B'),
(23, 'Area 5', 'Parameter C'),
(24, 'Area 5', 'Parameter D'),
(25, 'Area 6', 'Parameter A'),
(26, 'Area 6', 'Parameter B'),
(27, 'Area 6', 'Parameter C'),
(28, 'Area 6', 'Parameter D'),
(29, 'Area 7', 'Parameter A'),
(30, 'Area 7', 'Parameter B'),
(31, 'Area 7', 'Parameter C'),
(32, 'Area 7', 'Parameter D'),
(33, 'Area 7', 'Parameter E'),
(34, 'Area 7', 'Parameter F'),
(35, 'Area 7', 'Parameter G'),
(36, 'Area 8', 'Parameter A'),
(37, 'Area 8', 'Parameter B'),
(38, 'Area 8', 'Parameter C'),
(39, 'Area 8', 'Parameter D'),
(40, 'Area 8', 'Parameter E'),
(41, 'Area 8', 'Parameter F'),
(42, 'Area 8', 'Parameter G'),
(43, 'Area 8', 'Parameter H'),
(44, 'Area 8', 'Parameter I'),
(45, 'Area 8', 'Parameter J'),
(46, 'Area 9', 'Parameter A'),
(47, 'Area 9', 'Parameter B'),
(48, 'Area 9', 'Parameter C'),
(49, 'Area 9', 'Parameter D'),
(50, 'Area 10', 'Parameter A'),
(51, 'Area 10', 'Parameter B'),
(52, 'Area 10', 'Parameter C'),
(53, 'Area 10', 'Parameter D'),
(54, 'Area 10', 'Parameter E'),
(55, 'Area 10', 'Parameter F'),
(56, 'Area 10', 'Parameter G'),
(57, 'Area 10', 'Parameter H');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `recipient_user_id` int(11) NOT NULL,
  `notification_description` varchar(255) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_access`
--

CREATE TABLE `request_access` (
  `id` int(11) NOT NULL,
  `program` varchar(100) DEFAULT NULL,
  `requestor_name` varchar(255) DEFAULT NULL,
  `requestor_email` varchar(255) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `parameter` varchar(100) DEFAULT NULL,
  `quality` varchar(100) DEFAULT NULL,
  `benchmark` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `requested_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_documents`
--

CREATE TABLE `request_documents` (
  `id` int(11) NOT NULL,
  `requestor` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `campus` varchar(225) NOT NULL,
  `college` varchar(225) NOT NULL,
  `program` varchar(225) NOT NULL,
  `benchmark` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_structure`
--

CREATE TABLE `university_structure` (
  `id` int(11) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `colleges` varchar(255) NOT NULL,
  `programs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `email`, `campus`, `college`, `phonenumber`, `password`, `role`, `status`) VALUES
(1, 'Ricka', '', '', 'rickajunecharlotte.panton@cvsu.edu.ph', '', '', '', '123', 'ido', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_mngmt`
--
ALTER TABLE `account_mngmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accreditation_role`
--
ALTER TABLE `accreditation_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_email` (`email`);

--
-- Indexes for table `accreditation_schedule`
--
ALTER TABLE `accreditation_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archived_documents`
--
ALTER TABLE `archived_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter_configuration`
--
ALTER TABLE `filter_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient_user_id` (`recipient_user_id`);

--
-- Indexes for table `request_access`
--
ALTER TABLE `request_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_documents`
--
ALTER TABLE `request_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_structure`
--
ALTER TABLE `university_structure`
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
-- AUTO_INCREMENT for table `account_mngmt`
--
ALTER TABLE `account_mngmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accreditation_role`
--
ALTER TABLE `accreditation_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accreditation_schedule`
--
ALTER TABLE `accreditation_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archived_documents`
--
ALTER TABLE `archived_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filter_configuration`
--
ALTER TABLE `filter_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_access`
--
ALTER TABLE `request_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_documents`
--
ALTER TABLE `request_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_structure`
--
ALTER TABLE `university_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
