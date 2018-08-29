-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 29 2018 г., 18:27
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii_second`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(124) NOT NULL,
  `discription` varchar(512) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(124) NOT NULL,
  `img` varchar(124) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `discription`, `text`, `author`, `img`, `time`) VALUES
(5, 'Заголовок', 'гнглрири шидшлло', '<p>пролд ьтригшошщ</p>\r\n', 'Автор', '9LE0G3oNoEk.jpg', 1533157800),
(6, 'Заголовок 2', 'рпрголдто мог шгомлгнпшгроишм згрол', '<p>екст, в своем роде, состоит <em>из некоторого количества <a href=\"https://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B5%D0%B4%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5_(%D0%BB%D0%B8%D0%BD%D0%B3%D0%B2%D0%B8%D1%81%D1%82%D0%B8%D0%BA%D0%B0)\" title=\"Предложение (лингвистика)\">предложений</a></em>. Одно предложение, даже очень распространённое, сложное, текстом назвать нельзя, поскольку текст можно разделить на самостоятельные предложения, а части предложения сочетаются по законам <a href=\"https://ru.wikipedia.org/wiki/%D0%A1%D0%B8%D0%BD%D1%82%D0%B0%D0%BA%D1%81%D0%B8%D1%81\" title=\"Синтаксис\">синтаксиса</a> сложного предложения, но не текста.</p>\r\n\r\n<p><em>Главный тезис</em>&nbsp;&mdash; текст состоит из двух или более предложений.</p>\r\n', 'Автор 2', '0_929e4_ce938098_XL.jpg', 1533871800),
(7, 'Заголовок 3', 'гпншгрлот гнопишригп мглм мго мор мгд мго ', '<h3>Смысловая цельность текста</h3>\r\n\r\n<div class=\"dablink noprint\">Основная статья: <strong><a href=\"https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%B3%D0%B5%D1%80%D0%B5%D0%BD%D1%82%D0%BD%D0%BE%D1%81%D1%82%D1%8C_(%D0%BB%D0%B8%D0%BD%D0%B3%D0%B2%D0%B8%D1%81%D1%82%D0%B8%D0%BA%D0%B0)\" title=\"Когерентность (лингвистика)\">Когерентность (лингвистика)</a></strong></div>\r\n\r\n<div class=\"dablink noprint\">Основная статья: <strong><a href=\"https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%B3%D0%B5%D0%B7%D0%B8%D1%8F_(%D0%BB%D0%B8%D0%BD%D0%B3%D0%B2%D0%B8%D1%81%D1%82%D0%B8%D0%BA%D0%B0)\" title=\"Когезия (лингвистика)\">Когезия (лингвистика)</a></strong></div>\r\n\r\n<p>В смысловой цельности текста отражаются те связи и зависимости, которые имеются в самой действительности (общественные события, явления <a href=\"https://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B8%D1%80%D0%BE%D0%B4%D0%B0\" title=\"Природа\">природы</a>, <a href=\"https://ru.wikipedia.org/wiki/%D0%A7%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA\" title=\"Человек\">человек</a>, его внешний облик и <a href=\"https://ru.wikipedia.org/wiki/%D0%92%D0%BD%D1%83%D1%82%D1%80%D0%B5%D0%BD%D0%BD%D0%B8%D0%B9_%D0%BC%D0%B8%D1%80\" title=\"Внутренний мир\">внутренний мир</a>, предметы неживой природы и&nbsp;т.&nbsp;д.).</p>\r\n\r\n<p>Единство предмета речи&nbsp;&mdash; это тема высказывания. Тема&nbsp;&mdash; это <em>смысловое ядро текста, конденсированное и обобщённое содержание текста</em>.</p>\r\n\r\n<p>Понятие &laquo;содержание высказывания&raquo; связано с категорией информативности речи и присуще только тексту. Оно сообщает читателю индивидуально-авторское понимание отношений между явлениями, их значимости во всех сферах придают ему смысловую цельность.</p>\r\n\r\n<p>В большом тексте ведущая тема распадается на ряд составляющих подтем; подтемы членятся на более дробные, на абзацы (микротемы).</p>\r\n', 'Автор 22', '0_92686_d8825edb_XL.jpg', 1533256500),
(8, 'Заголовок 4', 'олишг гни гдги гнрм гм грм гнр м нгрм нгрм ', '<p>Завершённость высказывания связана со смысловой цельностью текста. Показателем законченности текста является возможность подобрать к нему <a class=\"mw-redirect\" href=\"https://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%B3%D0%BE%D0%BB%D0%BE%D0%B2%D0%BE%D0%BA\" title=\"Заголовок\">заголовок</a>, отражающий его содержание.</p>\r\n\r\n<p>Таким образом, из смысловой цельности текста вытекают следующие признаки текста:</p>\r\n\r\n<ul>\r\n	<li>Текст&nbsp;&mdash; это высказывание на определённую тему;</li>\r\n	<li>В тексте реализуется <a class=\"new\" href=\"https://ru.wikipedia.org/w/index.php?title=%D0%97%D0%B0%D0%BC%D1%8B%D1%81%D0%B5%D0%BB&amp;action=edit&amp;redlink=1\" title=\"Замысел (страница отсутствует)\">замысел</a> говорящего, основная мысль;</li>\r\n	<li>Текст любого размера&nbsp;&mdash; это относительно автономное (законченное) высказывание;</li>\r\n	<li>Предложения логически связаны между собой;</li>\r\n	<li>К тексту можно подобрать <a class=\"mw-redirect\" href=\"https://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%B3%D0%BE%D0%BB%D0%BE%D0%B2%D0%BE%D0%BA\" title=\"Заголовок\">заголовок</a>;</li>\r\n	<li>Правильно оформленный текст обычно имеет начало и конец.</li>\r\n</ul>\r\n', 'Автор 221', '0b23a54624ca0dd7d0b2c363a0eec562.jpg', 1533256500),
(9, 'Заголовок 5', 'шпи пшпи пн шп нг пнг п шг шг пидг п днм нднм ', '<h3>Функциональные стили</h3>\r\n\r\n<div class=\"dablink noprint\">Основная статья: <strong><a class=\"mw-redirect\" href=\"https://ru.wikipedia.org/wiki/%D0%A4%D1%83%D0%BD%D0%BA%D1%86%D0%B8%D0%BE%D0%BD%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9_%D1%81%D1%82%D0%B8%D0%BB%D1%8C_%D1%80%D0%B5%D1%87%D0%B8\" title=\"Функциональный стиль речи\">Функциональный стиль речи</a></strong></div>\r\n\r\n<ul>\r\n	<li><a href=\"https://ru.wikipedia.org/wiki/%D0%9D%D0%B0%D1%83%D1%87%D0%BD%D1%8B%D0%B9_%D1%81%D1%82%D0%B8%D0%BB%D1%8C\" title=\"Научный стиль\">научный стиль</a></li>\r\n	<li><a href=\"https://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D0%B7%D0%B3%D0%BE%D0%B2%D0%BE%D1%80%D0%BD%D1%8B%D0%B9_%D1%81%D1%82%D0%B8%D0%BB%D1%8C\" title=\"Разговорный стиль\">разговорный стиль</a></li>\r\n	<li><a href=\"https://ru.wikipedia.org/wiki/%D0%A5%D1%83%D0%B4%D0%BE%D0%B6%D0%B5%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D0%BD%D1%8B%D0%B9_%D1%81%D1%82%D0%B8%D0%BB%D1%8C\" title=\"Художественный стиль\">художественный стиль</a></li>\r\n	<li><a href=\"https://ru.wikipedia.org/wiki/%D0%9F%D1%83%D0%B1%D0%BB%D0%B8%D1%86%D0%B8%D1%81%D1%82%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B9_%D1%81%D1%82%D0%B8%D0%BB%D1%8C\" title=\"Публицистический стиль\">публицистический стиль</a></li>\r\n	<li><a href=\"https://ru.wikipedia.org/wiki/%D0%9E%D1%84%D0%B8%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE-%D0%B4%D0%B5%D0%BB%D0%BE%D0%B2%D0%BE%D0%B9_%D1%81%D1%82%D0%B8%D0%BB%D1%8C\" title=\"Официально-деловой стиль\">официально-деловой стиль</a></li>\r\n</ul>\r\n\r\n<h3>По типу</h3>\r\n\r\n<ul>\r\n	<li><a class=\"mw-redirect\" href=\"https://ru.wikipedia.org/wiki/%D0%9F%D0%BE%D0%B2%D0%B5%D1%81%D1%82%D0%B2%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5\" title=\"Повествование\">повествование</a></li>\r\n	<li><a href=\"https://ru.wikipedia.org/wiki/%D0%9E%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5\" title=\"Описание\">описание</a></li>\r\n	<li><a class=\"mw-disambig\" href=\"https://ru.wikipedia.org/wiki/%D0%A0%D0%B0%D1%81%D1%81%D1%83%D0%B6%D0%B4%D0%B5%D0%BD%D0%B8%D0%B5\" title=\"Рассуждение\">рассуждение</a></li>\r\n</ul>\r\n', 'Автор 2211', '828-5-f.jpg', 1533180900),
(10, 'Заголовок 10', 'bhhiujknj hoihb ;hoilkn b;ohlikn b; h', '<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n\r\n<p>ihoijkn jbhpi;k nbjhvgu h&#39;pj;kn jbuoh&#39; pjol;nk jh jo[</p>\r\n', 'Автор', '11123.jpg', 1533313200),
(11, 'Заголовок 11', 'hkjn ib ub ouyhb ouhyb yuo byuo by ', '<p>hkjn ib ub ouyhb ouhyb yuo byuo by hkjn ib ub ouyhb ouhyb yuo byuo by hkjn ib ub ouyhb ouhyb yuo byuo by hkjn ib ub ouyhb ouhyb yuo byuo by hkjn ib ub ouyhb ouhyb yuo byuo by</p>\r\n\r\n<p>hkjn ib ub ouyhb ouhyb yuo byuo by hkjn ib ub ouyhb ouhyb yuo byuo by hkjn ib ub ouyhb ouhyb yuo byuo by</p>\r\n\r\n<p>hkjn ib ub ouyhb ouhyb yuo byuo by</p>\r\n\r\n<p>hkjn ib ub ouyhb ouhyb yuo byuo by</p>\r\n', 'Автор', '23431.jpg', 1533251400);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_catalog`
--

CREATE TABLE `shop_catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(124) NOT NULL,
  `id_catalog` int(11) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_catalog`
--

INSERT INTO `shop_catalog` (`id`, `name`, `id_catalog`, `active`) VALUES
(1, 'Первый каталог', 0, 1),
(3, 'Подкаталог 1', 1, 1),
(4, 'Второй ред', 0, 0),
(5, 'Третий', 0, 1),
(6, 'Четверный', 0, 1),
(7, 'Пятый', 0, 1),
(8, 'шестой', 0, 1),
(9, 'седьмой', 0, 1),
(10, 'восьмой', 0, 1),
(11, 'Девятый', 0, 1),
(12, 'десятый', 0, 1),
(13, 'Одинадцатый', 0, 1),
(14, 'Подкаталог 2', 1, 1),
(15, 'Подкаталог 3', 1, 1),
(16, 'Подкаталог 4', 1, 0),
(17, 'Подкаталог 5', 1, 1),
(18, 'Подкаталог 6', 1, 1),
(19, 'Подкаталог 7', 1, 1),
(20, 'Подкаталог 8', 1, 1),
(21, 'Подкаталог 9', 1, 1),
(22, 'Подкаталог 10', 1, 1),
(23, 'Подкаталог 11', 1, 1),
(24, 'Тест второго ред', 4, 1),
(31, 'Второй каталог', 0, 1),
(32, 'Первый каталог', 0, 1),
(33, 'восьмой', 0, 0),
(34, 'Второй каталог', 0, 0),
(35, 'восьмой', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_product`
--

CREATE TABLE `shop_product` (
  `id` int(11) NOT NULL,
  `name` varchar(124) NOT NULL,
  `img` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `vendor_code` varchar(121) NOT NULL,
  `price` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `id_catalog` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_product`
--

INSERT INTO `shop_product` (`id`, `name`, `img`, `description`, `vendor_code`, `price`, `time`, `id_catalog`, `active`) VALUES
(2, 'Название 2', '0_77d33_ccb291cc_XL.jpg', '<p>ng кепмм кпмпкм км км пкпм пк пмк</p>\r\n', '211', 211, 0, 3, 1),
(3, 'Стиральная машина Samsung WF60F1R0H0W', '9LE0G3oNoEk.jpg', '<p>bjkn n onou hn ihn hihn ip jhi hn ih j p</p>\r\n', '22222', 22222, 1262305980, 3, 0),
(4, 'Стиральная машина Hotpoint-Ariston VMSG 601 B', '0b23a54624ca0dd7d0b2c363a0eec562.jpg', '<ul>\r\n	<li>отдельно стоящая стиральная машина</li>\r\n	<li>60x40x85 см</li>\r\n	<li>фронтальная загрузка</li>\r\n	<li>загрузка: 6 кг</li>\r\n	<li>класс энергопотребления: A+</li>\r\n</ul>\r\n', 'павв', 2121, 0, 3, 1),
(5, 'Стиральная машина Whirlpool FWSG 61053 WV', '632018_900.jpg', '<ul>\r\n	<li>отдельно стоящая стиральная машина</li>\r\n	<li>60x44x84 см</li>\r\n	<li>фронтальная загрузка</li>\r\n	<li>загрузка: 6 кг</li>\r\n	<li>класс энергопотребления: A+++</li>\r\n</ul>\r\n', 'масф', 3333, 0, 3, 1),
(6, 'Стиральная машина LG F-2J5NN4L', '632018_900.jpg', '<div class=\"n-snippet-card2__reasons-to-buy-item\">\r\n<div class=\"n-reasons-to-buy n-reasons-to-buy_type_best b-zone b-spy-visible i-bem n-reasons-to-buy_tag_best n-reasons-to-buy_js_inited b-spy-visible_js_inited b-zone_js_inited\">\r\n<div class=\"n-reasons-to-buy__content\">Покупателям нравится Качество стирки, низкий уровень шума</div>\r\n</div>\r\n</div>\r\n\r\n<ul>\r\n	<li>отдельно стоящая стиральная машина</li>\r\n	<li>60x54x85 см</li>\r\n	<li>фронтальная загрузка</li>\r\n	<li>загрузка: 7 кг</li>\r\n	<li>класс энергопотребления: A</li>\r\n</ul>\r\n', 'кеик', 2121, 0, 3, 1),
(7, 'Стиральная машина BEKO WKB 61031 PTYA', '1483090116196471405.png', '<ul>\r\n	<li>отдельно стоящая стиральная машина</li>\r\n	<li>60x42x85 см</li>\r\n	<li>фронтальная загрузка</li>\r\n	<li>загрузка: 6 кг</li>\r\n	<li>класс энергопотребления: A</li>\r\n</ul>\r\n', '2111', 21, 0, 3, 1),
(8, 'Стиральная машина BEKO WKB 61001 Y', 'igry-sneg-stalker_stalker-zima-18979.jpg', '<ul>\r\n	<li>отдельно стоящая стиральная машина</li>\r\n	<li>60x42x84 см</li>\r\n	<li>фронтальная загрузка</li>\r\n	<li>загрузка: 6 кг</li>\r\n	<li>класс энергопотребления: A</li>\r\n</ul>\r\n', '22222', 2121, 0, 3, 1),
(9, 'Название2', 'igry-sneg-stalker_stalker-zima-18979.jpg', '<p>ntythrgf</p>\r\n', '211', 2121, 1535127779, 1, 1),
(10, 'неактив', '1483090116196471405.png', '<p>ьктенкеикма</p>\r\n', '2111', 2121, 1535129467, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img` varchar(121) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `img`, `description`, `time`) VALUES
(10, '828-5-f.jpg', 'Описание картинки номер один', 946684800),
(11, 'IMG_20180720_120823_BURST002.jpg', 'описание второй картинки', 0),
(12, 'rPY9fLeuodM.jpg', 'Опишем так же картинку №3', 0),
(13, 'bV4Xb2lLVag.jpg', 'Описание еще одно', 0),
(14, 'IMG_20180720_120908.jpg', 'тест добавления новой картинки', 0),
(15, '0b23a54624ca0dd7d0b2c363a0eec562.jpg', 'какое-то описание', 0),
(16, '632018_900.jpg', 'новая картинка', 0),
(17, '1483090116196471405.png', 'Еще 1 картинка', 0),
(18, 'igry-sneg-stalker_stalker-zima-18979.jpg', 'и еще картинка', 0),
(19, 'anywalls.com-11776.jpg', 'картинкааааа', 0),
(20, 'pripyat-amusement-park-15820.jpg', 'последняя ', 0),
(21, '25_3730.jpg', 'картинка с датой', 1514754000),
(22, '511464963.jpg', 'картинка с временем', 1518037200),
(23, '9LE0G3oNoEk.jpg', 'trfytguhujnbhgvftyyuhij', 1533074400);

-- --------------------------------------------------------

--
-- Структура таблицы `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `title` varchar(112) NOT NULL,
  `text` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `text`
--

INSERT INTO `text` (`id`, `title`, `text`, `time`) VALUES
(1, 'История Yii2 - тест изменения', '<p><strong>Текст</strong> (от <a href=\"https://ru.wikipedia.org/wiki/%D0%9B%D0%B0%D1%82%D0%B8%D0%BD%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA\" title=\"Латинский язык\">лат.</a>&nbsp;<em>textus</em>&nbsp;&mdash; ткань; сплетение, сочетание)&nbsp;&mdash; зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.</p>\r\n\r\n<p>Существуют две основные трактовки понятия &laquo;текст&raquo;: <em>имманентная</em> (расширенная, философски нагруженная) и <em>репрезентативная</em> (более частная). <a href=\"https://ru.wikipedia.org/wiki/%D0%98%D0%BC%D0%BC%D0%B0%D0%BD%D0%B5%D0%BD%D1%82%D0%BD%D0%BE%D1%81%D1%82%D1%8C\" title=\"Имманентность\">Имманентный</a> подход подразумевает отношение к тексту как к автономной реальности, нацеленность на выявление его внутренней структуры. <a href=\"https://ru.wikipedia.org/wiki/%D0%A0%D0%B5%D0%BF%D1%80%D0%B5%D0%B7%D0%B5%D0%BD%D1%82%D0%B0%D1%86%D0%B8%D1%8F\" title=\"Репрезентация\">Репрезентативный</a>&nbsp;&mdash; рассмотрение текста как особой формы представления знаний о внешней тексту действительности.</p>\r\n\r\n<p>В <a href=\"https://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D0%BD%D0%B3%D0%B2%D0%B8%D1%81%D1%82%D0%B8%D0%BA%D0%B0\" title=\"Лингвистика\">лингвистике</a> термин &laquo;текст&raquo; используется в широком значении, включая и образцы <a href=\"https://ru.wikipedia.org/wiki/%D0%A3%D1%81%D1%82%D0%BD%D0%B0%D1%8F_%D1%80%D0%B5%D1%87%D1%8C\" title=\"Устная речь\">устной речи</a>. <a href=\"https://ru.wikipedia.org/wiki/%D0%92%D0%BE%D1%81%D0%BF%D1%80%D0%B8%D1%8F%D1%82%D0%B8%D0%B5\" title=\"Восприятие\">Восприятие</a> текста изучается в рамках <a class=\"new\" href=\"https://ru.wikipedia.org/w/index.php?title=%D0%9B%D0%B8%D0%BD%D0%B3%D0%B2%D0%B8%D1%81%D1%82%D0%B8%D0%BA%D0%B0_%D1%82%D0%B5%D0%BA%D1%81%D1%82%D0%B0&amp;action=edit&amp;redlink=1\" title=\"Лингвистика текста (страница отсутствует)\">лингвистики текста</a> и <a href=\"https://ru.wikipedia.org/wiki/%D0%9F%D1%81%D0%B8%D1%85%D0%BE%D0%BB%D0%B8%D0%BD%D0%B3%D0%B2%D0%B8%D1%81%D1%82%D0%B8%D0%BA%D0%B0\" title=\"Психолингвистика\">психолингвистики</a>. Так, например, И.&nbsp;Р.&nbsp;Гальперин определяет текст следующим образом: &laquo;это письменное сообщение, объективированное в виде письменного документа, состоящее из ряда высказываний, объединённых разными типами лексической, грамматической и логической связи, имеющее определённый моральный характер, прагматическую установку и соответственно литературно обработанное&raquo;<sup><a href=\"https://ru.wikipedia.org/wiki/%D0%A2%D0%B5%D0%BA%D1%81%D1%82#cite_note-1\">[1]</a></sup>.</p>\r\n', 1533771000);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$13$0WG.w5ugi5PBYjty7YlVmuMuexWqSmzTTvlDKRy1PxyTd7hHJfnuK', 'admin'),
(2, 'user', '$2y$13$rDJdcTPqYqRCdXRc7PnLEO/sYRDxrbI3E2QQw7oUKu8C1F6gmEIlK', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop_catalog`
--
ALTER TABLE `shop_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop_product`
--
ALTER TABLE `shop_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `shop_catalog`
--
ALTER TABLE `shop_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `shop_product`
--
ALTER TABLE `shop_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
