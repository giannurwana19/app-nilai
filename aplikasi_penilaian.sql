-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2022 at 04:13 AM
-- Server version: 8.0.30
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_penilaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `jurusan`, `no_hp`) VALUES
(1, 'Gian Nurwana', '1811499988', 'Sistem Informasi', '089550498392'),
(2, 'Wawan Kurniawan', '1811489379', 'Teknik Informatika', '089578493027'),
(3, 'Muhamad Hendri', '1837647839', 'Sistem Informasi', '085993892178'),
(5, 'Muhammad Adit', '1811478372', 'Teknik Informatika', '089446738291');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `kode`, `nama`) VALUES
(1, 'TIK001', 'Teknologi Informasi'),
(2, 'TIK002', 'Rekayasa Perangkat Lunak'),
(3, 'TIK003', 'Pemrograman Java');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mahasiswa`
--

CREATE TABLE `nilai_mahasiswa` (
  `id` int NOT NULL,
  `id_mahasiswa` int DEFAULT NULL,
  `id_mata_kuliah` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `nilai_tugas` decimal(10,2) DEFAULT NULL,
  `nilai_uts` decimal(10,2) DEFAULT NULL,
  `nilai_uas` decimal(10,2) DEFAULT NULL,
  `nilai_akhir` decimal(10,2) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai_mahasiswa`
--

INSERT INTO `nilai_mahasiswa` (`id`, `id_mahasiswa`, `id_mata_kuliah`, `kehadiran`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `grade`) VALUES
(1, 5, 1, 10, '84.00', '4.00', '47.00', '44.00', 'E'),
(2, 1, 2, 14, '100.00', '100.00', '100.00', '100.00', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
