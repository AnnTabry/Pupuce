-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 06 août 2018 à 09:20
-- Version du serveur :  5.7.23-0ubuntu0.18.04.1
-- Version de PHP :  7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pupuce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Jeux & accesoires'),
(2, 'Toilettage'),
(3, 'Medicaments'),
(7, 'Nourriture');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `clients_id` int(11) NOT NULL,
  `clients_firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `clients_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `clients_mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `clients_psw` varchar(255) COLLATE utf8_bin NOT NULL,
  `clients_adresse` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `clients_cp` int(11) DEFAULT NULL,
  `clients_ville` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `clients_date_anniversaire` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `clients_date_creation` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`clients_id`, `clients_firstname`, `clients_name`, `clients_mail`, `clients_psw`, `clients_adresse`, `clients_cp`, `clients_ville`, `clients_date_anniversaire`, `clients_date_creation`) VALUES
(1, 'franck', 'barland', 'franck@gmail.com', 'sonmotdepasse', '', 0, '', '', '2018-08-03 13:26:32'),
(2, 'nicolas', 'pietri', 'nicolaspietri@gmail.com', 'motmotdepasse', '', 0, '', '', '2018-08-03 13:26:32'),
(3, 'nicolas', 'pietri', 'nicolaspietri@gmail.com', 'motmotdepasse', '', 0, '', '', '2018-08-03 13:26:32'),
(4, 'nicolas', 'pietri', 'nicolaspietri@gmail.com', 'motmotdepasse', '', 0, '', '', '2018-08-03 13:26:32'),
(5, 'fdgdg', 'fge', 'fdrge@dfghert.gfthjd', '', '', 0, '', '', '2018-08-03 13:26:32'),
(6, 'fdgdg', 'fge', 'fdrge@dfghert.gfthjd', 'frgre', '', 0, '', '', '2018-08-03 13:26:32'),
(7, 'fdgdg', 'fge', 'fdrge@dfghert.gfthjd', 'frgre', '', 0, '', '', '2018-08-03 13:26:32'),
(8, 'fdgdg', 'fge', 'fdrge@dfghert.gfthjd', 'frgre', '', 0, '', '', '2018-08-03 13:26:32'),
(9, 'fdgdg', 'fge', 'fdrge@dfghert.gfthjd', 'frgre', '', 0, '', '', '2018-08-03 13:26:32'),
(10, 'fdgdg', 'fge', 'fdrge@dfghert.gfthjd', 'frgre', '', 0, '', '', '2018-08-03 13:26:32'),
(11, 'anna', 'sciksba', 'anna@gmail.com', 'motmotmotdepasse', '', 0, '', '', '2018-08-03 13:26:32'),
(12, 'Anne', 'TABRY', 'annetabry@gmail.com', 'fdhsdfhshfsgdhsfd', '', 0, '', '', '2018-08-03 13:26:32'),
(13, '', '', '', '', '', 0, '', '', '2018-08-03 13:26:32'),
(14, 'admin', 'admin', 'admin@admin', 'admin', '', 0, '', '', '2018-08-03 13:26:32'),
(15, 'test inscription', 'test inscription', 'test@inscription', 'test inscription', '', 0, '', '', '2018-08-03 13:26:32'),
(16, 'test inscription', 'test inscription', 'test@inscription.com', 'test inscription', '', 0, '', '', '2018-08-03 13:26:32'),
(17, 'test', 'test', 'test@test.test', 'test', NULL, NULL, NULL, NULL, NULL),
(18, 'Joseph', 'Tabry', 'jj@tab.com', 'coucou', NULL, NULL, NULL, NULL, NULL),
(19, 'Mary', 'Poppins', 'mary@poppins.com', 'marypoppins', NULL, NULL, NULL, NULL, NULL),
(20, 'elvis', 'presley', 'elvis@presley.com', 'elvispresley', NULL, NULL, NULL, NULL, NULL),
(21, 'pedro', 'almadovar', 'pedro@almadovar.com', '$2y$10$z4XiK5FKiLcwGxjro5r26uveoemRjzxxN3LpXfm9Gjmsr/o388JF6', NULL, NULL, NULL, NULL, NULL),
(22, 'Javier', 'Bardem', 'javier@bardem.com', '$2y$10$WXJVfo2tgozOPxWJ0k50qOmR9bwzZAYyUImLsMmVlaUMKcbzcBhGy', NULL, NULL, NULL, NULL, NULL),
(23, 'pupuce', 'pupuce', 'pupuce@pupuce.com', '$2y$10$Q82lYvD..52iFtXX8hu.d.UV8Gk/1JlAJvJoVezSAWkVIeYfjiO6y', NULL, NULL, NULL, NULL, NULL),
(24, 'MINOU', 'MINOU', 'MINOU@MINOU.COM', '$2y$10$ZtTTqL/SJcWwq8zEyfDZ6OQjUb81dDQc79S8OLMpcNz6eMLWor9/S', NULL, NULL, NULL, NULL, NULL),
(25, 'chien', 'chat', 'chien@chat.com', '$2y$10$KWfMQnW14OmARdnn/SqVFe/ri.075P7xlf405evKpSLnToxSqB13m', NULL, NULL, NULL, NULL, NULL),
(26, 'celine', 'camy', 'celine@camy.com', '$2y$10$FGYF.JCE8S.xYHS9jsED0uTZLY7uNBacMZSEFe/KyWG74kIDRH5ZW', NULL, NULL, NULL, NULL, NULL),
(27, 'luc', 'sky', 'luc@sky', '$2y$10$ItCAa6faOIoD.HpytuknkeMCWs4cqJA9auBCLJSD/v8zrGLctlLwm', NULL, NULL, NULL, NULL, NULL),
(28, 'luc', 'sky', 'luc@sky.com', '$2y$10$Gw9DxDb.OOX4qi65L2jeJ.cCuKghVip1T6BI1gZAaJgJVysX/YdEi', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `commandeId` int(11) NOT NULL,
  `commandeNumCommande` int(11) NOT NULL,
  `commandeDateCommande` datetime NOT NULL,
  `commandeDateLivraison` datetime NOT NULL,
  `commandeNumPanier` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `fournisseur_nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `fournisseur_prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `fournisseur_mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `fournisseur_adresse` varchar(255) COLLATE utf8_bin NOT NULL,
  `fournisseur_cp` int(11) NOT NULL,
  `fournisseur_ville` varchar(255) COLLATE utf8_bin NOT NULL,
  `fournisseur_date_naissance` date NOT NULL,
  `fournisseur_code_comptable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `fournisseur_nom`, `fournisseur_prenom`, `fournisseur_mail`, `fournisseur_adresse`, `fournisseur_cp`, `fournisseur_ville`, `fournisseur_date_naissance`, `fournisseur_code_comptable`) VALUES
(1, 'test', 'test', 'test', 'test', 22222, 'test', '2018-08-04', 2222),
(2, 'Mon', 'fournisseur', '@', 'depuis mon crud', 6400, 'Canees', '2018-01-01', 1234),
(3, 'ok', 'crud', '@', 'crud', 99999, 'Cannes', '2000-02-02', 987),
(4, '111111', '11111111', '111111', '1111111', 111111111, '11111111', '2000-02-02', 111111111),
(5, 'vfbdsxbsgd', 'fvgbdsgbfsd', 'fbgvsdbgsdvbfs', 'fbvfdsbvgdsvb', 0, 'fbgvsdvgbfsdv', '2018-08-04', 0),
(6, 'dfbhjq', 'vkj;jvk', 'vhjvkhv', 'vjvkvk', 6787, 'vjkvk', '1899-11-11', 18796),
(7, 'Ã§a marche', 'seulement', '@', 'si on met', 54555, 'des valeurs valides partout !!!', '1888-06-06', 56565656),
(8, 'VALEURS', 'VALIDES', '@', 'DANS TOUS LES CHAMPS', 88888, 'SURTOUT NAISSANCE', '1897-04-04', 123456789),
(9, 'Monsieur', 'le Fournisseur', 'mail@mail.com', 'hvgbfkjhfvgbkhfk', 54555, 'JHGFVKFK', '1999-02-04', 3456),
(10, 'allez', 'allez', '@', '@', 1, '@', '2000-01-09', 1),
(11, 'super', 'super', '@', '@', 22, '@', '1900-01-01', 22);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `price` float NOT NULL,
  `image` text CHARACTER SET latin1 NOT NULL,
  `category` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `category`, `quantity`, `code`) VALUES
(34, 'Balle pour chiens', 'Jouet pour petits ou gros chiens', 9.99, 'rogz-grinz-baballe-amusante-pour-chien.jpg', 1, 0, 'gfjf45'),
(39, 'MÃ©doc', 'smecta', 4.99, 'smecta_chien_et_traitement_diarrhee_chien_900.jpg', 3, 0, '57GJF'),
(40, 'Jouet sonore', 'Pour tous type de toutous', 3.5, 'choisir-jouet-chien.jpg', 1, 0, '8654HH'),
(41, 'Petite voiture', 'Convient aux animaux de petite taille', 29, '7976401-minuscules-brun-et-blanc-chihuahua-puppy-assis-dans-une-voiture-de-sport-jouet-convertibles-rose-iso.jpg', 1, 0, 'HFJ6543'),
(42, 'Medoc pour chat', 'super efficace !!!', 9.99, 'Frontline-Combo-300x300.jpg', 3, 0, '3256CJGJ?NF'),
(43, 'ensemble de toilettage', 'pour un toutou tout propre', 15, 'mainImage-main-9418458.jpg', 2, 0, 'çà67869VFFXF'),
(44, 'Shampoings animaux', 'Toute une gamme de shampoings selon le type de poil de votre animal favori &lt;3', 7.99, '7084180-2161-thickbox.jpg', 2, 0, '&é\'(sdg577754'),
(45, 'Kit de brossage des dents', 'efficacitÃ© prouvÃ© ! votre animal vous remerciera ;)', 7.99, 'Wp8GT-2HjzoFfsBTJ2S5u48Kzd0.jpg', 2, 0, 'GFY45TFRTF'),
(47, 'Skateboard', 'Les toutous en raffolent, le tester c\'est l\'adopter !', 14.99, '4f4f8df23b4f3486359b8f54c35937c1.jpg', 1, 0, 'M9765C5&&Z'),
(48, 'Nourriture pour lapin nain', 'les lapins en rafolent :)', 9.99, '0b4ef18ea78947d18234a52300df44c8-Medium.jpg', 7, 0, 'HGFCJUYR584é'),
(49, 'Piscine pour chien', 'Pensez Ã  lui cet Ã©tÃ© !!', 60, 'Bone-Shaped-Dog-Pool-e1518688306304.jpg', 1, 0, '0000VGHFCJ'),
(50, 'Aliment pour chinchillas', 'Nourriture complÃ¨te', 11.5, 'aliments-complets-pour-chinchillas.jpg.png', 7, 0, 'VUYG780//9'),
(52, 'Niche pour chien ou chat', 'Niche trÃ¨s originale parfaite pour petits animaux', 75, 'niche-pour-chien-8.jpg', 1, 0, '/?.N?UJG6'),
(53, 'Collerette', 'pour chat ou chien', 20, '61+4vP9qTJL._SX466_.jpg', 3, 0, '.?NB.I7'),
(55, 'Collier lumineux', 'Ne perdez pas de vue votre compagnon !', 22, '65a1bc45b4e2db6827f06b400089d216.jpg', 1, NULL, 'FYJT654FB'),
(56, 'dÃ©guisement pour chien', 'bientÃ´t carnaval ? n\'oubliez pas mÃ©dor ;)', 25, 't-shirt-superman-pour-chien.jpg', 1, NULL, '5468799090');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `clientId` int(11) NOT NULL,
  `produitId` int(11) NOT NULL,
  `panierNumPanier` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit_fournisseur`
--

CREATE TABLE `produit_fournisseur` (
  `fournisseur_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `users_login` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `users_psw` varchar(255) COLLATE utf8_bin NOT NULL,
  `users_adresse` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `users_cp` int(11) DEFAULT NULL,
  `users_ville` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `users_date_naissance` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `users_num_secu` int(11) DEFAULT NULL,
  `users_fonction` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `users_salaire` int(11) DEFAULT NULL,
  `users_email` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_login`, `users_psw`, `users_adresse`, `users_cp`, `users_ville`, `users_date_naissance`, `users_num_secu`, `users_fonction`, `users_salaire`, `users_email`) VALUES
(1, 'Lucie', 'login', 'motdepasse', '', 0, '', '', 0, '', 0, ''),
(2, 'Anne', 'login', 'password', '', 0, '', '', 0, '', 0, ''),
(3, 'root', 'login', 'admin', '', 0, '', '', 0, '', 0, ''),
(5, 'admin', 'admin', 'admin', 'admin', 6400, 'Cannes', '1984-03-16', 27, 'ADMIN', 4566, ''),
(6, 'Mickey Mouse', NULL, '4d5257e5acc7fcac2f5dcd66c4e78f9a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mickey@mouse.com'),
(7, 'coco rico', NULL, '46f7ba77c5a61f0f795383235de56a66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'coco@rico');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clients_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`commandeId`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD KEY `fk_client_clientId` (`clientId`),
  ADD KEY `fk_produit_produitId` (`produitId`);

--
-- Index pour la table `produit_fournisseur`
--
ALTER TABLE `produit_fournisseur`
  ADD KEY `fournisseurID` (`fournisseur_id`),
  ADD KEY `produitID` (`produit_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `clients_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `commandeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit_fournisseur`
--
ALTER TABLE `produit_fournisseur`
  ADD CONSTRAINT `produit_fournisseur_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
