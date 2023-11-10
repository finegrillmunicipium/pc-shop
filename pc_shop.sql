-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 06:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime_prezime` varchar(100) NOT NULL,
  `korisnicko_ime` varchar(100) NOT NULL,
  `lozinka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `ime_prezime`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'Aleksandar Radić', 'acoradic', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Marko Marković', 'markomarkovic', '15c73d14565a137dd9668659ff3a0322'),
(3, 'Nikola Nikolić', 'nikolanikolic', '5852b0cb24bfd7751f317e12da2ecb6b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategorije`
--

CREATE TABLE `tbl_kategorije` (
  `id` int(10) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `foto_naziv` varchar(255) NOT NULL,
  `objavljeno` varchar(10) NOT NULL,
  `aktivno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_kategorije`
--

INSERT INTO `tbl_kategorije` (`id`, `naziv`, `foto_naziv`, `objavljeno`, `aktivno`) VALUES
(1, 'Računari', 'racunari.jpg', 'Da', 'Da'),
(2, 'Laptopi', 'laptopi.jpg', 'Da', 'Da'),
(3, 'Monitori', 'monitori.jpg', 'Da', 'Da'),
(4, 'Komponente', 'komponente.jpg', 'Da', 'Da'),
(5, 'Periferija', 'periferija.jpg', 'Da', 'Da'),
(6, 'Mrežna oprema', 'mreznaoprema.jpg', 'Da', 'Da');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_narudzba`
--

CREATE TABLE `tbl_narudzba` (
  `id` int(10) UNSIGNED NOT NULL,
  `artikal` varchar(150) NOT NULL,
  `cijena` decimal(10,0) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `ukupno` decimal(10,0) NOT NULL,
  `datum_narudzbe` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `ime_prezime_kupca` varchar(150) NOT NULL,
  `telefon_kupca` varchar(20) NOT NULL,
  `email_kupca` varchar(150) NOT NULL,
  `adresa_kupca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_narudzba`
--

INSERT INTO `tbl_narudzba` (`id`, `artikal`, `cijena`, `kolicina`, `ukupno`, `datum_narudzbe`, `status`, `ime_prezime_kupca`, `telefon_kupca`, `email_kupca`, `adresa_kupca`) VALUES
(1, 'HP LAPTOP 17-CN0082NM', 861, 1, 861, '2003-07-23 06:09:34', 'Dostavlja se', 'Milovan Milanović', '066112113', 'milovanm@gmail.com', 'Boška Milinovića 17'),
(2, 'Ruter Wireless N Router, 300Mbps, 2.4GHz TL-WR840N', 46, 3, 138, '2003-07-23 06:11:00', 'Naruceno', 'Jovan Jovanović', '066211212', 'jovanj@gmail.com', 'Ivana Buhe 123'),
(3, 'AMD RADEON XFX 5700 XT 8GB', 550, 1, 550, '2003-07-23 06:12:00', 'Dostavljeno', 'Ivan Ivanović', '066312313', 'ivani@gmail.com', 'Matije Matića 14'),
(4, 'Gaming PC Impulse 24', 1799, 2, 3598, '2003-07-23 06:12:38', 'Dostavlja se', 'Zorana Zokić', '066411412', 'zoranaz@gmail.com', 'Milice Mikić 12'),
(5, 'Sony WH1000XM3', 550, 1, 550, '2003-07-23 06:13:38', 'Dostavljeno', 'Petar Petrović', '066512513', 'petarp@gmail.com', 'Majke Jugovića 65'),
(6, 'RAM Kingston Fury BEAST 8GB DDR4 DOPER-TECH', 49, 1, 49, '2003-07-23 06:14:24', 'Dostavljeno', 'Slaviša Đukić', '066712711', 'slavisad@gmail.com', 'Ivane Knežopoljke 33'),
(7, 'Razer Deathadder V2 Gaming Miš', 75, 20, 1500, '2003-07-23 06:15:15', 'Poništeno', 'Josip Lisac', '066777888', 'josipl@gmail.com', 'Marije Žunić 11'),
(8, 'Xiaomi Ruter - Mi Router 4C bijeli', 35, 10, 350, '2003-07-23 06:16:31', 'Naruceno', 'Zoran Cunjak', '066999444', 'zoranc@gmail.com', 'Obalske straže 16'),
(9, 'RAZER BlackWidow Chroma Tournament Edition V2', 255, 1, 255, '2003-07-23 06:18:33', 'Dostavlja se', 'Milica Mičić', '066124568', 'milicam@gmail.com', 'Kozarska bb'),
(10, 'LG MONITOR 24GN60R-B.BEU', 408, 2, 816, '2003-07-23 06:19:24', 'Naruceno', 'Luka Lukić', '066254874', 'lukal@gmail.com', 'Slobodana Kusturića 54'),
(11, 'LG MONITOR 24GN60R-B.BEU', 408, 1, 408, '2003-07-23 06:20:08', 'Dostavljeno', 'Goran Jovanović', '051212546', 'goranj@gmail.com', 'Kralja Petra II 65'),
(12, ' ACER NOTEBOOK A315-23-R2YV', 849, 1, 849, '2003-07-23 06:21:02', 'Naručeno', 'Aleksandar Radić', '066469453', 'radicn.wow@gmail.com', 'Milice Mikić 78');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ponuda`
--

CREATE TABLE `tbl_ponuda` (
  `id` int(10) UNSIGNED NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `cijena` decimal(10,2) NOT NULL,
  `kategorija_id` int(10) UNSIGNED NOT NULL,
  `objavljeno` varchar(10) NOT NULL,
  `aktivno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_ponuda`
--

INSERT INTO `tbl_ponuda` (`id`, `naziv`, `opis`, `cijena`, `kategorija_id`, `objavljeno`, `aktivno`) VALUES
(1, ' ACER NOTEBOOK A315-23-R2YV', 'AMD, Windows 11 Home in S mode, Athlon SILVER 3050U, 2,30 GHZ, Core 2, 8GB, 15,6\", FHD-IPS, SSD[GB] 128GB, 1,9 kg, Boja Srebrna', 849.00, 2, 'Da', 'Da'),
(2, 'HP LAPTOP 17-CN0082NM', 'HP Laptop 17-cn0082nm; 17.3 HD+ (1600x900) AG, Intel Pentium N5030 quad (1.1/3.1GHz Turbo, 4C/CT 4MB), 8GB DDR4 2400, 256GB PCIe m.2, HD Cam, FreeDOS, Natural silver\r\n\r\n', 861.00, 2, 'Da', 'Da'),
(3, 'MICROSOFT SURFACE PRO 4', 'Ekran: 12,3\' touch screen-rezolucija 2736 x 1824 (267 PPI)\r\nProcesor: Intel Core i7-6650U @ 3,40GHz\r\nRAM: 16 GB\r\nSSD-240 GB\r\nOS-Win 10 Pro 64-bit\r\n', 600.00, 2, 'Da', 'Da'),
(4, 'LG MONITOR 24GN60R-B.BEU', 'Zaslon od 23,8 inča FHD (1920 X 1080)\r\nIPS 1 ms (GtG)\r\nBrzina osvježavanja od 144 Hz\r\nsRGB 99 % (tip.) i HDR10\r\nAMD FreeSync™ Premium\r\nDizajn gotovo bez obruba', 408.00, 3, 'Da', 'Da'),
(5, ' LG MONITOR 38WP85C-W.AEU', 'Zakrivljeni QHD+ zaslon UltraWide™ od 37,5 inča\r\nHDR10\r\nIPS uz DCI-P3 95% (tip.)\r\nStereo zvučnik s bogatim basom (10Wx2)\r\nUSB Type-C™\r\nTehnologija AMD FreeSync™', 3229.00, 3, 'Da', 'Da'),
(6, ' LG MONITOR 27MP400-B', 'Zaslon IPS Full HD od 27 inča\r\nDizajn bez obruba s 3 strane\r\nAMD FreeSync™ uz 5ms GtG\r\nReader Mode i Flicker Safe\r\nDAS / Black Stabilizer / Crosshair\r\nOnScreen Control', 398.00, 3, 'Da', 'Da'),
(7, 'Gaming PC Impulse 24', 'Processor: AMD Ryzen 5 3600 3,60GHz up to 4,20GHz (6 Cores / 12 Threads)\r\nMatična ploča: Aorus B450 Elite V2\r\nRAM: 16GB DDR4 (2x 8GB) 3200MHz Kingston Fury Beast\r\nSSD: 500GB M.2 NVMe Kingston NV2\r\nGrafika: Nvidia RTX 4060Ti 8GB MSI Ventus 2X Black OC GDDR6\r\nNapajanje: Cougar XTC 650W\r\nKućište: Inter-Tech S3901 Impulse\r\nCPU Cooler: Rampage CoolBlade RM-C03 RGB', 1799.00, 1, 'Da', 'Da'),
(8, 'Gaming PC Airstream 03', 'Processor: Intel Core i5-10400 2,90GHz up to 4,30GHz (C6, T12)\r\nMatična ploča: Gigabyte H470M K\r\nRAM: 16GB DDR4 (2x 8GB) 2666MHz Kingston\r\nSSD: 500GB M.2 NVMe Kingston NV2\r\nGrafika: AMD Radeon RX 6600 XFX SWIFT 210 8GB GDDR6\r\nNapajanje: Inter-Tech Argus APS 720W\r\nKućište: Inter-Tech Airstream IT-3503', 1349.00, 1, 'Da', 'Da'),
(9, 'Gaming PC Cougar MX330-G-02', 'Processor: AMD Ryzen 5 5500 3,60GHz up to 4,20GHz (C6,T12)\r\nMatična ploča: MSI A520M-A PRO\r\nRAM: 16GB DDR4 (2x 8GB) 3200MHz Kingston Fury Beast\r\nSSD: 480GB Kingston A400 2,5\'\r\nGrafika: AMD Radeon RX 6600 8GB PowerColor Fighter GDDR6\r\nNapajanje: Inter-Tech Argus APS 620W\r\nKućište: Cougar MX330-G', 1349.00, 1, 'Da', 'Da'),
(10, 'Razer Deathadder V2 Gaming Miš', 'Računarski miš', 75.00, 5, 'Da', 'Da'),
(11, 'RAZER BlackWidow Chroma Tournament Edition V2', 'Profesionalna mehanička tastatura', 255.00, 5, 'Da', 'Da'),
(12, 'Sony WH1000XM3', 'Noise Cancelling slušalice', 550.00, 5, 'Da', 'Da'),
(13, 'AMD RADEON XFX 5700 XT 8GB', 'Proizvođač\r\nXFX\r\nPort\r\nPCI-E x16\r\nRAM - memorija\r\n8GB\r\nTip memorije\r\nGDDR6\r\nŠirina sabirnice (bit)\r\n256\r\nDirect X\r\n12\r\nHDMI priključci\r\n1\r\nHlađenje\r\nAktivno\r\nVeličina HDMI adaptera\r\nStandard', 550.00, 4, 'Da', 'Da'),
(14, 'Grafička kartica RTX 4060Ti 8GB GDDR6 MSI 2X DOPER', 'Model: CRRTX4060TIVENTUS2X8\r\nVeličina memorije: 8GB\r\nTip memorije: GDDR6\r\nŠirina sabirnice: 128bit\r\nKonektori: HDMI, DisplayPort X3\r\nPCI-e x16 4.0\r\nNaponski kabal: 8-pin\r\nNapajanje min.: 550W\r\nPotrošnja: 160W\r\n', 959.00, 4, 'Da', 'Da'),
(15, 'RAM Kingston Fury BEAST 8GB DDR4 DOPER-TECH', 'Model: KF432C16BB/8\r\n\r\nTip: DDR4\r\n\r\nBrzina: 3200MHz\r\n\r\nKapacitet: 8GB\r\n\r\nFormat: UDIMM', 49.00, 4, 'Da', 'Da'),
(16, 'Xiaomi Ruter - Mi Router 4C bijeli', 'Četiri antene visokog pojačanja za jak signal i brzi prenosKapacitet 64MB za pristup do 64 pametnih uređajaInteligentna funkcija ograničenja brzine za brže performanseInteligentna funkcija gledanja mreže za osiguranje mrežne sigurnostiFunkcija pametnog upravljanja za daljinsko upravljanjeKratki izgled za razne integracije u stilu kuće', 35.00, 6, 'Da', 'Da'),
(17, 'ASUS Ruter TUF-AX3000 V2 Dual Band WiFi 6 Gaming Router', 'ASUS Wi-Fi ruter TUF-AX3000 V2\r\n\r\n\r\n\r\nBežični standard 802.11a/b/g/n/ac/axAntena 4 interneFrekvencija 2.4GHz/5GHz\r\n\r\n\r\n\r\nGarancija 36MJ', 265.00, 6, 'Da', 'Da'),
(18, 'Ruter Wireless N Router, 300Mbps, 2.4GHz TL-WR840N', 'Wireless N Router, 4 porta, 300Mbps, 2.4GHz\r\nWireless N Router, 4 portni LAN, 1 x WAN, 2 x antena ( interna ), LAN 10/100Mbit, 300Mbps Wireless 802.11n / 802.11b / 802.11g, WPA, WPA2, Encryption: 64 / 128-bit. Napajanje DC 9V / 0,6A', 46.00, 6, 'Da', 'Da');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategorije`
--
ALTER TABLE `tbl_kategorije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_narudzba`
--
ALTER TABLE `tbl_narudzba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ponuda`
--
ALTER TABLE `tbl_ponuda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kategorije`
--
ALTER TABLE `tbl_kategorije`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_narudzba`
--
ALTER TABLE `tbl_narudzba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_ponuda`
--
ALTER TABLE `tbl_ponuda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
