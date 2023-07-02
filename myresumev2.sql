-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2023 pada 15.13
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myresumev2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenance_mode`
--

CREATE TABLE `maintenance_mode` (
  `id_maintenance_mode` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `maintenance_message` mediumtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maintenance_mode`
--

INSERT INTO `maintenance_mode` (`id_maintenance_mode`, `status`, `maintenance_message`) VALUES
(1, 0, 'We apologize, we are currently in maintenance mode. We\'ll be back soon for you guys');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(2, 'rfebiaris', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_content`
--

CREATE TABLE `tbl_content` (
  `id_content` int(11) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `img_bg_paralax` varchar(200) DEFAULT NULL,
  `foto_profil` varchar(200) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `profesi` varchar(200) DEFAULT NULL,
  `file_cv` varchar(200) DEFAULT NULL,
  `about` text,
  `bi_tgl_lahir` date DEFAULT NULL,
  `bi_email` varchar(50) DEFAULT NULL,
  `bi_phone` varchar(24) DEFAULT NULL,
  `bi_address` varchar(150) DEFAULT NULL,
  `bi_address_map` varchar(255) DEFAULT NULL,
  `bi_language` varchar(50) DEFAULT NULL,
  `img_bg_contact` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_content`
--

INSERT INTO `tbl_content` (`id_content`, `logo`, `img_bg_paralax`, `foto_profil`, `nama`, `profesi`, `file_cv`, `about`, `bi_tgl_lahir`, `bi_email`, `bi_phone`, `bi_address`, `bi_address_map`, `bi_language`, `img_bg_contact`) VALUES
(1, '24-06-2020IMG1592973728.png', '30-03-2022ISI07-03-56.jpg', '30-03-2022ISI07-06-04.png', 'Febi Aris Rinaldi', 'Software Engineer', '02-07-2023CV20-11-58.pdf', 'Hello everyone!<br>My name is Febi Aris Rinaldi, my friends used to call me Febi, I am a Web Developer / Software Engineer, I was born and live in Jampang Sukabumi, a beautiful agricultural Regency in Sukabumi, I have two siblings, a sister, and a brother.</p>\r\n<p>I am a graduate of Informatics Engineering, Muhammadiyah University of Sukabumi. Graduated in 2018, with very satisfactory\r\n<p>I will always work hard to deliver the best results, because I usually look for the best way to do my job and I always try to make a positive impact on others.', '1996-02-19', 'rfebiaris@gmail.com_nonaktif', '6285718215867_nonaktif', 'Kp. Pasirmalang, RT 2 RW 1, Desa Gunung Sungging, Kecamatan Surade, Kabupaten Sukabumi, Provinsi Jawa Barat, Indonesia', 'https://goo.gl/maps/Sc6oz6MJLufaoarJ6', 'Indonesia', '30-03-2022ISI07-17-46.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_education`
--

CREATE TABLE `tbl_education` (
  `id_education` int(11) NOT NULL,
  `tahun_masuk` varchar(4) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `tingkat_education` varchar(100) NOT NULL,
  `degree` varchar(30) DEFAULT NULL,
  `jurusan` varchar(100) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `informasi_education` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_education`
--

INSERT INTO `tbl_education` (`id_education`, `tahun_masuk`, `tahun_lulus`, `tingkat_education`, `degree`, `jurusan`, `nama_instansi`, `informasi_education`) VALUES
(11, '2014', '2018', 'Bachelor\'s Degree', 'Bachelor of Computing', 'Informatics Engineering', 'Muhammadiyah University of Sukabumi', 'On this place, I was learning so many things, but what I loved is about web development.<br><a target=\'_blank\' href=\'https://ummi.ac.id\'>ummi.ac.id</a>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_follow_me`
--

CREATE TABLE `tbl_follow_me` (
  `id_sosmed` int(11) NOT NULL,
  `url_sosmed` varchar(200) NOT NULL,
  `nama_sosmed` varchar(50) NOT NULL,
  `icon_sosmed` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_follow_me`
--

INSERT INTO `tbl_follow_me` (`id_sosmed`, `url_sosmed`, `nama_sosmed`, `icon_sosmed`) VALUES
(1, 'https://www.facebook.com/rfebiaris', 'facebook', 'fa fa-facebook'),
(2, 'https://twitter.com/rfebiaris', 'twitter', 'fa fa-twitter'),
(3, 'https://www.linkedin.com/in/farinal', 'linkedin', 'fa fa-linkedin'),
(4, 'https://www.instagram.com/96.natanael', 'instagram', 'fa fa-instagram'),
(5, 'https://github.com/farhasaview', 'github', 'fa fa-github');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_portfolio`
--

CREATE TABLE `tbl_portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `capture` varchar(200) NOT NULL,
  `nama_portfolio` varchar(100) NOT NULL,
  `url_portfolio` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_portfolio`
--

INSERT INTO `tbl_portfolio` (`id_portfolio`, `status`, `capture`, `nama_portfolio`, `url_portfolio`) VALUES
(14, 1, '27-06-2020PRTFL1593292866.png', 'Website Personal Profile V1', 'http://myresume21.000webhostapp.com/'),
(13, 1, '27-06-2020PRTFL1593292775.jpg', 'Website News and Profile', ''),
(12, 1, '27-06-2020PRTFL1593292627.png', 'Website Mudrikah Dairy Farm', ''),
(15, 1, '27-06-2020PRTFL1593293312.png', 'Website About Doctor\'s Schedule', ''),
(16, 1, '27-06-2020PRTFL1593293417.png', 'Inventory RS. Mata SMEC Group', 'https://inventory.smec-group.com'),
(17, 1, '27-06-2020PRTFL1593293554.png', 'Inventory PT. Yota Medika Indonesia', 'https://yotamed.smec-group.com'),
(18, 1, '27-06-2020PRTFL1593293597.jpg', 'SUDEWA PT. Asuransi Jiwasraya (Persero) Website About Insurance', ''),
(19, 1, '27-06-2020PRTFL1593293730.png', 'Website Personal Profile V2', 'http://myresumev2.epizy.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_skill`
--

CREATE TABLE `tbl_skill` (
  `id_skill` int(11) NOT NULL,
  `nama_skill` varchar(30) NOT NULL,
  `persen_skill` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_skill`
--

INSERT INTO `tbl_skill` (`id_skill`, `nama_skill`, `persen_skill`) VALUES
(1, 'html', '75'),
(2, 'php', '88'),
(3, 'css', '75'),
(4, 'ajax', '75'),
(5, 'jquery', '75'),
(6, 'codeigniter', '85'),
(7, 'bootstrap', '75'),
(8, 'mysql', '80'),
(9, 'javascript', '80'),
(10, 'oracle database', '80'),
(11, 'photoshop', '50'),
(12, 'ms. office', '55'),
(13, 'CentOS', '67'),
(14, 'Ubuntu', '65');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_work_experience`
--

CREATE TABLE `tbl_work_experience` (
  `id_work_experience` int(11) NOT NULL,
  `tgl_awal_kerja` date NOT NULL,
  `tgl_akhir_kerja` date DEFAULT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `informasi_pekerjaan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_work_experience`
--

INSERT INTO `tbl_work_experience` (`id_work_experience`, `tgl_awal_kerja`, `tgl_akhir_kerja`, `nama_perusahaan`, `jabatan`, `informasi_pekerjaan`) VALUES
(6, '2019-07-31', '2019-11-13', 'PT. Global Inovasi Cahaya (SMEC Group), East Jakarta', 'Web Developer', 'Digitalization Software Company for SMEC Eye Hospital Holder Hospital Ecosystem, I was\r\nassigned to manage the Inventory website, solve problems during incoming and outgoing\r\ngoods scenarios, then create the required features, the technology used is PHP, CodeIgniter,\r\nNode JS, Express JS, Database MySQL\r\nThis company was located at PTC Pulo Gadung, East Jakarta.<br><a target=\'_blank\' href=\'http://gic-indonesia.com\'>gic-indonesia.com</a> <br><a target=\'_blank\' href=\'https://www.rsmatasmec.com\'>www.rsmatasmec.com</a>'),
(7, '2020-01-02', '2020-06-01', 'PT. GRAHA KARYA INFORMASI, South Jakarta', 'Programmer', 'This company is an IT Consulting / Outsourcing information technology service company, a\r\nsubsidiary of Mastersystem Infotama, I was placed at PT Asuransi Jiwasraya (persero) in a\r\nproject to build a website-based system, the technology used in accordance with client\r\nrequests using PHP 7 CodeIgniter 3 Oracle database\r\nNew knowledge in the work environment:\r\nOracle Database, Scrum Method, Toad for Oracle, fundamentals of insurance knowledge,\r\nTSD, FSD.\r\nThe company was located at Bellagio Residence & Mall Unit OG-29, Jl. Mega Kuningan Barat\r\nKav E4.3, Setiabudi, RT.5 / RW.2, Kuningan, Kuningan Tim., City of South Jakarta, Special\r\nCapital Region of Jakarta 12950 <br><a target=\'_blank\' href=\'https://grahakarya.com\'>grahakarya.com</a>'),
(12, '2020-09-29', '2021-03-28', 'PT. ILCS (Indonesia Logistics Community Service), North Jakarta', 'O&M Application, Platform and Database Officer', 'ILCS (Indonesia Logistics Community Service) is a company that provides information services, document exchange and electronic payments to the Indonesian logistics community.\r\n\r\nFounded by PT Pelindo II (Persero) or Indonesia Port Corporation (IPC) and PT Telekomunikasi Indonesia (TELKOM), two leading state-owned companies in the port and the telecommunications industry.\r\nILCS is dedicated to increasing the competitiveness of the Indonesian logistics industry to be on par with developed countries.\r\n\r\nILCS is one of the answers to the vision of the National Logistics System with the aim of creating a national logistics system that is locally integrated and globally connected. <br><a target=\'_blank\' href=\'http://www.ilcs.co.id\'>www.ilcs.co.id</a>'),
(13, '2021-03-29', '2024-03-28', 'PT. ILCS (Indonesia Logistics Community Service), North Jakarta', 'Developer Engineer', 'ILCS (Indonesia Logistics Community Service) is a company that provides information services, document exchange and electronic payments to the Indonesian logistics community.\r\n\r\nFounded by PT Pelindo II (Persero) or Indonesia Port Corporation (IPC) and PT Telekomunikasi Indonesia (TELKOM), two leading state-owned companies in the port and the telecommunications industry.\r\nILCS is dedicated to increasing the competitiveness of the Indonesian logistics industry to be on par with developed countries.\r\n\r\nILCS is one of the answers to the vision of the National Logistics System with the aim of creating a national logistics system that is locally integrated and globally connected. <br><a target=\'_blank\' href=\'http://www.ilcs.co.id\'>www.ilcs.co.id</a>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `maintenance_mode`
--
ALTER TABLE `maintenance_mode`
  ADD PRIMARY KEY (`id_maintenance_mode`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indeks untuk tabel `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`id_education`);

--
-- Indeks untuk tabel `tbl_follow_me`
--
ALTER TABLE `tbl_follow_me`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indeks untuk tabel `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indeks untuk tabel `tbl_skill`
--
ALTER TABLE `tbl_skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- Indeks untuk tabel `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  ADD PRIMARY KEY (`id_work_experience`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `maintenance_mode`
--
ALTER TABLE `maintenance_mode`
  MODIFY `id_maintenance_mode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_follow_me`
--
ALTER TABLE `tbl_follow_me`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_skill`
--
ALTER TABLE `tbl_skill`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  MODIFY `id_work_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
