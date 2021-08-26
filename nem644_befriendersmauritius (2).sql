-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 02:20 AM
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
-- Database: `nem644_befriendersmauritius`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(38, 'Digitalised Web Service as from 7 November', 'DevArticle', '2020-11-07 04:56:48', ' Befrienders Mauritius is pleased to announce the\r\n public that a new online system has been created.\r\nYou can contact us directly from our website at \r\nwww.befriendersmauritius.com/ .', ''),
(39, 'Digitalised Web Service as from 7 November', 'DevArticle', '2020-11-07 04:56:53', ' Befrienders Mauritius is pleased to announce the\r\n public that a new online system has been created.\r\nYou can contact us directly from our website at \r\nwww.befriendersmauritius.com/ .', ''),
(40, 'Digitalised Web Service as from 7 November', 'DevArticle', '2020-11-07 04:57:32', ' Digitalise service launch', ''),
(41, 'Opening first Article', 'DevArticle', '2021-02-05 19:13:40', ' hhs Hello world', '601d98e456fdc3.05387562.jpg'),
(44, 'WEBDEV SERVS', 'DevArticle', '2021-08-25 22:36:08', ' TESTING 123', ''),
(45, ' asd ', 'DevArticle', '2021-08-25 23:07:43', '  asd ffa', ''),
(46, 'FinalWebDatas', 'DevArticle', '2021-08-25 22:50:27', ' asdfg', '');

-- --------------------------------------------------------

--
-- Table structure for table `articleimages`
--

CREATE TABLE `articleimages` (
  `ArticleID` int(11) NOT NULL,
  `Path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(17, 'Awareness Përe Laval', ' The awareness Pere Laval Event Description', 'Awareness', 'Beau Bassin', '2020-09-08', '09:00:00', '5fa5b1b2be7708.94219570.jpg'),
(18, 'Train the trainer', 'Train the trainer Event Description Goes here ', 'Formation', 'Beau Bassin', '2019-05-06', '09:00:00', '5fa5b221ec2238.96683843.jpg'),
(19, 'World Suicide Prevention Day ', ' World Suicide Prevention Day Event Description goes here ', 'Talk', 'BPS College Beau Bassin', '2018-09-29', '09:30:00', '5fa5b27d5542d9.29089761.jpg'),
(30, '  Food donation At Flacq  ', '  Food will be donated at flacq . Ammended', 'Others', 'Flacq', '2021-08-26', '08:26:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `ID` int(11) NOT NULL,
  `sec_name` varchar(40) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(8000) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`ID`, `sec_name`, `image`, `description`, `link`) VALUES
(1, 'banner', './img/Banner1.jpeg', '', ''),
(2, 'banner', './img/Banner2.jpeg', '', ''),
(3, 'banner', './img/Banner3.jpeg', '', ''),
(4, 'aboutus', './img/president.png', 'José Emilien is our actual President and has been in charge of Befrienders for the past 6 years. He has\r\nfollowed the Training Course to become a volunteer of the NGO in 2006 and has ever since been\r\nregularly listening and helping all those needing an emotional support.\r\nJosé Emilien has always had the social fibre inherited from a family very active in the community. During\r\nhis college days, he was already involved in extracurricular activities, visiting and helping in Homes for\r\nthe elderly or children in need. After his professional studies in Computer Science and Business, he\r\ndedicated a large part of his spare time to those in need.\r\nApart from Befrienders, he has also been a regular member of Caritas and most particularly with the\r\nHomeless of Abri de Nuit of Plaine Wilhems. Psychological and continuous training has enabled him to\r\nbe more professional in providing a holistic approach to people in distress, not only in material help but\r\nalso in the emotional support they need to get back their resilience in life.', '\"Suicide doesn’t end the chances of life getting worse, it eliminates the possibility of it ever getting any better.\" – Unknown'),
(5, 'ourteam', './img/grouppic.jpg', '', ''),
(6, 'ourpromise', '', 'Our mission is to be a principal resource in emotional support delivered by volunteers. We value giving a person the opportunity to explore feelings which can cause distress, the importance of being listened to, in confidence, anonymously. We believe in the capacity for each person to build up his resilience and take fundamental descisions about his own life.', 'OUR MISSION'),
(7, 'ourpromise', '', 'A society in which nobody dies by suicide, where people are able to explore their own feelings, acknowledge and respect the feelings of others.', 'OUR VISION'),
(8, 'ourpromise', '', 'Our values are based on these beliefs. The importance of having the opportunity to express painful feelings. That being listened to, in confidence and accepted without prejudice can alleviate despair and suicidal feelings.', 'OUR VALUES'),
(9, 'getintouch', '', '1st Floor Flat, 152 Royal Road, Beau Bassin', 'Address'),
(10, 'getintouch', '', '+230 8009393', 'HOTLINE'),
(11, 'getintouch', '', '+230 4670160', 'Phone'),
(12, 'getintouch', '', '+230 54837233', 'Whatsapp'),
(13, 'getintouch', '', 'adminofficer.befrienders@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `Username` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` int(8) NOT NULL,
  `position` text NOT NULL,
  `JobPosition` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `Username`, `address`, `Password`, `email`, `contact_number`, `position`, `JobPosition`, `status`) VALUES
(8, 'Hiresh', 'Pandoo', 'Pandoo1', 'NIL', '81dc9bdb52d04dc20036dbd8313ed055', 'hiresh@test.com', 0, 'Pos1', 'WebMaster', 'off'),
(9, 'Dinesh', 'Boyjoo', 'Boyjoo1', 'NIL', '81dc9bdb52d04dc20036dbd8313ed055', 'boyjoo@test.com', 0, 'Pos1', 'WebDev', 'on'),
(10, 'Base Level', 'Tester', 'BL', 'NIL', '81dc9bdb52d04dc20036dbd8313ed055', 'deve@umail.uom.ac.mu', 0, 'Pos3', 'WebMaster', 'off'),
(12, 'Befrienders', 'NGO', 'BEFNGO', 'Beau Bassin', '81dc9bdb52d04dc20036dbd8313ed055', 'adminofficer.befrienders@gmail.com', 4670160, 'Pos1', 'Owner', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `status` varchar(5) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`ID`, `name`, `remark`, `status`, `rating`) VALUES
(3, 'Alex Rogers', 'Befrienders helped me overcome my sadness. I owe them my life ', 'on', 5),
(4, 'Nikhilesh Seechurn', 'I volunteered at Befrienders Mauritius. It was an honour to help others', 'off', 5),
(6, 'Nikhilesh Seech', 'I volunteered at Befrienders Mauritius. It was an honour to help others', 'off', 5),
(7, 'Rakesh Seechurn', 'I volunteered at Befrienders Mauritius. It was an honour to help others', 'off', 5),
(8, 'Bavish Seechurn', 'I volunteered at Befrienders Mauritius. It was an honour to help others', 'off', 5),
(10, 'Risha Veluma', 'I was in depression. Befrienders helped me a lot!', 'on', 5),
(12, 'Rishika Velum', 'I was in depression. Befrienders helped me a lot!', 'off', 5),
(13, 'Rish beedasy', 'I was in depression. Befrienders helped me a lot!', 'off', 5),
(14, 'Kavish Beedasy', 'I was in depression. Befrienders helped me a lot!', 'off', 5),
(15, 'Rina Velum', 'I was in depression. Befrienders helped me a lot!', 'off', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ArticleID`);

--
-- Indexes for table `articleimages`
--
ALTER TABLE `articleimages`
  ADD PRIMARY KEY (`ArticleID`,`Path`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ArticleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
