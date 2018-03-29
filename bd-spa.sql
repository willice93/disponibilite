-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 29 mars 2018 à 18:56
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd-spa`
--

-- --------------------------------------------------------

--
-- Structure de la table `dateresa`
--

CREATE TABLE `dateresa` (
  `iddate` bigint(20) NOT NULL,
  `jour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dateresa`
--

INSERT INTO `dateresa` (`iddate`, `jour`) VALUES
(1, '2018-03-18'),
(2, '2018-03-30'),
(3, '2018-03-18'),
(4, '2018-03-20');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idreservation` bigint(20) NOT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `numseance` int(1) DEFAULT NULL,
  `iddate` bigint(20) DEFAULT NULL,
  `idusage` bigint(20) DEFAULT NULL,
  `idsalle` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idreservation`, `etat`, `numseance`, `iddate`, `idusage`, `idsalle`) VALUES
(1, 1, 3, 1, 1, 2),
(2, 1, 4, 1, 1, 2),
(3, 1, 1, 2, 1, 3),
(4, 1, 5, 1, 1, 2),
(5, 1, 6, 1, 1, 2),
(6, 1, 2, 4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `idsalle` bigint(20) NOT NULL,
  `numsalle` int(1) DEFAULT NULL,
  `nomsalle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idsalle`, `numsalle`, `nomsalle`) VALUES
(1, 1, 'bora bora'),
(2, 2, 'miami'),
(3, 3, 'phuket');

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE `usager` (
  `idusage` bigint(20) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`idusage`, `nom`, `mail`) VALUES
(1, 'demo', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dateresa`
--
ALTER TABLE `dateresa`
  ADD PRIMARY KEY (`iddate`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idreservation`),
  ADD KEY `FK_reservation_iddate` (`iddate`),
  ADD KEY `FK_reservation_usager_idusage` (`idusage`),
  ADD KEY `FK_reservation_idsalle` (`idsalle`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idsalle`);

--
-- Index pour la table `usager`
--
ALTER TABLE `usager`
  ADD PRIMARY KEY (`idusage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dateresa`
--
ALTER TABLE `dateresa`
  MODIFY `iddate` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idreservation` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idsalle` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `usager`
--
ALTER TABLE `usager`
  MODIFY `idusage` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_reservation_iddate` FOREIGN KEY (`iddate`) REFERENCES `dateresa` (`iddate`),
  ADD CONSTRAINT `FK_reservation_idsalle` FOREIGN KEY (`idsalle`) REFERENCES `salle` (`idsalle`),
  ADD CONSTRAINT `FK_reservation_usager_idusage` FOREIGN KEY (`idusage`) REFERENCES `usager` (`idusage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
