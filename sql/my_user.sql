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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
