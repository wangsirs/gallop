-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2016 年 06 月 15 日 17:31
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
-- 資料表結構 `mt4_sync_trade`
--

DROP TABLE IF EXISTS `mt4_sync_trade`;
CREATE TABLE IF NOT EXISTS `mt4_sync_trade` (
  `mt4_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MT4帳號',
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '客戶編號',
  `mt4_order` int(11) NOT NULL COMMENT '交易單號',
  `cmd` smallint(3) NOT NULL DEFAULT '0' COMMENT '買賣指令',
  `symbol` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品',
  `volume` int(11) unsigned NOT NULL COMMENT '手數',
  `open_price` double NOT NULL DEFAULT '0' COMMENT '進場時間',
  `open_time` datetime NOT NULL COMMENT '進場價位',
  `close_price` double NOT NULL DEFAULT '0' COMMENT '出場價位',
  `close_time` datetime NOT NULL COMMENT '出場時間',
  `profit` double NOT NULL DEFAULT '0' COMMENT '獲利',
  `note` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '備註',
  PRIMARY KEY (`mt4_order`),
  KEY `mt4_id` (`mt4_id`),
  KEY `user_id` (`user_id`),
  KEY `close_time` (`close_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4交易紀錄';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
