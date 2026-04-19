-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.infinityfree.com
-- Generation Time: Dec 10, 2025 at 01:11 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40322643_solepurpose`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES
(1, 'Nicole', '$2y$10$Snw5gkUJnCTBNQ9CD4zOaOfE5JVayM3demT3VXVJbNG2HZM0kwF52', '2025-11-03 11:03:20'),
(2, 'Ketan', '$2y$10$fGIVp767NasqZL9zEtxUBe65JLJ5McfGHXfSQ0RHzF.QuGORrPwe2', '2025-11-03 11:31:26'),
(3, 'Sharon', '$2y$10$6SYVsnm.m0L9UmtSr8xbauZhy6y5W.8xd0Bd1vUWk3Tyb0OVF7wgG', '2025-11-03 11:34:58'),
(4, 'Dhana', '$2y$10$cnp7NavSt2iikF4QlH/I2ereUCHpESo27xt/v1KALqOyxdYfmzoEC', '2025-11-03 05:39:14'),
(5, 'suresh', '$2y$10$zW2WP0nJYgJZQEQQvVWvQO4rXCGx7KFhNZiUDdVYKnuwj/R7MRTbu', '2025-11-03 05:44:59'),
(6, 'samp_svt', '$2y$10$jStN2nOzJFIslQPHIG6bG.nNTQdBqoDJDUfdF4XagRaDTqv1l8gNK', '2025-11-03 07:48:14'),
(7, 'nic_ole.218', '$2y$10$s4uv777jyGgbeJ1HBayjy.EbxqZTbZ5FEl5z9qtO5BoiyWdtrzkwa', '2025-11-03 11:08:40'),
(8, 'Risa', '$2y$10$lX60WhaC06CIBtAPS0Ls1u7P64rlOUM.ebIYf9fUvLsGOMznQvBG.', '2025-11-03 20:55:39'),
(9, 'cd', '$2y$10$K7W5ANC551bUDth3S3qZ4.2SdbiBJh0pDBnxUHqAAcqR.alYMSLga', '2025-11-04 19:46:20'),
(10, 'Risa1', '$2y$10$kUolo81v5QFKnj53WGQUq.9cgVjnqqYbNlRBoG9lfLqvBWlmpr9FW', '2025-11-05 23:23:11'),
(11, 'Ketan12', '$2y$10$oibxtJ8hvqD1RyeyKiHFK.C/oJ/A44myViMfu6II9mQWpwSRe882q', '2025-11-27 04:35:54'),
(12, 'harry12', '$2y$10$WzxGbkJfVLnt1qg6PBJkjucdU2PEbtYe2xpcVn8KHQm6bf3kVeHWG', '2025-12-04 20:55:47');

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
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
