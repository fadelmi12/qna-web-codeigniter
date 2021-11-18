-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 06:30 PM
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
-- Database: `siswarajin`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tag`
--

CREATE TABLE `kategori_tag` (
  `id_kategori_tag` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `svg` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_tag`
--

INSERT INTO `kategori_tag` (`id_kategori_tag`, `nama_kategori`, `svg`) VALUES
(1, 'Teknologi', 'dashicons:laptop'),
(2, 'Sosial', 'fluent:people-audience-24-filled'),
(3, 'Bahasa', 'dashicons:book-alt'),
(4, 'Seni', 'map:art-gallery'),
(5, 'Politik', 'map:political'),
(6, 'Marketing', 'icon-park-outline:market-analysis'),
(7, 'Finance', 'mdi:finance');

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id` int(11) NOT NULL,
  `device` varchar(250) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id`, `device`, `ip`, `browser`, `email`, `date`) VALUES
(1, 'Windows 10', '::1', 'Chrome', '', ''),
(2, 'Windows 10', '::1', 'Chrome', 'bepeduapuluh@gmail.com', ''),
(3, 'Windows 10', '::1', 'Chrome', 'admin@gmail.com', ''),
(4, 'Windows 10', '::1', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Oct-29 03:29'),
(5, 'Windows 10', '::1', 'Chrome', 'admin@gmail.com', '2021-Oct-29 03:29'),
(6, 'Windows 10', '::1', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Oct-29 09:50'),
(7, 'Windows 10', '::1', 'Chrome', 'admin@gmail.com', '2021-Oct-29 09:50'),
(8, 'Windows 10', '36.72.215.30', 'Chrome', 'admin@gmail.com', '2021-Oct-29 10:08'),
(9, 'Windows 10', '115.178.227.36', 'Chrome', 'admin@gmail.com', '2021-Oct-29 10:12'),
(10, 'Windows 10', '115.178.227.36', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Oct-29 10:13'),
(11, 'Windows 10', '115.178.227.36', 'Chrome', 'admin@gmail.com', '2021-Oct-29 10:16'),
(12, 'Windows 10', '115.178.227.36', 'Chrome', 'event1945@gmail.com', '2021-Oct-29 10:27'),
(13, 'Windows 10', '36.72.215.30', 'Chrome', 'admin@gmail.com', '2021-Oct-29 10:29'),
(14, 'Android', '114.142.169.23', 'Chrome', 'admin@admin.com', '2021-Oct-29 10:38'),
(15, 'Android', '114.142.169.23', 'Chrome', 'admin@gmail.com', '2021-Oct-29 10:38'),
(16, 'Windows 10', '36.78.139.113', 'Chrome', 'alex@gmail.com', '2021-Oct-30 15:25'),
(17, 'Windows 10', '36.78.139.113', 'Chrome', 'dhanter@gmail.com', '2021-Oct-30 15:26'),
(18, 'Windows 10', '36.78.139.113', 'Chrome', 'alex@gmail.com', '2021-Oct-30 15:26'),
(19, 'iOS', '116.206.40.39', 'Safari', 'alex@gmail.com', '2021-Oct-30 19:36'),
(20, 'iOS', '116.206.40.39', 'Safari', 'dhanter@gmail.com', '2021-Oct-30 19:37'),
(21, 'Windows 10', '115.178.227.45', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Oct-30 19:54'),
(22, 'Windows 10', '115.178.227.45', 'Chrome', 'admin@gmail.com', '2021-Oct-30 20:01'),
(23, 'Windows 10', '115.178.227.45', 'Chrome', 'alex@gmail.com', '2021-Oct-30 20:10'),
(24, 'Windows 10', '115.178.227.45', 'Chrome', 'admin@gmail.com', '2021-Oct-30 20:12'),
(25, 'Windows 10', '120.188.77.124', 'Chrome', 'bepeduapuluh@Gmail.com', '2021-Oct-30 20:13'),
(26, 'Windows 10', '115.178.227.45', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Oct-30 20:19'),
(27, 'Android', '120.188.77.124', 'Chrome', 'admin@gmail.com', '2021-Oct-30 20:28'),
(28, 'Android', '114.142.170.19', 'Chrome', 'fadelirsyad05@gmail.com', '2021-Oct-30 21:19'),
(29, 'Android', '114.142.170.19', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Oct-30 21:20'),
(30, 'Windows 10', '140.213.210.198', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Oct-30 21:22'),
(31, 'Windows 10', '140.213.210.198', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Oct-30 21:26'),
(32, 'iOS', '116.206.40.61', 'Safari', 'alex@gmail.com', '2021-Oct-30 21:27'),
(33, 'Windows 10', '120.188.77.124', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Oct-30 21:27'),
(34, 'Windows 10', '115.178.249.5', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Oct-30 21:27'),
(35, 'Windows 10', '140.213.210.198', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Oct-30 21:28'),
(36, 'Windows 10', '115.178.249.5', 'Chrome', 'admin@gmail.com', '2021-Oct-30 21:29'),
(37, 'Windows 10', '120.188.77.124', 'Chrome', 'admin@gail.com', '2021-Oct-30 21:47'),
(38, 'Windows 10', '120.188.77.124', 'Chrome', 'admin@gmail.com', '2021-Oct-30 21:47'),
(39, 'Windows 10', '116.206.40.31', 'Chrome', 'bepeduapuluh@Gmail.com', '2021-Oct-31 08:30'),
(40, 'Windows 10', '116.206.40.4', 'Chrome', 'alif1@gmail.com', '2021-Nov-01 10:49'),
(41, 'iOS', '116.206.40.125', 'Safari', 'alex@gmail.com', '2021-Nov-01 14:23'),
(42, 'Windows 10', '116.206.40.19', 'Chrome', 'admin@gmail.com', '2021-Nov-01 14:23'),
(43, 'Windows 10', '116.206.40.19', 'Chrome', 'admin5@gmail.com', '2021-Nov-01 14:31'),
(44, 'Windows 10', '116.206.40.19', 'Chrome', 'alif4@gmail.com', '2021-Nov-01 14:32'),
(45, 'Windows 10', '116.206.40.19', 'Chrome', 'admin@gmail.com', '2021-Nov-01 14:32'),
(46, 'Windows 10', '116.206.40.19', 'Chrome', 'alif1@gmail.com', '2021-Nov-01 14:33'),
(47, 'Android', '182.2.41.76', 'Chrome', 'oofficial.sd@gmail.com', '2021-Nov-01 18:25'),
(48, 'Android', '182.2.41.76', 'Chrome', 'oofficial.sd@gmail.com', '2021-Nov-01 18:25'),
(49, 'Android', '182.2.41.76', 'Chrome', 'oofficial.sd@gmail.com', '2021-Nov-01 18:26'),
(50, 'Windows 10', '51.15.74.35', 'Chrome', 'bepeduapuluh@Gmail.com', '2021-Nov-02 00:30'),
(51, 'Windows 10', '114.79.19.238', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-02 12:40'),
(52, 'Windows 10', '114.79.19.238', 'Chrome', 'admin@gmail.com', '2021-Nov-02 12:41'),
(53, 'Windows 7', '110.136.152.20', 'Chrome', 'hd722875@gmail.com', '2021-Nov-02 14:59'),
(54, 'Windows 10', '182.2.72.171', 'Chrome', '', '2021-Nov-03 09:43'),
(55, 'Android', '182.2.72.171', 'Chrome', 'auliafaizah397@gmail.com', '2021-Nov-03 09:49'),
(56, 'Windows 10', '125.167.95.121', 'Chrome', 'alex@gmail.com', '2021-Nov-03 22:14'),
(57, 'Windows 10', '182.0.205.143', 'Chrome', 'hd722875@gmail.com', '2021-Nov-04 11:33'),
(58, 'Windows 10', '182.0.205.143', 'Chrome', '', '2021-Nov-04 11:33'),
(59, 'Windows 10', '182.0.205.143', 'Chrome', 'hd722875@gmail.com', '2021-Nov-04 11:33'),
(60, 'Windows 10', '182.0.205.143', 'Chrome', 'hd722875@gmail.com', '2021-Nov-04 11:33'),
(61, 'Windows 10', '182.0.205.143', 'Chrome', 'hd722875@gmail.com', '2021-Nov-04 11:35'),
(62, 'Windows 10', '182.0.205.143', 'Chrome', 'hd722875@gmail.com', '2021-Nov-04 11:36'),
(63, 'Windows 10', '115.178.226.176', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-04 20:06'),
(64, 'Windows 10', '115.178.226.176', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-04 20:06'),
(65, 'Windows 10', '115.178.246.216', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-05 10:57'),
(66, 'Windows 10', '115.178.246.216', 'Chrome', 'admin@gmail.com', '2021-Nov-05 11:29'),
(67, 'Windows 10', '115.178.246.216', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-05 11:29'),
(68, 'Windows 10', '115.178.246.216', 'Chrome', 'admin@gmail.com', '2021-Nov-05 11:32'),
(69, 'Windows 10', '115.178.246.216', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-05 11:32'),
(70, 'Windows 10', '115.178.246.216', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-05 11:33'),
(71, 'Windows 10', '115.178.246.216', 'Chrome', 'admin@gmail.com', '2021-Nov-05 11:34'),
(72, 'Windows 10', '115.178.246.216', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-05 11:35'),
(73, 'Windows 10', '125.167.95.121', 'Chrome', 'admin@gmail.com', '2021-Nov-05 12:23'),
(74, 'Windows 10', '94.158.190.52', 'Chrome', 'everodo24@mail.ru', '2021-Nov-06 06:13'),
(75, 'Windows 10', '125.167.95.121', 'Chrome', 'dekapra@gmail.com', '2021-Nov-07 20:32'),
(76, 'Windows 10', '125.167.95.121', 'Chrome', 'alex@gmail.com', '2021-Nov-07 20:33'),
(77, 'Windows 10', '125.167.95.121', 'Chrome', 'admin@gmail.com', '2021-Nov-07 20:33'),
(78, 'Windows 10', '125.167.95.121', 'Chrome', 'admin@gmail.com', '2021-Nov-07 20:35'),
(79, 'Windows 10', '125.167.95.121', 'Chrome', 'alex@gmail.com', '2021-Nov-07 20:35'),
(80, 'Windows 10', '180.253.163.66', 'Chrome', 'alex@gmail.com', '2021-Nov-08 20:19'),
(81, 'Windows 10', '180.253.163.66', 'Chrome', 'dekapra@gmail.com', '2021-Nov-08 20:25'),
(82, 'Windows 10', '180.253.163.66', 'Chrome', 'admin@gmail.com', '2021-Nov-08 20:25'),
(83, 'Windows 10', '180.253.163.66', 'Chrome', 'dekapra@gmail.com', '2021-Nov-08 20:28'),
(84, 'Windows 10', '180.253.163.66', 'Chrome', 'dekapra@gmail.com', '2021-Nov-08 20:29'),
(85, 'Windows 10', '114.79.17.91', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-08 20:38'),
(86, 'Windows 10', '180.253.163.66', 'Chrome', 'dekapra@gmail.com', '2021-Nov-08 20:38'),
(87, 'Windows 10', '114.79.17.91', 'Chrome', 'sayapunyasaham@gmail.com', '2021-Nov-08 20:38'),
(88, 'Windows 10', '180.253.163.66', 'Chrome', 'admin@gmail.com', '2021-Nov-08 20:39'),
(89, 'Windows 10', '114.79.17.91', 'Chrome', 'event1945@gmail.com', '2021-Nov-08 20:41'),
(90, 'Windows 10', '114.79.17.91', 'Chrome', 'thousani@pnm.ac.id', '2021-Nov-08 20:41'),
(91, 'Windows 10', '114.79.17.91', 'Chrome', 'thousani@pnm.ac.id', '2021-Nov-08 20:41'),
(92, 'Windows 10', '116.206.40.87', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Nov-08 20:45'),
(93, 'Windows 10', '116.206.40.87', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Nov-08 20:48'),
(94, 'Windows 10', '180.253.163.66', 'Chrome', 'dekapra@gmail.com', '2021-Nov-08 20:56'),
(95, 'Windows 10', '116.206.40.79', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Nov-08 22:46'),
(96, 'Windows 10', '180.253.163.66', 'Chrome', 'admin@gmail.com', '2021-Nov-09 20:13'),
(97, 'Windows 10', '180.253.163.66', 'Chrome', 'dekapra@gmail.com', '2021-Nov-09 20:15'),
(98, 'Windows 10', '180.253.163.66', 'Chrome', 'admin@gmail.com', '2021-Nov-09 20:16'),
(99, 'Windows 10', '180.253.163.66', 'Chrome', 'dekapra@gmail.com', '2021-Nov-09 20:17'),
(100, 'Windows 10', '180.253.163.66', 'Chrome', 'alex@gmail.com', '2021-Nov-09 20:46'),
(101, 'Windows 10', '202.67.40.12', 'Chrome', 'bepeduapuluh@Gmail.com', '2021-Nov-09 20:46'),
(102, 'Windows 10', '116.206.40.123', 'Chrome', 'admin@gmail.com', '2021-Nov-09 20:47'),
(103, 'Windows 10', '180.253.163.66', 'Chrome', 'admin@gmail.com', '2021-Nov-09 21:37'),
(104, 'Windows 10', '202.67.40.9', 'Chrome', 'bepeduapuluh@gmail.com', '2021-Nov-09 21:57'),
(105, 'Windows 10', '::1', 'Chrome', 'bepeduapuluh@Gmail.com', '2021-Nov-10 14:51'),
(106, 'Windows 10', '::1', 'Chrome', 'admin@gmail.com', '2021-Nov-10 16:50'),
(107, 'Windows 10', '::1', 'Chrome', 'bepeduapuluh@Gmail.com', '2021-Nov-12 14:09'),
(108, 'Windows 10', '::1', 'Chrome', 'admin@gmail.com', '2021-Nov-12 14:13'),
(109, 'Windows 10', '::1', 'Chrome', 'admin@gmail.com', '2021-Nov-12 18:00'),
(110, 'Windows 10', '::1', 'Chrome', 'admin@gmail.com', '2021-Nov-12 20:25');

-- --------------------------------------------------------

--
-- Table structure for table `log_money`
--

CREATE TABLE `log_money` (
  `id_logMoney` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_log` tinyint(1) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket_log` varchar(150) NOT NULL,
  `tgl_log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_money`
--

INSERT INTO `log_money` (`id_logMoney`, `id_user`, `status_log`, `jumlah`, `ket_log`, `tgl_log`) VALUES
(1, 1, 1, 25, 'Menjawab', '2021-11-04 05:37:49'),
(3, 1, 0, 20, 'Membuat Pertanyaan', '2021-11-04 05:37:49'),
(6, 3, 1, 5000, 'Menjawab Betul Pertanyaan', '2021-11-04 05:37:49'),
(7, 3, 0, 1000, 'Mendownload', '2021-11-04 05:37:49'),
(8, 1, 1, 1000, 'Artikel Di Download', '2021-11-04 05:37:49'),
(9, 1, 0, 550, 'Penarikan Uang', '2021-11-04 05:37:49'),
(10, 1, 0, 550, 'Penarikan Uang', '2021-11-04 05:46:52'),
(11, 1, 0, 20, 'Membuat Pertanyaan', '2021-11-04 05:47:23'),
(12, 3, 0, 0, 'Mendownload', '2021-11-04 05:50:55'),
(13, 1, 1, 0, 'Artikel Di Download', '2021-11-04 05:50:55'),
(14, 3, 0, 70, 'Mendownload', '2021-11-04 05:51:44'),
(15, 1, 1, 70, 'Artikel Di Download', '2021-11-04 05:51:44'),
(16, 3, 1, 5000, 'Menjawab Betul Pertanyaan', '2021-11-04 05:52:55'),
(17, 2, 0, 10, 'Membuat Pertanyaan', '2021-11-08 15:48:43'),
(18, 10, 0, 10, 'Membuat Pertanyaan', '2021-11-09 13:17:41'),
(19, 1, 0, 0, 'Mendownload', '2021-11-09 13:46:13'),
(20, 1, 1, 0, 'Artikel Di Download', '2021-11-09 13:46:13'),
(21, 2, 0, 0, 'Mendownload', '2021-11-09 13:47:00'),
(22, 1, 1, 0, 'Artikel Di Download', '2021-11-09 13:47:00'),
(23, 6, 0, 0, 'Mendownload', '2021-11-09 13:47:51'),
(24, 1, 1, 0, 'Artikel Di Download', '2021-11-09 13:47:51'),
(25, 6, 0, 0, 'Mendownload', '2021-11-09 13:48:09'),
(26, 1, 1, 0, 'Artikel Di Download', '2021-11-09 13:48:09'),
(27, 2, 0, 550, 'Penarikan Uang', '2021-11-12 07:27:09'),
(28, 2, 0, 550, 'Penarikan Uang', '2021-11-12 08:07:04'),
(29, 13, 0, 550, 'Penarikan Uang', '2021-11-12 08:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `t_aktivitas`
--

CREATE TABLE `t_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aktivitas` varchar(50) NOT NULL,
  `waktu_aktivitas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_aktivitas`
--

INSERT INTO `t_aktivitas` (`id_aktivitas`, `id_user`, `aktivitas`, `waktu_aktivitas`) VALUES
(3, 25, 'registrasi', '2021-10-08 01:32:44'),
(7, 9, 'registrasi', '2021-10-12 05:50:50'),
(8, 10, 'registrasi', '2021-10-13 10:06:47'),
(9, 11, 'registrasi', '2021-10-16 21:16:17'),
(10, 10, 'up_pertanyaan', '2021-10-17 18:53:47'),
(11, 10, 'up_pertanyaan', '2021-10-19 09:50:19'),
(12, 10, 'up_pertanyaan', '2021-10-19 09:54:07'),
(13, 10, 'up_pertanyaan', '2021-10-19 09:54:54'),
(14, 11, 'up_pertanyaan', '2021-10-19 10:13:05'),
(15, 12, 'registrasi', '2021-10-19 19:25:03'),
(16, 12, 'up_pertanyaan', '2021-10-19 22:05:31'),
(17, 10, 'up_pertanyaan', '2021-10-20 12:52:50'),
(18, 10, 'up_pertanyaan', '2021-10-20 12:56:05'),
(19, 10, 'up_pertanyaan', '2021-10-20 13:03:55'),
(20, 10, 'up_pertanyaan', '2021-10-20 13:18:44'),
(21, 10, 'up_pertanyaan', '2021-10-20 14:04:35'),
(22, 10, 'up_pertanyaan', '2021-10-20 14:05:22'),
(23, 10, 'up_pertanyaan', '2021-10-20 14:09:48'),
(24, 10, 'up_pertanyaan', '2021-10-20 14:10:06'),
(25, 10, 'up_pertanyaan', '2021-10-20 14:11:34'),
(26, 10, 'up_pertanyaan', '2021-10-20 14:12:03'),
(27, 10, 'up_pertanyaan', '2021-10-20 14:21:44'),
(28, 10, 'up_pertanyaan', '2021-10-20 14:23:11'),
(29, 10, 'up_pertanyaan', '2021-10-20 14:28:06'),
(30, 10, 'up_pertanyaan', '2021-10-20 14:30:52'),
(31, 10, 'up_pertanyaan', '2021-10-20 14:34:58'),
(32, 10, 'up_pertanyaan', '2021-10-20 14:35:32'),
(33, 10, 'up_pertanyaan', '2021-10-20 14:36:21'),
(34, 10, 'up_pertanyaan', '2021-10-20 14:36:55'),
(35, 10, 'up_pertanyaan', '2021-10-20 14:44:13'),
(36, 10, 'up_pertanyaan', '2021-10-20 14:44:35'),
(37, 10, 'up_pertanyaan', '2021-10-20 14:44:55'),
(38, 10, 'up_pertanyaan', '2021-10-20 14:45:46'),
(39, 10, 'up_pertanyaan', '2021-10-20 14:47:22'),
(40, 13, 'registrasi', '2021-10-20 23:55:59'),
(41, 13, 'up_pertanyaan', '2021-10-22 21:56:59'),
(42, 14, 'registrasi', '2021-10-23 13:27:24'),
(43, 14, 'up_pertanyaan', '2021-10-23 13:29:29'),
(44, 13, 'up_pertanyaan', '2021-10-28 19:59:02'),
(45, 13, 'up_pertanyaan', '2021-10-28 20:01:49'),
(46, 15, 'registrasi', '2021-10-28 20:09:58'),
(47, 13, 'up_pertanyaan', '2021-10-28 20:22:13'),
(48, 10, 'up_pertanyaan', '2021-10-28 20:22:36'),
(49, 13, 'up_pertanyaan', '2021-10-28 20:36:39'),
(50, 15, 'up_pertanyaan', '2021-10-28 20:41:05'),
(51, 16, 'registrasi', '2021-10-28 21:01:23'),
(52, 13, 'up_pertanyaan', '2021-10-28 21:05:42'),
(53, 15, 'up_pertanyaan', '2021-10-28 21:05:51'),
(54, 13, 'up_pertanyaan', '2021-10-28 21:05:58'),
(55, 16, 'up_pertanyaan', '2021-10-28 22:18:04'),
(56, 16, 'up_pertanyaan', '2021-10-28 22:19:29'),
(57, 17, 'registrasi', '2021-10-29 06:35:20'),
(58, 15, 'up_pertanyaan', '2021-10-29 09:21:29'),
(59, 15, 'up_pertanyaan', '2021-10-29 09:22:39'),
(60, 17, 'up_pertanyaan', '2021-10-29 09:54:13'),
(61, 17, 'up_pertanyaan', '2021-10-29 09:55:17'),
(62, 16, 'up_pertanyaan', '2021-10-30 21:29:13'),
(63, 16, 'up_pertanyaan', '2021-10-30 21:30:20'),
(64, 18, 'registrasi', '2021-11-01 10:48:48'),
(65, 19, 'registrasi', '2021-11-02 14:59:19'),
(66, 16, 'up_pertanyaan', '2021-11-05 11:29:00'),
(67, 16, 'up_pertanyaan', '2021-11-05 11:29:24'),
(68, 16, 'up_pertanyaan', '2021-11-05 11:31:53'),
(69, 16, 'up_pertanyaan', '2021-11-05 11:32:24'),
(70, 20, 'registrasi', '2021-11-08 20:28:03'),
(71, 21, 'registrasi', '2021-11-08 20:34:46'),
(72, 24, 'registrasi', '2021-11-08 22:48:43'),
(73, 25, 'registrasi', '2021-11-09 20:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `t_artikel`
--

CREATE TABLE `t_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tahun_rilis` varchar(25) NOT NULL,
  `deskripsi_artikel` text NOT NULL,
  `jumlah_halaman` int(25) NOT NULL,
  `author` varchar(250) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `file_pdf` varchar(250) NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `status_tampil` tinyint(1) NOT NULL,
  `harga_artikel` int(11) NOT NULL,
  `jumlah_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_artikel`
--

INSERT INTO `t_artikel` (`id_artikel`, `judul_artikel`, `id_user`, `tahun_rilis`, `deskripsi_artikel`, `jumlah_halaman`, `author`, `slug`, `file_pdf`, `tanggal_upload`, `status_tampil`, `harga_artikel`, `jumlah_view`) VALUES
(1, 'GGWP', 10, '1999', 'Abstrak Warna yang diterima oleh mata dari sebuah objek ditentukan oleh warna sinar yang dipantulkan oleh objek tersebut. Digitalisasi yaitu gambar yang diolah dengan komputer digital, direpresentasikan secara numerik dengan nilai-nilai diskrit. Deteksi tepi merupakan langkah untuk melengkapi informasi di dalam citra, tepi mencirikan batas-batas objek berguna untuk proses segmentasi dan identifikasi objek. Deteksi tepi citra bertujuan meningkatkan penampakan garis batas daerah atau objek. Proses segmentasi mengidentifikasi objek dalam beberapa potongan gambar yang bertujuan untuk mempermudah membaca informasi citra. Metode segmentasi mengasumsikan setiap objek cenderung memiliki warna yang homogen dan terletak pada kisaran keabuan tertentu. Setiap komponen warna menggunakan 8 bit (nilainya berkisar antara 0 sampai dengan 255). Proses thresholding mengkonversi citra warna menjadi hitam dan putih sehingga mempermudah mendeteksi objek.', 10, 'samid', 'implementasi-teknik-threshoding-pada-segmentasi-citra-digital', 'GGWP232726.pdf', '2021-09-24 23:27:26', 1, 0, 0),
(2, 'Perbandingan Metode Peningkatan Kualitas Citra dan Deteksi Tepi pada Citra Kutu Kebul', 10, '2020', 'Abstrak-Citra digital dapat dijadikan sebagai sumber untuk memperoleh informasi yang dapat digunakan untuk menentukan suatu keputusan. Sebagai informasi, pengolahan citra digital perlu dilakukan dengan beberapa metode dan operasi. Pre-processing menjadi tahapan awal dalam pengolahan citra untuk meningkatkan kualitas citra digital. Terdapat beberapa metode pre-processing yang dapat digunakan untuk melakukan pengolahan citra digital. Operasi pre-processing yang dapat digunakan diantaranya histogram equalization, operasi titik, intensity adjustment, thresholding, median averaging, median filtering, dan fast fouring transform. Setiap metode dari pre-processing memiliki algoritma yang berbeda dengan tujuan yang sama yaitu untuk meningkatkan kualitas citra. Penggunaan metode pre-processing dapat dilakukan dengan mengambil salah satu metode terbaik sebelum melakukan proses pengolahan citra. Dari hasil pre-processing kemudian diolah kembali dengan metode deteksi tepi sobel, isotropic, canny, dan gradient untuk mendeteksi kutu kebul pada daun. Dari deteksi tepi yang dilakukan, operasi canny paling tidak sesuai untuk mendeteksi kutu kebul pada daun.', 1, 'wadkawd', 'perbandingan-metode-peningkatan-kualitas-citra-dan-deteksi-tepi-pada-citra-kutu-kebul', 'wadwd.pdf\r\n', '0000-00-00 00:00:00', 1, 1000, 0),
(3, 'Analisa Tekstur Kulit Wajah', 10, '2019', 'The problem in determining the selection of soybean seeds for replanting, especially in East Nusa Tenggara is still an important issue. The thing that affects the quality of soybean seeds is found broken seeds, dull seeds, dirty seeds, and broken seeds due to the process of drying and shelling. Determination of soy bean quality is usually done manually by visual observation. The manual system takes a long time and produces products with inconsistent quality due to visual limitations, fatigue, and different perceptions of each observer. This research was conducted using comparison of image texture extraction with statistical methods of order I (color moment) and order II statistics (GLCM) for soy bean selection. Order I statistics (color moment) show the probability of the appearance of the value of the gray degree of pixels in an image, while the order II statistics (GLCM) show the probability of a neighborhood relationship between two pixels that form a cohesion matrix from the image data. This research is expected to help the classification process in determining soybean seeds. The k-Nearest Neighbor (k-NN) algorithm used in previous studies to classify the image objects to be examined. The results of this study were successfully conducted using k-Nearest Neighbor (k-NN) with euclidean distance and k = 1 with the results of color moment extracts getting the highest accuracy of 88% and the results of GLCM feature extraction for homogeneity characteristics of 75.5%, correlations of 78.67% , contrast is 65.75% and energy is 63.83% with an average accuracy of 70.93%.', 25, 'Fadel M', 'analisa-tekstur-kulit-wajah', 'jawaban-telo.pdf', '0000-00-00 00:00:00', 1, 0, 0),
(27, 'Asyiknya Bercocok Tanam', 1, '2020', 'Buku Modul Bercocok Tanam', 24, 'Kemendikbud', 'panduan-bercocok-tanam', 'tanam.pdf', '2021-10-30 09:53:07', 1, 0, 0),
(28, 'Kesehatan Masyarakat', 12, '2020', 'Buku Modul Kesehatan Masyarakat', 24, 'Kemendikbud', 'kesehatan-masyarakat', 'kesmas.pdf', '2021-10-30 10:06:14', 1, 0, 0),
(29, 'Sehat Berolahraga', 12, '2020', 'Buku Modul Sehat Berolahraga', 24, 'Kemendikbud', 'sehat-berolahraga', 'olahraga.pdf', '2021-10-30 10:07:47', 1, 0, 0),
(30, 'Ragam Budaya', 12, '2020', 'Buku Modul Keragaman Budaya Indonesia', 24, 'Kemendikbud', 'ragam-budaya', 'budaya.pdf', '2021-10-30 10:09:55', 1, 0, 0),
(31, 'tips dan trik tembus hibah penelitian dan pengabdian nasional', 16, '2021', 'tips dan trik gimana cara lolos hibah', 90, 'Poltek Fak-Fak', 'tips-dan-trik-tembus-hibah-penelitian-dan-pengabdian-nasional', 'MARKETING_CLASSICS_MARKETING_CLASSICS_MA.pdf', '2021-10-30 20:00:42', 1, 900, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_artikelbookmark`
--

CREATE TABLE `t_artikelbookmark` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `status_save` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_artikelbookmark`
--

INSERT INTO `t_artikelbookmark` (`id`, `id_user`, `id_artikel`, `status_save`) VALUES
(0, 12, 1, 0),
(0, 14, 1, 1),
(0, 12, 1, 0),
(0, 14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_artikeltag`
--

CREATE TABLE `t_artikeltag` (
  `id_artikeltag` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `idTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_artikeltag`
--

INSERT INTO `t_artikeltag` (`id_artikeltag`, `id_artikel`, `idTag`) VALUES
(3, 1, 7),
(4, 1, 8),
(5, 3, 5),
(6, 31, 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_bank`
--

CREATE TABLE `t_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `kode_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_bank`
--

INSERT INTO `t_bank` (`id_bank`, `nama_bank`, `kode_bank`) VALUES
(1, 'BNI', 0),
(2, 'BCA', 0),
(3, 'Mandiri', 0),
(4, 'BRI', 0),
(5, 'BTN', 0),
(6, 'BSI (Bank Syariah Indonesia)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_beliartikel`
--

CREATE TABLE `t_beliartikel` (
  `id_user` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_beliartikel`
--

INSERT INTO `t_beliartikel` (`id_user`, `id_artikel`) VALUES
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_bookmark`
--

CREATE TABLE `t_bookmark` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `status_bookmark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bookmark`
--

INSERT INTO `t_bookmark` (`id`, `id_user`, `id_pertanyaan`, `status_bookmark`) VALUES
(85, 1, 15, 1),
(95, 16, 61, 1),
(96, 13, 61, 0),
(97, 13, 59, 1),
(98, 14, 60, 1),
(99, 18, 62, 1),
(100, 18, 59, 0),
(101, 18, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_faq`
--

CREATE TABLE `t_faq` (
  `id_faq` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_faq`
--

INSERT INTO `t_faq` (`id_faq`, `question`, `answer`) VALUES
(1, 'Apa itu siswarajin.com ?', 'Siswarajin merupakan website untuk membantu menjawab soal dan pertanyaanmu. Kamu juga bisa mendapatkan uang dengan menjawab pertanyaan.'),
(2, 'Apakah kita bisa mendapatkan uang di siswarajin.com ?', 'Tentu saja, anda dapat menghasilkan uang di siswarajin.com dengan cara menjawab pertanyaan yang diajukan.'),
(3, 'Bagaimana cara mendapatkan uang di siswarajin.com ?', 'Anda dapat memperoleh coin dari menjawab pertanyaan yang nantinya akan dapat di tukarkan dengan uang.'),
(4, 'Apa saja yang dapat kita tanyakan di siswarajin.com?', 'Kita dapat bertanya seputar materi sekolah dan tugas yang diberikan guru.'),
(5, 'Bagaimana cara mencairkan uang di siswarajin.com ?', 'Untuk mencairkan uang, anda harus terlebih dahulu menghubungkan akun anda dengan rekening. Selanjutnya buat permintaan penarikan di menu keuangan.');

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban`
--

CREATE TABLE `t_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `jawaban_benar` tinyint(1) NOT NULL DEFAULT 0,
  `status_sembunyi` tinyint(1) NOT NULL DEFAULT 0,
  `gambar_jawab` varchar(250) NOT NULL,
  `waktu_jawab` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jawaban`
--

INSERT INTO `t_jawaban` (`id_jawaban`, `id_user`, `id_pertanyaan`, `jawaban`, `jawaban_benar`, `status_sembunyi`, `gambar_jawab`, `waktu_jawab`) VALUES
(4, 1, 6, 'diketik lah', 0, 0, '', '2021-09-05 09:55:15'),
(6, 1, 6, 'stack bos', 0, 0, '', '2021-09-08 15:29:01'),
(8, 1, 14, 'a. F', 0, 0, '', '2021-09-12 01:52:34'),
(9, 1, 13, 'awdawd', 0, 0, '', '2021-09-12 03:22:41'),
(10, 1, 15, 'uyeeeeew', 0, 0, '', '2021-09-12 10:51:16'),
(11, 1, 15, '', 0, 0, '', '2021-09-12 10:51:26'),
(12, 1, 15, '', 0, 0, '', '2021-09-12 10:52:58'),
(13, 1, 15, 'wdawd', 0, 0, '', '2021-09-12 10:53:41'),
(20, 1, 15, 'fadel', 0, 0, 'arfi_aa1.jpg', '2021-09-18 06:01:29'),
(21, 1, 15, 'fff', 0, 0, 'WhatsApp_Image_2021-08-03_at_22_22_29.jpeg', '2021-09-18 06:01:52'),
(23, 6, 17, 'gak ngerti aku', 0, 0, '', '2021-10-04 03:16:55'),
(25, 11, 23, 'cina', 1, 0, '', '2021-10-18 22:05:56'),
(26, 11, 22, 'jendral', 1, 0, '', '2021-10-18 22:07:18'),
(27, 13, 23, 'oit', 1, 0, '', '2021-10-18 22:10:35'),
(28, 14, 6, 'oioi', 1, 0, '', '2021-10-23 06:44:29'),
(29, 14, 48, 'jojol', 1, 0, '', '2021-10-28 11:53:31'),
(30, 17, 59, 'homooo', 1, 0, '', '2021-10-28 23:35:55'),
(31, 13, 58, 'KNIL adalah singkatan dari bahasa Belanda, yaitu Koninklijke Nederlands(ch)-Indische Leger, atau secara harafiah artinya Tentara Kerajaan Hindia Belanda', 1, 0, '', '2021-10-29 02:09:02'),
(32, 13, 60, 'Dokuritsu Junbi Cosakai', 1, 0, '', '2021-10-29 02:23:51'),
(33, 16, 61, 'kasih tau ga yaa', 0, 0, '', '2021-10-29 02:57:53'),
(34, 12, 62, 'sudah liat', 0, 0, '', '2021-11-05 04:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `logo_abu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `nama_kategori`, `gambar`, `logo_abu`) VALUES
(1, 'Matematika', 'client-5.svg', 'ic:outline-calculate'),
(2, 'Kimia', 'client-7.svg', 'carbon:chemistry'),
(4, 'Biologi', 'client-4.svg', 'entypo:leaf'),
(5, 'Sejarah', 'client-6.svg', 'ic:round-temple-buddhist'),
(6, 'Geografi', 'client-9.svg', 'bx:bx-world'),
(7, 'Ekonomi', 'client-10.svg', 'emojione-monotone:balance-scale'),
(8, 'Bhs.Indonesia', 'client-1.svg', 'clarity:book-solid'),
(10, 'Fisika', 'client-3.svg', 'clarity:atom-line'),
(11, 'Komputer', 'client-2.svg', 'emojione-monotone:laptop-computer');

-- --------------------------------------------------------

--
-- Table structure for table `t_like`
--

CREATE TABLE `t_like` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `status_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_like`
--

INSERT INTO `t_like` (`id`, `id_user`, `id_pertanyaan`, `status_like`) VALUES
(238, 3, 15, 1),
(239, 3, 14, 1),
(241, 3, 13, 1),
(242, 1, 14, 1),
(243, 1, 13, 1),
(246, 1, 15, 1),
(247, 1, 17, 0),
(248, 1, 18, 1),
(253, 3, 18, 1),
(254, 3, 17, 1),
(255, 3, 17, 1),
(257, 3, 17, 1),
(258, 3, 17, 1),
(259, 3, 17, 1),
(260, 8, 18, 1),
(261, 8, 5, 1),
(264, 8, 6, 1),
(265, 8, 8, 1),
(266, 3, 5, 1),
(274, 10, 18, 1),
(276, 10, 15, 0),
(278, 10, 5, 0),
(280, 10, 17, 1),
(281, 10, 50, 1),
(282, 10, 48, 0),
(283, 10, 8, 1),
(284, 14, 21, 1),
(285, 14, 50, 1),
(286, 14, 48, 0),
(287, 14, 47, 1),
(288, 14, 33, 1),
(289, 14, 32, 0),
(290, 10, 21, 1),
(291, 10, 22, 1),
(292, 10, 23, 1),
(293, 17, 61, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_love`
--

CREATE TABLE `t_love` (
  `id` int(11) NOT NULL,
  `id_jawaban` int(20) NOT NULL,
  `id_user` int(100) NOT NULL,
  `status_love` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_love`
--

INSERT INTO `t_love` (`id`, `id_jawaban`, `id_user`, `status_love`) VALUES
(26, 29, 14, 0),
(27, 33, 16, 1),
(28, 33, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_message`
--

CREATE TABLE `t_message` (
  `id_message` int(11) NOT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status_baca` tinyint(1) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_message`
--

INSERT INTO `t_message` (`id_message`, `id_pertanyaan`, `id_artikel`, `id_user`, `status_baca`, `pesan`, `tgl_pesan`) VALUES
(1, 15, NULL, 10, 1, 'Sudah Saya Jawab', '2021-10-24 18:00:27'),
(2, 49, NULL, 13, 1, 'Saya Sudaah Menjawab', '2021-10-24 18:30:56'),
(3, 11, NULL, 3, 1, 'Pertanyaan Tidak Pantas', '2021-10-24 18:30:56'),
(4, 7, NULL, 11, 1, 'Saya Sudah Menjawab', '2021-10-24 18:30:56'),
(5, 60, NULL, 13, 0, 'Jawaban Perlu di Verifikasi', '2021-10-29 03:30:33'),
(6, 62, NULL, 18, 0, 'Pertanyaan Tidak Pantas', '2021-11-01 03:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `t_otp`
--

CREATE TABLE `t_otp` (
  `id_otp` int(11) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `kode_otp` int(11) NOT NULL,
  `kadaluarsa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_otp`
--

INSERT INTO `t_otp` (`id_otp`, `no_wa`, `kode_otp`, `kadaluarsa`) VALUES
(1, '08632763276723', 798270, '2021-11-05 01:04:00'),
(2, '081111111111111', 287925, '2021-11-05 02:15:38'),
(3, '0822222222222', 854186, '2021-11-05 02:18:59'),
(4, '0833333333333', 663041, '2021-11-05 14:59:58'),
(5, '0895710605100', 414629, '2021-11-09 20:22:06'),
(6, '085607011503', 273507, '2021-11-08 21:15:31'),
(7, '082222222222222', 216828, '2021-11-08 22:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `t_penarikan`
--

CREATE TABLE `t_penarikan` (
  `id_penarikan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_coin` int(11) NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `tgl_penarikan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_terkirim` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penarikan`
--

INSERT INTO `t_penarikan` (`id_penarikan`, `id_user`, `jumlah_coin`, `jumlah_uang`, `tgl_penarikan`, `status_terkirim`) VALUES
(9, 10, 550, 50000, '2021-11-12 07:19:41', 0),
(10, 10, 550, 50000, '2021-11-12 07:19:41', 0),
(11, 10, 550, 50000, '2021-11-12 07:19:41', 0),
(12, 14, 550, 50000, '2021-11-12 07:20:43', 0),
(13, 10, 600, 55000, '2021-11-12 07:19:42', 0),
(14, 10, 550, 50000, '2021-11-12 07:19:42', 0),
(15, 13, 550, 50000, '2021-11-12 07:20:24', 1),
(16, 13, 5500, 545000, '2021-11-12 07:20:24', 1),
(17, 13, 550, 50000, '2021-11-12 07:20:25', 0),
(18, 16, 5500, 545000, '2021-11-12 07:21:05', 1),
(19, 13, 550, 50000, '2021-11-12 08:09:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_pertanyaan`
--

CREATE TABLE `t_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `status_jawab` tinyint(1) NOT NULL,
  `waktu_question` timestamp NOT NULL DEFAULT current_timestamp(),
  `gambar_tanya` varchar(100) NOT NULL,
  `status_hidden` int(11) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pertanyaan`
--

INSERT INTO `t_pertanyaan` (`id_pertanyaan`, `id_user`, `id_kategori`, `pertanyaan`, `status_jawab`, `waktu_question`, `gambar_tanya`, `status_hidden`, `harga`) VALUES
(5, 1, 1, '1+1 =', 0, '2021-09-05 08:31:18', 'admin.jpg', 0, 0),
(6, 3, 1, 'bagaimana cara coding', 0, '2021-09-05 08:31:18', '', 0, 10000),
(7, 6, 8, 'arti apa apa?', 0, '2021-09-05 08:31:18', '', 0, 0),
(8, 6, 1, '1+1=', 0, '2021-09-05 08:31:18', '', 0, 0),
(9, 5, 4, 'Ilmu yang mempelajari bagian tubuh manusia disebut?', 0, '2021-09-05 08:31:18', '', 0, 0),
(11, 3, 8, 'arti kata kamu', 0, '2021-09-05 08:31:18', '', 0, 0),
(12, 4, 8, 'buatkan contoh puisi ?', 0, '2021-09-05 08:31:18', '', 0, 0),
(13, 3, 8, 'Asas yang digunakan negara-negara di dunia dalam menentukan kewarganegaraan warga negaranya adalah....', 0, '2021-09-05 08:31:58', '', 0, 0),
(14, 3, 5, 'Melalui pendidikan politik, generasi muda diharapkan mengembangkan sikap seperti di bawah ini, kecuali', 0, '2021-09-05 13:27:55', '', 0, 0),
(15, 3, 4, 'aku adalah manusia ? yang bisa hidup bahagia', 0, '2021-09-05 13:33:00', 'images1.jpg', 0, 0),
(17, 1, 8, 'Kalimat majemuk merupakan?', 0, '2021-09-12 03:00:09', '', 0, 0),
(18, 1, 8, 'Kalimat Utama dari sebuah pargraf dilihat dari?', 0, '2021-09-12 03:01:09', '', 0, 0),
(21, 10, 5, 'lubu?', 0, '2021-10-19 02:50:19', '', 0, 0),
(22, 10, 5, 'lubu merupakan?', 0, '2021-10-19 02:54:06', '', 0, 0),
(23, 10, 5, 'lubu jendral dari?', 0, '2021-10-19 02:54:54', '', 0, 0),
(24, 11, 8, 'Leonardo dicaprio merupakan actor dari?', 0, '2021-10-19 03:13:05', '', 0, 0),
(26, 10, 4, 'singkong tanaman berbiji?', 0, '2021-10-20 05:52:50', '', 0, 5000),
(27, 10, 4, 'mangga merupakan tanaman berbiji?', 0, '2021-10-20 05:56:05', '', 0, 5000),
(28, 10, 4, 'Bulan merupakan?', 0, '2021-10-20 06:03:55', '', 0, 5000),
(29, 10, 4, 'kuda itu?', 0, '2021-10-20 06:18:44', '', 0, 10000),
(30, 10, 2, 'Saturnus merupakan planet dengan urutan ke?', 0, '2021-10-20 07:04:34', '', 0, 15000),
(31, 10, 1, 'planet yang memiliki cincin adalah?', 0, '2021-10-20 07:05:22', '', 0, 5000),
(32, 10, 2, 'supernova merupakan?', 0, '2021-10-20 07:09:48', '', 0, 5000),
(33, 10, 2, 'Keren', 0, '2021-10-20 07:10:06', '', 0, 10000),
(34, 10, 4, 'apa', 0, '2021-10-20 07:11:34', '', 0, 5000),
(35, 10, 2, 'bagaimana?', 0, '2021-10-20 07:12:02', '', 0, 15000),
(36, 10, 2, 'assaj', 0, '2021-10-20 07:21:44', '', 0, 10000),
(37, 10, 4, 'asha', 0, '2021-10-20 07:23:11', '', 0, 15000),
(38, 10, 2, 'koaksas', 0, '2021-10-20 07:28:06', '', 0, 10000),
(39, 10, 2, 'asas', 0, '2021-10-20 07:30:52', '', 0, 15000),
(40, 10, 6, 'kask', 0, '2021-10-20 07:34:58', '', 0, 10000),
(41, 10, 4, 'ass', 0, '2021-10-20 07:35:32', '', 0, 15000),
(42, 10, 1, 'assis', 0, '2021-10-20 07:36:21', '', 0, 10000),
(43, 10, 2, 'ashas', 0, '2021-10-20 07:36:55', '', 0, 10000),
(44, 10, 1, '2 x 5?', 0, '2021-10-20 07:44:13', '', 1, 5000),
(45, 10, 4, 'Kuda ?', 0, '2021-10-20 07:44:35', '', 0, 5000),
(46, 10, 5, 'Rengasdengklok?', 0, '2021-10-20 07:44:55', '', 0, 10000),
(47, 10, 2, 'Masa atom air?', 0, '2021-10-20 07:45:46', '', 0, 10000),
(48, 10, 2, 'Carbon monoksida adalha?', 0, '2021-10-20 07:47:22', '', 0, 5000),
(49, 13, 8, 'Apa yang lebih lucu dari 24?', 0, '2021-10-22 14:56:58', '', 1, 10000),
(50, 14, 2, 'how?', 0, '2021-10-23 06:29:28', '', 0, 5000),
(51, 14, 2, 'Kamu merupakan?', 0, '2021-10-27 08:59:07', '', 1, 15),
(52, 14, 2, 'Apa itu?', 0, '2021-10-27 15:18:32', '', 1, 20),
(53, 13, 5, 'Kapan Portugis pertama kali masuk ke Indonesia?', 0, '2021-10-28 12:59:02', '', 1, 25),
(54, 13, 5, 'Siapa penemu bola lampu?', 0, '2021-10-28 13:01:49', '', 1, 25),
(55, 13, 5, 'Siapa penemu benua amerika?', 0, '2021-10-28 13:22:13', '', 0, 25),
(56, 10, 5, 'obito merupakan tokoh dari?', 0, '2021-10-28 13:22:36', '', 1, 25),
(57, 13, 5, 'Siapa nama pahlawan yang dijadikan nama bandara di surabaya?', 0, '2021-10-28 13:36:39', '', 0, 25),
(58, 15, 5, 'Apa kepanjangan dari KNIL?', 1, '2021-10-28 13:41:05', '', 0, 25),
(59, 16, 4, 'burung ketemu burung, disebut apa?', 1, '2021-10-28 15:18:04', '', 0, 25),
(60, 15, 5, 'Apa nama jepang dari BPUPKI?', 1, '2021-10-29 02:21:29', '', 0, 30),
(61, 17, 5, 'Siapa manusia pertama yang ke akhirat?', 0, '2021-10-29 02:54:13', '', 0, 30),
(62, 16, 2, 'coba buka gambar ini', 0, '2021-10-30 14:29:13', 'IMG-20211018-WA0002.jpg', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `t_profile`
--

CREATE TABLE `t_profile` (
  `id_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kota` int(11) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `wallet` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nama_rek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_profile`
--

INSERT INTO `t_profile` (`id_profile`, `id_user`, `nama_lengkap`, `no_hp`, `tgl_lahir`, `alamat`, `kota`, `provinsi`, `gender`, `wallet`, `nama_bank`, `no_rek`, `nama_rek`) VALUES
(1, 10, 'alex pramesta', '0895377941818', '0000-00-00', 'Dagangan, Madiun', 3519, 35, 'laki', 9993224, 'bri', '6518218982181', 'Alex Pramesta'),
(2, 13, 'Bambang Pamungkas', '083323333332', '2021-11-10', 'Jl. Pahlawan', 3216, 32, 'laki', 981165, 'bri', '6856126941862174820', 'Bambang Pamungkas'),
(3, 14, 'dhanter', '089666536', '0000-00-00', '', 0, 0, '', 15900, '', '', ''),
(4, 15, 'Dimas Afrilliyan Purnama', '085607011521', '2021-10-12', '', 0, 0, 'laki', 199999945, '', '', ''),
(5, 16, 'Hifzhan Frima Thousani', '08819390025', '1992-01-13', '', 0, 35, 'laki', 1999993655, 'bni', '12739812871', 'Hifzhan'),
(6, 12, 'Admin Siswa Rajin', '089111111', '2021-10-07', 'Jl.kenagan', 3577, 35, 'Pria', 99999999, 'bri', '651821898276676', 'SiswaRajin'),
(7, 17, 'Depri Tri', '088228356410', '1995-03-22', '', 0, 0, 'perempuan', 15, '', '', ''),
(8, 18, 'Muhammad Alifuddin', '085806773034', '2016-01-14', '', 0, 0, 'laki', 20, '', '', ''),
(9, 19, 'dede aja ', '089601650778', '2000-07-20', '', 0, 0, 'laki', 20, '', '', ''),
(10, 20, 'dekapramesta', '0895377941531', '2021-11-07', '', 0, 0, 'laki', 30, '', '', ''),
(11, 21, 'Kempu', '081237082780', '1995-03-22', '', 0, 0, 'laki', 20, '', '', ''),
(14, 24, 'dimmmmm', '082222222222222', '2021-11-08', '', 0, 0, 'laki', 20, '', '', ''),
(15, 25, 'mama deka', '0895710605100', '2021-11-09', '', 0, 0, 'perempuan', 20, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_tag`
--

CREATE TABLE `t_tag` (
  `idTag` int(11) NOT NULL,
  `id_kategori_tag` int(11) NOT NULL,
  `namaTag` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_tag`
--

INSERT INTO `t_tag` (`idTag`, `id_kategori_tag`, `namaTag`) VALUES
(5, 3, 'Inggris'),
(6, 3, 'Jawa'),
(7, 1, 'Java'),
(8, 1, 'Kotlin'),
(9, 1, 'PHP'),
(10, 2, 'Ketimpangan'),
(11, 2, 'Keadilan');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_topup` varchar(25) NOT NULL,
  `total_topup` int(11) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `status_code` int(11) NOT NULL,
  `pdf_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_user`, `id_topup`, `total_topup`, `payment_type`, `transaction_time`, `status_code`, `pdf_url`) VALUES
(1, 16, '900201930102116', 11000, 'gopay', '2021-10-30 20:19:51', 201, ''),
(2, 16, '705202230102116', 11000, 'bank_transfer', '2021-10-30 20:24:23', 200, 'https://app.midtrans.com/snap/v1/transactions/c151f6ec-2d25-473e-87eb-d53cc5ce119c/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `view_password` varchar(50) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `kode_afiliasi` text NOT NULL,
  `status_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_user`, `email`, `password`, `view_password`, `foto_user`, `role_id`, `kode_afiliasi`, `status_user`) VALUES
(1, 'deka', 'deka@gmail.com', 'deka', '', '', 2, '', 0),
(2, 'pramesta', '', '', '', '', 2, '', 0),
(3, 'alif', 'alif@gmail.com', 'alif5', '', '', 2, '', 0),
(4, 'udin', '', '', '', '', 1, '', 0),
(5, 'dimas', '', '', '', '', 1, '', 0),
(6, 'fadel', '', '', '', '', 1, '', 0),
(7, 'Mamad', 'mamad@gmail.com', 'mamad', '', '', 1, '', 0),
(8, 'alif5', 'alif5@gmail.com', 'alif5', '', '', 2, '', 0),
(9, 'fadelmi12', 'fadelirsyad04@gmail.com', '$2y$10$sWSeXcEQJBLinyV0exH11uTKr7AIS5yPAPrSqeOxNmGKrNlSMeoE2', '', '', 2, '', 1),
(10, 'alex', 'alex@gmail.com', '$2y$10$x8ePSS/TzlGJLnFpBr/gwettckhPZtMOl8q8x/lQz31ZuX0VnCJJ6', '', '', 2, '', 1),
(11, 'samid', 'samid@gmail.com', '$2y$10$zwJ4augJr.xqT2FCv7.wjuf/0CaPcnN0d7uaKmKNIkBzIzXxYcfDi', '', '', 2, '', 0),
(12, 'admin', 'admin@gmail.com', '$2y$10$hwGEZZg.k7DT3/xwiULKWudS7Rh7bbXwWjaVQV4w5vBwlRIxZA7fG', '', '', 77, '', 1),
(13, 'BP20', 'bepeduapuluh@gmail.com', '$2y$10$H1mOKiIJPnPz3JFUluNy5uEYmNjof6FYoDKY0YVPsadso9HfTGhcq', 'bambang', 'user13211021003211.png', 2, '8e296a067a37563370ded05f5a3bf3ec', 1),
(14, 'dhanter', 'dhanter@gmail.com', '$2y$10$UwvJU/UESoEbhsTYBQdp7uUZJ98F1h6VG71lEVReq9XLjft99n8uy', 'Dhanter12', '', 2, '', 1),
(15, 'dimasaf', 'dimasaf@gmail.com', '$2y$10$YPmObvXucm2lGBtQHtqUIOi9c7K5KyNeHQ3woo2alG3DkQa0tKvHW', 'Dimas1987', '', 2, '', 1),
(16, 'HIFR92', 'sayapunyasaham@gmail.com', '$2y$10$4BkMxQm3m8JrdfDoLMIeduU88nvXOUhwumQ14KTHHs1.AInX2oTJa', 'Hifr1301', '', 2, '', 1),
(17, 'deppp', 'event1945@gmail.com', '$2y$10$HAX8j2QpE3hG9Xh.unqSb.5a97GSU9WGywpz40chEqh9pLQmgSYyq', 'Hifr1301', '', 2, '', 1),
(18, 'Alif12', 'alif1@gmail.com', '$2y$10$2sqP140RDygwjlqM6F3fCe8zw143BugWvljv96GmgMLhl4EdOGPfe', 'Alifuddin5', '', 2, '', 1),
(19, 'dede', 'hd722875@gmail.com', '$2y$10$QynIrOqOngdztwRwrfFWhepLN3g4u8e1/KBJzTljwSZ8cJaoI15.O', 'Anaksepi4', '', 2, '', 1),
(20, 'dekapra', 'dekapra@gmail.com', '$2y$10$KeDQbDimfNhnCHV6lsBQtOIR83DBYtdlBZZYu2iY9YuNXpeLdwbFW', 'Dekapra12', '', 2, 'f7e8c772b9bbfa49c15da77dcf82e69c', 1),
(21, 'KempuJosss', 'thousani@pnm.ac.id', '$2y$10$bzYPOqyKZMiL20x9pq9ixOi7zxu9yQPKvpSXaONVfp7.6FJYsfoJq', 'Hifr1301', '', 2, '950bb31c64a2329c4a68d728486e6f63', 1),
(24, 'dimmmmm', 'dim32@gmail.com', '$2y$10$m0ucs8/HZCXwxDd538sUQOvr9KB0Al0OAWB78850ijGfkJP/7QqgG', 'Dim54321', '', 2, '35c8ba18cd2acd76034885daeeeaad5c', 0),
(25, 'mamadeka', 'mamadeka@gmail.com', '$2y$10$a.OaLgtVYI.ZcCgTf0riDOOE51Onm0LxVJ7he4zzvFEmEDqqbTK5G', 'Mamadeka12', '', 2, 'acbee65019b59bc94a301fee375c3915', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_wa`
--

CREATE TABLE `t_wa` (
  `id_wa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_wa`
--

INSERT INTO `t_wa` (`id_wa`, `id_user`, `pesan`, `tanggal`, `status_kirim`) VALUES
(76, 10, 'sjgfsahgdsahfgsakjfhashdfgsah', '0000-00-00 00:00:00', 0),
(77, 13, 'sjgfsahgdsahfgsakjfhashdfgsah', '0000-00-00 00:00:00', 0),
(78, 15, 'sjgfsahgdsahfgsakjfhashdfgsah', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_kabupaten`
--

CREATE TABLE `wilayah_kabupaten` (
  `id` varchar(4) NOT NULL,
  `provinsi_id` varchar(2) NOT NULL DEFAULT '',
  `nama_kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_kabupaten`
--

INSERT INTO `wilayah_kabupaten` (`id`, `provinsi_id`, `nama_kota`) VALUES
('1101', '11', 'Kab. Simeulue'),
('1102', '11', 'Kab. Aceh Singkil'),
('1103', '11', 'Kab. Aceh Selatan'),
('1104', '11', 'Kab. Aceh Tenggara'),
('1105', '11', 'Kab. Aceh Timur'),
('1106', '11', 'Kab. Aceh Tengah'),
('1107', '11', 'Kab. Aceh Barat'),
('1108', '11', 'Kab. Aceh Besar'),
('1109', '11', 'Kab. Pidie'),
('1110', '11', 'Kab. Bireuen'),
('1111', '11', 'Kab. Aceh Utara'),
('1112', '11', 'Kab. Aceh Barat Daya'),
('1113', '11', 'Kab. Gayo Lues'),
('1114', '11', 'Kab. Aceh Tamiang'),
('1115', '11', 'Kab. Nagan Raya'),
('1116', '11', 'Kab. Aceh Jaya'),
('1117', '11', 'Kab. Bener Meriah'),
('1118', '11', 'Kab. Pidie Jaya'),
('1171', '11', 'Kota Banda Aceh'),
('1172', '11', 'Kota Sabang'),
('1173', '11', 'Kota Langsa'),
('1174', '11', 'Kota Lhokseumawe'),
('1175', '11', 'Kota Subulussalam'),
('1201', '12', 'Kab. Nias'),
('1202', '12', 'Kab. Mandailing Natal'),
('1203', '12', 'Kab. Tapanuli Selatan'),
('1204', '12', 'Kab. Tapanuli Tengah'),
('1205', '12', 'Kab. Tapanuli Utara'),
('1206', '12', 'Kab. Toba Samosir'),
('1207', '12', 'Kab. Labuhan Batu'),
('1208', '12', 'Kab. Asahan'),
('1209', '12', 'Kab. Simalungun'),
('1210', '12', 'Kab. Dairi'),
('1211', '12', 'Kab. Karo'),
('1212', '12', 'Kab. Deli Serdang'),
('1213', '12', 'Kab. Langkat'),
('1214', '12', 'Kab. Nias Selatan'),
('1215', '12', 'Kab. Humbang Hasundutan'),
('1216', '12', 'Kab. Pakpak Bharat'),
('1217', '12', 'Kab. Samosir'),
('1218', '12', 'Kab. Serdang Bedagai'),
('1219', '12', 'Kab. Batu Bara'),
('1220', '12', 'Kab. Padang Lawas Utara'),
('1221', '12', 'Kab. Padang Lawas'),
('1222', '12', 'Kab. Labuhan Batu Selatan'),
('1223', '12', 'Kab. Labuhan Batu Utara'),
('1224', '12', 'Kab. Nias Utara'),
('1225', '12', 'Kab. Nias Barat'),
('1271', '12', 'Kota Sibolga'),
('1272', '12', 'Kota Tanjung Balai'),
('1273', '12', 'Kota Pematang Siantar'),
('1274', '12', 'Kota Tebing Tinggi'),
('1275', '12', 'Kota Medan'),
('1276', '12', 'Kota Binjai'),
('1277', '12', 'Kota Padangsidimpuan'),
('1278', '12', 'Kota Gunungsitoli'),
('1301', '13', 'Kab. Kepulauan Mentawai'),
('1302', '13', 'Kab. Pesisir Selatan'),
('1303', '13', 'Kab. Solok'),
('1304', '13', 'Kab. Sijunjung'),
('1305', '13', 'Kab. Tanah Datar'),
('1306', '13', 'Kab. Padang Pariaman'),
('1307', '13', 'Kab. Agam'),
('1308', '13', 'Kab. Lima Puluh Kota'),
('1309', '13', 'Kab. Pasaman'),
('1310', '13', 'Kab. Solok Selatan'),
('1311', '13', 'Kab. Dharmasraya'),
('1312', '13', 'Kab. Pasaman Barat'),
('1371', '13', 'Kota Padang'),
('1372', '13', 'Kota Solok'),
('1373', '13', 'Kota Sawah Lunto'),
('1374', '13', 'Kota Padang Panjang'),
('1375', '13', 'Kota Bukittinggi'),
('1376', '13', 'Kota Payakumbuh'),
('1377', '13', 'Kota Pariaman'),
('1401', '14', 'Kab. Kuantan Singingi'),
('1402', '14', 'Kab. Indragiri Hulu'),
('1403', '14', 'Kab. Indragiri Hilir'),
('1404', '14', 'Kab. Pelalawan'),
('1405', '14', 'Kab. S I A K'),
('1406', '14', 'Kab. Kampar'),
('1407', '14', 'Kab. Rokan Hulu'),
('1408', '14', 'Kab. Bengkalis'),
('1409', '14', 'Kab. Rokan Hilir'),
('1410', '14', 'Kab. Kepulauan Meranti'),
('1471', '14', 'Kota Pekanbaru'),
('1473', '14', 'Kota D U M A I'),
('1501', '15', 'Kab. Kerinci'),
('1502', '15', 'Kab. Merangin'),
('1503', '15', 'Kab. Sarolangun'),
('1504', '15', 'Kab. Batang Hari'),
('1505', '15', 'Kab. Muaro Jambi'),
('1506', '15', 'Kab. Tanjung Jabung Timur'),
('1507', '15', 'Kab. Tanjung Jabung Barat'),
('1508', '15', 'Kab. Tebo'),
('1509', '15', 'Kab. Bungo'),
('1571', '15', 'Kota Jambi'),
('1572', '15', 'Kota Sungai Penuh'),
('1601', '16', 'Kab. Ogan Komering Ulu'),
('1602', '16', 'Kab. Ogan Komering Ilir'),
('1603', '16', 'Kab. Muara Enim'),
('1604', '16', 'Kab. Lahat'),
('1605', '16', 'Kab. Musi Rawas'),
('1606', '16', 'Kab. Musi Banyuasin'),
('1607', '16', 'Kab. Banyu Asin'),
('1608', '16', 'Kab. Ogan Komering Ulu Selatan'),
('1609', '16', 'Kab. Ogan Komering Ulu Timur'),
('1610', '16', 'Kab. Ogan Ilir'),
('1611', '16', 'Kab. Empat Lawang'),
('1671', '16', 'Kota Palembang'),
('1672', '16', 'Kota Prabumulih'),
('1673', '16', 'Kota Pagar Alam'),
('1674', '16', 'Kota Lubuklinggau'),
('1701', '17', 'Kab. Bengkulu Selatan'),
('1702', '17', 'Kab. Rejang Lebong'),
('1703', '17', 'Kab. Bengkulu Utara'),
('1704', '17', 'Kab. Kaur'),
('1705', '17', 'Kab. Seluma'),
('1706', '17', 'Kab. Mukomuko'),
('1707', '17', 'Kab. Lebong'),
('1708', '17', 'Kab. Kepahiang'),
('1709', '17', 'Kab. Bengkulu Tengah'),
('1771', '17', 'Kota Bengkulu'),
('1801', '18', 'Kab. Lampung Barat'),
('1802', '18', 'Kab. Tanggamus'),
('1803', '18', 'Kab. Lampung Selatan'),
('1804', '18', 'Kab. Lampung Timur'),
('1805', '18', 'Kab. Lampung Tengah'),
('1806', '18', 'Kab. Lampung Utara'),
('1807', '18', 'Kab. Way Kanan'),
('1808', '18', 'Kab. Tulangbawang'),
('1809', '18', 'Kab. Pesawaran'),
('1810', '18', 'Kab. Pringsewu'),
('1811', '18', 'Kab. Mesuji'),
('1812', '18', 'Kab. Tulang Bawang Barat'),
('1813', '18', 'Kab. Pesisir Barat'),
('1871', '18', 'Kota Bandar Lampung'),
('1872', '18', 'Kota Metro'),
('1901', '19', 'Kab. Bangka'),
('1902', '19', 'Kab. Belitung'),
('1903', '19', 'Kab. Bangka Barat'),
('1904', '19', 'Kab. Bangka Tengah'),
('1905', '19', 'Kab. Bangka Selatan'),
('1906', '19', 'Kab. Belitung Timur'),
('1971', '19', 'Kota Pangkal Pinang'),
('2101', '21', 'Kab. Karimun'),
('2102', '21', 'Kab. Bintan'),
('2103', '21', 'Kab. Natuna'),
('2104', '21', 'Kab. Lingga'),
('2105', '21', 'Kab. Kepulauan Anambas'),
('2171', '21', 'Kota B A T A M'),
('2172', '21', 'Kota Tanjung Pinang'),
('3101', '31', 'Kab. Kepulauan Seribu'),
('3171', '31', 'Kota Jakarta Selatan'),
('3172', '31', 'Kota Jakarta Timur'),
('3173', '31', 'Kota Jakarta Pusat'),
('3174', '31', 'Kota Jakarta Barat'),
('3175', '31', 'Kota Jakarta Utara'),
('3201', '32', 'Kab. Bogor'),
('3202', '32', 'Kab. Sukabumi'),
('3203', '32', 'Kab. Cianjur'),
('3204', '32', 'Kab. Bandung'),
('3205', '32', 'Kab. Garut'),
('3206', '32', 'Kab. Tasikmalaya'),
('3207', '32', 'Kab. Ciamis'),
('3208', '32', 'Kab. Kuningan'),
('3209', '32', 'Kab. Cirebon'),
('3210', '32', 'Kab. Majalengka'),
('3211', '32', 'Kab. Sumedang'),
('3212', '32', 'Kab. Indramayu'),
('3213', '32', 'Kab. Subang'),
('3214', '32', 'Kab. Purwakarta'),
('3215', '32', 'Kab. Karawang'),
('3216', '32', 'Kab. Bekasi'),
('3217', '32', 'Kab. Bandung Barat'),
('3218', '32', 'Kab. Pangandaran'),
('3271', '32', 'Kota Bogor'),
('3272', '32', 'Kota Sukabumi'),
('3273', '32', 'Kota Bandung'),
('3274', '32', 'Kota Cirebon'),
('3275', '32', 'Kota Bekasi'),
('3276', '32', 'Kota Depok'),
('3277', '32', 'Kota Cimahi'),
('3278', '32', 'Kota Tasikmalaya'),
('3279', '32', 'Kota Banjar'),
('3301', '33', 'Kab. Cilacap'),
('3302', '33', 'Kab. Banyumas'),
('3303', '33', 'Kab. Purbalingga'),
('3304', '33', 'Kab. Banjarnegara'),
('3305', '33', 'Kab. Kebumen'),
('3306', '33', 'Kab. Purworejo'),
('3307', '33', 'Kab. Wonosobo'),
('3308', '33', 'Kab. Magelang'),
('3309', '33', 'Kab. Boyolali'),
('3310', '33', 'Kab. Klaten'),
('3311', '33', 'Kab. Sukoharjo'),
('3312', '33', 'Kab. Wonogiri'),
('3313', '33', 'Kab. Karanganyar'),
('3314', '33', 'Kab. Sragen'),
('3315', '33', 'Kab. Grobogan'),
('3316', '33', 'Kab. Blora'),
('3317', '33', 'Kab. Rembang'),
('3318', '33', 'Kab. Pati'),
('3319', '33', 'Kab. Kudus'),
('3320', '33', 'Kab. Jepara'),
('3321', '33', 'Kab. Demak'),
('3322', '33', 'Kab. Semarang'),
('3323', '33', 'Kab. Temanggung'),
('3324', '33', 'Kab. Kendal'),
('3325', '33', 'Kab. Batang'),
('3326', '33', 'Kab. Pekalongan'),
('3327', '33', 'Kab. Pemalang'),
('3328', '33', 'Kab. Tegal'),
('3329', '33', 'Kab. Brebes'),
('3371', '33', 'Kota Magelang'),
('3372', '33', 'Kota Surakarta'),
('3373', '33', 'Kota Salatiga'),
('3374', '33', 'Kota Semarang'),
('3375', '33', 'Kota Pekalongan'),
('3376', '33', 'Kota Tegal'),
('3401', '34', 'Kab. Kulon Progo'),
('3402', '34', 'Kab. Bantul'),
('3403', '34', 'Kab. Gunung Kidul'),
('3404', '34', 'Kab. Sleman'),
('3471', '34', 'Kota Yogyakarta'),
('3501', '35', 'Kab. Pacitan'),
('3502', '35', 'Kab. Ponorogo'),
('3503', '35', 'Kab. Trenggalek'),
('3504', '35', 'Kab. Tulungagung'),
('3505', '35', 'Kab. Blitar'),
('3506', '35', 'Kab. Kediri'),
('3507', '35', 'Kab. Malang'),
('3508', '35', 'Kab. Lumajang'),
('3509', '35', 'Kab. Jember'),
('3510', '35', 'Kab. Banyuwangi'),
('3511', '35', 'Kab. Bondowoso'),
('3512', '35', 'Kab. Situbondo'),
('3513', '35', 'Kab. Probolinggo'),
('3514', '35', 'Kab. Pasuruan'),
('3515', '35', 'Kab. Sidoarjo'),
('3516', '35', 'Kab. Mojokerto'),
('3517', '35', 'Kab. Jombang'),
('3518', '35', 'Kab. Nganjuk'),
('3519', '35', 'Kab. Madiun'),
('3520', '35', 'Kab. Magetan'),
('3521', '35', 'Kab. Ngawi'),
('3522', '35', 'Kab. Bojonegoro'),
('3523', '35', 'Kab. Tuban'),
('3524', '35', 'Kab. Lamongan'),
('3525', '35', 'Kab. Gresik'),
('3526', '35', 'Kab. Bangkalan'),
('3527', '35', 'Kab. Sampang'),
('3528', '35', 'Kab. Pamekasan'),
('3529', '35', 'Kab. Sumenep'),
('3571', '35', 'Kota Kediri'),
('3572', '35', 'Kota Blitar'),
('3573', '35', 'Kota Malang'),
('3574', '35', 'Kota Probolinggo'),
('3575', '35', 'Kota Pasuruan'),
('3576', '35', 'Kota Mojokerto'),
('3577', '35', 'Kota Madiun'),
('3578', '35', 'Kota Surabaya'),
('3579', '35', 'Kota Batu'),
('3601', '36', 'Kab. Pandeglang'),
('3602', '36', 'Kab. Lebak'),
('3603', '36', 'Kab. Tangerang'),
('3604', '36', 'Kab. Serang'),
('3671', '36', 'Kota Tangerang'),
('3672', '36', 'Kota Cilegon'),
('3673', '36', 'Kota Serang'),
('3674', '36', 'Kota Tangerang Selatan'),
('5101', '51', 'Kab. Jembrana'),
('5102', '51', 'Kab. Tabanan'),
('5103', '51', 'Kab. Badung'),
('5104', '51', 'Kab. Gianyar'),
('5105', '51', 'Kab. Klungkung'),
('5106', '51', 'Kab. Bangli'),
('5107', '51', 'Kab. Karang Asem'),
('5108', '51', 'Kab. Buleleng'),
('5171', '51', 'Kota Denpasar'),
('5201', '52', 'Kab. Lombok Barat'),
('5202', '52', 'Kab. Lombok Tengah'),
('5203', '52', 'Kab. Lombok Timur'),
('5204', '52', 'Kab. Sumbawa'),
('5205', '52', 'Kab. Dompu'),
('5206', '52', 'Kab. Bima'),
('5207', '52', 'Kab. Sumbawa Barat'),
('5208', '52', 'Kab. Lombok Utara'),
('5271', '52', 'Kota Mataram'),
('5272', '52', 'Kota Bima'),
('5301', '53', 'Kab. Sumba Barat'),
('5302', '53', 'Kab. Sumba Timur'),
('5303', '53', 'Kab. Kupang'),
('5304', '53', 'Kab. Timor Tengah Selatan'),
('5305', '53', 'Kab. Timor Tengah Utara'),
('5306', '53', 'Kab. Belu'),
('5307', '53', 'Kab. Alor'),
('5308', '53', 'Kab. Lembata'),
('5309', '53', 'Kab. Flores Timur'),
('5310', '53', 'Kab. Sikka'),
('5311', '53', 'Kab. Ende'),
('5312', '53', 'Kab. Ngada'),
('5313', '53', 'Kab. Manggarai'),
('5314', '53', 'Kab. Rote Ndao'),
('5315', '53', 'Kab. Manggarai Barat'),
('5316', '53', 'Kab. Sumba Tengah'),
('5317', '53', 'Kab. Sumba Barat Daya'),
('5318', '53', 'Kab. Nagekeo'),
('5319', '53', 'Kab. Manggarai Timur'),
('5320', '53', 'Kab. Sabu Raijua'),
('5371', '53', 'Kota Kupang'),
('6101', '61', 'Kab. Sambas'),
('6102', '61', 'Kab. Bengkayang'),
('6103', '61', 'Kab. Landak'),
('6104', '61', 'Kab. Pontianak'),
('6105', '61', 'Kab. Sanggau'),
('6106', '61', 'Kab. Ketapang'),
('6107', '61', 'Kab. Sintang'),
('6108', '61', 'Kab. Kapuas Hulu'),
('6109', '61', 'Kab. Sekadau'),
('6110', '61', 'Kab. Melawi'),
('6111', '61', 'Kab. Kayong Utara'),
('6112', '61', 'Kab. Kubu Raya'),
('6171', '61', 'Kota Pontianak'),
('6172', '61', 'Kota Singkawang'),
('6201', '62', 'Kab. Kotawaringin Barat'),
('6202', '62', 'Kab. Kotawaringin Timur'),
('6203', '62', 'Kab. Kapuas'),
('6204', '62', 'Kab. Barito Selatan'),
('6205', '62', 'Kab. Barito Utara'),
('6206', '62', 'Kab. Sukamara'),
('6207', '62', 'Kab. Lamandau'),
('6208', '62', 'Kab. Seruyan'),
('6209', '62', 'Kab. Katingan'),
('6210', '62', 'Kab. Pulang Pisau'),
('6211', '62', 'Kab. Gunung Mas'),
('6212', '62', 'Kab. Barito Timur'),
('6213', '62', 'Kab. Murung Raya'),
('6271', '62', 'Kota Palangka Raya'),
('6301', '63', 'Kab. Tanah Laut'),
('6302', '63', 'Kab. Kota Baru'),
('6303', '63', 'Kab. Banjar'),
('6304', '63', 'Kab. Barito Kuala'),
('6305', '63', 'Kab. Tapin'),
('6306', '63', 'Kab. Hulu Sungai Selatan'),
('6307', '63', 'Kab. Hulu Sungai Tengah'),
('6308', '63', 'Kab. Hulu Sungai Utara'),
('6309', '63', 'Kab. Tabalong'),
('6310', '63', 'Kab. Tanah Bumbu'),
('6311', '63', 'Kab. Balangan'),
('6371', '63', 'Kota Banjarmasin'),
('6372', '63', 'Kota Banjar Baru'),
('6401', '64', 'Kab. Paser'),
('6402', '64', 'Kab. Kutai Barat'),
('6403', '64', 'Kab. Kutai Kartanegara'),
('6404', '64', 'Kab. Kutai Timur'),
('6405', '64', 'Kab. Berau'),
('6409', '64', 'Kab. Penajam Paser Utara'),
('6471', '64', 'Kota Balikpapan'),
('6472', '64', 'Kota Samarinda'),
('6474', '64', 'Kota Bontang'),
('6501', '65', 'Kab. Malinau'),
('6502', '65', 'Kab. Bulungan'),
('6503', '65', 'Kab. Tana Tidung'),
('6504', '65', 'Kab. Nunukan'),
('6571', '65', 'Kota Tarakan'),
('7101', '71', 'Kab. Bolaang Mongondow'),
('7102', '71', 'Kab. Minahasa'),
('7103', '71', 'Kab. Kepulauan Sangihe'),
('7104', '71', 'Kab. Kepulauan Talaud'),
('7105', '71', 'Kab. Minahasa Selatan'),
('7106', '71', 'Kab. Minahasa Utara'),
('7107', '71', 'Kab. Bolaang Mongondow Utara'),
('7108', '71', 'Kab. Siau Tagulandang Biaro'),
('7109', '71', 'Kab. Minahasa Tenggara'),
('7110', '71', 'Kab. Bolaang Mongondow Selatan'),
('7111', '71', 'Kab. Bolaang Mongondow Timur'),
('7171', '71', 'Kota Manado'),
('7172', '71', 'Kota Bitung'),
('7173', '71', 'Kota Tomohon'),
('7174', '71', 'Kota Kotamobagu'),
('7201', '72', 'Kab. Banggai Kepulauan'),
('7202', '72', 'Kab. Banggai'),
('7203', '72', 'Kab. Morowali'),
('7204', '72', 'Kab. Poso'),
('7205', '72', 'Kab. Donggala'),
('7206', '72', 'Kab. Toli-toli'),
('7207', '72', 'Kab. Buol'),
('7208', '72', 'Kab. Parigi Moutong'),
('7209', '72', 'Kab. Tojo Una-una'),
('7210', '72', 'Kab. Sigi'),
('7271', '72', 'Kota Palu'),
('7301', '73', 'Kab. Kepulauan Selayar'),
('7302', '73', 'Kab. Bulukumba'),
('7303', '73', 'Kab. Bantaeng'),
('7304', '73', 'Kab. Jeneponto'),
('7305', '73', 'Kab. Takalar'),
('7306', '73', 'Kab. Gowa'),
('7307', '73', 'Kab. Sinjai'),
('7308', '73', 'Kab. Maros'),
('7309', '73', 'Kab. Pangkajene Dan Kepulauan'),
('7310', '73', 'Kab. Barru'),
('7311', '73', 'Kab. Bone'),
('7312', '73', 'Kab. Soppeng'),
('7313', '73', 'Kab. Wajo'),
('7314', '73', 'Kab. Sidenreng Rappang'),
('7315', '73', 'Kab. Pinrang'),
('7316', '73', 'Kab. Enrekang'),
('7317', '73', 'Kab. Luwu'),
('7318', '73', 'Kab. Tana Toraja'),
('7322', '73', 'Kab. Luwu Utara'),
('7325', '73', 'Kab. Luwu Timur'),
('7326', '73', 'Kab. Toraja Utara'),
('7371', '73', 'Kota Makassar'),
('7372', '73', 'Kota Parepare'),
('7373', '73', 'Kota Palopo'),
('7401', '74', 'Kab. Buton'),
('7402', '74', 'Kab. Muna'),
('7403', '74', 'Kab. Konawe'),
('7404', '74', 'Kab. Kolaka'),
('7405', '74', 'Kab. Konawe Selatan'),
('7406', '74', 'Kab. Bombana'),
('7407', '74', 'Kab. Wakatobi'),
('7408', '74', 'Kab. Kolaka Utara'),
('7409', '74', 'Kab. Buton Utara'),
('7410', '74', 'Kab. Konawe Utara'),
('7471', '74', 'Kota Kendari'),
('7472', '74', 'Kota Baubau'),
('7501', '75', 'Kab. Boalemo'),
('7502', '75', 'Kab. Gorontalo'),
('7503', '75', 'Kab. Pohuwato'),
('7504', '75', 'Kab. Bone Bolango'),
('7505', '75', 'Kab. Gorontalo Utara'),
('7571', '75', 'Kota Gorontalo'),
('7601', '76', 'Kab. Majene'),
('7602', '76', 'Kab. Polewali Mandar'),
('7603', '76', 'Kab. Mamasa'),
('7604', '76', 'Kab. Mamuju'),
('7605', '76', 'Kab. Mamuju Utara'),
('8101', '81', 'Kab. Maluku Tenggara Barat'),
('8102', '81', 'Kab. Maluku Tenggara'),
('8103', '81', 'Kab. Maluku Tengah'),
('8104', '81', 'Kab. Buru'),
('8105', '81', 'Kab. Kepulauan Aru'),
('8106', '81', 'Kab. Seram Bagian Barat'),
('8107', '81', 'Kab. Seram Bagian Timur'),
('8108', '81', 'Kab. Maluku Barat Daya'),
('8109', '81', 'Kab. Buru Selatan'),
('8171', '81', 'Kota Ambon'),
('8172', '81', 'Kota Tual'),
('8201', '82', 'Kab. Halmahera Barat'),
('8202', '82', 'Kab. Halmahera Tengah'),
('8203', '82', 'Kab. Kepulauan Sula'),
('8204', '82', 'Kab. Halmahera Selatan'),
('8205', '82', 'Kab. Halmahera Utara'),
('8206', '82', 'Kab. Halmahera Timur'),
('8207', '82', 'Kab. Pulau Morotai'),
('8271', '82', 'Kota Ternate'),
('8272', '82', 'Kota Tidore Kepulauan'),
('9101', '91', 'Kab. Fakfak'),
('9102', '91', 'Kab. Kaimana'),
('9103', '91', 'Kab. Teluk Wondama'),
('9104', '91', 'Kab. Teluk Bintuni'),
('9105', '91', 'Kab. Manokwari'),
('9106', '91', 'Kab. Sorong Selatan'),
('9107', '91', 'Kab. Sorong'),
('9108', '91', 'Kab. Raja Ampat'),
('9109', '91', 'Kab. Tambrauw'),
('9110', '91', 'Kab. Maybrat'),
('9171', '91', 'Kota Sorong'),
('9401', '94', 'Kab. Merauke'),
('9402', '94', 'Kab. Jayawijaya'),
('9403', '94', 'Kab. Jayapura'),
('9404', '94', 'Kab. Nabire'),
('9408', '94', 'Kab. Kepulauan Yapen'),
('9409', '94', 'Kab. Biak Numfor'),
('9410', '94', 'Kab. Paniai'),
('9411', '94', 'Kab. Puncak Jaya'),
('9412', '94', 'Kab. Mimika'),
('9413', '94', 'Kab. Boven Digoel'),
('9414', '94', 'Kab. Mappi'),
('9415', '94', 'Kab. Asmat'),
('9416', '94', 'Kab. Yahukimo'),
('9417', '94', 'Kab. Pegunungan Bintang'),
('9418', '94', 'Kab. Tolikara'),
('9419', '94', 'Kab. Sarmi'),
('9420', '94', 'Kab. Keerom'),
('9426', '94', 'Kab. Waropen'),
('9427', '94', 'Kab. Supiori'),
('9428', '94', 'Kab. Mamberamo Raya'),
('9429', '94', 'Kab. Nduga'),
('9430', '94', 'Kab. Lanny Jaya'),
('9431', '94', 'Kab. Mamberamo Tengah'),
('9432', '94', 'Kab. Yalimo'),
('9433', '94', 'Kab. Puncak'),
('9434', '94', 'Kab. Dogiyai'),
('9435', '94', 'Kab. Intan Jaya'),
('9436', '94', 'Kab. Deiyai'),
('9471', '94', 'Kota Jayapura');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_provinsi`
--

CREATE TABLE `wilayah_provinsi` (
  `id` varchar(2) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_provinsi`
--

INSERT INTO `wilayah_provinsi` (`id`, `nama_provinsi`) VALUES
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('13', 'Sumatera Barat'),
('14', 'Riau'),
('15', 'Jambi'),
('16', 'Sumatera Selatan'),
('17', 'Bengkulu'),
('18', 'Lampung'),
('19', 'Kepulauan Bangka Belitung'),
('21', 'Kepulauan Riau'),
('31', 'Dki Jakarta'),
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'Di Yogyakarta'),
('35', 'Jawa Timur'),
('36', 'Banten'),
('51', 'Bali'),
('52', 'Nusa Tenggara Barat'),
('53', 'Nusa Tenggara Timur'),
('61', 'Kalimantan Barat'),
('62', 'Kalimantan Tengah'),
('63', 'Kalimantan Selatan'),
('64', 'Kalimantan Timur'),
('65', 'Kalimantan Utara'),
('71', 'Sulawesi Utara'),
('72', 'Sulawesi Tengah'),
('73', 'Sulawesi Selatan'),
('74', 'Sulawesi Tenggara'),
('75', 'Gorontalo'),
('76', 'Sulawesi Barat'),
('81', 'Maluku'),
('82', 'Maluku Utara'),
('91', 'Papua Barat'),
('94', 'Papua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_tag`
--
ALTER TABLE `kategori_tag`
  ADD PRIMARY KEY (`id_kategori_tag`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_money`
--
ALTER TABLE `log_money`
  ADD PRIMARY KEY (`id_logMoney`),
  ADD KEY `id_profile` (`id_user`);

--
-- Indexes for table `t_aktivitas`
--
ALTER TABLE `t_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_artikel`
--
ALTER TABLE `t_artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `usertoartikel` (`id_user`);

--
-- Indexes for table `t_artikelbookmark`
--
ALTER TABLE `t_artikelbookmark`
  ADD KEY `id_artikel` (`id_artikel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_artikeltag`
--
ALTER TABLE `t_artikeltag`
  ADD PRIMARY KEY (`id_artikeltag`),
  ADD KEY `id_artikel` (`id_artikel`),
  ADD KEY `idTag` (`idTag`);

--
-- Indexes for table `t_bank`
--
ALTER TABLE `t_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `t_beliartikel`
--
ALTER TABLE `t_beliartikel`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `t_bookmark`
--
ALTER TABLE `t_bookmark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_bookmark_fk0` (`id_user`),
  ADD KEY `t_bookmark_fk1` (`id_pertanyaan`);

--
-- Indexes for table `t_faq`
--
ALTER TABLE `t_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `t_jawaban`
--
ALTER TABLE `t_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `t_jawaban_fk0` (`id_user`),
  ADD KEY `t_jawaban_fk1` (`id_pertanyaan`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `t_like`
--
ALTER TABLE `t_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_like_fk0` (`id_user`),
  ADD KEY `t_like_fk1` (`id_pertanyaan`);

--
-- Indexes for table `t_love`
--
ALTER TABLE `t_love`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jawaban` (`id_jawaban`);

--
-- Indexes for table `t_message`
--
ALTER TABLE `t_message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `t_message_ibfk_1` (`id_pertanyaan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `t_otp`
--
ALTER TABLE `t_otp`
  ADD PRIMARY KEY (`id_otp`);

--
-- Indexes for table `t_penarikan`
--
ALTER TABLE `t_penarikan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `t_penarikan_ibfk_1` (`id_user`);

--
-- Indexes for table `t_pertanyaan`
--
ALTER TABLE `t_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `t_pertanyaan_fk0` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `t_profile`
--
ALTER TABLE `t_profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `t_profile_ibfk_1` (`id_user`);

--
-- Indexes for table `t_tag`
--
ALTER TABLE `t_tag`
  ADD PRIMARY KEY (`idTag`),
  ADD KEY `id_kategori_tag` (`id_kategori_tag`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_wa`
--
ALTER TABLE `t_wa`
  ADD PRIMARY KEY (`id_wa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `wilayah_kabupaten`
--
ALTER TABLE `wilayah_kabupaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indexes for table `wilayah_provinsi`
--
ALTER TABLE `wilayah_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_tag`
--
ALTER TABLE `kategori_tag`
  MODIFY `id_kategori_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `log_money`
--
ALTER TABLE `log_money`
  MODIFY `id_logMoney` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `t_aktivitas`
--
ALTER TABLE `t_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `t_artikel`
--
ALTER TABLE `t_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `t_artikeltag`
--
ALTER TABLE `t_artikeltag`
  MODIFY `id_artikeltag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_bank`
--
ALTER TABLE `t_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_bookmark`
--
ALTER TABLE `t_bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `t_faq`
--
ALTER TABLE `t_faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_jawaban`
--
ALTER TABLE `t_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `t_like`
--
ALTER TABLE `t_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `t_love`
--
ALTER TABLE `t_love`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `t_message`
--
ALTER TABLE `t_message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_otp`
--
ALTER TABLE `t_otp`
  MODIFY `id_otp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_penarikan`
--
ALTER TABLE `t_penarikan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_pertanyaan`
--
ALTER TABLE `t_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `t_profile`
--
ALTER TABLE `t_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_tag`
--
ALTER TABLE `t_tag`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `t_wa`
--
ALTER TABLE `t_wa`
  MODIFY `id_wa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_money`
--
ALTER TABLE `log_money`
  ADD CONSTRAINT `log_money_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_artikel`
--
ALTER TABLE `t_artikel`
  ADD CONSTRAINT `usertoartikel` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_artikelbookmark`
--
ALTER TABLE `t_artikelbookmark`
  ADD CONSTRAINT `t_artikelbookmark_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `t_artikel` (`id_artikel`),
  ADD CONSTRAINT `t_artikelbookmark_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`);

--
-- Constraints for table `t_artikeltag`
--
ALTER TABLE `t_artikeltag`
  ADD CONSTRAINT `fk_artikelid` FOREIGN KEY (`id_artikel`) REFERENCES `t_artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tag` FOREIGN KEY (`idTag`) REFERENCES `t_tag` (`idTag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_beliartikel`
--
ALTER TABLE `t_beliartikel`
  ADD CONSTRAINT `t_beliartikel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`),
  ADD CONSTRAINT `t_beliartikel_ibfk_2` FOREIGN KEY (`id_artikel`) REFERENCES `t_artikel` (`id_artikel`);

--
-- Constraints for table `t_bookmark`
--
ALTER TABLE `t_bookmark`
  ADD CONSTRAINT `t_bookmark_fk0` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_bookmark_fk1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `t_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_jawaban`
--
ALTER TABLE `t_jawaban`
  ADD CONSTRAINT `t_jawaban_fk0` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_fk1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `t_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_like`
--
ALTER TABLE `t_like`
  ADD CONSTRAINT `t_like_fk0` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_like_fk1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `t_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_love`
--
ALTER TABLE `t_love`
  ADD CONSTRAINT `t_love_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_love_ibfk_2` FOREIGN KEY (`id_jawaban`) REFERENCES `t_jawaban` (`id_jawaban`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_message`
--
ALTER TABLE `t_message`
  ADD CONSTRAINT `t_message_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `t_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_message_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_message_ibfk_3` FOREIGN KEY (`id_artikel`) REFERENCES `t_artikel` (`id_artikel`) ON DELETE CASCADE;

--
-- Constraints for table `t_penarikan`
--
ALTER TABLE `t_penarikan`
  ADD CONSTRAINT `t_penarikan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pertanyaan`
--
ALTER TABLE `t_pertanyaan`
  ADD CONSTRAINT `t_pertanyaan_fk0` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pertanyaan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_profile`
--
ALTER TABLE `t_profile`
  ADD CONSTRAINT `t_profile_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_tag`
--
ALTER TABLE `t_tag`
  ADD CONSTRAINT `idKategoriTag` FOREIGN KEY (`id_kategori_tag`) REFERENCES `kategori_tag` (`id_kategori_tag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `t_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_wa`
--
ALTER TABLE `t_wa`
  ADD CONSTRAINT `t_wa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wilayah_kabupaten`
--
ALTER TABLE `wilayah_kabupaten`
  ADD CONSTRAINT `wilayah_kabupaten_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `wilayah_provinsi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
