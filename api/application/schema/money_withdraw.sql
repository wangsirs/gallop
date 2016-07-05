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
-- 資料表結構 `money_withdraw`
--

DROP TABLE IF EXISTS `money_withdraw`;
CREATE TABLE IF NOT EXISTS `money_withdraw` (
  `mw_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '出金流水號',
  `com_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公司編號',
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '客戶編號',
  `mw_type` tinyint(2) unsigned NOT NULL COMMENT '出金方式(電匯=0,銀聯=1,',
  `mw_status` tinyint(1) unsigned NOT NULL COMMENT '出金狀態(OTP未過=0,申請中=1,成功=2,駁回=3,重複申請=4)',
  `amount` decimal(16,3) unsigned NOT NULL COMMENT '出金金額',
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '出金備註',
  `union_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '銀聯收款行名稱',
  `union_bname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '銀聯銀行分行名稱',
  `union_state` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '銀聯銀行所在省洲',
  `union_city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '銀聯銀行所在城市',
  `union_acc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '銀聯銀行帳戶號碼',
  `mw_app_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '出金來源應用程式',
  `mw_app_uid` int(16) unsigned NOT NULL COMMENT '出金來源應用程式客戶編號',
  `mw_date` datetime NOT NULL COMMENT '預計出金日',
  `adm_reply` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '行政人員回覆',
  `ctime` datetime NOT NULL COMMENT '建立時間',
  `utime` datetime NOT NULL COMMENT '更新時間',
  `extime` datetime NOT NULL COMMENT '失效時間',
  `expired` tinyint(3) unsigned NOT NULL COMMENT '已失效',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後異動者',
  PRIMARY KEY (`mw_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='客戶出金' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
