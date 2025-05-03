<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-03-04 10:43:18 --> Query error: Unknown column 'walking_bookings.day_walks' in 'field list' - Invalid query: SELECT `packages`.`name` AS `package_name`, `packages`.`price` AS `package_price`, `walking_bookings`.`day_walks` as `per_day_walks`, `walking_bookings`.`created_at` as `posted_time`, `ci_users`.`name` AS `client_name`, `ci_users`.`profile_pic` AS `client_photo`, `services`.`icon` AS `service_icon`, `walking_bookings`.`latitude` AS `lat1`, `walking_bookings`.`longitude` AS `lon1`, `ci_users`.`latitude` AS `lat2`, `ci_users`.`longitude` AS `lon2`
FROM `training_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `training_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `services` ON `training_bookings`.`service_id` = `services`.`id`
LEFT JOIN `packages` ON `training_bookings`.`package_id` = `packages`.`id`
WHERE `training_bookings`.`service_id` = '3'
ORDER BY `training_bookings`.`service_id` DESC
ERROR - 2023-03-04 10:44:05 --> Query error: Unknown column 'training_bookings.day_walks' in 'field list' - Invalid query: SELECT `packages`.`name` AS `package_name`, `packages`.`price` AS `package_price`, `training_bookings`.`day_walks` as `per_day_walks`, `walking_bookings`.`created_at` as `posted_time`, `ci_users`.`name` AS `client_name`, `ci_users`.`profile_pic` AS `client_photo`, `services`.`icon` AS `service_icon`, `training_bookings`.`latitude` AS `lat1`, `training_bookings`.`longitude` AS `lon1`, `ci_users`.`latitude` AS `lat2`, `ci_users`.`longitude` AS `lon2`
FROM `training_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `training_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `services` ON `training_bookings`.`service_id` = `services`.`id`
LEFT JOIN `packages` ON `training_bookings`.`package_id` = `packages`.`id`
WHERE `training_bookings`.`service_id` = '3'
ORDER BY `training_bookings`.`service_id` DESC
ERROR - 2023-03-04 11:19:50 --> Severity: Warning --> Undefined variable $array /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 752
ERROR - 2023-03-04 11:19:56 --> Severity: Warning --> Undefined variable $array /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 752
ERROR - 2023-03-04 11:19:59 --> Severity: Warning --> Undefined variable $array /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 752
ERROR - 2023-03-04 11:20:09 --> Severity: Warning --> Undefined variable $array /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 752
ERROR - 2023-03-04 12:07:23 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:07:23 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:13:07 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:13:07 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:38:22 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:38:22 --> Severity: Warning --> Undefined property: stdClass::$customer_id /home/cmschamps/public_html/pnp-app/application/controllers/api/Customers.php 46
ERROR - 2023-03-04 12:43:10 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:43:10 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:53:26 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:53:26 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:55:40 --> Query error: Unknown column 'grooming_bookings.booking_date' in 'field list' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `grooming_bookings`.`booking_date` AS `booking_date`, `grooming_bookings`.`booking_time` as `booking_time`, `grooming_bookings`.`message` as `message`, `packages`.`name` as `package_name`, `packages`.`general_addons` as `general_addons`, `packages`.`price` as `package_price`, `grooming_bookings`.`hair_cut` as `hair_cut`, `grooming_bookings`.`extra_addons` as `extra_addons`, `ci_users`.`name` AS `client_name`
FROM `training_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `training_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `training_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `training_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
WHERE `training_bookings`.`id` = '2'
ERROR - 2023-03-04 12:56:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:56:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:58:08 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 12:58:08 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:01:35 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:01:35 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:01:39 --> Query error: Unknown column 'walking_bookings.booking_date' in 'field list' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `walking_bookings`.`booking_date` AS `booking_date`, `walking_bookings`.`booking_time` as `booking_time`, `walking_bookings`.`message` as `message`, `packages`.`name` as `package_name`, `packages`.`general_addons` as `general_addons`, `packages`.`total_sessions` as `sessions`, `packages`.`price` as `package_price`, `training_bookings`.`extra_addons` as `extra_addons`, `ci_users`.`name` AS `client_name`
FROM `walking_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `walking_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `walking_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `walking_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
WHERE `walking_bookings`.`id` = '4'
ERROR - 2023-03-04 13:04:17 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:23 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:23 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:23 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:23 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:24 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:29 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:04:29 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:04:50 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:50 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:51 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:51 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:51 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:51 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:51 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:52 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:52 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:52 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:52 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:52 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:53 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:55 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:55 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:56 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:56 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:56 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:57 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:04:57 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:05:19 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:07:19 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:07:22 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:07:22 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:07:22 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:07:27 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:07:28 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:07:58 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:08:00 --> Severity: Warning --> Undefined property: stdClass::$time /home/cmschamps/public_html/pnp-app/application/controllers/api/Bookings.php 192
ERROR - 2023-03-04 13:10:16 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:10:16 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:16:17 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:16:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:16:47 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:16:47 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:17:57 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:17:57 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:22:00 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:22:00 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:25:12 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:25:12 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:25:16 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:25:16 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:31:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:31:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:31:22 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:31:22 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:32:16 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:32:16 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:33:00 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:33:00 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:34:53 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:34:54 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:37:04 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:37:04 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:38:49 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:38:49 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:39:33 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:39:33 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:39:51 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:39:51 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:40:09 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:40:09 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:20 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:21 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:27 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:27 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:36 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:36 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:43 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:43 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:48 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:48 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:53 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:42:53 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:44:32 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:44:32 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:48:31 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 13:48:31 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:00:11 --> Severity: Warning --> Undefined variable $array /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 762
ERROR - 2023-03-04 15:02:56 --> Query error: Table 'cmschamp_pnpapp.quotations' doesn't exist - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `status`, `updated_at`) VALUES (3, '2', 1, 0, '0', '0', '0', '0', 'Submitted', '2023-03-04 15:02:56')
ERROR - 2023-03-04 15:03:52 --> Query error: Unknown column 'sessions' in 'field list' - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `status`, `updated_at`) VALUES (3, '2', 1, 0, '0', '0', '0', '0', 'Submitted', '2023-03-04 15:03:52')
ERROR - 2023-03-04 15:07:19 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:07:19 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:07:24 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:07:24 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:07:27 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:07:27 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:07:29 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:07:29 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:07:37 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:07:37 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:07:57 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:07:57 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:08:02 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:08:02 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:08:03 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:08:03 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:08:14 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:08:14 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:08:16 --> Severity: Warning --> Undefined property: stdClass::$longitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 243
ERROR - 2023-03-04 15:08:16 --> Severity: Warning --> Undefined property: stdClass::$latitude /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 244
ERROR - 2023-03-04 15:09:17 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:25 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:25 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:38 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:38 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:43 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:43 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:48 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:48 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:53 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:09:54 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:15:31 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:15:31 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:16:31 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:16:32 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:17:00 --> Query error: Unknown column 'status' in 'field list' - Invalid query: INSERT INTO `training_bookings` (`status`) VALUES ('Quote Sent')
ERROR - 2023-03-04 15:17:56 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 15:17:56 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 16:55:02 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 16:55:02 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 16:55:39 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 16:55:39 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:01:38 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:01:54 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:02:11 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:04:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:04:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:10:14 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:10:14 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:24:50 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:24:50 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:27:13 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 17:27:15 --> Severity: Warning --> Undefined variable $array /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 762
ERROR - 2023-03-04 17:27:16 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 17:27:17 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 17:29:18 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:29:52 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:30:15 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:30:47 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:33:56 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:33:57 --> Query error: Table 'cmschamp_pnpapp.category' doesn't exist - Invalid query: SELECT *
FROM `category`
WHERE `id` = '1'
ERROR - 2023-03-04 17:45:45 --> Severity: Warning --> Attempt to read property "name" on null /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 47
ERROR - 2023-03-04 18:18:14 --> Query error: Table 'cmschamp_pnpapp.boarding_addons' doesn't exist - Invalid query: SELECT *
FROM `boarding_addons`
WHERE `id` != '0'
ERROR - 2023-03-04 18:18:14 --> Query error: Table 'cmschamp_pnpapp.food_types' doesn't exist - Invalid query: SELECT *
FROM `food_types`
WHERE `food_type` = 1
ERROR - 2023-03-04 18:18:14 --> Query error: Table 'cmschamp_pnpapp.boarding_cost' doesn't exist - Invalid query: SELECT *
FROM `boarding_cost`
WHERE `id` != '0'
ERROR - 2023-03-04 18:18:14 --> Query error: Table 'cmschamp_pnpapp.food_types' doesn't exist - Invalid query: SELECT *
FROM `food_types`
WHERE `food_type` = 2
ERROR - 2023-03-04 18:21:58 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 18:22:03 --> Severity: Warning --> Undefined variable $array /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 762
ERROR - 2023-03-04 18:22:04 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 18:22:04 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 18:22:06 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 655
ERROR - 2023-03-04 18:22:06 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 697
ERROR - 2023-03-04 18:22:06 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 739
ERROR - 2023-03-04 18:22:16 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 18:57:53 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 18:57:53 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 18:57:59 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 18:58:05 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 655
ERROR - 2023-03-04 18:58:19 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 18:58:21 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 697
ERROR - 2023-03-04 18:58:22 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 739
ERROR - 2023-03-04 18:58:23 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 655
ERROR - 2023-03-04 18:58:25 --> Severity: Warning --> Undefined variable $array /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 762
ERROR - 2023-03-04 18:58:26 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 19:01:43 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 19:01:57 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 19:02:53 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 559
ERROR - 2023-03-04 19:03:55 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 19:04:00 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 655
ERROR - 2023-03-04 19:04:01 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 19:04:33 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 655
ERROR - 2023-03-04 19:04:57 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 655
ERROR - 2023-03-04 19:16:08 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 19:16:13 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 602
ERROR - 2023-03-04 19:16:20 --> Severity: error --> Exception: Call to undefined function distance() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 655
