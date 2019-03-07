CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(50) NOT NULL DEFAULT '',
  `ad_user_name` varchar(50) NOT NULL DEFAULT '',
  `ad_password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;