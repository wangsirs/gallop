-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2016 年 06 月 14 日 22:54
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
-- 資料表結構 `mt4_money_transfer`
--

DROP TABLE IF EXISTS `mt4_money_transfer`;
CREATE TABLE IF NOT EXISTS `mt4_money_transfer` (
  `mmt_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'MT4內轉流水號',
  `mt4_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MT4帳號',
  `target_mt4_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '目標MT4帳號',
  `mmt_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '內轉狀態(申請中=0,成功=1,駁回=2,重複申請=3)',
  `mmt_time` datetime NOT NULL COMMENT '內轉時間',
  `amount` double DEFAULT NULL COMMENT '金額',
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '內轉備註',
  `ctime` datetime NOT NULL COMMENT '建立時間',
  `utime` datetime DEFAULT NULL COMMENT '更新時間',
  `extime` datetime DEFAULT NULL COMMENT '失效時間',
  `expired` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '已失效',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後異動者',
  PRIMARY KEY (`mmt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4內資金互轉' AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
