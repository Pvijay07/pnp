<?php
require APPPATH . '/libraries/REST_Controller.php';
class Community extends CI_Controller
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

    public function index() {

        $postdata = json_decode( file_get_contents('php://input') );

            $data = array(
                'customer_id' => $postdata->customer_id,
                'pet_type' => $postdata->pet_type,
                'pet_name' => $postdata->pet_name,
                'gender' =>  $postdata->gender,
                'age' => $postdata->age,
                'dob' => $postdata->dob,
                'breed_type' => $postdata->breed_type,
                'aggression' => $postdata->aggression,
                'vaccination' => $postdata->vaccination,
                'created_at' => date('Y-m-d H:i:s')
            );

        $insert = $this->crud_model->insert("pets", $data);

        $array = array('status'=>true, 'msg'=>'Your Pet added Successfully.');

        echo json_encode($array);
    }


    public function register(){

        $postdatas = json_decode( file_get_contents('php://input') );


        if($this->crud_model->check_availability("ci_users", array('phone'=>$postdatas->phone)) != 0){

            $user = $this->crud_model->select_row("ci_users", ["phone" => $postdatas->phone]);
            $array = array('status'=>false, 'msg'=>'Your Mobile No. already exists.', 'user_id' => $user->id);

        } else if($this->crud_model->check_availability("ci_users", array('email'=>$postdatas->email)) != 0){

            $user = $this->crud_model->select_row("ci_users", ["email" => $postdatas->email]);
            $array = array('status'=>false, 'msg'=>'Your Email already exists.', 'user_id' => $user->id);

        } else {

            $field = array(

                'name' => $postdatas->name,
                'phone' => $postdatas->phone,
                'email' => $postdatas->email,
                'password' =>  password_hash($postdatas->password, PASSWORD_BCRYPT),
                'profile_pic' => "uploads/no-photo.png",
                "user_type" => "Customer",
                'is_active' => 1,
                'is_verify' => 1,
                'created_at' => date('Y-m-d H:i:s')

            );

            $insert = $this->crud_model->insert("ci_users", $field);

            if($insert){

                $user_info = $this->crud_model->select_row("ci_users", ["id" => $insert]);

                $data = array("user_id" => $user_info->id,
                              "name" => $user_info->name,
                              "email" => $user_info->email,
                              "photo" => $user_info->profile_pic,
                               "phone" => $user_info->phone);

                $array = array('status'=>true,'msg'=>'Registration is Completed Successfully', 'results' => $data);

            }  else {

                $array = array('status'=>false,'msg'=>'Something went wrong');
            }
        }

        echo json_encode($array);

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

            $result = $query->row();

            if($result->is_active == 0){

                $array = array('status'=>false,'msg'=>'Your Account is Not Active');

            } else {

                $validPassword = password_verify($postdata->password, $result->password);

                if(!$validPassword){

                    $array = array('status'=>false,'msg'=> "Incorrect Password");

                } else {

                    $data = $this->crud_model->select_row("ci_users", ["id"=>$result->id]);
                    $array = array("status"=>true, "msg"=>"Login Successfully.", "data" => $data);
                }

            }
        }


        echo json_encode($array);

	}


    public function update(){

        $post_data = json_decode( file_get_contents('php://input') );

        $user_id = $post_data->user_id;

        $user_info = $this->crud_model->select_row("ci_users", ["id"=> $user_id]);

        if(empty($post_data->photo)){

            $photo_path = $user_info->profile_pic;

        } else {

            $photo = base64_decode($post_data->photo);
            $photo_path = 'uploads/'.rand().date('dmYHis').'.jpg';
            file_put_contents($photo_path, $photo);

        }

        $field = array(

            'name' => $post_data->name,
            'phone' => $post_data->phone,
            'email' => $post_data->email,
            'profile_pic' => $photo_path,
            'updated_at' => date("Y-m-d H:i:s")
        );

        $update = $this->crud_model->update("ci_users", $field, ["id"=>$user_id]);

        $data = $this->crud_model->select_row("ci_users", ["id"=> $user_id]);

        $array = array('status'=>true,'msg'=>'Profile Updated Successfully', 'data' => $data);

        echo json_encode($array);

    }


    public function user_info(){

        $post_data = json_decode( file_get_contents('php://input') );

        $user_id = $post_data->user_id;

        $user_info = $this->crud_model->select_row("ci_users", ["id" => $user_id]);

        $array = array('status'=>true, 'data' => $user_info);

        echo json_encode($array);

    }

    public function categories(){

        $post_data = json_decode( file_get_contents('php://input') );

        $categories = $this->crud_model->select("community_category", ["status" => 1]);

        $array = array('status'=>true, 'data' => $categories);

        echo json_encode($array);

    }


    public function subCategories(){

        $post_data = json_decode( file_get_contents('php://input') );

        $category = $post_data->category;

        $sub_categories = $this->crud_model->select("community_subcategory", ["catid" => $category]);

        $array = array('status'=>true, 'data' => $sub_categories);

        echo json_encode($array);

    }


    public function addPost(){

        $post_data = json_decode( file_get_contents('php://input') );

        $user_id = $post_data->user_id;

        $images_array = array();
        if(!empty($postdata->images)){
            foreach ($postdata->images as $image) {
                $images_array[] = $image->name;
            }
        }

        $images = (count($images_array) > 0) ? implode(",", $images_array) : "";

        $fields = array(
            'category' => $post_data->category,
            'sub_category' => $post_data->sub_category,
            'title' => $post_data->title,
            'images' => $images,
            'posted_by' => $user_id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );

        $insert = $this->crud_model->insert("community_posts", $fields);

        if($insert){

            $data = $this->crud_model->select_row("community_posts", ["id"=>$insert]);
            $array = array('status'=>true,'msg'=>'Your Post Successfully Posted', 'data' => $data);

        } else {

            $array = array('status'=>false,'msg'=>'There was a Problem');

        }

        echo json_encode($array);

    }

    public function deletePost(){

        $post_data = json_decode( file_get_contents('php://input') );

        $post_id = $post_data->id;

        $delete = $this->crud_model->delete("community_posts", ["id"=>$post_id]);

        if($delete){


            $array = array('status'=>true,'msg'=>'Your Post Deleted Successfully');

        } else {

            $array = array('status'=>false,'msg'=>'There was a Problem');

        }

        echo json_encode($array);

    }





}