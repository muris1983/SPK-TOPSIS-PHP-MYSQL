-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2018 at 05:28 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indekos`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa`
--

CREATE TABLE IF NOT EXISTS `analisa` (
  `id_analisa` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nilainya` varchar(11) NOT NULL,
  PRIMARY KEY (`id_analisa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `analisa`
--

INSERT INTO `analisa` (`id_analisa`, `id_kriteria`, `id_pemilik`, `nilainya`) VALUES
(1, 1, 1, '3'),
(2, 2, 1, '2'),
(3, 3, 1, '3'),
(4, 4, 1, '2'),
(5, 5, 1, '2'),
(6, 6, 1, '2'),
(7, 1, 2, '5'),
(8, 2, 2, '4'),
(9, 3, 2, '5'),
(10, 4, 2, '4'),
(11, 5, 2, '4'),
(12, 6, 2, '4'),
(13, 1, 3, '5'),
(14, 2, 3, '2'),
(15, 3, 3, '3'),
(16, 4, 3, '2'),
(17, 5, 3, '4'),
(18, 6, 3, '3'),
(19, 1, 4, '3'),
(20, 2, 4, '2'),
(21, 3, 4, '3'),
(22, 4, 4, '2'),
(23, 5, 4, '2'),
(24, 6, 4, '4'),
(26, 1, 5, '5'),
(27, 2, 5, '2'),
(28, 3, 5, '3'),
(29, 4, 5, '3'),
(30, 5, 5, '3'),
(31, 6, 5, '4'),
(32, 1, 8, '5'),
(33, 2, 8, '2'),
(34, 3, 8, '4'),
(35, 4, 8, '2'),
(36, 5, 8, '2'),
(37, 6, 8, '4'),
(38, 1, 9, '4'),
(39, 2, 9, '2'),
(40, 3, 9, '2'),
(41, 4, 9, '2'),
(42, 5, 9, '2'),
(43, 6, 9, '3'),
(44, 1, 10, '4'),
(45, 2, 10, '2'),
(46, 3, 10, '2'),
(47, 4, 10, '2'),
(48, 5, 10, '2'),
(49, 6, 10, '2'),
(50, 1, 11, '5'),
(51, 2, 11, '3'),
(52, 3, 11, '2'),
(53, 4, 11, '3'),
(54, 5, 11, '2'),
(55, 6, 11, '2'),
(56, 1, 12, '5'),
(57, 2, 12, '2'),
(58, 3, 12, '3'),
(59, 4, 12, '4'),
(60, 5, 12, '2'),
(61, 6, 12, '2'),
(63, 1, 13, '5'),
(64, 2, 13, '2'),
(65, 3, 13, '3'),
(66, 4, 13, '5'),
(67, 5, 13, '2'),
(68, 6, 13, '2'),
(69, 1, 14, '3'),
(70, 2, 14, '2'),
(71, 3, 14, '2'),
(72, 4, 14, '2'),
(73, 5, 14, '2'),
(74, 6, 14, '2');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Teknik Komunikasi Dan Elektro'),
(2, 'Teknologi Industri Dan Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemilik` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tipeharga` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `gambar4` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_pemilik`, `tipe`, `deskripsi`, `harga`, `tipeharga`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `status`) VALUES
(1, 2, 'putri', 'Kamar kos dengan beralamat di jalan di panjaitan gg karang baru III no 199 purwokerto banyumas jawa tengah ', '500000', 'bulan', '20180502_122736 (FILEminimizer).jpg', '20180502_123310 (FILEminimizer).jpg', '20180502_123403 (FILEminimizer).jpg', '20180502_123424 (FILEminimizer).jpg', 'y'),
(2, 1, 'putri', 'hunian kamar kos putri yang beralamat di jl di panjaitan gang karang baru ii no 63 purwokerto kabupaten banyumas jawa tengah ', '500000', 'bulan', '20180502_124414 (FILEminimizer).jpg', '20180502_124531 (FILEminimizer).jpg', '20180502_124615 (FILEminimizer).jpg', '20180502_124740 (FILEminimizer).jpg', 'y'),
(3, 3, 'putri', 'hunian kos khusus putri yang beralamat di jl di panjaitan purwokerto kabupaten banyumas jawa tengah ', '350000', 'bulan', '20180502_122324 (FILEminimizer).jpg', '20180502_122144 (FILEminimizer).jpg', '20180502_122210 (FILEminimizer).jpg', '20180502_122210 (FILEminimizer).jpg', 'y'),
(4, 4, 'campur', 'hunian kos untuk putra dan putri yang terletak di jl di panjaitan purwokerto kabupaten banyumas jawa tengah dna bertepatan di depan telkom purwokerto', '450000', 'bulan', '20180502_121206 (FILEminimizer).jpg', '20180502_120915 (FILEminimizer).jpg', '20180502_121033 (FILEminimizer).jpg', '20180502_120926 (FILEminimizer).jpg', 'y'),
(5, 5, 'putra', 'hunian kos untuk putra yang terletak di jl di panjaitan yang terdekat di kampus telkom purwokerto ', '400000', 'bulan', '20180502_125521 (FILEminimizer).jpg', '20180502_125542 (FILEminimizer).jpg', '20180502_125513 (FILEminimizer).jpg', '20180502_125640 (FILEminimizer).jpg', 'y'),
(6, 8, 'putri', 'Kost putri nyaman, bersih, dan aman.\r\n\r\nKamar furnished (ranjang, sprei, bantal, meja, kursi, AC, lemari, lampu, gorden, keranjang laundry, tempat sampah)\r\n\r\nKamar mandi dalam dilengkapi dengan air panas\r\n\r\nFree high speed wifi 24 jam\r\n\r\nFree TV cable', '1000000', 'bulan', '1495496555131966296_large.JPG', '1495496555672900354_large.JPG', '1495496555779341800_large.JPG', '149549655423510486_large.JPG', 'y'),
(7, 9, 'putri', 'Kost Putri Kamaratih\r\nkost khusus untuk wanita, baik Pekerja maupun mahasiswi\r\nlokasi dekat dengan RS Margono, Kampus II UMP di Sokaraja.', '750000', 'bulan', '14670796941038464028_large.jpg', '14670796901452830263_large.jpg', '146707969014528302631_large.jpg', '1467079693520531942_large.jpg', 'y'),
(8, 10, 'putra', 'kos YASMIN, terima kos cowok/putra di purwokerto. Fasilitas:kamar mandi dalam, aman, ada parkiran motor,\r\nAlamat: jl.puteran, belakang apt.anugrah berkoh, dari bunderan air mancur berkoh ke arah margono, sebelum apt.anugrah ada gang masuk 5m, ada warung makan padang sebelahnya ada gang kecil masuk 5m.', '400000', 'bulan', '1457538976859000817.jpg', '1457538976267953663.jpg', '1457538976919188111.jpg', '145753897687839443.jpg', 'y'),
(9, 11, 'putri', 'Disewakan kamar kost murah meriah, nyaman, fasilitas lengkap. Lokasi sangat dekat dengan Universitas Jenderal Soedirman UNSOED Purwokerto\r\nJl. Ahmad Djaelani Karangwangkal Purwokerto Utara', '300000', 'bulan', '145753909477321110.jpg', '14575392871197920773.jpg', '14575393761227180067.jpg', '145753909477321110.jpg', 'y'),
(10, 12, 'putri', 'TERIMA KOST PUTRI ARSYILA (dekat Fakultas Kedokteran UNSOED Purwokerto)  Dekat RS Margono Soekarjo (Â± 5menit), 10 menit dari terminal Purwokerto, 15 menit dari Pusat Kota Purwokerto.', '800000', 'bulan', '_1_.jpg', '_4_.jpg', '_2_.jpg', '_3_.jpg', 'y'),
(11, 13, 'putri', 'terima kost putri bersih dan nyaman fasiltas lengkap di dalam kamar ada kipas angin meja belajar dan lemari pakaian dan tempat tidur.fasilitas bersama ada ruang tamu, ruang santai ada tv dan kulkas,dan ada dapur beserta kompor dan gas. dan ada jemuran pakaian.', '450000', 'bulan', 'reno1.jpg', 'reno2.jpg', 'reno4.jpg', 'reno3.jpg', 'y'),
(12, 14, 'putri', 'Kos/kost putri/siswi/mahasiswi/karyawati "Wisma Sakinah"\r\n\r\nKomplek GOR Purwokerto. Strategis, dekat dgn Unsoed/Unsud, Al Irsyad, sentra kuliner GOR. Lingkungan asri, aman, nyaman.', '500000', 'bulan', 'sakinah1.jpg', 'sakinah3.jpg', 'sakinah4.jpg', 'sakinah2.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `atribut` varchar(50) NOT NULL,
  `bobot_nilai` varchar(50) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `atribut`, `bobot_nilai`, `nama_kriteria`) VALUES
(1, 'benefit', '5', 'Fasilitas'),
(2, 'cost', '4', 'Biaya'),
(3, 'benefit', '3', 'Kenyamanan'),
(4, 'benefit', '3', 'Keamanan'),
(5, 'cost', '2', 'Jarak'),
(6, 'benefit', '2', 'kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `no_telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `password_asli` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `status` enum('admin','pemilik','user') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `nama`, `alamat`, `no_telepon`, `email`, `password`, `password_asli`, `status`) VALUES
('admin', 'administrator', '', '', '', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
('avit', 'avit', 'purwokerto', '085726345645', 'avita.rinovita@gmail', '152621f4c14a6fd52824f2b60927cae6', '', 'user'),
('budi', 'budi', 'jalan selatan kampus telkom purwokerto ', '085767657647', 'budi@gmail.com', 'eea2c1e5e921bba51478fb8ff99fa077', '', 'user'),
('anton', 'anton', 'jalan arsadimeja no 30 rt 2/4 purwokerto banyumas', '08156972222', 'pihcynkmih@rocketmail.com', '75f9b0ef29785f83d7ebfc04c3bdb1f9', '', 'user'),
('dita', 'Dita Agustika', 'Jalan Prof Dr Soeharso Kavling Gelora Indah 1 Gang Bolling No.1', '082313359574', 'dita@gmail.com', 'ca704e6ec18ae0c57752fd0c42b1912d', '', 'pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE IF NOT EXISTS `pemilik` (
  `id_pemilik` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_kos` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pemilik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `user`, `nama`, `nama_kos`, `telepon`, `alamat`, `foto`, `status`) VALUES
(1, '', 'Yuliantati', 'Wisma Lensa', '085291162992', 'Jl. DI Panjaitan Gang Karang Baru II No 63 Purwokerto Banyumas', '', 'y'),
(2, '', 'Pak Elvis', 'Jasmine Kost', '08156972222', 'Jl DI Panjaitan Gg Karang Baru III No 199', '', 'y'),
(3, '', 'Rizka Dwi Ananda', 'Greenhouse', '081327085692', 'Jl DI Panjaitan', '', 'y'),
(4, '', 'Hj. Siti Sopiyah', 'ZINK Kost', '081327085692', 'Jl. D.I. Panjaitan, Purwokerto Kidul, Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53141', '', 'y'),
(5, '', 'Ibu Tia', 'Kos Bu Tia', '08242759755', 'Jl Di Panjaitan', '', 'y'),
(8, '', 'Bapak Fajar', 'Kost Putri Eksklusif', '085726847653', 'Perumahan Berkoh Indah Blok G III No. 328, Purwokerto', '', 'y'),
(9, '', 'Ibu Ana', 'Kos Putri Kamaratih', '08164880053', 'jalan Sunan Kalijaga gang VI no 6A, Berkoh - Purwokerto', '', 'y'),
(10, '', 'Bapak Kirman', 'Kos Yasmin', '085726063530', 'jl.puteran, berkoh purwokerto', '', 'y'),
(11, '', 'Ahmad Djaelani', 'Kos Putri Ahmad', '083845046050', 'Jl. Ahmad Djaelani Karangwangkal Purwokerto Utara', '', 'y'),
(12, '', 'Bapak Yusman', 'Kos Putri Arsyila', '028161392418', 'Jl. Sunan Kalijaga Gg VI No. 36 RT 04/ RW 02 Berkoh Purwokerto', '', 'y'),
(13, '', 'Bapak Reno', 'Wisma Ketapang', '081390519455', 'perumahan ketapang indah blok D1 no 62 purwokerto depan pool bis efisensi sebelah RS Margono', '', 'y'),
(14, '', 'Ibu Sakinah', 'Wisma Sakinah', '081542624186', 'Komplek Gor Satria Purwokerto', '', 'y'),
(18, 'dita', 'dita', 'dita kos', '085676545444', 'jalan perintis kemerdekaan no 15 ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `progdi`
--

CREATE TABLE IF NOT EXISTS `progdi` (
  `id_progdi` int(11) NOT NULL AUTO_INCREMENT,
  `id_fakultas` int(11) NOT NULL,
  `nama_progdi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_progdi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `progdi`
--

INSERT INTO `progdi` (`id_progdi`, `id_fakultas`, `nama_progdi`) VALUES
(1, 1, 'D3 Teknik Telekomunikasi'),
(2, 1, 'S1 Teknik Telekomunikasi '),
(3, 1, 'S1 Teknik Elektro'),
(4, 2, 'S1 Teknik Informatika'),
(5, 2, 'S1 Software Engineering'),
(6, 2, 'S1 Sistem Informasi'),
(7, 2, 'S1 Teknik Industri'),
(8, 2, 'S1 Desain Komunikasi Visual');

-- --------------------------------------------------------

--
-- Table structure for table `t_kriteria`
--

CREATE TABLE IF NOT EXISTS `t_kriteria` (
  `id_tkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nkriteria` varchar(15) NOT NULL,
  PRIMARY KEY (`id_tkriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `t_kriteria`
--

INSERT INTO `t_kriteria` (`id_tkriteria`, `id_kriteria`, `keterangan`, `nkriteria`) VALUES
(1, 1, 'Kasur,Alamari', '1'),
(2, 1, 'kasur, alamari,meja', '2'),
(3, 1, 'kasur,almari,meja,kipas angin', '3'),
(4, 1, 'kasur,almari,meja,kursi,kipas angin', '4'),
(5, 1, 'kasur,alamari,meja,kursi,kipas angin,tv', '5'),
(6, 2, '>=500000', '1'),
(7, 2, '>500000<300000', '2'),
(8, 2, '>300000<250000', '3'),
(9, 2, '>250000<200000', '4'),
(10, 2, '<=200000', '5'),
(11, 3, 'dekat kampus,ruangan kamar luas', '1'),
(12, 3, 'dekat kampus,dekat warung makan', '2'),
(13, 3, 'dekat kampus,dekat warung makan,alfamart dan pasar', '3'),
(14, 3, 'dekat dekat kampus,dekat warung makan,alfamart dan mall', '4'),
(15, 3, 'dekat kampus,dekat warung makan,alfamart,pasar,atm,mall', '5'),
(16, 4, 'keamanan dari cctv', '1'),
(17, 4, 'penjaga kos', '2'),
(18, 4, 'tinggal bersama pemilik kos', '3'),
(19, 4, 'bersama pemilik kos dan terdapat cctv', '4'),
(20, 4, 'tanggung jawab bersama', '5'),
(21, 5, '>=1KM', '1'),
(22, 5, '>1KM<500M', '2'),
(23, 5, '>500M<250M', '3'),
(24, 5, '>250m<50M', '4'),
(25, 5, '<=50M', '5'),
(26, 6, 'terdapat jadwal piket anak kos', '1'),
(27, 6, 'kebersihan diambil dari pihak luar', '2'),
(28, 6, 'pemilik kos membantu kebersihan hunian kos', '3'),
(29, 6, 'kebersihan menjadi tanggung jawab bersama', '4'),
(30, 6, 'kebersihan rutin menjadi tanggung jawab pemilik kos', '5');
