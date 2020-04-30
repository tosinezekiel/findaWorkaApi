-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 04:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findaworka`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `book_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `book_id`, `comment`, `ip`, `created_at`, `status`) VALUES
(3, 'seyi', 2, 'lorem ispum', '127.0.0.1', '2020-28-04UTC21:19:25118', 0),
(4, 'seyi', 4, 'lorem ispum', '127.0.0.1', '2020-28-04UTC21:20:20118', 0),
(5, 'seyi', 6, 'lorem ispum', '127.0.0.1', '2020-28-04UTC21:21:50118', 0),
(6, 'seyi', 6, 'lorem ispum', '127.0.0.1', '2020-28-04UTC21:24:10118', 0),
(7, 'seyi', 6, 'lorem ispum', '127.0.0.1', '2020-28-04UTC21:25:31118', 0),
(8, 'seyi', 6, 'lorem ispum', '127.0.0.1', '2020-28-04UTC21:29:07118', 0),
(9, 'seyi', 6, 'lorem ispum', '127.0.0.1', '2020-28-04UTC21:32:43118', 0),
(10, 'seyi', 6, 'lorem ispum', '127.0.0.1', '2020-29-04UTC13:36:46119', 0),
(11, 'seyi', 6, 'lorem ispum', '127.0.0.1', '2020-29-04UTC16:01:48119', 0),
(12, 'seyi', 4, 'lorem ispum', '127.0.0.1', '2020-30-04UTC2:14:06120', 0),
(13, 'daniel', 4, 'lorem ispum', '127.0.0.1', '2020-30-04UTC2:14:47120', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
