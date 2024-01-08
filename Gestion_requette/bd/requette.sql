-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 jan. 2024 à 11:46
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `requette`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(12) NOT NULL,
  `nom_enseignant` varchar(255) DEFAULT NULL,
  `email_enseignant` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `privilege` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom_enseignant`, `email_enseignant`, `mdp`, `privilege`) VALUES
(1, 'moyou brice ', 'moyou@univ.com', 'DI+^lpLP', 0),
(2, 'prof de bd system', 'bdsystem@univ.com', '5678', 0),
(3, 'Catcha', 'catcha@univ.com', 'abcd', 0),
(4, 'Valery', 'valery@univ.com', 'efgh', 0),
(5, 'prof de secu', 'secu@univ.com', 'ijkl', 0),
(6, 'Aboubacar Bouki', 'boukiBoucar@univ.com', 'mnop', 0),
(7, 'prof d\'anglais', 'anglais@gmail.com', 'eng', 0),
(8, 'prof de francais', 'profdefrancais@gmail.com', 'fran', 0),
(9, 'prof de reseau', 'reseau@gmail.com', 'reseau', 0),
(10, 'testeur', 'testeur@gmail.com', 'testeur2.0', 1),
(20, 'Russel Lontsi Sonwa', 'russelsonwa1@gmail.com', '6rEYYdiQ', 0),
(21, 'KOUNTCHOU LEA ', 'kountchoulea00@gmail.com', 'DK61sgoo', 0),
(22, 'qsdqsdsq', 'qsdqs@gmail.com', 'kBjzuphv', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_Etudiant` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `matricule_Etudiant` varchar(9) DEFAULT NULL,
  `email_Etudiant` varchar(255) DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `niveau` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_Etudiant`, `nom`, `matricule_Etudiant`, `email_Etudiant`, `id_filiere`, `mdp`, `niveau`) VALUES
(1, 'Itoshi Rin', 'E001', 'e001@univ.com', 1, 'qwer', 2),
(2, 'sasuke uchiwa', 'E002', 'e002@univ.com', 1, 'tyui', 2),
(3, 'naruto uzumaki', 'E003', 'e003@univ.com', 1, 'asdf', 2),
(4, 'Lontsi Sonwa Russel', 'E004', 'e004@univ.com', 1, 'ghjk', 2),
(5, 'King bradley', 'E005', 'e005@univ.com', 1, 'zxcv', 2),
(6, 'man of black', 'E006', 'e006@univ.com', 1, 'bnm', 2),
(7, 'Eterias natsu dragneel', '21k2348', 'dragnellsonwa@gmail.com', 1, 'Testeur2.0', 2),
(11, 'qsqdqs', '21Q2439', 'qsdqs@gmail.com', 1, 'aaa', 2),
(12, 'King_Bradley', '22V2254', 'testeur@gmail.co', 1, 'Testeur2.0', 2),
(13, 'aaaa', '22V2374', 'russelsonwa1@gmail.com', 1, 'Katon2.0', 2),
(14, 'Geek', '23D3467', 'geek@geek.com', 1, 'geek123A', 2),
(15, 'Migos', '22V2329', 'migos@gmail.com', 1, 'M1migosmigos', 2),
(16, 'All1', '72Q6177', 'igornguegang9@gmail.com', 1, 'Lapero50', 2),
(17, 'Elsa', '22V2335', 'elsamafang75@gmail.com', 1, '202020Valiente', 2),
(18, 'Sophie', '21Q2519', 'sophia.mba@yahoo.com', 1, 'Sophia1*', 2),
(19, 'sdqsdqs', '22A2254', 'russelsonwa2@gmail.com', 1, 'Katon2.0', 2),
(20, 'kountchou', '22V2278', 'kountchoulea@gmail.com', 1, 'Mecute4life', 2),
(21, 'pergo', '21Q2436', 'atlantic@gmail.com', 1, 'Pergo123@@', 3),
(22, 'Mika', '21R2301', 'mbachristian58@gmail.com', 1, 'Mikamba2001**', 2),
(23, 'Sophia', '21Q1925', 'sophiamba@yahoo.com', 1, 'Lune591**', 1),
(24, 'Mba', '21M2519', 'mba@gmail.com', 1, 'Sophiamba1*', 2),
(25, 'Bakoa ', '22V2279', 'testeur@gmail.com', 1, 'Mecute4life', 2),
(26, 'mbebi', '19V1913', 'mbebi@gmail.com', 1, 'M1mbebimbebi', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fiche_de_note`
--

CREATE TABLE `fiche_de_note` (
  `id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `id_ue` int(11) DEFAULT NULL,
  `date_de_publication` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fiche_de_note`
--

INSERT INTO `fiche_de_note` (`id`, `src`, `id_ue`, `date_de_publication`) VALUES
(43, '../uploads/ClasseSalaire2.png', 2, '2023-12-29'),
(48, '../uploads/IMG-20231125-WA0007.jpg', NULL, '2024-01-02'),
(50, '../uploads/Capture d’écran 2023-04-12 090431.png', 1, '2024-01-03'),
(51, '../uploads/Capture.PNG', 1, '2024-01-03'),
(52, '../uploads/ic.jpeg', 1, '2024-01-07');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `code_filiere` varchar(10) DEFAULT NULL,
  `libelle_filiere` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `code_filiere`, `libelle_filiere`) VALUES
(1, 'ICT4D', 'Information Communication Technologie for Development'),
(2, 'INFO', 'Informatique fondamentale');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `code_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`code_niveau`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Structure de la table `requette`
--

CREATE TABLE `requette` (
  `id_Requette` int(11) NOT NULL,
  `objet_Requette` varchar(255) DEFAULT NULL,
  `justificatif_Requette` varchar(255) DEFAULT NULL,
  `corps_Requette` text DEFAULT NULL,
  `id_Etudiant` int(11) DEFAULT NULL,
  `id_enseignant` int(11) DEFAULT NULL,
  `id_UE` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '-1, 0, 1(rejeté, en cours, validé)',
  `date_soumission` date DEFAULT current_timestamp(),
  `raison_rejet` varchar(255) DEFAULT NULL COMMENT 'raison de rejet de la req'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `requette`
--

INSERT INTO `requette` (`id_Requette`, `objet_Requette`, `justificatif_Requette`, `corps_Requette`, `id_Etudiant`, `id_enseignant`, `id_UE`, `status`, `date_soumission`, `raison_rejet`) VALUES
(8, 'Pas de note de sn', '../uploads/CodePrincipal.png', 'azzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 7, 1, 1, 1, '2023-12-29', NULL),
(9, 'je veux que tu rejette', '../uploads/CodePrincipal.png', 'xdddddddddddddddddddddddxdxxdxdxdxddxdxxdxdxdxdxdxdxdxdxdxdxdxdxdxdxdxdxdxdxdxdxdxdxd', 7, 1, 1, 1, '2023-12-29', 'Vous etes une merde, c\'est pour ca que j\'ai rejeté'),
(10, 'abscence de note', '..\\uploads\\CodePrincipal.png', 'kjhfsdkjfhslkdjfsdkgskdgksdlgsdfsdfs\r\n\r\n\r\n\r\nfsdfskldglsdfqskfjsdklglsdjgjsdkglsd\r\nazert-yty\r\n\r\n\r\n\r\nsdfsdgdfffffffffffffffffffffffffffffff', 7, 1, 1, 1, '2023-12-29', NULL),
(11, 'Juste un test de fonctionnalité', '..\\uploads\\CodePrincipal.png', 'azzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 7, 1, 1, 1, '2023-12-29', NULL),
(18, 'pas de note des exposés', '../uploads/Capture.PNG', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...(à completer)\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...(à completer)\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 12, 7, 7, 1, '2023-12-30', NULL),
(19, 'pas de note des exposés', '../uploads/Capture.PNG', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...(à completer)\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...(à completer)\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 12, 7, 7, 0, '2023-12-30', NULL),
(20, 'pas de note des exposés', '../uploads/YDE1.png', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...(à completer)\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...(à completer)\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 12, 7, 7, 0, '2023-12-30', NULL),
(23, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(24, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(25, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(26, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(27, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(28, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, -1, '2024-01-02', 'Juste un test'),
(29, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, -1, '2024-01-02', 'test de mofif\r\n'),
(30, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(31, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, -1, '2024-01-02', 'pb de justification '),
(32, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(33, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(34, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(35, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, -1, '2024-01-02', 'trop laid'),
(36, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(37, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(38, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(39, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(40, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(41, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(42, 'demande de rectification des notes', '../uploads/IMG-20231125-WA0007.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 20, 1, 1, 0, '2024-01-02', NULL),
(46, 'moi', '../uploads/photo_2_2023-09-04_12-31-52.jpg', '            Monsieur (ou Madame),\r\n\r\nijiojio\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\njiojiojio\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\njiojioj\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 1, 2, 2, 0, '2024-01-03', NULL),
(47, 'moi', '../uploads/photo_2_2023-09-04_12-31-52.jpg', '            Monsieur (ou Madame),\r\n\r\nijiojio\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\njiojiojio\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\njiojioj\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 1, 2, 2, 0, '2024-01-03', NULL),
(48, 'pas de note des exposés', '../uploads/Capture.PNG', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 1, 2, 2, 0, '2024-01-03', NULL),
(57, 'Demande de baisser le niveau Mr', '../uploads/IMG-20230618-WA0001.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter votre empathie et de svp baisser le niveau c\'est trop high\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, qui ce cherche comme il peut \r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 22, 1, 1, 0, '2024-01-07', NULL),
(58, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(59, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(60, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(61, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(62, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(63, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(64, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(65, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(66, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(67, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(68, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\nhjghfgf\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(69, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\nhjghfgf\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(70, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\nhjghfgf\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(71, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\nhjghfgf\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(72, 'Problem de nom', '../uploads/WhatsApp Image 2023-12-31 at 15.22.33_4346dd43.jpg', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\nhjghfgf\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 24, 1, 1, 0, '2024-01-07', NULL),
(75, 'pas de note des exposés', '../uploads/mcd.PNG', '            Monsieur (ou Madame),\r\n\r\n\r\n\r\n        J\'ai l\'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...\r\n\r\n\r\n\r\n        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...\r\n\r\n\r\n\r\n\r\n\r\n        Dans l\'attente d\'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                \r\n        ', 13, 1, 1, 0, '2024-01-07', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

CREATE TABLE `ue` (
  `id_UE` int(11) NOT NULL,
  `code_UE` varchar(7) NOT NULL,
  `libelle_UE` varchar(255) DEFAULT NULL,
  `code_niveau` int(11) DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `id_enseignant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ue`
--

INSERT INTO `ue` (`id_UE`, `code_UE`, `libelle_UE`, `code_niveau`, `id_filiere`, `id_enseignant`) VALUES
(1, 'ICT201', 'Introduction au  Genie Logiciel', 2, 1, 1),
(2, 'ICT 203', 'BD', 2, 1, 2),
(3, 'ICT 205', '.NET', 2, 1, 3),
(4, 'ICT207', 'Java', 2, 1, 4),
(5, 'ICT213', 'Securite', 2, 1, 5),
(6, 'ICT217', 'GL', 2, 1, 6),
(7, 'ENG213', 'Anglais', 2, 1, 7),
(8, 'FRA213', 'Francais', 2, 1, 8),
(9, 'ICT215', 'Reseau', 2, 1, 9),
(16, 'ICT tes', 'trstst', 2, 1, 20);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_Etudiant`),
  ADD KEY `FK_Etudiant_id_filiere` (`id_filiere`),
  ADD KEY `fk_code_niveau` (`niveau`);

--
-- Index pour la table `fiche_de_note`
--
ALTER TABLE `fiche_de_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ue` (`id_ue`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`code_niveau`);

--
-- Index pour la table `requette`
--
ALTER TABLE `requette`
  ADD PRIMARY KEY (`id_Requette`),
  ADD KEY `FK_requette_id_Etudiant` (`id_Etudiant`),
  ADD KEY `FK_requette_id_enseignant` (`id_enseignant`),
  ADD KEY `FK_requette_id_UE` (`id_UE`);

--
-- Index pour la table `ue`
--
ALTER TABLE `ue`
  ADD PRIMARY KEY (`id_UE`),
  ADD KEY `FK_UE_code_niveau` (`code_niveau`),
  ADD KEY `FK_UE_id_filiere` (`id_filiere`),
  ADD KEY `FK_UE_id_enseignant` (`id_enseignant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_Etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `fiche_de_note`
--
ALTER TABLE `fiche_de_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `code_niveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `requette`
--
ALTER TABLE `requette`
  MODIFY `id_Requette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `ue`
--
ALTER TABLE `ue`
  MODIFY `id_UE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_code_niveau` FOREIGN KEY (`niveau`) REFERENCES `niveau` (`code_niveau`);

--
-- Contraintes pour la table `fiche_de_note`
--
ALTER TABLE `fiche_de_note`
  ADD CONSTRAINT `fiche_de_note_ibfk_1` FOREIGN KEY (`id_ue`) REFERENCES `ue` (`id_UE`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `requette`
--
ALTER TABLE `requette`
  ADD CONSTRAINT `FK_requette_id_Etudiant` FOREIGN KEY (`id_Etudiant`) REFERENCES `etudiant` (`id_Etudiant`),
  ADD CONSTRAINT `FK_requette_id_UE` FOREIGN KEY (`id_UE`) REFERENCES `ue` (`id_UE`),
  ADD CONSTRAINT `FK_requette_id_enseignant` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`);

--
-- Contraintes pour la table `ue`
--
ALTER TABLE `ue`
  ADD CONSTRAINT `FK_UE_code_niveau` FOREIGN KEY (`code_niveau`) REFERENCES `niveau` (`code_niveau`),
  ADD CONSTRAINT `FK_UE_id_enseignant` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_UE_id_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
