-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 08:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'adminofjemis@gmail.com', '997818');

-- --------------------------------------------------------

--
-- Table structure for table `categary`
--

CREATE TABLE `categary` (
  `categary_id` int(10) NOT NULL,
  `categary_title` varchar(255) NOT NULL,
  `categary_desc` text NOT NULL,
  `categary_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categary`
--

INSERT INTO `categary` (`categary_id`, `categary_title`, `categary_desc`, `categary_image`) VALUES
(1, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', 'cat_1.jpg'),
(2, 'JQuary', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax. ', 'cat_2.jpg'),
(3, 'C++ language', 'C++ is a cross-platform language that can be used to create high-performance applications. C++ was developed by Bjarne Stroustrup, as an extension to the C language.', 'cat_3.jpg'),
(4, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation.', 'cat_4.jpg'),
(5, 'PHP', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. ', 'cat_5.jpg'),
(6, 'React js', 'React is a free and open-source front-end JavaScript library for building user interfaces based on UI components.React is only concerned with state management', 'cat_6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment_opinion` text NOT NULL,
  `thread_comment_id` int(10) NOT NULL,
  `comment_user_id` int(10) NOT NULL,
  `comment_date` varchar(255) NOT NULL,
  `comment_time` varchar(255) NOT NULL,
  `comment_update_date` varchar(60) DEFAULT 'not updated',
  `comment_update_time` varchar(60) DEFAULT 'not updated',
  `comment_update_repetation` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_opinion`, `thread_comment_id`, `comment_user_id`, `comment_date`, `comment_time`, `comment_update_date`, `comment_update_time`, `comment_update_repetation`) VALUES
(8, 'First of all you find well known course and go through whole course. please focus on selecting the course.', 1, 1, '4th of March 2023', '10:56:23 PM', '4th of March 2023', '11:15:13 PM', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(40) NOT NULL,
  `contact_name` varchar(70) NOT NULL,
  `contact_email` varchar(90) NOT NULL,
  `contact_mobile` varchar(10) NOT NULL,
  `contact_comment` text NOT NULL,
  `contact_date` varchar(70) NOT NULL,
  `contact_no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_email`, `contact_mobile`, `contact_comment`, `contact_date`, `contact_no`) VALUES
(38, 'Jemis lathiya ', 'lathiyajemis13@gmail.com', '9586258159', 'I have some problem', '12-06-2023', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_sno` int(10) NOT NULL,
  `feedback_fname` varchar(70) NOT NULL,
  `feedback_lname` varchar(70) NOT NULL,
  `feedback_email` varchar(70) NOT NULL,
  `feedback_rating` varchar(70) NOT NULL,
  `feedback_user` int(10) NOT NULL,
  `feedback_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_sno`, `feedback_fname`, `feedback_lname`, `feedback_email`, `feedback_rating`, `feedback_user`, `feedback_time`) VALUES
(5, 'Jemis', 'Lathiya', 'lathiyajemis13@gmail.com', '4.6', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(10) NOT NULL,
  `thread_title` text NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `thread_date` varchar(70) NOT NULL,
  `thread_time` varchar(70) NOT NULL,
  `thread_update_date` varchar(70) DEFAULT 'not updated',
  `thread_update_time` varchar(70) DEFAULT 'not updated',
  `thread_update_repetation` int(20) NOT NULL DEFAULT 0,
  `thread_categary_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_user_id`, `thread_date`, `thread_time`, `thread_update_date`, `thread_update_time`, `thread_update_repetation`, `thread_categary_id`) VALUES
(1, 'How do I start java?', 'I do not understand how do i start java? from where do i start my learning? please show me a way.', 1, '21/01/2022', '06:21 AM', 'not updated', 'not updated', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_fname` varchar(70) NOT NULL,
  `user_lname` varchar(70) NOT NULL,
  `user_date_of_birth` varchar(70) NOT NULL,
  `user_gender` varchar(70) NOT NULL,
  `user_email` varchar(70) NOT NULL,
  `user_password` varchar(70) NOT NULL,
  `user_forget_question` varchar(100) NOT NULL,
  `user_forget_answer` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_date_of_birth`, `user_gender`, `user_email`, `user_password`, `user_forget_question`, `user_forget_answer`) VALUES
(1, 'Jemis', 'Lathiya', '03/01/2003', 'Male', 'lathiyajemis13@gmail.com', '12345', 'which is your favourite color?', 'red'),
(2, 'ayush ', 'mendapara', '04/02/2002', 'Male', 'mendaparaayush@gmail.com', '12345', 'which is your favourite color?', 'red');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categary`
--
ALTER TABLE `categary`
  ADD PRIMARY KEY (`categary_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_sno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categary`
--
ALTER TABLE `categary`
  MODIFY `categary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
