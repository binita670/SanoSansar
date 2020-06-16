-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 03:47 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `uid` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`uid`, `fname`, `lname`, `email`, `picture`, `password`) VALUES
(1, 'shila', 'joshi', 'shila@gmail.com', 'girl.jpg', '7fe80e1bb19905bad889e7d58e4a8c00'),
(2, 'shiva', 'thapa', 'shiva@gmail.com', 'boy.jpg', 'b2326b03df2d65eb4fe5ab6d230ae57f'),
(3, 'shetal', 'kc', 'shetal@gmail.com', 'girl1.jpg', '7975e9f9b1b9c57a37a1aa98ff55e7d1');

-- --------------------------------------------------------

--
-- Table structure for table `logindetail`
--

CREATE TABLE `logindetail` (
  `detailid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `is_type` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindetail`
--

INSERT INTO `logindetail` (`detailid`, `uid`, `timestamp`, `is_type`) VALUES
(1, 2, '2020-06-16 19:28:56', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `fromuid` int(11) NOT NULL,
  `touid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `deletedby` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `fromuid`, `touid`, `timestamp`, `message`, `status`, `deleted`, `deletedby`) VALUES
(1, 1, 2, '2020-06-16 19:23:40', 'Hey shiva! how are you?', 1, 0, ''),
(2, 2, 1, '2020-06-16 19:25:17', 'I am fine. How are you?', 1, 0, ''),
(3, 1, 3, '2020-06-16 19:25:35', 'Hey!!', 1, 0, ''),
(4, 2, 0, '2020-06-16 19:26:02', 'hello everyone\n', 0, 0, ''),
(5, 3, 1, '2020-06-16 19:26:49', 'hi..', 1, 0, ''),
(6, 1, 3, '2020-06-16 19:28:07', 'How you?', 1, 0, ''),
(7, 1, 0, '2020-06-16 19:29:22', 'hello shiva :)', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `logindetail`
--
ALTER TABLE `logindetail`
  ADD PRIMARY KEY (`detailid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logindetail`
--
ALTER TABLE `logindetail`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
