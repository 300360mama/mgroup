-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 19 2018 г., 15:45
-- Версия сервера: 5.5.23
-- Версия PHP: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mgroup`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mgroup_tasks`
--

CREATE TABLE `mgroup_tasks` (
  `id` int(11) NOT NULL,
  `text_task` varchar(255) NOT NULL,
  `date_task` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `mgroup_tasks`
--

INSERT INTO `mgroup_tasks` (`id`, `text_task`, `date_task`, `user_id`) VALUES
(47, 'admin', '1299-01-21 12:21:00', 18),
(48, 'admin', '1299-01-21 12:21:00', 18),
(49, 'admin', '1299-01-21 12:21:00', 18),
(74, 'two', '1121-02-12 21:21:00', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `mgroup_user`
--

CREATE TABLE `mgroup_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `mgroup_user`
--

INSERT INTO `mgroup_user` (`id`, `first_name`, `last_name`, `login`, `password`, `authKey`) VALUES
(18, 'admin', 'admin', 'admin', '$2y$13$wLf9Uj4enn4rJlPNDo2S0.sEg1Fp05zJD8bVzPOURtMHNY206OlZu', NULL),
(19, '1', '1', '1', '$2y$13$xTzGsy.nm1MqeSKqZLahv.F/j7LoIJOhaH0fssxeqrjI11rr5DuUG', NULL),
(20, 'sanya', 'stecuk', 'sandro', '$2y$13$LUHpac23HZNdXhJA8YoG0eM7zU96EfgPYdosIi5mHMlkyAFpi/eme', NULL),
(21, 'sdfsdf', 'fddfs', 'fsdf', '$2y$13$FBsfsJUBOMAWuRLnAJh1YOvYiNO8KLJXpXGD45THB3W6xRx0ekKii', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `mgroup_tasks`
--
ALTER TABLE `mgroup_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mgroup_user`
--
ALTER TABLE `mgroup_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mgroup_tasks`
--
ALTER TABLE `mgroup_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `mgroup_user`
--
ALTER TABLE `mgroup_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
