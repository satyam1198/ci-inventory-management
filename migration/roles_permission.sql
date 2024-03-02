DROP TABLE IF EXISTS roles;
CREATE table roles( 
	`id` int AUTO_INCREMENT,
	`name` varchar(65) not null, 
	`display_name` varchar(65) NOT NULL,
	`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`created_at` datetime NOT NULL,
	PRIMARY KEY(`id`)
);
-- insert these records
INSERT INTO roles (`name`, `display_name`, ) VALUES('admin', 'Admin');

DROP TABLE IF EXISTS permission;
CREATE TABLE permissions(
	`id` int AUTO_INCREMENT,
    `name` varchar(65) NOT NULL,
    `description` varchar(255),
    `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `deleted_at` datetime,
    PRIMARY KEY(`id`)
);
-- insert these records
INSERT INTO permissions (`name`, `description`) VALUES('user_can_see_dashboard', 'User Can See Dashboard');
INSERT INTO permissions (`name`, `description`) VALUES('user_can_see_user', 'User Can See User');
INSERT INTO permissions (`name`, `description`) VALUES('user_can_see_roles', 'User Can See Roles');
INSERT INTO permissions (`name`, `description`) VALUES('user_can_see_permission', 'User Can See Permission');
INSERT INTO permissions (`name`, `description`) VALUES('user_can_see_product_list', 'User Can See Product List');

DROP TABLE IF EXISTS user_has_permission;
create table user_has_permission(
	`id` int AUTO_INCREMENT NOT NULL,
    `user_id` int NOT NULL,
    `permission_id` int NOT NULL,
    PRIMARY KEY(`id`)
);
-- insert these records
INSERT INTO user_has_permission (`user_id`, `permission_id`) VALUES(1, 1);
INSERT INTO user_has_permission (`user_id`, `permission_id`) VALUES(1, 2);
INSERT INTO user_has_permission (`user_id`, `permission_id`) VALUES(1, 3);
INSERT INTO user_has_permission (`user_id`, `permission_id`) VALUES(1, 4);
INSERT INTO user_has_permission (`user_id`, `permission_id`) VALUES(1, 5);


DROP TABLE IF EXISTS role_has_permission;
create table role_has_permission(
	`id` int AUTO_INCREMENT,
    `role_id` int NOT NULL,
    `permission_id` int NOT NULL,
    PRIMARY KEY(`id`)
);
-- insert these records
INSERT INTO role_has_permission (`role_id`, `permission_id`) VALUES(2, 1);
INSERT INTO role_has_permission (`role_id`, `permission_id`) VALUES(2, 2);
INSERT INTO role_has_permission (`role_id`, `permission_id`) VALUES(2, 3);
INSERT INTO role_has_permission (`role_id`, `permission_id`) VALUES(2, 4);
INSERT INTO role_has_permission (`role_id`, `permission_id`) VALUES(2, 5);

DROP TABLE IF EXISTS user_has_role;
create table user_has_role(
	`id` int AUTO_INCREMENT,
    `user_id` int NOT NULL,
    `role_id` int NOT NULL,
    PRIMARY KEY(`id`)
);
-- insert these records
INSERT INTO user_has_role (`user_id`, `role_id`) VALUES(1, 2);
