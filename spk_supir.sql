-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2018 at 10:21 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_supir`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(5) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `email`, `password`) VALUES
(7, 'Fitriyanan', 'admin@admin.com', '$2y$10$2rL.NbEL8ilyKNYBHoaDPu3cJaNkvA2XlvSB5HPJB91kG6YujCezG'),
(8, 'andreas', 'admin2@admin.com', '$2y$10$3Hf9REqthN3E.822kI2N6eCBw1wjqkaiKsHYc9hz0FfIJgbaicFQC'),
(9, 'SEO SATU', 'admin3@admin.com', '$2y$10$XiFJdRbGvtg73yBQZ1m9.ea1KtTS5OMSIs5EFdXjuEL47a67PriMW'),
(10, 'ee', 'root@sadasd.com', '$2y$10$V0/C5fQo4Y9QCVjqIWUW8.W6Mlw9FlJvZD1fVsCCAEcoWc5hH85fK'),
(11, 'sanz', 'sancolgates1@gmail.com', '$2y$10$a1PXPuG8TzGp2QpSm33hee190Qv.jdqyOjNOn2N2YIGClGQeYrSFi'),
(12, '123123', 'sancolgate123123s1@gmail.com', '$2y$10$sNmKZ3kLXPy77VocwqxijuSteMoHF0fU2GcfuHTdxdSVKCbjb86PS'),
(13, 'superadmin', 'superadmin@gmail.com', '$2y$10$FxPxTU3DdvpQ3w3jz3RH/OkNbr0eW239aZhbuT7T8JqPT2ohE6T86');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `comp_absensi` double NOT NULL,
  `comp_ketelitain` double NOT NULL,
  `comp_pemahaman_tugas` double NOT NULL,
  `comp_kecepatan_layanan` double NOT NULL,
  `comp_disiplin` double NOT NULL,
  `comp_semangat_motivasi` double NOT NULL,
  `comp_tanggung_jawab` double NOT NULL,
  `comp_sikap` double NOT NULL,
  `comp_etika` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `comp_absensi`, `comp_ketelitain`, `comp_pemahaman_tugas`, `comp_kecepatan_layanan`, `comp_disiplin`, `comp_semangat_motivasi`, `comp_tanggung_jawab`, `comp_sikap`, `comp_etika`) VALUES
(1, 'seleksi februari 2011', 1, 3, 2, 1, 3, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_kriteria`
--

CREATE TABLE `master_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kriteria`
--

INSERT INTO `master_kriteria` (`kriteria_id`, `nama_kriteria`, `status`) VALUES
(1, 'absen', 1),
(2, 'ketelitian', 1),
(3, 'pemahaman tuigas', 1),
(4, 'kecepatan layanan', 1),
(5, 'disiplin', 1),
(6, 'semangat/motivasi', 1),
(7, 'tanggung jawab', 1),
(8, 'sikap', 1),
(9, 'etika', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `email_pengguna` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `no_induk` int(11) NOT NULL,
  `absensi` double NOT NULL,
  `ketelitian` double NOT NULL,
  `pemahaman_tugas` double NOT NULL,
  `kecepatan_layanan` double NOT NULL,
  `disiplin` double NOT NULL,
  `semangat_motivasi` double NOT NULL,
  `tanggung_jawab` double NOT NULL,
  `sikap` double NOT NULL,
  `etika` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `no_induk` int(11) NOT NULL,
  `no_ktp` char(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat_sekarang` varchar(150) NOT NULL,
  `kabupaten_kota` varchar(50) NOT NULL,
  `Provinsi` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` char(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `mulai_kerja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`no_induk`, `no_ktp`, `nama_lengkap`, `alamat_sekarang`, `kabupaten_kota`, `Provinsi`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `status_perkawinan`, `mulai_kerja`) VALUES
(1, '1567893625725635', 'Wahyudi', 'Jl.Angkasa Raya Indah Blok B 2 No.5', 'Bekasi', 'Jawa Barat', 'Laki-Laki', 'Bandung', '1987-04-06', '081234562910', 'KAWIN', '2012-09-05'),
(2, '0006534567814356', 'Saeful Anwar', 'Jl.Mawar Blok AA3 No.123 Taman Harapan Indah', 'Bekasi', 'Jawa Barat', 'Laki-Laki', 'Jakarta', '1990-01-07', '08123528197', 'KAWIN', '2014-02-13'),
(3, '2006534567814356', 'Budi Ismanto', 'Jl.Kencana Raya Blok BB25 Jati Makmur', 'Jakarta', 'DKI-Jakarta', 'Laki-Laki', 'Purwokertoerrr', '1984-09-14', '081246382619', 'BELUM KAWIN', '2014-02-11'),
(4, '1226740007946750', 'Dayu Sopiyan', 'Jl,Amanah barat Blok C89 Tambun Selatan', 'Bekasi', 'Jawa Barat', 'Laki-Laki', 'Bekasi', '2087-03-14', '081386985500', 'KAWIN', '2017-02-06'),
(5, '1036740007946750', 'Maman Ali Mansyur', 'Jl,Wibawa Mukti Blok A87 Tambun Utara', 'Bekasi', 'Jawa Barat', 'Laki-Laki', 'Cianjur', '1987-05-13', '081788557812', 'KAWIN', '2008-03-07'),
(6, '1110008976453337', 'Ansori', 'Jl.Anggrek 5 Blok L No.45', 'Bekasi', 'Jawa Barat', 'Laki-Laki', 'Kuningan', '1977-07-27', '081275391313', 'KAWIN', '2016-03-14'),
(7, '1110002226453337', 'Feri Santoso', 'Jl.Anggrek 3 Blok B No.47', 'Bekasi', 'Jawa Barat', 'Laki-Laki', 'Tasik Malaya', '1988-02-13', '081233391313', 'BELUM KAWIN', '2016-02-19'),
(8, '0006534222814356', 'Denny Harja', 'Jl.Kd.Bege Merah Kp.Udik No.18', 'Karawang', 'Jawa Barat', 'Laki-Laki', 'Karawang', '1987-06-13', '081234242446', 'KAWIN', '2017-02-12'),
(9, '0008124222814356', 'Kuwat Widyamoko', 'Jl.Bumi Sani Blok A No.23', 'Bekasi', 'Jawa Barat', 'Laki-Laki', 'Garut', '1989-01-14', '08123313134', 'KAWIN', '2017-05-12'),
(10, '122674000790001', 'Sularso', 'Jl.Melati Raya Rt.05 RW.06 No.77', 'Solo', 'Jawa Tengah', 'Laki-Laki', 'Solo', '1985-08-21', '0814612863891', 'KAWIN', '2013-08-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `master_kriteria`
--
ALTER TABLE `master_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD UNIQUE KEY `email_pengguna` (`email_pengguna`),
  ADD KEY `nama_pengguna` (`nama_pengguna`),
  ADD KEY `kata_sandi` (`kata_sandi`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`no_induk`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`no_induk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `master_kriteria`
--
ALTER TABLE `master_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `no_induk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
