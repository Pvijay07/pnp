<?php
require APPPATH . '/libraries/REST_Controller.php';
class Customers extends CI_Controller
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

    public function addDog() {

        $postdata = json_decode( file_get_contents('php://input') );

        $petDta = $this->db->get_where('pets', array('customer_id' => $postdata->customer_id, 'pet_name' => $postdata->pet_name));

        if($petDta->num_rows() == 0){

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
                'insurance' => $postdata->insurance,
                'licence' => $postdata->licence,
                'created_at' => date('Y-m-d H:i:s')
            );

            $insert = $this->crud_model->insert("pets", $data);

            $array = array('status'=>true, 'msg'=>'Your Pet added Successfully.');

            echo json_encode($array);

        }else{

            $array = array('status'=>false, 'msg'=>'Pet name exits');

            echo json_encode($array);
        }

    }


    public function myDogs() {

        $postdata = json_decode( file_get_contents('php://input') );

        $customer_id = $postdata->customer_id;

        $this->db->select('*');
        $this->db->where('customer_id', $customer_id);
        $this->db->from('pets');
        $query = $this->db->get();

        if($query->num_rows() == 0){

            $array = array('status'=>false, 'msg'=>'There are no Pets');

        } else {


            $results = $query->result();

            foreach($results as $result){

                $breed_type = $this->crud_model->select_row("dog_breeds", ["id" => $result->breed_type]);

                $dogs[] = array('id' => $result->id,
                            'pet_type' => $result->pet_type,
                            'pet_name' => $result->pet_name,
                            'gender' => $result->gender,
                            'age' => $result->age,
                            'dob' => $result->dob,
                            'breed_type' => ($breed_type) ? $breed_type->title : "",
                            'aggression' => $result->aggression,
                            'vaccination' => $result->vaccination,
                            'created_at' => $result->created_at);
            }

            $array = array('status'=>true, 'data'=>$dogs);

        }

        echo json_encode($array);
    }


    public function myQuotes() {

        $postdata = json_decode( file_get_contents('php://input') );

        $client_id = $postdata->client_id;

        $results = $this->crud_model->select("quotations", ["client_id" => $client_id]);

        if($results){

            foreach($results as $result){

                $provider_info = $this->crud_model->select_row("service_providers", ["id" => $result->sp_id]);

                $service_table = service_table($result->service_id);

                $booking_info = $this->crud_model->select_row($service_table, ["id" => $result->booking_id]);

                $distance = distance($provider_info->latitude, $provider_info->longitude, $booking_info->latitude, $booking_info->longitude, 'K');

                $verify = ($provider_info->is_verify == 1) ? "PNP Verified" : "";

                $data[] = array("service_provider" => $provider_info->first_name.' '.$provider_info->last_name,
                                "provider_img" => $provider_info->photo,
                                "verify" => $verify,
                                "total_price" => $result->total_price,
                                "distance" => sprintf("%0.2f", $distance)."KM");
            }

            $array = array('status'=>true, 'quotations'=>$data);

        } else {
            $array = array('status'=>false, 'quotations'=>"There is No Quotations");
        }

        echo json_encode($array);

    }

    public function bookingsCount(){

        $post_data = json_decode( file_get_contents('php://input') );

        $client_id = $post_data->client_id;

        $services = $this->crud_model->select("services", ["status"=>"Active"]);

        $total = 0;

        foreach($services as $service){

            $table_name = service_table($service->id);

            $bookings_count = $this->crud_model->check_availability($table_name, ['client_id'=>$client_id]);

            $data[] = array($table_name => $bookings_count);

            $total += $bookings_count;

        }

        $array = array('status'=>true, 'total_bookings'=> $total, 'data' => $data);

        echo json_encode($array);

    }


    // function send_fcm_otp($token, $otp) {
    //     // Set the API endpoint URL
    //     $url = 'https://fcm.googleapis.com/fcm/send';

    //     // Set the headers with the FCM server key and content type
    //     $headers = array(
    //       'Authorization: key=AIzaSyD55dXDM5PnyPoj2DgZ1hhSgDEeECP13bg',
    //       'Content-Type: application/json'
    //     );

    //     // Set the message payload with the OTP and notification details
    //     $message = array(
    //       'to' => $token,
    //       'notification' => array(
    //         'title' => 'Your OTP is ' . $otp,
    //         'body' => 'Please use this OTP to verify your account.',
    //         'icon' => 'https://example.com/icon.png',
    //         'click_action' => 'https://example.com'
    //       ),
    //       'data' => array(
    //         'otp' => $otp
    //       )
    //     );

    //     // Create a new cURL session and set the options
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));

    //     // Execute the cURL session and close it
    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     // Return the FCM response
    //     return $response;
    //   }





}