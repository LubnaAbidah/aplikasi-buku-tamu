-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 04:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas_web`
--

CREATE TABLE `identitas_web` (
  `id_identitas` int(11) NOT NULL,
  `nm_website` varchar(100) NOT NULL,
  `nm_instansi` varchar(100) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `fb` varchar(30) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `set_intval` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_web`
--

INSERT INTO `identitas_web` (`id_identitas`, `nm_website`, `nm_instansi`, `alamat_instansi`, `kode_pos`, `telepon`, `email`, `url`, `fb`, `twitter`, `instagram`, `set_intval`) VALUES
(1, 'Web Buku Tamu', 'BBPOM Bandar Lampung', '<p>Jl. Dr. Susilo No. 105, Pahoman, Enggal, Sumur Putri, Tlk. Betung Utara, Kota Bandar Lampung, Lampung</p>\n/\n/', 35288, '(0721)252212', 'bbpomlampung@bpomri.go.id', 'BBPOM Lampung', 'BBPOM Bandar Lampung', '@BPOMLampung', 'BPOMLampung', 12);

-- --------------------------------------------------------

--
-- Table structure for table `profil_web`
--

CREATE TABLE `profil_web` (
  `id_profil` int(11) NOT NULL,
  `isi_profil` text NOT NULL,
  `md_dt_profil` date NOT NULL,
  `md_tm_profil` time NOT NULL,
  `credit_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_web`
--

INSERT INTO `profil_web` (`id_profil`, `isi_profil`, `md_dt_profil`, `md_tm_profil`, `credit_by`) VALUES
(1, '<p>Aplikasi Web Buku Tamu ini dibuat untuk mempermudah pelayanan register tamu BBPOM yang datang baik untuk keperluan berkunjung atau yang lainnya. Membuat data tamu tersimpan lebih terstruktur, memudahkan pencarian, backup data dan pengarsipan data.</p>\n/\n/', '2019-05-19', '20:27:14', 'Lubna Abidah | 19 Mei 2019');

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`username`, `password`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `tanggal_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama` varchar(100) NOT NULL,
  `kabupaten` text NOT NULL,
  `instansi` text NOT NULL,
  `alamat` text NOT NULL,
  `keperluan` text NOT NULL,
  `yang_ditemui` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `tanggal_waktu`, `nama`, `kabupaten`, `instansi`, `alamat`, `keperluan`, `yang_ditemui`, `no_telp`) VALUES
(6, '2019-05-22 14:52:09', 'Lubna Abidah', 'Lampung Barat', 'PT. Adil', 'Jl. Manggis no 20', 'Mengecek Makanan', 'Bu Meli', '08675554334');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas_web`
--
ALTER TABLE `identitas_web`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `profil_web`
--
ALTER TABLE `profil_web`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identitas_web`
--
ALTER TABLE `identitas_web`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil_web`
--
ALTER TABLE `profil_web`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
