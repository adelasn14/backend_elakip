-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2023 at 06:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekda_latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'adminadel', 'adminelakip');

-- --------------------------------------------------------

--
-- Table structure for table `data_log`
--

CREATE TABLE `data_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `tabel` varchar(255) NOT NULL,
  `konteks` varchar(255) NOT NULL,
  `logtime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indikator_target`
--

CREATE TABLE `indikator_target` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `target` varchar(255) NOT NULL,
  `indikator` varchar(255) NOT NULL,
  `logtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `indikator_target`
--
DELIMITER $$
CREATE TRIGGER `hapus_data_indikatortarget` BEFORE DELETE ON `indikator_target` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(OLD.user_id, 'MENGHAPUS', 'TARGET_INDIKATOR', CONCAT(OLD.target, ' ' , OLD.indikator), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_data_targetindikator` BEFORE INSERT ON `indikator_target` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENAMBAH', 'TARGET_INDIKATOR', CONCAT(NEW.target, ' ' , NEW.indikator), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_indikatortarget` AFTER UPDATE ON `indikator_target` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENGUBAH', 'TARGET_INDIKATOR', CONCAT(OLD.target, ' ' , OLD.indikator, ' KE ', NEW.target, ' ' , NEW.indikator), NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_misi` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `logtime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `kegiatan`
--
DELIMITER $$
CREATE TRIGGER `hapus_data_kegiatan` BEFORE DELETE ON `kegiatan` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(OLD.user_id, 'MENGHAPUS', 'KEGIATAN', CONCAT(OLD.kegiatan, ' DARI MISI ', OLD.id_misi, ' DAN TUJUAN ', OLD.id_tujuan), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_data_kegiatan` AFTER INSERT ON `kegiatan` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENAMBAH', 'KEGIATAN', CONCAT(NEW.kegiatan, ' DARI MISI ', NEW.id_misi, ' DAN TUJUAN ', NEW.id_tujuan), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_kegiatan` AFTER UPDATE ON `kegiatan` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENGUBAH', 'KEGIATAN', CONCAT(OLD.kegiatan, ' DARI MISI ', OLD.id_misi, ' DAN TUJUAN ', OLD.id_tujuan, ' KE ', NEW.kegiatan, ' DARI MISI ', NEW.id_misi, ' DAN TUJUAN ', NEW.id_tujuan), NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempt`
--

CREATE TABLE `login_attempt` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `logtime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `logtime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `misi`
--
DELIMITER $$
CREATE TRIGGER `hapus_data_misi` AFTER DELETE ON `misi` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(OLD.user_id, 'MENGHAPUS', 'MISI', OLD.misi, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_data_misi` AFTER INSERT ON `misi` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENAMBAH', 'MISI', NEW.misi, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_misi` AFTER UPDATE ON `misi` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENGUBAH', 'MISI', CONCAT(OLD.misi, ' KE ', NEW.misi), NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_misi` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `logtime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tujuan`
--
DELIMITER $$
CREATE TRIGGER `hapus_data_tujuan` BEFORE DELETE ON `tujuan` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(OLD.user_id, 'MENGHAPUS', 'TUJUAN', CONCAT(OLD.tujuan, ' DARI MISI ', OLD.id_misi), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_data_tujuan` AFTER INSERT ON `tujuan` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENAMBAH', 'TUJUAN', CONCAT(NEW.tujuan, ' DARI MISI ', NEW.id_misi), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_tujuan` AFTER UPDATE ON `tujuan` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENGUBAH', 'TUJUAN', CONCAT(OLD.tujuan, ' DARI MISI ', OLD.id_misi, ' KE ', NEW.tujuan, ' DARI MISI ', NEW.id_misi), NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'kabgrobogan', 'kabgrobogan'),
(2, 'kominfo', 'kominfo'),
(3, 'dinkes', 'dinkes'),
(4, 'dlh', 'dlh'),
(5, 'adel', 'adel'),
(6, 'vida', 'vida');

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `penjabaran_visi` varchar(255) NOT NULL,
  `logtime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `visi`
--
DELIMITER $$
CREATE TRIGGER `hapus_data_visi` BEFORE DELETE ON `visi` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(OLD.user_id, 'MENGHAPUS', 'VISI', CONCAT(OLD.visi, ' DENGAN PENJABARAN ', OLD.penjabaran_visi), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_data_visi` AFTER INSERT ON `visi` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENAMBAH', 'VISI', CONCAT(NEW.visi, ' DENGAN PENJABARAN ', NEW.penjabaran_visi), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_visi` AFTER UPDATE ON `visi` FOR EACH ROW BEGIN
    INSERT INTO data_log(user_id, aksi, tabel, konteks, logtime)
    VALUES(NEW.user_id, 'MENGUBAH', 'VISI', CONCAT(OLD.visi, ' DENGAN PENJABARAN ', OLD.penjabaran_visi, ' KE ', NEW.visi, ' DENGAN PENJABARAN ', NEW.penjabaran_visi), NOW());
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_log`
--
ALTER TABLE `data_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikator_target`
--
ALTER TABLE `indikator_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempt`
--
ALTER TABLE `login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_log`
--
ALTER TABLE `data_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indikator_target`
--
ALTER TABLE `indikator_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempt`
--
ALTER TABLE `login_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
