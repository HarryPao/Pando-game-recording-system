-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-01-16 14:26:58
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `pando`
--

-- --------------------------------------------------------

--
-- 資料表結構 `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `place` char(32) DEFAULT NULL,
  `host` char(32) DEFAULT NULL,
  `guest` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `game`
--

INSERT INTO `game` (`id`, `date`, `place`, `host`, `guest`) VALUES
(10, '2020-12-25', 'NCCU', 'CS', 'IM'),
(11, '2020-12-24', 'CCU', 'CS', 'BA'),
(12, '2020-12-23', 'NTU', 'CS', 'BA'),
(13, '2020-12-20', 'CCU', 'CS', 'BA'),
(14, '2020-12-31', 'ntu', 'cs', 'ba'),
(15, '2020-12-01', 'NCCU', 'CS', 'BA'),
(16, '2021-01-23', 'NCCU', 'CS', 'DCT');

-- --------------------------------------------------------

--
-- 資料表結構 `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `number` int(16) DEFAULT NULL,
  `name` char(32) DEFAULT NULL,
  `position` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `player`
--

INSERT INTO `player` (`id`, `number`, `name`, `position`) VALUES
(15, 11, 'Hsieh', 'PF'),
(16, 1, 'Pando', 'C'),
(17, 23, 'Harry', 'SF'),
(18, 6, 'Anna', 'PG'),
(19, 7, 'Allen', 'SG'),
(20, 12, 'peter', 'pg'),
(21, 18, 'annie', 'c'),
(22, 77, 'Ocar', 'PG'),
(23, 43, 'Jeff', 'C');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `player_number` int(8) NOT NULL,
  `2PA` int(8) NOT NULL DEFAULT 0,
  `2PM` int(8) NOT NULL DEFAULT 0,
  `3PA` int(8) NOT NULL DEFAULT 0,
  `3PM` int(8) NOT NULL DEFAULT 0,
  `FTA` int(8) NOT NULL DEFAULT 0,
  `FTM` int(8) NOT NULL DEFAULT 0,
  `O_Rebound` int(8) NOT NULL DEFAULT 0,
  `D_Rebound` int(8) NOT NULL DEFAULT 0,
  `AST` int(8) NOT NULL DEFAULT 0,
  `STL` int(8) NOT NULL DEFAULT 0,
  `BS` int(8) NOT NULL DEFAULT 0,
  `Turnover` int(8) NOT NULL DEFAULT 0,
  `PF` int(8) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`id`, `game_id`, `player_number`, `2PA`, `2PM`, `3PA`, `3PM`, `FTA`, `FTM`, `O_Rebound`, `D_Rebound`, `AST`, `STL`, `BS`, `Turnover`, `PF`) VALUES
(28, 10, 11, 0, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 0, 1),
(29, 10, 1, 1, 1, 2, 2, 0, 0, 1, 1, 1, 1, 0, 1, 0),
(30, 10, 23, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1),
(31, 10, 6, 1, 0, 2, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1),
(32, 10, 7, 3, 2, 3, 3, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(33, 11, 11, 1, 2, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0),
(34, 11, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1),
(35, 11, 23, 1, 1, 1, 0, 2, 0, 0, 0, 0, 2, 0, 1, 1),
(36, 11, 6, 0, 2, 1, 0, 3, 0, 0, 0, 0, 1, 0, 1, 1),
(37, 11, 7, 0, 1, 1, 0, 0, 2, 0, 0, 0, 0, 0, 3, 1),
(38, 12, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 12, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 12, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 12, 6, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 12, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 13, 11, 3, 2, 3, 1, 4, 0, 0, 5, 0, 0, 0, 0, 0),
(44, 13, 1, 0, 0, 2, 2, 0, 3, 3, 3, 2, 2, 0, 0, 0),
(45, 13, 23, 0, 0, 0, 3, 2, 2, 1, 1, 0, 0, 2, 0, 0),
(46, 13, 6, 0, 3, 3, 3, 1, 3, 0, 1, 2, 2, 0, 0, 0),
(47, 13, 7, 0, 0, 0, 0, 2, 4, 2, 2, 0, 0, 0, 0, 0),
(48, 14, 11, 0, 1, 0, 1, 0, 0, 0, 2, 1, 1, 0, 0, 0),
(49, 14, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0),
(50, 14, 23, 0, 1, 0, 1, 2, 0, 0, 0, 0, 0, 1, 0, 0),
(51, 14, 6, 0, 1, 0, 1, 0, 0, 1, 2, 0, 1, 0, 0, 1),
(52, 14, 7, 0, 0, 2, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0),
(53, 14, 12, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1),
(54, 14, 18, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(55, 15, 11, 0, 0, 0, 0, 1, 0, 2, 0, 0, 0, 0, 1, 0),
(56, 15, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 15, 23, 0, 2, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0),
(58, 15, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 15, 7, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
(60, 15, 12, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0),
(61, 15, 18, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0),
(62, 15, 77, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 15, 43, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 16, 11, 14, 13, 5, 4, 5, 5, 0, 1, 1, 2, 1, 0, 1),
(65, 16, 1, 4, 4, 4, 2, 2, 2, 2, 1, 2, 1, 3, 1, 1),
(66, 16, 23, 2, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(67, 16, 6, 6, 5, 3, 2, 2, 1, 0, 0, 4, 1, 0, 0, 1),
(68, 16, 7, 2, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0),
(69, 16, 12, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 3),
(70, 16, 18, 5, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
(71, 16, 77, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 16, 43, 2, 0, 2, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
