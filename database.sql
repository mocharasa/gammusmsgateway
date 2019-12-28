-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 02:01 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `daemons`
--

CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gammu`
--

CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(13);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Triggers `inbox`
--
DELIMITER $$
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox` FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kas_osis`
--

CREATE TABLE `kas_osis` (
  `id` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas_sekolah`
--

CREATE TABLE `kas_sekolah` (
  `id_kas` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `anggaran_masuk` int(11) NOT NULL,
  `anggaran_keluar` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `total_kas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_sekolah`
--

INSERT INTO `kas_sekolah` (`id_kas`, `id_ta`, `id_bulan`, `id_kategori`, `tgl`, `anggaran_masuk`, `anggaran_keluar`, `keperluan`, `total_kas`) VALUES
(1, 1, 1, 0, '2018-10-15', 100000, 0, '', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`, `status`, `nama`) VALUES
(1, 'admin', 'admin', 1, 'Tata Usaha', 'Petugas TU'),
(2, 'didin', 'didin', 2, 'Kepala Sekolah', 'Didin Supardin, S.Pd.');

-- --------------------------------------------------------

--
-- Table structure for table `osis`
--

CREATE TABLE `osis` (
  `id` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `SendBefore`, `SendAfter`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `Class`, `TextDecoded`, `ID`, `MultiPart`, `RelativeValidity`, `SenderID`, `SendingTimeOut`, `DeliveryReport`, `CreatorID`) VALUES
('2018-10-14 22:54:13', '2018-10-14 22:54:13', '2018-10-14 22:54:13', '23:59:59', '00:00:00', NULL, '0938559323', 'Default_No_Compression', NULL, -1, 'hsafsa, NIS 12121313, telah membayar iuran SPP bulan Januari, periode 2018-2019, sebesar 100,000 rb', 103, 'false', -1, NULL, '2018-10-14 22:54:13', 'default', '');

--
-- Triggers `outbox`
--
DELIMITER $$
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `outbox_multipart`
--

CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pbk`
--

CREATE TABLE `pbk` (
  `ID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `nis` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Number` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pbk`
--

INSERT INTO `pbk` (`ID`, `GroupID`, `nis`, `Name`, `Number`) VALUES
(14, -1, 12121313, 'Jajang', '0938559323'),
(13, -1, 12121314, 'Jajang', '08333000022');

-- --------------------------------------------------------

--
-- Table structure for table `pbk_groups`
--

CREATE TABLE `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('', '2018-09-07 17:58:00', '2018-09-07 17:12:29', '2018-09-07 17:58:08', 'yes', 'yes', '861350032681642', 'Gammu 1.33.0, Windows Server 2007 SP1, GCC 4.7, MinGW 3.11', 100, 69, 38, 39);

--
-- Triggers `phones`
--
DELIMITER $$
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Triggers `sentitems`
--
DELIMITER $$
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(50) NOT NULL,
  `goldar` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `jurusan`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `agama`, `goldar`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `kontak`) VALUES
(12121313, 'hsafsa', 'XI', 'IPS2', 'sjsjfklj', '2000-02-03', 'Perempuan', 'Sadang', 'Islam', 'O', 'Jajang', 'Titin', 'PNS', 'IRT', '02323532523'),
(12121314, 'Juhari', 'XI', 'IPA1', 'Malamng', '2000-02-02', 'Perempuan', 'Sadang', 'Islam', 'O', 'Jajang', 'Titin', 'PNS', 'IRT', '09080890');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `telah_bayar` int(11) NOT NULL,
  `tunggakan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `nis`, `id_ta`, `id_bulan`, `tanggal`, `total_bayar`, `telah_bayar`, `tunggakan`, `nama`, `bulan`, `tahun_ajaran`, `status`) VALUES
(1, 12121313, 1, 1, '2018-10-15', 1200000, 100000, 900000, 'hsafsa', 'Januari', '2018-2019', 'Telah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `penarikan` int(11) NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_ta` int(11) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  `nominal_spp` int(11) NOT NULL,
  `nominal_osis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_ta`, `tahun_ajaran`, `nominal_spp`, `nominal_osis`) VALUES
(1, '2018-2019', 100000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_ta`, `id_bulan`, `jenis`, `nis`, `nama`, `tgl_bayar`, `jml_bayar`) VALUES
(1, 1, 1, 'SPP', 12121313, 'hsafsa', '2018-10-15', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kas_osis`
--
ALTER TABLE `kas_osis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indexes for table `kas_sekolah`
--
ALTER TABLE `kas_sekolah`
  ADD PRIMARY KEY (`id_kas`),
  ADD KEY `id_ta` (`id_ta`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osis`
--
ALTER TABLE `osis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`);

--
-- Indexes for table `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indexes for table `pbk`
--
ALTER TABLE `pbk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_ta` (`id_ta`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `id_ta` (`id_ta`),
  ADD KEY `id_bulan` (`id_bulan`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `kas_osis`
--
ALTER TABLE `kas_osis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kas_sekolah`
--
ALTER TABLE `kas_sekolah`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `osis`
--
ALTER TABLE `osis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `pbk`
--
ALTER TABLE `pbk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `spp_ibfk_2` FOREIGN KEY (`id_ta`) REFERENCES `tahun_ajaran` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_ibfk_3` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tahun_ajaran` (`id_ta`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
