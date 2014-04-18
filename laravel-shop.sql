-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: localhost
-- Atlikimo laikas: 2014 m. Bal 18 d. 07:20
-- Serverio versija: 5.5.24-log
-- PHP versija: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Duomenų bazė: `laravel-shop`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `kategorijos`
--

CREATE TABLE IF NOT EXISTS `kategorijos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pavadinimas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=4 ;

--
-- Sukurta duomenų kopija lentelei `kategorijos`
--

INSERT INTO `kategorijos` (`id`, `pavadinimas`, `slug`) VALUES
(1, 'Televizoriai', 'televizoriai'),
(2, 'Kompiuteriai', 'kompiuteriai'),
(3, 'Telefonai', 'telefonai');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `krepselis`
--

CREATE TABLE IF NOT EXISTS `krepselis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preke_id` int(11) NOT NULL,
  `kiekis` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `prekes`
--

CREATE TABLE IF NOT EXISTS `prekes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pavadinimas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `aprasymas` text COLLATE utf8_lithuanian_ci NOT NULL,
  `kaina` int(100) NOT NULL,
  `kiekis` int(255) NOT NULL,
  `foto` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=11 ;

--
-- Sukurta duomenų kopija lentelei `prekes`
--

INSERT INTO `prekes` (`id`, `pavadinimas`, `aprasymas`, `kaina`, `kiekis`, `foto`, `kategorija_id`, `slug`) VALUES
(1, 'Samsung Galaxy S III I9300', 'Samsung Galaxy S III I9300 Ceramic White, 4.8" sAmoled HD 720 x 1280, Quad core 1.4GHz, 16GB, 1GB RAM, 8Mpix camera, 133 g', 949, 10, 'http://placehold.it/320x150', 3, 'samsung-galaxy-s-iii-i9300'),
(2, 'Philips 46PFL3208H', 'Philips 46PFL3208H 46" (117cm) LED TV/ Full HD 1920x1080 16:9/ 350cdm/ 100''000:1/ 2xHDMI,1xSCART,2xUSB(Mp3,Jpeg,DivX)/ Digital Crystal Clear, 100Hz/ RMS 20W/ Smart TV/ WiFi Ready/ Dark', 1620, 100, 'http://placehold.it/320x150', 1, 'philips-46pfl3208h'),
(3, 'Apple iPhone 5s', 'Apple iPhone 5s, Ekranas LCD IPS 4.0" 640x1136, atmintis 16GB, 8MP kamera, Touch ID sensorius, 4G (LTE), WiFi, Bluetooth, GPS, silver, iOS 7, svoris 112 g.', 2250, 99, 'http://placehold.it/320x150', 3, 'apple-iphone-5s'),
(4, 'Samsung 55', 'Samsung 55" (139 cm) UE55F9000STXXH, UHD 3840x2160, 3D, SMART TV 2.0, Smart Interaction 2.0, Micro Dimming Ultimate, 70 W (15 W x 2 + 20 W x 2) garsiakalbiai,', 8000, 50, 'http://blog.expositionchicago.com/wp-content/uploads/2013/02/EXPO-320x150.jpg', 1, 'samsung-55'),
(5, 'ACER V3-571G', 'ACER V3-571G - 15.6'''' HD (1366x768) | Intel Core i5-3210M | nVidia GT 640M 2GB | 4GB | 500GB | DVD-RW | BT4.0 | 6cell | LINUX', 1800, 60, 'http://blog.expositionchicago.com/wp-content/uploads/2013/02/EXPO-320x150.jpg', 2, 'acer-v3-571g'),
(6, 'Acer E1-570G', 'Acer E1-570G 15.6" LED 1366 x 768 WXGAG i3-3217/GT720 1GB/ 4GB DDR3/ 500GB HDD/ DVD SM/ BGN/ BT/ 4 cell batt./ HD camera/ USB 3.0/ Black/ Linpus Linux/ Eng-Rus kbd', 1500, 0, 'http://blog.expositionchicago.com/wp-content/uploads/2013/02/EXPO-320x150.jpg', 2, 'acer-e1-570g'),
(7, 'Samsung S3802 Rex 70', 'Samsung S3802 Rex 70, ekrana 3.0" 240x320, microSD lizdas (iki 32GB), 2MP kamera, Bluetooth, EDGE', 220, 100, 'http://placehold.it/320x150', 3, 'samsung-s3802-rex-70'),
(8, 'Samsung N7100 Galaxy Note II', '', 1500, 55, 'http://blog.expositionchicago.com/wp-content/uploads/2013/02/EXPO-320x150.jpg', 3, 'samsung-n7100-galaxy-note-ii'),
(9, 'Sony PlayStation 4 500GB', 'Sony PlayStation 4 – ketvirtoji aštuntosios kartos kompiuterinių žaidimų konsolė, kurios konstrukcija pasižymi x86-64 architektūra, turi įmontuotą 8 branduolių AMD procesorių, 8 GB GDDR5 atmintį, spartesnį Blu-ray Disc įrenginį, kietąjį 500GB diską. Žaidimų pulte įmontuotas dalinimosi (angl. share) mygtukas, kurį paspaudus žaidėjas gali matyti transliuojamą draugų in-game vaizdą.', 1700, 30, 'http://placehold.it/320x150', 2, 'sony-playStation-4-500gb'),
(10, 'Microsoft XBOX 360 250GB', 'Microsoft XBOX 360 250GB Stingray žaidimų konsolė su Kinect sensoriumi ir Kinect Adventures žaidimu', 1000, 50, '', 2, 'microsoft-xbox-360-250gb');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `uzsakymai`
--

CREATE TABLE IF NOT EXISTS `uzsakymai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uzsakymo_nr` varchar(10) COLLATE utf8_lithuanian_ci NOT NULL,
  `vardas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `telefonas` int(11) NOT NULL,
  `miestas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `adresas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `atsiimti` int(3) NOT NULL,
  `apmoketa` tinyint(1) NOT NULL,
  `suma` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
