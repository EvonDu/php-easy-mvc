-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-04-02 00:52:29
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homepage`
--

-- --------------------------------------------------------

--
-- 表的结构 `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Evon', 'xLC1RjaDD9QNu7LYYTVaZnJRpr8n3BHC', '$2y$13$7WR5RqPJa.8u95J09CXyHe4aigAbpcUPESFM7eBirL6AlWTH735o2', NULL, '298550274@qq.com', 10, 0, 1488416943),
(3, 'Evon2', 'TsPG6eyEBBg5jTjBThuEQCtHXCsdKaK1', '$2y$13$zSO0cC1WnK7VYgiHRzlOWe/7lgl5LmyT0h2cmX62wLbzfwCCe1ufe', NULL, 'evon-sky@qq.com', 10, 1486452734, 1488334203);

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `a_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL COMMENT '文章标题',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `intro` text COMMENT '文章简介',
  `content` text COMMENT '内容',
  `img` varchar(200) DEFAULT NULL COMMENT '封面图片路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表';

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`a_id`, `title`, `create_time`, `intro`, `content`, `img`) VALUES
(2, '新零售的女性主义特征', 1522490357, '新零售的女性主义特征', '                                                                新零售的女性主义特征34543                                    ', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e2e23883c4.jpg'),
(3, '无人超市模式全球落地 将引领零售新趋势？', 1522488257, '无人超市模式全球落地 将引领零售新趋势？', '                                <p>无人超市模式全球落地 将引领零售新趋势？54654654654</p>                                                    ', NULL),
(4, '如何抢占90后市场？', 1520322378, '如何抢占90后市场？', '如何抢占90后市场？', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e476e75642.jpg'),
(5, '无人超市模式全球落地 将引领零售新趋势？', 1520323392, '美国《纽约时报》22日报道称，亚马逊首个无人超市Amazon Go当地时间22日早上正式对公众开门营业。近年来，无人超市模式已在包括中国在内全球多个国家落地。有专家认为，零售无人化是未来零售新趋势，但也有观点表示无人超市尚未展现出绝对的优势与普及必要性。 《纽约时报》报道称，该门店位于美国西雅图亚马逊总部中心区', '美国《纽约时报》22日报道称，亚马逊首个无人超市Amazon Go当地时间22日早上正式对公众开门营业。近年来，无人超市模式已在包括中国在内全球多个国家落地。有专家认为，零售无人化是未来零售新趋势，但也有观点表示无人超市尚未展现出绝对的优势与普及必要性。 《纽约时报》报道称，该门店位于美国西雅图亚马逊总部中心区', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e4b5d6b6e3.jpg'),
(6, '无人超市模式全球落地 将引领零售新趋势？', 1520323392, '美国《纽约时报》22日报道称，亚马逊首个无人超市Amazon Go当地时间22日早上正式对公众开门营业。近年来，无人超市模式已在包括中国在内全球多个国家落地。有专家认为，零售无人化是未来零售新趋势，但也有观点表示无人超市尚未展现出绝对的优势与普及必要性。 《纽约时报》报道称，该门店位于美国西雅图亚马逊总部中心区', '美国《纽约时报》22日报道称，亚马逊首个无人超市Amazon Go当地时间22日早上正式对公众开门营业。近年来，无人超市模式已在包括中国在内全球多个国家落地。有专家认为，零售无人化是未来零售新趋势，但也有观点表示无人超市尚未展现出绝对的优势与普及必要性。 《纽约时报》报道称，该门店位于美国西雅图亚马逊总部中心区', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e4b5d6b6e3.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '3', NULL),
('Developer', '1', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, '管理员', NULL, '', NULL, NULL),
('admin:::*', 2, '管理员全部权限', NULL, '', NULL, NULL),
('Developer', 1, '开发者', NULL, '', 1486362668, 1486362668),
('developer:::*', 2, '开发者全部权限', NULL, '', 1486362667, 1486362667);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'admin:::*'),
('Developer', 'admin:::*'),
('Developer', 'developer:::*');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `enquiry`
--

CREATE TABLE `enquiry` (
  `e_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL COMMENT '产品名称',
  `product_num` int(3) DEFAULT NULL COMMENT '产品数量',
  `user_name` varchar(100) DEFAULT NULL COMMENT '姓名',
  `email` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL COMMENT '公司名称',
  `phone` varchar(30) DEFAULT NULL COMMENT '电话',
  `country` varchar(100) DEFAULT NULL COMMENT '国家',
  `city` varchar(100) DEFAULT NULL COMMENT '城市',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `remark` text COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='询盘表';

--
-- 转存表中的数据 `enquiry`
--

INSERT INTO `enquiry` (`e_id`, `product_name`, `product_num`, `user_name`, `email`, `company_name`, `phone`, `country`, `city`, `create_time`, `remark`) VALUES
(1, 'dsjkl', 3, 'dsa', 'email', 'dsadsa', 'asda', 'country', 'city', 1520391961, 'remark'),
(2, '综合机', 1, 'sda', 'dsa', 'edqa', 'dsa', 'dsa', 'dsaa', 1520392956, 'dsa'),
(3, '综合机', 0, 'dsa', '', '', 'dsa', '', 'dsa', 1520393161, ''),
(4, '综合机', 1, 'sda', '', '', '132131', '', '2sad', 1520393468, 'xx'),
(5, '综合机', 0, '12', '', '', '111', '', 'xx', 1520399445, '2'),
(6, '综合机', 0, 'xx', '', '', '33', '1', '222', 1520399469, ''),
(7, '综合机', 5, '11', '', '', '32', '', 'a', 1520399493, ''),
(8, 'Glacier Series', 0, '12', '', '', 'xx', '', '22', 1520399671, ''),
(9, '综合机', 0, '221', '', '', '12s', '', 'xxxx', 1520400678, ''),
(10, '综合机', 0, '11', '', '', '11', '', '11', 1520400868, ''),
(11, 'Multi functional Integrated Machine', 2, '213', '', '', '444', '', 'xx', 1520401769, ''),
(12, '综合机', 0, '123123', '', '', '1231123', '', 'guangzhou', 1520663056, ''),
(13, 'Glacier Series', 0, 'test_en_pc', '', '', 'test_en_pc', '', 'test_en_pc', 1520666574, ''),
(14, 'Auto Stock In–Stock Out Series', 0, 'm_en', '', '', 'm_en', '', 'm_en', 1520667957, ''),
(15, '综合机', 0, 'm_cn', '', '', 'm_cn', '', 'm_cn', 1520668824, '');

-- --------------------------------------------------------

--
-- 表的结构 `hot_documents`
--

CREATE TABLE `hot_documents` (
  `h_id` int(11) NOT NULL,
  `filename` varchar(100) DEFAULT NULL COMMENT '文件名',
  `fileurl` varchar(150) DEFAULT NULL COMMENT '文件路径',
  `all_download` int(11) DEFAULT NULL COMMENT '所有下载量',
  `day_download` int(11) DEFAULT NULL COMMENT '日下载量',
  `today` int(11) DEFAULT NULL COMMENT '当日日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='热门下载';

--
-- 转存表中的数据 `hot_documents`
--

INSERT INTO `hot_documents` (`h_id`, `filename`, `fileurl`, `all_download`, `day_download`, `today`) VALUES
(4, '文件1', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e2e3bdf60f.rar', 1, 1, 1520315953),
(5, '下载文件2', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e2e54d39f2.rar', 1, 1, 1520315981),
(6, '下载文件3', 'http://119.29.3.168/homepage/backend/web/upload/20180306/5a9e2e627c4be.rar', 1, 1, 1520315995);

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1486263940),
('m130524_201442_init', 1486263943),
('m140506_102106_rbac_init', 1486266457);

-- --------------------------------------------------------

--
-- 表的结构 `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '环境',
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'User', 'fj1ik2EcB5ACAsu2XTVgQfj3N0PE36Mu', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'test@163.com', 10, 0, 1487065814);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `hot_documents`
--
ALTER TABLE `hot_documents`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `hot_documents`
--
ALTER TABLE `hot_documents`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
