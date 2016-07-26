-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2016 年 07 月 26 日 00:36
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
-- 資料表結構 `mt4_ib_level`
--

CREATE TABLE `mt4_ib_level` (
  `mil_seq` int(3) UNSIGNED NOT NULL COMMENT '方案流水號',
  `mil_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '方案名稱',
  `mil_level` smallint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '等級',
  `mil_title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '職級稱號',
  `mil_scale` smallint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '佣金比例',
  `ctime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新建日期',
  `utime` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `extime` datetime NOT NULL COMMENT '刪除時間',
  `expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否刪除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4顧問層級';

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `mt4_ib_level`
--
ALTER TABLE `mt4_ib_level`
  ADD PRIMARY KEY (`mil_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `mt4_ib_level`
--
ALTER TABLE `mt4_ib_level`
  MODIFY `mil_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '方案編號';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
