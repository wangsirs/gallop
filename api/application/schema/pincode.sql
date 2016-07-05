-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2016 年 05 月 27 日 19:53
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
-- 資料表結構 `pincode`
--

CREATE TABLE IF NOT EXISTS `pincode` (
  `uid` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '對應帳號',
  `com_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公司編號',
  `pincode` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'PIN code',
  `alive` smallint(3) unsigned NOT NULL DEFAULT '2' COMMENT '存活長度（分鐘）',
  `flag` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '動作旗標',
  `ctime` datetime NOT NULL COMMENT '建立時間',
  `extime` datetime NOT NULL COMMENT '失效時間',
  `expired` tinyint(1) NOT NULL COMMENT '已失效',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後異動者',
  PRIMARY KEY (`uid`,`com_id`,`pincode`,`expired`),
  KEY `pin_code` (`pincode`),
  KEY `uid` (`uid`),
  KEY `expired` (`expired`),
  KEY `pincode` (`pincode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='PIN code 對應表';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
