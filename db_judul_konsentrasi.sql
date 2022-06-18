-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 04:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_judul_konsentrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nid_dosen` varchar(100) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nid_dosen`, `nama_dosen`, `username`, `password`, `email`) VALUES
(0, '001768', 'Purnomo S, Kom', 'purnomo', '001768', 'purnomo@gmail.com'),
(2, '002123', 'imamkurniawn S.kom', 'imamkurniawan', '002123', 'imamkurniawa@gmail.com'),
(3, '001567', 'Riswandi S.kom', 'riswandi', '001567', 'riswandiandi017@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul`
--

CREATE TABLE `tb_judul` (
  `id_judul` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi_judul` varchar(100) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_judul`
--

INSERT INTO `tb_judul` (`id_judul`, `id_mahasiswa`, `judul`, `deskripsi_judul`, `tanggal_pengajuan`, `status`) VALUES
(1, 3, 'Aplikasi Pemesanan Makanan', 'Untuk mempermudah pemesanan makanan', '2022-06-18', '2'),
(2, 4, 'Aplikasi Penginputan Skripsi', 'mempermudah proses input judul skripsi', '2022-06-23', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Informatika'),
(2, 'Sistem Informasi'),
(6, 'Rekayasa Perangkat Lunak'),
(7, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `kode_kelas` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `pukul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `id_dosen`, `kode_kelas`, `hari`, `pukul`) VALUES
(2, 0, '5-TPAK-A', 'Senin', '09.20-11.00'),
(3, 2, '5-TPAK-B', 'Selasa', '5-TPAK-B'),
(4, 3, '5-TPAK-C', 'Rabu', '13.40-15.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `stb` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `stb`, `id_jurusan`, `id_kelas`, `username`, `email`, `password`) VALUES
(3, 'Trisa', '192001', 1, 2, 'trisa', 'trisa@gmail.com', '192001'),
(4, 'Dewi Putri', '192002', 2, 3, 'dewi', 'dewi@gmail.com', '192002'),
(5, 'Agustina', '192003', 6, 4, 'agustina', 'agustina@gmail.co.id', '192003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_ulang`
--

CREATE TABLE `tb_pengajuan_ulang` (
  `id_pengajuan_ulang` int(11) NOT NULL,
  `id_revisi` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `judul_ulang` varchar(100) NOT NULL,
  `deskripsi_judul_ulang` varchar(100) NOT NULL,
  `tanggal_pengajuan_ulang` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan_ulang`
--

INSERT INTO `tb_pengajuan_ulang` (`id_pengajuan_ulang`, `id_revisi`, `id_mahasiswa`, `judul_ulang`, `deskripsi_judul_ulang`, `tanggal_pengajuan_ulang`, `status`) VALUES
(2, 2, 3, 'Aplikasi penerima bantuan bansos', 'Memberikan informasi ke penerima bantuan', '2022-06-18', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_revisi_judul`
--

CREATE TABLE `tb_revisi_judul` (
  `id_revisi` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `revisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_revisi_judul`
--

INSERT INTO `tb_revisi_judul` (`id_revisi`, `id_judul`, `id_dosen`, `revisi`) VALUES
(2, 1, 2, 'Revisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_judul`
--
ALTER TABLE `tb_judul`
  ADD PRIMARY KEY (`id_judul`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_pengajuan_ulang`
--
ALTER TABLE `tb_pengajuan_ulang`
  ADD PRIMARY KEY (`id_pengajuan_ulang`),
  ADD KEY `id_revisi` (`id_revisi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tb_revisi_judul`
--
ALTER TABLE `tb_revisi_judul`
  ADD PRIMARY KEY (`id_revisi`),
  ADD KEY `id_judul` (`id_judul`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `revisi` (`revisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_judul`
--
ALTER TABLE `tb_judul`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengajuan_ulang`
--
ALTER TABLE `tb_pengajuan_ulang`
  MODIFY `id_pengajuan_ulang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_revisi_judul`
--
ALTER TABLE `tb_revisi_judul`
  MODIFY `id_revisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_judul`
--
ALTER TABLE `tb_judul`
  ADD CONSTRAINT `tb_judul_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`id_dosen`);

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `tb_mahasiswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Constraints for table `tb_pengajuan_ulang`
--
ALTER TABLE `tb_pengajuan_ulang`
  ADD CONSTRAINT `tb_pengajuan_ulang_ibfk_1` FOREIGN KEY (`id_revisi`) REFERENCES `tb_revisi_judul` (`id_revisi`),
  ADD CONSTRAINT `tb_pengajuan_ulang_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tb_revisi_judul`
--
ALTER TABLE `tb_revisi_judul`
  ADD CONSTRAINT `tb_revisi_judul_ibfk_1` FOREIGN KEY (`id_judul`) REFERENCES `tb_judul` (`id_judul`),
  ADD CONSTRAINT `tb_revisi_judul_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
