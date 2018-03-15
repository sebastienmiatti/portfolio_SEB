-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- https://www.phpmyadmin.net
--
-- Client :  db714439183.db.1and1.com
-- Généré le :  Mar 02 Janvier 2018 à 17:02
-- Version du serveur :  5.5.58-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db714439183`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaires`
--

CREATE TABLE IF NOT EXISTS `t_commentaires` (
  `id_commentaire` int(3) NOT NULL AUTO_INCREMENT,
  `co_nom` varchar(100) NOT NULL,
  `co_email` varchar(100) NOT NULL,
  `co_sujet` varchar(100) NOT NULL,
  `co_message` text NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE IF NOT EXISTS `t_competences` (
  `id_competence` int(3) NOT NULL AUTO_INCREMENT,
  `competence` varchar(30) NOT NULL,
  `c_niveau` int(3) NOT NULL,
  `c_categorie` enum('back','front') NOT NULL,
  `utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`, `c_niveau`, `c_categorie`, `utilisateur_id`) VALUES
(28, 'Php', 75, 'back', 1),
(29, 'MySql', 75, 'back', 1),
(30, 'Silex', 60, 'back', 1),
(31, 'Orienté Objets', 55, 'back', 1),
(32, 'Angular', 55, 'back', 1),
(33, 'Laravel', 50, 'back', 1),
(34, 'Html', 80, 'front', 1),
(35, 'Css', 80, 'front', 1),
(36, 'Javascript', 60, 'front', 1),
(37, 'Jquery', 65, 'front', 1),
(38, 'Ajax', 55, 'front', 1),
(39, 'Bootstrap', 75, 'front', 1),
(40, 'Symfony', 45, 'back', 1),
(41, 'Wordpress', 50, 'front', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

CREATE TABLE IF NOT EXISTS `t_experiences` (
  `id_experience` int(3) NOT NULL AUTO_INCREMENT,
  `e_titre` varchar(50) NOT NULL,
  `e_soustitre` varchar(50) NOT NULL,
  `e_dates` varchar(50) NOT NULL,
  `e_description` text NOT NULL,
  `utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`id_experience`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id_experience`, `e_titre`, `e_soustitre`, `e_dates`, `e_description`, `utilisateur_id`) VALUES
(2, 'Développeur Intégrateur web', 'Poles', 'Depuis 2017', 'Création d''un site cv et d''un site client', 1),
(3, 'Responsable éclairage', 'Mariages, évènements', 'Depuis 2013', 'Installation, désinstallation et gestion du matériels d''éclairage et d''ambiance de la soirée', 1),
(4, 'Conseiller multimédia', 'Mobipel (free)', '2013-2014', 'Prise en charge des dysfonctionnements du matériels et/ ou abonnements des clients', 1),
(5, 'Agent polyvalent', 'U.C.P.A des chanteraines', '2012', 'Diagnostique informatique du réseau et mise a jour du contenu du site web(coté front)\r\nGestion, entretien, réaménagement de tous les espaces du club d''équitation', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

CREATE TABLE IF NOT EXISTS `t_formations` (
  `id_formation` int(3) NOT NULL AUTO_INCREMENT,
  `f_titre` varchar(50) NOT NULL,
  `f_soustitre` varchar(50) NOT NULL,
  `f_dates` varchar(50) NOT NULL,
  `f_description` text NOT NULL,
  `f_logo` varchar(200) NOT NULL,
  `utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_formations`
--

INSERT INTO `t_formations` (`id_formation`, `f_titre`, `f_soustitre`, `f_dates`, `f_description`, `f_logo`, `utilisateur_id`) VALUES
(2, 'Certification d''intégrateur et développeur web', 'Webforce3-PoleS', 'Depuis Juin 2017', 'Apprentissage des techniques de développement et d''intégration web et mobile, formation labéllisée Grande Ecole du Numérique ', 'fa-code ', 1),
(3, 'Cycle supérieur d''ingénieur informatique', 'Supinfo', '2012-2013', '1er trimestre', 'fa-university', 1),
(4, 'Baccalauréat STI génie electronique', 'Newton-Enrea', '2008-2010', 'Initiation aux sciences de l''ingénieur et initiation aux systèmes de production', 'fa-graduation-cap ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE IF NOT EXISTS `t_loisirs` (
  `id_loisir` int(3) NOT NULL AUTO_INCREMENT,
  `loisir` varchar(30) NOT NULL,
  `l_logo` varchar(200) NOT NULL,
  `utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`id_loisir`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`id_loisir`, `loisir`, `l_logo`, `utilisateur_id`) VALUES
(1, 'Equitation', 'fa-heart', 1),
(2, 'Multimédia', 'fa-video-camera', 1),
(3, 'Running', 'fa-heartbeat', 1),
(4, 'Pc gamer', 'fa-desktop', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

CREATE TABLE IF NOT EXISTS `t_realisations` (
  `id_realisation` int(3) NOT NULL AUTO_INCREMENT,
  `r_titre` varchar(20) NOT NULL,
  `r_soustitre` varchar(50) NOT NULL,
  `r_dates` varchar(50) NOT NULL,
  `r_description` text NOT NULL,
  `r_img` varchar(200) NOT NULL,
  `utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`id_realisation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `t_realisations`
--

INSERT INTO `t_realisations` (`id_realisation`, `r_titre`, `r_soustitre`, `r_dates`, `r_description`, `r_img`, `utilisateur_id`) VALUES
(1, 'Découverte', 'Site front ', '07/2017', '1er réalisation en formation avec Webforce3 :\r\nHtml/Css/JQuery/Javascript', 'realisation.html.png', 1),
(2, 'Personnel', 'Site front', '08/2017', '1ère réalisation d''un site cv :\r\nHtml/Css/JQuery/Javascript', 'index.html.png', 1),
(3, 'Site (boutique)', 'Site back', '10/2017', '1er réalisation en formation avec Webforce3 :\r\nHtml/Css/JQuery/Javascript/Php/MySql', 'site_back2.png', 1),
(4, 'Perso', 'Site back', '11/2017', '2eme Réalisation personnel d''un site cv : Html/Css/JQuery/Javascript/Php/MySql', 'site_back3.png', 1),
(5, 'Perso', 'Site front', '12/2017', '2eme réalisation personnel d''un site cv :\r\nHtml/Css/JQuery/Javascript/Php/MySql/PhpOO', 'site_back4.png', 1),
(6, 'Tchat', 'Tchat en ligne', '11/2017', '1er réalisation d''un tchat :\r\nHtml/Css/Php/MySql/Ajax', 'site_tchat1.png', 1),
(7, 'Annonceo', 'Boutique en ligne', '10/2017', '1er réalisation d''un tchat :\r\nHtml/Css/Php/MySql/', 'site_front3.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_reseaux`
--

CREATE TABLE IF NOT EXISTS `t_reseaux` (
  `id_reseau` int(3) NOT NULL AUTO_INCREMENT,
  `reseau` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `logo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`id_reseau`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `t_reseaux`
--

INSERT INTO `t_reseaux` (`id_reseau`, `reseau`, `url`, `logo`, `utilisateur_id`) VALUES
(1, 'LinkedIn', 'https://www.linkedin.com/in/s%C3%A9bastien-miatti-7b6586145/', 'fa-linkedin', 1),
(2, 'facebook', 'https://www.facebook.com/Miattisebastien/', 'fa-facebook', 1),
(5, 'Codepen', 'https://codepen.io/tchikito/#', 'fa-codepen', 1),
(6, 'github', 'https://github.com/sebastienmiatti', 'fa-github', 1),
(7, 'twitter', 'https://twitter.com/SebMiatti', 'fa-twitter', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_textes`
--

CREATE TABLE IF NOT EXISTS `t_textes` (
  `id_texte` int(3) NOT NULL AUTO_INCREMENT,
  `t_head` varchar(255) NOT NULL,
  `t_body` varchar(255) NOT NULL,
  `t_foot` varchar(255) NOT NULL,
  `utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`id_texte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `t_textes`
--

INSERT INTO `t_textes` (`id_texte`, `t_head`, `t_body`, `t_foot`, `utilisateur_id`) VALUES
(1, 'lhjklmlk1223', 'hjklhjklhjk1223', 'lhjklhjklh1223', 1),
(5, 'lhjklmlk122356', 'hjklhjklhjk122356', 'lhjklhjklh122356', 1),
(6, 'lhjklmlk122356', 'hjklhjklhjk122356', 'lhjklhjklh122356', 1),
(7, 'lhjklmlk122356', 'hjklhjklhjk122356', 'lhjklhjklh122356', 1),
(8, 'lhjklmlk1223465645', 'hjklhjklhjk12235465465', 'lhjklhjklh122315645', 1),
(9, 'Bonjour', 'Voici le meilleur ', 'blabla bla', 1),
(10, 'Bonjour', 'Voici le meilleur ', 'blabla blai', 0),
(11, 'Bonjour', 'Voici le meilleur ttt', 'blabla bla', 1),
(12, 'Bonjour', 'taratata', 'blabla bla', 1),
(13, 'Bonjour', 'Voici le meilleur', 'Merci de bien laisser ici un commentaire de votre expérience sur mon site CV en ligne, en utilisant le formulaire de contact prévu a cet effet ou bien les liens de réseaux sociaux ', 1),
(14, 'Bonjour', 'Ici vous pouvez avoir un aperçu de mon CV en format PDF', 'Merci de bien laisser ici un commentaire de votre expérience sur mon site CV en ligne, en utilisant le formulaire de contact prévu a cet effet ou bien les liens de réseaux sociaux ', 1),
(15, 'Chère recruteurs', 'Ici vous pouvez avoir un aperçu de mon CV en format PDF', 'Merci de bien laisser ici un commentaire de votre expérience sur mon site CV en ligne, en utilisant le formulaire de contact prévu a cet effet ou bien les liens de réseaux sociaux ', 1),
(16, 'Chère recruteurs', 'Ici vous pouvez avoir un aperçu de mon CV en format PDF', 'Merci de bien laisser ici un commentaire de votre expérience sur mon site CV en ligne, en utilisant le formulaire de contact prévu a cet effet ou bien les liens de réseaux sociaux ', 1),
(17, 'Chère recruteurs', 'Ici vous pouvez avoir un aperçu de mon CV en format PDF', 'Merci de bien laisser ici, un commentaire de votre expérience sur mon site CV en ligne, en utilisant le formulaire de contact prévu a cet effet ou bien les liens de réseaux sociaux ', 1),
(18, 'Chère recruteurs', 'Ici vous pouvez avoir un aperçu de mon CV en format PDF', 'Merci de bien laisser ici, un commentaire de votre expérience sur mon site CV en ligne, en utilisant le formulaire de contact prévu a cet effet ou bien, les liens de réseaux sociaux ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

CREATE TABLE IF NOT EXISTS `t_titre_cv` (
  `id_titre_cv` int(3) NOT NULL AUTO_INCREMENT,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(20) NOT NULL,
  `utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`id_titre_cv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `t_titre_cv`
--

INSERT INTO `t_titre_cv` (`id_titre_cv`, `titre_cv`, `accroche`, `logo`, `utilisateur_id`) VALUES
(15, 'Développeur Intégrateur Web', 'Bienvenu mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.png', 1),
(16, 'Développeur Intégrateur Web', 'Bienvenu mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.jpg', 1),
(17, 'Développeur Intégrateur Web', 'Bienvenu mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.png', 1),
(18, 'Développeur Intégrateur Web', 'Bienvenu mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.jpg', 1),
(19, 'Développeur Intégrateur Web', 'Bienvenu mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.png', 1),
(20, 'Développeur Intégrateur Web', 'Bienvenue sur mon site cv, réalisé en production avec le Poles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.png', 0),
(21, 'Développeur Intégrateur Web', 'Bienvenue mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.png', 0),
(22, 'Développeur Intégrateur Web', 'Bienvenue mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.png', 1),
(23, 'Développeur Intégrateur Web', 'Bienvenue sur mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.png', 1),
(24, 'Développeur Intégrateur Web', 'Bienvenue, je suis actuellement en recherche de stage dans le développement web. Ce site CV réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'SebLogo.png', 1),
(25, 'Développeur Intégrateur Web', 'Bienvenue, je suis actuellement en recherche de stage dans le développement web. Ce site CV réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations en cours ou à venir ', 'SebLogo.png', 1),
(26, 'Développeur Intégrateur Web', 'Bienvenue, je suis actuellement en recherche de stage dans le développement web. Ce site CV réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, et réalisations en cours ou à venir ', 'SebLogo.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `t_utilisateurs` (
  `id_utilisateur` int(3) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(10) unsigned zerofill NOT NULL,
  `mdp` varchar(12) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `avatar` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` enum('H','F') NOT NULL,
  `etat_civil` enum('M.','Mme') NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(5) unsigned zerofill NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `site_web` varchar(50) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_naissance`, `sexe`, `etat_civil`, `adresse`, `code_postal`, `ville`, `pays`, `site_web`) VALUES
(1, 'Sébastien', 'Miatti', 'Sebastien.miatti@lepoles.com', 0783886292, '123456', 'Sébastien Miatti', 'SebLogo.png', 27, '1990-05-30', 'H', 'M.', '11 allée st exupéry', 92390, 'Villeneuve-la-garenne', 'France', 'https://miatti-sebastien.fr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
