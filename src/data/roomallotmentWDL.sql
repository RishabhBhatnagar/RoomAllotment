-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2018 at 12:11 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roomallotmentWDL`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `eid` int(11) DEFAULT NULL,
  `room_no` varchar(10) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `booking_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`eid`, `room_no`, `start_time`, `end_time`, `event_date`, `booking_time`) VALUES
(1, '409A', '09:00:00', '15:30:00', '2018-10-25', '2018-10-20 23:49:23'),
(2, '404B', '08:00:00', '17:00:00', '2018-10-30', '2018-10-21 00:04:13'),
(3, '010', '09:00:00', '16:30:00', '2018-10-31', '2018-10-21 00:08:37'),
(4, '503', '08:00:00', '17:00:00', '2018-10-30', '2018-10-21 00:12:28'),
(5, '110', '10:00:00', '17:03:00', '2018-10-31', '2018-10-21 00:17:02'),
(6, '412', '11:00:00', '15:00:00', '2018-10-25', '2018-10-21 00:22:46'),
(7, '404B', '09:00:00', '16:00:00', '2018-10-31', '2018-10-21 11:15:58'),
(8, '402', '09:45:00', '15:30:00', '2018-10-30', '2018-10-21 11:23:39'),
(9, '412', '09:45:00', '14:30:00', '2018-10-31', '2018-10-21 11:46:54'),
(10, '403A', '10:00:00', '15:00:00', '2018-10-30', '2018-10-21 12:44:18'),
(12, '112', '08:08:00', '15:03:00', '2018-10-31', '2018-10-21 15:04:29'),
(13, '406', '08:00:00', '14:00:00', '2018-10-30', '2018-10-21 15:16:54'),
(14, '404A', '09:00:00', '12:00:00', '2018-10-25', '2018-10-21 15:20:28'),
(15, '112', '08:16:00', '16:15:00', '2018-10-30', '2018-10-21 15:24:14'),
(16, '411', '08:00:00', '19:00:00', '2018-10-31', '2018-10-21 15:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `event_detail`
--

CREATE TABLE `event_detail` (
  `eid` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `tags` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `room_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_detail`
--

INSERT INTO `event_detail` (`eid`, `title`, `description`, `tags`, `type`, `status`, `uid`, `room_no`) VALUES
(1, 'Project Development', 'Student Will be taught basics and fundamentals of project development according to PDL manual.', 'NONE', 'EVENT', 'p', 102, '409A'),
(2, 'VCS', 'VCS is version control system which is need of the hour. In this workshop, students will be taught about existing version control systems like Github, GitLab, BitBucket, Ansible, etc.', 'NONE', 'WORKSHOP', 'p', 102, '404B'),
(3, 'CodExpress', 'Hackathon which will be hosted on Hakerearth is a inter college event in which students with good problem solving skills can show their talent. CodeXpress was a huge success last year. We are taking it to next level by making it intercollege and online avaiable for all participants so that they can participate sitting at home.', 'NONE', 'EVENT', 'p', 102, '010'),
(4, 'Arduino', 'Students will be taught basics of Micro-controllers with the help of Arduino Micro-controller which includes interfacing arduino with Modules such as bluetooth module, wifi driver, HC05, ESP 8266, LSA08, which may help them in developing autonomous robots in future.', 'NONE', 'WORKSHOP', 'p', 101, '503'),
(5, 'PCB design', 'Students can gain an insight of building real-time PCB using Altium software. Using the  scchema and architecture mad e by students using Altium, They will also be taught to print a PCB board using etching techniques.', 'NONE', 'WORKSHOP', 'p', 101, '110'),
(6, 'Robotics', 'A highly skilled professional Professor from Mellon university will have a short talk with students of our college regarding the scope and their interests in Robotics. Thereby sharing software and automation tools they can use for their projects', 'NONE', 'SEMINAR', 'p', 101, '412'),
(7, 'R-Pi', 'Teaching basics of Raspberry Pi micro-controller and microprocessor. RPi is an Operating System which can be used to design the Robotic brain of autonomous/mechanically controlled robot. Camera with d-sensors will be taught to interface with Rpi.', 'NONE', 'WORKSHOP', 'p', 101, '404B'),
(8, 'Project Proposal', 'Proposal of discussed ideas for execution of robot for Robocon event in March 2019 which will be held at Pune. Several ideas will be brainstormed and cross questioned for better solution.', 'NONE', 'MEETING', 'p', 101, '402'),
(9, 'Budget Planning', 'Discussion on financial budget planning for event that was finalised in previous discussions.', 'NONE', 'MEETING', 'p', 101, '412'),
(10, 'SAKEC', 'Workshop on Web Development using WordPress. WordPress is a free, open source content management system(CMS) based on PHP and MySQL. It is used by more than 60 million websites.', 'NONE', 'WORKSHOP', 'p', 103, '403A'),
(12, 'tp', 'tp', 'IRIS', 'WORKSHOP', 'p', 102, '112'),
(13, 'Python Advanced', 'Teaching to use python3 language as a tool for development of efficient technologies.', 'NONE', 'WORKSHOP', 'p', 100, '406'),
(14, 'future CSI events', 'Discussion of future events with new recruited team members.', 'NONE', 'MEETING', 'p', 100, '404A'),
(15, 'ICT QUIZ competition', 'Take the opportunity of showing your talent in most competitve quiz competition. You can come in a team of 2-4. Prizes worth 2000 to be won.', 'NONE', 'EVENT', 'p', 100, '112'),
(16, 'Tableau', 'Hands-on workshop on Tableau and data analysis. In this workshop, students will be taught to work with spreadsheets, cloud, big data which is very easy and intuitive to use.', 'NONE', 'WORKSHOP', 'p', 100, '411');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_no` varchar(10) NOT NULL,
  `room_type` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `room_type`) VALUES
('001', 'o'),
('010', 'o'),
('109', 'o'),
('110', 'o'),
('112', 'l'),
('201A', 'l'),
('401A', 'l'),
('401B', 'l'),
('402', 'c'),
('403A', 'l'),
('403B', 'l'),
('404A', 'l'),
('404B', 'l'),
('405', 'o'),
('406', 'o'),
('407', 'o'),
('408', 'o'),
('409A', 'l'),
('409B', 'l'),
('410', 'c'),
('411', 'c'),
('412', 'c'),
('503', 'c'),
('504', 'c'),
('504B', 'l'),
('509', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `comm_name` varchar(20) DEFAULT NULL,
  `comm_head` varchar(20) DEFAULT NULL,
  `fac_head` varchar(20) DEFAULT NULL,
  `pswd` varchar(128) DEFAULT NULL,
  `type_of_user` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `comm_name`, `comm_head`, `fac_head`, `pswd`, `type_of_user`) VALUES
(100, 'CSI', 'harsh jalan', 'Ms Amritha Mathur', 'b08c9cc17310aaea85baf7dc54cdc78a7b69c4521c71b39d7c2821f9886bfa385a82cdb525fec4fb80be34a473aa18e0909c898d083a27409ba68a4cfc45d6de', 'u'),
(101, 'ROBOCON', 'Harrshada Bhagath', 'Shamsuddin Khan', '3563c339d61c198a5a501c989cdf7b973c9aab84c968e25e6b7dee48e07ee23f72721f4788a411b2cb758c59632afd9c23894bbe810d2503767caa0d0d666939', 'u'),
(102, 'CODEX', 'Veerus D Mello', 'Mr Rupesh Mishra', '53aacd0353f0d11b8113f0489d93a96865fefd61e9f7a6e996c6b30e663d0bcac619bf3c1d58d8bea9fdcf4a900366f6cc24c7ae8481387072eab3c62589d6ab', 'u'),
(103, 'IEEE', 'Mr Santosh Chapaneri', 'Vinit', '4d343a076149c36e3e6b7939e34f3bf6c6805e8f8dddc0f78b5f76c0f8abfd2d13a063b1ffe3e4a46a9cb8702628e1615bb5f34dbd97f8674460dd707d7a31b9', 'u'),
(104, 'admin', 'Kavita Sonawane', NULL, 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD KEY `room_no` (`room_no`),
  ADD KEY `cd_eid` (`eid`);

--
-- Indexes for table `event_detail`
--
ALTER TABLE `event_detail`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `cd` (`room_no`),
  ADD KEY `cd_uid` (`uid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_detail`
--
ALTER TABLE `event_detail`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `event_detail` (`eid`),
  ADD CONSTRAINT `booking_detail_ibfk_2` FOREIGN KEY (`room_no`) REFERENCES `room` (`room_no`),
  ADD CONSTRAINT `cd_eid` FOREIGN KEY (`eid`) REFERENCES `event_detail` (`eid`) ON DELETE CASCADE;

--
-- Constraints for table `event_detail`
--
ALTER TABLE `event_detail`
  ADD CONSTRAINT `cd` FOREIGN KEY (`room_no`) REFERENCES `room` (`room_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `cd_uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_detail_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `room` (`room_no`),
  ADD CONSTRAINT `event_detail_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
