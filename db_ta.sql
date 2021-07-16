-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 09:44 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(3) NOT NULL,
  `id_pengajuan` int(3) NOT NULL,
  `tanggal_bimbingan` date NOT NULL,
  `judul_bimbingan` varchar(50) NOT NULL,
  `deskripsi_bimbingan` varchar(100) DEFAULT NULL,
  `berkas_bimbingan` varchar(100) NOT NULL,
  `catatan_bimbingan` text NOT NULL,
  `status_bimbingan` enum('disetujui','belum di setujui','ditolak') NOT NULL DEFAULT 'belum di setujui'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan_ta`
--

CREATE TABLE `bimbingan_ta` (
  `id_bimbingan_ta` int(3) NOT NULL,
  `id_seminar` int(3) NOT NULL,
  `tanggal_bimbingan_ta` date NOT NULL,
  `judul_final_ta` varchar(50) NOT NULL,
  `berkas_bimbingan_ta` varchar(100) NOT NULL,
  `catatan_bimbingan_ta` text NOT NULL,
  `status_bimbingan_ta` enum('disetujui','belum di setujui','ditolak') NOT NULL DEFAULT 'belum di setujui'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_akademik`
--

CREATE TABLE `data_akademik` (
  `id_dataakademik` int(3) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'nonaktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_akademik`
--

INSERT INTO `data_akademik` (`id_dataakademik`, `tahun_akademik`, `tanggal_mulai`, `tanggal_akhir`, `semester`, `status`) VALUES
(1, '2020/2021', '2021-01-01', '2021-08-31', 'ganjil', 'aktif'),
(2, '2019/2020', '2020-08-01', '2020-12-31', 'genap', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn_dosen` varchar(40) DEFAULT NULL,
  `nama_dosen` varchar(40) DEFAULT NULL,
  `notelp` varchar(225) DEFAULT NULL,
  `jkdosen` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `foto_dosen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn_dosen`, `nama_dosen`, `notelp`, `jkdosen`, `email`, `foto_dosen`) VALUES
(1, 'dosen', 'dosen', NULL, NULL, NULL, 'default.png'),
(3, '212', 'pak edy', NULL, NULL, NULL, 'default.png'),
(7, 'sasassa', ' saaassas', NULL, NULL, NULL, 'default.png'),
(8, 'hariono', ' hariono', NULL, NULL, NULL, 'default.png'),
(9, '200000001', ' dosen azza satu', '089897896895', 'Laki laki', 'azzasatu@gmail.com', 'default.png'),
(10, '2000001', ' dosen azza dua', '089688799566', 'Laki', 'azzakun@gmail.com', 'default.png'),
(11, '20000003', ' dosen azza tiga', '089688799569', 'Laki', 'azzz@rocketmail.com', 'default.png'),
(12, '2000004', ' dosen azza empat', '089688799564', 'L', 'azzasa@gamil.com', 'default.png'),
(13, '2000005', ' dosen azza lima', NULL, NULL, NULL, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pembimbing`
--

CREATE TABLE `dosen_pembimbing` (
  `id_dosenpembimbing` int(3) NOT NULL,
  `id_dosenta` int(3) NOT NULL,
  `role_pembimbing` enum('dosen pembimbing I','dosen pembimbing II') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_pembimbing`
--

INSERT INTO `dosen_pembimbing` (`id_dosenpembimbing`, `id_dosenta`, `role_pembimbing`) VALUES
(5, 3, 'dosen pembimbing I'),
(6, 14, 'dosen pembimbing I'),
(8, 15, 'dosen pembimbing II');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_penguji`
--

CREATE TABLE `dosen_penguji` (
  `id_dosenpenguji` int(3) NOT NULL,
  `id_dosenta` int(3) NOT NULL,
  `role_penguji` enum('dosen penguji 1','dosen penguji 2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_penguji`
--

INSERT INTO `dosen_penguji` (`id_dosenpenguji`, `id_dosenta`, `role_penguji`) VALUES
(4, 3, 'dosen penguji 2');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_tugasakhir`
--

CREATE TABLE `dosen_tugasakhir` (
  `id_dosenta` int(3) NOT NULL,
  `id_dosen` int(3) NOT NULL,
  `id_dataakademik` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_tugasakhir`
--

INSERT INTO `dosen_tugasakhir` (`id_dosenta`, `id_dosen`, `id_dataakademik`) VALUES
(3, 3, 1),
(8, 7, 1),
(9, 8, 1),
(14, 9, 1),
(15, 10, 1),
(16, 11, 1),
(17, 12, 1),
(18, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leveling_dosen`
--

CREATE TABLE `leveling_dosen` (
  `id_level` int(4) NOT NULL,
  `id_dosenta` int(4) DEFAULT NULL,
  `id_user` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leveling_dosen`
--

INSERT INTO `leveling_dosen` (`id_level`, `id_dosenta`, `id_user`) VALUES
(1, 3, 5),
(7, 9, 16),
(8, 14, 17),
(9, 15, 18),
(11, 17, 20),
(12, 18, 21);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nim_mhs` int(255) DEFAULT NULL,
  `nama_mhs` varchar(255) DEFAULT NULL,
  `tgllhr_mhs` date DEFAULT NULL,
  `tplhr_mhs` varchar(255) DEFAULT NULL,
  `jk_mhs` varchar(255) DEFAULT NULL,
  `email_mhs` varchar(255) DEFAULT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `id_dataakademik` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `id_user`, `nim_mhs`, `nama_mhs`, `tgllhr_mhs`, `tplhr_mhs`, `jk_mhs`, `email_mhs`, `handphone`, `id_dataakademik`) VALUES
(1, 1, 2018420017, ' Azzasafah', '2001-08-31', 'Jombang', 'Laki-laki', 'azza1@gmail.com', '0823342034324', 1),
(2, 9, 2018420018, 'Hana', '2000-04-04', 'Jombang', 'Perempuan', 'Hana@gmail.com', '0823347868', 1),
(3, NULL, 2018420019, 'olivia', '2021-05-04', 'Surabaya', 'Perempuan', 'olivia@gmail.com', '0823342081414', 1),
(4, NULL, 2018420020, 'mori', '2001-08-31', 'Jombang', 'Perempuan', 'mori@gmail.com', '0823342081414', 1),
(6, NULL, 2018420089, 'Ouka Otori', '2021-05-22', 'osaka', 'Perempuan', 'Ouka@gmail.com', '084204824', 1),
(8, NULL, 2018918918, 'asd', '2021-05-26', 'asd', 'Laki-laki', 'asd@gmail.com', 'as', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_judul`
--

CREATE TABLE `pengajuan_judul` (
  `id_pengajuan` int(3) NOT NULL,
  `id_mhs` int(3) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `dosenpembimbing1` int(3) NOT NULL,
  `dosenpembimbing2` int(3) NOT NULL,
  `status_pengajuan` enum('belum di setujui','di setujui','di tolak') NOT NULL DEFAULT 'belum di setujui',
  `deskripsi_judul` varchar(100) DEFAULT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan_sidang`
--

CREATE TABLE `penjadwalan_sidang` (
  `id_jadwal` int(3) NOT NULL,
  `id_bimbingan` int(3) DEFAULT NULL,
  `penguji_1` int(3) DEFAULT NULL,
  `penguji_2` int(3) DEFAULT NULL,
  `berkas_proposal` varchar(100) DEFAULT NULL,
  `acara_sidang` enum('seminar proposal') NOT NULL DEFAULT 'seminar proposal',
  `tanggal_sidang` datetime NOT NULL,
  `tempat_sidang` text NOT NULL,
  `status_penjadwalan_kaprodi` enum('sudah terjadwal','belum terjadwal') NOT NULL DEFAULT 'belum terjadwal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan_sidang_ta`
--

CREATE TABLE `penjadwalan_sidang_ta` (
  `id_jadwal_ta` int(3) NOT NULL,
  `id_bimbingan_ta` int(3) NOT NULL,
  `penguji_1` int(3) DEFAULT NULL,
  `penguji_2` int(3) DEFAULT NULL,
  `acara_sidang_ta` varchar(20) NOT NULL DEFAULT 'sidang tugas akhir',
  `tanggal_sidang_ta` date NOT NULL,
  `tempat_sidang_ta` varchar(50) NOT NULL,
  `status_penjadwalan_kaprodi_ta` enum('sudah terjadwal','belum terjadwal') NOT NULL DEFAULT 'belum terjadwal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposal`
--

CREATE TABLE `seminar_proposal` (
  `id_seminar` int(3) NOT NULL,
  `id_jadwal` int(3) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('lanjut','disetujui dengan revisi','mengulang') NOT NULL,
  `nilai_penguji_1` int(11) DEFAULT NULL,
  `nilai_penguji_2` int(11) DEFAULT NULL,
  `nilai_pembimbing_1` int(11) DEFAULT NULL,
  `nilai_pembimbing_2` int(11) DEFAULT NULL,
  `catatan_penguji_1` text DEFAULT NULL,
  `catatan_penguji_2` text DEFAULT NULL,
  `catatan_pembimbing_1` text DEFAULT NULL,
  `catatan_pembimbing_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sidang_tugasakhir`
--

CREATE TABLE `sidang_tugasakhir` (
  `id_sidangta` int(3) NOT NULL,
  `id_jadwal_ta` int(3) DEFAULT NULL,
  `nilai_ta` varchar(3) NOT NULL,
  `catatan_ta` text NOT NULL,
  `status_ta` enum('lulus','lulus dengan revisi','tidak lulus') NOT NULL,
  `nilai_penguji_1_ta` int(3) DEFAULT NULL,
  `nilai_penguji_2_ta` int(3) DEFAULT NULL,
  `nilai_pembimbing_1_ta` int(3) DEFAULT NULL,
  `nilai_pembimbing_2_ta` int(3) DEFAULT NULL,
  `catatan_penguji_1_ta` text DEFAULT NULL,
  `catatan_penguji_2_ta` text DEFAULT NULL,
  `catatan_pembimbing_1_ta` text DEFAULT NULL,
  `catatan_pembimbing_2_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` enum('1','2','3','4','5','6') DEFAULT NULL COMMENT '1:admin,2:dosen pembimbing,3:mahasiswa,4:dosen_penguji,5: Kaprodi,6:Terblokir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'as', 'as', '3'),
(3, 'dosenpenguji', 'penguji', '4'),
(4, 'kaprodi', 'kaprodi', '5'),
(5, 'admin', 'admin', '1'),
(6, 'aku', 'aku', '6'),
(9, 'mahasiswa', 'mahasiswa', '3'),
(10, 'sucipto', 'sucipto', '2'),
(11, 'admin2', 'admin2', '1'),
(16, 'hariono', 'hariono', '4'),
(17, 'dosenazzasatu', 'dosenazzasatu', '2'),
(18, 'dosenazzadua', 'dosenazzadua', '2'),
(20, 'dosen azza empat', 'dosenazzaempat', '2'),
(21, 'dosen azza lima', 'dosenazzalima', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `bimbingan_ta`
--
ALTER TABLE `bimbingan_ta`
  ADD PRIMARY KEY (`id_bimbingan_ta`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- Indexes for table `data_akademik`
--
ALTER TABLE `data_akademik`
  ADD PRIMARY KEY (`id_dataakademik`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  ADD PRIMARY KEY (`id_dosenpembimbing`),
  ADD KEY `id_dosenta` (`id_dosenta`);

--
-- Indexes for table `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  ADD PRIMARY KEY (`id_dosenpenguji`),
  ADD KEY `id_dosenta` (`id_dosenta`);

--
-- Indexes for table `dosen_tugasakhir`
--
ALTER TABLE `dosen_tugasakhir`
  ADD PRIMARY KEY (`id_dosenta`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_dataakademik` (`id_dataakademik`);

--
-- Indexes for table `leveling_dosen`
--
ALTER TABLE `leveling_dosen`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `id_dosenta` (`id_dosenta`),
  ADD KEY `is_user` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_dataakademik` (`id_dataakademik`);

--
-- Indexes for table `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `dosenpembimbing1` (`dosenpembimbing1`),
  ADD KEY `dosenpembimbing2` (`dosenpembimbing2`),
  ADD KEY `dosenpembimbing1_2` (`dosenpembimbing1`);

--
-- Indexes for table `penjadwalan_sidang`
--
ALTER TABLE `penjadwalan_sidang`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_bimbingan` (`id_bimbingan`),
  ADD KEY `id_penguji` (`penguji_1`),
  ADD KEY `penguji_2` (`penguji_2`);

--
-- Indexes for table `penjadwalan_sidang_ta`
--
ALTER TABLE `penjadwalan_sidang_ta`
  ADD PRIMARY KEY (`id_jadwal_ta`),
  ADD KEY `id_bimbingan_ta` (`id_bimbingan_ta`),
  ADD KEY `penguji_1` (`penguji_1`),
  ADD KEY `penguji_2` (`penguji_2`),
  ADD KEY `id_dosen_penguji_1` (`penguji_1`),
  ADD KEY `penguji_1_2` (`penguji_1`);

--
-- Indexes for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD PRIMARY KEY (`id_seminar`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `sidang_tugasakhir`
--
ALTER TABLE `sidang_tugasakhir`
  ADD PRIMARY KEY (`id_sidangta`),
  ADD KEY `id_jadwal` (`id_jadwal_ta`),
  ADD KEY `id_jadwal_ta` (`id_jadwal_ta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bimbingan_ta`
--
ALTER TABLE `bimbingan_ta`
  MODIFY `id_bimbingan_ta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_akademik`
--
ALTER TABLE `data_akademik`
  MODIFY `id_dataakademik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  MODIFY `id_dosenpembimbing` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  MODIFY `id_dosenpenguji` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dosen_tugasakhir`
--
ALTER TABLE `dosen_tugasakhir`
  MODIFY `id_dosenta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `leveling_dosen`
--
ALTER TABLE `leveling_dosen`
  MODIFY `id_level` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id_pengajuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjadwalan_sidang`
--
ALTER TABLE `penjadwalan_sidang`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penjadwalan_sidang_ta`
--
ALTER TABLE `penjadwalan_sidang_ta`
  MODIFY `id_jadwal_ta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  MODIFY `id_seminar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sidang_tugasakhir`
--
ALTER TABLE `sidang_tugasakhir`
  MODIFY `id_sidangta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `bimbingan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_judul` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bimbingan_ta`
--
ALTER TABLE `bimbingan_ta`
  ADD CONSTRAINT `bimbingan_ta_ibfk_1` FOREIGN KEY (`id_seminar`) REFERENCES `seminar_proposal` (`id_seminar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  ADD CONSTRAINT `dosen_pembimbing_ibfk_1` FOREIGN KEY (`id_dosenta`) REFERENCES `dosen_tugasakhir` (`id_dosenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  ADD CONSTRAINT `dosen_penguji_ibfk_1` FOREIGN KEY (`id_dosenta`) REFERENCES `dosen_tugasakhir` (`id_dosenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen_tugasakhir`
--
ALTER TABLE `dosen_tugasakhir`
  ADD CONSTRAINT `dosen_tugasakhir_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_tugasakhir_ibfk_2` FOREIGN KEY (`id_dataakademik`) REFERENCES `data_akademik` (`id_dataakademik`);

--
-- Constraints for table `leveling_dosen`
--
ALTER TABLE `leveling_dosen`
  ADD CONSTRAINT `leveling_dosen_ibfk_1` FOREIGN KEY (`id_dosenta`) REFERENCES `dosen_tugasakhir` (`id_dosenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leveling_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_dataakademik`) REFERENCES `data_akademik` (`id_dataakademik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  ADD CONSTRAINT `pengajuan_judul_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_judul_ibfk_2` FOREIGN KEY (`dosenpembimbing1`) REFERENCES `dosen_pembimbing` (`id_dosenpembimbing`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_judul_ibfk_3` FOREIGN KEY (`dosenpembimbing2`) REFERENCES `dosen_pembimbing` (`id_dosenpembimbing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjadwalan_sidang`
--
ALTER TABLE `penjadwalan_sidang`
  ADD CONSTRAINT `penjadwalan_sidang_ibfk_1` FOREIGN KEY (`id_bimbingan`) REFERENCES `bimbingan` (`id_bimbingan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_sidang_ibfk_2` FOREIGN KEY (`penguji_1`) REFERENCES `dosen_penguji` (`id_dosenpenguji`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_sidang_ibfk_3` FOREIGN KEY (`penguji_2`) REFERENCES `dosen_penguji` (`id_dosenpenguji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjadwalan_sidang_ta`
--
ALTER TABLE `penjadwalan_sidang_ta`
  ADD CONSTRAINT `penjadwalan_sidang_ta_ibfk_1` FOREIGN KEY (`id_bimbingan_ta`) REFERENCES `bimbingan_ta` (`id_bimbingan_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_sidang_ta_ibfk_2` FOREIGN KEY (`penguji_1`) REFERENCES `dosen_penguji` (`id_dosenpenguji`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_sidang_ta_ibfk_3` FOREIGN KEY (`penguji_2`) REFERENCES `dosen_penguji` (`id_dosenpenguji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD CONSTRAINT `seminar_proposal_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `penjadwalan_sidang` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sidang_tugasakhir`
--
ALTER TABLE `sidang_tugasakhir`
  ADD CONSTRAINT `sidang_tugasakhir_ibfk_1` FOREIGN KEY (`id_jadwal_ta`) REFERENCES `penjadwalan_sidang_ta` (`id_jadwal_ta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
