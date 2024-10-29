-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 08:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_mngmt`
--

INSERT INTO `account_mngmt` (`id`, `fname`, `mname`, `lname`, `email`, `campus`, `college`, `phonenumber`, `password`, `role`, `status`) VALUES
(43, 'Testing ', 'A.', 'Quaac', 'tq@cvsu.edu.ph', 'Don Severino', 'CEIT', '123', '123123123', 'quaac', 'Pending');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accreditation_role`
--

INSERT INTO `accreditation_role` (`id`, `name`, `email`, `program`, `details`, `task`) VALUES
(9, '1212 12121 121212', '121212', 'BSIT', 'Area 9', NULL),
(10, '1212 12121 121212', '121212', 'BSCS', 'Area 8', NULL),
(11, '1212 12121 121212', '121212', 'DCEE', 'Area 7', NULL),
(19, 'Ricka Tal Panton', 'ricka@cvsu.edu.ph', 'BSIT', 'Area 1', NULL),
(20, 'Ricka Tal Panton', 'ricka@cvsu.edu.ph', 'BSCS', 'Area 10', NULL),
(21, 'Ricka Tal Panton', 'ricka@cvsu.edu.ph', 'DCEE', 'Area 9', NULL),
(22, 'Ricka Tal Panton', 'ricka@cvsu.edu.ph', 'BSIT', 'Area 8', NULL),
(23, 'Heart L. Panton', 'pantonheart@cvsu.edu.ph', '', 'Area 1', NULL),
(24, 'Heart L. Panton', 'pantonheart@cvsu.edu.ph', '', '', NULL),
(25, 'Heart L. Panton', 'pantonheart@cvsu.edu.ph', '', '', NULL),
(26, 'Heart L. Panton', 'pantonheart@cvsu.edu.ph', '', '', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accreditation_schedule`
--

INSERT INTO `accreditation_schedule` (`id`, `campus`, `college`, `program`, `title`, `description`, `datestart`, `dateend`) VALUES
(20, 'Dasma', 'CON', 'Nursing', 'Today\'s Accreditation', 'sdlfghnsjklgksjbghlsdbghils;gbhslkdhglsbndlvjsbcvsv', '2024-09-28 00:00:00', '2024-09-28 23:59:00'),
(21, 'Don Severino', 'CEIT', 'BSIT', 'Accreditaion for BSIT', 'Sample brief Descriptio', '2024-10-01 11:50:00', '2024-10-12 11:50:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `area`, `parameter`, `quality`, `campus`, `college`, `program`, `benchmark`, `file_name`, `upload_date`) VALUES
(61, 'Area I', 'Parameter A', 'System- Input and Processes', 'Don Severino', 'CEIT', '', 'S.1 Vision', 'AppForGrad_Panton.pdf', '2024-10-27 16:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`, `is_read`) VALUES
(37, 5, 26, 'hey', '2024-10-28 00:18:01', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `recipient_user_id`, `notification_description`, `timestamp`, `is_read`) VALUES
(45, 8, '<strong>rickajunecharlotte.panton@cvsu.edu.ph</strong> uploaded a new document for CEIT in Don Severino.<small>.Area I; .Parameter A;.System- Input and Processes</small>', '2024-10-28 23:04:57', 0),
(46, 26, '<strong>rickajunecharlotte.panton@cvsu.edu.ph</strong> uploaded a new document for CEIT in Don Severino.<small>.Area I; .Parameter A;.System- Input and Processes</small>', '2024-10-28 23:04:57', 0),
(47, 27, '<strong>rickajunecharlotte.panton@cvsu.edu.ph</strong> uploaded a new document for CEIT in Don Severino.<small>.Area I; .Parameter A;.System- Input and Processes</small>', '2024-10-28 23:04:57', 0),
(48, 28, '<strong>rickajunecharlotte.panton@cvsu.edu.ph</strong> uploaded a new document for CEIT in Don Severino.<small>.Area I; .Parameter A;.System- Input and Processes</small>', '2024-10-28 23:04:57', 0),
(49, 29, '<strong>rickajunecharlotte.panton@cvsu.edu.ph</strong> uploaded a new document for CEIT in Don Severino.<small>.Area I; .Parameter A;.System- Input and Processes</small>', '2024-10-28 23:04:57', 0),
(51, 5, '<strong>123123@cvsu.edu.ph</strong> has registered as QUAAC', '2024-10-29 14:20:31', 1),
(52, 5, '<strong>1231232@cvsu.edu.ph</strong> has registered as QUAAC', '2024-10-29 14:21:06', 1),
(53, 5, '<strong>12312332@cvsu.edu.ph</strong> has registered as QUAAC', '2024-10-29 14:21:12', 1),
(54, 5, '<strong>123123332@cvsu.edu.ph</strong> has registered as QUAAC', '2024-10-29 14:21:37', 1),
(55, 5, '<strong>tq@cvsu.edu.ph</strong> account is waiting for approval.', '2024-10-29 15:29:10', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_documents`
--

INSERT INTO `request_documents` (`id`, `requestor`, `area`, `parameter`, `quality`, `campus`, `college`, `program`, `benchmark`, `file_name`, `requested_date`, `status`) VALUES
(1, 'kylie@cvsu.edu.ph', 'Area 2', 'Parameter 1', 'System- Input and Processes', 'Don Severino', 'CEIT', 'BSIT', '', 'Contract- P. Macalino (1)_4.pdf', '2024-09-15 11:58:11', 'Approved'),
(2, 'kylie@cvsu.edu.ph', 'Area 2', 'Parameter 1', 'System- Input and Processes', 'Don Severino', 'CEIT', 'BSIT', '', 'MACALINO_Employee-Employer Non Disclosure Agreement.pdf', '2024-09-20 15:18:39', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `university_structure`
--

CREATE TABLE `university_structure` (
  `id` int(11) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `colleges` varchar(255) NOT NULL,
  `programs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university_structure`
--

INSERT INTO `university_structure` (`id`, `campus`, `colleges`, `programs`) VALUES
(16, 'Don Severino', '', ''),
(22, 'Don Severino', 'CEIT', 'BSIT'),
(23, 'Dasma', '', ''),
(24, 'Dasma', 'CON', ''),
(25, 'Dasma', 'CON', 'Nursing'),
(26, 'Don Severino', 'CEIT', 'BSCS');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `email`, `campus`, `college`, `phonenumber`, `password`, `role`, `status`) VALUES
(5, 'prince', 'allyson', 'macalino', 'prince@cvsu.edu.ph', 'Indang', 'CEIT', '48935345', '123', 'ido', 'active'),
(6, 'kylie', 'liky', 'cuadra', 'kylie@cvsu.edu.ph', 'Rosario', 'CEIT', '48935345', '123', 'quaac', 'active'),
(7, 'Ricka', 'Tal', 'Panton', 'ricka@cvsu.edu.ph', 'Naic', 'CEIT', '48932424', '123', 'taskforce', 'inactive'),
(8, 'Milagros', 'A.', 'Legaspi', 'crystal@cvsu.edu.ph', '', 'CEIT', '789654321', '123123123', 'quaac', 'active'),
(38, '123', '1.', '123', '123123@cvsu.edu.ph', 'Don Severino', 'CEIT', '123', '123123123', 'quaac', 'inactive'),
(39, '123', '1.', '123', '1231232@cvsu.edu.ph', 'Don Severino', 'CEIT', '123', '123123123', 'quaac', 'inactive'),
(40, '123', '1.', '123', '12312332@cvsu.edu.ph', 'Don Severino', 'CEIT', '123', '123123123', 'quaac', 'inactive'),
(41, '123', '1.', '123', '123123332@cvsu.edu.ph', 'Don Severino', 'CEIT', '123', '123123123', 'quaac', 'inactive');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `accreditation_role`
--
ALTER TABLE `accreditation_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `accreditation_schedule`
--
ALTER TABLE `accreditation_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `archived_documents`
--
ALTER TABLE `archived_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `request_access`
--
ALTER TABLE `request_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request_documents`
--
ALTER TABLE `request_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `university_structure`
--
ALTER TABLE `university_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
