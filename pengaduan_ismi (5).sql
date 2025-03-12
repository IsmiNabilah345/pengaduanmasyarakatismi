-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 05:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_ismi`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `status_pengaduan` (IN `stat` ENUM('0','proses','selesai'), IN `awal_ismi` INT(11), IN `jmlh_ismi` INT(11))   BEGIN
SELECT * FROM tb_pengaduan_ismi WHERE status_ismi = stat LIMIT awal_ismi, jmlh_ismi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_admin` ()   BEGIN
SELECT * FROM tb_petugas_ismi WHERE level_ismi = 'admin';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_pengaduan_ismi`
--

CREATE TABLE `log_pengaduan_ismi` (
  `id_log_ismi` int(11) NOT NULL,
  `ket_log_ismi` text NOT NULL,
  `tgl_log_ismi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_pengaduan_ismi`
--

INSERT INTO `log_pengaduan_ismi` (`id_log_ismi`, `ket_log_ismi`, `tgl_log_ismi`) VALUES
(1, 'Tambah Data Pengaduan', '2023-03-05 07:51:17'),
(2, 'Tambah Data Pengaduan', '2023-03-05 07:52:43'),
(3, 'Tambah Data Pengaduan', '2023-03-05 08:10:55'),
(4, 'Tambah Data Pengaduan', '2023-03-05 08:20:48'),
(5, 'Tambah Data Pengaduan', '2023-03-07 09:46:00'),
(6, 'Tambah Data Pengaduan', '2023-03-07 09:47:00'),
(7, 'Update Data Petugas', '2023-03-09 10:13:52'),
(8, 'Menanggapi', '2023-03-09 10:21:53'),
(9, 'Menanggapi', '2023-03-14 22:29:04'),
(10, 'Tambah Data Pengaduan', '2023-03-14 23:45:32'),
(11, 'Tambah Data Pengaduan', '2023-03-14 23:46:41'),
(12, 'Tambah Data Pengaduan', '2023-03-15 20:57:37'),
(13, 'Menanggapi', '2023-03-15 20:58:35'),
(14, 'Menanggapi', '2023-03-15 22:01:58'),
(15, 'Update Data Petugas', '2023-03-15 22:08:36'),
(16, 'Update Data Petugas', '2023-03-15 22:10:41'),
(17, 'Hapus Data Petugas', '2023-03-15 22:11:32'),
(18, 'Menanggapi', '2023-03-15 22:24:36'),
(19, 'Update Data Petugas', '2023-03-15 22:32:45'),
(20, 'Hapus Data Petugas', '2023-03-15 22:33:36'),
(21, 'Tambah Data Pengaduan', '2023-03-15 22:37:05'),
(22, 'Update Data Petugas', '2023-03-16 14:58:53'),
(23, 'Update Data Petugas', '2023-03-16 15:03:32'),
(24, 'Tambah Data Pengaduan', '2023-03-16 15:06:31'),
(25, 'Tambah Data Pengaduan', '2023-03-16 15:07:43'),
(26, 'Menanggapi', '2023-03-16 15:08:21'),
(27, 'Menanggapi', '2023-03-16 15:09:27'),
(28, 'Hapus Data Petugas', '2023-03-16 15:15:26'),
(29, 'Hapus Data Petugas', '2023-03-16 22:27:36'),
(30, 'Hapus Data Petugas', '2023-03-16 22:27:40'),
(31, 'Hapus Data Petugas', '2023-03-16 22:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat_ismi`
--

CREATE TABLE `tb_masyarakat_ismi` (
  `nik_masyarakat_ismi` char(16) NOT NULL,
  `nama_ismi` varchar(35) NOT NULL,
  `username_ismi` varchar(25) NOT NULL,
  `password_ismi` varchar(32) NOT NULL,
  `telp_ismi` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masyarakat_ismi`
--

INSERT INTO `tb_masyarakat_ismi` (`nik_masyarakat_ismi`, `nama_ismi`, `username_ismi`, `password_ismi`, `telp_ismi`) VALUES
('3277120874659809', 'Nabilah', 'bila', '1fd67c6f38b9cf27aca967e2198b092e', '0895329746650'),
('3277981304718234', 'Rizli', 'zli', 'f135db6631ddfecdc3b23dae962c0f3e', '0891274284865'),
('3277984637491284', 'Queen', 'queenn', 'e210acccff4c3a6a3516c760712281c3', '0891482746266');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan_ismi`
--

CREATE TABLE `tb_pengaduan_ismi` (
  `id_pengaduan_ismi` int(11) NOT NULL,
  `tgl_pengaduan_ismi` date NOT NULL,
  `nik_ismii` char(16) NOT NULL,
  `isi_laporan_ismi` text NOT NULL,
  `foto_ismi` varchar(255) NOT NULL,
  `status_ismi` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengaduan_ismi`
--

INSERT INTO `tb_pengaduan_ismi` (`id_pengaduan_ismi`, `tgl_pengaduan_ismi`, `nik_ismii`, `isi_laporan_ismi`, `foto_ismi`, `status_ismi`) VALUES
(1, '2023-03-05', '3277120874659809', 'saya Ismi Nabilah warga rt nol dua ingin membuat pengaduan, terimakasih', 'webcam-toy-photo2.jpg', 'selesai'),
(2, '2023-03-05', '3277984637491284', 'Saya Queen Alexia warga rt nol tiga ingin membuat pengaduan perihal tetangga saya yang sangat berisik di malam hari', 'webcam-toy-photo4.jpg', 'selesai'),
(3, '2023-03-05', '3277120874659809', 'akuu hanya ingin mencoba ini', 'webcam-toy-photo1.jpg', 'selesai'),
(4, '2023-03-05', '3277984637491284', 'another love', 'webcam-toy-photo6.jpg', 'selesai'),
(5, '2023-03-07', '3277120874659809', 'halo bilaa', '5d2ee854-f09d-40e8-bc93-222553b595a9.png', 'selesai'),
(6, '2023-03-07', '3277984637491284', 'halo queennn', '_20200217_200943.jpg', 'selesai'),
(7, '2023-03-14', '3277120874659809', 'amii cepat sembuh yaa', 'webcam-toy-photo1.jpg', 'selesai'),
(8, '2023-03-14', '3277984637491284', 'halow ica zeyenk', 'webcam-toy-photo2.jpg', 'selesai'),
(9, '2023-03-15', '3277984637491284', 'bismillah ini mencoba', 'Screenshot (35).png', 'selesai'),
(10, '2023-03-15', '3277120874659809', 'nyoba saja', '{3B81F8AE-40C0-4C76-9426-9DDFE6EC700A}.png.jpg', '0'),
(11, '2023-03-16', '3277120874659809', 'bismillah', '{507F3C0E-D01E-410B-828F-053D4AFE6A13}.png.jpg', 'selesai'),
(12, '2023-03-16', '3277984637491284', 'bismillah', '{FA673C4F-A7E9-4335-9629-F18CDDE768C4}.png.jpg', 'selesai');

--
-- Triggers `tb_pengaduan_ismi`
--
DELIMITER $$
CREATE TRIGGER `tambah pengaduan` AFTER INSERT ON `tb_pengaduan_ismi` FOR EACH ROW INSERT INTO log_pengaduan_ismi(ket_log_ismi,tgl_log_ismi) VALUES ('Tambah Data Pengaduan', SYSDATE())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas_ismi`
--

CREATE TABLE `tb_petugas_ismi` (
  `id_petugas_ismi` int(11) NOT NULL,
  `nama_petugas_ismi` varchar(35) NOT NULL,
  `username_petugas_ismi` varchar(25) NOT NULL,
  `password_petugas_ismi` varchar(32) NOT NULL,
  `telp_petugas_ismi` varchar(13) NOT NULL,
  `level_ismi` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas_ismi`
--

INSERT INTO `tb_petugas_ismi` (`id_petugas_ismi`, `nama_petugas_ismi`, `username_petugas_ismi`, `password_petugas_ismi`, `telp_petugas_ismi`, `level_ismi`) VALUES
(3, 'Ranaz', 'ranaz', '21232f297a57a5a743894a0e4a801fc3', '0891298374325', 'admin'),
(4, 'Fadly', 'mm', 'afb91ef692fd08c445e8cb1bab2ccf9c', '0891987263513', 'petugas'),
(9, 'Ashari', 'hari', '0c75a690770f603e9cc623e62d05ba3a', '0891967263515', 'petugas');

--
-- Triggers `tb_petugas_ismi`
--
DELIMITER $$
CREATE TRIGGER `edit_petugas` AFTER UPDATE ON `tb_petugas_ismi` FOR EACH ROW INSERT INTO log_pengaduan_ismi(ket_log_ismi,tgl_log_ismi) VALUES ('Update Data Petugas', SYSDATE())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_petugas` AFTER DELETE ON `tb_petugas_ismi` FOR EACH ROW INSERT INTO log_pengaduan_ismi(ket_log_ismi,tgl_log_ismi) VALUES ('Hapus Data Petugas', SYSDATE())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanggapan_ismi`
--

CREATE TABLE `tb_tanggapan_ismi` (
  `id_tanggapan_ismi` int(11) NOT NULL,
  `id_pengaduan_ismi` int(11) NOT NULL,
  `tgl_tanggapan_ismi` date NOT NULL,
  `tanggapan_ismi` text NOT NULL,
  `id_petugas_ismi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tanggapan_ismi`
--

INSERT INTO `tb_tanggapan_ismi` (`id_tanggapan_ismi`, `id_pengaduan_ismi`, `tgl_tanggapan_ismi`, `tanggapan_ismi`, `id_petugas_ismi`) VALUES
(1, 1, '2023-03-05', 'baiklah nak ismi akan segera kami tindak lanjuti pengaduan anda ini', 3),
(2, 2, '2023-03-05', 'iya gimana kamu aja ya', 4),
(3, 3, '2023-03-07', 'okay bang', 3),
(4, 4, '2023-03-06', 'bismillah', 4),
(5, 6, '2023-03-09', 'yayaya', 3),
(6, 5, '2023-03-14', 'bismillah', 3),
(7, 9, '2023-03-15', 'iya bismillah', 4),
(8, 8, '2023-03-15', 'u can do it', 3),
(9, 7, '2023-03-15', 'insyaallah pasti bisa', 3),
(10, 11, '2023-03-16', 'bismillah', 3),
(11, 12, '2023-03-16', 'bismillah terus', 9);

--
-- Triggers `tb_tanggapan_ismi`
--
DELIMITER $$
CREATE TRIGGER `tambah_tanggapan` AFTER INSERT ON `tb_tanggapan_ismi` FOR EACH ROW INSERT INTO log_pengaduan_ismi(ket_log_ismi,tgl_log_ismi) VALUES ('Menanggapi', SYSDATE())
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_pengaduan_ismi`
--
ALTER TABLE `log_pengaduan_ismi`
  ADD PRIMARY KEY (`id_log_ismi`);

--
-- Indexes for table `tb_masyarakat_ismi`
--
ALTER TABLE `tb_masyarakat_ismi`
  ADD PRIMARY KEY (`nik_masyarakat_ismi`);

--
-- Indexes for table `tb_pengaduan_ismi`
--
ALTER TABLE `tb_pengaduan_ismi`
  ADD PRIMARY KEY (`id_pengaduan_ismi`),
  ADD KEY `nik_ismii` (`nik_ismii`);

--
-- Indexes for table `tb_petugas_ismi`
--
ALTER TABLE `tb_petugas_ismi`
  ADD PRIMARY KEY (`id_petugas_ismi`);

--
-- Indexes for table `tb_tanggapan_ismi`
--
ALTER TABLE `tb_tanggapan_ismi`
  ADD PRIMARY KEY (`id_tanggapan_ismi`),
  ADD KEY `id_pengaduan_ismi` (`id_pengaduan_ismi`,`id_petugas_ismi`),
  ADD KEY `id_petugas_ismi` (`id_petugas_ismi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_pengaduan_ismi`
--
ALTER TABLE `log_pengaduan_ismi`
  MODIFY `id_log_ismi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_pengaduan_ismi`
--
ALTER TABLE `tb_pengaduan_ismi`
  MODIFY `id_pengaduan_ismi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_petugas_ismi`
--
ALTER TABLE `tb_petugas_ismi`
  MODIFY `id_petugas_ismi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_tanggapan_ismi`
--
ALTER TABLE `tb_tanggapan_ismi`
  MODIFY `id_tanggapan_ismi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengaduan_ismi`
--
ALTER TABLE `tb_pengaduan_ismi`
  ADD CONSTRAINT `tb_pengaduan_ismi_ibfk_1` FOREIGN KEY (`nik_ismii`) REFERENCES `tb_masyarakat_ismi` (`nik_masyarakat_ismi`);

--
-- Constraints for table `tb_tanggapan_ismi`
--
ALTER TABLE `tb_tanggapan_ismi`
  ADD CONSTRAINT `tb_tanggapan_ismi_ibfk_1` FOREIGN KEY (`id_pengaduan_ismi`) REFERENCES `tb_pengaduan_ismi` (`id_pengaduan_ismi`),
  ADD CONSTRAINT `tb_tanggapan_ismi_ibfk_2` FOREIGN KEY (`id_petugas_ismi`) REFERENCES `tb_petugas_ismi` (`id_petugas_ismi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
