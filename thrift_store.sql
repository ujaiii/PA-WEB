-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 04:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thrift_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `Id_Akun` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`Id_Akun`, `Username`, `Password`, `Email`, `Role`) VALUES
(1, 'admin', '$2y$10$z12UIYeGsvBr6gglhK8jQu9zcox.4r3AdPUPBFUM36I8y1HyXEcZ6', 'admin@gmail.com', 'admin'),
(7, 'user1', '$2y$10$z12UIYeGsvBr6gglhK8jQu9zcox.4r3AdPUPBFUM36I8y1HyXEcZ6', 'user@gmail.com', 'user'),
(8, 'user2', '$2y$10$8rbYW.dUoqZVIC8hGH4yOuM4j2Sq3.nLHWPFlbdvkiSqJagEdRY3O', 'user2@gmail.com', 'user'),
(9, 'user3', '$2y$10$XXD5GRxZxwE3UOx17TDkrujcRO71IY5WGvK1Ki06822mqdluMTO4S', 'user3@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id_Akun` int(10) NOT NULL,
  `Id_Produk` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Total_Harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id_Akun`, `Id_Produk`, `Quantity`, `Total_Harga`) VALUES
(7, 25, 15, 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id_Akun` int(10) DEFAULT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email_Pengirim` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id_Akun`, `Nama`, `Email_Pengirim`, `Subject`, `Pesan`) VALUES
(NULL, 'Syamsir', 'Syamsir300603@gmail.com', 'Kesehatan', 'Jangan Lupa Tidur'),
(8, 'Arif', 'arifaja@gmail.com', 'Mabarkah', 'Ayok');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Id_Produk` int(10) NOT NULL,
  `Nama_Produk` varchar(50) NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Harga` int(15) NOT NULL,
  `Sisa_Stok` int(10) NOT NULL,
  `Tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_Produk`, `Nama_Produk`, `Gambar`, `Harga`, `Sisa_Stok`, `Tanggal`) VALUES
(23, 'Kemeja Hitam', 'df54161b14688f9933e61478d7eeb367-n8.jpg', 50000, 16, '2022-11-12 14:46:17'),
(25, 'Kemeja', '616af73c826952af02bb579f672622e5-n5.jpg', 120000, 55, '2022-11-13 14:39:44'),
(27, 'Baju Pantai', 'bc068ba3d0712e80284b35120116046c-f2.jpg', 60000, 35, '2022-11-14 17:01:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`Id_Akun`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `akun-cart` (`Id_Akun`),
  ADD KEY `produk-cart` (`Id_Produk`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD KEY `akun-contact` (`Id_Akun`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_Produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `Id_Akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_Produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `akun-cart` FOREIGN KEY (`Id_Akun`) REFERENCES `akun` (`Id_Akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk-cart` FOREIGN KEY (`Id_Produk`) REFERENCES `produk` (`Id_Produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `akun-contact` FOREIGN KEY (`Id_Akun`) REFERENCES `akun` (`Id_Akun`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
