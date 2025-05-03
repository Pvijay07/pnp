<?php
require APPPATH . "/libraries/REST_Controller.php";
class Bookings extends CI_Controller{

    public function __construct(){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
      header(
          "Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization"
      );
      if ("OPTIONS" === $_SERVER["REQUEST_METHOD"]) {
          die();
      }
      parent::__construct();
      $this->load->model("admin/user_model", "user_model");
      $this->load->model("admin/crud_model", "crud_model");
      $this->load->helper("text");
      $this->load->model("quotations_model");
    }


    public function packages(){
        $postdata = json_decode(file_get_contents("php://input"));

        $service_id = $postdata->service_id;

        $this->db->select("*");
        $this->db->where("service", $service_id);
        $this->db->from("packages");
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            $array = ["status" => false, "msg" => "There are no Packages"];
        } else {
            $results = $query->result();

            foreach ($results as $result) {
                $service = $this->crud_model->select_row("services", [
                    "id" => $result->service,
                ]);

                if (!empty($result->general_addons)) {
                    $general_addons = explode(",", $result->general_addons);
                    $general_arr = [];
                    foreach ($general_addons as $general_addon) {
                        if (!empty($general_addon)) {
                            $object = new stdClass();
                            $object->name = $general_addon;
                            $object->clicks = "0";

                            if ($result->service == 1) {
                                $object->icon = base_url(
                                    "uploads/icons/" .
                                        slug($general_addon) .
                                        ".png"
                                );
                            }

                            $general_arr[] = $object;
                        }
                    }
                } else {
                    $general_arr = [];
                }
                           
                $extra_arr = [];
                if (!empty($result->extra_addons)) {
                    $extra_addons = explode(",", $result->extra_addons);
                    foreach ($extra_addons as $extra_addon) {
                        if (!empty($extra_addon)) {
                            $object = new stdClass();
                            $object->name = $extra_addon;
                            $object->clicks = "0";
                            $extra_arr[] = $object;
                        }
                    }
                } else {
                    $extra_arr = [];
                }

                $packages[] = [
                    "id" => $result->id,
                    "name" => $result->name,
                    "service" => $service ? $service->name : "",
                    "general_addons" => $general_arr,
                    "extra_addons" => $extra_arr,
                    "total_sessions" => $result->total_sessions,
                    "price" => $result->price,
                    "created_at" => $result->created_at,
                ];
            }



            $array = ["status" => true, "data" => $packages];
        }

        echo json_encode($array);
    }


    public function boardingBookings(){
      $postdata = json_decode(file_get_contents("php://input"));

      $detail = $this->quotations_model->getActiveBoarding($postdata->client_id,$postdata->pet_id);

      if (count($detail) == 0) {

        $extra_array = [];
        foreach ($postdata->extra_addons as $addon) {
            $extra_array[] = $addon->name;
        }

        $message = $postdata->message ? $postdata->message : "";

        $data = [
            "client_id" => $postdata->client_id,
            "service_id" => $postdata->service_id,
            "pet_id" => $postdata->pet_id,
            "add_ons" => implode(",", $extra_array),
            "from_date" => $postdata->from_date,
            "to_date" => $postdata->to_date,
            "longitude" => $postdata->longitude,
            "latitude" => $postdata->latitude,
            "message" => $message,
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $insert = $this->crud_model->insert("boarding_bookings", $data);

        if ($insert) {
            $result = $this->crud_model->select_row("boarding_bookings", [
                "id" => $insert,
            ]);
            $pet_info = $this->crud_model->select_row("pets", [
                "id" => $result->pet_id,
            ]);

            $result_data = [
                "booking_id" => $insert,
                "client_id" => $result->client_id,
                "service_id" => $result->service_id,
                "pet_id" => $result->pet_id,
                "pet_name" => $pet_info->pet_name,
                "extra_addons" => $result->add_ons,
                "from_date" => $result->from_date,
                "to_date" => $result->to_date,
                "message" => $result->message,
            ];

            $array = [
                "status" => true,
                "msg" => "Your booking Completed Successfully.",
                "data" => $result_data,
            ];
        } else {
            $array = [
                "status" => false,
                "msg" => "There was a Problem. Try again.",
            ];
        }

        echo json_encode($array);

      }else{
        $array = array('msg' => 'Booking exist');
        echo json_encode($array);
      }

    }

    /*
    public function boardingPreview(){
      $postdata = json_decode(file_get_contents("php://input"));

      $booking_id = $postdata->booking_id;
      $message = $postdata->message ? $postdata->message : "";

      $result = $this->crud_model->select_row("boarding_bookings", [
          "id" => $booking_id,
      ]);
      $pet_info = $this->crud_model->select_row("pets", [
          "id" => $result->pet_id,
      ]);

      $update_data = ["message" => $message];
      $this->crud_model->update("boarding_bookings", $update_data, [
          "id" => $booking_id,
      ]);

      $extra_addons = explode(",", $result->add_ons);
      foreach ($extra_addons as $extra_addon) {
          if (!empty($extra_addon)) {
              $object = new stdClass();
              $object->name = $extra_addon;
              $extra_arr[] = $object;
          }
      }

      $result_data = [
          "pet_id" => $result->pet_id,
          "pet_name" => $pet_info->pet_name,
          "client_id" => $result->client_id,
          "service_id" => $result->service_id,
          "extra_addons" => $extra_arr,
          "from_date" => $result->from_date,
          "to_date" => $result->to_date,
          "message" => $result->message,
      ];

      $array = [
          "status" => true,
          "msg" => "Your booking Completed Successfully.",
          "data" => $result_data,
      ];

      echo json_encode($array);
    }*/


    public function groomingBookings(){
      $postdata = json_decode(file_get_contents("php://input"));

      $detail = $this->quotations_model->getActiveGrooming($postdata->client_id,$postdata->pet_id);

      if (count($detail) == 0) {

        $extra_array = [];
        foreach ($postdata->extra_addons as $addon) {
            $extra_array[] = $addon->name;
        }

        $message = $postdata->message ? $postdata->message : "";

        $data = [
            "client_id" => $postdata->client_id,
            "service_id" => $postdata->service_id,
            "pet_id" => $postdata->pet_id,
            "package_id" => $postdata->package_id,
            "hair_cut" => $postdata->hair_cut,
            "extra_addons" => implode(",", $extra_array),
            "booking_date" => $postdata->booking_date,
            "booking_time" => $postdata->booking_time,
            "longitude" => $postdata->longitude,
            "latitude" => $postdata->latitude,
            "message" => $message,
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $insert = $this->crud_model->insert("grooming_bookings", $data);

        if ($insert) {
            $result = $this->crud_model->select_row("grooming_bookings", [
                "id" => $insert,
            ]);
            $pet_info = $this->crud_model->select_row("pets", [
                "id" => $result->pet_id,
            ]);
            $package_info = $this->crud_model->select_row("packages", [
                "id" => $result->package_id,
            ]);
            

            $result_data = [
                "booking_id" => $insert,
                "client_id" => $result->client_id,
                "service_id" => $result->service_id,
                "pet_id" => $result->pet_id,
                "pet_name" => $pet_info->pet_name,
                "package_id" => $result->package_id,
                "package_name" => $package_info->name,
                "hair_cut" => $result->hair_cut,
                "extra_addons" => $postdata->extra_addons,
                "booking_date" => $result->booking_date,
                "booking_time" => $result->booking_time,
                "general_addons" => $package_info->general_addons
            ];

            $array = [
                "status" => true,
                "msg" => "Your booking Completed Successfully.",
                "data" => $result_data,
            ];
        } else {
            $array - [
                "status" => false,
                "msg" => "There was a Problem. Tra again.",
            ];
        }

        echo json_encode($array);

      }else{
        $array = array('msg' => 'Booking exist');
        echo json_encode($array);
      }

    }

    /*
    public function groomingPreview(){
      $postdata = json_decode(file_get_contents("php://input"));

      $booking_id = $postdata->booking_id;
      $message = $postdata->message ? $postdata->message : "";

      $result = $this->crud_model->select_row("grooming_bookings", [
          "id" => $booking_id,
      ]);
      $pet_info = $this->crud_model->select_row("pets", [
          "id" => $result->pet_id,
      ]);
      $package_info = $this->crud_model->select_row("packages", [
          "id" => $result->package_id,
      ]);

      $update_data = ["message" => $message];
      $this->crud_model->update("grooming_bookings", $update_data, [
          "id" => $booking_id,
      ]);

      $extra_addons = explode(",", $result->extra_addons);
      foreach ($extra_addons as $extra_addon) {
          if (!empty($extra_addon)) {
              $object = new stdClass();
              $object->name = $extra_addon;
              $extra_arr[] = $object;
          }
      }

      $result_data = [
          "pet_id" => $result->pet_id,
          "pet_name" => $pet_info->pet_name,
          "client_id" => $result->client_id,
          "service_id" => $result->service_id,
          "package_id" => $result->package_id,
          "package_name" => $package_info->name,
          "hair_cur" => $result->hair_cut,
          "extra_addons" => $extra_arr,
          "booking_date" => $result->booking_date,
          "booking_time" => $result->booking_time,
          "message" => $result->message,
      ];

      $array = [
          "status" => true,
          "msg" => "Your booking Completed Successfully.",
          "data" => $result_data,
      ];

      echo json_encode($array);
    }*/


    public function walkingBookings(){
      $postdata = json_decode(file_get_contents("php://input"));

      $detail = $this->quotations_model->getActiveWalking($postdata->client_id,$postdata->pet_id);

      if (count($detail) == 0) {

        $time_array = [];
        $timeCount = 0;
        foreach ($postdata->booking_time as $time) {

            if (!empty($time->time)) {
              $timeCount = $timeCount + 1;
            }
            $time_array[] = $time->time;
        }

        if ($postdata->day_walks == '3' && $timeCount > 0 && $timeCount != '3') {
          
          $array = array('msg' => '3 timing required');
          echo json_encode($array);
          exit;

        }else if ($postdata->day_walks == '2' && $timeCount > 0 && $timeCount != '2') {
          
          $array = array('msg' => '2 timing required');
          echo json_encode($array);          
          exit;
          
        }else if ($postdata->day_walks == '1' && $timeCount > 0 && $timeCount != '1') {

          $array = array('msg' => 'Only 1 timing required');
          echo json_encode($array);          
          exit;
          
        }        

        $message = $postdata->message ? $postdata->message : "";

        $data = [
            "client_id" => $postdata->client_id,
            "service_id" => $postdata->service_id,
            "pet_id" => $postdata->pet_id,
            "package_id" => $postdata->package_id,
            "days_type" => $postdata->days_type,
            "day_walks" => $postdata->day_walks,
            "from_date" => $postdata->from_date,
            "to_date" => $postdata->to_date,
            "timings" => implode(",", $time_array),
            "longitude" => $postdata->longitude,
            "latitude" => $postdata->latitude,
            "message" => $message,
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $insert = $this->crud_model->insert("walking_bookings", $data);

        if ($insert) {
            $result = $this->crud_model->select_row("walking_bookings", [
                "id" => $insert,
            ]);
            $pet_info = $this->crud_model->select_row("pets", [
                "id" => $result->pet_id,
            ]);
            $package_info = $this->crud_model->select_row("packages", [
                "id" => $result->package_id,
            ]);

            $timings = explode(",", $result->timings);
            foreach ($timings as $timing) {
                if (!empty($timing)) {
                    $object = new stdClass();
                    $object->time = $timing;
                    $timings_arr[] = $object;
                }
            }

            $result_data = [
                "pet_id" => $result->pet_id,
                "pet_name" => $pet_info->pet_name,
                "client_id" => $result->client_id,
                "service_id" => $result->service_id,
                "package_id" => $result->package_id,
                "package_name" => $package_info->name,
                "days_type" => $result->days_type,
                "day_walks" => $result->day_walks,
                "from_date" => $result->from_date,
                "to_date" => $result->to_date,
                "timings" => $timings_arr,
                "booking_id" => $insert,
            ];

            $array = [
                "status" => true,
                "msg" => "Your booking Completed Successfully.",
                "data" => $result_data,
            ];
        } else {
            $array - [
                "status" => false,
                "msg" => "There was a Problem. Tra again.",
            ];
        }

        echo json_encode($array);
      }else{
        $array = array('msg' => 'Booking exist');
        echo json_encode($array);
      }

    }

    /*
    public function walkingPreview(){
      $postdata = json_decode(file_get_contents("php://input"));

      $booking_id = $postdata->booking_id;
      $message = $postdata->message ? $postdata->message : "";

      $update_data = ["message" => $message];
      $this->crud_model->update("walking_bookings", $update_data, [
          "id" => $booking_id,
      ]);

      $result = $this->crud_model->select_row("walking_bookings", [
          "id" => $booking_id,
      ]);
      $pet_info = $this->crud_model->select_row("pets", [
          "id" => $result->pet_id,
      ]);
      $package_info = $this->crud_model->select_row("packages", [
          "id" => $result->package_id,
      ]);

      $timings = explode(",", $result->timings);
      foreach ($timings as $timing) {
          if (!empty($timing)) {
              $object = new stdClass();
              $object->time = $timing;
              $timings_arr[] = $object;
          }
      }

      $result_data = [
          "pet_id" => $result->pet_id,
          "pet_name" => $pet_info->pet_name,
          "client_id" => $result->client_id,
          "service_id" => $result->service_id,
          "package_id" => $result->package_id,
          "days_type" => $result->days_type,
          "day_walks" => $result->day_walks,
          "from_date" => $result->from_date,
          "to_date" => $result->to_date,
          "timings" => $timings_arr,
          "message" => $result->message,
          "booking_id" => $booking_id,
      ];

      $array = [
          "status" => true,
          "msg" => "Your booking Completed Successfully.",
          "data" => $result_data,
      ];

      echo json_encode($array);
    }*/


    public function trainingBookings(){
      $postdata = json_decode(file_get_contents("php://input"));

      $detail = $this->quotations_model->getActiveTraining($postdata->client_id,$postdata->pet_id);

      if (count($detail) == 0) {

        $extra_array = [];
        foreach ($postdata->extra_addons as $addon) {
            $extra_array[] = $addon->name;
        }

        $message = $postdata->message ? $postdata->message : "";

        $data = [
            "client_id" => $postdata->client_id,
            "service_id" => $postdata->service_id,
            "pet_id" => $postdata->pet_id,
            "package_id" => $postdata->package_id,
            "extra_addons" => implode(",", $extra_array),
            "booking_date" => $postdata->booking_date,
            "booking_time" => $postdata->booking_time,
            "longitude" => $postdata->longitude,
            "latitude" => $postdata->latitude,
            "message" => $message,
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $insert = $this->crud_model->insert("training_bookings", $data);

        if ($insert) {
            $result = $this->crud_model->select_row("training_bookings", [
                "id" => $insert,
            ]);
            $pet_info = $this->crud_model->select_row("pets", [
                "id" => $result->pet_id,
            ]);
            $package_info = $this->crud_model->select_row("packages", [
                "id" => $result->package_id,
            ]);

            $result_data = [
                "pet_id" => $result->pet_id,
                "pet_name" => $pet_info->pet_name,
                "client_id" => $result->client_id,
                "service_id" => $result->service_id,
                "package_id" => $result->package_id,
                "package_name" => $package_info->name,
                "extra_addons" => $postdata->extra_addons,
                "booking_date" => $result->booking_date,
                "booking_time" => $result->booking_time,
                "booking_id" => $insert,
                "general_addons" => $package_info->general_addons
            ];

            $array = [
                "status" => true,
                "msg" => "Your booking Completed Successfully.",
                "data" => $result_data,
            ];
        } else {
            $array - [
                "status" => false,
                "msg" => "There was a Problem. Try again.",
            ];
        }

        echo json_encode($array);

      }else{

        $array = array('msg' => 'Booking exist');
        echo json_encode($array);
      
      }


    }

    /*
    public function trainingPreview(){
      $postdata = json_decode(file_get_contents("php://input"));

      $booking_id = $postdata->booking_id;
      $message = $postdata->message ? $postdata->message : "";

      $update_data = ["message" => $message];
      $this->crud_model->update("training_bookings", $update_data, [
          "id" => $booking_id,
      ]);

      $result = $this->crud_model->select_row("training_bookings", [
          "id" => $booking_id,
      ]);
      $pet_info = $this->crud_model->select_row("pets", [
          "id" => $result->pet_id,
      ]);
      $package_info = $this->crud_model->select_row("packages", [
          "id" => $result->package_id,
      ]);

      $extra_addons = explode(",", $result->extra_addons);
      foreach ($extra_addons as $extra_addon) {
          if (!empty($extra_addon)) {
              $object = new stdClass();
              $object->name = $extra_addon;
              $extra_arr[] = $object;
          }
      }

      $result_data = [
          "pet_id" => $result->pet_id,
          "pet_name" => $pet_info->pet_name,
          "client_id" => $result->client_id,
          "service_id" => $result->service_id,
          "package_id" => $result->package_id,
          "extra_addons" => $extra_arr,
          "booking_date" => $result->booking_date,
          "booking_time" => $result->booking_time,
          "message" => $result->message,
          "booking_id" => $booking_id,
      ];

      $array = [
          "status" => true,
          "msg" => "Your booking Completed Successfully.",
          "data" => $result_data,
      ];

      echo json_encode($array);
    }*/


    public function sittingBookings(){
      $postdata = json_decode(file_get_contents("php://input"));

      $message = $postdata->message ? $postdata->message : "";

      $data = [
          "client_id" => $postdata->client_id,
          "service_id" => $postdata->service_id,
          "pet_id" => $postdata->pet_id,
          "from_date" => $postdata->from_date,
          "to_date" => $postdata->to_date,
          "day_type" => $postdata->day_type,
          "from_time" => $postdata->from_time,
          "to_time" => $postdata->to_time,
          "longitude" => $postdata->longitude,
          "latitude" => $postdata->latitude,
          "message" => $message,
          "created_at" => date("Y-m-d H:i:s"),
      ];

      $insert = $this->crud_model->insert("sitting_bookings", $data);

      if ($insert) {
          $result = $this->crud_model->select_row("sitting_bookings", [
              "id" => $insert,
          ]);
          $pet_info = $this->crud_model->select_row("pets", [
              "id" => $result->pet_id,
          ]);

          $result_data = [
              "pet_id" => $result->pet_id,
              "pet_name" => $pet_info->pet_name,
              "client_id" => $result->client_id,
              "service_id" => $result->service_id,
              "from_date" => $result->from_date,
              "to_date" => $result->to_date,
              "day_type" => $result->day_type,
              "from_time" => $result->from_time,
              "to_time" => $result->to_time,
              "booking_id" => $insert,
          ];

          $array = [
              "status" => true,
              "msg" => "Your booking Completed Successfully.",
              "data" => $result_data,
          ];
      } else {
          $array - [
              "status" => false,
              "msg" => "There was a Problem. Tra again.",
          ];
      }

      echo json_encode($array);
    }


    /*
    public function sittingPreview(){
      $postdata = json_decode(file_get_contents("php://input"));

      $booking_id = $postdata->booking_id;
      $message = $postdata->message ? $postdata->message : "";

      $update_data = ["message" => $message];
      $this->crud_model->update("sitting_bookings", $update_data, [
          "id" => $booking_id,
      ]);

      $result = $this->crud_model->select_row("sitting_bookings", [
          "id" => $booking_id,
      ]);
      $pet_info = $this->crud_model->select_row("pets", [
          "id" => $result->pet_id,
      ]);

      $result_data = [
          "pet_id" => $result->pet_id,
          "pet_name" => $pet_info->pet_name,
          "client_id" => $result->client_id,
          "service_id" => $result->service_id,
          "from_date" => $result->from_date,
          "to_date" => $result->to_date,
          "day_type" => $result->day_type,
          "from_time" => $result->from_time,
          "to_time" => $result->to_time,
          "message" => $result->message,
          "booking_id" => $booking_id,
      ];

      $array = [
          "status" => true,
          "msg" => "Your booking Completed Successfully.",
          "data" => $result_data,
      ];

      echo json_encode($array);
    }*/


    public function vet_issues(){
      $issues = $this->crud_model->select("vet_services", ["status" => "1"]);

      $issues_data = [];
      foreach ($issues as $issue) {
          $issues = [
              "id" => $issue->id,
              "name" => $issue->name,
              "icon" => $issue->icon,
          ];

          array_push($issues_data, $issues);
      }

      $array = ["status" => true, "data" => $issues_data];

      echo json_encode($array);
    }


    public function vetBookings(){
      $postdata = json_decode(file_get_contents("php://input"));

      $issues_array = [];
      foreach ($postdata->issues as $issue) {
          $issues_array[] = $issue->name;
      }

      $message = $postdata->message ? $postdata->message : "";

      $data = [
          "client_id" => $postdata->client_id,
          "service_id" => $postdata->service_id,
          "pet_id" => $postdata->pet_id,
          "service_type" => $postdata->service_type,
          "pet_issue" => implode(",", $issues_array),
          "booking_date" => $postdata->booking_date,
          "booking_time" => $postdata->booking_time,
          "about_issue" => $postdata->about_issue,
          "longitude" => $postdata->longitude,
          "latitude" => $postdata->latitude,
          "message" => $message,
          "created_at" => date("Y-m-d H:i:s"),
      ];

      $insert = $this->crud_model->insert("vet_bookings", $data);

      if ($insert) {
          $result = $this->crud_model->select_row("vet_bookings", [
              "id" => $insert,
          ]);
          $pet_info = $this->crud_model->select_row("pets", [
              "id" => $result->pet_id,
          ]);

          $result_data = [
              "pet_id" => $result->pet_id,
              "pet_name" => $pet_info->pet_name,
              "client_id" => $result->client_id,
              "service_id" => $result->service_id,
              "pet_issues" => $postdata->issues,
              "booking_date" => $result->booking_date,
              "booking_time" => $result->booking_time,
              "about_issue" => $result->about_issue,
              "service_type" => $result->service_type,
              "booking_id" => $insert,
          ];

          $array = [
              "status" => true,
              "msg" => "Your booking Completed Successfully.",
              "data" => $result_data,
          ];
      } else {
          $array - [
              "status" => false,
              "msg" => "There was a Problem. Tra again.",
          ];
      }

      echo json_encode($array);
    }

    /*
    public function vetPreview(){
      $postdata = json_decode(file_get_contents("php://input"));

      $booking_id = $postdata->booking_id;
      $message = $postdata->message ? $postdata->message : "";

      $update_data = ["message" => $message];
      $this->crud_model->update("vet_bookings", $update_data, [
          "id" => $booking_id,
      ]);

      $result = $this->crud_model->select_row("vet_bookings", [
          "id" => $booking_id,
      ]);
      $pet_info = $this->crud_model->select_row("pets", [
          "id" => $result->pet_id,
      ]);

      $issues = explode(",", $result->pet_issue);
      foreach ($issues as $issue) {
          if (!empty($issue)) {
              $object = new stdClass();
              $object->name = $issue;
              $issue_arr[] = $object;
          }
      }

      $result_data = [
          "pet_id" => $result->pet_id,
          "pet_name" => $pet_info->pet_name,
          "client_id" => $result->client_id,
          "service_id" => $result->service_id,
          "service_type" => $result->service_type,
          "pet_issues" => $issue_arr,
          "booking_date" => $result->booking_date,
          "booking_time" => $result->booking_time,
          "about_issue" => $result->about_issue,
          "message" => $result->message,
          "booking_id" => $booking_id,
      ];

      $array = [
          "status" => true,
          "msg" => "Your booking Completed Successfully.",
          "data" => $result_data,
      ];

      echo json_encode($array);
    }*/

    
}
