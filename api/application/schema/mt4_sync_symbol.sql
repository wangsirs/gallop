-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2016 年 07 月 12 日 21:00
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
-- 資料表結構 `mt4_sync_symbol`
--

CREATE TABLE `mt4_sync_symbol` (
  `mss_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MT4商品編號',
  `symbol` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MT4商品名稱',
  `security_group` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品群組',
  `ctime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新建日期',
  `utime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `extime` datetime DEFAULT NULL COMMENT '刪除時間',
  `expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否刪除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4商品';

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `mt4_sync_symbol`
--
ALTER TABLE `mt4_sync_symbol`
  ADD PRIMARY KEY (`mss_id`),
  ADD KEY `symbol` (`symbol`),
  ADD KEY `security_group` (`security_group`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
