-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 23 Mars 2016 à 12:01
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `test_cosmetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `prix_produit` float NOT NULL DEFAULT '0',
  `description_produit` text NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `partenaire_produit` varchar(100) NOT NULL,
  `partenaireweb_produit` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `prix_produit`, `description_produit`, `categorie`, `partenaire_produit`, `partenaireweb_produit`) VALUES
(1, 'Creme Bio', 9.99, 'Creme pour le visage, hautement hydratante.', 'soin visage', 'Auchan', 'Auchan.fr'),
(2, 'Savon Bio', 3.9, 'Savon marseillais, bio qui nettoie bien la peau en profondeur.', 'soin corps', 'Carrefour', 'Carrefour.fr'),
(3, 'Shampoing Bio', 30.9, 'Shampoing cheveux sec', 'soin visage', 'intermarché', 'intermarché.fr'),
(4, 'Fond de Teint Bio', 8.9, 'Fond de teint bio', 'maquillage', 'lidl', 'lidl.fr'),
(5, 'Démaquillant Bio', 5.9, 'Démaquillant bio pour le visage', 'maquillage', 'Auchan', 'Auchan.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;