-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 07:16 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `chuyentien`
--

CREATE TABLE `chuyentien` (
  `chuyentienid` int(10) NOT NULL,
  `ngaytao` date NOT NULL,
  `guiid` int(10) NOT NULL,
  `nhanid` int(10) NOT NULL,
  `sotien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhangid` varchar(25) NOT NULL,
  `ho` varchar(25) NOT NULL,
  `ten` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `passchuyenkhoan` varchar(25) NOT NULL,
  `trangthai` varchar(25) NOT NULL,
  `ngaytao` date NOT NULL,
  `lancuoidangnhap` datetime NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`khachhangid`, `ho`, `ten`, `loginid`, `pass`, `passchuyenkhoan`, `trangthai`, `ngaytao`, `lancuoidangnhap`, `email`) VALUES
('11', 'Le Thanh', 'Tai', 'tai', '1', '1', 'hoatdong', '2019-04-01', '2019-04-04 00:00:00', 'tai@email.com'),
('22', 'Le Thi', 'Tu', 'tu', '1', '1', 'active', '2019-04-01', '2019-04-01 00:00:00', 'tu@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `kieuvay`
--

CREATE TABLE `kieuvay` (
  `kieuvay` varchar(25) NOT NULL,
  `toida` double NOT NULL,
  `toithieu` double NOT NULL,
  `laixuat` double NOT NULL,
  `trangthai` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nhanvienid` int(10) NOT NULL,
  `ten` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaytao` date NOT NULL,
  `ngaydangnhap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoanid` varchar(25) NOT NULL,
  `khachhangid` varchar(25) NOT NULL,
  `trangthai` varchar(25) NOT NULL,
  `ngaytao` date NOT NULL,
  `sodu` double NOT NULL,
  `no` double NOT NULL,
  `laixuat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoanid`, `khachhangid`, `trangthai`, `ngaytao`, `sodu`, `no`, `laixuat`) VALUES
('11', '11', 'moi', '2019-04-07', 200000, 20, 1000),
('22', '22', 'acive', '2019-04-01', 146000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trano`
--

CREATE TABLE `trano` (
  `tranoid` int(10) NOT NULL,
  `ngaytao` date NOT NULL,
  `sotien` double NOT NULL,
  `sodu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaytien`
--

CREATE TABLE `vaytien` (
  `vayid` varchar(25) NOT NULL,
  `kieuvay` varchar(25) NOT NULL,
  `sovay` float NOT NULL,
  `chuky` varchar(25) NOT NULL,
  `laixuat` float NOT NULL,
  `ngaytao` date NOT NULL,
  `khachhangid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaytien`
--

INSERT INTO `vaytien` (`vayid`, `kieuvay`, `sovay`, `chuky`, `laixuat`, `ngaytao`, `khachhangid`) VALUES
('01', 'vaythuong', 100000, 'hangthang', 100, '2019-04-01', '11'),
('02', 'vaythuong', 2000000, 'hangthang', 2000, '2019-04-02', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhangid`);

--
-- Indexes for table `kieuvay`
--
ALTER TABLE `kieuvay`
  ADD PRIMARY KEY (`kieuvay`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanvienid`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoanid`);

--
-- Indexes for table `trano`
--
ALTER TABLE `trano`
  ADD PRIMARY KEY (`tranoid`);

--
-- Indexes for table `vaytien`
--
ALTER TABLE `vaytien`
  ADD PRIMARY KEY (`vayid`),
  ADD KEY `khachhangid` (`khachhangid`),
  ADD KEY `vayid` (`vayid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
