-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 30 jan. 2019 à 00:53
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_web_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `centers`
--

CREATE TABLE `centers` (
  `id` int(11) NOT NULL,
  `center` char(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `centers`
--

INSERT INTO `centers` (`id`, `center`) VALUES
(1, 'aix en provence'),
(2, 'Nice'),
(7, 'Pau'),
(8, 'Toulouse'),
(9, 'Nancy'),
(11, 'Reims'),
(12, 'Grenoble'),
(13, 'Nanterre'),
(14, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` char(255) NOT NULL,
  `users_id` int(11) NOT NULL,
  `comments_id` int(11) DEFAULT NULL,
  `imgs_id` int(11) DEFAULT NULL,
  `events_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `users_id`, `comments_id`, `imgs_id`, `events_id`) VALUES
(1, 'bdNJCMSLKC', 2, NULL, 1, 4),
(2, 'blablabla', 96, NULL, 3, 3),
(3, 'blablabla', 96, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` char(45) NOT NULL,
  `description` char(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  `price` float DEFAULT NULL,
  `p_r` int(11) DEFAULT NULL,
  `p_t` int(11) DEFAULT NULL,
  `places_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `date`, `like`, `price`, `p_r`, `p_t`, `places_id`) VALUES
(3, 'journee integration', 'blablabla', '2019-01-30 10:00:00', 2, 3, NULL, 10, 3),
(4, 'assom', 'blablabla', NULL, 0, NULL, NULL, NULL, NULL),
(5, 'assom2', 'blablabla', NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `url` char(255) NOT NULL,
  `date` datetime NOT NULL,
  `products_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `imgs`
--

INSERT INTO `imgs` (`id`, `url`, `date`, `products_id`) VALUES
(1, 'fjreqvnfvfjvn', '2019-01-29 23:58:21', 2),
(3, 'fjrcdnkvfdl', '2019-01-30 00:01:32', NULL),
(4, 'fjrcdnkvfdlvkfd,lbgbgf', '2019-01-30 00:01:37', NULL),
(5, 'fjrcdnkvfdlvkfd,lbgbgfvnqfjkvn,fd', '2019-01-30 00:01:41', NULL),
(6, 'fjrcdnkvfd', '2019-01-30 00:01:52', NULL),
(7, 'fjrcdnkvfdv', '2019-01-30 00:01:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `place` char(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `places`
--

INSERT INTO `places` (`id`, `place`) VALUES
(3, 'pop up house');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` char(45) NOT NULL,
  `description` char(255) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `nb_com` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `nb_com`) VALUES
(2, 'pull noir', 'blabla', 15, 5, 0),
(3, 'pull bde blanc', 'blablabla', 15, 4, 0),
(4, 'pull bleu bde', 'qfhgivuvhnj', 15, 6, 1),
(6, 'tee shirt cesi e.i blanc', 'chqbpeihfhvbpifv', 8, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE `statuts` (
  `id` int(11) NOT NULL,
  `statut` char(45) CHARACTER SET big5 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`id`, `statut`) VALUES
(1, 'etudiant'),
(2, 'BDE'),
(3, 'Salarie');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(45) NOT NULL,
  `firstName` char(45) NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `centres_id` int(11) NOT NULL,
  `statuts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstName`, `email`, `password`, `centres_id`, `statuts_id`) VALUES
(1, 'Luffy', 'Monkey D', 'luffy.monkeyd@viacesi.fr', '$2a$10$1Hrb4GhuIJd5XG39IRWNw.tJKFhDEUkmbQXTI0ft/Dw95d9cLkFha', 2, 2),
(2, 'Zoro', 'Roronoa', 'zoro.roronoa@viacesi.fr', 'santoryu', 1, 1),
(14, 'Katakuri', 'Charlotte', 'katakuri.charlotte@viacesi.fr', 'mochi1', 1, 1),
(15, 'Copper', 'Tony Tony', 'chopper.tonytony@viacesi.fr', 'rumble1', 1, 1),
(16, 'Robin', 'Nico', 'robin.nice@viacesi.fr', 'demon4', 1, 1),
(17, 'Roger', 'Gold D', 'roger.goldd@viacesi.fr', 'pirate4', 1, 1),
(18, 'Ace', 'Pordgas D', 'ace.portgasd@viacesi.fr', 'piro4', 1, 1),
(23, 'Shanks', 'Le Roux', 'shanks.leroux@viacesi.fr', 'haki3', 1, 1),
(26, 'Dracule', 'Mihawk', 'dracule.mihawk@viacesi.fr', 'yoru3', 1, 1),
(27, 'Sanji', 'Vinsmoke', 'sanji.vinsmoke@viacesi.fr', 'cooker1', 1, 1),
(30, 'Franky', 'cyborg', 'franky.cyborg@viacesi.fr', 'super1', 1, 1),
(84, 'Edward', 'Newgate', 'edward.newgate@viacesi.fr', 'yonko1', 1, 1),
(94, 'Dragon', 'Monkey D', 'dragon.monkeyd@viacesi.fr', '$2a$10$/HIUZLGx5xJ/1/GcrrlCC.CEK2eR8k4LKOeIcaJ6ggoqovbWlRZ7q', 1, 1),
(95, 'Garp', 'Monkey D', 'garp.monkeyd@viacesi.fr', '$2a$10$ytFmyhpGyjfTuK8hTX93CeayhNYv36sq891y6llqtGKBD8UoQDvlK', 1, 1),
(96, 'Romano', 'Sebastien', 'sebastien.romano@viacesi.fr', '$2a$10$OqrXfJGPp5EBgoBsKB9oQeu4vzR5gXtxHlIilrI8JIdCA30UIHFJC', 1, 2),
(97, 'Romano', 'Marion', 'marion.romano@viacesi.fr', '$2a$10$EhYl79wF0Ow4bvK.zAViy.rYJcQBZvuty8g891bJ79PwdQh5xKJKK', 1, 3),
(101, 'Romano', 'Benjamin', 'benjamin.romano@viacesi.fr', 'Bonjour5293', 1, 1),
(103, 'Captain', 'Ussop', 'ussop.captain@viacesi.fr', '$2a$10$q/E3bY2WIHRmwIQjzAEuLuPINBYWHzpwHQc27OlL2O.yB3wWeaVu.', 2, 1),
(104, 'Trafalgar D', 'Law', 'law.trafalgard@viacesi.fr', '$2a$10$oehHZ6J4PNOvpmeYcP8BYuD.z39wHpzPEsmq.tTDSJqgTGccgE9H6', 2, 1),
(105, 'test', 'test', 'test.test@viacesi.fr', '$2a$10$ufiwhJnhZfgPN/UyvLfJOukx6ih2B3QLaMJFYtozCjx18KB5fkFr2', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_events`
--

CREATE TABLE `users_events` (
  `events_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_events`
--

INSERT INTO `users_events` (`events_id`, `users_id`) VALUES
(3, 97);

-- --------------------------------------------------------

--
-- Structure de la table `users_products`
--

CREATE TABLE `users_products` (
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `statut` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_products`
--

INSERT INTO `users_products` (`products_id`, `users_id`, `qty`, `statut`) VALUES
(2, 1, 1, 0),
(3, 1, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users1_idx` (`users_id`),
  ADD KEY `fk_comments_comments1_idx` (`id`),
  ADD KEY `fk_comments_imgs1_idx` (`imgs_id`),
  ADD KEY `events_id` (`events_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_events_places1_idx` (`places_id`);

--
-- Index pour la table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imgs_products1_idx` (`products_id`);

--
-- Index pour la table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`),
  ADD KEY `fk_users_centre_idx` (`centres_id`),
  ADD KEY `fk_users_statut1_idx` (`statuts_id`);

--
-- Index pour la table `users_events`
--
ALTER TABLE `users_events`
  ADD PRIMARY KEY (`events_id`,`users_id`),
  ADD KEY `fk_events_has_users_users1_idx` (`users_id`),
  ADD KEY `fk_events_has_users_events1_idx` (`events_id`);

--
-- Index pour la table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`products_id`,`users_id`),
  ADD KEY `fk_products_has_users1_users1_idx` (`users_id`),
  ADD KEY `fk_products_has_users1_products1_idx` (`products_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `events_id` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `fk_comments_comments1` FOREIGN KEY (`id`) REFERENCES `comments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_imgs1` FOREIGN KEY (`imgs_id`) REFERENCES `imgs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_places1` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `imgs`
--
ALTER TABLE `imgs`
  ADD CONSTRAINT `fk_imgs_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_centre` FOREIGN KEY (`centres_id`) REFERENCES `centers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_statut1` FOREIGN KEY (`statuts_id`) REFERENCES `statuts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_events`
--
ALTER TABLE `users_events`
  ADD CONSTRAINT `fk_events_has_users_events1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_events_has_users_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_products`
--
ALTER TABLE `users_products`
  ADD CONSTRAINT `fk_products_has_users1_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_has_users1_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
