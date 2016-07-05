-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2016 年 07 月 04 日 16:21
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
-- 資料表結構 `user_app_relation`
--

CREATE TABLE `user_app_relation` (
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '客戶編號',
  `app_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '應用程式編號',
  `com_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公司編號',
  `ctime` datetime NOT NULL COMMENT '新建日期',
  `utime` datetime DEFAULT NULL COMMENT '更新時間',
  `extime` datetime DEFAULT NULL COMMENT '刪除時間',
  `expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否刪除',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '維護人員'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='客戶擁有的應用程式';

--
-- 資料表索引 `user_app_relation`
--
ALTER TABLE `user_app_relation`
  ADD PRIMARY KEY (`user_id`,`com_id`,`app_id`) USING BTREE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
