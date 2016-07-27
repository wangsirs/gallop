-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2016 年 07 月 27 日 23:09
-- 伺服器版本: 5.7.13
-- PHP 版本： 7.0.8-3+deb.sury.org~trusty+1

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
-- 資料表結構 `mt4_org`
--

CREATE TABLE `mt4_org` (
  `mo_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '組織編號',
  `mo_name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '組織名稱',
  `mo_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '狀態(停用=0,啟用=1,未完成=2)',
  `msp_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '佣金方案名稱',
  `cli_funding_bank` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '客戶入金允許電匯',
  `cli_funding_bfopay` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '客戶入金允許bfopay',
  `cli_funding_ccard` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '客戶入金允許信用卡',
  `ib_withdraw_bank` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '出金允許電匯',
  `ib_withdraw_bfopay` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '顧問獎金允許出金到bfopay',
  `ib_withdraw_mt4` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '顧問獎金允許出金到MT4帳號',
  `ib_funding_ccard` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '顧問獎金允許出金到信用卡',
  `approve` tinyint(1) UNSIGNED DEFAULT '0' COMMENT '申請批准(審核中=0,批准=1,否決=2)',
  `approve_time` datetime DEFAULT NULL COMMENT '批准時間',
  `ctime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新建日期',
  `utime` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `extime` datetime NOT NULL COMMENT '刪除時間',
  `expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否刪除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4業務組織資訊';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
