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
-- Généré le : Sam 28 Avril 2012 à 05:28
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
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`, `date`) VALUES
(3, 'Ouverture du site', 'Bonjour à tous !\r\n\r\nEt voici donc la première version du site Moonay qui débarque.\r\nComme je viens de le dire, il s''agit là d''une V1, qui n''est pas totalement terminée.\r\nViendront s''y ajouter de nombreuses fonctionnalités je l''espère.\r\nVous pouvez dors et déjà proposer vos idées et envoyer tout ça à Pandiablo !\r\n\r\nJe n''en dirais pas plus dans cette première news, je vous laisse explorer ! Pour les comptes, il faudra me demander (Pandiablo) de vous les créer manuellement, car en effet, tout comme pour le forum, pas d''inscription automatique, tout est orchestré par les administrateurs du site !', '2012-04-28 02:06:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
