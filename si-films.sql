-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 14 Avril 2016 à 08:26
-- Version du serveur :  5.5.41-log
-- Version de PHP :  5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `si-films`
--

-- --------------------------------------------------------

--
-- Structure de la table `musics`
--

CREATE TABLE IF NOT EXISTS `musics` (
`id` int(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `music_title` varchar(200) NOT NULL,
  `composer` varchar(100) NOT NULL,
  `music_link` varchar(200) NOT NULL,
  `add_by` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `musics`
--

INSERT INTO `musics` (`id`, `movie_name`, `movie_id`, `music_title`, `composer`, `music_link`, `add_by`) VALUES
(33, 'Flashdance', 535, 'Maniac', 'Michael Sembello', '8NjbGr2nk2c', ''),
(34, 'Star Wars: The Force Awakens', 140607, 'Theme Song', 'John Williams', 'D0ZQPqeJkk', ''),
(35, 'Avatar', 19995, 'Avatar Theme Song', 'James Horner', 'i1BwcCuEOtM', ''),
(36, 'Inception', 27205, 'Time', 'Hans Zimmer', 'RxabLA7UQ9k', ''),
(37, 'The Grand Budapest Hotel', 120467, 'Mr Moustafa', 'Alexandre Desplat', 'voX15vG2gOk', '');

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE IF NOT EXISTS `playlists` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `description`) VALUES
(1, 'Les classiques', 'Les musiques les plus dramatiques de blablabla'),
(2, 'Bonne humeur', 'Vous avez la pêche, voilà la playlist pour vous ! '),
(3, 'Detente', 'Blablabla');

-- --------------------------------------------------------

--
-- Structure de la table `playlists_has_musics`
--

CREATE TABLE IF NOT EXISTS `playlists_has_musics` (
`id` int(11) NOT NULL,
  `id_playlists` int(11) NOT NULL,
  `id_musics` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `playlists_has_musics`
--

INSERT INTO `playlists_has_musics` (`id`, `id_playlists`, `id_musics`) VALUES
(11, 3, 33),
(12, 2, 34),
(16, 2, 38),
(25, 1, 35),
(26, 1, 36),
(27, 3, 34),
(28, 2, 35),
(29, 2, 36),
(30, 2, 37),
(32, 1, 37);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `status`) VALUES
(1, 'super', 'super@super.com', '3b4ebe551d8f2a09aeb005fb3d14066e065134727d1f62112dd316ef60069bcd', 'admin'),
(3, 'maxaloc', 'maxaloc@gmail.com', '6c876c36c2d6685a727ac67cd555d8ce62b1e22f745f563a966fc85d84e60728', 'user'),
(4, 'youpi', 'youpi@youpi.com', '639043bba1df959fd595558be5c36c5cf572f3eccfd1f28571276e790b92b0fe', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `validation_musics`
--

CREATE TABLE IF NOT EXISTS `validation_musics` (
`id` int(11) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `music_title` varchar(50) NOT NULL,
  `composer` varchar(50) NOT NULL,
  `music_link` varchar(100) NOT NULL,
  `add_by` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Contenu de la table `validation_musics`
--

INSERT INTO `validation_musics` (`id`, `movie_name`, `movie_id`, `music_title`, `composer`, `music_link`, `add_by`) VALUES
(32, 'titre movie', 0, 'LOL', 'un composeur', 'un link', ''),
(33, 'le titre du film', 0, 'LOL', 'composer', 'youtube url', ''),
(36, '', 155, 'LOl', '', 'LOL', ''),
(43, '', 0, '', 'lol', '', '');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `playlists_has_musics`
--
ALTER TABLE `playlists_has_musics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `validation_musics`
--
ALTER TABLE `validation_musics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
