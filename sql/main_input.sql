CREATE TABLE `main_input` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `bus_route` varchar(50) NOT NULL DEFAULT '',
  `bus_no` varchar(50) NOT NULL DEFAULT '',
  `driver_name` varchar(50) NOT NULL DEFAULT '',
  `pump_name` varchar(50) NOT NULL DEFAULT '',
  `fuel_taken` float NOT NULL,
  `rate_on_date` float NOT NULL,
  `distance_covered` float NOT NULL,
  `chalan_no` varchar(50) NOT NULL DEFAULT '',
  `oil_cost` float NOT NULL,
  `amount_paid` float NOT NULL,
  `due_payment` float NOT NULL,
  `milage` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
