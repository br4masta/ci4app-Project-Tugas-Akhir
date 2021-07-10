-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2021 pada 08.40
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

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
-- Struktur dari tabel `bimbingan`
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

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_pengajuan`, `tanggal_bimbingan`, `judul_bimbingan`, `deskripsi_bimbingan`, `berkas_bimbingan`, `catatan_bimbingan`, `status_bimbingan`) VALUES
(1, 5, '2021-06-01', 'bab 1', 'Deskripsi Bimbingan', 'bab1.pdf', 'perbaikan untuk latarblekang masalah', 'belum di setujui'),
(2, 5, '2021-06-30', 'bab 2', 'Deskripsi Bimbingan', 'update bab2.pdf', '-', 'belum di setujui'),
(3, 6, '2021-06-30', 'bab 1-3', 'Deskripsi Bimbingan', 'sistem infomasi rumah sakit.pdf', 'sudah sempurna', 'disetujui'),
(6, 5, '0000-00-00', '132', '123213', '1625401945_6cc179d3df4fe5676ce1.pdf', '', 'belum di setujui'),
(7, 5, '0000-00-00', 'wqeqw', 'qweqwe', '1625401972_885d2dda302740e9474e.pdf', '', 'belum di setujui'),
(8, 5, '0000-00-00', 'asd', 'asd', '1625463574_a6a163628ae6aaa6e73b.pdf', '', 'belum di setujui'),
(9, 5, '0000-00-00', '213', '123', '1625463588_5d96f80f62c5db231de9.pdf', '', 'belum di setujui'),
(10, 5, '2021-07-13', 'asd', 'asd', 'asd', 'asd', 'belum di setujui'),
(11, 5, '2021-07-21', 'asd', 'asd', 'sad', 'asd', 'belum di setujui'),
(12, 7, '0000-00-00', '12', '12', '1625463735_7eebe223a1783046f048.pdf', '', 'belum di setujui'),
(13, 7, '0000-00-00', 'asd222', 'asd22', '1625465137_7b3e6dbc6040512df2ba.pdf', '', 'belum di setujui'),
(14, 7, '0000-00-00', '222', '3131313', '1625465194_2cd4f88317d1f6e1afff.pdf', '', 'belum di setujui'),
(15, 7, '0000-00-00', 'qweqrq', 'qwrqr', '1625466763_0b73cb88d6413f1a2e49.pdf', '', 'belum di setujui'),
(16, 7, '0000-00-00', '23www', '123www', '1625467327_d6fffe11465a8778f0fe.pdf', '', 'belum di setujui'),
(17, 7, '0000-00-00', '22', '222', '1625467394_fa6db7308ede1e9aa456.pdf', '', 'belum di setujui'),
(18, 7, '0000-00-00', 'ww', 'www', '1625468665_1d5ecfcd11b705a8c7fa.pdf', '', 'belum di setujui'),
(19, 6, '2021-07-06', 'asd', 'asd', 'asd', 'asd', 'belum di setujui'),
(20, 7, '0000-00-00', '45', '45', '1625567063_4c5d2a01de478addcf04.pdf', '', 'belum di setujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan_ta`
--

CREATE TABLE `bimbingan_ta` (
  `id_bimbingan_ta` int(3) NOT NULL,
  `id_seminar` int(3) NOT NULL,
  `tanggal_bimbingan_ta` date NOT NULL,
  `judul_bimbingan_ta` varchar(50) NOT NULL,
  `berkas_bimbingan_ta` varchar(100) NOT NULL,
  `catatan_bimbingan_ta` text NOT NULL,
  `status_bimbingan_ta` enum('disetujui','belum di setujui','ditolak') NOT NULL DEFAULT 'belum di setujui'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bimbingan_ta`
--

INSERT INTO `bimbingan_ta` (`id_bimbingan_ta`, `id_seminar`, `tanggal_bimbingan_ta`, `judul_bimbingan_ta`, `berkas_bimbingan_ta`, `catatan_bimbingan_ta`, `status_bimbingan_ta`) VALUES
(1, 2, '2021-09-01', 'bab 5', 'bab.pdf', '-', 'belum di setujui'),
(2, 2, '2021-09-07', 'bab 7', 'bab 7.pdf', 'lanjut sidang', 'disetujui'),
(3, 5, '2021-07-15', 'asd', 'asd', 'asd', 'belum di setujui'),
(4, 5, '2021-07-20', 'asdasd', '1625579766_4422f922d4e0bca713dd.pdf', '', 'belum di setujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_akademik`
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
-- Dumping data untuk tabel `data_akademik`
--

INSERT INTO `data_akademik` (`id_dataakademik`, `tahun_akademik`, `tanggal_mulai`, `tanggal_akhir`, `semester`, `status`) VALUES
(1, '2020/2021', '2021-01-01', '2021-08-31', 'ganjil', 'aktif'),
(2, '2019/2020', '2020-08-01', '2020-12-31', 'genap', 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn_dosen` varchar(40) DEFAULT NULL,
  `nama_dosen` varchar(40) DEFAULT NULL,
  `notelp` varchar(225) DEFAULT NULL,
  `jkdosen` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `foto_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn_dosen`, `nama_dosen`, `notelp`, `jkdosen`, `email`, `foto_dosen`) VALUES
(1, 'dosen', 'dosen', NULL, NULL, NULL, 'dosen.jpg'),
(2, '520007689', 'ir.sucipto s.it', NULL, NULL, NULL, 'sucipto.jpg'),
(3, '212', 'pak edy', NULL, NULL, NULL, 'pak edy.jpg'),
(4, 'wahyu', ' wahyu', NULL, NULL, NULL, ''),
(5, 'wahyudi', ' wahyudi', NULL, NULL, NULL, ''),
(7, 'sasassa', ' saaassas', NULL, NULL, NULL, ''),
(8, 'hariono', ' hariono', NULL, NULL, NULL, ''),
(9, '200000001', ' dosen azza satu', '089897896895', 'Laki laki', 'azzasatu@gmail.com', 'azzz.png'),
(10, '2000001', ' dosen azza dua', '089688799566', 'Laki', 'azzakun@gmail.com', ''),
(11, '20000003', ' dosen azza tiga', '089688799569', 'Laki', 'azzz@rocketmail.com', ''),
(12, '2000004', ' dosen azza empat', '089688799564', 'L', 'azzasa@gamil.com', ''),
(13, '2000005', ' dosen azza lima', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_pembimbing`
--

CREATE TABLE `dosen_pembimbing` (
  `id_dosenpembimbing` int(3) NOT NULL,
  `id_dosenta` int(3) NOT NULL,
  `role_pembimbing` enum('dosen pembimbing I','dosen pembimbing II') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen_pembimbing`
--

INSERT INTO `dosen_pembimbing` (`id_dosenpembimbing`, `id_dosenta`, `role_pembimbing`) VALUES
(3, 1, 'dosen pembimbing I'),
(4, 2, 'dosen pembimbing II'),
(5, 3, 'dosen pembimbing I'),
(6, 14, 'dosen pembimbing I'),
(8, 15, 'dosen pembimbing II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_penguji`
--

CREATE TABLE `dosen_penguji` (
  `id_dosenpenguji` int(3) NOT NULL,
  `id_dosenta` int(3) NOT NULL,
  `role_penguji` enum('dosen penguji 1','dosen penguji 2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen_penguji`
--

INSERT INTO `dosen_penguji` (`id_dosenpenguji`, `id_dosenta`, `role_penguji`) VALUES
(2, 1, 'dosen penguji 2'),
(3, 2, 'dosen penguji 1'),
(4, 3, 'dosen penguji 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_tugasakhir`
--

CREATE TABLE `dosen_tugasakhir` (
  `id_dosenta` int(3) NOT NULL,
  `id_dosen` int(3) NOT NULL,
  `id_dataakademik` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen_tugasakhir`
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
(18, 13, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `leveling_dosen`
--

CREATE TABLE `leveling_dosen` (
  `id_level` int(4) NOT NULL,
  `id_dosenta` int(4) DEFAULT NULL,
  `id_user` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `leveling_dosen`
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
(12, 18, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
-- Dumping data untuk tabel `mahasiswa`
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
-- Struktur dari tabel `pengajuan_judul`
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

--
-- Dumping data untuk tabel `pengajuan_judul`
--

INSERT INTO `pengajuan_judul` (`id_pengajuan`, `id_mhs`, `judul`, `deskripsi`, `dosenpembimbing1`, `dosenpembimbing2`, `status_pengajuan`, `deskripsi_judul`, `catatan`) VALUES
(5, 1, 'sistem kelayakan terbang', 'pembuatan sistem informasi perihal pengelolaan data secara di gitalisasi untuk proses pemeriksaan rutin pesawat sebelum lepas landas.', 3, 4, 'belum di setujui', NULL, 'kurang rapi'),
(6, 2, 'sitem infomasi rumah sakit', 'pengembangan sistem secara digitalisasi terhadap rumah sakit di sebuah desa', 5, 4, 'di setujui', NULL, 'sudah bagus'),
(7, 1, 'judul', 'pengembangan sistem secara digitalisasi terhadap rumah sakit di sebuah desa', 5, 4, 'belum di setujui', '1625457466_bdb67a3301621438a87d.pdf', ''),
(8, 2, 'sistem pakar pendeteksi gangguan pencernaan', 'sistem pakar yang membantu mendeteksi gangguan pencernaan', 3, 4, 'belum di setujui', '1625713485_0c1889c9b090474a52f5.pdf', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan_sidang`
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

--
-- Dumping data untuk tabel `penjadwalan_sidang`
--

INSERT INTO `penjadwalan_sidang` (`id_jadwal`, `id_bimbingan`, `penguji_1`, `penguji_2`, `berkas_proposal`, `acara_sidang`, `tanggal_sidang`, `tempat_sidang`, `status_penjadwalan_kaprodi`) VALUES
(2, 3, 3, 2, '', 'seminar proposal', '2021-07-17 00:00:00', '      506', 'sudah terjadwal'),
(3, 3, 3, 2, NULL, 'seminar proposal', '2021-07-21 00:00:00', ' 109', 'sudah terjadwal'),
(18, 18, 3, 4, '1625566464_6640333a31172727c404.pdf', 'seminar proposal', '2021-07-14 17:21:56', '208', 'sudah terjadwal'),
(19, 20, 3, 4, '1625578843_4f74b9f6002463eace93.pdf', 'seminar proposal', '0000-00-00 00:00:00', '', 'belum terjadwal'),
(20, 20, 3, 2, '1625635936_1d1b43ce2e9feffe8f5e.pdf', 'seminar proposal', '0000-00-00 00:00:00', '', 'belum terjadwal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan_sidang_ta`
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

--
-- Dumping data untuk tabel `penjadwalan_sidang_ta`
--

INSERT INTO `penjadwalan_sidang_ta` (`id_jadwal_ta`, `id_bimbingan_ta`, `penguji_1`, `penguji_2`, `acara_sidang_ta`, `tanggal_sidang_ta`, `tempat_sidang_ta`, `status_penjadwalan_kaprodi_ta`) VALUES
(1, 2, 3, 2, 'sidang tugas akhir', '2021-07-17', '  301', 'sudah terjadwal'),
(2, 4, 3, 4, 'sidang tugas akhir', '2021-07-24', ' 509', 'belum terjadwal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_proposal`
--

CREATE TABLE `seminar_proposal` (
  `id_seminar` int(3) NOT NULL,
  `id_jadwal` int(3) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('lanjut','disetujui dengan revisi','mengulang') NOT NULL,
  `judul_final` varchar(50) NOT NULL,
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
-- Dumping data untuk tabel `seminar_proposal`
--

INSERT INTO `seminar_proposal` (`id_seminar`, `id_jadwal`, `nilai`, `catatan`, `status`, `judul_final`, `nilai_penguji_1`, `nilai_penguji_2`, `nilai_pembimbing_1`, `nilai_pembimbing_2`, `catatan_penguji_1`, `catatan_penguji_2`, `catatan_pembimbing_1`, `catatan_pembimbing_2`) VALUES
(2, 2, '89', 'sudah cukup sesuai bisa lanjut ke bab berikutnya', 'lanjut', '', 90, 80, 90, 88, 'sudah bagus', 'perlu pembenahan seikit pada metode', 'sudah mantap', 'sudah cukup'),
(4, 2, '89', '', 'lanjut', '', 89, 90, 90, 88, 'bagus', 'lanjut!', 'semangat', 'bagian referensi di tambahi lagi'),
(5, 18, '79', 'asd', 'disetujui dengan revisi', 'weqeq', 78, 80, 80, 80, 'perlu perbaikan', 'perbaiki lagi', 'bagian latar belakang masih sangat kurang', 'asa revisi di bagian daftar isinya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidang_tugasakhir`
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
-- Dumping data untuk tabel `sidang_tugasakhir`
--

INSERT INTO `sidang_tugasakhir` (`id_sidangta`, `id_jadwal_ta`, `nilai_ta`, `catatan_ta`, `status_ta`, `nilai_penguji_1_ta`, `nilai_penguji_2_ta`, `nilai_pembimbing_1_ta`, `nilai_pembimbing_2_ta`, `catatan_penguji_1_ta`, `catatan_penguji_2_ta`, `catatan_pembimbing_1_ta`, `catatan_pembimbing_2_ta`) VALUES
(2, 1, '90', 'great job!', 'lulus', 90, 90, 90, 90, 'udah sangat bagus', 'selamat kamu lulus', 'tidak ada catatan', 'sudah bagus'),
(3, 2, '90', 'asd', 'lulus', 89, 90, 90, 90, 'bagus', 'sudah sangat baik', 'tidak ada revisi', 'sudah bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` enum('1','2','3','4','5','6') DEFAULT NULL COMMENT '1:admin,2:dosen pembimbing,3:mahasiswa,4:dosen_penguji,5: Kaprodi,6:Terblokir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
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
(22, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indeks untuk tabel `bimbingan_ta`
--
ALTER TABLE `bimbingan_ta`
  ADD PRIMARY KEY (`id_bimbingan_ta`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- Indeks untuk tabel `data_akademik`
--
ALTER TABLE `data_akademik`
  ADD PRIMARY KEY (`id_dataakademik`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  ADD PRIMARY KEY (`id_dosenpembimbing`),
  ADD KEY `id_dosenta` (`id_dosenta`);

--
-- Indeks untuk tabel `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  ADD PRIMARY KEY (`id_dosenpenguji`),
  ADD KEY `id_dosenta` (`id_dosenta`);

--
-- Indeks untuk tabel `dosen_tugasakhir`
--
ALTER TABLE `dosen_tugasakhir`
  ADD PRIMARY KEY (`id_dosenta`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_dataakademik` (`id_dataakademik`);

--
-- Indeks untuk tabel `leveling_dosen`
--
ALTER TABLE `leveling_dosen`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `id_dosenta` (`id_dosenta`),
  ADD KEY `is_user` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_dataakademik` (`id_dataakademik`);

--
-- Indeks untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `dosenpembimbing1` (`dosenpembimbing1`),
  ADD KEY `dosenpembimbing2` (`dosenpembimbing2`),
  ADD KEY `dosenpembimbing1_2` (`dosenpembimbing1`);

--
-- Indeks untuk tabel `penjadwalan_sidang`
--
ALTER TABLE `penjadwalan_sidang`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_bimbingan` (`id_bimbingan`),
  ADD KEY `id_penguji` (`penguji_1`),
  ADD KEY `penguji_2` (`penguji_2`);

--
-- Indeks untuk tabel `penjadwalan_sidang_ta`
--
ALTER TABLE `penjadwalan_sidang_ta`
  ADD PRIMARY KEY (`id_jadwal_ta`),
  ADD KEY `id_bimbingan_ta` (`id_bimbingan_ta`),
  ADD KEY `penguji_1` (`penguji_1`),
  ADD KEY `penguji_2` (`penguji_2`),
  ADD KEY `id_dosen_penguji_1` (`penguji_1`),
  ADD KEY `penguji_1_2` (`penguji_1`);

--
-- Indeks untuk tabel `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD PRIMARY KEY (`id_seminar`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `sidang_tugasakhir`
--
ALTER TABLE `sidang_tugasakhir`
  ADD PRIMARY KEY (`id_sidangta`),
  ADD KEY `id_jadwal` (`id_jadwal_ta`),
  ADD KEY `id_jadwal_ta` (`id_jadwal_ta`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `bimbingan_ta`
--
ALTER TABLE `bimbingan_ta`
  MODIFY `id_bimbingan_ta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_akademik`
--
ALTER TABLE `data_akademik`
  MODIFY `id_dataakademik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  MODIFY `id_dosenpembimbing` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  MODIFY `id_dosenpenguji` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dosen_tugasakhir`
--
ALTER TABLE `dosen_tugasakhir`
  MODIFY `id_dosenta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `leveling_dosen`
--
ALTER TABLE `leveling_dosen`
  MODIFY `id_level` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id_pengajuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penjadwalan_sidang`
--
ALTER TABLE `penjadwalan_sidang`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `penjadwalan_sidang_ta`
--
ALTER TABLE `penjadwalan_sidang_ta`
  MODIFY `id_jadwal_ta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  MODIFY `id_seminar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sidang_tugasakhir`
--
ALTER TABLE `sidang_tugasakhir`
  MODIFY `id_sidangta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `bimbingan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_judul` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bimbingan_ta`
--
ALTER TABLE `bimbingan_ta`
  ADD CONSTRAINT `bimbingan_ta_ibfk_1` FOREIGN KEY (`id_seminar`) REFERENCES `seminar_proposal` (`id_seminar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  ADD CONSTRAINT `dosen_pembimbing_ibfk_1` FOREIGN KEY (`id_dosenta`) REFERENCES `dosen_tugasakhir` (`id_dosenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  ADD CONSTRAINT `dosen_penguji_ibfk_1` FOREIGN KEY (`id_dosenta`) REFERENCES `dosen_tugasakhir` (`id_dosenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen_tugasakhir`
--
ALTER TABLE `dosen_tugasakhir`
  ADD CONSTRAINT `dosen_tugasakhir_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_tugasakhir_ibfk_2` FOREIGN KEY (`id_dataakademik`) REFERENCES `data_akademik` (`id_dataakademik`);

--
-- Ketidakleluasaan untuk tabel `leveling_dosen`
--
ALTER TABLE `leveling_dosen`
  ADD CONSTRAINT `leveling_dosen_ibfk_1` FOREIGN KEY (`id_dosenta`) REFERENCES `dosen_tugasakhir` (`id_dosenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leveling_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_dataakademik`) REFERENCES `data_akademik` (`id_dataakademik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  ADD CONSTRAINT `pengajuan_judul_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_judul_ibfk_2` FOREIGN KEY (`dosenpembimbing1`) REFERENCES `dosen_pembimbing` (`id_dosenpembimbing`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_judul_ibfk_3` FOREIGN KEY (`dosenpembimbing2`) REFERENCES `dosen_pembimbing` (`id_dosenpembimbing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjadwalan_sidang`
--
ALTER TABLE `penjadwalan_sidang`
  ADD CONSTRAINT `penjadwalan_sidang_ibfk_1` FOREIGN KEY (`id_bimbingan`) REFERENCES `bimbingan` (`id_bimbingan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_sidang_ibfk_2` FOREIGN KEY (`penguji_1`) REFERENCES `dosen_penguji` (`id_dosenpenguji`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_sidang_ibfk_3` FOREIGN KEY (`penguji_2`) REFERENCES `dosen_penguji` (`id_dosenpenguji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjadwalan_sidang_ta`
--
ALTER TABLE `penjadwalan_sidang_ta`
  ADD CONSTRAINT `penjadwalan_sidang_ta_ibfk_1` FOREIGN KEY (`id_bimbingan_ta`) REFERENCES `bimbingan_ta` (`id_bimbingan_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_sidang_ta_ibfk_2` FOREIGN KEY (`penguji_1`) REFERENCES `dosen_penguji` (`id_dosenpenguji`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_sidang_ta_ibfk_3` FOREIGN KEY (`penguji_2`) REFERENCES `dosen_penguji` (`id_dosenpenguji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD CONSTRAINT `seminar_proposal_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `penjadwalan_sidang` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sidang_tugasakhir`
--
ALTER TABLE `sidang_tugasakhir`
  ADD CONSTRAINT `sidang_tugasakhir_ibfk_1` FOREIGN KEY (`id_jadwal_ta`) REFERENCES `penjadwalan_sidang_ta` (`id_jadwal_ta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
