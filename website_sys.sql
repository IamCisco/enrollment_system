-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 10:15 AM
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
-- Database: `website_sys`
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
(11, 'Test', 'The quick brown fox jumps over the head of the lazy dog', '2021-01-23', 'download.jpg', 'Events'),
(13, 'test', 'test', '2021-02-08', '144297458_480554249611690_8783220417743537839_n.jpg', 'Announcements'),
(14, 'asdf', 'asdf', '2021-02-08', '144599785_254393849379573_5111434071169039997_n.jpg', 'News');

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
  `user_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `announcement_id`, `comment`, `comment_date`) VALUES
(1, 1, 11, 'The quick brown fox jumps over the head of the lazy dog.', '2021-02-06'),
(2, 1, 11, 'The quick brown fox jumps over the head of the lazy dog.The quick brown fox jumps over the head of the lazy dog.The quick brown fox jumps over the head of the lazy dog.The quick brown fox jumps over the head of the lazy dog.The quick brown fox jumps over the head of the lazy dog.The quick brown fox jumps over the head of the lazy dog.The quick brown fox jumps over the head of the lazy dog.', '2021-02-06'),
(5, 1, 10, 'asdfb', '2021-02-07'),
(6, 1, 10, 'aa', '2021-02-07'),
(8, 2, 10, 'test', '2021-02-07'),
(9, 2, 10, 'sdfsdf', '2021-02-07'),
(10, 1, 10, 'test', '2021-02-07'),
(11, 3, 10, 'test', '2021-02-07'),
(12, 3, 10, 'test23434242', '2021-02-07'),
(13, 3, 10, 'test123', '2021-02-07');

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
  `student_number` varchar(100) NOT NULL,
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
(23, '2157148', 'JOHN FRANCIS', 'CONSIGO', 'CABRAL', 'PALINCARO TUY BATANGAS', '1994-12-14', 'jhnfranciscabral@gmail.com', '09285029090', '', 'CONAN.jpg', 'STEM', 11),
(25, '2177349', 'RAQUEL', 'ALVIOLA', 'LACHICA', 'SALA CABUYAO LAGUNA', '1993-09-30', 'jhnfranciscabral@gmail.com', '09399395763', '', 'OIP.jpg', 'STEM', 11),
(26, '2175498', 'test', 'test', 'test', 'A', '2021-01-30', 'jhnfranciscabral@gmail.com', '09399395763', '', 'CONAN.jpg', 'STEM', 11);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id_number` varchar(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `teacher_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id_number`, `first_name`, `middle_name`, `last_name`, `address`, `email`, `birthdate`, `contact_number`, `image`, `teacher_level`) VALUES
('111111', 'a', 'a', 'a', 'a', 'jhnfranciscabral@gmail.com', '2021-03-13', '1', 'team-2.jpg', 'Principal'),
('12345', 'john francis', 'CONSIGO', 'cabral', 'a', 'jhnfranciscabral@gmail.com', '2021-02-05', '123', 'team-1.jpg', 'Teacher 1'),
('123451', 'a', 'a', 'a', 'a', 'jhnfranciscabral@gmail.com', '2021-02-04', '09399395763', 'team-3.jpg', 'Principal'),
('123456', 'RAQUEL', 'Alviola', 'Lachica', 'a', 'raquellachicacoe@gmail.com', '2021-02-04', '09399395763', 'team-4.jpg', 'Teacher 2'),
('1234566666', 'asfasf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdf', '2021-02-17', 'asdfasdf', 'CONAN.jpg', 'asdfad');

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
  `user_level` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `user_level`, `image`) VALUES
(1, 'admin', 'masterkey', 'Admin', 'Is', 'Trator', '', 'admin', 'admin.png'),
(2, '2157148', 'masterkey', 'JOHN FRANCIS', 'CONSIGO', 'CABRAL', 'jhnfranciscabral@gmail.com', 'student', 'CONAN.jpg'),
(3, '12345', 'test', 'john francis', 'CONSIGO', 'cabral', 'jhnfranciscabral@gmail.com', 'teacher', 'team-1.jpg');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_number`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
