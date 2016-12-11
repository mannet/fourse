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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
