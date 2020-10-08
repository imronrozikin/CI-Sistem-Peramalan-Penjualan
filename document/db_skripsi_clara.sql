-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mar 2020 pada 13.13
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi_clara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpersediaan`
--

CREATE TABLE `detailpersediaan` (
  `id` int(11) NOT NULL,
  `fk_persediaan` int(11) NOT NULL,
  `fk_produk` int(11) NOT NULL,
  `jumlah` int(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpersediaan`
--

INSERT INTO `detailpersediaan` (`id`, `fk_persediaan`, `fk_produk`, `jumlah`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `id` int(11) NOT NULL,
  `fk_transaksi` int(11) NOT NULL,
  `fk_produk` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`id`, `fk_transaksi`, `fk_produk`, `jumlah`) VALUES
(6, 5, 1, 156),
(11, 8, 1, 120),
(12, 9, 1, 260),
(13, 9, 1, 250),
(14, 10, 1, 360),
(15, 10, 1, 170),
(16, 11, 1, 222),
(17, 11, 1, 180),
(18, 12, 1, 290),
(19, 12, 1, 310),
(20, 13, 1, 300),
(21, 13, 1, 280),
(23, 15, 1, 270),
(24, 16, 1, 525),
(25, 17, 1, 400),
(26, 18, 1, 320),
(27, 19, 1, 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL,
  `nama` varchar(159) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan_transaksi`
--

CREATE TABLE `peramalan_transaksi` (
  `id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `error` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peramalan_transaksi`
--

INSERT INTO `peramalan_transaksi` (`id`, `tahun`, `bulan`, `nilai`, `error`) VALUES
(1, 2018, 2, 69, NULL),
(2, 2018, 3, 59, NULL),
(3, 2018, 4, 159, NULL),
(4, 2018, 5, 99, NULL),
(5, 2018, 6, 109, NULL),
(6, 2018, 7, 119, NULL),
(7, 2018, 8, 99, NULL),
(8, 2018, 9, 179, NULL),
(9, 2018, 10, 119, NULL),
(10, 2018, 11, 99, NULL),
(11, 2019, 2, 6, NULL),
(12, 2019, 3, 6, NULL),
(13, 2019, 4, 6, NULL),
(14, 2019, 5, 6, NULL),
(15, 2019, 6, 6, NULL),
(16, 2019, 7, 6, NULL),
(17, 2019, 8, 6, NULL),
(18, 2019, 9, 6, NULL),
(19, 2019, 10, 6, NULL),
(20, 2019, 11, 6, NULL),
(21, 2019, 2, 205, NULL),
(22, 2019, 3, 125, NULL),
(23, 2019, 4, 515, NULL),
(24, 2019, 5, 535, NULL),
(25, 2019, 6, 405, NULL),
(26, 2019, 8, 585, NULL),
(27, 2019, 9, 275, NULL),
(28, 2019, 10, 525, NULL),
(29, 2019, 2, 205, NULL),
(30, 2019, 3, 125, NULL),
(31, 2019, 4, 515, NULL),
(32, 2019, 5, 535, NULL),
(33, 2019, 6, 405, NULL),
(34, 2019, 8, 585, NULL),
(35, 2019, 9, 275, NULL),
(36, 2019, 10, 525, NULL),
(37, 2019, 2, 205, NULL),
(38, 2019, 3, 125, NULL),
(39, 2019, 4, 515, NULL),
(40, 2019, 5, 535, NULL),
(41, 2019, 6, 405, NULL),
(42, 2019, 8, 585, NULL),
(43, 2019, 9, 275, NULL),
(44, 2019, 10, 525, NULL),
(45, 2019, 2, 205, NULL),
(46, 2019, 3, 125, NULL),
(47, 2019, 4, 515, NULL),
(48, 2019, 5, 535, NULL),
(49, 2019, 6, 405, NULL),
(50, 2019, 8, 585, NULL),
(51, 2019, 9, 275, NULL),
(52, 2019, 10, 525, NULL),
(53, 2019, 2, 205, NULL),
(54, 2019, 3, 125, NULL),
(55, 2019, 4, 515, NULL),
(56, 2019, 5, 535, NULL),
(57, 2019, 6, 405, NULL),
(58, 2019, 8, 585, NULL),
(59, 2019, 9, 275, NULL),
(60, 2019, 10, 525, NULL),
(61, 2019, 11, 405, NULL),
(62, 2019, 2, 205, NULL),
(63, 2019, 3, 125, NULL),
(64, 2019, 4, 515, NULL),
(65, 2019, 5, 535, NULL),
(66, 2019, 6, 405, NULL),
(67, 2019, 8, 585, NULL),
(68, 2019, 9, 275, NULL),
(69, 2019, 10, 525, NULL),
(70, 2019, 11, 405, NULL),
(71, 2019, 12, 325, NULL),
(72, 2019, 2, 205, NULL),
(73, 2019, 3, 125, NULL),
(74, 2019, 4, 515, NULL),
(75, 2019, 5, 535, NULL),
(76, 2019, 6, 405, NULL),
(77, 2019, 8, 585, NULL),
(78, 2019, 9, 275, NULL),
(79, 2019, 10, 525, NULL),
(80, 2019, 11, 405, NULL),
(81, 2019, 12, 325, NULL),
(82, 2019, 2, 205, NULL),
(83, 2019, 3, 125, NULL),
(84, 2019, 4, 515, NULL),
(85, 2019, 5, 535, NULL),
(86, 2019, 6, 405, NULL),
(87, 2019, 8, 585, NULL),
(88, 2019, 9, 275, NULL),
(89, 2019, 10, 525, NULL),
(90, 2019, 2, 205, NULL),
(91, 2019, 3, 125, NULL),
(92, 2019, 4, 515, NULL),
(93, 2019, 5, 535, NULL),
(94, 2019, 6, 405, NULL),
(95, 2019, 8, 585, NULL),
(96, 2019, 9, 275, NULL),
(97, 2019, 10, 525, NULL),
(98, 2019, 11, 405, NULL),
(99, 2019, 2, 205, NULL),
(100, 2019, 3, 125, NULL),
(101, 2019, 4, 515, NULL),
(102, 2019, 5, 535, NULL),
(103, 2019, 6, 405, NULL),
(104, 2019, 7, 595, NULL),
(105, 2019, 8, 585, NULL),
(106, 2019, 9, 275, NULL),
(107, 2019, 10, 525, NULL),
(108, 2019, 11, 405, NULL),
(109, 2019, 12, 325, NULL),
(110, 2019, 2, 125, NULL),
(111, 2019, 3, 125, NULL),
(112, 2019, 4, 125, NULL),
(113, 2019, 5, 125, NULL),
(114, 2019, 6, 125, NULL),
(115, 2019, 7, 595, NULL),
(116, 2019, 8, 125, NULL),
(117, 2019, 9, 125, NULL),
(118, 2019, 10, 125, NULL),
(119, 2019, 11, 125, NULL),
(120, 2019, 12, 125, NULL),
(121, 2019, 2, 205, NULL),
(122, 2019, 3, 125, NULL),
(123, 2019, 4, 515, NULL),
(124, 2019, 5, 535, NULL),
(125, 2019, 6, 405, NULL),
(126, 2019, 7, 595, NULL),
(127, 2019, 8, 585, NULL),
(128, 2019, 9, 275, NULL),
(129, 2019, 10, 525, NULL),
(130, 2019, 11, 405, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan`
--

CREATE TABLE `persediaan` (
  `id` int(11) NOT NULL,
  `tgl` datetime(6) NOT NULL,
  `nomer` varchar(150) NOT NULL,
  `fk_user_supplier` int(11) NOT NULL,
  `fk_user_karyawan` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persediaan`
--

INSERT INTO `persediaan` (`id`, `tgl`, `nomer`, `fk_user_supplier`, `fk_user_karyawan`, `harga`) VALUES
(1, '2020-03-04 00:00:00.000000', '123', 10, 3, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `c_produk` varchar(50) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `c_produk`, `merk`, `tipe`, `stok`, `gambar`) VALUES
(1, '1NH3PN', 'Luxerr', 'gas', 39, '6d2e541f41031e44c131ce12b02884a9.png'),
(4, '2PGH3J', 'Niko', 'gas', 0, 'ed31b2a0709223f99be1480a38bd6043.png'),
(5, '3LNH345', 'Paloma', 'Gas', 0, 'c1f851fc1fd224f5d470c755558396cc.png'),
(6, '4', 'Kran', 'Panas Dingin', 0, 'd922c8bd7caa71f0379774a8cd5c4cab.png'),
(7, '5', 'Luxerr', 'Listrik', 0, '6c15399496fa9d0de805d21680b77712.jpg'),
(8, '6', 'Wasser', 'Gas', 0, '801574c69afb668661b4c6df947737a4.png'),
(9, '7', 'Modena', 'gas', 0, '7128dc2e3c1a4b84e35770409c92b346.png'),
(10, '9', 'Rinnai', 'Gas', 0, '07402d9c22c40fc4be3cb722c7b6371a.jpg'),
(11, '10', 'Shower', 'Peralatan Kamar mandi', 0, 'de896035c3d3d0bde4eb7dbfb8b7d470.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `fk_produk` int(11) NOT NULL,
  `jumlah` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tgl` datetime(6) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `fk_user_costumer` int(11) NOT NULL,
  `fk_user_karyawan` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tgl`, `nomer`, `fk_user_costumer`, `fk_user_karyawan`, `harga`) VALUES
(5, '2019-01-01 00:00:00.000000', '1', 11, 3, 1000),
(8, '2019-03-01 00:00:00.000000', '3', 11, 3, 3000),
(9, '2019-04-01 00:00:00.000000', '4', 11, 3, 123),
(10, '2019-05-01 00:00:00.000000', '5', 11, 3, 5000),
(11, '2019-06-01 00:00:00.000000', '6', 10, 3, 2000),
(12, '2019-07-01 00:00:00.000000', '7', 11, 3, 4000),
(13, '2019-08-01 00:00:00.000000', '8', 11, 3, 3500),
(15, '2019-09-01 00:00:00.000000', '9', 10, 3, 6000),
(16, '2019-10-01 00:00:00.000000', '10', 10, 3, 5000),
(17, '2019-11-01 00:00:00.000000', '11', 10, 3, 6000),
(18, '2019-12-01 00:00:00.000000', '12', 11, 3, 5000),
(19, '2019-02-01 00:00:00.000000', '2', 10, 3, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telepon` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `telepon`, `username`, `password`, `level`, `gambar`) VALUES
(3, 'aldhanbiuzar', '', '', 'aldhanbiuzar', '0aa8fedeba30a3b9a5d7ebf201f64bc4', 2, '86fce450b788f35ddb7fe3044d4c88f4.jpg'),
(5, 'aldhanbiuzar121312', 'asdsad', '0989898', 'aldhanbiuzar1', 'f3da059c889a14d9e263e0643fb2712c', 1, '2df031cb03e034a67e47b9d135fde5ee.jpg'),
(6, 'aldhanbiuzar2', '', '', 'aldhanbiuzar2', 'e7f77cffdab25176d3828465910e546f', 1, 'ac250cc04ee9f56c4473070bbb6d4a9a.jpg'),
(8, 'claraclara123', 'tidar', '1', 'claraclara123', '02e4c127b4fd4bfaf91e7ac8dd5302a3', 1, 'b85c5b99b3382ada298ac48345147456.jpg'),
(9, 'imron', '', '', 'imron123', 'f55c882496ad5f94f1f0fc6f47857f22', 1, 'default.png'),
(10, 'ferdy', 'adsdn', '08098797979', 'qwertyuio', 'e86fdc2283aff4717103f2d44d0610f7', 3, 'default.png'),
(11, 'Ramadhana', 'Tidar', '089531026477', 'Ramadhana', 'e10adc3949ba59abbe56e057f20f883e', 3, 'd868502738545a810211b306daa90ee7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpersediaan`
--
ALTER TABLE `detailpersediaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penyetokan_2` (`fk_persediaan`),
  ADD KEY `fk_produk_2` (`fk_produk`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penyetokan_2` (`fk_transaksi`),
  ADD KEY `fk_produk_2` (`fk_produk`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peramalan_transaksi`
--
ALTER TABLE `peramalan_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_supplier` (`fk_user_supplier`),
  ADD KEY `fk_user_karyawan` (`fk_user_karyawan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_produk` (`c_produk`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_produk` (`fk_produk`),
  ADD KEY `fk_produk_2` (`fk_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_costumer` (`fk_user_costumer`),
  ADD KEY `fk_user_karyawan` (`fk_user_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpersediaan`
--
ALTER TABLE `detailpersediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peramalan_transaksi`
--
ALTER TABLE `peramalan_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpersediaan`
--
ALTER TABLE `detailpersediaan`
  ADD CONSTRAINT `detailpersediaan_ibfk_1` FOREIGN KEY (`fk_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `detailpersediaan_ibfk_2` FOREIGN KEY (`fk_persediaan`) REFERENCES `persediaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`fk_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`fk_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  ADD CONSTRAINT `persediaan_ibfk_1` FOREIGN KEY (`fk_user_supplier`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `persediaan_ibfk_2` FOREIGN KEY (`fk_user_karyawan`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`fk_produk`) REFERENCES `produk` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
