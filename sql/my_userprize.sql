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
