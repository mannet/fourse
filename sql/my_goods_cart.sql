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
-- 表的结构 `my_goods_cart`
--

CREATE TABLE IF NOT EXISTS `my_goods_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(30) NOT NULL,
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `goodsname` varchar(30) NOT NULL COMMENT '商品名称',
  `price` float(6,2) NOT NULL COMMENT '价格',
  `goods_img` varchar(50) NOT NULL COMMENT '商品图片',
  `kucun` int(30) NOT NULL COMMENT '库存',
  `num` int(11) NOT NULL DEFAULT '1' COMMENT '数量',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '选中/未选中',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为删除',
  `attr_id` int(10) NOT NULL COMMENT '属性ID',
  `brand_id` int(12) NOT NULL COMMENT '品牌id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='购物车' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `my_goods_cart`
--

INSERT INTO `my_goods_cart` (`id`, `userid`, `name`, `goods_id`, `goodsname`, `price`, `goods_img`, `kucun`, `num`, `status`, `del`, `attr_id`, `brand_id`) VALUES
(1, 1, '陌陌', 1, '惠普笔记本', 2999.00, '2016-11-13/5828037a697aa.jpg', 123, 2, 0, 0, 1, 1),
(2, 1, '陌陌', 2, 'TCL冰箱', 800.00, '2016-11-13/582803ba95dae.jpg', 123, 2, 1, 1, 3, 2),
(3, 1, '陌陌', 3, '康佳电视', 2799.00, '2016-11-13/5828042f53b00.jpg', 123, 2, 1, 1, 6, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
