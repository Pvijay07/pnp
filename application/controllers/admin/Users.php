<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/user_model', 'user_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){

		$data['title'] = 'User List';
		$data['users'] = $this->user_model->get_all_users();

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/users/user_list',$data);
		$this->load->view('admin/includes/_footer');
	}
	
	

	//-----------------------------------------------------------
	public function change_status(){   

		$this->user_model->change_status();
	}

	//-----------------------------------------------------------
	public function add(){

		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('register_type', 'Register Type', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('payment_type', 'Payment Type', 'trim|required');
			$this->form_validation->set_rules('pay_mobile', 'UPI Mobile No.', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/users/add'),'refresh');
			}
			else{
				$ref_code = "ACE-".rand(100000,999999);
				$data = array(
					'name' => $this->input->post('name'),
					'register_type' => $this->input->post('register_type'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('mobile_no'),
					'payment_type' => $this->input->post('payment_type'),
					'upi_mobile' => $this->input->post('pay_mobile'),
					'city' => $this->input->post('city'),
					'address' => $this->input->post('address'),
					'ref_code' => $ref_code,
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->add_user($data);
				if($result){
					$this->session->set_flashdata('success', 'User has been added successfully!');
					redirect(base_url('admin/users'));
				}
			}
		}
		else{

			$data['title'] = 'Add User';

			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/users/user_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}

	//-----------------------------------------------------------
	public function edit($id = 0){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('register_type', 'Register Type', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			$this->form_validation->set_rules('payment_type', 'Payment Type', 'trim|required');
			$this->form_validation->set_rules('pay_mobile', 'UPI Mobile No.', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->user_model->get_user_by_id($id);
				$data['view'] = 'admin/users/user_edit';
				echo 'hi'; exit;
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/users/user_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else{
				$data = array(
					'name' => $this->input->post('name'),
					'register_type' => $this->input->post('register_type'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('mobile_no'),
					'payment_type' => $this->input->post('payment_type'),
					'upi_mobile' => $this->input->post('pay_mobile'),
					'city' => $this->input->post('city'),
					'address' => $this->input->post('address'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->edit_user($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'User has been updated successfully!');
					redirect(base_url('admin/users'));
				}
			}
		}
		else{
			$data['title'] = 'Edit User';
			$data['user'] = $this->user_model->get_user_by_id($id);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/users/user_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_users', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/users'));
	}

	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_users_pdf(){

		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_users'] = $this->user_model->get_users_for_export();
		$this->load->view('admin/users/users_pdf', $data);
	}

	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_csv(){ 

	   // file name 
		$filename = 'users_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

	   // get data 
		$user_data = $this->user_model->get_users_for_export();

	   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("ID", "Username", "First Name", "Last Name", "Email", "Mobile_no", "Created Date"); 

		fputcsv($file, $header);
		foreach ($user_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}


}


	?>