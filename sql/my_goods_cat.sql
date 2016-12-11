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
-- 表的结构 `my_goods_cat`
--

CREATE TABLE IF NOT EXISTS `my_goods_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌ID',
  `cat_name` varchar(20) NOT NULL COMMENT '品牌名称',
  `pid` int(20) NOT NULL COMMENT '父级id',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品分类表' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `my_goods_cat`
--

INSERT INTO `my_goods_cat` (`id`, `cat_name`, `pid`, `del`) VALUES
(1, '手机、数码', 0, 0),
(2, '家用电器', 0, 0),
(3, '电脑、办公', 0, 0),
(4, '家具、厨具', 0, 0),
(5, '图像、音像、数字商品', 0, 0),
(6, '服饰鞋帽', 0, 0),
(7, '护肤化妆', 0, 0),
(8, '礼品箱包、钟表、珠宝', 0, 0),
(9, '运动健康', 0, 0),
(10, '汽车用品', 0, 0),
(11, '母婴、玩具、乐器', 0, 0),
(12, '食品饮料、保健食品', 0, 0),
(13, '彩票、充值、旅行', 0, 0),
(16, '笔记本', 3, 0),
(17, '大家电', 2, 0),
(18, '冰箱', 17, 0),
(19, '平板电脑', 3, 0),
(20, '液晶电视', 17, 0),
(21, '手机配件', 1, 0),
(22, '耳机', 21, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
