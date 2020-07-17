CREATE TABLE `post_replies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `reply_author` varchar(64) NOT NULL DEFAULT '',
  `reply_message` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
