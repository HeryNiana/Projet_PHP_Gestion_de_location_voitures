-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 26 mars 2022 à 12:57
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_location`
--

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

DROP TABLE IF EXISTS `locataire`;
CREATE TABLE IF NOT EXISTS `locataire` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `locataire`
--

INSERT INTO `locataire` (`numero`, `nom`, `adresse`) VALUES
(1, 'HERY', 'BETANIA'),
(2, 'BOTA', 'TOLIARA'),
(3, 'AINA', 'TANA'),
(4, 'TIANA', 'BIRA'),
(5, 'RANDRIANIRINA', 'MANIDAY'),
(6, 'RANDRIANIRINA', 'MANIDAY');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `numlocation` int(11) NOT NULL AUTO_INCREMENT,
  `numcli` int(11) DEFAULT NULL,
  `numvoiture` int(11) DEFAULT NULL,
  `dateDepart` timestamp NULL DEFAULT NULL,
  `dateDarrive` timestamp NULL DEFAULT NULL,
  `nbjours` int(11) DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `disonibility` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`numlocation`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`numlocation`, `numcli`, `numvoiture`, `dateDepart`, `dateDarrive`, `nbjours`, `montant`, `disonibility`) VALUES
(1, 1, 1, '2019-11-28 10:29:00', '2019-11-30 10:29:00', 2, 300000, 'dispo'),
(2, 2, 3, '2019-11-28 10:29:00', '2019-12-13 10:29:00', 15, 3300000, 'dispo'),
(3, 3, 3, '2019-11-28 10:30:00', '2019-11-30 10:30:00', 2, 440000, 'dispo'),
(4, 3, 2, '2019-11-28 10:30:00', '2019-12-18 10:30:00', 20, 4000000, 'dispo'),
(5, 4, 1, '2019-11-28 10:30:00', '2019-12-10 10:30:00', 12, 1800000, 'dispo'),
(6, 1, 3, '2019-11-27 15:46:00', '2019-12-07 03:46:00', 10, 2200000, 'dispo'),
(7, 4, 2, '2019-11-28 16:32:00', '2019-12-03 04:32:00', 5, 1000000, 'dispo'),
(8, 3, 2, '2019-11-28 16:33:00', '2019-12-18 04:33:00', 20, 4000000, 'dispo'),
(9, 2, 3, '2022-03-15 13:03:00', '2022-03-25 01:03:00', 10, 2200000, 'dispo'),
(10, 1, 5, '2022-04-04 11:14:00', '2022-04-13 23:14:00', 10, 210000, 'okay'),
(11, 5, 1, '2022-03-24 12:51:00', '2022-03-27 23:51:00', 4, 600000, 'okay'),
(12, 4, 3, '2022-03-25 12:53:00', '2022-04-01 23:53:00', 8, 1760000, 'okay');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `noms` varchar(50) DEFAULT NULL,
  `emails` varchar(50) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`numero`, `noms`, `emails`) VALUES
(1, 'Heriniaina', 'Rakotoarmand@hery.mg');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(30) DEFAULT NULL,
  `loyer_journalier` int(11) DEFAULT NULL,
  `photos` varchar(20) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`numero`, `designation`, `loyer_journalier`, `photos`, `state`) VALUES
(1, 'MAZD', 150000, '86762.jpg', 'ko'),
(2, '4*4', 200000, '57393.png', 'ok'),
(3, 'SPRINTER', 220000, '24354.jpeg', 'ko'),
(4, 'SPRINTER', 20000, '80928.png', 'ok'),
(5, 'SPRINTER', 21000, '69095.png', 'ko');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
