CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(50) NOT NULL DEFAULT '',
  `driver_phone_no` bigint(20) DEFAULT NULL,
  `driver_address` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;