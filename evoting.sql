-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 03:17 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(32) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_edit_password` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `email`, `password`, `last_edit_password`) VALUES
('1', 'admin', 'address@email.com', '$2y$10$G0YeMPQx/lgKFYwaxiVz6e0Z0R2AtHM2JF3FohH1dQaMkpwjPFvUW', '2023-11-22 20:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilih`
--

CREATE TABLE `tb_pemilih` (
  `id_pemilih` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` enum('sudah','belum') NOT NULL,
  `id_voting` varchar(32) NOT NULL,
  `waktu_memilih` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pilihan_voting`
--

CREATE TABLE `tb_pilihan_voting` (
  `id_pilihan_voting` varchar(32) NOT NULL,
  `id_voting` varchar(32) NOT NULL,
  `nama_pilihan` varchar(128) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `jumlah_voting` int(20) NOT NULL,
  `persentase` float NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` varchar(32) NOT NULL,
  `id_pemilih` varchar(32) NOT NULL,
  `aksi` enum('dibuat','memilih','reset','hapus') NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_voting`
--

CREATE TABLE `tb_voting` (
  `id_voting` varchar(32) NOT NULL,
  `judul_voting` varchar(128) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(10) NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voting`
--

INSERT INTO `tb_voting` (`id_voting`, `judul_voting`, `status`, `created_at`, `token`, `batas_waktu`, `tema`) VALUES
('1', 'Voting Privat', 'nonaktif', '2023-11-01 16:59:11', 'asdfghjkl', '2023-11-23 00:00:00', 'Voting_Privat_bg.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indexes for table `tb_pilihan_voting`
--
ALTER TABLE `tb_pilihan_voting`
  ADD PRIMARY KEY (`id_pilihan_voting`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tb_voting`
--
ALTER TABLE `tb_voting`
  ADD PRIMARY KEY (`id_voting`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
