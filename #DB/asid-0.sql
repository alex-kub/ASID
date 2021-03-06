-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.23 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных asid
CREATE DATABASE IF NOT EXISTS `asid` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `asid`;


-- Дамп структуры для таблица asid.data_field
CREATE TABLE IF NOT EXISTS `data_field` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `id_proj` int(255) unsigned NOT NULL,
  `id_image` int(255) unsigned NOT NULL,
  `name_field` varchar(200) DEFAULT NULL,
  `value` varchar(300) DEFAULT NULL,
  `verif` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы asid.data_field: ~18 rows (приблизительно)
DELETE FROM `data_field`;
/*!40000 ALTER TABLE `data_field` DISABLE KEYS */;
INSERT INTO `data_field` (`id`, `id_proj`, `id_image`, `name_field`, `value`, `verif`) VALUES
	(1, 1, 90, 'fam', 'Кулагина\n\n', 0),
	(2, 1, 90, 'imja', 'Марина\n\n', 0),
	(3, 1, 90, 'otch', 'Васильевна\n\n', 0),
	(4, 1, 91, 'fam', 'Котерин\n\n', 0),
	(5, 1, 91, 'imja', 'Александр\n\n', 0),
	(6, 1, 91, 'otch', 'Николаевич\n\n', 0),
	(7, 1, 92, 'fam', 'Пустохина\n\n', 0),
	(8, 1, 92, 'imja', 'Майя\n\n', 0),
	(9, 1, 92, 'otch', 'Александровна\n\n', 0),
	(10, 1, 93, 'fam', 'Бермегулы\n\n', 0),
	(11, 1, 93, 'imja', 'Али\n\n', 0),
	(12, 1, 93, 'otch', 'Зульбульоглы\n\n', 0),
	(13, 1, 94, 'fam', 'Кулагина\n\n', 0),
	(14, 1, 94, 'imja', 'Марина\n\n', 0),
	(15, 1, 94, 'otch', 'Васильевна\n\n', 0),
	(16, 1, 95, 'fam', 'Кулагина\n\n', 0),
	(17, 1, 95, 'imja', 'Марина\n\n', 0),
	(18, 1, 95, 'otch', 'Васильевна\n\n', 0);
/*!40000 ALTER TABLE `data_field` ENABLE KEYS */;


-- Дамп структуры для таблица asid.list_image
CREATE TABLE IF NOT EXISTS `list_image` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `id_proj` int(255) DEFAULT NULL,
  `checked` int(1) unsigned NOT NULL DEFAULT '0',
  `name_file` varchar(200) DEFAULT NULL,
  `recog` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `verif` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы asid.list_image: ~6 rows (приблизительно)
DELETE FROM `list_image`;
/*!40000 ALTER TABLE `list_image` DISABLE KEYS */;
INSERT INTO `list_image` (`id`, `id_proj`, `checked`, `name_file`, `recog`, `verif`, `update_at`, `created_at`) VALUES
	(90, 1, 0, '2.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(91, 1, 0, '3.png', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(92, 1, 0, '1.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(93, 1, 0, '10.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(94, 1, 0, '2.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(95, 1, 0, '2.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `list_image` ENABLE KEYS */;


-- Дамп структуры для таблица asid.project
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `describe` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы asid.project: ~2 rows (приблизительно)
DELETE FROM `project`;
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
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
