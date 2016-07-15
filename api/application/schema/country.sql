-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2016 年 07 月 15 日 22:08
-- 伺服器版本: 5.7.13
-- PHP 版本： 7.0.8-3+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `gallop_dev`
--

-- --------------------------------------------------------

--
-- 資料表結構 `country`
--

CREATE TABLE `country` (
  `country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '2字母國籍代號 ISO3166-1',
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '預設語系 ISO639-1 加 ISO3166-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='國家與語系';

--
-- 資料表的匯出資料 `country`
--

INSERT INTO `country` (`country`, `lang`) VALUES
('AU', 'en'),
('CN', 'zh-cn'),
('HK', 'en'),
('ID', 'en'),
('MO', 'zh-tw'),
('MY', 'en'),
('NZ', 'en'),
('PH', 'en'),
('SG', 'en'),
('TW', 'zh-tw'),
('VN', 'en');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country`,`lang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
