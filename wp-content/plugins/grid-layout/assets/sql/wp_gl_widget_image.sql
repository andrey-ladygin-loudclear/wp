/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : wordpress

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2017-03-03 09:08:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wp_gl_widget_image`
-- ----------------------------
DROP TABLE IF EXISTS `wp_gl_widget_image`;
CREATE TABLE `wp_gl_widget_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wp_gl_widget_image
-- ----------------------------
INSERT INTO `wp_gl_widget_image` VALUES ('1', null);
INSERT INTO `wp_gl_widget_image` VALUES ('2', null);
INSERT INTO `wp_gl_widget_image` VALUES ('3', null);
INSERT INTO `wp_gl_widget_image` VALUES ('4', null);
INSERT INTO `wp_gl_widget_image` VALUES ('5', null);
INSERT INTO `wp_gl_widget_image` VALUES ('6', null);
INSERT INTO `wp_gl_widget_image` VALUES ('7', null);
