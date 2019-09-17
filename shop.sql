-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 17 2019 г., 21:48
-- Версия сервера: 10.1.39-MariaDB
-- Версия PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `number_item` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `frame_material` varchar(255) NOT NULL,
  `wheel_diameter` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `sale` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `item_name`, `number_item`, `price`, `frame_material`, `wheel_diameter`, `rank`, `img_src`, `item_type`, `sale`) VALUES
(2, 'Stels Cross 130', 10, 24000, 'Алюминий', 26, 13, 'stels_cross_130.jpg', 'bike', 50),
(3, 'Stels Navigator 650', 5, 22830, 'Алюминий', 26, 5, 'stels_navigator_650.jpg', 'bike', 0),
(8, 'Tech Team Wasp', 20, 3000, 'Алюминий', 5, 8, 'tech_team_wasp.jpg', 'scooter', 10),
(9, 'Explore Degree 2', 15, 4000, 'Алюминий', 5, 5, 'explore_degree_2.jpg', 'scooter', 0),
(10, 'Tech Team Laser', 10, 4800, 'Алюминий', 5, 6, 'tech_team_laser.jpg', 'scooter', 0),
(11, 'Slider SU8', 10, 5400, 'Алюминий', 5, 6, 'slider_su_8.jpg', 'scooter', 0),
(12, 'Merida', 122, 25000, 'Алюминий', 26, 1, 'stels_kek.png', 'bike', 0),
(14, 'Test', 25, 24500, 'Алюминий', 26, 1, 'slider_su_8.jpg', 'bike', 0),
(15, 'Merida', 10, 14800, 'Алюминий', 28, 1, 'slider_su_8.jpg', 'bike', 0),
(22, 'Stels Mek', 20, 25000, 'Алюминий', 26, 1, 'explore_degree_2.jpg', 'bike', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `fam` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `delivery` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `address`, `fname`, `fam`, `mail`, `delivery`) VALUES
(42, '', 'Андрей', 'Кокорев', 'shadowkad@mail.ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_positions`
--

CREATE TABLE `order_positions` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `number_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_positions`
--

INSERT INTO `order_positions` (`id`, `order_id`, `item_id`, `number_item`) VALUES
(1, 42, 2, 1),
(2, 42, 9, 20),
(3, 42, 11, 5),
(4, 42, 8, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pages` varchar(255) NOT NULL,
  `meta_opis` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fam` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `fname`, `fam`, `mail`, `password`, `rights`) VALUES
(2, 'Kupridon', 'Артем', 'Куприянов', 'kupriyanov_99@mail.ru', '$2y$10$OYzPxWkt8c0r9aOlIBz/mOqAKt54ld4QR8cBzDxjYm1mmNBVBtOsy', 'admin'),
(31, 'shadowkad', 'Андрей', 'Кокорев', 'shadowkad@mail.ru', '$2y$10$qTxmkDw3CZkmie6cwS2vNeXbTRgdPrH4/I0Qwk8Z6xOHKLxkoIH.a', 'admin'),
(32, 'razorgt', 'Алексей', 'Алексеев', 'razorgt@mail.ru', '$2y$10$Xzzfi/qcbaY3TxbhXXs6peumnWgp3nq6GYf1vDF.GROdXSPNBSfzy', 'admin'),
(34, 'digna', 'Давид', 'Игнахин', 'digna@mail.ru', '$2y$10$/pgHQ3tmWBffm6GjrIedEOoeJ1MZBTZwuyKPOplpCeVCYLfbIN4FC', 'user'),
(35, 'мекек', 'кек', 'мекек', 'ввваздазхлап', '$2y$10$Tu9MnjrAXO4tRgvAOo7f4uQPNZ4nGSLBuMC8M.7hNONd3IMXO/986', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_positions`
--
ALTER TABLE `order_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `order_positions`
--
ALTER TABLE `order_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_positions`
--
ALTER TABLE `order_positions`
  ADD CONSTRAINT `order_positions_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `order_positions_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
