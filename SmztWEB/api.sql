/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : api

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-02-28 17:37:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hunfu
-- ----------------------------
DROP TABLE IF EXISTS `hunfu`;
CREATE TABLE `hunfu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '游戏名称',
  `url` varchar(255) DEFAULT NULL,
  `plat` varchar(255) DEFAULT NULL COMMENT '总站',
  `loginkey` text COMMENT '漂浮在线客服',
  `paykey` text COMMENT '充值链接',
  `ok` varchar(255) DEFAULT NULL COMMENT '充值链接',
  `res_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='混服接入表';

-- ----------------------------
-- Records of hunfu
-- ----------------------------
INSERT INTO `hunfu` VALUES ('2', '浩辰', '', 'hc', 'ac59075b964b07hc', 'ac59075b964b07hc', '1', 'http://192.168.18.4/cdn1/');
INSERT INTO `hunfu` VALUES ('3', '九成', '', 'jc', 'ac59075b964b07jc', 'ac59075b964b07jc', '1', 'http://192.168.18.4/cdn2/');
INSERT INTO `hunfu` VALUES ('9', '圣享', '', 'sx', 'ac59075b964b07sx', 'ac59075b964b07sx', '1', 'http://192.168.18.4/cdn2/');
INSERT INTO `hunfu` VALUES ('8', '栗子游戏', '', 'lzyx', 'ac59075b964b07lzyx', 'ac59075b964b07lzyx', '1', 'http://192.168.18.4/cdn2/');
INSERT INTO `hunfu` VALUES ('1', '淡定', null, 'bf', 'ac59075b964b07bf', 'ac59075b964b07bf', '1', 'http://192.168.18.4/cdn3/');
INSERT INTO `hunfu` VALUES ('4', '紫霞', '', 'zx', 'ac59075b964b07zx', 'ac59075b964b07zx', '1', 'http://192.168.18.4/cdn1/');
INSERT INTO `hunfu` VALUES ('5', '72玩', '', '72w', 'ac59075b964b0772w', 'ac59075b964b0772w', '1', 'http://192.168.18.4/cdn2/');
INSERT INTO `hunfu` VALUES ('6', '101游戏', '', '101yx', 'ac59075b964b07101yx', 'ac59075b964b07101yx', '1', 'http://192.168.18.4/cdn2/');
INSERT INTO `hunfu` VALUES ('7', '4999游戏', '', '4999yx', 'ac59075b964b074999yx', 'ac59075b964b074999yx', '1', 'http://192.168.18.4/cdn2/');

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(255) DEFAULT NULL COMMENT '物品ID',
  `item_name` varchar(255) DEFAULT NULL COMMENT '物品名字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1109 DEFAULT CHARSET=utf8 COMMENT='邮件物品表';

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', '17025', 'CDK礼包');
INSERT INTO `item` VALUES ('21', '18302', '神器感恩礼包');
INSERT INTO `item` VALUES ('20', '12052', '专属神器包(道)');
INSERT INTO `item` VALUES ('19', '12051', '专属神器包(法)');
INSERT INTO `item` VALUES ('18', '12050', '专属神器包(战)');
INSERT INTO `item` VALUES ('17', '12058', '天之专属神器包(道)');
INSERT INTO `item` VALUES ('14', '12055', '完美专属神器包(道)');
INSERT INTO `item` VALUES ('15', '12056', '天之专属神器包(战)');
INSERT INTO `item` VALUES ('16', '12057', '天之专属神器包(法)');
INSERT INTO `item` VALUES ('2', '18201', '改名卡');
INSERT INTO `item` VALUES ('13', '12054', '完美专属神器包(法)');
INSERT INTO `item` VALUES ('12', '12053', '完美专属神器包(战)');
INSERT INTO `item` VALUES ('11', '12048', '境界6首饰礼盒(道)');
INSERT INTO `item` VALUES ('3', '12040', '境界10首饰礼盒(战)');
INSERT INTO `item` VALUES ('4', '12041', '境界10首饰礼盒(法)');
INSERT INTO `item` VALUES ('5', '12042', '境界10首饰礼盒(道)');
INSERT INTO `item` VALUES ('6', '12043', '境界8首饰礼盒(战)');
INSERT INTO `item` VALUES ('7', '12044', '境界8首饰礼盒(法)');
INSERT INTO `item` VALUES ('8', '12045', '境界8首饰礼盒(道)');
INSERT INTO `item` VALUES ('9', '12046', '境界6首饰礼盒(战)');
INSERT INTO `item` VALUES ('10', '12047', '境界6首饰礼盒(法)');
INSERT INTO `item` VALUES ('22', '11351', '元宝');
INSERT INTO `item` VALUES ('23', '10221', '攻沙奖励-金刚血石*1');
INSERT INTO `item` VALUES ('24', '10222', '攻沙奖励-热血神钻*1');
INSERT INTO `item` VALUES ('25', '4921', '攻沙奖励-杀伐血衣*1');
INSERT INTO `item` VALUES ('26', '4911', '攻沙奖励-杀伐血刃*1');
INSERT INTO `item` VALUES ('27', '18312', '攻沙奖励-超级神器包*1');
INSERT INTO `item` VALUES ('28', '17024', '攻沙奖励-1000万元宝*1');
INSERT INTO `item` VALUES ('29', '11510', '超级经验丹*1');
INSERT INTO `item` VALUES ('30', '4001', '上古武神霸刀*1');
INSERT INTO `item` VALUES ('31', '4002', '上古武神霸铠(男)*1');
INSERT INTO `item` VALUES ('32', '12201', '高级天赋书卷*1');
INSERT INTO `item` VALUES ('33', '20116', '魔器·记忆套装*1');
INSERT INTO `item` VALUES ('34', '19001', '聚灵珠*1');
INSERT INTO `item` VALUES ('35', '10010', '洗髓丹(我要洗点)*1');
INSERT INTO `item` VALUES ('36', '10012', '披风碎片*1');
INSERT INTO `item` VALUES ('37', '12032', '武神进阶丹*1');
INSERT INTO `item` VALUES ('38', '12005', '羽毛*1');
INSERT INTO `item` VALUES ('39', '1001', '沙城霸主称号*1');
INSERT INTO `item` VALUES ('40', '12007', '沙巴克宝盒*1');
INSERT INTO `item` VALUES ('41', '15001', '传奇宝藏*1');

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
  `itemname` char(255) NOT NULL COMMENT '物品名字',
  `itemid` char(255) NOT NULL COMMENT '物品ID',
  `url` varchar(500) DEFAULT NULL COMMENT '地址',
  `time` varchar(255) DEFAULT NULL,
  `beizhu` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_name` (`account`,`sid`(32)) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='平台接口商城日志';

-- ----------------------------
-- Records of jk_shop_log
-- ----------------------------

-- ----------------------------
-- Table structure for server
-- ----------------------------
DROP TABLE IF EXISTS `server`;
CREATE TABLE `server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `jieshao` varchar(255) DEFAULT NULL,
  `fqid` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL,
  `mysql_name` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `gmport` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `gmip` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `mysql_ip` varchar(255) DEFAULT NULL,
  `mysql_port` int(11) DEFAULT '3306',
  `mysql_root` varchar(255) DEFAULT NULL,
  `mysql_passwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COMMENT='开区写入表';

-- ----------------------------
-- Records of server
-- ----------------------------
INSERT INTO `server` VALUES ('1', '1', '区服', '1', '1', 'bt_qmjh_s1', '19001', '', '', '127.0.0.1', '2019-03-20 13:00:00', '127.0.0.1', '3306', 'root', '123456');
