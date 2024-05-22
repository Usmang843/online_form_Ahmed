-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 06:13 PM
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
-- Database: `online_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `answer_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `form_id`, `question_id`, `answer`, `answer_by_id`) VALUES
(1, 2, 1, 'Yes I have', 2),
(2, 2, 2, 'No not sure', 2),
(3, 2, 3, 'op 2', 2),
(4, 2, 4, 'abc', 2),
(5, 2, 5, 'Male', 2),
(6, 2, 6, 'yes last', 2),
(7, 5, 10, 'Izza Fatimah', 3),
(8, 5, 11, 'Lahore, Punjab Pakistan', 3),
(9, 5, 12, 'Male', 3),
(10, 5, 13, 'Math, Computer Science', 3),
(11, 5, 14, 'BSIT', 3);

-- --------------------------------------------------------

--
-- Table structure for table `answer_by`
--

CREATE TABLE `answer_by` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer_by`
--

INSERT INTO `answer_by` (`id`, `name`, `email`, `date`, `form_id`) VALUES
(1, 'Iftikhar ali', 'ali@gmail.com', '2023-08-06 14:31:37', 0),
(2, 'Iftikhar ali', 'ali@gmail.com', '2023-08-06 14:32:20', 0),
(3, 'Izza Fatimah', 'izza@gmail.com', '2023-08-06 14:43:16', 5);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `last_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `title`, `last_date`, `user_id`, `token`, `status`, `created_at`, `updated_at`) VALUES
(2, 'abc', '2023-08-17 00:00:00', 6, 'x0z2dkb5', 'Active', '2023-08-06 11:14:32', '2023-08-06 11:14:32'),
(3, 'sadfasdf', '2023-08-17 17:17:00', 6, '1l3wj06f', 'Active', '2023-08-06 12:14:23', '2023-08-06 12:14:23'),
(4, 'adfsn', '2023-08-06 17:19:00', 6, '3wmp7gva', 'Active', '2023-08-06 12:17:22', '2023-08-06 12:22:32'),
(5, 'Student Info', '2023-08-23 19:42:00', 6, 'n1jfakap', 'Active', '2023-08-06 14:40:12', '2023-08-06 14:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `form_id`, `question`, `type`) VALUES
(1, 2, 'qeustion 1', 'Short Text'),
(2, 2, 'qeustion 2', 'Long Text'),
(3, 2, 'qeustion 3', 'Dropdown Fields'),
(4, 2, 'q 4', 'Checkboxes'),
(5, 2, 'Gender', 'Radio Button Fields'),
(6, 2, 'adfasd', 'Short Text'),
(7, 4, 'adfs', 'Short Text'),
(10, 5, 'Name', 'Short Text'),
(11, 5, 'Address', 'Long Text'),
(12, 5, 'Gender', 'Radio Button Fields'),
(13, 5, 'Subjects', 'Checkboxes'),
(14, 5, 'Program', 'Dropdown Fields');

-- --------------------------------------------------------

--
-- Table structure for table `question_detail`
--

CREATE TABLE `question_detail` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `field_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_detail`
--

INSERT INTO `question_detail` (`id`, `form_id`, `question_id`, `field_option`) VALUES
(1, 2, 3, 'option 1'),
(2, 2, 3, 'op 2'),
(3, 2, 3, 'op 3'),
(4, 2, 4, 'abc'),
(5, 2, 4, 'asdfsd'),
(6, 2, 5, 'Male'),
(7, 2, 5, 'Female'),
(8, 4, 8, 'option 1'),
(9, 4, 9, 'option 1'),
(10, 5, 12, 'Male'),
(11, 5, 12, 'Female'),
(12, 5, 13, 'Math'),
(13, 5, 13, 'Stat'),
(14, 5, 13, 'Computer Science'),
(15, 5, 14, 'BSCS'),
(16, 5, 14, 'BSIT'),
(17, 5, 14, 'BSSE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `contact`, `gender`, `image`, `dob`, `password`) VALUES
(6, 'Hajra', 'Ayub', 'admin@gmail.com', '030122222333', 'Female', 'Sana.jpg', '1998-07-08', '123'),
(10, 'Fahad', 'Ali', 'user@gmail.com', '03001234567', 'Male', 'alejandro-cordero.png', '1998-03-11', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_by`
--
ALTER TABLE `answer_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_detail`
--
ALTER TABLE `question_detail`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `answer_by`
--
ALTER TABLE `answer_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `question_detail`
--
ALTER TABLE `question_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
