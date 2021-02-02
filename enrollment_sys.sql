-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 01:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `announcement` varchar(1000) NOT NULL,
  `validity_date` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `announcement`, `validity_date`, `image`, `type`) VALUES
(8, 'Test', 'test', '2021-02-06', 'CONAN.jpg', 'News'),
(10, 'Test', 'a', '2021-01-31', 'CONAN.jpg', 'Events'),
(11, 'Test', 'The quick brown fox jumps over the head of the lazy dog', '2021-01-23', 'download.jpg', 'Events');

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `background` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backgrounds`
--

INSERT INTO `backgrounds` (`id`, `name`, `background`) VALUES
(1, 'background1', 'hero-bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `details`) VALUES
(1, 'Mission', 'To provide relevant, quality, and innovate industry-based education with equal emphasis on values formation and character building of its students.'),
(3, 'Vision', 'A leading technological institution driven by industry demands to produce highly skilled, value-laden, and globally-competitive graduates.'),
(4, 'Core Values', 'CI Tech will develop and nurture these personal and Industry-desired values:<br>\n1. Honesty and Integrity<br>\n2. Adaptability and Responsibility<br>\n3. Respect and Honour<br>\n4. Positive Attitude<br>'),
(5, 'Address', 'A108 Adam Street, New York, NY 535022'),
(6, 'Email', 'example@email.com'),
(7, 'Contact Number', '+1 5589 55488 55');

-- --------------------------------------------------------

--
-- Table structure for table `enrollees`
--

CREATE TABLE `enrollees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_registered` date NOT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `passed` tinyint(1) DEFAULT NULL,
  `program` varchar(20) NOT NULL,
  `grade_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollees`
--

INSERT INTO `enrollees` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `email`, `birthdate`, `contact_number`, `image`, `date_registered`, `accepted`, `passed`, `program`, `grade_level`) VALUES
(11, 'JOHN FRANCIS', 'CONSIGO', 'CABRAL', 'PALINCARO TUY BATANGAS', 'jhnfranciscabral@gmail.com', '1994-12-14', '09285029090', 'CONAN.jpg', '2021-01-29', 1, 1, 'STEM', 11),
(12, 'RAQUEL', 'ALVIOLA', 'LACHICA', 'SALA CABUYAO LAGUNA', 'jhnfranciscabral@gmail.com', '1993-09-30', '09399395763', 'OIP.jpg', '2021-01-29', 1, 1, 'STEM', 11),
(13, 'test', 'test', 'test', 'A', 'jhnfranciscabral@gmail.com', '2021-01-30', '09399395763', 'CONAN.jpg', '2021-01-30', 1, 1, 'STEM', 11),
(14, 'a', 'a', 'a', 'a', 'jhnfranciscabral@gmail.com', '2021-01-30', '09399395763', 'CONAN.jpg', '2020-01-30', -1, -1, 'ABM', 11);

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `date`) VALUES
(1, '2021-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `program` varchar(20) NOT NULL,
  `grade_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_number`, `first_name`, `middle_name`, `last_name`, `address`, `birthdate`, `email`, `phone_number`, `status`, `image`, `program`, `grade_level`) VALUES
(23, 2157148, 'JOHN FRANCIS', 'CONSIGO', 'CABRAL', 'PALINCARO TUY BATANGAS', '1994-12-14', 'jhnfranciscabral@gmail.com', '09285029090', '', 'CONAN.jpg', 'STEM', 11),
(25, 2177349, 'RAQUEL', 'ALVIOLA', 'LACHICA', 'SALA CABUYAO LAGUNA', '1993-09-30', 'jhnfranciscabral@gmail.com', '09399395763', '', 'OIP.jpg', 'STEM', 11),
(26, 2175498, 'test', 'test', 'test', 'A', '2021-01-30', 'jhnfranciscabral@gmail.com', '09399395763', '', 'CONAN.jpg', 'STEM', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `user_level`) VALUES
(1, 'admin', 'masterkey', 'Admin', 'Is', 'Trator', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollees`
--
ALTER TABLE `enrollees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollees`
--
ALTER TABLE `enrollees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
