<?php
require APPPATH . '/libraries/REST_Controller.php';
class Users extends CI_Controller
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

    }

    public function user() {

        $postdata = json_decode(file_get_contents('php://input'));
        $query = $this->db->get_where('ci_users', array('id' => $postdata->id));
		$result = $query->row_array();

        echo json_encode($result);
    }

    public function register(){

        $postdatas = json_decode( file_get_contents('php://input') );


        if($this->check_duplicate(array('phone'=>$postdatas->phone))== FALSE){

            $user = $this->crud_model->select_row("ci_users", ["phone" => $postdatas->phone]);

            $array = array('status'=>false, 'msg'=>'Your Mobile No. already exists.', 'user_id' => $user->id);

        /*
        } else if($this->check_duplicate(array('email'=>$postdatas->email))== FALSE){
            $user = $this->crud_model->select_row("ci_users", ["email" => $postdatas->email]);
            $array = array('status'=>false, 'msg'=>'Your Email already exists.', 'user_id' => $user->id);*/

        } else {

            $field = array(

                'name' => $postdatas->name,
                'email' => $postdatas->email,
                'phone' => $postdatas->phone,
                'password' =>  password_hash($postdatas->password, PASSWORD_BCRYPT),
                'user_type' => "Customer",
                'is_active' => 0,
                'is_verify' => 0,
                'otp' => rand(100000,999999),
                'is_dog' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            );

            $insert = $this->crud_model->insert("ci_users", $field);

            if($insert){

                $user_info = $this->crud_model->select_row("ci_users", ["id" => $insert]);

                $url = 'http://api.bulksmsgateway.in/sendmessage.php?user=Acewebacademy&password=Newtalents@123&mobile='.$user_info->phone.'&message=%27Dear%20Customer,Your%20OTP%20number%20is%20{'.$user_info->otp.'},Regards%20PETSFOLIO%27&sender=PFOLIO&type=3&template_id=1207168240213327862';
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

        $this->crud_model->update("ci_users", ["otp" => rand(100000,999999)], ["id" => $postdatas->user_id]);

        $new_data = $this->crud_model->select_row("ci_users", ["id" => $postdatas->user_id]);

        $data = array("user_id" => $new_data->id,
                        "otp" => $new_data->otp,
                        "phone" => $new_data->phone);


        $array = array('status'=>true,'msg'=>'Verification Completed Successfully.', 'data'=>$data);

        echo json_encode($array);
    }


    public function otp(){

        $postdatas = json_decode( file_get_contents('php://input') );


        if($this->check_duplicate(array('id '=> $postdatas->user_id, "otp" => $postdatas->otp))== FALSE){

            $data = array("is_active" => 1,
                          "is_verify" => 1,
                          "otp" => "",
                          "updated_at" => date("Y-m-d H:i:s"));

            $update = $this->crud_model->update("ci_users", $data, ["id" => $postdatas->user_id]);

            $new_data = $this->crud_model->select_row("ci_users", ["id" => $postdatas->user_id]);

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
            $query = $this->db->query("SELECT * FROM ci_users WHERE phone = '$postdata->username'");
        } else {
           $query = $this->db->query("SELECT * FROM ci_users WHERE email = '$postdata->username'");
        }

        if ($query->num_rows() == 0){

			$array = array('status'=>false,'msg'=>'Invalid Email or Mobile No.');

		} else {

            $result = $query->row_array();


                $this->crud_model->update("ci_users", ["otp" => rand(100000,999999)], ["id" => $result["id"]]);

                $new_data = $this->crud_model->select_row("ci_users", ["id" => $result['id']]);
                $uphone = $result['phone'];
                $url = 'http://api.bulksmsgateway.in/sendmessage.php?user=Acewebacademy&password=Newtalents@123&mobile='.$uphone.'&message=%27Dear%20Customer,Your%20OTP%20number%20is%20{'.$new_data->otp.'},Regards%20PETSFOLIO%27&sender=PFOLIO&type=3&template_id=1207168240213327862';
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

            $fields = array(

                'name' => $postdatas->name,
                'email' => $postdatas->email,
                'phone' => $postdatas->phone,
                'password' =>  password_hash($postdatas->password, PASSWORD_BCRYPT),
                'is_active' => 1,
                'created_at' => date('Y-m-d : h:m:s'),
                'updated_at' => date('Y-m-d : h:m:s'),

            );
            $update = $this->user_model->edit_user($fields,$postdatas->id);

            if($update == true){

                $array = array('status'=>true,'msg'=>'Data updated successfully');

            }  else {

                $array = array('status'=>false,'msg'=>'Something went wrong');
            }

        }

        echo json_encode($array);
   }
   public function remove(){

       $postdatas = json_decode( file_get_contents('php://input'));
       if(!isset($postdatas->id)){

            $array = array('sts'=>false,'val'=>'Please enter id to delete');
      }else{

            $return = $this->contact_model->deletedata($postdatas->id);

                if($return == true){

                    $array = array('sts'=>true,'val'=>'Data deleted successfully');
                }else{
                        $array = array('sts'=>false,'val'=>'Something went wrong');
                }
        }

     echo json_encode($array);

   }



    public function updateCiDetails(){

        $postdatas = json_decode( file_get_contents('php://input') );

        if(!isset($postdatas->id)){

            $array = array('status'=>false,'msg'=>'Please enter id to update');

        } else {

            $fields = array();

            if (!empty($postdatas->photo)) {
                $photo = base64_decode($postdatas->photo);
                $photo_path = 'uploads/'.rand().date('dmYHis').'.jpg';
                file_put_contents($photo_path,$photo);
                $fields['profile_pic'] = base_url($photo_path);
            }

            $fields['name'] = $postdatas->name;
            $fields['phone'] = $postdatas->phone;
            $fields['gender'] = $postdatas->gender;

            if (!empty($postdatas->location)) {
              $fields['address'] = $postdatas->location;
            }
            if (!empty($postdatas->longitude)) {
              $fields['longitude'] = $postdatas->longitude;
            }
            if (!empty($postdatas->latitude)) {
              $fields['latitude'] = $postdatas->latitude;
            }
            

            $update = $this->crud_model->update("ci_users", $fields, ["id" => $postdatas->id]);

            if($update == true){

                $new_data = $this->crud_model->select_row("ci_users", ["id" => $postdatas->id]);

                $array = array('status'=>true,'msg'=>'Profile updated successfully', "data" => $new_data);

            }  else {

                $array = array('status'=>false,'msg'=>'Something went wrong');
            }

        }

        echo json_encode($array);
   }

  public function spServiceImages(){

    $postdatas = json_decode( file_get_contents('php://input') );
    if(!isset($postdatas->spId)){
      $array = array('status'=>false,'msg'=>'Please enter id to update');
    } else {

      $spId = $postdatas->spId;
      $files = $postdatas->media;
      if (count($files) > 0) {
        foreach ($files as $fkey => $fvalue) {
          $photo = base64_decode($fvalue->url);
          $photo_path = 'uploads/'.rand().date('dmYHis').'.jpg';
          file_put_contents($photo_path,$photo);


          $fields = array(
              'sp_uid' => $spId,
              'status' => '1',
              'photo' => $photo_path,
              'date_created' => gmdate("Y-m-d H:i:s")
          );
          $insert = $this->crud_model->insert("sp_service_images", $fields);      

        }
      }

      $array = array('status'=>true,'msg'=>'Profile updated successfully');
      echo json_encode($array);

    }

  }



}