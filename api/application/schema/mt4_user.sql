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
-- 資料表結構 `mt4_user`
--

DROP TABLE IF EXISTS `mt4_user`;
CREATE TABLE IF NOT EXISTS `mt4_user` (
  `mt4_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MT4帳號',
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '客戶編號',
  `is_child` tinyint(1) unsigned NOT NULL COMMENT '是否為子帳號(母=0,子=1)',
  `leverage` int(4) unsigned NOT NULL COMMENT '槓桿比率',
  `approve` tinyint(1) unsigned DEFAULT '0' COMMENT '申請批准(審核中=0,批准=1,否決=2)',
  `approve_time` datetime DEFAULT NULL COMMENT '批准時間',
  `mt4_group` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品組合',
  `follow_auth` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '同意代收MT4帳號',
  `follow` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '跟單對象MT4帳號',
  `deposit` decimal(16,3) NOT NULL DEFAULT '0.000' COMMENT '存款',
  `balance` double unsigned NOT NULL DEFAULT '0' COMMENT '餘額(非即時)',
  `note` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '帳號用途備註',
  `ctime` datetime NOT NULL COMMENT '建立時間',
  `utime` datetime DEFAULT NULL COMMENT '更新時間',
  `extime` datetime DEFAULT NULL COMMENT '失效時間',
  `expired` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '已失效',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後異動者',
  PRIMARY KEY (`mt4_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4會員';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
