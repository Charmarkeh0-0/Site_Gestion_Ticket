-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2022 at 07:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Site_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `IdTicket` int(11) NOT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Probleme` varchar(256) DEFAULT NULL,
  `ProblemeBool` varchar(3) DEFAULT NULL,
  `Produit` varchar(256) DEFAULT NULL,
  `IdService` int(11) DEFAULT NULL,
  `DateCreation` date DEFAULT NULL,
  `DateDebutProblem` date DEFAULT NULL,
  `ImpactBusiness` longtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `DerniereMaJ` date DEFAULT NULL,
  `IdAgent` int(11) DEFAULT NULL,
  `IdClient` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`IdTicket`, `Status`, `Probleme`, `ProblemeBool`, `Produit`, `IdService`, `DateCreation`, `DateDebutProblem`, `ImpactBusiness`, `Description`, `DerniereMaJ`, `IdAgent`, `IdClient`) VALUES
(10, 'En cours', 'Line or Circuit Bouncing', 'Oui', 'Nas', 91194291, '2022-05-30', '2022-05-04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis ex lorem, nec tincidunt ligula tempus ac. Curabitur dictum ante odio, venenatis placerat tellus imperdiet at. Quisque nisl tortor, ultrices euismod viverra et, feugiat et felis. Proin tristique ullamcorper varius. Sed porta a dolor id gravida. ', 'Ut efficitur urna ut est faucibus, eget consequat arcu pharetra. Curabitur semper enim ac volutpat consectetur. Nulla scelerisque posuere ante, vitae mattis leo elementum vitae. Nam molestie, quam sed interdum fringilla, nisl justo accumsan odio, lacinia dignissim libero metus quis elit.', '2022-05-30', 14, 9),
(11, 'En cours', 'BGP Bouncing or Down', 'Oui', 'Switch', 69561396, '2022-05-30', '2022-05-18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras porta tortor nec sem auctor, id bibendum tellus vehicula. Pellentesque tempor molestie dapibus. Pellentesque nec faucibus est. Curabitur iaculis sapien eget fringilla imperdiet. Pellentesque eu libero libero. Integer at felis arcu. ', 'Nullam dictum iaculis arcu. Fusce a condimentum turpis. Mauris rutrum nisi vel metus fermentum, eu mattis est mattis. Nunc maximus est ac libero finibus consectetur sit amet in enim. Phasellus aliquam vitae purus sit amet laoreet. Sed aliquam hendrerit tortor at pretium. Donec dignissim, nisl fermentum bibendum euismod, mauris enim feugiat dui, ac lacinia quam neque et neque. ', '2022-05-30', 12, 10),
(12, 'En cours', 'Line or Circuit Down', 'Oui', 'Rooter', 24778024, '2022-05-30', '2022-05-19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lobortis tempus laoreet. Proin eget quam consequat orci blandit laoreet a vel libero. ', 'Nullam volutpat porta tincidunt. Vestibulum faucibus pellentesque nulla ut vehicula. Curabitur sed egestas elit. Sed tempus ante non eros laoreet, eget aliquet sapien pulvinar. Aenean lacinia sapien sit amet ipsum luctus condimentum. Donec faucibus commodo facilisis. ', '2022-05-30', 13, 10),
(13, 'En cours', 'Line or Circuit Errors', 'Oui', 'NAS', 49936129, '2022-05-30', '2022-05-28', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nisl dolor, malesuada luctus fermentum a, placerat vel leo. Nulla sit amet sapien consectetur, imperdiet erat sit amet, semper erat. Sed varius dignissim accumsan. Nam et lorem quis sem facilisis blandit sed et diam. ', 'Phasellus dignissim nibh est, maximus sodales augue tempor a. Sed hendrerit enim massa, eu ultrices erat luctus eget. Pellentesque et ex ultrices lorem ullamcorper ultricies ut ac nisi. Cras vitae turpis dapibus, imperdiet justo id, aliquam eros. Ut id lobortis elit. Donec nec sem risus. Sed ut pharetra urna. ', '2022-05-30', 14, 10),
(14, 'En cours', 'Latency or Delay', 'Oui', 'Switch', 63508832, '2022-05-30', '2022-05-29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu elementum magna. Pellentesque bibendum libero sed imperdiet blandit. Donec sed varius enim. Donec viverra mauris ac nibh luctus pharetra. Phasellus non fringilla ante, ut laoreet purus. Nam sed enim mi. Mauris volutpat dignissim sapien, eget finibus arcu. ', 'Donec non commodo est, in varius lorem. Curabitur sed odio sapien. Suspendisse lobortis tempus velit sed pulvinar. Maecenas eu ante ac ante fermentum tincidunt nec vitae purus. Vivamus a purus hendrerit, tempor sapien sit amet, consequat ante. Aliquam sed pretium felis. Nunc viverra neque vitae elementum hendrerit. Aenean sed nibh vitae massa dignissim suscipit. Mauris vel risus et nunc tincidunt facilisis vitae ac tortor. Integer sit amet pharetra velit, euismod vehicula arcu. Etiam nisl nulla, pulvinar ac orci ut, euismod faucibus arcu. Suspendisse eu magna posuere, dapibus nisl eu, viverra ipsum. Proin sit amet tristique augue. ', '2022-05-30', 12, 11),
(15, 'En cours', 'Line or Circuit Bouncing', 'Oui', 'Rooter', 73355210, '2022-05-30', '2022-05-26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent iaculis, quam nec dictum lobortis, nunc eros consectetur arcu, id auctor diam lorem a mi. Cras varius nulla nulla, sed molestie dui lobortis eget. In hac habitasse platea dictumst. Aenean vestibulum pretium metus venenatis cursus. Fusce accumsan blandit tempus. Nunc a orci sed dolor porttitor suscipit ac sed leo. Nunc ullamcorper quam in velit dapibus blandit. ', 'Aenean nec tristique purus. Aenean sed mi ipsum. Proin rhoncus vehicula tincidunt. Phasellus accumsan nisi dapibus nisi ornare, sed cursus dolor gravida. Proin tempus feugiat faucibus. Curabitur placerat vehicula dui. Pellentesque tincidunt purus ex, vel ultricies ipsum viverra sit amet. Pellentesque ut libero suscipit, condimentum mi non, viverra diam. Integer aliquet dui sed scelerisque posuere. In hac habitasse platea dictumst.', '2022-05-30', 13, 11),
(16, 'En cours', 'Packet Loss', 'Oui', 'NAS', 61687167, '2022-05-30', '2022-05-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mauris arcu, fermentum ut ornare quis, ultrices posuere ipsum. Aliquam iaculis, neque vel malesuada finibus, dui tortor feugiat diam, nec molestie libero nibh non felis. Curabitur neque lectus, interdum ac tellus vitae, aliquam dictum felis. ', 'Nam congue tempor sem, in fermentum velit congue in. In sagittis, felis at consectetur feugiat, ipsum massa fermentum ipsum, vehicula sodales augue lectus at mauris. Vestibulum ultrices tincidunt augue a euismod. Pellentesque facilisis aliquam quam sed tincidunt. Aenean nec eros ut neque condimentum commodo et in tortor. Aenean enim tellus, interdum at auctor sit amet, iaculis ac tortor. ', '2022-05-30', 14, 11);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtil` int(11) NOT NULL,
  `NomUtil` varchar(256) DEFAULT NULL,
  `PrenomUtil` varchar(256) DEFAULT NULL,
  `EmailUtil` varchar(256) DEFAULT NULL,
  `TelephoneUtil` int(11) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `AdresseUtil` varchar(256) DEFAULT NULL,
  `MDPUtil` varchar(256) DEFAULT NULL,
  `RoleUtil` varchar(50) DEFAULT NULL,
  `NbTicket` int(11) DEFAULT NULL,
  `NbTicketEnCours` int(11) DEFAULT NULL,
  `NbTicketFinie` int(11) DEFAULT NULL,
  `Activer` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtil`, `NomUtil`, `PrenomUtil`, `EmailUtil`, `TelephoneUtil`, `DateNaissance`, `AdresseUtil`, `MDPUtil`, `RoleUtil`, `NbTicket`, `NbTicketEnCours`, `NbTicketFinie`, `Activer`) VALUES
(11, 'Nom4', 'Client3', 'Client3@gmail.com', 77444444, '2000-04-04', 'Gabode 5', '1234', 'Client', 4, 3, 0, 1),
(9, 'Nom2', 'Client1', 'Client1@gmail.com', 77222222, '2000-02-02', 'Gabode_3', '1234', 'Client', 1, 1, 0, 1),
(8, 'Nom1', 'Directeur1', 'Directeur1@gmail.com', 77111111, '1995-01-01', 'Heron', '1234', 'Directeur', 9, 7, 0, 1),
(13, 'Nom6', 'Agent2', 'Agent2@gmail.com', 77666666, '2000-06-06', 'Quartier 2', '1234', 'Agent', 2, 2, 0, 1),
(12, 'Nom5', 'Agent1', 'Agent1@gmail.com', 77555555, '2000-05-05', 'Balbala', '1234', 'Agent', 2, 2, 0, 1),
(10, 'Nom3', 'Client2', 'Client2@gmail.com', 77333333, '2000-03-03', 'Quartier 3', '1234', 'Client', 4, 3, 0, 1),
(14, 'Nom7', 'Agent3', 'Agent3@gmail.com', 77777777, '2000-07-07', 'Haramous', '1234', 'Agent', 3, 3, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`IdTicket`),
  ADD KEY `IdAgent` (`IdAgent`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `IdTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
