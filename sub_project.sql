-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 05:53 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `sub_project`
--

DROP TABLE IF EXISTS `sub_project`;
CREATE TABLE `sub_project` (
  `sub_project_id` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `sub_project_name` varchar(255) NOT NULL,
  `sub_project_deadline` datetime NOT NULL,
  `sub_project_status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_project`
--

INSERT INTO `sub_project` (`sub_project_id`, `project_id`, `sub_project_name`, `sub_project_deadline`, `sub_project_status`, `created_at`, `updated_at`) VALUES
('buat5ea2fefce4f1c', 'buat5ea2e72eb4246', 'buat mock up', '2020-05-01 00:00:00', 1, '2042-02-05 00:00:00', '2020-04-24 17:28:03'),
('buat5ea2ff7cba03b', 'buat5ea2e72eb4246', 'buat tampilan dan design', '2020-05-15 00:00:00', 0, '2042-02-05 00:00:00', '2020-04-24 17:32:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_project`
--
ALTER TABLE `sub_project`
  ADD PRIMARY KEY (`sub_project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
