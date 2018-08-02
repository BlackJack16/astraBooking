-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 06:11 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_astra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_kendaraan` int(11) NOT NULL,
  `booking_tgl` date NOT NULL,
  `booking_jam` time NOT NULL,
  `booking_catatan` text NOT NULL,
  `booking_keterangan` text,
  `booking_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`booking_id`, `booking_kendaraan`, `booking_tgl`, `booking_jam`, `booking_catatan`, `booking_keterangan`, `booking_status`) VALUES
(1, 2, '2017-07-21', '09:10:00', 'Ganti Oli', NULL, 2),
(2, 2, '2017-07-21', '10:10:00', 'Ganti Oli', NULL, 0),
(3, 2, '2017-07-23', '11:00:00', 'oli', NULL, 2),
(5, 5, '2017-07-22', '09:00:00', 'oli', NULL, 2),
(6, 6, '2017-07-28', '14:00:00', 'oli', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_costumer`
--

CREATE TABLE `tb_costumer` (
  `costumer_id` int(11) NOT NULL,
  `costumer_identitas` varchar(20) NOT NULL,
  `costumer_nama` varchar(33) NOT NULL,
  `costumer_alamat` text,
  `costumer_tempat` varchar(50) DEFAULT NULL,
  `costumer_tgl` date NOT NULL,
  `costumer_jk` char(1) NOT NULL,
  `costumer_agama` varchar(33) NOT NULL,
  `costumer_email` varchar(50) NOT NULL,
  `costumer_telp` varchar(13) NOT NULL,
  `costumer_pwd` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_costumer`
--

INSERT INTO `tb_costumer` (`costumer_id`, `costumer_identitas`, `costumer_nama`, `costumer_alamat`, `costumer_tempat`, `costumer_tgl`, `costumer_jk`, `costumer_agama`, `costumer_email`, `costumer_telp`, `costumer_pwd`) VALUES
(1, '1671151110950001', 'Okta Reza', 'Komp Perumnas Tl kepapa Blok VI No 44 Rt. 42 Rw 009 Kelurahan Tl Kelapa Kec Alang-alang lebar', NULL, '1995-09-11', 'L', 'Islam', 'oktacac123@gmail.com', '082282676924', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, '1611102333055533', 'Hary Purmanta S', 'Jl. Selincah No 67 Rt 65 Rw 09 Kelurahan perumnas sako Palembang', NULL, '2017-07-18', 'L', 'Islam', 'harits@gmail.com', '081373184321', 'c33367701511b4f6020ec61ded352059'),
(5, '12434548', 'Yoga Dwi', 'Palembang', 'Palembang', '1994-06-20', 'L', 'Islam', 'yoga@gmail.com', '08123456789', 'e10adc3949ba59abbe56e057f20f883e'),
(7, '9111304022', 'khoirul', 'bukit', 'lahat', '1992-07-21', 'L', 'Islam', 'irul@gmail.com', '085222222666', 'e10adc3949ba59abbe56e057f20f883e'),
(8, '09111403025', 'Erwan Kurnia', 'komplek smp 1sungai lilin', 'sungai lilin', '1993-04-22', 'L', 'Islam', 'erwan_kurnia@gmail.com', '081270321777', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_service`
--

CREATE TABLE `tb_detail_service` (
  `dservice_id` int(11) NOT NULL,
  `dservice_transaksi` int(11) NOT NULL,
  `dservice_service` int(11) NOT NULL,
  `dservice_harga` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_service`
--

INSERT INTO `tb_detail_service` (`dservice_id`, `dservice_transaksi`, `dservice_service`, `dservice_harga`) VALUES
(3, 11, 4, 10000),
(4, 12, 5, 35000),
(5, 13, 5, 35000),
(6, 14, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_sparepart`
--

CREATE TABLE `tb_detail_sparepart` (
  `dsparepart_id` int(11) NOT NULL,
  `dsparepart_transaksi` int(11) NOT NULL,
  `dsparepart_sparepart` int(11) NOT NULL,
  `dsparepart_harga` bigint(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_sparepart`
--

INSERT INTO `tb_detail_sparepart` (`dsparepart_id`, `dsparepart_transaksi`, `dsparepart_sparepart`, `dsparepart_harga`) VALUES
(2, 11, 1, 40000),
(3, 12, 1, 40000),
(4, 12, 15, 80000),
(5, 13, 1, 40000),
(6, 14, 1, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `event_id` int(11) NOT NULL,
  `event_nama` varchar(33) NOT NULL,
  `event_ket` text NOT NULL,
  `event_tgl` date NOT NULL,
  `event_akhir` date NOT NULL,
  `event_foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`event_id`, `event_nama`, `event_ket`, `event_tgl`, `event_akhir`, `event_foto`) VALUES
(4, 'GEBYAR HONDA', 'Info penjualan terkini, program promo di bulan maret tahun 2016, showroom event/pameran, program tukar tambah, cash back diskon besar &amp; bonus hadiah special, serta tawaran menarik lainnya.', '2017-07-12', '2017-07-26', '51cea7c00d35bd0b2d5ee379bdc2ccfd.jpg'),
(5, 'PROGRAM ASTRA MOTOR GASPOL', 'Program Terbaru dari Astra Motor. Khusus untuk kamu yang tinggal di wilayah Sumatera Selatan, Nusa Tenggara Barat, Kalimantan Barat, dan Jayapura. Ayo kunjungi Dealer Astra Motor secepatnya, karena Astra Motor akan memberikan Gratis Service Plus Oli Selama 1 tahun apabila anda melakukan pembelian motor Honda di dealer Astra Motor. Program ini berlangsung dari tanggal 1 Januari – 31 Maret 2017. Jangan sampai ketinggalan yaa..', '2017-01-01', '2017-03-31', 'f89e1f2e8d77a79df130f68bca3f63fc.jpg'),
(23, 'ASTRA MOTOR HAPPY HOUR', 'Jangan lupa untuk service motor Honda kesayanganmu di Bengkel Astra Motor. Dapatkan diskon 15% untuk Jasa Service dan Jasa Pemasangan Spareparts setiap Senin sampai dengan Jumat jam 14:00 – 16:00. So, kami tunggu kedatangan anda di bengkel Astra Motor terdekat di kota anda.', '2017-07-01', '2017-07-31', 'fb8c288a4bb88a3ac291c9b6213c3016.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kend_costumer`
--

CREATE TABLE `tb_kend_costumer` (
  `kendCos_id` int(11) NOT NULL,
  `kendCos_costumer` int(11) NOT NULL,
  `kendCos_variant` int(11) NOT NULL,
  `kendCos_nopol` varchar(11) NOT NULL,
  `kendCos_thn` varchar(11) NOT NULL,
  `kendCos_status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kend_costumer`
--

INSERT INTO `tb_kend_costumer` (`kendCos_id`, `kendCos_costumer`, `kendCos_variant`, `kendCos_nopol`, `kendCos_thn`, `kendCos_status`) VALUES
(1, 1, 2, 'BG 8987 OK', '2014', b'1'),
(2, 5, 4, 'BG 9756 UY', '2008', b'1'),
(3, 5, 2, 'BG 123 ABJ', '2014', b'1'),
(4, 5, 4, 'BG 1234 SS', '2013', b'1'),
(5, 7, 2, 'BH 2 GG', '2014', b'1'),
(6, 5, 8, 'BG 2233 ABG', '2015', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `login_usr` varchar(30) NOT NULL,
  `login_nama` varchar(50) NOT NULL,
  `login_pwd` varchar(50) DEFAULT NULL,
  `login_level` int(2) DEFAULT NULL,
  `login_last` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`login_usr`, `login_nama`, `login_pwd`, `login_level`, `login_last`) VALUES
('admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 2, '2017-07-28 07:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_saran`
--

CREATE TABLE `tb_saran` (
  `saran_id` int(11) NOT NULL,
  `saran_costumer` int(11) NOT NULL,
  `saran_isi` text NOT NULL,
  `saran_tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_saran`
--

INSERT INTO `tb_saran` (`saran_id`, `saran_costumer`, `saran_isi`, `saran_tgl`) VALUES
(1, 1, 'Mohon maaf saya mau menyampaikan saran untuk anda di karenakan service dari mekanik anda kurang bagi saya', '2017-07-14 08:29:26'),
(2, 5, 'terima kasih', '2017-07-21 02:22:11'),
(3, 5, 'test', '2017-07-21 08:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_service`
--

CREATE TABLE `tb_service` (
  `service_id` int(11) NOT NULL,
  `service_nama` varchar(33) NOT NULL,
  `service_harga` bigint(33) NOT NULL,
  `service_status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_service`
--

INSERT INTO `tb_service` (`service_id`, `service_nama`, `service_harga`, `service_status`) VALUES
(4, 'Ganti Oli', 0, b'1'),
(5, 'Service Ringan', 35000, b'1'),
(6, 'Service Lengkap', 50000, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sparepart`
--

CREATE TABLE `tb_sparepart` (
  `sparepart_id` int(11) NOT NULL,
  `sparepart_kode` varchar(33) NOT NULL,
  `sparepart_nama` varchar(50) NOT NULL,
  `sparepart_harga` bigint(11) NOT NULL,
  `sparepart_status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sparepart`
--

INSERT INTO `tb_sparepart` (`sparepart_id`, `sparepart_kode`, `sparepart_nama`, `sparepart_harga`, `sparepart_status`) VALUES
(1, 'OL984', 'Oli MPX AHM', 40000, b'0'),
(15, 'KVC100', 'Kanvas Kopling', 80000, b'0'),
(16, '08232M99K8JN9', 'MPX1 10W30 SJMA 0,8L', 31000, b'1'),
(17, '08233M99K8JN9', 'SPX1 10W30 SJMA 0.8L', 37000, b'1'),
(18, '06455-KR3-404', 'Kampas Rem Cakram Depan', 38000, b'1'),
(19, '22201-KPH-901', 'Plat Kopling', 150000, b'1'),
(20, '22201-KPH-901', 'Plat Kopling', 150000, b'0'),
(21, '22401-KPH-900', 'Per Kopling', 18000, b'1'),
(22, '06535-GN5-505', 'Race Stering Kit', 70000, b'1'),
(23, '31500-KPH-881', 'BATTERY GTZ5S GS', 169000, b'1'),
(24, '34901-KPH-881', 'Bohlam Lampu Dpn', 27000, b'1'),
(25, '34905-KAN-W01', 'Bohlam Sen 12V10W', 11500, b'1'),
(26, '08CLA-H50-500', 'Cairan Pendingin Radiator (Coolant)', 16500, b'1'),
(27, '08232M99K8BN9', 'MPX2 10W30 SJMB 0,8L', 34000, b'1'),
(28, '08232M69K8SJ9', 'SPX2 10W30 SJMB 0,8L 4AT', 38500, b'1'),
(29, '08264M99Z0BN9', 'Transmission Gear Oil', 12000, b'1'),
(30, '43130-KVB-901', 'Kampas Rem Tromol Blk', 58500, b'1'),
(31, '2212AK36T00', 'Roller Weight Set', 47000, b'1'),
(32, '53133K18900', 'Rubber,Handle Cush', 1500, b'1'),
(33, '53100K15920ZA', 'Pipe Steering Handle', 55000, b'1'),
(34, '33450K15921', 'Winker Assy, L FR', 107000, b'1'),
(35, '88110KCJ660', 'Mirror Assy R Back', 46000, b'1'),
(36, '18318K59A10', 'Muffler Protector Vario 125/150', 30000, b'1'),
(37, '88120KCJ660', 'Mirror Assy L Back', 46000, b'1'),
(38, '88120KZR600', 'Mirror Assy L Matic', 39000, b'1'),
(39, '88110KZR600', 'Mirror Assy R Matic', 39000, b'1'),
(40, '31919K25602', 'Spark Plug U27EPR-N9 (Busi)', 16400, b'1'),
(41, '18318KVY901', 'Protector Muffler Beat', 17000, b'1'),
(42, '23100K35V01', 'Belt Drive Vario 125/150', 120000, b'1'),
(43, '3501AK59A10', 'Key Set Assy Vario 150 eSP', 560000, b'1'),
(44, '17210KZR600', 'Saringan Udara Vario 125 /150', 54500, b'1'),
(45, '24651KSP910', 'Spring Gear Shift Return', 5500, b'1'),
(46, '23100KZLBA0', 'Belt Drive Kit Matic110', 135000, b'1'),
(47, '35010K25600', 'Key Set BeAT POP eSP', 176000, b'1'),
(48, '44830KVY721', 'Cable Comp,Spdmt', 22000, b'1'),
(49, '17210K03N30', 'Saringan Udara Rvo FI Supra125FI Blade FI', 42500, b'1'),
(50, '17210K16900', 'Saringan Udara BeAT', 45000, b'1'),
(51, '42753GM9743', 'Valve Rim Tubless Vario 125/150', 30000, b'1'),
(52, '48000', 'Saringan Udara Old CB150R', 150000, b'1'),
(53, '3501AK60B00', 'Key Set 125 eSP', 150000, b'1'),
(54, '17211KYE900', 'Saringan Udara Mega Pro Karbu', 21000, b'1'),
(55, '17210KPH900', 'Saringan Udara Kharisma/SupraX125', 30000, b'1'),
(56, '22535KVY900', 'Kampas Kopling Ganda BeAT Karbu', 123000, b'1'),
(57, '17211K18900', 'Saringan udara New Mega Pro/Verza', 49500, b'1'),
(58, '35010K56N00', 'Key Set Sonic 150R', 240500, b'1'),
(59, '3510AK46N00', 'Key Set Vario 110', 170000, b'1'),
(60, '35010K15901', 'Key Set Old CB150R', 550000, b'1'),
(61, '35010K45N00', 'Key Set CBR 150', 595000, b'1'),
(62, '31500KCJFM0', 'Battery Gm7B-4B', 293000, b'1'),
(63, '35010K56N10', 'Key Set Supra GTR', 240000, b'1'),
(64, '35010KYT940', 'Key Set Spacy FI', 218500, b'1'),
(65, '34901KWR004', 'Bulb Headlight Old CB150', 211500, b'1'),
(66, '17210KYZ900', 'Saringan Udara Supra X 125 Helm In FI', 45000, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trservice`
--

CREATE TABLE `tb_trservice` (
  `trs_id` int(11) NOT NULL,
  `trs_booking` int(11) NOT NULL,
  `trs_tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_trservice`
--

INSERT INTO `tb_trservice` (`trs_id`, `trs_booking`, `trs_tgl`) VALUES
(11, 1, '2017-07-18 17:37:49'),
(12, 3, '2017-07-21 07:52:37'),
(13, 5, '2017-07-21 08:13:52'),
(14, 6, '2017-07-28 06:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `type_id` int(11) NOT NULL,
  `type_nama` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`type_id`, `type_nama`) VALUES
(1, 'Supra'),
(5, 'Revo'),
(6, 'Vario'),
(7, 'BeAT'),
(8, 'Scoopy'),
(9, 'Megapro'),
(10, 'Kharisma'),
(11, 'Blade'),
(12, 'CBR'),
(13, 'Verza'),
(14, 'PCX'),
(15, 'Spacy'),
(16, 'CS1'),
(17, 'CB150R'),
(18, 'Sonic');

-- --------------------------------------------------------

--
-- Table structure for table `tb_variant`
--

CREATE TABLE `tb_variant` (
  `variant_id` int(11) NOT NULL,
  `variant_type` int(11) NOT NULL,
  `variant_nama` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_variant`
--

INSERT INTO `tb_variant` (`variant_id`, `variant_type`, `variant_nama`) VALUES
(3, 3, 'CW CBS'),
(6, 5, 'Absolute Revo CW'),
(7, 5, 'Absolute Revo SW'),
(8, 5, 'Absolute Revo Fit'),
(9, 11, 'New Blade R'),
(10, 1, 'Supra X 125 SW'),
(11, 11, 'New Blade Repsol'),
(12, 1, 'Supra X 125 CW'),
(13, 1, 'Supra X 125 Helm-In PGM-FI'),
(14, 6, 'Vario CW 110'),
(15, 14, 'PCX 150'),
(16, 7, 'BeAT Fi CW CBS'),
(17, 7, 'BeAT Fi CW'),
(18, 6, 'Vario Techno 125 CBS ISS'),
(19, 6, 'Vario Techno 125 CBS'),
(20, 15, 'Spacy Fi'),
(21, 7, 'BeAT Fi SW'),
(22, 8, 'Scoopy Fi Stylish'),
(23, 8, 'Scoopy Fi Sporty'),
(24, 17, 'CB150R Streetfire'),
(25, 12, 'CBR 150R STD'),
(26, 12, 'CBR 150R Repsol'),
(27, 12, 'CBR 250R STD'),
(28, 12, 'CBR 250R STD Repsol'),
(29, 12, 'CBR 250R ABS'),
(30, 12, 'CBR 250R ABS Repsol'),
(31, 12, 'CBR 250R STD Tri Color'),
(32, 13, 'Verza 150 Spoke Wheel'),
(33, 9, 'New Mega Pro No Variant'),
(34, 12, 'CBR 150R Tri Color'),
(35, 13, 'Verza 150 Cast Wheel'),
(36, 12, 'CBR 250R ABS TriColor'),
(37, 17, 'CB150R Streetfire Special Edition'),
(38, 5, 'Revo AT'),
(39, 10, 'Kharisma X'),
(40, 16, 'CS1 CW'),
(42, 1, 'Supra GTR 150'),
(43, 7, 'BeAT Street eSP'),
(44, 7, 'BeAT POP eSP CBS ISS'),
(46, 7, 'BeAT POP eSP CW'),
(47, 7, 'BeAT eSP CBS ISS'),
(48, 7, 'BeAT eSP CW'),
(49, 10, 'Kharisma 125D'),
(50, 18, 'Sonic 150R'),
(51, 5, 'Revo FI FIT'),
(52, 5, 'Revo FI STD'),
(53, 5, 'Revo FI CW'),
(54, 11, 'Blade 125 R FI'),
(55, 1, 'Supra X 100'),
(56, 1, 'BeAT 110 Karbu'),
(57, 6, 'Vario 110 eSP CBS ISS'),
(58, 6, 'Vario 110 esp CBS ISS'),
(59, 6, 'Vario Techno 110');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tb_costumer`
--
ALTER TABLE `tb_costumer`
  ADD PRIMARY KEY (`costumer_id`);

--
-- Indexes for table `tb_detail_service`
--
ALTER TABLE `tb_detail_service`
  ADD PRIMARY KEY (`dservice_id`);

--
-- Indexes for table `tb_detail_sparepart`
--
ALTER TABLE `tb_detail_sparepart`
  ADD PRIMARY KEY (`dsparepart_id`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tb_kend_costumer`
--
ALTER TABLE `tb_kend_costumer`
  ADD PRIMARY KEY (`kendCos_id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`login_usr`);

--
-- Indexes for table `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`saran_id`);

--
-- Indexes for table `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tb_sparepart`
--
ALTER TABLE `tb_sparepart`
  ADD PRIMARY KEY (`sparepart_id`);

--
-- Indexes for table `tb_trservice`
--
ALTER TABLE `tb_trservice`
  ADD PRIMARY KEY (`trs_id`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tb_variant`
--
ALTER TABLE `tb_variant`
  ADD PRIMARY KEY (`variant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_costumer`
--
ALTER TABLE `tb_costumer`
  MODIFY `costumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_detail_service`
--
ALTER TABLE `tb_detail_service`
  MODIFY `dservice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_detail_sparepart`
--
ALTER TABLE `tb_detail_sparepart`
  MODIFY `dsparepart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_kend_costumer`
--
ALTER TABLE `tb_kend_costumer`
  MODIFY `kendCos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_saran`
--
ALTER TABLE `tb_saran`
  MODIFY `saran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_sparepart`
--
ALTER TABLE `tb_sparepart`
  MODIFY `sparepart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tb_trservice`
--
ALTER TABLE `tb_trservice`
  MODIFY `trs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_variant`
--
ALTER TABLE `tb_variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
