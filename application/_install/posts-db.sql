CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `author_email` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_author` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_title` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_category` varchar(13) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_message` varchar(350) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `post_solved` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edited` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
