-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 12:36 PM
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
(16, 'Test', 'test', '2021-06-05', 'Gaming_5000x3125.jpg', 'Announcements'),
(17, 'Test', 'test2', '2021-06-05', 'Gaming_5000x3125.jpg', 'Announcements'),
(18, 'Test', 'test', '2021-05-22', 'Gaming_5000x3125.jpg', 'Announcements');

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
(1, 'homepage', 'john-schaidler-yX6neJq4HgM-unsplash.jpg');

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
(5, 'Address', 'A108 Adam Street, New York, NY 53502245'),
(6, 'Email', 'example@email.com'),
(7, 'Contact Number', '+1 5589 55488 55');

-- --------------------------------------------------------

--
-- Table structure for table `enrollees`
--

CREATE TABLE `enrollees` (
  `id` int(11) NOT NULL,
  `first_name` text DEFAULT NULL,
  `middle_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contact_number` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `date_registered` date DEFAULT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `passed` tinyint(1) DEFAULT NULL,
  `program` text DEFAULT NULL,
  `grade_level` int(11) DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `exam_result` int(11) DEFAULT NULL,
  `learning_reference_number` text DEFAULT NULL,
  `voucher` text DEFAULT NULL,
  `voucher_number` text DEFAULT NULL,
  `place_of_birth` text DEFAULT NULL,
  `citizenship` text DEFAULT NULL,
  `religion` text DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `registered_voter` text DEFAULT NULL,
  `registered_at` text DEFAULT NULL,
  `registered_since` text DEFAULT NULL,
  `last_school` text DEFAULT NULL,
  `school_type` text DEFAULT NULL,
  `telephone_number` text DEFAULT NULL,
  `junior_school` text DEFAULT NULL,
  `junior_year_graduated` int(11) DEFAULT NULL,
  `honors_junior` text DEFAULT NULL,
  `junior_school_address` text DEFAULT NULL,
  `elementary_school` text DEFAULT NULL,
  `elementary_year_graduated` int(11) DEFAULT NULL,
  `honors_elementary` text DEFAULT NULL,
  `elementary_school_address` text DEFAULT NULL,
  `civil_status` text DEFAULT NULL,
  `spouse_name` text DEFAULT NULL,
  `spouse_residence` text DEFAULT NULL,
  `father_name` text DEFAULT NULL,
  `highest_educ_father` text DEFAULT NULL,
  `father_birthday` date DEFAULT NULL,
  `father_contact_no` text DEFAULT NULL,
  `father_occupation` text DEFAULT NULL,
  `father_income` text DEFAULT NULL,
  `father_company` text DEFAULT NULL,
  `father_company_address` text DEFAULT NULL,
  `father_status` text DEFAULT NULL,
  `mother_name` text DEFAULT NULL,
  `highest_educ_mother` text DEFAULT NULL,
  `mother_birthday` date DEFAULT NULL,
  `mother_contact_no` text DEFAULT NULL,
  `mother_occupation` text DEFAULT NULL,
  `mother_income` text DEFAULT NULL,
  `mother_company` text DEFAULT NULL,
  `mother_company_address` text DEFAULT NULL,
  `mother_status` text DEFAULT NULL,
  `program2` text DEFAULT NULL,
  `whose_choice1` text DEFAULT NULL,
  `whose_choice2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollees`
--

INSERT INTO `enrollees` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `email`, `birthdate`, `contact_number`, `image`, `date_registered`, `accepted`, `passed`, `program`, `grade_level`, `requirements`, `exam_result`, `learning_reference_number`, `voucher`, `voucher_number`, `place_of_birth`, `citizenship`, `religion`, `sex`, `registered_voter`, `registered_at`, `registered_since`, `last_school`, `school_type`, `telephone_number`, `junior_school`, `junior_year_graduated`, `honors_junior`, `junior_school_address`, `elementary_school`, `elementary_year_graduated`, `honors_elementary`, `elementary_school_address`, `civil_status`, `spouse_name`, `spouse_residence`, `father_name`, `highest_educ_father`, `father_birthday`, `father_contact_no`, `father_occupation`, `father_income`, `father_company`, `father_company_address`, `father_status`, `mother_name`, `highest_educ_mother`, `mother_birthday`, `mother_contact_no`, `mother_occupation`, `mother_income`, `mother_company`, `mother_company_address`, `mother_status`, `program2`, `whose_choice1`, `whose_choice2`) VALUES
(27, 'John Francis', 'Consigo', 'Cabral', 'Palincaro, Tuy, Batangas', 'jhnfranciscabral@gmail.com', '2021-05-29', '09399395763', 'COCOMELON_JJ_OK.png', '2021-05-23', 1, 1, 'STEM', 11, '2e2cea3cf5c7d01b6a6716c9f432822ca27d8664.png', 75, NULL, NULL, NULL, 'asdfadasdfasdfas', 'sdkfasdf', 'Roman Catholic', 'Male', NULL, NULL, NULL, NULL, NULL, 'sdsdfgsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HUMMS', 'My own choice', 'My own choice'),
(28, 'John Francis', 'Consigo', 'Cabral', 'Palincaro, Tuy, Batangas', 'raquellachicacoe@gmail.com', '2021-05-29', '09399395763', 'dascasv.png', '2021-05-23', 1, 0, 'STEM', 12, 'AAAABd49YxQm3QTtMW9GMB-AjDDQvJteRExKmJ5xzxBa4fFbeUWQ8uKlXAPyqxiCMESEn_QwRAXqBtlLkBJQfuQClT-iVtnoembSlnU84bay9_nDpehd8g9ptjb6wz08d6ZZv28.jpg', 74, NULL, NULL, NULL, 'Tuy, Batangas', 'asdfasdf', 'Roman Catholic', 'Female', NULL, NULL, NULL, NULL, NULL, 'sdsdfgsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABM', 'My own choice', 'My own choice');

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `abbreviation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program`, `abbreviation`) VALUES
(3, 'Humanities and Social Sciences', 'HUMMS'),
(4, 'Accountancy, Business and Management', 'ABM'),
(5, 'Science, Technology, Engineering, and Mathematics', 'STEM');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `form_label` text NOT NULL,
  `input_type` text NOT NULL,
  `select_values` text NOT NULL,
  `is_required` int(1) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `form_label`, `input_type`, `select_values`, `is_required`, `is_active`) VALUES
(11, 'Mothers Name', 'text', '', 1, 1),
(12, 'Mothers Birthday', 'date', '', 1, 1),
(13, 'Mother\'s Highest Education Attainment', 'select', 'Elemetary|High School|Vocation|College Graduate|Post Graduate', 1, 1),
(14, 'Father\'s Name', 'text', '', 0, 1),
(15, 'Father\'s Birthday', 'date', '', 0, 1),
(16, 'Father\'s Highest Educational Attainment', 'select', 'Elemetary|High School|Vocation|College Graduate|Post Graduate', 0, 1),
(17, 'Father\'s Age', 'number', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requirement_values`
--

CREATE TABLE `requirement_values` (
  `id` int(11) NOT NULL,
  `enrollee_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirement_values`
--

INSERT INTO `requirement_values` (`id`, `enrollee_id`, `requirement_id`, `value`) VALUES
(1, 25, 11, 'Emma'),
(2, 25, 12, '2021-05-25'),
(3, 25, 13, 'High School'),
(4, 26, 11, 'Emma'),
(5, 26, 12, '2021-05-23'),
(6, 26, 13, 'Elemetary'),
(7, 27, 11, 'Emma'),
(8, 27, 12, '2021-05-24'),
(9, 27, 13, 'College Graduate'),
(10, 28, 11, 'Marlyn'),
(11, 28, 12, '2021-05-27'),
(12, 28, 13, 'High School'),
(13, 28, 14, 'Freddie'),
(14, 28, 15, '2021-05-27'),
(15, 28, 16, 'High School'),
(16, 28, 17, '60');

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
  `grade_level` int(11) NOT NULL,
  `enrollee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('111111', 'a', 'a', 'a', 'ab', 'jhnfranciscabral@gmail.com', '2021-03-13', '1', 'team-2.jpg', 'Principal'),
('12345', 'john francis', 'consigo', 'cabral', 'a', 'jhnfranciscabral@gmail.com', '2021-02-05', '123', 'CONAN.jpg', 'Teacher 1'),
('123451', 'a', 'a', 'a', 'a', 'jhnfranciscabral@gmail.com', '2021-02-04', '09399395763', 'team-3.jpg', 'Principal'),
('123456', 'RAQUEL', 'Alviola', 'Lachica', 'a', 'raquellachicacoe@gmail.com', '2021-02-04', '09399395763', 'team-4.jpg', 'Teacher 2');

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
  `image` varchar(100) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `user_level`, `image`, `verify_token`, `verified`) VALUES
(1, 'admin', 'masterkey', 'Admin', 'Is', 'Trator', 'asdf', 'admin', 'CONAN.jpg', '', 1);

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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirement_values`
--
ALTER TABLE `requirement_values`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollees`
--
ALTER TABLE `enrollees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requirement_values`
--
ALTER TABLE `requirement_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
