CREATE TABLE IF NOT EXISTS `{{TABLE}}` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `widget_id` int(10) unsigned DEFAULT NULL,
  `row` smallint(5) unsigned NOT NULL,
  `col` smallint(5) unsigned NOT NULL,
  `size_x` smallint(5) unsigned NOT NULL,
  `size_y` smallint(5) unsigned NOT NULL,
  `widget_name` varchar(255) NOT NULL,
  `parent_type` varchar(100) NOT NULL DEFAULT 'page',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4655 DEFAULT CHARSET=latin1;
