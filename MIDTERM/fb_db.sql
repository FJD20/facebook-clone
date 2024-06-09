-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 02:41 PM
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
-- Database: `fb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`id`, `user_id`, `post_id`, `comment`, `comment_time`) VALUES
(12, 23, 21, '', '2024-06-04 08:50:29'),
(13, 23, 21, 'dawdwa', '2024-06-04 08:50:39'),
(14, 23, 20, 'dwadwa', '2024-06-04 08:50:48'),
(15, 23, 22, 'dwadwa', '2024-06-04 10:36:45'),
(16, 23, 32, 'dwad', '2024-06-04 10:52:50'),
(17, 24, 32, 'test', '2024-06-09 02:23:03'),
(18, 24, 40, 'shesh', '2024-06-09 02:48:57'),
(20, 24, 40, 'w21', '2024-06-09 02:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `like_tb`
--

CREATE TABLE `like_tb` (
  `id` int(11) NOT NULL,
  `content_owner_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_tb`
--

INSERT INTO `like_tb` (`id`, `content_owner_id`, `content_id`, `user_id`, `user_like`) VALUES
(35, 23, 32, 24, 1),
(36, 24, 36, 24, 1),
(37, 24, 37, 24, 1),
(38, 24, 38, 24, 1),
(39, 24, 39, 24, 1),
(40, 24, 40, 24, 1),
(41, 24, 41, 24, 1),
(42, 24, 40, 23, 1),
(43, 24, 41, 23, 1),
(44, 23, 42, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `coverPhoto` varchar(255) DEFAULT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `firstname`, `lastname`, `email`, `profile_picture`, `password`, `bio`, `coverPhoto`, `salt`) VALUES
(22, 'Zane', 'Daniel', '1234', './Assets/default-profilepicture.png', '$2y$10$cYN874rhQmpXDIujTCWYhuIV/eiAm1LAKcHEz37PgX8Sa1FFyth1i', NULL, NULL, 'f21c342684e3795e3dffbd588932205d'),
(23, 'Zane', 'Daniel', 'Zane@gmail.com', 'ProfilePictures/665f29f2b2974_Screenshot (1).png', '$2y$10$oWJVM6xo1wueJkunoqfVMe9gKmhAW9KMoiB3.BJ7M.ZUC6RWvAfYm', NULL, NULL, '2f4eae8af06615ae666430b74dfdf427'),
(24, 'admin', 'admin', 'admin@gmail.com', 'ProfilePictures/66656eca88135_zane.png', '$2y$10$MnGfJJrE1Ksq5uCLnUIqsebChuZiws0GJBtygN6dki0erTtIH.aVO', NULL, NULL, '4ebbc1def425274258c3b8ae8a0acb39');

-- --------------------------------------------------------

--
-- Table structure for table `notification_tb`
--

CREATE TABLE `notification_tb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notif` varchar(50) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caption` text DEFAULT NULL,
  `imagePost` varchar(255) DEFAULT NULL,
  `content_like` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`id`, `user_id`, `caption`, `imagePost`, `content_like`, `created_at`) VALUES
(20, 23, 'shesh', 'Post_Images/665f29665ac83_New Project.png', 0, '2024-06-04 14:49:10'),
(40, 24, 'test', '[\"6665672f4fdf0.png\",\"6665672f503d7.png\",\"6665672f508a1.png\"]', 2, '2024-06-09 08:26:23'),
(42, 23, 'test', '[\"66659754d2841.png\"]', 1, '2024-06-09 11:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_following`
--

CREATE TABLE `user_following` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_following`
--

INSERT INTO `user_following` (`id`, `follower_id`, `followed_id`, `created_at`) VALUES
(128, 23, 22, '2024-06-04 14:52:13'),
(129, 24, 23, '2024-06-03 07:40:01'),
(131, 23, 24, '2024-06-06 17:15:18'),
(133, 24, 22, '2024-06-09 11:07:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_tb`
--
ALTER TABLE `like_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_tb`
--
ALTER TABLE `notification_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_following`
--
ALTER TABLE `user_following`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_follower` (`follower_id`),
  ADD KEY `fk_followed` (`followed_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `like_tb`
--
ALTER TABLE `like_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notification_tb`
--
ALTER TABLE `notification_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_following`
--
ALTER TABLE `user_following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_following`
--
ALTER TABLE `user_following`
  ADD CONSTRAINT `fk_followed` FOREIGN KEY (`followed_id`) REFERENCES `login_table` (`id`),
  ADD CONSTRAINT `fk_follower` FOREIGN KEY (`follower_id`) REFERENCES `login_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
