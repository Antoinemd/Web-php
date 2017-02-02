-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 02 Février 2017 à 08:31
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `magasin`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `code article` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `categorie` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`code article`, `description`, `prix`, `categorie`) VALUES
('AZERT', 'Lecteur MP3', '59.90', 'divers'),
('CA300', 'Canon EOS 3000V woom 28/8', '329.00', 'photo'),
('CAS07', 'Cassette DV60 par 5', '26.90', 'divers'),
('CP100', 'Camescope Panasonic SV-AV 100', '1490.00', 'video'),
('CS330', 'Camescope Sony DCR-PC330', '1629.00', 'video'),
('DEL30', 'Portable Dell X300', '1715.00', 'informatique'),
('DVD75', 'DVD vierge par 3', '17.50', 'divers'),
('HP497', 'PC Bureau HP497 ecran TFT', '1500.00', 'informatique'),
('NIK55', 'Nikon F55+zoom 28/80', '269.00', 'photo'),
('NIK80', 'Nikon F80', '479.00', 'photo'),
('QSDFG', 'Bridge numerique Samsung', '359.00', 'photo'),
('SAX15', 'Portable Samsung X15 XVM', '1999.00', 'informatique'),
('SOXMP', 'PC Portable Sony Z1-XMP', '2399.00', 'informatique');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`code article`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
