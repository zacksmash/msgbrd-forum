INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `user_active`, `user_is_admin`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_rememberme_token`, `user_failed_logins`, `user_last_failed_login`, `user_registration_datetime`, `user_registration_ip`, `user_bio`, `user_twitter`, `user_facebook`, `user_linkedin`, `user_avatar`)
VALUES
	(1,'administrator','$2y$10$r5WgArrTmDORsDDuQMUMDuFkSqYmzypyyuRm/DXUtoVEgnziJF4hO','admin@admin.admin',1,1,NULL,NULL,NULL,NULL,0,NULL,NOW(),'::1',NULL,NULL,NULL,NULL,0);

