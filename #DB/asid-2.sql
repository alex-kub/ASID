-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.23 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных asid
CREATE DATABASE IF NOT EXISTS `asid` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `asid`;


-- Дамп структуры для таблица asid.fields
CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `id_project` int(255) unsigned NOT NULL,
  `id_image` int(255) unsigned NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `value` varchar(300) DEFAULT NULL,
  `verif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы asid.fields: ~20 rows (приблизительно)
/*!40000 ALTER TABLE `fields` DISABLE KEYS */;
INSERT INTO `fields` (`id`, `id_project`, `id_image`, `name`, `value`, `verif`) VALUES
	(31, 1, 104, 'fam', 'Майя\n\n', 'NULL'),
	(32, 1, 104, 'imja', 'Александровна\n\n', 'NULL'),
	(33, 1, 104, 'otch', 'Пустохина\n\n', 'NULL'),
	(34, 1, 105, 'fam', 'Кулагина\n\n', 'NULL'),
	(35, 1, 105, 'imja', 'Марина\n\n', 'NULL'),
	(36, 1, 105, 'otch', 'Васильевна\n\n', 'NULL'),
	(37, 1, 106, 'fam', 'Котерин\n\n', 'NULL'),
	(38, 1, 106, 'imja', 'Александр\n\n', 'NULL'),
	(73, 1, 119, 'date', '13.02.1976\n\n', NULL),
	(74, 1, 119, 'fam', 'Сафронова\n\n', NULL),
	(75, 1, 119, 'imja', 'Елена\n\n', NULL),
	(76, 1, 119, 'otch', 'Евгеньевна\n\n', NULL),
	(77, 1, 120, 'date', '12.12.1967у\n\n', NULL),
	(78, 1, 120, 'fam', 'Никольская\n\n', NULL),
	(79, 1, 120, 'imja', 'Маргарита\n\n', NULL),
	(80, 1, 120, 'otch', 'Юрьевна\n\n', NULL),
	(81, 1, 121, 'date', '18.11.1973\n\n', NULL),
	(82, 1, 121, 'fam', 'Бутыгина\n\n', NULL),
	(83, 1, 121, 'imja', 'Наталья\n\n', NULL),
	(84, 1, 121, 'otch', 'Вадимовна\n\n', NULL);
/*!40000 ALTER TABLE `fields` ENABLE KEYS */;


-- Дамп структуры для таблица asid.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `id_project` int(5) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы asid.images: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `id_project`, `id_user`, `name`, `update_at`, `created_at`) VALUES
	(104, 1, NULL, '1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(105, 1, NULL, '2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(106, 1, NULL, '3.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(119, 1, NULL, '1_02-02-2016_.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(120, 1, NULL, '2_02-02-2016_.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(121, 1, NULL, '3_02-02-2016_.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;


-- Дамп структуры для таблица asid.project
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `describe` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы asid.project: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`id`, `name`, `describe`, `path`, `created_at`, `update_at`) VALUES
	(1, 'Направление', 'Это тестовый проект', 'test_proj', '0000-00-00 00:00:00', '2015-12-16 15:25:33'),
	(2, 'Новый проект', 'Новый тестовый проект', 'new_test_proj', '0000-00-00 00:00:00', '2015-12-16 15:25:33');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


-- Дамп структуры для таблица asid.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `activationCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_isactive_index` (`isActive`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы asid.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
