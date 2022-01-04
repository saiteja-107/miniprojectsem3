-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2022 at 05:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(3) NOT NULL,
  `fname` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `aadhar` int(15) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(10) NOT NULL,
  `alnumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `date`, `aadhar`, `address`, `email`, `number`, `alnumber`) VALUES
(1, 'saiteja', 'kotla', '2020-02-01', 0, 'fdsfgbdvc', 'abc@gmial.com', 234567, 3243567),
(2, 'dasd', 'dsa', '2021-11-10', NULL, 'deaf', 'fdasf@gmail.com', 2343567, 4321356),
(3, 'sathwik', 'p', '1970-01-01', NULL, 'sadasdas,dsdsadsadf,dasdasdsa', 'sathwikpothuoori@gmail.com', 872519237, 928236738),
(4, 'saiteja', 'kotla', '2002-02-01', NULL, 'asfasdf', 'awq@gmial.com', 23445163, 245236),
(5, 'sai teja', 'kotla', '1970-01-01', NULL, 'rffdasscadvzfc', 'fdwf@gmail.com', 32904312, 3740234),
(6, 'fsadgasg', 'sdgasag', '1970-01-01', NULL, 'sdabg', 'adfdsga@gmail', 34252, 43654);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `mobileno` int(200) NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `mobileno`, `email`, `password`) VALUES
('sathwik', 63023, 'sathwikpothunoori@gmail.com', 'sathwik123'),
('saiteja', 987654321, 'sai@gmail.com', 'sai'),
('sai', 2145, 'sai2@gmail.com', 'sai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
