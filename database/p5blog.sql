-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 avr. 2018 à 19:51
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
-- Base de données :  `p5blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `approuved` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `approuved`) VALUES
(27, 18, 'padmin', 'Tu peut valider stp?', '2018-04-29 21:31:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `author` varchar(50) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `author`, `chapo`) VALUES
(18, 'Sucess', 'Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte ET Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte Vraiment beaucoup de texte', '2018-04-30 16:18:35', 'Admin', 'Modif 30.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `email`, `registration_date`, `admin`) VALUES
(27, 'Admin', '$2y$10$QJVh5E5G0HzYVt9tnap0seSg3FCvm/xy7gkKC4QfRrXo/1Cw7xIsS', 'Admin@test.fr', '2018-04-30 21:14:59', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
