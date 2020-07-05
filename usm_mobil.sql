-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2020 at 03:39 AM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usm_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `counter` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `counter`) VALUES
('A', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_history`
-- (See below for the actual view)
--
CREATE TABLE `laporan_history` (
`id` int
,`notrans` varchar(20)
,`id_karyawan` int
,`nama_karyawan` varchar(50)
,`tanggal` date
,`pengikut` int
,`tujuan` varchar(100)
,`keterangan` varchar(100)
,`jenis` varchar(20)
,`bbm` int
,`kupon_bbm` varchar(20)
,`id_mobil` int
,`status` int
,`mobil` varchar(20)
,`nopol` varchar(20)
,`is_driver` int
,`id_driver` int
,`nama_driver` varchar(50)
,`keluar_jam` time
,`masuk_jam` time
,`nama_user` varchar(50)
,`nama_atasan` varchar(50)
,`nama_admin` varchar(50)
,`nama_spv` varchar(50)
,`nama_security` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_mobil`
-- (See below for the actual view)
--
CREATE TABLE `laporan_mobil` (
`id` int
,`mobil` varchar(20)
,`nopol` varchar(20)
,`notrans` varchar(20)
,`id_karyawan` int
,`tanggal` date
,`pengikut` int
,`tujuan` varchar(100)
,`keterangan` varchar(100)
,`jenis` varchar(20)
,`bbm` int
,`kupon_bbm` varchar(20)
,`is_driver` int
,`id_driver` int
,`keluar_jam` time
,`masuk_jam` time
,`status` int
);

-- --------------------------------------------------------

--
-- Table structure for table `mst_driver`
--

CREATE TABLE `mst_driver` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `aktif` int NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mst_driver`
--

INSERT INTO `mst_driver` (`id`, `nama`, `aktif`, `datetime`) VALUES
(1, 'driver1', 1, '2020-07-06 03:25:34'),
(2, 'driver2', 1, '2020-07-06 03:25:37'),
(3, 'driver3', 0, '2020-07-06 03:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `mst_karyawan`
--

CREATE TABLE `mst_karyawan` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `jabatan` varchar(50) COLLATE utf8_bin NOT NULL,
  `aktif` int DEFAULT '1',
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mst_karyawan`
--

INSERT INTO `mst_karyawan` (`id`, `nama`, `jabatan`, `aktif`, `datetime`) VALUES
(5, 'karyawan1', 'staff', 1, NULL),
(6, 'karyawan2', 'staff', 1, NULL),
(7, 'karyawan3', 'staff', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_mobil`
--

CREATE TABLE `mst_mobil` (
  `id` int NOT NULL,
  `mobil` varchar(20) COLLATE utf8_bin NOT NULL,
  `nopol` varchar(20) COLLATE utf8_bin NOT NULL,
  `aktif` int NOT NULL DEFAULT '1',
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mst_mobil`
--

INSERT INTO `mst_mobil` (`id`, `mobil`, `nopol`, `aktif`, `datetime`) VALUES
(4, 'mobil1', 'H 1111 HH', 1, '2020-07-06 03:21:15'),
(5, 'mobil2', 'H 2222 HH', 1, '2020-07-06 03:21:23'),
(6, 'mobil3', 'H 3333 HH', 1, '2020-07-06 03:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id` int NOT NULL,
  `notrans` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_karyawan` int NOT NULL,
  `tanggal` date NOT NULL,
  `pengikut` int NOT NULL,
  `tujuan` varchar(100) COLLATE utf8_bin NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_bin NOT NULL,
  `jenis` varchar(20) COLLATE utf8_bin NOT NULL,
  `bbm` int NOT NULL,
  `kupon_bbm` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `id_mobil` int DEFAULT NULL,
  `is_driver` int NOT NULL,
  `id_driver` int DEFAULT NULL,
  `keluar_jam` time DEFAULT NULL,
  `masuk_jam` time DEFAULT NULL,
  `status` int NOT NULL COMMENT '1: User, 2: Atasan, 3: Admin, 4: SPV, 5: Security, 9:Cancel',
  `id_user` int DEFAULT NULL,
  `id_atasan` int DEFAULT NULL,
  `id_admin` int DEFAULT NULL,
  `id_spv` int DEFAULT NULL,
  `id_security` int DEFAULT NULL,
  `cancel_id` int DEFAULT NULL,
  `cancel_alasan` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id`, `notrans`, `id_karyawan`, `tanggal`, `pengikut`, `tujuan`, `keterangan`, `jenis`, `bbm`, `kupon_bbm`, `id_mobil`, `is_driver`, `id_driver`, `keluar_jam`, `masuk_jam`, `status`, `id_user`, `id_atasan`, `id_admin`, `id_spv`, `id_security`, `cancel_id`, `cancel_alasan`, `cancel_date`, `datetime`) VALUES
(8, 'A2020070001', 5, '2020-07-06', 4, 'tujuan', 'keterangan', 'jenis', 1, 'kupon1', 4, 1, 1, NULL, NULL, 3, 2, 3, 4, NULL, NULL, NULL, NULL, NULL, '2020-07-06 03:32:11'),
(9, 'A2020070002', 6, '2020-07-06', 4, '-', '-', '-', 0, NULL, NULL, 1, NULL, NULL, NULL, 2, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 03:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int NOT NULL,
  `id_user_level` int NOT NULL,
  `id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 4, 5),
(5, 4, 6),
(6, 4, 7),
(7, 4, 8),
(8, 4, 12),
(9, 4, 15),
(10, 4, 16),
(11, 4, 17),
(12, 4, 18),
(13, 2, 9),
(14, 2, 15),
(15, 3, 11),
(16, 3, 15),
(17, 5, 13),
(18, 5, 15),
(19, 6, 14),
(20, 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `url` varchar(30) COLLATE utf8_bin NOT NULL,
  `icon` varchar(30) COLLATE utf8_bin NOT NULL,
  `is_main_menu` int NOT NULL,
  `urutan` int NOT NULL,
  `is_aktif` enum('y','n') COLLATE utf8_bin NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `urutan`, `is_aktif`) VALUES
(0, '', 'welcome', '', 0, 0, 'y'),
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 0, 'y'),
(4, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 0, 'y'),
(5, 'Master', '#', 'fa fa-database', 0, 2, 'y'),
(6, 'Master Driver', 'mst_driver', 'fa fa-id-badge', 5, 1, 'y'),
(7, 'Master Mobil', 'mst_mobil', 'fa fa-car', 5, 2, 'y'),
(8, 'Master Karyawan', 'mst_karyawan', 'fa fa-user-circle', 5, 3, 'y'),
(9, 'Permohonan', 'permohonan_user', 'fa fa-check', 0, 2, 'y'),
(11, 'Permohonan', 'permohonan_atasan', 'fa fa-check', 0, 2, 'y'),
(12, 'Permohonan', 'permohonan_admin', 'fa fa-check', 0, 2, 'y'),
(13, 'Permohonan', 'permohonan_spv', 'fa fa-check', 0, 2, 'y'),
(14, 'Permohonan', 'permohonan_security', 'fa fa-check', 0, 2, 'y'),
(15, 'Monitor', 'monitor', 'fa fa-tachometer', 0, 1, 'y'),
(16, 'Laporan', '#', 'fa fa-area-chart', 0, 3, 'y'),
(17, 'Laporan Mobil', 'laporan_mobil', 'fa fa-area-chart', 16, 1, 'y'),
(18, 'Laporan History', 'laporan_history', 'fa fa-area-chart', 16, 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int NOT NULL,
  `nama_setting` varchar(50) COLLATE utf8_bin NOT NULL,
  `value` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int NOT NULL,
  `full_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `images` mediumtext COLLATE utf8_bin NOT NULL,
  `id_user_level` int NOT NULL,
  `is_aktif` enum('y','n') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'super', 'super@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
(2, 'user', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 2, 'y'),
(3, 'atasan', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 3, 'y'),
(4, 'admin', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 4, 'y'),
(5, 'spv', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 5, 'y'),
(6, 'security', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 6, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int NOT NULL,
  `nama_level` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'User'),
(3, 'Atasan'),
(4, 'Admin'),
(5, 'SPV Admin'),
(6, 'Security');

-- --------------------------------------------------------

--
-- Structure for view `laporan_history`
--
DROP TABLE IF EXISTS `laporan_history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_history`  AS  select `permohonan`.`id` AS `id`,`permohonan`.`notrans` AS `notrans`,`permohonan`.`id_karyawan` AS `id_karyawan`,`mst_karyawan`.`nama` AS `nama_karyawan`,`permohonan`.`tanggal` AS `tanggal`,`permohonan`.`pengikut` AS `pengikut`,`permohonan`.`tujuan` AS `tujuan`,`permohonan`.`keterangan` AS `keterangan`,`permohonan`.`jenis` AS `jenis`,`permohonan`.`bbm` AS `bbm`,`permohonan`.`kupon_bbm` AS `kupon_bbm`,`permohonan`.`id_mobil` AS `id_mobil`,`permohonan`.`status` AS `status`,`mst_mobil`.`mobil` AS `mobil`,`mst_mobil`.`nopol` AS `nopol`,`permohonan`.`is_driver` AS `is_driver`,`permohonan`.`id_driver` AS `id_driver`,`mst_driver`.`nama` AS `nama_driver`,`permohonan`.`keluar_jam` AS `keluar_jam`,`permohonan`.`masuk_jam` AS `masuk_jam`,`a`.`full_name` AS `nama_user`,`b`.`full_name` AS `nama_atasan`,`c`.`full_name` AS `nama_admin`,`d`.`full_name` AS `nama_spv`,`e`.`full_name` AS `nama_security` from ((((((((`permohonan` join `mst_karyawan` on((`mst_karyawan`.`id` = `permohonan`.`id_karyawan`))) left join `tbl_user` `a` on((`a`.`id_users` = `permohonan`.`id_user`))) left join `tbl_user` `b` on((`b`.`id_users` = `permohonan`.`id_atasan`))) left join `tbl_user` `c` on((`c`.`id_users` = `permohonan`.`id_admin`))) left join `tbl_user` `d` on((`d`.`id_users` = `permohonan`.`id_spv`))) left join `tbl_user` `e` on((`e`.`id_users` = `permohonan`.`id_security`))) left join `mst_driver` on((`mst_driver`.`id` = `permohonan`.`id_driver`))) left join `mst_mobil` on((`mst_mobil`.`id` = `permohonan`.`id_mobil`))) ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_mobil`
--
DROP TABLE IF EXISTS `laporan_mobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_mobil`  AS  select `mst_mobil`.`id` AS `id`,`mst_mobil`.`mobil` AS `mobil`,`mst_mobil`.`nopol` AS `nopol`,`permohonan`.`notrans` AS `notrans`,`permohonan`.`id_karyawan` AS `id_karyawan`,`permohonan`.`tanggal` AS `tanggal`,`permohonan`.`pengikut` AS `pengikut`,`permohonan`.`tujuan` AS `tujuan`,`permohonan`.`keterangan` AS `keterangan`,`permohonan`.`jenis` AS `jenis`,`permohonan`.`bbm` AS `bbm`,`permohonan`.`kupon_bbm` AS `kupon_bbm`,`permohonan`.`is_driver` AS `is_driver`,`permohonan`.`id_driver` AS `id_driver`,`permohonan`.`keluar_jam` AS `keluar_jam`,`permohonan`.`masuk_jam` AS `masuk_jam`,`permohonan`.`status` AS `status` from (`mst_mobil` left join `permohonan` on((`permohonan`.`id_mobil` = `mst_mobil`.`id`))) group by `mst_mobil`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mst_driver`
--
ALTER TABLE `mst_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_karyawan`
--
ALTER TABLE `mst_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_mobil`
--
ALTER TABLE `mst_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_driver`
--
ALTER TABLE `mst_driver`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_karyawan`
--
ALTER TABLE `mst_karyawan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_mobil`
--
ALTER TABLE `mst_mobil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
