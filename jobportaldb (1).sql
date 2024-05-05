-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 10:26 AM
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
-- Database: `jobportaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `jobid` varchar(10) NOT NULL,
  `applyid` int(25) NOT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`jobid`, `applyid`, `username`) VALUES
('9', 6, 'ruman'),
('10', 7, 'ruman'),
('11', 8, 'rushan'),
('12', 9, 'rushan'),
('12', 10, 'ruman'),
('13', 11, 'ruman');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `blogdescription` varchar(1500) NOT NULL,
  `author` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `likes` int(100) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogid`, `title`, `blogdescription`, `author`, `username`, `likes`, `userid`) VALUES
(5, 'asdas', 'kkkkkkkkkkkkkkkkkkkkkiiiiiiiiiiiiiiiiiiiii', 'sdad', 'iii5', 3, 2),
(6, '	 The Muse', 'Finding the dream job in this dynamic Indian job market can be nerve-wracking! The ultimate goal for all job seekers is to find jobs that are the perfect fit, and the first step towards this is to make informed career choices. As you set out on your job hunt, take the first step by understanding the current hiring trends.\r\n\r\nTo assist you, Naukri.com brings to you its monthly edition of the Naukri JobSpeak report, an index that measures the month-on-month hiring trends based on recruiter activities on Naukri.com and offers insights into the recruiter activities across various industries, cities, and experience levels.\r\n\r\nIn this blog, we will take a look at some of the major highlights from this month’s edition, the Naukri JobSpeak report for January 2023.\r\n\r\nLet’s dive in!\r\n\r\nOverview of the Hiring Trends\r\nHiring activity kicks off on a stable note in 2023\r\n\r\n2023 begins on a cautiously optimistic note as the Naukri JobSpeak index emerged at 2762 tabling a 2% growth in Jan’23 compared to 2716 in Jan’22.\r\n\r\nThe 2% growth is noteworthy as it has been recorded despite a 25% decline in IT sector hiring.\r\n\r\nThe dip in IT sector hiring has been more or less compensated by a hiring spree in the Non-IT sectors such as Insurance, Oil, Hospitality, and Banking.\r\n\r\nNon-metro cities continue to shine in driving job creation. Senior professionals continue to remain in demand.', 'ruman', 'rushan', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `userid` int(10) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `blogid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `username`, `userid`, `comment`, `blogid`) VALUES
(1, 'ruman', 4, 'asad', 0),
(10, 'ruman', 4, 'wer', 0),
(13, 'ruman', 4, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobid` int(10) NOT NULL,
  `jobtitle` varchar(50) NOT NULL,
  `description` varchar(1400) NOT NULL,
  `type` varchar(20) NOT NULL,
  `budget` varchar(1000) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobid`, `jobtitle`, `description`, `type`, `budget`, `username`, `userid`) VALUES
(9, 'lol', 'lol', 'documentation', 'lol', 'iii5', 2),
(10, 'jjj', 'iiuugtyt8liofghjktyuiopfghjklfghjk', 'documentation', '78888', 'ruman', 4),
(11, 'eeeeee', 'sfasdasdg', 'coding', '123', 'ruman', 4),
(12, 'iii', 'iiii', 'research', 'iiiii', 'rushan', 3),
(13, 'research on games development', 'wprokopqwefmnpqongrpoearfjnubakfnablrijgqpoidjvaoisdvm weeeeeeeeeeeee rrrrrrrrrrrrrrrrrrrrrrrr wwwwwwwwwwwwwwwwwww wwwwwwwwwwwwwwwwwww   wwwwwwwwwwwwwww rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr wwwwwwwwwwwwwwwk kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkkkkkkkkkkr ,,,,,,,,,,,,,,,,,,,,,,,,', 'research', '1000', 'ruman', 4);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `userid` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userid`, `username`, `password`, `email`, `gender`) VALUES
(1, 'ezz', '123', 'kk@gmail.c', 'Male'),
(2, 'iii5', 'kkk', 'iii@gmail.com', 'Male'),
(3, 'rushan', 'sss', 'rr@gmail.com', 'Male'),
(4, 'ruman', '12345', 'rumansaiyed23@gmail.com', 'male'),
(5, 'Ruman23', '12345', 'samsmistake@gmail.com', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`applyid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `applyid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
