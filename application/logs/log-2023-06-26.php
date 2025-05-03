<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-26 06:47:49 --> Severity: Notice --> Undefined property: stdClass::$petId /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1690
ERROR - 2023-06-26 06:47:49 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('59', 3, '50', '46', 16, '4999', '3333', 0, '8332.00', '', '', '', 'Submitted', NULL, '2023-06-26 06:47:49')
ERROR - 2023-06-26 06:47:52 --> Severity: Notice --> Undefined property: stdClass::$petId /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1690
ERROR - 2023-06-26 06:47:52 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('59', 3, '50', '46', 16, '4999', '3333', 0, '8332.00', '', '', '', 'Submitted', NULL, '2023-06-26 06:47:52')
ERROR - 2023-06-26 12:12:11 --> Severity: Notice --> Undefined property: stdClass::$booking_id /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 862
ERROR - 2023-06-26 12:12:11 --> Query error: Unknown column 'grooming_bookings.client_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `sp_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `grooming_bookings`.`client_id`
LEFT JOIN `sp_user_subscribe` ON `sp_user_subscribe`.`user_id`=`service_providers`.`id`
WHERE `boarding_bookings`.`id` IS NULL
ERROR - 2023-06-26 12:15:42 --> Query error: Unknown column 'grooming_bookings.client_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `sp_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `grooming_bookings`.`client_id`
LEFT JOIN `sp_user_subscribe` ON `sp_user_subscribe`.`user_id`=`service_providers`.`id`
WHERE `boarding_bookings`.`id` = '1'
ERROR - 2023-06-26 12:18:43 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1292
ERROR - 2023-06-26 12:24:49 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 12:24:49 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 12:24:49 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 12:24:49 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 12:24:49 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 12:24:49 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 12:25:02 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 12:25:02 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 12:25:02 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 12:27:48 --> Query error: Unknown column 'grooming_bookings.client_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `sp_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `grooming_bookings`.`client_id`
LEFT JOIN `sp_user_subscribe` ON `sp_user_subscribe`.`user_id`=`service_providers`.`id`
WHERE `boarding_bookings`.`id` = '5'
ERROR - 2023-06-26 12:27:48 --> Query error: Unknown column 'grooming_bookings.client_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `sp_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `grooming_bookings`.`client_id`
LEFT JOIN `sp_user_subscribe` ON `sp_user_subscribe`.`user_id`=`service_providers`.`id`
WHERE `boarding_bookings`.`id` = '5'
ERROR - 2023-06-26 12:42:28 --> Query error: Unknown column 'grooming_bookings.client_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `sp_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `grooming_bookings`.`client_id`
LEFT JOIN `sp_user_subscribe` ON `sp_user_subscribe`.`user_id`=`service_providers`.`id`
WHERE `boarding_bookings`.`id` = '5'
ERROR - 2023-06-26 13:09:49 --> Severity: Notice --> Undefined property: stdClass::$general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 911
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1020
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1029
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1040
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1041
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1042
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1043
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1044
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1045
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1046
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1047
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1048
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1049
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1050
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1051
ERROR - 2023-06-26 13:16:47 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1052
ERROR - 2023-06-26 13:26:01 --> Severity: Notice --> Undefined property: stdClass::$pet_dob /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 901
ERROR - 2023-06-26 13:26:01 --> Severity: Warning --> DateTime::diff() expects parameter 1 to be DateTimeInterface, null given /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 901
ERROR - 2023-06-26 13:29:26 --> Severity: Notice --> Undefined property: stdClass::$token /home/xhtmlreviews/public_html/pnp/application/controllers/api/Quotations.php 2502
ERROR - 2023-06-26 13:29:31 --> 404 Page Not Found: api/Service_providers/quoteForm
ERROR - 2023-06-26 13:36:30 --> Query error: Unknown column 'grooming_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `grooming_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '5'
ERROR - 2023-06-26 13:36:58 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '5'
ERROR - 2023-06-26 13:37:53 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '6'
ERROR - 2023-06-26 13:37:53 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '6'
ERROR - 2023-06-26 13:41:20 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '5'
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1033
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1042
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1053
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1054
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Undefined variable: age /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1055
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1056
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1057
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1058
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1059
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1060
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1061
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1062
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1063
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1064
ERROR - 2023-06-26 13:41:24 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1065
ERROR - 2023-06-26 13:43:55 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '6'
ERROR - 2023-06-26 13:43:55 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '6'
ERROR - 2023-06-26 13:48:38 --> Severity: 4096 --> Object of class DateTime could not be converted to string /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 978
ERROR - 2023-06-26 13:53:58 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '6'
ERROR - 2023-06-26 13:53:58 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '6'
ERROR - 2023-06-26 13:54:14 --> Severity: Notice --> Undefined variable: remainingMonths /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 995
ERROR - 2023-06-26 13:56:42 --> Query error: Unknown column 'boarding_bookings.package_id' in 'on clause' - Invalid query: SELECT `pets`.`pet_name` AS `pet_name`, `pets`.`age` AS `pet_age`, `dog_breeds`.`title` As `pet_breed`, `pets`.`aggression` AS `pet_aggression`, `packages`.`name` AS `package_name`, `packages`.`general_addons` AS `general_addons`, `packages`.`price` AS `package_price`, `boarding_bookings`.`from_date` AS `from_date`, `boarding_bookings`.`to_date` as `to_date`, `boarding_bookings`.`message` as `message`, `boarding_bookings`.`add_ons` as `add_ons`, `ci_users`.`name` AS `client_name`, `ci_user_subscribe`.`device_token`
FROM `boarding_bookings`
LEFT JOIN `ci_users` ON (`ci_users`.`id` = `boarding_bookings`.`client_id` AND `ci_users`.`is_active`="1")
LEFT JOIN `packages` ON `boarding_bookings`.`package_id` = `packages`.`id`
LEFT JOIN `pets` ON `boarding_bookings`.`pet_id` = `pets`.`id`
LEFT JOIN `dog_breeds` ON `pets`.`breed_type` = `dog_breeds`.`id`
LEFT JOIN `service_providers` ON `service_providers`.`id` = `boarding_bookings`.`client_id`
LEFT JOIN `ci_user_subscribe` ON `ci_user_subscribe`.`user_id`=`ci_users`.`id`
WHERE `boarding_bookings`.`id` = '5'
ERROR - 2023-06-26 14:07:05 --> Severity: error --> Exception: syntax error, unexpected 'case' (T_CASE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1005
ERROR - 2023-06-26 14:07:53 --> Severity: error --> Exception: syntax error, unexpected 'case' (T_CASE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1005
ERROR - 2023-06-26 14:08:12 --> Severity: error --> Exception: syntax error, unexpected 'case' (T_CASE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1005
ERROR - 2023-06-26 14:10:17 --> Severity: error --> Exception: syntax error, unexpected 'case' (T_CASE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1004
ERROR - 2023-06-26 14:10:45 --> Severity: error --> Exception: syntax error, unexpected 'case' (T_CASE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1004
ERROR - 2023-06-26 14:57:12 --> Severity: Notice --> Trying to get property 'add_ons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 896
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 911
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 913
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 914
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'from_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 915
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'to_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 916
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 917
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 918
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 919
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 920
ERROR - 2023-06-26 14:57:13 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 921
ERROR - 2023-06-26 14:57:45 --> Severity: Notice --> Undefined property: stdClass::$petId /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:57:45 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('50', '1', '55', '6', 0, '499', '100', 0, 599, '', '', '', 'Submitted', NULL, '2023-06-26 14:57:45')
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:58:35 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:58:35 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:58:38 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:58:38 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:58:58 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:58:58 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:59:13 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:59:13 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:59:17 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:59:17 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:59:21 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:59:21 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:59:28 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:59:28 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:59:30 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:59:30 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'service_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1714
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'service_provider' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1715
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'booking_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1716
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1717
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1718
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1719
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1720
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1721
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1722
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1723
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1724
ERROR - 2023-06-26 14:59:32 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 14:59:32 --> Query error: Table 'xhtmlreviews_pnpapp.bookings' doesn't exist - Invalid query: SELECT *
FROM `bookings`
WHERE `id` IS NULL
ERROR - 2023-06-26 15:00:57 --> Severity: Notice --> Trying to get property 'serviceid' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Quotations.php 2520
ERROR - 2023-06-26 15:01:37 --> Severity: Notice --> Undefined property: stdClass::$petId /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 15:01:37 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('50', 4, '54', '67', 0, '96', 0, 0, 9408, '', '', '', 'Submitted', NULL, '2023-06-26 15:01:37')
ERROR - 2023-06-26 15:01:40 --> Severity: Notice --> Undefined property: stdClass::$petId /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1726
ERROR - 2023-06-26 15:01:40 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('50', '1', '55', '6', 0, '499', '100', 0, 599, '', '', '', 'Submitted', NULL, '2023-06-26 15:01:40')
ERROR - 2023-06-26 15:02:01 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('50', '1', '55', '6', 0, '499', '100', 0, 599, '', '', '', 'Submitted', NULL, '2023-06-26 15:02:01')
ERROR - 2023-06-26 15:02:43 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('50', '1', '55', '6', 0, '499', '100', 0, 599, '', '', '', 'Submitted', NULL, '2023-06-26 15:02:43')
ERROR - 2023-06-26 15:03:28 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('50', '1', '55', '6', 0, '499', '100', 0, 599, '', '', '', 'Submitted', NULL, '2023-06-26 15:03:28')
ERROR - 2023-06-26 15:04:37 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:04:37 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:06:00 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:06:15 --> Severity: Notice --> Undefined index: name /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:08:33 --> Severity: Notice --> Array to string conversion /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1773
ERROR - 2023-06-26 15:09:00 --> Severity: Notice --> Array to string conversion /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1773
ERROR - 2023-06-26 15:09:18 --> Severity: Notice --> Array to string conversion /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1773
ERROR - 2023-06-26 15:09:51 --> Severity: Notice --> Array to string conversion /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1773
ERROR - 2023-06-26 15:10:13 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:10:13 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:16:52 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:16:52 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:17:37 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:17:37 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:19:05 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:19:05 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:22:41 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:22:41 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'add_ons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 896
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 911
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 913
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 914
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'from_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 915
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'to_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 916
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 917
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 918
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 919
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 920
ERROR - 2023-06-26 15:23:45 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 921
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'add_ons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 896
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 911
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 913
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 914
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'from_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 915
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'to_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 916
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 917
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 918
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 919
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 920
ERROR - 2023-06-26 15:23:55 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 921
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'add_ons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 896
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 911
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 913
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 914
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'from_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 915
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'to_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 916
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 917
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 918
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 919
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 920
ERROR - 2023-06-26 15:24:04 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 921
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'add_ons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 896
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 911
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 913
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 914
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'from_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 915
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'to_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 916
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 917
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 918
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 919
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 920
ERROR - 2023-06-26 15:24:13 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 921
ERROR - 2023-06-26 15:25:55 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:27:41 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:27:41 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:28:08 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:28:22 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:28:22 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:28:50 --> Severity: Notice --> Undefined index: name /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:29:11 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:29:11 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:32:06 --> Severity: Notice --> Undefined offset: 0 /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:32:06 --> Severity: Notice --> Trying to get property 'name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1771
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'add_ons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 896
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 911
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 913
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 914
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'from_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 915
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'to_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 916
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 917
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 918
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 919
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 920
ERROR - 2023-06-26 15:34:20 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 921
ERROR - 2023-06-26 16:18:29 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 16:18:29 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 16:18:29 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 16:18:29 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 16:18:29 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 16:18:29 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 16:18:37 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 16:18:37 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 16:18:37 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 16:18:37 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 16:18:37 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 16:18:37 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1405
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1406
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1407
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1408
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1409
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1410
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1411
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1412
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1413
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1414
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1415
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1416
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1417
ERROR - 2023-06-26 16:26:29 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1418
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1405
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1406
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1407
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1408
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1409
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1410
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1411
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1412
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1413
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1414
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1415
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1416
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1417
ERROR - 2023-06-26 16:30:28 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1418
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1405
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1406
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1407
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1408
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1409
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1410
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1411
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1412
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1413
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1414
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1416
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1417
ERROR - 2023-06-26 16:31:46 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1418
ERROR - 2023-06-26 16:34:25 --> Severity: error --> Exception: syntax error, unexpected ''[pet_age]'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1408
ERROR - 2023-06-26 16:34:45 --> Severity: error --> Exception: syntax error, unexpected ',', expecting ']' /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1408
ERROR - 2023-06-26 16:35:02 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:35:02 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:35:02 --> Severity: Warning --> Use of undefined constant petId - assumed 'petId' (this will throw an Error in a future version of PHP) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1406
ERROR - 2023-06-26 16:35:02 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1413
ERROR - 2023-06-26 16:35:02 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1414
ERROR - 2023-06-26 16:35:02 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1416
ERROR - 2023-06-26 16:35:02 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1417
ERROR - 2023-06-26 16:35:02 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1418
ERROR - 2023-06-26 16:35:48 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:35:48 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:35:48 --> Severity: Warning --> Use of undefined constant petId - assumed 'petId' (this will throw an Error in a future version of PHP) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1406
ERROR - 2023-06-26 16:35:48 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1418
ERROR - 2023-06-26 16:36:17 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:36:17 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:36:17 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1418
ERROR - 2023-06-26 16:36:49 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1403
ERROR - 2023-06-26 16:37:07 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:37:07 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:37:36 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:37:36 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:38:13 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:38:13 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:38:30 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:38:30 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:39:53 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:39:53 --> Severity: Warning --> Invalid argument supplied for foreach() /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1385
ERROR - 2023-06-26 16:39:53 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 16:41:05 --> Severity: error --> Exception: syntax error, unexpected 'foreach' (T_FOREACH) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1386
ERROR - 2023-06-26 16:41:19 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:41:19 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1396
ERROR - 2023-06-26 16:44:32 --> Severity: error --> Exception: syntax error, unexpected 'case' (T_CASE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1434
ERROR - 2023-06-26 16:44:59 --> Severity: error --> Exception: syntax error, unexpected 'case' (T_CASE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1434
ERROR - 2023-06-26 16:45:22 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1384
ERROR - 2023-06-26 16:45:22 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1394
ERROR - 2023-06-26 16:45:43 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:45:55 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:46:12 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1394
ERROR - 2023-06-26 16:46:12 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1394
ERROR - 2023-06-26 16:46:24 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1394
ERROR - 2023-06-26 16:46:39 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1397
ERROR - 2023-06-26 16:46:39 --> Severity: Notice --> Undefined variable: general_addons /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1419
ERROR - 2023-06-26 16:46:47 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:46:47 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:46:59 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1397
ERROR - 2023-06-26 16:46:59 --> Severity: Notice --> Undefined variable: general_addons /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1419
ERROR - 2023-06-26 16:47:46 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:48:04 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:48:04 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:49:02 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1410
ERROR - 2023-06-26 16:49:39 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:50:45 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1332
ERROR - 2023-06-26 16:51:24 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 16:51:36 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1333
ERROR - 2023-06-26 16:52:06 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1332
ERROR - 2023-06-26 16:52:36 --> Severity: error --> Exception: Cannot use object of type stdClass as array /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1334
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1470
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1479
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1492
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1493
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1494
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1495
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1496
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1497
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1498
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1499
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1500
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1501
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1502
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1503
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1504
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1505
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1505
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1506
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1507
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1508
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1509
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1511
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1512
ERROR - 2023-06-26 16:54:54 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1513
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1497
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1498
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1499
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1500
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1501
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1502
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1503
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1504
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1505
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1507
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1508
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1510
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1510
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1511
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1512
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1513
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1514
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1516
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1517
ERROR - 2023-06-26 16:55:48 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1518
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1497
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1498
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1499
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1500
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1501
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1502
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1503
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1504
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1505
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1507
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1508
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1510
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1510
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1511
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1512
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1513
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1514
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1516
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'spevening' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1517
ERROR - 2023-06-26 16:57:33 --> Severity: Notice --> Trying to get property 'spafternoon' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1518
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 959
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 968
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 977
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 988
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 989
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 991
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 992
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 993
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 994
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 995
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 996
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 997
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 998
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 999
ERROR - 2023-06-26 17:02:14 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1000
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'pet_issues' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1175
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1183
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1190
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1192
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1194
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1195
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Undefined variable: issues_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1196
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'service_type' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1197
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1198
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1200
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1201
ERROR - 2023-06-26 17:03:13 --> Severity: Notice --> Trying to get property 'about_issue' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1202
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 959
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 968
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 977
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 988
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 989
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 991
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 992
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 993
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 994
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 995
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 996
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 997
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 998
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 999
ERROR - 2023-06-26 17:04:23 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1000
ERROR - 2023-06-26 17:06:19 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 17:06:33 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 17:06:59 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 904
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 984
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 995
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 996
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 998
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 999
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1000
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1001
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1002
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1003
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1005
ERROR - 2023-06-26 17:07:17 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1006
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1045
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1054
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1062
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1070
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1071
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1073
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1074
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1075
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1076
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1077
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1078
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1079
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1080
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1081
ERROR - 2023-06-26 17:08:00 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1082
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1045
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1054
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1062
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1070
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1071
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1073
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1074
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1075
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1076
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1077
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1078
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1079
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1080
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1081
ERROR - 2023-06-26 17:08:39 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1082
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1045
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1054
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1062
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1070
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1071
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1073
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1074
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1075
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1076
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1077
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1078
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1079
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1080
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1081
ERROR - 2023-06-26 17:09:02 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1082
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1045
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1054
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1062
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1070
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1071
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1073
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1074
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1075
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1076
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1077
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1078
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1079
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1080
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1081
ERROR - 2023-06-26 17:09:32 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1082
ERROR - 2023-06-26 17:10:44 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1063
ERROR - 2023-06-26 17:10:49 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1063
ERROR - 2023-06-26 17:10:49 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1063
ERROR - 2023-06-26 17:10:51 --> Severity: Compile Error --> Cannot use [] for reading /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1063
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1066
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1074
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1075
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1077
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1078
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1079
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1080
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1081
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1082
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1084
ERROR - 2023-06-26 17:10:57 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1085
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1074
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1082
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1083
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1085
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1086
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1087
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1088
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1089
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1090
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1092
ERROR - 2023-06-26 17:12:52 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1093
ERROR - 2023-06-26 17:17:02 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::getRowArray() /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1043
ERROR - 2023-06-26 17:17:50 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::getRowArray() /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1043
ERROR - 2023-06-26 17:18:03 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::get() /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1043
ERROR - 2023-06-26 17:18:13 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_result::get() /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1043
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1067
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'device_token' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1075
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1076
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1078
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1079
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1080
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1081
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1082
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1083
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1085
ERROR - 2023-06-26 17:18:29 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1086
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1068
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1077
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1079
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1080
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1081
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1082
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1083
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1084
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1086
ERROR - 2023-06-26 17:20:39 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1087
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 905
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 914
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 925
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 926
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 927
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 928
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 929
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 930
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 931
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 932
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 933
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 934
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 935
ERROR - 2023-06-26 17:22:24 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 936
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 905
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 914
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 925
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 926
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 927
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 928
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 929
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 930
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 931
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 932
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 933
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'sessions' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 934
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 935
ERROR - 2023-06-26 17:51:23 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 936
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Trying to get property 'add_ons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 787
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 800
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 801
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 802
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 803
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Trying to get property 'from_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 804
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Trying to get property 'to_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 805
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 806
ERROR - 2023-06-26 18:00:33 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 807
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 841
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 850
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 861
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 862
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 863
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 864
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 865
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 866
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 867
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 868
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 869
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 870
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 871
ERROR - 2023-06-26 18:04:07 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 872
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 841
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 850
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 861
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 862
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 863
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 864
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 865
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 866
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 867
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 868
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 869
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 870
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 871
ERROR - 2023-06-26 18:24:31 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 872
ERROR - 2023-06-26 18:28:01 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 936
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1198
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1207
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1220
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1221
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1222
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1223
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1224
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1225
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1226
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1227
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1228
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1229
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1230
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1231
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1232
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1233
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1234
ERROR - 2023-06-26 18:33:18 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1235
ERROR - 2023-06-26 18:44:37 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1327
ERROR - 2023-06-26 18:44:37 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 18:44:37 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1329
ERROR - 2023-06-26 18:44:37 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1330
ERROR - 2023-06-26 18:44:55 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1326
ERROR - 2023-06-26 18:44:55 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1327
ERROR - 2023-06-26 18:44:55 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1328
ERROR - 2023-06-26 18:44:55 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1329
ERROR - 2023-06-26 18:44:55 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1330
ERROR - 2023-06-26 18:45:13 --> Severity: Notice --> Undefined property: stdClass::$petId /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1702
ERROR - 2023-06-26 18:45:13 --> Query error: Column 'pet_id' cannot be null - Invalid query: INSERT INTO `quotations` (`sp_id`, `service_id`, `client_id`, `booking_id`, `sessions`, `actual_price`, `extra_price`, `discount`, `total_price`, `spmorning`, `spevening`, `spafternoon`, `status`, `pet_id`, `updated_at`) VALUES ('50', '1', '55', '6', 0, '499', '100', 0, 599, '', '', '', 'Submitted', NULL, '2023-06-26 18:45:13')
ERROR - 2023-06-26 18:46:18 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 915
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1368
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1377
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1390
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1391
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1392
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1394
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1395
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1396
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1397
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1398
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1399
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1400
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1401
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1402
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1403
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1404
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1405
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1406
ERROR - 2023-06-26 18:48:34 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1408
ERROR - 2023-06-26 19:23:19 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:19 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:19 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:23 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:23 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:23 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:30 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:30 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:30 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:32 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:32 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:32 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:35 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:35 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:35 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:36 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:36 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:36 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:42 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:42 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:42 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:43 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:43 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:43 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:46 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:46 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:46 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:48 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:48 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:48 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:51 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:23:51 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:23:51 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:25:53 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:25:53 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:25:53 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:27:59 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:27:59 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:27:59 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:29:46 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:29:46 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:29:46 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:30:53 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:30:53 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:30:53 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:47:04 --> Severity: Notice --> Trying to get property 'client_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 806
ERROR - 2023-06-26 19:47:04 --> Severity: Notice --> Trying to get property 'pet_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 806
ERROR - 2023-06-26 19:47:04 --> Severity: Notice --> Trying to get property 'status' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 818
ERROR - 2023-06-26 19:47:04 --> Severity: Notice --> Trying to get property 'status' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 818
ERROR - 2023-06-26 19:47:08 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:47:08 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:47:08 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:47:15 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:47:15 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:47:15 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:08 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:48:08 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:08 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:18 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:48:18 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:18 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:39 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:48:39 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:39 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:44 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:48:44 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:44 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:48:45 --> Severity: Notice --> Trying to get property 'client_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 806
ERROR - 2023-06-26 19:48:45 --> Severity: Notice --> Trying to get property 'pet_id' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 806
ERROR - 2023-06-26 19:48:45 --> Severity: Notice --> Trying to get property 'status' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 818
ERROR - 2023-06-26 19:48:45 --> Severity: Notice --> Trying to get property 'status' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 818
ERROR - 2023-06-26 19:50:57 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:50:57 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:50:57 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:51:02 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:51:02 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:51:02 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:51:36 --> Severity: Warning --> A non-numeric value encountered /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 120
ERROR - 2023-06-26 19:51:36 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:51:36 --> Severity: Warning --> deg2rad() expects parameter 1 to be float, string given /home/xhtmlreviews/public_html/pnp/application/helpers/functions_helper.php 121
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'general_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1369
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'extra_addons' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1378
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'petId' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1391
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'pet_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1392
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'pet_age' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1393
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'pet_breed' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1394
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'pet_aggression' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1395
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'booking_date' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1396
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'booking_time' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1397
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'message' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1398
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'package_name' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1399
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Undefined variable: general_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1400
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'package_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1401
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'hair_cut' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1402
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Undefined variable: extra_addons_arr /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1403
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'actual_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1404
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'extra_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1405
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'discount' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1406
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'total_price' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1407
ERROR - 2023-06-26 19:54:19 --> Severity: Notice --> Trying to get property 'spmorning' of non-object /home/xhtmlreviews/public_html/pnp/application/controllers/api/Service_providers.php 1409
