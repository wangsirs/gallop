-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2016 年 06 月 02 日 17:43
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
-- 資料表結構 `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE IF NOT EXISTS `user_detail` (
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員帳號',
  `com_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公司編號',
  `gender` tinyint(1) unsigned NOT NULL COMMENT '性別(男=0,女=1)',
  `birthday` date NOT NULL COMMENT '西元生日',
  `marital` tinyint(1) unsigned DEFAULT NULL COMMENT '婚姻(未婚=0,已婚=1)',
  `passport` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '身分證或護照',
  `nationality` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '國籍',
  `country` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '居住國家',
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '郵遞區號',
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '居住城市',
  `state` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '省.洲',
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '地址',
  `address1` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '備用地址',
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '室內電話',
  `cell_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '行動電話',
  `first_deposit` decimal(16,3) unsigned NOT NULL DEFAULT '0.000' COMMENT '初次入金金額',
  `passport_path` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '身分證或護照影本',
  `bank_path` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '銀行影印本',
  `resident_path` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '居住證明影本',
  `ctime` datetime NOT NULL COMMENT '新建日期',
  `utime` datetime DEFAULT NULL COMMENT '更新時間',
  `extime` datetime DEFAULT NULL COMMENT '刪除時間',
  `expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否刪除',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後異動者',
  PRIMARY KEY (`user_id`,`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='客戶明細';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
