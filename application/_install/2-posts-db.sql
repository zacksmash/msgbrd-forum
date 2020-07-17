CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `author_email` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_author` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_title` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_category` varchar(13) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_message` longtext COLLATE utf8_general_mysql500_ci NOT NULL,
  `post_solved` int(1) DEFAULT NULL,
  `date` datetime NOT NULL,
  `edited` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
