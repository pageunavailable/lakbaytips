-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 09:46 AM
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
-- Database: `lt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lt_admin_acc`
--

CREATE TABLE `lt_admin_acc` (
  `lt_admin_id` int(11) NOT NULL,
  `lt_admin_usr` varchar(256) NOT NULL,
  `lt_admin_psw` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lt_loc_list`
--

CREATE TABLE `lt_loc_list` (
  `lt_loc_id` int(11) NOT NULL,
  `lt_loc_nm` varchar(256) NOT NULL,
  `lt_loc_desc` varchar(256) NOT NULL,
  `lt_loc_adr` varchar(256) NOT NULL,
  `lt_loc_ct` varchar(256) NOT NULL,
  `lt_loc_acom` int(11) NOT NULL,
  `lt_loc_prc` int(11) NOT NULL,
  `lt_loc_img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lt_usr_acc`
--

CREATE TABLE `lt_usr_acc` (
  `lt_acc_id` int(255) NOT NULL,
  `lt_acc_usrnm` varchar(16) NOT NULL,
  `lt_acc_psw` varchar(64) NOT NULL,
  `lt_acc_eml` varchar(255) NOT NULL,
  `lt_acc_fn` varchar(255) NOT NULL,
  `lt_acc_ln` varchar(255) NOT NULL,
  `lt_acc_age` int(100) DEFAULT NULL,
  `lt_acc_bdate` date DEFAULT NULL,
  `lt_acc_pfp` blob DEFAULT NULL,
  `lt_acc_cp` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lt_usr_acc`
--

INSERT INTO `lt_usr_acc` (`lt_acc_id`, `lt_acc_usrnm`, `lt_acc_psw`, `lt_acc_eml`, `lt_acc_fn`, `lt_acc_ln`, `lt_acc_age`, `lt_acc_bdate`, `lt_acc_pfp`, `lt_acc_cp`) VALUES
(1, 'johnjohn', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test@gmail.com', 'John', 'Doe', NULL, NULL, NULL, NULL),
(4, 'RagedWolf', 'a7de273c4a251a1f3fdd926864530b270dbdd1dc4fdb14775c29043be8fd8c0e', 'rrpt@gmail.com', 'Roland', 'Tan', 24, '2023-04-20', NULL, '09876543210'),
(5, 'testtest', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578', 'test@test.com', 'Test', 'Test', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lt_admin_acc`
--
ALTER TABLE `lt_admin_acc`
  ADD PRIMARY KEY (`lt_admin_id`);

--
-- Indexes for table `lt_loc_list`
--
ALTER TABLE `lt_loc_list`
  ADD PRIMARY KEY (`lt_loc_id`);

--
-- Indexes for table `lt_usr_acc`
--
ALTER TABLE `lt_usr_acc`
  ADD PRIMARY KEY (`lt_acc_id`),
  ADD UNIQUE KEY `lt_acc_usrnm` (`lt_acc_usrnm`),
  ADD UNIQUE KEY `lt_acc_eml` (`lt_acc_eml`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lt_admin_acc`
--
ALTER TABLE `lt_admin_acc`
  MODIFY `lt_admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lt_loc_list`
--
ALTER TABLE `lt_loc_list`
  MODIFY `lt_loc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lt_usr_acc`
--
ALTER TABLE `lt_usr_acc`
  MODIFY `lt_acc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
