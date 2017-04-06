/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : wordpress

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2017-03-03 09:08:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wp_gl_grid`
-- ----------------------------
DROP TABLE IF EXISTS `wp_gl_grid`;
CREATE TABLE `wp_gl_grid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `widget_id` int(10) unsigned NOT NULL,
  `row` smallint(5) unsigned NOT NULL,
  `col` smallint(5) unsigned NOT NULL,
  `size_x` smallint(5) unsigned NOT NULL,
  `size_y` smallint(5) unsigned NOT NULL,
  `full_widget` tinyint(4) NOT NULL DEFAULT '0',
  `widget_name` varchar(255) NOT NULL,
  `parent_type` enum('glyph','page') NOT NULL DEFAULT 'page',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=294 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wp_gl_grid
-- ----------------------------
INSERT INTO `wp_gl_grid` VALUES ('287', '17', '7', '1', '0', '8', '3', '0', 'glyph', 'page');
INSERT INTO `wp_gl_grid` VALUES ('288', '7', '8', '0', '0', '11', '3', '0', 'glyph', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('290', '8', '29', '1', '0', '1', '1', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('291', '8', '9', '0', '0', '1', '1', '0', 'glyph', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('292', '17', '30', '4', '0', '8', '2', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('293', '17', '31', '0', '1', '6', '1', '0', 'text', 'page');
