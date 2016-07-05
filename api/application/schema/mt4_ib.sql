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
-- 資料表結構 `mt4_ib`
--

DROP TABLE IF EXISTS `mt4_ib`;
CREATE TABLE IF NOT EXISTS `mt4_ib` (
  `ib_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '顧問帳號',
  `scale` decimal(3,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '佣金比例',
  `approve` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '申請批准',
  `approve_time` datetime NOT NULL COMMENT '批准時間',
  `diff_scale` decimal(3,1) unsigned NOT NULL COMMENT '組織佣金比例(與父佣金差值)',
  PRIMARY KEY (`ib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4顧問';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
