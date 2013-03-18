-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 18 Mar 2013 om 20:53
-- Serverversie: 5.5.8
-- PHP-Versie: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `synoportal`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Gegevens worden uitgevoerd voor tabel `favorites`
--

INSERT INTO `favorites` (`id`, `url`, `title`, `description`, `ordering`) VALUES
(0, 'http://www.upc.nl/televisie/tv-zenders-horizon/', 'TV Kanalen', 'Horizon TV Kanalen', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `intralinks`
--

CREATE TABLE IF NOT EXISTS `intralinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Gegevens worden uitgevoerd voor tabel `intralinks`
--

INSERT INTO `intralinks` (`id`, `url`, `title`, `description`, `ordering`) VALUES
(0, 'http://diskstation:8000', 'Download Station', 'Download Station', 0),
(1, 'http://diskstation:5000', 'Disk Station Manager', 'Disk Station Manager', 1),
(2, 'http://diskstation:8800', 'Audio Station', 'Audio Station', 2),
(3, 'http://diskstation:7000', 'File Station', 'File Station', 3),
(4, 'http://diskstation/photo', 'Photo Station', 'Photo Station', 4);
