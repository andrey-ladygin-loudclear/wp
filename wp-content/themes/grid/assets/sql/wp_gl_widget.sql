CREATE TABLE IF NOT EXISTS `{{TABLE}}` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) DEFAULT NULL,
  `options` text,
  `data` text,
  `args` text,
  `style` varchar(255) DEFAULT NULL,
  `full_width` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
