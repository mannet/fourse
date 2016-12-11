-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 11 月 24 日 14:40
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `0720php`
--

-- --------------------------------------------------------

--
-- 表的结构 `my_goods_brand`
--

CREATE TABLE IF NOT EXISTS `my_goods_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌ID',
  `brand_name` varchar(20) NOT NULL COMMENT '品牌名称',
  `logo` varchar(30) NOT NULL COMMENT '品牌logo',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品品牌表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `my_goods_brand`
--

INSERT INTO `my_goods_brand` (`id`, `brand_name`, `logo`, `del`) VALUES
(1, '惠普', '2016-11-13/5827e137f11f1.gif', 0),
(2, 'HTC', '2016-11-13/5827e1817ff03.jpg', 0),
(3, 'TCL', '2016-11-13/5827e1a973c6b.jpg', 0),
(4, '宏碁', '2016-11-13/5827e1bb34b4d.gif', 0),
(5, '康佳', '2016-11-13/5827e1c314218.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
