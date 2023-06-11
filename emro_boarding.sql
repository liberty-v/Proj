-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 08:56 PM
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
-- Database: `emro_boarding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, '12373', '100200'),
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `date_due` varchar(15) NOT NULL,
  `rent` varchar(15) NOT NULL,
  `electricity` varchar(15) NOT NULL,
  `water` varchar(15) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `date_due`, `rent`, `electricity`, `water`, `status`) VALUES
(1, '2023-04-20', '₱7000.00', '₱2000.00', '₱376.00', 'Paid'),
(2, '2023-05-20', '₱7000.00', '₱1300.00', '₱120.00', 'Paid'),
(3, '2023-06-20', '₱7000.00', '₱1200.00', '₱210.00', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `boarders`
--

CREATE TABLE `boarders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `room_number` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boarders`
--

INSERT INTO `boarders` (`id`, `first_name`, `last_name`, `contact_number`, `room_number`) VALUES
(1, 'Liberty', 'Vasquez', '09127487091', 'D1'),
(2, 'John', 'Doe', '09876543210', 'U2');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `issue_desc` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `issue_desc`, `status`) VALUES
(1, 'Some of the electrical outlets are not functioning and the last owner of the room had broken the door down so currently the room does not have a door.', 'In progress');

-- --------------------------------------------------------

--
-- Table structure for table `roomt`
--

CREATE TABLE `roomt` (
  `id` int(11) NOT NULL,
  `room_number` varchar(5) NOT NULL,
  `monthly_rent` varchar(45) NOT NULL,
  `availability` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomt`
--

INSERT INTO `roomt` (`id`, `room_number`, `monthly_rent`, `availability`) VALUES
(1, 'D1', '₱7000.00', 'Occupied'),
(2, 'D2', '₱6000.00', 'Under Maintenance'),
(3, 'U1', '₱6000.00', 'Available'),
(4, 'U2', '₱7000.00', 'Occupied');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boarders`
--
ALTER TABLE `boarders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomt`
--
ALTER TABLE `roomt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boarders`
--
ALTER TABLE `boarders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roomt`
--
ALTER TABLE `roomt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
