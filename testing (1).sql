-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 02:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `standard` varchar(255) NOT NULL,
  `lang_1` varchar(255) NOT NULL,
  `lang_2` varchar(255) NOT NULL,
  `lang_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `standard`, `lang_1`, `lang_2`, `lang_3`) VALUES
(1, 'class-1', 'english', 'hindi', 'geo'),
(2, 'class-2', 'english', 'hindi', 'php'),
(3, 'class-3', 'english', 'hindi', 'java'),
(4, 'class-4', 'english', 'hindi', 'C_plus'),
(5, 'class-5', 'english', 'hindi', 'c#'),
(6, 'class-6', 'english', 'hindi', 'ruby');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `std_marks_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hindi` varchar(50) NOT NULL,
  `english` varchar(50) NOT NULL,
  `php` varchar(50) NOT NULL,
  `geo` varchar(50) NOT NULL,
  `java` varchar(50) NOT NULL,
  `C_plus` varchar(50) NOT NULL,
  `c#` varchar(50) NOT NULL,
  `ruby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`std_marks_id`, `name`, `hindi`, `english`, `php`, `geo`, `java`, `C_plus`, `c#`, `ruby`) VALUES
(1, 'student-1', '45', '75', '', '14', '', '', '', ''),
(2, 'student-2', '58', '65', '', '', '41', '', '', ''),
(3, 'student-3', '78', '54', '', '', '75', '', '', ''),
(4, 'student-4', '75', '85', '', '14', '', '', '', ''),
(5, 'student-5', '75', '85', '', '', '', '52', '', ''),
(6, 'student-6', '25', '65', '', '', '', '85', '', ''),
(7, 'student-7', '78', '45', '', '', '85', '', '', ''),
(8, 'student-8', '55', '44', '', '', '33', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `programmer`
--

CREATE TABLE `programmer` (
  `programmer_id` int(11) NOT NULL,
  `programmer_name` varchar(200) NOT NULL,
  `programmer_skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmer`
--

INSERT INTO `programmer` (`programmer_id`, `programmer_name`, `programmer_skill`) VALUES
(0, 'Yogesh', 'PHP'),
(1, 'John Smith', 'PHP, Mysql'),
(2, 'Peter Parker', 'Codeigniter, JQuery, Ajax, AngularJS'),
(3, 'Andrew Lee', 'PHP, Codeigniter, Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roll` int(3) NOT NULL,
  `class` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `std` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`, `datetime`, `std`, `marks`) VALUES
(1, 'student-1', 1, 'class-1', 'thane', '1234567864', '12021-06-13-06-11.jpg', '2021-06-13 21:27:11', 1, 1),
(2, 'student-2', 2, 'class-3', 'some address', '1234567894', '22021-06-13-06-53.jpg', '2021-06-13 21:28:05', 3, 1),
(3, 'student-3', 3, 'class-3', 'some address', '1234567743', '32021-06-13-06-35.jpg', '2021-06-13 21:27:33', 3, 1),
(4, 'student-4', 4, 'class-1', 'thane', '1234567898', '42021-06-13-06-17.jpg', '2021-06-13 21:27:50', 1, 1),
(5, 'student-5', 5, 'class-4', 'somewere', '1234567890', '122021-06-13-06-12.jpg', '2021-06-13 17:07:27', 4, 1),
(6, 'student-6', 6, 'class-4', 'asdasdasldhoas', '1234567892', '122021-06-13-06-03.jpg', '2021-06-13 21:28:43', 4, 1),
(7, 'student-7', 7, 'class-3', 'sasdfdfsdfsdfsdfsdf', '1234567899', '342021-06-13-06-36.jpg', '2021-06-13 21:28:32', 3, 1),
(8, 'student-8', 8, 'class-3', 'scvsvsdv', '1234567893', '232021-06-13-06-58.jpg', '2021-06-13 21:28:17', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(21, 'Yogesh', 'yogesh@email.com', 'yogesh2525', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', 'yogesh2525.jpg', 'active', '2021-06-12 11:38:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`std_marks_id`);

--
-- Indexes for table `programmer`
--
ALTER TABLE `programmer`
  ADD PRIMARY KEY (`programmer_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std` (`std`),
  ADD KEY `marks` (`marks`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `std_marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`std`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`marks`) REFERENCES `marks` (`std_marks_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
