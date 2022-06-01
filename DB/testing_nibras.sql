-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 07:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing_nibras`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_ukuran`
--

CREATE TABLE `mst_ukuran` (
  `id_mst_ukuran` int(11) NOT NULL,
  `kode_ukuran` varchar(50) NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_warna`
--

CREATE TABLE `mst_warna` (
  `id_mst_warna` int(11) NOT NULL,
  `kode_warna` varchar(50) NOT NULL,
  `nama_warna` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_ukuran` varchar(50) NOT NULL,
  `kode_warna` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `harga_dasar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_barang`, `nama_barang`, `kode_ukuran`, `kode_warna`, `harga`, `harga_dasar`) VALUES
(2, '111', 'test', 'S', 'S', 3000, 2000),
(6, '001', 'baju', '112', '123', 3000, 3400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_ukuran`
--
ALTER TABLE `mst_ukuran`
  ADD PRIMARY KEY (`id_mst_ukuran`),
  ADD UNIQUE KEY `kode_ukuran` (`kode_ukuran`);

--
-- Indexes for table `mst_warna`
--
ALTER TABLE `mst_warna`
  ADD PRIMARY KEY (`id_mst_warna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_ukuran`
--
ALTER TABLE `mst_ukuran`
  MODIFY `id_mst_ukuran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_warna`
--
ALTER TABLE `mst_warna`
  MODIFY `id_mst_warna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
