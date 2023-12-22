-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 10:10 AM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `description`, `status`, `create_at`) VALUES
(1, 'No Water  Supply Yet', 'normal', 'there is no water for Thihagoda areaLorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore vero et iste pariatur? Accusantium laboriosam reprehenderit similique ut error earum repudiandae quis eaque et minima iure odio dicta, consectetur dolor quia natus magnam dolorem dolore. Dolor quisquam a obcaecati vitae harum iste ad veritatis corrupti, ipsum praesentium consequatur nemo excepturi.', 0, '2023-12-14 11:09:42'),
(2, 'No Current Suppply', 'normal', 'there is no current for Thihagoda area Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore vero et iste pariatur? Accusantium laboriosam reprehenderit similique ut error earum repudiandae quis eaque et minima iure odio dicta, consectetur dolor quia natus magnam dolorem dolore. Dolor quisquam a obcaecati vitae harum iste ad veritatis corrupti, ipsum praesentium consequatur nemo excepturi.', 1, '2023-12-14 11:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `national_id` varchar(13) NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `national_id`, `contact_num`, `email`, `password`, `gender`, `status`, `create_at`) VALUES
(1, '', 'dilan ', 'sachintha', '970512713V', '071732932', 'dilan@gmail.com', '', 1, 0, '2023-12-16 16:46:47'),
(2, '', 'Tharaka ', 'sachintha', '200512713V', '0717329326', 'dilan@gmail.com', '', 1, 0, '2023-12-16 16:46:47'),
(6, 'sachintha', '', '', '', '', 'sachintha@gmail.com', '$2y$10$GiG3Ub8hr4KX0wufCdWbu.yNfMChZdUviTco8VEj9pYN8vAkKu8CK', 0, 1, '2023-12-21 11:35:01'),
(7, 'test', '', '', '', '', 'test@gmail.com', '$2y$10$PJdwP2fm7oS55l5dEwyviuUzViXOvtevQ3cDX0zvs8P39Otzr6tyy', 0, 1, '2023-12-22 07:18:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
