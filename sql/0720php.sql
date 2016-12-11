-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 11 月 24 日 14:42
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

-- --------------------------------------------------------

--
-- 表的结构 `my_goods_dingdan`
--

CREATE TABLE IF NOT EXISTS `my_goods_dingdan` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(12) NOT NULL COMMENT '用户id',
  `dingdan` varchar(32) NOT NULL COMMENT '订单号',
  `addtime` date NOT NULL COMMENT '添加时间',
  `zongjia` int(12) NOT NULL COMMENT '总价',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='订单表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_goods_dingdan`
--

INSERT INTO `my_goods_dingdan` (`id`, `user_id`, `dingdan`, `addtime`, `zongjia`, `del`) VALUES
(1, 1, '20161124212401770', '2016-11-24', 7198, 0),
(2, 1, '20161124212401770', '2016-11-24', 7198, 0);

-- --------------------------------------------------------

--
-- 表的结构 `my_goods_img`
--

CREATE TABLE IF NOT EXISTS `my_goods_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片ID',
  `goodsid` int(11) NOT NULL COMMENT '商品ID',
  `img_url` varchar(30) NOT NULL,
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品图片表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `my_goods_img`
--

INSERT INTO `my_goods_img` (`id`, `goodsid`, `img_url`, `del`) VALUES
(1, 1, '2016-11-13/58281462eb0c3.jpg', 0),
(2, 1, '2016-11-13/5828146306331.jpg', 0),
(3, 1, '2016-11-13/582814631d6b3.jpg', 0),
(4, 1, '2016-11-13/582814632e401.jpg', 0),
(5, 1, '2016-11-13/5828146342c79.jpg', 0),
(6, 1, '2016-11-13/5828146357789.jpg', 0),
(7, 1, '2016-11-13/5828146370c6f.jpg', 0);

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

-- --------------------------------------------------------

--
-- 表的结构 `my_prize`
--

CREATE TABLE IF NOT EXISTS `my_prize` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '奖品名称',
  `num` int(12) NOT NULL COMMENT '数量',
  `item` int(12) NOT NULL COMMENT '前端的转盘',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `my_prize`
--

INSERT INTO `my_prize` (`id`, `name`, `num`, `item`) VALUES
(1, '1元代金券', 10, 1),
(2, '5元代金券', 10, 2),
(3, '10元代金券', 10, 3),
(4, '20元代金券', 10, 5),
(5, '50元代金券', 10, 6),
(6, '80元代金券', 10, 7);

-- --------------------------------------------------------

--
-- 表的结构 `my_user`
--

CREATE TABLE IF NOT EXISTS `my_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(15) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '注册时间',
  `sname` varchar(20) NOT NULL COMMENT '真实姓名',
  `sex` tinyint(1) NOT NULL COMMENT '性别',
  `birthday` date NOT NULL COMMENT '生日',
  `img_url` varchar(30) NOT NULL COMMENT '头像',
  `zhuzhi` varchar(50) NOT NULL COMMENT '住址',
  `jia` varchar(50) NOT NULL COMMENT '家乡',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_user`
--

INSERT INTO `my_user` (`id`, `name`, `password`, `addtime`, `sname`, `sex`, `birthday`, `img_url`, `zhuzhi`, `jia`) VALUES
(1, '陌陌', 'e10adc3949ba59abbe56e057f20f883e', '2016-11-13 03:27:40', '', 0, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `my_userprize`
--

CREATE TABLE IF NOT EXISTS `my_userprize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `prizename` varchar(20) NOT NULL COMMENT '抽奖名称',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '抽奖时间',
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户抽奖' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `my_userprize`
--

INSERT INTO `my_userprize` (`id`, `user_id`, `prizename`, `addtime`, `order_id`) VALUES
(7, 2585, '免单5元', '2016-11-09 08:55:58', 784),
(8, 2585, '提高白条额度', '2016-11-09 08:59:33', 785),
(9, 2585, '免单10元', '2016-11-09 09:07:21', 786),
(10, 2585, '免分期服务费', '2016-11-09 09:49:31', 787),
(11, 2585, '免单10元', '2016-11-09 09:51:53', 788),
(12, 2585, '免单4999元', '2016-11-09 10:54:59', 789);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
