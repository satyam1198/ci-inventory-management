CREATE TABLE IF NOT EXISTS `image_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `image_url` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;