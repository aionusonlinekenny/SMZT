/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : web

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-02-28 17:37:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 168pay
-- ----------------------------
DROP TABLE IF EXISTS `168pay`;
CREATE TABLE `168pay` (
  `logid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paynum` varchar(50) NOT NULL COMMENT '流水号，18位正整数',
  `cid` varchar(50) NOT NULL,
  `logdate` int(50) unsigned NOT NULL DEFAULT '0' COMMENT '日志写入时间戳',
  `userid` int(10) DEFAULT NULL COMMENT '玩家ID',
  `ip` varchar(20) CHARACTER SET gbk DEFAULT NULL,
  `serverid` varchar(20) CHARACTER SET gbk DEFAULT NULL COMMENT '游戏服标识，比如S1',
  `paymoney` decimal(10,2) NOT NULL COMMENT '冲值钱数',
  `payStyleId` varchar(50) NOT NULL,
  `l` varchar(50) NOT NULL,
  `flag` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '处理标识',
  `n` int(1) NOT NULL,
  `pf` varchar(20) NOT NULL,
  PRIMARY KEY (`logid`),
  KEY `cid` (`cid`),
  KEY `paynum` (`paynum`,`paymoney`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='168网络玩家充值记录';

-- ----------------------------
-- Records of 168pay
-- ----------------------------

-- ----------------------------
-- Table structure for 168paypass
-- ----------------------------
DROP TABLE IF EXISTS `168paypass`;
CREATE TABLE `168paypass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '流水号，18位正整数',
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='168网络充值系统用户支付密码';

-- ----------------------------
-- Records of 168paypass
-- ----------------------------

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户唯一ID，自增字段',
  `account` varchar(64) DEFAULT NULL,
  `passwd` varchar(32) DEFAULT NULL,
  `pass2` varchar(32) DEFAULT NULL,
  `zctime` varchar(32) DEFAULT NULL,
  `zcip` varchar(128) DEFAULT NULL,
  `pf` varchar(64) DEFAULT NULL,
  `dj` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `AK_Key_account` (`account`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='玩家的角色表';

-- ----------------------------
-- Records of account
-- ----------------------------

-- ----------------------------
-- Table structure for hunfu
-- ----------------------------
DROP TABLE IF EXISTS `hunfu`;
CREATE TABLE `hunfu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '游戏名称',
  `plat` varchar(255) DEFAULT NULL COMMENT '混服标识',
  `url` varchar(255) DEFAULT NULL,
  `loginkey` text COMMENT '漂浮在线客服',
  `paykey` text COMMENT '充值链接',
  `ok` varchar(255) DEFAULT NULL COMMENT '充值链接',
  `home` varchar(255) DEFAULT NULL COMMENT '总站',
  `QQ1` text COMMENT '在线客服1',
  `QQ2` int(30) DEFAULT '0' COMMENT '在线客服2',
  `QQqun` text COMMENT '玩家群链接',
  `onlineKF` varchar(255) DEFAULT NULL COMMENT '漂浮在线客服',
  `pay` varchar(255) DEFAULT NULL COMMENT '充值链接',
  `bj` varchar(255) DEFAULT NULL COMMENT '充值链接',
  `youqing` varchar(255) DEFAULT NULL,
  `weiduan` int(11) DEFAULT '0' COMMENT '微端',
  `hfqianzhui` varchar(255) DEFAULT NULL COMMENT '充值链接',
  `dlq` varchar(255) DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='混服接入表';

-- ----------------------------
-- Records of hunfu
-- ----------------------------
INSERT INTO `hunfu` VALUES ('1', 'Q萌江湖', 'bf', '127.0.0.1', 'ac59075b964b07bf', 'ac59075b964b07bf', '1', null, '10000', '0', '10000', null, '', null, null, '0', '', '#');

-- ----------------------------
-- Table structure for jk_shop_log
-- ----------------------------
DROP TABLE IF EXISTS `jk_shop_log`;
CREATE TABLE `jk_shop_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` char(50) DEFAULT NULL,
  `dingdan` char(255) NOT NULL COMMENT '订单号',
  `account` char(255) NOT NULL COMMENT '帐号',
  `plat` char(255) NOT NULL,
  `sid` char(255) NOT NULL COMMENT '服务器ID',
  `itemmoney` char(255) NOT NULL COMMENT '物品钻石价格',
  `itemnum` char(255) NOT NULL COMMENT '物品数量',
  `itemtype` char(255) NOT NULL COMMENT '物品类型',
  `itemtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '购买时间',
  `url` varchar(500) DEFAULT NULL COMMENT '地址',
  `accname` char(255) NOT NULL COMMENT '帐号',
  `itemname` char(255) NOT NULL COMMENT '物品名字',
  `itemid` char(255) NOT NULL COMMENT '物品ID',
  PRIMARY KEY (`id`),
  KEY `IDX_name` (`account`,`sid`(32)) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='平台接口商城日志';

-- ----------------------------
-- Records of jk_shop_log
-- ----------------------------
