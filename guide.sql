-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 10 Février 2019 à 17:01
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
-- Structure de la table `guide`
--

CREATE TABLE `guide` (
  `idGuide` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPersonnage` int(11) NOT NULL,
  `presentation` varchar(1500) NOT NULL,
  `combo` varchar(150) NOT NULL,
  `URLVideo` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `guide`
--

INSERT INTO `guide` (`idGuide`, `idUser`, `idPersonnage`, `presentation`, `combo`, `URLVideo`) VALUES
(1, 1, 1, 'tet', 'Y DOWN DOWN RIGHT + RIGHT ', ''),
(3, 2, 1, 'tet', 'Y DOWN DOWN RIGHT + RIGHT ', ''),
(4, 2, 1, 'tet', 'Y DOWN DOWN RIGHT + RIGHT ', ''),
(5, 2, 1, 'tet', 'Y DOWN DOWN RIGHT + RIGHT ', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`idGuide`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPersonnage` (`idPersonnage`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `guide`
--
ALTER TABLE `guide`
  MODIFY `idGuide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `guide_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `personnage` (`idPersonnage`),
  ADD CONSTRAINT `guide_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `guide_ibfk_3` FOREIGN KEY (`idPersonnage`) REFERENCES `personnage` (`idPersonnage`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
