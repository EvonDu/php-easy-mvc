-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 04 月 03 日 07:47
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `homepage`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '文章标题',
  `intro` text COMMENT '文章简介',
  `image` varchar(200) DEFAULT NULL COMMENT '封面图片路径',
  `content` text COMMENT '内容',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `intro`, `image`, `content`, `create_time`) VALUES
(1, '新零售的女性主义特征', '新零售的女性主义特征', '/php-easy-mvc/upload/20180402/6619520694583782757.jpg', '                                                                                                                                新零售的女性主义特征2            ', 1522736952),
(3, '无人超市模式全球落地 将引领零售新趋势？', '无人超市模式全球落地 将引领零售新趋势？', NULL, '                                <p>无人超市模式全球落地 将引领零售新趋势？54654654654</p>                                                    ', 1522488257),
(4, '如何抢占90后市场？', '如何抢占90后市场？', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e476e75642.jpg', '如何抢占90后市场？', 1520322378),
(5, '无人超市模式全球落地 将引领零售新趋势？', '美国《纽约时报》22日报道称，亚马逊首个无人超市Amazon Go当地时间22日早上正式对公众开门营业。近年来，无人超市模式已在包括中国在内全球多个国家落地。有专家认为，零售无人化是未来零售新趋势，但也有观点表示无人超市尚未展现出绝对的优势与普及必要性。 《纽约时报》报道称，该门店位于美国西雅图亚马逊总部中心区', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e4b5d6b6e3.jpg', '                美国《纽约时报》22日报道称，亚马逊首个无人超市Amazon Go当地时间22日早上正式对公众开门营业。近年来，无人超市模式已在包括中国在内全球多个国家落地。有专家认为，零售无人化是未来零售新趋势，但也有观点表示无人超市尚未展现出绝对的优势与普及必要性。 《纽约时报》报道称，该门店位于美国西雅图亚马逊总部中心区            ', 1522647460),
(6, '无人超市模式全球落地 将引领零售新趋势？', '美国《纽约时报》22日报道称，亚马逊首个无人超市Amazon Go当地时间22日早上正式对公众开门营业。近年来，无人超市模式已在包括中国在内全球多个国家落地。有专家认为，零售无人化是未来零售新趋势，但也有观点表示无人超市尚未展现出绝对的优势与普及必要性。 《纽约时报》报道称，该门店位于美国西雅图亚马逊总部中心区', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e4b5d6b6e3.jpg', '美国《纽约时报》22日报道称，亚马逊首个无人超市Amazon Go当地时间22日早上正式对公众开门营业。近年来，无人超市模式已在包括中国在内全球多个国家落地。有专家认为，零售无人化是未来零售新趋势，但也有观点表示无人超市尚未展现出绝对的优势与普及必要性。 《纽约时报》报道称，该门店位于美国西雅图亚马逊总部中心区', 1520323392);

-- --------------------------------------------------------

--
-- 表的结构 `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `path` varchar(256) NOT NULL,
  `isHot` int(11) NOT NULL DEFAULT '0',
  `isOpen` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `document`
--

INSERT INTO `document` (`id`, `name`, `path`, `isHot`, `isOpen`) VALUES
(1, 'DEMO', '/php-easy-mvc/upload/20180402/6619520694583782757.jpg', 1, 0),
(2, 'DEMO4', '/php-easy-mvc/upload/20180402/Demo.rar', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(128) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `create_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `name`, `phone`, `create_time`) VALUES
(1, 'User', '14e1b600b1fd579f47433b88e8d85291', '用户', NULL, 0),
(3, 'Admin', 'e10adc3949ba59abbe56e057f20f883e', '管理员', NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
