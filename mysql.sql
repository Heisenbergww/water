DROP TABLE IF EXISTS `ocean_admin`;

CREATE TABLE `ocean_admin` (
  `adminid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `adminuser` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `adminpass` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `adminemail` char(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `salt` varchar(100) DEFAULT '',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `loginip` bigint(20) NOT NULL DEFAULT '0' COMMENT '登录IP',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`adminid`),
  UNIQUE KEY `shop_admin_adminuser_adminpass` (`adminuser`,`adminpass`),
  UNIQUE KEY `shop_admin_adminuser_adminemail` (`adminuser`,`adminemail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ocean_admin` WRITE;

INSERT INTO `ocean_admin` (`adminid`, `adminuser`, `adminpass`, `adminemail`, `salt`, `logintime`, `loginip`, `createtime`)
VALUES
	(1,'admin','570756ffb3e6ad50ea575e663b202f88','1033110136@qq.com','aejgoqrDOS',1474364525,1760337755,0);

UNLOCK TABLES;


DROP TABLE IF EXISTS `ocean_article`;

CREATE TABLE `ocean_article` (
  `articleid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'newsId',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '文章标题',
  `brief` text COMMENT '文章简介',
  `descr` text COMMENT '文章描述正文',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '文章封面',
  `isshow` enum('0','1') NOT NULL DEFAULT '0',
  `adminuser` varchar(50) DEFAULT NULL COMMENT '发表人',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `ocean_carousel`;

CREATE TABLE `ocean_carousel` (
  `imageid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '轮播图Id',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '封面',
  `orderid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`imageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `ocean_category`;

CREATE TABLE `ocean_category` (
  `cateid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT 'å名称',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '父类',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`cateid`),
  KEY `shop_category_parentid` (`parentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `ocean_company`;

CREATE TABLE `ocean_company` (
  `companyid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'company id',
  `companyname` varchar(200) NOT NULL DEFAULT '' COMMENT '公司名称',
  `companyaddress` varchar(200) NOT NULL DEFAULT '' COMMENT '公司地址',
  `companytel` varchar(200) NOT NULL DEFAULT '' COMMENT '公司电话',
  `companyemail` varchar(200) NOT NULL DEFAULT '' COMMENT '公司邮箱',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '地址图片',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`companyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ocean_company` WRITE;

INSERT INTO `ocean_company` (`companyid`, `companyname`, `companyaddress`, `companytel`, `companyemail`, `cover`, `createtime`)
VALUES
	(1,'BILL & FOX LIMITED','7/F,SPA CENTRE,NO.53-55 LOCKHART ROAD,','+86 18602267830','GTM@beforeship.com  ','uploads/company/5548457df4a8cc95ebT160919.png',0);

UNLOCK TABLES;



DROP TABLE IF EXISTS `ocean_message`;

CREATE TABLE `ocean_message` (
  `messageid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '留言id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '名称',
  `phone` char(32) NOT NULL DEFAULT '' COMMENT '电话',
  `email` char(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `detail` text COMMENT '详情',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '留言时间',
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ocean_product`;

CREATE TABLE `ocean_product` (
  `productid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'productid',
  `cateid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '产品名称',
  `sku` int(11) NOT NULL DEFAULT '0' COMMENT 'sku号',
  `features` text COMMENT '特点',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '描述简介',
  `descr` text COMMENT '详情',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '封面图',
  `pics` text,
  `pdf` varchar(200) NOT NULL DEFAULT '' COMMENT 'pdf',
  `is_tui` enum('0','1') DEFAULT '0' COMMENT '是否推荐',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`productid`),
  KEY `shop_product_cateid` (`cateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

