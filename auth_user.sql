-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 08:16 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp-proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE IF NOT EXISTS `auth_user` (
  `user_id` varchar(50) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_alamat` varchar(50) NOT NULL,
  `user_kota` varchar(50) NOT NULL,
  `user_kodepos` varchar(5) NOT NULL,
  `user_ktp` varchar(100) NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT '-1',
  `user_verification_code` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_username`, `user_password`, `user_alamat`, `user_kota`, `user_kodepos`, `user_ktp`, `user_status`, `user_verification_code`, `user_profile`, `updated_at`, `created_at`) VALUES
('user_001', 'rommy', 'christensen', 'dominatorranger@gmail.com', 'dominator', '2c09dab6b4cf9258ad39969498db14', '', '', '', '1234567891234567', 1, '', '', '2020-03-18 20:35:18', '2020-03-18 20:35:18'),
('user_002', 'marvella', 'lingadi', 'marvela@gmail.com', 'lgc', 'a0ab54f1401a40ef883d0574307465', '', '', '', '9876543212345678', 1, '', '', '2018-01-01 01:51:43', '2020-03-18 20:36:16'),
('user_003', 'ansell', 'benedy', 'ansel008@gmail.com', 'angde', 'a05a3bd932832746451ec1d85e50ba', '', '', '', '1357986421245678', 1, '', '', '2018-01-01 02:44:55', '2020-03-18 20:37:09'),
('user_004', 'jenny', 'chandra', 'jenn@gmail.com', 'jennychan', '8c84bbf4f643d6b8c4c188935eb1196d8cdcf10b', '', '', '', '1245789631357987', 0, '', '', '2020-03-18 20:38:11', '2020-03-18 20:38:11'),
('US_5e872129da4e4', 'Ansell', 'Benedy', 'ansell08.es@gmail.com', 'ansell008', '123456', '', '', '', '2138208302183021', 0, '', '', '2020-04-03 13:42:33', '2020-04-03 13:42:33'),
('US_5e8d7140dc6da', 'Rommy', 'abcd', 'rommy1@gmail.com', 'rommy', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '1234567891012345', 0, '', '', '2020-04-08 08:37:52', '2020-04-08 08:37:52'),
('US_5e9e98762ab3c', 'dummy', 'user', 'rommycy00@gmail.com', 'dummyuser', '2c09dab6b4cf9258ad39969498db149d18df6a6a', 'tengger raya 3a/36a', 'surabaya-barat', '60199', 'asset/upload/ktp-user/$2y$10$VXjXg3GWItfr742B0tDVq.OlZ7lFtAkgXq3oklFGJ9lJG3V5ZPHHS.jpg', 0, '549bfd3ff40c96f19650c6a8acee4ce9', '', '2020-04-21 06:53:42', '2020-04-21 06:53:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
