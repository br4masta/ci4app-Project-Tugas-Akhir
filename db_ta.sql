-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 08:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nidn_dosen` varchar(40) DEFAULT NULL,
  `nama_dosen` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_user`, `nidn_dosen`, `nama_dosen`) VALUES
(1, 2, 'dosen', 'dosen');

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
  `handphone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `id_user`, `nim_mhs`, `nama_mhs`, `tgllhr_mhs`, `tplhr_mhs`, `jk_mhs`, `email_mhs`, `handphone`) VALUES
(1, 1, 2018420017, ' Azzasafah', '2001-08-31', 'Jombang', 'Laki-laki', 'azza1@gmail.com', '0823342034324'),
(2, NULL, 2018420018, 'Hana', '2000-04-04', 'Jombang', 'Perempuan', 'Hana@gmail.com', '0823347868'),
(3, NULL, 2018420019, 'olivia', '2021-05-04', 'Surabaya', 'Perempuan', 'olivia@gmail.com', '0823342081414'),
(4, NULL, 2018420020, 'mori', '2001-08-31', 'Jombang', 'Perempuan', 'mori@gmail.com', '0823342081414'),
(6, NULL, 2018420089, 'Ouka Otori', '2021-05-22', 'osaka', 'Perempuan', 'Ouka@gmail.com', '084204824'),
(8, NULL, 2018918918, 'asd', '2021-05-26', 'asd', 'Laki-laki', 'asd@gmail.com', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` int(1) DEFAULT NULL COMMENT '1:admin,2:dosen,3:mahasiswa,4:dosen_penguji,5: Kaprodi,6:Terblokir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'as', 'as', 3),
(2, 'dosen', 'dosen', 2),
(3, 'dosenpenguji', 'penguji', 4),
(4, 'kaprodi', 'kaprodi', 5),
(5, 'admin', 'admin', 1),
(6, 'aku', 'aku', 6),
(7, 'asd', 'ads', 3),
(8, 'qwe', 'qwe', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
