-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 07 mai 2021 à 10:35
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `text` longtext NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `text`, `createdAt`, `user_id`, `topic_id`) VALUES
(1, 'c\'est quoi ce topic ?', '2021-04-28 16:34:01', 2, 1),
(2, 'Bah quoi?', '2021-04-28 16:46:11', 1, 1),
(3, 'Bah ouais t\'as vu le nom du sujet que tu as crée ? C\'est nul !', '2021-04-28 16:52:42', 2, 1),
(4, 'Merci de ne pas vous moquer ! chacun est libre de parler de ce qu\'il veut !', '2021-04-28 16:54:00', 3, 1),
(5, 'hé allez ! ça continue !', '2021-04-29 16:49:55', 2, 2),
(6, 'Mais quoi encore ?', '2021-04-29 16:59:31', 1, 2),
(7, 'Tu adores faire des topics avec des titres aussi random toi, non?', '2021-04-29 17:12:31', 2, 2),
(8, 'Ou vous vous calmez, où je vous calme !\r\nUn peu de respect les vieux croulants !', '2021-04-29 17:25:43', 3, 2),
(9, 'je dis ce que je veux !', '2021-05-07 09:19:52', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isAvailable` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `title`, `createdAt`, `isAvailable`, `user_id`) VALUES
(1, 'ça te coute un St Hubert', '2021-04-15 17:00:41', 1, 1),
(2, 'nom nom', '2021-04-29 13:13:14', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `birthDate` date NOT NULL,
  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'USER',
  `isBanned` tinyint(1) NOT NULL DEFAULT '0',
  `endOfBan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `email`, `avatar`, `birthDate`, `role`, `isBanned`, `endOfBan`) VALUES
(1, 'machin', '$argon2i$v=19$m=65536,t=4,p=1$VzIxampFN1V6dzRCaXczNw$YFu5Qt12jVCjaVsEgLgXCzgrjnw04YsJ940v4gQpDU4', 'gneu@truc.co', NULL, '1874-02-11', 'ROLE_USER', 0, NULL),
(2, 'machine', '$argon2i$v=19$m=65536,t=4,p=1$em43TEk2WnZHVXczY2RLbA$JosSqRVb1iUNOm0e8NJI2Xg5w0xm8owJD93T7n2UDJ8', 'machine@gmail.com', NULL, '0927-04-23', 'ROLE_USER', 0, NULL),
(3, 'DaShit', '$argon2i$v=19$m=65536,t=4,p=1$Y2lHLjR5WTFQdUU4SkFhSA$ArvA4WiYFoK5OY6vBMDcBF/9tqimbRmh3ivbWKJc0NQ', 'shit@shitshit.com', NULL, '1991-08-31', 'ROLE_USER', 0, NULL),
(4, 'Zaldrize', '$argon2i$v=19$m=65536,t=4,p=1$OVBqN0tiMGI3T1p1UEpNaw$y0h61xOrKtCokO/HvvG2yj/ZpawhMjjJuJDf7f0L1bs', 'tenarindia@gmail.com', NULL, '1987-10-13', 'ROLE_ADMIN', 0, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_user_FK` (`user_id`),
  ADD KEY `message_topic0_FK` (`topic_id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_user_FK` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_topic0_FK` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`),
  ADD CONSTRAINT `message_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
