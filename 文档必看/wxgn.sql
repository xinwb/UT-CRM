-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 01 月 03 日 21:36
-- 服务器版本: 5.5.38
-- PHP 版本: 5.4.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `demo_690`
--

-- --------------------------------------------------------

--
-- 表的结构 `w_category`
--

CREATE TABLE IF NOT EXISTS `w_category` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `name` varchar(40) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `desc` mediumtext,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `w_category`
--

INSERT INTO `w_category` (`id`, `pid`, `name`, `status`, `desc`, `add_time`) VALUES
(1, 0, '数码', 0, '', 1514456685),
(2, 1, '手机', 0, '手机', 1514457825),
(3, 0, '服装', 0, '', 1514554550);

-- --------------------------------------------------------

--
-- 表的结构 `w_customer`
--

CREATE TABLE IF NOT EXISTS `w_customer` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `desc` mediumtext,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE,
  UNIQUE KEY `sn` (`sn`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='客户' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `w_customer`
--

INSERT INTO `w_customer` (`id`, `sn`, `name`, `contact`, `phone`, `email`, `fax`, `address`, `desc`, `status`, `add_time`) VALUES
(1, '5a44a4f6f1f18', '苏州牧冬光电有限公司', '测试', '15069900798', '30024167@qq.com', '15069900798', '江苏省苏州市长阳街', '苏州牧冬光电有限公司...', 0, 1514448252),
(2, '5a44b3f23a31c', '爱美克空气过滤器', '测试', '1705280089', '30024167@qq.com', '0312-56777890', '苏州市工业园区长阳街', '爱美克空气过滤器', 0, 1514452007);

-- --------------------------------------------------------

--
-- 表的结构 `w_location`
--

CREATE TABLE IF NOT EXISTS `w_location` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `storage` mediumint(5) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL COMMENT '0',
  `desc` varchar(200) DEFAULT NULL COMMENT '备注',
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='库位管理' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `w_location`
--

INSERT INTO `w_location` (`id`, `sn`, `name`, `storage`, `status`, `desc`, `add_time`) VALUES
(1, '17122705595244343', 'B区', 1, 0, '', 1514368943),
(2, '17122706022839995', 'A区', 3, 0, '', 1514368959);

-- --------------------------------------------------------

--
-- 表的结构 `w_menu`
--

CREATE TABLE IF NOT EXISTS `w_menu` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(9) unsigned DEFAULT '0',
  `name` varchar(40) DEFAULT NULL,
  `ico` varchar(20) DEFAULT NULL,
  `level` tinyint(1) unsigned DEFAULT '0',
  `controller` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `w_menu`
--

INSERT INTO `w_menu` (`id`, `pid`, `name`, `ico`, `level`, `controller`, `action`, `status`, `add_time`) VALUES
(1, 0, '控制台', 'linecons-cog', 0, 'Index', 'index', 0, NULL),
(2, 0, '系统设置', 'linecons-desktop', 0, '', NULL, 0, NULL),
(3, 2, '员工管理', NULL, 1, 'User', 'index', 0, NULL),
(4, 0, '仓库作业', 'linecons-note', 0, NULL, NULL, 0, NULL),
(5, 4, '入库管理', NULL, 1, 'Instorage', 'index', 0, 5),
(6, 4, '出门管理', NULL, 1, 'Outstorage', 'index', 0, NULL),
(7, 4, '查询管理', NULL, 1, 'Product', 'lists', 0, NULL),
(8, 0, '基本设置', 'linecons-cog', 0, NULL, NULL, 0, NULL),
(9, 8, '仓库管理', NULL, 1, 'Storage', 'index', 0, NULL),
(10, 8, '库位管理', NULL, 1, 'Location', 'index', 0, NULL),
(11, 8, '供应商管理', NULL, 1, 'Supplier', 'index', 0, NULL),
(12, 8, '客户管理', NULL, 1, 'Customer', 'index', 0, NULL),
(13, 8, '计量单位', NULL, 1, 'Unit', 'index', 0, NULL),
(14, 8, '产品类别', NULL, 1, 'Category', 'index', 0, NULL),
(15, 8, '产品管理', NULL, 1, 'Product', 'index', 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `w_order`
--

CREATE TABLE IF NOT EXISTS `w_order` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(40) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `supplier` varchar(40) DEFAULT NULL,
  `state` tinyint(1) unsigned DEFAULT NULL COMMENT '1',
  `type` varchar(40) DEFAULT NULL,
  `res` mediumtext,
  `desc` mediumtext,
  `add_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `w_order`
--

INSERT INTO `w_order` (`id`, `sn`, `author`, `supplier`, `state`, `type`, `res`, `desc`, `add_time`) VALUES
(1, 'SN2017122907045664503', '布尔', '默认', 1, '采购入库', '[["5a470f4c59ebd","\\u8363\\u8000V10","10","1999.00","\\u534e\\u4e1c\\u4ed3\\u5e93","\\u4e2a"],["5a47110d39206","\\u91d1\\u7acbs10","10","2555.00","\\u897f\\u5357\\u5730\\u533a","\\u4e2a"],["5a4711ce77e24","\\u5c0f\\u7c736","10","2499.00","\\u534e\\u4e2d\\u5730\\u533a","\\u4e2a"]]', '暂无备注', 1514546311),
(2, 'SN2017122907323362528', '布尔', '苏州牧冬光电有限公司', 1, '销售退货', '[["5a470f4c59ebd","\\u8363\\u8000V10","10","1999.00","\\u534e\\u4e1c\\u4ed3\\u5e93","\\u4e2a"],["5a47110d39206","\\u91d1\\u7acbs10","10","2555.00","\\u897f\\u5357\\u5730\\u533a","\\u4e2a"],["5a4711ce77e24","\\u5c0f\\u7c736","10","2499.00","\\u534e\\u4e2d\\u5730\\u533a","\\u4e2a"]]', '暂无备注', 1514547169),
(3, 'SN2017122908231479439', '布尔', '苏州牧冬光电有限公司', 1, '采购入库', '[["5a470f4c59ebd","\\u8363\\u8000V10","10","1999.00","\\u534e\\u4e1c\\u4ed3\\u5e93","\\u4e2a"],["5a47110d39206","\\u91d1\\u7acbs10","10","2555.00","\\u897f\\u5357\\u5730\\u533a","\\u4e2a"],["5a4711ce77e24","\\u5c0f\\u7c736","10","2499.00","\\u534e\\u4e2d\\u5730\\u533a","\\u4e2a"]]', '暂无备注', 1514550489),
(4, 'SN2017122909362794921', '布尔', '苏州牧冬光电有限公司', 1, '采购入库', '[["5a470f4c59ebd","\\u8363\\u8000V10","10","1999.00","\\u534e\\u4e1c\\u4ed3\\u5e93","\\u4e2a"],["5a47110d39206","\\u91d1\\u7acbs10","10","2555.00","\\u897f\\u5357\\u5730\\u533a","\\u4e2a"],["5a4711ce77e24","\\u5c0f\\u7c736","10","2499.00","\\u534e\\u4e2d\\u5730\\u533a","\\u4e2a"]]', '暂无备注', 1514554602),
(5, 'SN2017123012034396767', '布尔', '苏州牧冬光电有限公司', 1, '销售退货', '[["5a470f4c59ebd","\\u8363\\u8000V10","10","1999.00","\\u534e\\u4e1c\\u4ed3\\u5e93","\\u4e2a"],["5a47110d39206","\\u91d1\\u7acbs10","10","2555.00","\\u897f\\u5357\\u5730\\u533a","\\u4e2a"],["5a4711ce77e24","\\u5c0f\\u7c736","10","2499.00","\\u534e\\u4e2d\\u5730\\u533a","\\u4e2a"]]', '', 1514606653),
(6, 'SN2017123012080844521', '布尔', '默认', 1, '采购入库', '[["5a470f4c59ebd","\\u8363\\u8000V10","10","1999.00","\\u534e\\u4e1c\\u4ed3\\u5e93","\\u4e2a"],["5a47110d39206","\\u91d1\\u7acbs10","10","2555.00","\\u897f\\u5357\\u5730\\u533a","\\u4e2a"],["5a4711ce77e24","\\u5c0f\\u7c736","10","2499.00","\\u534e\\u4e2d\\u5730\\u533a","\\u4e2a"]]', '', 1514606905),
(9, 'SN2018010212422646979', '布尔', '苏州牧冬光电有限公司', 2, '采购出库', '[["5a470f4c59ebd","\\u8363\\u8000V10","10","1999.00","\\u534e\\u4e1c\\u4ed3\\u5e93","\\u4e2a"]]', '', 1514868162),
(8, 'SN2018010109223955758', '布尔', '默认', 2, '采购出库', '[["5a450753a97ee","\\u978b\\u5b50","1","5.00","\\u534e\\u4e2d\\u5730\\u533a","\\u7247"]]', '', 1514812964),
(7, 'SN2017123012112963113', '布尔', '苏州牧冬光电有限公司', 1, '采购入库', '[["5a470f4c59ebd","\\u8363\\u8000V10","10","1999.00","\\u534e\\u4e1c\\u4ed3\\u5e93","\\u4e2a"],["5a47110d39206","\\u91d1\\u7acbs10","10","2555.00","\\u897f\\u5357\\u5730\\u533a","\\u4e2a"],["5a4711ce77e24","\\u5c0f\\u7c736","10","2499.00","\\u534e\\u4e2d\\u5730\\u533a","\\u4e2a"]]', '', 1514607119),
(10, 'SN2018010309343050992', '管理员', '默认', 2, '采购出库', '[["5a450753a97ee","\\u978b\\u5b50","21321321","5.00","\\u534e\\u4e2d\\u5730\\u533a","\\u7247"]]', '', 1514986473);

-- --------------------------------------------------------

--
-- 表的结构 `w_product`
--

CREATE TABLE IF NOT EXISTS `w_product` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(40) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nbsn` varchar(40) DEFAULT NULL,
  `cjsn` varchar(40) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `storage` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `supplier` varchar(40) DEFAULT NULL,
  `customer` varchar(40) DEFAULT NULL,
  `spec` varchar(40) DEFAULT NULL COMMENT '规格',
  `price` decimal(10,2) unsigned DEFAULT NULL,
  `num` mediumint(9) unsigned DEFAULT NULL COMMENT '数量',
  `status` tinyint(1) unsigned DEFAULT '0',
  `desc` mediumtext,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `w_product`
--

INSERT INTO `w_product` (`id`, `sn`, `name`, `nbsn`, `cjsn`, `category`, `storage`, `location`, `unit`, `supplier`, `customer`, `spec`, `price`, `num`, `status`, `desc`, `add_time`) VALUES
(1, '5a450753a97ee', '鞋子', '', '5a450753a97ee', '数码', '华中地区', 'A区', '片', '苏州牧冬光电有限公司', '爱美克空气过滤器', '', '5.00', 0, 0, '111', 1514473336),
(2, '5a45c671401ec', '产品1', '', '5a45c671401ec', '手机', '西北仓库', 'A区', '箱', '苏州牧冬光电有限公司', '爱美克空气过滤器', '', '10.00', 10, 0, '', 1514522247),
(3, '5a4644bcb7ec1', '服装', '', '5a4644bcb7ec1', '服装', '华东仓库', 'B区', '箱', '苏州牧冬光电有限公司', '爱美克空气过滤器', '', '0.00', 7, 0, '', 1514554572),
(4, '5a470f4c59ebd', '荣耀V10', '', '5a470f4c59ebd', '手机', '华东仓库', 'B区', '个', '苏州牧冬光电有限公司', '爱美克空气过滤器', '', '1999.00', 8, 0, '', 1514606441),
(5, '5a47110d39206', '金立s10', '', '5a47110d39206', '手机', '西南地区', 'B区', '个', '苏州牧冬光电有限公司', '爱美克空气过滤器', '', '2555.00', 15, 0, '', 1514606883),
(6, '5a4711ce77e24', '小米6', '', '5a4711ce77e24', '手机', '华中地区', 'B区', '个', '苏州牧冬光电有限公司', '爱美克空气过滤器', '', '2499.00', 10, 0, '', 1514607078);

-- --------------------------------------------------------

--
-- 表的结构 `w_storage`
--

CREATE TABLE IF NOT EXISTS `w_storage` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(40) NOT NULL COMMENT '编号',
  `name` varchar(40) NOT NULL COMMENT '名字',
  `contact` varchar(16) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `desc` mediumtext,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态： 0正常 1禁用',
  `address` varchar(40) DEFAULT NULL,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='仓库管理' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `w_storage`
--

INSERT INTO `w_storage` (`id`, `sn`, `name`, `contact`, `phone`, `desc`, `status`, `address`, `add_time`) VALUES
(1, 'SN2017122704154711343', '华东仓库', '布尔', '17052850083', '华东仓库', 0, '江苏省苏州市', 1514349093),
(2, 'SN2017122704160191249', '华北仓库', '测试', '15052850085', '华北仓库', 0, '山东省青岛市城阳区', 1514350644),
(3, 'SN2017122704163071894', '华南仓库', '阿德民', '18101565682', '华南仓库', 0, '广东省广州市天河区车陂', 1514351327),
(4, 'SN2017122704163675950', '东北仓库', '马云', '15069900798', '东北仓库', 0, '黑龙江省哈尔滨市', 1514351479),
(5, 'SN2017122704165667035', '西北仓库', '秦始皇', '17052850085', '西北仓库', 0, '陕西省西安市大雁区', 1514351552),
(6, 'SN2017122704171789530', '华中地区', '无名', '17052850083', '华中地区', 0, '湖北省武汉市汉口区', 1514351653),
(7, 'SN2017122704172619176', '西南地区', '张杰', '17052850086', '西南地区', 0, '四川省成都市', 1514351716);

-- --------------------------------------------------------

--
-- 表的结构 `w_supplier`
--

CREATE TABLE IF NOT EXISTS `w_supplier` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `desc` mediumtext,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE,
  UNIQUE KEY `sn` (`sn`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='供应商' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `w_supplier`
--

INSERT INTO `w_supplier` (`id`, `sn`, `name`, `contact`, `phone`, `email`, `fax`, `address`, `desc`, `status`, `add_time`) VALUES
(1, '5a44a4f6f1f18', '苏州牧冬光电有限公司', '测试', '15069900798', '30024167@qq.com', '15069900798', '江苏省苏州市长阳街', '苏州牧冬光电有限公司...', 0, 1514448252);

-- --------------------------------------------------------

--
-- 表的结构 `w_unit`
--

CREATE TABLE IF NOT EXISTS `w_unit` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `desc` mediumtext,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `w_unit`
--

INSERT INTO `w_unit` (`id`, `name`, `status`, `desc`, `add_time`) VALUES
(1, '箱', 0, '箱', 1514454975),
(2, '个', 0, '', 1514455204),
(3, '包', 0, '', 1514455226),
(4, '片', 0, '', 1514455232);

-- --------------------------------------------------------

--
-- 表的结构 `w_user`
--

CREATE TABLE IF NOT EXISTS `w_user` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `phone` varchar(12) DEFAULT NULL COMMENT '手机号',
  `eamil` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `truename` varchar(16) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0:正常 1:禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `w_user`
--

INSERT INTO `w_user` (`id`, `username`, `password`, `phone`, `eamil`, `truename`, `status`) VALUES
(1, 'bool', '21232f297a57a5a743894a0e4a801fc3', '17052850083', '30024167', '布尔', 0),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '17052850083', '30024167', '管理员', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
