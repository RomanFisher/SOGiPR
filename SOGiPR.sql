-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лют 09 2023 р., 02:08
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `SOGiPR`
--

-- --------------------------------------------------------

--
-- Структура таблиці `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `poB` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `numPhon` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `firsLogin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `admin`
--

INSERT INTO `admin` (`id`, `name`, `surname`, `poB`, `login`, `password`, `numPhon`, `photo`, `firsLogin`) VALUES
(1, 'Роман', 'Рибак', 'Васильович', 'romaribak59@gmail.com', '098765', '+380686469475', 'adm.jpg', 0),
(4, 'Геннадій', 'Гевко', 'Іванович', 'gevko3333', '11111', '+380685434586', '4e1de2bedcfcda832c35e5966e331054.jpeg', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `doctor`
--

CREATE TABLE `doctor` (
  `id` int NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `poB` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `special` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `numPhon` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `firsLogin` blob,
  `photo` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `kvalif` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `surname`, `poB`, `login`, `password`, `special`, `numPhon`, `firsLogin`, `photo`, `kvalif`) VALUES
(1, 'Степан', 'Бандера', 'Андрійович', 'roma_rubak@ukr.net', '12345', 'Інфекціоніст', '+380685434586', NULL, 'bb.jpg', 'Спеціаліст');

-- --------------------------------------------------------

--
-- Структура таблиці `gospital`
--

CREATE TABLE `gospital` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `locale` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kategory` int NOT NULL,
  `numPhon` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `komuPidPor` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `gospital`
--

INSERT INTO `gospital` (`id`, `name`, `email`, `password`, `locale`, `kategory`, `numPhon`, `photo`, `komuPidPor`) VALUES
(2, 'Полтавська районна лікарня', 'gevko777@gmail.com', '22222222', 'Стрітенська вулиця, 58А, Полтава, Полтавська, Україна, 36000', 5, '+380685434586', 'poltavsk.jpg', 'Державна лікарня');

-- --------------------------------------------------------

--
-- Структура таблиці `gospitDpv`
--

CREATE TABLE `gospitDpv` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `descript` varchar(7000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `gospitDpv`
--

INSERT INTO `gospitDpv` (`id`, `name`, `descript`, `photo`) VALUES
(1, 'Лікарсько-сестринська бригада', 'Лікарсько-сестринські бригади створюються при медичних закладах Міністерства оборони і Міністерства внутрішніх справ України. Визначаються 2 види ЛСБ: лікарсько-сестринські бригади для надання першої лікарської допомоги і лікарсько-сестринські бригади для надання кваліфікованої медичної допомоги.\r\n\r\n', 'лік2.jpeg'),
(2, 'Медична рота(пункт)', 'Медична рота - мобільне надання першої невідкладної допомоги та стабілізація стану потерпілого, якщо це ще можливо. На одного медика припадає в середньому по 30 поранених.', 'лік3.jpg'),
(3, 'Військовий мобільний госпіталь', 'Військовий мобільний госпіталь - спеціалізований багатопрофільний лікувальний заклад Збройних Сил України. Признач. для надання кваліфіков. та окремих елементів спеціалізов. медичної допомоги пораненим, травмованим, ураженим або хворим військовослужбовцям та цивіл. особам у випадках, передбачених законодавством, а також їхньої евакуації у лікувал. заклади вищого рівня у мирний та воєн. час.', 'лік4.jpg'),
(4, 'Військово-медичний клінічний центр', 'Військово-медичний клінічний центр - є клінічним лікувально-профілактичним закладом, навчальною, методичною, науковою базою служби охорони здоров’я, що забезпечує надання послуг діагностичного, лікувального, профілактичного та реабілітаційного характеру військовослужбовцям, ветеранам військової служби та працівникам, а також іншим категоріям на умовах, визначених законодавством України.', 'лік7.jpg'),
(5, 'Національний військово-медичний клінічний центр «Головний військовий клінічний госпіталь»', 'Госпіталь є вагомим структурним підрозділом військової медицини, одним з найважливіших військово-медичних закладів України у загальнодержавній системі військових шпиталів. Є багатопрофільним клінічним, лікувально-діагностичним та науковим центром в якому лікуються військовослужбовці, ветерани Збройних Сил, та всі охочі цивільні пацієнти.\r\n\r\nЩороку у стаціонарі проходять лікування понад 30 тис. хворих та майже півмільйона пацієнтів отримують медичну допомогу амбулаторно, виконується близько 12 тис. складних хірургічних операцій.', 'лік8.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `poterp`
--

CREATE TABLE `poterp` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prynal` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `typePor` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `turniker` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `grKrow` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `poran` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `typeTran` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wPoran` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `chymEvak` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dodInfa` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gospit` int NOT NULL,
  `doctor` int NOT NULL,
  `stat` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `poterp`
--

INSERT INTO `poterp` (`id`, `name`, `surname`, `prynal`, `typePor`, `turniker`, `grKrow`, `poran`, `typeTran`, `wPoran`, `chymEvak`, `dodInfa`, `photo`, `gospit`, `doctor`, `stat`) VALUES
(1, NULL, NULL, 'Військовий', 'Вогнепальне', '12:01', '4+', ' Кістки Судини', ' Сидячи', 'ліва рука', 'Наземним транспортом', 'він виживе', 'vpr.jpg', 2, 1, 'Чоловік'),
(2, NULL, NULL, 'Військовий', 'Вогнепальне', '12:01', '4+', ' Кістки Судини', ' Сидячи', 'ліва рука', 'Наземним транспортом', 'він виживе', 'vpr.jpg', 2, 1, 'Чоловік'),
(3, NULL, NULL, 'Військовий', 'Вогнепальне', '12:01', '4+', ' Кістки Судини', ' Сидячи', 'ліва рука', 'Наземним транспортом', 'він виживе', 'vpr.jpg', 2, 1, 'Чоловік');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `gospital`
--
ALTER TABLE `gospital`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `gospitDpv`
--
ALTER TABLE `gospitDpv`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `poterp`
--
ALTER TABLE `poterp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблиці `gospital`
--
ALTER TABLE `gospital`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `gospitDpv`
--
ALTER TABLE `gospitDpv`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `poterp`
--
ALTER TABLE `poterp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
