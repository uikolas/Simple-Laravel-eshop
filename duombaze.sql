


-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: localhost
-- Atlikimo laikas: 2014 m. Kov 09 d. 20:25
-- Serverio versija: 5.5.35
-- PHP versija: 5.4.4-14+deb7u7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


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
  `foto` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=7 ;

--
-- Sukurta duomenų kopija lentelei `prekes`
--

INSERT INTO `prekes` (`id`, `pavadinimas`, `aprasymas`, `kaina`, `foto`, `kategorija_id`, `slug`) VALUES
(1, 'Samsung Galaxy S III I9300', 'Samsung Galaxy S III I9300 Ceramic White, 4.8" sAmoled HD 720 x 1280, Quad core 1.4GHz, 16GB, 1GB RAM, 8Mpix camera, 133 g', 949, 'http://placehold.it/320x150', 3, 'samsung-galaxy-s-iii-i9300'),
(2, 'Philips 46PFL3208H', 'Philips 46PFL3208H 46" (117cm) LED TV/ Full HD 1920x1080 16:9/ 350cdm/ 100''000:1/ 2xHDMI,1xSCART,2xUSB(Mp3,Jpeg,DivX)/ Digital Crystal Clear, 100Hz/ RMS 20W/ Smart TV/ WiFi Ready/ Dark', 1620, 'http://placehold.it/320x150', 1, 'philips-46pfl3208h'),
(3, 'Apple iPhone 5s', 'Apple iPhone 5s, Ekranas LCD IPS 4.0" 640x1136, atmintis 16GB, 8MP kamera, Touch ID sensorius, 4G (LTE), WiFi, Bluetooth, GPS, silver, iOS 7, svoris 112 g.', 2250, 'http://placehold.it/320x150', 3, 'apple-iphone-5s'),
(4, 'Samsung 55', 'Samsung 55" (139 cm) UE55F9000STXXH, UHD 3840x2160, 3D, SMART TV 2.0, Smart Interaction 2.0, Micro Dimming Ultimate, 70 W (15 W x 2 + 20 W x 2) garsiakalbiai,', 8000, 'http://blog.expositionchicago.com/wp-content/uploads/2013/02/EXPO-320x150.jpg', 1, 'samsung-55'),
(5, 'ACER V3-571G', 'ACER V3-571G - 15.6'''' HD (1366x768) | Intel Core i5-3210M | nVidia GT 640M 2GB | 4GB | 500GB | DVD-RW | BT4.0 | 6cell | LINUX', 1800, 'http://blog.expositionchicago.com/wp-content/uploads/2013/02/EXPO-320x150.jpg', 2, 'acer-v3-571g'),
(6, 'Acer E1-570G', 'Acer E1-570G 15.6" LED 1366 x 768 WXGAG i3-3217/GT720 1GB/ 4GB DDR3/ 500GB HDD/ DVD SM/ BGN/ BT/ 4 cell batt./ HD camera/ USB 3.0/ Black/ Linpus Linux/ Eng-Rus kbd', 1500, 'http://blog.expositionchicago.com/wp-content/uploads/2013/02/EXPO-320x150.jpg', 2, 'acer-e1-570g');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
