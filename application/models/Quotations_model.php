<?php
class Quotations_model extends CI_Model{


  public function __construct(){
    parent::__construct();
    $this->table_quotations = 'quotations';
    $this->table_services = 'services';
    $this->table_breeds = 'dog_breeds';

    $this->table_packages = 'packages';
    $this->table_cpets = 'pets';
    $this->table_boarding = 'boarding_bookings';
    $this->table_grooming = 'grooming_bookings';
    $this->table_training = 'training_bookings';
    $this->table_walking = 'walking_bookings';
    $this->table_vet = 'vet_bookings';
    $this->table_sitting = 'sitting_bookings';
    $this->table_trans = 'transaction_details';
    $this->table_sprovide = 'service_providers';
    $this->table_notifi = 'notification';
    $this->table_trainBrack = 'training_breakdowns';
    $this->table_spreviews = 'sp_reviews';
    $this->table_spimages = 'sp_service_images';
    $this->table_spBankDeta = 'sp_bank_details';
    $this->table_spupi = 'sp_upi';
    $this->table_ciUserSubs = 'ci_user_subscribe';
    $this->table_spUserSubs = 'sp_user_subscribe';
    
  }


  public function get1Reviews($userId){
    $this->db->select('id as id');
    $this->db->from($this->table_spreviews);
    $this->db->where('sp_uid', $userId);
    $this->db->where('rating', '1');

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function get2Reviews($userId){
    $this->db->select('id as id');

    $this->db->from($this->table_spreviews);
    $this->db->where('sp_uid', $userId);
    $this->db->where('rating', '2');

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function get3Reviews($userId){
    $this->db->select('id as id');

    $this->db->from($this->table_spreviews);
    $this->db->where('sp_uid', $userId);
    $this->db->where('rating', '3');

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function get4Reviews($userId){
    $this->db->select('id as id');

    $this->db->from($this->table_spreviews);
    $this->db->where('sp_uid', $userId);
    $this->db->where('rating', '4');

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function get5Reviews($userId){
    $this->db->select('id as id');

    $this->db->from($this->table_spreviews);
    $this->db->where('sp_uid', $userId);
    $this->db->where('rating', '5');

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function getTotalReviews($userId){
    $this->db->select('id as id');

    $this->db->from($this->table_spreviews);
    $this->db->where('sp_uid', $userId);

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function getAvgReviews($userId){
    
    $this->db->select_avg('rating');
    $this->db->from($this->table_spreviews);
    $this->db->where('sp_uid', $userId);

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getAllReviews($userId){
    $this->db->select('id as id');
    $this->db->select('ci_userId as ciUserId');
    $this->db->select('service_id as servId');
    $this->db->select('rating as rating');
    $this->db->select('comment as comment');
    $this->db->select('date_created as dateCreated');
  
    $this->db->from($this->table_spreviews);
    $this->db->where('sp_uid', $userId);

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function createSpreviews($data){
    $this->db->set('sp_uid', $data['spuid']);
    $this->db->set('ci_userId', $data['ciuserId']);
    $this->db->set('service_id', $data['serviceId']);
    $this->db->set('rating', $data['rating']);
    $this->db->set('comment', $data['comment']);
    $this->db->set('date_created',gmdate("Y-m-d H:i:s"));
 
    $returntmp = $this->db->insert($this->table_spreviews);
    return $returntmp;
  }


  public function quotAmount($quotId,$amount,$gst,$addOn){
    $this->db->set('amount_paid',$amount);
    $this->db->set('gst',$gst);
    $this->db->set('addOn',$addOn);

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_quotations);
    return $result;
  }

  public function setReleaseRequest($data){
    $this->db->set('release_request','1');
    $this->db->set('release_date', date('Y-m-d h:i:s') );

    $this->db->where('user_id', $data['userid']);
    $this->db->where('sp_id', $data['spid']);
    $this->db->where('booking_id', $data['bookingId']);
    $this->db->where('quot_Id', $data['quotId']);
    $result = $this->db->update($this->table_trans);
    return $result;
  }

  public function releaseTrainigBrackDown($data){
    $this->db->set('status','2');

    $this->db->where('id', $data['id']);
    $this->db->where('booking_id', $data['bookingId']);
    $this->db->where('quotation_id', $data['quotId']);
    $result = $this->db->update($this->table_trainBrack);
    return $result;
  }

  public function deleteTrainigBrackDown($data){
    $this->db->set('status','0');

    $this->db->where('id', $data['id']);
    $this->db->where('booking_id', $data['bookingId']);
    $this->db->where('quotation_id', $data['quotId']);
    $result = $this->db->update($this->table_trainBrack);
    return $result;
  }

  public function getPaidBreakDowns($bookingId,$quotId){
    $this->db->select('id as id');
    $this->db->select('amount as amount');
    $this->db->select('no_of_sessions as sessions');
    $this->db->select('booking_id as bookingId');
    $this->db->select('quotation_id as quotId');
    
    $this->db->from($this->table_trainBrack);
    $this->db->where('booking_id', $bookingId);
    $this->db->where('quotation_id', $quotId);
    $this->db->where('status','2');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function trainCiBreakDowns($bookingId,$quotId){
    $this->db->select('id as id');
    $this->db->select('amount as amount');
    $this->db->select('no_of_sessions as sessions');
    $this->db->select('booking_id as bookingId');
    $this->db->select('quotation_id as quotId');
    $this->db->select('status as status');
    $this->db->select('date_created as dateCreate');
    
    $this->db->from($this->table_trainBrack);
    $this->db->where('booking_id', $bookingId);
    $this->db->where('quotation_id', $quotId);
    $this->db->where_in('status', array('1','2'));

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function trainBreakDowns($bookingId,$quotId){
    $this->db->select('id as id');
    $this->db->select('amount as amount');
    $this->db->select('no_of_sessions as sessions');
    $this->db->select('booking_id as bookingId');
    $this->db->select('quotation_id as quotId');
    $this->db->select('status as status');
    $this->db->select('date_created as dateCreate');
    
    $this->db->from($this->table_trainBrack);
    $this->db->where('booking_id', $bookingId);
    $this->db->where('quotation_id', $quotId);
    $this->db->where_in('status', array('1','2','0'));

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }  

  public function createTrainBreak($data){
    $this->db->set('booking_id', $data['bookingId']);
    $this->db->set('quotation_id', $data['quotId']);
    $this->db->set('no_of_sessions', $data['noOfSess']);
    $this->db->set('amount', $data['amount']);
    $this->db->set('status', '1');
    $this->db->set('date_created',gmdate("Y-m-d H:i:s"));

    $returntmp = $this->db->insert($this->table_trainBrack);
    return $returntmp;
  }


  public function notifList($reseveId,$searchTrm){
    $this->db->select('title as title');
    $this->db->select('description as description');
    $this->db->select('client_id as clientId');
    $this->db->select('sp_id as spId');
    $this->db->select('booking_id as bookingId');
    $this->db->select('quotation_id as quotId');
    $this->db->select('date_created as date_created');
    
    $this->db->from($this->table_notifi);
    $this->db->where('reseveId', $reseveId);
    if (!empty($searchTrm)) {
      $this->db->where('searchTrm', $searchTrm);
    }
    $this->db->order_by('id', 'DESC');

    $query = $this->db->get();
    $result = $query->result();
    return $result;

  }


  public function createNotif($data){

    $this->db->set('title', $data['title']);
    $this->db->set('description', $data['desc']);
    $this->db->set('senderId', $data['senderId']);
    $this->db->set('reseveId', $data['reseveId']);
    $this->db->set('client_id', $data['client_id']);
    $this->db->set('sp_id', $data['sp_id']);
    $this->db->set('booking_id', $data['booking_id']);
    $this->db->set('quotation_id', $data['quotation_id']);
    $this->db->set('date_created',gmdate("Y-m-d H:i:s"));
    $this->db->set('searchTrm', $data['searchTrm']);

    $returntmp = $this->db->insert($this->table_notifi);
    return $returntmp;
  }


  public function getSPBookById($data){
    $this->db->select('id as quotId');
    $this->db->select('sp_id as spId');
    $this->db->select('client_id as clientId');
    $this->db->select('service_id as serviceId');
    $this->db->select('booking_id as bookingId');
    $this->db->select('sessions as sessions');
    $this->db->select('actual_price as actualPrice');
    $this->db->select('extra_price as extraPrice');
    $this->db->select('discount as discount');
    $this->db->select('total_price as totalPrice');

    $this->db->from($this->table_quotations);
    $this->db->where('sp_id', $data['userId']);
    $this->db->where('service_id', $data['serviceId']);
    $this->db->where('status', 'Booked');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getBreedById($breed){
    $this->db->select('id as id');
    $this->db->select('title as title');

    $this->db->from($this->table_breeds);
    $this->db->where('id', $breed);
    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;      
  }

  public function getSPDetails($userId){
    $this->db->select('id as id');
    $this->db->select('first_name as fname');
    $this->db->select('last_name as lname');
    $this->db->select('phone as phone');
    $this->db->select('photo as photo');

    $this->db->from($this->table_sprovide);
    $this->db->where('id', $userId);
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;      
  }
  

  public function getSittingBookings($userId,$petId){
    $this->db->select('id as id');

    $this->db->from($this->table_sitting);
    $this->db->where('client_id', $userId);
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }
    $this->db->where('status', 'Booked');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;      
  }

  public function getVetBookings($userId,$petId){
    $this->db->select('id as id');

    $this->db->from($this->table_vet);
    $this->db->where('client_id', $userId);
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }
    $this->db->where('status', 'Booked');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;      
  }

  public function getWalkingBookings($userId,$petId){
    $this->db->select('id as id');

    $this->db->from($this->table_walking);
    $this->db->where('client_id', $userId);
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }
    $this->db->where('status', 'Booked');
    $this->db->order_by('created_at', 'DESC');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;      
  }

  public function getTrainingBookings($userId,$petId){
    $this->db->select('id as id');

    $this->db->from($this->table_training);
    $this->db->where('client_id', $userId);
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }    
    $this->db->where('status', 'Booked');
    $this->db->order_by('created_at', 'DESC');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;     
  }

  public function getGroomingBookings($userId,$petId){
    $this->db->select('id as id');

    $this->db->from($this->table_grooming);
    $this->db->where('client_id', $userId);

    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }

    $this->db->where('status', 'Booked');
    $this->db->order_by('created_at', 'DESC');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;    
  }

  
  public function getBoardingBookings($userId,$petId){
    $this->db->select('id as id');

    $this->db->from($this->table_boarding);
    $this->db->where('client_id', $userId);

    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }
    
    $this->db->where('status', 'Booked');
    $this->db->order_by('created_at', 'DESC');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function sittingClompeted($quotId){
    $this->db->set('status','Closed');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_sitting);
    return $result;
  }

  public function updateSittingStatus($quotId){
    $this->db->set('status','Booked');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_sitting);
    return $result;
  }

  public function vetClompeted($quotId){
    $this->db->set('status','Closed');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_vet);
    return $result;
  }

  public function updateVetStatus($quotId){
    $this->db->set('status','Booked');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_vet);
    return $result;
  }

  public function updateWalkingStatus($quotId){
    $this->db->set('status','Booked');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_walking);
    return $result;
  }

  public function walkingClompeted($quotId){
    $this->db->set('status','Closed');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_walking);
    return $result;
  }

  public function updateTrainigStatus($quotId){
    $this->db->set('status','Booked');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_training);
    return $result;
  }
  

  public function groomingClompeted($quotId){
    $this->db->set('status','Closed');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_grooming);
    return $result;
  }

  public function updateGroomingStatus($quotId){
    $this->db->set('status','Booked');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_grooming);
    return $result;
  }


  public function boardingClompeted($quotId){
    $this->db->set('status','Closed');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_boarding);
    return $result;
  }

  public function updateBoardingStatus($quotId){
    $this->db->set('status','Booked');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_boarding);
    return $result;
  }

  public function quotClosed($quotId){
    $this->db->set('status','Closed');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_quotations);
    return $result;
  }


  public function updateQuotStatus($quotId){
    $this->db->set('status','Booked');

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_quotations);
    return $result;
  }


  public function checkTransa($transId){
    $this->db->select('id as id');

    $this->db->from($this->table_trans);
    $this->db->where('trans_id', $transId);
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function createTransa($data){

    $this->db->set('trans_id', $data['trans_id']);
    $this->db->set('payu_key', $data['payu_key']);
    $this->db->set('cart_id', $data['cart_id']);
    $this->db->set('amount', $data['amount']);
    $this->db->set('bank_ref_num', $data['bank_ref_num']);
    $this->db->set('hash', $data['hash']);
    $this->db->set('user_id', $data['user_id']);
    $this->db->set('sp_id',$data['sp_id']);
    $this->db->set('booking_id',$data['booking_id']);
    $this->db->set('quot_Id',$data['quot_Id']);
    $this->db->set('addons_select',$data['isAddons']);
    $this->db->set('gst',$data['gst']);
    $this->db->set('platform_fee',$data['spFee']);
    $this->db->set('net_amount',$data['netAmount']);
    $this->db->set('date_created',gmdate("Y-m-d H:i:s"));

    $returntmp = $this->db->insert($this->table_trans);
    return $returntmp;
  }

  public function getBookedQuotationsById($data){
    $this->db->select('id as quotId');
    $this->db->select('sp_id as spId');
    $this->db->select('client_id as clientId');
    $this->db->select('service_id as serviceId');
    $this->db->select('booking_id as bookingId');
    $this->db->select('sessions as sessions');
    $this->db->select('actual_price as actualPrice');
    $this->db->select('extra_price as extraPrice');
    $this->db->select('discount as discount');
    $this->db->select('total_price as totalPrice');
    $this->db->select('addOn as addOn');
    $this->db->select('spmorning as spmorning');
    $this->db->select('spevening as spevening');
    $this->db->select('spafternoon as spafternoon');
    $this->db->select('amount_paid as amountPaid');    

    $this->db->from($this->table_quotations);
    $this->db->where('client_id', $data['userId']);
    $this->db->where('booking_id', $data['bookingId']);
    $this->db->where('service_id', $data['serviceId']);
    $this->db->where('status', 'Booked');
    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getquotationsById($data){
    $this->db->select('id as quotId');
    $this->db->select('sp_id as spId');
    $this->db->select('client_id as clientId');
    $this->db->select('service_id as serviceId');
    $this->db->select('booking_id as bookingId');
    $this->db->select('sessions as sessions');
    $this->db->select('actual_price as actualPrice');
    $this->db->select('extra_price as extraPrice');
    $this->db->select('discount as discount');
    $this->db->select('total_price as totalPrice');
    $this->db->select('amount_paid as amountPrice');
    $this->db->select('pet_id as petId');

    $this->db->select('spmorning as spmorning');
    $this->db->select('spevening as spevening');
    $this->db->select('spafternoon as spafternoon');

    $this->db->from($this->table_quotations);
    $this->db->where('client_id', $data['clientId']);
    $this->db->where('sp_id', $data['spId']);
    $this->db->where('id', $data['bookingId']);
    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function deleteSitting($id){
    $this->db->set('status', 'Deleted');
    $this->db->where('id', $id);    
    $returntmp = $this->db->update($this->table_sitting);
    return $returntmp;    
  }

  public function deleteVet($id){
    $this->db->set('status', 'Deleted');
    $this->db->where('id', $id);    
    $returntmp = $this->db->update($this->table_vet);
    return $returntmp;    
  }

  public function deleteWalking($id){
    $this->db->set('status', 'Deleted');
    $this->db->where('id', $id);    
    $returntmp = $this->db->update($this->table_walking);
    return $returntmp;    
  }

  public function deleteTrainig($id){
    $this->db->set('status', 'Deleted');
    $this->db->where('id', $id);    
    $returntmp = $this->db->update($this->table_training);
    return $returntmp;    
  }

  public function deleteGrooming($id){
    $this->db->set('status', 'Deleted');
    $this->db->where('id', $id);    
    $returntmp = $this->db->update($this->table_grooming);
    return $returntmp;    
  }   


  public function deleteBoarding($id){
    $this->db->set('status', 'Deleted');
    $this->db->where('id', $id);    
    $returntmp = $this->db->update($this->table_boarding);
    return $returntmp;    
  }      

  public function getSittingDetailsById($id){
    $this->db->select('longitude as longitude');
    $this->db->select('latitude as latitude');
    $this->db->select('pet_id as petId');
    $this->db->select('from_date as bookingDate');

    $this->db->from($this->table_sitting);
    $this->db->where('id', $id);
    $this->db->order_by('created_at','desc');
    
    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function getVetDetailsById($id){
    $this->db->select('longitude as longitude');
    $this->db->select('latitude as latitude');
    $this->db->select('pet_id as petId');
    $this->db->select('booking_date as bookingDate');

    $this->db->from($this->table_vet);
    $this->db->where('id', $id);
    $this->db->order_by('created_at','desc');

    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getWalkingDetailsById($id){

    $this->db->select('package_id as packageId');
    $this->db->select('longitude as longitude');
    $this->db->select('latitude as latitude');
    $this->db->select('pet_id as petId');
    $this->db->select('from_date as bookingDate');    

    $this->db->select('to_date as toDay');
    $this->db->select('day_walks as noOfWalks');
    $this->db->select('timings as ctiming');    

    $this->db->from($this->table_walking);
    $this->db->where('id', $id);
    $this->db->order_by('created_at','desc');

    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getTrainigDetailsById($id){
    $this->db->select('package_id as packageId');
    $this->db->select('extra_addons as addOns');
    $this->db->select('longitude as longitude');
    $this->db->select('latitude as latitude');
    $this->db->select('pet_id as petId');
    $this->db->select('booking_date as bookingDate');
    $this->db->select('extra_addons as extraAddons');
    $this->db->select('booking_time as bookTime');

    $this->db->from($this->table_training);
    $this->db->where('id', $id);
    $this->db->order_by('created_at','desc');

    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getGroomingDetailsById($id){
    $this->db->select('pet_id as petId');
    $this->db->select('service_id as serviceId');
    $this->db->select('package_id as packageId');
    $this->db->select('extra_addons as addOns');
    $this->db->select('longitude as longitude');
    $this->db->select('latitude as latitude');
    $this->db->select('hair_cut as hair_cut');
    $this->db->select('booking_date as bookingDate');
    $this->db->select('booking_time as bookingTime');
    
    $this->db->from($this->table_grooming);
    $this->db->where('id', $id);
    $this->db->order_by('created_at', 'desc');

    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getBoardingDetailsById($id){
    $this->db->select('add_ons as addOns');
    $this->db->select('longitude as longitude');
    $this->db->select('latitude as latitude');

    $this->db->select('pet_id as petId');
    $this->db->select('service_id as serviceId');
    $this->db->select('from_date as fromDate');
    $this->db->select('to_date as toDate');
    
    $this->db->from($this->table_boarding);
    $this->db->where('id', $id);
    $this->db->order_by('created_at','desc');

    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function getActiveBoarding($cid,$petId){
    $this->db->select('id as id');
    $this->db->select('client_id as clintId');
    $this->db->select('pet_id as petId');
    $this->db->select('service_id as seId');
    $this->db->select('add_ons as addOns');
    $this->db->select('from_date as fromDate');
    $this->db->select('to_date as toDate');
    
    $this->db->from($this->table_boarding);
    $this->db->where('client_id', $cid);
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }
    $this->db->where_in('status', array('Submitted','Quote Sent'));
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function getActiveGrooming($cid,$petId){
    $this->db->select('id as id');
    $this->db->select('client_id as clintId');
    $this->db->select('pet_id as petId');
    $this->db->select('package_id as packageId');
    $this->db->select('service_id as seId');
    $this->db->select('hair_cut as hairCut');
    $this->db->select('extra_addons as addOns');
    $this->db->select('booking_date as bookingDate');
    $this->db->select('booking_time as bookingTime');
    
    $this->db->from($this->table_grooming);
    $this->db->where('client_id', $cid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function getActiveTraining($cid,$petId){
    $this->db->select('id as id');
    $this->db->select('client_id as clintId');
    $this->db->select('service_id as seId');
    $this->db->select('pet_id as petId');
    $this->db->select('package_id as packageId');
    $this->db->select('extra_addons as addOns');
    $this->db->select('booking_date as bookingDate');
    $this->db->select('booking_time as bookingTime');
    
    $this->db->from($this->table_training);
    $this->db->where('client_id', $cid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getActiveWalking($cid,$petId){
    $this->db->select('id as id');
    $this->db->select('client_id as clintId');
    $this->db->select('service_id as seId');
    $this->db->select('pet_id as petId');
    $this->db->select('package_id as packageId');
    $this->db->select('timings as timings');
    //$this->db->select('extra_addons as addOns');
    //$this->db->select('booking_date as bookingDate');
    //$this->db->select('booking_time as bookingTime');
    
    $this->db->select('days_type as daysType');
    $this->db->select('day_walks as dayWalks');
    $this->db->select('from_date as fromDate');
    $this->db->select('to_date as toDate');

    $this->db->from($this->table_walking);
    $this->db->where('client_id', $cid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getActiveVet($cid,$petId){
    $this->db->select('id as id');
    $this->db->select('client_id as clintId');
    $this->db->select('service_id as seId');
    $this->db->select('pet_id as petId');
    //$this->db->select('package_id as packageId');
    //$this->db->select('extra_addons as addOns');
    //- $this->db->select('days_type as daysType');
    //- $this->db->select('day_walks as dayWalks');
    //- $this->db->select('from_date as fromDate');
    //- $this->db->select('to_date as toDate');

    $this->db->select('booking_date as bookingDate');
    $this->db->select('booking_time as bookingTime');
    $this->db->select('pet_issue as petIssue');
    $this->db->select('service_type as serviceType');
    $this->db->select('about_issue as aboutIssue');    

    $this->db->from($this->table_vet);
    $this->db->where('client_id', $cid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function getActiveSitting($cid,$petId){
    $this->db->select('id as id');
    $this->db->select('client_id as clintId');
    $this->db->select('service_id as seId');
    $this->db->select('pet_id as petId');
    //$this->db->select('package_id as packageId');
    //$this->db->select('extra_addons as addOns');
    //- $this->db->select('day_walks as dayWalks');
    //- $this->db->select('booking_date as bookingDate');
    //- $this->db->select('booking_time as bookingTime');
    //- $this->db->select('pet_issue as petIssue');
    //- $this->db->select('service_type as serviceType');
    //- $this->db->select('about_issue as aboutIssue');   

    $this->db->select('from_date as fromDate');
    $this->db->select('to_date as toDate');
    $this->db->select('day_type as daysType');
    $this->db->select('from_time as fromTime');
    $this->db->select('to_time as toTime');
 

    $this->db->from($this->table_sitting);
    $this->db->where('client_id', $cid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    if (!empty($petId)) {
      $this->db->where('pet_id', $petId);
    }

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getPetsById($custid,$dogid){
    $this->db->select('id as id');
    $this->db->select('pet_name as name');
    $this->db->select('breed_type as breed');
    $this->db->select('dob as dob');
    
    $this->db->from($this->table_cpets);
    $this->db->where('customer_id', $custid);
    $this->db->where('id', $dogid);
    $this->db->limit('1');
     
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getPackages($serviceId){
    $this->db->select('id as id');
    $this->db->select('name as name');
    $this->db->select('general_addons as generalAddons');
    $this->db->select('total_sessions as totalSessions');
    $this->db->select('price as price');

    $this->db->from($this->table_packages);
    $this->db->where('id', $serviceId);
    $this->db->limit('1');
     
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getServiceById($sid){
    $this->db->select('id as id');
    $this->db->select('name as name');
    
    $this->db->from($this->table_services);
    $this->db->where('id', $sid);
    $this->db->limit('1');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getUserquotations($data){

    $this->db->select('id as quotId');
    $this->db->select('sp_id as spId');
    $this->db->select('client_id as clientId');
    $this->db->select('service_id as serviceId');
    $this->db->select('booking_id as bookingId');
    $this->db->select('sessions as sessions');
    $this->db->select('actual_price as actualPrice');
    $this->db->select('extra_price as extraPrice');
    $this->db->select('discount as discount');
    $this->db->select('total_price as totalPrice');
    $this->db->select('status as status');
    $this->db->select('isFavorite as favorite');

    $this->db->from($this->table_quotations);
    $this->db->where('client_id', $data['clientId']);
    $this->db->where('service_id', $data['serviceId']);
    $this->db->where('booking_id', $data['bookingId']);
    if (array_key_exists('petId', $data)) {
      $this->db->where('pet_id', $data['petId']);
    }
    $this->db->order_by('isFavorite', 'DESC');
    $this->db->order_by('updated_at', 'DESC');
    

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function checkquot($data){
    $this->db->select('id as id');
    
    $this->db->from($this->table_quotations);
    $this->db->where('client_id', $data['clientId']);
    $this->db->where('service_id', $data['serviceId']);
    $this->db->where('booking_id', $data['bookingId']);
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function jobsCompleted($spId){
    $this->db->select('id as id');
    
    $this->db->from($this->table_quotations);
    $this->db->where('sp_id', $spId);
    $this->db->where('status', 'Closed');
    
    $query = $this->db->get();
    return $query->num_rows();
  }

  /*
  public function getquotServiceTypes($data){


    $this->db->select('service_id as serviceId');
    

    $this->db->from($this->table_quotations);
    $this->db->where('client_id', $data['clientId']);
    $this->db->where('status', 'Submitted');
    $this->db->group_by('service_id');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }*/

  public function isBoardBooking($sid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_boarding);
    $this->db->where('client_id', $sid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function isGromBooking($sid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_grooming);
    $this->db->where('client_id', $sid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function isTrainBooking($sid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_training);
    $this->db->where('client_id', $sid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function isWalkBooking($sid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_walking);
    $this->db->where('client_id', $sid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
 
   public function isVetBooking($sid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_vet);
    $this->db->where('client_id', $sid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }  

   public function isSitBooking($sid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_sitting);
    $this->db->where('client_id', $sid);
    $this->db->where_in('status', array('Submitted','Quote Sent'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }   

  public function spsImgList($spId){
    $this->db->select('id as photoId');
    $this->db->select('photo as photo');

    $this->db->from($this->table_spimages);
    $this->db->where('sp_uid', $spId);

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function deleteSPSimage($data){
    $returntmp = $this->db->delete($this->table_spimages, array('sp_uid' => $data['spId'], 'id' =>$data['photoId']));
    return $returntmp;    
  }

  public function totalRequestAmount($spId){
    $this->db->select('SUM(net_amount) + SUM(platform_fee) as total', FALSE);
    
    $this->db->from($this->table_trans);
    $this->db->where('sp_id', $spId);
    $this->db->where('release_request', '1');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function totalCiRequestAmount($ciId){
    $this->db->select('SUM(net_amount) + SUM(platform_fee) as total', FALSE);
    
    $this->db->from($this->table_trans);
    $this->db->where('user_id', $ciId);
    $this->db->where('release_request', '0');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function totalSpReleasedAmount($spId){
    $this->db->select('SUM(net_amount) as total', FALSE);
    $this->db->from($this->table_trans);
    $this->db->where('sp_id', $spId);
    $this->db->where('release_request', '2');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function totalReleasedAmount($spId){
    $this->db->select('SUM(net_amount) as total', FALSE);
    $this->db->from($this->table_trans);
    $this->db->where('sp_id', $spId);
    $this->db->where_in('release_request', array('1','2'));

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function totalCiReleasedAmount($ciId){
    $this->db->select('SUM(net_amount) + SUM(platform_fee) as total', FALSE);
    $this->db->from($this->table_trans);
    $this->db->where('user_id', $ciId);
    $this->db->where('release_request', '2');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function totalDetailsList($spId,$status){
    $this->db->select('user_id as userId');
    $this->db->select('sp_id as spId');
    $this->db->select('booking_id as bookId');
    $this->db->select('quot_Id as quotId');
    $this->db->select('release_request as reqStatus');
    $this->db->select('net_amount as nAmount');
    $this->db->select('platform_fee as platFee');
    $this->db->select('release_date as relDate');

    $this->db->from($this->table_trans);
    $this->db->where('sp_id', $spId);
    if ($status == 'all') {
      $this->db->where_in('release_request', array('1','2'));
    }else{
      $this->db->where('release_request', $status);      
    }
    $this->db->order_by('release_date','desc');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function totalCiDetailsList($ciId){
    $this->db->select('user_id as userId');
    $this->db->select('sp_id as spId');
    $this->db->select('booking_id as bookId');
    $this->db->select('quot_Id as quotId');
    $this->db->select('release_request as reqStatus');
    $this->db->select('net_amount as nAmount');
    $this->db->select('platform_fee as platFee');
    $this->db->select('release_date as relDate');

    $this->db->from($this->table_trans);
    $this->db->where('user_id', $ciId);
    $this->db->where_in('release_request', array('0','1','2'));
    $this->db->order_by('release_date','desc');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getQuotDetailsById($data){
    $this->db->select('id as quotId');
    $this->db->select('sp_id as spId');
    $this->db->select('client_id as clientId');
    $this->db->select('service_id as serviceId');
    $this->db->select('booking_id as bookingId');
    $this->db->select('sessions as sessions');
    $this->db->select('actual_price as actualPrice');
    $this->db->select('extra_price as extraPrice');
    $this->db->select('discount as discount');
    $this->db->select('total_price as totalPrice');

    $this->db->from($this->table_quotations);
    $this->db->where('sp_id', $data['spId']);
    $this->db->where('client_id', $data['clientId']);
    $this->db->where('booking_id', $data['bookId']);
    $this->db->where('id', $data['quotId']);
    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function getAllSpQuots($spId){
    $this->db->select('id as quotId');
    $this->db->select('sp_id as spId');
    $this->db->select('client_id as clientId');
    $this->db->select('service_id as serviceId');
    $this->db->select('booking_id as bookingId');
    $this->db->select('sessions as sessions');
    $this->db->select('actual_price as actualPrice');
    $this->db->select('extra_price as extraPrice');
    $this->db->select('discount as discount');
    $this->db->select('total_price as totalPrice');

    $this->db->from($this->table_quotations);
    $this->db->where('sp_id', $spId);
    $this->db->where_in('status', array('Submitted'));
    $this->db->order_by('id', 'DESC');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function getWinnSpQuot($clientId,$bookingId,$serviceId){
    $this->db->select('id as quotId');
    $this->db->select('sp_id as spId');
    $this->db->select('client_id as clientId');
    $this->db->select('service_id as serviceId');
    $this->db->select('booking_id as bookingId');
    $this->db->select('sessions as sessions');
    $this->db->select('actual_price as actualPrice');
    $this->db->select('extra_price as extraPrice');
    $this->db->select('discount as discount');
    $this->db->select('total_price as totalPrice');

    $this->db->from($this->table_quotations);
    $this->db->where('client_id', $clientId);
    $this->db->where('booking_id', $bookingId);
    $this->db->where('service_id', $serviceId);
    $this->db->where_in('status', array('Booked','Closed'));
    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function bookedBoard($cid,$bookid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_boarding);
    $this->db->where('client_id', $cid);
    $this->db->where('id', $bookid);
    $this->db->where_in('status', array('Booked','Closed'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function bookedGroom($cid,$bookid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_grooming);
    $this->db->where('client_id', $cid);
    $this->db->where('id', $bookid);
    $this->db->where_in('status', array('Booked','Closed'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function bookedTrain($cid,$bookid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_training);
    $this->db->where('client_id', $cid);
    $this->db->where('id', $bookid);
    $this->db->where_in('status', array('Booked','Closed'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function bookedWalk($cid,$bookid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_walking);
    $this->db->where('client_id', $cid);
    $this->db->where('id', $bookid);
    $this->db->where_in('status', array('Booked','Closed'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function bookedVet($cid,$bookid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_vet);
    $this->db->where('client_id', $cid);
    $this->db->where('id', $bookid);
    $this->db->where_in('status', array('Booked','Closed'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function bookedSit($cid,$bookid){
    $this->db->select('id as id');
    
    $this->db->from($this->table_sitting);
    $this->db->where('client_id', $cid);
    $this->db->where('id', $bookid);
    $this->db->where_in('status', array('Booked','Closed'));
    $this->db->limit('1');
   
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }



  public function getSpQuot($data){
    $this->db->select('id as id');

    
    $this->db->from($this->table_quotations);
    $this->db->where('sp_id', $data['spId']);
    $this->db->where('service_id', $data['serviceId']);
    $this->db->where('booking_id', $data['bookingId']);
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function updateFavorite($quotId,$favorite){
    $this->db->set('isFavorite',$favorite);

    $this->db->where('id', $quotId);
    $result = $this->db->update($this->table_quotations);
    return $result;
  }


  public function createSpBankDetails($data){
    $this->db->set('user_id', $data['userId']);
    $this->db->set('full_name', $data['fullName']);
    $this->db->set('bank_name', $data['bankName']);
    $this->db->set('acc_number', $data['accNumber']);
    $this->db->set('branch_name', $data['branchName']);
    $this->db->set('ifsc_code', $data['ifscCode']);
    $this->db->set('date_created',gmdate("Y-m-d H:i:s"));
 
    $returntmp = $this->db->insert($this->table_spBankDeta);
    return $returntmp;
  }


  public function updateSpBankDetails($data,$bankId){
    $this->db->set('full_name', $data['fullName']);
    $this->db->set('bank_name', $data['bankName']);
    $this->db->set('acc_number', $data['accNumber']);
    $this->db->set('branch_name', $data['branchName']);
    $this->db->set('ifsc_code', $data['ifscCode']);

    $this->db->where('id', $bankId);
    $result = $this->db->update($this->table_spBankDeta);
    return $result;
  }


  public function checkBankExist($userId){
    $this->db->select('id as id');
    $this->db->select('user_id as userId');
    $this->db->select('full_name as fullName');
    $this->db->select('bank_name as bankName');
    $this->db->select('acc_number as accNumber');
    $this->db->select('branch_name as branchName');
    $this->db->select('ifsc_code as ifscCode');

    $this->db->from($this->table_spBankDeta);
    $this->db->where('user_id', $userId);
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;    
  }


  public function createSpUpiDetails($data){
    $this->db->set('user_id', $data['userId']);
    $this->db->set('full_name', $data['fullName']);
    $this->db->set('upi_provider', $data['provider']);
    $this->db->set('mobile_number', $data['mNumber']);
    $this->db->set('date_created',gmdate("Y-m-d H:i:s"));
 
    $returntmp = $this->db->insert($this->table_spupi);
    return $returntmp;
  }


  public function updateSpUpiDetails($data,$bankId){
    $this->db->set('full_name', $data['fullName']);
    $this->db->set('upi_provider', $data['provider']);
    $this->db->set('mobile_number', $data['mNumber']);

    $this->db->where('id', $bankId);
    $result = $this->db->update($this->table_spupi);
    return $result;
  }


  public function checkUpiExist($userId){
    $this->db->select('id as id');
    $this->db->select('user_id as userId');
    $this->db->select('full_name as fullName');
    $this->db->select('upi_provider as provider');
    $this->db->select('mobile_number as mNumber');

    $this->db->from($this->table_spupi);
    $this->db->where('user_id', $userId);
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;    
  }


  public function createCiNotifi($userId, $token){
    $this->db->set('user_id', $userId);
    $this->db->set('device_token', $token);
    $this->db->set('date_created',gmdate("Y-m-d H:i:s"));
 
    $returntmp = $this->db->insert($this->table_ciUserSubs);
    return $returntmp;
  }


  public function updateCiNotifi($userId, $token){
    $this->db->set('device_token',$token);
    
    $this->db->where('user_id', $userId);
    $result = $this->db->update($this->table_ciUserSubs);
    return $result;
  }

  public function checkCiNotifi($userId){
    $this->db->select('id as id');
    $this->db->select('user_id as userId');
    $this->db->select('device_token as devToken');

    $this->db->from($this->table_ciUserSubs);
    $this->db->where('user_id', $userId);
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;    
  }


  public function createSpNotifi($userId, $token){
    $this->db->set('user_id', $userId);
    $this->db->set('device_token', $token);
    $this->db->set('date_created',gmdate("Y-m-d H:i:s"));
 
    $returntmp = $this->db->insert($this->table_spUserSubs);
    return $returntmp;
  }


  public function updateSpNotifi($userId, $token){
    $this->db->set('device_token',$token);
    
    $this->db->where('user_id', $userId);
    $result = $this->db->update($this->table_spUserSubs);
    return $result;
  }

  public function checkSpNotifi($userId){
    $this->db->select('id as id');
    $this->db->select('user_id as userId');
    $this->db->select('device_token as devToken');

    $this->db->from($this->table_spUserSubs);
    $this->db->where('user_id', $userId);
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;    
  }

public function get_sp_dtokens($userId){
    $this->db->select('device_token');
    $this->db->from($this->table_spUserSubs);
    $this->db->where('user_id', $userId);
    $query = $this->db->get();
    $result = $query->result();
    return $result;   
}
public function get_ci_dtokens($userId){
    $this->db->select('device_token');
    $this->db->from($this->table_ciUserSubs);
    $this->db->where('user_id', $userId);
    $query = $this->db->get();
    $result = $query->result();
    return $result;   
}
}