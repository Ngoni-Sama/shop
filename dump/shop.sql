-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 24 2020 г., 11:31
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `zip` int(11) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `region` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`zip`, `city`, `region`) VALUES
(383320, 'Абинск', 'Краснодарский');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(4) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `zip` char(10) DEFAULT NULL,
  `phone` char(14) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `middle_name`, `last_name`, `zip`, `phone`, `login`, `pass`) VALUES
(2, 'Евгений', 'Юрьевич', 'Соломожецкий', '383320', '+79673122662', 'solo', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(4) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ord` int(3) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `made` date DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `cost`, `description`, `ord`, `img`, `weight`, `made`, `expiration`, `type`) VALUES
(1, 'Яблоки', 78, 'Сочные спелые', 2, 'apple.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(2, 'Вишня', 109, 'Кислая красная', 4, 'cherry.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(6, 'Банан', 85, 'Из тайланда', 1, 'banana.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(7, 'Черешня', 120, 'Темно-красная', 3, 'cherries.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(9, 'Виноград Изабелла', 165, 'Виноград из Тамани', 5, 'grape.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(10, 'Виноград Изабелла 2', 126, 'Виноград без костей', 5, 'grape2.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(11, 'Лимон', 55, 'Желтый, кислый', 6, 'lemon.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(12, 'Нектарин', 92, 'Нектарин раний', 7, 'nectarine.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(13, 'Ананас', 145, 'Бразильский', 8, 'pineapple.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(14, 'Арбуз', 20, 'Большой, сладкий', 9, 'watermelon.png', 1, '2020-05-01', '2020-05-31', 'Фрукты'),
(15, 'Капуста', 15, 'белокочанная', 10, 'cabbage.png', 1, '2020-05-01', '2020-05-31', 'Овощи'),
(16, 'Лук', 35, 'репчатый', 11, 'onion.png', 1, '2020-05-01', '2020-05-31', 'Овощи'),
(17, 'Картофель', 25, 'Голландский', 12, 'potato.png', 1, '2020-05-01', '2020-05-31', 'Овощи'),
(18, 'Морковь', 43, 'Финхор', 13, 'carrot.png', 1, '2020-05-01', '2020-05-31', 'Овощи'),
(19, 'Баклажан', 78, 'Лебединый', 14, 'eggplant.png', 1, '2020-05-01', '2020-05-31', 'Овощи');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `date_of_ord` datetime NOT NULL,
  `status_of_ord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `date_of_ord`, `status_of_ord`) VALUES
(2, 2, '2020-05-24 11:29:24', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `purchases`
--

CREATE TABLE `purchases` (
  `ord_id` int(11) NOT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `volume` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `purchases`
--

INSERT INTO `purchases` (`ord_id`, `goods_id`, `volume`) VALUES
(2, 1, '1.00'),
(2, 2, '1.00'),
(2, 7, '3.00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`zip`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Индексы таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`);

--
-- Ограничения внешнего ключа таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
