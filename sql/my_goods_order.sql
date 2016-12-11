-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 11 月 24 日 14:41
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
-- 表的结构 `my_goods_order`
--

CREATE TABLE IF NOT EXISTS `my_goods_order` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `order_id` int(12) NOT NULL COMMENT '购物车id',
  `order_sn` varchar(32) NOT NULL COMMENT '订单号',
  `goods_id` int(12) NOT NULL COMMENT '商品id',
  `goods_price` int(20) NOT NULL COMMENT '商品价格',
  `goods_num` int(12) NOT NULL COMMENT '商品数量',
  `goods_ord` int(20) NOT NULL COMMENT '单个商品总价',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='订单商品表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `my_goods_order`
--

INSERT INTO `my_goods_order` (`id`, `order_id`, `order_sn`, `goods_id`, `goods_price`, `goods_num`, `goods_ord`) VALUES
(1, 1, '20161124212401770', 2, 800, 2, 1600),
(2, 1, '20161124212401770', 3, 2799, 2, 5598),
(3, 2, '20161124212401770', 2, 800, 2, 1600),
(4, 2, '20161124212401770', 3, 2799, 2, 5598);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
