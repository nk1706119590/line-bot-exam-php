/*
Navicat MySQL Data Transfer

Source Server         : 1.179.246.109
Source Server Version : 50508
Source Host           : 1.179.246.109:3306
Source Database       : db_uuline_test

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2019-05-03 12:16:01
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `register`
-- ----------------------------
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of register
-- ----------------------------
