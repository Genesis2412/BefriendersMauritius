-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 02:09 PM
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
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ArticleID` int(11) NOT NULL,
  `ATitle` varchar(300) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `TimeWritten` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ArticleData` longtext NOT NULL,
  `CoverImage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ArticleID`, `ATitle`, `Author`, `TimeWritten`, `ArticleData`, `CoverImage`) VALUES
(1, ' Demo To Change ', 'Sam Smith', '2020-11-05 22:46:10', ' Demo to change Description ', 'Article1.jpg'),
(3, 'Suicide in Teenagers', 'Raphael Emrith', '2020-11-03 15:53:25', 'Suicide in teenagers have greatly been an issue. In Mauritius, the suicide rate for teenagers is 10%, that is, an increase of 2% over the past 5 years. We, Befrienders Mauritius are commited to work against all odds to provide any help to people in need to voice themselves out.', ''),
(4, 'Suicide in Elderly Person', 'Dan Smith', '2020-11-03 15:55:01', 'Suicide in elderly(3eme age) has experienced an increased percentage of 1.5% in the last 2 years. If you want to talk to us, feel free to contact us via our facebook page or website at www.befriendersMauritius.com', ''),
(5, '10th Anniversary', 'Jose Emillien', '2020-11-03 22:55:11', 'Befrienders Mauritius is celebrating its 10th birthday on 24 July 2021. Please accompany us in this celebration with a suicide awareness on the same day at 09.00 in front of Beau bassin police Station', ''),
(6, 'DUMMY TXT', 'DUMMY TXT', '2020-11-03 17:25:33', 'DUMMY TXT', ''),
(7, 'Suicide Study in Port Louis', 'Michael Smith', '2020-11-03 22:20:54', 'Suicide Study in Port Louis was conducted on 31/11/2023', ''),
(8, 'Don de Sang at Bel Air', 'Rishi Beeharry', '2020-11-03 22:20:54', 'Please do attend the Don de Sang which will be at bel air ', ''),
(9, 'COVID-19 Post stress counselling', 'Jose Emillien', '2020-11-03 22:22:24', 'Post COVID-19 counselling is a must. Many countries are going towards this . Mauritius should do the same too.\r\nBefrienders is organising this event in colaboration with Digicup.', ''),
(21, 'Developer First', 'DevArticle', '2020-11-05 17:10:36', ' DemoUploadSyst', ''),
(22, 'xdwfgwhe', 'DevArticle', '2020-11-05 21:57:53', ' serte', ''),
(23, ' Adding New Article ', 'DevArticle', '2020-11-05 23:15:03', '  Bla bla bla blaaaa', ''),
(24, 'dds', 'DevArticle', '2020-11-05 23:20:01', ' ssaasd', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ArticleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ArticleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
