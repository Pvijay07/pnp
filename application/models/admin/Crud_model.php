<?php
	class Crud_model extends CI_Model{

		public function insert($table, $data){
			if($this->db->insert($table, $data)){
				return $this->db->insert_id();
			} else {
				return FALSE;
			}
		}


		//---------------------------------------------------
		public function update($table, $data, $where){
			$this->db->where($where);
			$this->db->update($table, $data);
			return true;
		}

		//---------------------------------------------------
		public function select_all($table){

			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by('id', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		//---------------------------------------------------
		public function select_some($table, $where, $limit=0){

			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by('id', 'desc');
			if($limit != 0){
				$this->db->limit($limit);
			}
			$query = $this->db->get();
			return $query->result();
		}
		//---------------------------------------------------

 public function select_a($table)
{
    $this->db->select('GROUP_CONCAT(a.device_token) AS devicetokens, s.name AS service_name, b.service_id');
    $this->db->from('sp_user_subscribe AS a');
    $this->db->join('service_providers AS b', 'a.user_id = b.id');
    $this->db->join('services AS s', 'b.service_id = s.id');
    $this->db->group_by('b.service_id');
    $query = $this->db->get();
    return $query->result();
}
		//---------------------------------------------------
		public function select_distinct($table,$field){

			$this->db->select($field);
			$this->db->distinct();
			$query = $this->db->get($table);
			return $query->result();
		}

		//---------------------------------------------------
		public function select_row($table, $where){
			$query = $this->db->get_where($table, $where);
			if($query->num_rows() != 0){
				return $result = $query->row();
			} else {
				return false;
			}
		}


		public function rowCount($table, $where){
			$query = $this->db->get_where($table, $where);
			if($query->num_rows() != 0){
				return $result = $query->num_rows();
			} else {
				return false;
			}
		}

		//---------------------------------------------------
 public function select($table, $where, $order_by = "") {

   $this->db->select('*');
   $this->db->from($table);
   $this->db->where($where);
   if (!empty($order_by)) {
    $this->db->order_by($order_by);
   }
   $query = $this->db->get();
   return $query->result();
}
		//---------------------------------------------------
		public function delete($table, $where){
			$this->db->where($where);
			$this->db->delete($table);
			return true;
		}

		// check duplicates
		public function check_availability($table, $where){
			$query = $this->db->get_where($table,$where);
			return $query->num_rows();
		}

		//sum
		public function select_sum($table, $field, $where){

			$this->db->select_sum($field);
			$this->db->where($where);
			$query = $this->db->get($table);
			return $query->row();

		}
public function select_sp($table, $like, $order_by = "")
{
    $this->db->select('*');
    $this->db->from($table);
    $this->db->like($like);
    if (!empty($order_by)) {
        $this->db->order_by($order_by);
    }
    $query = $this->db->get();
    return $query->result();
}


	}

?>