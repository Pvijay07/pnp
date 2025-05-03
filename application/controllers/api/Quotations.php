<?php
require APPPATH . '/libraries/REST_Controller.php';
class Quotations extends CI_Controller{

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



  private function parseFloat($var){
    return (float)round($var,2);
  }

  public function haversineGreatCircleDistance(
    $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000){
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);

    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
      cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return $angle * $earthRadius;
  }



  public function allquotations(){
 
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') && property_exists($postdata,'serviceId') && property_exists($postdata,'bookingId')) {

      $data['clientId'] = $postdata->userId;
      $data['serviceId'] = $postdata->serviceId;
      $data['bookingId'] = $postdata->bookingId;
      
      if (property_exists($postdata,'petId')) {
        $data['petId'] = $postdata->petId;
      }

      $quotations = $this->quotations_model->getUserquotations($data);

      if (count($quotations) > 0) {
        
        $array = array();
        $lan = array();

        foreach ($quotations as $qkey => $qvalue) {
          
          $spdetails = $this->sp_model->getSPDetails($qvalue->spId);

          if($data['serviceId'] == '1'){
            // Boarding
            $cldetails = $this->quotations_model->getBoardingDetailsById($data['bookingId']);
          }else if ($data['serviceId'] == '2') {
            //- Grooming
            $cldetails = $this->quotations_model->getGroomingDetailsById($data['bookingId']);
          }else if ($data['serviceId'] == '3') {
            //- Training
            $cldetails = $this->quotations_model->getTrainigDetailsById($data['bookingId']);
          }else if ($data['serviceId'] == '4') {
            //- Walking
            $cldetails = $this->quotations_model->getWalkingDetailsById($data['bookingId']);
          }else if ($data['serviceId'] == '5') {
            //- Vet @ Home
            $cldetails = $this->quotations_model->getVetDetailsById($data['bookingId']);
          }else if ($data['serviceId'] == '6') {
            //- Sitting
            $cldetails = $this->quotations_model->getSittingDetailsById($data['bookingId']);
          }

          $distance = distance($cldetails[0]->latitude, $cldetails[0]->longitude, $spdetails[0]->latitude, $spdetails[0]->longitude, "K");

          $rating = $this->quotations_model->getAvgReviews($qvalue->spId);
          $totalrating = $this->quotations_model->getTotalReviews($qvalue->spId);

          array_push($array, array('photo' => $spdetails[0]->photo, 'name' => $spdetails[0]->firstName.' '.$spdetails[0]->lastName, 'totalPrice' => $qvalue->totalPrice, 'spId' => $qvalue->spId, 'inkm' => $distance.'KM', 'bookingId' => $qvalue->quotId, 'rating' => $rating, 'review' => $totalrating, 'pnpVerif' => $spdetails[0]->pnpVerified, 'favorite' => $qvalue->favorite ) );

        }
        

      }else{
        $array = array();
      }

 
      echo json_encode($array);
    }



  }


  public function getBookingService(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {
      $data['clientId'] = $postdata->userId;
      $array = array();
      //- 1. Boarding
      $booking = $this->quotations_model->isBoardBooking($data['clientId']);
      if (count($booking) > 0) {
        array_push($array, array('service_id' => '1' , 'name' => 'Boarding' ));
      }

      //- 2. Grooming
      $booking = $this->quotations_model->isGromBooking($data['clientId']);
      if (count($booking) > 0) {
        array_push($array, array('service_id' => '2' , 'name' => 'Grooming' ));
      }

      //- 3. Training
      $booking = $this->quotations_model->isTrainBooking($data['clientId']);
      if (count($booking) > 0) {
        array_push($array, array('service_id' => '3' , 'name' => 'Training' ));
      }      
      //- 4. Walking
       $booking = $this->quotations_model->isWalkBooking($data['clientId']);
      if (count($booking) > 0) {
        array_push($array, array('service_id' => '4' , 'name' => 'Walking' ));
      }     
      //- 5. Vet @ Home
      $booking = $this->quotations_model->isVetBooking($data['clientId']);
      if (count($booking) > 0) {
        array_push($array, array('service_id' => '5' , 'name' => 'Vet @ Home' ));
      }      
      //- 6. Sitting
      $booking = $this->quotations_model->isSitBooking($data['clientId']);
      if (count($booking) > 0) {
        array_push($array, array('service_id' => '6' , 'name' => 'Sitting' ));
      }

      echo json_encode($array);

    }

  }


  public function getMyBooking(){
 
    $postdata = json_decode(file_get_contents("php://input"));


    if (is_object($postdata) && property_exists($postdata,'userId') && property_exists($postdata,'serviceId') ) {
      
      $arrayName = array();
      $data['clientId'] = $postdata->userId;
      $data['serviceId'] = $postdata->serviceId; 
      if (property_exists($postdata,'petId')) {
        $data['petId'] = $postdata->petId; 
      }else{
        $data['petId'] = '';
      }

      if ($data['serviceId'] == '1') {
        //- 1. Boarding
        # code...
        $quotations = $this->quotations_model->getActiveBoarding($data['clientId'],$data['petId']);

        if (count($quotations) > 0) {
          foreach ($quotations as $qkey => $qvalue) {
            
            $petDetails = $this->quotations_model->getPetsById($data['clientId'],$qvalue->petId);
            $packageDtl = $this->quotations_model->getPackages('9');

            array_push($arrayName, array( 'bookingId' => $qvalue->id,'petName' => $petDetails[0]->name, 'hairCut'=> '', 'bookingDate' => '', 'bookingTime' => '','addOn' => explode(',',$qvalue->addOns), 'fromDate' => $qvalue->fromDate, 'toDate' => $qvalue->toDate, 'packName' => $packageDtl[0]->name, 'daysType' => '', 'dayWalks' => '', 'petIssue' => '', 'serviceType' => '', 'aboutIssue' => '', 'fromTime' => '', 'toTime' => '','walkBookingTime' =>  '', 'packItm' => explode(',',$packageDtl[0]->generalAddons) ) );
          }
        }else{
          $arrayName = array();
        }

      }else if ($data['serviceId'] == '2') {
        //- 2. Grooming
        # code...
        $quotations = $this->quotations_model->getActiveGrooming($data['clientId'],$data['petId']);

        if (count($quotations) > 0) {
          foreach ($quotations as $qkey => $qvalue) {
            
            $petDetails = $this->quotations_model->getPetsById($data['clientId'],$qvalue->petId);
            $packageDtl = $this->quotations_model->getPackages($qvalue->packageId);
            if (empty($qvalue->addOns)) {
              $addOns = [];
            } else {
              $addOns = explode(',', $qvalue->addOns);
            }
            array_push($arrayName, array('bookingId' => $qvalue->id,'petName' => $petDetails[0]->name, 'hairCut'=> $qvalue->hairCut, 'bookingDate' => $qvalue->bookingDate, 'bookingTime' => $qvalue->bookingTime,'addOn' => $addOns, 'fromDate' => '', 'toDate' => '', 'packName' => $packageDtl[0]->name, 'daysType' => '', 'dayWalks' => '','petIssue' => '', 'serviceType' => '', 'aboutIssue' => '', 'fromTime' => '', 'toTime' => '','walkBookingTime' =>  '', 'packItm' => explode(',',$packageDtl[0]->generalAddons) ) );
          }
        }else{
          $arrayName = array();
        }

      }else if ($data['serviceId'] == '3') {
        //- 3. Training
        $quotations = $this->quotations_model->getActiveTraining($data['clientId'],$data['petId']);
        if (count($quotations) > 0) {
          foreach ($quotations as $qkey => $qvalue) {

            $petDetails = $this->quotations_model->getPetsById($data['clientId'],$qvalue->petId);
            $packageDtl = $this->quotations_model->getPackages($qvalue->packageId);

            array_push($arrayName, array('bookingId' => $qvalue->id,'petName' => $petDetails[0]->name, 'hairCut'=> '', 'bookingDate' => $qvalue->bookingDate, 'bookingTime' => $qvalue->bookingTime,'addOn' => explode(',',$qvalue->addOns), 'fromDate' => '', 'toDate' => '', 'packName' => $packageDtl[0]->name, 'daysType' => '', 'dayWalks' => '','petIssue' => '', 'serviceType' => '', 'aboutIssue' => '', 'fromTime' => '', 'toTime' => '','walkBookingTime' =>  '', 'packItm' => explode(',',$packageDtl[0]->generalAddons) ) );
          }
        }else{
          $arrayName = array();
        }

      }else if ($data['serviceId'] == '4') {
        //- 4. Walking
        $quotations = $this->quotations_model->getActiveWalking($data['clientId'],$data['petId']);
        if (count($quotations) > 0) {
          foreach ($quotations as $qkey => $qvalue) {

            $petDetails = $this->quotations_model->getPetsById($data['clientId'],$qvalue->petId);
            $packageDtl = $this->quotations_model->getPackages($qvalue->packageId);

            $tmpBook = array();
            if (!empty($qvalue->timings)) {
              $bookTiming = explode(',', $qvalue->timings);            
              if (count($bookTiming) > 0) {
                foreach ($bookTiming as $btkey => $btvalue) {
                  array_push($tmpBook, array('time' => $btvalue));
                }              
              }              
            }

            array_push($arrayName, array('bookingId' => $qvalue->id,'petName' => $petDetails[0]->name, 'hairCut'=> '', 'bookingDate' => '', 'bookingTime' => '','addOn' => array(), 'fromDate' => $qvalue->fromDate, 'toDate' => $qvalue->toDate, 'packName' => $packageDtl[0]->name, 'daysType' => $qvalue->daysType, 'dayWalks' => $qvalue->dayWalks,'petIssue' => '', 'serviceType' => '', 'aboutIssue' => '', 'fromTime' => '', 'toTime' => '','walkBookingTime' =>  $tmpBook,'packItm' => explode(',',$packageDtl[0]->generalAddons) ) );
          }
        }else{
          $arrayName = array();
        }

      }else if ($data['serviceId'] == '5') {
        //- 5. Vet @ Home
        $quotations = $this->quotations_model->getActiveVet($data['clientId'],$data['petId']);
        if (count($quotations) > 0) {
          foreach ($quotations as $qkey => $qvalue) {

            $petDetails = $this->quotations_model->getPetsById($data['clientId'],$qvalue->petId);
            
            array_push($arrayName, array('bookingId' => $qvalue->id,'petName' => $petDetails[0]->name, 'hairCut'=> '', 'bookingDate' => $qvalue->bookingDate, 'bookingTime' => $qvalue->bookingTime, 'addOn' => array(), 'fromDate' => '', 'toDate' => '', 'packName' => '', 'daysType' => '', 'dayWalks' => '', 'packItm' => array(), 'petIssue' => $qvalue->petIssue, 'serviceType' => $qvalue->serviceType, 'fromTime' => '', 'toTime' => '','walkBookingTime' =>  '','aboutIssue' => $qvalue->aboutIssue ) );
          }
        }else{
          $arrayName = array();
        }

      }else if ($data['serviceId'] == '6') {
        //- 6. Sitting
        $quotations = $this->quotations_model->getActiveSitting($data['clientId'],$data['petId']);
        if (count($quotations) > 0) {
          foreach ($quotations as $qkey => $qvalue) {

            $petDetails = $this->quotations_model->getPetsById($data['clientId'],$qvalue->petId);
            
            array_push($arrayName, array('bookingId' => $qvalue->id,'petName' => $petDetails[0]->name, 'hairCut'=> '', 'bookingDate' => '', 'bookingTime' => '', 'addOn' => array(), 'fromDate' => $qvalue->fromDate, 'toDate' => $qvalue->toDate, 'packName' => '', 'daysType' => $qvalue->daysType, 'dayWalks' => '', 'packItm' => array(), 'petIssue' => '', 'serviceType' => '', 'fromTime' => $qvalue->fromTime, 'toTime' => $qvalue->toTime,'walkBookingTime' =>  '','aboutIssue' => '' ) );
          }
        }else{
          $arrayName = array();
        }

      }

      echo json_encode($arrayName);
      

    }

  }

  public function deleteMyBooking(){
 
    $postdata = json_decode(file_get_contents("php://input"));
    
    if (is_object($postdata) && property_exists($postdata,'userId') && property_exists($postdata,'serviceId') && property_exists($postdata,'bookingId') ) {
      
      $arrayName = array();
      $data['clientId'] = $postdata->userId;
      $data['serviceId'] = $postdata->serviceId; 
      $data['bookingId'] = $postdata->bookingId;

      $status = false;

      if($data['serviceId'] == '1'){
        // Boarding
        $count = $this->quotations_model->checkquot($data);
        if (count($count) == '0') {
          $cldetails = $this->quotations_model->deleteBoarding($data['bookingId']);
          $status = true;
        }else{
          $status = false;
        }
        
      }else if ($data['serviceId'] == '2') {
        //- Grooming
        $count = $this->quotations_model->checkquot($data);
        if (count($count) == '0') {
          $cldetails = $this->quotations_model->deleteGrooming($data['bookingId']);
          $status = true;
        }else{
          $status = false;
        }        
        
      }else if ($data['serviceId'] == '3') {
        //- Training
        $count = $this->quotations_model->checkquot($data);
        if (count($count) == '0') {
          $cldetails = $this->quotations_model->deleteTrainig($data['bookingId']);
          $status = true;
        }else{
          $status = false;
        }        
        
      }else if ($data['serviceId'] == '4') {
        //- Walking
        $count = $this->quotations_model->checkquot($data);
        if (count($count) == '0') {
          $cldetails = $this->quotations_model->deleteWalking($data['bookingId']);
          $status = true;
        }else{
          $status = false;
        }         
        
      }else if ($data['serviceId'] == '5') {
        //- Vet @ Home
        $count = $this->quotations_model->checkquot($data);
        if (count($count) == '0') {
          $cldetails = $this->quotations_model->deleteVet($data['bookingId']);
          $status = true;
        }else{
          $status = false;
        }         
        
      }else if ($data['serviceId'] == '6') {
        //- Sitting
        $count = $this->quotations_model->checkquot($data);
        if (count($count) == '0') {
          $cldetails = $this->quotations_model->deleteSitting($data['bookingId']);
          $status = true;
        }else{
          $status = false;
        }    
        
      } 

      if ($status == true) {
        $arrayName = array('status' => "success" );
        echo json_encode($arrayName);
      }else{
        $arrayName = array('status' => "some thing went wrong" );
        echo json_encode($arrayName);
      }



    }


  }


  public function bookingDetails(){

    $postdata = json_decode(file_get_contents("php://input"));

    if (is_object($postdata) && property_exists($postdata,'userId') && property_exists($postdata,'spId') && property_exists($postdata,'bookingId') ) {
      
      $arrayName = array();
      $data['clientId'] = $postdata->userId;
      $data['spId'] = $postdata->spId; 
      $data['bookingId'] = $postdata->bookingId;

      $quoteData = $this->quotations_model->getquotationsById($data);

      if (count($quoteData) > 0) {
        # code...
        $spdetails = $this->sp_model->getSPDetails($quoteData[0]->spId);

        if ($quoteData[0]->serviceId == '1') {

          $quotations = $this->quotations_model->getBoardingDetailsById($quoteData[0]->bookingId);
          $packageDtl = $this->quotations_model->getPackages('9');    

          $avgRat = $this->quotations_model->getAvgReviews($quoteData[0]->spId);
          $jobsComple = $this->quotations_model->jobsCompleted($quoteData[0]->spId);

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId);

          $date1=date_create($quotations[0]->fromDate);
          $date2=date_create($quotations[0]->toDate);
          $diff=date_diff($date1,$date2);
          $diff= $diff->format("%a") + 1;  
          if(empty($quotations[0]->addOns)){
            $addOns=[];
          }else{
            $addOns=explode(',',$quotations[0]->addOns);
          }
          
          $arrayName = array('firstName' => $spdetails[0]->firstName,'lastName' => $spdetails[0]->lastName,'photo' => $spdetails[0]->photo, 'packItm' =>array(), 'addOn' =>$addOns, 'sessions' => $quoteData[0]->sessions, 'actualPrice' => $quoteData[0]->actualPrice, 'extraPrice' => $quoteData[0]->extraPrice, 'discount' => $quoteData[0]->discount, 'totalPrice' => $quoteData[0]->totalPrice, 'quotId' => $quoteData[0]->quotId, 'spId' => $quoteData[0]->spId, 'clientId' => $quoteData[0]->clientId, 'packname' => 'Boarding','bookingId'=>$quoteData[0]->bookingId, 'avgRat' => $this->parseFloat($avgRat[0]->rating), 'jobsComple' => $jobsComple, 'fromDate' => $quotations[0]->fromDate, 'toDate' => $quotations[0]->toDate,'noOfDays' => $diff);      

        
        }else if ($quoteData[0]->serviceId == '2') {
          
          $quotations = $this->quotations_model->getGroomingDetailsById($quoteData[0]->bookingId);
          $packageDtl = $this->quotations_model->getPackages($quotations[0]->packageId);
        
          $avgRat = $this->quotations_model->getAvgReviews($quoteData[0]->spId);
          $jobsComple = $this->quotations_model->jobsCompleted($quoteData[0]->spId);


          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId);
          $haircut=$quotations[0]->hair_cut;

          if(empty($quotations[0]->addOns)){
            $addOns=[];
          }else{

            $addOns=explode(',',$quotations[0]->addOns);
            if(!empty($haircut)){
            $addOns[]=$haircut;
              
            }

          }
           if(empty($packageDtl[0]->generalAddons)){
            $gaddons=[];
          }else{
            $gaddons=explode(',',$packageDtl[0]->generalAddons);
          }
          $arrayName = array('firstName' => $spdetails[0]->firstName,'lastName' => $spdetails[0]->lastName,'haircut'=>$quotations[0]->hair_cut,'photo' => $spdetails[0]->photo, 'packItm' => $gaddons, 'addOn' =>$addOns, 'sessions' => $quoteData[0]->sessions, 'actualPrice' => $quoteData[0]->actualPrice, 'extraPrice' => $quoteData[0]->extraPrice, 'discount' => $quoteData[0]->discount, 'totalPrice' => $quoteData[0]->totalPrice, 'quotId' => $quoteData[0]->quotId, 'spId' => $quoteData[0]->spId, 'clientId' => $quoteData[0]->clientId, 'packname' => $packageDtl[0]->name,'bookingId'=>$quoteData[0]->bookingId, 'avgRat' => $this->parseFloat($avgRat[0]->rating), 'jobsComple' => $jobsComple, 'bookingDate' => $quotations[0]->bookingDate, 'bookingTime' => $quotations[0]->bookingTime);
        
        }else if ($quoteData[0]->serviceId == '3') {
          
          $quotations = $this->quotations_model->getTrainigDetailsById($quoteData[0]->bookingId);
          $packageDtl = $this->quotations_model->getPackages($quotations[0]->packageId);

          $avgRat = $this->quotations_model->getAvgReviews($quoteData[0]->spId);
          $jobsComple = $this->quotations_model->jobsCompleted($quoteData[0]->spId);
          
          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId);
if(empty($quotations[0]->addOns)){
            $addOns=[];
          }else{
            $addOns=explode(',',$quotations[0]->addOns);
          }
            if(empty($packageDtl[0]->generalAddons)){
            $gaddons=[];
          }else{
            $gaddons=explode(',',$packageDtl[0]->generalAddons);
          }
          $arrayName = array('firstName' => $spdetails[0]->firstName,'lastName' => $spdetails[0]->lastName,'photo' => $spdetails[0]->photo, 'packItm' => $gaddons, 'addOn' => $addOns, 'sessions' => $quoteData[0]->sessions, 'actualPrice' => $quoteData[0]->actualPrice, 'extraPrice' => $quoteData[0]->extraPrice, 'discount' => $quoteData[0]->discount, 'totalPrice' => $quoteData[0]->totalPrice, 'quotId' => $quoteData[0]->quotId, 'spId' => $quoteData[0]->spId, 'clientId' => $quoteData[0]->clientId, 'packname' => $packageDtl[0]->name,'bookingId'=>$quoteData[0]->bookingId, 'avgRat' => $this->parseFloat($avgRat[0]->rating), 'jobsComple' => $jobsComple, 'spmorning' => $quoteData[0]->spmorning, 'spevening' => $quoteData[0]->spevening, 'spafternoon' => $quoteData[0]->spafternoon, 'bookingDate' => $quotations[0]->bookingDate );

        }else if ($quoteData[0]->serviceId == '4') {

          $quotations = $this->quotations_model->getWalkingDetailsById($quoteData[0]->bookingId);
          $packageDtl = $this->quotations_model->getPackages($quotations[0]->packageId);

          $avgRat = $this->quotations_model->getAvgReviews($quoteData[0]->spId);
          $jobsComple = $this->quotations_model->jobsCompleted($quoteData[0]->spId);

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId);

          $date1=date_create($quotations[0]->bookingDate);
          $date2=date_create($quotations[0]->toDay);
          $diff=date_diff($date1,$date2);
          $diff= $diff->format("%a") + 1;
     if(empty($packageDtl[0]->generalAddons)){
            $gaddons=[];
          }else{
            $gaddons=explode(',',$packageDtl[0]->generalAddons);
          }
          $arrayName = array('firstName' => $spdetails[0]->firstName,'lastName' => $spdetails[0]->lastName,'photo' => $spdetails[0]->photo, 'packItm' => $gaddons, 'addOn' => array(), 'sessions' => $quoteData[0]->sessions, 'actualPrice' => $quoteData[0]->actualPrice, 'extraPrice' => $quoteData[0]->extraPrice, 'discount' => $quoteData[0]->discount, 'totalPrice' => $quoteData[0]->totalPrice, 'quotId' => $quoteData[0]->quotId, 'spId' => $quoteData[0]->spId, 'clientId' => $quoteData[0]->clientId, 'packname' => $packageDtl[0]->name,'bookingId'=>$quoteData[0]->bookingId, 'avgRat' => $this->parseFloat($avgRat[0]->rating), 'jobsComple' => $jobsComple, 'spmorning' => $quoteData[0]->spmorning, 'spevening' => $quoteData[0]->spevening, 'spafternoon' => $quoteData[0]->spafternoon, 
          'fromData' => $quotations[0]->bookingDate, 'toDate' => $quotations[0]->toDay, 'noOfWalks' => $quotations[0]->noOfWalks,'noOfDays' => $diff);

        }else if ($quoteData[0]->serviceId == '5') {


          $quotations = $this->quotations_model->getVetDetailsById($quoteData[0]->bookingId);

          $avgRat = $this->quotations_model->getAvgReviews($quoteData[0]->spId);
          $jobsComple = $this->quotations_model->jobsCompleted($quoteData[0]->spId);

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId);
          
          $arrayName = array('firstName' => $spdetails[0]->firstName,'lastName' => $spdetails[0]->lastName,'photo' => $spdetails[0]->photo, 'packItm' => array(), 'addOn' => array(), 'sessions' => $quoteData[0]->sessions, 'actualPrice' => $quoteData[0]->actualPrice, 'extraPrice' => $quoteData[0]->extraPrice, 'discount' => $quoteData[0]->discount, 'totalPrice' => $quoteData[0]->totalPrice, 'quotId' => $quoteData[0]->quotId, 'spId' => $quoteData[0]->spId, 'clientId' => $quoteData[0]->clientId, 'packname' => 'Vet @ Home','bookingId'=>$quoteData[0]->bookingId, 'avgRat' => $this->parseFloat($avgRat[0]->rating), 'jobsComple' => $jobsComple);


        }else if ($quoteData[0]->serviceId == '6') {

          $quotations = $this->quotations_model->getSittingDetailsById($quoteData[0]->bookingId);

          $avgRat = $this->quotations_model->getAvgReviews($quoteData[0]->spId);
          $jobsComple = $this->quotations_model->jobsCompleted($quoteData[0]->spId);

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId);
          

          $arrayName = array('firstName' => $spdetails[0]->firstName,'lastName' => $spdetails[0]->lastName,'photo' => $spdetails[0]->photo, 'packItm' => array(), 'addOn' => array(), 'sessions' => $quoteData[0]->sessions, 'actualPrice' => $quoteData[0]->actualPrice, 'extraPrice' => $quoteData[0]->extraPrice, 'discount' => $quoteData[0]->discount, 'totalPrice' => $quoteData[0]->totalPrice, 'quotId' => $quoteData[0]->quotId, 'spId' => $quoteData[0]->spId, 'clientId' => $quoteData[0]->clientId, 'packname' => 'Sitting','bookingId'=>$quoteData[0]->bookingId, 'avgRat' => $this->parseFloat($avgRat[0]->rating), 'jobsComple' => $jobsComple);

        }

        

      }
      echo json_encode($arrayName);
      
    }


  }


  public function createPayment(){
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') && property_exists($postdata,'spId') && property_exists($postdata,'bookingId') && property_exists($postdata,'quotId') && property_exists($postdata,'isAdoons') ) {

      $ciId = $postdata->userId;
      $spId = $postdata->spId;
      $bookingId = $postdata->bookingId;
      $quotId = $postdata->quotId;
      $isAdoons = $postdata->isAdoons;

      $paySucc = site_url("payu-success");
      $payFail = site_url("payu-failure");

      $udf1 = $ciId; 
      $udf2 = $spId;
      $udf3 = $bookingId;
      $udf4 = $quotId;
      //- $udf5 gst

      $data['clientId'] = $ciId;
      $data['spId'] = $spId; 
      $data['bookingId'] = $quotId;
      $arrayName = array();
      $quoteData = $this->quotations_model->getquotationsById($data);

      if (count($quoteData) > 0) {
        $paytxnid = uniqid();

        if ($quoteData[0]->serviceId == '1') {

          $cost = (float)$quoteData[0]->actualPrice;
          if ($isAdoons == 'true') {
            $cost = $cost + (float)$quoteData[0]->extraPrice;
            $udf4 = $udf4."#".'true';
          }

          $totalPrice = $cost - ($cost * $quoteData[0]->discount / 100);

          //- Gst
          $gst = (( $totalPrice * 5 ) / 100);
          $gst = $this->parseFloat($gst);
          $totalPrice = $totalPrice + $gst;
          $totalPrice = $this->parseFloat($totalPrice);

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId); 
          $gst = (string)$gst;

          $text = payuKey.'|'.$paytxnid.'|'.$totalPrice.'|Boarding|'.$clinDtl[0]->name.'|'.$clinDtl[0]->email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$gst.'||||||'.payuSalt;
          $payHas = hash ("sha512", $text);               

          $arrayName = array('key' => payuKey, 'txnid' => $paytxnid, 'amount' => $totalPrice, 'productinfo' => 'Boarding','firstname' => $clinDtl[0]->name, 'email' => $clinDtl[0]->email, 'lastname' => '','hash' => $payHas, 'surl' => $paySucc, 'furl' => $payFail, 'udf1' => $udf1, 'udf2' => $udf2, 'udf3' => $udf3, 'udf4'=> $udf4, 'udf5'=> $gst);

        }else if ($quoteData[0]->serviceId == '2') {


          $quotations = $this->quotations_model->getGroomingDetailsById($bookingId);
          $packageDtl = $this->quotations_model->getPackages($quotations[0]->packageId);

          $cost = (float)$quoteData[0]->actualPrice;
          if ($isAdoons == 'true') {
            $cost = $cost + (float)$quoteData[0]->extraPrice;
            $udf4 = $udf4."#".'true';
          }

          $totalPrice = $cost - ($cost * $quoteData[0]->discount / 100);

          //- Gst
          $gst = (( $totalPrice * 5 ) / 100);
          $gst = $this->parseFloat($gst);
          $totalPrice = $totalPrice + $gst;
          $totalPrice = $this->parseFloat($totalPrice);

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId); 
          $gst = (string)$gst;

          $text = payuKey.'|'.$paytxnid.'|'.$totalPrice.'|'.$packageDtl[0]->name.'|'.$clinDtl[0]->name.'|'.$clinDtl[0]->email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$gst.'||||||'.payuSalt;
          $payHas = hash ("sha512", $text);               

          $arrayName = array('key' => payuKey, 'txnid' => $paytxnid, 'amount' => $totalPrice, 'productinfo' => $packageDtl[0]->name,'firstname' => $clinDtl[0]->name, 'email' => $clinDtl[0]->email, 'lastname' => '','hash' => $payHas, 'surl' => $paySucc, 'furl' => $payFail, 'udf1' => $udf1, 'udf2' => $udf2, 'udf3' => $udf3, 'udf4'=> $udf4, 'udf5'=> $gst);
        
        }else if ($quoteData[0]->serviceId == '3') {


          $quotations = $this->quotations_model->getTrainigDetailsById($bookingId);
          $packageDtl = $this->quotations_model->getPackages($quotations[0]->packageId);

          $cost = (float)$quoteData[0]->actualPrice;
          if ($isAdoons == 'true') {
            $cost = $cost + (float)$quoteData[0]->extraPrice;
          }

          $totalPrice = $cost - ($cost * $quoteData[0]->discount / 100);

          //- Gst
          $gst = (( $totalPrice * 5 ) / 100);
          $gst = $this->parseFloat($gst);
          $totalPrice = $totalPrice + $gst;
          $totalPrice = $this->parseFloat($totalPrice);

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId);
          $gst = (string)$gst;

          $text = payuKey.'|'.$paytxnid.'|'.$totalPrice.'|'.$packageDtl[0]->name.'|'.$clinDtl[0]->name.'|'.$clinDtl[0]->email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$gst.'||||||'.payuSalt;
          $payHas = hash ("sha512", $text);               

          $arrayName = array('key' => payuKey, 'txnid' => $paytxnid, 'amount' => $totalPrice, 'productinfo' => $packageDtl[0]->name,'firstname' => $clinDtl[0]->name, 'email' => $clinDtl[0]->email, 'lastname' => '','hash' => $payHas, 'surl' => $paySucc, 'furl' => $payFail, 'udf1' => $udf1, 'udf2' => $udf2, 'udf3' => $udf3, 'udf4'=> $udf4, 'udf5'=> $gst);

        }else if ($quoteData[0]->serviceId == '4') {

          $quotations = $this->quotations_model->getWalkingDetailsById($bookingId);
          $packageDtl = $this->quotations_model->getPackages($quotations[0]->packageId);

          /*
          $cost = (float)$quoteData[0]->totalPrice;
          if ($isAdoons == 'true') {
            $cost = $cost + (float)$quoteData[0]->extraPrice;
          }*/

          $totalPrice = $quoteData[0]->totalPrice;

          //- Gst
          $gst = (( $totalPrice * 5 ) / 100);
          $gst = $this->parseFloat($gst);
          $totalPrice = $totalPrice + $gst;
          $totalPrice = $this->parseFloat($totalPrice);
          $gst = (string)$gst;

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId); 

          $text = payuKey.'|'.$paytxnid.'|'.$totalPrice.'|'.$packageDtl[0]->name.'|'.$clinDtl[0]->name.'|'.$clinDtl[0]->email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$gst.'||||||'.payuSalt;
          $payHas = hash ("sha512", $text);               

          $arrayName = array('key' => payuKey, 'txnid' => $paytxnid, 'amount' => $totalPrice, 'productinfo' => $packageDtl[0]->name,'firstname' => $clinDtl[0]->name, 'email' => $clinDtl[0]->email, 'lastname' => '','hash' => $payHas, 'surl' => $paySucc, 'furl' => $payFail, 'udf1' => $udf1, 'udf2' => $udf2, 'udf3' => $udf3, 'udf4'=> $udf4, 'udf5'=> $gst);        

        }else if ($quoteData[0]->serviceId == '5') {

          $quotations = $this->quotations_model->getGroomingDetailsById($bookingId);
          
          $cost = (float)$quoteData[0]->actualPrice;
          if ($isAdoons == 'true') {
            $cost = $cost + (float)$quoteData[0]->extraPrice;
          }

          $totalPrice = $cost - ($cost * $quoteData[0]->discount / 100);

          //- Gst
          $gst = (( $totalPrice * 5 ) / 100);
          $gst = $this->parseFloat($gst);
          $totalPrice = $totalPrice + $gst;
          $totalPrice = $this->parseFloat($totalPrice);
          $gst = (string)$gst;

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId); 

          $text = payuKey.'|'.$paytxnid.'|'.$totalPrice.'|Vet Home|'.$clinDtl[0]->name.'|'.$clinDtl[0]->email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$gst.'||||||'.payuSalt;
          $payHas = hash ("sha512", $text);               

          $arrayName = array('key' => payuKey, 'txnid' => $paytxnid, 'amount' => $totalPrice, 'productinfo' => 'Vet Home','firstname' => $clinDtl[0]->name, 'email' => $clinDtl[0]->email, 'lastname' => '','hash' => $payHas, 'surl' => $paySucc, 'furl' => $payFail, 'udf1' => $udf1, 'udf2' => $udf2, 'udf3' => $udf3, 'udf4'=> $udf4, 'udf5'=> $gst);

        }else if ($quoteData[0]->serviceId == '6') {

          $quotations = $this->quotations_model->getGroomingDetailsById($bookingId);
          
          $cost = (float)$quoteData[0]->actualPrice;
          if ($isAdoons == 'true') {
            $cost = $cost + (float)$quoteData[0]->extraPrice;
          }

          $totalPrice = $cost - ($cost * $quoteData[0]->discount / 100);

          //- Gst
          $gst = (( $totalPrice * 5 ) / 100);
          $gst = $this->parseFloat($gst);
          $totalPrice = $totalPrice + $gst;
          $totalPrice = $this->parseFloat($totalPrice);
          $gst = (string)$gst;

          $clinDtl = $this->sp_model->getCIDetails($quoteData[0]->clientId); 

          $text = payuKey.'|'.$paytxnid.'|'.$totalPrice.'|Sitting|'.$clinDtl[0]->name.'|'.$clinDtl[0]->email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$gst.'||||||'.payuSalt;
          $payHas = hash ("sha512", $text);               

          $arrayName = array('key' => payuKey, 'txnid' => $paytxnid, 'amount' => $totalPrice, 'productinfo' => 'Sitting','firstname' => $clinDtl[0]->name, 'email' => $clinDtl[0]->email, 'lastname' => '','hash' => $payHas, 'surl' => $paySucc, 'furl' => $payFail, 'udf1' => $udf1, 'udf2' => $udf2, 'udf3' => $udf3, 'udf4'=> $udf4, 'udf5'=> $gst);
        
        }

      }
      echo json_encode($arrayName);

    }

  }


  public function payuSuccess(){

    if (isset($_POST['status']) && $_POST['status'] == 'success') {
    
      $data['trans_id'] = $_POST['mihpayid'];
      $data['cart_id'] = $_POST['txnid'];
      $data['amount'] = $_POST['amount'];
      $data['user_id'] = $_POST['udf1'];
      $data['sp_id'] = $_POST['udf2'];
      $data['booking_id'] = $_POST['udf3'];
      $data['payu_key'] = $_POST['key'];
      $data['hash'] = $_POST['hash'];      
      $data['bank_ref_num'] = $_POST['bank_ref_num'];

      $udf4 = $_POST['udf4'];
      $udf4 = explode("#",$udf4);
      if (count($udf4) == 2) {
        $data['quot_Id'] = $udf4[0];
        $data['isAddons'] = 1;
      }else{
        $data['quot_Id'] = $udf4[0];
        $data['isAddons'] = 0;
      }
      $data['gst'] = $_POST['udf5'];

      $spAmount = (float)$_POST['amount'] - (float)$_POST['udf5'];
      $spAmount = $this->parseFloat($spAmount);

      //- Gst
      $spFee = (( (float)$spAmount * 10 ) / 100);
      $spFee = $this->parseFloat($spFee);
      $data['spFee'] = $spFee;

      $netAmount = (float)$_POST['amount'] - ((float)$_POST['udf5'] + $spFee);
      $data['netAmount'] = $this->parseFloat($netAmount);

      //- Create a transaction
      $newtran = $this->quotations_model->checkTransa($_POST['mihpayid']);

      if (count($newtran) == 0) {

        $this->quotations_model->createTransa($data);

        //- Update Wallet Amount
        $ciDetails = $this->sp_model->getCIDetails($data['user_id']);
        $camount = (float)$_POST['amount'] - (float)$_POST['udf5'];
        $camount = $this->parseFloat($camount);
        
        $amount = (float)$ciDetails[0]->wallAmount + (float)$camount;
        $amount = $this->parseFloat($amount);
        $this->sp_model->updateCIWalletAmount($data['user_id'],$amount);

        //- Update 
        $this->quotations_model->updateQuotStatus($data['quot_Id']);


        $quotdata['clientId'] = $data['user_id'];
        $quotdata['spId'] = $data['sp_id']; 
        $quotdata['bookingId'] = $data['quot_Id'];
        $quoteData = $this->quotations_model->getquotationsById($quotdata);


        //- Update Booking
        if ($quoteData[0]->serviceId == '1') {
          $this->quotations_model->updateBoardingStatus($quoteData[0]->bookingId);
          $this->quotations_model->quotAmount($data['quot_Id'],$spAmount,$_POST['udf5'],$data['isAddons']);

          $ciDetail = $this->sp_model->getCIDetails($quotdata['clientId']);

          $dogDetai = $this->quotations_model->getPetsById($quoteData[0]->clientId, $quoteData[0]->petId);

          $disc = 'Booking confirmed for Boarding '.$dogDetai[0]->name.' from '.$ciDetail[0]->name.' for Rs '.$spAmount.'/-';  
          $data['title'] = 'Booking Service confirmed';
          $data['desc'] = $disc;
          $data['senderId'] = $quotdata['clientId'];
          $data['reseveId'] = $quotdata['spId'];
          $data['searchTrm'] = 'sp';
          $data['client_id'] = $quotdata['clientId'];
          $data['sp_id'] = $quotdata['spId'];
          $data['booking_id'] = $quoteData[0]->bookingId;
          $data['quotation_id'] = $quotdata['bookingId'];
          $this->quotations_model->createNotif($data);
          $this->sp_model->updateSpNotifi($quotdata['spId']);
         
        }else if ($quoteData[0]->serviceId == '2') {
          $this->quotations_model->updateGroomingStatus($quoteData[0]->bookingId);
          $this->quotations_model->quotAmount($data['quot_Id'],$spAmount,$_POST['udf5'],$data['isAddons']);


          $ciDetail = $this->sp_model->getCIDetails($quotdata['clientId']);


          $dogDetai = $this->quotations_model->getPetsById($quoteData[0]->clientId, $quoteData[0]->petId);

          $disc = 'Booking confirmed for Grooming '.$dogDetai[0]->name.' from '.$ciDetail[0]->name.' for Rs '.$spAmount.'/-'; 
          $data['title'] = 'Grooming Service confirmed';
          $data['desc'] = $disc;
          $data['senderId'] = $quotdata['clientId'];
          $data['reseveId'] = $quotdata['spId'];
          $data['searchTrm'] = 'sp';
          $data['client_id'] = $quotdata['clientId'];
          $data['sp_id'] = $quotdata['spId'];
          $data['booking_id'] = $quoteData[0]->bookingId;
          $data['quotation_id'] = $quotdata['bookingId'];
          $this->quotations_model->createNotif($data);
          $this->sp_model->updateSpNotifi($quotdata['spId']);

        }else if ($quoteData[0]->serviceId == '3') {
          $this->quotations_model->updateTrainigStatus($quoteData[0]->bookingId);
          $this->quotations_model->quotAmount($data['quot_Id'],$spAmount,$_POST['udf5'],$data['isAddons']);


          $ciDetail = $this->sp_model->getCIDetails($quotdata['clientId']);

          $dogDetai = $this->quotations_model->getPetsById($quoteData[0]->clientId, $quoteData[0]->petId);        

          $disc = 'Booking confirmed for Training '.$dogDetai[0]->name.' from '.$ciDetail[0]->name.' for Rs '.$spAmount.'/-'; 
          $data['title'] = 'Training Service confirmed';
          $data['desc'] = $disc;
          $data['senderId'] = $quotdata['clientId'];
          $data['reseveId'] = $quotdata['spId'];
          $data['searchTrm'] = 'sp';
          $data['client_id'] = $quotdata['clientId'];
          $data['sp_id'] = $quotdata['spId'];
          $data['booking_id'] = $quoteData[0]->bookingId;
          $data['quotation_id'] = $quotdata['bookingId'];
          $this->quotations_model->createNotif($data);
          $this->sp_model->updateSpNotifi($quotdata['spId']);

        }else if ($quoteData[0]->serviceId == '4') {
          $this->quotations_model->updateWalkingStatus($quoteData[0]->bookingId);
          $this->quotations_model->quotAmount($data['quot_Id'],$spAmount,$_POST['udf5'],$data['isAddons']);

          $ciDetail = $this->sp_model->getCIDetails($quotdata['clientId']);
          
          $dogDetai = $this->quotations_model->getPetsById($quoteData[0]->clientId, $quoteData[0]->petId);

          $disc = 'Booking confirmed for Walking '.$dogDetai[0]->name.' from '.$ciDetail[0]->name.' for Rs '.$spAmount.'/-'; 
          $data['title'] = 'Walking Service confirmed';
          $data['desc'] = $disc;
          $data['senderId'] = $quotdata['clientId'];
          $data['reseveId'] = $quotdata['spId'];
          $data['searchTrm'] = 'sp';
          $data['client_id'] = $quotdata['clientId'];
          $data['sp_id'] = $quotdata['spId'];
          $data['booking_id'] = $quoteData[0]->bookingId;
          $data['quotation_id'] = $quotdata['bookingId'];
          $this->quotations_model->createNotif($data);
          $this->sp_model->updateSpNotifi($quotdata['spId']);

        }else if ($quoteData[0]->serviceId == '5') {
          $this->quotations_model->updateVetStatus($quoteData[0]->bookingId);
          $this->quotations_model->quotAmount($data['quot_Id'],$spAmount,$_POST['udf5'],$data['isAddons']);
        }else if ($quoteData[0]->serviceId == '6') {
          $this->quotations_model->updateSittingStatus($quoteData[0]->bookingId);
          $this->quotations_model->quotAmount($data['quot_Id'],$spAmount,$_POST['udf5'],$data['isAddons']);
        }

        $client = gezClient();
        
        $userDevices = $this->quotations_model->checkSpNotifi($quotdata['spId']);
        if (count($userDevices) > 0) {
          foreach ($userDevices as $udkey => $udvalue) {

            $notifi = array("title" => "Petsfolio", "body" => $disc, "sound" => "default");
            $tmpBody = array('notification' => $notifi, 'to' => $udvalue->devToken);
            $tmpBody = json_encode($tmpBody);

            $arrayHead = array('Content-Type' =>  'application/json', 'Authorization' => 'key=AAAAqzOPiBU:APA91bFYaLxhUo4iIUnXyNfRRI6EJxKiWKcxbeZyzWwzwdrujLK_Mb7ASgHeOoFU0QgvpfIf16ZYjvyVD6mQJIsMmRk95GrtxpfmylsbkvbusHmqXL2-qcGqDdR6DiTLri_WE6nYE1fO' );
            $headers = array('headers' => $arrayHead, 'body' => $tmpBody);

            $response = $client->post('https://fcm.googleapis.com/fcm/send', $headers);
          }
        }

      }

      $this->load->view('payuSuccess');

    }else{

    }

  }


  public function payuFailure(){
    $this->load->view('payuFailure');
  }


  public function getClientBookings(){

    $postdata = json_decode(file_get_contents("php://input"));

    if (is_object($postdata) && property_exists($postdata,'userId')  ) {

      $userId = $postdata->userId;

      if (property_exists($postdata,'petId')) {
        $petId = $postdata->petId;
      }else{
        $petId = '';
      }


      $array = array();
      
      //- Boarding
      $bordbookings = $this->quotations_model->getBoardingBookings($userId, $petId);
      if (count($bordbookings) > 0) {
        foreach ($bordbookings as $bkey => $bvalue) {
          $data['userId'] = $userId;
          $data['bookingId'] = $bvalue->id; 
          $data['serviceId'] = '1';

          $quot = $this->quotations_model->getBookedQuotationsById($data);
        
          $spDetails = $this->sp_model->getSPDetails($quot[0]->spId);
          $avgRat = $this->quotations_model->getAvgReviews($quot[0]->spId);

          array_push($array, array('name' => 'Boarding', 'bookingId' => $bvalue->id, 'serviceId' => '1', 'spPhoto' => $spDetails[0]->photo, 'spId' => intval($quot[0]->spId), 'spName' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'spCity' => $spDetails[0]->city, 'spAvRating' => $this->parseFloat($avgRat[0]->rating), 'packageCost' => $quot[0]->amountPaid, 'pnpVerified' => $spDetails[0]->pnpVerified));


        }
      }

      //- Grooming
      $groombookings = $this->quotations_model->getGroomingBookings($userId, $petId);
      if (count($groombookings) > 0) {
        foreach ($groombookings as $gkey => $gvalue) {

          $data['userId'] = $userId;
          $data['bookingId'] = $gvalue->id; 
          $data['serviceId'] = '2';

          $quot = $this->quotations_model->getBookedQuotationsById($data);
          $spDetails = $this->sp_model->getSPDetails($quot[0]->spId);
          $avgRat = $this->quotations_model->getAvgReviews($quot[0]->spId);



          array_push($array, array('name' => 'Grooming', 'bookingId' => $gvalue->id, 'serviceId' => '2', 'spPhoto' => $spDetails[0]->photo, 'spId' => intval($quot[0]->spId), 'spName' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'spCity' => $spDetails[0]->city, 'spAvRating' => $this->parseFloat($avgRat[0]->rating), 'packageCost' => $quot[0]->amountPaid, 'pnpVerified' => $spDetails[0]->pnpVerified));
        }
      }

      //- Training
      $trainbookings = $this->quotations_model->getTrainingBookings($userId, $petId);
      if (count($trainbookings) > 0) {
        foreach ($trainbookings as $tkey => $tvalue) {

          $data['userId'] = $userId;
          $data['bookingId'] = $tvalue->id; 
          $data['serviceId'] = '3';

          $quot = $this->quotations_model->getBookedQuotationsById($data);
          $spDetails = $this->sp_model->getSPDetails($quot[0]->spId);
          $avgRat = $this->quotations_model->getAvgReviews($quot[0]->spId);


          array_push($array, array('name' => 'Training', 'bookingId' => $tvalue->id, 'serviceId' => '3', 'spPhoto' => $spDetails[0]->photo, 'spId' => intval($quot[0]->spId), 'spName' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'spCity' => $spDetails[0]->city, 'spAvRating' => $this->parseFloat($avgRat[0]->rating), 'packageCost' => $quot[0]->amountPaid, 'pnpVerified' => $spDetails[0]->pnpVerified));
        }
      }

      //- Walking
      $walkgbookings = $this->quotations_model->getWalkingBookings($userId, $petId);
      if (count($walkgbookings) > 0) {
        foreach ($walkgbookings as $wakey => $wavalue) {

          $data['userId'] = $userId;
          $data['bookingId'] = $wavalue->id; 
          $data['serviceId'] = '4';

          $quot = $this->quotations_model->getBookedQuotationsById($data);
          $spDetails = $this->sp_model->getSPDetails($quot[0]->spId);
          $avgRat = $this->quotations_model->getAvgReviews($quot[0]->spId);


          array_push($array, array('name' => 'Walking', 'bookingId' => $wavalue->id, 'serviceId' => '4', 'spPhoto' => $spDetails[0]->photo, 'spId' => intval($quot[0]->spId), 'spName' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'spCity' => $spDetails[0]->city, 'spAvRating' => $this->parseFloat($avgRat[0]->rating), 'packageCost' => $quot[0]->amountPaid, 'pnpVerified' => $spDetails[0]->pnpVerified));
        }
      }
      //- Vet @ Home
      $vetbookings = $this->quotations_model->getVetBookings($userId, $petId);
      if (count($vetbookings) > 0) {
        foreach ($vetbookings as $vetkey => $vetvalue) {
          array_push($array, array('name' => 'Vet @ Home', 'bookingId' => $vetvalue->id, 'serviceId' => '5'));
        }
      }

      //- Sitting
      $sitbookings = $this->quotations_model->getSittingBookings($userId, $petId);
      if (count($sitbookings) > 0) {
        foreach ($sitbookings as $setkey => $setvalue) {
          array_push($array, array('name' => 'Sitting', 'bookingId' => $setvalue->id, 'serviceId' => '6'));
        }
      }

      echo json_encode($array);


    }
    
  }

  private function ageCalculator($dob){
    $age = 0;
    $birthdate = new DateTime($dob);
    $today   = new DateTime('today');
    $mon = $birthdate->diff($today)->m;
    if ($mon > '12') {
      $age = $birthdate->diff($today)->y.$birthdate->diff($today)->m.' Years';
    }else{
      $age = $mon.' Month';
    }
    return $age;
  }


  public function getClientBookingDetails(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') && property_exists($postdata,'bookingId') && property_exists($postdata,'serviceId') ) {

      $data['userId'] =  $postdata->userId;
      $data['bookingId'] =  $postdata->bookingId;
      $data['serviceId'] =  $postdata->serviceId;

      if ($postdata->serviceId == '1') {

        //- Boarding
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);

        $spDetails = $this->quotations_model->getSPDetails($quotDetail[0]->spId);

        $sp_device_token=$this->quotations_model->get_sp_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getBoardingDetailsById($data['bookingId']);
        $packageName = $this->quotations_model->getPackages('9');
        
        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->userId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();

        $addon = array();
        if ($quotDetail[0]->addOn == '1') {
          $addon = explode(',',$reqDetails[0]->addOns);
        }


        $details = array('packName' => $packageName[0]->name, 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions, 'spDetails' => $spDetails[0]->fname.' '.$spDetails[0]->lname, 'spnumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->fromDate, 'brackDown' => $brackDown, 'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'serviceId' => $quotDetail[0]->serviceId, 'bookingTime' => '', 'toDate' => $reqDetails[0]->toDate,'genAddon' => [] ,'addons' => $addon, 'spmorning' => '', 'spevening' => '', 'spafternoon' => '', 'spPhoto' => $spDetails[0]->photo ,'device_token'=>$sp_device_token[0]->device_token);

      }else if ($postdata->serviceId == '2') {

        //- Grooming dinesh
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
        $spDetails = $this->quotations_model->getSPDetails($quotDetail[0]->spId);
        $sp_device_token=$this->quotations_model->get_sp_dtokens($spDetails[0]->id);
        
        $reqDetails = $this->quotations_model->getGroomingDetailsById($data['bookingId']);
        $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);


        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->userId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();
        $addon = array();


        if ($quotDetail[0]->addOn == '1') {
          $addon = explode(',', $reqDetails[0]->addOns);
          $haircut = $reqDetails[0]->hair_cut;
          if(!empty($haircut)){
            $addon[] = $haircut;
          }
        }



      $details = array('packName' => $packageName[0]->name, 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions, 'spDetails' => $spDetails[0]->fname.' '.$spDetails[0]->lname, 'spnumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'brackDown' => $brackDown, 'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'serviceId' => $quotDetail[0]->serviceId, 'bookingTime' => $reqDetails[0]->bookingTime, 'toDate' => '','genAddon' => explode(',',$packageName[0]->generalAddons) , 'addons' => $addon, 'spmorning' => '', 'spevening' => '', 'spafternoon' => '', 'spPhoto' => $spDetails[0]->photo,'device_token'=>$sp_device_token[0]->device_token );

      }else if ($postdata->serviceId == '3') {
        //- Trainig
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);

        $spDetails = $this->quotations_model->getSPDetails($quotDetail[0]->spId);
        var_dump($spDetails);
        $sp_device_token=$this->quotations_model->get_sp_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getTrainigDetailsById($data['bookingId']);
        $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->userId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);

        $trainBracks = $this->quotations_model->trainCiBreakDowns($data['bookingId'],$quotDetail[0]->quotId);
        $brackDown = array();
        if (count($trainBracks) > 0) {
          foreach ($trainBracks as $tbkey => $tbvalue) {
          
            array_push($brackDown, array('id' => $tbvalue->id, 'sessions' => $tbvalue->sessions, 'amount' => $tbvalue->amount, "status" => $tbvalue->status, "dateCreate" => gmdate("Y-m-d", strtotime($tbvalue->dateCreate)) ));



          }
        }

        $addon = array();
        if ($quotDetail[0]->addOn == '1') {
          $addon = explode(',',$reqDetails[0]->extraAddons);
        }


        $details = array('packName' => $packageName[0]->name, 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions, 'spDetails' => $spDetails[0]->fname.' '.$spDetails[0]->lname, 'spnumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'brackDown' => $brackDown, 'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'serviceId' => $quotDetail[0]->serviceId, "bookingTime" => $reqDetails[0]->bookTime, 'toDate' => '', 'genAddon' => explode(',',$packageName[0]->generalAddons) ,'addons' => $addon, 'spmorning' => '', 'spevening' => '', 'spafternoon' => '', 'spPhoto' => $spDetails[0]->photo,'device_token'=>$sp_device_token[0]->device_token);   

      }else if ($postdata->serviceId == '4') {
        //- Walking
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
        $spDetails = $this->quotations_model->getSPDetails($quotDetail[0]->spId);
        $sp_device_token=$this->quotations_model->get_sp_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getWalkingDetailsById($data['bookingId']);
        $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->userId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();

        $details = array('packName' => $packageName[0]->name, 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions, 'spDetails' => $spDetails[0]->fname.' '.$spDetails[0]->lname, 'spnumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'brackDown' => $brackDown, 'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'serviceId' => $quotDetail[0]->serviceId,"bookingTime" => '', 'toDate' => $reqDetails[0]->toDay, 'genAddon' => explode(',',$packageName[0]->generalAddons) ,'addons' => array(), 'spmorning' => $quotDetail[0]->spmorning, 'spevening' => $quotDetail[0]->spevening, 'spafternoon' => $quotDetail[0]->spafternoon, 'spPhoto' => $spDetails[0]->photo,'device_token'=>$sp_device_token[0]->device_token );

      }else if ($postdata->serviceId == '5') {
        //- Vet
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
        $spDetails = $this->quotations_model->getSPDetails($quotDetail[0]->spId);
        $sp_device_token=$this->quotations_model->get_sp_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getVetDetailsById($data['bookingId']);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->userId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();

        $details = array('packName' => 'Vet @ Home', 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions, 'spDetails' => $spDetails[0]->fname.' '.$spDetails[0]->lname, 'spnumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'brackDown' => $brackDown, 'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'serviceId' => $quotDetail[0]->serviceId,"bookingTime" => '', 'toDate' => '', 'addons' => array(), 'spmorning' => '', 'spevening' => '', 'spafternoon' => '','device_token'=>$sp_device_token[0]->device_token); 

      }else if ($postdata->serviceId == '6') {
        //- Sitting
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
        $spDetails = $this->quotations_model->getSPDetails($quotDetail[0]->spId);
        $sp_device_token=$this->quotations_model->get_sp_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getSittingDetailsById($data['bookingId']);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->userId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();

        $details = array('packName' => 'Sitting', 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions, 'spDetails' => $spDetails[0]->fname.' '.$spDetails[0]->lname, 'spnumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'brackDown' => $brackDown, 'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'serviceId' => $quotDetail[0]->serviceId,"bookingTime" => '', 'toDate' => '', 'addons' => array(), 'spmorning' => '', 'spevening' => '', 'spafternoon' => '','device_token'=>$sp_device_token[0]->device_token);
      }

      echo json_encode($details);

    }

  }


  public function getSPBookings(){
    $postdata = json_decode(file_get_contents("php://input"));

    if (is_object($postdata) && property_exists($postdata,'userId') && property_exists($postdata,'serviceId') ) {

      $data['userId'] = $postdata->userId;
      $data['serviceId'] = $postdata->serviceId; 

      $array = array();
      $bookings = $this->quotations_model->getSPBookById($data);

      if (count($bookings) > 0) {
        foreach ($bookings as $bkey => $bvalue) {
          
          $clientDet = $this->sp_model->getCIDetails($bvalue->clientId);
          if ($bvalue->serviceId == '1') {
            //- 1. Boarding
            $reqDetails = $this->quotations_model->getBoardingDetailsById($bvalue->bookingId);

            $packageName = $this->quotations_model->getPackages('9');

            $petDetails = $this->quotations_model->getPetsById($bvalue->clientId,$reqDetails[0]->petId);

            $spDetails = $this->sp_model->getSPDetails($bvalue->spId);

            $distance = distance($reqDetails[0]->latitude, $reqDetails[0]->longitude, $spDetails[0]->latitude, $spDetails[0]->longitude, "K");


            array_push($array, array('buyername' => $clientDet[0]->name, 'packName' => $packageName[0]->name, 'petName' => $petDetails[0]->name, 'clientId' => $bvalue->clientId, 'bookingId' => $bvalue->bookingId, 'serviceId' => $bvalue->serviceId, 'distence' => $distance.'KM','profilePic'=>$clientDet[0]->profilePic) );

          }else if ($bvalue->serviceId == '2') {
            //- Grooming
            $reqDetails = $this->quotations_model->getGroomingDetailsById($bvalue->bookingId);
            $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);

            $petDetails = $this->quotations_model->getPetsById($bvalue->clientId,$reqDetails[0]->petId);

            $spDetails = $this->sp_model->getSPDetails($bvalue->spId);
            $distance = distance($reqDetails[0]->latitude, $reqDetails[0]->longitude, $spDetails[0]->latitude, $spDetails[0]->longitude, "K");            

            array_push($array, array('buyername' => $clientDet[0]->name, 'packName' => $packageName[0]->name, 'petName' => $petDetails[0]->name, 'clientId' => $bvalue->clientId, 'bookingId' => $bvalue->bookingId, 'serviceId' => $bvalue->serviceId, 'distence' => $distance.'KM','profilePic'=>$clientDet[0]->profilePic) );

          }else if ($bvalue->serviceId == '3') {
            //- Trainig
            $reqDetails = $this->quotations_model->getTrainigDetailsById($bvalue->bookingId);
            $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);

            $petDetails = $this->quotations_model->getPetsById($bvalue->clientId,$reqDetails[0]->petId);

            $spDetails = $this->sp_model->getSPDetails($bvalue->spId);
            $distance = distance($reqDetails[0]->latitude, $reqDetails[0]->longitude, $spDetails[0]->latitude, $spDetails[0]->longitude, "K");

            array_push($array, array('buyername' => $clientDet[0]->name, 'packName' => $packageName[0]->name, 'petName' => $petDetails[0]->name, 'clientId' => $bvalue->clientId, 'bookingId' => $bvalue->bookingId, 'serviceId' => $bvalue->serviceId, 'distence' => $distance.'KM','profilePic'=>$clientDet[0]->profilePic) );

          }else if ($bvalue->serviceId == '4') {
            //- Walking
            $reqDetails = $this->quotations_model->getWalkingDetailsById($bvalue->bookingId);
            $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);

            $petDetails = $this->quotations_model->getPetsById($bvalue->clientId,$reqDetails[0]->petId);

            $spDetails = $this->sp_model->getSPDetails($bvalue->spId);
            $distance = distance($reqDetails[0]->latitude, $reqDetails[0]->longitude, $spDetails[0]->latitude, $spDetails[0]->longitude, "K");

            array_push($array, array('buyername' => $clientDet[0]->name, 'packName' => $packageName[0]->name, 'petName' => $petDetails[0]->name, 'clientId' => $bvalue->clientId, 'bookingId' => $bvalue->bookingId, 'serviceId' => $bvalue->serviceId, 'distence' => $distance.'KM','profilePic'=>$clientDet[0]->profilePic) );

          }else if ($bvalue->serviceId == '5') {
            //- Vet
            $reqDetails = $this->quotations_model->getVetDetailsById($bvalue->bookingId);
            $petDetails = $this->quotations_model->getPetsById($bvalue->clientId,$reqDetails[0]->petId);

            array_push($array, array('buyername' => $clientDet[0]->name, 'packName' => 'Vet @ Home', 'petName' => $petDetails[0]->name, 'clientId' => $bvalue->clientId, 'bookingId' => $bvalue->bookingId, 'serviceId' => $bvalue->serviceId, 'distence' => '10 km','profilePic'=>$clientDet[0]->profilePic) );

          }else if ($bvalue->serviceId == '6') {
            //- Sitting
            $reqDetails = $this->quotations_model->getSittingDetailsById($bvalue->bookingId);
            $petDetails = $this->quotations_model->getPetsById($bvalue->clientId,$reqDetails[0]->petId);

            array_push($array, array('buyername' => $clientDet[0]->name, 'packName' => 'Sitting', 'petName' => $petDetails[0]->name, 'clientId' => $bvalue->clientId, 'bookingId' => $bvalue->bookingId, 'serviceId' => $bvalue->serviceId, 'distence' => '10 km','profilePic'=>$clientDet[0]->profilePic) );
          }

        }
      }

      echo json_encode($array);

    }

  }

  public function getSPBookingDetails(){

    $postdata = json_decode(file_get_contents("php://input"));

    if (is_object($postdata) && property_exists($postdata,'clientId') && property_exists($postdata,'bookingId') && property_exists($postdata,'serviceId') ) {

      $data['userId'] =  $postdata->clientId;
      $data['bookingId'] =  $postdata->bookingId;
      $data['serviceId'] =  $postdata->serviceId;
      $details =  array();
      if ($postdata->serviceId == '1') {

        //- Boarding
        
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
        $spDetails = $this->sp_model->getCIDetails($quotDetail[0]->clientId);
        $ci_device_token=$this->quotations_model->get_ci_dtokens($spDetails[0]->id);
        $reqDetails = $this->quotations_model->getBoardingDetailsById($data['bookingId']);
        $packageName = $this->quotations_model->getPackages('9');

        
        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->clientId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);

        $brackDown = array();

        $tmpAddons = array();
        if ($quotDetail[0]->addOn == '1') {
          $tmpAddons = explode(',',$reqDetails[0]->addOns);
        }

        $details = array('packName' => $packageName[0]->name,'haircut'=>'', 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions, 'ciDetails' => $spDetails[0]->name, 'cinumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->fromDate, 'long' => $reqDetails[0]->longitude,  'lat' => $reqDetails[0]->latitude,'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'serviceId' => $postdata->serviceId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'brackDown' => $brackDown, 'genAddon' => [] , 'addons' => $tmpAddons, 'bookingTime' => '', 'toDate' => $reqDetails[0]->toDate, 'spmorning' => '', 'spevening' => '', 'spafternoon' => '','device_token'=>$ci_device_token[0]->device_token);
 
      }else if ($postdata->serviceId == '2') {
        //- Grooming
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);

        $spDetails = $this->sp_model->getCIDetails($quotDetail[0]->clientId);
        $ci_device_token=$this->quotations_model->get_ci_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getGroomingDetailsById($data['bookingId']);

        $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->clientId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();

        $tmpAddons = array();
        if ($quotDetail[0]->addOn == '1') {
          $tmpAddons = explode(',',$reqDetails[0]->addOns);
        }        

        $details = array('packName' => $packageName[0]->name, 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name,'haircut'=>$reqDetails[0]->hair_cut, 'session' => $quotDetail[0]->sessions, 'ciDetails' => $spDetails[0]->name, 'cinumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'long' => $reqDetails[0]->longitude,  'lat' => $reqDetails[0]->latitude,'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'serviceId' => $postdata->serviceId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'brackDown' => $brackDown, 'genAddon' => explode(',',$packageName[0]->generalAddons) , 'addons' => $tmpAddons, 'bookingTime' => $reqDetails[0]->bookingTime, 'toDate' => '', 'spmorning' => '', 'spevening' => '', 'spafternoon' => '','device_token'=>$ci_device_token[0]->device_token);

      }else if ($postdata->serviceId == '3') {
        //- Trainig
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
       
        $spDetails = $this->sp_model->getCIDetails($quotDetail[0]->clientId);

        $ci_device_token=$this->quotations_model->get_ci_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getTrainigDetailsById($data['bookingId']);
        $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->clientId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);

        $trainBracks = $this->quotations_model->trainBreakDowns($data['bookingId'],$quotDetail[0]->quotId);
        $brackDown = array();
        if (count($trainBracks) > 0) {
          foreach ($trainBracks as $tbkey => $tbvalue) {
          
            array_push($brackDown, array('id' => $tbvalue->id, 'sessions' => $tbvalue->sessions, 'amount' => $tbvalue->amount, "status" => $tbvalue->status, "dateCreate" => gmdate("Y-m-d", strtotime($tbvalue->dateCreate)) ));

          }
        }


        $tmpAddons = array();
        if ($quotDetail[0]->addOn == '1') {
          $tmpAddons = explode(',',$reqDetails[0]->extraAddons);
        }

        $details = array('packName' => $packageName[0]->name, 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name,'haircut'=>'', 'session' => $quotDetail[0]->sessions, 'ciDetails' => $spDetails[0]->name, 'cinumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'long' => $reqDetails[0]->longitude,  'lat' => $reqDetails[0]->latitude,'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'serviceId' => $postdata->serviceId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'brackDown' => $brackDown, 'genAddon' => explode(',',$packageName[0]->generalAddons) , 'addons' => $tmpAddons, 'bookingTime' => $reqDetails[0]->bookTime, 'toDate' => '', 'spmorning' => '', 'spevening' => '', 'spafternoon' => '','device_token'=>$ci_device_token[0]->device_token);


      }else if ($postdata->serviceId == '4') {
        //- Walking
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
        $spDetails = $this->sp_model->getCIDetails($quotDetail[0]->clientId);
        $ci_device_token=$this->quotations_model->get_ci_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getWalkingDetailsById($data['bookingId']);
        $packageName = $this->quotations_model->getPackages($reqDetails[0]->packageId);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->clientId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();

        $tmpAddons = array();
        if ($quotDetail[0]->addOn == '1') {
          $tmpAddons = explode(',',$reqDetails[0]->addOn);
        }

        $details = array('packName' => $packageName[0]->name, 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name,'haircut'=>'', 'session' => $quotDetail[0]->sessions, 'ciDetails' => $spDetails[0]->name, 'cinumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'long' => $reqDetails[0]->longitude,  'lat' => $reqDetails[0]->latitude,'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'serviceId' => $postdata->serviceId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'brackDown' => $brackDown, 'genAddon' => explode(',',$packageName[0]->generalAddons) , 'addons' => $tmpAddons, 'bookingTime' => '', 'toDate' => $reqDetails[0]->toDay, 'spmorning' => $quotDetail[0]->spmorning, 'spevening' => $quotDetail[0]->spevening, 'spafternoon' => $quotDetail[0]->spafternoon ,'device_token'=>$ci_device_token[0]->device_token); 

      }else if ($postdata->serviceId == '5') {
        //- Vet
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
        $spDetails = $this->sp_model->getCIDetails($quotDetail[0]->clientId);
        $ci_device_token=$this->quotations_model->get_ci_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getVetDetailsById($data['bookingId']);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->clientId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();
        $tmpAddons = array();

        $details = array('packName' => 'Vet @ Home', 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions, 'haircut'=>'','ciDetails' => $spDetails[0]->name, 'cinumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'long' => $reqDetails[0]->longitude,  'lat' => $reqDetails[0]->latitude,'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'serviceId' => $postdata->serviceId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'brackDown' => $brackDown, 'addons' => $tmpAddons); 

      }else if ($postdata->serviceId == '6') {
        //- Sitting
        $quotDetail = $this->quotations_model->getBookedQuotationsById($data);
        $spDetails = $this->sp_model->getCIDetails($quotDetail[0]->clientId);
        $ci_device_token=$this->quotations_model->get_ci_dtokens($spDetails[0]->id);

        $reqDetails = $this->quotations_model->getSittingDetailsById($data['bookingId']);

        //- Get Pet Details
        $petDetails = $this->quotations_model->getPetsById($postdata->clientId,$reqDetails[0]->petId);
        $bredDetails = $this->quotations_model->getBreedById($petDetails[0]->breed);
        $age = $this->ageCalculator($petDetails[0]->dob);
        $brackDown = array();

        $details = array('packName' => 'Sitting', 'cost' => $quotDetail[0]->amountPaid, 'petName' => $petDetails[0]->name, 'session' => $quotDetail[0]->sessions,'haircut'=>'', 'ciDetails' => $spDetails[0]->name, 'cinumber' => $spDetails[0]->phone, 'breed' => $bredDetails[0]->title, 'age' => $age,'bookingDate' => $reqDetails[0]->bookingDate, 'long' => $reqDetails[0]->longitude,  'lat' => $reqDetails[0]->latitude,'quotId' => $quotDetail[0]->quotId, 'bookingId' => $postdata->bookingId, 'serviceId' => $postdata->serviceId, 'spId' => $quotDetail[0]->spId, 'clientId' => $quotDetail[0]->clientId, 'brackDown' => $brackDown, 'addons' => $tmpAddons,'device_token'=>$ci_device_token[0]->device_token);
      }

      echo json_encode($details);

    }

  }

  public function getCIWalletAmount(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'clientId') ) {
      $ciDetails = $this->sp_model->getCIDetails($postdata->clientId);

      $walletAmount = $this->quotations_model->totalCiRequestAmount($postdata->clientId);

      if ($walletAmount[0]->total > 0) {
        $walletAmount = $this->parseFloat($walletAmount[0]->total);
        $walletAmount = sprintf('%0.2f', round($walletAmount, 2));
      }else{
        $walletAmount = 0;
      }


      $details = array('wallAmount' => $walletAmount, 'notifi'  => $ciDetails[0]->isNotified);
      echo json_encode($details);
    }

  }


  public function getSpNotified(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'spId') ) {
      $ciDetails = $this->sp_model->getSPDetails($postdata->spId);
    
      $details = array( 'notifi'  => $ciDetails[0]->isNotified);
      echo json_encode($details);
    }

  }


  public function getSPServices(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'spId') ) {
      
      $spDetails = $this->sp_model->getSPDetails($postdata->spId);
      

      $serviceList = array();
      array_push($serviceList, array('id' => '1', 'name'=> 'Boarding', 'select' => 'false'));
      array_push($serviceList, array('id' => '2', 'name'=> 'Grooming', 'select' => 'false'));
      array_push($serviceList, array('id' => '3', 'name'=> 'Training', 'select' => 'false'));
      array_push($serviceList, array('id' => '4', 'name'=> 'Walking', 'select' => 'false'));
      //- array_push($serviceList, array('id' => '5', 'name'=> 'Vet @ Home', 'select' => 'false'));
      //-array_push($serviceList, array('id' => '6', 'name'=> 'Sitting', 'select' => 'false'));

      
      if (!empty($spDetails[0]->serviceId)) {
        $selService = explode(',', $spDetails[0]->serviceId);

        foreach ($serviceList as $slkey => $slvalue) {
          
          if (in_array((int)$slvalue['id'], $selService)) {
            $serviceList[$slkey]['select'] = 'true';
          }

        }         
      }

      echo json_encode($serviceList);      

    }

  }


  public function getActiveServices(){
    
  }


  public function updateSPServices(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'spId') && property_exists($postdata,'services') ) {

      $this->sp_model->updateSPServices($postdata->spId, $postdata->services);

      $details = array('Updated');
      echo json_encode($details);


    }

  }


  public function releaseRequest(){
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'clientId') && property_exists($postdata,'serviceId') && property_exists($postdata,'spId') && property_exists($postdata,'bookingId') ) {

      $clientId = $postdata->clientId;
      $serviceId = $postdata->serviceId;
      $spId = $postdata->spId;
      $bookingId = $postdata->bookingId;
      $quotId = $postdata->quotId;

      if (property_exists($postdata,'sessions')) {
        $sessions = $postdata->sessions;
      }

      if (property_exists($postdata,'cost')) {
        $cost = $postdata->cost;
      }

      if ($serviceId == '1') {
        //- Boarding
        $packageDtl = $this->quotations_model->getPackages('9');
        $spDetails = $this->sp_model->getSPDetails($postdata->spId);

        $tmdata['spId'] = $postdata->spId;
        $tmdata['clientId'] = $clientId;
        $tmdata['bookId'] = $postdata->bookingId;
        $tmdata['quotId'] = $postdata->quotId;
        $quoDtl = $this->quotations_model->getQuotDetailsById($tmdata);

        # code...
        $data['title'] = ucfirst($spDetails[0]->firstName).' '.$spDetails[0]->lastName.'requested to release payment';
        $data['desc'] = ucfirst($packageDtl[0]->name).' '.$spDetails[0]->firstName.' '.$spDetails[0]->lastName.' requested '.$quoDtl[0]->totalPrice.'/- to release';
        $data['senderId'] = $spId;
        $data['reseveId'] = $clientId;
        $data['searchTrm'] = 'ci';
        $data['client_id'] = $clientId;
        $data['sp_id'] = $spId;
        $data['booking_id'] = $bookingId;
        $data['quotation_id'] = $quotId;

        $this->quotations_model->createNotif($data);
        $this->sp_model->updateCiNotifi($clientId);

      }else if ($serviceId == '2') {
        //- Grooming
        $petDetails = $this->quotations_model->getGroomingDetailsById($bookingId);
        $packageDtl = $this->quotations_model->getPackages($petDetails[0]->packageId);
        $spDetails = $this->sp_model->getSPDetails($postdata->spId);

        $tmdata['spId'] = $postdata->spId;
        $tmdata['clientId'] = $clientId;
        $tmdata['bookId'] = $postdata->bookingId;
        $tmdata['quotId'] = $postdata->quotId;
        $quoDtl = $this->quotations_model->getQuotDetailsById($tmdata);

        # code...
        $data['title'] = ucfirst($spDetails[0]->firstName).' '.$spDetails[0]->lastName.'requested to release payment';
        $data['desc'] = ucfirst($packageDtl[0]->name).' '.$spDetails[0]->firstName.' '.$spDetails[0]->lastName.' requested '.$quoDtl[0]->totalPrice.'/- to release';
        $data['senderId'] = $spId;
        $data['reseveId'] = $clientId;
        $data['searchTrm'] = 'ci';
        $data['client_id'] = $clientId;
        $data['sp_id'] = $spId;
        $data['booking_id'] = $bookingId;
        $data['quotation_id'] = $quotId;

        $this->quotations_model->createNotif($data);

        $this->sp_model->updateCiNotifi($clientId);
       
      }else if ($serviceId == '3') {
        //- Training
        $petDetails = $this->quotations_model->getTrainigDetailsById($bookingId);
        $packageDtl = $this->quotations_model->getPackages($petDetails[0]->packageId);
        $spDetails = $this->sp_model->getSPDetails($postdata->spId);

        # code...
        $data['title'] = ucfirst($spDetails[0]->firstName).' '.$spDetails[0]->lastName.'requested to release payment';
        $data['desc'] = ucfirst($packageDtl[0]->name).' '.$spDetails[0]->firstName.' '.$spDetails[0]->lastName.' requested '.$cost.'/- to release';
        $data['senderId'] = $spId;
        $data['reseveId'] = $clientId;
        $data['searchTrm'] = 'ci';
        $data['client_id'] = $clientId;
        $data['sp_id'] = $spId;
        $data['booking_id'] = $bookingId;
        $data['quotation_id'] = $quotId;

        $this->quotations_model->createNotif($data);  
        $this->sp_model->updateCiNotifi($clientId);
        
        $tdata['bookingId'] = $bookingId;
        $tdata['quotId'] = $quotId;
        $tdata['noOfSess'] = $sessions;
        $tdata['amount'] = $cost;
        $this->quotations_model->createTrainBreak($tdata);      


      }else if ($serviceId == '4') {
        //- Walking
        $petDetails = $this->quotations_model->getWalkingDetailsById($bookingId);
        $packageDtl = $this->quotations_model->getPackages($petDetails[0]->packageId);
        $spDetails = $this->sp_model->getSPDetails($postdata->spId);

        $tmdata['spId'] = $postdata->spId;
        $tmdata['clientId'] = $clientId;
        $tmdata['bookId'] = $postdata->bookingId;
        $tmdata['quotId'] = $postdata->quotId;
        $quoDtl = $this->quotations_model->getQuotDetailsById($tmdata);

        # code...
        $data['title'] = ucfirst($spDetails[0]->firstName).' '.$spDetails[0]->lastName.'requested to release payment';
        $data['desc'] = ucfirst($packageDtl[0]->name).' '.$spDetails[0]->firstName.' '.$spDetails[0]->lastName.' requested '.$quoDtl[0]->totalPrice.'/- to release';
        $data['senderId'] = $spId;
        $data['reseveId'] = $clientId;
        $data['searchTrm'] = 'ci';
        $data['client_id'] = $clientId;
        $data['sp_id'] = $spId;
        $data['booking_id'] = $bookingId;
        $data['quotation_id'] = $quotId;

        $this->quotations_model->createNotif($data);
        $this->sp_model->updateCiNotifi($clientId);

      }else if ($serviceId == '5') {
        //- Vet @ Home
        $spDetails = $this->sp_model->getSPDetails($postdata->spId);

        $data['title'] = 'Vet @ Home';
        $data['desc'] = $spDetails[0]->firstName.' '.$spDetails[0]->lastName.' requested to release payment';
        $data['senderId'] = $spId;
        $data['reseveId'] = $clientId;
        $data['searchTrm'] = 'ci';
        $data['client_id'] = $clientId;
        $data['sp_id'] = $spId;
        $data['booking_id'] = $bookingId;
        $data['quotation_id'] = $quotId;

        $this->quotations_model->createNotif($data);
        $this->sp_model->updateCiNotifi($clientId);

      }else if ($serviceId == '6') {
        //- Sitting
        $spDetails = $this->sp_model->getSPDetails($postdata->spId);

        $data['title'] = 'Sitting';
        $data['desc'] = $spDetails[0]->firstName.' '.$spDetails[0]->lastName.' requested to release payment';
        $data['senderId'] = $spId;
        $data['reseveId'] = $clientId;
        $data['searchTrm'] = 'ci';
        $data['client_id'] = $clientId;
        $data['sp_id'] = $spId;
        $data['booking_id'] = $bookingId;
        $data['quotation_id'] = $quotId;

        $this->quotations_model->createNotif($data);
        $this->sp_model->updateCiNotifi($clientId);
      }
      
      $details = array('Updated');
      echo json_encode($details);
    }
  }


  public function getNotifications(){
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId')  ) {

      $searchTrm = '';
      if (property_exists($postdata,'searchTrm')) {
        $searchTrm = $postdata->searchTrm;
      }

      $userId = $postdata->userId;
      $nitiList = $this->quotations_model->notifList($userId,$searchTrm);

      echo json_encode($nitiList);
    }
  }

  public function deleteTrainigBrackDown(){
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'bookingId') && property_exists($postdata,'quotId') && property_exists($postdata,'brackId') ) {

      $data['bookingId'] = $postdata->bookingId;
      $data['quotId'] = $postdata->quotId;
      $data['id'] = $postdata->brackId;
      $nitiList = $this->quotations_model->deleteTrainigBrackDown($data);
      $details = array('Updated');
      echo json_encode($details);      

    }
  }


  public function releasePayment(){
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'bookingId') && property_exists($postdata,'quotId') && property_exists($postdata,'spId') && property_exists($postdata,'clientId') && property_exists($postdata,'serviceId') ) {

      $postdata->serviceId;
      $postdata->bookingId;
      $postdata->quotId;
      $postdata->spId;
      $postdata->clientId;
      $brackDownId = '';
      $rating = '';
      $comment = '';
      if (property_exists($postdata,'brackDownId')) {
        $brackDownId = $postdata->brackDownId;
      }

      if (property_exists($postdata,'rating')) {
        $rating = $postdata->rating;
      }

      if (property_exists($postdata,'comment')) {
        $comment = $postdata->comment;
      }

      if ($postdata->serviceId == '1') {
        //- 1. Boarding
        $this->quotations_model->boardingClompeted($postdata->bookingId);
        $this->quotations_model->quotClosed($postdata->quotId);
        
        $rdata['userid'] = $postdata->clientId;
        $rdata['spid'] = $postdata->spId;
        $rdata['bookingId'] = $postdata->bookingId;
        $rdata['quotId'] = $postdata->quotId;
        $this->quotations_model->setReleaseRequest($rdata);

        //- Notification
        $packageDtl = $this->quotations_model->getPackages('9');
        $getCIDetails = $this->sp_model->getCIDetails($postdata->clientId);

        $data['title'] = "Payment released from ".$getCIDetails[0]->name;
        $data['desc'] = 'It takes 24hr to get credited into your account';
        $data['senderId'] = $postdata->clientId;
        $data['reseveId'] = $postdata->spId;
        $data['searchTrm'] = 'sp';
        $data['client_id'] = $postdata->clientId;
        $data['sp_id'] = $postdata->spId;
        $data['booking_id'] = $postdata->bookingId;
        $data['quotation_id'] = $postdata->quotId;
        $this->quotations_model->createNotif($data);
        $this->sp_model->updateSpNotifi($postdata->spId);


        $rdata['spuid'] = $postdata->spId;
        $rdata['ciuserId'] = $postdata->clientId;
        $rdata['rating'] = $rating;
        $rdata['comment'] = $comment;
        $rdata['serviceId'] = '1';
        $this->quotations_model->createSpreviews($rdata);

      }elseif ($postdata->serviceId == '2') {
        //- 2. Grooming
        $this->quotations_model->groomingClompeted($postdata->bookingId);
        $this->quotations_model->quotClosed($postdata->quotId);

        $rdata['userid'] = $postdata->clientId;
        $rdata['spid'] = $postdata->spId;
        $rdata['bookingId'] = $postdata->bookingId;
        $rdata['quotId'] = $postdata->quotId;
        $this->quotations_model->setReleaseRequest($rdata);        

        //- Notification
        $petDetails = $this->quotations_model->getGroomingDetailsById($postdata->bookingId);
        $packageDtl = $this->quotations_model->getPackages($petDetails[0]->packageId);
        $getCIDetails = $this->sp_model->getCIDetails($postdata->clientId);

        $data['title'] = "Payment released from ".$getCIDetails[0]->name;
        $data['desc'] = 'It takes 24hr to get credited into your account';
        $data['senderId'] = $postdata->clientId;
        $data['reseveId'] = $postdata->spId;
        $data['searchTrm'] = 'sp';
        $data['client_id'] = $postdata->clientId;
        $data['sp_id'] = $postdata->spId;
        $data['booking_id'] = $postdata->bookingId;
        $data['quotation_id'] = $postdata->quotId;
        $this->quotations_model->createNotif($data);
        $this->sp_model->updateSpNotifi($postdata->spId);

        $rdata['spuid'] = $postdata->spId;
        $rdata['ciuserId'] = $postdata->clientId;
        $rdata['rating'] = $rating;
        $rdata['comment'] = $comment;
        $rdata['serviceId'] = '2';
        $this->quotations_model->createSpreviews($rdata);

      }elseif ($postdata->serviceId == '3') {
        //- 3. Training
        $tdata['id'] = $brackDownId;
        $tdata['bookingId'] = $postdata->bookingId;
        $tdata['quotId'] = $postdata->quotId;
        $this->quotations_model->releaseTrainigBrackDown($tdata);

        $paidBrack = $this->quotations_model->getPaidBreakDowns($postdata->bookingId,$postdata->quotId);
        $totalPaid = 0;
        if (count($paidBrack) > 0) {
          foreach ($paidBrack as $pkey => $pvalue) {
            $totalPaid = (float)$totalPaid + (float)$pvalue->amount;
          }
        }

        $qdata['clientId'] = $postdata->clientId;
        $qdata['spId'] = $postdata->spId;
        $qdata['bookingId'] = $postdata->quotId;
        $quotDetails = $this->quotations_model->getquotationsById($qdata);

        if ($totalPaid >= $quotDetails[0]->amountPrice) {
          $this->quotations_model->walkingClompeted($postdata->bookingId);
          $this->quotations_model->quotClosed($postdata->quotId);

          $rdata['spuid'] = $postdata->spId;
          $rdata['ciuserId'] = $postdata->clientId;
          $rdata['rating'] = $rating;
          $rdata['comment'] = $comment;
          $rdata['serviceId'] = '3';
          $this->quotations_model->createSpreviews($rdata);


          $desc = 'It takes 24hr to get credited into your account';         
        }else{
          $desc = 'It takes 24hr to get credited into your account';        
        }

        //- Notification
        $petDetails = $this->quotations_model->getTrainigDetailsById($postdata->bookingId);
        $packageDtl = $this->quotations_model->getPackages($petDetails[0]->packageId);
        $getCIDetails = $this->sp_model->getCIDetails($postdata->clientId);

        $data['title'] = "Payment released from ".$getCIDetails[0]->name;
        $data['desc'] = $desc;
        $data['senderId'] = $postdata->clientId;
        $data['reseveId'] = $postdata->spId;
        $data['searchTrm'] = 'sp';
        $data['client_id'] = $postdata->clientId;
        $data['sp_id'] = $postdata->spId;
        $data['booking_id'] = $postdata->bookingId;
        $data['quotation_id'] = $postdata->quotId;
        $this->quotations_model->createNotif($data);
        $this->sp_model->updateSpNotifi($postdata->spId);

      }elseif ($postdata->serviceId == '4') {
        //- 4. Walking
        $this->quotations_model->walkingClompeted($postdata->bookingId);
        $this->quotations_model->quotClosed($postdata->quotId);

        $rdata['userid'] = $postdata->clientId;
        $rdata['spid'] = $postdata->spId;
        $rdata['bookingId'] = $postdata->bookingId;
        $rdata['quotId'] = $postdata->quotId;
        $this->quotations_model->setReleaseRequest($rdata);

        //- Notification
        $petDetails = $this->quotations_model->getWalkingDetailsById($postdata->bookingId);
        $packageDtl = $this->quotations_model->getPackages($petDetails[0]->packageId);
        $getCIDetails = $this->sp_model->getCIDetails($postdata->clientId);
        
        $data['title'] = "Payment released from ".$getCIDetails[0]->name;
        $data['desc'] = 'It takes 24hr to get credited into your account';
        $data['senderId'] = $postdata->clientId;
        $data['reseveId'] = $postdata->spId;
        $data['searchTrm'] = 'sp';
        $data['client_id'] = $postdata->clientId;
        $data['sp_id'] = $postdata->spId;
        $data['booking_id'] = $postdata->bookingId;
        $data['quotation_id'] = $postdata->quotId;
        $this->quotations_model->createNotif($data);
        $this->sp_model->updateSpNotifi($postdata->spId);

        $rdata['spuid'] = $postdata->spId;
        $rdata['ciuserId'] = $postdata->clientId;
        $rdata['rating'] = $rating;
        $rdata['comment'] = $comment;
        $rdata['serviceId'] = '4';
        $this->quotations_model->createSpreviews($rdata);


      }elseif ($postdata->serviceId == '5') {
        //- 5. Vet @ Home
        $this->quotations_model->vetClompeted($postdata->bookingId);
        $this->quotations_model->quotClosed($postdata->quotId);
        
        $rdata['userid'] = $postdata->clientId;
        $rdata['spid'] = $postdata->spId;
        $rdata['bookingId'] = $postdata->bookingId;
        $rdata['quotId'] = $postdata->quotId;
        $this->quotations_model->setReleaseRequest($rdata);

        $data['title'] = 'Vet @ Home';
        $data['desc'] = 'Service closed successfully';
        $data['senderId'] = $postdata->clientId;
        $data['reseveId'] = $postdata->spId;
        $data['searchTrm'] = 'sp';
        $data['client_id'] = $postdata->clientId;
        $data['sp_id'] = $postdata->spId;
        $data['booking_id'] = $postdata->bookingId;
        $data['quotation_id'] = $postdata->quotId;
        $this->quotations_model->createNotif($data);
        $this->sp_model->updateSpNotifi($postdata->spId);


        $rdata['spuid'] = $postdata->spId;
        $rdata['ciuserId'] = $postdata->clientId;
        $rdata['rating'] = $rating;
        $rdata['comment'] = $comment;
        $rdata['serviceId'] = '5';
        $this->quotations_model->createSpreviews($rdata);


      }elseif ($postdata->serviceId == '6') {
        //- 6. Sitting
        $this->quotations_model->sittingClompeted($postdata->bookingId);
        $this->quotations_model->quotClosed($postdata->quotId);

        $rdata['userid'] = $postdata->clientId;
        $rdata['spid'] = $postdata->spId;
        $rdata['bookingId'] = $postdata->bookingId;
        $rdata['quotId'] = $postdata->quotId;
        $this->quotations_model->setReleaseRequest($rdata);

        $data['title'] = 'Sitting';
        $data['desc'] = 'Service closed successfully';
        $data['senderId'] = $postdata->clientId;
        $data['reseveId'] = $postdata->spId;
        $data['searchTrm'] = 'sp';
        $data['client_id'] = $postdata->clientId;
        $data['sp_id'] = $postdata->spId;
        $data['booking_id'] = $postdata->bookingId;
        $data['quotation_id'] = $postdata->quotId;
        $this->quotations_model->createNotif($data);
        $this->sp_model->updateSpNotifi($postdata->spId);


        $rdata['spuid'] = $postdata->spId;
        $rdata['ciuserId'] = $postdata->clientId;
        $rdata['rating'] = $rating;
        $rdata['comment'] = $comment;
        $rdata['serviceId'] = '6';
        $this->quotations_model->createSpreviews($rdata);


      }

      $details = array('Updated');
      echo json_encode($details);  


    }

  }


  public function gerSpReviews(){
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId')  ) {

      $userId = $postdata->userId;
      $review = $this->quotations_model->getAllReviews($userId);
      $spDetail = $this->sp_model->getSPDetails($userId);
      $avg = $this->quotations_model->getAvgReviews($userId);
      $jobCom = $this->quotations_model->jobsCompleted($userId);
      $totalReviews = $this->quotations_model->getTotalReviews($userId);
      $stars5 = $this->quotations_model->get5Reviews($userId);
      $stars4 = $this->quotations_model->get4Reviews($userId);
      $stars3 = $this->quotations_model->get3Reviews($userId);
      $stars2 = $this->quotations_model->get2Reviews($userId);
      $stars1 = $this->quotations_model->get1Reviews($userId);

      if (count($review) > 0) {
        foreach ($review as $rkey => $rvalue) {
          $cuid = $this->sp_model->getCIDetails($rvalue->ciUserId);
          $rvalue->ciUserId = $cuid[0]->name;
          $review[$rkey]->image = $cuid[0]->profilePic;
        }
      }

      $data = array('reviewList' => $review, 'avgRating' => $this->parseFloat($avg[0]->rating), 'totalReviews' => $totalReviews, 'stars5' => $stars5, 'stars4' => $stars4, 'stars3' => $stars3, 'stars2' => $stars2, 'stars1' => $stars1, 'jobCom' => $jobCom , 'pnpVerif' => $spDetail[0]->pnpVerified);

      echo json_encode($data);
    }    
  }


  public function spServiceImagesList(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'spId')  ) {

      $spId = $postdata->spId;
      $spList = $this->quotations_model->spsImgList($spId);
      if (count($spList) > 0) {

        foreach ($spList as $spkey => $spvalue) {
          $spList[$spkey]->photo = base_url($spvalue->photo);
        }
       
      }

      echo json_encode($spList);

    }

  }

  public function deletespServiceImages(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'spId') && property_exists($postdata,'photoId')  ) {

      $data['spId'] = $postdata->spId;
      $data['photoId'] = $postdata->photoId;
      $nitiList = $this->quotations_model->deleteSPSimage($data);
      $details = array('Updated');
      echo json_encode($details);   

    }

  }

  
  public function spWalletDetails(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      //- Total Requested amount
      $walletAmount = $this->quotations_model->totalRequestAmount($postdata->userId);
      if ($walletAmount[0]->total > 0) {
        $walletAmount = $this->parseFloat($walletAmount[0]->total);
        $walletAmount = sprintf('%0.2f', round($walletAmount, 2));
      }else{
        $walletAmount = 0;
      }

      //- Total Received amount
      $releaseAmount = $this->quotations_model->totalSpReleasedAmount($postdata->userId);
      if ($releaseAmount[0]->total > 0) {
        $releaseAmount = $this->parseFloat($releaseAmount[0]->total);
        $releaseAmount = sprintf('%0.2f', round($releaseAmount, 2));
      }else{
        $releaseAmount = 0;
      }

      if (!empty($postdata->status)) {
        $status = $postdata->status;
      }else{
        $status = 'all';
      }

      $tranDetails = $this->quotations_model->totalDetailsList($postdata->userId,$status);
      $tmpTran = array();
      if (count($tranDetails) > 0) {
        foreach ($tranDetails as $tdkey => $tdvalue) {

          $clinDtl = $this->sp_model->getCIDetails($tdvalue->userId);

          $data['spId'] = $tdvalue->spId;
          $data['clientId'] = $tdvalue->userId;
          $data['bookId'] = $tdvalue->bookId;
          $data['quotId'] = $tdvalue->quotId;
          $transDetails = $this->quotations_model->getQuotDetailsById($data);

          $service = '';
          if ($transDetails[0]->serviceId == '1') {
            $service = 'Boarding';
          }else if ($transDetails[0]->serviceId == '2') {
            $service = 'Grooming';
          }else if ($transDetails[0]->serviceId == '3') {
            $service = 'Training';
          }else if ($transDetails[0]->serviceId == '4') {
            $service = 'Walking';
          }else if ($transDetails[0]->serviceId == '5') {
            $service = 'Vet @ Home';
          }else if ($transDetails[0]->serviceId == '6') {
            $service = 'Sitting';
          }

          if ($tdvalue->reqStatus == '1') {
            $nAmount = $this->parseFloat((float)$tdvalue->nAmount + (float)$tdvalue->platFee);
            
            if ($nAmount > 0) {
              $nAmount = sprintf('%0.2f', round($nAmount, 2));
            }
            $rdata = '';
          }else if ($tdvalue->reqStatus == '2') {
            $nAmount = $this->parseFloat((float)$tdvalue->nAmount);
            
            if ($nAmount > 0) {
              $nAmount = sprintf('%0.2f', round($nAmount, 2));
            }

            
            $rdata = $tdvalue->relDate;
          }

          array_push($tmpTran, array('cname' => $clinDtl[0]->name, 'service' => $service, 'amount' => $nAmount, 'status' => $tdvalue->reqStatus, 'rdata' => $rdata ) );

        }
      }



      $details = array('walletAmount' => $walletAmount, "releaseAmount" => $releaseAmount, 'tmpTran' => $tmpTran);

      echo json_encode($details);   

    }

  }



  public function ciWalletDetails(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      //- Total Requested amount
      $walletAmount = $this->quotations_model->totalCiRequestAmount($postdata->userId);
      if ($walletAmount[0]->total > 0) {
        $walletAmount = $this->parseFloat($walletAmount[0]->total);
        $walletAmount = sprintf('%0.2f', round($walletAmount, 2));
      }else{
        $walletAmount = 0;
      }

      //- Total Received amount
      $releaseAmount = $this->quotations_model->totalCiReleasedAmount($postdata->userId);
      if ($releaseAmount[0]->total > 0) {
        $releaseAmount = $this->parseFloat($releaseAmount[0]->total);
        $releaseAmount = sprintf('%0.2f', round($releaseAmount, 2));
      }else{
        $releaseAmount = 0;
      }


      $tranDetails = $this->quotations_model->totalCiDetailsList($postdata->userId);
      $tmpTran = array();
      if (count($tranDetails) > 0) {
        foreach ($tranDetails as $tdkey => $tdvalue) {

          $selDtl = $this->sp_model->getSPDetails($tdvalue->spId);

          $data['spId'] = $tdvalue->spId;
          $data['clientId'] = $tdvalue->userId;
          $data['bookId'] = $tdvalue->bookId;
          $data['quotId'] = $tdvalue->quotId;
          $transDetails = $this->quotations_model->getQuotDetailsById($data);

          $service = '';
          if ($transDetails[0]->serviceId == '1') {
            $service = 'Boarding';
          }else if ($transDetails[0]->serviceId == '2') {
            $service = 'Grooming';
          }else if ($transDetails[0]->serviceId == '3') {
            $service = 'Training';
          }else if ($transDetails[0]->serviceId == '4') {
            $service = 'Walking';
          }else if ($transDetails[0]->serviceId == '5') {
            $service = 'Vet @ Home';
          }else if ($transDetails[0]->serviceId == '6') {
            $service = 'Sitting';
          }

          if ($tdvalue->reqStatus == '1' || $tdvalue->reqStatus == '0') {
            $nAmount = $this->parseFloat((float)$tdvalue->nAmount + (float)$tdvalue->platFee);
            
            if ($nAmount > 0) {
              $nAmount = sprintf('%0.2f', round($nAmount, 2));
            }
            $rdata = $tdvalue->relDate;
            
          }else if ($tdvalue->reqStatus == '2') {
            $nAmount = $this->parseFloat((float)$tdvalue->nAmount + (float)$tdvalue->platFee);
            
            if ($nAmount > 0) {
              $nAmount = sprintf('%0.2f', round($nAmount, 2));
            }

            
            $rdata = $tdvalue->relDate;
          }

          array_push($tmpTran, array('spname' => $selDtl[0]->firstName.' '.$selDtl[0]->lastName, 'service' => $service, 'amount' => $nAmount, 'status' => $tdvalue->reqStatus, 'rdata' => $rdata ) );

        }
      }



      $details = array('walletAmount' => $walletAmount, "releaseAmount" => $releaseAmount, 'tmpTran' => $tmpTran);

      echo json_encode($details);   

    }

  }



  public function spMissedJobs(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      $tmpData = array();
      $records = $this->quotations_model->getAllSpQuots($postdata->userId);
      
      if (count($records) > 0) {

        foreach ($records as $rkey => $rvalue) {
          
          if ($rvalue->serviceId == '1') {
            //- Boarding
            $bookd = $this->quotations_model->bookedBoard($rvalue->clientId, $rvalue->bookingId);
            if (count($bookd) > 0) {

              $bitWinner = $this->quotations_model->getWinnSpQuot($rvalue->clientId, $rvalue->bookingId, $rvalue->serviceId);

              $spDetails = $this->sp_model->getSPDetails($bitWinner[0]->spId);
              $ciDetails = $this->sp_model->getCIDetails($rvalue->clientId);

              array_push($tmpData, array('cname' => $ciDetails[0]->name, 'cpic' => $ciDetails[0]->profilePic, 'sname' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'price' => $bitWinner[0]->totalPrice, 'service' => 'Boarding' ) );

            }
            
          }else if ($rvalue->serviceId == '2') {
            //- Grooming

            $bookd = $this->quotations_model->bookedGroom($rvalue->clientId, $rvalue->bookingId);
            if (count($bookd) > 0) {

              unset($bitWinner);
              $bitWinner = $this->quotations_model->getWinnSpQuot($rvalue->clientId, $rvalue->bookingId, $rvalue->serviceId);

              $spDetails = $this->sp_model->getSPDetails($bitWinner[0]->spId);
              $ciDetails = $this->sp_model->getCIDetails($rvalue->clientId);

              array_push($tmpData, array('cname' => $ciDetails[0]->name, 'cpic' => $ciDetails[0]->profilePic, 'sname' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'price' => $bitWinner[0]->totalPrice, 'service' => 'Grooming' ) );

            }
            
          }else if ($rvalue->serviceId == '3') {
            //- Training
            $bookd = $this->quotations_model->bookedTrain($rvalue->clientId, $rvalue->bookingId);
            if (count($bookd) > 0) {

              $bitWinner = $this->quotations_model->getWinnSpQuot($rvalue->clientId, $rvalue->bookingId, $rvalue->serviceId);

              $spDetails = $this->sp_model->getSPDetails($bitWinner[0]->spId);
              $ciDetails = $this->sp_model->getCIDetails($rvalue->clientId);

              array_push($tmpData, array('cname' => $ciDetails[0]->name, 'cpic' => $ciDetails[0]->profilePic, 'sname' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'price' => $bitWinner[0]->totalPrice, 'service' => 'Training' ) );

            }

          }else if ($rvalue->serviceId == '4') {
            //- Walking
            $bookd = $this->quotations_model->bookedWalk($rvalue->clientId, $rvalue->bookingId);
            if (count($bookd) > 0) {

              $bitWinner = $this->quotations_model->getWinnSpQuot($rvalue->clientId, $rvalue->bookingId, $rvalue->serviceId);

              $spDetails = $this->sp_model->getSPDetails($bitWinner[0]->spId);
              $ciDetails = $this->sp_model->getCIDetails($rvalue->clientId);

              array_push($tmpData, array('cname' => $ciDetails[0]->name, 'cpic' => $ciDetails[0]->profilePic, 'sname' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'price' => $bitWinner[0]->totalPrice, 'service' => 'Walking' ) );

            }

          }else if ($rvalue->serviceId == '5') {
            //- Vet @ Home
            $bookd = $this->quotations_model->bookedVet($rvalue->clientId, $rvalue->bookingId);
            if (count($bookd) > 0) {

              $bitWinner = $this->quotations_model->getWinnSpQuot($rvalue->clientId, $rvalue->bookingId, $rvalue->serviceId);

              $spDetails = $this->sp_model->getSPDetails($bitWinner[0]->spId);
              $ciDetails = $this->sp_model->getCIDetails($rvalue->clientId);

              array_push($tmpData, array('cname' => $ciDetails[0]->name, 'cpic' => $ciDetails[0]->profilePic, 'sname' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'price' => $bitWinner[0]->totalPrice, 'service' => 'Vet @ Home' ) );

            }

          }else if ($rvalue->serviceId == '6') {
            //- Sitting
            $bookd = $this->quotations_model->bookedSit($rvalue->clientId, $rvalue->bookingId);
            if (count($bookd) > 0) {

              $bitWinner = $this->quotations_model->getWinnSpQuot($rvalue->clientId, $rvalue->bookingId, $rvalue->serviceId);

              $spDetails = $this->sp_model->getSPDetails($bitWinner[0]->spId);
              $ciDetails = $this->sp_model->getCIDetails($rvalue->clientId);

              array_push($tmpData, array('cname' => $ciDetails[0]->name, 'cpic' => $ciDetails[0]->profilePic, 'sname' => $spDetails[0]->firstName.' '.$spDetails[0]->lastName, 'price' => $bitWinner[0]->totalPrice, 'service' => 'Sitting' ) );

            }

          }

          if (count($tmpData) >= 3) {
            break;
          }

        }


        
      }

      echo json_encode($tmpData); 

    }

  }


  public function updateFavorite(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'bookingId') && property_exists($postdata,'favorite') ) {

      $quotId = $postdata->bookingId;
      $favorite = $postdata->favorite;

      $this->quotations_model->updateFavorite($quotId,$favorite);

      $arrayName = array('status' => "success" );
      echo json_encode($arrayName);
 
    }

  }


  public function spReadNotification(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      $this->sp_model->removeSpNotifi($postdata->userId);

      $arrayName = array('status' => "success" );
      echo json_encode($arrayName);
    }

  }


  public function ciReadNotification(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      $this->sp_model->removeCiNotifi($postdata->userId);

      $arrayName = array('status' => "success" );
      echo json_encode($arrayName);
    }

  }


  public function createSpBankDetails(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      $userId = $postdata->userId;
      $usxist = $this->quotations_model->checkBankExist($userId);

      if (count($usxist) == 0) {

        $data['userId'] = $postdata->userId;
        $data['fullName'] = $postdata->fullName;
        $data['bankName'] = $postdata->bankName;
        $data['accNumber'] = $postdata->accNumber;
        $data['branchName'] = $postdata->branchName;
        $data['ifscCode'] = $postdata->ifscCode;

        $this->quotations_model->createSpBankDetails($data);
      
        $arrayName = array('status' => "success" );
        echo json_encode($arrayName);

      }else{
        $arrayName = array('status' => "only one account" );
        echo json_encode($arrayName);  
      }


    }

  }


  public function updateSpBankDetails(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

        $data['fullName'] = $postdata->fullName;
        $data['bankName'] = $postdata->provider;
        $data['accNumber'] = $postdata->mNumber;
        $data['branchName'] = $postdata->branchName;
        $data['ifscCode'] = $postdata->ifscCode;
        
      $this->quotations_model->updateSpBankDetails($data, $postdata->bankId);
        $arrayName = array('status' => "success" );
        echo json_encode($arrayName);      
    }

  }


  public function getSpBankDetails(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      $ciDetails = $this->quotations_model->checkBankExist($postdata->userId);
      
      if (count($ciDetails) > 0) {
        $details = array( 'details'  => $ciDetails);
        echo json_encode($details);
      }else{
        $details = array();
        echo json_encode($details);
      }

    }    

  }




  public function createSpUpiDetails(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      $userId = $postdata->userId;
      $usxist = $this->quotations_model->checkUpiExist($userId);

      if (count($usxist) == 0) {

        $data['userId'] = $postdata->userId;
        $data['fullName'] = $postdata->fullName;
        $data['provider'] = $postdata->provider;
        $data['mNumber'] = $postdata->mNumber;

        $this->quotations_model->createSpUpiDetails($data);
      
        $arrayName = array('status' => "success" );
        echo json_encode($arrayName);      

      }else{
        $arrayName = array('status' => "only one account" );
        echo json_encode($arrayName);  
      }


    }

  }


  public function updateSpUpiDetails(){

    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

        $data['bankId'] = $postdata->bankId;
        $data['userId'] = $postdata->userId;
        $data['fullName'] = $postdata->fullName;
        $data['provider'] = $postdata->provider;
        $data['mNumber'] = $postdata->mNumber;
        
        $this->quotations_model->updateSpUpiDetails($data, $postdata->bankId);
      
        $arrayName = array('status' => "success" );
        echo json_encode($arrayName);      
    }

  }


  public function getSpUpiDetails(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {

      $ciDetails = $this->quotations_model->checkUpiExist($postdata->userId);
      
      if (count($ciDetails) > 0) {
        $details = array( 'details'  => $ciDetails);
        echo json_encode($details);
      }else{
        $details = array();
        echo json_encode($details);
      }

    }    

  }



  public function createCiNotification(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {
      
      $cinot = $this->quotations_model->checkCiNotifi($postdata->userId);
      if (count($cinot) > 0) {
        $this->quotations_model->updateCiNotifi($postdata->userId, $postdata->token);
      }else{
        $this->quotations_model->createCiNotifi($postdata->userId, $postdata->token);
      }
    
      $arrayName = array('status' => "success" );
      echo json_encode($arrayName);  

    }

  }
    
  

  public function createSpNotification(){
    
    $postdata = json_decode(file_get_contents("php://input"));
    if (is_object($postdata) && property_exists($postdata,'userId') ) {
      
      $cinot = $this->quotations_model->checkSpNotifi($postdata->userId);
      if (count($cinot) > 0) {
        $this->quotations_model->updateSpNotifi($postdata->userId, $postdata->token);
      }else{
        $this->quotations_model->createSpNotifi($postdata->userId, $postdata->token);
      }
    
      $arrayName = array('status' => "success" );
      echo json_encode($arrayName);  

    }

  }



  public function get_device_tokens() {
    $postdata = json_decode(file_get_contents("php://input"));

    $sp_devices = $this->crud_model->select_all("sp_user_subscribe");
    $services = $this->crud_model->select_all("services");
    $service_providers = $this->crud_model->select_sp("service_providers", array('service_id' => $postdata->serviceid), "id ASC");

    $device_tokens = [];

    foreach ($service_providers as $sp) {
      foreach ($sp_devices as $sp_device) {

        if ($sp->id == $sp_device->user_id ) {

          $device_tokens[]= $sp_device->device_token;

        }
        
      }
    }

    echo json_encode($device_tokens);

  }



    


}

?>