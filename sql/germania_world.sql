# Export von Tabelle germania_world
# ------------------------------------------------------------

DROP TABLE IF EXISTS `germania_world`;

CREATE TABLE `germania_world` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `world_name` varchar(256) NOT NULL DEFAULT '',
  `world_url` varchar(64) NOT NULL DEFAULT '',
  `world_description` mediumtext,
  `world_photo` varchar(256) DEFAULT NULL,
  `is_active` int(2) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_world_url` (`world_url`),
  UNIQUE KEY `unique_world_name` (`world_name`),
  KEY `index_world_url` (`world_url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
