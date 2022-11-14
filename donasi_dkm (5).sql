-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 04:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasi_dkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_adm` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_wa` varchar(12) NOT NULL,
  `gambar` text NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_adm`, `nama`, `email`, `alamat`, `no_wa`, `gambar`, `password`) VALUES
(1, 'Ilham', 'ilhamjaya@gmail.com', 'Cikarang selatan, Bekasi - jawa barat', '085712345679', 'avatar.png', 'ilham123'),
(2, 'Gowokk', 'gowok@gmail.com', 'kp. setu, Kab. Bekasi', '085712345674', 'avatar2.png', 'gowok123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int(2) NOT NULL,
  `tgl_donasi` date NOT NULL,
  `email_donatur` varchar(30) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status_donasi` varchar(30) NOT NULL,
  `id_admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `tgl_donasi`, `email_donatur`, `nominal`, `status_donasi`, `id_admin`) VALUES
(1, '2021-12-08', 'ronay@gmail.com', 500000, 'Diterima', 1),
(2, '2021-12-08', 'donikun@gmail.com', 700000, 'Diterima', 1),
(3, '2021-12-20', 'ronay@gmail.com', 300000, 'Diterima', 2),
(4, '2021-12-27', 'ronay@gmail.com', 200000, 'Diterima', 1),
(5, '2022-01-08', 'donikun@gmmil.com', 350000, 'Diterima', 1),
(6, '2022-01-15', 'donikun@gmail.com', 1000000, 'Diterima', 1),
(7, '2022-01-15', 'mohamadarief1090@gmail.com', 500000, 'Diterima', 1),
(8, '2022-01-15', 'mohamadarief1090@gmail.com', 700000, 'Diterima', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donatur`
--

CREATE TABLE `tbl_donatur` (
  `id_dnt` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_wa` varchar(12) NOT NULL,
  `gambar` text NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_user` int(2) NOT NULL,
  `qr_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donatur`
--

INSERT INTO `tbl_donatur` (`id_dnt`, `nama`, `email`, `alamat`, `no_wa`, `gambar`, `password`, `id_user`, `qr_code`) VALUES
(1, 'rifki', 'rifki@gmail.com', 'jl.lebak bulus, jakarta selatan                                                                                ', '085712345670', 'bartez1.jpg', '123456', 0, 'brkaka.png'),
(2, 'nadife', 'nadife@gmail.com', 'jl. kebagus raya - jakarta barat', '085712345674', 'bar-chart2.png', '123456', 0, 'palkong.png'),
(4, 'khabib Nurmagomedov', 'teskhabib@gmail.com', 'Jatimulya, Bekasi', '085712345675', 'khabib-nurmagomedov-3_169.jpeg', '123456', 0, 'palkong.png'),
(18, 'arif ospek', 'arif@gmail.com', 'rawa mangun', '083480394940', 'b1.jpg', '123456', 0, 'ciat.png'),
(19, 'mayang', 'mayang@gmail.com', 'rawa mulya', '038930038793', 'dejskd.JPG', '123456', 0, 'mayang.png'),
(20, 'ronays', 'ronay@gmail.com', 'rawa kebo', '02829930930', 'GitHub-Mark2.png', '123456', 6, 'ronay@gmail.com.png'),
(23, 'Pryandhika', 'pryandhika@gmail.com', 'papan mas', '085712345675', 'fino_g_sebastian11.jpg', '123456', 0, ''),
(29, 'www', 'www@gmail.com', 'Kopenhagen, Belanda', '085712345671', '', '123456', 0, ''),
(30, 'xxx', 'xxx@gmail.com', 'Bekasi, Jawa Barat', '085712345674', '', '123456', 0, ''),
(31, 'yyy', 'yyyyyy@gmail.com', 'Bekasi, Jawa Barat', '085712345675', 'bartez6.jpg', '123456', 0, ''),
(32, 'zzz', 'zzz@gmail.com', 'rseksejej', '084994039930', 'mountain_river_snow_winter_93245_1366x768.jpg', '123456', 9, 'zzz@gmail.com.png'),
(33, 'Muhammad Iqbal', 'muhammadiqbal12@gmail.com', 'Perumahan Mutiara Insai, Jl.Kelapa Dua Kel.Padurenan Kec.Mustika Jaya', '08128761245', 'Kemeja_Pria.jpg', '123456789', 10, 'muhammadiqbal12@gmail.com.png'),
(34, 'Mohamad Arief', 'mohamadarief1090@gmail.com', 'Jl. Kebaikan Dunia akhirat', '085712345667', 'arif.png', '1234567890', 0, 'mohamadarief1090@gmail.com.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ketua`
--

CREATE TABLE `tbl_ketua` (
  `id_yys` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_wa` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ketua`
--

INSERT INTO `tbl_ketua` (`id_yys`, `nama`, `email`, `alamat`, `no_wa`) VALUES
(1, 'Masjid Al-Barqah ', 'masjidalbarqah@gmail.com', 'Bekasi ', '085712345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(2) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_role` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `email`, `password`, `id_role`, `is_active`, `date_created`, `gambar`) VALUES
(1, 'Masjid Al-Barqah ', 'masjidalbarqah@gmail.com', 'albarqah123', 1, 1, '2021-11-28 00:00:00', 'al barqah.png'),
(2, 'Ilham', 'ilhamjaya@gmail.com', 'ilham123', 2, 1, '2021-11-28 00:00:00', 'ilham.jpg'),
(3, 'Gowokk', 'gowok@gmail.com', 'gowok123', 2, 1, '2021-11-28 00:00:00', 'fino_g_sebastian1.jpg'),
(4, 'rifki', 'rifki@gmail.com', '123456', 3, 1, '2021-11-28 00:00:00', 'bartez.jpg'),
(6, 'ronays', 'ronay@gmail.com', '123456', 3, 1, '2021-12-06 00:00:00', 'GitHub-Mark2.png'),
(7, 'donikun', 'donikun@gmail.com', '123456', 3, 1, '0000-00-00 00:00:00', 'kecap.jpg'),
(9, 'zzz', 'zzz@gmail.com', '123456', 3, 1, '2022-01-10 00:00:00', 'mountain_river_snow_winter_93245_1366x768.jpg'),
(10, 'Muhammad Iqbal', 'muhammadiqbal12@gmail.com', '123456789', 3, 1, '2022-01-15 00:00:00', 'Kemeja_Pria.jpg'),
(11, 'Mohamad Arief', 'mohamadarief1090@gmail.com', '1234567890', 3, 1, '0000-00-00 00:00:00', 'arif.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(2) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(30) NOT NULL,
  `date_created` int(11) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`, `id_user`) VALUES
(2, 'donikun@gmail.com', 'W/a60k1gW0Os3CVb2mICR2zvtJ2K7A', 1638777787, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `tbl_donatur`
--
ALTER TABLE `tbl_donatur`
  ADD PRIMARY KEY (`id_dnt`);

--
-- Indexes for table `tbl_ketua`
--
ALTER TABLE `tbl_ketua`
  ADD PRIMARY KEY (`id_yys`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_adm` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_donatur`
--
ALTER TABLE `tbl_donatur`
  MODIFY `id_dnt` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_ketua`
--
ALTER TABLE `tbl_ketua`
  MODIFY `id_yys` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
