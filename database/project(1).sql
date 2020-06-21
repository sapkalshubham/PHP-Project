-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 11:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `e_rent` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bid`, `pid`, `rent`, `e_rent`, `bill`, `status`) VALUES
(3, 4, 100, 50, 150, 'no'),
(3, 5, 100, 0, 100, 'no'),
(3, 6, 100, 0, 100, 'no'),
(4, 6, 100, 50, 150, 'no'),
(5, 4, 100, 0, 100, 'no'),
(4, 4, 100, 50, 150, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `rid`, `p_id`) VALUES
(3, 5, 4),
(3, 5, 5),
(3, 5, 6),
(4, 5, 6),
(5, 5, 4),
(4, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `game` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `game`, `day`, `start_time`, `end_time`, `name`, `quantity`, `price`, `status`) VALUES
(5, 'football', 'All days', '16:00:00', '19:00:00', 'Football', 5, 50, 'Y'),
(5, 'Table Tennis', 'Weekend', '16:00:00', '19:00:00', 'Racket', 2, 50, 'Y'),
(5, 'basketball', 'Weekend', '15:00:00', '18:00:00', 'basketball', 6, 50, 'Y'),
(6, 'basketball', 'Weekend', '12:00:00', '20:00:00', 'basketball', 5, 50, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `lim`
--

CREATE TABLE `lim` (
  `bid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `date` date NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL,
  `game_name` varchar(20) NOT NULL,
  `players` int(11) NOT NULL,
  `equipment` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lim`
--

INSERT INTO `lim` (`bid`, `rid`, `date`, `s_time`, `e_time`, `game_name`, `players`, `equipment`, `quantity`) VALUES
(3, 5, '2020-05-18', '17:00:00', '18:00:00', 'Football', 8, 'Football', 4),
(4, 5, '2020-05-23', '17:00:00', '18:00:00', 'Basketball', 8, 'basketball', 4),
(5, 5, '2020-05-19', '17:00:00', '18:00:00', 'Football', 10, 'Football', 5);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `rid` int(11) NOT NULL,
  `starting_from` date NOT NULL,
  `lasting_till` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `player_info`
--

CREATE TABLE `player_info` (
  `pid` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `image` int(11) NOT NULL DEFAULT 0,
  `about` text NOT NULL,
  `sum` int(11) NOT NULL DEFAULT 0,
  `number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_info`
--

INSERT INTO `player_info` (`pid`, `age`, `image`, `about`, `sum`, `number`) VALUES
(4, 20, 1, 'I am an avid basketball player. I have played mant tournaments.', 19, 2),
(5, 20, 1, 'I am an expert football player. I play all sports, however.', 17, 2),
(6, 20, 1, 'I am Radhika', 10, 1),
(7, 20, 1, 'I am expert player of badminton.', 0, 0),
(8, 20, 1, 'I am an excellent TT player.', 0, 0),
(9, 20, 1, 'I love playing basketball.', 0, 0),
(11, 20, 1, 'I am Sushant.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rated_by` int(11) NOT NULL,
  `rated_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rated_by`, `rated_to`) VALUES
(6, 4),
(6, 0),
(6, 5),
(4, 6),
(4, 5),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rentee`
--

CREATE TABLE `rentee` (
  `rid` int(11) NOT NULL,
  `rname` varchar(20) NOT NULL,
  `number` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `street` varchar(20) NOT NULL,
  `landmark` varchar(20) NOT NULL,
  `locality` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentee`
--

INSERT INTO `rentee` (`rid`, `rname`, `number`, `username`, `password`, `street`, `landmark`, `locality`, `city`) VALUES
(5, 'MITAOE', 987688765, 'mae', 'eb4a4a36e4d53916f9979759c3d3b822', 'Alandi road', 'Yewle Chaha', 'Dehu Phata', 'Alandi'),
(6, 'MG Gymkhana', 98679856, 'mgg', '63be2953da66a966b3a98d09701ddc48', 'Alandi road', 'Yewle Chaha', 'Dehu Phata', 'Alandi');

-- --------------------------------------------------------

--
-- Table structure for table `rentee_info`
--

CREATE TABLE `rentee_info` (
  `rid` int(11) NOT NULL,
  `about` varchar(100) NOT NULL,
  `image` int(11) NOT NULL,
  `sport` varchar(20) DEFAULT NULL,
  `rent` int(11) NOT NULL,
  `sum` int(11) NOT NULL DEFAULT 0,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentee_info`
--

INSERT INTO `rentee_info` (`rid`, `about`, `image`, `sport`, `rent`, `sum`, `number`) VALUES
(5, '', 1, 'football', 100, 0, 0),
(5, '', 1, 'Table Tennis', 150, 0, 0),
(5, '', 1, 'basketball', 100, 0, 0),
(6, '', 1, 'basketball', 100, 0, 0),
(6, '', 0, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spam`
--

CREATE TABLE `spam` (
  `pid` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spam`
--

INSERT INTO `spam` (`pid`, `count`, `date`) VALUES
(4, 1, '2020-06-05'),
(5, 4, '2020-05-19'),
(6, 0, '0000-00-00'),
(7, 0, '0000-00-00'),
(8, 0, '0000-00-00'),
(9, 0, '0000-00-00'),
(10, 0, '0000-00-00'),
(11, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `spam_record`
--

CREATE TABLE `spam_record` (
  `spam_to` int(11) NOT NULL,
  `spam_from` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spam_record`
--

INSERT INTO `spam_record` (`spam_to`, `spam_from`, `reason`) VALUES
(5, 4, 'He abused me on the ground'),
(4, 5, 'Abuse');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `pid` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone_no` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`pid`, `Name`, `Username`, `Email`, `Phone_no`, `Password`, `city`, `dob`) VALUES
(4, 'Shubham Sapkal', 'sks', 'sk@gmail.com', 986789568, 'cd5706ad15b95f97f59434ff8ed3c976', 'Alandi', '1999-12-10'),
(5, 'Kunal Zope', 'knz', 'kn@gmail.com', 907866589, 'f19e067c3992d9dfde51b2196a11e256', 'Alandi', '2000-09-21'),
(6, 'Radhika Deshmukh', 'rjd', 'rj@gmail.com', 978694579, '6bbb20f71cb5cee8030d21938adafe91', 'Alandi', '2000-02-25'),
(7, 'Shivam Singh', 'sss', 'ss@gmail.com', 986789657, '9f6e6800cfae7749eb6c486619254b9c', 'Mumbai', '1999-08-11'),
(8, 'Ashish Sharma', 'as', 'as@gmail.com', 98768897, 'f970e2767d0cfe75876ea857f92e319b', 'Mumbai', '2000-07-12'),
(9, 'Sanskar Sharma', 'shs', 'sh@gmail.com', 97805645, '8ce4f98878b0c302cb3de0dcd27d8bc8', 'Alandi', '1999-03-21'),
(11, 'Sushant Patil', 'sp', 'sp@gmail.com', 980758469, '1952a01898073d1e561b9b4f2e42cbd7', 'Alandi', '1998-05-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD KEY `bid` (`bid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD KEY `bid` (`bid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD KEY `id` (`id`);

--
-- Indexes for table `lim`
--
ALTER TABLE `lim`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `player_info`
--
ALTER TABLE `player_info`
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `rentee`
--
ALTER TABLE `rentee`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `rentee_info`
--
ALTER TABLE `rentee_info`
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lim`
--
ALTER TABLE `lim`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rentee`
--
ALTER TABLE `rentee`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `lim` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `users` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `lim` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `rentee` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `users` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `rentee` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lim`
--
ALTER TABLE `lim`
  ADD CONSTRAINT `lim_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `rentee` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `player_info`
--
ALTER TABLE `player_info`
  ADD CONSTRAINT `player_info_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `users` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rentee_info`
--
ALTER TABLE `rentee_info`
  ADD CONSTRAINT `rentee_info_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `rentee` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
