-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 05:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_config`
--

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `controller` varchar(100) DEFAULT NULL,
  `position` int(1) DEFAULT NULL COMMENT '1=Parent,2=Child',
  `have_child` varchar(1) DEFAULT 'N' COMMENT 'Y=Punya,N=Tidak Punya',
  `parent` int(10) DEFAULT 0,
  `sequence` varchar(1) NOT NULL,
  `line` int(1) DEFAULT 0,
  `level` varchar(100) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `icon`, `name`, `controller`, `position`, `have_child`, `parent`, `sequence`, `line`, `level`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '', 'Register User', 'Admin/index', 1, 'N', 0, '0', 0, NULL, 0, '1', '2022-06-01 09:06:06', NULL, NULL),
(2, '', 'Assign Menu', 'Admin/Assign_menu', 1, 'N', 0, '0', 0, NULL, 0, '1', '2022-06-01 09:06:06', NULL, NULL),
(3, '', 'About Us', NULL, 1, 'N', 0, '0', 0, NULL, 0, '1', '2022-06-01 09:06:06', NULL, NULL),
(4, '', 'List User Only', 'module/index', 1, 'N', 0, '0', 0, NULL, 0, '1', '2022-06-01 09:06:06', NULL, NULL),
(94, NULL, 'Logout', 'Auth/logout', 1, 'N', 0, '', 0, NULL, 0, '1', '2022-06-01 17:10:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

CREATE TABLE `module_permission` (
  `id` int(11) NOT NULL,
  `id_module_role` int(20) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `cbx` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_permission`
--

INSERT INTO `module_permission` (`id`, `id_module_role`, `id_module`, `cbx`) VALUES
(1, 2, 1, NULL),
(2, 2, 2, NULL),
(3, 2, 3, NULL),
(4, 3, 4, NULL),
(5, 3, 3, NULL),
(6, 4, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_role`
--

CREATE TABLE `module_role` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_role`
--

INSERT INTO `module_role` (`id`, `nama`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Superadmin', 0, '1', '2022-06-01 08:48:12', NULL, NULL),
(2, 'Admin', 0, '1', '2022-06-01 08:48:12', NULL, NULL),
(3, 'Member', 0, '1', '2022-06-01 08:48:12', NULL, NULL),
(4, 'Guest', 0, '1', '2022-06-01 08:48:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode_level` int(11) DEFAULT NULL,
  `level` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_module_role` int(10) DEFAULT 0,
  `login_lst` datetime DEFAULT NULL,
  `login_exp` datetime DEFAULT NULL,
  `token` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aktif` int(1) DEFAULT 1,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cookie` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_modul` int(11) DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `kode_level`, `level`, `username`, `password`, `id_module_role`, `login_lst`, `login_exp`, `token`, `aktif`, `avatar`, `cookie`, `group_modul`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, 'admin', '$2y$10$VqodJuUYkXlB0i43EXQLruWUNpvgQGIAgxBjnyKe.n2MiO1TeeCaW', 2, NULL, NULL, NULL, 1, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(2, 'Member', NULL, NULL, 'member', '$2y$10$2fgEHwgo4nbfvHPgnUq0o.romtvYDKF5aHryA80rzrNn80SJRlYOO', 3, NULL, NULL, NULL, 1, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(3, 'Guest', NULL, NULL, 'guest', '$2y$10$2LQDf.q5jq9ddFZp8MnoKuvy9u4WGW80vBT/GAnbWHQ7FXJ2F46zu', 4, NULL, NULL, NULL, 1, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(4, 'Genza', NULL, NULL, 'genza', '$2y$10$pdoq/vPavZpuuiJenz6tuOX.6/1iM7EzlOuWvPjvtbMMoXBqGn/0m', 2, NULL, NULL, NULL, 1, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_role`
--
ALTER TABLE `module_role`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `UNIQ_5CAB8173C05FB297` (`token`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `module_permission`
--
ALTER TABLE `module_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `module_role`
--
ALTER TABLE `module_role`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
