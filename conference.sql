-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 12:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(222) NOT NULL,
  `pass` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `pass` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auther`
--

CREATE TABLE `auther` (
  `A-id` int(15) UNSIGNED NOT NULL,
  `A-fname` varchar(255) DEFAULT NULL,
  `A-lname` varchar(255) DEFAULT NULL,
  `A-email` varchar(255) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `company` varchar(25) DEFAULT NULL,
  `faculty` varchar(25) DEFAULT NULL,
  `department` varchar(25) DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `phone` int(25) DEFAULT NULL,
  `A-afflliation` varchar(255) DEFAULT NULL,
  `A-qualification` varchar(255) DEFAULT NULL,
  `A-address` varchar(255) DEFAULT NULL,
  `A-abstract` varchar(255) DEFAULT NULL,
  `co-group` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auther`
--

INSERT INTO `auther` (`A-id`, `A-fname`, `A-lname`, `A-email`, `password`, `gender`, `company`, `faculty`, `department`, `state`, `country`, `phone`, `A-afflliation`, `A-qualification`, `A-address`, `A-abstract`, `co-group`) VALUES
(22, 'mohamed', 'ahmed', 'mohamed@m.a', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32),
(23, 'first', 'last', 'edddee@eee.com', '', NULL, NULL, NULL, NULL, 'sss', NULL, 456456123, NULL, NULL, NULL, NULL, 32);

-- --------------------------------------------------------

--
-- Table structure for table `camera ready`
--

CREATE TABLE `camera ready` (
  `content` varchar(255) NOT NULL,
  `Cr-url` varchar(255) NOT NULL,
  `paper-id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camera ready`
--

INSERT INTO `camera ready` (`content`, `Cr-url`, `paper-id`) VALUES
('', '', 0),
('tt', 'https://www.google.com.eg/?gfe_rd=cr&dcr=0&ei=Wya9WvihE4eaX9D1jLgK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `com-id` int(15) NOT NULL,
  `com-fname` varchar(255) DEFAULT NULL,
  `com-lname` varchar(255) DEFAULT NULL,
  `conf_id` int(11) DEFAULT NULL,
  `com-phone` int(12) DEFAULT NULL,
  `com-address` varchar(255) DEFAULT NULL,
  `com-category` varchar(255) DEFAULT NULL,
  `com-position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`com-id`, `com-fname`, `com-lname`, `conf_id`, `com-phone`, `com-address`, `com-category`, `com-position`) VALUES
(1, 'ahmed', 'CEO', 1, NULL, NULL, NULL, NULL),
(2, 'mohamed', 'Tester', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conf-images`
--

CREATE TABLE `conf-images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img-name` varchar(255) NOT NULL,
  `conf-id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conf-images`
--

INSERT INTO `conf-images` (`id`, `img-name`, `conf-id`) VALUES
(1, '605791-the-business-guide-to-machine-learning.jpg', '1'),
(2, '20171206183858-GettyImages-496822526.jpeg', '1'),
(3, 'What-is-machine-learning_Definition.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `conferance years`
--

CREATE TABLE `conferance years` (
  `conf-id` int(15) NOT NULL,
  `conf-title` varchar(255) DEFAULT NULL,
  `conf-year` date DEFAULT NULL,
  `important-dates` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `conf-abstract` varchar(255) DEFAULT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'notactive',
  `Reg-id` int(15) DEFAULT NULL,
  `topic-id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conferance years`
--

INSERT INTO `conferance years` (`conf-id`, `conf-title`, `conf-year`, `important-dates`, `location`, `keywords`, `conf-abstract`, `status`, `Reg-id`, `topic-id`) VALUES
(1, 'machine learning', '2020-02-24', NULL, 'giza', 'machine learning , robot ', 'Machine learning is an application of artificial intelligence (AI) that provides systems the ability to automatically learn and improve from experience without being explicitly programmed. Machine learning focuses on the development of computer programs t', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conf topic`
--

CREATE TABLE `conf topic` (
  `topic-id` int(15) NOT NULL,
  `conf-id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `conf-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `email`, `phone`, `conf-id`) VALUES
(1, 'conference177@con.com', '123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` tinyint(3) UNSIGNED NOT NULL,
  `day_name` varchar(50) NOT NULL,
  `conf-id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day_name`, `conf-id`) VALUES
(43, 'WED 31 / 7', 1),
(44, 'THU 1 / 7', 1),
(45, 'FRI 2 / 7', 1),
(46, 'SAT  3 / 7', 1),
(47, 'SUN 4 / 7', 1),
(48, 'MON 5 / 7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `auther_er` varchar(222) NOT NULL,
  `auther` varchar(222) NOT NULL,
  `pres_er` varchar(222) NOT NULL,
  `pres` varchar(222) NOT NULL,
  `lis_er` varchar(222) NOT NULL,
  `lis` varchar(222) NOT NULL,
  `add_paper_er` varchar(222) NOT NULL,
  `add_paper` varchar(222) NOT NULL,
  `add_page_er` varchar(222) NOT NULL,
  `add_page` varchar(222) NOT NULL,
  `one_day_er` varchar(222) NOT NULL,
  `one_day` varchar(222) NOT NULL,
  `conf-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(15) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `site` varchar(255) NOT NULL,
  `conf-id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `img`, `name`, `address`, `phone`, `site`, `conf-id`) VALUES
(1, '70test1.jpg', 'hilton', 'tahrir', 2147483647, 'hilton.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `impdates`
--

CREATE TABLE `impdates` (
  `id` int(11) NOT NULL,
  `content` varchar(222) NOT NULL,
  `date` date NOT NULL,
  `conf-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `impdates`
--

INSERT INTO `impdates` (`id`, `content`, `date`, `conf-id`) VALUES
(1, 'Deadline for Abstract Submission', '2019-07-31', 1),
(2, 'Deadline of Payment for Conference Fee.', '2019-08-15', 1),
(3, 'will be something', '2019-07-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member list`
--

CREATE TABLE `member list` (
  `M-id` int(15) NOT NULL,
  `M-name` varchar(255) DEFAULT NULL,
  `M-email` varchar(255) DEFAULT NULL,
  `M-address` varchar(255) DEFAULT NULL,
  `field of intrest` varchar(255) DEFAULT NULL,
  `M-affilliation` varchar(255) DEFAULT NULL,
  `conf-id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member type`
--

CREATE TABLE `member type` (
  `M-id` int(15) NOT NULL,
  `M-type` varchar(50) DEFAULT NULL,
  `Reg-id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `paper-id` int(15) UNSIGNED NOT NULL,
  `paper-title` varchar(255) DEFAULT NULL,
  `paper-link` varchar(255) DEFAULT NULL,
  `paper-abstract` varchar(255) DEFAULT NULL,
  `submission date` date DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `reviewed` int(11) NOT NULL DEFAULT '0',
  `accepted` varchar(50) NOT NULL DEFAULT 'waiting',
  `name` varchar(255) NOT NULL,
  `topics` varchar(255) DEFAULT NULL,
  `com-id` int(15) DEFAULT NULL,
  `R-id` int(15) NOT NULL,
  `topics-id` int(15) DEFAULT NULL,
  `author_id` int(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper-id`, `paper-title`, `paper-link`, `paper-abstract`, `submission date`, `keywords`, `reviewed`, `accepted`, `name`, `topics`, `com-id`, `R-id`, `topics-id`, `author_id`) VALUES
(1, 'test', NULL, 'any abs', NULL, NULL, 1, 'accepted', 'dddd', NULL, NULL, 27, NULL, 22),
(3, 'title of paper 3', NULL, 'abssssssssss of paper 3', NULL, 'hgfhfhfh', 1, 'waiting', '64fixing-web-bugs.png', NULL, NULL, 27, NULL, 22),
(4, 'title of paper 456', NULL, 'abs if paper 456', NULL, 'fdsfsdfsdf', 1, 'waiting', '86fixing-web-bugs.png', NULL, NULL, 27, NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `paper report`
--

CREATE TABLE `paper report` (
  `id` int(11) UNSIGNED NOT NULL,
  `paper_id` int(15) UNSIGNED NOT NULL,
  `report_title` varchar(50) NOT NULL,
  `report_content` text NOT NULL,
  `rev_id` int(15) UNSIGNED NOT NULL,
  `auth_id` int(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper report`
--

INSERT INTO `paper report` (`id`, `paper_id`, `report_title`, `report_content`, `rev_id`, `auth_id`) VALUES
(1, 3, 'title of paper 3', 'abssssssssss of paper 3', 27, 22),
(2, 4, 'title of paper 456', 'abs if paper 456', 27, 22);

-- --------------------------------------------------------

--
-- Table structure for table `registeration type`
--

CREATE TABLE `registeration type` (
  `Reg-id` int(15) NOT NULL,
  `User name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fees` varchar(255) NOT NULL,
  `Type` int(50) NOT NULL,
  `Payment date` date NOT NULL,
  `conf-id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Report-id` int(15) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `r-id` int(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `R-id` int(15) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `R-phone` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `R-address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `R-affilliation` varchar(255) DEFAULT NULL,
  `toppics` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`R-id`, `name`, `R-phone`, `email`, `R-address`, `password`, `R-affilliation`, `toppics`) VALUES
(27, 'mohamed', NULL, 'webhost966@gmail.com', NULL, '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `about` varchar(222) NOT NULL,
  `img` varchar(222) NOT NULL,
  `conf-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponser`
--

CREATE TABLE `sponser` (
  `sp-id` int(15) NOT NULL,
  `sp-name` varchar(255) NOT NULL,
  `sp-logo` varchar(255) NOT NULL,
  `sp-email` varchar(255) NOT NULL,
  `conf-id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `v_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` int(11) UNSIGNED NOT NULL,
  `_from` varchar(50) NOT NULL,
  `_to` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `day_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `_from`, `_to`, `details`, `day_id`) VALUES
(31, '8 : 00 AM', '9 : 00 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 43),
(32, '9 : 30 AM', '10 : 20 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 43),
(33, '11 : 00 AM', '11 : 30 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 43),
(34, '8 : 00 AM', '9 : 00  AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 44),
(35, '9 : 30 AM', '10 : 20 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 44),
(36, '11 : 00 AM', '11 : 30 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 44),
(37, '12 : 00 PM', '12 : 30 PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 44),
(38, '1 : 00 PM', '2 : 00 PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 44),
(39, '8 : 00 AM', '9 : 00  AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 45),
(40, '9 : 30 AM', '10 : 20 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 45),
(41, '11 : 00 AM', '11 : 30 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 45),
(42, '12 : 00 PM', '12 : 30 PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 45),
(43, '1 : 00 PM', '2 : 00 PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 45),
(44, '8 : 00 AM', '9 : 00  AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 46),
(45, '9 : 30 AM', '10 : 20 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 46),
(46, '11 : 00 AM', '11 : 30 AM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 46),
(47, '12 : 00 PM', '12 : 30 PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 46),
(48, '1 : 00 PM', '2 : 00 PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 46),
(49, '12 : 00 PM', '2 : 00 PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 47),
(50, '12 : 00 PM', '2 : 00 PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 48);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic-id` int(15) NOT NULL,
  `topic-title` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `conf-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic-id`, `topic-title`, `about`, `conf-id`) VALUES
(1, 'any topic', 'any details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `address` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `img` varchar(222) NOT NULL,
  `conf-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auther`
--
ALTER TABLE `auther`
  ADD PRIMARY KEY (`A-id`);

--
-- Indexes for table `camera ready`
--
ALTER TABLE `camera ready`
  ADD PRIMARY KEY (`content`),
  ADD KEY `paper-id` (`paper-id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`com-id`);

--
-- Indexes for table `conf-images`
--
ALTER TABLE `conf-images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conferance years`
--
ALTER TABLE `conferance years`
  ADD PRIMARY KEY (`conf-id`),
  ADD KEY `topic-id` (`topic-id`);

--
-- Indexes for table `conf topic`
--
ALTER TABLE `conf topic`
  ADD KEY `topic-id` (`topic-id`),
  ADD KEY `conf-id` (`conf-id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`),
  ADD KEY `conf_id` (`conf-id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conf-id` (`conf-id`);

--
-- Indexes for table `impdates`
--
ALTER TABLE `impdates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member list`
--
ALTER TABLE `member list`
  ADD PRIMARY KEY (`M-id`),
  ADD KEY `conf-id` (`conf-id`);

--
-- Indexes for table `member type`
--
ALTER TABLE `member type`
  ADD PRIMARY KEY (`M-id`),
  ADD KEY `Reg-id` (`Reg-id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper-id`),
  ADD KEY `forign key` (`com-id`),
  ADD KEY `R-id` (`R-id`),
  ADD KEY `topics-id` (`topics-id`),
  ADD KEY `auth_id` (`author_id`);

--
-- Indexes for table `paper report`
--
ALTER TABLE `paper report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paper-id` (`paper_id`),
  ADD KEY `fk_2` (`rev_id`),
  ADD KEY `fk_3` (`auth_id`);

--
-- Indexes for table `registeration type`
--
ALTER TABLE `registeration type`
  ADD PRIMARY KEY (`Reg-id`),
  ADD KEY `conf-id` (`conf-id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Report-id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`R-id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponser`
--
ALTER TABLE `sponser`
  ADD PRIMARY KEY (`sp-id`),
  ADD KEY `conf-id` (`conf-id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_fk` (`day_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic-id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auther`
--
ALTER TABLE `auther`
  MODIFY `A-id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `com-id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conf-images`
--
ALTER TABLE `conf-images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conferance years`
--
ALTER TABLE `conferance years`
  MODIFY `conf-id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `impdates`
--
ALTER TABLE `impdates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member list`
--
ALTER TABLE `member list`
  MODIFY `M-id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper-id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paper report`
--
ALTER TABLE `paper report`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `Report-id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `R-id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponser`
--
ALTER TABLE `sponser`
  MODIFY `sp-id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic-id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `conf_id` FOREIGN KEY (`conf-id`) REFERENCES `conferance years` (`conf-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paper`
--
ALTER TABLE `paper`
  ADD CONSTRAINT `auth_id` FOREIGN KEY (`author_id`) REFERENCES `auther` (`A-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paper report`
--
ALTER TABLE `paper report`
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`rev_id`) REFERENCES `reviewer` (`R-id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`auth_id`) REFERENCES `auther` (`A-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `times`
--
ALTER TABLE `times`
  ADD CONSTRAINT `day_fk` FOREIGN KEY (`day_id`) REFERENCES `day` (`day_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
