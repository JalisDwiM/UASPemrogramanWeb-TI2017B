-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 06:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginphp`
--

CREATE TABLE `loginphp` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `type` enum('Administrator','Guru','Siswa') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginphp`
--

INSERT INTO `loginphp` (`id`, `fullname`, `email`, `username`, `password`, `type`, `active`, `hash`) VALUES
(24, 'isron', 'h_isron@yahoo.com', 'isron', '$2y$10$zjAp75lGCw.XVU4/ak09rO9xxjZ6LDegkwqejRNuslkWx7Whgve4m', 'Administrator', 0, 'e56954b4f6347e897f954495eab16a88'),
(28, 'kaka', 'dandyjoss99@gmail.com', 'kaka', '$2y$10$aBKKdF8cgt88lCMu469K/O.81ddeZxqvw6P7OemVHN3XWhwIZeRf6', 'Guru', 0, '16a5cdae362b8d27a1d8f8c7b78b4330'),
(33, 'lala', 'iugh@yahoo.com', 'lala', '$2y$10$LRU2NHqw8f7QbjfmwmH92.etj4LgOVYqqvagQge0HFmNxhBGupeSu', 'Administrator', 0, '854d9fca60b4bd07f9bb215d59ef5561'),
(34, 'isron', 'aku@gmail.com', 'aku', '$2y$10$chUhZrcNTGPF1oFeobT1iel3wVYbk2yv9snjxQMhG6kGLyvMT2D16', 'Guru', 0, '59b90e1005a220e2ebc542eb9d950b1e'),
(36, 'Muhammad Hussein Isron', 'husseinisron@gmail.com', 'isron89', '$2y$10$pf07C3qkX3Dpf8kA4yDmXOmvlPxxiCW2OkEriaN.22EiyYx8I36/S', 'Guru', 0, 'b6d767d2f8ed5d21a44b0e5886680cb9'),
(37, 'ded', 'dssc@gmail.com', 'saca', '$2y$10$ixYq5I2KS6dTlm/sT.1C3ucRI2K8ZnyZ4U3mVW.n3jyh7lDAjTqM2', 'Siswa', 0, 'daca41214b39c5dc66674d09081940f0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginphp`
--
ALTER TABLE `loginphp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginphp`
--
ALTER TABLE `loginphp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
