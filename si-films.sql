-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 12 Avril 2016 à 11:58
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `si-films`
--

-- --------------------------------------------------------

--
-- Structure de la table `musics`
--

CREATE TABLE `musics` (
  `id` int(11) NOT NULL,
  `movie` varchar(100) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `composer` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `musics`
--

INSERT INTO `musics` (`id`, `movie`, `id_movie`, `title`, `composer`, `link`) VALUES
(1, 'Inception', 0, 'Titre super', 'Hans Zimmer', 'http://www.youtube.com/supermusic'),
(2, 'Titanic', 0, 'My Heart Will Go On', 'Celine Dion', 'http://www.youtube.com/sdfsdgfs'),
(3, 'KillBill', 0, 'KillBill', 'Bang Bang', 'http://www.youtube.com/sdfvcxvsdgfs'),
(4, 'La guerre des étoiles', 0, 'Theme Song', 'John Williams', 'http://www.youtube.com/sd56sdgfsdgfs');

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `description`) VALUES
(1, 'Drame', 'Les musiques les plus dramatiques de blablabla'),
(2, 'Oscars', 'Les BO oscarisés');

-- --------------------------------------------------------

--
-- Structure de la table `playlists_has_musics`
--

CREATE TABLE `playlists_has_musics` (
  `id` int(11) NOT NULL,
  `id_playlists` int(11) NOT NULL,
  `id_musics` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `playlists_has_musics`
--

INSERT INTO `playlists_has_musics` (`id`, `id_playlists`, `id_musics`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `status`) VALUES
(1, '', 'super@super.com', '3b4ebe551d8f2a09aeb005fb3d14066e065134727d1f62112dd316ef60069bcd', '');

-- --------------------------------------------------------

--
-- Structure de la table `validation_musics`
--

CREATE TABLE `validation_musics` (
  `id` int(11) NOT NULL,
  `movies` varchar(50) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `composer` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `validation_musics`
--

INSERT INTO `validation_musics` (`id`, `movies`, `id_movie`, `title`, `composer`, `link`) VALUES
(15, '', 0, 'LOL', '', 'LOL'),
(16, '', 0, 'LOL', '', 'LOL'),
(17, '', 0, 'LOL', '', 'LOL'),
(18, '', 0, 'LOL', '', 'LOL');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlists_has_musics`
--
ALTER TABLE `playlists_has_musics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `validation_musics`
--
ALTER TABLE `validation_musics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `playlists_has_musics`
--
ALTER TABLE `playlists_has_musics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `validation_musics`
--
ALTER TABLE `validation_musics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
