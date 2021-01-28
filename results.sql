-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: std-mysql
-- Время создания: Янв 28 2021 г., 13:56
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
-- Структура таблицы `results`
--

CREATE TABLE `results` (
  `ids` text,
  `id` int(11) DEFAULT NULL,
  `first` text,
  `second` text,
  `third` text,
  `fourth` text,
  `choice` text,
  `chk1` text,
  `chk2` text,
  `chk3` text,
  `clientid` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `results`
--

INSERT INTO `results` (`ids`, `id`, `first`, `second`, `third`, `fourth`, `choice`, `chk1`, `chk2`, `chk3`, `clientid`, `date`) VALUES
('7', 2, 'g', 'g', 'g', 'g', '4', '4', NULL, NULL, NULL, NULL),
('11', 2, 'd', 'd', 'd', 'd', '4', '', '4', '', '127.0.0.1', '2016-07-24'),
('11', 3, 'd', 'd', 'а', 'd', '4', '4', '4', '4', '127.0.0.1', '2016-10-04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
