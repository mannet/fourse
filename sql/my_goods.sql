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
-- 表的结构 `my_goods`
--

CREATE TABLE IF NOT EXISTS `my_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `name` varchar(80) NOT NULL COMMENT '商品名称',
  `brand_id` int(11) NOT NULL COMMENT '品牌ID',
  `cat_id` int(11) NOT NULL COMMENT '分类ID',
  `img_url` varchar(50) NOT NULL COMMENT '商品图片',
  `price` float(6,2) NOT NULL COMMENT '商品价格',
  `attr_id` int(11) NOT NULL COMMENT '属性ID',
  `miaoshu` mediumtext NOT NULL COMMENT '商品描述',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '录入时间',
  `kucun` int(11) unsigned NOT NULL COMMENT '库存',
  `hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为不热销，1为热销',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为下架1为上架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `my_goods`
--

INSERT INTO `my_goods` (`id`, `name`, `brand_id`, `cat_id`, `img_url`, `price`, `attr_id`, `miaoshu`, `addtime`, `kucun`, `hot`, `status`) VALUES
(1, '惠普笔记本', 1, 16, '2016-11-13/5828037a697aa.jpg', 2999.00, 1, '惠普G4-1332TX 14英寸', '2016-11-13 06:09:01', 123, 1, 1),
(2, 'TCL冰箱', 3, 18, '2016-11-13/582803ba95dae.jpg', 800.00, 3, '直降100元！TCL118升冰箱', '2016-11-13 06:14:24', 123, 1, 1),
(3, '康佳电视', 5, 20, '2016-11-13/5828042f53b00.jpg', 2799.00, 6, '康佳液晶37寸电视机', '2016-11-13 06:14:31', 123, 1, 1),
(4, '宏碁平板', 4, 19, '2016-11-13/58280470402fd.jpg', 1999.00, 9, '宏碁平板电脑7.9寸', '2016-11-13 06:13:06', 123, 1, 1),
(5, 'HTC耳机', 2, 22, '2016-11-13/5828049fb34ad.jpg', 199.00, 11, '好声音耳机', '2016-11-13 06:14:39', 123, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
