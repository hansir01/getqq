/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50027
Source Host           : localhost:3306
Source Database       : qznew

Target Server Type    : MYSQL
Target Server Version : 50027
File Encoding         : 65001

Date: 2014-01-22 07:53:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tj_admin
-- ----------------------------
DROP TABLE IF EXISTS `tj_admin`;
CREATE TABLE `tj_admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_admin
-- ----------------------------
INSERT INTO `tj_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- Table structure for tj_mail_tpl
-- ----------------------------
DROP TABLE IF EXISTS `tj_mail_tpl`;
CREATE TABLE `tj_mail_tpl` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL,
  `title` varchar(255) default NULL,
  `body` text,
  `time` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_mail_tpl
-- ----------------------------

-- ----------------------------
-- Table structure for tj_maildata
-- ----------------------------
DROP TABLE IF EXISTS `tj_maildata`;
CREATE TABLE `tj_maildata` (
  `id` int(11) NOT NULL auto_increment,
  `webid` int(11) NOT NULL default '0' COMMENT '0不限制发送范围其它则是根据网站ID发送',
  `uid` int(11) NOT NULL,
  `mailhost` varchar(255) NOT NULL,
  `mailport` int(11) NOT NULL default '25',
  `mailuser` varchar(255) NOT NULL,
  `mailpass` varchar(255) default NULL,
  `tplid` int(11) default NULL,
  `time` int(11) default NULL,
  `status` int(1) NOT NULL,
  `count` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_maildata
-- ----------------------------

-- ----------------------------
-- Table structure for tj_maillog
-- ----------------------------
DROP TABLE IF EXISTS `tj_maillog`;
CREATE TABLE `tj_maillog` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `webid` int(11) NOT NULL,
  `mailuser` varchar(255) NOT NULL,
  `tpl` text NOT NULL,
  `time` int(11) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1自动发送 2手工发送',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2033 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_maillog
-- ----------------------------

-- ----------------------------
-- Table structure for tj_members
-- ----------------------------
DROP TABLE IF EXISTS `tj_members`;
CREATE TABLE `tj_members` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agent` int(11) NOT NULL default '1000',
  `rmb` decimal(11,2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rmbtime` int(11) NOT NULL,
  `loginip` varchar(100) default NULL,
  `logintime` int(11) default NULL,
  `logincount` int(11) NOT NULL default '0',
  `vipstartime` int(11) default NULL,
  `vipendtime` int(11) default NULL,
  `isvip` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14056 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_members
-- ----------------------------

-- ----------------------------
-- Table structure for tj_qq_visit
-- ----------------------------
DROP TABLE IF EXISTS `tj_qq_visit`;
CREATE TABLE `tj_qq_visit` (
  `id` int(11) NOT NULL auto_increment,
  `urlkey` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `cookies` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `webid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17086 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_qq_visit
-- ----------------------------

-- ----------------------------
-- Table structure for tj_qqdata
-- ----------------------------
DROP TABLE IF EXISTS `tj_qqdata`;
CREATE TABLE `tj_qqdata` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `cookiesid` varchar(100) default NULL,
  `webid` int(11) default NULL,
  `qq` varchar(50) default NULL,
  `sex` varchar(20) default NULL,
  `qqnick` varchar(50) default NULL,
  `title` varchar(255) default NULL,
  `keyword` varchar(255) default NULL,
  `ip` varchar(255) default NULL,
  `ipcity` varchar(100) default NULL,
  `url` varchar(255) default NULL,
  `referer` varchar(255) default NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7982 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_qqdata
-- ----------------------------

-- ----------------------------
-- Table structure for tj_servers
-- ----------------------------
DROP TABLE IF EXISTS `tj_servers`;
CREATE TABLE `tj_servers` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `urlhost` varchar(255) default NULL,
  `time` int(11) default NULL,
  `flg` int(1) NOT NULL default '1' COMMENT '服务器注册状态  1开启注册 2 关闭注册',
  `status` int(1) NOT NULL default '1' COMMENT '全局统计开关 1为开启 0为关闭 关闭后将不能进行统计',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_servers
-- ----------------------------
INSERT INTO `tj_servers` VALUES ('1', '默认服务器', 'http://www.getqq.org/index.php/Tj/index', null, '1', '1');

-- ----------------------------
-- Table structure for tj_sites
-- ----------------------------
DROP TABLE IF EXISTS `tj_sites`;
CREATE TABLE `tj_sites` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `subtype` varchar(255) default NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` int(11) default NULL,
  `provinces` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `webinfo` varchar(255) default NULL,
  `status` int(1) NOT NULL default '1',
  `serverid` int(11) NOT NULL default '1',
  `aotumail` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tj_sites
-- ----------------------------
