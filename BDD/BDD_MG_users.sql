-----------------------------------------------------------------------
-- PLEASE DO NOT USE THIS FILE !
-- YOU JUST HAVE TO READ IT TO SEE THE STRUCTURE OF THE DATABASE
-- DO NOT IMPORT THIS FILE IN YOUR DATABASE !
-----------------------------------------------------------------------

-- phpMyAdmin SQL Dump
-- version OVH
-- http://www.phpmyadmin.net
--
-- Client: mysql51zfs-42.perso
-- Généré le : Sam 28 Avril 2012 à 05:27
-- Version du serveur: 5.1.49
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `crepuscunmybb`
--

-- --------------------------------------------------------

--
-- Structure de la table `mg_user`
--

CREATE TABLE IF NOT EXISTS `mg_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `type` int(1) NOT NULL,
  `idevent` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `mg_user`
--

INSERT INTO `mg_user` (`id`, `pseudo`, `mdp`, `mail`, `type`, `idevent`) VALUES
(1, 'Pandiablo', '20717997be2d970d4ccb82a56c7fcf7164a9285e', 'diablotin79@hotmail.com', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
