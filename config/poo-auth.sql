-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 06 déc. 2023 à 14:07
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `poo-auth`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `status` varchar(15) NOT NULL DEFAULT 'disabled',
  `solde` int(255) NOT NULL DEFAULT 500,
  `second_status` varchar(15) NOT NULL DEFAULT 'disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `is_admin`, `status`, `solde`, `second_status`, `created_at`) VALUES
(13, 'First', 'first', 'first@gmail.com', '$2y$10$PIol6nkT6Phk8PL1G0Pe1.N9cmgVvOYd6jN17kNcOX5MQP2Wrx.P.', 0, 'disabled', 500, 'disabled', '2023-12-06 11:49:15'),
(14, 'Test', 'Tets', 'test@gmail.com', '$2y$10$5Qu7Fw1SiAeNtCtdaWl7KOlAyi8n9uX2ApPoy07f5i5cpObOG/IoS', 0, 'disabled', 500, 'disabled', '2023-12-06 11:49:59'),
(15, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$k6vkQ20GBk7E61ba5nEyC.Lqdnr8c9dWhpFlRUPUrYoW8/ZuGzL6i', 1, 'disabled', 500, 'disabled', '2023-12-06 11:50:29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
