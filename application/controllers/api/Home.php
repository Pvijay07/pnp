<?php
require APPPATH . '/libraries/REST_Controller.php';
class Home extends CI_Controller
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

    public function home() {


        $services = $this->crud_model->select("services", ["status" => "Active"]);
        $blog = $this->crud_model->select("blog", ["status" => "Active"]);

        $services_data = array();
        foreach($services as $service){

            $info = array("id" => $service->id,
                          "name" => $service->name,
                          "icon" => base_url().$service->icon,
                          "banner" => base_url().$service->banner);

            array_push($services_data, $info);

        }

        $data = array();

        foreach($blog as $single){

            $category = $this->crud_model->select_row("category", ["id" => $single->category_id]);
            $blog = array("id" => $single->id,
                          "title" => $single->title,
                          "image" => base_url().$single->image,
                          "category" => $category->name,
                          "created_at" => $single->created_at);

            array_push($data, $blog);

        }


        $array = array('status'=>true, 'services' => $services_data, 'blog' => $data);

        echo json_encode($array);
    }

    public function breeds() {

        $postdata = json_decode( file_get_contents('php://input') );


        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->from('dog_breeds');
        $this->db->order_by('title', 'ASC');
        $query = $this->db->get();

        if($query->num_rows() == 0){

            $array = array('status'=>false, 'msg'=>'There is no Breeds');

        } else {

            $array = array('status'=>true, 'data'=>$query->result_array());

        }

            echo json_encode($array);
    }

    public function ages() {

        $postdata = json_decode( file_get_contents('php://input') );


        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->from('dog_ages');
        $query = $this->db->get();

        if($query->num_rows() == 0){

            $array = array('status'=>false, 'msg'=>'There is no Ages');

        } else {

            $array = array('status'=>true, 'data'=>$query->result_array());

        }

            echo json_encode($array);
    }

    public function services() {

        $postdata = json_decode( file_get_contents('php://input') );

        $this->db->select('*');
        $this->db->where('status', "Active");
        $this->db->from('services');
        $query = $this->db->get();

        if($query->num_rows() == 0){

            $array = array('status'=>false, 'msg'=>'There is no Services');

        } else {

            $array = array('status'=>true, 'data'=>$query->result_array());

        }

            echo json_encode($array);
    }

    public function boarding_prices() {

        $postdata = json_decode( file_get_contents('php://input') );


        $this->db->select('*');
        $this->db->where('id !=', "0");
        $this->db->from('boarding_cost');
        $query = $this->db->get();

        if($query->num_rows() == 0){

            $array = array('status'=>false, 'msg'=>'Something Wrong');

        } else {

            $array = array('status'=>true, 'data'=>$query->result_array());

        }

            echo json_encode($array);
    }

    public function boarding_addons() {

        $postdata = json_decode( file_get_contents('php://input') );


        $this->db->select('*');
        $this->db->where('id !=', "0");
        $this->db->from('boarding_addons');
        $query = $this->db->get();

        if($query->num_rows() == 0){

            $array = array('status'=>false, 'msg'=>'Something Wrong');

        } else {

            $array = array('status'=>true, 'data'=>$query->result_array());

        }

            echo json_encode($array);
    }


    public function food_prices() {

        $postdata = json_decode( file_get_contents('php://input') );

        $food_type = $postdata->id;

        $this->db->select('*');
        $this->db->where('id', $food_type);
        $this->db->from('food_cost');
        $query = $this->db->get();

        if($query->num_rows() == 0){

            $array = array('status'=>false, 'msg'=>'Something Wrong');

        } else {

            $array = array('status'=>true, 'data'=>$query->result_array());

        }

            echo json_encode($array);
    }

    public function food_items() {

        $postdata = json_decode( file_get_contents('php://input') );

        $food_type = $postdata->id;

        $this->db->select('*');
        $this->db->where('food_type', $food_type);
        $this->db->from('food_types');
        $query = $this->db->get();

        if($query->num_rows() == 0){

            $array = array('status'=>false, 'msg'=>'Something Wrong');

        } else {

            $array = array('status'=>true, 'data'=>$query->result_array());

        }

            echo json_encode($array);
    }

    public function saveAudio() {

        $postdata = json_decode( file_get_contents('php://input') );

        $audio = base64_decode($postdata->audio);
        $path = 'uploads/'.date('dmYHis').'.mp3';
        file_put_contents($path,$audio);

            $array = array('status'=>true, 'data'=>'OK');

            echo json_encode($array);
    }








}