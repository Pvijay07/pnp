<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    // -----------------------------------------------------------------------------
    //check auth
    if (!function_exists('auth_check')) {
        function auth_check()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            if(!$ci->session->has_userdata('is_login'))
            {
                redirect('admin/auth/login', 'refresh');
            }
        }
    }


    // -----------------------------------------------------------------------------
    // Get General Setting
    if (!function_exists('get_general_settings')) {
        function get_general_settings()
        {
            $ci =& get_instance();
            $ci->load->model('admin/setting_model');
            return $ci->setting_model->get_general_settings();
        }
    }


    // -----------------------------------------------------------------------------
    // Get Services
    if (!function_exists('get_services')) {
        function get_services()
        {
            $ci =& get_instance();
            $ci->load->model('admin/crud_model');
            return $ci->crud_model->select("services", ["status"=>"Active"]);
        }
    }


    // -----------------------------------------------------------------------------
    //get recaptcha
    if (!function_exists('generate_recaptcha')) {
        function generate_recaptcha()
        {
            $ci =& get_instance();
            if ($ci->recaptcha_status) {
                $ci->load->library('recaptcha');
                echo '<div class="form-group mt-2">';
                echo $ci->recaptcha->getWidget();
                echo $ci->recaptcha->getScriptTag();
                echo ' </div>';
            }
        }
    }

    // ----------------------------------------------------------------------------
    //print old form data
    if (!function_exists('old')) {
        function old($field)
        {
            $ci =& get_instance();
            return html_escape($ci->session->flashdata('form_data')[$field]);
        }
    }

    // --------------------------------------------------------------------------------
    if (!function_exists('date_time')) {
        function date_time($datetime)
        {
           return date('F j, Y',strtotime($datetime));
        }
    }

    // --------------------------------------------------------------------------------
    if (!function_exists('slug')) {
        function slug($text) {
            // replace all non-alphanumeric characters with a hyphen
            $slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $text);

            // convert to lowercase
            $slug = strtolower($slug);

            // trim leading and trailing hyphens
            $slug = trim($slug, '-');

            return $slug;
        }
    }

    // --------------------------------------------------------------------------------
    // limit the no of characters
    if (!function_exists('text_limit')) {
        function text_limit($x, $length)
        {
          if(strlen($x)<=$length)
          {
            echo $x;
          }
          else
          {
            $y=substr($x,0,$length) . '...';
            echo $y;
          }
        }
    }

    // --------------------------------------------------------------------------------
    // Get Booking Table
    if (!function_exists('distance')) {
        function distance($lat1, $lon1, $lat2, $lon2, $unit)
        {

            if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                return 0;
            }
            else {
                $theta = $lon1 - $lon2;
                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit = strtoupper($unit);

                if ($unit == "K") {
                  $distance = ($miles * 1.609344);
                  $formatted_number = number_format((float)$distance, 1, '.', '');
                  return $formatted_number;
                } else if ($unit == "N") {
                  return ($miles * 0.8684);
                } else {
                  return $miles;
                }
            }

        }
    }


    // --------------------------------------------------------------------------------
    // Get Booking Table
    if (!function_exists('time_ago')) {
        function time_ago($time)
        {

            $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
            $lengths = array("60","60","24","7","4.35","12","10");

            $now = time();

                $difference     = $now - $time;
                $tense         = "ago";

            for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
                $difference /= $lengths[$j];
            }

            $difference = round($difference);

            if($difference != 1) {
                $periods[$j].= "s";
            }

            return "$difference $periods[$j] ago";

        }
    }

    // --------------------------------------------------------------------------------
    // Get days count from date to date
    if (!function_exists('days_count')) {
        function days_count($time)
        {

            $oneDay = 24 * 60 * 60; // One day in seconds
            $diffDays = abs(strtotime($date2) - strtotime($date1)) / $oneDay;
            return round($diffDays);

        }
    }

    // --------------------------------------------------------------------------------
    // Get Booking Table
    if (!function_exists('service_table')) {
        function service_table($service)
        {

            switch ($service) {
                case '1':
                    $table = "boarding_bookings";
                    break;
                case '2':
                    $table = "grooming_bookings";
                    break;
                case '3':
                    $table = "training_bookings";
                    break;
                case '4':
                    $table = "walking_bookings";
                    break;
                case '5':
                    $table = "vet_bookings";
                    break;
                case '6':
                    $table = "sitting_bookings";
                    break;
                default:
                    $table = "bookings";

            }

            return $table;

        }
    }


    // --------------------------------------------------------------------------------
    // Base64 to Save
    if (!function_exists('base64_save')) {
        function base64_save($base64_string, $folder)
        {

            // Extract file extension and data from base64 string
            list($type, $data) = explode(';', $base64_string);
            list(, $data) = explode(',', $data);
            $extension = explode('/', $type)[1];

            // Decode base64 data
            $data = base64_decode($data);

            // Generate unique file name with extension
            $file_name = $folder.uniqid() . '.' . $extension;

            // Save file to server
            if(file_put_contents($file_name, $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

    }


    // --------------------------------------------------------------------------------
    // Get Booking Table
    if (!function_exists('send_push_notification')) {
        function send_push_notification($senderids, $title, $description, $imgurl = null){
            $serverkey = 'AAAAqMQDCw0:APA91bEvQdOh-F16RC6RjX0tvJFjOCmEtGLnPTiRlkjMeT1SZzZ-8WBAvgK0VeJ-HB163rbecREeSp8x0kZMOnG36i0ZalCpwLLWXv2RJn99GD-dUiMMn8JQGutl42RyzmCslYahMggI';// this is a Firebase server key
            $data = array(
                        'registration_ids' => $senderids,
                         'notification' =>
                                 array(
                                 'body' => $description,
                                'title' => $title,
                                "image" => $imgurl),
                                "data" => array(
                                            "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
                                            "sound"=> "default",
                                            "status"=> "done"
                                            )
                                );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://fcm.googleapis.com/fcm/send");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: key='.$serverkey));
            $output = curl_exec ($ch);
            curl_close ($ch);
            return $output;
        }
    }

?>