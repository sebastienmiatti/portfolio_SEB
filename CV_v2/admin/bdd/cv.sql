-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db714696835.db.1and1.com
-- Généré le :  Mer 10 Janvier 2018 à 23:09
-- Version du serveur :  5.5.58-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db714696835`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_activites`
--

CREATE TABLE IF NOT EXISTS `t_activites` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `activite` varchar(50) NOT NULL,
  `id_utilisateur` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `t_activites`
--

INSERT INTO `t_activites` (`id`, `activite`, `id_utilisateur`) VALUES
(1, 'Président du conseil syndical de ma résidence', 1),
(2, 'trésorier de mon club de billard', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE IF NOT EXISTS `t_competences` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `competence` varchar(30) DEFAULT NULL,
  `c_description` text NOT NULL,
  `c_niveau` int(3) DEFAULT NULL,
  `id_utilisateur` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `t_competences`
--

INSERT INTO `t_competences` (`id`, `competence`, `c_description`, `c_niveau`, `id_utilisateur`) VALUES
(1, 'Langages web', 'PHP, \nSilex, \nJavascript, \njQuery, \nHTML5, \nCSS3, \nBootstrap', 0, 1),
(5, 'SGBD', 'MS SQL Server, \nORACLE, \nMySQL, \nAccess', 0, 1),
(6, 'Matériels', 'PC et serveurs, \nROUTEUR, \nSWITCH, \nPare feu', 0, 1),
(7, 'Systèmes', 'LINUX (Debian), \nWINDOWS Server 2012 2008 2003, \nWINDOWS 10  8.1 7 Vista XP, \nMS/DOS', 0, 1),
(8, 'Autres langages', 'Java, \nJEE, \nXML, \nAssembleur, \nLangage machine', 0, 1),
(9, 'L4G', 'PL/SQL', 0, 1),
(10, 'Réseaux', 'TCP/IP, \nDHCP, \nDNS, \nLAN/WAN, \nsans fil', 0, 1),
(11, 'Serveurs', 'Apache, \nTomcat', 0, 1),
(12, 'VMware', 'server, \nplayer, \nworkstation, \nESX, \nVCSA', 0, 1),
(13, 'Outils bureautiques', 'EXCEL, \nWORD, \nPOWERPOINT, \nOUTLOOK, \nVISIO', 0, 1),
(14, 'Langage de modélisation', 'UML2', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

CREATE TABLE IF NOT EXISTS `t_experiences` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `e_titre` varchar(50) DEFAULT NULL,
  `e_soustitre` varchar(50) DEFAULT NULL,
  `e_dates` varchar(50) DEFAULT NULL,
  `e_description` text,
  `e_type` enum('entreprise','indépendant') NOT NULL,
  `id_utilisateur` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id`, `e_titre`, `e_soustitre`, `e_dates`, `e_description`, `e_type`, `id_utilisateur`) VALUES
(4, 'Administrateur systèmes (assistant)', 'SIAAP – Paris', '2013 à 2016', ' - Correction d’un serveur Web, - Evolution de scripts (batch Windows), - Maintenance (préventive, corrective, curative et évolutive) d’un parc informatique, - industriel de 160 machines (matériel et logiciel), - Gestion de l’inventaire du matériel, - Mise en œuvre de systèmes de sécurité (Antivirus, Pare-feu, GPO), - Vérification quotidienne du bon fonctionnement des systèmes, - Tâches d’administration système, - Rédaction de tâches de maintenance préventive et mise à jour de documentation technique.\n\nEnvironnement : PC HP– Serveurs HP – Windows (server 2012, 2008 et 2003 – 7 - XP) – MS SQL server - Apache – PHP - GMAO – NAGIOS – Citrix – ACRONIS – VISIO – EXCEL – WORD', 'entreprise', 1),
(5, 'Opérateur réseau et télécom', 'RTE – Nanterre', '2011 à 2013', ' - Projet de maintenance d’une salle de serveurs, - Etat des lieux d’une salle de serveurs, - Préparation de documents pour agir en cas de panne de serveur.\nEnvironnement : PC – WINDOWS XP - supervision d’un réseau régional - Sharepoint - WORD – EXCEL', 'entreprise', 1),
(6, 'analyste-programmeur', 'Sydelis (ex SDI) – Bagnolet', '1991 à 1997', 'Missions de développement, de gestion de bases de données et de support bureautique chez NCR ATT GIS, BULL, GSI ASCII, RATP, BNP, 4C', 'entreprise', 1),
(7, 'Informaticien polyvalent', 'ECODAIR – Paris', '2007 à 2011', ' - Installation (matériel et logiciel), - Maintenance de PC dans le contexte de reconditionnement, - Clonage, - Maintenance de portable (niveau 1 à 4), - Préparation spécifique de PC à la demande de clients.\n\nEnvironnement : PC – IMPRIMANTE - PORTABLE – WINDOWS XP - CLONEZILLA', 'entreprise', 1),
(8, 'Stage', 'Centre MOGADOR – Paris', '2000 à 2007', 'Stage de réinsertion professionnelle', 'entreprise', 1),
(9, 'Programmeur', 'Marine Nationale – Nîmes', '1990', 'Conception d’une base de données', 'entreprise', 1),
(10, 'développeur web', '', '2016 à 2017', 'Création d’un site web de type e-business (mypetstar.fr)\n\nEnvironnement : PC – Windows – HTML – CSS – Bootstrap – Javascript - PHP – MySQL', 'indépendant', 1),
(11, 'développeur', '', '2015 à 2016', ' - Développement d’applications (gestion du club, compteurs de jeu), - Projet de maintenance du site web.\n\nEnvironnement : PC – Windows - Java – MySQL – HTML – PHP - CSS', 'indépendant', 1),
(12, 'Intégrateur - développeur web', 'LePoleS - Villeneuve-la-Garenne', '2017 à 2018', 'Projet de création d''un site personnel et projet d''évolution du site d''une entreprise.', 'entreprise', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

CREATE TABLE IF NOT EXISTS `t_formations` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `f_titre` varchar(100) DEFAULT NULL,
  `f_soustitre` varchar(100) DEFAULT NULL,
  `f_dates` varchar(50) DEFAULT NULL,
  `f_description` text,
  `id_utilisateur` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_formations`
--

INSERT INTO `t_formations` (`id`, `f_titre`, `f_soustitre`, `f_dates`, `f_description`, `id_utilisateur`) VALUES
(1, 'Licence Droit, économie et gestion, filiale économie et gestion (parcours MIAGE)', 'ESIAG - Créteil', '2014', '', 1),
(2, 'DUT Réseaux et Télécommunications', 'IUT de Vitry sur Seine', '2013', '', 1),
(3, 'DUT Génie Electrique et Informatique Industrielle', 'IUT de Nîmes', '1989', '', 1),
(4, 'Master 1 MIAGE', 'ESIAG - Créteil<br>Partiels - ECTS : 50 / 60 (1er semestre validé)', '2016', 'Projet de synthèse (UML2, JEE, MySQL, XML, Tomcat, JMS, ECLIPSE)\n', 1),
(5, 'BEP et CAP d''électrotechnique', 'LEP de Rambouillet', '1985', '', 1),
(6, 'Bac F3 (Electrotechnnique)', 'Lycée Edourd Branly - Dreux', '1987', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_interets`
--

CREATE TABLE IF NOT EXISTS `t_interets` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `centre` varchar(50) NOT NULL,
  `id_utilisateur` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_interets`
--

INSERT INTO `t_interets` (`id`, `centre`, `id_utilisateur`) VALUES
(1, 'Président du conseil syndical de ma résidence', 1),
(2, 'trésorier de mon club de billard', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_logos`
--

CREATE TABLE IF NOT EXISTS `t_logos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `src` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL,
  `id_utilisateur` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `t_logos`
--

INSERT INTO `t_logos` (`id`, `src`, `alt`, `id_utilisateur`) VALUES
(1, 'html-css.png', 'HTML5/CSS3', 1),
(2, 'bootstrap-logo.png', 'Bootstrap', 1),
(3, 'js.png', 'javascript', 1),
(4, 'jquery.gif', 'jQuery', 1),
(5, 'wordpress_logo.png', 'wordpress', 1),
(6, 'logo_php.png', 'PHP', 1),
(7, 'MySQL.png', 'MySQL', 1),
(8, 'silex.png', 'silex', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE IF NOT EXISTS `t_loisirs` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `loisir` varchar(50) DEFAULT NULL,
  `id_utilisateur` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`id`, `loisir`, `id_utilisateur`) VALUES
(1, 'tennis de table', 1),
(2, 'broderie (point de croix compté)', 1),
(3, 'marche', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_messages`
--

CREATE TABLE IF NOT EXISTS `t_messages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `co_nom` varchar(50) NOT NULL,
  `co_email` varchar(100) NOT NULL,
  `co_sujet` varchar(50) NOT NULL,
  `co_message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `t_messages`
--

INSERT INTO `t_messages` (`id`, `co_nom`, `co_email`, `co_sujet`, `co_message`, `date`) VALUES
(6, 'HUITOREL', 'pascal.huitorel@lepoles.com', 'test', 'ceci est un test', '0000-00-00 00:00:00'),
(7, 'HUITOREL', 'pascal.huitorel@lepoles.com', 'test', 'ceci est un test 2', '0000-00-00 00:00:00'),
(8, 'HUITOREL', 'pascal.huitorel@lepoles.com', 'test', 'ceci est un test 3', '0000-00-00 00:00:00'),
(9, 'HUITOREL', 'pascal.huitorel@lepoles.com', 'test', 'ceci est un test 3', '0000-00-00 00:00:00'),
(10, 'HUITOREL', 'pascal.huitorel@lepoles.com', 'test', 'ceci est un test 3', '0000-00-00 00:00:00'),
(11, 'HUITOREL', 'pascal.huitorel@lepoles.com', 'test', 'ceci est un test 4', '0000-00-00 00:00:00'),
(12, 'HUITOREL', 'solange.huitorel@free.fr', 'TON SITE', 'Coucou,\n\nJ''ai tout lu, c''est super.\nTu peux corriger dans &quot;autres langages&quot; : il y a 2 &quot;n&quot; à langage.\n\nA bientôt (n''oublies pas de me donner l''heure de ton arrivée samedi. \nBises\nMaman\n\n', '0000-00-00 00:00:00'),
(13, 'Pascal', 'pascal.huitorel@gmail.com', 'test date', 'test de la messagerie', '2017-12-17 00:54:16'),
(14, 'hui', 'huitorelpas@gmail.com', 'test', 'test du 9 1 18', '2018-01-09 21:44:51');

-- --------------------------------------------------------

--
-- Structure de la table `t_points_forts`
--

CREATE TABLE IF NOT EXISTS `t_points_forts` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `point_fort` varchar(50) NOT NULL,
  `id_utilisateur` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_points_forts`
--

INSERT INTO `t_points_forts` (`id`, `point_fort`, `id_utilisateur`) VALUES
(1, 'logique', 1),
(2, 'persévérant', 1),
(3, 'curieux', 1),
(4, 'esprit d''équipe', 1),
(5, 'observateur', 1),
(6, 'avenant', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

CREATE TABLE IF NOT EXISTS `t_realisations` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `r_titre` varchar(100) DEFAULT NULL,
  `r_soustitre` varchar(50) DEFAULT NULL,
  `r_lien` varchar(100) NOT NULL,
  `r_photos` varchar(255) NOT NULL,
  `r_dates` varchar(50) DEFAULT NULL,
  `r_description` text,
  `id_utilisateur` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_realisations`
--

INSERT INTO `t_realisations` (`id`, `r_titre`, `r_soustitre`, `r_lien`, `r_photos`, `r_dates`, `r_description`, `id_utilisateur`) VALUES
(1, 'création d''un site', 'mypetstar', 'https://mypetstar.fr', 'mypetstar.jpg', '26/05/2017', 'site de casting pour animal', 1),
(3, 'développement d''une application de gestion de mon club de billard', '', '', '', '', '', 1),
(4, 'développement de 2 applications de compteur de jeu de billard', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_reseaux`
--

CREATE TABLE IF NOT EXISTS `t_reseaux` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `id_utilisateur` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_reseaux`
--

INSERT INTO `t_reseaux` (`id`, `nom`, `logo`, `lien`, `id_utilisateur`) VALUES
(2, 'github', 'fa-github-square', 'https://github.com/PH276', 1),
(3, 'linkedin', 'fa-linkedin-square', 'https://www.linkedin.com/in/pascal-huitorel-14ab96133/?ppe=1', 1),
(4, 'viadeo', 'fa-viadeo-square', 'https://www.viadeo.com/p/00221cjstha3qxtp/edit', 1),
(5, 'twitter', 'fa-twitter-square', 'https://twitter.com/PH276', 1),
(6, 'facebook', 'fa-facebook-square', 'https://www.facebook.com/profile.php?id=100018829567115', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

CREATE TABLE IF NOT EXISTS `t_titre_cv` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `titre_cv` text,
  `description` varchar(200) NOT NULL,
  `accroche` text,
  `logo` varchar(20) DEFAULT NULL,
  `id_utilisateur` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `t_titre_cv`
--

INSERT INTO `t_titre_cv` (`id`, `titre_cv`, `description`, `accroche`, `logo`, `id_utilisateur`) VALUES
(1, 'Développeur web', 'Je suis à la recherche d''un stage pour finaliser une formation d''intégrateur développeurweb après avoir commencé par développer un site web pour une entreprise.', '<p>Je suis passionné d''informatique, plus précisément de programmation.</p>\n                <p>\n                    En tant que développeur web, j''ai commencé par créer mon premier site web (<a href="https://mypetstar.fr" target="_blank">mypetstar.fr</a>) pour CRIS Production.\n                    <br>\n                    Pour renforcer mes compétences, je suis actuellement en formation d''intégrateur développeur web.\n                </p>\n<p>Je suis à la recherche d''un stage de 2 mois (du 8 février au 6 avril) pour finaliser cette formation.</p>', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `t_utilisateurs` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` int(10) unsigned zerofill DEFAULT NULL,
  `autre_tel` int(10) unsigned zerofill DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `avatar` varchar(20) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` enum('H','F') DEFAULT NULL,
  `etat_civil` enum('M.','Mme') DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `code_postal` int(5) unsigned zerofill DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `site_web` varchar(50) DEFAULT NULL,
  `statut` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `statut` (`statut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id`, `prenom`, `nom`, `email`, `telephone`, `autre_tel`, `mdp`, `pseudo`, `avatar`, `date_naissance`, `sexe`, `etat_civil`, `adresse`, `code_postal`, `ville`, `pays`, `site_web`, `statut`) VALUES
(1, 'Pascal', 'HUITOREL', 'pascal.huitorel@gmail.com', 0634018341, 0174546406, '$2y$10$eUkOm2.RK94UrCS.uGXUIOOxwdTapTJL/zt8VvFi/OcGqfCV8otQG', 'PH276', 'portrait.PNG', '1966-07-22', 'H', 'M.', '10 rue Henri Barbusse', 92390, 'Villeneuve-la-Garenne', 'France', 'pascalhuitorel.fr', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
