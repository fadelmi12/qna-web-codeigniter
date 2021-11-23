-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2021 pada 14.18
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siswarajin_neh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_setup`
--

CREATE TABLE `t_setup` (
  `id_setup` int(11) NOT NULL,
  `nama_fitur` varchar(50) NOT NULL,
  `status_fitur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_setup`
--

INSERT INTO `t_setup` (`id_setup`, `nama_fitur`, `status_fitur`) VALUES
(1, 'afiliasi', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_setup`
--
ALTER TABLE `t_setup`
  ADD PRIMARY KEY (`id_setup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_setup`
--
ALTER TABLE `t_setup`
  MODIFY `id_setup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
