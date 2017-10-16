-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2017 at 02:17 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3272878_jmir_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `Name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Province` varchar(1000) NOT NULL,
  `Telephone` varchar(17) NOT NULL,
  `Postalcode` varchar(7) NOT NULL,
  `Salary` varchar(1000) NOT NULL,
  `Datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Name`, `Province`, `Telephone`, `Postalcode`, `Salary`, `Datetime`) VALUES
(16, 'Brijesh Ahir', 'Ontario', '(416) 471 0293', 'M9V3L6', '45600', '2017-10-15 22:52:48'),
(17, 'Bunty Ahr', 'Nunavut', '416 470 9000', 'M9V3L6', '45000', '2017-10-15 23:03:29'),
(19, 'Abrar', 'Québec', '437 998 6510', 'm9v3l6', '52000', '2017-10-15 23:01:11'),
(20, 'Akash Ahir', 'Saskatchewan', '455-567-9088', 'M9V3L6', '56,700.90', '2017-10-15 23:03:58'),
(21, 'Akash Hirenkumar', 'Ontario', '677-909-1000', 'm9v3l6', '10000', '2017-10-15 23:05:33'),
(22, 'Pranav Patel', 'Québec', '416.455.6788', 'M9V3L6', '34000.89', '2017-10-15 23:08:50'),
(23, 'Amit Shah', 'Ontario', '416-900-0000', 'M9V3L6', '67000', '2017-10-15 23:10:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
