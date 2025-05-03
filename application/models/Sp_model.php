<?php
class Sp_model extends CI_Model{


  public function __construct(){
    parent::__construct();
    $this->table_sp = 'service_providers';
    $this->table_ci = 'ci_users';
  }



  public function updateSpNotifi($spId){
    $this->db->set("isNotified", "isNotified + 1", FALSE);

    $this->db->where('id', $spId);
    $result = $this->db->update($this->table_sp);
    return $result;
  }


  public function updateCiNotifi($ciId){
    $this->db->set("isNotified", "isNotified + 1", FALSE);

    $this->db->where('id', $ciId);
    $result = $this->db->update($this->table_ci);
    return $result;
  }


  public function removeSpNotifi($spId){
    $this->db->set('isNotified','0');

    $this->db->where('id', $spId);
    $result = $this->db->update($this->table_sp);
    return $result;
  }


  public function removeCiNotifi($ciId){
    $this->db->set('isNotified','0');

    $this->db->where('id', $ciId);
    $result = $this->db->update($this->table_ci);
    return $result;
  }  

  public function getSPDetails($spId){
    $this->db->select('first_name as firstName');
    $this->db->select('last_name as lastName');
    $this->db->select('photo as photo');
    $this->db->select('latitude as latitude');
    $this->db->select('longitude as longitude');
    $this->db->select('service_id as serviceId');
    $this->db->select('city as city');
    $this->db->select('isId_approved as idArrove');
    $this->db->select('isaddress_approved as addrArrove');
    $this->db->select('iscrt_approved as crtArrove');
    $this->db->select('pnp_verified as pnpVerified');
    $this->db->select('isNotified as isNotified');
    

    $this->db->from($this->table_sp);
    $this->db->where('id', $spId);
    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function getCIDetails($ciId){
    $this->db->select('id as id');
    $this->db->select('name as name');
    $this->db->select('email as email');
    $this->db->select('phone as phone');
    $this->db->select('profile_pic as profilePic');
    $this->db->select('wallet_amount as wallAmount');
    $this->db->select('isNotified as isNotified');

    $this->db->from($this->table_ci);
    $this->db->where('id', $ciId);
    $this->db->limit('1');
    
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function updateCIWalletAmount($userId,$amount){
    $this->db->set('wallet_amount',$amount);

    $this->db->where('id', $userId);
    $result = $this->db->update($this->table_ci);
    return $result;
  }


  public function updateSPServices($userId,$service){
    $this->db->set('service_id',$service);

    $this->db->where('id', $userId);
    $result = $this->db->update($this->table_sp);
    return $result;
  }

}