-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 06:18 PM
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
  `catatan_bimbingan_pembimbing1` text NOT NULL,
  `status_bimbingan_pembimbing1` enum('lanjut bimbingan','proses','revisi','lanjut pengajuan seminar') NOT NULL DEFAULT 'proses',
  `catatan_bimbingan_pembimbing2` text NOT NULL,
  `status_bimbingan_pembimbing2` enum('lanjut bimbingan','proses','revisi','lanjut pengajuan seminar') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_pengajuan`, `tanggal_bimbingan`, `judul_bimbingan`, `deskripsi_bimbingan`, `berkas_bimbingan`, `catatan_bimbingan_pembimbing1`, `status_bimbingan_pembimbing1`, `catatan_bimbingan_pembimbing2`, `status_bimbingan_pembimbing2`) VALUES
(1, 5, '2021-06-01', 'bab 1', 'Deskripsi Bimbingan', 'bab1.pdf', 'perbaikan untuk latarblekang masalah', 'revisi', 'sudah cukup bagus', 'lanjut bimbingan'),
(2, 5, '2021-06-30', 'bab 2', 'Deskripsi Bimbingan', 'update bab2.pdf', '-', 'proses', '', 'proses'),
(3, 6, '2021-06-30', 'bab 1-3', 'Deskripsi Bimbingan', 'sistem infomasi rumah sakit.pdf', 'sudah sempurna', 'lanjut pengajuan seminar', 'silahkan mengajukan pengajuan seminar mas!', 'lanjut pengajuan seminar'),
(6, 5, '0000-00-00', '132', '123213', '1625401945_6cc179d3df4fe5676ce1.pdf', '', 'proses', '', 'proses'),
(7, 5, '0000-00-00', 'wqeqw', 'qweqwe', '1625401972_885d2dda302740e9474e.pdf', '', 'proses', '', 'proses'),
(8, 5, '0000-00-00', 'asd', 'asd', '1625463574_a6a163628ae6aaa6e73b.pdf', '', 'proses', '', 'proses'),
(9, 5, '0000-00-00', '213', '123', '1625463588_5d96f80f62c5db231de9.pdf', '', 'proses', '', 'proses'),
(10, 5, '2021-07-13', 'asd', 'asd', 'asd', 'asd', 'proses', '', 'proses'),
(11, 5, '2021-07-21', 'asd', 'asd', 'sad', 'asd', 'proses', '', 'proses'),
(12, 7, '0000-00-00', '12', '12', '1625463735_7eebe223a1783046f048.pdf', 'lanjut\r\n', 'lanjut bimbingan', '', 'lanjut bimbingan'),
(13, 7, '0000-00-00', 'asd222', 'asd22', '1625465137_7b3e6dbc6040512df2ba.pdf', '', 'proses', '', 'lanjut bimbingan'),
(14, 7, '0000-00-00', '222', '3131313', '1625465194_2cd4f88317d1f6e1afff.pdf', '', 'proses', '', 'proses'),
(15, 7, '0000-00-00', 'qweqrq', 'qwrqr', '1625466763_0b73cb88d6413f1a2e49.pdf', '', 'proses', '', 'proses'),
(16, 7, '0000-00-00', '23www', '123www', '1625467327_d6fffe11465a8778f0fe.pdf', '', 'proses', '', 'proses'),
(17, 7, '0000-00-00', '22', '222', '1625467394_fa6db7308ede1e9aa456.pdf', '', 'proses', '', 'proses'),
(18, 7, '0000-00-00', 'ww', 'www', '1625468665_1d5ecfcd11b705a8c7fa.pdf', '', 'proses', '', 'proses'),
(19, 6, '2021-07-06', 'asd', 'asd', 'asd', 'asd', 'proses', '', 'proses'),
(20, 7, '0000-00-00', '45', '45', '1625567063_4c5d2a01de478addcf04.pdf', '', 'proses', '', 'lanjut bimbingan'),
(21, 5, '0000-00-00', '2135654656', 'qeqweq', '1626009131_58516efbde1cd20a076f.pdf', '', 'proses', '', 'proses'),
(22, 9, '0000-00-00', 'bimbingan 1: pembuatan konsep sistem.', 'pembuatan konsep alur sistem dan pembuatan alur cdm.', '1630400506_cf84e9f7bf6d2e5b40b6.pdf', '', 'lanjut pengajuan seminar', '', 'lanjut pengajuan seminar'),
(25, 14, '0000-00-00', 'bimbingan 1: pembuatan konsep sistem', 'membuat konsep game simulasi pesawat sederhana', '1635118992_81f692d9c907c6fedfa7.pdf', '', 'lanjut pengajuan seminar', '', 'lanjut pengajuan seminar'),
(26, 15, '0000-00-00', 'bimbingan 1: pembuatan konsep sistem skripsi.', 'bimbingan 1: pembuatan konsep sistem.', '1635133606_d15f147b5b7eac74e20b.pdf', 'bla bla bbla', 'lanjut bimbingan', '', 'lanjut bimbingan'),
(27, 15, '0000-00-00', 'bimbingan II : pengajuan sidang ta.', 'bimbingan II : pengajuan sidang ta.', '1635133676_c9235a2262ef24e39aab.pdf', 'lanjut mas.\r\n', 'lanjut pengajuan seminar', '', 'lanjut pengajuan seminar'),
(28, 19, '0000-00-00', 'bimbingan 1: pembuatan konsep sistem data mining.', 'bimbingan 1 pembuatan konsep sistem', '1635307553_d6349b24067a952b5654.pdf', '', 'lanjut pengajuan seminar', '', 'lanjut pengajuan seminar');

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
  `catatan_bimbingan_pembimbing1_ta` text NOT NULL,
  `status_bimbingan_pembimbing1_ta` enum('lanjut bimbingan','proses','revisi','lanjut pengajuan sidang ta') NOT NULL DEFAULT 'proses',
  `catatan_bimbingan_pembimbing2_ta` text NOT NULL,
  `status_bimbingan_pembimbing2_ta` enum('lanjut bimbingan','proses','revisi','lanjut pengajuan sidang ta') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimbingan_ta`
--

INSERT INTO `bimbingan_ta` (`id_bimbingan_ta`, `id_seminar`, `tanggal_bimbingan_ta`, `judul_final_ta`, `berkas_bimbingan_ta`, `catatan_bimbingan_pembimbing1_ta`, `status_bimbingan_pembimbing1_ta`, `catatan_bimbingan_pembimbing2_ta`, `status_bimbingan_pembimbing2_ta`) VALUES
(6, 7, '2021-09-09', '', '', '', 'lanjut pengajuan sidang ta', '', 'lanjut pengajuan sidang ta'),
(7, 9, '0000-00-00', 'bimbingan 1', '1631213281_23694a4bac72551b36a4.pdf', 'baik\r\n', 'lanjut pengajuan sidang ta', '', 'lanjut pengajuan sidang ta'),
(8, 13, '0000-00-00', 'bimbingan 1: penerapan konsep game simulasi pesawa', '1635128954_1fb2a75bb6681f5519f9.pdf', '', 'lanjut pengajuan sidang ta', '', 'lanjut pengajuan sidang ta'),
(9, 14, '0000-00-00', 'bimbingan ta 1: pembuatan model', '1635215392_63ab67b275b00c8cc15f.pdf', 'lanjut mas.\r\n', 'lanjut pengajuan sidang ta', '', 'lanjut pengajuan sidang ta');

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
(1, '2020/2021', '2021-01-01', '2021-08-31', 'ganjil', 'nonaktif'),
(2, '2019/2020', '2020-08-01', '2020-12-31', 'genap', 'nonaktif'),
(5, '2021/2022', '2021-09-01', '2021-10-01', 'ganjil', 'aktif');

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
  `foto_dosen` text NOT NULL DEFAULT 'default.png',
  `program_studi_dosen` varchar(250) NOT NULL,
  `fakultas_dosen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn_dosen`, `nama_dosen`, `notelp`, `jkdosen`, `email`, `foto_dosen`, `program_studi_dosen`, `fakultas_dosen`) VALUES
(1, 'dosen', 'dosen', '', 'Laki-laki', '', 'default.png', '', ''),
(2, '520007689', 'ir.sucipto s.it', '0895397711677', NULL, 'akiaauakuau@gmail.com', 'default.png', '', ''),
(3, '212', 'Da vinci', '0895397711646', 'Laki-laki', 'robert@gmail.com', 'lukisan-leonardo-da-vinci_1.jpg', 'Teknik Informatika', 'Teknik'),
(4, 'wahyu', ' wahyu', NULL, NULL, NULL, 'default.png', '', ''),
(5, 'wahyudi', ' wahyudi', NULL, NULL, NULL, 'default.png', '', ''),
(7, 'sasassa', ' saaassas', NULL, NULL, NULL, 'default.png', '', ''),
(8, 'hariono', ' hariono', NULL, NULL, NULL, 'default.png', '', ''),
(9, '200000001', ' dosen azza satu', '089897896895', 'Laki laki', 'azzasatu@gmail.com', 'azzz.png', '', ''),
(10, '2000001', ' dosen azza dua', '089688799566', 'Laki', 'azzakun@gmail.com', 'default.png', '', ''),
(11, '20000003', ' dosen azza tiga', '089688799569', 'Laki', 'azzz@rocketmail.com', 'default.png', '', ''),
(12, '2000004', ' dosen azza empat', '089688799564', 'L', 'azzasa@gamil.com', 'default.png', '', ''),
(13, '2000005', ' dosen azza lima', NULL, NULL, NULL, 'default.png', '', ''),
(15, '1234123', ' adit', NULL, NULL, NULL, 'default.png', '', ''),
(16, '1234532', ' Rusdi Tabuti', NULL, NULL, NULL, 'default.png', '', ''),
(17, '122417', 'vino', NULL, NULL, NULL, 'default.png', '', ''),
(18, '243112', ' bu ratna', NULL, NULL, NULL, 'default.png', 'Teknik Sipil', 'Teknik'),
(19, '213446', ' bu cempaka', NULL, NULL, NULL, 'default.png', '', ''),
(20, '2114', ' pak alda', NULL, NULL, NULL, 'default.png', '', ''),
(21, '070707', ' dwi cahyono', NULL, NULL, NULL, 'default.png', '', '');

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
(3, 1, 'dosen pembimbing I'),
(4, 2, 'dosen pembimbing II'),
(5, 3, 'dosen pembimbing I'),
(6, 14, 'dosen pembimbing I'),
(8, 15, 'dosen pembimbing II'),
(11, 21, 'dosen pembimbing II'),
(12, 23, 'dosen pembimbing I'),
(13, 24, 'dosen pembimbing II'),
(14, 25, 'dosen pembimbing II'),
(15, 26, 'dosen pembimbing I');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_penguji`
--

CREATE TABLE `dosen_penguji` (
  `id_dosenpenguji` int(3) NOT NULL,
  `id_dosenta` int(3) NOT NULL,
  `role_penguji` enum('penguji') NOT NULL DEFAULT 'penguji'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_penguji`
--

INSERT INTO `dosen_penguji` (`id_dosenpenguji`, `id_dosenta`, `role_penguji`) VALUES
(2, 1, 'penguji'),
(3, 2, 'penguji'),
(4, 3, 'penguji'),
(5, 20, 'penguji'),
(6, 5, 'penguji'),
(7, 22, 'penguji'),
(8, 23, 'penguji'),
(9, 24, 'penguji'),
(10, 25, 'penguji'),
(11, 26, 'penguji');

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
(1, 2, 1),
(2, 1, 1),
(3, 3, 1),
(4, 2, 2),
(5, 4, 1),
(6, 5, 1),
(8, 7, 1),
(9, 8, 1),
(12, 4, 1),
(13, 5, 1),
(14, 9, 1),
(15, 10, 1),
(16, 11, 1),
(17, 12, 1),
(18, 13, 1),
(20, 15, 1),
(21, 16, 1),
(22, 17, 1),
(23, 18, 5),
(24, 19, 5),
(25, 20, 5),
(26, 21, 5);

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
(2, 2, 4),
(3, 1, 3),
(4, 1, 11),
(5, 6, 13),
(6, 8, 15),
(7, 9, 16),
(8, 14, 17),
(9, 15, 18),
(10, 16, 19),
(11, 17, 20),
(12, 18, 21),
(14, 20, 23),
(15, 3, 24),
(16, 5, 25),
(17, 21, 26),
(18, 22, 27),
(19, 23, 29),
(20, 24, 30),
(21, 24, 31),
(23, 23, 33),
(24, 25, 34),
(25, 25, 35),
(26, 26, 40),
(27, 26, 41);

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
  `id_dataakademik` int(4) DEFAULT NULL,
  `program_studi_mhs` varchar(250) NOT NULL,
  `fakultas_mhs` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `id_user`, `nim_mhs`, `nama_mhs`, `tgllhr_mhs`, `tplhr_mhs`, `jk_mhs`, `email_mhs`, `handphone`, `id_dataakademik`, `program_studi_mhs`, `fakultas_mhs`) VALUES
(1, 1, 2018420017, ' Azzasafah', '2001-08-31', 'Jombang', 'Laki-laki', 'azza1@gmail.com', '0823342034324', 1, '', ''),
(2, 9, 2018420018, 'Hana', '2000-04-04', 'Jombang', 'Perempuan', 'Hana@gmail.com', '0823347868', 1, '', ''),
(3, NULL, 2018420019, 'olivia', '2021-05-04', 'Surabaya', 'Perempuan', 'olivia@gmail.com', '0823342081414', 1, '', ''),
(4, NULL, 2018420020, 'mori', '2001-08-31', 'Jombang', 'Perempuan', 'mori@gmail.com', '0823342081414', 1, '', ''),
(6, NULL, 2018420089, 'Ouka Otori', '2021-05-22', 'osaka', 'Perempuan', 'Ouka@gmail.com', '084204824', 1, '', ''),
(8, NULL, 2018918918, 'asd', '2021-05-26', 'asd', 'Laki-laki', 'asd@gmail.com', 'as', 1, '', ''),
(9, 28, 2018320008, 'aditya hernanda', NULL, NULL, 'Laki-laki', NULL, NULL, 5, 'Teknik Informatika', 'Teknik'),
(10, 36, 2018420076, 'brian aldy bramasta', NULL, NULL, 'Laki-laki', NULL, NULL, 5, 'Teknik Informatika', 'Teknik'),
(11, 37, 2018420007, 'faisal roshadi', NULL, NULL, 'Laki-laki', NULL, NULL, 5, '', ''),
(12, 38, 2018420006, 'andy', NULL, NULL, 'Laki-laki', NULL, NULL, 5, '', ''),
(13, 39, 2019420077, 'carla', NULL, NULL, 'Perempuan', NULL, NULL, 5, '', ''),
(14, 42, 2018420000, 'timmy', NULL, NULL, 'Laki-laki', NULL, NULL, 5, '', '');

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
  `konfirmasi_pembimbing_1` enum('di setujui','belum di setujui','di tolak') NOT NULL DEFAULT 'belum di setujui',
  `konfirmasi_pembimbing_2` enum('di setujui','belum di setujui','di tolak') NOT NULL DEFAULT 'belum di setujui',
  `status_pengajuan` enum('belum di setujui','di setujui','di tolak') NOT NULL DEFAULT 'belum di setujui',
  `deskripsi_judul` varchar(100) DEFAULT NULL,
  `catatan_kaprodi` text NOT NULL,
  `catatan_pembimbing_1` text NOT NULL,
  `catatan_pembimbing_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_judul`
--

INSERT INTO `pengajuan_judul` (`id_pengajuan`, `id_mhs`, `judul`, `deskripsi`, `dosenpembimbing1`, `dosenpembimbing2`, `konfirmasi_pembimbing_1`, `konfirmasi_pembimbing_2`, `status_pengajuan`, `deskripsi_judul`, `catatan_kaprodi`, `catatan_pembimbing_1`, `catatan_pembimbing_2`) VALUES
(5, 1, 'sistem kelayakan terbang', 'pembuatan sistem informasi perihal pengelolaan data secara di gitalisasi untuk proses pemeriksaan rutin pesawat sebelum lepas landas.', 6, 11, 'di setujui', 'di setujui', 'di setujui', NULL, '', '', ''),
(6, 2, 'sitem infomasi rumah sakit', 'pengembangan sistem secara digitalisasi terhadap rumah sakit di sebuah desa', 5, 11, 'di setujui', 'di setujui', 'belum di setujui', NULL, 'sudah bagus', '', ''),
(7, 1, 'judul', 'pengembangan sistem secara digitalisasi terhadap rumah sakit di sebuah desa', 6, 11, 'belum di setujui', 'belum di setujui', 'belum di setujui', '1625457466_bdb67a3301621438a87d.pdf', '', '', ''),
(8, 2, 'sistem pakar pendeteksi gangguan pencernaan', 'sistem pakar yang membantu mendeteksi gangguan pencernaan', 6, 11, 'belum di setujui', 'belum di setujui', 'belum di setujui', '1625713485_0c1889c9b090474a52f5.pdf', '', '', ''),
(9, 10, 'Penerapan metode certainty factor pada kesehatan mental mahasiswa', 'kesehatan mental sama pentingnya dengan kesehatan fisik.', 12, 13, 'di setujui', 'di setujui', 'di setujui', '1630400222_6115090799e8229f7e0d.pdf', '', 'untuk judulnya bisa menggunakan Penerapan metode certainty factor pada sistem Analisa tingkat kesehatan mental mahasiswa', 'silahkan dilanjut'),
(14, 11, 'membuat game simulasi pesawat sederhana ', 'pembuatan game simulasi pesawat sederhana berbasis anroid.', 12, 13, 'di setujui', 'di setujui', 'di setujui', '1635118645_f590f39eb391bff3bcb8.pdf', '', '', ''),
(15, 12, 'sistem skripsi', 'sistem skripsi', 12, 13, 'di setujui', 'di setujui', 'di setujui', '1635133270_7d0c9e1818ff2455629f.pdf', '', '', ''),
(19, 14, 'data mining', 'pembuatan sistem data mining', 12, 13, 'di setujui', 'di setujui', 'di setujui', '1635307316_5d0ebccfe7d895a000d1.pdf', '', '', '');

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
  `tanggal_sidang` date NOT NULL,
  `jam_sidang` time NOT NULL,
  `tempat_sidang` text NOT NULL,
  `status_penjadwalan_kaprodi` enum('sudah terjadwal','belum terjadwal') NOT NULL DEFAULT 'belum terjadwal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjadwalan_sidang`
--

INSERT INTO `penjadwalan_sidang` (`id_jadwal`, `id_bimbingan`, `penguji_1`, `penguji_2`, `berkas_proposal`, `acara_sidang`, `tanggal_sidang`, `jam_sidang`, `tempat_sidang`, `status_penjadwalan_kaprodi`) VALUES
(2, 3, 5, 7, '', 'seminar proposal', '2021-07-17', '00:00:00', '507', 'sudah terjadwal'),
(3, 3, 5, 2, NULL, 'seminar proposal', '2021-07-21', '00:00:00', ' 109', 'belum terjadwal'),
(18, 18, 3, 7, '1625566464_6640333a31172727c404.pdf', 'seminar proposal', '2021-07-14', '00:00:00', '208', 'sudah terjadwal'),
(19, 20, 2, 4, '1625578843_4f74b9f6002463eace93.pdf', 'seminar proposal', '2021-07-30', '00:00:00', ' 909', 'belum terjadwal'),
(20, 20, 3, 2, '1625635936_1d1b43ce2e9feffe8f5e.pdf', 'seminar proposal', '2021-09-18', '11:00:00', ' 505', 'belum terjadwal'),
(21, 22, 8, 9, '1631211240_8ab9f5ae9e50b74dcab3.pdf', 'seminar proposal', '2021-09-10', '09:00:00', ' 501', 'sudah terjadwal'),
(25, 25, 9, 8, '1635119088_59d28958bb4c79becc74.pdf', 'seminar proposal', '2021-11-02', '00:00:00', '508', 'sudah terjadwal'),
(26, 27, 8, 10, '1635133802_e24219aee647038268de.pdf', 'seminar proposal', '2021-11-06', '10:00:00', ' 505', 'sudah terjadwal'),
(27, 28, 11, 10, '1635308058_a8e96e987d074d2f3083.pdf', 'seminar proposal', '2021-10-28', '00:00:00', 'ruang map', 'sudah terjadwal');

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
  `berkas_proposal_ta` text DEFAULT NULL,
  `tanggal_sidang_ta` date NOT NULL,
  `jam_sidang_ta` time NOT NULL,
  `tempat_sidang_ta` varchar(50) NOT NULL,
  `status_penjadwalan_kaprodi_ta` enum('sudah terjadwal','belum terjadwal') NOT NULL DEFAULT 'belum terjadwal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjadwalan_sidang_ta`
--

INSERT INTO `penjadwalan_sidang_ta` (`id_jadwal_ta`, `id_bimbingan_ta`, `penguji_1`, `penguji_2`, `acara_sidang_ta`, `berkas_proposal_ta`, `tanggal_sidang_ta`, `jam_sidang_ta`, `tempat_sidang_ta`, `status_penjadwalan_kaprodi_ta`) VALUES
(3, 6, 5, 7, 'sidang tugas akhir', NULL, '2021-09-16', '00:00:00', 'ruang 301', 'sudah terjadwal'),
(4, 7, 8, 9, 'sidang tugas akhir', '1631215936_ed00795ac6f96b3d0aba.pdf', '2021-09-30', '10:00:00', ' 203', 'sudah terjadwal'),
(5, 8, 10, 8, 'sidang tugas akhir', '1635129056_ed1124afc6fde43beb25.pdf', '2021-11-06', '10:00:00', '    506', 'sudah terjadwal'),
(6, 9, 10, 9, 'sidang tugas akhir', '1635215509_1a61f6db89198104b9eb.pdf', '2021-11-04', '10:00:00', '    506', 'sudah terjadwal');

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

--
-- Dumping data for table `seminar_proposal`
--

INSERT INTO `seminar_proposal` (`id_seminar`, `id_jadwal`, `nilai`, `catatan`, `status`, `nilai_penguji_1`, `nilai_penguji_2`, `nilai_pembimbing_1`, `nilai_pembimbing_2`, `catatan_penguji_1`, `catatan_penguji_2`, `catatan_pembimbing_1`, `catatan_pembimbing_2`) VALUES
(7, 18, '', '', 'lanjut', NULL, 90, 80, 82, NULL, 'sudah bagus', 'bagus', 'baik'),
(8, 2, '', '', 'lanjut', 90, 82, NULL, NULL, 'baik', 'oke', NULL, NULL),
(9, 21, '', '', 'lanjut', 90, 82, 90, 90, '', 'lanjut\r\n', 'lanjut mas', 'lanjut'),
(13, 25, '', '', 'disetujui dengan revisi', 90, 90, 82, 90, 'silahkan di lanjut', 'lanjut.', 'lanjut', ''),
(14, 26, '', '', 'lanjut', 82, 80, 90, 80, '', '', '', ''),
(15, 27, '', '', 'disetujui dengan revisi', 80, NULL, NULL, NULL, 'revisi 1', NULL, NULL, NULL);

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

--
-- Dumping data for table `sidang_tugasakhir`
--

INSERT INTO `sidang_tugasakhir` (`id_sidangta`, `id_jadwal_ta`, `nilai_ta`, `catatan_ta`, `status_ta`, `nilai_penguji_1_ta`, `nilai_penguji_2_ta`, `nilai_pembimbing_1_ta`, `nilai_pembimbing_2_ta`, `catatan_penguji_1_ta`, `catatan_penguji_2_ta`, `catatan_pembimbing_1_ta`, `catatan_pembimbing_2_ta`) VALUES
(6, 3, '', '', 'lulus', 90, 80, 80, 90, 'bagus', 'baik', 'baik', 'bagus'),
(7, 4, '', '', 'lulus', 82, 90, 90, 80, 'lulus', 'lulus', 'lulus', 'lulus'),
(8, 5, '', '', 'lulus', 90, 90, NULL, NULL, '', '', NULL, NULL),
(9, 6, '', '', 'lulus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(2, 'dosen', 'dosen', '2'),
(3, 'dosenpenguji', 'penguji', '4'),
(4, 'kaprodi', 'kaprodi', '5'),
(5, 'admin', 'admin', '1'),
(6, 'aku', 'aku', '6'),
(9, 'mahasiswa', 'mahasiswa', '3'),
(10, 'sucipto', 'sucipto', '2'),
(11, 'admin2', 'admin2', '1'),
(12, 'wahyu', 'wahyu', '1'),
(13, 'wahyudi', 'wahyudi', '1'),
(15, 'sasasaas', 'sasassas', '1'),
(16, 'hariono', 'hariono', '4'),
(17, 'dosenazzasatu', 'dosenazzasatu', '2'),
(18, 'dosenazzadua', 'dosenazzadua', '2'),
(19, 'dosenazzatiga', 'dosenazzatiga', '2'),
(20, 'dosen azza empat', 'dosenazzaempat', '2'),
(21, 'dosen azza lima', 'dosenazzalima', '2'),
(22, NULL, NULL, NULL),
(23, 'adit', 'adit', '4'),
(24, 'pakedypenguji', 'pakedy', '4'),
(25, 'wahyupenguji', 'wahyupenguji', '4'),
(26, 'rusdi', 'rusdi', '2'),
(27, 'vino', 'vino', '4'),
(28, '2018320008', 'adit21', '3'),
(29, 'buratna', 'buratna', '2'),
(30, 'bucempaka', 'bucempaka', '2'),
(31, 'bucempakauji', 'bucempakauji', '4'),
(33, 'buratnauji', 'buratnauji', '4'),
(34, 'alda', 'alda', '2'),
(35, 'aldauji', 'aldauji', '4'),
(36, '2018420076', 'brian', '3'),
(37, '2018420007', 'faisal', '3'),
(38, '2018420006', 'andy', '3'),
(39, '2019420077', 'carla', '3'),
(40, ' dwicahyono', 'dwicahyono', '2'),
(41, 'dwicahyonouji', 'dwicahyonouji', '4'),
(42, '2018420000', 'timmy', '3');

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
  MODIFY `id_bimbingan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bimbingan_ta`
--
ALTER TABLE `bimbingan_ta`
  MODIFY `id_bimbingan_ta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_akademik`
--
ALTER TABLE `data_akademik`
  MODIFY `id_dataakademik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  MODIFY `id_dosenpembimbing` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  MODIFY `id_dosenpenguji` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dosen_tugasakhir`
--
ALTER TABLE `dosen_tugasakhir`
  MODIFY `id_dosenta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `leveling_dosen`
--
ALTER TABLE `leveling_dosen`
  MODIFY `id_level` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id_pengajuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penjadwalan_sidang`
--
ALTER TABLE `penjadwalan_sidang`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `penjadwalan_sidang_ta`
--
ALTER TABLE `penjadwalan_sidang_ta`
  MODIFY `id_jadwal_ta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  MODIFY `id_seminar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sidang_tugasakhir`
--
ALTER TABLE `sidang_tugasakhir`
  MODIFY `id_sidangta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
