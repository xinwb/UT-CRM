# Host: localhost  (Version: 5.5.53)
# Date: 2018-03-12 21:42:27
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "w_category"
#

DROP TABLE IF EXISTS `w_category`;
CREATE TABLE `w_category` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `name` varchar(40) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `desc` mediumtext,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "w_category"
#

/*!40000 ALTER TABLE `w_category` DISABLE KEYS */;
INSERT INTO `w_category` VALUES (4,0,'产品',0,'',1520233729),(5,0,'物料',0,'',1520233734),(6,5,'铝型材类',0,'',1520234815);
/*!40000 ALTER TABLE `w_category` ENABLE KEYS */;

#
# Structure for table "w_customer"
#

DROP TABLE IF EXISTS `w_customer`;
CREATE TABLE `w_customer` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='客户';

#
# Data for table "w_customer"
#

/*!40000 ALTER TABLE `w_customer` DISABLE KEYS */;
INSERT INTO `w_customer` VALUES (1,'5a44a4f6f1f18','苏州牧冬光电有限公司','测试','15069900798','30024167@qq.com','15069900798','江苏省苏州市长阳街','苏州牧冬光电有限公司...',0,1514448252),(2,'5a44b3f23a31c','爱美克空气过滤器','测试','1705280089','30024167@qq.com','0312-56777890','苏州市工业园区长阳街','爱美克空气过滤器',0,1514452007);
/*!40000 ALTER TABLE `w_customer` ENABLE KEYS */;

#
# Structure for table "w_location"
#

DROP TABLE IF EXISTS `w_location`;
CREATE TABLE `w_location` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `storage` mediumint(5) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL COMMENT '0',
  `desc` varchar(200) DEFAULT NULL COMMENT '备注',
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='库位管理';

#
# Data for table "w_location"
#

/*!40000 ALTER TABLE `w_location` DISABLE KEYS */;
INSERT INTO `w_location` VALUES (1,'17122705595244343','B区',1,0,'',1514368943),(2,'17122706022839995','A区',1,0,'',1514368959);
/*!40000 ALTER TABLE `w_location` ENABLE KEYS */;

#
# Structure for table "w_menu"
#

DROP TABLE IF EXISTS `w_menu`;
CREATE TABLE `w_menu` (
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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='菜单';

#
# Data for table "w_menu"
#

/*!40000 ALTER TABLE `w_menu` DISABLE KEYS */;
INSERT INTO `w_menu` VALUES (1,0,'控制台','linecons-cog',0,'Index','index',0,NULL),(2,0,'系统设置','linecons-desktop',0,'','',0,NULL),(3,2,'员工管理','',1,'User','index',0,NULL),(4,0,'仓库作业','linecons-note',0,'','',0,NULL),(5,4,'入库管理','',1,'Instorage','index',0,5),(6,4,'出门管理','',1,'Outstorage','index',0,NULL),(7,4,'查询管理','',1,'Product','lists',0,NULL),(8,0,'基本设置','linecons-cog',0,'','',0,NULL),(9,8,'仓库管理','',1,'Storage','index',0,NULL),(10,8,'库位管理','',1,'Location','index',0,NULL),(11,8,'供应商管理','',1,'Supplier','index',0,NULL),(12,8,'客户管理','',1,'Customer','index',0,NULL),(13,8,'计量单位','',1,'Unit','index',0,NULL),(14,8,'物料类别','',1,'Category','index',0,NULL),(15,8,'物料管理','',1,'Product','index',0,NULL);
/*!40000 ALTER TABLE `w_menu` ENABLE KEYS */;

#
# Structure for table "w_order"
#

DROP TABLE IF EXISTS `w_order`;
CREATE TABLE `w_order` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(40) DEFAULT NULL COMMENT '编号',
  `author` varchar(20) DEFAULT NULL COMMENT '制单者',
  `supplier` varchar(40) DEFAULT NULL COMMENT '供应商',
  `state` tinyint(1) unsigned DEFAULT NULL COMMENT '出库or入库',
  `type` varchar(40) DEFAULT NULL COMMENT '入库类型',
  `res` mediumtext,
  `desc` mediumtext,
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '时间',
  `sl` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

#
# Data for table "w_order"
#

/*!40000 ALTER TABLE `w_order` DISABLE KEYS */;
INSERT INTO `w_order` VALUES (1,'SN2017122907045664503','布尔','默认',1,'采购入库','[[\"5a470f4c59ebd\",\"\\u8363\\u8000V10\",\"10\",\"1999.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u4e2a\"],[\"5a47110d39206\",\"\\u91d1\\u7acbs10\",\"10\",\"2555.00\",\"\\u897f\\u5357\\u5730\\u533a\",\"\\u4e2a\"],[\"5a4711ce77e24\",\"\\u5c0f\\u7c736\",\"10\",\"2499.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u4e2a\"]]','暂无备注',1514546311,NULL),(2,'SN2017122907323362528','布尔','苏州牧冬光电有限公司',1,'销售退货','[[\"5a470f4c59ebd\",\"\\u8363\\u8000V10\",\"10\",\"1999.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u4e2a\"],[\"5a47110d39206\",\"\\u91d1\\u7acbs10\",\"10\",\"2555.00\",\"\\u897f\\u5357\\u5730\\u533a\",\"\\u4e2a\"],[\"5a4711ce77e24\",\"\\u5c0f\\u7c736\",\"10\",\"2499.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u4e2a\"]]','暂无备注',1514547169,NULL),(3,'SN2017122908231479439','布尔','苏州牧冬光电有限公司',1,'采购入库','[[\"5a470f4c59ebd\",\"\\u8363\\u8000V10\",\"10\",\"1999.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u4e2a\"],[\"5a47110d39206\",\"\\u91d1\\u7acbs10\",\"10\",\"2555.00\",\"\\u897f\\u5357\\u5730\\u533a\",\"\\u4e2a\"],[\"5a4711ce77e24\",\"\\u5c0f\\u7c736\",\"10\",\"2499.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u4e2a\"]]','暂无备注',1514550489,NULL),(4,'SN2017122909362794921','布尔','苏州牧冬光电有限公司',1,'采购入库','[[\"5a470f4c59ebd\",\"\\u8363\\u8000V10\",\"10\",\"1999.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u4e2a\"],[\"5a47110d39206\",\"\\u91d1\\u7acbs10\",\"10\",\"2555.00\",\"\\u897f\\u5357\\u5730\\u533a\",\"\\u4e2a\"],[\"5a4711ce77e24\",\"\\u5c0f\\u7c736\",\"10\",\"2499.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u4e2a\"]]','暂无备注',1514554602,NULL),(5,'SN2017123012034396767','布尔','苏州牧冬光电有限公司',1,'销售退货','[[\"5a470f4c59ebd\",\"\\u8363\\u8000V10\",\"10\",\"1999.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u4e2a\"],[\"5a47110d39206\",\"\\u91d1\\u7acbs10\",\"10\",\"2555.00\",\"\\u897f\\u5357\\u5730\\u533a\",\"\\u4e2a\"],[\"5a4711ce77e24\",\"\\u5c0f\\u7c736\",\"10\",\"2499.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u4e2a\"]]','',1514606653,NULL),(6,'SN2017123012080844521','布尔','默认',1,'采购入库','[[\"5a470f4c59ebd\",\"\\u8363\\u8000V10\",\"10\",\"1999.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u4e2a\"],[\"5a47110d39206\",\"\\u91d1\\u7acbs10\",\"10\",\"2555.00\",\"\\u897f\\u5357\\u5730\\u533a\",\"\\u4e2a\"],[\"5a4711ce77e24\",\"\\u5c0f\\u7c736\",\"10\",\"2499.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u4e2a\"]]','',1514606905,NULL),(7,'SN2017123012112963113','布尔','苏州牧冬光电有限公司',1,'采购入库','[[\"5a470f4c59ebd\",\"\\u8363\\u8000V10\",\"10\",\"1999.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u4e2a\"],[\"5a47110d39206\",\"\\u91d1\\u7acbs10\",\"10\",\"2555.00\",\"\\u897f\\u5357\\u5730\\u533a\",\"\\u4e2a\"],[\"5a4711ce77e24\",\"\\u5c0f\\u7c736\",\"10\",\"2499.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u4e2a\"]]','',1514607119,NULL),(8,'SN2018010109223955758','布尔','默认',2,'采购出库','[[\"5a450753a97ee\",\"\\u978b\\u5b50\",\"1\",\"5.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u7247\"]]','',1514812964,NULL),(9,'SN2018010212422646979','布尔','苏州牧冬光电有限公司',2,'采购出库','[[\"5a470f4c59ebd\",\"\\u8363\\u8000V10\",\"10\",\"1999.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u4e2a\"]]','',1514868162,NULL),(10,'SN2018010309343050992','管理员','默认',2,'采购出库','[[\"5a450753a97ee\",\"\\u978b\\u5b50\",\"21321321\",\"5.00\",\"\\u534e\\u4e2d\\u5730\\u533a\",\"\\u7247\"]]','',1514986473,NULL),(11,'SN2018030608213096119','管理员','苏州牧冬光电有限公司',1,'采购入库','[[\"5a450753a97ee\",\"\\u978b\\u5b50\",\"12\",\"5.00\",\"\\u534e\\u4e1c\\u4ed3\\u5e93\",\"\\u6839\"]]','',1520295701,NULL),(14,'SN2018030802283448817','布尔','默认',1,'采购入库','[[\"211100.00017\",\"\\u94dd\\u578b\\u6750\\u9762\\u76d6\",\"50\",\"5.00\",\"\\u4ed3\\u524d\\u5e93\",\"\\u6839\"]]','',1520490521,'123123123123'),(16,'SN2018030902472094158','管理员','默认',1,'采购入库','[[\"211100.00017\",\"\\u94dd\\u578b\\u6750\\u9762\\u76d6\",\"12\",\"5.00\",\"\\u4ed3\\u524d\\u5e93\",\"\\u6839\"]]','',1520578047,'123');
/*!40000 ALTER TABLE `w_order` ENABLE KEYS */;

#
# Structure for table "w_product"
#

DROP TABLE IF EXISTS `w_product`;
CREATE TABLE `w_product` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(20) DEFAULT NULL COMMENT '类型',
  `sn` varchar(40) NOT NULL DEFAULT '' COMMENT '编码',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '名称',
  `nbsn` varchar(40) DEFAULT NULL COMMENT '型号',
  `spec` varchar(40) DEFAULT NULL COMMENT '规格',
  `unit` varchar(20) DEFAULT NULL COMMENT '单位',
  `cjsn` varchar(40) DEFAULT NULL COMMENT '编码',
  `storage` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `supplier` varchar(40) DEFAULT NULL,
  `customer` varchar(40) DEFAULT NULL,
  `price` decimal(10,2) unsigned DEFAULT NULL,
  `num` mediumint(9) unsigned DEFAULT NULL COMMENT '数量',
  `status` tinyint(1) unsigned DEFAULT '0',
  `desc` mediumtext,
  `add_time` int(11) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL COMMENT '颜色',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='产品';

#
# Data for table "w_product"
#

/*!40000 ALTER TABLE `w_product` DISABLE KEYS */;
INSERT INTO `w_product` VALUES (1,'铝型材类','211100.00017','铝型材面盖','OEFG305','2012mm','根','5a450753a97ee','仓前库','A区','苏州牧冬光电有限公司','爱美克空气过滤器',5.00,207,0,'111',1514473336,'白');
/*!40000 ALTER TABLE `w_product` ENABLE KEYS */;

#
# Structure for table "w_storage"
#

DROP TABLE IF EXISTS `w_storage`;
CREATE TABLE `w_storage` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='仓库管理';

#
# Data for table "w_storage"
#

/*!40000 ALTER TABLE `w_storage` DISABLE KEYS */;
INSERT INTO `w_storage` VALUES (1,'SN2017122704154711343','仓前库','布尔','17052850083','华东仓库',0,'江苏省苏州市',1514349093);
/*!40000 ALTER TABLE `w_storage` ENABLE KEYS */;

#
# Structure for table "w_supplier"
#

DROP TABLE IF EXISTS `w_supplier`;
CREATE TABLE `w_supplier` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='供应商';

#
# Data for table "w_supplier"
#

/*!40000 ALTER TABLE `w_supplier` DISABLE KEYS */;
INSERT INTO `w_supplier` VALUES (1,'5a44a4f6f1f18','苏州牧冬光电有限公司','测试','15069900798','30024167@qq.com','15069900798','江苏省苏州市长阳街','苏州牧冬光电有限公司...',0,1514448252),(2,'5aa08dd969db9','张伟东','郭燕','15382396114','1206039940@qq.com','','','',0,1520471600);
/*!40000 ALTER TABLE `w_supplier` ENABLE KEYS */;

#
# Structure for table "w_unit"
#

DROP TABLE IF EXISTS `w_unit`;
CREATE TABLE `w_unit` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `desc` mediumtext,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "w_unit"
#

/*!40000 ALTER TABLE `w_unit` DISABLE KEYS */;
INSERT INTO `w_unit` VALUES (1,'箱',0,'箱',1514454975),(2,'个',0,'',1514455204),(3,'包',0,'',1514455226),(4,'片',0,'',1514455232),(5,'根',0,'',1520234833);
/*!40000 ALTER TABLE `w_unit` ENABLE KEYS */;

#
# Structure for table "w_user"
#

DROP TABLE IF EXISTS `w_user`;
CREATE TABLE `w_user` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `phone` varchar(12) DEFAULT NULL COMMENT '手机号',
  `eamil` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `truename` varchar(16) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0:正常 1:禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "w_user"
#

/*!40000 ALTER TABLE `w_user` DISABLE KEYS */;
INSERT INTO `w_user` VALUES (1,'bool','21232f297a57a5a743894a0e4a801fc3','17052850083','30024167','布尔',0),(2,'admin','21232f297a57a5a743894a0e4a801fc3','17052850083','30024167','管理员',0),(3,'wangdong','5fc2d383813bb4fe9f2e9465c2df8dd3',NULL,NULL,'王冬',0),(4,'chenxuezhen','d588f6c780829884c874887a91eab427',NULL,NULL,'陈雪珍',0),(5,'linchanchan','010ee07758973483ed7f3f1f623699f6',NULL,NULL,'林婵婵',0),(6,'yuhuimei','68b7d8cfa88dfbfaefb83cfe1de66746',NULL,NULL,'余慧梅',0),(7,'liuhui','f6cf7a0ee7d4cdc79242b8a064117969',NULL,NULL,'刘辉',0),(8,'yupinge','a605da59a71ac59a1fc9454a1f430444',NULL,NULL,'余萍娥',0);
/*!40000 ALTER TABLE `w_user` ENABLE KEYS */;
