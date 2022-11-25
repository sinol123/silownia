-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Lis 2022, 12:26
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`, `name`, `surname`) VALUES
(1, 'piotrek', 'dea8c0b26df7045a4a3da06f969e0686f4493dd9', 'Piotrek', 'Bazan'),
(2, 'mateusz', 'd6cf83a2462adb38a49e1eccef29cd0439adc43e\r\n', 'Mateusz', 'Cholewa'),
(3, 'hubert', '57a456b9d1c069db2c2c21d13bbcf1440ac0892e', 'Hubert', 'Langier'),
(4, 'kacper', '21c6a79a1c2aa72d0c2d8fe5f9bbe747c8c16a28', 'Kacper', 'Tąpolski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `classes`
--

CREATE TABLE `classes` (
  `name` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `trainerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `classes`
--

INSERT INTO `classes` (`name`, `description`, `trainerId`) VALUES
('bieganie', 'szybko', 3),
('brak', 'brak', 1),
('deska', 'z kulą do kręgli', 4),
('picie', 'piwa na czas', 4),
('pompki', 'góra dół na dywanie', 4),
('przysiad', 'z kolegami', 2),
('pływanie', 'w basenie :00', 2),
('stanie', 'w miejscu jak słup', 6),
('żucanie', 'do przodu jak najdalej', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `headline` text NOT NULL,
  `paragrapf` text NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `headline`, `paragrapf`, `deleted`) VALUES
(1, 'siema', 'eniu', 0),
(2, 'hehe', 'ghohohoho', 1),
(3, 'hoho', 'hehe', 1),
(4, 'hehe', 'ghohohoho', 1),
(5, 'hehe', 'ghohohoho', 0),
(6, 'hehe', 'ghohohoho', 0),
(7, 'hehe', 'ghohohoho', 0),
(8, 'hehe', 'ghohohoho', 0),
(9, 'halo', 'kto tam', 0),
(10, 'halo', 'kto tam', 0),
(11, 'hej', 'czcze', 0),
(12, 'hej', 'czcze', 1),
(13, 'hej', 'czcze', 1),
(14, 'aha', 'no to super', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `product` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pricelist`
--

INSERT INTO `pricelist` (`id`, `product`, `price`) VALUES
(1, 'wejście jednorazowe', '5 złoty'),
(2, 'karnet miesięczny', '100 złoty'),
(3, 'karnet 3-miesięczny', '200 złoty'),
(4, 'karnet roczny', '700 złoty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `schedue`
--

CREATE TABLE `schedue` (
  `id` int(11) NOT NULL,
  `time` text NOT NULL,
  `monday` varchar(15) NOT NULL,
  `tuesday` varchar(15) NOT NULL,
  `wednesday` varchar(15) NOT NULL,
  `thursday` varchar(15) NOT NULL,
  `friday` varchar(15) NOT NULL,
  `saturday` varchar(15) NOT NULL,
  `sunday` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `schedue`
--

INSERT INTO `schedue` (`id`, `time`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(1, '15:00', 'brak', 'brak', 'brak', 'brak', 'brak', 'brak', 'brak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `surname`) VALUES
(1, '', ''),
(2, 'Antonina', 'Winkler'),
(3, 'Adam', 'Patecki'),
(4, 'Ania', 'Patataj'),
(5, 'Aleksandra', 'AleAleAleŁadna'),
(6, 'Piotr', 'Bazan');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`name`),
  ADD KEY `trainerId` (`trainerId`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `schedue`
--
ALTER TABLE `schedue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedue_ibfk_1` (`monday`),
  ADD KEY `schedue_ibfk_2` (`tuesday`),
  ADD KEY `wednesday` (`wednesday`),
  ADD KEY `thursday` (`thursday`),
  ADD KEY `friday` (`friday`),
  ADD KEY `schedue_ibfk_6` (`saturday`),
  ADD KEY `sunday` (`sunday`);

--
-- Indeksy dla tabeli `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `schedue`
--
ALTER TABLE `schedue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`trainerId`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `schedue`
--
ALTER TABLE `schedue`
  ADD CONSTRAINT `schedue_ibfk_1` FOREIGN KEY (`monday`) REFERENCES `classes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedue_ibfk_2` FOREIGN KEY (`tuesday`) REFERENCES `classes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedue_ibfk_3` FOREIGN KEY (`wednesday`) REFERENCES `classes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedue_ibfk_4` FOREIGN KEY (`thursday`) REFERENCES `classes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedue_ibfk_5` FOREIGN KEY (`friday`) REFERENCES `classes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedue_ibfk_6` FOREIGN KEY (`saturday`) REFERENCES `classes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedue_ibfk_7` FOREIGN KEY (`sunday`) REFERENCES `classes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
