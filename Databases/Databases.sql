-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2023 at 08:27 PM
-- Server version: 10.2.6-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `autologin`
--

CREATE TABLE `autologin` (
  `user_id` varchar(36) NOT NULL,
  `series` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumen` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `id_jenis` varchar(36) NOT NULL,
  `id_type` varchar(36) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` varchar(36) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `id_type` varchar(36) NOT NULL,
  `nama_type` varchar(50) NOT NULL,
  `extensi` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`id_type`, `nama_type`, `extensi`, `icon`, `color`, `created_at`, `enabled`) VALUES
('55ad411a-f523-11ed-9d6f-b445068261b6', 'EXCEL', '.xls,.xlsx', 'fa-file-excel', 'bg-success', '2023-05-18 09:25:06', 1),
('7b003561-f523-11ed-9d6f-b445068261b6', 'PPT', '.ppt,.pptx', 'fa-file-powerpoint', 'bg-orange', '2023-05-18 09:25:54', 1),
('99466771-f521-11ed-9d6f-b445068261b6', 'PDF', '.pdf', 'fa-file-pdf', 'bg-danger', '2023-05-18 09:12:30', 1),
('9c0fd4d2-f523-11ed-9d6f-b445068261b6', 'GAMBAR', '.jpg,.png,.jpeg,.gif', 'fa-image', 'bg-info', '2023-05-18 09:27:10', 1),
('b6805860-f521-11ed-9d6f-b445068261b6', 'WORD', '.doc,.docx', 'fa-file-word', 'bg-primary', '2023-05-18 09:13:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `nip`, `nama_lengkap`, `email`, `password`, `registered`, `level`) VALUES
('09f10ef0-ef19-44eb-bb70-ae5c718288e1', 'admin', '99999', 'administrator', 'admin@admin.com', '$2y$10$uUiJO3mjqqz4aq6RkQzwyOKGB1nAvq8JwJgk.CeqF5t9EEhBSwyNe', 1683938936, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autologin`
--
ALTER TABLE `autologin`
  ADD PRIMARY KEY (`user_id`,`series`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
