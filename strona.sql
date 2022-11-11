-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Lis 2022, 11:34
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

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
-- Struktura tabeli dla tabeli `cennik`
--

CREATE TABLE `cennik` (
  `id` int(11) NOT NULL,
  `product` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cennik`
--

INSERT INTO `cennik` (`id`, `product`, `price`) VALUES
(1, 'wejście jednorazowe', '5 złoty'),
(2, 'karnet miesięczny', '100 złoty'),
(3, 'karnet 3-miesięczny', '200 złoty'),
(4, 'karnet roczny', '700 złoty');

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
(3, 'hoho', 'hehe', 0),
(4, 'hehe', 'ghohohoho', 0),
(5, 'hehe', 'ghohohoho', 0),
(6, 'hehe', 'ghohohoho', 0),
(7, 'hehe', 'ghohohoho', 0),
(8, 'hehe', 'ghohohoho', 0),
(9, 'halo', 'kto tam', 0),
(10, 'halo', 'kto tam', 0),
(11, 'hej', 'czcze', 0),
(12, 'hej', 'czcze', 1),
(13, 'hej', 'czcze', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posty`
--

CREATE TABLE `posty` (
  `id` int(11) NOT NULL,
  `nagluwek` text NOT NULL,
  `tresc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `posty`
--

INSERT INTO `posty` (`id`, `nagluwek`, `tresc`) VALUES
(1, 'hej czy ty wiesz', 'Stoi pociąg na stacji, na drugim peronie\nZa minutę odjedzie już go nie dogonię\nW tym pociągu jedziesz ty, machasz do mnie ręką\nCzuję, że zostałem sam ze swoją piosenką\nHej, czy ty wiesz, że ja się w tobie kocham?\nHej, czy ty wiesz, że to poważna rzecz?\nHej, czy ty wiesz, że zdjęcia twe oglądam?\nHej, szkoda, że już nie zobaczę Cię!\nHej, czy ty wiesz, że ja się w tobie kocham?\nHej, czy ty wiesz, że to poważna rzecz?\nHej, czy ty wiesz, że zdjęcia twe oglądam?\nHej, szkoda, że już nie zobaczę Cię!'),
(2, 'siema siema', 'Siema siema o tej porze każdy wypić może\r\nJakby nie było jest bardzo miło, nie\r\nNormalnie walimy to co mamy, nie\r\nTak kminimy normalnie\r\nNa lewo to nie jest zgrzewo\r\nJakby nie było jest bardzo miło\r\nZwolnij bo to jest jednokierunkowa\r\nPanie pij od nowa... *gul gul*\r\nDwa łyki były dla filarty stylistyki\r\nTera pijemy pod BWA, bo to jest artykuł 202, nie\r\nEee spoko luzik bluzik... *gul*\r\nFacet z aparatem normalnie sobie jaja kmini\r\nMówiła Myszka Miki, że zdjął kolczyki normalnie\r\nKiedyś był zakuty normalnie w kajdany\r\nAle normalnie dowiedział się od mamy że go rozkuli\r\nTacy byli mili że go normalnie wypuścili (he he he)\r\nJakby nie było będzie bardzo miło...\r\nDobra, co nam jeszcze powiesz?\r\nJa nie wiem proszę cię macie\r\nO tej porze każdy coś powiedzieć może, nie\r\nProszę Panią pochodzimy dwa tygodnie\r\nA potem Panią opuszczę i się normalnie wezmę rozwód w kościele\r\nJak się normalnie zamienisz w aniele...\r\nDobra, powiedz teraz \"Witamy w Jackassie\"\r\nWitamy w przekazie chłopaki nie róbcie draki\r\nPuśćcie to normalnie na internet\r\nPająk Spajdermen normalnie dalej rozrabia\r\nJakby nie było będzie bardzo miło\r\nKtoś dostanie w zęby\r\nTo niech go nie boli bo jest z Nowej Soli, nie\r\n'),
(3, 'bounty', '- Bounty czy lubię? Mhm, jest okej.\r\n- Mi tam się to podoba, nie wiem, ludzie strasznie narzekają ale imo jest spoko. \r\n- No, niektórzy nie lubią kokosa na przykład, trochę i dlatego\r\n- Kogo jankosa?\r\n- No.\r\n- I co z tym jankosem?\r\n- Ciężko się dziwić');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `schedue`
--

CREATE TABLE `schedue` (
  `id` int(11) NOT NULL,
  `time` text NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `sunday` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `schedue`
--

INSERT INTO `schedue` (`id`, `time`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(1, '15:00', '', '', '', '', '', '', 'ola'),
(2, '16:00', '', '', '', '', 'klaudia', '', ''),
(3, '17:00', 'julka', '', '', '', '', '', ''),
(4, '18:00', '', 'antonina', '', '', '', 'paulina', ''),
(5, '19:00', 'alicja', '', '', '', '', '', ''),
(6, '20:00', '', '', 'ilona', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'piotrek', '2b7c6d7b23062da26c083e79033ca6dede6189fc'),
(2, 'piotrekPierdolonyBazan', '2b7c6d7b23062da26c083e79033ca6dede6189fc');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cennik`
--
ALTER TABLE `cennik`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `posty`
--
ALTER TABLE `posty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `schedue`
--
ALTER TABLE `schedue`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `cennik`
--
ALTER TABLE `cennik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `posty`
--
ALTER TABLE `posty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `schedue`
--
ALTER TABLE `schedue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
