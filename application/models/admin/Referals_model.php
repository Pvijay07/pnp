<?php
	class Crud_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('ci_users', $data);
			return true;
		}

		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_refferals(){
			
			$this->db->select('*');
			$this->db->from('refferals');
			$this->db->order_by('id', 'desc');
			$query = $this->db->get();
			return $query->result();
		}


		//---------------------------------------------------
		// Get user detial by ID
		public function get_user_by_id($id){
			$query = $this->db->get_where('ci_users', array('id' => $id));
			return $result = $query->row();
		}

		//---------------------------------------------------
		// Get user detial by ID
		public function get_refferal_id($id){
			$query = $this->db->get_where('refferals', array('id' => $id));
			return $result = $query->row();
		}

		//---------------------------------------------------
		// Edit user Record
		public function edit($data, $id){
			$this->db->where('id', $id);
			$this->db->update('refferals', $data);
			return true;
		}

		//---------------------------------------------------
		// Change user status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('ci_users');
		} 

		//---------------------------------------------------
		// get users for csv export
		public function get_refferals_for_export(){
			
			$this->db->select('refferals.id, refferals.student, refferals.mobile, refferals.course, refferals.status, ci_users.name');
			$this->db->from('refferals');
			$this->db->join('ci_users', 'ci_users.id = refferals.user_id', 'left');
			$query = $this->db->get();

			return $result = $query->result_array();
		}

	}

?>