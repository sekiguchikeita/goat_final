-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 7 月 13 日 08:21
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--
CREATE DATABASE IF NOT EXISTS `gs_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `gs_db`;

-- --------------------------------------------------------

--
-- テーブルの構造 `detail_summary1`
--

CREATE TABLE `detail_summary1` (
  `id` int(12) NOT NULL,
  `lid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `taskid` int(64) NOT NULL,
  `total_today` int(64) NOT NULL,
  `total_stopwatch` int(64) NOT NULL,
  `achievement` int(12) NOT NULL,
  `tag` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` int(12) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `detail_summary1`
--

INSERT INTO `detail_summary1` (`id`, `lid`, `taskid`, `total_today`, `total_stopwatch`, `achievement`, `tag`, `display`, `indate`) VALUES
(1, 'testid1', 0, 0, 0, 0, 'php', 0, '2020-07-08 12:40:36'),
(2, 'testid1', 0, 0, 0, 10, 'python', 0, '2020-07-08 12:40:36'),
(3, 'testid1', 0, 0, 0, 12, 'python', 0, '2020-07-08 12:40:36'),
(4, 'testid1', 0, 0, 0, 499, 'php', 0, '2020-07-08 12:40:36'),
(77, 'testid1', 17, 12, 1798, 0, 'php', 0, '2020-07-08 19:56:49'),
(78, 'testid1', 8, 5, 1798, 10, 'python', 0, '2020-07-08 19:56:49'),
(79, 'testid1', 7, 8, 3599, 12, 'python', 0, '2020-07-08 19:56:49'),
(80, 'testid1', 1, 2, 35961, 499, 'php', 0, '2020-07-08 19:56:49'),
(81, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 15:25:02'),
(82, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 15:25:02'),
(83, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 15:25:02'),
(84, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 15:25:34'),
(85, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 15:25:34'),
(86, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 15:25:34'),
(87, 'testid1', 19, 3, 0, 0, 'Java', 0, '2020-07-08 15:53:29'),
(88, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 15:53:29'),
(89, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 15:53:29'),
(90, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 15:53:29'),
(91, 'testid1', 1, 8, 0, 0, 'Go', 0, '2020-07-08 15:53:29'),
(92, 'testid1', 19, 3, 8, 0, 'Java', 0, '2020-07-08 16:15:53'),
(93, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 16:15:53'),
(94, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 16:15:53'),
(95, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 16:15:53'),
(96, 'testid1', 1, 8, 0, 0, 'Go', 0, '2020-07-08 16:15:53'),
(97, 'testid1', 19, 3, 8, 0, 'Java', 0, '2020-07-08 16:27:54'),
(98, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 16:27:54'),
(99, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 16:27:54'),
(100, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 16:27:54'),
(101, 'testid1', 1, 10, 0, 0, 'Go', 0, '2020-07-08 16:27:54'),
(102, 'testid1', 21, 5, 0, 0, 'python', 0, '2020-07-08 16:35:15'),
(103, 'testid1', 19, 3, 8, 0, 'Java', 0, '2020-07-08 16:35:15'),
(104, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 16:35:15'),
(105, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 16:35:15'),
(106, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 16:35:15'),
(107, 'testid1', 1, 10, 0, 0, 'Go', 0, '2020-07-08 16:35:15'),
(108, 'testid1', 21, 5, 0, 0, 'python', 0, '2020-07-08 16:48:33'),
(109, 'testid1', 19, 3, 8, 0, 'Java', 0, '2020-07-08 16:48:33'),
(110, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 16:48:33'),
(111, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 16:48:33'),
(112, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 16:48:33'),
(113, 'testid1', 1, 10, 0, 0, 'Go', 0, '2020-07-08 16:48:33'),
(114, 'testid1', 21, 5, 0, 0, 'python', 0, '2020-07-08 17:58:20'),
(115, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 17:58:20'),
(116, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 17:58:20'),
(117, 'testid1', 19, 3, 8, 0, 'Java', 0, '2020-07-08 17:58:20'),
(118, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 17:58:20'),
(119, 'testid1', 1, 10, 0, 0, 'Go', 0, '2020-07-08 17:58:20'),
(120, 'testid1', 21, 5, 0, 0, 'python', 0, '2020-07-08 18:19:36'),
(121, 'testid1', 19, 3, 8, 0, 'Java', 0, '2020-07-08 18:19:36'),
(122, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 18:19:36'),
(123, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 18:19:36'),
(124, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 18:19:36'),
(125, 'testid1', 1, 10, 0, 0, 'Go', 0, '2020-07-08 18:19:36'),
(126, 'testid1', 21, 5, 0, 0, 'python', 0, '2020-07-08 19:12:54'),
(127, 'testid1', 19, 3, 8, 0, 'Java', 0, '2020-07-08 19:12:54'),
(128, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 19:12:54'),
(129, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 19:12:54'),
(130, 'testid1', 1, 16, 4, 0, 'Go', 0, '2020-07-08 19:12:54'),
(131, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 19:12:54'),
(132, 'testid1', 21, 5, 0, 0, 'python', 0, '2020-07-08 19:13:14'),
(133, 'testid1', 19, 3, 8, 0, 'Java', 0, '2020-07-08 19:13:14'),
(134, 'testid1', 5, 4, 8800, 61, 'html', 0, '2020-07-08 19:13:14'),
(135, 'testid1', 4, 5, 6666, 37, 'Java', 0, '2020-07-08 19:13:14'),
(136, 'testid1', 1, 16, 4, 0, 'Go', 0, '2020-07-08 19:13:14'),
(137, 'testid1', 3, 5, 6666, 37, 'Laravel', 0, '2020-07-08 19:13:14');

-- --------------------------------------------------------

--
-- テーブルの構造 `detail_summary2`
--

CREATE TABLE `detail_summary2` (
  `id` int(12) NOT NULL,
  `lid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `taskid` int(64) NOT NULL,
  `progress` int(12) NOT NULL,
  `tag` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `detail_summary2`
--

INSERT INTO `detail_summary2` (`id`, `lid`, `taskid`, `progress`, `tag`, `indate`) VALUES
(1, 'testid1', 1, 50, 'js', '2020-07-07 12:40:36'),
(2, 'testid1', 1, 50, 'js', '2020-07-07 12:40:36'),
(3, 'testid1', 1, 50, 'js', '2020-07-07 12:40:36'),
(4, 'testid1', 1, 50, 'js', '2020-07-07 12:40:36'),
(5, 'testid1', 17, 0, 'php', '2020-07-07 12:40:36'),
(6, 'testid1', 8, 7, 'python', '2020-07-07 12:40:36'),
(7, 'testid1', 7, 125, 'python', '2020-07-07 12:40:36'),
(8, 'testid1', 1, 148, 'php', '2020-07-07 12:40:36'),
(9, 'testid1', 1, 50, 'js', '2020-07-07 13:53:40'),
(10, 'testid1', 1, 50, 'js', '2020-07-07 13:53:40'),
(11, 'testid1', 1, 50, 'js', '2020-07-07 13:53:40'),
(12, 'testid1', 1, 50, 'js', '2020-07-07 13:53:40'),
(13, 'testid1', 17, 0, 'php', '2020-07-07 13:53:40'),
(14, 'testid1', 8, 7, 'python', '2020-07-07 13:53:40'),
(15, 'testid1', 7, 125, 'python', '2020-07-07 13:53:40'),
(16, 'testid1', 1, 148, 'php', '2020-07-07 13:53:40'),
(17, 'testid1', 1, 50, 'js', '2020-07-07 13:54:25'),
(18, 'testid1', 1, 50, 'js', '2020-07-07 13:54:25'),
(19, 'testid1', 1, 50, 'js', '2020-07-07 13:54:25'),
(20, 'testid1', 1, 50, 'js', '2020-07-07 13:54:25'),
(21, 'testid1', 17, 0, 'php', '2020-07-07 13:54:25'),
(22, 'testid1', 8, 7, 'python', '2020-07-07 13:54:25'),
(23, 'testid1', 7, 125, 'python', '2020-07-07 13:54:25'),
(24, 'testid1', 1, 148, 'php', '2020-07-07 13:54:25'),
(25, 'testid1', 1, 50, 'js', '2020-07-07 13:54:53'),
(26, 'testid1', 1, 50, 'js', '2020-07-07 13:54:53'),
(27, 'testid1', 1, 50, 'js', '2020-07-07 13:54:53'),
(28, 'testid1', 1, 50, 'js', '2020-07-07 13:54:53'),
(29, 'testid1', 17, 0, 'php', '2020-07-07 13:54:53'),
(30, 'testid1', 8, 7, 'python', '2020-07-07 13:54:53'),
(31, 'testid1', 1, 148, 'php', '2020-07-07 13:54:53'),
(32, 'testid1', 7, 125, 'python', '2020-07-07 13:54:53'),
(33, 'testid1', 1, 50, 'js', '2020-07-07 13:55:07'),
(34, 'testid1', 1, 50, 'js', '2020-07-07 13:55:07'),
(35, 'testid1', 1, 50, 'js', '2020-07-07 13:55:07'),
(36, 'testid1', 17, 0, 'php', '2020-07-07 13:55:07'),
(37, 'testid1', 8, 7, 'python', '2020-07-07 13:55:07'),
(38, 'testid1', 1, 50, 'js', '2020-07-07 13:55:08'),
(39, 'testid1', 7, 125, 'python', '2020-07-07 13:55:08'),
(40, 'testid1', 1, 148, 'php', '2020-07-07 13:55:08'),
(41, 'testid1', 1, 50, 'js', '2020-07-07 13:55:19'),
(42, 'testid1', 1, 50, 'js', '2020-07-07 13:55:19'),
(43, 'testid1', 1, 50, 'js', '2020-07-07 13:55:19'),
(44, 'testid1', 17, 0, 'php', '2020-07-07 13:55:19'),
(45, 'testid1', 1, 50, 'js', '2020-07-07 13:55:19'),
(46, 'testid1', 8, 7, 'python', '2020-07-07 13:55:19'),
(47, 'testid1', 7, 125, 'python', '2020-07-07 13:55:20'),
(48, 'testid1', 1, 148, 'php', '2020-07-07 13:55:20'),
(49, 'testid1', 1, 50, 'js', '2020-07-07 13:55:28'),
(50, 'testid1', 1, 50, 'js', '2020-07-07 13:55:28'),
(51, 'testid1', 1, 50, 'js', '2020-07-07 13:55:28'),
(52, 'testid1', 1, 50, 'js', '2020-07-07 13:55:28'),
(53, 'testid1', 17, 0, 'php', '2020-07-07 13:55:28'),
(54, 'testid1', 8, 7, 'python', '2020-07-07 13:55:28'),
(55, 'testid1', 7, 125, 'python', '2020-07-07 13:55:28'),
(56, 'testid1', 1, 148, 'php', '2020-07-07 13:55:28'),
(57, 'testid1', 1, 50, 'js', '2020-07-07 14:18:50'),
(58, 'testid1', 1, 50, 'js', '2020-07-07 14:18:50'),
(59, 'testid1', 1, 50, 'js', '2020-07-07 14:18:50'),
(60, 'testid1', 1, 50, 'js', '2020-07-07 14:18:50'),
(61, 'testid1', 17, 0, 'php', '2020-07-07 14:18:50'),
(62, 'testid1', 8, 7, 'python', '2020-07-07 14:18:50'),
(63, 'testid1', 7, 125, 'python', '2020-07-07 14:18:50'),
(64, 'testid1', 1, 148, 'php', '2020-07-07 14:18:50'),
(65, 'testid1', 1, 50, 'js', '2020-07-07 14:34:18'),
(66, 'testid1', 1, 50, 'js', '2020-07-07 14:34:18'),
(67, 'testid1', 1, 50, 'js', '2020-07-07 14:34:18'),
(68, 'testid1', 1, 50, 'js', '2020-07-07 14:34:18'),
(69, 'testid1', 17, 0, 'php', '2020-07-07 14:34:18'),
(70, 'testid1', 8, 7, 'python', '2020-07-07 14:34:18'),
(71, 'testid1', 1, 148, 'php', '2020-07-07 14:34:18'),
(72, 'testid1', 7, 125, 'python', '2020-07-07 14:34:18'),
(73, 'testid1', 1, 50, 'js', '2020-07-07 19:15:44'),
(74, 'testid1', 1, 50, 'js', '2020-07-07 19:15:45'),
(75, 'testid1', 1, 50, 'js', '2020-07-07 19:15:45'),
(76, 'testid1', 1, 50, 'js', '2020-07-07 19:15:45'),
(77, 'testid1', 8, 7, 'python', '2020-07-07 19:15:45'),
(78, 'testid1', 17, 0, 'php', '2020-07-07 19:15:45'),
(79, 'testid1', 7, 125, 'python', '2020-07-07 19:15:45'),
(80, 'testid1', 1, 148, 'php', '2020-07-07 19:15:45'),
(81, 'testid1', 1, 50, 'js', '2020-07-07 19:18:03'),
(82, 'testid1', 1, 50, 'js', '2020-07-07 19:18:03'),
(83, 'testid1', 1, 50, 'js', '2020-07-07 19:18:03'),
(84, 'testid1', 1, 50, 'js', '2020-07-07 19:18:03'),
(85, 'testid1', 17, 0, 'php', '2020-07-07 19:18:03'),
(86, 'testid1', 8, 7, 'python', '2020-07-07 19:18:03'),
(87, 'testid1', 7, 125, 'python', '2020-07-07 19:18:03'),
(88, 'testid1', 1, 148, 'php', '2020-07-07 19:18:03'),
(89, 'testid1', 1, 50, 'js', '2020-07-07 19:19:24'),
(90, 'testid1', 1, 50, 'js', '2020-07-07 19:19:24'),
(91, 'testid1', 1, 50, 'js', '2020-07-07 19:19:24'),
(92, 'testid1', 1, 50, 'js', '2020-07-07 19:19:24'),
(93, 'testid1', 17, 0, 'php', '2020-07-07 19:19:24'),
(94, 'testid1', 8, 7, 'python', '2020-07-07 19:19:24'),
(95, 'testid1', 7, 125, 'python', '2020-07-07 19:19:24'),
(96, 'testid1', 1, 148, 'php', '2020-07-07 19:19:24'),
(97, 'testid1', 1, 50, 'js', '2020-07-07 19:19:42'),
(98, 'testid1', 1, 50, 'js', '2020-07-07 19:19:42'),
(99, 'testid1', 1, 50, 'js', '2020-07-07 19:19:42'),
(100, 'testid1', 1, 50, 'js', '2020-07-07 19:19:42'),
(101, 'testid1', 17, 0, 'php', '2020-07-07 19:19:42'),
(102, 'testid1', 8, 7, 'python', '2020-07-07 19:19:42'),
(103, 'testid1', 7, 125, 'python', '2020-07-07 19:19:42'),
(104, 'testid1', 1, 148, 'php', '2020-07-07 19:19:42'),
(105, 'testid1', 1, 50, 'js', '2020-07-07 19:21:12'),
(106, 'testid1', 1, 50, 'js', '2020-07-07 19:21:12'),
(107, 'testid1', 1, 50, 'js', '2020-07-07 19:21:12'),
(108, 'testid1', 17, 0, 'php', '2020-07-07 19:21:12'),
(109, 'testid1', 1, 50, 'js', '2020-07-07 19:21:12'),
(110, 'testid1', 8, 7, 'python', '2020-07-07 19:21:12'),
(111, 'testid1', 7, 125, 'python', '2020-07-07 19:21:12'),
(112, 'testid1', 1, 148, 'php', '2020-07-07 19:21:12'),
(113, 'testid1', 1, 50, 'js', '2020-07-07 19:27:38'),
(114, 'testid1', 1, 50, 'js', '2020-07-07 19:27:38'),
(115, 'testid1', 1, 50, 'js', '2020-07-07 19:27:38'),
(116, 'testid1', 1, 50, 'js', '2020-07-07 19:27:38'),
(117, 'testid1', 17, 0, 'php', '2020-07-07 19:27:38'),
(118, 'testid1', 8, 7, 'python', '2020-07-07 19:27:38'),
(119, 'testid1', 7, 125, 'python', '2020-07-07 19:27:38'),
(120, 'testid1', 1, 148, 'php', '2020-07-07 19:27:38'),
(121, 'testid1', 1, 50, 'js', '2020-07-07 19:28:13'),
(122, 'testid1', 1, 50, 'js', '2020-07-07 19:28:13'),
(123, 'testid1', 1, 50, 'js', '2020-07-07 19:28:13'),
(124, 'testid1', 17, 0, 'php', '2020-07-07 19:28:13'),
(125, 'testid1', 8, 7, 'python', '2020-07-07 19:28:13'),
(126, 'testid1', 1, 50, 'js', '2020-07-07 19:28:13'),
(127, 'testid1', 7, 125, 'python', '2020-07-07 19:28:14'),
(128, 'testid1', 1, 148, 'php', '2020-07-07 19:28:14'),
(129, 'testid1', 1, 50, 'js', '2020-07-07 19:30:09'),
(130, 'testid1', 1, 50, 'js', '2020-07-07 19:30:09'),
(131, 'testid1', 1, 50, 'js', '2020-07-07 19:30:09'),
(132, 'testid1', 1, 50, 'js', '2020-07-07 19:30:09'),
(133, 'testid1', 17, 0, 'php', '2020-07-07 19:30:09'),
(134, 'testid1', 8, 7, 'python', '2020-07-07 19:30:09'),
(135, 'testid1', 1, 148, 'php', '2020-07-07 19:30:09'),
(136, 'testid1', 7, 125, 'python', '2020-07-07 19:30:09'),
(137, 'testid1', 1, 50, 'js', '2020-07-07 19:30:30'),
(138, 'testid1', 1, 50, 'js', '2020-07-07 19:30:30'),
(139, 'testid1', 1, 50, 'js', '2020-07-07 19:30:30'),
(140, 'testid1', 17, 0, 'php', '2020-07-07 19:30:30'),
(141, 'testid1', 8, 7, 'python', '2020-07-07 19:30:30'),
(142, 'testid1', 1, 50, 'js', '2020-07-07 19:30:30'),
(143, 'testid1', 7, 125, 'python', '2020-07-07 19:30:31'),
(144, 'testid1', 1, 148, 'php', '2020-07-07 19:30:31'),
(145, 'testid1', 17, 0, 'php', '2020-07-07 19:49:56'),
(146, 'testid1', 8, 7, 'python', '2020-07-07 19:49:56'),
(147, 'testid1', 7, 125, 'python', '2020-07-07 19:49:56'),
(148, 'testid1', 1, 148, 'php', '2020-07-07 19:49:56'),
(149, 'testid1', 17, 0, 'php', '2020-07-07 19:54:15'),
(150, 'testid1', 8, 7, 'python', '2020-07-07 19:54:15'),
(151, 'testid1', 7, 125, 'python', '2020-07-07 19:54:15'),
(152, 'testid1', 1, 148, 'php', '2020-07-07 19:54:15'),
(153, 'testid1', 17, 0, 'php', '2020-07-07 19:55:54'),
(154, 'testid1', 8, 7, 'python', '2020-07-07 19:55:54'),
(155, 'testid1', 7, 125, 'python', '2020-07-07 19:55:54'),
(156, 'testid1', 1, 148, 'php', '2020-07-07 19:55:54'),
(157, 'testid1', 1, 50, 'js', '2020-07-07 19:56:49'),
(158, 'testid1', 1, 50, 'js', '2020-07-07 19:56:49'),
(159, 'testid1', 1, 50, 'js', '2020-07-07 19:56:49'),
(160, 'testid1', 1, 50, 'js', '2020-07-07 19:56:49'),
(161, 'testid1', 17, 0, 'php', '2020-07-07 19:56:49'),
(162, 'testid1', 8, 7, 'python', '2020-07-07 19:56:49'),
(163, 'testid1', 7, 125, 'python', '2020-07-07 19:56:49'),
(164, 'testid1', 1, 148, 'php', '2020-07-07 19:56:49'),
(165, 'testid1', 17, 0, 'php', '2020-07-08 14:06:31'),
(166, 'testid1', 8, 7, 'python', '2020-07-08 14:06:31'),
(167, 'testid1', 1, 148, 'php', '2020-07-08 14:06:31'),
(168, 'testid1', 7, 125, 'python', '2020-07-08 14:06:31'),
(169, 'testid1', 5, 49, 'html', '2020-07-08 15:25:02'),
(170, 'testid1', 3, 9, 'Laravel', '2020-07-08 15:25:02'),
(171, 'testid1', 4, 37, 'Java', '2020-07-08 15:25:02'),
(172, 'testid1', 2, 7, 'Swift', '2020-07-08 15:25:02'),
(173, 'testid1', 1, 77, 'Go', '2020-07-08 15:25:02'),
(174, 'testid1', 4, 37, 'Java', '2020-07-08 15:25:34'),
(175, 'testid1', 3, 9, 'Laravel', '2020-07-08 15:25:34'),
(176, 'testid1', 5, 49, 'html', '2020-07-08 15:25:34'),
(177, 'testid1', 2, 7, 'Swift', '2020-07-08 15:25:34'),
(178, 'testid1', 1, 77, 'Go', '2020-07-08 15:25:34'),
(179, 'testid1', 19, 0, 'Java', '2020-07-08 15:53:29'),
(180, 'testid1', 18, 0, 'Java', '2020-07-08 15:53:29'),
(181, 'testid1', 5, 49, 'html', '2020-07-08 15:53:29'),
(182, 'testid1', 4, 37, 'Java', '2020-07-08 15:53:29'),
(183, 'testid1', 3, 9, 'Laravel', '2020-07-08 15:53:29'),
(184, 'testid1', 1, 77, 'Go', '2020-07-08 15:53:29'),
(185, 'testid1', 2, 7, 'Swift', '2020-07-08 15:53:29'),
(186, 'testid1', 18, 0, 'Java', '2020-07-08 16:15:53'),
(187, 'testid1', 19, 0, 'Java', '2020-07-08 16:15:53'),
(188, 'testid1', 5, 49, 'html', '2020-07-08 16:15:53'),
(189, 'testid1', 3, 9, 'Laravel', '2020-07-08 16:15:53'),
(190, 'testid1', 4, 37, 'Java', '2020-07-08 16:15:53'),
(191, 'testid1', 2, 7, 'Swift', '2020-07-08 16:15:53'),
(192, 'testid1', 1, 77, 'Go', '2020-07-08 16:15:53'),
(193, 'testid1', 18, 0, 'Java', '2020-07-08 16:27:54'),
(194, 'testid1', 19, 0, 'Java', '2020-07-08 16:27:55'),
(195, 'testid1', 5, 49, 'html', '2020-07-08 16:27:55'),
(196, 'testid1', 4, 37, 'Java', '2020-07-08 16:27:55'),
(197, 'testid1', 3, 9, 'Laravel', '2020-07-08 16:27:55'),
(198, 'testid1', 2, 7, 'Swift', '2020-07-08 16:27:55'),
(199, 'testid1', 1, 77, 'Go', '2020-07-08 16:27:55'),
(200, 'testid1', 21, 0, 'python', '2020-07-08 16:35:15'),
(201, 'testid1', 18, 0, 'Java', '2020-07-08 16:35:15'),
(202, 'testid1', 19, 0, 'Java', '2020-07-08 16:35:15'),
(203, 'testid1', 5, 49, 'html', '2020-07-08 16:35:15'),
(204, 'testid1', 4, 37, 'Java', '2020-07-08 16:35:15'),
(205, 'testid1', 3, 9, 'Laravel', '2020-07-08 16:35:15'),
(206, 'testid1', 2, 7, 'Swift', '2020-07-08 16:35:15'),
(207, 'testid1', 1, 77, 'Go', '2020-07-08 16:35:15'),
(208, 'testid1', 18, 0, 'Java', '2020-07-08 16:48:33'),
(209, 'testid1', 21, 0, 'python', '2020-07-08 16:48:33'),
(210, 'testid1', 19, 0, 'Java', '2020-07-08 16:48:33'),
(211, 'testid1', 5, 49, 'html', '2020-07-08 16:48:33'),
(212, 'testid1', 4, 37, 'Java', '2020-07-08 16:48:33'),
(213, 'testid1', 3, 9, 'Laravel', '2020-07-08 16:48:33'),
(214, 'testid1', 2, 7, 'Swift', '2020-07-08 16:48:33'),
(215, 'testid1', 1, 77, 'Go', '2020-07-08 16:48:33'),
(216, 'testid1', 18, 0, 'Java', '2020-07-08 17:58:20'),
(217, 'testid1', 21, 0, 'python', '2020-07-08 17:58:20'),
(218, 'testid1', 19, 0, 'Java', '2020-07-08 17:58:20'),
(219, 'testid1', 5, 49, 'html', '2020-07-08 17:58:20'),
(220, 'testid1', 4, 37, 'Java', '2020-07-08 17:58:20'),
(221, 'testid1', 3, 9, 'Laravel', '2020-07-08 17:58:20'),
(222, 'testid1', 2, 7, 'Swift', '2020-07-08 17:58:20'),
(223, 'testid1', 1, 77, 'Go', '2020-07-08 17:58:20'),
(224, 'testid1', 19, 0, 'Java', '2020-07-08 18:19:36'),
(225, 'testid1', 18, 0, 'Java', '2020-07-08 18:19:36'),
(226, 'testid1', 21, 0, 'python', '2020-07-08 18:19:36'),
(227, 'testid1', 5, 49, 'html', '2020-07-08 18:19:36'),
(228, 'testid1', 4, 37, 'Java', '2020-07-08 18:19:36'),
(229, 'testid1', 3, 9, 'Laravel', '2020-07-08 18:19:36'),
(230, 'testid1', 2, 7, 'Swift', '2020-07-08 18:19:36'),
(231, 'testid1', 1, 77, 'Go', '2020-07-08 18:19:36'),
(232, 'testid1', 21, 0, 'python', '2020-07-08 19:12:54'),
(233, 'testid1', 18, 0, 'Java', '2020-07-08 19:12:54'),
(234, 'testid1', 19, 0, 'Java', '2020-07-08 19:12:54'),
(235, 'testid1', 5, 49, 'html', '2020-07-08 19:12:54'),
(236, 'testid1', 4, 37, 'Java', '2020-07-08 19:12:54'),
(237, 'testid1', 3, 9, 'Laravel', '2020-07-08 19:12:54'),
(238, 'testid1', 2, 7, 'Swift', '2020-07-08 19:12:54'),
(239, 'testid1', 1, 77, 'Go', '2020-07-08 19:12:54'),
(240, 'testid1', 21, 0, 'python', '2020-07-08 19:13:14'),
(241, 'testid1', 18, 0, 'Java', '2020-07-08 19:13:14'),
(242, 'testid1', 19, 0, 'Java', '2020-07-08 19:13:14'),
(243, 'testid1', 4, 37, 'Java', '2020-07-08 19:13:14'),
(244, 'testid1', 5, 49, 'html', '2020-07-08 19:13:14'),
(245, 'testid1', 2, 7, 'Swift', '2020-07-08 19:13:14'),
(246, 'testid1', 3, 9, 'Laravel', '2020-07-08 19:13:14'),
(247, 'testid1', 1, 77, 'Go', '2020-07-08 19:13:14');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai`
--

CREATE TABLE `gs_kadai` (
  `id` int(12) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `coment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_kadai`
--

INSERT INTO `gs_kadai` (`id`, `title`, `url`, `coment`, `indate`) VALUES
(2, 'test2 rev', 'test2.com', 'this is god damn good', '2020-06-08 15:05:04'),
(4, 'test4', 'test4.com', 'it was total mess, i dont wanna take a look anymore', '2020-06-08 16:10:44'),
(6, 'test 5', 'test5.com', 'its not bad but the truth is.. i dont give a shit', '2020-06-09 00:02:29'),
(7, 'test6', 'test6.com', 'the plot was damn good but the conclusion was shitty shit', '2020-06-09 10:23:42'),
(10, 'ee', 'ee', 'eee', '2020-06-09 22:07:26'),
(12, 'dd rev', 'dd', 'ddd', '2020-06-09 22:12:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `usetid` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`usetid`, `name`, `lid`, `lpw`, `role`, `life_flg`) VALUES
(1, 'test1', 'testid1', 'testpw1', 1, 1),
(2, 'test2', 'testid2', 'testpw2', 0, 1),
(3, 'test3', 'testid3', 'testpw3', 1, 1),
(6, 'test4', 'testid4', 'testpw4', 2, 1),
(7, 'test5', 'testid5', 'testpw5', 1, 1),
(8, 'test100', 'testid100', 'testpw100', 0, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `outcome_table`
--

CREATE TABLE `outcome_table` (
  `id` int(12) NOT NULL,
  `lid` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `taskid` int(12) NOT NULL,
  `indate` datetime NOT NULL,
  `stop_watch` int(64) NOT NULL,
  `tag` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `outcome_table`
--

INSERT INTO `outcome_table` (`id`, `lid`, `taskid`, `indate`, `stop_watch`, `tag`) VALUES
(1, 'testid1', 1, '2020-07-07 11:21:28', 55555, 'Go'),
(2, 'testid1', 2, '2020-07-07 11:21:28', 7777, 'Swift'),
(3, 'testid1', 3, '2020-07-08 11:21:28', 6666, 'Laravel'),
(4, 'testid1', 4, '2020-07-08 11:21:28', 6666, 'Java'),
(5, 'testid1', 5, '2020-07-08 11:21:28', 8800, 'html'),
(71, 'testid1', 1, '2020-07-08 15:46:42', 0, 'Go'),
(72, 'testid1', 19, '2020-07-08 16:12:00', 2, 'Java'),
(73, 'testid1', 19, '2020-07-08 16:14:41', 6, 'Java'),
(74, 'testid1', 1, '2020-07-08 19:12:46', 4, 'Go'),
(75, 'testid1', 2, '2020-07-13 16:24:23', 2, 'Swift'),
(76, 'testid1', 25, '2020-07-13 16:29:13', 2, 'C');

-- --------------------------------------------------------

--
-- テーブルの構造 `plan_table`
--

CREATE TABLE `plan_table` (
  `taskid` int(12) NOT NULL,
  `lid` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `task` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `end_date` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(124) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `how_long` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `plan_table`
--

INSERT INTO `plan_table` (`taskid`, `lid`, `task`, `indate`, `end_date`, `tag`, `comment`, `how_long`) VALUES
(25, 'testid1', 'task', '2020-07-13 16:28:55', '7/21', 'C', '', '30');

-- --------------------------------------------------------

--
-- テーブルの構造 `plan_today`
--

CREATE TABLE `plan_today` (
  `id` int(12) NOT NULL,
  `lid` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `taskid` int(12) NOT NULL,
  `today` int(12) NOT NULL,
  `indate` datetime NOT NULL,
  `tag` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `plan_today`
--

INSERT INTO `plan_today` (`id`, `lid`, `taskid`, `today`, `indate`, `tag`) VALUES
(1, 'testid1', 1, 8, '2020-07-08 19:12:40', 'Go'),
(2, 'testid1', 2, 7, '2020-07-07 11:21:28', 'Swift'),
(3, 'testid1', 3, 5, '2020-07-08 16:57:23', 'Laravel'),
(4, 'testid1', 4, 5, '2020-07-08 11:21:28', 'Java'),
(5, 'testid1', 5, 4, '2020-07-08 11:21:28', 'html'),
(12, 'testid1', 1, 8, '2020-07-08 19:12:40', 'Go'),
(13, 'testid1', 19, 3, '2020-07-08 16:10:28', 'Java'),
(14, 'testid1', 21, 5, '2020-07-08 16:34:37', 'python'),
(15, 'testid1', 2, 4, '2020-07-13 16:24:17', 'Swift');

-- --------------------------------------------------------

--
-- テーブルの構造 `ranking_table`
--

CREATE TABLE `ranking_table` (
  `id` int(12) NOT NULL,
  `lid` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `total_stopwatch` int(64) DEFAULT NULL,
  `total_achievement` int(64) NOT NULL,
  `hours_per_task` int(64) NOT NULL,
  `hours_per_achieve` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `class_1` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_2` int(2) DEFAULT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `ranking_table`
--

INSERT INTO `ranking_table` (`id`, `lid`, `name`, `tag`, `total_stopwatch`, `total_achievement`, `hours_per_task`, `hours_per_achieve`, `comment`, `class_1`, `class_2`, `indate`) VALUES
(1, 'testid1', 'test1', 'PHP,JavaScript,', 50000, 100, 0, 0, 'test1_1', 'dev', 1, '2020-07-07'),
(2, 'testid1', 'test1', 'Python', 50000, 40, 0, 0, 'test1_2', 'dev', 1, '2020-07-08'),
(3, 'testid2', 'test2', 'Laravel', 60000, 50, 0, 0, 'test2_1', 'dev', 2, '2020-07-08'),
(4, 'testid3', 'test3', 'PHP,JavaScript', 70000, 66, 0, 0, 'test3_1', 'dev', 2, '2020-07-08');

-- --------------------------------------------------------

--
-- テーブルの構造 `summary2_table`
--

CREATE TABLE `summary2_table` (
  `id` int(12) NOT NULL,
  `lid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `progress` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `summary2_table`
--

INSERT INTO `summary2_table` (`id`, `lid`, `progress`) VALUES
(1, 'testid1', 50),
(2, 'testid1', 60),
(3, 'testid1', 70),
(4, 'testid1', 21),
(5, 'testid1', 21),
(6, 'testid1', 21),
(7, 'testid1', 21),
(8, 'testid1', 21),
(9, 'testid1', 21),
(10, 'testid1', 21),
(11, 'testid1', 40),
(12, 'testid1', 40),
(13, 'testid1', 40),
(14, 'testid1', 40),
(15, 'testid1', 3),
(16, 'testid1', 3),
(17, 'testid1', 3),
(18, 'testid1', 3),
(19, 'testid1', 3),
(20, 'testid1', 77),
(21, 'testid1', 54),
(22, 'testid1', 54),
(23, 'testid1', 54),
(24, 'testid1', 54),
(25, 'testid1', 54),
(26, 'testid1', 54),
(27, 'testid1', 54),
(28, 'testid1', 54),
(29, 'testid1', 54),
(30, 'testid1', 54),
(31, 'testid1', 54),
(32, 'testid1', 54),
(33, 'testid1', 54),
(34, 'testid1', 54),
(35, 'testid1', 54),
(36, 'testid1', 54),
(37, 'testid1', 54),
(38, 'testid1', 54),
(39, 'testid1', 54),
(40, 'testid1', 54),
(41, 'testid1', 54),
(42, 'testid1', 54),
(43, 'testid1', 54),
(44, 'testid1', 54),
(45, 'testid1', 54),
(46, 'testid1', 54),
(47, 'testid1', 54),
(48, 'testid1', 54),
(49, 'testid1', 54);

-- --------------------------------------------------------

--
-- テーブルの構造 `summary_table`
--

CREATE TABLE `summary_table` (
  `id` int(11) NOT NULL,
  `lid` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `achievement` int(12) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `summary_table`
--

INSERT INTO `summary_table` (`id`, `lid`, `achievement`, `indate`) VALUES
(1, 'testid1', 50, '2020-07-07 12:21:16'),
(2, 'testid1', 43, '2020-07-07 12:22:17'),
(3, 'testid1', 43, '2020-07-07 12:38:51'),
(4, 'testid1', 43, '2020-07-07 12:39:48'),
(5, 'testid1', 43, '2020-07-07 12:40:33'),
(6, 'testid1', 43, '2020-07-07 13:54:56'),
(7, 'testid1', 43, '2020-07-07 13:55:22'),
(8, 'testid1', 43, '2020-07-07 13:55:33'),
(9, 'testid1', 43, '2020-07-07 14:34:32'),
(10, 'testid1', 43, '2020-07-07 14:42:06'),
(11, 'testid1', 43, '2020-07-07 14:42:34'),
(12, 'testid1', 43, '2020-07-07 16:59:19'),
(13, 'testid1', 43, '2020-07-07 18:59:06'),
(14, 'testid1', 43, '2020-07-07 19:01:48'),
(15, 'testid1', 43, '2020-07-07 19:01:54'),
(16, 'testid1', 43, '2020-07-07 19:03:27'),
(17, 'testid1', 43, '2020-07-07 19:04:02'),
(18, 'testid1', 43, '2020-07-07 19:06:29'),
(19, 'testid1', 43, '2020-07-07 19:08:19'),
(20, 'testid1', 43, '2020-07-07 19:09:07'),
(21, 'testid1', 43, '2020-07-07 19:12:32'),
(22, 'testid1', 43, '2020-07-07 20:15:04'),
(23, 'testid1', 43, '2020-07-07 20:41:29'),
(24, 'testid1', 43, '2020-07-07 21:42:42'),
(25, 'testid1', 43, '2020-07-07 21:43:39'),
(26, 'testid1', 43, '2020-07-07 21:44:26'),
(27, 'testid1', 16, '2020-07-08 19:13:10'),
(28, 'testid1', 16, '2020-07-08 19:13:10'),
(29, 'testid1', 16, '2020-07-08 19:13:10'),
(30, 'testid1', 16, '2020-07-08 19:13:10'),
(31, 'testid1', 0, '2020-07-13 17:00:06');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `lid` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `occupation` text COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `class_1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `class_2` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `lid`, `lpw`, `indate`, `name`, `age`, `occupation`, `kanri_flg`, `life_flg`, `class_1`, `class_2`) VALUES
(1, 'testid1', 'testpw1', '2020-06-27 20:38:42', 'test1', 27, 'student', 1, 1, 'dev', 1),
(2, 'testid2', 'testpw2', '2020-06-27 21:39:27', 'test2', 22, 'student', 1, 1, 'dev', 2),
(3, 'testid3', 'testpw3', '2020-06-27 21:40:36', 'test3', 99, 'student', 1, 1, 'dev', 4);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `detail_summary1`
--
ALTER TABLE `detail_summary1`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `detail_summary2`
--
ALTER TABLE `detail_summary2`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_kadai`
--
ALTER TABLE `gs_kadai`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`usetid`);

--
-- テーブルのインデックス `outcome_table`
--
ALTER TABLE `outcome_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plan_table`
--
ALTER TABLE `plan_table`
  ADD KEY `id` (`taskid`);

--
-- テーブルのインデックス `plan_today`
--
ALTER TABLE `plan_today`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `ranking_table`
--
ALTER TABLE `ranking_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `summary2_table`
--
ALTER TABLE `summary2_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `summary_table`
--
ALTER TABLE `summary_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD UNIQUE KEY `lid` (`lid`,`lpw`),
  ADD KEY `id` (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `detail_summary1`
--
ALTER TABLE `detail_summary1`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- テーブルのAUTO_INCREMENT `detail_summary2`
--
ALTER TABLE `detail_summary2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- テーブルのAUTO_INCREMENT `gs_kadai`
--
ALTER TABLE `gs_kadai`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルのAUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `usetid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルのAUTO_INCREMENT `outcome_table`
--
ALTER TABLE `outcome_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- テーブルのAUTO_INCREMENT `plan_table`
--
ALTER TABLE `plan_table`
  MODIFY `taskid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- テーブルのAUTO_INCREMENT `plan_today`
--
ALTER TABLE `plan_today`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルのAUTO_INCREMENT `ranking_table`
--
ALTER TABLE `ranking_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルのAUTO_INCREMENT `summary2_table`
--
ALTER TABLE `summary2_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- テーブルのAUTO_INCREMENT `summary_table`
--
ALTER TABLE `summary_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- テーブルのAUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
