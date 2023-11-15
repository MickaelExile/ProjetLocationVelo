-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 28 avr. 2021 à 10:16
-- Version du serveur :  10.3.25-MariaDB-0+deb10u1
-- Version de PHP : 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Database_SLAM`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `numA` int(3) NOT NULL,
  `nomA` varchar(50) NOT NULL,
  `prenomA` varchar(50) NOT NULL,
  `adresseRueA` varchar(50) NOT NULL,
  `cpA` int(6) NOT NULL,
  `villeA` varchar(50) NOT NULL,
  `telA` varchar(14) NOT NULL,
  `loginA` varchar(50) NOT NULL,
  `pieceIDA` tinyint(1) NOT NULL,
  `mdpA` varchar(50) NOT NULL,
  `cautionA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`numA`, `nomA`, `prenomA`, `adresseRueA`, `cpA`, `villeA`, `telA`, `loginA`, `pieceIDA`, `mdpA`, `cautionA`) VALUES
(2, 'PICHARD', 'Antoine', '2 place de la Mairie', 22440, 'PLOUFRAGAN', '06/76/87/99/06', 'pichard', 0, 'antoine', 0),
(4, 'GUERRAND', 'Emilie', '23B rue de la croix verte', 22000, 'Saint Brieuc', '06/90/23/43/11', 'guerrand', 0, 'emilie', 0),
(5, 'ZACH', 'Jules', '3 place de la Nourrigue', 22222, 'KERDIREC', '02/22/23/55/33', 'zach', 0, 'zach', 0);

-- --------------------------------------------------------

--
-- Structure de la table `borne`
--

CREATE TABLE `borne` (
  `codeB` int(3) NOT NULL,
  `nomB` varchar(20) NOT NULL,
  `numRueB` int(2) DEFAULT NULL,
  `nomrueB` varchar(50) NOT NULL,
  `latitudeB` varchar(50) NOT NULL,
  `longitudeB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `borne`
--

INSERT INTO `borne` (`codeB`, `nomB`, `numRueB`, `nomrueB`, `latitudeB`, `longitudeB`) VALUES
(1, 'Bretagne', 5, 'Avenue de Bretagne', '38.4313 ', '-6.81484'),
(2, 'Mairie', 22, 'rue de la Mairie', '65.8324', '-1.95484'),
(3, 'Leclerc', 34, 'Centre commercial du Carpont', '72.9422', '-7.81484'),
(4, 'Eglise', 4, 'place de léglise', '21.3412', '-2.43214'),
(5, 'Complexe Sportif', 13, 'rue de Merlet', '44.1234', '-9.11284');

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

CREATE TABLE `louer` (
  `numV` int(11) NOT NULL,
  `numA` int(11) NOT NULL,
  `dateheureLoc` datetime NOT NULL,
  `dateheureDep` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`numV`, `numA`, `dateheureLoc`, `dateheureDep`) VALUES
(2, 2, '2020-11-24 15:04:00', '2020-11-24 15:08:00'),
(6, 2, '2020-11-24 15:09:00', '2020-11-24 15:10:00'),
(7, 5, '2020-10-01 12:12:00', '2020-11-01 19:12:00'),
(8, 2, '2020-10-01 12:12:00', '2020-11-01 19:12:00'),
(10, 5, '2020-10-01 12:12:00', '2020-11-01 19:12:00'),
(11, 5, '2020-11-22 03:53:00', '2020-11-01 19:12:00');

-- --------------------------------------------------------

--
-- Structure de la table `reparer`
--

CREATE TABLE `reparer` (
  `numV` int(11) NOT NULL,
  `idT` int(11) NOT NULL,
  `dateR` date NOT NULL,
  `tempsR` time NOT NULL,
  `idU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reparer`
--

INSERT INTO `reparer` (`numV`, `idT`, `dateR`, `tempsR`, `idU`) VALUES
(1, 1, '2020-11-03', '19:48:54', 1),
(9, 1, '2020-11-24', '21:47:19', 2);

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

CREATE TABLE `travaux` (
  `idT` int(11) NOT NULL,
  `libelleT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `travaux`
--

INSERT INTO `travaux` (`idT`, `libelleT`) VALUES
(1, 'changer la chaine'),
(2, 'Redresser le guidon');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `loginUser` varchar(50) NOT NULL,
  `mdpUser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `loginUser`, `mdpUser`) VALUES
(1, 'admin', 'admin'),
(2, 'a2', 'a2'),
(3, 'mick', 'azertyQWERTY9');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `numV` int(11) NOT NULL,
  `etatV` char(1) NOT NULL DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table vehicule contenant tous les véhicules';

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`numV`, `etatV`) VALUES
(1, 'D'),
(2, 'D'),
(3, 'D'),
(4, 'D'),
(5, 'D'),
(6, 'D'),
(7, 'D'),
(8, 'D'),
(9, 'R'),
(10, 'D'),
(11, 'L');

-- --------------------------------------------------------

--
-- Structure de la table `velo`
--

CREATE TABLE `velo` (
  `numV` int(11) NOT NULL,
  `latitudeV` float NOT NULL,
  `longitudeV` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table vélo contenant que les vélos classiques';

--
-- Déchargement des données de la table `velo`
--

INSERT INTO `velo` (`numV`, `latitudeV`, `longitudeV`) VALUES
(1, 54.2903, 123.321),
(2, 15.533, 12.543),
(8, -13.0293, 78.9822),
(9, 48.4937, -2.80056),
(10, -13.0293, 78.9822),
(11, 48.4872, -2.80078);

-- --------------------------------------------------------

--
-- Structure de la table `veloelectrique`
--

CREATE TABLE `veloelectrique` (
  `numV` int(11) NOT NULL,
  `codeB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table contenant que les vélos électriques';

--
-- Déchargement des données de la table `veloelectrique`
--

INSERT INTO `veloelectrique` (`numV`, `codeB`) VALUES
(5, 3),
(3, 4),
(7, 4),
(4, 5),
(6, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`numA`),
  ADD UNIQUE KEY `UNIQUElogin` (`loginA`) USING BTREE;

--
-- Index pour la table `borne`
--
ALTER TABLE `borne`
  ADD PRIMARY KEY (`codeB`),
  ADD UNIQUE KEY `nomUnique` (`nomB`);

--
-- Index pour la table `louer`
--
ALTER TABLE `louer`
  ADD PRIMARY KEY (`numV`,`numA`,`dateheureLoc`),
  ADD KEY `fk_numV` (`numV`) USING BTREE,
  ADD KEY `fk_numA` (`numA`) USING BTREE;

--
-- Index pour la table `reparer`
--
ALTER TABLE `reparer`
  ADD PRIMARY KEY (`numV`,`idT`,`dateR`),
  ADD KEY `idU` (`idU`),
  ADD KEY `idT` (`idT`);

--
-- Index pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD PRIMARY KEY (`idT`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`numV`);

--
-- Index pour la table `velo`
--
ALTER TABLE `velo`
  ADD PRIMARY KEY (`numV`);

--
-- Index pour la table `veloelectrique`
--
ALTER TABLE `veloelectrique`
  ADD PRIMARY KEY (`numV`),
  ADD KEY `lientableBorne` (`codeB`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `numA` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `borne`
--
ALTER TABLE `borne`
  MODIFY `codeB` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `idT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `numV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `louer_ibfk_numA` FOREIGN KEY (`numA`) REFERENCES `adherent` (`numA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `louer_ibfk_numV` FOREIGN KEY (`numV`) REFERENCES `vehicule` (`numV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reparer`
--
ALTER TABLE `reparer`
  ADD CONSTRAINT `reparer_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparer_ibfk_2` FOREIGN KEY (`numV`) REFERENCES `vehicule` (`numV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparer_ibfk_3` FOREIGN KEY (`idT`) REFERENCES `travaux` (`idT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `velo`
--
ALTER TABLE `velo`
  ADD CONSTRAINT `HéritageVéloVéhicule` FOREIGN KEY (`numV`) REFERENCES `vehicule` (`numV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `velo_ibfk_1` FOREIGN KEY (`numV`) REFERENCES `vehicule` (`numV`);

--
-- Contraintes pour la table `veloelectrique`
--
ALTER TABLE `veloelectrique`
  ADD CONSTRAINT `HeritageveloElectriqueVehicule` FOREIGN KEY (`numV`) REFERENCES `vehicule` (`numV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `veloelectrique_ibfk_1` FOREIGN KEY (`codeB`) REFERENCES `borne` (`codeB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
