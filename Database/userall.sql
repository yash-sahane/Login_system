-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 08:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usersall`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `password`, `cpassword`, `date`) VALUES
(112, 'tt', '$2y$10$7A2yGjgFHpB84LtWwTRlKet6IlzY1kUu.qT1m/KvuDBTmc24WhFO.', '$2y$10$7A2yGjgFHpB84LtWwTRlKet6IlzY1kUu.qT1m/KvuDBTmc24WhFO.', '2021-10-17 07:30:57'),
(113, 'ch', '$2y$10$PAz7Ro1nodDDiXfWUjhVNuaMwEI2Ry2g4Yqc50lYyyZadxetZf8FG', '$2y$10$PAz7Ro1nodDDiXfWUjhVNuaMwEI2Ry2g4Yqc50lYyyZadxetZf8FG', '2021-10-17 07:43:09'),
(114, 'prajwal', '$2y$10$dN4/t1hq7wIMicYsTF935urj8I33wQv/HnfSrWijNE5EPjoDT.Dfa', '$2y$10$dN4/t1hq7wIMicYsTF935urj8I33wQv/HnfSrWijNE5EPjoDT.Dfa', '2021-10-17 08:14:36'),
(115, 'dj ', '$2y$10$mjcM960hsDQRsTGDVrOa4ONLHlsnNqj.xgoW.Fpw0FfEwtPaWt9Lq', '$2y$10$mjcM960hsDQRsTGDVrOa4ONLHlsnNqj.xgoW.Fpw0FfEwtPaWt9Lq', '2021-10-17 22:36:46'),
(116, 'rushi', '$2y$10$eDHmEe/ddZYjoslpsFchC.SgTaPQ1Zi6Yg.zqpdy69NQGu/bgY1ZW', '$2y$10$eDHmEe/ddZYjoslpsFchC.SgTaPQ1Zi6Yg.zqpdy69NQGu/bgY1ZW', '2021-10-17 22:37:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
