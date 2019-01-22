-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 22 Janvier 2019 à 21:42
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
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `pseudo`, `mdp`, `mail`) VALUES
(2, 'r', 'a882f0ac848b0b6b4ca7b42bfa1d266afd0ddeba9204ae57a984a69376d59816b1ef3f4d442ea8a70396067ff5b70e0ae8eab3935b617b8e366d8e35c3bfe14c', 'c@gmail.com'),
(3, 'Boris', 'dsfsdfdsfsdf', 'cl@gmail.com'),
(4, 'Bob', 'sdqfdsf', 'cl@gmail.com'),
(5, 'Borrrrr', 'sdfsdfsf', 'cl@gmail.com'),
(6, 'Br', 'sdqfsdf', 'cl@gmail.com'),
(7, 'BBBBB', 'eszfdsf', 'cl@gmail.com'),
(8, 'Borisa', 'sdfsdfsd', 'cl@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
