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
-- 資料表結構 `money_funding`
--

DROP TABLE IF EXISTS `money_funding`;
CREATE TABLE IF NOT EXISTS `money_funding` (
  `mf_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '入金流水號',
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '客戶編號',
  `com_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公司編號',
  `mf_type` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '入金方式(電匯=0,',
  `mf_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '入金狀態(申請中=0,已收到=1,失敗=2,重複=3)',
  `amount` decimal(16,3) NOT NULL COMMENT '匯款金額',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '匯款人',
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '匯款地址',
  `country` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '國家',
  `bank` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '匯款銀行',
  `bank_acc` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '匯款帳號',
  `bank_ads` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '銀行地址',
  `pay_date` date NOT NULL COMMENT '匯款日期',
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '入金備註',
  `adm_reply` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '行政人員回覆',
  `union_pay` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '銀聯帳號',
  `mf_app_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '入金目標應用程式',
  `mf_app_uid` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '入金目標應用程式客戶編號',
  `ctime` datetime NOT NULL COMMENT '建立時間',
  `utime` datetime NOT NULL COMMENT '更新時間',
  `extime` datetime NOT NULL COMMENT '失效時間',
  `expired` tinyint(1) unsigned NOT NULL COMMENT '已失效',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後異動者',
  PRIMARY KEY (`mf_id`),
  KEY `mf_seq` (`mf_id`),
  KEY `mf_app_id` (`mf_app_id`,`mf_app_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='入金' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
