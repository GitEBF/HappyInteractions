-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 18 Septembre 2023 à 17:05
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `happyinteractions`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `activity` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `idDepartement` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  FOREIGN KEY (idDepartement) REFERENCES departement (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `worker` (
  `idActivity` int(11) NOT NULL,
  `emotion` int,
  FOREIGN KEY (idActivity) REFERENCES activity (id),
  CONSTRAINT CHK_matemanger CHECK (emotion>=0 AND emotion<=100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `visitor` (
  `idActivity` int(11) NOT NULL,
  `emotion` int,
  FOREIGN KEY (idActivity) REFERENCES activity (id),
  CONSTRAINT CHK_matemanger CHECK (emotion>=0 AND emotion<=100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `user` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `departement` (`id`, `name`) VALUES
(1, 'Informatique');

INSERT INTO `activity` (`id`, `name`, `date`, `idDepartement`, `description`) VALUES
(1, 'Pizza party', '2023-09-30', 1, 'on mange dla pizza toute le kit');

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'etijay', 'bebou');