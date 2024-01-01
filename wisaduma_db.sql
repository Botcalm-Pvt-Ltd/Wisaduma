-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 12:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisaduma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `create_at`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', '2023-12-14 09:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`, `create_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\r\n\r\n', 7, 3, '2023-12-25 09:42:38'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\r\n\r\n', 7, 3, '2023-12-25 09:42:57'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\r\n\r\n', 7, 3, '2023-12-25 09:43:08'),
(8, 'testing comment', 7, 5, '2023-12-27 11:47:10'),
(10, 'test comment', 101, 26, '2023-12-29 10:53:58'),
(11, 'hi', 101, 26, '2023-12-29 12:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `create_at`) VALUES
(0, 7, 7, '2023-12-27 08:42:42'),
(2, 9, 3, '2023-12-27 06:16:20'),
(3, 7, 5, '2023-12-27 07:36:38'),
(4, 7, 6, '2023-12-27 08:42:41'),
(6, 7, 10, '2023-12-27 09:33:07'),
(7, 7, 13, '2023-12-28 04:36:28'),
(8, 7, 9, '2023-12-28 04:36:32'),
(9, 7, 4, '2023-12-28 05:42:39'),
(10, 7, 3, '2023-12-29 09:16:17'),
(11, 101, 3, '2023-12-29 12:01:37'),
(12, 101, 4, '2023-12-29 12:01:41'),
(13, 101, 11, '2023-12-29 12:01:43'),
(14, 101, 26, '2023-12-29 12:07:10'),
(15, 8, 10, '2024-01-01 10:45:07'),
(16, 8, 3, '2024-01-01 10:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `post_by` int(5) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `description`, `img_path`, `post_by`, `status`, `create_at`) VALUES
(3, 'Road Damage is a Nuisance for Drivers.', 'Road Crack', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Volupttibus autem voluptatum eligendi, magnam repellendus veniam totam harum plac\n', './assets/images/roadcarack1.png', 7, 1, '2023-12-22 10:14:57'),
(4, 'Road Damage is a Nuisance for Drivers', 'Road Crack', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Voluptatibus xxxxautem voluptatum eligendi, magnam repellendus veniam totam harum placeat', './assets/images/roadcarack2.png', 7, 1, '2023-12-22 10:14:57'),
(5, 'Road Damage is a Nuisance for Drivers.', 'Road Crack', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Voluptatibus autem voluptatum eligendi, magnam repellendus veniam totam harum placeat', './assets/images/roadcarack3.png', 7, 0, '2023-12-22 10:14:57'),
(9, 'There is an tree fallen, so road is block', 'Tree fallen', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Volupttibus autem voluptatum eligendi, magnam repellendus veniam totam harum plac', './assets/images/treefallen1.jpg', 100, 1, '2023-12-27 09:23:51'),
(10, 'There is an tree fallen, so road is block', 'Tree fallen', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Volupttibus autem voluptatum eligendi, magnam repellendus veniam totam harum plac', './assets/images/treefallen2.jpg', 7, 1, '2023-12-27 09:23:51'),
(11, 'There is an tree fallen, so road is block', 'Tree fallen', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Volupttibus autem voluptatum eligendi, magnam repellendus veniam totam harum plac', './assets/images/treefallen3.jpg', 100, 1, '2023-12-27 09:23:51'),
(12, 'There is an tree fallen, so road is block', 'Tree fallen', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Volupttibus autem voluptatum eligendi, magnam repellendus veniam totam harum plac', './assets/images/treefallen1.jpg', 100, 1, '2023-12-27 09:23:51'),
(13, 'Unsafe Electrical Wires ', 'Unsafe Electrical', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Volupttibus autem voluptatum eligendi, magnam repellendus veniam totam harum plac', './assets/images/unsafe1.jpg', 100, 1, '2023-12-27 09:51:28'),
(14, 'An informal waste disposal', 'Other', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Volupttibus autem voluptatum eligendi, magnam repellendus veniam totam harum plac', './assets/images/other1.jpg', 100, 0, '2023-12-27 10:00:36'),
(26, 'Testing  ', 'Road Crack', 'testing tesing', './assets/images/roadcarack4.png', 7, 0, '2023-12-29 10:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL DEFAULT './assets/images/users/default_user.jpg',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `img_path`, `email`, `password`, `status`, `create_at`) VALUES
(2, 'dilan', './assets/images/users/default_user.jpg', 'dilan@gmail.com', '', 1, '2023-12-16 16:46:47'),
(6, 'sachintha', './assets/images/users/default_user.jpg', 'sachintha@gmail.com', '$2y$10$GiG3Ub8hr4KX0wufCdWbu.yNfMChZdUviTco8VEj9pYN8vAkKu8CK', 1, '2023-12-21 11:35:01'),
(7, 'test user', './assets/images/usersddd.png', 'test@gmail.com', '$2y$10$PJdwP2fm7oS55l5dEwyviuUzViXOvtevQ3cDX0zvs8P39Otzr6tyy', 1, '2023-12-22 07:18:14'),
(8, 'shiranthi', './assets/images/users/sample_user.jpg', 'shiranthi@gmail.com', '$2y$10$JO26OKjZR7iG8nqp4w4TRuki.0ZGnFbZ0kzxLESrljcNTfRwYyVFe', 1, '2023-12-29 10:34:08'),
(100, 'Admin', './assets/images/userssample_user.jpg', 'admin@gmail.com', '4444', 1, '2023-12-22 17:54:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
