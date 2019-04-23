-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 06:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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

-- --------------------------------------------------------

--
-- Table structure for table `chuyentien`
--

CREATE TABLE `chuyentien` (
  `id_chuyentien` int(11) NOT NULL,
  `ngaytao` date DEFAULT NULL,
  `id_chuyen` int(10) DEFAULT NULL,
  `id_nhan` int(10) DEFAULT NULL,
  `sotien` float DEFAULT NULL,
  `noidung` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chuyentien`
--

INSERT INTO `chuyentien` (`id_chuyentien`, `ngaytao`, `id_chuyen`, `id_nhan`, `sotien`, `noidung`) VALUES
(1, '2019-04-20', 11, 22, 1000, ' 123123asdasd'),
(2, '2019-04-20', 11, 22, 1000, ' DM KHAI MAP NGU BO DSLKJDLKSJDLKJSDLKJDLKSJDLKSJDLKSJDKL@K#@LJ#');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `khachhangid` varchar(25) NOT NULL,
  `taikhoanmacdinh` varchar(25) NOT NULL,
  `ho` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `passchuyenkhoan` varchar(25) NOT NULL,
  `trangthai` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaytao` date NOT NULL,
  `lancuoidangnhap` date DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `khachhangid`, `taikhoanmacdinh`, `ho`, `ten`, `loginid`, `pass`, `passchuyenkhoan`, `trangthai`, `ngaytao`, `lancuoidangnhap`, `email`) VALUES
(3, '11', '512', 'Lê Thanh', 'Tài', 'tai', '2', '1', 'active', '2019-04-01', NULL, 'tai@email.com'),
(4, '22', '22', 'Lê Thi', 'Tú', 'tu', '1', '1', 'active', '2019-04-01', NULL, 'tu@email.com'),
(5, '33', '123', 'Lê Thị', 'Cẩm', 'cam', '1', '1', 'active', '2019-04-01', NULL, 'cam@email.com'),
(6, '44', '321', 'Lê Văn', 'Mập', 'map', '1', '1', 'active', '2019-04-01', NULL, 'map@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `kieuvay`
--

CREATE TABLE `kieuvay` (
  `id_kieuvay` int(11) NOT NULL,
  `kieuvay` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `toida` double NOT NULL,
  `toithieu` double NOT NULL,
  `laixuat` double NOT NULL,
  `trangthai` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kieuvay`
--

INSERT INTO `kieuvay` (`id_kieuvay`, `kieuvay`, `toida`, `toithieu`, `laixuat`, `trangthai`) VALUES
(1, 'vaythuong', 10000, 10, 10, 'active'),
(2, 'vayvip', 2000000, 20, 20, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `kyhanguitien`
--

CREATE TABLE `kyhanguitien` (
  `id_kyhan` int(11) NOT NULL,
  `kyhan_so` int(11) NOT NULL,
  `kyhan_chu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `laixuat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kyhanguitien`
--

INSERT INTO `kyhanguitien` (`id_kyhan`, `kyhan_so`, `kyhan_chu`, `laixuat`) VALUES
(1, 14, '2 tuần', 0.1),
(2, 60, '2 tháng', 1);

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
-- Table structure for table `phichuyentien`
--

CREATE TABLE `phichuyentien` (
  `id_phichuyentien` int(11) NOT NULL,
  `toithieu` float DEFAULT NULL,
  `toida` float DEFAULT NULL,
  `phi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phichuyentien`
--

INSERT INTO `phichuyentien` (`id_phichuyentien`, `toithieu`, `toida`, `phi`) VALUES
(1, 0, 100000, 3000),
(2, 100000, 500000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int(25) NOT NULL,
  `taikhoanid` varchar(25) NOT NULL,
  `khachhangid` varchar(25) NOT NULL,
  `trangthai` varchar(25) NOT NULL,
  `ngaytao` date NOT NULL,
  `sodu` double NOT NULL,
  `no` double DEFAULT NULL,
  `laixuat` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `taikhoanid`, `khachhangid`, `trangthai`, `ngaytao`, `sodu`, `no`, `laixuat`) VALUES
(1, '11', '11', 'moi', '2019-04-07', 408978, 20, 1000),
(2, '22', '22', 'acive', '2019-04-01', 160000, 0, 0),
(3, '123', '33', 'active', '2019-04-01', 103000, 0, 0),
(4, '321', '44', 'active', '2019-04-01', 254000, NULL, NULL),
(5, '512', '11', 'active', '2019-04-01', 108, NULL, NULL),
(323, '322', '11', 'active', '2019-04-08', 111041, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoanhuong`
--

CREATE TABLE `taikhoanhuong` (
  `id_taikhoanhuong` int(11) NOT NULL,
  `taikhoanhuongid` varchar(25) NOT NULL,
  `khachhangid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taikhoanhuong`
--

INSERT INTO `taikhoanhuong` (`id_taikhoanhuong`, `taikhoanhuongid`, `khachhangid`) VALUES
(1, '321', '11');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoantietkiem`
--

CREATE TABLE `taikhoantietkiem` (
  `id_tietkiem` int(11) NOT NULL,
  `taikhoanid` varchar(25) NOT NULL,
  `kyhangui` int(11) NOT NULL,
  `tiengui` float NOT NULL,
  `hinhthuctralai` int(11) NOT NULL,
  `ngaytao` date NOT NULL,
  `ngaynhanlai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taikhoantietkiem`
--

INSERT INTO `taikhoantietkiem` (`id_tietkiem`, `taikhoanid`, `kyhangui`, `tiengui`, `hinhthuctralai`, `ngaytao`, `ngaynhanlai`) VALUES
(2, '322', 2, 100, 1, '2019-04-22', '2019-06-21'),
(5, '512', 1, 1, 1, '2019-04-22', '2019-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `thenganhang`
--

CREATE TABLE `thenganhang` (
  `id_the` int(11) NOT NULL,
  `thenganhangid` varchar(25) NOT NULL,
  `sodu` float NOT NULL,
  `pass` varchar(25) NOT NULL,
  `passbin` varchar(4) NOT NULL,
  `cmnd` varchar(25) NOT NULL,
  `Ho` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `khachhangid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thenganhang`
--

INSERT INTO `thenganhang` (`id_the`, `thenganhangid`, `sodu`, `pass`, `passbin`, `cmnd`, `Ho`, `Ten`, `khachhangid`) VALUES
(1, '1', 5025000, '1', '1111', '1', 'Lê Thanh', 'Tài', '11');

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
  `vayid` int(25) NOT NULL,
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
(1, 'vaythuong', 100000, 'hangthang', 100, '2019-04-01', '11'),
(2, 'vaythuong', 2000000, 'hangthang', 2000, '2019-04-02', '11'),
(4, '2', 31231, 'hangthang', 20, '0000-00-00', '11'),
(5, '2', 12312, 'hangthang', 20, '0000-00-00', '11'),
(6, '1', 111, 'hangthang', 10, '0000-00-00', '11'),
(7, '1', 123, 'hangthang', 10, '0000-00-00', '11'),
(8, '1', 123, 'hangthang', 10, '2019-04-16', '11'),
(9, '1', 123, 'hangthang', 10, '2019-04-17', '11'),
(10, '1', 123, 'hangthang', 10, '2019-04-17', '11'),
(11, '2', 30, 'hangthang', 20, '2019-04-23', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyentien`
--
ALTER TABLE `chuyentien`
  ADD PRIMARY KEY (`id_chuyentien`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`),
  ADD UNIQUE KEY `khachhangid` (`khachhangid`);

--
-- Indexes for table `kieuvay`
--
ALTER TABLE `kieuvay`
  ADD PRIMARY KEY (`id_kieuvay`);

--
-- Indexes for table `kyhanguitien`
--
ALTER TABLE `kyhanguitien`
  ADD PRIMARY KEY (`id_kyhan`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanvienid`);

--
-- Indexes for table `phichuyentien`
--
ALTER TABLE `phichuyentien`
  ADD PRIMARY KEY (`id_phichuyentien`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Indexes for table `taikhoanhuong`
--
ALTER TABLE `taikhoanhuong`
  ADD PRIMARY KEY (`id_taikhoanhuong`);

--
-- Indexes for table `taikhoantietkiem`
--
ALTER TABLE `taikhoantietkiem`
  ADD PRIMARY KEY (`id_tietkiem`);

--
-- Indexes for table `thenganhang`
--
ALTER TABLE `thenganhang`
  ADD PRIMARY KEY (`id_the`),
  ADD UNIQUE KEY `thenganhangid` (`thenganhangid`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuyentien`
--
ALTER TABLE `chuyentien`
  MODIFY `id_chuyentien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kieuvay`
--
ALTER TABLE `kieuvay`
  MODIFY `id_kieuvay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyhanguitien`
--
ALTER TABLE `kyhanguitien`
  MODIFY `id_kyhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phichuyentien`
--
ALTER TABLE `phichuyentien`
  MODIFY `id_phichuyentien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `taikhoanhuong`
--
ALTER TABLE `taikhoanhuong`
  MODIFY `id_taikhoanhuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taikhoantietkiem`
--
ALTER TABLE `taikhoantietkiem`
  MODIFY `id_tietkiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thenganhang`
--
ALTER TABLE `thenganhang`
  MODIFY `id_the` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaytien`
--
ALTER TABLE `vaytien`
  MODIFY `vayid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
