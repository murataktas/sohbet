-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 May 2015, 12:27:20
-- Sunucu sürümü: 5.6.21
-- PHP Sürümü: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `helpdesk`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `baslik`
--

CREATE TABLE IF NOT EXISTS `baslik` (
`id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `sorun` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `baslik`
--

INSERT INTO `baslik` (`id`, `adi`, `email`, `sorun`) VALUES
(1, 'Murat', 'murat@murat.com', 'Soru1'),
(2, 'Murat', 'murat@murat.com', 'Soru1'),
(3, 'murat', 'murataktas28', 'soru2'),
(4, 'murat', 'murataktas28', 'soru2'),
(5, 'murat', 'murataktas28', 'soru2'),
(6, 'murat', 'yasin@yasin.com', 'ssfge'),
(7, 'murat', 'murataktas28', 'sor1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sohbet`
--

CREATE TABLE IF NOT EXISTS `sohbet` (
`id` int(11) NOT NULL,
  `sohbet_id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `mesaj` text COLLATE utf8_bin NOT NULL,
  `tip` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `sohbet`
--

INSERT INTO `sohbet` (`id`, `sohbet_id`, `mail`, `mesaj`, `tip`) VALUES
(1, 7, 'murataktas28', 'cdavsvb', 2),
(2, 7, 'murataktas28', 'wgreer', 2),
(3, 7, 'murataktas28', 'brehnet', 2),
(4, 7, 'murataktas28', 'rehreh', 2),
(5, 7, 'murataktas28', 'cbsfb', 2),
(6, 7, 'murataktas28', 'dbsb', 2),
(7, 7, 'murataktas28', 'aaaa', 2),
(8, 7, 'murataktas28', 'sfadf', 2),
(9, 7, 'murataktas28', 'dgsdg', 2),
(10, 7, 'murataktas28', 'fsfsh', 2),
(11, 7, 'murataktas28', 'aaaaaa', 2),
(12, 7, 'murataktas28', 'yyy', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `baslik`
--
ALTER TABLE `baslik`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sohbet`
--
ALTER TABLE `sohbet`
 ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `baslik`
--
ALTER TABLE `baslik`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `sohbet`
--
ALTER TABLE `sohbet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
