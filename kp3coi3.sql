-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 06:04 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp3coi3`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `dosen_id_peminatan` int(10) NOT NULL,
  `peminatan` varchar(100) NOT NULL,
  `dosen_level` int(100) NOT NULL,
  `dosen_email` varchar(100) NOT NULL,
  `dosen_password` varchar(100) NOT NULL,
  `dosen_jumlah_mhs` int(100) NOT NULL,
  `dosen_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `dosen_id_peminatan`, `peminatan`, `dosen_level`, `dosen_email`, `dosen_password`, `dosen_jumlah_mhs`, `dosen_count`) VALUES
(1710511002, 'Dosen2', 2, 'Data Scientist', 2, 'test6@test.com', '1234', 0, 4),
(1710511033, 'Dosen1', 1, 'Cyber Security', 2, 'test7@test.com', '1234', 1, 5),
(1710511068, 'Dosen4', 2, 'Data Scientist', 2, 'test8@test.com', '1234', 0, 4),
(1710511069, 'Dosen3', 1, 'Cyber Security', 2, 'test9@test.com', '1234', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_date` date NOT NULL,
  `total_events` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_detail`
--

CREATE TABLE `event_detail` (
  `idevent` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kaprodi`
--

CREATE TABLE `kaprodi` (
  `nidn` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kaprodi_level` int(20) NOT NULL,
  `kaprodi_email` varchar(100) NOT NULL,
  `kaprodi_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kaprodi`
--

INSERT INTO `kaprodi` (`nidn`, `nama`, `kaprodi_level`, `kaprodi_email`, `kaprodi_password`) VALUES
(1810511033, 'Kaprodi1', 3, 'test20@test.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `peminatan`
--

CREATE TABLE `peminatan` (
  `id_peminatan` int(20) NOT NULL,
  `nama_peminatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminatan`
--

INSERT INTO `peminatan` (`id_peminatan`, `nama_peminatan`) VALUES
(1, 'Cyber Security'),
(2, 'Data Scientist');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_level` varchar(3) DEFAULT NULL,
  `user_id_peminatan` int(20) NOT NULL,
  `user_nidn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`, `user_id_peminatan`, `user_nidn`) VALUES
(22, 'jose', 'test@test.com', '1234', '1', 1, 1710511033);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `kd_berkas` int(11) NOT NULL,
  `nama_berkas` varchar(255) DEFAULT NULL,
  `keterangan_berkas` varchar(255) DEFAULT NULL,
  `tipe_berkas` varchar(100) DEFAULT NULL,
  `ukuran_berkas` float NOT NULL,
  `user_id_berkas` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id_comment` int(11) NOT NULL,
  `user_id_comment` int(11) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_date`);

--
-- Indexes for table `event_detail`
--
ALTER TABLE `event_detail`
  ADD PRIMARY KEY (`idevent`),
  ADD KEY `event_date` (`event_date`);

--
-- Indexes for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `peminatan`
--
ALTER TABLE `peminatan`
  ADD PRIMARY KEY (`id_peminatan`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `peminatan` (`user_id_peminatan`),
  ADD KEY `dosen` (`user_nidn`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`kd_berkas`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_detail`
--
ALTER TABLE `event_detail`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `kd_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_detail`
--
ALTER TABLE `event_detail`
  ADD CONSTRAINT `event_detail_ibfk_1` FOREIGN KEY (`event_date`) REFERENCES `events` (`event_date`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `dosen` FOREIGN KEY (`user_nidn`) REFERENCES `dosen` (`nidn`),
  ADD CONSTRAINT `peminatan` FOREIGN KEY (`user_id_peminatan`) REFERENCES `peminatan` (`id_peminatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
