/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : water

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-03-28 20:05:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ocean_admin
-- ----------------------------
DROP TABLE IF EXISTS `ocean_admin`;
CREATE TABLE `ocean_admin` (
  `adminid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `adminuser` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员',
  `adminpass` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `adminemail` char(50) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `salt` varchar(100) DEFAULT '',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `loginip` bigint(20) NOT NULL DEFAULT '0' COMMENT '登录ip',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`adminid`),
  UNIQUE KEY `shop_admin_adminuser_adminpass` (`adminuser`,`adminpass`),
  UNIQUE KEY `shop_admin_adminuser_adminemail` (`adminuser`,`adminemail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_admin
-- ----------------------------
INSERT INTO `ocean_admin` VALUES ('1', 'admin', 'f7f6b95ed175fa4c555138f61258206d', '1033110136@qq.com', 'jilpqxFSTZ', '1488246382', '2130706433', '1475051808');
INSERT INTO `ocean_admin` VALUES ('2', 'AmyZhang', '6da778525aaaacb17de0fc9079b2bfba', '2885697908@qq.com', '340ansvAOQ', '1484019916', '-1062680821', '1475051958');
INSERT INTO `ocean_admin` VALUES ('3', 'ding', '266b92be5b3c0f0f58d51a9a90a93eac', '8888888@88.88', '69dvxzDQRU', '1488939251', '2130706433', '1488251361');

-- ----------------------------
-- Table structure for ocean_article
-- ----------------------------
DROP TABLE IF EXISTS `ocean_article`;
CREATE TABLE `ocean_article` (
  `articleid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '标题',
  `brief` text COMMENT '简介',
  `descr` text COMMENT '内容',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '图片',
  `isshow` enum('0','1') NOT NULL DEFAULT '0',
  `adminuser` varchar(50) DEFAULT NULL COMMENT '发表人',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_article
-- ----------------------------
INSERT INTO `ocean_article` VALUES ('1', '你好', '这是一首简单的小晴格格', '<p><span style=\"line-height: 28px; color: black; font-size: 14pt;\">2017</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">年元月</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">10</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">日，市水务局陈远鸣副局长带队一行对金海水厂二期工程进行了春节节前大检查，水务集团副总经理申一尘、建管中心、安保部相关负责人列席参加，公司总经理陆晓如、副总经理杨凯人，以及相关职能部室负责人等陪同参加。</span></p><p><span style=\"line-height: 28px; color: black; font-size: 14pt;\">据悉，金海水厂二期工程是今年在建的水务行业唯一一个大型自来水建设项目。为此，市水务局、城投集团和水务集团都极其重视，要求金海二期项目按照市重大工程标准推进，并且结合农历春节到来之际，有关农民工工资、工地值班等制度以及年后的工作重点具体部署如下：</span></p><p><span style=\"line-height: 28px; color: black; font-size: 14pt;\">1</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">、严格落实春节工地值班制度，明确安保责任，强调非生产时期的安全工作重点；2、按时足额支付工程款，确保春节前农民工工资能妥善发放到位；3、按照相关政策推行</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">BIM</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">技术，争取早日利用该技术为金海二期工程产生各项效益；4、抓紧协调落实供电、配套云间泵站和配套输水管相关事宜；5、开展金海水厂深度处理系统的可行性研究，争取早日立项。</span></p><p><br/></p>', 'uploads/article/cover6215258b4dd61b2ea4T170228.jpg', '1', 'admin', '1488248161');
INSERT INTO `ocean_article` VALUES ('3', '你是谁', '首页的大的框架，banner，logo，这几个，我问了林超，她今天回杭州，下周我安排她做logo<br>', '<p>首页的大的框架，banner，logo，这几个，我问了林超，她今天回杭州，下周我安排她做logo</p>', 'uploads/article/cover2366358b4df4fd8ae7T170228.jpg', '1', 'admin', '1488248655');

-- ----------------------------
-- Table structure for ocean_carousel
-- ----------------------------
DROP TABLE IF EXISTS `ocean_carousel`;
CREATE TABLE `ocean_carousel` (
  `imageid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '图片',
  `orderid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '图片排序',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`imageid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_carousel
-- ----------------------------
INSERT INTO `ocean_carousel` VALUES ('13', 'uploads/banner/banner9984858bf6d078a23fT170308.jpg', '1', '1488940295');
INSERT INTO `ocean_carousel` VALUES ('14', 'uploads/banner/banner1530158bf6d0d13923T170308.jpg', '2', '1488940301');

-- ----------------------------
-- Table structure for ocean_category
-- ----------------------------
DROP TABLE IF EXISTS `ocean_category`;
CREATE TABLE `ocean_category` (
  `cateid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '名称',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '外键',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`cateid`),
  KEY `shop_category_parentid` (`parentid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_category
-- ----------------------------
INSERT INTO `ocean_category` VALUES ('5', 'Steel Wire', '0', '0');
INSERT INTO `ocean_category` VALUES ('6', 'Steel Coil', '0', '0');
INSERT INTO `ocean_category` VALUES ('8', 'Steel Sheet', '0', '0');
INSERT INTO `ocean_category` VALUES ('9', 'Profile Steel', '0', '0');
INSERT INTO `ocean_category` VALUES ('10', 'Steel Pipe', '0', '0');
INSERT INTO `ocean_category` VALUES ('11', 'Steel Rebar', '5', '0');
INSERT INTO `ocean_category` VALUES ('12', 'Wire Rods', '5', '0');
INSERT INTO `ocean_category` VALUES ('13', 'Hot Rolled Coil', '6', '0');
INSERT INTO `ocean_category` VALUES ('16', 'Cold Rolled Coil', '6', '0');
INSERT INTO `ocean_category` VALUES ('17', 'Galvanized Steel Coil', '6', '0');
INSERT INTO `ocean_category` VALUES ('18', 'Galvalumed Steel Coil', '6', '0');
INSERT INTO `ocean_category` VALUES ('19', ' Prepainted Galvanized Steel Coil', '6', '0');
INSERT INTO `ocean_category` VALUES ('20', 'Hot Rolled Sheet', '8', '0');
INSERT INTO `ocean_category` VALUES ('21', 'Cold Rolled Sheet', '8', '0');
INSERT INTO `ocean_category` VALUES ('22', 'Galvanized Steel Sheet', '8', '0');
INSERT INTO `ocean_category` VALUES ('23', 'H-beam', '9', '0');
INSERT INTO `ocean_category` VALUES ('24', 'I beam', '9', '0');
INSERT INTO `ocean_category` VALUES ('25', 'Angle Steel', '9', '0');
INSERT INTO `ocean_category` VALUES ('26', 'U-channel', '9', '0');
INSERT INTO `ocean_category` VALUES ('27', 'Hot Dip Galvanized Round Pipe', '10', '0');
INSERT INTO `ocean_category` VALUES ('28', 'Seamless Steel Pipe', '10', '0');
INSERT INTO `ocean_category` VALUES ('29', 'Black Pipe', '10', '0');

-- ----------------------------
-- Table structure for ocean_category_2
-- ----------------------------
DROP TABLE IF EXISTS `ocean_category_2`;
CREATE TABLE `ocean_category_2` (
  `cateid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '名称',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '外键',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`cateid`),
  KEY `shop_category_parentid` (`parentid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_category_2
-- ----------------------------
INSERT INTO `ocean_category_2` VALUES ('5', '哈哈', '0', '0');
INSERT INTO `ocean_category_2` VALUES ('6', '哈哈', '0', '0');
INSERT INTO `ocean_category_2` VALUES ('8', '哈哈', '0', '0');
INSERT INTO `ocean_category_2` VALUES ('9', '哈哈', '0', '0');
INSERT INTO `ocean_category_2` VALUES ('10', '哈哈', '0', '0');
INSERT INTO `ocean_category_2` VALUES ('11', '哈哈', '5', '0');
INSERT INTO `ocean_category_2` VALUES ('12', '哈哈', '5', '0');
INSERT INTO `ocean_category_2` VALUES ('13', '哈哈', '6', '0');
INSERT INTO `ocean_category_2` VALUES ('16', '哈哈', '6', '0');
INSERT INTO `ocean_category_2` VALUES ('17', '哈哈', '6', '0');
INSERT INTO `ocean_category_2` VALUES ('18', '哈哈', '6', '0');
INSERT INTO `ocean_category_2` VALUES ('19', '哈哈', '6', '0');
INSERT INTO `ocean_category_2` VALUES ('20', '哈哈', '8', '0');
INSERT INTO `ocean_category_2` VALUES ('21', '哈哈', '8', '0');
INSERT INTO `ocean_category_2` VALUES ('22', '哈哈', '8', '0');
INSERT INTO `ocean_category_2` VALUES ('23', '哈哈', '9', '0');
INSERT INTO `ocean_category_2` VALUES ('24', '哈哈', '9', '0');
INSERT INTO `ocean_category_2` VALUES ('25', '哈哈', '9', '0');
INSERT INTO `ocean_category_2` VALUES ('26', '哈哈', '9', '0');
INSERT INTO `ocean_category_2` VALUES ('27', '哈哈', '10', '0');
INSERT INTO `ocean_category_2` VALUES ('28', '哈哈', '10', '0');
INSERT INTO `ocean_category_2` VALUES ('29', '哈哈', '10', '0');

-- ----------------------------
-- Table structure for ocean_column
-- ----------------------------
DROP TABLE IF EXISTS `ocean_column`;
CREATE TABLE `ocean_column` (
  `columnid` int(11) NOT NULL AUTO_INCREMENT,
  `detail` text,
  PRIMARY KEY (`columnid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_column
-- ----------------------------
INSERT INTO `ocean_column` VALUES ('1', '<h1 style=\"text-align: center;\"><span style=\"font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">Tianjin Minsco International Trade CO.,LTD</span></h1><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">Tianjin Minsco International Trade CO.,LTD, with our own steel mills Hebei Taigang Steel located in Tangshan, Hebei Province with annual supply capacity 3 million tons. We specialize on the steel production, stocking ,selling &amp; trading in both domestic and aboard.</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">Our product range as following:</span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">1)Steel Wire: Rebar&amp; Wire Rods</span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">2)Steel Coil: HRC,CRC,GI,GL &amp; PPGI&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">&nbsp; &nbsp;Steel Plate: HRP,CRP,GI plate</span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">3)Profile Steel: H-beam, I beam, Angle Steel and U-channel</span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">4)Steel Pipe:Hot Dip Galvanized Round Pipe,Seamless Steel Pipe,Black Pipe&nbsp;</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">Equipped with advanced technology and professional engineers for production and inspection facilities, we strictly following up ISO quality management system and other international standard &amp; regulation to ensure the high product quality and we constantly upgrade our process management to assure the satisfaction of customer.</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">On the foundation of equality and mutual benefit, Tianjin Minsco have developed strategic partnership cooperation relationship with many State-owned Company like Minmental, CAMCE, Hebei Logistic Industry Group, Xinjiang Investment Development Group in steel product exporting business., which offer us strong support in both funds, logistic and top credit.</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">Our steel series products had been sold to South-East Asia, Middle East, South America, Africa, Saudi-Arabia &amp;etc, our products are quite popular for the super quality and good service.</span></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\">Tianjin Minsco always adhere to the principle of &quot;Quality First , Credit-Based&quot; ,pursuing 100% customer satisfaction, fully taking the advantages, forging ahead, ensuring quality and creating brand to offer perfect service to all the customers. We would like to join hands with old and existing customer to seek further development and bright future!</span></p><p><br/></p>');

-- ----------------------------
-- Table structure for ocean_company
-- ----------------------------
DROP TABLE IF EXISTS `ocean_company`;
CREATE TABLE `ocean_company` (
  `companyid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `companyname` varchar(200) DEFAULT '1' COMMENT '名称',
  `companyaddress` varchar(200) DEFAULT '1' COMMENT '地址',
  `companytel` varchar(200) DEFAULT '1' COMMENT '电话',
  `companyfax` varchar(200) DEFAULT '1' COMMENT '传真',
  `companymobile` varchar(200) DEFAULT '1' COMMENT '手机',
  `companyemail` varchar(200) DEFAULT '1' COMMENT '邮箱',
  `website` varchar(200) DEFAULT '1',
  `manufactureaddress` varchar(200) DEFAULT '1',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '图片',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`companyid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_company
-- ----------------------------
INSERT INTO `ocean_company` VALUES ('1', 'Tianjin Minsco International Trade Co ., Ltd', 'Room 2109,Tianjin World Financial Center Office Tower, No.2 Dagu Bridge North, Heping District, Tianjin, China', '+86-22-65377686', '+86-13832325297', '+86-13832325297', 'Minsco@beforeship.com', 'Minsco@beforeship.com', '1', '', '1481698923');

-- ----------------------------
-- Table structure for ocean_front
-- ----------------------------
DROP TABLE IF EXISTS `ocean_front`;
CREATE TABLE `ocean_front` (
  `frontid` int(255) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `faqimg` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `company_img` varchar(255) DEFAULT NULL,
  `contact_img` varchar(255) DEFAULT NULL,
  `join_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`frontid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ocean_front
-- ----------------------------
INSERT INTO `ocean_front` VALUES ('1', 'uploads/front/logo61665582bd1e484016T161116.png', 'uploads/front/faqimg63895582bd1e4845f4T161116.jpg', 'uploads/front/v41395582bd1e484b5dT161116.jpg', 'uploads/front/company_img75962582bd1e485171T161116.jpg', 'uploads/front/contact_img72685582bd1e485974T161116.jpg', 'uploads/front/join_img64549582bd1e485efaT161116.jpg');

-- ----------------------------
-- Table structure for ocean_join
-- ----------------------------
DROP TABLE IF EXISTS `ocean_join`;
CREATE TABLE `ocean_join` (
  `messageid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ä¸»é”®id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT 'ç®¡ç†å‘˜',
  `tel` char(32) NOT NULL DEFAULT '' COMMENT 'ç”µè¯',
  `country` varchar(255) DEFAULT NULL,
  `email` char(50) NOT NULL DEFAULT '' COMMENT 'é‚®ç®±',
  `comment` text COMMENT 'ç•™è¨€è¯¦ç»†å†…å®¹',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'åˆ›å»ºæ—¶é—´',
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_join
-- ----------------------------

-- ----------------------------
-- Table structure for ocean_known
-- ----------------------------
DROP TABLE IF EXISTS `ocean_known`;
CREATE TABLE `ocean_known` (
  `articleid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '标题',
  `brief` text COMMENT '简介',
  `descr` text COMMENT '内容',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '图片',
  `isshow` enum('0','1') NOT NULL DEFAULT '0',
  `adminuser` varchar(50) DEFAULT NULL COMMENT '发表人',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_known
-- ----------------------------
INSERT INTO `ocean_known` VALUES ('3', '居民用水如何抄读水表', '<b>居民用水如何抄读水表</b>', '<p><span style=\"color: rgb(41, 52, 58); font-family: Simsun; font-size: 12px; text-indent: 18px; background-color: rgb(243, 249, 251);\">居民用水表按抄读形式分指针式和数字式水表。当抄读指针式水表时，要面对水表计量的标志（如表面上的立方米或 ）方向站立，切勿斜看、倒看，易生差错。抄读水表一律从左方高计量指针抄起，逐一抄读直至右方个位计量指针为止。一般红针的量不计。抄码应读8931，不能9931。因为千位针指9，但百针指9还未过0，所以千位针只能读8，依此类推，假如水表指针有偏差，可分析指针偏差的百分比，一般情况抄读应向百分比小的读靠拢。当抄读数字式水表时，一律从计量数抄起，逐一抄读直至右方个位计量数字为止，一般红数字的量不计。</span></p>', '', '1', 'admin', '1488250844');
INSERT INTO `ocean_known` VALUES ('4', '水表故障、水费帐单没有收到、水费与实际不符如何处理', '<b>水表故障、水费帐单没有收到、水费与实际不符如何处理</b>', '<p><span style=\"color: rgb(41, 52, 58); font-family: Simsun; font-size: 12px; text-indent: 18px; background-color: rgb(243, 249, 251);\">遇到水表故障，水费帐单没有收到，水费不符可按上次水费帐单提供的电话号码报修、补帐单、预约上门核对水量等，如无水费帐单，可拨打“114”查询所在地自来水公司的电话号码后进行上述业务的处理。</span></p>', '', '1', 'ding', '1488252446');

-- ----------------------------
-- Table structure for ocean_message
-- ----------------------------
DROP TABLE IF EXISTS `ocean_message`;
CREATE TABLE `ocean_message` (
  `messageid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员',
  `phone` char(32) NOT NULL DEFAULT '' COMMENT '电话',
  `email` char(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `detail` text COMMENT '留言详细内容',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `pls` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_message
-- ----------------------------
INSERT INTO `ocean_message` VALUES ('30', 'gaoshangzhao', '13251359fdsafsdaf', '123@1312.gg', 'dsf', '1484034184', '15,16,14,14,14,15,17,14,16,14,14,14,16,17,16,16,14,18,15,15,15,15,15,15,15,15,15', '127.0.0.1');
INSERT INTO `ocean_message` VALUES ('31', 'fdsa', '213', 'fads@12.12', '123', '1484034308', '15,16,14,14,14,15,17,14,16,14,14,14,16,17,16,16,14,18,15,15,15,15,15,15,15,15,15,18', '127.0.0.1');
INSERT INTO `ocean_message` VALUES ('32', 'gaoshangzhao', '13251359fdsafsdaf', 'asdf@we.fasd', 're', '1484034475', '15,16,14,14,14,15,17,14,16,14,14,14,16,17,16,16,14,18,15,15,15,15,15,15,15,15,15,18', '127.0.0.1');
INSERT INTO `ocean_message` VALUES ('33', 'gaoshang', '13251359fdsafsdaf', '80454545@gg.dd', 'qw', '1484100204', '15,16,14,14,14,15,17,14,16,14,14,14,16,17,16,16,14,18,15,15,15,15,15,15,15,15,15,18', '127.0.0.1');
INSERT INTO `ocean_message` VALUES ('34', 'gaoshang', '13251359fdsafsdaf', 'asdf@we.fasd', 'j', '1484102578', '15&gclid=Cj0KEQiAzZHEBRD0ivi9_pDzgYMBEiQAtvxt-CQT28O8dml46hqOmUAMe88SHa-tkfFz_xZWBFf72XUaAgaK8P8HAQ', '127.0.0.1');

-- ----------------------------
-- Table structure for ocean_news
-- ----------------------------
DROP TABLE IF EXISTS `ocean_news`;
CREATE TABLE `ocean_news` (
  `articleid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '标题',
  `brief` text COMMENT '简介',
  `descr` text COMMENT '内容',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '图片',
  `isshow` enum('0','1') NOT NULL DEFAULT '0',
  `adminuser` varchar(50) DEFAULT NULL COMMENT '发表人',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_news
-- ----------------------------
INSERT INTO `ocean_news` VALUES ('3', '水务局陈远鸣副局长赴金海水厂二期工地开展春节前安全大检查', '2017年元月10日，市水务局陈远鸣副局长带队一行对金海水厂二期工程进行了春节节前大检查', '<p><span style=\"line-height: 28px; color: black; font-size: 14pt;\">2017</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">年元月</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">10</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">日，市水务局陈远鸣副局长带队一行对金海水厂二期工程进行了春节节前大检查，水务集团副总经理申一尘、建管中心、安保部相关负责人列席参加，公司总经理陆晓如、副总经理杨凯人，以及相关职能部室负责人等陪同参加。</span></p><p><span style=\"line-height: 28px; color: black; font-size: 14pt;\">据悉，金海水厂二期工程是今年在建的水务行业唯一一个大型自来水建设项目。为此，市水务局、城投集团和水务集团都极其重视，要求金海二期项目按照市重大工程标准推进，并且结合农历春节到来之际，有关农民工工资、工地值班等制度以及年后的工作重点具体部署如下：</span></p><p><span style=\"line-height: 28px; color: black; font-size: 14pt;\">1</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">、严格落实春节工地值班制度，明确安保责任，强调非生产时期的安全工作重点；2、按时足额支付工程款，确保春节前农民工工资能妥善发放到位；3、按照相关政策推行</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">BIM</span><span style=\"line-height: 28px; color: black; font-size: 14pt;\">技术，争取早日利用该技术为金海二期工程产生各项效益；4、抓紧协调落实供电、配套云间泵站和配套输水管相关事宜；5、开展金海水厂深度处理系统的可行性研究，争取早日立项。</span></p><p><br/></p>', 'uploads/news/cover8871558bf6b2a53c87T170308.jpg', '1', 'ding', '1488939818');

-- ----------------------------
-- Table structure for ocean_product
-- ----------------------------
DROP TABLE IF EXISTS `ocean_product`;
CREATE TABLE `ocean_product` (
  `productid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `cateid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '外键',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '名称',
  `sku` int(11) NOT NULL DEFAULT '0' COMMENT 'sku号',
  `features` text COMMENT '商品特征',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '商品描述',
  `descr` text COMMENT '商品的详情',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '图片',
  `pics` text,
  `is_tui` enum('0','1') DEFAULT '0' COMMENT '是否推荐 0不推荐 1推荐',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `orderid` int(10) NOT NULL DEFAULT '100',
  `relation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productid`),
  KEY `shop_product_cateid` (`cateid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_product
-- ----------------------------
INSERT INTO `ocean_product` VALUES ('14', '11', 'Book Two', '12', '<p>also good books</p>', '1', '<p>● Pre-galvanized: Pre-galvanized pipe is made of hot dipped galvanized steel strip directly.</p><p>● Hot dipped galvanized: Hot dipped galvanized pipe owns thicker zinc coating than pre-galvanized pipe. Black pipes will be dipped into zinc pool for galvanizing.</p><p>● Electro galvanized: The technology of electro galvanized pipe is similar to hot dipped galvanized pipe, but the thickness of zinc coating is less than hot dipped galvanized pipe.</p><p>● Painted: Painted pipe to remove the rust and clean the oil first and then paint the required color paint.</p><p>Standard:GB/T6728:2002 , ASTM A500 , JIS G3466 , EN10210 ,EN10219</p><p>Steel Grade:</p><p>GB/T6728:2002 : Q195 , Q235 , Q345</p><p>ASTM A500:GR. A , GR. B, GR. C , GR. D</p><p>JIS G3466 : SS440,SS540</p><p>EN10210, EN10219: S235JR ,S275JR,S355JR, S355J2H</p><p><br/></p><table interlaced=\"enabled\"><tbody><tr class=\"ue-table-interlace-color-single firstRow\"><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">fff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td></tr><tr class=\"ue-table-interlace-color-double\"><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">fff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td></tr><tr class=\"ue-table-interlace-color-single\"><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">fff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td></tr><tr class=\"ue-table-interlace-color-double\"><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">fff</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\">ee</td></tr><tr class=\"ue-table-interlace-color-single\"><td width=\"52\" valign=\"top\" style=\"word-break: break-all;\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td></tr><tr class=\"ue-table-interlace-color-double\"><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td></tr><tr class=\"ue-table-interlace-color-single\"><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td><td width=\"52\" valign=\"top\"><br/></td></tr></tbody></table><p><br/></p><p><img src=\"http://steel.com/uploads/products/20161212/1481528024985513.png\" style=\"float: left;\" title=\"1481528024985513.png\"/></p><p><img src=\"http://steel.com/uploads/products/20161212/1481528024274327.png\" style=\"float: right;\" title=\"1481528024274327.png\"/></p><p><img src=\"http://steel.com/uploads/products/20161212/1481528024134284.png\" style=\"float: left;\" title=\"1481528024134284.png\"/></p><p><img src=\"http://steel.com/uploads/products/20161212/1481528024747892.png\" style=\"float: right;\" title=\"1481528024747892.png\"/></p><p><br/></p><p><br/></p>', 'uploads/products/cover90063583b913dd0718T161128.png', 'uploads/products/pro40098583b913dcfd3eT161128.png', '1', '1480298813', '1', 'a:5:{s:11:\"productid15\";s:2:\"15\";s:11:\"productid16\";s:2:\"16\";s:11:\"productid17\";s:2:\"17\";s:11:\"productid18\";s:2:\"18\";s:11:\"productid19\";s:2:\"19\";}');
INSERT INTO `ocean_product` VALUES ('15', '12', '123', '0', null, null, '<p>123</p>', 'uploads/products/cover1483258491a22101abT161208.png', 'uploads/products/pro2638058491a220f9c5T161208.png', '0', '1481185826', '213', null);
INSERT INTO `ocean_product` VALUES ('16', '11', 'fake', '0', null, null, '<p>213</p>', 'uploads/products/cover7955558491ace5c0f4T161208.jpeg', 'uploads/products/pro7916858491ace5ba49T161208.png', '1', '1481185998', '123', 'a:1:{s:11:\"productid14\";s:2:\"14\";}');
INSERT INTO `ocean_product` VALUES ('17', '13', 'one', '0', null, null, '<p>fasdfsaddf</p>', 'uploads/products/cover24554584a69dc9ac3cT161209.png', null, '0', '1481271772', '100', null);
INSERT INTO `ocean_product` VALUES ('18', '13', 'new', '0', null, null, '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', null, '0', '1481271852', '100', null);
INSERT INTO `ocean_product` VALUES ('19', '13', 'gg', '0', null, null, '<p>dfaaaaaaaaaaaaaaaaaaa</p>', 'uploads/products/cover57047584a6aa662ea7T161209.jpeg', null, '0', '1481271974', '100', null);
INSERT INTO `ocean_product` VALUES ('20', '13', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('21', '13', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('22', '13', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('23', '13', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('24', '17', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('25', '10', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('26', '10', '213213', '0', null, null, '<p>Square Pipe</p><p>● Pre-galvanized: Pre-galvanized pipe is made of hot dipped galvanized steel strip directly.</p><p>● Hot dipped galvanized: Hot dipped galvanized pipe owns thicker zinc coating than pre-galvanized pipe. Black pipes will be dipped into zinc pool for galvanizing.</p><p>● Electro galvanized: The technology of electro galvanized pipe is similar to hot dipped galvanized pipe, but the thickness of zinc coating is less than hot dipped galvanized pipe.</p><p>● Painted: Painted pipe to remove the rust and clean the oil first and&nbsp;</p>', 'uploads/products/cover42473584e51405d9fdT161212.png', null, '0', '1481527616', '100', null);
INSERT INTO `ocean_product` VALUES ('27', '21', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('28', '22', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('29', '20', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('30', '17', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');
INSERT INTO `ocean_product` VALUES ('31', '17', 'new', '0', '', '', '<p>123</p>', 'uploads/products/cover77280584a6a2cd820dT161209.png', '', '0', '1481271852', '100', '');

-- ----------------------------
-- Table structure for ocean_social_account
-- ----------------------------
DROP TABLE IF EXISTS `ocean_social_account`;
CREATE TABLE `ocean_social_account` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(200) DEFAULT 'https://www.facebook.com/',
  `twitter` varchar(200) DEFAULT 'https://twitter.com/',
  `youtube` varchar(200) DEFAULT 'https://youtube.com/',
  `linkedin` varchar(200) DEFAULT 'https://linkedin.com/',
  `instagram` varchar(200) DEFAULT 'https://instagram.com/',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocean_social_account
-- ----------------------------
INSERT INTO `ocean_social_account` VALUES ('1', 'https://www.facebook.com/', 'https://twitter.com/', 'https://youtube.com/', 'https://linkedin.com/', 'https://instagram.com/');
