<?php
require APPPATH . '/libraries/REST_Controller.php';
class Service_providers extends CI_Controller
{
    public function __construct(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
            die();
        }
        parent::__construct();
        $this->load->model('admin/user_model', 'user_model');
        $this->load->model('admin/crud_model', 'crud_model');
        $this->load->model('quotations_model');
        $this->load->model('sp_model');
    }

    public function info() {


        $postdata = json_decode(file_get_contents('php://input'));
        $query = $this->db->get_where('service_providers', array('id' => $postdata->id));

        if($query->num_rows() == 0){

            $array = array('status'=>false,'msg'=>'Something went wrong');

        } else {

            $result = $query->row();

            $services = array();
            if (!empty($result->service_id)) {
                
              $selService = explode(',', $result->service_id);
              foreach ($selService as $slkey => $slvalue) {
                $services_query = $this->db->get_where('services', array('id' => $slvalue));
                $service_info = $services_query->row();
                array_push($services, array('id' => $slvalue, 'name' => $service_info->name));
              }
                
            }


            $data = array("id" => $result->id,
                          "first_name" => $result->first_name,
                          "last_name" => $result->last_name,
                          "email" => $result->email,
                          "phone" => $result->phone,
                          "gender" => $result->gender,
                          "age" => $result->age,
                          "location" => $result->location,
                          "longitude" => $result->longitude,
                          "latitude" => $result->latitude,
                          "id_proof" => $result->id_proof,
                          "address_proof" => $result->address_proof,
                          "crt_proof" => $result->crt_proof,
                          "photo" => $result->photo,
                          "service" => $services,
                          "status" => $result->status,
                          "is_verify" => $result->is_verify);

            $array = array('status'=>true, 'results' => $data);

        }


        echo json_encode($array);
    }

    public function register(){

        $postdatas = json_decode( file_get_contents('php://input') );


        if($this->crud_model->check_availability("service_providers", array('phone'=>$postdatas->phone)) != 0){

            $user = $this->crud_model->select_row("service_providers", ["phone" => $postdatas->phone]);
            $array = array('status'=>false, 'msg'=>'Your Mobile No. already exists.', 'user_id' => $user->id);

        /*
        } else if($this->crud_model->check_availability("service_providers", array('email'=>$postdatas->email)) != 0){

            $user = $this->crud_model->select_row("service_providers", ["email" => $postdatas->email]);
            $array = array('status'=>false, 'msg'=>'Your Email already exists.', 'user_id' => $user->id);*/

        } else {

            $field = array(

                'first_name' => $postdatas->first_name,
                'last_name' => $postdatas->last_name,
                'email' => $postdatas->email,
                'phone' => $postdatas->phone,
                'password' =>  password_hash($postdatas->password, PASSWORD_BCRYPT),
                'status' => 0,
                'is_verify' => 0,
                'otp' => rand(100000,999999),
                'created_at' => date('Y-m-d H:i:s')

            );

            $insert = $this->crud_model->insert("service_providers", $field);

            if($insert){

                $user_info = $this->crud_model->select_row("service_providers", ["id" => $insert]);
                
                $number=$user_info->phone;
                $otp = $user_info->otp;

                $url = 'http://api.bulksmsgateway.in/sendmessage.php?user=Acewebacademy&password=Newtalents@123&mobile='.$number.'&message=%27Dear%20Customer,Your%20OTP%20number%20is%20{'.$otp.'},Regards%20PETSFOLIO%27&sender=PFOLIO&type=3&template_id=1207168240213327862';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_exec($ch);
                curl_close($ch); 

                $data = array("user_id" => $user_info->id,
                              "otp" => $user_info->otp,
                              "phone" => $user_info->phone);

                $array = array('status'=>true,'msg'=>'Registration is Completed Successfully', 'results' => $data);

            }  else {

                $array = array('status'=>false,'msg'=>'Something went wrong');
            }
        }

        echo json_encode($array);
    }

    public function verify(){

        $postdatas = json_decode( file_get_contents('php://input') );

        $this->crud_model->update("service_providers", ["otp" => rand(100000,999999)], ["id" => $postdatas->user_id]);

        $new_data = $this->crud_model->select_row("service_providers", ["id" => $postdatas->user_id]);

        $data = array("user_id" => $new_data->id,
                        "otp" => $new_data->otp,
                        "phone" => $new_data->phone);


        $array = array('status'=>true,'msg'=>'Verification Completed Successfully.', 'data'=>$data);

        echo json_encode($array);
    }


    public function otp(){

        $postdatas = json_decode( file_get_contents('php://input') );


        if($this->crud_model->check_availability("service_providers", array('id '=> $postdatas->user_id, "otp" => $postdatas->otp)) != 0){

            $data = array("status" => 1,
                          "is_verify" => 1,
                          "otp" => "");

            $update = $this->crud_model->update("service_providers", $data, ["id" => $postdatas->user_id]);

            $new_data = $this->crud_model->select_row("service_providers", ["id" => $postdatas->user_id]);

            $array = array('status'=>true, 'msg'=>'OTP Verification is Completed', "data" => $new_data);

        } else {

                $array = array('status'=>false, 'msg'=>'OTP is Incorrect');

        }

        echo json_encode($array);
    }

    public function check_duplicate($arr){

        $query = $this->db->get_where('ci_users', $arr);
        if($query->num_rows() == 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login(){

        $postdata = json_decode( file_get_contents('php://input') );
        $username = $postdata->username;

        if(is_numeric($username)){
            $query = $this->db->query("SELECT * FROM service_providers WHERE phone = '$postdata->username'");
        } else {
           $query = $this->db->query("SELECT * FROM service_providers WHERE email = '$postdata->username'");
        }

        if ($query->num_rows() == 0){

			$array = array('status'=>false,'msg'=>'Invalid Email or Mobile No.');

		} else {

            $result = $query->row_array();

            $otp = rand(100000,999999);

            $title = "Petsfolio OTP";
            $description = "Dear customer, use this One Time Password to log in to your account. This OTP will be valid for the next 30 mins.";
            // send_push_notification([$postdata->token], 'hi', "hiii", $imgurl = null);

            $this->crud_model->update("service_providers", ["otp" => $otp], ["id" => $result["id"]]);

            $new_data = $this->crud_model->select_row("service_providers", ["id" => $result['id']]);

            
            $number=$result['phone'];
            $otp = $new_data->otp;

            $url = 'http://api.bulksmsgateway.in/sendmessage.php?user=Acewebacademy&password=Newtalents@123&mobile='.$number.'&message=%27Dear%20Customer,Your%20OTP%20number%20is%20{'.$otp.'},Regards%20PETSFOLIO%27&sender=PFOLIO&type=3&template_id=1207168240213327862';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch); 
            
            $data = array("user_id" => $result['id'],
                          "otp" => $new_data->otp,
                          "phone" => $result['phone']);


            $array = array('status'=>true,'data'=>$data);

            
        }


        echo json_encode($array);

	}



    public function update(){

        $postdatas = json_decode( file_get_contents('php://input') );

        if(!isset($postdatas->id)){

            $array = array('status'=>false,'msg'=>'Please enter id to update');

        } else {

        		$fields = array();

        		if (!empty($postdatas->id_proof)) {
	            $id_proof = base64_decode($postdatas->id_proof);
	            $id_proof_path = 'uploads/'.rand().date('dmYHis').'.jpg';
	            file_put_contents($id_proof_path,$id_proof);
        			$fields['id_proof'] = base_url($id_proof_path);
        		}

            if (!empty($postdatas->certificate_proof)) {
              $certificate_proof = base64_decode($postdatas->certificate_proof);
              $certificate_proof_path = 'uploads/'.rand().date('dmYHis').'.jpg';
              file_put_contents($certificate_proof_path,$certificate_proof);
              $fields['crt_proof'] = base_url($certificate_proof_path);
            }

        		if (!empty($postdatas->address_proof)) {
	            $address_proof = base64_decode($postdatas->address_proof);
	            $address_proof_path = 'uploads/'.rand().date('dmYHis').'.jpg';
	            file_put_contents($address_proof_path,$address_proof);        			
        			$fields['address_proof'] = base_url($address_proof_path);
        		}

        		if (!empty($postdatas->photo)) {
	            $photo = base64_decode($postdatas->photo);
	            $photo_path = 'uploads/'.rand().date('dmYHis').'.jpg';
	            file_put_contents($photo_path,$photo);
	            $fields['photo'] = base_url($photo_path);
        		}

        		$fields['first_name'] = $postdatas->first_name;
        		$fields['last_name'] = $postdatas->last_name;
        		$fields['email'] = $postdatas->email;
        		$fields['phone'] = $postdatas->phone;
        		$fields['age'] = $postdatas->age;
        		$fields['gender'] = $postdatas->gender;
        		$fields['service_id'] = $postdatas->service;
        		$fields['location'] = $postdatas->location;
        		$fields['longitude'] = $postdatas->longitude;
        		$fields['latitude'] = $postdatas->latitude;
                $fields['city'] = $postdatas->city;
        

            $update = $this->crud_model->update("service_providers", $fields, ["id" => $postdatas->id]);

            if($update == true){

                $array = array('status'=>true,'msg'=>'Profile updated successfully');

            }  else {

                $array = array('status'=>false,'msg'=>'Something went wrong');
            }

        }

        echo json_encode($array);
   }


    public function verification(){

        $postdata = json_decode( file_get_contents('php://input') );

        $id = $postdata->id;

        if(!empty($postdata->id_verification)){

            $id_verification = base64_decode($postdata->id_verification);
            $file_name = rand().date('dmYHis');
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $id_verification_path = 'uploads/'.$file_name.'.'.$file_extension;
            file_put_contents($id_verification_path,$id_verification);

        }

        if(!empty($postdata->certification)){

            $certification = base64_decode($postdata->certification);
            $certification_name = rand().date('dmYHis');
            $certification_extension = pathinfo($certification_name, PATHINFO_EXTENSION);
            $certification_path = 'uploads/'.$certification_name.'.'.$certification_extension;
            file_put_contents($certification_path,$certification);

        }

        if(!empty($postdata->certification)){

            $certification = base64_decode($postdata->certification);
            $certification_name = rand().date('dmYHis');
            $certification_extension = pathinfo($certification_name, PATHINFO_EXTENSION);
            $certification_path = 'uploads/'.$certification_name.'.'.$certification_extension;
            file_put_contents($certification_path,$certification);

        }

        $array = array('status'=>false,'msg'=>'Something went wrong');

        echo json_encode($array);

    }



    public function jobwaiting(){

        $postdatas = json_decode( file_get_contents('php://input') );

        if(!isset($postdatas->service_id)){

            $array = array('status'=>false,'msg'=>'Please Select Service');

        } else {

            $provider_info = $this->crud_model->select_row("service_providers", ['id'=>$postdatas->user_id]);

            $lng = isset($postdatas->longitude) ? $postdatas->longitude : $provider_info->longitude;
            $lat = isset($postdatas->latitude) ? $postdatas->latitude : $provider_info->latitude;

            switch ($postdatas->service_id) {

                case "1":

                    $this->db->select('boarding_bookings.id AS booking_id, boarding_bookings.add_ons AS addons, boarding_bookings.created_at as posted_time,
                                      ci_users.name AS client_name, ci_users.profile_pic AS client_photo, services.icon AS service_icon,
                                      boarding_bookings.latitude AS lat1, boarding_bookings.longitude AS lon1');

                    $this->db->from('boarding_bookings');
                    $this->db->join('ci_users', '(ci_users.id = boarding_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('services', 'boarding_bookings.service_id = services.id','left');
                    $this->db->where('boarding_bookings.service_id', $postdatas->service_id);
                    $this->db->where_in('boarding_bookings.status', array('Submitted','Quote Sent'));
                    $this->db->order_by('boarding_bookings.created_at','DESC');

                    $query = $this->db->get();

                    if($query->num_rows() == 0){

                        $array = array('status'=>false, 'count' => $query->num_rows(), 'msg'=>'There is No Results');

                    }  else {

                        $results = $query->result();
                        $data = array();

                        foreach($results as $result){

                            $title = "Boarding Service";

                            $check_array = array("sp_id" => $postdatas->user_id,
                                                 "service_id" => 1,
                                                 "booking_id" => $result->booking_id);

                            $apply_status = $this->crud_model->check_availability("quotations", $check_array);
                            $apply_message = ($apply_status==0) ? 'New' : "Applied";


                            $distance = distance($result->lat1, $result->lon1, $lat, $lng, "K");


                            if ($apply_status==0) {

                              array_push($data, array("title" => $title,
                                          "posted_time" => time_ago(strtotime($result->posted_time)),
                                          "client_name" => $result->client_name,
                                          "client_photo" => $result->client_photo,
                                          "service_icon" => $result->service_icon,
                                          "distance" => $distance.'KM',
                                          "service_id" => 1,
                                          "booking_id" => $result->booking_id,
                                          "apply_status" => $apply_message));

                            }

                        }

                        $array = array('status'=>true, 'count' => $query->num_rows(), 'results'=> $data);
                    }

                    break;

                case "2":


                    $this->db->select('grooming_bookings.id AS booking_id, packages.name AS package_name, packages.price AS package_price, grooming_bookings.extra_addons AS addons, grooming_bookings.created_at as posted_time,
                                      ci_users.name AS client_name, ci_users.profile_pic AS client_photo, services.icon AS service_icon,
                                      grooming_bookings.latitude AS lat1, grooming_bookings.longitude AS lon1');

                    $this->db->from('grooming_bookings');
                    $this->db->join('ci_users', '(ci_users.id = grooming_bookings.client_id  AND  ci_users.is_active="1")', 'left');

                    $this->db->join('services', 'grooming_bookings.service_id = services.id','left');
                    $this->db->join('packages', 'grooming_bookings.package_id = packages.id','left');
                    $this->db->where('grooming_bookings.service_id', $postdatas->service_id);

                    $this->db->where_in('grooming_bookings.status', array('Submitted','Quote Sent'));

                    $this->db->order_by('grooming_bookings.created_at','DESC');
                    $query = $this->db->get();

                    if($query->num_rows() == 0){

                        $array = array('status'=>false, 'count' => $query->num_rows(), 'msg'=>'There is No Results');

                    }  else {

                        $results = $query->result();
                        $data = array();
                        foreach($results as $result){

                            $title = $result->package_name;
                            /*
                            if(!empty($result->addons)){
                                $title .= " + Extra Addons";
                            }*/

                           $distance = distance((float)$result->lat1, (float)$result->lon1, (float)$lat, (float)$lng, 'K');

                           $check_array = array("sp_id" => $postdatas->user_id,
                                                 "service_id" => 2,
                                                 "booking_id" => $result->booking_id);

                            $apply_status = $this->crud_model->check_availability("quotations", $check_array);


                            $apply_message = ($apply_status==0) ? 'New' : "Applied";

                            if ($apply_status == 0 ) {
                            	
                              array_push($data, array("title" => $title,
                                          "posted_time" => time_ago(strtotime($result->posted_time)),
                                          "client_name" => $result->client_name,
                                          "client_photo" => $result->client_photo,
                                          "service_icon" => $result->service_icon,
                                          "distance" => $distance.'KM',
                                          "service_id" => 2,
                                          "booking_id" => $result->booking_id,
                                          "apply_status" => $apply_message));


                            }

                        }

                        $array = array('status'=>true, 'count' => $query->num_rows(), 'results'=> $data);
                    }

                    break;

                case "3":

                    $this->db->select('training_bookings.id AS booking_id, packages.name AS package_name, packages.price AS package_price, training_bookings.created_at as posted_time,
                                      ci_users.name AS client_name, ci_users.profile_pic AS client_photo, services.icon AS service_icon,
                                      training_bookings.latitude AS lat1, training_bookings.longitude AS lon1');

                    $this->db->from('training_bookings');
                    $this->db->join('ci_users', '(ci_users.id = training_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('services', 'training_bookings.service_id = services.id','left');
                    $this->db->join('packages', 'training_bookings.package_id = packages.id','left');
                    $this->db->where('training_bookings.service_id', $postdatas->service_id);
                    $this->db->where_in('training_bookings.status', array('Submitted','Quote Sent'));
                    $this->db->order_by('training_bookings.created_at','DESC');
                    $query = $this->db->get();

                    if($query->num_rows() == 0){

                        $array = array('status'=>false, 'count' => $query->num_rows(), 'msg'=>'There is No Results');

                    }  else {

                        $results = $query->result();
                        $data = array();

                        foreach($results as $result){

                            $title = $result->package_name;

                           $distance = distance($result->lat1, $result->lon1, $lat, $lng, 'K');

                           $check_array = array("sp_id" => $postdatas->user_id,
                                                 "service_id" => 3,
                                                 "booking_id" => $result->booking_id);

                            $apply_status = $this->crud_model->check_availability("quotations", $check_array);
                            $apply_message = ($apply_status==0) ? 'New' : "Applied";

                            if ($apply_status==0) {
	                            	
                              array_push($data, array("title" => $title,
                                            "posted_time" => time_ago(strtotime($result->posted_time)),
                                            "client_name" => $result->client_name,
                                            "client_photo" => $result->client_photo,
                                            "service_icon" => $result->service_icon,
                                            "distance" => $distance.'KM',
                                            "service_id" => 3,
                                            "booking_id" => $result->booking_id,
                                            "apply_status" => $apply_message));

                            }

                        }

                        $array = array('status'=>true, 'count' => $query->num_rows(), 'results'=> $data);
                    }

                    break;

                case "4":

                    $this->db->select('walking_bookings.id AS booking_id, packages.name AS package_name, packages.price AS package_price, walking_bookings.day_walks as per_day_walks, walking_bookings.created_at as posted_time,
                                      ci_users.name AS client_name, ci_users.profile_pic AS client_photo, services.icon AS service_icon,
                                      walking_bookings.latitude AS lat1, walking_bookings.longitude AS lon1');

                    $this->db->from('walking_bookings');
                    $this->db->join('ci_users', '(ci_users.id = walking_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('services', 'walking_bookings.service_id = services.id','left');
                    $this->db->join('packages', 'walking_bookings.package_id = packages.id','left');
                    $this->db->where('walking_bookings.service_id', $postdatas->service_id);
                    $this->db->where_in('walking_bookings.status', array('Submitted','Quote Sent'));
                    $this->db->order_by('walking_bookings.created_at','DESC');
                    $query = $this->db->get();

                    if($query->num_rows() == 0){

                        $array = array('status'=>false, 'count' => $query->num_rows(), 'msg'=>'There is No Results');

                    }  else {

                        $results = $query->result();
                        $data = array();

                        foreach($results as $result){

                            $title = $result->package_name;
                            /*
                            if($result->per_day_walks == 1){
                                $title .= " - One Walk per Day";
                            } elseif($result->per_day_walks == 2){
                                $title .= " - Two Walks per Day";
                            } elseif($result->per_day_walks == 2){
                                $title .= " - Three Walks per Day";
                            } else {
                                $title .= "";
                            }*/

                           $distance = distance((float)$result->lat1, (float)$result->lon1, (float)$lat, (float)$lng, 'K');

                           $check_array = array("sp_id" => $postdatas->user_id,
                                                 "service_id" => 4,
                                                 "booking_id" => $result->booking_id);

                            $apply_status = $this->crud_model->check_availability("quotations", $check_array);
                            $apply_message = ($apply_status==0) ? 'New' : "Applied";

                            if($apply_status==0){


                              array_push($data, array("title" => $title,
                                            "posted_time" => time_ago(strtotime($result->posted_time)),
                                            "client_name" => $result->client_name,
                                            "client_photo" => $result->client_photo,
                                            "service_icon" => $result->service_icon,
                                            "distance" => $distance.'KM',
                                            "service_id" => 4,
                                            "booking_id" => $result->booking_id,
                                            "apply_status" => $apply_message));                            	
                            }

                        }

                        $array = array('status'=>true, 'count' => $query->num_rows(), 'results'=> $data);
                    }

                    break;

                case "5":

                    $this->db->select('vet_bookings.id AS booking_id, vet_bookings.service_type AS service_type, vet_bookings.created_at as posted_time,
                                      ci_users.name AS client_name, ci_users.profile_pic AS client_photo, services.icon AS service_icon,
                                      vet_bookings.latitude AS lat1, vet_bookings.longitude AS lon1');

                    $this->db->from('vet_bookings');
                    $this->db->join('ci_users', '(ci_users.id = vet_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('services', 'vet_bookings.service_id = services.id','left');
                    $this->db->where('vet_bookings.service_id', $postdatas->service_id);

                    $this->db->where_in('vet_bookings.status', array('Submitted','Quote Sent'));

                    $this->db->order_by('vet_bookings.created_at','DESC');
                    $query = $this->db->get();

                    if($query->num_rows() == 0){

                        $array = array('status'=>false, 'count' => $query->num_rows(), 'msg'=>'There is No Results');

                    }  else {

                        $results = $query->result();
                        $data = array();
                        foreach($results as $result){

                            $title = "Vet Visit @".$result->service_type;

                            $distance = distance($result->lat1, $result->lon1, $lat, $lng, 'K');

                            $check_array = array("sp_id" => $postdatas->user_id,
                                                 "service_id" => 5,
                                                 "booking_id" => $result->booking_id);

                            $apply_status = $this->crud_model->check_availability("quotations", $check_array);
                            $apply_message = ($apply_status==0) ? 'New' : "Applied";

                            if ($apply_status==0) {
	                           
                              array_push($data, array("title" => $title,
                                            "posted_time" => time_ago(strtotime($result->posted_time)),
                                            "client_name" => $result->client_name,
                                            "client_photo" => $result->client_photo,
                                            "service_icon" => $result->service_icon,
                                            "distance" => $distance.'KM',
                                            "service_id" => 5,
                                            "booking_id" => $result->booking_id,
                                            "apply_status" => $apply_message));

                            }

                        }

                        $array = array('status'=>true, 'count' => $query->num_rows(), 'results'=> $data);
                    }

                    break;

                case "6":

                    $this->db->select('sitting_bookings.id AS booking_id, sitting_bookings.from_date as from_date, sitting_bookings.to_date as to_date, sitting_bookings.created_at as posted_time,
                                      ci_users.name AS client_name, ci_users.profile_pic AS client_photo, services.icon AS service_icon,
                                      sitting_bookings.latitude AS lat1, sitting_bookings.longitude AS lon1');

                    $this->db->from('sitting_bookings');
                    $this->db->join('ci_users', '(ci_users.id = sitting_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('services', 'sitting_bookings.service_id = services.id','left');
                    $this->db->where('sitting_bookings.service_id', $postdatas->service_id);
                    $this->db->where_in('sitting_bookings.status', array('Submitted','Quote Sent'));
                    $this->db->order_by('sitting_bookings.created_at','DESC');
                    $query = $this->db->get();

                    if($query->num_rows() == 0){

                        $array = array('status'=>false, 'count' => $query->num_rows(), 'msg'=>'There is No Results');

                    }  else {

                        $results = $query->result();
                        $data =  array();
                        foreach($results as $result){

                            $title = "Pet Sitting";

                            $distance = distance($result->lat1, $result->lon1, $lat, $lng, 'K');

                            $check_array = array("sp_id" => $postdatas->user_id,
                                                 "service_id" => 6,
                                                 "booking_id" => $result->booking_id);

                            $apply_status = $this->crud_model->check_availability("quotations", $check_array);
                            $apply_message = ($apply_status==0) ? 'New' : "Applied";

                            if ($apply_status==0) {

                              array_push($data, array("title" => $title,
                                            "posted_time" => time_ago(strtotime($result->posted_time)),
                                            "client_name" => $result->client_name,
                                            "client_photo" => $result->client_photo,
                                            "service_icon" => $result->service_icon,
                                            "distance" => $distance.'KM',
                                            "service_id" => 6,
                                            "booking_id" => $result->booking_id,
                                            "apply_status" => $apply_message));
	                            	
                            }
                        }

                        $array = array('status'=>true, 'count' => $query->num_rows(), 'results'=> $data);
                    }

                    break;

                default:
                    echo "Home";
            }

        }

        echo json_encode($array);
    }


    public function otherQuotes($booking_id,$service,$provider){

        $others_count = $this->crud_model->check_availability("quotations", ['booking_id'=>$booking_id, 'service_id' => $service,"sp_id !="=>$provider]);
        if($others_count != 0){
            $others = $this->crud_model->select("quotations", ['booking_id'=>$booking_id, 'service_id' => $service, "sp_id !="=>$provider]);
            foreach($others as $other){
                $provider_info = $this->crud_model->select_row("service_providers", ["id"=>$other->sp_id]);
                $other_data[] = array("name" => $provider_info->first_name.' '.$provider_info->last_name,
                                    "photo" => $provider_info->photo,
                                    "price" => $other->total_price,
                                    "updated_at" => $other->updated_at
                                  );
            }
        } else {
            $other_data = array();
        }

        return $other_data;

    }


    public function myProposals(){

        $postdata = json_decode( file_get_contents('php://input') );
        $service_provider = $postdata->service_provider;
        $service = $postdata->service_id;
        $latitude = $postdata->latitude;
        $longitude = $postdata->longitude;

        if($service == "all"){
            $quotations = $this->crud_model->select("quotations", ['sp_id'=>$service_provider], "updated_at DESC");
            $quotations_count = $this->crud_model->check_availability("quotations", ['sp_id'=>$service_provider]);
        } else {
            $quotations = $this->crud_model->select("quotations", ['sp_id'=>$service_provider, "service_id"=>$service], "updated_at DESC");

            $quotations_count = $this->crud_model->check_availability("quotations", ['sp_id'=>$service_provider, "service_id"=>$service]);

        }

        if($quotations_count != 0){
            $data = array();
            foreach($quotations as $quotation){


                $others_count = $this->crud_model->check_availability("quotations", ['booking_id'=>$quotation->booking_id, "sp_id !="=>$service_provider]);

                if($others_count != 0){
                    $others = $this->otherQuotes($quotation->booking_id,$service,$service_provider);
                } else {
                    $others = [];
                }
                $service_table = service_table($quotation->service_id);

                $booking_info = $this->crud_model->select_row($service_table, ["id" => $quotation->booking_id, "service_id"=>$quotation->service_id]);

                $petId = $this->quotations_model->getPetsById($booking_info->client_id,$booking_info->pet_id);

                $service_info = $this->crud_model->select_row("services",["id"=>$quotation->service_id]);
                $client_info = $this->crud_model->select_row("ci_users", ["id" => $quotation->client_id]);

                if(!empty($booking_info->latitude) && !empty($booking_info->longitude)){
                    $distance = distance($booking_info->latitude, $booking_info->longitude, $latitude, $longitude, "K");

                } else {
                    $distance = 0;
                }

                if ($booking_info->status == 'Quote Sent' || $booking_info->status == 'Submitted') {
	             
                  array_push($data, array("title" => $service_info->name,
                                  "posted_time" => time_ago(strtotime($quotation->updated_at)),
                                  "client_name" => $client_info->name,
                                  "client_photo" => $client_info->profile_pic,
                                  "service_icon" => $service_info->icon,
                                  "distance" => $distance.'KM',
                                  "service_id" => $quotation->service_id,
                                  "booking_id" => $quotation->booking_id,
                                  "price" => $quotation->total_price,
                                  "others_count" => $others_count,
                                  "others" => $others,
                                  "petName" => $petId[0]->name,
                                  "updated_at" => $quotation->updated_at
                                  ));

                }


            }

            $array = array('status'=>true, 'count' => $quotations_count, 'data'=> $data);

        } else {

            $array = array('status'=>false, 'msg' => "There are no Results");
        }

        echo json_encode($array);

    }


    public function quoteForm(){

        $postdatas = json_decode( file_get_contents('php://input') );

        if(!isset($postdatas->service_id)){

            $array = array('status'=>false,'msg'=>'Please Select Service');

        } else {

            $service_id = $postdatas->service_id;
            $booking_id = $postdatas->booking_id;

            switch ($service_id) {

                case "1":

                    $this->db->select('pets.pet_name AS pet_name,
                                       pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      boarding_bookings.from_date AS from_date,
                                      boarding_bookings.to_date as to_date,
                                      boarding_bookings.message as message,
                                      packages.name as package_name,
                                      packages.price as package_price,
                                      boarding_bookings.add_ons as add_ons,
                                      ci_users.name AS client_name,ci_user_subscribe.device_token');

                    $this->db->from('boarding_bookings');
                    $this->db->join('ci_users', '(ci_users.id = boarding_bookings.client_id  AND  ci_users.is_active="1")','left');
                    $this->db->join('pets', 'boarding_bookings.pet_id = pets.id','left');
                    $this->db->join('ci_user_subscribe', 'boarding_bookings.client_id = ci_user_subscribe.user_id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->join('packages', 'packages.id = 9','left');
                    $this->db->where('boarding_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();
                    $general_addons = explode(",",$result->add_ons);
                    foreach ($general_addons as $general_addon) {
                        if(!empty($general_addon)){
                            $object = new stdClass();
                            $object->name = $general_addon;
                            $general_addons_arr[] = $object;
                        }else{
                             $general_addons_arr=[];
                        }
                    }

                    $quote_info = $this->crud_model->select_row("quotations", ["booking_id"=>$booking_id, "service_id"=>$service_id]);

                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "from_date" => $result->from_date,
                                    "to_date" => $result->to_date,
                                    "message" => $result->message,
                                    "general_addons" => $general_addons_arr,
                                    "package_name" => $result->package_name,
                                    "package_price" => $result->package_price,
                                    "platFormFee" => '100',
                                    "device_token"=>$result->device_token
                                 );
                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "2":

                    $this->db->select('pets.pet_name AS pet_name,
                                       pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      grooming_bookings.booking_date AS booking_date,
                                      grooming_bookings.booking_time as booking_time,
                                      grooming_bookings.message as message,
                                      packages.name as package_name,
                                      packages.general_addons as general_addons,
                                      packages.price as package_price,
                                      grooming_bookings.hair_cut as hair_cut,
                                      grooming_bookings.extra_addons as extra_addons,
                                      ci_users.name AS client_name,ci_user_subscribe.device_token');

                    $this->db->from('grooming_bookings');
                    $this->db->join('ci_users', '(ci_users.id = grooming_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('packages', 'grooming_bookings.package_id = packages.id','left');
                    $this->db->join('pets', 'grooming_bookings.pet_id = pets.id','left');
                    $this->db->join('ci_user_subscribe', 'grooming_bookings.client_id = ci_user_subscribe.user_id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('grooming_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    if (!empty($result->general_addons)) {
                      $general_addons = explode(",",$result->general_addons);
                      if (count($general_addons) > 0) {
                        foreach ($general_addons as $general_addon) {
                            if(!empty($general_addon)){
                                $object = new stdClass();
                                $object->name = $general_addon;
                                $general_addons_arr[] = $object;
                            }
                        }
                      }else{
                        $general_addons_arr = array();
                      }
                    }else{
                      $general_addons_arr = array();
                    }


                    if (!empty($result->extra_addons)) {
                      $extra_addons = explode(",",$result->extra_addons);
                      if (count($extra_addons) > 0) {
                        
                        foreach ($extra_addons as $extra_addon) {
                            if(!empty($extra_addon)){
                                $object = new stdClass();
                                $object->name = $extra_addon;
                                $extra_addons_arr[] = $object;
                            }
                        }

                      }else{
                        $extra_addons_arr = array();
                      }
                    }else{
                      $extra_addons_arr = array();                      
                    }




                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "booking_date" => $result->booking_date,
                                    "booking_time" => $result->booking_time,
                                    "message" => $result->message,
                                    "package_name" => $result->package_name,
                                    "general_addons" => $general_addons_arr,
                                    "package_price" => $result->package_price,
                                    "hair_cut" => $result->hair_cut,
                                    "extra_addons" => $extra_addons_arr,
                                    "platFormFee" => '100',
                                    "device_token"=>$result->device_token
                                  );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "3":

                    $this->db->select('pets.pet_name AS pet_name,
                                       pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      training_bookings.booking_date AS booking_date,
                                      training_bookings.booking_time as booking_time,
                                      training_bookings.message as message,
                                      packages.name as package_name,
                                      packages.general_addons as general_addons,
                                      packages.total_sessions as sessions,
                                      packages.price as package_price,
                                      training_bookings.extra_addons as extra_addons,
                                      ci_users.name AS client_name,ci_user_subscribe.device_token');

                    $this->db->from('training_bookings');
                    $this->db->join('ci_users', '(ci_users.id = training_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('packages', 'training_bookings.package_id = packages.id','left');
                    $this->db->join('pets', 'training_bookings.pet_id = pets.id','left');
                    $this->db->join('ci_user_subscribe', 'training_bookings.client_id = ci_user_subscribe.user_id','left');

                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('training_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $general_addons = explode(",",$result->general_addons);
                    foreach ($general_addons as $general_addon) {
                        if(!empty($general_addon)){
                            $object = new stdClass();
                            $object->name = $general_addon;
                            $general_addons_arr[] = $object;
                        }
                    }

                    $extra_addons = explode(",",$result->extra_addons);
                    foreach ($extra_addons as $extra_addon) {
                        if(!empty($extra_addon)){
                            $object = new stdClass();
                            $object->name = $extra_addon;
                            $extra_addons_arr[] = $object;
                        }else{
                             $extra_addons_arr=[];
                        }
                    }

                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "booking_date" => $result->booking_date,
                                    "booking_time" => $result->booking_time,
                                    "message" => $result->message,
                                    "package_name" => $result->package_name,
                                    "general_addons" => $general_addons_arr,
                                    "sessions" => $result->sessions,
                                    "package_price" => $result->package_price,
                                    "extra_addons" => $extra_addons_arr,
                                    "platFormFee" => '100',"device_token"=>$result->device_token
                                  );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "4":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      walking_bookings.from_date AS from_date,
                                      walking_bookings.to_date as to_date,
                                      walking_bookings.timings as timings,
                                      walking_bookings.message as message,
                                      packages.name as package_name,
                                      packages.price as package_price,
                                      walking_bookings.days_type as days_type,
                                      walking_bookings.day_walks as day_walks,
                                      ci_users.name AS client_name,ci_user_subscribe.device_token');

                    $this->db->from('walking_bookings');
                $this->db->join('ci_users', '(ci_users.id = walking_bookings.client_id  AND  ci_users.is_active="1")','left');
                    $this->db->join('packages', 'walking_bookings.package_id = packages.id','left');
                    $this->db->join('pets', 'walking_bookings.pet_id = pets.id','left');
                    $this->db->join('ci_user_subscribe', 'walking_bookings.client_id = ci_user_subscribe.user_id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('walking_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $timings = explode(",",$result->timings);
                    foreach ($timings as $timing) {
                        if(!empty($timing)){
                            $object = new stdClass();
                            $object->time = $timing;
                            if ((float)$timing < 10) {
                              $object->slot = 'Morning';
                            }else if ((float)$timing > 10 && (float)$timing < 15) {
                              $object->slot = 'Afternoon';
                            }else if ((float)$timing > 15 && (float)$timing < 23) {
                              $object->slot = 'Evening';
                            }
                            $timings_arr[] = $object;
                        }
                    }


                    $data = array("booking_id" => $booking_id,
                                    "petId" => $result->petId,
                                    "service_id" => $service_id,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "from_date" => $result->from_date,
                                    "to_date" => $result->to_date,
                                    "timings" => $timings_arr,
                                    "message" => $result->message,
                                    "package_name" => $result->package_name,
                                    "day_type" => $result->days_type,
                                    "day_walks" => $result->day_walks,
                                    "package_price" => $result->package_price,
                                    "platFormFee" => '100',"device_token"=>$result->device_token
                                  );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "5":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      vet_bookings.pet_issue AS pet_issues,
                                      vet_bookings.service_type as service_type,
                                      vet_bookings.message as message,
                                      vet_bookings.booking_date as booking_date,
                                      vet_bookings.booking_time as booking_time,
                                      vet_bookings.about_issue as about_issue,
                                      ci_users.name AS client_name,ci_user_subscribe.device_token');

                    $this->db->from('vet_bookings');
                    $this->db->join('ci_users', '(ci_users.id = vet_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('pets', 'vet_bookings.pet_id = pets.id','left');
                    $this->db->join('ci_user_subscribe', 'vet_bookings.client_id = ci_user_subscribe.user_id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('vet_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $pet_issues = explode(",",$result->pet_issues);
                    foreach ($pet_issues as $pet_issue) {
                        if(!empty($pet_issue)){
                            $object = new stdClass();
                            $object->issue = $pet_issue;
                            $issues_arr[] = $object;
                        }
                    }

                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "issues" => $issues_arr,
                                    "service_type" => $result->service_type,
                                    "message" => $result->message,
                                    "package_name" => "Vet",
                                    "booking_date" => $result->booking_date,
                                    "booking_time" => $result->booking_time,
                                    "about_issue" => $result->about_issue,
                                    "package_price" => "0",
                                    "platFormFee" => '100',"device_token"=>$result->device_token
                                  );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "6":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      sitting_bookings.from_date AS from_date,
                                      sitting_bookings.to_date as to_date,
                                      sitting_bookings.day_type as day_type,
                                      sitting_bookings.message as message,
                                      sitting_bookings.from_time as from_time,
                                      sitting_bookings.to_time as to_time,
                                      ci_users.name AS client_name,ci_user_subscribe.device_token');

                    $this->db->from('sitting_bookings');
                    $this->db->join('ci_users', '(ci_users.id = sitting_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('pets', 'sitting_bookings.pet_id = pets.id','left');
                    $this->db->join('ci_user_subscribe', 'sitting_bookings.client_id = ci_user_subscribe.user_id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('sitting_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $data = array("booking_id" => $booking_id,
                                    "petId" => $result->petId,
                                    "service_id" => $service_id,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "from_date" => $result->from_date,
                                    "to_date" => $result->to_date,
                                    "message" => $result->message,
                                    "package_name" => "Pet Sitting",
                                    "day_type" => $result->day_type,
                                    "from_time" => $result->from_time,
                                    "to_time" => $result->to_time,
                                    "package_price" => "0",
                                    "platFormFee" => '100',"device_token"=>$result->device_token
                                  );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                default:
                    echo "Home";
            }

        }

        echo json_encode($array);
    }


    public function editQuoteForm(){

        $postdatas = json_decode( file_get_contents('php://input') );

        if(!isset($postdatas->service_id)){

            $array = array('status'=>false,'msg'=>'Please Select Service');

        } else {

            $service_id = $postdatas->service_id;
            $booking_id = $postdatas->booking_id;
            $spId = $postdatas->spId;

            switch ($service_id) {

                case "1":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      boarding_bookings.from_date AS from_date,
                                      boarding_bookings.to_date as to_date,
                                      boarding_bookings.message as message,
                                      boarding_bookings.add_ons as add_ons,
                                      packages.name as package_name,
                                      packages.price as package_price,
                                      ci_users.name AS client_name,ci_user_subscribe.device_token');

                    $this->db->from('boarding_bookings');
        $this->db->join('ci_users', '(ci_users.id = boarding_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('pets', 'boarding_bookings.pet_id = pets.id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->join('ci_user_subscribe', 'boarding_bookings.client_id = ci_user_subscribe.user_id','left');

                    $this->db->join('packages', 'packages.id = 9','left');
                    $this->db->where('boarding_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $general_addons = explode(",",$result->add_ons);
                    foreach ($general_addons as $general_addon) {
                        if(!empty($general_addon)){
                            $object = new stdClass();
                            $object->name = $general_addon;
                            $general_addons_arr[] = $object;
                        }else{
                            $general_addons_arr=[];
                        }
                    }

                    $quote_info = $this->crud_model->select_row("quotations", ["booking_id"=>$booking_id, "service_id"=>$service_id, "sp_id" => $spId]);

                    $data = array("booking_id" => $booking_id,
                                    "petId" => $result->petId,
                                    "service_id" => $service_id,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "from_date" => $result->from_date,
                                    "to_date" => $result->to_date,
                                    "message" => $result->message,
                                    "general_addons" => $general_addons_arr,
                                    "actual_price" => $quote_info->actual_price,
                                    "extra_price" => $quote_info->extra_price,
                                    "discount" => $quote_info->discount,
                                    "total_price" => $quote_info->total_price,
                                    "platFormFee" => '100',
                                    "package_price" => $result->package_price,
                                    "package_name" => $result->package_name,
                                    "device_token"=>$result->device_token
                                 );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "2":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      grooming_bookings.booking_date AS booking_date,
                                      grooming_bookings.booking_time as booking_time,
                                      grooming_bookings.message as message,
                                      packages.name as package_name,
                                      packages.general_addons as general_addons,
                                      packages.price as package_price,
                                      grooming_bookings.hair_cut as hair_cut,
                                      grooming_bookings.extra_addons as extra_addons,
                                      ci_users.name AS client_name,ci_user_subscribe.device_token');

                    $this->db->from('grooming_bookings');
                    $this->db->join('ci_users', '(ci_users.id = grooming_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('packages', 'grooming_bookings.package_id = packages.id','left');
                    $this->db->join('pets', 'grooming_bookings.pet_id = pets.id','left');
                    $this->db->join('ci_user_subscribe', 'grooming_bookings.client_id = ci_user_subscribe.user_id','left');

                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('grooming_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    
                    $general_addons = explode(",",$result->general_addons);
                    foreach ($general_addons as $general_addon) {
                        if(!empty($general_addon)){
                            $object = new stdClass();
                            $object->name = $general_addon;
                            $general_addons_arr[] = $object;
                        }
                    }

                    $extra_addons = explode(",",$result->extra_addons);
                    foreach ($extra_addons as $extra_addon) {
                        if(!empty($extra_addon)){
                            $object = new stdClass();
                            $object->name = $extra_addon;
                            $extra_addons_arr[] = $object;
                        }else{
                            $extra_addons_arr=[];
                        }
                    }

                    $quote_info = $this->crud_model->select_row("quotations", ["booking_id"=>$booking_id, "service_id"=>$service_id, "sp_id" => $spId]);

                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "booking_date" => $result->booking_date,
                                    "booking_time" => $result->booking_time,
                                    "message" => $result->message,
                                    "package_name" => $result->package_name,
                                    "general_addons" => $general_addons_arr,
                                    "package_price" => $result->package_price,
                                    "hair_cut" => $result->hair_cut,
                                    "extra_addons" => $extra_addons_arr,
                                    "actual_price" => $quote_info->actual_price,
                                    "extra_price" => $quote_info->extra_price,
                                    "discount" => $quote_info->discount,
                                    "total_price" => $quote_info->total_price,
                                    "platFormFee" => '100',
                                    "spmorning" => $quote_info->spmorning,
                                    "device_token"=>$result->device_token
                                 );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "3":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      training_bookings.booking_date AS booking_date,
                                      training_bookings.booking_time as booking_time,
                                      training_bookings.message as message,
                                      packages.name as package_name,
                                      packages.general_addons as general_addons,
                                      packages.total_sessions as sessions,
                                      packages.price as package_price,
                                      training_bookings.extra_addons as extra_addons,
                                      ci_users.name AS client_name');

                    $this->db->from('training_bookings');
                    $this->db->join('ci_users', '(ci_users.id = training_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('packages', 'training_bookings.package_id = packages.id','left');
                    $this->db->join('pets', 'training_bookings.pet_id = pets.id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('training_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $general_addons = explode(",",$result->general_addons);
                    foreach ($general_addons as $general_addon) {
                        if(!empty($general_addon)){
                            $object = new stdClass();
                            $object->name = $general_addon;
                            $general_addons_arr[] = $object;
                        }
                    }

                    $extra_addons = explode(",",$result->extra_addons);
                    foreach ($extra_addons as $extra_addon) {
                        if(!empty($extra_addon)){
                            $object = new stdClass();
                            $object->name = $extra_addon;
                            $extra_addons_arr[] = $object;
                        }else{
                            $extra_addons_arr=[];
                        }

                    }

                    $quote_info = $this->crud_model->select_row("quotations", ["booking_id"=>$booking_id, "service_id"=>$service_id, "sp_id" => $spId]);

                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "booking_date" => $result->booking_date,
                                    "booking_time" => $result->booking_time,
                                    "message" => $result->message,
                                    "package_name" => $result->package_name,
                                    "general_addons" => $general_addons_arr,
                                    "sessions" => $result->sessions,
                                    "package_price" => $result->package_price,
                                    "extra_addons" => $extra_addons_arr,
                                    "extra_sessions" => (int)$quote_info->sessions - (int)$result->sessions,
                                    "actual_price" => $quote_info->actual_price,
                                    "extra_price" => $quote_info->extra_price,
                                    "discount" => $quote_info->discount,
                                    "total_price" => $quote_info->total_price,
                                    "platFormFee" => '100',
                                    "spmorning" => $quote_info->spmorning,
                                    "spevening" => $quote_info->spevening,
                                    "spafternoon" => $quote_info->spafternoon
                                );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "4":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      walking_bookings.from_date AS from_date,
                                      walking_bookings.to_date as to_date,
                                      walking_bookings.timings as timings,
                                      walking_bookings.message as message,
                                      packages.name as package_name,
                                      packages.price as package_price,
                                      walking_bookings.days_type as days_type,
                                      walking_bookings.day_walks as day_walks,
                                      ci_users.name AS client_name');

                    $this->db->from('walking_bookings');
                    $this->db->join('ci_users', '(ci_users.id = walking_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('packages', 'walking_bookings.package_id = packages.id','left');
                    $this->db->join('pets', 'walking_bookings.pet_id = pets.id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('walking_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $timings = explode(",",$result->timings);
                    foreach ($timings as $timing) {
                        if(!empty($timing)){
                            $object = new stdClass();
                            $object->time = $timing;
                            $timings_arr[] = $object;
                        }
                    }

                    $quote_info = $this->crud_model->select_row("quotations", ["booking_id"=>$booking_id, "service_id"=>$service_id, "sp_id" => $spId]);

                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "from_date" => $result->from_date,
                                    "to_date" => $result->to_date,
                                    "timings" => $timings_arr,
                                    "message" => $result->message,
                                    "package_name" => $result->package_name,
                                    "day_type" => $result->days_type,
                                    "day_walks" => $result->day_walks,
                                    "package_price" => $result->package_price,
                                    "actual_price" => $quote_info->actual_price,
                                    "extra_price" => $quote_info->extra_price,
                                    "discount" => $quote_info->discount,
                                    "total_price" => $quote_info->total_price,
                                    "sp_morning" => $quote_info->spmorning,
                                    "sp_afternoon" => $quote_info->spafternoon,
                                    "sp_evening" => $quote_info->spevening,
                                    "platFormFee" => '100'
                                );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "5":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      vet_bookings.pet_issue AS pet_issues,
                                      vet_bookings.service_type as service_type,
                                      vet_bookings.message as message,
                                      vet_bookings.booking_date as booking_date,
                                      vet_bookings.booking_time as booking_time,
                                      vet_bookings.about_issue as about_issue,
                                      ci_users.name AS client_name');

                    $this->db->from('vet_bookings');
                    $this->db->join('ci_users', '(ci_users.id = vet_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('pets', 'vet_bookings.pet_id = pets.id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('vet_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $pet_issues = explode(",",$result->pet_issues);
                    foreach ($pet_issues as $pet_issue) {
                        if(!empty($pet_issue)){
                            $object = new stdClass();
                            $object->issue = $pet_issue;
                            $issues_arr[] = $object;
                        }
                    }

                    $quote_info = $this->crud_model->select_row("quotations", ["booking_id"=>$booking_id, "service_id"=>$service_id, "sp_id" => $spId]);

                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "issues" => $issues_arr,
                                    "service_type" => $result->service_type,
                                    "message" => $result->message,
                                    "package_name" => "Vet",
                                    "booking_date" => $result->booking_date,
                                    "booking_time" => $result->booking_time,
                                    "about_issue" => $result->about_issue,
                                    "package_price" => "0",
                                    "actual_price" => $quote_info->actual_price,
                                    "extra_price" => $quote_info->extra_price,
                                    "discount" => $quote_info->discount,
                                    "total_price" => $quote_info->total_price,
                                    "platFormFee" => '100'
                                );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                case "6":

                    $this->db->select('pets.pet_name AS pet_name,
                                        pets.id AS petId,
                                      pets.dob AS pet_age,
                                      dog_breeds.title As pet_breed,
                                      pets.aggression AS pet_aggression,
                                      sitting_bookings.from_date AS from_date,
                                      sitting_bookings.to_date as to_date,
                                      sitting_bookings.day_type as day_type,
                                      sitting_bookings.message as message,
                                      sitting_bookings.from_time as from_time,
                                      sitting_bookings.to_time as to_time,
                                      ci_users.name AS client_name');

                    $this->db->from('sitting_bookings');
                    $this->db->join('ci_users', '(ci_users.id = sitting_bookings.client_id  AND  ci_users.is_active="1")', 'left');
                    $this->db->join('pets', 'sitting_bookings.pet_id = pets.id','left');
                    $this->db->join('dog_breeds', 'pets.breed_type = dog_breeds.id','left');
                    $this->db->where('sitting_bookings.id', $booking_id);

                    $query = $this->db->get();

                    $result = $query->row();

                    $quote_info = $this->crud_model->select_row("quotations", ["booking_id"=>$booking_id, "service_id"=>$service_id, "sp_id" => $spId]);

                    $data = array("booking_id" => $booking_id,
                                    "service_id" => $service_id,
                                    "petId" => $result->petId,
                                    "pet_name" => $result->pet_name,
                                    "pet_age" => $result->pet_age,
                                    "pet_breed" => $result->pet_breed,
                                    "pet_temperament" => $result->pet_aggression,
                                    "from_date" => $result->from_date,
                                    "to_date" => $result->to_date,
                                    "message" => $result->message,
                                    "package_name" => "Pet Sitting",
                                    "day_type" => $result->day_type,
                                    "from_time" => $result->from_time,
                                    "to_time" => $result->to_time,
                                    "package_price" => "0",
                                    "actual_price" => $quote_info->actual_price,
                                    "extra_price" => $quote_info->extra_price,
                                    "discount" => $quote_info->discount,
                                    "total_price" => $quote_info->total_price,
                                    "platFormFee" => '100'
                                );

                    $array = array('status'=>true, 'results'=> $data);

                    break;

                default:
                    echo "Home";
            }

        }

        echo json_encode($array);
    }


    public function submitQuote(){

        $postdata = json_decode( file_get_contents('php://input') );

        $service = $postdata->service_id;
        $service_provider = $postdata->service_provider;
        $booking_id = $postdata->booking_id;
        $sessions = $postdata->sessions;
        $actual_price = $postdata->actual_price;
        $extra_price = $postdata->extra_price;
        $discount = $postdata->discount;
        $total_price = $postdata->total_price;
        $spmorning = $postdata->spmorning;
        $spevening = $postdata->spevening;
        $spafternoon = $postdata->spafternoon;
        $action = isset($postdata->action) ? $postdata->action : "";
        $petId =  $postdata->petId;

        $service_table = service_table($service);

        $booking_info = $this->crud_model->select_row($service_table, ["id" => $booking_id]);

        if(!empty($service) && !empty($service_provider) && !empty($booking_id)){

            $data = array("sp_id" => $service_provider,
                          "service_id" => $service,
                          "client_id" => $booking_info->client_id,
                          "booking_id" => $booking_id,
                          "sessions" => $sessions,
                          "actual_price" => $actual_price,
                          "extra_price" => $extra_price,
                          "discount" => $discount,
                          "total_price" => $total_price,
                          "spmorning" => $spmorning,
                          "spevening" => $spevening,
                          "spafternoon" => $spafternoon,
                          "status" => "Submitted",
                          "pet_id" => $petId,
                          "updated_at" => date("Y-m-d H:i:s"));

            if($action == "update"){

                $insert = $this->crud_model->update("quotations", $data, ["service_id"=>$service, "sp_id"=>$service_provider, "booking_id"=>$booking_id]);

            } else{

                $insert = $this->crud_model->insert("quotations", $data);
                $tmdata['clientId'] = $booking_info->client_id;
                $tmdata['serviceId'] = $service;
                $tmdata['bookingId'] = $booking_id;
                $quoDtl = $this->quotations_model->getUserquotations($tmdata);

                $table = service_table($service);
                $this->crud_model->update($table, ["status" => "Quote Sent"], ["id"=>$booking_id]);

                # code...
                $spDetails = $this->sp_model->getSPDetails($service_provider);

                $dogDetai = $this->quotations_model->getPetsById($booking_info->client_id, $petId);
                $data['title'] = 'Quotation received for '.$dogDetai[0]->name;
                if ($service == '1') {
                    $data['desc'] = "Boarding quotation received from ".$spDetails[0]->firstName.' '.$spDetails[0]->lastName;
                }else if ($service == '2') {
                    $data['desc'] = "Grooming quotation received from ".$spDetails[0]->firstName.' '.$spDetails[0]->lastName;
                }else if ($service == '3') {
                    $data['desc'] = "Training quotation received from ".$spDetails[0]->firstName.' '.$spDetails[0]->lastName;
                }else if ($service == '4') {
                    $data['desc'] = "Walking quotation received from ".$spDetails[0]->firstName.' '.$spDetails[0]->lastName;
                }
                
                $data['senderId'] = $service_provider;
                $data['reseveId'] = $booking_info->client_id;
                $data['searchTrm'] = 'ci';
                $data['client_id'] = $booking_info->client_id;
                $data['sp_id'] = $service_provider;
                $data['booking_id'] = $booking_id;
                $data['quotation_id'] = $quoDtl[0]->quotId;

                $this->quotations_model->createNotif($data);
                $this->sp_model->updateCiNotifi($booking_info->client_id);

            }

            $array = array('status'=>true, 'msg'=> "Your Quotation Sent Successfully");

        } else {

            $array = array('status'=>true, 'msg'=> "Please enter all fields");
        }

    echo json_encode($array);

    }


    public function cost(){

        $postdatas = json_decode( file_get_contents('php://input') );

        if(!isset($postdatas->service_provider)){

            $array = array('status'=>false,'msg'=>'Please Select Service Provider');

        } else {

            $service_provider = $postdatas->service_provider;
            $service = $postdatas->service_id;


            switch ($service) {

                case "1":

                    echo "boarding";
                    break;

                case "2":

                    $packages_array = array();
                    foreach ($postdatas->packages as $package) {
                        $packages_array[] = $package->id;
                    }

                    $data = array("service_provider" => $postdatas->service_provider,
                                    "packages" => implode(',',$packages_array),
                                    "updated_at" => date("Y-m-d H:i:s")
                                 );

                    $insert = $this->crud_model->insert("grooming_cost", $data);

                    $array = array('status'=>true,'msg'=>'Service Providers Cost inserted successfully', 'data' => $data);

                    break;

                case "3":

                    $packages_array = array();
                    foreach ($postdatas->packages as $package) {
                        $packages_array[] = $package->id;
                    }

                    $data = array("service_provider" => $postdatas->service_provider,
                                    "packages" => implode(',',$packages_array),
                                    "updated_at" => date("Y-m-d H:i:s")
                                 );

                    $insert = $this->crud_model->insert("training_cost", $data);

                    $array = array('status'=>true,'msg'=>'Service Providers Cost inserted successfully', 'data' => $data);

                    break;

                case "4":

                    $data = array("service_provider" => $postdatas->service_provider,
                                    "days_type" => $postdatas->days_type,
                                    "day_walks" => $postdatas->day_walks,
                                    "updated_at" => date("Y-m-d H:i:s")
                                 );

                    $insert = $this->crud_model->insert("walking_cost", $data);

                    $array = array('status'=>true,'msg'=>'Service Providers Cost inserted successfully', 'data' => $data);

                    break;

                case "5":

                    $timing_array = array();
                    foreach ($postdatas->timings as $timing) {
                        $timing_array[] = $timing->time;
                    }

                    $certificate = base64_decode($postdatas->certificate);
                    $certificate_path = 'uploads/'.rand().date('dmYHis').'.jpg';
                    file_put_contents($certificate_path,$certificate);

                    $data = array("service_provider" => $postdatas->service_provider,
                                    "service_type" => $postdatas->service_type,
                                    "available_time" => implode(",",$timing_array),
                                    "certificate" => $certificate_path
                                );

                    $array = array('status'=>true,'msg'=>'Service Providers Cost inserted successfully', 'data' => $data);

                    break;

                case "6":

                    $data = array("service_provider" => $postdatas->service_provider,
                                    "service_type" => $postdatas->service_type,
                                    "updated_at" => date("Y-m-d H:i:s")
                                 );

                    $insert = $this->crud_model->insert("sitting_cost", $data);

                    $array = array('status'=>true,'msg'=>'Service Providers Cost inserted successfully', 'data' => $data);

                    break;

                default:
                    echo "Home";
            }

        }

        echo json_encode($array);
    }


    public function testing(){

        $post_data = json_decode( file_get_contents('php://input') );

        $this->send_push_notification([$post_data->token],'testing','tsting content',$imgurl = null);
        $array = array('status'=>true,'msg'=>'Sent successfully');
        echo json_encode($array);

    }

    public function send_push_notification($senderids,$title,$description,$imgurl = null){
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


    public function updateSpDetails(){

        $postdatas = json_decode( file_get_contents('php://input') );

        if(!isset($postdatas->id)){

            $array = array('status'=>false,'msg'=>'Please enter id to update');

        } else {

        		$fields = array();

        		if(!empty($postdatas->photo)){
	            $photo = base64_decode($postdatas->photo);
	            $photo_path = 'uploads/'.rand().date('dmYHis').'.jpg';
	            file_put_contents($photo_path,$photo);        			
        			
        			$fields['photo'] = base_url($photo_path);
        		}

						$fields['first_name'] = $postdatas->first_name;
						$fields['last_name'] = $postdatas->last_name;
						$fields['phone'] = $postdatas->phone;
						$fields['gender'] = $postdatas->gender;
						
            if (!empty($postdatas->location)) {
              $fields['location'] = $postdatas->location;
            }
            if (!empty($postdatas->longitude)) {
              $fields['longitude'] = $postdatas->longitude;
            }
            if (!empty($postdatas->latitude)) {
              $fields['latitude'] = $postdatas->latitude;
            }
            if (!empty($postdatas->city)) {
              $fields['city'] = $postdatas->city;
            }


            $update = $this->crud_model->update("service_providers", $fields, ["id" => $postdatas->id]);

            if($update == true){

                $array = array('status'=>true,'msg'=>'Profile updated successfully');

            }  else {

                $array = array('status'=>false,'msg'=>'Something went wrong');
            }

        }

        echo json_encode($array);
   }


   public function proofsStatues(){
   	$postdatas = json_decode( file_get_contents('php://input') );
   	if (is_object($postdatas) && property_exists($postdatas,'userId')  ) {
      $userDetails = $this->sp_model->getSPDetails($postdatas->userId);

      $array = array('idArrove' => $userDetails[0]->idArrove, 'addrArrove' => $userDetails[0]->addrArrove, 'crtArrove' => $userDetails[0]->crtArrove );
      echo json_encode($array); 

   	}
   }


   public function updateProofs(){
   	$postdatas = json_decode( file_get_contents('php://input') );

   	if (is_object($postdatas) && property_exists($postdatas,'userId')  ) {
   		if (!empty($postdatas->id_proof) || !empty($postdatas->certificate_proof) || !empty($postdatas->address_proof)) {


         if (!empty($postdatas->id_proof)) {
	          $id_proof = base64_decode($postdatas->id_proof);
	          $id_proof_path = 'uploads/'.rand().date('dmYHis').'.jpg';
	          file_put_contents($id_proof_path,$id_proof);
	          $fields['id_proof'] = base_url($id_proof_path);
         }

         if (!empty($postdatas->certificate_proof)) {
         		$certificate_proof = base64_decode($postdatas->certificate_proof);
         		$certificate_proof_path = 'uploads/'.rand().date('dmYHis').'.jpg';
         		file_put_contents($certificate_proof_path,$certificate_proof);
         		$fields['crt_proof'] = base_url($certificate_proof_path);
         }

        if (!empty($postdatas->address_proof)) {
        	$address_proof = base64_decode($postdatas->address_proof);
        	$address_proof_path = 'uploads/'.rand().date('dmYHis').'.jpg';
        	file_put_contents($address_proof_path,$address_proof); 
        	$fields['address_proof'] = base_url($address_proof_path);
        }

        $update = $this->crud_model->update("service_providers", $fields, ["id" => $postdatas->userId]);


				$array = array('status'=>true,'msg'=>'Profile updated successfully');
				echo json_encode($array); 


   		}
   	}
   }










}

?>