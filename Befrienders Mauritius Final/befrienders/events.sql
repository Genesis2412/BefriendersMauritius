-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 02:10 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article_and_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `EventName` varchar(300) NOT NULL,
  `EventDescription` longtext NOT NULL,
  `EventType` varchar(100) NOT NULL,
  `EventLocation` varchar(500) NOT NULL,
  `EventDate` date NOT NULL,
  `EventTime` time NOT NULL,
  `CoverImage` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `EventName`, `EventDescription`, `EventType`, `EventLocation`, `EventDate`, `EventTime`, `CoverImage`) VALUES
(1, 'Suicide Prevention Campaign', 'For the world Suicide Prevention Day, we will be hosting a suicide prevention campaign in order to create awareness to the general public. There will also be a trail which will be open.', 'Awareness', 'Moka Park', '2020-11-28', '09:30:00', ''),
(2, 'Don De Sang', 'Befrienders Mauritius is organising a don de sang to help the blood bank of mauritius', 'Talk', 'Port Louis', '2020-11-20', '09:00:00', 'blood.jpg'),
(3, ' Trail - Piton Trail Park ', ' Befrienders Mauritius is pleased to announce you their first ever Trail event in collaboration with MFDC and University of Mauritius ', 'Others', 'Piton, Pamplemousse', '2020-11-30', '12:00:00', 'trail.jpg'),
(4, 'DUMMYEVENT1', 'DUMMYEVENT1', 'Refresher Course', 'Belle mare ', '2020-11-30', '09:00:00', ''),
(5, 'DUMMY22', 'DUMMY22', 'Others', 'Palmar', '2020-11-20', '09:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
