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
-- 資料表結構 `phone_code`
--

CREATE TABLE `phone_code` (
  `country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '2字母國籍代號 ISO3166-1',
  `territory` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '國家領土',
  `code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電話國際碼+區碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='電話國際碼';

--
-- 資料表的匯出資料 `phone_code`
--

INSERT INTO `phone_code` (`country`, `territory`, `code`) VALUES
('AU', 'aat', '+672'),
('AU', 'au', '+61'),
('AU', 'macquarie_island', '+672'),
('AU', 'nf', '+672'),
('CN', 'cn', '+86'),
('HK', 'hk', '+852'),
('ID', 'id', '+62'),
('MO', 'mo', '+853'),
('MY', 'my', '+60'),
('NZ', 'nz', '+64'),
('PH', 'ph', '+63'),
('SG', 'sg', '+65'),
('TW', 'tw', '+886'),
('VN', 'vn', '+84'),
('JP', 'jp', '+81');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `phone_code`
--
ALTER TABLE `phone_code`
  ADD PRIMARY KEY (`country`,`territory`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
