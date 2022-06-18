-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 06:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_leave`
--

CREATE TABLE `applied_leave` (
  `a_id` int(11) NOT NULL,
  `l_from` varchar(255) NOT NULL,
  `l_to` varchar(255) NOT NULL,
  `e_leave` varchar(255) NOT NULL,
  `m_leave` varchar(255) NOT NULL,
  `c_leave` varchar(255) NOT NULL,
  `assign_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_leave`
--

INSERT INTO `applied_leave` (`a_id`, `l_from`, `l_to`, `e_leave`, `m_leave`, `c_leave`, `assign_by`, `status`, `comment`, `created_at`) VALUES
(1, '2022-06-20', '2022-06-23', ' 4', '4', '4', '16', 'approved', 'approved', '2022-06-18 02:12:57'),
(2, '2022-06-20', '2022-06-23', ' 4', '', '', '17', 'approved', '', '2022-06-18 02:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `id` int(11) NOT NULL,
  `v_from` varchar(255) NOT NULL,
  `v_to` varchar(255) NOT NULL,
  `e_leave` varchar(255) NOT NULL,
  `m_leave` varchar(255) NOT NULL,
  `c_leave` varchar(255) NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `assign_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `v_from`, `v_to`, `e_leave`, `m_leave`, `c_leave`, `assign_to`, `assign_by`, `created_at`) VALUES
(12, '2022-06-19', '2023-06-18', ' 8', '8', '8', '18', '14', '2022-06-17 04:33:14'),
(13, '2022-06-19', '2023-06-18', ' 8', '8', '8', '17', '14', '2022-06-17 04:33:14'),
(14, '2022-06-19', '2023-06-18', ' 8', '8', '8', '16', '14', '2022-06-17 04:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `message`, `user_id`, `assigned_by`, `created_at`) VALUES
(3, 'hi this first way to express my self.', 16, 14, '2022-06-08 04:50:01'),
(4, 'hi this first way to express my self.', 17, 14, '2022-06-08 00:58:24'),
(5, 'hi this first way to express my self. dgdfgdfg', 14, 14, '2022-06-08 04:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `task_reply`
--

CREATE TABLE `task_reply` (
  `task_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `m_id` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_reply`
--

INSERT INTO `task_reply` (`task_id`, `reply`, `m_id`, `reply_by`, `created_at`) VALUES
(3, 'hello raj how are you', 3, 16, '2022-06-13 22:00:54'),
(4, 'my name is sonu', 4, 17, '2022-06-13 22:19:06'),
(5, 'ok sonu', 4, 14, '2022-06-13 22:19:52'),
(6, 'ok', 3, 14, '2022-06-13 22:25:35'),
(7, 'rajaj singh i am & am happy', 3, 16, '2022-06-13 22:29:42'),
(8, 'ok dear', 3, 14, '2022-06-13 22:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `department` varchar(191) NOT NULL,
  `role` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `department`, `role`, `created_at`) VALUES
(14, 'kaushal', 'rajkaushal02@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'web-devlopment', 'admin', '2022-06-13 22:02:28'),
(16, 'mohan', 'mohan@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'web-devlopment', 'employee', '2022-06-08 04:34:25'),
(17, 'sonu', 'sonu@gmail.com', 'b98d0a02cc0246ead47e5a1d7e852963', 'seo', 'employee', '2022-06-07 23:52:04'),
(18, 'ranu', 'ranu@gmail.com', 'b3c0e3ec57230789eece8c66c18df027', 'seo', 'employee', '2022-06-07 23:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_leave`
--
ALTER TABLE `applied_leave`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `task_reply`
--
ALTER TABLE `task_reply`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_leave`
--
ALTER TABLE `applied_leave`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task_reply`
--
ALTER TABLE `task_reply`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
