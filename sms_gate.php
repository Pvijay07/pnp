<?php
error_reporting (E_ALL ^ E_NOTICE);

$number='8919995796';
$otp = '9872';

//- $url="http://api.bulksmsgateway.in/sendmessage.php?user=Acewebacademy&password=Newtalents@123&mobile=".urlencode($number)."&sender=PFOLIO&message=".urlencode($message)."&type=3&template_id=1207168240213327862";

$url = 'http://api.bulksmsgateway.in/sendmessage.php?user=Acewebacademy&password=Newtalents@123&mobile='.$number.'&message=%27Dear%20Customer,Your%20OTP%20number%20is%20{'.$otp.'},Regards%20PETSFOLIO%27&sender=PFOLIO&type=3&template_id=1207168240213327862';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch); 


//- http://api.bulksmsgateway.in/sendmessage.php?user=Acewebacademy&password=Newtalents@123&mobile=8919995796&message=%27Dear%20Customer,Your%20OTP%20number%20is%20{4444},Regards%20PETSFOLIO%27&sender=PFOLIO&type=3&template_id=1207168240213327862