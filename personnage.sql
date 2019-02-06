-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 06 Février 2019 à 18:34
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `smash`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `idPersonnage` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `origine` varchar(50) NOT NULL,
  `atq1Nom` varchar(20) NOT NULL,
  `atq1Desc` varchar(200) NOT NULL,
  `atq2Nom` varchar(20) NOT NULL,
  `atq2Desc` varchar(200) NOT NULL,
  `atq3Nom` varchar(20) NOT NULL,
  `atq3Desc` varchar(200) NOT NULL,
  `atq4Nom` varchar(20) NOT NULL,
  `atq4Desc` varchar(200) NOT NULL,
  `atq5Nom` varchar(20) NOT NULL,
  `atq5Desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`idPersonnage`, `nom`, `origine`, `atq1Nom`, `atq1Desc`, `atq2Nom`, `atq2Desc`, `atq3Nom`, `atq3Desc`, `atq4Nom`, `atq4Desc`, `atq5Nom`, `atq5Desc`) VALUES
(1, 'Mario', 'Super Mario', 'Boule de Feu', 'Lance une boule de feu qui rebondit sur le sol.', 'Cape', 'Donne un coup de cape qui retourne les adversaires et renvoie les projectiles.', 'Super Poing Sauté', 'Frappe à répétition avec un coup de poing vertical.', 'J.E.T.', 'Repousse les adversaires avec de l\'eau. Peut être chargé et tiré sur différents angles.', 'Final Mario', 'Mario libère un torrent de feu dévastateur dans la direction à laquelle il fait face. L\'attaque couvre une très large zone et voyage loin, c\'est pourquoi il vaut mieux l\'utiliser après avoir sauté.'),
(2, 'Zelda', '', '', '', '', '', '', '', '', '', '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`idPersonnage`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `idPersonnage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
