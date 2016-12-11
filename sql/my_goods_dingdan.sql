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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
