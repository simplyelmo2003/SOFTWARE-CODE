-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 03:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminuser`
--

CREATE TABLE `tbl_adminuser` (
  `id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_adminuser`
--

INSERT INTO `tbl_adminuser` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'arcoracky@gmail.com', 'arco'),
(2, 'rgarco', 'rg@g.com', 'rgarco'),
(3, 'arco', 'arco@gmail.com', 'arco');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(15) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `log_in` time NOT NULL,
  `break_out` time NOT NULL,
  `break_in` time NOT NULL,
  `log_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `emp_id`, `date`, `log_in`, `break_out`, `break_in`, `log_out`) VALUES
(42, '2021-0171', '2023-02-16', '11:03:37', '12:00:11', '01:25:18', '05:00:42'),
(43, '2021-0001', '2023-02-16', '11:03:54', '12:00:36', '01:25:01', '05:00:47'),
(44, '2021-0099', '2023-02-16', '11:04:05', '12:00:31', '01:25:05', '05:00:24'),
(45, '1998-9605', '2023-02-16', '11:04:12', '12:00:27', '01:25:10', '05:00:37'),
(46, '2021-0005', '2023-02-16', '11:04:32', '12:07:14', '01:24:58', '05:00:28'),
(47, '2021-0004', '2023-02-16', '11:04:53', '12:00:22', '01:25:14', '05:00:33'),
(48, '2021-0011', '2023-02-16', '00:00:00', '00:00:00', '01:36:46', '00:00:00'),
(49, '2021-0171', '2023-02-17', '09:59:59', '00:00:00', '03:58:31', '04:35:09'),
(50, '2021-0004', '2023-02-17', '10:00:11', '00:00:00', '03:58:27', '04:35:04'),
(51, '2021-0001', '2023-02-17', '10:00:18', '00:00:00', '03:58:36', '04:35:17'),
(52, '2021-0005', '2023-02-17', '10:00:25', '00:00:00', '03:58:40', '04:35:23'),
(53, '2021-0099', '2023-02-17', '10:00:30', '00:00:00', '03:58:33', '04:35:13'),
(54, '2021-0099', '2023-02-20', '00:00:00', '00:00:00', '03:17:23', '05:38:08'),
(55, '1998-6788', '2023-02-21', '11:56:41', '12:00:32', '00:00:00', '00:00:00'),
(56, '2021-0011', '2023-02-21', '11:57:03', '12:00:22', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` varchar(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `qr_image` blob NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `fname`, `mname`, `lname`, `department`, `qr_code`, `password`, `usertype`, `qr_image`) VALUES
('1998-6788', 'RUEL', 'RANOLLO', 'LADRES', 'Operation Dept.', '1998-6788', 'ruel', 'user', 0x313637363935313731342e706e67),
('1998-9605', 'Reymart', '', 'Balaga', 'Accounting/FASD Unit', '1998-9605', 'reymart', 'admin', 0x313637363531363134362e706e67),
('2021-0001', 'Carlo', 'Morales', 'Ellera', 'Supply and Procurement Unit', '2021-0001', 'ellera', 'user', 0x313637363531353937382e706e67),
('2021-0004', 'Hazel', 'Lapinid', 'Quimzon', 'Office of the Administrator', '2021-0004', 'hazel', 'user', 0x313637363531363130352e706e67),
('2021-0005', 'Lorenzo', 'Melida', 'Habolin', 'Operation Unit', '2021-0005', 'lorenzo', 'user', 0x313637363531363230302e706e67),
('2021-0011', 'sample', 'sample', 'sample', 'sample', '2021-0011', 'sample', 'user', 0x313637363532353731352e706e67),
('2021-0099', 'Racky', 'Gealogo', 'Arco', 'Operation Unit', '2021-0099', 'racky', 'admin', 0x313637363531353930342e706e67),
('2021-0171', 'Pearlyjoy', 'Guindulman', 'Traya', 'Accounting/FASD Unit', '2021-0171', 'pearlyjoy', 'user', 0x313637363531363034362e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pm_att`
--

CREATE TABLE `tbl_pm_att` (
  `id` int(15) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `break_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pm_att`
--

INSERT INTO `tbl_pm_att` (`id`, `emp_id`, `date`, `break_in`, `time_out`) VALUES
(12, '2019-0099', '2023-02-09', '01:06:40', '05:34:29'),
(16, '2021-0010', '2023-02-09', '01:15:52', '05:34:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminuser`
--
ALTER TABLE `tbl_adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_pm_att`
--
ALTER TABLE `tbl_pm_att`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminuser`
--
ALTER TABLE `tbl_adminuser`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_pm_att`
--
ALTER TABLE `tbl_pm_att`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
