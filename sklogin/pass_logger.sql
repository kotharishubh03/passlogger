-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 02:17 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pass_logger`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `ba_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `bank_name_id` int(11) NOT NULL,
  `bn_account_no` varchar(100) NOT NULL,
  `ba_ifsc` varchar(30) DEFAULT NULL,
  `pass_id` int(11) DEFAULT NULL,
  `pay_card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bank_names`
--

CREATE TABLE `bank_names` (
  `bn_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_ifsc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_names`
--

INSERT INTO `bank_names` (`bn_id`, `bank_name`, `bank_ifsc`) VALUES
(1, 'AXIS BANK LTD', 'UTIB00045');

-- --------------------------------------------------------

--
-- Table structure for table `govermentids`
--

CREATE TABLE `govermentids` (
  `g_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `unique_idno` varchar(50) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `govermentids`
--

INSERT INTO `govermentids` (`g_id`, `usr_id`, `name`, `unique_idno`, `issue_date`, `expiry_date`) VALUES
(1, 1, 'AADHAR CARD', '123123123123123', '2013-12-03', NULL),
(2, 2, 'voter id', '12345679', '2000-10-01', '2000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `usr_id`, `title`, `note`) VALUES
(2, 1, 'hello world', 'hello world my project is completed ');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `pass_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `pass_website` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pin` int(11) DEFAULT NULL,
  `discription` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`pass_id`, `usr_id`, `pass_website`, `username`, `password`, `pin`, `discription`) VALUES
(3, 2, 'https://kite.zerodha.com/', 'vk@12345', 'php123', 123456, NULL),
(18, 1, 'php.com', 'shubhamk', 'hello_world', 123456, 'he we have done it'),
(21, 1, 'php.com.in', 'Vishal_Kudtkar', 'php_123', 14541, '');

-- --------------------------------------------------------

--
-- Table structure for table `pass_security_q`
--

CREATE TABLE `pass_security_q` (
  `sq_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paymet_card`
--

CREATE TABLE `paymet_card` (
  `pay_card_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `card_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sess_manager`
--

CREATE TABLE `sess_manager` (
  `usr_id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `timestramp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sess_manager`
--

INSERT INTO `sess_manager` (`usr_id`, `session_id`, `timestramp`) VALUES
(1, 'W6f6Q4YVio15t2JPLtik9OOONhCvHQCE', '2020-12-11 12:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  `usr_fname` varchar(128) DEFAULT NULL,
  `usr_lname` varchar(128) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `usr_email`, `usr_fname`, `usr_lname`, `password`, `pin`) VALUES
(1, 'sk@123', 'Shubham', 'Kothari', '1a52e17fa899cf40fb04cfc42e6352f1', '37f33717cc853d2501f89baf8f4e3817'),
(2, 'vk@123', 'sk', '123456', '1a52e17fa899cf40fb04cfc42e6352f1', '37f33717cc853d2501f89baf8f4e3817'),
(3, 'shubhamkothari@kccemsr.edu.in', NULL, NULL, '69a5e6cd1efba9bca96b13b508eadf84', '37f33717cc853d2501f89baf8f4e3817'),
(4, 'shubh.kothari1111@gmail.com', NULL, NULL, '1a52e17fa899cf40fb04cfc42e6352f1', '37f33717cc853d2501f89baf8f4e3817');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`ba_id`),
  ADD KEY `usr_id` (`usr_id`),
  ADD KEY `bank_accounts_ibfk_2` (`bank_name_id`),
  ADD KEY `pass_id` (`pass_id`),
  ADD KEY `bank_accounts_ibfk_4` (`pay_card_id`);

--
-- Indexes for table `bank_names`
--
ALTER TABLE `bank_names`
  ADD PRIMARY KEY (`bn_id`);

--
-- Indexes for table `govermentids`
--
ALTER TABLE `govermentids`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`),
  ADD KEY `notes_ibfk_1` (`usr_id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`pass_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `pass_security_q`
--
ALTER TABLE `pass_security_q`
  ADD PRIMARY KEY (`sq_id`),
  ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `paymet_card`
--
ALTER TABLE `paymet_card`
  ADD PRIMARY KEY (`pay_card_id`),
  ADD KEY `paymet_card_ibfk_1` (`usr_id`);

--
-- Indexes for table `sess_manager`
--
ALTER TABLE `sess_manager`
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_email` (`usr_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `ba_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_names`
--
ALTER TABLE `bank_names`
  MODIFY `bn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `govermentids`
--
ALTER TABLE `govermentids`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pass_security_q`
--
ALTER TABLE `pass_security_q`
  MODIFY `sq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymet_card`
--
ALTER TABLE `paymet_card`
  MODIFY `pay_card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_accounts_ibfk_2` FOREIGN KEY (`bank_name_id`) REFERENCES `bank_names` (`bn_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_accounts_ibfk_3` FOREIGN KEY (`pass_id`) REFERENCES `password` (`pass_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_accounts_ibfk_4` FOREIGN KEY (`pay_card_id`) REFERENCES `paymet_card` (`pay_card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `govermentids`
--
ALTER TABLE `govermentids`
  ADD CONSTRAINT `govermentids_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pass_security_q`
--
ALTER TABLE `pass_security_q`
  ADD CONSTRAINT `pass_security_q_ibfk_1` FOREIGN KEY (`pass_id`) REFERENCES `password` (`pass_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymet_card`
--
ALTER TABLE `paymet_card`
  ADD CONSTRAINT `paymet_card_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sess_manager`
--
ALTER TABLE `sess_manager`
  ADD CONSTRAINT `sess_manager_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
