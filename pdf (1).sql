-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2022 at 01:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(15) NOT NULL DEFAULT 'Student',
  `user_status` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`email`, `password`, `usertype`, `user_status`, `user_id`) VALUES
('', '', 'Student', '', 0),
('bat@gmail.com', '12345', 'Student', '', 0),
('kammu@gmail.com', '123456', 'Student', '', 0),
('mmoinulh@gmail.com', '123456', 'Administrator', '', 0),
('naruto@gmail.com', '12345', 'Student', '', 0),
('qwerty@gmail.com', '12345', 'Student', '', 0),
('ren@gmail.com', '12345', 'Student', '', 0),
('reneljohn83@gmail.com', '12345', 'Student', '', 0),
('renelkun@gmail.com', '12345', 'Student', '', 0),
('reymarkjaytagubasosa@gmail.com', '654321', 'Student', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pdflist`
--

CREATE TABLE `pdflist` (
  `id` int(11) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `pdf` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `glink` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdflist`
--

INSERT INTO `pdflist` (`id`, `link`, `pdf`, `glink`) VALUES
(22, '', 'kenang.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `lname`, `fname`, `mname`, `sex`, `contact_number`, `brgy`, `town`, `province`) VALUES
(30, 'Castaneda', 'Renel John', 'Garduque', 'on', '712469234', 'Batangan', 'gonzaga', 'cagayan'),
(31, 'Castaneda', 'Renel John', 'Garduque', 'on', '12434657989', 'barangan', 'gonzaga', 'cagayan'),
(32, 'Castaneda', 'Renel John', 'Garduque', 'on', '12434657989', 'barangan', 'gonzaga', 'cagayan'),
(33, 'Castaneda', 'Renel John', 'cat', 'on', '04563465326', 'Batangan', 'gonzaga', 'cagayan'),
(34, 'renel', 'Renel John', 'Garduque', 'on', '1436679', 'Batangan', 'gonzaga', 'cagayan'),
(35, 'renel', 'john', 'Garduque', 'on', '124686987', 'Batangan', 'gonzaga', 'cagayan'),
(36, 'Castaneda', 'Renel John', 'Garduque', 'on', '256679', 'barangan', 'gonzaga', 'cagayan'),
(37, 'naruto', 'john', 'Garduque', 'on', '1234568', 'Batangan', 'gonzaga', 'Kponoha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pdflist`
--
ALTER TABLE `pdflist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pdflist`
--
ALTER TABLE `pdflist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
