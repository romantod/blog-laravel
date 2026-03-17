-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 17 2026 г., 08:03
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
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_11_030812_create_posts_table', 2),
(5, '2026_03_13_153130_add_bio_to_users_table', 3),
(7, '2026_03_14_063056_add_excerpt_to_posts_table', 4),
(8, '2026_03_15_154328_create_categories_table', 5),
(9, '2026_03_15_160848_add_category_id_to_posts_table', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `created_at`, `updated_at`, `excerpt`, `category_id`) VALUES
(1, 'Мой первый трижды исправленный пост', 'Это содержимое трижды исправленного поста', 7, '2026-03-11 00:58:51', '2026-03-12 06:14:18', NULL, 0),
(3, 'Шпилюк', 'Кусается чукча', 2, '2026-03-11 05:26:36', '2026-03-16 05:46:09', NULL, 9),
(6, 'Васек', 'Я василий алибабаевич Я василий алибабаевич Я василий алибабаевич Я василий алибабаевич', 7, '2026-03-11 08:25:51', '2026-03-16 05:46:19', 'на танцполе', 4),
(7, 'Биология', 'Очень длинное содержание про жизнь различных небесных тел в космосе и разных живых организмов в мировом океане', 3, '2026-03-11 09:57:18', '2026-03-14 07:21:03', 'Пост про биологию и космос', 0),
(8, 'Дача', 'Новое утро - новый пост.\r\nУ меня есть отличная дача на Свободном в Октябрьском районе', 3, '2026-03-11 18:17:21', '2026-03-14 07:41:17', 'Земельный участок в СНТ Победа', 0),
(9, 'Очереди задач — Алексей Петров', 'Очереди позволяют откладывать выполнение тяжёлых задач на потом.', 15, '2026-03-15 07:09:41', '2026-03-16 05:56:49', 'Фоновые задачи', NULL),
(10, 'Очереди задач — Мария Иванова', 'Очереди позволяют откладывать выполнение тяжёлых задач на потом.', 16, '2026-03-15 07:09:41', '2026-03-16 05:45:19', 'Фоновые задачи', 9),
(11, 'Валидация форм — Мария Иванова', 'Laravel предоставляет удобные инструменты для валидации входящих данных.', 16, '2026-03-15 07:09:41', '2026-03-15 07:09:41', 'Проверка данных', 0),
(12, 'Blade шаблоны — Дмитрий Сидоров', 'Blade — это простой но мощный шаблонизатор Laravel.', 17, '2026-03-15 07:09:41', '2026-03-16 05:45:27', 'Шаблонизатор Laravel', 10),
(13, 'Маршрутизация в Laravel — Дмитрий Сидоров', 'Маршруты определяют как приложение отвечает на HTTP запросы.', 17, '2026-03-15 07:09:41', '2026-03-16 05:45:35', 'HTTP маршруты', 7),
(14, 'Eloquent ORM — Дмитрий Сидоров', 'Eloquent — это ORM встроенный в Laravel для работы с базой данных.', 17, '2026-03-15 07:09:41', '2026-03-16 05:45:45', 'Работа с базой данных', 4),
(15, 'Очереди задач — Елена Козлова', 'Очереди позволяют откладывать выполнение тяжёлых задач на потом.', 18, '2026-03-15 07:09:41', '2026-03-16 05:45:52', 'Фоновые задачи', 11),
(16, 'Blade шаблоны — Сергей Новиков', 'Blade — это простой но мощный шаблонизатор Laravel.', 19, '2026-03-15 07:09:41', '2026-03-15 07:09:41', 'Шаблонизатор Laravel', 0),
(17, 'Введение в Laravel — Сергей Новиков', 'Laravel — это PHP фреймворк для веб-разработки с красивым синтаксисом.', 19, '2026-03-15 07:09:41', '2026-03-16 05:46:45', 'Знакомство с Laravel', 3),
(18, 'Введение в Laravel — Сергей Новиков', 'Laravel — это PHP фреймворк для веб-разработки с красивым синтаксисом.', 19, '2026-03-15 07:09:41', '2026-03-15 07:09:41', 'Знакомство с Laravel', 0),
(19, 'Бурж Халифа', 'Самая высокая башня построена в Дубае', 7, '2026-03-16 02:24:34', '2026-03-16 02:24:34', 'Башня в ОАЭ', 11),
(20, 'Большой теннис', 'Новак Джокович обыграл Янника Синнера в двадцатый раз на турнире Большого Шлема в Австралии', 13, '2026-03-16 05:12:57', '2026-03-16 05:12:57', 'Новак Джокович - чемпион', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1H97uQSepmaIv9ZLaExN35xOCiZ63BLCQFjq2mfY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFFPc1RFZkd6QU16Sk9KUDAwMFlUaXkzaDlTdDhVWGJBNExCSElWeiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Njc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0cz9jYXRlZ29yeV9pZD0mc2VhcmNoPSZzb3J0PW5hbWUmdXNlcl9pZD0iO3M6NToicm91dGUiO3M6MTE6InBvc3RzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773682920),
('mNc9oJnJnsasTqD1h0P9fNzKjM0hsx2vKbkRxSw0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianFHbEVtbmhlVGhKbHNHblNlYUQxSFFoWmlGNXVTZWNyejdKS2NwRyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0cyI7czo1OiJyb3V0ZSI7czoxMToicG9zdHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1773708970);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `bio`) VALUES
(1, 'Иван Иванов Иванович', 'ivan@example.com', NULL, '$2y$12$zCsJjTesPvSvN96nczEQQeTRfipatfi5gj6G/YcE1DFNpeG0PRwLu', NULL, '2026-03-10 08:53:15', '2026-03-13 18:14:39', 'У меня самая типичная фамилия'),
(2, 'Roman', 'rrr@mail.ru', NULL, '$2y$12$00/GLtGt1VjnpTO3xTVAbeMw2vn5Fejwf5eY2HZVEfLLbBVG/FfXa', NULL, '2026-03-10 09:45:00', '2026-03-14 07:42:33', 'Минусинск'),
(3, 'Саня', 'gera@gmail.com', NULL, '$2y$12$kPxyi.8PSmkWcqwkGSvWz.STb/J.wbx6VqasOh2uPsEpM7s4UlfpC', NULL, '2026-03-10 18:56:42', '2026-03-10 18:56:42', NULL),
(7, 'Василий', 'vasil@gmail.com', NULL, '$2y$12$qmIfPQnuIu0B6RX2rWkeBuSavzoab4G2HUFD2mbhpSH9wLMlXZE.O', NULL, '2026-03-11 08:23:43', '2026-03-14 04:30:39', 'Васек'),
(12, 'Валера', 'val@hh.ru', NULL, '$2y$12$ZvGUb1nkB6TjXn23BuYUa.Anm3ydL6uJSAiLb.b2eA8CBKELspb0C', NULL, '2026-03-13 20:07:47', '2026-03-13 20:07:47', 'У меня есть гараж, вахта и Дустер'),
(13, 'Андрей', 'klen@hh.com', NULL, '$2y$12$JBXHY0p6xRiBQlEkYwDwyu7IGr2Rez7MgP4CwUjBSQhynMmRMzNG.', NULL, '2026-03-13 20:09:10', '2026-03-16 05:14:05', 'Кириково'),
(14, 'Игорь', 'igor@hh.ru', NULL, '$2y$12$1YzXb1Wt1Tg2kiH6RUDtLu98MwP/lpSmV7PO6tEjDickWeuWccI9S', NULL, '2026-03-15 01:05:43', '2026-03-15 01:05:43', 'Игорек-чувачок'),
(15, 'Алексей Петров', 'alexey@mail.com', NULL, '$2y$12$GbT.4aqzLd6su25C0XcJHO1wX01fP.XnR/FxwgOphCPA3gXXeIYRe', NULL, '2026-03-15 07:09:40', '2026-03-15 07:09:40', 'Разработчик PHP и Laravel'),
(16, 'Мария Иванова', 'maria@mail.com', NULL, '$2y$12$O0t0a54Y6In88JLog03DOuykMkawnkryLcDU6hSKhu4ltBBGvomuC', NULL, '2026-03-15 07:09:41', '2026-03-15 07:09:41', 'Фронтенд разработчик'),
(17, 'Дмитрий Сидоров', 'dmitry@mail.com', NULL, '$2y$12$Dek4m/4lLlScu97vU.gYb.3U1ruh3nDqeG8qP1sbskHJDfxoUKdXa', NULL, '2026-03-15 07:09:41', '2026-03-15 07:09:41', 'Fullstack разработчик'),
(18, 'Елена Козлова', 'elena@mail.com', NULL, '$2y$12$HFHkzhJcyQsr8m0zbWzKdu3ZZ0h3ZN0D2P8RBFpNRnh3xYx34k1iG', NULL, '2026-03-15 07:09:41', '2026-03-15 07:09:41', 'UI/UX дизайнер'),
(19, 'Сергей Новиков', 'sergey@mail.com', NULL, '$2y$12$4.RqaqeqWWgBm67KGk5/QeiR.viyaRUCvy6eE/qrATbvSOqzUXxO2', NULL, '2026-03-15 07:09:41', '2026-03-15 07:09:41', 'DevOps инженер');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
