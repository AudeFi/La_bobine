-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 13 Avril 2016 à 10:26
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

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
  `movies` varchar(100) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `composer` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `musics`
--

INSERT INTO `musics` (`id`, `movies`, `id_movie`, `title`, `composer`, `link`) VALUES
(23, 'The+Dark+Knight', 0, 'The Dark Knight - End Credit', '', 'https://www.youtube.com/watch?v=fTr89ENLZPc'),
(24, 'Interstellar', 0, 'Interstellar', '', 'https://www.youtube.com/watch?v=IDsCtDRV2uA&nohtml5=False'),
(25, 'Demolition', 0, 'Heartaches And Pain', '', 'https://www.youtube.com/watch?v=_pO2MyEY5WQ'),
(26, 'Deadpool', 0, 'Shoop', '', 'https://www.youtube.com/watch?v=4vaN01VLYSQ'),
(27, 'Home+Alone', 0, 'Home Alone', '', 'https://www.youtube.com/watch?v=GbUeK1PP7-s'),
(28, 'The+Nightmare+Before+Christmas', 0, 'Jack Skellington', '', 'https://www.youtube.com/watch?v=yd8t1f1U2xs'),
(29, 'Avatar', 0, 'Avavatar', '', 'https://www.youtube.com/watch?v=jaZPF2Co-38');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `status`) VALUES
(1, '', 'super@super.com', '3b4ebe551d8f2a09aeb005fb3d14066e065134727d1f62112dd316ef60069bcd', 'admin'),
(3, 'maxaloc', 'maxaloc@gmail.com', '6c876c36c2d6685a727ac67cd555d8ce62b1e22f745f563a966fc85d84e60728', 'user');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `validation_musics`
--

INSERT INTO `validation_musics` (`id`, `movies`, `id_movie`, `title`, `composer`, `link`) VALUES
(15, '', 0, 'LOL', '', 'LOL'),
(16, '', 0, 'LOL', '', 'LOL'),
(17, '', 0, 'LOL', '', 'LOL'),
(18, '', 0, 'LOL', '', 'LOL'),
(19, '', 0, 'Link', '', 'link'),
(20, '', 0, 'max', '', 'max'),
(21, '', 0, 'max', '', 'max'),
(22, '', 0, 'noma', '', ''),
(23, '', 0, 'noma', '', ''),
(24, '', 0, 'noma', '', ''),
(25, '', 0, 'daddy', '', 'lol.com'),
(26, '', 0, 'oui', '', 'oui'),
(28, 'Interstellar', 0, 'LOL', '', 'hterr');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `validation_musics`
--
ALTER TABLE `validation_musics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
