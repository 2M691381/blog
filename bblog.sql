-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 18, 2021 at 03:30 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `approuve` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `comment`, `comment_date`, `approuve`, `posts_id`, `users_id`) VALUES
(1, 'dcddsdssqd', '2021-11-10 18:35:17', 1, 1, 2),
(2, 'jbkn:', '2021-11-10 19:41:35', 1, 1, 2),
(3, 'jblnkpjo^p', '2021-11-18 15:17:47', 1, 5, 1),
(4, 'lknm,lùmevf', '2021-11-18 15:17:57', 1, 5, 1),
(5, 'klnm,leùv', '2021-11-18 15:18:08', 1, 1, 1),
(6, 'nklm,lùmev', '2021-11-18 15:18:17', 1, 4, 1),
(7, ' lknme,vl', '2021-11-18 15:18:28', 1, 2, 1),
(8, 'lbnkmjkdù', '2021-11-18 16:15:57', 1, 1, 1),
(9, 'lbnkm,ed', '2021-11-18 16:16:10', 1, 2, 1),
(10, 'h gjvbknlm,ù', '2021-11-18 16:16:44', 1, 1, 3),
(11, 'fgxchvjbnl,mù', '2021-11-18 16:16:52', 1, 1, 3),
(12, 'k jblnfm,d', '2021-11-18 16:17:00', 1, 2, 3),
(14, 'bjlknm,dùc', '2021-11-18 16:17:16', 1, 2, 3),
(15, 'biolncmjd', '2021-11-18 16:17:43', 1, 1, 2),
(16, 'hpinmk,lzdc', '2021-11-18 16:17:52', 1, 1, 2),
(17, 'kbjlnx,', '2021-11-18 16:18:01', 1, 5, 2),
(18, 'bjklnkcdz', '2021-11-18 16:18:08', 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`posts_id`, `title`, `chapo`, `content`, `created_date`, `updated_date`, `users_id`) VALUES
(1, 'Mon premier blog PHP edition suppression fonctionne', 'Super !', 'le code ...... ', '2021-11-05 20:11:33', '2021-11-18 16:14:20', 1),
(2, 'Mon premier blog PHP', 'ededde', 'edededde', '2021-11-05 20:13:54', '2021-11-11 20:25:18', 1),
(4, 'On y est presque', 'les fintions', 'un code propre', '2021-11-10 20:51:11', '2021-11-18 16:19:06', 1),
(5, 'Mon premier blog PHP SQLfarce', 'chapi chapo tic et tac', 'sont sur un bateau et bla bla sen cogne', '2021-11-18 15:17:13', '2021-11-18 16:13:27', 1),
(6, 'La galère', 'requetes et contrainte', 'bind, paramtre et value ', '2021-11-18 16:20:04', '2021-11-18 16:20:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `login` varchar(95) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `login`, `email`, `password`, `confirm`) VALUES
(1, 'mickael', 'mickael@aol.fr', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(2, 'marine', 'marine@aol.fr', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2),
(3, 'laurie', 'laurie@aol.fr', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD UNIQUE KEY `comments_id_UNIQUE` (`comments_id`),
  ADD KEY `fk_Comments_Posts1_idx` (`posts_id`),
  ADD KEY `fk_Comments_Users1_idx` (`users_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`),
  ADD UNIQUE KEY `posts_id_UNIQUE` (`posts_id`),
  ADD KEY `fk_Posts_Users_idx` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`login`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `users_id_UNIQUE` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_Comments_Posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`posts_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Comments_Users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_Posts_Users` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

