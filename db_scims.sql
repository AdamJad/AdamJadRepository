-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Sam 24 Décembre 2016 à 20:02
-- Version du serveur: 5.5.32
-- Version de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `db_scims`
--
CREATE DATABASE IF NOT EXISTS `db_scims` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_scims`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `abstract` text NOT NULL,
  `category` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `abstract`, `category`, `user`) VALUES
(10, 'teesttitre', '<p><em>absstract test</em></p>', 1, 10),
(11, 'titretest2', '<p>akdksd,pkdsdso h</p>\r\n<p>&nbsp;</p>\r\n<p>kdkdkd, tetetstb d,ssksk</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 2, 0),
(12, 'titretest3', '<p>test AAA ddd<em>ddddd</em></p>', 2, 0),
(13, 'titretest4', '<p>jfjfjjfjfjfjfjjf</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>hamidididi</p>', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `description`) VALUES
(1, 'scientifique'),
(2, 'mathematique'),
(3, 'informatique'),
(4, 'mecanique');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `username`, `email`, `password`, `role`) VALUES
(8, 'Med', 'EL HAMMOUMI', 'dimedo', 'test@gmail.com', 'test', 1),
(10, 'salem', 'essa', 'ecrivan', 'salem@scims.com', 'test', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
