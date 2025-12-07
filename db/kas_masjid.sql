-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 09:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `kas_masjid` (
  `id_km` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_km` date NOT NULL,
  `uraian_km` varchar(200) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('Masuk','Keluar') NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_km`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `kas_masjid` (`id_km`, `tgl_km`, `uraian_km`, `masuk`, `keluar`, `jenis`, `id_pengguna`) VALUES
(1, '2024-06-10', 'Kotak Amal Sholat Jumat', 500000, 0, 'Masuk', 2),
(2, '2024-06-12', 'Kotak Amal Harian', 200000, 0, 'Masuk', 2),
(3, '2024-06-29', 'Sumbangan Majelis Talim', 600000, 0, 'Masuk', 2),
(4, '2024-06-01', 'Biaya Utilitas Masjid Bulanan', 0, 150000, 'Keluar', 2),
(5, '2024-06-08', 'Membeli Alat Kebersihan Masjid', 0, 75000, 'Keluar', 2);

CREATE TABLE `kas_sosial` (
  `id_ks` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_ks` date NOT NULL,
  `uraian_ks` varchar(200) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('Masuk','Keluar') NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_ks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `kas_sosial` (`id_ks`, `tgl_ks`, `uraian_ks`, `masuk`, `keluar`, `jenis`, `id_pengguna`) VALUES
(1, '2024-06-10', 'Iuran Sosial Bulanan Warga', 500000, 0, 'Masuk', 2),
(2, '2024-06-12', 'Donasi Atas Nama Bpk H. Murod', 1000000, 0, 'Masuk', 2),
(3, '2024-06-28', 'Santunan Warga Miskin', 0, 400000, 'Keluar', 2);

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('Administrator','Bendahara') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Admin Masjid', 'admin', 'admin', 'Administrator'),
(2, 'Bendahara Masjid', 'bendahara', 'bendahara', 'Bendahara');

CREATE TABLE `tb_pengurus` (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengurus` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_pengurus` (`id_pengurus`, `nama_pengurus`, `jabatan`, `id_pengguna`) VALUES
(1, 'duha', 'Administrator', 1),
(2, 'susi', 'Bendahara', 2);

-- Foreign key constraints
ALTER TABLE `kas_masjid`
ADD CONSTRAINT `fk_kas_masjid_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE;

ALTER TABLE `kas_sosial`
ADD CONSTRAINT `fk_kas_sosial_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE;

ALTER TABLE `tb_pengurus`
ADD CONSTRAINT `fk_tb_pengurus_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
