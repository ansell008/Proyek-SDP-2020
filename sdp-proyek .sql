-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 03:42 PM
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
-- Database: `sdp-proyek`
--
CREATE DATABASE IF NOT EXISTS `sdp-proyek` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sdp-proyek`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_admin`
--

DROP TABLE IF EXISTS `auth_admin`;
CREATE TABLE `auth_admin` (
  `admin_id` varchar(30) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_admin`
--

INSERT INTO `auth_admin` (`admin_id`, `admin_username`, `admin_password`, `role`, `created_at`, `updated_at`) VALUES
('admin15e67a25abfc8c', 'admin1', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 1, '2032-02-02 00:00:00', '2032-02-02 00:00:00'),
('admin25e67a398a61d1', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 0, '2032-02-02 00:00:00', '2032-02-02 00:00:00'),
('admin35e69a5c2ae050', 'admin3', '33aab3c7f01620cade108f488cfd285c0e62c1ec', 0, '2032-02-04 00:00:00', '2032-02-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_admin`
--

DROP TABLE IF EXISTS `category_admin`;
CREATE TABLE `category_admin` (
  `category_id` varchar(30) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_admin`
--

INSERT INTO `category_admin` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
('jasa5e68fc00dbf9f', 'jasa', '2032-02-03 00:00:00', '2032-02-03 00:00:00'),
('pendidikan5e6891103daee', 'pendidikan', '2032-02-03 00:00:00', '2032-02-03 00:00:00'),
('perhotelan5e71daaa4199d', 'perhotelan', '2032-02-03 00:00:00', '2032-02-03 00:00:00'),
('pertambangan5e71f7fd3a067', 'pertambangan', '2032-02-03 00:00:00', '2032-02-03 00:00:00'),
('teknologi5e71f9da7d32f', 'teknologi', '2032-02-03 00:00:00', '2032-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_admin`
--

DROP TABLE IF EXISTS `sub_category_admin`;
CREATE TABLE `sub_category_admin` (
  `sub_id` varchar(20) NOT NULL,
  `fk_category_id` varchar(20) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category_admin`
--

INSERT INTO `sub_category_admin` (`sub_id`, `fk_category_id`, `sub_name`, `created_at`, `updated_at`) VALUES
('cuci piring5e71fa567', 'jasa5e68fc00dbf9f', 'cuci piring', '2032-02-03 00:00:00', '2032-02-03 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_admin`
--
ALTER TABLE `auth_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category_admin`
--
ALTER TABLE `category_admin`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `sub_category_admin`
--
ALTER TABLE `sub_category_admin`
  ADD PRIMARY KEY (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
