-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 mars 2024 à 15:37
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cca-rillieux-vancia`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id_actualite` int NOT NULL AUTO_INCREMENT,
  `nom_actualite` varchar(255) DEFAULT NULL,
  `description_actualite` varchar(255) DEFAULT NULL,
  `date_actualite` date DEFAULT NULL,
  `image_actualite` varchar(200) NOT NULL,
  PRIMARY KEY (`id_actualite`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actualite`, `nom_actualite`, `description_actualite`, `date_actualite`, `image_actualite`) VALUES
(5, 'caca', 'rtguhtugihegdùmegkieruhgiuerzgheriugheruiuhuigherigkreug', '2024-03-20', '4382885469bully-figurine-12611-pixar-le-monde-de-nemo-dory.jpg'),
(4, 'rtytrtyyfghtrfgt', 'rtguhtugiheguhuigherigkreug', '2024-03-27', '4179904171Capture-132.png');

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(255) DEFAULT NULL,
  `mdp_admin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `nom_admin`, `mdp_admin`) VALUES
(1, 'Ethan', '$2y$10$CkniP1vKbzYOiJqXdb0hJukVY7ypvbGOZKa69/GZ303KgVWzcREOi');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id_equipier` int NOT NULL AUTO_INCREMENT,
  `nom_equipier` varchar(255) DEFAULT NULL,
  `description_equipier` varchar(255) DEFAULT NULL,
  `photo_equipier` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_equipier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE IF NOT EXISTS `tarifs` (
  `id_tarif` int NOT NULL AUTO_INCREMENT,
  `nom_tarif` int DEFAULT NULL,
  `tarif_premier_chien` float DEFAULT NULL,
  `tarif_deuxieme_chien` float DEFAULT NULL,
  `tarif_par_chien` float DEFAULT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
