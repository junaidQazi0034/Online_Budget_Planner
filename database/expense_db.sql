-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 05:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budget_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `income` int(20) NOT NULL,
  `saving` int(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budget_id`, `title`, `income`, `saving`, `user_id`) VALUES
(1, 'January 2024', 50000, 20000, 1),
(2, 'December 2023', 70000, 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(20) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `expense` int(20) NOT NULL,
  `expensedate` varchar(15) NOT NULL,
  `expensecategory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `user_id`, `expense`, `expensedate`, `expensecategory`) VALUES
(1, '1', 200, '2018-02-25', 'Bills & Recharges'),
(3, '1', 490, '2019-12-06', 'Others'),
(4, '1', 1200, '2019-12-06', 'Medicine'),
(5, '2', 1000, '2020-06-09', 'Medicine'),
(7, '2', 8000, '2014-06-11', 'Medicine'),
(8, '2', 5432, '2020-06-26', 'Bills & Recharges'),
(9, '2', 543, '2020-06-25', 'Food'),
(10, '2', 7654, '2020-04-09', 'Others'),
(11, '2', 5562, '2020-06-03', 'Food'),
(12, '2', 3554, '2020-04-08', 'Medicine'),
(13, '2', 1200, '2020-06-26', 'Entertainment'),
(14, '1', 1500, '2020-06-26', 'Bills & Recharges'),
(16, '4', 2000, '2020-06-26', 'Entertainment'),
(17, '4', 950, '2020-06-26', 'Bills & Recharges'),
(18, '4', 400, '2020-06-26', 'Food'),
(19, '4', 50, '2020-06-26', 'Medicine'),
(20, '4', 700, '2020-06-26', 'Food'),
(21, '4', 230, '2020-03-12', 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT 'Inactive',
  `userType` varchar(10) DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `status`, `userType`) VALUES
(1, 'Admin', '', 'admin@gmail.com', 'a', 'Active', 'Admin'),
(2, 'Umar', 'Farooq', 'umar@gmail.com', 'a', 'Active', 'User'),
(4, 'Ali', 'Haider', 'ali@gmail.com', 'a', 'Inactive', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budget_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
