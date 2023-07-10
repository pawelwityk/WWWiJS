-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 10 Lip 2023, 18:06
-- Wersja serwera: 8.0.32
-- Wersja PHP: 8.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `s410757`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE `kontakt` (
  `ID` int NOT NULL,
  `Imię` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `E_mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opcje` text COLLATE utf8mb4_unicode_ci,
  `Dodatkowe_informacje` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `kontakt`
--

INSERT INTO `kontakt` (`ID`, `Imię`, `Nazwisko`, `E_mail`, `Opcje`, `Dodatkowe_informacje`) VALUES
(91, 'Paweł', 'Wityk', 'pawelwityk@student.agh.edu.pl', 'Mix, Mastering, Nagranie', 'Gitara, perkusja, jeden cover'),
(92, 'Aleksandra', 'Tadel', 'atadel@student.agh.edu.pl', 'Mix, Mastering', 'Nagranie głosu Brysi'),
(93, 'Marta', 'Mazanka', 'mazanka@student.agh.edu.pl', 'Mix, Mastering, Nagranie', 'Dogranie wokalu w innym terminie\r\n'),
(94, 'Iga ', 'Światek', 'iga@swiatek.pl', 'Mix, Mastering, Nagranie, Produkcja muzyczna', 'Spot po wygranym Wimbledonie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `realizacje`
--

CREATE TABLE `realizacje` (
  `ID` int NOT NULL,
  `Autor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tytuł` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Link` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `realizacje`
--

INSERT INTO `realizacje` (`ID`, `Autor`, `Tytuł`, `Link`) VALUES
(23, 'Miłosz Bazarnik', 'New Market', 'https://open.spotify.com/embed/track/76gSADiK3U5ZTQCCGuAcz4?utm_source=generator'),
(24, 'Chwila Nieuwagi', 'Jelen', 'https://open.spotify.com/embed/track/67Zo9NBtEWdqxxXi2n9CL4?utm_source=generator'),
(25, 'Cisza jak Ta', 'Dziewczyna z portretu', 'https://open.spotify.com/embed/track/4ktrMOPHhrEU5aFmBlNleU?utm_source=generator'),
(26, 'Jedno', 'Brachidacja', 'https://open.spotify.com/embed/track/3CXh5RKbfwOwdzFYqyvisZ?utm_source=generator'),
(27, 'Witold Mikołajczuk', 'Komu wojna temu kusza', 'https://open.spotify.com/embed/track/0DWN0DIQnKyXbIwbFCbVr0?utm_source=generator'),
(28, 'Magdalena Białorucka-Ogorzelec', 'MankaSędziszowianka', 'https://open.spotify.com/embed/track/3LaAMj0r7K5XaYvTKJDxGU?utm_source=generator'),
(29, 'Neal Wakefield', 'Digital mind', 'https://open.spotify.com/embed/track/2Vo2Vr6tdz0fIkLTfd9gEM?utm_source=generator');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzet`
--

CREATE TABLE `sprzet` (
  `ID` int NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kategoria` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `sprzet`
--

INSERT INTO `sprzet` (`ID`, `Nazwa`, `Kategoria`) VALUES
(17, 'Macbook Pro 15\' (model 2019)​', 'System'),
(18, 'Pro Tools Studio DAW', 'System'),
(19, 'Spectrasonics Keyscape​', 'System'),
(20, 'Royer R-121', 'Mikrofony'),
(21, 'Oktava MK012', 'Mikrofony'),
(22, 'Universal Audio 610B', 'Preampy'),
(23, 'Focusrite Scarlett 18i20', 'Preampy'),
(24, 'Shure Beta 52A', 'Mikrofony'),
(25, 'SSL XLogic Alpha VHD', 'Preampy'),
(26, ' LD System HPA6', 'Wzmacniacze'),
(27, ' Sennheiser e906', 'Słuchawki'),
(28, 'Softube Console 1​', 'Sterowniki'),
(29, 'iCON Platform M', 'Sterowniki'),
(30, ' Metagrid (iPad)', 'Sterowniki'),
(31, 'Beyerdynamic DT 770', 'Słuchawki'),
(33, 'Beyerdynamic DT 250', 'Słuchawki'),
(34, 'Beyerdynamic DT 240', 'Słuchawki'),
(35, 'AKG C414 XLS Stereo Set Lewitt DTP Beat Kit Pro 7 (zestaw mikrofonów do perkusji)', 'Mikrofony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia_baza`
--

CREATE TABLE `zdjecia_baza` (
  `ID` int NOT NULL,
  `Sciezka` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kolumna` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `zdjecia_baza`
--

INSERT INTO `zdjecia_baza` (`ID`, `Sciezka`, `Kolumna`) VALUES
(29, 'bobik.jpg', 1),
(30, 'pierwstudiu6.jpg', 2),
(31, 'pieswstudiu2.jpg', 3),
(34, 'studio2.jpg', 1),
(35, 'studio3.jpg', 1),
(36, 'pieswstudiu3.jpg', 2),
(38, 'pieswstudiu4.jpg', 3),
(39, 'pieswstudiu5.jpg', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `realizacje`
--
ALTER TABLE `realizacje`
  ADD UNIQUE KEY `index` (`ID`);

--
-- Indeksy dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `zdjecia_baza`
--
ALTER TABLE `zdjecia_baza`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT dla tabeli `realizacje`
--
ALTER TABLE `realizacje`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT dla tabeli `zdjecia_baza`
--
ALTER TABLE `zdjecia_baza`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
