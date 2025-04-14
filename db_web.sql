-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 02:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `thumbpath` varchar(255) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `filename`, `filepath`, `thumbpath`, `width`, `height`, `uploaded_at`) VALUES
(13, 'hakam.jpeg', 'uploads/hakam.jpeg', 'uploads/thumbs/hakam.jpeg', 3060, 4080, '2025-04-13 16:50:55'),
(14, 'hakam.gif', 'uploads/hakam.gif', 'uploads/thumbs/hakam.gif', 3060, 4080, '2025-04-13 17:02:52'),
(15, 'hakampng.png', 'uploads/hakampng.png', 'uploads/thumbs/hakampng.png', 433, 577, '2025-04-13 17:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `gambartugas`
--

CREATE TABLE `gambartugas` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `thumbpath` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambartugas`
--

INSERT INTO `gambartugas` (`id`, `filename`, `filepath`, `thumbpath`, `width`, `height`, `updated_at`) VALUES
(1, '1_20250414163646.jpg', 'uploads/profile_pics/1_20250414163646.jpg', 'uploads/thumbs/1_20250414163646.jpg', 3060, 4080, '2025-04-14 16:36:47'),
(2, '2_20250414190434.png', 'uploads/profile_pics/2_20250414190434.png', 'uploads/thumbs/2_20250414190434.png', 433, 577, '2025-04-14 19:04:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambartugas`
--
ALTER TABLE `gambartugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gambartugas`
--
ALTER TABLE `gambartugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
