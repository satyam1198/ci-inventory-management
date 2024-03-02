DROP TABLE IF EXISTS products;
CREATE TABLE `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `category_id` int NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;