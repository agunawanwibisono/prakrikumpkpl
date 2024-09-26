-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Sep 2024 pada 14.41
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuanki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_menu`
--

CREATE TABLE `tb_daftar_menu` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` int(5) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_daftar_menu`
--

INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
(83, '1.png', 'Bakso Aci Komplit', 'A', 1, 10, '5'),
(85, '2.png', 'Bakso Aci Original', 'B', 1, 20, '10'),
(86, '3.png', 'Mie Yamin', 'C', 1, 30, '10'),
(89, '4.png', 'Susu', 'Susu', 4, 10, '20'),
(93, '5.png', '5', '5', 2, 10, '50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_menu`
--

CREATE TABLE `tb_kategori_menu` (
  `id` int(11) NOT NULL,
  `jenis_menu` int(11) NOT NULL,
  `kategori_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_menu`
--

INSERT INTO `tb_kategori_menu` (`id`, `jenis_menu`, `kategori_menu`) VALUES
(1, 1, 'Nasi'),
(2, 1, 'Snack'),
(3, 2, 'Jus'),
(4, 2, 'Kopi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `alamat`, `level`, `nama`, `nohp`) VALUES
(74, 'abc3@abc.com', 'aabbcc33', '', 3, 'abc3', 0),
(81, 'abc1@abc.com', 'password', 'hbjhbhb', 1, 'abc1', 876767),
(82, 'abc2@abc.com', 'aabbcc22', 'kjbnjknbkb', 1, 'abc2', 868787),
(89, 'cwecewc', 'ececefc', 'ecfc', 2, 'efcefc', 34355353),
(90, 'wdcne jc', 'sc ef', 'sfc ejfcesc', 2, 'mclwmnc', 248274);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `tb_kategori_menu`
--
ALTER TABLE `tb_kategori_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_menu`
--
ALTER TABLE `tb_kategori_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD CONSTRAINT `tb_daftar_menu_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_menu` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
