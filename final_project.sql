-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 10 déc. 2017 à 16:12
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `final_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `id_user` text NOT NULL,
  `id_img` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `last_modification` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `id_type`, `title`, `content`, `id_user`, `id_img`, `created_date`, `last_modification`) VALUES
(5, 1, 'Bulgogi', 'Delicious meat better with rice ', '1', 5, '2017-12-10', '2017-12-10'),
(6, 1, 'Gimbap', 'Like a big maki, so delicious', '1', 6, '2017-12-10', '2017-12-10'),
(7, 2, 'Namsam', 'How to talk about Korea without talk about the Namam tower it is the the most popular monumennt of Seoul ', '1', 7, '2017-12-10', '2017-12-10'),
(9, 1, 'Korean BBQ', 'So delicious meat with many topin ', '1', 13, '2017-12-10', '2017-12-10'),
(10, 2, 'Taeguk village in Busan', 'So colorful', '1', 14, '2017-12-10', '2017-12-10'),
(11, 2, 'Cheonggyecheon river', 'Beautiful place !', '1', 15, '2017-12-10', '2017-12-10'),
(19, 1, 'Test', 'test', '10', 29, '2017-12-10', '2017-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_date` date NOT NULL,
  `last_modification` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_article`, `content`, `created_date`, `last_modification`) VALUES
(5, 1, 6, 'So nice !', '2017-12-10', '2017-12-10'),
(6, 1, 5, 'Yummy !', '2017-12-10', '2017-12-10'),
(7, 1, 7, 'Awesome view !', '2017-12-10', '2017-12-10'),
(8, 1, 9, 'Waoo looks like, yummy !', '2017-12-10', '2017-12-10'),
(11, 10, 5, 'Waoo looks good !', '2017-12-10', '2017-12-10'),
(12, 10, 7, 'So nice', '2017-12-10', '2017-12-10'),
(13, 10, 9, 'Miam !', '2017-12-10', '2017-12-10'),
(14, 10, 10, 'Amazing !', '2017-12-10', '2017-12-10'),
(15, 10, 11, 'Want to discover it !', '2017-12-10', '2017-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `path_img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `name`, `path_img`) VALUES
(2, 'south-korea1.jpeg', 'img/1512882205south-korea1.jpeg'),
(3, 'donuts.jpg', 'img/1512882600donuts.jpg'),
(4, 'tmoney.jpg', 'img/1512889504tmoney.jpg'),
(5, 'pork-1582916_1920.jpg', 'img/1512891411pork-1582916_1920.jpg'),
(6, 'Vegetable_gimbap.jpg', 'img/1512892175Vegetable_gimbap.jpg'),
(7, 'Namsan-1.jpg', 'img/1512892361Namsan-1.jpg'),
(8, 'tÃ©lÃ©chargement.jpg', 'img/1512892751tÃ©lÃ©chargement.jpg'),
(9, 'tÃ©lÃ©chargement.jpg', 'img/1512892769tÃ©lÃ©chargement.jpg'),
(10, 'tmo.jpg', 'img/1512892792tmo.jpg'),
(11, 'tmo.jpg', 'img/1512892817tmo.jpg'),
(12, 'lamp.png', 'img/1512892853lamp.png'),
(13, '2016-02-29-hanjip-004.0.0.0.jpg', 'img/15128994922016-02-29-hanjip-004.0.0.0.jpg'),
(14, 'Taeguk-Village.jpg', 'img/1512900888Taeguk-Village.jpg'),
(15, 'Chin cheon.jpg', 'img/1512901460Chin cheon.jpg'),
(16, 'lamp.png', 'img/1512903552lamp.png'),
(17, 'south-korea-seoul-gyeongbokgung-palace.jpg', 'img/1512904232south-korea-seoul-gyeongbokgung-palace.jpg'),
(18, 'tmo.jpg', 'img/1512904483tmo.jpg'),
(19, 'tmo.jpg', 'img/1512904492tmo.jpg'),
(20, 'tmon.jpg', 'img/1512906349tmon.jpg'),
(21, 'Chin cheon.jpg', 'img/1512906360Chin cheon.jpg'),
(22, '2016-02-29-hanjip-004.0.0.0.jpg', 'img/15129123432016-02-29-hanjip-004.0.0.0.jpg'),
(23, 'Vegetable_gimbap.jpg', 'img/1512915924Vegetable_gimbap.jpg'),
(24, 'Namsan-1.jpg', 'img/1512916238Namsan-1.jpg'),
(25, 'pork-1582916_1920.jpg', 'img/1512916350pork-1582916_1920.jpg'),
(26, 'tmon.jpg', 'img/1512916447tmon.jpg'),
(27, 'tmo.jpg', 'img/1512916480tmo.jpg'),
(28, 'pork-1582916_1920.jpg', 'img/1512916496pork-1582916_1920.jpg'),
(29, 'pork-1582916_1920.jpg', 'img/1512916656pork-1582916_1920.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `type_article`
--

DROP TABLE IF EXISTS `type_article`;
CREATE TABLE IF NOT EXISTS `type_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `path_logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `last_auth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `last_auth`) VALUES
(1, 'Diva_Sweety', '777bbb7869ae8193249f8ff7d3e59afe', '2017-12-09'),
(3, 'Jojo', '5484ae77979d975d626cf20ac23f961d', '2017-12-09'),
(6, 'Div91', 'ab4f63f9ac65152575886860dde480a1', '2017-12-09'),
(9, 'Josephine', '777bbb7869ae8193249f8ff7d3e59afe', '2017-12-09'),
(10, 'Didi', '777bbb7869ae8193249f8ff7d3e59afe', '2017-12-10'),
(11, 'Lila12', '777bbb7869ae8193249f8ff7d3e59afe', '2017-12-10'),
(12, 'Lila12', '777bbb7869ae8193249f8ff7d3e59afe', '2017-12-10'),
(13, 'Lili34', '777bbb7869ae8193249f8ff7d3e59afe', '2017-12-10'),
(14, 'ouioui', '2e3817293fc275dbee74bd71ce6eb056', '2017-12-10'),
(15, 'Nina91', '777bbb7869ae8193249f8ff7d3e59afe', '2017-12-10'),
(16, 'Sasa91', '777bbb7869ae8193249f8ff7d3e59afe', '2017-12-10'),
(17, 'DopeUser', 'eef84ea0e4b6e952597194ca156563ee', '2017-12-10'),
(18, 'Dope', 'eef84ea0e4b6e952597194ca156563ee', '2017-12-10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
