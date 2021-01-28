-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: std-mysql
-- Время создания: Янв 28 2021 г., 13:16
-- Версия сервера: 5.7.26-0ubuntu0.16.04.1
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `std_941`
--

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `qu1` text,
  `qu2` text,
  `qu3` text,
  `qu4` text,
  `qu5` text,
  `qu51` text,
  `qu51b` int(11) DEFAULT NULL,
  `qu52` text,
  `qu52b` int(11) DEFAULT NULL,
  `qu6` text,
  `qu61` text,
  `qu61b` int(11) DEFAULT NULL,
  `qu62` text,
  `qu62b` int(11) DEFAULT NULL,
  `qu63` text,
  `qu63b` int(11) DEFAULT NULL,
  `ids` int(11) DEFAULT NULL,
  `isclose` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `form`
--

INSERT INTO `form` (`qu1`, `qu2`, `qu3`, `qu4`, `qu5`, `qu51`, `qu51b`, `qu52`, `qu52b`, `qu6`, `qu61`, `qu61b`, `qu62`, `qu62b`, `qu63`, `qu63b`, `ids`, `isclose`) VALUES
('trf', 'fgd', 'sfg', 'fgd', 'fdsg', 'fgs', 0, 'sgf', 4, 'gsff', 'gsf', 4, 'dfg', 4, 'fgsd', 4, 43, NULL),
('2', '2', '22', '2', '2', '2', 2, '2', 2, '2', '2', 22, '2', 2, '2', 2, 1, NULL),
('2', '2', '2', '2', '2', '2', 2, '2', 2, '22', '2', 2, '2', 2, '2', 0, 5, 1),
('g', '4', '4', '4', '4', '4', 4, '4', 4, '4', '4', 4, '4', 4, '4', 4, 7, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
