-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 août 2021 à 15:09
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `atraschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `f_categories`
--

CREATE TABLE `f_categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `f_categories`
--

INSERT INTO `f_categories` (`id`, `nom`) VALUES
(1, 'Langues'),
(2, 'Sciences'),
(3, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `f_messages`
--

CREATE TABLE `f_messages` (
  `id` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_posteur` int(11) NOT NULL,
  `date_heure_post` datetime NOT NULL,
  `date_heure_edition` datetime NOT NULL,
  `meilleures_reponse` int(1) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `f_souscategories`
--

CREATE TABLE `f_souscategories` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `f_souscategories`
--

INSERT INTO `f_souscategories` (`id`, `id_categorie`, `nom`) VALUES
(1, 1, 'Francais'),
(2, 1, 'Anglais'),
(3, 1, 'Espagnol'),
(4, 1, 'Allemand'),
(5, 1, 'Portugais'),
(6, 1, 'Latin'),
(7, 1, 'Grec'),
(8, 2, 'Mathematiques'),
(9, 2, 'SVT'),
(10, 2, 'Sciences physiques'),
(11, 3, 'Eco-Fam'),
(12, 3, 'Histoire'),
(13, 3, 'Geographie'),
(14, 3, 'Education Civique'),
(15, 3, 'Philosophie'),
(16, 3, 'Economie'),
(17, 3, 'Musique');

-- --------------------------------------------------------

--
-- Structure de la table `f_suivis`
--

CREATE TABLE `f_suivis` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `f_topics`
--

CREATE TABLE `f_topics` (
  `id` int(11) NOT NULL,
  `id_createur` int(11) NOT NULL,
  `sujet` text NOT NULL,
  `contenu` text NOT NULL,
  `date_heure_creation` datetime NOT NULL,
  `resolu` int(11) NOT NULL,
  `notif_createur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `f_topics_categories`
--

CREATE TABLE `f_topics_categories` (
  `id` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_souscategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `sexe` varchar(12) NOT NULL,
  `jour` int(11) NOT NULL,
  `mois` varchar(30) NOT NULL,
  `annee` year(4) NOT NULL,
  `fonction` varchar(30) NOT NULL,
  `matierensegn` varchar(30) NOT NULL,
  `classe` varchar(30) NOT NULL,
  `region` varchar(255) NOT NULL,
  `ecole` varchar(255) NOT NULL,
  `numerotel` int(12) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `mail`, `mdp`, `sexe`, `jour`, `mois`, `annee`, `fonction`, `matierensegn`, `classe`, `region`, `ecole`, `numerotel`, `avatar`) VALUES
(3, 'Simon', 'Diouf', 'simondiouf2710@gmail.com', 'a5710dc951827297bd5e05d5cb4db4e2b974d7f5', 'Homme', 1, 'janvier', 0000, 'prof', 'Francais', '', 'Dakar', 'Valdiodio', 0, 'defaut.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `f_categories`
--
ALTER TABLE `f_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `f_messages`
--
ALTER TABLE `f_messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `f_souscategories`
--
ALTER TABLE `f_souscategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `f_suivis`
--
ALTER TABLE `f_suivis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `f_topics`
--
ALTER TABLE `f_topics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `f_topics_categories`
--
ALTER TABLE `f_topics_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `f_categories`
--
ALTER TABLE `f_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `f_messages`
--
ALTER TABLE `f_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `f_souscategories`
--
ALTER TABLE `f_souscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `f_suivis`
--
ALTER TABLE `f_suivis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `f_topics`
--
ALTER TABLE `f_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `f_topics_categories`
--
ALTER TABLE `f_topics_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
