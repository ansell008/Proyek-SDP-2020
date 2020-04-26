-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 04:51 PM
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
-- Table structure for table `htrans`
--

CREATE TABLE IF NOT EXISTS `htrans` (
  `transaksi_id` varchar(255) NOT NULL,
  `project_id` varchar(50) NOT NULL,
  `status_code` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `transaction_status` varchar(50) DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `fraud_status` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `bca_va_number` varchar(50) DEFAULT NULL,
  `payment_code` varchar(50) DEFAULT NULL,
  `bill_key` varchar(50) DEFAULT NULL,
  `biller_code` varchar(50) DEFAULT NULL,
  `pdf_url` varchar(255) DEFAULT NULL,
  `finish_redirect_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `htrans`
--

INSERT INTO `htrans` (`transaksi_id`, `project_id`, `status_code`, `transaction_id`, `payment_type`, `transaction_status`, `transaction_time`, `fraud_status`, `bank`, `bca_va_number`, `payment_code`, `bill_key`, `biller_code`, `pdf_url`, `finish_redirect_url`) VALUES
('TR_5ea475d3c8036', 'Jaga toko5e9ea049c66e2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `htrans`
--
ALTER TABLE `htrans`
  ADD PRIMARY KEY (`transaksi_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
