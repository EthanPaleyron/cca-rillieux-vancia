-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 mars 2024 à 06:32
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

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
-- Structure de la table `actualites`
--

DROP TABLE IF EXISTS `actualites`;
CREATE TABLE IF NOT EXISTS `actualites` (
  `id_actualite` int NOT NULL AUTO_INCREMENT,
  `nom_actualite` varchar(255) DEFAULT NULL,
  `description_actualite` varchar(850) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_actualite` datetime DEFAULT NULL,
  `image_actualite` varchar(200) NOT NULL,
  PRIMARY KEY (`id_actualite`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id_actualite`, `nom_actualite`, `description_actualite`, `date_actualite`, `image_actualite`) VALUES
(29, 'MMMMMMMMMMMMMMMMMMMM', 'MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM', '2024-03-16 00:00:00', '2948223614flat,750x1000,075,f.jpg'),
(27, 'Voici la nouvelle équipe du comité', 'Voici notre nouvelle équipe de comité !\r\nDe gauche à droite : Fabrice, Noëlle, Annabel, Jean-Jacques, Marie-Ange, André, Cyrille, Antonio et notre regretté barman Guy (absente de la photo notre lointaine Ilana)', '2024-01-09 11:58:36', '2687171090equipe.jpg');

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
  `ordre_equipier` int NOT NULL,
  PRIMARY KEY (`id_equipier`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipier`, `nom_equipier`, `description_equipier`, `photo_equipier`, `ordre_equipier`) VALUES
(36, 'ghjkhghjhghjg', 'ftfgtg', '62909848315.webp', 0),
(37, 'bnjhghgfvbhgb', 'fghgfvbvcvcv', '4396619866animaux-selfie-01.jpg', 2),
(33, 'ertyuiuytr', 'tyuiuytrerty', '7731289687v7yj8.jpg', 4),
(34, 'fghjhgfd', 'ghjhgfghjkjhgf', '1245880037', 3),
(35, 'fghgfghjhghjhg', 'fgfghgfgfdfg', '185825217368747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f79344f41513236545458523461773d3d2d3236363531373734372e313435376162356638313437383363322.jpg', 1);

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
