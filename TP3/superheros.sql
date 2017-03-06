-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Jan 2016 à 16:44
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

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
-- Structure de la table `superheros`
--

CREATE TABLE IF NOT EXISTS `superheros` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `pouvoir` varchar(150) NOT NULL,
  `nomreel` varchar(200) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `univers` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `superheros`
--

INSERT INTO `superheros` (`id`, `nom`, `pouvoir`, `nomreel`, `ville`, `univers`) VALUES
(3, 'Papa Noel', 'Livrer des cadeaux', 'Inconnue', 'Pole Nord', 'DC');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `superheros`
--
ALTER TABLE `superheros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `superheros`
--
ALTER TABLE `superheros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
