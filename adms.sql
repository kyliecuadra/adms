-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 05:54 PM
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
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university_structure`
--

INSERT INTO `university_structure` (`id`, `campus`, `colleges`, `programs`) VALUES
(16, 'Don Severino', '', ''),
(22, 'Don Severino', 'CEIT', 'BSIT'),
(23, 'Dasma', '', ''),
(24, 'Dasma', 'CON', ''),
(25, 'Dasma', 'CON', 'Nursing'),
(26, 'Don Severino', 'CEIT', 'BSCS'),
(27, 'Don Severino', 'CEIT', 'DCEE');

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
(5, 'prince', 'allyson', 'macalino', 'prince@cvsu.edu.ph', 'Indang', 'CEIT', '48935345', '123', 'ido', 'active'),
(6, 'kylie', 'liky', 'cuadra', 'kylie@cvsu.edu.ph', 'Rosario', 'CEIT', '48935345', '123', 'quaac', 'active'),
(7, 'Ricka', 'Tal', 'Panton', 'ricka@cvsu.edu.ph', 'Naic', 'CEIT', '48932424', '123', 'taskforce', 'inactive'),
(8, 'Milagros', 'A.', 'Legaspi', 'crystal@cvsu.edu.ph', '', 'CEIT', '789654321', '123123123', 'quaac', 'active');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    INSERT INTO accreditation (id, email) VALUES (NEW.id, NEW.email);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `accreditation_schedule`
--
ALTER TABLE `accreditation_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `archived_documents`
--
ALTER TABLE `archived_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `request_documents`
--
ALTER TABLE `request_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `university_structure`
--
ALTER TABLE `university_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
