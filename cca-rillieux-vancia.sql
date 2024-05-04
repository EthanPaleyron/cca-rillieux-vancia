-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2024 at 02:16 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cca-rillieux-vancia`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualites`
--

DROP TABLE IF EXISTS `actualites`;
CREATE TABLE IF NOT EXISTS `actualites` (
  `id_actualite` int NOT NULL AUTO_INCREMENT,
  `nom_actualite` varchar(255) DEFAULT NULL,
  `description_actualite` varchar(850) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_actualite` datetime DEFAULT NULL,
  `image_actualite` varchar(200) NOT NULL,
  PRIMARY KEY (`id_actualite`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `actualites`
--

INSERT INTO `actualites` (`id_actualite`, `nom_actualite`, `description_actualite`, `date_actualite`, `image_actualite`) VALUES
(27, 'Voici la nouvelle équipe du comité', 'Voici notre nouvelle équipe de comité !\r\nDe gauche à droite : Fabrice, Noëlle, Annabel, Jean-Jacques, Marie-Ange, André, Cyrille, Antonio et notre regretté barman Guy (absente de la photo notre lointaine Ilana)', '2024-01-09 11:58:36', '2687171090equipe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(255) DEFAULT NULL,
  `mdp_admin` varchar(255) DEFAULT NULL,
  `role_admin` int NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `nom_admin`, `mdp_admin`, `role_admin`) VALUES
(1, 'Ethan', '$2y$10$CkniP1vKbzYOiJqXdb0hJukVY7ypvbGOZKa69/GZ303KgVWzcREOi', 1),
(2, 'Noelle', '$2y$10$.AmwFcdVBDUPPvqNDH073.GR0xz5M95W.qldKDLRJySJ2D1.r2FUm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id_equipier` int NOT NULL AUTO_INCREMENT,
  `nom_equipier` varchar(255) DEFAULT NULL,
  `description_equipier` varchar(255) DEFAULT NULL,
  `photo_equipier` varchar(255) DEFAULT NULL,
  `ordre_equipier` int NOT NULL,
  PRIMARY KEY (`id_equipier`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`id_equipier`, `nom_equipier`, `description_equipier`, `photo_equipier`, `ordre_equipier`) VALUES
(68, 'Cyrille', 'Moniteur diplomé \"école du chiot\" et moniteur sauvetage en compétition\r\nLa douceur, le calme, c’est le chouchou de nos bébés poilus !', '8429331899cyrille.jpg', 3),
(67, 'Annabel', 'Monitrice chiens adultes et chiens compliqués, responsable des moniteurs et de la section obéissance, et secrétaire.\r\nDétrompez vous ce n’est pas les chiens qu’elle va éduquer, mais leurs maîtres !', '8630681708annabel.jpg', 2),
(66, 'André', 'Vice président\r\nUne connaissance du club sans pareil, c’est notre sage.', '4293387310andre.jpg', 1),
(65, 'Jean-Jacques', 'Notre Président et responsable de la section Sauvetage\r\nPrésent depuis 2007 dans le club, il a créé la section sauvetage.\r\nToujours à votre écoute et de bons conseils !', '2447462495jean-jacques.jpg', 0),
(69, 'Fabrice', 'Encadrant chiens adultes\r\nAvec lui c’est fou rire assuré pendant les cours !', '9449958571fabrice.jpg', 6),
(70, 'Noëlle', 'Trésorière\r\nIl paraît que sa chienne est la première de la classe en cours ;)', '3370807258noelle.jpg', 5),
(71, 'Antonio', 'Notre Mc Gyver\r\nC\'est notre homme de l\'ombre !\r\nUne réparation ? Du bricolage ? De l\'entretien ? Il sait tout faire !\r\nC\'est également un véritable homme de chien qui pourra être amené à remplacer au pied levé un moniteur\r\nSi nécessaire', '5233834815antonio.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `id_horaire` int NOT NULL AUTO_INCREMENT,
  `temps_horaire` varchar(15) NOT NULL,
  `heure_horaire` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_horaire` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_horaire`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `horaires`
--

INSERT INTO `horaires` (`id_horaire`, `temps_horaire`, `heure_horaire`, `nom_horaire`) VALUES
(34, 'Matin', '09 H 30', 'SAUVETAGE (test préalable pour intégrer la section)'),
(36, 'Matin', '09 H 30', 'OBEISSANCE (test préalable pour intégrer la section)'),
(37, 'Après Midi', '14 H 00', 'CHIOTS 1 ère année'),
(38, 'Après Midi', '15 H 00', 'CHIOTS 2 ème année'),
(39, 'Après Midi', '13 H 30 ET 15 H 00', 'CHIENS adultes (groupe à définir par les moniteurs selon niveau et attente)');

-- --------------------------------------------------------

--
-- Table structure for table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE IF NOT EXISTS `tarifs` (
  `id_tarif` int NOT NULL AUTO_INCREMENT,
  `nom_tarif` varchar(30) DEFAULT NULL,
  `tarif_premier_chien` float DEFAULT NULL,
  `tarif_deuxieme_chien` float DEFAULT NULL,
  `tarif_par_chien` float DEFAULT NULL,
  `ordre_tarif` int NOT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tarifs`
--

INSERT INTO `tarifs` (`id_tarif`, `nom_tarif`, `tarif_premier_chien`, `tarif_deuxieme_chien`, `tarif_par_chien`, `ordre_tarif`) VALUES
(1, 'Renouvellement 2ème année', 130, 65, 22, 1),
(2, 'Sociétaire 1ère année', 170, 85, 22, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
