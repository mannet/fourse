-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 11 月 24 日 14:39
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
-- 表的结构 `my_goods_attr`
--

CREATE TABLE IF NOT EXISTS `my_goods_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌ID',
  `attr_name` varchar(20) NOT NULL COMMENT '品牌名称',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品属性表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `my_goods_attr`
--

INSERT INTO `my_goods_attr` (`id`, `attr_name`, `del`) VALUES
(1, '14寸', 0),
(2, '18寸', 0),
(3, '118升', 0),
(4, '138升', 0),
(5, '158升', 0),
(6, '37寸', 0),
(7, '42寸', 0),
(8, '50寸', 0),
(9, '7.9寸', 0),
(10, '7寸', 0),
(11, '白色', 0),
(12, '黑色', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
