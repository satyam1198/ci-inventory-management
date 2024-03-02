DROP TABLE IF EXISTS prod_categories;
CREATE TABLE `prod_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3;

-- insert these records
INSERT INTO `ci_app`.`prod_categories` (`category`) VALUES ('Pills');
INSERT INTO `ci_app`.`prod_categories` (`category`) VALUES ('Cyrup');
INSERT INTO `ci_app`.`prod_categories` (`category`) VALUES ('Equipment');
INSERT INTO `ci_app`.`prod_categories` (`category`) VALUES ('Drops');
INSERT INTO `ci_app`.`prod_categories` (`category`) VALUES ('Cream & Paste');
INSERT INTO `ci_app`.`prod_categories` (`category`) VALUES ('Bandage tape');
INSERT INTO `ci_app`.`prod_categories` (`category`) VALUES ('Spray');