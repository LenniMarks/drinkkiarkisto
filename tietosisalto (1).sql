-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23.01.2023 klo 13:24
-- Palvelimen versio: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tietosisalto`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `drinkki`
--

CREATE TABLE `drinkki` (
  `id` int(11) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `kuvaus` varchar(1024) NOT NULL,
  `kategoria` varchar(255) NOT NULL,
  `ainesosat` varchar(255) NOT NULL,
  `ohje` varchar(1024) NOT NULL,
  `tekija` varchar(255) NOT NULL,
  `hyvaksytty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `drinkki`
--

INSERT INTO `drinkki` (`id`, `nimi`, `kuvaus`, `kategoria`, `ainesosat`, `ohje`, `tekija`, `hyvaksytty`) VALUES
(29, 'SANGRIA', 'Sangria on Espanjalainen viinipohjainen juomasekoitus. Tyypillisesti Sangriassa on pohjana punaviini ja joukossa sokerin ja esimerkiksi kuohuviinin lisäksi appelsiinia, sitruunaa ja limejä.', 'Boolit', '1.5 l Punaviini 2 dl Kuohuviini 0.5 dl Ruokosokeri 1 kpl Appelsiini 1 kpl Lime 1 kpl Sitruuna', '1. Täytä kannun pohja limen, appelsiinin ja sitruunansiivuilla. 2. Riippuen makumieltymyksistäsi voit puristaa joukkoon joko kokonaisen appelsiinin tai sitruunan mehut. Tai kahden kokonaisen limen mehun. 3. Kun sitrushedelmät ovat kannussa voit lisätä punaviinin, kuohuviinin ja ruokosokerin. 4. Hämmennä juomaa kunnes ruokosokeri on liuennut. Sokerin kanssa kannattaa myös kuunnella omia makunystyröitä ja sen voi halutessaan jättää jopa kokonaan pois.', 'Drinkkiarkisto', 1),
(30, 'AHONLAITA', 'Ahonlaita on vodkasta, mansikkalikööristä ja omenasiideristä koostuva booli. Koristele booli mansikoilla ja tarjoile On the rock -laseista jäiden kera.', 'Boolit', '2 dl Vodka 2 dl Mansikkalikööri 1 l Omenasiideri', '1. Kaada ainesosat boolimaljaan ja hämennä. 2. Koristele mansikoilla.', 'Drinkkiarkisto', 1),
(31, 'BANAANI & LIMEBOOLI', 'Banaani & Limebooli koostuu vodkasta, banaanilikööristä, tonic-vedestä ja kidesokerista.', 'Boolit', '2 dl Vodka 3 dl Banaanilikööri 1 l Tonic-vesi 2 kpl Lime Kidesokeri', '1. Kaada ainesosat boolimaljaan ja hämmennä. 2. Purista joukkoon kahden limen mehu. 3. Lisää joukkoon oman maun mukaan kidesokeria makeuttamaan boolia. 4. Koristele banaanin ja limen viipaleilla.', 'Drinkkiarkisto', 1),
(32, 'BANAANIBOOLI', 'Nauti valkoviinistä, banaanilikööristä, ginger alesta ja vodkasta koostuva banaanibooli ystävien kesken.', 'Boolit', '0.75 l Valkoviini 2 dl Banaanilikööri 1 l Ginger Ale 1 dl Vodka Jääpaloja', '1. Kaada ainesosat jääpaloilla täytettyyn boolimaljaan ja hämennä. 2. Koristele banaanin ja kiivin viipaleilla.', 'Drinkkiarkisto', 1),
(33, 'AAMUNKOITTO', 'Aamunkoitto on raikas vadelma- ja omenaviinistä koostuva booli. Tarjoile se On the rocks -lasista jäämurskan ja appelsiininviipaleen kera.', 'Boolit', '75 cl Vadelmaviini 75 cl Omenaviini Jäämurska', '1. Kaada ainesosat boolimaljaan ja hämennä. 2. Koristele appelsiininviipaleilla.', 'Drinkkiarkisto', 1),
(34, 'GALLIANO HOT SHOT', 'Vaniljainen Galliano Hot Shot ei taatusti jätä ketään kylmäksi. Galliano Hot Shot sopii erityisen hyvin after ski tunnelmiin.', 'Shotit', '2 cl Galliano 2 cl Kahvi (kuumaa) 1 cl Kuohukerma', '1. Kaada Galliano shottilasiin. 2. Valuta päälle kuumaa kahvia. 3. Lisää vielä pinnalle kevyesti vatkattu kuohukerma.', 'Drinkkiarkisto', 1),
(35, 'B BAD', 'B Bad yllyttää juojaansa olemaan paha, mutta sitä emme voi suositella. Kapinoi olemalla pahan sijasta hyvä.', 'Shotit', '2 cl Sininen curacaolikööri 2 cl Vodka', '1. Kaada ainesosat shottilasiin. 2. Nauti.', 'Drinkkiarkisto', 1),
(36, 'ABSOLUT PASSION', 'Intohimoa täynnä oleva passionhedelmäinen shotti, jota voi mehuisan luonteen johdosta nauttia huoletta parikin kappaletta.', 'Shotit', '2 cl Vodka 2 cl Passionhedelmämehu', '1. Kaada ensin vodka shottilasiin. 2. Lisää passionhedelmämehu. 3. Nauti.', 'Drinkkiarkisto', 1),
(37, 'ABSOLUT ANTI-FREEZE', 'Sitruunainen Absolut Anti-Freeze lupaa pitää sinut lämpimänä arktisemmassakin ilmastossa, mutta se sopii mielestämme hyvin myös kesäpäivän kekkereihin.', 'Shotit', '1 cl Midori 2 cl Sitruunavodka 1 cl Sitruunalimonadi', '1. Kaada ainesosat shottilasiin. 2. Nauti.', 'Drinkkiarkisto', 1),
(38, 'MINTTUSALMARI', 'täyteläinen, terävä, minttuinen ja salmiakkinen shotti.', 'Shotit', '2 cl Minttuviina 2 cl Salmiakkiviina', '1. Kaada minttu ja salmari jäähdytettyyn shottilasiin. 2. Nauti.', 'Drinkkiarkisto', 1),
(39, 'CHAMPAGNE FLAMINGO', 'Champagne Flamingo on camparista ja vodkasta koostuva kuohuviini-cocktail. Vodkan ansioista Champagne Flamingo on hieman normaalia vahvempi kuohuviini-cocktail.', 'Drinkit', '2 cl Vodka 2 cl Campari 10 cl Samppanja', '1. Kaada ensin vodka ja campari jäähdytettyyn kuohuviinilasiin. 2. Lisää perään kuohuviini. 3. Nauti.', 'Drinkkiarkisto', 1),
(40, 'HARRY´S PICK-ME-UP', 'Harry´s pick-me-up drinkin keksi kuuluisan Pariisissa sijaitsevan Harry´s New York Barin perustaja Harry MacElhone vuonna 1925.', 'Drinkit', '4 cl Konjakki 2 cl Sitruunamehu 1 ml Grenadinisiirappi 10 cl Kuohuviini', '1. Kaada konjakki, sitruunamehu ja grenadiini shakeriin. 2. Ravista. 3. Siivilöi jäähdytettyyn kuohuviinilasiin. 4. Lisää kuohuviini.', 'Drinkkiarkisto', 1),
(41, 'BLOOD & SAND', 'Blood & Sand on yksi harvoista klassisista skottiviski-drinkeistä. Se sai nimensä Rudolph Valentinon samannimisen härkätaistelusta kertovan elokuvan mukaan.', 'Drinkit', '4 cl Viski (Scotch) 2 cl Vermutti (punainen, makea) 1.5 cl Kirsikkalikööri 5 cl Appelsiinimehu', '1. Kaada ainesosat jääpaloilla täytettyyn shakeriin. 2. Ravista. 3. Siivilöi jäähdytettyyn cocktaillasiin. 4. Koristele appelsiininkuorella.', 'Drinkkiarkisto', 1),
(42, 'JOHN HOLMES', 'John Holmes on viskistä, sitruunamehusta, sokeriliemestä, karpalomehusta ja vadelmalikööristä koostuva cocktail isolla c:llä.', 'Drinkit', '3 cl Viski 2 cl Sitruunamehu 2 cl Sokeriliemi 3 cl Karpalomehu 2 cl Vadelmalikööri', '1. Kaada ainesosat highball-lasiin. 2. Koristele vadelmalla. 3. Nauti', 'Drinkkiarkisto', 1),
(43, 'ZACAPA PERFECT MANHATTAN', 'Zacapa Perfect Manhattan on hunajaan ja rommiin perustuva versio klassisesta Manhattan cocktailista.', 'Drinkit', '4 cl Tumma rommi (zacapa) 2 cl Valkoinen vermutti (kuiva) 2 cl Vermutti (punainen, makea) 2 ml Angostura 1 cl Hunaja', '1. Kaada ainesosat jääpaloilla täytettyyn shakeriin. 2. Ravista. 3. Siivilöi jääpaloilla täytettyyn On the rocks -lasiin. 4. Koristele sitruunankuorella.', 'Drinkkiarkisto', 1),
(65, '5', '5', '5', '5', '5', '5', 1),
(66, 'neekerin juoma', '6', '6', '6', '6', '6', 1),
(67, '7', '7', '7', '7', '7', '7', 1),
(68, '8', '8', '8', '8', '8', '8', 1),
(71, '1', '1', '1', '1', '1', '1', 1),
(72, '2', '2', '2', '2', '2', '2', 1),
(73, '3', '3', '3', '3', '3', '3', 1),
(74, '56', '5', '56', '56', '56', '56', 1),
(75, '7', '7', '7', '7', '7', '7', 1),
(77, '56', '565', '56565', '65656', '565656', '565656', 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `ehdotus`
--

CREATE TABLE `ehdotus` (
  `id` int(11) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `kuvaus` varchar(1024) NOT NULL,
  `kategoria` varchar(255) NOT NULL,
  `ainesosat` varchar(255) NOT NULL,
  `ohje` varchar(1024) NOT NULL,
  `tekija` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `ehdotus`
--

INSERT INTO `ehdotus` (`id`, `nimi`, `kuvaus`, `kategoria`, `ainesosat`, `ohje`, `tekija`) VALUES
(51, '8', '8', '8', '8', '8', '8'),
(53, '10', '10', '10', '10', '10', '10'),
(54, '34', '343', '343', '4343', '4343', '3434'),
(55, '2', '2', '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Rakenne taululle `kayttaja`
--

CREATE TABLE `kayttaja` (
  `id` int(11) NOT NULL,
  `tunnus` varchar(255) NOT NULL,
  `salasana` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adminid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `kayttaja`
--

INSERT INTO `kayttaja` (`id`, `tunnus`, `salasana`, `email`, `adminid`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 1),
(14, 'testi', 'testi', 'testi@gmail.com', 2),
(18, '422', '4', '4@gmail.com', 2),
(39, 'neekeri69', 'neekeri', 'neekeri@gmail.com', 2);

-- --------------------------------------------------------

--
-- Rakenne taululle `tykkays`
--

CREATE TABLE `tykkays` (
  `tunnus` int(11) NOT NULL,
  `drinkki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `tykkays`
--

INSERT INTO `tykkays` (`tunnus`, `drinkki`) VALUES
(18, 33),
(18, 30),
(18, 32),
(18, 35),
(18, 36),
(18, 37),
(18, 38),
(18, 39),
(18, 40),
(18, 41),
(18, 44),
(14, 29),
(14, 30),
(14, 31),
(14, 32),
(14, 33),
(14, 34),
(14, 35),
(14, 36),
(14, 71),
(14, 72),
(14, 42),
(14, 67),
(39, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinkki`
--
ALTER TABLE `drinkki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ehdotus`
--
ALTER TABLE `ehdotus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kayttaja`
--
ALTER TABLE `kayttaja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drinkki`
--
ALTER TABLE `drinkki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `ehdotus`
--
ALTER TABLE `ehdotus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `kayttaja`
--
ALTER TABLE `kayttaja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
