-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2016 年 07 月 04 日 18:10
-- 伺服器版本: 5.7.13
-- PHP 版本： 7.0.8-2+deb.sury.org~trusty+1

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
-- 資料表結構 `grants_user`
--

CREATE TABLE `grants_user` (
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '客戶編號',
  `mt4_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MT4帳號',
  `approve` tinyint(1) UNSIGNED DEFAULT '0' COMMENT '申請批准(審核中=0,批准=1,否決=2)',
  `approve_time` datetime DEFAULT NULL COMMENT '批准時間',
  `rate` double UNSIGNED NOT NULL DEFAULT '0' COMMENT '客戶配息率',
  `deposit` decimal(16,3) NOT NULL DEFAULT '0.000' COMMENT '存款',
  `balance` double UNSIGNED NOT NULL DEFAULT '0' COMMENT '餘額(非即時)',
  `note` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '帳號用途備註',
  `ctime` datetime NOT NULL COMMENT '建立時間',
  `utime` datetime DEFAULT NULL COMMENT '更新時間',
  `extime` datetime DEFAULT NULL COMMENT '失效時間',
  `expired` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '已失效',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後異動者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='贈金會員';

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `grants_user`
--
ALTER TABLE `grants_user`
  ADD PRIMARY KEY (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
