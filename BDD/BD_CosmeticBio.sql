-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 15 Avril 2016 à 13:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cosmeticbio`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(100) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `Datecom` datetime NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `pseudo`, `comment`, `Datecom`, `id_produit`, `id_user`, `actif`) VALUES
(1, 'tutu', 'Bonjour', '2016-04-13 11:16:33', 1, 2, 1),
(2, 'tutu', 'salut', '2016-04-13 11:17:38', 1, 2, 1),
(3, 'tutu', 'Très bonne crême', '2016-04-13 11:17:58', 3, 2, 1),
(4, 'tutu', 'Ca va ?', '2016-04-13 11:18:10', 2, 2, 1),
(5, 'titi', 'yooo\r\n', '2016-04-13 16:36:06', 9, 1, 1),
(6, 'titi', 'yooo\r\n', '2016-04-13 16:36:09', 9, 1, 1),
(7, 'titi', 'h', '2016-04-13 16:36:23', 9, 1, 1),
(8, 'tutu', 'salut', '2016-04-14 21:24:24', 7, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(200) NOT NULL AUTO_INCREMENT,
  `id_user` int(200) NOT NULL,
  `email_user` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime(6) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `id_user`, `email_user`, `message`, `date_message`) VALUES
(1, 0, '', 'boooonjour!', '2016-04-13 02:59:36.000000');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(100) NOT NULL,
  `prix_produit` float NOT NULL DEFAULT '0',
  `description_produit` text NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `partenaire_produit` varchar(100) NOT NULL,
  `partenaireweb_produit` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `resultat` int(3) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `prix_produit`, `description_produit`, `categorie`, `partenaire_produit`, `partenaireweb_produit`, `image`, `actif`, `resultat`) VALUES
(1, 'Rouge à lèvre bio', 15, 'Rouge à lèvre trop bien ', 'maquillage', '', '', '446d53ca9613c8fdb4a3700fd90f90b2004.jpg', 0, 2),
(2, 'Crême', 5, 'Crême pour peau fragile', 'visage', '', '', '81cd2ef1240a7f201cf3ac566719affd009.jpg', 1, 2),
(3, 'Crême', 5, 'Crême', 'visage', 'Salut', 'yp', '73969ddb168bf0c748a31e7ea68fc50a010.jpg', 0, 2),
(4, 'Gele douche', 5, 'Adapté pour peau sensible', 'corps', '', '', '517787849f962ff824ec6ebe6b77858bS7-modele--peugeot-407-coupe.jpg', 1, 2),
(5, 'Fond de teint', 2, 'FOnd de teint pour peau sensibles', 'maquillage', '', '', '306213d3f0d7a9616a3595d64081ff92www.keepcalm-o-matic.co.png', 0, 2),
(6, 'Fond de teint', 2, 'FOnd de teint pour peau sensibles', 'maquillage', '', '', 'dfeb32601691d584ae8a4b5f60295486www.keepcalm-o-matic.co.png', 0, 2),
(7, 'Fond de teint', 4, '', 'maquillage', '', '', '88b874573bd1102803c95a52050acdfdabdo1.jpg', 1, 2),
(8, 'Déodorant', 2, 'Super produit', 'corps', '', '', '7c934d818d0f534c1ae9bd6f1014d3b710351826_10204691503561394_4750827801084082619_n.jpg', 1, 2),
(9, 'Gel douche', 2, 'Gel douche peau senssible', 'corps', '', '', 'f625741e07fe0cc2d94c34ca745eb141thumb-002.jpg', 1, 2),
(10, 'Gel douche', 5, 'yo', 'corps', '', '', '1725f6c87cf01e40b8d65e5c5fb1cad6thumb-005.jpg', 1, 2),
(11, 'Fond de teint', 5, 'xd', 'maquillage', '', '', '3f87b58d232eacaf9b8251195fedcc77011.jpg', 0, 2),
(12, 'Rouge à lèvre bio', 2, 'Booonjour', 'visage', '', '', '90277e8bb74599b0e6016a9ae8ed0e51003.jpg', 0, 2),
(13, 'Creme', 1.1, 'salu', 'visage', 'g', 'f', '601203cfd6242b532ce5cb3437b46984011.jpg', 1, 0),
(14, 'gf', 5.1, 'f', 'maquillage', '', '', '63939693f8c7bbb81a6b0e9fbce89e6c010.jpg', 0, 4),
(15, 'dsj', 52, 'k', 'maquillage', '', '', 'e7969c5e7b573a340d236cc01e5e9581009.jpg', 0, 1),
(16, 'j', 5, 'k', 'visage', 'j', '', '8b4da189881c48053276e7bbacc0fd10thumb-006.jpg', 1, 1),
(17, 'gh', 45, 'ko', 'visage', '', '', 'a03b025e1f0b3bc08bd9e3208955c0dc004.jpg', 0, 8),
(18, 'h', 1.1, 'jk', 'visage', '', '', 'ff9b12040a607c0b5af55441485bf6c6005.jpg', 1, 4),
(19, 'hhg', 1.1, 'kk', 'maquillage', '', '', 'edba9d710cb78daaaf2d3c1106070cdfthumb-011.jpg', 0, 2),
(20, 'hj', 55, 'jnh', 'maquillage', '', '', '0d86b5a22c93556873b6962a10a212d0008.jpg', 1, 3),
(21, 'jg', 1.9, 'kj', 'visage', '', '', 'dd403c33771194023c77ef0038b9ffdf005.jpg', 0, 2),
(22, 'Savon Bio', 2, 'j', 'corps', '', '', 'b61d73823f8370beac9f1ac1928e983c004.jpg', 1, 1),
(23, 'js', 4, 'koukou', 'maquillage', '', '', '96fb9af524c8fc62550c726cb4d16fe5010.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `sexe_user` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `identifiant_user`, `email_user`, `password_user`, `sexe_user`, `is_admin`) VALUES
(1, 'titi', 'thomas@hmail.com', 'tom', 0, 0),
(2, 'tutu', 'to@orange.fr', 'unsacretutumec', 0, 1),
(3, 'julie', 'sk@otange.fr', 'azertyuiop', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
