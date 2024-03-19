CREATE TABLE `Tarifs` (
	`id_tarif` int AUTO_INCREMENT,
	`nom_tarif` int,
	`tarif_premier_chien` float,
	`tarif_deuxieme_chien` float,
	`tarif_par_chien` float,
	PRIMARY KEY (`id_tarif`)
);

CREATE TABLE `Equipe` (
	`id_equipier` int AUTO_INCREMENT,
	`nom_equipier` varchar(255),
	`description_equipier` varchar(255),
	`photo_equipier` varchar(255),
	PRIMARY KEY (`id_equipier`)
);

CREATE TABLE `Actualite` (
	`id_actualite` int AUTO_INCREMENT ,
	`nom_actualite` varchar(255),
	`description_actualite` varchar(255),
	`date_actualite` date,
	PRIMARY KEY (`id_actualite`)
);

CREATE TABLE `Admins` (
	`id_admin` int AUTO_INCREMENT ,
	`nom_admin` varchar(255),
	`mdp_admin` varchar(255),
	PRIMARY KEY (`id_admin`)
);
