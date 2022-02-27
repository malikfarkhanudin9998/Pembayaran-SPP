-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 09:55 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
('Ad001', 'Malik', 'mal', '123', 'super_admin'),
('Ad002', 'Tejo', 'prakoso', '123', 'admin'),
('Ad003', 'Udin', 'udin', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('E1', 'Elektronika 1'),
('E2', 'Elektronika 2'),
('E3', 'Elektronika 3'),
('IL1', 'Instrumentasi Logam 1'),
('IL2', 'Instrumentasi Logam 2'),
('K1', 'Kimia 1'),
('K2', 'Kimia 2'),
('K3', 'Kimia 3'),
('L1', 'Las 1'),
('L2', 'Las 2'),
('RPL1', 'Rekayasa Perangkat Lunak 1'),
('RPL2', 'Rekayasa Perangkat Lunak 2'),
('RPL3', 'Rekayasa Perangkat Lunak 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(30) NOT NULL,
  `nis_siswa` varchar(10) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `kelas_siswa` varchar(10) NOT NULL,
  `id_jurusan` varchar(30) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `spp_bulan` int(20) NOT NULL,
  `total_tagihan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis_siswa`, `nama_siswa`, `kelas_siswa`, `id_jurusan`, `tahun_ajaran`, `spp_bulan`, `total_tagihan`) VALUES
(1, '101704985', 'ADAMMA FERDY HARYAWIENATA YAA', '11', 'E1', '2019/2020', 200000, 4000000),
(2, '101704986', 'AGUNG FIRMANSYAH', '10', 'E1', '2019/2021', 200000, 2400000),
(3, '101704987', 'AHMAD ERIYANTO ADMAJA', '10', 'E1', '2019/2022', 200000, 2400000),
(4, '101704988', 'AKHMAD ZAIROFI', '10', 'E1', '2019/2023', 200000, 2400000),
(5, '101704989', 'ANDRE RIZKI FAUZAN', '10', 'E1', '2019/2024', 200000, 2400000),
(6, '101704990', 'ASEP GUMELAR', '10', 'E1', '2019/2025', 200000, 2400000),
(7, '101704991', 'BELLA ANGZELLINA SEFTIANI', '10', 'E1', '2019/2026', 200000, 2400000),
(8, '101704992', 'DAVID FIRDAUS', '10', 'E1', '2019/2027', 200000, 2400000),
(9, '101704993', 'DEJI SAPUTRA', '10', 'E1', '2019/2028', 200000, 2400000),
(10, '101704994', 'DELIYANA PUTRI', '10', 'E1', '2019/2029', 200000, 2400000),
(11, '101704995', 'DWY MAULANA SAKI', '10', 'E1', '2019/2030', 200000, 2400000),
(12, '101704996', 'DZIKRI MUHAMAD FALAH', '10', 'E1', '2019/2031', 200000, 2400000),
(13, '101704997', 'EGAM MUHAMMAD BAKTIAR', '10', 'E1', '2019/2032', 200000, 2400000),
(14, '101704998', 'ENDRA WAHYUDI', '10', 'E1', '2019/2033', 200000, 2400000),
(15, '101704999', 'ESA NUR HAKAM KUSNADI', '10', 'E1', '2019/2034', 200000, 2400000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah_bulan` int(10) NOT NULL,
  `bulan_transaksi` varchar(30) NOT NULL,
  `nis_siswa` varchar(10) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `kelas_siswa` varchar(10) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `spp_bulan` int(30) NOT NULL,
  `total_tagihan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `tgl_transaksi`, `jumlah_bulan`, `bulan_transaksi`, `nis_siswa`, `nama_siswa`, `kelas_siswa`, `nama_jurusan`, `tahun_ajaran`, `spp_bulan`, `total_tagihan`) VALUES
('Tr_001', '2019-09-25', 2, 'September, Oktober', '1', 'Alip', '10', 'Elektronika 1', '2019/2020', 200000, 2000000),
('Tr_002', '2019-10-08', 1, 'Oktober', '2', 'Atama', '10', 'Elektronika 3', '2019/2020', 200000, 2200000),
('Tr_003', '2019-10-21', 2, 'Oktober, November', '101704985', 'ADAMMA FERDY HARYAWIENATA', '11', 'Elektronika 1', '2020/2021', 200000, 4400000),
('Tr_004', '2019-10-21', 1, 'Desember', '101704985', 'ADAMMA FERDY HARYAWIENATA YAA', '11', 'Elektronika 1', '2020/2021', 200000, 4200000),
('Tr_005', '2019-10-24', 1, 'Oktober', '101704985', 'ADAMMA FERDY HARYAWIENATA YAA', '11', 'Elektronika 1', '2019/2020', 200000, 4000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis_siswa` (`nis_siswa`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
