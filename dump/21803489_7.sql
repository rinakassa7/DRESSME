-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Client :  mysql.info.unicaen.fr:3306
-- Généré le :  Lun 07 Décembre 2020 à 22:30
-- Version du serveur :  10.1.44-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `21803489_7`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `description` text,
  `type_annonce` varchar(5) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `miniature_path` text,
  `type` varchar(15) DEFAULT NULL,
  `type_detail` varchar(15) DEFAULT NULL,
  `etat` varchar(15) DEFAULT NULL,
  `date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `utilisateur_id`, `description`, `type_annonce`, `prix`, `miniature_path`, `type`, `type_detail`, `etat`, `date_publication`) VALUES
(3, 1, 'Petite Veste bleu', 'woman', 72, 'upload/annonces_pictures/3/the-hairvolution-of-monica-geller-from-friends.jpg', 'vetement', 'vests', 'etat normale', '2020-12-07 22:16:25'),
(4, 3, 'Petit Mocassin', 'man', 500, 'upload/annonces_pictures/4/mocassin-london-marron.jpg', 'chaussures', 'bottes/bottines', 'neuf', '2020-12-07 22:23:04');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `annonce_id` int(11) DEFAULT NULL,
  `commentaire` text,
  `date_poste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pseudo_utilisateur` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(5) NOT NULL,
  `profil_picture_path` text NOT NULL,
  `nombre_annonces_poste` int(11) NOT NULL DEFAULT '0',
  `nombre_commentaires_poste` int(11) NOT NULL DEFAULT '0',
  `date_inscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `pseudo`, `sexe`, `email`, `telephone`, `password`, `status`, `profil_picture_path`, `nombre_annonces_poste`, `nombre_commentaires_poste`, `date_inscription`) VALUES
(1, 'Monica', 'Geller', 'monica', 'femme', 'monicageller@gmail.com', '0674550747', '$2y$10$Om9NzDRx5BQHyX6mBYac9OBOwpzuJOr.mlnL98VWBQSDsSL3/wida', 'user', 'upload/profil_pictures/1/the-hairvolution-of-monica-geller-from-friends.jpg', 0, 0, '2012-07-20'),
(2, 'Pascal', 'Vanier', 'vanier', 'homme', 'pascalvanier@gmail.com', '0632450114', '$2y$10$0N9ubzComGIOLlJK5dj/ae20Yma.Q7mvkCUU.SmEotDnPwhlZsjaW', 'user', 'assets/images/profil/homme_default.svg', 0, 0, '2012-07-20'),
(3, 'Jean Marc', 'Lecarpentier', 'lecarpentier', 'homme', 'jeanmarclecarpentier@gmail.com', '0625457898', '$2y$10$9xBm4b5sVzwADccObKcCCeiNZweQwuPlaw9fh6WchiNSGicbYDF9e', 'user', 'assets/images/profil/homme_default.svg', 0, 0, '2012-07-20');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
