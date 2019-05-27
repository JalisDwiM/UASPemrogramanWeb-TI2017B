-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 01:33 PM
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
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_mhs`
--

CREATE TABLE `data_mhs` (
  `nim_mhs` int(11) NOT NULL,
  `foto` varchar(79) NOT NULL,
  `nm_mhs` varchar(100) NOT NULL,
  `jk_mhs` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `tgl_lahir` varchar(45) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telepon` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mhs`
--

INSERT INTO `data_mhs` (`nim_mhs`, `foto`, `nm_mhs`, `jk_mhs`, `prodi`, `fakultas`, `tgl_lahir`, `alamat`, `email`, `telepon`) VALUES
(33, '', 'Muhammad Hussein Isron', 'Laki-laki', 'S1 Teknik Informatika', 'Fakultas Teknik', '25-02-1999', 'Dsn. Jambu, Ds. Adem, Kec', 'isronnid@gmail.com', '815158385'),
(37, '', 'Hussein Isron', 'Laki-laki', 'S1 Gizi', 'Fakultas Kedokteran', '30-08-1999', 'Ds. Temon, Kec. Trowulan, Kab. Mojokerto, Jawa Timur', 'h_isron@yahoo.com', '081515838645');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_mhs`
--
ALTER TABLE `data_mhs`
  ADD PRIMARY KEY (`nim_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_mhs`
--
ALTER TABLE `data_mhs`
  MODIFY `nim_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
