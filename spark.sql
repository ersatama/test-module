-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2020 г., 06:18
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `spark`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `russian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kazakh_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `russian_name`, `kazakh_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'almaty', 'алматы', 'алматы', '2020-03-23 15:09:16', '2020-03-23 15:09:16'),
(2, 2, 'saint petersburg', 'санкт петербург', 'санкт петербург', '2020-03-23 15:09:16', '2020-03-23 15:09:16');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `russian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kazakh_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `short_name`, `name`, `russian_name`, `kazakh_name`, `created_at`, `updated_at`) VALUES
(1, 'kz', 'kazakstan', 'казахстан', 'казакстан', '2020-03-23 14:53:09', '2020-03-23 14:53:09'),
(2, 'ru', 'russian', 'россия', 'ресей', '2020-03-23 14:53:09', '2020-03-23 14:53:09');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_03_13_074147_create_cities_table', 1),
(6, '2020_03_13_074224_create_countries_table', 1),
(8, '2020_03_26_165058_create_receiver_templates_table', 3),
(11, '2020_03_03_084444_create_orders_table', 4),
(12, '2020_03_25_090722_create_templates_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` smallint(6) NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` smallint(6) NOT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `take_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `take_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user`, `name`, `iin`, `country`, `region`, `city`, `index`, `street`, `house`, `office`, `person_name`, `person_phone`, `take_date`, `take_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ersa', '940603300487', 1, 'asdasd', 1, NULL, 'asdasd', 'adsasd', NULL, 'ads', 'asd', '2020-01-01', 'dfdsf', '2020-03-26 17:31:40', '2020-03-26 17:31:40'),
(2, 1, 'Ersa', '940603300487', 1, 'asdasd', 1, NULL, 'adsasd', 'asdasd', NULL, 'ads', 'asd', '2020-01-01', 'dfdsf', '2020-03-26 17:32:14', '2020-03-26 17:32:14'),
(3, 1, 'Ersa', '940603300487', 1, 'asda', 1, NULL, 'asd', 'asd', NULL, 'ads', 'asd', '2020-01-01', 'dfdsf', '2020-03-26 17:32:43', '2020-03-26 17:32:43'),
(4, 1, 'Ersa', '940603300487', 1, 'asd', 1, 'asd', 'asd', 'asd', NULL, 'asd', 'asd', '2020-01-01', 'asdasd', '2020-03-26 17:44:47', '2020-03-26 17:44:47'),
(5, 1, 'Ersa', '940603300487', 1, 'ads', 1, NULL, 'asd', 'asd', NULL, 'ads', 'asd', '2020-01-01', 'asd', '2020-03-26 17:46:14', '2020-03-26 17:46:14'),
(6, 1, 'Ersa', '940603300487', 1, 'asdasd', 1, NULL, 'adsad', 'asd', NULL, 'ads', 'asd', '2020-01-01', 'asdasd', '2020-03-26 17:47:00', '2020-03-26 17:47:00'),
(7, 1, 'Ersa', '940603300487', 1, 'asd', 1, 'asd', 'asd', 'asd', NULL, 'asd', 'asdasd', '2020-01-01', 'adasd', '2020-03-26 17:48:29', '2020-03-26 17:48:29'),
(8, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'asd', 'asd', '2020-01-01', 'asdasd', '2020-03-26 17:53:28', '2020-03-26 17:53:28'),
(9, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'asd', 'asd', '2020-01-01', 'asdad', '2020-03-26 17:54:29', '2020-03-26 17:54:29'),
(10, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'asd', 'asd', '2020-01-01', 'ds', '2020-03-26 17:55:05', '2020-03-26 17:55:05'),
(11, 1, 'Ersa', '940603300487', 1, 'ads', 1, 'asd', 'ads', 'asd', NULL, 'ads', 'asd', '2020-01-01', 'ads', '2020-03-26 17:56:02', '2020-03-26 17:56:02'),
(12, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'ads', 'asd', '2020-01-01', 'ads', '2020-03-26 17:56:36', '2020-03-26 17:56:36'),
(13, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'ads', 'asd', '2020-01-01', 'ads', '2020-03-26 17:56:36', '2020-03-26 17:56:36'),
(14, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'asd', 'asd', '2020-01-01', 'ad', '2020-03-26 17:57:17', '2020-03-26 17:57:17'),
(15, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'asd', 'asd', '2020-01-01', 'asdasd', '2020-03-26 17:58:00', '2020-03-26 17:58:00'),
(16, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'ads', 'asd', NULL, 'd', 'sd', '2020-01-01', 'asd', '2020-03-26 17:58:56', '2020-03-26 17:58:56'),
(17, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'sd', NULL, 'asd', 'asd', '2020-01-01', 'asd', '2020-03-26 18:00:01', '2020-03-26 18:00:01'),
(18, 1, 'Ersa', '940603300487', 1, 'asd', 1, 'asd', 'asd', 'asd', NULL, 'asd', 'asdasd', '2020-01-01', 'asd', '2020-03-26 18:01:09', '2020-03-26 18:01:09'),
(19, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'asd', 'ads', '2020-01-01', 'asdasd', '2020-03-26 18:11:30', '2020-03-26 18:11:30'),
(20, 1, 'Ersa', '940603300487', 1, 'asd', 1, NULL, 'asd', 'asd', NULL, 'asd', 'ads', '2020-01-01', 'asdasd', '2020-03-26 18:22:56', '2020-03-26 18:22:56'),
(21, 1, 'Ersa', '940603300487', 1, 'test', 1, 'test', 'test', 'test', NULL, 'test', 'tes', '2020-01-01', 'test', '2020-03-26 18:23:21', '2020-03-26 18:23:21'),
(22, 1, 'Ersa', '940603300487', 1, 'test', 1, 'test', 'test', 'test', NULL, 'test', 'tes', '2020-01-01', 'test', '2020-03-26 18:23:58', '2020-03-26 18:23:58'),
(23, 1, 'Ersa', '940603300487', 1, 'test', 1, 'test', 'test', 'test', NULL, 'test', 'tes', '2020-01-01', 'test', '2020-03-26 18:24:18', '2020-03-26 18:24:18');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `receiver_templates`
--

CREATE TABLE `receiver_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `receiver_templates`
--

INSERT INTO `receiver_templates` (`id`, `name`, `data`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', '', 1, '2020-03-26 16:56:59', '2020-03-26 16:56:59'),
(2, 'test-1', '', 1, '2020-03-26 16:56:59', '2020-03-26 16:56:59');

-- --------------------------------------------------------

--
-- Структура таблицы `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `templates`
--

INSERT INTO `templates` (`id`, `user`, `name`, `data`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '940603300487_0_27-03-2020_00:11', '{\"name\":\"Ersa\",\"iin\":\"940603300487\",\"country\":\"1\",\"region\":\"asd\",\"city\":1,\"index\":null,\"street\":\"asd\",\"house\":\"asd\",\"office\":null,\"person\":{\"name\":\"asd\",\"phone\":\"ads\",\"take_date\":\"2020-01-01\",\"take_time\":\"asdasd\"}}', 1, '2020-03-26 18:11:30', '2020-03-26 18:11:30'),
(2, 1, 'ersa', '{\"name\":\"Ersa\",\"iin\":\"940603300487\",\"country\":\"1\",\"region\":\"asd\",\"city\":1,\"index\":null,\"street\":\"asd\",\"house\":\"asd\",\"office\":null,\"person\":{\"name\":\"asd\",\"phone\":\"ads\",\"take_date\":\"2020-01-01\",\"take_time\":\"asdasd\"}}', 1, '2020-03-26 18:22:56', '2020-03-26 18:22:56'),
(3, 1, 'test', '{\"name\":\"Ersa\",\"iin\":\"940603300487\",\"country\":\"1\",\"region\":\"test\",\"city\":1,\"index\":\"test\",\"street\":\"test\",\"house\":\"test\",\"office\":null,\"person\":{\"name\":\"test\",\"phone\":\"tes\",\"take_date\":\"2020-01-01\",\"take_time\":\"test\"}}', 1, '2020-03-26 18:23:21', '2020-03-26 18:23:21'),
(4, 1, 'bla bla', '{\"name\":\"Ersa\",\"iin\":\"940603300487\",\"country\":\"1\",\"region\":\"test\",\"city\":1,\"index\":\"test\",\"street\":\"test\",\"house\":\"test\",\"office\":\"bla bla\",\"person\":{\"name\":\"test\",\"phone\":\"tes\",\"take_date\":\"2020-01-01\",\"take_time\":\"test\"}}', 1, '2020-03-26 18:24:18', '2020-03-26 18:24:18');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'entity',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `status`, `name`, `iin`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'entity', 'Ersa', '940603300487', NULL, NULL, '$2y$10$lPDkOzs6Und2Wg1xGTuaJujuwWBcfmvWcmzpVrkscX9x7JyujoTGu', NULL, '2020-03-19 00:09:19', '2020-03-19 00:09:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `receiver_templates`
--
ALTER TABLE `receiver_templates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `templates`
--
ALTER TABLE `templates`
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
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `receiver_templates`
--
ALTER TABLE `receiver_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
