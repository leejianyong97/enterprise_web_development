-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 06:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uog_cwsd5`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `date_updated`) VALUES
(1, 'Cat 1', 'Omg', '2022-04-08 14:11:04'),
(3, 'Cat 2', 'gg', '2022-04-13 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `topic_id`, `user_id`, `comment`, `date_created`, `date_updated`) VALUES
(1, 1, 6, 'owh hii', '2022-04-15 20:10:08', '2022-04-15 20:10:08'),
(2, 1, 6, 'yes', '2022-04-15 20:20:38', '2022-04-15 20:20:38'),
(3, 1, 6, 'yes ok!!', '2022-04-15 20:24:54', '2022-04-15 20:24:54'),
(4, 1, 6, 'yes ok!!', '2022-04-15 20:27:54', '2022-04-15 20:27:54'),
(5, 1, 6, 'yes ok!!', '2022-04-15 20:34:56', '2022-04-15 20:34:56'),
(6, 1, 6, 'bello', '2022-04-15 20:36:14', '2022-04-15 20:36:14'),
(7, 1, 6, 'bello', '2022-04-15 20:38:37', '2022-04-15 20:38:37'),
(8, 1, 6, 'bello', '2022-04-15 20:40:10', '2022-04-15 20:40:10'),
(9, 1, 6, 'hello', '2022-04-15 21:01:38', '2022-04-15 21:01:38'),
(10, 1, 6, 'ya halo', '2022-04-15 21:14:25', '2022-04-15 21:14:25'),
(11, 4, 6, 'hello', '2022-04-15 22:03:28', '2022-04-15 22:03:28'),
(12, 4, 6, 'hello', '2022-04-15 22:07:04', '2022-04-15 22:07:04'),
(13, 3, 6, 'hello', '2022-04-15 22:12:34', '2022-04-15 22:12:34'),
(14, 3, 6, 'hello', '2022-04-15 22:18:54', '2022-04-15 22:18:54'),
(15, 3, 6, 'hello', '2022-04-15 22:21:52', '2022-04-15 22:21:52'),
(16, 4, 1, 'hello', '2022-04-15 22:27:28', '2022-04-15 22:27:28'),
(17, 5, 1, 'hello', '2022-04-15 22:40:14', '2022-04-15 22:40:14'),
(18, 6, 1, 'hello', '2022-04-15 22:58:34', '2022-04-15 22:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `forum_views`
--

CREATE TABLE `forum_views` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_views`
--

INSERT INTO `forum_views` (`id`, `topic_id`, `user_id`) VALUES
(1, 1, 6),
(2, 3, 6),
(3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `topic_id`) VALUES
(0, 1, 1),
(0, 6, 1),
(0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(30) NOT NULL,
  `comment_id` int(30) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `reply`, `user_id`, `date_created`, `date_updated`) VALUES
(1, 5, 'bello', 6, '2022-04-12 21:22:08', '0000-00-00 00:00:00'),
(2, 4, 'bello', 6, '2022-04-15 20:36:00', '0000-00-00 00:00:00'),
(3, 5, 'bello', 6, '2022-04-15 20:36:09', '0000-00-00 00:00:00'),
(4, 17, 'jiaksai', 1, '2022-04-15 22:40:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(30) NOT NULL,
  `category_ids` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_ids`, `title`, `content`, `user_id`, `date_created`, `likes`) VALUES
(1, '1', 'hello 1', 'hi 1', 1, '2022-04-15 19:34:45', 2),
(2, '3', 'hello 2', 'hello 2', 1, '2022-04-15 19:38:39', 0),
(3, '1', 'hello 3', 'hello 3', 1, '2022-04-15 19:40:22', 0),
(4, '3', 'Who is the boss', 'I am the boss', 6, '2022-04-15 20:19:21', 0),
(5, '1', 'I love programming', 'PHP..............', 1, '2022-04-15 22:29:25', 1),
(6, '3', 'hello all', 'i am your boss', 1, '2022-04-15 22:41:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '7' COMMENT '1=QAManager,2=QACoordinator (Marketing) , 3= QACoordinator (Purchasing), 4= QACoordinator (Human Resources), 5= QACoordinator (IT), 6=QACoordinator(Manufacturing), 7= QACoordinator(Inventory)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, 'Tan Swee Ming', 'sweemingtan.9@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(5, 'Khoo Rui Kun', 'ruikun@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(6, 'Tan Kok Yao', 'Kokyao@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 7),
(7, 'Shasiydaran', 'Shasiydaran@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(8, 'Trivikraam', 'Trivikraam@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 5),
(9, 'Dinesh', 'Dinesh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 4),
(11, 'Test1', '呆呆@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_views`
--
ALTER TABLE `forum_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forum_views`
--
ALTER TABLE `forum_views`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
