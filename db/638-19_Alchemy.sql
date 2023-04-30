-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 30 2023 г., 12:33
-- Версия сервера: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004
-- Версия PHP: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `638-19_Alchemy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `correct_answer`
--

CREATE TABLE `correct_answer` (
  `id_answer` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `level`
--

CREATE TABLE `level` (
  `id_level` int(20) NOT NULL,
  `name_level` varchar(255) NOT NULL,
  `instruction` text NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `board` varchar(50) NOT NULL,
  `class` varchar(255) NOT NULL,
  `class2` varchar(255) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `earlier` text NOT NULL,
  `after` text NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `user_response` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `level`
--

INSERT INTO `level` (`id_level`, `name_level`, `instruction`, `property_id`, `board`, `class`, `class2`, `selector`, `style`, `earlier`, `after`, `correct_answer`, `user_response`) VALUES
(1, 'grid-column-start 1', 'Алхимия - это увлекательная игра и отличный способ изучения CSS Grid, который позволит получить практический опыт работы с этим мощным инструментом в интересной и захватывающей форме. Вам предстоит создавать различные элементы, используя свойства CSS Grid.\n<br>\nЭто проверка, у меня болит живот и я устала.', 1, 'w', 'element fire', 'element water', '> :nth-child(1)', 'grid-column-start: 4', '#table {<br> display: grid;<br>  grid-template-columns: repeat(5, 20%);<br>  grid-template-rows: repeat(4, 25%);<br>}<br><br>#water {<br>', '}', 1, 1),
(2, 'Какое-то имя', 'Какая-то инструкция', 1, 'w', '', '', 'какой-то что-то', 'что-то', 'что-то', 'что-то', 1, 1),
(3, 'Я не знаю', 'не знаю', 1, 'не знаю', '', '', 'не знаю', 'не знаю', 'не знаю', 'не знаю', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `property`
--

CREATE TABLE `property` (
  `id_property` int(20) NOT NULL,
  `name_property` varchar(255) NOT NULL,
  `definition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `property`
--

INSERT INTO `property` (`id_property`, `name_property`, `definition`) VALUES
(1, 'grid-column-start', 'Определяет начальную позицию grid-элемента внутри grid-столбцов.\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT '/web/UserPhoto/UserImg.jpg',
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `passwordConfirm` varchar(255) NOT NULL,
  `agree` tinyint(1) NOT NULL DEFAULT 1,
  `admin` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `photo`, `email`, `username`, `password`, `passwordConfirm`, `agree`, `admin`) VALUES
(7, '/web/UserPhoto/pixel_cat_1682507888.jpg', 'admin@admin.admin', 'admin', 'admin007', 'admin007', 1, 1),
(14, '/web/UserPhoto/UserImg.jpg', 'gamepoad@mail.ru', 'Vitalya', '12345', '12345', 1, 0),
(15, '/web/UserPhoto/UserImg.jpg', 'qwertyuio@ertey.sfdgh', 'rwsedr', '12345678', '12345678', 1, 0),
(16, '/web/UserPhoto/UserImg.jpg', 'aaAAAa@mail.ru', 'tututupiuuu', '1234567g', '1234567g', 1, 0),
(17, '/web/UserPhoto/UserImg.jpg', 'sffafs@gmail.com', 'r75474', '12345678', '12345678', 1, 0),
(18, '/web/UserPhoto/UserImg.jpg', 'sff3afs@gmail.com', 'r754744', '12345678', '12345678', 1, 0),
(19, '/web/UserPhoto/Miss Mouse_1682359651.png', 'vitalij.mukalov@mail.ru', 'SSdssa', '123456Gg', '123456Gg', 1, 0),
(20, '/web/UserPhoto/UserImg.jpg', 'Aa@hej.ru', 'Alivka', '12345678', '12345678', 1, 0),
(21, '/web/UserPhoto/TDUGiBCt9ng_1682849285.jpg', 'elenaosmanova2003@gmail.com', 'YEeBoOoK', 'Pkgh2019', 'Pkgh2019', 1, 0),
(22, '/web/UserPhoto/UserImg.jpg', 'maksimov.tolyan@yandex.ru', 'XpycTHockoB', 'tq4QBKzJ2jWv6mn', 'tq4QBKzJ2jWv6mn', 1, 0),
(23, '/web/UserPhoto/UserImg.jpg', 'ytrewq321@gmail.com', 'qwerty', '12345678', '12345678', 1, 0),
(24, '/web/UserPhoto/UserImg.jpg', '8327amt@gmail.com', 'Chelovek', '12348765', '12345678', 1, 0),
(25, '/web/UserPhoto/UserImg.jpg', 'Hehehe@msil.ru', 'Hohohehe', 'haha12345', 'haha12345', 1, 0),
(26, '/web/UserPhoto/UserImg.jpg', 'sffafskhjk@gmail.com', 'ljkjhkjjlkhjk', '123456789', '123456789', 1, 0),
(27, '/web/UserPhoto/UserImg.jpg', 'abc@gmail.com', 'aaaaa', '12345678', '12345678', 1, 0),
(28, '/web/UserPhoto/UserImg.jpg', 'user@user.com', 'user1234', '12345678', '12345678', 1, 0),
(29, '/web/UserPhoto/UserImg.jpg', 's35353ff3afs@gmail.com', '4255rfles', '12345678', '12345678', 1, 0),
(30, '/web/UserPhoto/UserImg.jpg', 'sff383838afs@gmail.com', 'aaaaa1', '12345678', '12345678', 1, 0),
(31, NULL, 'Gena123@gmail.com', '12345678', '12345678', '12345678', 1, 0),
(32, '/web/UserPhoto/UserImg4_1682107121.jpg', 'sf415fafs@gmail.com', '65454521', '12345678', '12345678', 1, 0),
(33, '/web/UserPhoto/IMG-20230419-WA0107_1682108117.jpg', 'Padla82@mail.ru', 'Padla82', '12345678', '12345678', 0, 0),
(34, '/web/UserPhoto/UserImg.jpg', 'gloryhole@gmail.com', 'Instasamochka69', 'instabitch666', 'instabitch666', 1, 0),
(35, '/web/UserPhoto/uL96nhfldmE_1682140696.jpg', 'naggets228@mail.ru', 'Naggets', '123456aa', '123456aa', 1, 0),
(36, '/web/UserPhoto/cat_1682329962.jpg', 'sffapoiuytfs@gmail.com', 'YEeBoo09876OoK', '12345678', '12345678', 1, 0),
(37, '/web/UserPhoto/UserImg5_1682330098.jpg', 'qwerty123@gmail.com', '12345678910', '12345678', '12345678', 1, 0),
(38, '/web/UserPhoto/чувак сайлент хилл_1682450767.gif', '293djhejes@mail.ru', 'Aleksandr', '12348765', '12348765', 1, 0),
(39, '/web/UserPhoto/UserImg.jpg', 'Urjtuhrutyyruyruuryuufuiytuu@fkfjjgihktkjfjjfjut.fuigjhgjutjjgji', 'Naggetsruuty', '12345678', '12345678', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_response`
--

CREATE TABLE `user_response` (
  `id_response` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `correct_answer`
--
ALTER TABLE `correct_answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `level_id` (`level_id`);

--
-- Индексы таблицы `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `correct_answer` (`correct_answer`),
  ADD KEY `user_response` (`user_response`);

--
-- Индексы таблицы `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id_property`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `user_response`
--
ALTER TABLE `user_response`
  ADD PRIMARY KEY (`id_response`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `correct_answer`
--
ALTER TABLE `correct_answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `property`
--
ALTER TABLE `property`
  MODIFY `id_property` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `user_response`
--
ALTER TABLE `user_response`
  MODIFY `id_response` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `correct_answer`
--
ALTER TABLE `correct_answer`
  ADD CONSTRAINT `correct_answer_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id_property`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_response`
--
ALTER TABLE `user_response`
  ADD CONSTRAINT `user_response_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_response_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
