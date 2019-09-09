-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 06:24 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discipline`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `c_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL DEFAULT ' Are You Ready To Give Flight To Your Dreams. Dream is not that which you see while sleeping. It is something that doesn''t let you sleep...',
  `link` varchar(100) NOT NULL DEFAULT 'http://localhost/main/home/'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`c_id`, `image`, `message`, `link`) VALUES
(1, 'banner1.jpg', ' Are You Ready To Give Flight To Your Dreams. Dream is not that which you see while sleeping. It is something that doesn\'t let you sleep...', 'http://localhost/main/home/'),
(2, 'banner2.jpg', ' Are You Ready To Give Flight To Your Dreams. Dream is not that which you see while sleeping. It is something that doesn\'t let you sleep...', 'http://localhost/main/home/'),
(0, 'banner3.jpg', 'hi lav', 'http://localhost/main/home/'),
(0, 'banner7.jpg', 'banner7 msg', 'http://localhost/main/home/');

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `mcq_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `mcq_topic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`mcq_id`, `date`, `status`, `mcq_topic`) VALUES
(1, '2019-09-09', 0, 'c mcq');

-- --------------------------------------------------------

--
-- Table structure for table `mcq_q`
--

CREATE TABLE `mcq_q` (
  `mcq_id` int(11) NOT NULL,
  `mcq_question` varchar(100) NOT NULL,
  `correct_option` int(11) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_q`
--

INSERT INTO `mcq_q` (`mcq_id`, `mcq_question`, `correct_option`, `option1`, `option2`, `option3`, `option4`) VALUES
(1, 'hi lav!', 1, '1', '2', '3', '4'),
(1, 'hi lav1!', 6, '5', '6', '7', '8');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `info` varchar(255) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`info`, `user`) VALUES
('Latest Notice by Lavkush Third time', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL,
  `info` varchar(300) NOT NULL DEFAULT 'No info.',
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`n_id`, `info`, `start_time`, `end_time`, `link`) VALUES
(1, 'hi how are you!', '2019-06-22', '2019-10-15', ''),
(2, 'Cooperative and Competitive Federalism in India', '2019-06-20', '2019-09-18', 'https://www.drishtiias.com/to-the-points/Paper2/cooperative-and-competitive-federalism-in-india/'),
(3, 'Important National Institutions: Autonomous District Councils', '2019-06-20', '2019-07-11', 'https://www.drishtiias.com/important-institutions/drishti-specials-important-institutions-national-institutions/autonomous-district-councils/'),
(5, 'info4', '2016-11-29', '0000-00-00', 'http://localhost/main/home/');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `batch_id` varchar(30) DEFAULT ' Not Assigned',
  `qualification` varchar(100) NOT NULL DEFAULT '12th'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `batch_id`, `qualification`) VALUES
(5, '', '12th');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `s_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`s_id`, `name`, `email`) VALUES
(1, 'Virender Sehwag', 'viru@rediff.com'),
(2, 'OOPs', 'yippe@timepass.com'),
(3, 'a', 'a@a.a');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(11) NOT NULL,
  `qualification` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `qualification`) VALUES
(7, '12th');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `taskId` int(11) NOT NULL,
  `user` varchar(64) NOT NULL,
  `task` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`taskId`, `user`, `task`, `date`, `fromTime`, `toTime`, `status`) VALUES
(1, 'shivam', 'shivam', '2019-08-31', '00:58:00', '23:58:00', 1),
(2, 'lav', 'lav', '2019-08-31', '12:58:00', '12:58:00', 1),
(3, 'shivam', 'shivam1', '2019-08-31', '23:59:00', '12:59:00', 0),
(4, 'lav', 'lav1', '0000-00-00', '00:00:00', '00:00:00', 0),
(5, 'shivam', 'task infinity', '2019-09-09', '10:59:00', '12:00:00', 1),
(6, 'vishnu', 'task powershell', '2019-09-09', '23:59:00', '12:59:00', 1),
(7, 'shivam', 'task todo', '2019-09-01', '00:57:00', '12:59:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploaded`
--

CREATE TABLE `uploaded` (
  `uploadedId` int(11) NOT NULL,
  `taskId` int(11) NOT NULL,
  `fileName` varchar(64) NOT NULL,
  `todayDate` datetime NOT NULL,
  `anyNotes` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded`
--

INSERT INTO `uploaded` (`uploadedId`, `taskId`, `fileName`, `todayDate`, `anyNotes`) VALUES
(48, 2, 'lav_kush.jpg', '2019-08-31 00:00:00', 'hi lav!'),
(49, 1, 'lav_kush1.jpg', '2019-08-31 00:00:00', 'hi dkjdhJKSDBgdkNSN SHDVsdj SHDVBsd text'),
(50, 6, 'lav_img.jpg', '2019-09-01 00:00:00', 'new assignment'),
(51, 4, 'lav_img.jpg', '2019-09-01 00:00:00', 'done finally'),
(52, 4, 'avatar_hat.jpg', '2019-09-01 00:00:00', 'test'),
(53, 4, 'avatar_hat.jpg', '2019-09-01 00:00:00', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `fcontact_no` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `type` int(11) NOT NULL,
  `about_me` text NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'any.jpg',
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `email`, `contact_no`, `fname`, `fcontact_no`, `password`, `dob`, `type`, `about_me`, `image`, `address`) VALUES
(5, 'student', 'student', 'student@gmail.com', 1111111111, 'student', 1111111111, '$2y$10$4liNtzQHkrNgd35udQkWg.vIVCChs6ZYEX/IKdemZhvCq4mdtkm/u', '2015-12-27', 1, 'hi', 'any.jpg', 'bihar'),
(7, 'teacher', 'teacher', 'teacher@gmail.com', 1234567891, 'teacher', 1234567891, '$2y$10$onKIBWlhc.0oR99o7Eg4GOe456mf22ICEyoFiveFzKPptqG.Ur/wa', '2009-07-24', 2, 'teacher', 'any.jpg', 'bihar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`mcq_id`);

--
-- Indexes for table `mcq_q`
--
ALTER TABLE `mcq_q`
  ADD PRIMARY KEY (`mcq_id`,`mcq_question`) USING BTREE;

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`info`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `student_ibfk_2` (`batch_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`taskId`);

--
-- Indexes for table `uploaded`
--
ALTER TABLE `uploaded`
  ADD PRIMARY KEY (`uploadedId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact_no` (`contact_no`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcq`
--
ALTER TABLE `mcq`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uploaded`
--
ALTER TABLE `uploaded`
  MODIFY `uploadedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mcq_q`
--
ALTER TABLE `mcq_q`
  ADD CONSTRAINT `mcq_id_foreign_key` FOREIGN KEY (`mcq_id`) REFERENCES `mcq` (`mcq_id`),
  ADD CONSTRAINT `mcq_q_ibfk_1` FOREIGN KEY (`mcq_id`) REFERENCES `mcq` (`mcq_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
