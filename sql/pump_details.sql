CREATE TABLE `pump_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pump_name` varchar(50) NOT NULL DEFAULT '',
  `pump_address` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;