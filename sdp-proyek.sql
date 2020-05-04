-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 10:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `auth_perusahaan`
--

DROP TABLE IF EXISTS `auth_perusahaan`;
CREATE TABLE `auth_perusahaan` (
  `perusahaan_id` varchar(50) NOT NULL,
  `perusahaan_nama` varchar(50) NOT NULL,
  `perusahaan_email` varchar(30) NOT NULL,
  `perusahaan_password` varchar(50) NOT NULL,
  `perusahaan_alamat` varchar(30) NOT NULL,
  `perusahaan_kodepos` varchar(5) NOT NULL,
  `perusahaan_telp` varchar(16) NOT NULL,
  `perusahaan_tipe` varchar(30) NOT NULL,
  `perusahaan_npwp` varchar(100) NOT NULL,
  `perusahaan_status` varchar(1) NOT NULL,
  `perusahaan_rate` int(1) NOT NULL,
  `perusahaan_profPic` varchar(255) NOT NULL DEFAULT 'asset/img/profile/profile.png',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_perusahaan`
--

INSERT INTO `auth_perusahaan` (`perusahaan_id`, `perusahaan_nama`, `perusahaan_email`, `perusahaan_password`, `perusahaan_alamat`, `perusahaan_kodepos`, `perusahaan_telp`, `perusahaan_tipe`, `perusahaan_npwp`, `perusahaan_status`, `perusahaan_rate`, `perusahaan_profPic`, `created_at`, `updated_at`) VALUES
('1', 'Donec Est Mauris Consulting', 'vel.vulputate@laciniavitae.com', 'YOM33PLC5FZ', 'Ap #556-4266 Lobortis Road', '', '(07) 6609 9547', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2003-06-21 00:00:00', '2005-06-19 00:00:00'),
('10', 'Eu Ligula Institute', 'cursus.Nunc.mauris@arcuAliquam', 'UWY45VSZ9XL', 'P.O. Box 213, 5944 Nunc Rd.', '', '(06) 0937 3641', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('100', 'Amet Dapibus Id Ltd', 'Duis.sit@ligulaNullam.com', 'UZV66CSY6YX', '110-6665 Integer Avenue', '', '(06) 0824 5186', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2010-08-20 00:00:00', '0000-00-00 00:00:00'),
('11', 'Lacus Mauris Corp.', 'non.leo.Vivamus@eu.ca', 'DHR82OMA8VL', '957-3468 Fermentum Rd.', '', '(07) 2525 8413', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2007-12-19 00:00:00', '0000-00-00 00:00:00'),
('12', 'Sed Dictum Proin PC', 'arcu@SedmolestieSed.com', 'SZC00NDB9NR', '850-1653 Pellentesque. Street', '', '(05) 4614 4238', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2001-09-21 00:00:00'),
('13', 'Tortor Dictum LLP', 'a.dui@ipsum.ca', 'EVC99GLL4TN', '742-633 Nulla Avenue', '', '(08) 7553 5949', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('14', 'Leo Morbi Neque Institute', 'congue@Nulla.ca', 'FBN09QJT0CC', 'P.O. Box 371, 2776 Neque. Aven', '', '(01) 1289 1141', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2009-06-20 00:00:00', '2004-01-20 00:00:00'),
('15', 'Tempor Augue Ac Institute', 'mauris@fringillaporttitor.net', 'PYC22PAU8SZ', 'Ap #453-1583 Sit Road', '', '(03) 0216 7280', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2011-05-19 00:00:00'),
('16', 'Elit Pretium Et LLP', 'Nam.tempor@Aeneaneuismod.com', 'KAE32NLW4XJ', 'P.O. Box 782, 1866 Arcu. Stree', '', '(09) 6730 4724', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('17', 'In PC', 'urna.Ut.tincidunt@dui.org', 'KHK35OXZ6EK', '480-6217 Egestas Road', '', '(03) 0270 1583', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2012-11-20 00:00:00'),
('18', 'Urna Nullam Lobortis Associates', 'elit.erat.vitae@eget.co.uk', 'MYQ34OLL3FX', 'P.O. Box 315, 769 Aliquet, Ave', '', '(05) 4041 6796', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2010-09-20 00:00:00'),
('19', 'Aenean Sed Pede PC', 'eu.ligula@auctor.org', 'URX97LNU0WV', 'Ap #119-5562 Eleifend Rd.', '', '(01) 2191 7547', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2008-05-20 00:00:00', '2008-02-19 00:00:00'),
('2', 'Magna Lorem Ipsum LLP', 'cubilia@mauriseu.ca', 'TQC99OUD7CD', '3364 Malesuada Ave', '', '(07) 0780 1557', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2009-10-20 00:00:00'),
('20', 'Proin Vel Nisl Ltd', 'fringilla.cursus.purus@eleifen', 'GJI24QSB8AK', '9657 Nunc Road', '', '(05) 2486 5945', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2002-01-20 00:00:00', '2002-12-20 00:00:00'),
('21', 'Ullamcorper Eu Euismod Industries', 'ac@mattisInteger.ca', 'JMJ70JBO6HG', 'Ap #666-1317 Massa. Street', '', '(09) 8883 0885', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('22', 'Mauris Morbi Non Limited', 'nec.diam@mi.edu', 'VPK89AMB8FL', '4963 Duis Rd.', '', '(07) 9876 4864', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('23', 'Erat Limited', 'eu.odio@sagittisaugueeu.net', 'TAN64JBE8GH', 'Ap #928-2390 Nunc Ave', '', '(02) 6417 5557', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('24', 'Nec PC', 'sit@atsemmolestie.org', 'IRZ04PYQ8JE', '726-7767 Tellus, Road', '', '(07) 3301 3552', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2004-11-20 00:00:00'),
('25', 'Tellus Aenean Egestas Foundation', 'sagittis.lobortis.mauris@a.net', 'HUC30IFX1DS', '7735 Tortor Ave', '', '(08) 5084 2729', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('26', 'Nibh Dolor Foundation', 'elit.pharetra@etmagnisdis.ca', 'XZJ47SDT4HO', 'Ap #961-1635 Risus. Rd.', '', '(05) 0340 9868', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2006-05-20 00:00:00', '2009-08-20 00:00:00'),
('27', 'Lacus Aliquam Corp.', 'Etiam@lacusvarius.com', 'ZMJ66NYD4SI', '358-1505 Tincidunt Avenue', '', '(04) 6556 3013', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2009-10-19 00:00:00', '0000-00-00 00:00:00'),
('28', 'Libero PC', 'Vestibulum.ante@eratvel.org', 'VUY71GVZ9OZ', '739-5159 Facilisis Ave', '', '(03) 6123 2651', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2008-03-19 00:00:00', '2005-06-19 00:00:00'),
('29', 'Justo Company', 'Ut.nec@miDuis.ca', 'VOQ15FEE4WY', 'Ap #738-1341 Ut Rd.', '', '(04) 5183 6143', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3', 'Purus Accumsan Incorporated', 'tellus.eu.augue@sitametnulla.c', 'DPK88QIK6QN', '876-8845 Praesent Road', '', '(08) 3760 7369', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2004-02-19 00:00:00', '2010-02-19 00:00:00'),
('30', 'Mauris Rhoncus Id Associates', 'magna.Phasellus@facilisisfacil', 'JUE67KJG5JR', 'P.O. Box 980, 9407 Sit Road', '', '(06) 0074 0507', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2008-11-19 00:00:00'),
('31', 'Nullam Enim Consulting', 'malesuada.augue@auctorvelitege', 'SSQ99WDE7XT', 'P.O. Box 626, 4196 Sagittis. R', '', '(04) 2699 7794', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('32', 'Eu Corporation', 'Morbi.vehicula.Pellentesque@co', 'UDB75ADG9SZ', 'Ap #878-9357 Euismod Road', '', '(06) 6419 0017', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('33', 'Molestie Corporation', 'ultrices@egestas.org', 'LAJ66ZCR4CO', 'P.O. Box 979, 5875 Orci, Road', '', '(07) 1501 1913', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('34', 'Aliquam Gravida PC', 'neque.Sed.eget@quis.com', 'PJV61PCB4BF', 'Ap #799-4494 Dolor Rd.', '', '(01) 9401 8096', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2004-04-19 00:00:00', '2002-02-21 00:00:00'),
('35', 'Diam At Pretium Corporation', 'Etiam@urnaNullam.net', 'UGD54BKP6MO', 'P.O. Box 655, 4529 Neque St.', '', '(01) 3209 8710', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('36', 'Facilisis Magna Tellus LLP', 'Fusce.mi.lorem@atpretiumalique', 'HSS65DGL0IO', '5343 Nunc Rd.', '', '(07) 4856 4936', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('37', 'Amet Diam Eu Company', 'pede@urnanec.net', 'ATM98HYA2VW', '614-4020 Odio. Rd.', '', '(05) 6886 3861', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2003-06-20 00:00:00', '0000-00-00 00:00:00'),
('38', 'Et Netus Institute', 'vel@metus.co.uk', 'GDY21IRP2ET', '812-2127 Egestas, Av.', '', '(06) 2839 7306', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('39', 'Metus Foundation', 'Curabitur.consequat@Aeneaneuis', 'OQG19LWX1AR', 'P.O. Box 788, 6709 Placerat Ro', '', '(03) 2716 6931', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('4', 'Conubia Incorporated', 'dapibus@Aliquameratvolutpat.ca', 'UVW50NPS2LX', 'P.O. Box 377, 4313 Quis, St.', '', '(09) 5796 9639', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('40', 'Porttitor Eros Nec Corp.', 'sit.amet@laciniaatiaculis.edu', 'BWV41BRC4JA', 'Ap #245-4454 Ridiculus Street', '', '(08) 2565 1846', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2006-08-20 00:00:00'),
('41', 'Feugiat Nec Industries', 'pellentesque.eget.dictum@Donec', 'IZI69YEM4FZ', '276-8167 Consectetuer Road', '', '(05) 8456 0371', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('42', 'Iaculis Corporation', 'morbi@Nullainterdum.ca', 'NCA05NXS6SZ', 'P.O. Box 857, 3971 Fusce St.', '', '(03) 8181 2879', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2003-04-20 00:00:00'),
('43', 'Cubilia Consulting', 'erat.vitae.risus@metusIn.org', 'INU28DIX6WL', 'Ap #334-9494 A Street', '', '(07) 9596 2789', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2012-12-20 00:00:00', '0000-00-00 00:00:00'),
('44', 'Mus Proin Vel Associates', 'Cras.convallis.convallis@veltu', 'LSV08XOR0XD', '9816 Fringilla, Rd.', '', '(02) 2016 0186', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2007-12-20 00:00:00', '0000-00-00 00:00:00'),
('45', 'Varius Corporation', 'amet.ante.Vivamus@necquamCurab', 'YFY03XQR8WD', '469-7954 Nec, Street', '', '(05) 4013 8407', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('46', 'Volutpat Nulla Facilisis Company', 'quis.arcu@dictumsapienAenean.c', 'PEZ39TEM6XL', 'Ap #891-6663 Dictum. Rd.', '', '(09) 3199 7042', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2008-08-20 00:00:00', '2007-12-20 00:00:00'),
('47', 'Ligula Donec Incorporated', 'Vivamus.nisi@convallisdolor.or', 'LME51UTM3IH', '2237 Libero Ave', '', '(03) 8093 1041', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('48', 'Nisl Maecenas Malesuada LLC', 'vitae.diam.Proin@iaculisenimsi', 'HRX59ZAK7WV', 'P.O. Box 131, 3166 Porttitor A', '', '(09) 4340 8786', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2012-04-19 00:00:00', '0000-00-00 00:00:00'),
('49', 'Nunc Company', 'magna.Nam.ligula@fringillacurs', 'RXU45JLA4DH', 'P.O. Box 851, 3256 Blandit Av.', '', '(07) 1167 9982', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2008-01-19 00:00:00', '2008-06-19 00:00:00'),
('5', 'Velit Inc.', 'Integer.urna@vitae.edu', 'ZXE04JRQ8WE', '6714 At, St.', '', '(06) 7165 6396', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('50', 'Ante Lectus Convallis Corp.', 'lacus.Aliquam.rutrum@inhendrer', 'BWO88TOE1LW', '2468 Enim. Street', '', '(06) 0303 5204', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2006-05-20 00:00:00', '0000-00-00 00:00:00'),
('51', 'Est Industries', 'leo.Cras@Morbisit.ca', 'FRY28AIW1CS', '436-5424 Et, Ave', '', '(09) 3509 9432', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('52', 'Molestie Incorporated', 'malesuada.augue@adipiscing.co.', 'VSL03KON6IR', 'P.O. Box 561, 781 At Road', '', '(05) 2913 9633', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2003-06-20 00:00:00', '0000-00-00 00:00:00'),
('53', 'Sit Amet Orci Limited', 'ultrices.Duis@Donecfeugiat.co.', 'PZV33ZFX2NT', 'P.O. Box 730, 5548 Suscipit, R', '', '(01) 6758 7121', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2011-11-20 00:00:00'),
('54', 'Lacinia Sed Congue Limited', 'Cras@estNunc.edu', 'ZEC35RXM0ES', '124-854 Rutrum Av.', '', '(07) 9346 9310', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2007-08-19 00:00:00', '2010-08-20 00:00:00'),
('55', 'Et Foundation', 'ut@sempertellusid.org', 'WZD66HPA0MB', 'P.O. Box 619, 5334 Diam St.', '', '(06) 5498 9186', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2003-09-20 00:00:00'),
('56', 'Hendrerit Neque Consulting', 'pede.et@necurna.org', 'IYB62AOE8BV', 'P.O. Box 817, 3376 Senectus Av', '', '(09) 2500 9464', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2005-03-20 00:00:00', '0000-00-00 00:00:00'),
('57', 'Fusce Incorporated', 'mauris.Suspendisse.aliquet@est', 'JBP32EBO1FF', 'P.O. Box 395, 5449 Pede Av.', '', '(07) 9320 4101', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2001-02-20 00:00:00'),
('58', 'Mus Proin Vel LLP', 'tincidunt.pede.ac@orciquislect', 'SKF38PPV6IJ', '317-9624 Vehicula Street', '', '(09) 8141 8629', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2003-05-20 00:00:00', '2010-04-19 00:00:00'),
('59', 'Mattis Cras Institute', 'consectetuer.cursus@sem.com', 'IME51XEA2CU', 'Ap #366-3573 Urna St.', '', '(04) 6629 8554', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2002-05-21 00:00:00'),
('6', 'Nec Ante LLP', 'aliquam.eu@penatibus.ca', 'LOV01JUE2FA', 'Ap #500-5731 Eu St.', '', '(04) 8944 3135', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2004-05-19 00:00:00', '2008-01-20 00:00:00'),
('60', 'Proin Nisl Industries', 'accumsan.convallis@pedemalesua', 'KDM62EMI8BE', '9004 Imperdiet Rd.', '', '(07) 0453 2805', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('61', 'In Felis LLC', 'dapibus@ut.com', 'AZU72PVA1DU', 'Ap #502-8220 Aliquet. Av.', '', '(01) 9566 5446', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2007-05-19 00:00:00', '2003-04-21 00:00:00'),
('62', 'Vulputate Velit Eu Associates', 'nascetur@eleifendnondapibus.ca', 'WIF11JOT1DX', '8897 Tellus. Rd.', '', '(05) 1437 6708', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('63', 'Ipsum Institute', 'Cras.lorem.lorem@nibhsitamet.n', 'BDN68KLU4RF', '244-2784 Sapien, Avenue', '', '(09) 8038 8769', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2010-02-19 00:00:00'),
('64', 'Orci Foundation', 'at.pede@ultricesiaculis.ca', 'BTX20HRF5NN', '6267 Nullam Av.', '', '(02) 7012 5868', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2006-01-19 00:00:00', '0000-00-00 00:00:00'),
('65', 'Laoreet Incorporated', 'luctus.ut@Integer.org', 'GOS73CDH5KM', 'Ap #665-8682 Ultrices. Rd.', '', '(08) 0989 0611', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2005-05-20 00:00:00', '2004-06-19 00:00:00'),
('66', 'Aliquam Foundation', 'Curabitur.sed@gravidamolestiea', 'QGZ38ESY2UU', 'P.O. Box 976, 8960 At Ave', '', '(03) 3899 7591', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2009-09-20 00:00:00'),
('67', 'Ligula LLP', 'Nam.ac@orcilobortisaugue.net', 'QAI78UGT5UX', '9370 Risus, St.', '', '(02) 8176 1277', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2005-09-20 00:00:00', '0000-00-00 00:00:00'),
('68', 'Orci Limited', 'orci.consectetuer@dolor.com', 'NTJ87AEX0IM', '594-3850 Turpis Road', '', '(07) 1558 5277', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2012-08-20 00:00:00', '0000-00-00 00:00:00'),
('69', 'Fusce Aliquam Incorporated', 'congue@egestasFusce.com', 'EIQ60LTK5DY', '892-8424 Neque Ave', '', '(01) 4905 8010', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2008-09-19 00:00:00'),
('7', 'Vitae Semper Egestas LLP', 'diam@elitpharetraut.net', 'NIW58TKX8CT', '3878 Tincidunt Av.', '', '(06) 4586 7447', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('70', 'Consectetuer Adipiscing Elit Company', 'mollis.nec.cursus@pretiumaliqu', 'LIF88TMG3WU', '928-7739 Metus St.', '', '(01) 1741 4756', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2008-12-19 00:00:00'),
('71', 'Maecenas Malesuada Foundation', 'tristique.neque@quamdignissimp', 'GYW15BHN6WW', 'P.O. Box 481, 5838 At St.', '', '(09) 2688 0962', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2012-11-19 00:00:00', '0000-00-00 00:00:00'),
('72', 'Dictum Magna Ut Incorporated', 'Vivamus@lectuspedeultrices.edu', 'ARN90CFS1MR', '9278 In, Road', '', '(04) 9975 0403', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2005-04-19 00:00:00'),
('73', 'Dolor Associates', 'senectus@NullamnislMaecenas.or', 'VOD98VFY7PE', '3473 Metus Av.', '', '(09) 0862 0641', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('74', 'Sed Auctor Odio Corporation', 'ac.arcu@vitae.co.uk', 'GFJ48EWT0GR', '2621 Sit Avenue', '', '(03) 3348 5717', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2012-05-19 00:00:00', '2011-09-19 00:00:00'),
('75', 'Purus Ac Inc.', 'vel.convallis.in@faucibus.org', 'WUS41XYT4UM', '278-1136 Dolor Av.', '', '(09) 5755 6583', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('76', 'In Mi Pede Limited', 'tortor.at.risus@felisadipiscin', 'KEX42SAP5AM', '712-1748 Nunc Ave', '', '(02) 6028 7407', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('77', 'Adipiscing Inc.', 'non@gravidaPraesenteu.co.uk', 'HUV81OMN5QM', 'P.O. Box 474, 9765 Varius Rd.', '', '(08) 7034 6151', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2007-08-20 00:00:00', '0000-00-00 00:00:00'),
('78', 'Class Aptent Taciti LLC', 'ac@rutrumloremac.edu', 'AKQ90LCL1IW', 'P.O. Box 506, 7228 Eu, Road', '', '(01) 3502 1597', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('79', 'Nunc Lectus Pede Industries', 'cubilia.Curae.Phasellus@vitaes', 'BSS09VMU1JI', 'P.O. Box 993, 4838 Eget, St.', '', '(08) 1987 7808', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2003-11-20 00:00:00'),
('8', 'Ultrices Ltd', 'elit@Vivamusnisi.edu', 'ZEO38GRG2CW', '4127 Porttitor St.', '', '(03) 9349 7040', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2005-07-19 00:00:00', '0000-00-00 00:00:00'),
('80', 'Adipiscing Elit Company', 'risus.Duis@dictumultricies.ca', 'PAK74SPU6UJ', '7192 Ut, Rd.', '', '(06) 4156 7918', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2006-07-19 00:00:00', '2007-06-19 00:00:00'),
('81', 'Sociis Natoque Penatibus Institute', 'metus.Vivamus@mollisDuis.com', 'FVF59DAA6DX', 'Ap #788-1239 Luctus St.', '', '(04) 7766 1834', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('82', 'Aliquet Libero Integer Company', 'Aliquam.nisl@egestasurnajusto.', 'NOZ18AIX1GC', 'P.O. Box 709, 4269 Fringilla S', '', '(02) 5902 9900', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2001-11-21 00:00:00', '2012-01-20 00:00:00'),
('83', 'Vitae Purus Gravida Corporation', 'non.enim.Mauris@turpisIn.edu', 'FSR73QGV8TN', 'P.O. Box 714, 5464 Et Av.', '', '(09) 3212 5728', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('84', 'Aliquam Institute', 'et.malesuada.fames@sitametrisu', 'UGB91CVB7IP', '168-7476 Ut, Av.', '', '(09) 6493 7441', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2004-01-19 00:00:00'),
('85', 'Et Arcu Consulting', 'augue@nasceturridiculus.org', 'DEZ90RUK3IL', 'Ap #429-4109 Malesuada. Ave', '', '(06) 1654 7678', 'fa', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('86', 'Ridiculus LLC', 'ante.dictum@lectussit.net', 'SOI41BSS9HH', 'P.O. Box 134, 1754 Blandit Rd.', '', '(05) 0521 7879', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2010-07-19 00:00:00'),
('87', 'Et LLP', 'urna.convallis.erat@sitametris', 'OEU64NSC3JK', 'Ap #558-6521 Libero Rd.', '', '(02) 1801 1481', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2005-10-20 00:00:00'),
('88', 'Blandit Nam Nulla PC', 'amet.consectetuer.adipiscing@t', 'RHK48ZBK3QX', '674-8670 Urna, St.', '', '(08) 8033 7900', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('89', 'Tellus Phasellus PC', 'auctor@commodoat.co.uk', 'OMO00EVP8KS', 'P.O. Box 714, 5923 A, Ave', '', '(06) 6501 3380', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2009-05-20 00:00:00', '2001-10-20 00:00:00'),
('9', 'Magna Phasellus Dolor Associates', 'Integer@elementumloremut.net', 'BZT85KSZ9UE', '7726 Dui Rd.', '', '(01) 4892 7579', 'cv', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2005-08-20 00:00:00', '0000-00-00 00:00:00'),
('90', 'Mauris Associates', 'parturient.montes@ametconsecte', 'TVD52SPF4XL', '6196 Pharetra Ave', '', '(04) 5881 0699', 'pt', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('91', 'Sed Nulla Consulting', 'auctor.non.feugiat@velpedeblan', 'BQL70JVU7WA', 'P.O. Box 221, 9649 Felis. St.', '', '(01) 3319 5153', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2012-07-19 00:00:00'),
('92', 'Purus Nullam Scelerisque LLC', 'lorem.tristique@semperauctorMa', 'CHH22BOR5VB', 'Ap #389-7617 Aliquet. St.', '', '(07) 9873 2181', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '2005-11-20 00:00:00'),
('93', 'Nascetur Ridiculus Ltd', 'quis.arcu@sit.ca', 'VHR12DEV9YD', '3802 Maecenas Street', '', '(07) 2291 8208', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2009-10-19 00:00:00', '0000-00-00 00:00:00'),
('94', 'Nullam Scelerisque Incorporated', 'pede.et.risus@lacusvarius.net', 'PAR82VXI8RW', 'Ap #767-4944 Quisque Rd.', '', '(08) 7700 4756', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '2003-06-20 00:00:00', '2006-01-19 00:00:00'),
('95', 'Neque In Associates', 'est.Nunc.laoreet@utlacusNulla.', 'EIU30IAH9FA', '588 Nunc, St.', '', '(01) 0397 1786', 'perseorangan', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2003-09-21 00:00:00', '0000-00-00 00:00:00'),
('96', 'Elit Pede Associates', 'vehicula.et@apurusDuis.ca', 'NFD09ZTD4KV', 'Ap #850-1983 Ultrices. Rd.', '', '(04) 7399 1360', 'perseorangan', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('97', 'Purus Company', 'accumsan.interdum@nuncsit.co.u', 'DAV30UST7MN', 'Ap #802-5258 Morbi Rd.', '', '(02) 5752 9401', 'cv', '15', '0', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('98', 'Aliquam PC', 'in@eunulla.edu', 'XVJ05GTC6LU', '1461 Venenatis St.', '', '(05) 1943 8815', 'fa', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('99', 'Diam Institute', 'nibh.Donec.est@Mauris.co.uk', 'PUZ63SIT0VE', 'P.O. Box 353, 3157 Auctor Stre', '', '(05) 9564 7481', 'pt', '15', '1', 0, 'base_url().\'asset/img/profile/profile.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('PE_5e8d703c468a2', 'Toko Komputer Surabaya', 'ansell1@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Surabaya', '', '123456', 'CV', '123456789', '0', 0, 'asset/img/profile/493f5bba-81a4-11e9-bf79-066b49664af6_cm_1440w3.png', '2020-04-08 08:33:32', '2020-04-08 08:33:32'),
('PE_5e95b0c906333', ' Toko Satu', 'ansell08.es@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pondok Tjandra Indah', '62156', '1231232312', 'CV', 'asset/upload/npwp-company/263822.jpg', '0', 0, 'base_url().\'asset/img/profile/profile.png', '2020-04-14 14:47:05', '2020-04-14 14:47:05'),
('PE_5e95bdb22c9e0', 'Toko Dua', 'ansell24.es@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pondok Tjandra Indah', '62156', '123123', 'CV', 'asset/upload/npwp-company/2638222.jpg', '0', 0, 'asset/img/profile/profile.png', '2020-04-14 15:42:10', '2020-04-14 15:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

DROP TABLE IF EXISTS `auth_user`;
CREATE TABLE `auth_user` (
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
  `user_status` int(1) NOT NULL DEFAULT -1,
  `user_verification_code` varchar(255) NOT NULL,
  `user_cv` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_username`, `user_password`, `user_alamat`, `user_kota`, `user_kodepos`, `user_ktp`, `user_status`, `user_verification_code`, `user_cv`, `user_profile`, `updated_at`, `created_at`) VALUES
('US_5ea5b23f458ef', 'dummy', 'user', 'dominatorranger@gmail.com', 'dummyuser', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tengger', 'surabaya-barat', '60199', '', 0, '390d2e108d50f7bdd2c8df39ceb978a5', '', '', '2020-04-26 18:09:35', '2020-04-26 18:09:35'),
('US_5ea5b23f458eg', 'dummy', 'user2', 'dominatorranger@gmail.com', 'dummyuser2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tengger', 'surabaya-barat', '60199', 'asset/upload/ktp-user/8d979fd59d0224511fcd8c63c12fafce.png', 0, '390d2e108d50f7bdd2c8df39ceb978a5', '', '', '2020-04-26 18:09:35', '2020-04-26 18:09:35');

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
('teknologi informatika5e69a63ba', 'teknologi informatika', '2032-02-03 00:00:00', '2032-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_user`
--

DROP TABLE IF EXISTS `cv_user`;
CREATE TABLE `cv_user` (
  `cv_id` varchar(50) NOT NULL,
  `cv_user_id` varchar(50) NOT NULL,
  `cv_education` text NOT NULL,
  `cv_experience` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_user`
--

INSERT INTO `cv_user` (`cv_id`, `cv_user_id`, `cv_education`, `cv_experience`, `created_at`, `updated_at`) VALUES
('cv_001', 'user_001', 'SD : SDK KARITAS 3\r\nSMP : SMPK KARITAS 3\r\nSMA : SMKK ST LOUIS\r\n\r\nPERGURUAN TINGGI : ISTTS', 'BANYAK BOSS', '2020-03-19 18:22:52', '2020-03-19 18:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `htrans`
--

DROP TABLE IF EXISTS `htrans`;
CREATE TABLE `htrans` (
  `transaksi_id` varchar(255) NOT NULL,
  `project_id` varchar(50) NOT NULL,
  `status_code` varchar(50) DEFAULT NULL,
  `order_id` varchar(15) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
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
  `gopay_qr_code` text DEFAULT NULL,
  `pdf_url` varchar(255) DEFAULT NULL,
  `finish_redirect_url` varchar(255) DEFAULT NULL,
  `settlement_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `htrans`
--

INSERT INTO `htrans` (`transaksi_id`, `project_id`, `status_code`, `order_id`, `grand_total`, `transaction_id`, `payment_type`, `transaction_status`, `transaction_time`, `fraud_status`, `bank`, `bca_va_number`, `payment_code`, `bill_key`, `biller_code`, `gopay_qr_code`, `pdf_url`, `finish_redirect_url`, `settlement_time`) VALUES
('TR_5ea8ead8efa7d', 'Jaga5ea5b944af6ec', '201', '34929477', 2600000, '5db7297f-1c10-42a3-83e1-05735e4a5bbd', 'gopay', 'settlement', '2020-04-29 09:50:29', NULL, NULL, NULL, NULL, NULL, NULL, 'https://api.sandbox.veritrans.co.id/v2/gopay/5db7297f-1c10-42a3-83e1-05735e4a5bbd/qr-code', NULL, NULL, '2020-04-29 09:52:26'),
('TR_5ea8edfe53378', 'Buat5ea8ed0b0be46', '201', '497653233', 300000, 'd193d930-acd2-4018-9714-b24abd7ef9de', 'bank_transfer', 'pending', '2020-04-29 10:37:47', 'accept', 'bca', '66195137952', NULL, NULL, NULL, NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/c8306483-a64b-4e18-b0e0-fb0c3b2986c7/pdf', NULL, '2020-04-29 10:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` varchar(50) NOT NULL,
  `perusahaan_id` varchar(50) NOT NULL,
  `transaksi_id` varchar(50) NOT NULL,
  `kategori_id` varchar(50) NOT NULL,
  `project_nama` varchar(50) NOT NULL,
  `project_deskripsi` text NOT NULL,
  `project_anggaran` text NOT NULL,
  `project_status` varchar(1) NOT NULL COMMENT '0=open, 1=progress, 2=finish',
  `project_mulai` datetime NOT NULL,
  `project_deadline` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `perusahaan_id`, `transaksi_id`, `kategori_id`, `project_nama`, `project_deskripsi`, `project_anggaran`, `project_status`, `project_mulai`, `project_deadline`, `created_at`, `updated_at`) VALUES
('Buat5ea8ed0b0be46', 'PE_5e95b0c906333', '1', 'jasa5e68fc00dbf9f', 'Buat Web', 'Buat web', '150000', '3', '2020-04-29 00:00:00', '2020-04-30 00:00:00', '2042-02-03 00:00:00', '2042-02-03 00:00:00'),
('Jaga5ea5b944af6ec', 'PE_5e95b0c906333', '1', 'jasa5e68fc00dbf9f', 'Jaga Toko', 'Jaga toko saya selama 2 jam', '50000', '3', '2020-04-04 00:00:00', '2020-04-30 00:00:00', '0000-00-00 00:00:00', '2020-04-29 04:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `project_pekerja`
--

DROP TABLE IF EXISTS `project_pekerja`;
CREATE TABLE `project_pekerja` (
  `project_pekerja_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `project_id` varchar(50) NOT NULL,
  `project_pekerja_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=belum acc, 1= acc',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_pekerja`
--

INSERT INTO `project_pekerja` (`project_pekerja_id`, `user_id`, `project_id`, `project_pekerja_status`, `created_at`, `updated_at`) VALUES
('PP_5ea5b9a8651c6', 'US_5ea5b23f458eg', 'Jaga5ea5b944af6ec', 1, '2020-04-26 18:41:12', '2020-04-26 18:41:12'),
('PP_5ea5b9a8651c7', 'US_5ea5b23f458ef', 'Jaga5ea5b944af6ec', 1, '2020-04-26 18:41:12', '2020-04-26 18:41:12'),
('PP_5ea8ed2055a5f', 'US_5ea5b23f458ef', 'Buat5ea8ed0b0be46', 1, '2020-04-29 04:57:36', '2020-04-29 04:57:36'),
('PP_5ea8ed45b1d8a', 'US_5ea5b23f458eg', 'Buat5ea8ed0b0be46', 1, '2020-04-29 04:58:13', '2020-04-29 04:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `project_subkategori`
--

DROP TABLE IF EXISTS `project_subkategori`;
CREATE TABLE `project_subkategori` (
  `project_subkategori_id` varchar(50) NOT NULL,
  `sub_kategori_id` varchar(50) NOT NULL,
  `project_id` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_perusahaan`
--

DROP TABLE IF EXISTS `review_perusahaan`;
CREATE TABLE `review_perusahaan` (
  `review_perusahaan_id` varchar(50) NOT NULL,
  `perusahaan_id` varchar(50) NOT NULL,
  `reveiw_perusahaan_deskripsi` text NOT NULL,
  `review_perusahaan_rating` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_user`
--

DROP TABLE IF EXISTS `review_user`;
CREATE TABLE `review_user` (
  `review_user_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `review_user_deskripsi` text NOT NULL,
  `review_user_rating` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill_admin`
--

DROP TABLE IF EXISTS `skill_admin`;
CREATE TABLE `skill_admin` (
  `skill_id` varchar(50) NOT NULL,
  `skill_name` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_admin`
--

INSERT INTO `skill_admin` (`skill_id`, `skill_name`, `created_at`, `updated_at`) VALUES
('bootstrap5e72ede439c71', 'bootstrap', '2020-03-19 03:58:28', '2020-03-27 08:05:13'),
('codeigniter5e7221c0529dc', 'codeigniter 4', '2020-03-18 13:27:28', '2018-01-01 02:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `skill_user`
--

DROP TABLE IF EXISTS `skill_user`;
CREATE TABLE `skill_user` (
  `skill_user_id` varchar(50) NOT NULL,
  `skill_user_user_id` varchar(50) NOT NULL,
  `skill_admin_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_user`
--

INSERT INTO `skill_user` (`skill_user_id`, `skill_user_user_id`, `skill_admin_id`) VALUES
('sku_000', 'user_001', 'bootstrap5e72ede439c71'),
('sku_001', 'user_001', 'codeigniter5e7221c0529dc');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

DROP TABLE IF EXISTS `sub_kategori`;
CREATE TABLE `sub_kategori` (
  `sub_kategori_id` varchar(50) NOT NULL,
  `kategori_id` varchar(50) NOT NULL,
  `sub_kategori_nama` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`sub_kategori_id`, `kategori_id`, `sub_kategori_nama`, `created_at`, `updated_at`) VALUES
('jaga toko5e77207f499eb', 'jasa5e68fc00dbf9f', 'jaga toko', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('buat5ea2ff7cba03b', 'buat5ea2e72eb4246', 'buat tampilan dan design', '2020-05-15 00:00:00', 0, '2042-02-05 00:00:00', '2020-04-24 17:32:04'),
('buat5ea5b9867c83b', 'Jaga5ea5b944af6ec', 'buat laporan keuangan', '2020-04-26 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('buat5ea5ba09eb738', 'Jaga5ea5b944af6ec', 'buat laporan keuangan lagi', '2020-04-26 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('buat5ea8ed82e263f', 'Buat5ea8ed0b0be46', 'buat laporan keuangan', '2020-04-29 00:00:00', 1, '2042-02-03 00:00:00', '2042-02-03 00:00:00'),
('buat5ea8ed935cd1f', 'Buat5ea8ed0b0be46', 'buat laporan keuangan lagi', '2020-04-30 00:00:00', 1, '2042-02-03 00:00:00', '2042-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `transaksi_id` varchar(50) NOT NULL,
  `project_id` varchar(50) NOT NULL,
  `transaksi_nominal` bigint(20) NOT NULL,
  `transaksi_tgl_kirim` datetime NOT NULL,
  `transaksi_tgl_terima` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_admin`
--
ALTER TABLE `auth_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `auth_perusahaan`
--
ALTER TABLE `auth_perusahaan`
  ADD PRIMARY KEY (`perusahaan_id`);

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
-- Indexes for table `htrans`
--
ALTER TABLE `htrans`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_pekerja`
--
ALTER TABLE `project_pekerja`
  ADD PRIMARY KEY (`project_pekerja_id`);

--
-- Indexes for table `project_subkategori`
--
ALTER TABLE `project_subkategori`
  ADD PRIMARY KEY (`project_subkategori_id`);

--
-- Indexes for table `review_perusahaan`
--
ALTER TABLE `review_perusahaan`
  ADD PRIMARY KEY (`review_perusahaan_id`);

--
-- Indexes for table `review_user`
--
ALTER TABLE `review_user`
  ADD PRIMARY KEY (`review_user_id`);

--
-- Indexes for table `skill_admin`
--
ALTER TABLE `skill_admin`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`sub_kategori_id`);

--
-- Indexes for table `sub_project`
--
ALTER TABLE `sub_project`
  ADD PRIMARY KEY (`sub_project_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
