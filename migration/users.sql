CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing id of each user, unique index',
  `session_id` varchar(48) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `email` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
  `role_id` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s account type (basic, premium, etc)',
  `remember_me_token` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `creation_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `last_login_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `last_failed_login` int DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `activation_hash` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `password_reset_hash` char(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `password_reset_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `provider_type` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `password_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='user data'