-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 06:56 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

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
(1, 'binita', 'shrestha', 'binita67@gmail.com', 'binita.jpg', 'a8b8d7919fc2a40f752d0a9157cdc02a'),
(2, 'sonish', 'maharjan', 'sonishmaharjan1@gmail.com', 'sonish.jpg', '5e1a81a46127a624e8038e5f83799bcf'),
(3, 'Bnta', 'Stha', 'binu321@hotmail.com', 'bnta.jpg', 'a8b8d7919fc2a40f752d0a9157cdc02a'),
(4, 'aarya', 'shrestha', 'aarya1@gmail.com', 'aarya.jpg', '44f580569a03ef128ce6437793c6d506');

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
(3, 1, '2019-10-04 15:15:40', 'no'),
(4, 1, '2019-10-04 15:20:54', 'no'),
(5, 1, '2019-10-04 15:21:46', 'no'),
(6, 1, '2019-10-04 15:22:01', 'no'),
(7, 2, '2019-10-04 15:23:24', 'no'),
(8, 2, '2019-10-04 15:24:12', 'no'),
(9, 2, '2019-10-04 15:25:57', 'no'),
(10, 1, '2019-10-04 15:27:23', 'no'),
(11, 1, '2019-10-04 15:28:41', 'no'),
(12, 1, '2019-10-04 15:29:15', 'no'),
(13, 1, '2019-10-04 15:29:56', 'no'),
(14, 2, '2019-10-04 15:30:08', 'no'),
(15, 1, '2019-10-04 15:30:29', 'no'),
(16, 1, '2019-10-04 15:31:42', 'no'),
(18, 2, '2019-10-04 16:56:44', 'no'),
(19, 2, '2019-10-04 17:14:33', 'no'),
(20, 2, '2019-10-04 17:17:44', 'no'),
(22, 2, '2019-10-04 18:42:24', 'no'),
(26, 2, '2019-10-07 14:04:21', 'no'),
(27, 1, '2019-10-07 16:19:14', 'no'),
(28, 1, '2019-10-07 19:23:26', 'no'),
(29, 2, '2019-10-07 17:32:57', 'no'),
(30, 3, '2019-10-07 18:22:47', 'no'),
(31, 3, '2019-10-07 21:32:16', 'no'),
(32, 1, '2019-10-07 23:16:12', 'no'),
(33, 1, '2019-10-07 23:46:41', 'no'),
(34, 1, '2019-10-08 20:58:42', 'no'),
(35, 2, '2019-10-08 17:02:01', 'no'),
(36, 2, '2019-10-08 19:35:54', 'no'),
(37, 2, '2019-10-08 20:58:39', 'no'),
(38, 1, '2019-10-08 21:22:09', 'yes'),
(39, 2, '2019-10-08 21:22:40', 'no');

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
(1, 1, 2, '0000-00-00 00:00:00', 'Hello\r\nHow are you?\r\nI am fine here. I hope you are doing well. How is your college going on. Do write me soon.', 1, 0, '0'),
(2, 2, 1, '2019-10-05 14:00:00', 'Hi.\r\nI am fine.', 1, 1, 'binita shrestha'),
(3, 2, 1, '0000-00-00 00:00:00', 'helloo.', 1, 0, '0'),
(18, 1, 2, '2019-10-07 17:16:46', 'What happen?', 1, 1, 'binita shrestha'),
(19, 1, 2, '2019-10-07 17:18:09', 'what  happen?', 1, 1, 'binita shrestha'),
(20, 1, 3, '2019-10-07 17:30:20', 'Hey Sonish What are you doing?', 0, 0, '0'),
(25, 1, 3, '2019-10-07 23:23:58', 'hey\n', 0, 0, '0'),
(26, 1, 2, '2019-10-07 23:24:17', 'yes', 1, 0, '0'),
(28, 1, 3, '2019-10-07 23:42:50', 'hey', 0, 0, '0'),
(29, 1, 3, '2019-10-07 23:44:15', 'you there\n', 0, 0, '0'),
(30, 1, 2, '2019-10-08 16:05:29', 'hey\n', 1, 0, '0'),
(31, 2, 1, '2019-10-08 16:56:34', 'hi\n', 1, 0, '0'),
(32, 2, 1, '2019-10-08 16:57:57', 'hello\n', 1, 0, '0'),
(33, 2, 1, '2019-10-08 16:58:13', 'heyyy\n', 1, 0, '0'),
(35, 1, 2, '2019-10-08 17:21:39', 'I am fine here i hope you are doing great hope to see you soon.take care bye\n', 1, 0, '0'),
(36, 2, 1, '2019-10-08 17:38:47', 'hey there delialah.\n', 1, 0, '0'),
(37, 1, 2, '2019-10-08 21:02:50', 'hey\n', 1, 1, 'sonish maharjan'),
(38, 2, 1, '2019-10-08 21:03:20', 'hello', 1, 1, 'sonish maharjan'),
(39, 1, 2, '2019-10-08 21:13:59', 'umm\n', 1, 0, ''),
(40, 1, 2, '2019-10-08 21:14:22', 'yes\n', 1, 0, '');

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
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logindetail`
--
ALTER TABLE `logindetail`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
