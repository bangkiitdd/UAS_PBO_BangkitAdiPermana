-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 06:14 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_bangkitadipermana`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` int NOT NULL,
  `jenis_karyawan` enum('kontrak','tetap','magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` int DEFAULT NULL,
  `opsi_saham_id` varchar(20) DEFAULT NULL,
  `uang_saku_bulanan` int DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('KTR001', 'Andi Wijaya', 'IT Support', 22, 150000, 'kontrak', 12, 'PT Sumber Daya Manusia', NULL, NULL, NULL, NULL),
('KTR002', 'Budi Santoso', 'Marketing', 20, 140000, 'kontrak', 6, 'PT Nusantara Talent', NULL, NULL, NULL, NULL),
('KTR003', 'Citra Lestari', 'Finance', 21, 160000, 'kontrak', 12, 'PT Sumber Daya Manusia', NULL, NULL, NULL, NULL),
('KTR004', 'Dedi Kurniawan', 'Operations', 23, 130000, 'kontrak', 24, 'PT Global Outsource', NULL, NULL, NULL, NULL),
('KTR005', 'Eka Putra', 'IT Support', 19, 150000, 'kontrak', 6, 'PT Nusantara Talent', NULL, NULL, NULL, NULL),
('KTR006', 'Fitriani', 'HRD', 22, 145000, 'kontrak', 12, 'PT Global Outsource', NULL, NULL, NULL, NULL),
('KTR007', 'Gilang Ramadhan', 'Marketing', 20, 140000, 'kontrak', 6, 'PT Nusantara Talent', NULL, NULL, NULL, NULL),
('MGN001', 'Rian Hidayat', 'Software Engineering', 20, 50000, 'magang', NULL, NULL, NULL, NULL, 1500000, 'Sertifikat MSIB - BackEnd Developer'),
('MGN002', 'Siti Aisyah', 'UI/UX Design', 22, 50000, 'magang', NULL, NULL, NULL, NULL, 1500000, 'Sertifikat MSIB - UI/UX Designer'),
('MGN003', 'Taufik Hidayat', 'Marketing', 18, 45000, 'magang', NULL, NULL, NULL, NULL, 1200000, 'Sertifikat MSIB - Digital Marketing'),
('MGN004', 'Utami Putri', 'HRD', 21, 45000, 'magang', NULL, NULL, NULL, NULL, 1200000, 'Sertifikat MSIB - Human Resource'),
('MGN005', 'Viko Pradana', 'Data Analyst', 20, 50000, 'magang', NULL, NULL, NULL, NULL, 1500000, 'Sertifikat MSIB - Data Scientist'),
('MGN006', 'Winda Lestari', 'Finance', 19, 45000, 'magang', NULL, NULL, NULL, NULL, 1200000, NULL),
('MGN007', 'Yuda Pratama', 'IT Support', 22, 45000, 'magang', NULL, NULL, NULL, NULL, 1300000, 'Sertifikat MSIB - IT Technical'),
('TTP001', 'Hendra Wijaya', 'Software Engineering', 22, 350000, 'tetap', NULL, NULL, 500000, 'ESOP-2026-001', NULL, NULL),
('TTP002', 'Indah Permata', 'HRD', 21, 300000, 'tetap', NULL, NULL, 400000, 'ESOP-2026-002', NULL, NULL),
('TTP003', 'Joko Susilo', 'Finance', 22, 320000, 'tetap', NULL, NULL, 450000, 'ESOP-2026-003', NULL, NULL),
('TTP004', 'Kurniawati', 'Data Analyst', 20, 340000, 'tetap', NULL, NULL, 500000, 'ESOP-2026-004', NULL, NULL),
('TTP005', 'Laksana Tri', 'Software Engineering', 23, 380000, 'tetap', NULL, NULL, 600000, 'ESOP-2026-005', NULL, NULL),
('TTP006', 'Mega Utami', 'Marketing Manager', 22, 400000, 'tetap', NULL, NULL, 550000, 'ESOP-2026-006', NULL, NULL),
('TTP007', 'Nugroho Adi', 'Operations', 21, 290000, 'tetap', NULL, NULL, 400000, 'ESOP-2026-007', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
