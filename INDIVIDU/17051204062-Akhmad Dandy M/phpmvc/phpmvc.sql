-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Bulan Mei 2019 pada 01.23
-- Versi server: 5.7.23
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmvc`
--
CREATE DATABASE IF NOT EXISTS `phpmvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phpmvc`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenkel` varchar(128) NOT NULL,
  `tlahir` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `telp` varchar(128) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `fakultas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jenkel`, `tlahir`, `alamat`, `kota`, `email`, `foto`, `telp`, `prodi`, `fakultas`) VALUES
(8, '17051204062', 'Akhmad Dandy Muzakky', 'Laki - Laki', '09/09/1999', 'Putat Lor Menganti Gresik', 'Gresik', 'dandyjos99@gmail.com', '5ceb2edfc632f2.47264859.jpg', '08121671818', 'S1 Teknik Informatika', 'Teknik'),
(9, '17051204061', 'Fikri Ubaidillah', 'Laki - Laki', '01/01/1999', 'Surabaya', 'Surabaya', 'ubed@gmail.com', '5ceb2f3336eaa5.18126268.jpg', '08123456789', 'S1 Teknik Informatika', 'Teknik'),
(10, '17051204064', 'M. Ridho Wahyudi R.', 'Laki - Laki', '01/01/1999', 'Surabaya', 'Bayuwangi', 'ridho@gmail.com', '5ceb2f8a545067.43778312.jpg', '081266666666', 'S1 Teknik Informatika', 'Teknik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
