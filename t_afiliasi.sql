-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2021 pada 07.21
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siswarajin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_afiliasi`
--

CREATE TABLE `t_afiliasi` (
  `id_afiliasi` int(11) NOT NULL,
  `id_user_afil` int(11) NOT NULL,
  `id_user_new` int(11) NOT NULL,
  `koin` int(11) NOT NULL,
  `tgl_afiliasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_afiliasi`
--

INSERT INTO `t_afiliasi` (`id_afiliasi`, `id_user_afil`, `id_user_new`, `koin`, `tgl_afiliasi`) VALUES
(1, 13, 26, 15, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_afiliasi`
--
ALTER TABLE `t_afiliasi`
  ADD PRIMARY KEY (`id_afiliasi`),
  ADD KEY `id_user_afil` (`id_user_afil`),
  ADD KEY `id_user_new` (`id_user_new`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_afiliasi`
--
ALTER TABLE `t_afiliasi`
  MODIFY `id_afiliasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_afiliasi`
--
ALTER TABLE `t_afiliasi`
  ADD CONSTRAINT `t_afiliasi_ibfk_1` FOREIGN KEY (`id_user_afil`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_afiliasi_ibfk_2` FOREIGN KEY (`id_user_new`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
