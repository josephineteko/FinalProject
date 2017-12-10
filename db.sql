-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 10 déc. 2017 à 08:46
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `final_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `id_user` text NOT NULL,
  `id_img` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `last_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `id_type`, `title`, `content`, `id_user`, `id_img`, `created_date`, `last_modification`) VALUES
(1, 2, 'Seoul', 'very cool place', '1', 1, '2017-12-10', '2017-12-10'),
(2, 2, 'Seoul', 'very cool place', '1', 2, '2017-12-10', '2017-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_date` date NOT NULL,
  `last_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_article`, `content`, `created_date`, `last_modification`) VALUES
(1, 1, 0, 'super coll', '2017-12-10', '2017-12-10'),
(2, 1, 0, 'super cool', '2017-12-10', '2017-12-10'),
(3, 1, 0, 'ouaiii', '2017-12-10', '2017-12-10'),
(4, 1, 0, 'mega cool', '2017-12-10', '2017-12-10'),
(5, 1, 1, 'super ', '2017-12-10', '2017-12-10'),
(6, 1, 1, ':)', '2017-12-10', '2017-12-10'),
(7, 1, 1, 'good', '2017-12-10', '2017-12-10'),
(8, 1, 1, 'mega cool', '2017-12-10', '2017-12-10'),
(9, 1, 1, 'waooo', '2017-12-10', '2017-12-10'),
(10, 1, 1, 'belle photo', '2017-12-10', '2017-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `path_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `name`, `path_img`) VALUES
(1, 'seoul.jpg', 'img/1512878474seoul.jpg'),
(2, 'seou2.jpeg', 'img/1512882233seou2.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `type_article`
--

CREATE TABLE `type_article` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `path_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_article`
--

INSERT INTO `type_article` (`id`, `name`, `path_logo`) VALUES
(1, 'Food', 'request/article/img/food.png'),
(2, 'Place', 'request/article/img/place.png'),
(3, 'Tips', 'request/article/img/tip.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `last_auth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `last_auth`) VALUES
(1, 'sysi', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2017-12-10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_article`
--
ALTER TABLE `type_article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `type_article`
--
ALTER TABLE `type_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
