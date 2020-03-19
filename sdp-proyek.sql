-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 07:53 AM
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
-- Table structure for table `auth_admin`
--

CREATE TABLE IF NOT EXISTS `auth_admin` (
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
-- Table structure for table `auth_company`
--

CREATE TABLE IF NOT EXISTS `auth_company` (
  `company_id` varchar(50) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `company_email` varchar(30) NOT NULL,
  `company_password` varchar(30) NOT NULL,
  `company_npwp` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `user_ktp` varchar(16) NOT NULL,
  `user_banned` int(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_username`, `user_password`, `user_ktp`, `user_banned`, `updated_at`, `created_at`) VALUES
('user_001', 'rommy', 'christensen', 'dominatorranger@gmail.com', 'dominator', '2c09dab6b4cf9258ad39969498db14', '1234567891234567', 0, '2020-03-18 20:35:18', '2020-03-18 20:35:18'),
('user_002', 'marvella', 'lingadi', 'marvela@gmail.com', 'lgc', 'a0ab54f1401a40ef883d0574307465', '9876543212345678', 0, '2020-03-18 20:36:16', '2020-03-18 20:36:16'),
('user_003', 'ansell', 'benedy', 'ansel008@gmail.com', 'angde', 'a05a3bd932832746451ec1d85e50ba', '1357986421245678', 0, '2020-03-18 20:37:09', '2020-03-18 20:37:09'),
('user_004', 'jenny', 'chandra', 'jenn@gmail.com', 'jennychan', '8c84bbf4f643d6b8c4c188935eb1196d8cdcf10b', '1245789631357987', 0, '2020-03-18 20:38:11', '2020-03-18 20:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `category_admin`
--

CREATE TABLE IF NOT EXISTS `category_admin` (
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
('teknologi informatika5e69a63ba', 'teknologi informatika', '2032-02-03 00:00:00', '2032-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_user`
--

CREATE TABLE IF NOT EXISTS `cv_user` (
  `cv_id` varchar(50) NOT NULL,
  `cv_user_id` varchar(50) NOT NULL,
  `cv_education` text NOT NULL,
  `cv_experience` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill_admin`
--

CREATE TABLE IF NOT EXISTS `skill_admin` (
  `skill_id` varchar(50) NOT NULL,
  `skill_name` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_admin`
--

INSERT INTO `skill_admin` (`skill_id`, `skill_name`, `created_at`, `updated_at`) VALUES
('bootstrap5e72ede439c71', 'bootstrap', '2020-03-19 03:58:28', '2020-03-19 03:58:28'),
('codeigniter5e7221c0529dc', 'codeigniter', '2020-03-18 13:27:28', '2020-03-19 03:58:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_admin`
--
ALTER TABLE `auth_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `auth_company`
--
ALTER TABLE `auth_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category_admin`
--
ALTER TABLE `category_admin`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cv_user`
--
ALTER TABLE `cv_user`
  ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `skill_admin`
--
ALTER TABLE `skill_admin`
  ADD PRIMARY KEY (`skill_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
