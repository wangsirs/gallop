-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2016 年 06 月 13 日 19:32
-- 伺服器版本: 5.5.49-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `gallop_dev`
--

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員編號',
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '客戶帳號',
  `com_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公司編號',
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓',
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名',
  `nickname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '暱稱',
  `email` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電子信箱',
  `ctime` datetime NOT NULL COMMENT '新建日期',
  `utime` datetime DEFAULT NULL COMMENT '更新時間',
  `extime` datetime DEFAULT NULL COMMENT '刪除時間',
  `expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否刪除',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '維護人員',
  `vali_email` tinyint(1) NOT NULL DEFAULT '0' COMMENT '已驗證電郵',
  `vali_phone` tinyint(1) NOT NULL DEFAULT '0' COMMENT '已驗證電話',
  `ib_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '合作的顧問編號',
  `money` decimal(16,3) NOT NULL DEFAULT '0.000' COMMENT '目前總金額',
  PRIMARY KEY (`user_id`,`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='客戶資訊';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
