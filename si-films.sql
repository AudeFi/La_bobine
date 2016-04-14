-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 14 Avril 2016 à 19:40
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Contenu de la table `musics`
--

INSERT INTO `musics` (`id`, `movie_name`, `movie_id`, `music_title`, `composer`, `music_link`, `add_by`) VALUES
(33, 'Flashdance', 535, 'Maniac', 'Michael Sembello', '8NjbGr2nk2c', 'super'),
(34, 'Star Wars: The Force Awakens', 140607, 'Theme Song', 'John Williams', 'D0ZQPqeJkk', 'super'),
(35, 'Avatar', 19995, 'Avatar Theme Song', 'James Horner', 'i1BwcCuEOtM', 'super'),
(36, 'Inception', 27205, 'Time', 'Hans Zimmer', 'RxabLA7UQ9k', 'youpi'),
(37, 'The Grand Budapest Hotel', 120467, 'Mr Moustafa', 'Alexandre Desplat', 'voX15vG2gOk', 'super'),
(44, 'Harry Potter and the Philosopher''s Stone', 671, 'Hedwig''s Theme', 'John Williams', 'jhTU7_mipB0', 'super');

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
  `status` varchar(50) NOT NULL,
  `date_inscription` date NOT NULL,
  `contribution` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `status`, `date_inscription`, `contribution`) VALUES
(1, 'super', 'super@super.com', '3b4ebe551d8f2a09aeb005fb3d14066e065134727d1f62112dd316ef60069bcd', 'admin', '2016-04-12', 48),
(3, 'maxaloc', 'maxaloc@gmail.com', '6c876c36c2d6685a727ac67cd555d8ce62b1e22f745f563a966fc85d84e60728', 'user', '0000-00-00', 0),
(4, 'youpi', 'youpi@youpi.com', '639043bba1df959fd595558be5c36c5cf572f3eccfd1f28571276e790b92b0fe', 'user', '0000-00-00', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

--
-- Contenu de la table `validation_musics`
--

INSERT INTO `validation_musics` (`id`, `movie_name`, `movie_id`, `music_title`, `composer`, `music_link`, `add_by`) VALUES
(121, 'Avatar', 19995, 'Avatar Theme Song', 'gsdgsdfg', 'gdfbdfg', 'super'),
(124, 'Harry Potter and the Philosopher''s Stone', 671, 'Hedwig''s Theme Song', 'qsdgqdih', 'sldkjgbsidlgbqs', 'super'),
(125, 'Harry Potter and the Philosopher''s Stone', 671, 'Hedwig''s Theme Song', 'qsdgqdih', 'sldkjgbsidlgbqs', 'super'),
(127, 'Harry Potter and the Philosopher''s Stone', 671, 'Hedwig''s Theme Song', 'qsdgqdih', 'sldkjgbsidlgbqs', 'super'),
(128, 'Harry Potter and the Philosopher''s Stone', 671, 'qsdgljqbsdh', 'qsldjvbslhg', 'lsdbvsgd', 'super'),
(129, 'Harry Potter and the Philosopher''s Stone', 671, 'qsdgljqbsdh', 'qsldjvbslhg', 'lsdbvsgd', 'super');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `validation_musics`
--
ALTER TABLE `validation_musics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=132;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
