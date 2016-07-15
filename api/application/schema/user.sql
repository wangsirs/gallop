-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2016 年 07 月 15 日 16:38
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
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員編號',
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '客戶帳號',
  `com_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公司編號',
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓',
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名',
  `nickname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '暱稱',
  `email` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電子信箱',
  `vali_email` tinyint(1) NOT NULL DEFAULT '0' COMMENT '已驗證電郵',
  `vali_phone` tinyint(1) NOT NULL DEFAULT '0' COMMENT '已驗證電話',
  `ib_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '合作的顧問編號',
  `money` decimal(16,3) NOT NULL DEFAULT '0.000' COMMENT '目前總金額',
  `last_lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '最後使用的語系',
  `ctime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新建日期',
  `utime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `extime` datetime DEFAULT NULL COMMENT '刪除時間',
  `expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否刪除',
  `mod_user` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '維護人員'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='客戶資訊';

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`com_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
