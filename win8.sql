-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 03 月 30 日 18:14
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `win8`
--

-- --------------------------------------------------------

--
-- 表的结构 `layout`
--

CREATE TABLE IF NOT EXISTS `layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '模块id',
  `title` varchar(80) NOT NULL,
  `parent` int(11) NOT NULL COMMENT '父级id',
  `position` int(2) NOT NULL COMMENT '位置',
  `size` int(2) NOT NULL COMMENT '大小',
  `show` varchar(16) NOT NULL COMMENT '显示类型',
  `content` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `layout`
--

INSERT INTO `layout` (`id`, `title`, `parent`, `position`, `size`, `show`, `content`) VALUES
(1, '我们的伟筑', 0, 1, 0, 'menu', ''),
(2, '', 1, 1, 42, 'menu', '我们的伟筑'),
(3, '', 1, 2, 42, 'menu', '我们的项目'),
(4, '', 1, 3, 42, 'menu', '我们的团队'),
(5, '', 1, 4, 42, 'menu', '新闻发布'),
(6, '', 1, 5, 42, 'null', 'logo'),
(7, '', 1, 6, 42, 'menu', '苏伟专栏'),
(8, '', 1, 7, 42, 'menu', '招聘发布'),
(9, '', 1, 8, 42, 'menu', '我们的资源'),
(10, '', 1, 9, 42, 'menu', '联系我们'),
(11, '二级', 2, 1, 42, 'menu', '二级栏目');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
