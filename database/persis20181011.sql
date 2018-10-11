-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Okt 2018 pada 06.47
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persis`
--
CREATE DATABASE IF NOT EXISTS `persis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `persis`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `a_modul`
--

CREATE TABLE `a_modul` (
  `a_kdmodul` int(7) NOT NULL,
  `a_nmmodul` varchar(20) NOT NULL,
  `a_kdgroup` int(7) NOT NULL,
  `a_tipe` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'auwfar', 'f0a047143d1da15b630c73f0256d5db0', 'Achmad Chadil Auwfar', 'Koala.jpg'),
(2, 'ozil', 'f4e404c7f815fc68e7ce8e3c2e61e347', 'Mesut ', 'profil2.jpg'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'Akun Tester', 'profil2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_group`
--

CREATE TABLE `b_group` (
  `b_kdgroup` int(7) NOT NULL,
  `b_nmgroup` varchar(15) NOT NULL,
  `b_loguser` int(7) NOT NULL,
  `b_logtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `c_user`
--

CREATE TABLE `c_user` (
  `c_id` int(7) NOT NULL,
  `c_username` varchar(15) NOT NULL,
  `c_pass` varchar(44) NOT NULL,
  `c_jabatan` varchar(50) NOT NULL,
  `c_kdgroup` int(7) NOT NULL,
  `c_loguser` int(7) NOT NULL,
  `c_logtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_pejabat`
--

CREATE TABLE `d_pejabat` (
  `d_kdpejabat` int(7) NOT NULL,
  `d_nama` varchar(50) NOT NULL,
  `d_instansi` varchar(100) NOT NULL,
  `d_loguser` int(7) NOT NULL,
  `d_logtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `d_pejabat`
--

INSERT INTO `d_pejabat` (`d_kdpejabat`, `d_nama`, `d_instansi`, `d_loguser`, `d_logtime`) VALUES
(4, 'Agung Surya Kencana Hartanto', 'Kementerian Kelautan dan Perikanan', 2, '2018-10-11 06:24:59'),
(5, 'Agung Utomo Mandala Putra', 'Kementerian Kelautan dan Perikanan', 2, '2018-10-11 05:53:21'),
(6, 'Toni', 'Kementerian Bangunan', 2, '2018-10-04 09:19:56'),
(7, 'Taufik', 'Kementerian ESDM', 0, '2018-10-04 04:33:06'),
(8, 'Deemichi', 'Kementerian Kodok', 2, '2018-10-11 05:43:02'),
(11, 'Andri', 'Kementerian Koordinator Kemaritiman', 2, '2018-10-11 05:51:39'),
(12, 'Dinda Kusuma Kimpring', 'Kementerian Sekretariat Negara', 2, '2018-10-11 06:25:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `e_log`
--

CREATE TABLE `e_log` (
  `e_kdlog` int(11) NOT NULL,
  `e_uraian` text NOT NULL,
  `e_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `f_usulan`
--

CREATE TABLE `f_usulan` (
  `f_kdusulan` int(7) NOT NULL,
  `f_userid` int(7) NOT NULL,
  `f_kdgroup` int(7) NOT NULL,
  `f_kdrakor` int(7) NOT NULL,
  `f_tglpengajuan` date NOT NULL,
  `f_uraianusulan` text NOT NULL,
  `f_tglusulan` date NOT NULL,
  `f_status` int(1) NOT NULL,
  `f_uraianstatus` text NOT NULL,
  `f_kdlog` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `f_usulan`
--

INSERT INTO `f_usulan` (`f_kdusulan`, `f_userid`, `f_kdgroup`, `f_kdrakor`, `f_tglpengajuan`, `f_uraianusulan`, `f_tglusulan`, `f_status`, `f_uraianstatus`, `f_kdlog`) VALUES
(1, 2, 0, 0, '2018-10-04', 'Tolong banget ya min karena penting segera di agendakan', '2018-10-11', 1, '', 0),
(2, 2, 0, 0, '2018-10-04', 'Kami mengusulkan rapat koordinasi dengan kementerian terkait tentang pentingnya karhutla', '2018-10-05', 1, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `g_file_usulan`
--

CREATE TABLE `g_file_usulan` (
  `g_kdfile` int(7) NOT NULL,
  `g_nmfile` varchar(100) NOT NULL,
  `g_kdusulan` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `h_jadwal`
--

CREATE TABLE `h_jadwal` (
  `h_kdrakor` int(7) NOT NULL,
  `h_jenisrakor` int(1) NOT NULL,
  `h_tglrakor` date NOT NULL,
  `h_jamawal` time NOT NULL,
  `h_jamakhir` time NOT NULL,
  `h_tempat` text NOT NULL,
  `h_agenda` text NOT NULL,
  `h_pimpinan` text NOT NULL,
  `h_status` int(1) NOT NULL,
  `h_loguser` int(7) NOT NULL,
  `h_logtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `i_peserta`
--

CREATE TABLE `i_peserta` (
  `i_kdpeserta` int(7) NOT NULL,
  `i_kdrakor` int(7) NOT NULL,
  `i_kdpejabat` int(7) NOT NULL,
  `i_status` int(1) NOT NULL,
  `i_alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_file_undangan`
--

CREATE TABLE `j_file_undangan` (
  `j_kdfile` int(7) NOT NULL,
  `j_nmfile` varchar(100) NOT NULL,
  `j_kdrakor` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_file_risalah`
--

CREATE TABLE `k_file_risalah` (
  `k_kdfile` int(7) NOT NULL,
  `k_nmfile` varchar(100) NOT NULL,
  `k_kdrakor` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelamin`
--

CREATE TABLE `kelamin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelamin`
--

INSERT INTO `kelamin` (`id`, `nama`) VALUES
(1, 'Laki laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(1, 'Malang'),
(3, 'Blitar'),
(4, 'Tulungagung'),
(17, 'Jakarta'),
(21, 'Surabaya'),
(22, 'Paris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `l_file_transkripsi`
--

CREATE TABLE `l_file_transkripsi` (
  `l_kdfile` int(7) NOT NULL,
  `l_nmfile` varchar(100) NOT NULL,
  `l_kdrakor` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_file_foto`
--

CREATE TABLE `m_file_foto` (
  `m_kdfile` int(7) NOT NULL,
  `m_nmfile` varchar(100) NOT NULL,
  `m_kdrakor` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_file_rekaman`
--

CREATE TABLE `n_file_rekaman` (
  `n_kdfile` int(7) NOT NULL,
  `n_nmfile` varchar(100) NOT NULL,
  `n_kdrakor` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `id_kelamin` int(1) DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `telp`, `id_kota`, `id_kelamin`, `id_posisi`, `status`) VALUES
('10', 'Antony Febriansyah Hartono', '082199568540', 1, 1, 1, 1),
('11', 'Hafizh Asrofil Al Banna', '087859615271', 1, 1, 1, 1),
('12', 'Faiq Fajrullah', '085736333728', 1, 1, 2, 1),
('3', 'Mustofa Halim', '081330493322', 1, 1, 3, 1),
('4', 'Dody Ahmad Kusuma Jaya', '083854520015', 1, 1, 2, 1),
('5', 'Mokhammad Choirul Ikhsan', '085749535400', 3, 1, 2, 1),
('7', 'Achmad Chadil Auwfar', '08984119934', 2, 1, 1, 1),
('8', 'Rizal Ferdian', '087777284179', 1, 1, 3, 1),
('9', 'Redika Angga Pratama', '083834657395', 1, 1, 3, 1),
('1', 'Tolkha Hasan', '081233072122', 1, 1, 4, 1),
('2', 'Wawan Dwi Prasetyo', '085745966707', 4, 1, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id`, `nama`) VALUES
(1, 'IT'),
(2, 'HRD'),
(3, 'Keuangan'),
(4, 'Produk'),
(5, 'Web Developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_modul`
--
ALTER TABLE `a_modul`
  ADD PRIMARY KEY (`a_kdmodul`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b_group`
--
ALTER TABLE `b_group`
  ADD PRIMARY KEY (`b_kdgroup`);

--
-- Indexes for table `c_user`
--
ALTER TABLE `c_user`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `d_pejabat`
--
ALTER TABLE `d_pejabat`
  ADD PRIMARY KEY (`d_kdpejabat`);

--
-- Indexes for table `e_log`
--
ALTER TABLE `e_log`
  ADD PRIMARY KEY (`e_kdlog`);

--
-- Indexes for table `f_usulan`
--
ALTER TABLE `f_usulan`
  ADD PRIMARY KEY (`f_kdusulan`);

--
-- Indexes for table `g_file_usulan`
--
ALTER TABLE `g_file_usulan`
  ADD PRIMARY KEY (`g_kdfile`);

--
-- Indexes for table `h_jadwal`
--
ALTER TABLE `h_jadwal`
  ADD PRIMARY KEY (`h_kdrakor`);

--
-- Indexes for table `i_peserta`
--
ALTER TABLE `i_peserta`
  ADD PRIMARY KEY (`i_kdpeserta`);

--
-- Indexes for table `j_file_undangan`
--
ALTER TABLE `j_file_undangan`
  ADD PRIMARY KEY (`j_kdfile`);

--
-- Indexes for table `k_file_risalah`
--
ALTER TABLE `k_file_risalah`
  ADD PRIMARY KEY (`k_kdfile`);

--
-- Indexes for table `kelamin`
--
ALTER TABLE `kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `l_file_transkripsi`
--
ALTER TABLE `l_file_transkripsi`
  ADD PRIMARY KEY (`l_kdfile`);

--
-- Indexes for table `m_file_foto`
--
ALTER TABLE `m_file_foto`
  ADD PRIMARY KEY (`m_kdfile`);

--
-- Indexes for table `n_file_rekaman`
--
ALTER TABLE `n_file_rekaman`
  ADD PRIMARY KEY (`n_kdfile`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_modul`
--
ALTER TABLE `a_modul`
  MODIFY `a_kdmodul` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `b_group`
--
ALTER TABLE `b_group`
  MODIFY `b_kdgroup` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_user`
--
ALTER TABLE `c_user`
  MODIFY `c_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `d_pejabat`
--
ALTER TABLE `d_pejabat`
  MODIFY `d_kdpejabat` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `e_log`
--
ALTER TABLE `e_log`
  MODIFY `e_kdlog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_usulan`
--
ALTER TABLE `f_usulan`
  MODIFY `f_kdusulan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `g_file_usulan`
--
ALTER TABLE `g_file_usulan`
  MODIFY `g_kdfile` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `h_jadwal`
--
ALTER TABLE `h_jadwal`
  MODIFY `h_kdrakor` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `i_peserta`
--
ALTER TABLE `i_peserta`
  MODIFY `i_kdpeserta` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `j_file_undangan`
--
ALTER TABLE `j_file_undangan`
  MODIFY `j_kdfile` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_file_risalah`
--
ALTER TABLE `k_file_risalah`
  MODIFY `k_kdfile` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `l_file_transkripsi`
--
ALTER TABLE `l_file_transkripsi`
  MODIFY `l_kdfile` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_file_foto`
--
ALTER TABLE `m_file_foto`
  MODIFY `m_kdfile` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `n_file_rekaman`
--
ALTER TABLE `n_file_rekaman`
  MODIFY `n_kdfile` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
