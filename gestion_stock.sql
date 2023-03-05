-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2022 at 06:26 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `appro`
--

DROP TABLE IF EXISTS `appro`;
CREATE TABLE IF NOT EXISTS `appro` (
  `ida` int(50) NOT NULL AUTO_INCREMENT,
  `datea` date NOT NULL,
  `idf` int(50) NOT NULL,
  PRIMARY KEY (`ida`),
  KEY `idf` (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appro`
--

INSERT INTO `appro` (`ida`, `datea`, `idf`) VALUES
(1, '2022-01-01', 3),
(2, '2021-08-04', 2),
(3, '2022-01-04', 1),
(4, '2022-01-09', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomcat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nomcat`) VALUES
(1, 'Photographie'),
(2, 'Audio Et VidÃ©o'),
(3, 'PiÃ¨ces Ordinateur '),
(4, 'Jeux vidÃ©o '),
(5, 'Montres connectÃ©es ');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cin`, `nom`, `prenom`, `email`, `tel`, `adress`) VALUES
('H18571', 'SABRI', 'Nabil', 'nabil04@yahoo.com', '0658471263', 'RABII,QU SALAM,SAFI'),
('J54782', 'DAHBI', 'Kamal', 'kamaldhb@gmail.com', '0654782136', '46,QU SIDI BOUZID,SAFI'),
('N4758', 'CHOUKRI', 'Manal', 'manal58@gmail.com', '0645871263', 'QU FATH, LOTS B, RABAT'),
('SH17898', 'ZAKI', 'Jamal', 'jamal.zk@gmail.com', '0628547136', 'RUE 7, QU FARAH SAFI');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idc` int(50) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cin` varchar(50) NOT NULL,
  PRIMARY KEY (`idc`),
  KEY `cin` (`cin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idc`, `date`, `cin`) VALUES
(1, '2021-12-14', 'H18571'),
(2, '2020-05-07', 'J54782'),
(3, '2021-05-08', 'N4758'),
(4, '2021-12-04', 'SH17898');

-- --------------------------------------------------------

--
-- Table structure for table `details_appro`
--

DROP TABLE IF EXISTS `details_appro`;
CREATE TABLE IF NOT EXISTS `details_appro` (
  `ida_details` int(50) NOT NULL AUTO_INCREMENT,
  `ida` int(50) NOT NULL,
  `refp` int(50) NOT NULL,
  `qtea_produit` int(50) NOT NULL,
  PRIMARY KEY (`ida_details`),
  KEY `ida` (`ida`),
  KEY `details_appro_ibfk_2` (`refp`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details_appro`
--

INSERT INTO `details_appro` (`ida_details`, `ida`, `refp`, `qtea_produit`) VALUES
(1, 1, 1, 5),
(2, 3, 1, 20),
(3, 2, 4, 20),
(4, 2, 1, 10),
(5, 4, 2, 40),
(6, 4, 5, 100),
(7, 3, 10, 5),
(8, 3, 9, 2),
(9, 3, 11, 20);

-- --------------------------------------------------------

--
-- Table structure for table `details_commande`
--

DROP TABLE IF EXISTS `details_commande`;
CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_detail` int(50) NOT NULL AUTO_INCREMENT,
  `idc` int(50) NOT NULL,
  `refp` int(50) NOT NULL,
  `qte_produit` int(50) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `idc` (`idc`),
  KEY `details_commande_ibfk_2` (`refp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details_commande`
--

INSERT INTO `details_commande` (`id_detail`, `idc`, `refp`, `qte_produit`) VALUES
(1, 1, 1, 2),
(2, 1, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `idf` int(50) NOT NULL AUTO_INCREMENT,
  `nomf` varchar(50) NOT NULL,
  `num` varchar(50) NOT NULL,
  `emailf` varchar(60) NOT NULL,
  `adressf` varchar(100) NOT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`idf`, `nomf`, `num`, `emailf`, `adressf`) VALUES
(1, ' RS Components', '0625874139 ', 'rscompent7458@gmail.com ', 'depot n07,industriel,casablanca '),
(2, ' Mouser Electronics ', '0698745215  ', 'mouserele@yahoo.com  ', 'depot n07,industriel,casablanca  '),
(3, 'Digi-Key ', '0685474395 ', 'digitalelectornics@gmail.com ', 'depot n10,zahr,Tanger '),
(4, 'ELECTO CONFIGS', '0622584139', 'electroghrt@outlook.com', '12, QU SALAM, SAFI');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `refp` int(50) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prixu` int(50) NOT NULL,
  `stock` int(50) NOT NULL,
  `prixv` int(50) NOT NULL,
  `id` int(50) NOT NULL,
  PRIMARY KEY (`refp`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`refp`, `libelle`, `image`, `prixu`, `stock`, `prixv`, `id`) VALUES
(1, 'Drone 4K SIGHT X5S', 'drone.jpg', 600, 33, 1400, 1),
(2, 'CamÃ©ra sport GOPRO Hero10', 'gopro.jpg', 4000, 40, 5200, 1),
(3, 'CamÃ©ra GOPRO Hero10', 's-l1600.jpg', 800, 0, 1500, 1),
(4, 'Ã‰couteurs JBL C330', 's-l1600 (1).jpg', 250, 10, 400, 2),
(5, 'BT Studio 3 Wireless ', 'casque.jpg', 150, 100, 250, 2),
(6, 'Anker Soundcore 2', 'anker.jpg', 450, 0, 680, 2),
(7, ' AEROCOOL Boitier PC', 'pc.jpg', 500, 0, 620, 3),
(8, 'ASUS GeForce RTX 2060 ', 'gtx.jpg', 5500, 0, 6800, 3),
(9, 'Intel Core i9-9900KF', 'cpui9.jpg', 4500, 2, 5800, 3),
(10, 'Sony Playstation 5', 'ps5.jpg', 9000, 5, 12999, 4),
(11, 'Huawei Amazfit Stratos SmartWatch', 'amazf.jpg', 800, 20, 1499, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`) VALUES
(1, 'aya', '1234'),
(2, 'admin', '1234'),
(3, 'safiotmarket@gmail.com', '12345678');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appro`
--
ALTER TABLE `appro`
  ADD CONSTRAINT `appro_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `fournisseur` (`idf`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `client` (`cin`);

--
-- Constraints for table `details_appro`
--
ALTER TABLE `details_appro`
  ADD CONSTRAINT `details_appro_ibfk_1` FOREIGN KEY (`ida`) REFERENCES `appro` (`ida`),
  ADD CONSTRAINT `details_appro_ibfk_2` FOREIGN KEY (`refp`) REFERENCES `produit` (`refp`);

--
-- Constraints for table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`idc`) REFERENCES `commande` (`idc`),
  ADD CONSTRAINT `details_commande_ibfk_2` FOREIGN KEY (`refp`) REFERENCES `produit` (`refp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
