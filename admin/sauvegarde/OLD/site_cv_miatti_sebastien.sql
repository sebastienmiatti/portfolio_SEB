-- phpMyAdmin SQL Dump
-- version 4.5.1
-- https://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Décembre 2017 à 17:00
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaires`
--

CREATE TABLE `t_commentaires` (
  `id_commentaire` int(3) NOT NULL,
  `co_nom` varchar(100) NOT NULL,
  `co_email` varchar(100) NOT NULL,
  `co_sujet` varchar(100) NOT NULL,
  `co_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_commentaires`
--

INSERT INTO `t_commentaires` (`id_commentaire`, `co_nom`, `co_email`, `co_sujet`, `co_message`) VALUES
(11, 'miatti sebastien', 'miatti.sebastien@live.fr', 'chocolat', 'jen ai pas eu '),
(13, 'julien', 'julien@gmail.com', 'fou', 'mdr');

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE `t_competences` (
  `id_competence` int(3) NOT NULL,
  `competence` varchar(30) NOT NULL,
  `c_niveau` int(3) NOT NULL,
  `c_categorie` enum('back','front') NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(39, 'Bootstrap', 75, 'front', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

CREATE TABLE `t_experiences` (
  `id_experience` int(3) NOT NULL,
  `e_titre` varchar(50) NOT NULL,
  `e_soustitre` varchar(50) NOT NULL,
  `e_dates` varchar(50) NOT NULL,
  `e_description` text NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `t_formations` (
  `id_formation` int(3) NOT NULL,
  `f_titre` varchar(50) NOT NULL,
  `f_soustitre` varchar(50) NOT NULL,
  `f_dates` varchar(50) NOT NULL,
  `f_description` text NOT NULL,
  `f_logo` varchar(200) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_formations`
--

INSERT INTO `t_formations` (`id_formation`, `f_titre`, `f_soustitre`, `f_dates`, `f_description`, `f_logo`, `utilisateur_id`) VALUES
(2, 'Certification d''intégrateur et développeur web', 'Webforce3-PoleS', 'Depuis Juin 2017', 'Apprentissage des techniques de développement et d''intégration web et mobile, formation labéllisée Grande Ecole du Numérique ', 'fa-graduation-cap ', 1),
(3, 'Cycle supérieur d''ingénieur informatique', 'Supinfo', '2012-2013', '1er trimestre', 'fa-university', 1),
(4, 'Baccalauréat STI génie electronique', 'Newton-Enrea', '2008-2010', 'Initiation aux sciences de l''ingénieur et initiation aux systèmes de production', 'fa-graduation-cap ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE `t_loisirs` (
  `id_loisir` int(3) NOT NULL,
  `loisir` varchar(30) NOT NULL,
  `l_logo` varchar(200) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `t_realisations` (
  `id_realisation` int(3) NOT NULL,
  `r_titre` varchar(20) NOT NULL,
  `r_soustitre` varchar(50) NOT NULL,
  `r_dates` varchar(50) NOT NULL,
  `r_description` text NOT NULL,
  `r_img` varchar(200) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_realisations`
--

INSERT INTO `t_realisations` (`id_realisation`, `r_titre`, `r_soustitre`, `r_dates`, `r_description`, `r_img`, `utilisateur_id`) VALUES
(1, 'Découverte', 'Site front ', '08/2017', '1er réalisation en formation avec Webforce3 :\r\nHtml/Css/JQuery/Javascript', 'site_front1.png', 1),
(2, 'Personnel', 'Site front', '09/2017', '1ère réalisation d''un site cv :\r\nHtml/Css/JQuery/Javascript', 'site_front2.png', 1),
(3, 'Annonceo (boutique)', 'Site back', '10/2017', '1er réalisation en formation avec Webforce3 :\r\nHtml/Css/JQuery/Javascript/Php/MySql', 'site_back2.png', 1),
(4, 'Perso', 'Site back', '11/2017', '2eme Réalisation personnel d''un site cv : Html/Css/JQuery/Javascript/Php/MySql', 'site_back3.png', 1),
(5, 'Perso', 'Site front', '12/2017', '2eme réalisation pesonnel d''un site cv :\r\nHtml/Css/JQuery/Javascript/Php/MySql/PhpOO', 'site_back4.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_reseaux`
--

CREATE TABLE `t_reseaux` (
  `id_reseau` int(3) NOT NULL,
  `reseau` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `logo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `t_textes` (
  `id_texte` int(3) NOT NULL,
  `t_head` varchar(255) NOT NULL,
  `t_body` varchar(255) NOT NULL,
  `t_foot` varchar(255) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_textes`
--

INSERT INTO `t_textes` (`id_texte`, `t_head`, `t_body`, `t_foot`, `utilisateur_id`) VALUES
(1, 'lhjklmlk1223', 'hjklhjklhjk1223', 'lhjklhjklh1223', 1),
(5, 'lhjklmlk122356', 'hjklhjklhjk122356', 'lhjklhjklh122356', 1),
(6, 'lhjklmlk122356', 'hjklhjklhjk122356', 'lhjklhjklh122356', 1),
(7, 'lhjklmlk122356', 'hjklhjklhjk122356', 'lhjklhjklh122356', 1),
(8, 'lhjklmlk1223465645', 'hjklhjklhjk12235465465', 'lhjklhjklh122315645', 1),
(9, 'Bonjour', 'Voici le meilleur ', 'blabla bla', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

CREATE TABLE `t_titre_cv` (
  `id_titre_cv` int(3) NOT NULL,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(20) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_titre_cv`
--

INSERT INTO `t_titre_cv` (`id_titre_cv`, `titre_cv`, `accroche`, `logo`, `utilisateur_id`) VALUES
(1, 'Developpeur Web', 'le meilleur site au monde mon pote ', 'img-logo.png', 1),
(2, 'Developpeur Web', 'Bienvenu mon site web, aller mon pote laisse un petit commentaire des familles', 'img-logo.png', 1),
(3, 'Developpeur Webchoco', 'Bienvenu mon site web, aller mon pote laisse un petit commentaire des familles ggf\r\nhttps://localhost/htdocs-SEB/portfolio_SEB/admin/reseaux.php', 'img-logo.png', 1),
(4, 'Developpeur Webchoco', 'Bienvenu mon site web, aller mon pote laisse un petit commentaire des familles ggf\r\nhttps://localhost/htdocs-SEB/portfolio_SEB/admin/reseaux.php', 'logo.png', 1),
(5, 'Développeur Intégrateur Web', 'Bienvenu mon site cv, réalisé en production avec lePoles, je vous tiendrais informer ici de mes inspirations, réalisations a venir ou en cours', 'logo.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE `t_utilisateurs` (
  `id_utilisateur` int(3) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `mdp` varchar(12) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `avatar` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` enum('H','F') NOT NULL,
  `etat_civil` enum('M.','Mme') NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `site_web` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_naissance`, `sexe`, `etat_civil`, `adresse`, `code_postal`, `ville`, `pays`, `site_web`) VALUES
(1, 'Sébastien', 'Miatti', 'Sebastien.miatti@lepoles.com', 0783886292, '123456', 'Sébastien Miatti', 'logo1.png', 27, '1990-05-30', 'H', 'M.', '11 allée st exupéry', 92390, 'Villeneuve-la-garenne', 'France', 'https://miatti-sebastien.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_commentaires`
--
ALTER TABLE `t_commentaires`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `t_competences`
--
ALTER TABLE `t_competences`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  ADD PRIMARY KEY (`id_experience`);

--
-- Index pour la table `t_formations`
--
ALTER TABLE `t_formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  ADD PRIMARY KEY (`id_realisation`);

--
-- Index pour la table `t_reseaux`
--
ALTER TABLE `t_reseaux`
  ADD PRIMARY KEY (`id_reseau`);

--
-- Index pour la table `t_textes`
--
ALTER TABLE `t_textes`
  ADD PRIMARY KEY (`id_texte`);

--
-- Index pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  ADD PRIMARY KEY (`id_titre_cv`);

--
-- Index pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_commentaires`
--
ALTER TABLE `t_commentaires`
  MODIFY `id_commentaire` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `t_competences`
--
ALTER TABLE `t_competences`
  MODIFY `id_competence` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id_experience` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_formations`
--
ALTER TABLE `t_formations`
  MODIFY `id_formation` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  MODIFY `id_loisir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  MODIFY `id_realisation` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_reseaux`
--
ALTER TABLE `t_reseaux`
  MODIFY `id_reseau` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `t_textes`
--
ALTER TABLE `t_textes`
  MODIFY `id_texte` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  MODIFY `id_titre_cv` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  MODIFY `id_utilisateur` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
