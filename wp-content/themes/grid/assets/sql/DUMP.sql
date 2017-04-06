/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : wordpress

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2017-03-26 21:33:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wp_gl_grid`
-- ----------------------------
DROP TABLE IF EXISTS `wp_gl_grid`;
CREATE TABLE `wp_gl_grid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `widget_id` int(10) unsigned DEFAULT NULL,
  `row` smallint(5) unsigned NOT NULL,
  `col` smallint(5) unsigned NOT NULL,
  `size_x` smallint(5) unsigned NOT NULL,
  `size_y` smallint(5) unsigned NOT NULL,
  `full_widget` tinyint(4) NOT NULL DEFAULT '0',
  `widget_name` varchar(255) NOT NULL,
  `parent_type` varchar(100) NOT NULL DEFAULT 'page',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2590 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wp_gl_grid
-- ----------------------------
INSERT INTO `wp_gl_grid` VALUES ('290', '8', '29', '1', '0', '1', '1', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('291', '8', '9', '0', '0', '3', '1', '0', 'glyph', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('298', '9', '11', '0', '0', '1', '1', '0', 'glyph', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('301', '21', '35', '0', '0', '2', '3', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('302', '21', '12', '0', '2', '5', '3', '0', 'glyph', 'page');
INSERT INTO `wp_gl_grid` VALUES ('303', '21', '36', '0', '7', '3', '3', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('304', '21', '37', '0', '10', '2', '3', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('305', '12', '38', '0', '7', '5', '1', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('306', '12', '39', '0', '4', '3', '1', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('307', '12', '40', '0', '0', '4', '1', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('314', '12', '13', '1', '0', '12', '1', '0', 'glyph', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('315', '13', '47', '0', '0', '1', '1', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('316', '13', '0', '5', '2', '1', '1', '0', '', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('664', '17', '7', '0', '0', '8', '3', '0', 'glyph', 'page');
INSERT INTO `wp_gl_grid` VALUES ('665', '17', '30', '3', '0', '12', '2', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('666', '17', '31', '0', '8', '4', '3', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1093', '7', '8', '17', '0', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1094', '7', '8', '17', '0', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1095', '7', '8', '16', '0', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1096', '7', '8', '16', '0', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1097', '7', '8', '15', '0', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1098', '7', '8', '15', '0', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1099', '7', '8', '14', '0', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1100', '7', '8', '14', '0', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1101', '7', '9', '17', '6', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1102', '7', '9', '17', '6', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1103', '7', '9', '16', '6', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1104', '7', '9', '16', '6', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1105', '7', '9', '15', '6', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1106', '7', '9', '15', '6', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1107', '7', '9', '14', '6', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1108', '7', '9', '14', '6', '6', '1', '0', 'image', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1109', '7', '10', '13', '0', '12', '1', '0', 'glyph', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1110', '7', '10', '13', '0', '12', '1', '0', 'glyph', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1111', '7', '34', '10', '9', '3', '2', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1112', '7', '34', '10', '9', '3', '2', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1113', '7', '34', '8', '9', '3', '2', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1114', '7', '34', '8', '9', '3', '2', '0', 'text', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1212', '10', '0', '0', '1', '3', '1', '0', 'news', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1837', '22', '41', '9', '0', '12', '2', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1838', '22', '42', '5', '6', '6', '2', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1839', '22', '43', '7', '6', '6', '2', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1840', '22', '44', '5', '0', '6', '2', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1841', '22', '45', '2', '6', '6', '3', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1842', '22', '46', '2', '0', '6', '3', '0', 'text', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1843', '22', '1', '7', '0', '6', '2', '0', 'wp', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1844', '22', '3', '0', '4', '3', '2', '0', 'wp', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1845', '22', '4', '11', '4', '4', '2', '0', 'wp', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1846', '22', '5', '0', '0', '4', '2', '0', 'wp', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1847', '22', '6', '0', '7', '5', '2', '0', 'WP', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1877', '34', '18', '0', '0', '6', '3', '0', 'custom', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1878', '34', '22', '0', '6', '6', '3', '0', 'post_iteration', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1909', '22', '0', '0', '0', '10', '1', '0', 'post_title', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1910', '22', '0', '1', '5', '5', '3', '0', 'post_content', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1911', '22', '0', '1', '0', '5', '3', '0', 'post_thumbnail', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1912', '22', '0', '0', '10', '2', '4', '0', 'sidebar', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1963', '18', '0', '0', '0', '8', '2', '0', 'post_title', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1964', '18', '0', '2', '0', '8', '1', '0', 'post_content', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1965', '18', '0', '3', '0', '8', '1', '0', 'post_thumbnail', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1966', '18', '0', '0', '8', '4', '4', '0', 'sidebar', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1972', '35', '23', '0', '0', '6', '3', '0', 'post_iteration', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1973', '35', '24', '0', '6', '6', '3', '0', 'Custom', 'page');
INSERT INTO `wp_gl_grid` VALUES ('1983', '23', '0', '0', '0', '12', '1', '0', 'post_title', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1984', '23', '0', '1', '0', '6', '3', '0', 'post_content', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('1985', '23', '0', '1', '6', '6', '3', '0', 'post_thumbnail', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('2019', '24', '0', '0', '0', '12', '1', '0', 'post_title', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('2020', '24', '0', '4', '0', '12', '3', '0', 'post_content', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('2021', '24', '0', '1', '0', '12', '3', '0', 'post_thumbnail', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('2563', '25', '0', '0', '0', '4', '2', '0', 'news', 'glyph');
INSERT INTO `wp_gl_grid` VALUES ('2577', '60', '0', '8', '0', '12', '1', '0', 'post_author', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2578', '60', '0', '7', '2', '2', '1', '0', 'post_author_link', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2579', '60', '0', '3', '0', '9', '4', '0', 'post_content', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2580', '60', '0', '7', '0', '2', '1', '0', 'post_date', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2581', '60', '0', '7', '7', '2', '1', '0', 'post_permalink', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2582', '60', '0', '1', '4', '5', '2', '0', 'post_tags', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2583', '60', '0', '1', '0', '4', '2', '0', 'post_thumbnail', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2584', '60', '0', '7', '4', '3', '1', '0', 'post_time', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2585', '60', '0', '0', '0', '12', '1', '0', 'post_title', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2586', '60', '0', '1', '9', '3', '7', '0', 'sidebar', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2587', '60', '25', '9', '0', '5', '2', '0', 'glyph', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2588', '60', '26', '9', '5', '1', '1', '0', 'glyph', 'page');
INSERT INTO `wp_gl_grid` VALUES ('2589', '60', '71', '9', '6', '6', '2', '0', 'text', 'page');

-- ----------------------------
-- Table structure for `wp_gl_widget`
-- ----------------------------
DROP TABLE IF EXISTS `wp_gl_widget`;
CREATE TABLE `wp_gl_widget` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) DEFAULT NULL,
  `options` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wp_gl_widget
-- ----------------------------
INSERT INTO `wp_gl_widget` VALUES ('1', null, null);
INSERT INTO `wp_gl_widget` VALUES ('2', null, null);
INSERT INTO `wp_gl_widget` VALUES ('3', null, null);
INSERT INTO `wp_gl_widget` VALUES ('4', null, null);
INSERT INTO `wp_gl_widget` VALUES ('5', null, null);
INSERT INTO `wp_gl_widget` VALUES ('6', null, null);
INSERT INTO `wp_gl_widget` VALUES ('7', null, null);
INSERT INTO `wp_gl_widget` VALUES ('8', null, null);
INSERT INTO `wp_gl_widget` VALUES ('9', null, null);
INSERT INTO `wp_gl_widget` VALUES ('10', null, null);
INSERT INTO `wp_gl_widget` VALUES ('11', null, null);
INSERT INTO `wp_gl_widget` VALUES ('12', null, null);
INSERT INTO `wp_gl_widget` VALUES ('13', null, null);
INSERT INTO `wp_gl_widget` VALUES ('14', null, null);
INSERT INTO `wp_gl_widget` VALUES ('15', null, null);
INSERT INTO `wp_gl_widget` VALUES ('16', null, null);
INSERT INTO `wp_gl_widget` VALUES ('17', null, null);
INSERT INTO `wp_gl_widget` VALUES ('18', null, null);
INSERT INTO `wp_gl_widget` VALUES ('22', null, null);
INSERT INTO `wp_gl_widget` VALUES ('23', 'Rbuilder', '{\"category__in\":[\"3\",\"1\"],\"tag__in\":[\"5\",\"6\",\"7\"],\"post_parent\":\"\",\"author_name\":\"\",\"post_type\":\"page\",\"post_status\":\"private\",\"order\":\"ASC\",\"orderby\":\"modified\"}');
INSERT INTO `wp_gl_widget` VALUES ('24', null, null);
INSERT INTO `wp_gl_widget` VALUES ('25', null, null);
INSERT INTO `wp_gl_widget` VALUES ('26', null, null);

-- ----------------------------
-- Table structure for `wp_gl_widget_image`
-- ----------------------------
DROP TABLE IF EXISTS `wp_gl_widget_image`;
CREATE TABLE `wp_gl_widget_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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
INSERT INTO `wp_gl_widget_image` VALUES ('8', null);
INSERT INTO `wp_gl_widget_image` VALUES ('9', null);
INSERT INTO `wp_gl_widget_image` VALUES ('10', null);
INSERT INTO `wp_gl_widget_image` VALUES ('11', null);
INSERT INTO `wp_gl_widget_image` VALUES ('12', null);
INSERT INTO `wp_gl_widget_image` VALUES ('13', null);
INSERT INTO `wp_gl_widget_image` VALUES ('14', null);
INSERT INTO `wp_gl_widget_image` VALUES ('15', null);
INSERT INTO `wp_gl_widget_image` VALUES ('16', null);
INSERT INTO `wp_gl_widget_image` VALUES ('17', null);
INSERT INTO `wp_gl_widget_image` VALUES ('18', null);
INSERT INTO `wp_gl_widget_image` VALUES ('19', null);
INSERT INTO `wp_gl_widget_image` VALUES ('20', null);
INSERT INTO `wp_gl_widget_image` VALUES ('21', null);
INSERT INTO `wp_gl_widget_image` VALUES ('22', null);
INSERT INTO `wp_gl_widget_image` VALUES ('23', null);
INSERT INTO `wp_gl_widget_image` VALUES ('24', null);

-- ----------------------------
-- Table structure for `wp_gl_widget_text`
-- ----------------------------
DROP TABLE IF EXISTS `wp_gl_widget_text`;
CREATE TABLE `wp_gl_widget_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wp_gl_widget_text
-- ----------------------------
INSERT INTO `wp_gl_widget_text` VALUES ('1', null);
INSERT INTO `wp_gl_widget_text` VALUES ('2', null);
INSERT INTO `wp_gl_widget_text` VALUES ('3', null);
INSERT INTO `wp_gl_widget_text` VALUES ('4', null);
INSERT INTO `wp_gl_widget_text` VALUES ('5', null);
INSERT INTO `wp_gl_widget_text` VALUES ('6', null);
INSERT INTO `wp_gl_widget_text` VALUES ('7', null);
INSERT INTO `wp_gl_widget_text` VALUES ('8', null);
INSERT INTO `wp_gl_widget_text` VALUES ('9', null);
INSERT INTO `wp_gl_widget_text` VALUES ('10', null);
INSERT INTO `wp_gl_widget_text` VALUES ('11', null);
INSERT INTO `wp_gl_widget_text` VALUES ('12', null);
INSERT INTO `wp_gl_widget_text` VALUES ('13', null);
INSERT INTO `wp_gl_widget_text` VALUES ('14', null);
INSERT INTO `wp_gl_widget_text` VALUES ('15', null);
INSERT INTO `wp_gl_widget_text` VALUES ('16', null);
INSERT INTO `wp_gl_widget_text` VALUES ('17', null);
INSERT INTO `wp_gl_widget_text` VALUES ('18', null);
INSERT INTO `wp_gl_widget_text` VALUES ('19', null);
INSERT INTO `wp_gl_widget_text` VALUES ('20', null);
INSERT INTO `wp_gl_widget_text` VALUES ('21', null);
INSERT INTO `wp_gl_widget_text` VALUES ('22', null);
INSERT INTO `wp_gl_widget_text` VALUES ('23', null);
INSERT INTO `wp_gl_widget_text` VALUES ('24', null);
INSERT INTO `wp_gl_widget_text` VALUES ('25', null);
INSERT INTO `wp_gl_widget_text` VALUES ('26', null);
INSERT INTO `wp_gl_widget_text` VALUES ('27', null);
INSERT INTO `wp_gl_widget_text` VALUES ('28', null);
INSERT INTO `wp_gl_widget_text` VALUES ('29', '555');
INSERT INTO `wp_gl_widget_text` VALUES ('30', '555');
INSERT INTO `wp_gl_widget_text` VALUES ('31', '<p>awdawd &nbsp; &nbsp; &nbsp;2222222222222222222222</p>');
INSERT INTO `wp_gl_widget_text` VALUES ('32', 'TEST !#!@#!@#!@#');
INSERT INTO `wp_gl_widget_text` VALUES ('33', '111111111111111');
INSERT INTO `wp_gl_widget_text` VALUES ('34', '4444444444444');
INSERT INTO `wp_gl_widget_text` VALUES ('35', '11111');
INSERT INTO `wp_gl_widget_text` VALUES ('36', '2222222222222');
INSERT INTO `wp_gl_widget_text` VALUES ('37', '3333333333333');
INSERT INTO `wp_gl_widget_text` VALUES ('38', 'eeeeeeeeeeee');
INSERT INTO `wp_gl_widget_text` VALUES ('39', 'wwwwwwwww');
INSERT INTO `wp_gl_widget_text` VALUES ('40', 'aaaaaaaaaa');
INSERT INTO `wp_gl_widget_text` VALUES ('41', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>');
INSERT INTO `wp_gl_widget_text` VALUES ('42', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>');
INSERT INTO `wp_gl_widget_text` VALUES ('43', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>');
INSERT INTO `wp_gl_widget_text` VALUES ('44', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>');
INSERT INTO `wp_gl_widget_text` VALUES ('45', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>');
INSERT INTO `wp_gl_widget_text` VALUES ('46', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>');
INSERT INTO `wp_gl_widget_text` VALUES ('47', null);
INSERT INTO `wp_gl_widget_text` VALUES ('48', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>');
INSERT INTO `wp_gl_widget_text` VALUES ('49', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>');
INSERT INTO `wp_gl_widget_text` VALUES ('50', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>');
INSERT INTO `wp_gl_widget_text` VALUES ('51', null);
INSERT INTO `wp_gl_widget_text` VALUES ('52', null);
INSERT INTO `wp_gl_widget_text` VALUES ('53', null);
INSERT INTO `wp_gl_widget_text` VALUES ('54', null);
INSERT INTO `wp_gl_widget_text` VALUES ('55', null);
INSERT INTO `wp_gl_widget_text` VALUES ('56', null);
INSERT INTO `wp_gl_widget_text` VALUES ('57', null);
INSERT INTO `wp_gl_widget_text` VALUES ('58', null);
INSERT INTO `wp_gl_widget_text` VALUES ('59', null);
INSERT INTO `wp_gl_widget_text` VALUES ('60', null);
INSERT INTO `wp_gl_widget_text` VALUES ('61', null);
INSERT INTO `wp_gl_widget_text` VALUES ('62', null);
INSERT INTO `wp_gl_widget_text` VALUES ('63', null);
INSERT INTO `wp_gl_widget_text` VALUES ('64', null);
INSERT INTO `wp_gl_widget_text` VALUES ('65', null);
INSERT INTO `wp_gl_widget_text` VALUES ('66', null);
INSERT INTO `wp_gl_widget_text` VALUES ('67', null);
INSERT INTO `wp_gl_widget_text` VALUES ('68', null);
INSERT INTO `wp_gl_widget_text` VALUES ('69', null);
INSERT INTO `wp_gl_widget_text` VALUES ('70', null);
INSERT INTO `wp_gl_widget_text` VALUES ('71', '“Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?”');

-- ----------------------------
-- Table structure for `wp_gl_wp_widgets`
-- ----------------------------
DROP TABLE IF EXISTS `wp_gl_wp_widgets`;
CREATE TABLE `wp_gl_wp_widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `instance` varchar(1023) NOT NULL,
  `args` varchar(1023) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wp_gl_wp_widgets
-- ----------------------------
INSERT INTO `wp_gl_wp_widgets` VALUES ('1', 'WP_Widget_Archives', '', '');
INSERT INTO `wp_gl_wp_widgets` VALUES ('3', 'WP_Widget_Calendar', '{\"classname\":\"widget_calendar 2\",\"customize_selective_refresh\":\"1 2\",\"description\":\"A calendar of your site\\u2019s Posts. 2\"}', '{\"before_widget\":\"<div class=\\\"widget %s\\\"> 2\",\"after_widget\":\"<\\/div> 2\",\"before_title\":\"<h2 class=\\\"widgettitle\\\"> 2\",\"after_title\":\"<\\/h2> 2\"}');
INSERT INTO `wp_gl_wp_widgets` VALUES ('4', 'WP_Widget_Recent_Comments', '', '');
INSERT INTO `wp_gl_wp_widgets` VALUES ('5', 'WP_Widget_Categories', '{\"title\":\"FFF\",\"count\":\"5\",\"hierarchical\":\"1\",\"dropdown\":\"1\",\"classname\":\"widget_categories 123124412\",\"customize_selective_refresh\":\"123124412\",\"description\":\"A list or dropdown of categories. 123124412\"}', '{\"before_widget\":\"<div class=\\\"widget %s\\\"> 123124412\",\"after_widget\":\"<\\/div> 123124412\",\"before_title\":\"<h2 class=\\\"widgettitle\\\"> 123124412\",\"after_title\":\"<\\/h2>\"}');
INSERT INTO `wp_gl_wp_widgets` VALUES ('6', 'WP_Widget_Tag_Cloud', '', '');
