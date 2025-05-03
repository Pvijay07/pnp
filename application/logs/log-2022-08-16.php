<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-08-16 11:41:26 --> 404 Page Not Found: api/Service_providers/register
ERROR - 2022-08-16 11:42:40 --> Query error: Table 'cmschamp_pnpapp.service_providers' doesn't exist - Invalid query: SELECT *
FROM `service_providers`
WHERE `email` = 'ananth98@gmail.com'
ERROR - 2022-08-16 11:43:17 --> Severity: Notice --> Trying to get property of non-object /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 40
ERROR - 2022-08-16 11:47:08 --> Severity: Error --> Call to undefined method Service_providers::check_availability() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 32
ERROR - 2022-08-16 11:50:42 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `service_providers` (`name`, `email`, `phone`, `password`, `status`, `is_verify`, `otp`, `created_at`) VALUES ('Anantha Reddy', 'ananth@gmail.com', '9494904886', '$2y$10$YG4yb5YjE4ke.BYmMJsWIuah2C916/yLq/uLL0wMKiXnI.U6pB9c2', 0, 0, 427181, '2022-08-16 11:50:42')
ERROR - 2022-08-16 11:55:13 --> Severity: Error --> Call to undefined method Service_providers::check_availability() /home/cmschamps/public_html/pnp-app/application/controllers/api/Service_providers.php 102
