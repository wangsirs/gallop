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
-- 資料表結構 `mt4_results_org`
--

DROP TABLE IF EXISTS `mt4_results_org`;
CREATE TABLE IF NOT EXISTS `mt4_results_org` (
  `close_date` date NOT NULL COMMENT '交易出場日',
  `ib_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '顧問編號',
  `diff_scale` decimal(3,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '組織佣金比例(與父佣金差值)',
  `mro_volume` double unsigned NOT NULL DEFAULT '0' COMMENT '客戶總手數',
  `mro_profit` double NOT NULL DEFAULT '0' COMMENT '總獲利',
  `mro_funding` double unsigned NOT NULL DEFAULT '0' COMMENT '總入金',
  `bonus` double unsigned NOT NULL DEFAULT '0' COMMENT '組織獎金',
  `ctime` datetime NOT NULL COMMENT '建立時間',
  `extime` datetime NOT NULL COMMENT '失效時間',
  `expired` tinyint(1) NOT NULL COMMENT '已失效',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後異動者',
  PRIMARY KEY (`close_date`,`ib_id`,`mro_volume`,`bonus`,`extime`,`expired`,`mro_funding`,`mro_profit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4組織業績';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
