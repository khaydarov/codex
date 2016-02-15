CREATE TABLE IF NOT EXISTS `Surveillance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` text NOT NULL,
  `session` varchar(512) NOT NULL,
  `get` text,
  `post` text,
  `cookie` text,
  `server` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;