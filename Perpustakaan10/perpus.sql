-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 02:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(3) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tempat` text NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `telepon` text NOT NULL,
  `fakultas` enum('FEB','FTI','FH','FT','FPsi','Pasca') NOT NULL,
  `jurusan` enum('Manajemen','Akuntansi','Hukum','Teknik Informatika','Sistem Informasi','Teknik Mesin','Teknik Sipil','Teknik Elektro','Psikologi','PascaFEB') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `alamat`, `tempat`, `ttl`, `jenis_kelamin`, `telepon`, `fakultas`, `jurusan`) VALUES
(1, 'Shereen Beatrix Adhiwidjaja', 'Jln. Rappocini Raya Lrg. V No. 335 A', 'Ujung Pandang', '1999-08-18', 'Wanita', '082340626869', 'FTI', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(3) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `pengarang` text NOT NULL,
  `penerbit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`) VALUES
(1, 'Dasar Teknologi Informasi', 'Kadek', 'Erlangga');

-- --------------------------------------------------------

--
-- Table structure for table `meminjam`
--

CREATE TABLE `meminjam` (
  `id_pinjam` int(3) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jumlah_pinjam` int(3) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_anggota` int(3) NOT NULL,
  `id_buku` int(3) NOT NULL,
  `kembali` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_register`
--

CREATE TABLE `tabel_register` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_register`
--

INSERT INTO `tabel_register` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Shereen Beatrix Adhiwidjaja', 'shereenbeatrix7@gmail.com', '123'),
(2, 'Maria Yustina Tuga', 'mariayustina17@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `meminjam`
--
ALTER TABLE `meminjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tabel_register`
--
ALTER TABLE `tabel_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meminjam`
--
ALTER TABLE `meminjam`
  MODIFY `id_pinjam` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_register`
--
ALTER TABLE `tabel_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
