-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2016 年 07 月 20 日 20:21
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
-- 資料表結構 `mt4_symbol_plan`
--

CREATE TABLE `mt4_symbol_plan` (
  `msp_id` smallint(8) UNSIGNED NOT NULL COMMENT 'MT4商品編號',
  `security_group` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品群組',
  `msp_scale` double UNSIGNED NOT NULL DEFAULT '0' COMMENT '佣金',
  `msp_spread` double UNSIGNED NOT NULL DEFAULT '0' COMMENT '點差',
  `msp_volume_min` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最小交易量',
  `msp_volume_max` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最大交易量',
  `ctime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新建日期',
  `utime` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `extime` datetime NOT NULL COMMENT '刪除時間',
  `expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否刪除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='MT4佣金點差方案';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
