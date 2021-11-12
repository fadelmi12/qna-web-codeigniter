-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 03:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_beliartikel`
--
ALTER TABLE `t_beliartikel`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_beliartikel`
--
ALTER TABLE `t_beliartikel`
  ADD CONSTRAINT `t_beliartikel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`),
  ADD CONSTRAINT `t_beliartikel_ibfk_2` FOREIGN KEY (`id_artikel`) REFERENCES `t_artikel` (`id_artikel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
