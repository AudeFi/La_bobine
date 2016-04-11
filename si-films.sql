-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 11 Avril 2016 à 20:56
-- Version du serveur :  5.5.41-log
-- Version de PHP :  7.0.0

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
  `movie` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `composer` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `musics`
--

INSERT INTO `musics` (`id`, `movie`, `title`, `composer`, `link`) VALUES
(1, 'Inception', 'Titre super', 'Hans Zimmer', 'http://www.youtube.com/supermusic'),
(2, 'Titanic', 'My Heart Will Go On', 'Celine Dion', 'http://www.youtube.com/sdfsdgfs'),
(3, 'KillBill', 'KillBill', 'Bang Bang', 'http://www.youtube.com/sdfvcxvsdgfs'),
(4, 'La guerre des étoiles', 'Theme Song', 'John Williams', 'http://www.youtube.com/sd56sdgfsdgfs');

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE IF NOT EXISTS `playlists` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `playlists_has_musics` (
`id` int(11) NOT NULL,
  `id_playlists` int(11) NOT NULL,
  `id_musics` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `status`) VALUES
(1, '', 'super@super.com', '3b4ebe551d8f2a09aeb005fb3d14066e065134727d1f62112dd316ef60069bcd', ''),
(2, '', 'top@top.com', 'f52e25f882a0d884c34b4a05363722127959583f9ea02b09f47cf11dc251a137', '');

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `musics`
--
ALTER TABLE `musics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
