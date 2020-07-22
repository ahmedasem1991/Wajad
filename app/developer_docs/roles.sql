INSERT INTO `roles` (`id`, `slug`, `name`, `corporate_id`, `limitation_of_posts`, `default_group`, `auto_approve`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'super admin', NULL, 0, 0, 0, NULL, '2019-12-26 16:03:11', '2019-12-26 16:03:11'),
(2, 'corporate-admin', 'corporate admin', 1, 0, 0, 0, NULL, '2019-12-29 09:23:47', '2019-12-29 09:23:47'),
(3, 'default-group', 'Default Group', NULL, 100, 1, 0, NULL, '2019-12-29 09:23:47', '2019-12-29 09:23:47');
 