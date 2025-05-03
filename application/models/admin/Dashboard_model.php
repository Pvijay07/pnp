<?php
	class Dashboard_model extends CI_Model{

		public function get_all_users(){

			return $this->db->count_all('ci_users');
		}

		//--------------------------------------------------------------
		public function get_all_refferals(){

			return $this->db->count_all('refferals');
		}

		//--------------------------------------------------------------
		public function get_earnings(){

			$this->db->select('SUM(amount) AS earnings');
			$this->db->from('refferals');
			$query = $this->db->get();
			return $query->row();
		}
	}



?>
