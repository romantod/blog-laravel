-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 17 2026 г., 08:37
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog_laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Информационные технологии', 'PHP и Laravel - путь к мечте и разработке', '2026-03-15 22:47:31', '2026-03-15 22:47:31'),
(3, 'PHP', 'PHP и Laravel - путь к мечте и разработке', '2026-03-15 22:55:45', '2026-03-15 22:55:45'),
(4, 'Новости', 'Обзор новостей', '2026-03-15 23:12:02', '2026-03-15 23:12:02'),
(5, 'Спорт', 'Обзор спортивных достижений', '2026-03-15 23:12:19', '2026-03-15 23:12:19'),
(6, 'Мемы', 'Обзор актуальных мемасов', '2026-03-15 23:12:36', '2026-03-15 23:12:36'),
(7, 'Крипта', 'Обзор актуальных скамов в крипте от популярного криптоаналитика Пеппы', '2026-03-15 23:13:22', '2026-03-15 23:13:22'),
(8, 'География', 'Путешествия по миру и обзор самых красивых мест', '2026-03-15 23:13:56', '2026-03-15 23:13:56'),
(9, 'Биология', 'Интересные лекции о физиологическом устройстве живых организмов', '2026-03-15 23:14:39', '2026-03-15 23:14:39'),
(10, 'История', 'Познавательные исторические лекции', '2026-03-15 23:14:55', '2026-03-15 23:14:55'),
(11, 'Экономика', 'Простыми словами о сложном', '2026-03-15 23:15:09', '2026-03-15 23:15:09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
