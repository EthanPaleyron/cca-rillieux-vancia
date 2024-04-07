-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 07 avr. 2024 à 22:12
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
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id_actualite`, `nom_actualite`, `description_actualite`, `date_actualite`, `image_actualite`) VALUES
(33, 'hahahah', 'rkgreihrezlk', '2024-04-06 09:12:51', '52779572465.webp'),
(34, 'mdrr', 'grigmerioguperogupe', '2024-04-06 10:11:44', '3317177969animaux-selfie-01.jpg'),
(35, 'lol', 'gjjhierkuherlkhgr', '2024-04-06 00:00:00', '9490677632flat,750x1000,075,f.jpg'),
(42, 'ngerhgherjkghre', 'jgrhurhgerugh', '2024-04-06 09:17:58', '14686704787v7yj8.jpg'),
(43, 'ergjrezhglkrehgjkerjg', 'gjkrehgurehlzguirlhguer', '2024-04-06 09:18:18', '1121326774Capture-132.png'),
(36, 'Ambre', 'jhflzgeheruiz', '2024-04-06 09:13:52', '4174352683DORY.jpg'),
(37, 'Ethan', 'jgkerhg', '2024-04-06 09:14:10', '98822526871.jpg'),
(38, 'Jade', 'jeergjkeriglr', '2024-04-06 09:14:42', '9958224247image-drôle-animal-image-drôle-à-télécharger-chiens-selfie-resized.jpg'),
(39, 'jhgjhgrehgklerhgjl', 'dgtrlhuroighuzri&', '2024-04-06 09:15:21', '340966396520456790.webp'),
(40, 'Miawhou', 'igudkrehgu', '2024-04-06 09:15:38', '937018685720456790.webp'),
(41, 'Hipopogrosse fesse', 'ghfdjkgdhsr', '2024-04-06 09:16:26', '1804421001309514-Hippopotame.jpg'),
(44, 'jigoezrjomigerpigr', 'gnjhehkegjrhlgkze', '2024-04-06 09:18:33', '5839073502e36ec678-7984-4cdd-8e4c-a3932772ff8e.gif'),
(45, 'kvviflhlgker', 'rgjjekjghlerz', '2024-04-07 08:45:11', '115679338568747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f79344f41513236545458523461773d3d2d3236363531373734372e31343537616235663831'),
(46, 'bkerzlkjgreljkgnrez', 're,rhoitjhemtr', '2024-04-07 08:45:28', '4311063790memes-drole-de-chat.png'),
(47, 'bklefngjlkrezkgjrezm', ',gnjkrengl:ergkre:zng', '2024-04-07 08:45:44', '8506803794téléchargement.jpg'),
(48, 'gern,g;,rezlg', ',g:rekzngkrejlgre', '2024-04-07 08:46:20', '5054948275tree.jpg'),
(49, 'er,gnergnjkr', 'r,engj:zernlkger', '2024-04-07 08:46:31', '93863450375.webp'),
(27, 'Voici la nouvelle équipe du comité', 'Voici notre nouvelle équipe de comité !\r\nDe gauche à droite : Fabrice, Noëlle, Annabel, Jean-Jacques, Marie-Ange, André, Cyrille, Antonio et notre regretté barman Guy (absente de la photo notre lointaine Ilana)', '2024-01-09 11:58:36', '2687171090equipe.jpg'),
(50, 'grezk:gnkjlrezg', ',;:ngzjerl;:gjkrez', '2024-04-07 08:46:42', '5058398813Presentacion.png'),
(51, 'e ;ngrnejkgnzerkg', 'g;er:,;grenklg;;ner', '2024-04-07 08:46:53', '68520367541309514-Hippopotame.jpg'),
(52, 'kkrzgnrengklezrn', 'kgjerlkmgjrejgzmlkergjkezrm,gklr,gm', '2024-04-07 08:54:17', '5538727102images.jpg'),
(53, ',,v,erlejrogre', 'r;,lrekglekzrjgmkeorg', '2024-04-07 08:54:32', '4968307479image-drole-pour-fond-d-écran-vache-et-homme-fond-d-écran-ordinateur-fond-d-écran-drole-image.jpg'),
(54, 'grekzmgjoierzjgz', 'glkgzkrjgmzrkjgzem', '2024-04-07 08:54:44', '5633913070Capture-132.png'),
(55, 'g,lerkmglkezrgkezr', 'r;g,lkrekmlkgpmezrg', '2024-04-07 08:54:55', '67228860920456790.webp'),
(56, 'regzerljkgkkezr', 'e,rnkgk:ezr;gjokezr', '2024-04-07 10:07:43', '7668926242flat,750x1000,075,f.jpg'),
(57, 'MMMM MMMMMM MMMMMMM MMMMMM MMMMMMMM MMMM', 'MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM', '2024-04-07 10:08:20', '8806115712tree.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipier`, `nom_equipier`, `description_equipier`, `photo_equipier`, `ordre_equipier`) VALUES
(68, 'Cyrille', 'Moniteur diplomé \"école du chiot\" et moniteur sauvetage en compétition\r\nLa douceur, le calme, c’est le chouchou de nos bébés poilus !', '8429331899cyrille.jpg', 3),
(67, 'Annabel', 'Monitrice chiens adultes et chiens compliqués, responsable des moniteurs et de la section obéissance, et secrétaire.\r\nDétrompez vous ce n’est pas les chiens qu’elle va éduquer, mais leurs maîtres !', '8630681708annabel.jpg', 2),
(66, 'André', 'Vice président\r\nUne connaissance du club sans pareil, c’est notre sage.', '4293387310andre.jpg', 1),
(65, 'Jean-Jacques', 'Notre Président et responsable de la section Sauvetage\r\n                Présent depuis 2007 dans le club, il a créé la section sauvetage. Toujours à votre\r\n                écoute et de bons conseils !', '2447462495jean-jacques.jpg', 0),
(69, 'Fabrice', 'Encadrant chiens adultes\r\nAvec lui c’est fou rire assuré pendant les cours !', '9449958571fabrice.jpg', 6),
(70, 'Noëlle', 'Trésorière\r\nIl paraît que sa chienne est la première de la classe en cours ;)', '3370807258noelle.jpg', 4),
(71, 'Antonio', 'Notre Mc Gyver\r\nC\'est notre homme de l\'ombre !\r\nUne réparation ? Du bricolage ? De l\'entretien ? Il sait tout faire !\r\nC\'est également un véritable homme de chien qui pourra être amené à remplacer au pied levé un moniteur\r\nSi nécessaire', '5233834815antonio.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tarifs`
--

INSERT INTO `tarifs` (`id_tarif`, `nom_tarif`, `tarif_premier_chien`, `tarif_deuxieme_chien`, `tarif_par_chien`, `ordre_tarif`) VALUES
(1, 'Renouvellement 2ème année', 130, 65, 22, 1),
(2, 'Sociétaire 1ère année', 170, 85, 22, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
