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

    }
    
    public function info() {
                
        $postdata = json_decode(file_get_contents('php://input'));
        $query = $this->db->get_where('service_providers', array('id' => $postdata->id));
		$result = $query->row_array();

        echo json_encode($result);
    }

    public function register(){

        $postdatas = json_decode( file_get_contents('php://input') ); 
       

        if($this->crud_model->check_availability("service_providers", array('phone'=>$postdatas->phone)) != 0){

            $user = $this->crud_model->select_row("service_providers", ["phone" => $postdatas->phone]);            
            $array = array('status'=>false, 'msg'=>'Your Mobile No. already exists.', 'user_id' => $user->id);

        } else if($this->crud_model->check_availability("service_providers", array('email'=>$postdatas->email)) != 0){
            
            $user = $this->crud_model->select_row("service_providers", ["email" => $postdatas->email]);
            $array = array('status'=>false, 'msg'=>'Your Email already exists.', 'user_id' => $user->id);

        } else {

            $field = array(

                'name' => $postdatas->name,
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

            if($result['status'] == 0){

                $array = array('status'=>false,'msg'=>'Your Account is Not Active');

            } else {
                
                $this->crud_model->update("service_providers", ["otp" => rand(100000,999999)], ["id" => $result["id"]]);

                $new_data = $this->crud_model->select_row("service_providers", ["id" => $result['id']]);

                $data = array("user_id" => $result['id'],
                              "otp" => $new_data->otp,
                              "phone" => $result['phone']);

              
                $array = array('status'=>true,'data'=>$data);
                
            }
        }

              
        echo json_encode($array);			
			
	}
    
    public function update(){
   
        $postdatas = json_decode( file_get_contents('php://input') );        
              
        if(!isset($postdatas->id)){
            
            $array = array('status'=>false,'msg'=>'Please enter id to update');

        } else {

            $id_proof = base64_decode($postdatas->id_proof); 
            $id_proof_path = 'uploads/'.date('dmYHis').pathinfo($id_proof, PATHINFO_EXTENSION);
            file_put_contents($id_proof_path,$id_proof); 

            $address_proof = base64_decode($postdatas->address_proof); 
            $address_proof_path = 'uploads/'.date('dmYHis').pathinfo($address_proof, PATHINFO_EXTENSION);
            file_put_contents($address_proof_path,$address_proof); 

            $photo = base64_decode($postdatas->photo); 
            $photo_path = 'uploads/'.date('dmYHis').pathinfo($photo, PATHINFO_EXTENSION);
            file_put_contents($photo_path,$photo); 

            echo $address_proof; exit;

            $fields = array(

                'name' => $postdatas->name,
                'email' => $postdatas->email,
                'phone' => $postdatas->phone,
                'age' =>  $postdatas->age,
                'gender' => $postdatas->gender,
                'service_id' => $postdatas->service,
                'id_proof' => $id_proof_path,
                'address_proof' => $address_proof_path,
                'photo' => $photo_path
            );

            print_r($fields); exit;
            $update = $this->crud_model->update("service_providers", $fields, ["id" => $postdatas->id]);

            if($update == true){ 
            
                $array = array('status'=>true,'msg'=>'Profile updated successfully');

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
    
    
    
}