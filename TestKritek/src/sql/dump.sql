-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 avril 2022 à 09:03
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kritik`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220301183806', '2022-03-01 19:38:19', 461),
('DoctrineMigrations\\Version20220301184439', '2022-03-01 19:44:45', 1639);

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_date`, `invoice_number`, `customer_id`) VALUES
(1, '2017-01-01', 1, 1),
(2, '2017-01-01', 1, 1),
(3, '2017-01-01', 7, 1),
(4, '2017-01-01', 1, 1),
(5, '2017-01-01', 5, 1),
(6, '2017-01-01', 6, 1),
(7, '2017-01-01', 7, 1),
(8, '2017-01-01', 8, 1),
(9, '2017-01-01', 9, 1),
(12, '2017-01-01', 10, 1),
(13, '2017-01-01', 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `invoiceLines`
--

CREATE TABLE `invoice_lines` (
  `id` int(11) NOT NULL,
  `invoice_id_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `vatamount` decimal(10,2) DEFAULT NULL,
  `total_with_vat` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoiceLines`
--

INSERT INTO `invoice_lines` (`id`, `invoice_id_id`, `description`, `quantity`, `amount`, `vatamount`, `total_with_vat`) VALUES
(1, NULL, 'f', 1, '1.00', '1.00', '100.00'),
(2, 2, 'f', 1, '1.00', '1.00', '100.00'),
(3, 3, 'test', 1, '1000.00', '12.70', '1000.00'),
(4, NULL, 'boest', 2, '4000.00', '1.00', '400.00'),
(5, 4, 'test', 1, '200.00', NULL, '236.00'),
(6, 4, 'toto', 2, '1000.00', NULL, '2360.00'),
(7, 5, 'test', 1, '200.00', '36.00', '236.00'),
(8, 6, 'test', 1, '200.00', '36.00', '236.00'),
(9, 7, 'test', 1, '200.00', '36.00', '236.00'),
(10, 8, 'test', 1, '200.00', '36.00', '236.00'),
(11, 9, 'test', 1, '200.00', '36.00', '236.00'),
(12, 12, 'test', 1, '200.00', '36.00', '236.00'),
(13, 13, 'deee', 1, '465.00', '83.70', '548.70'),
(14, 13, 'gggg', 8, '9.00', '12.96', '84.96');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoicelines`
--
ALTER TABLE `invoice_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6E0696C0EED8DFC8` (`invoice_id_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `invoceLines`
--
ALTER TABLE `invoice_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `invoiceLines`
--
ALTER TABLE `invoice_lines`
  ADD CONSTRAINT `FK_6E0696C0EED8DFC8` FOREIGN KEY (`invoice_id_id`) REFERENCES `invoice` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
