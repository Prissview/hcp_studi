-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 18 avr. 2024 à 10:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hcpstudi`
--

-- --------------------------------------------------------

--
-- Structure de la table `accesoires_de_coiffure`
--

CREATE TABLE `accesoires_de_coiffure` (
  `id_accessoire` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity_needed` int(11) NOT NULL,
  `quantity_available` int(11) NOT NULL,
  `price` float NOT NULL,
  `id_rendezvous` int(11) UNSIGNED NOT NULL,
  `id_typedecoiffure` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `coiffeur`
--

CREATE TABLE `coiffeur` (
  `id_coiffeur` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id_rendezvous` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `appointment_status` varchar(50) NOT NULL,
  `appointment_duration` time NOT NULL,
  `id_client` int(11) UNSIGNED NOT NULL,
  `id_coiffeur` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_de_coiffure`
--

CREATE TABLE `type_de_coiffure` (
  `id_typedecoiffure` int(11) UNSIGNED NOT NULL,
  `hairstyle_1` varchar(255) NOT NULL,
  `hairstyle_2` varchar(255) NOT NULL,
  `hairstyle_3` varchar(255) NOT NULL,
  `hairstyle_4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accesoires_de_coiffure`
--
ALTER TABLE `accesoires_de_coiffure`
  ADD PRIMARY KEY (`id_accessoire`),
  ADD KEY `id_rendezvous` (`id_rendezvous`),
  ADD KEY `id_typedecoiffure` (`id_typedecoiffure`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `coiffeur`
--
ALTER TABLE `coiffeur`
  ADD PRIMARY KEY (`id_coiffeur`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id_rendezvous`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_coiffeur` (`id_coiffeur`);

--
-- Index pour la table `type_de_coiffure`
--
ALTER TABLE `type_de_coiffure`
  ADD PRIMARY KEY (`id_typedecoiffure`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accesoires_de_coiffure`
--
ALTER TABLE `accesoires_de_coiffure`
  MODIFY `id_accessoire` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `coiffeur`
--
ALTER TABLE `coiffeur`
  MODIFY `id_coiffeur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id_rendezvous` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_de_coiffure`
--
ALTER TABLE `type_de_coiffure`
  MODIFY `id_typedecoiffure` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accesoires_de_coiffure`
--
ALTER TABLE `accesoires_de_coiffure`
  ADD CONSTRAINT `accesoires_de_coiffure_ibfk_1` FOREIGN KEY (`id_rendezvous`) REFERENCES `rendez_vous` (`id_rendezvous`),
  ADD CONSTRAINT `accesoires_de_coiffure_ibfk_2` FOREIGN KEY (`id_typedecoiffure`) REFERENCES `type_de_coiffure` (`id_typedecoiffure`);

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `rendez_vous_ibfk_2` FOREIGN KEY (`id_coiffeur`) REFERENCES `coiffeur` (`id_coiffeur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
