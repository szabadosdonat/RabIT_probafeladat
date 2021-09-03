-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Sze 03. 12:52
-- Kiszolgáló verziója: 10.4.18-MariaDB
-- PHP verzió: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `probafeladat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(4) NOT NULL,
  `userid` int(8) NOT NULL,
  `title` varchar(32) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `advertisement`
--

INSERT INTO `advertisement` (`id`, `userid`, `title`) VALUES
(1, 1, 'Az első hirdetés címe'),
(2, 3, 'A második hirdetés címe'),
(3, 2, 'A harmadik hirdetés címe'),
(4, 6, 'A negyedik hirdetés címe'),
(5, 6, 'Az ötödik hirdetés címe');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `name` varchar(32) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(1, 'Próba Péter'),
(2, 'Michael Jackson'),
(3, 'Szent István'),
(4, 'Hun Attila'),
(5, 'Szabados Donát'),
(6, 'Petőfi Sándor'),
(7, 'Péhá Péter');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
