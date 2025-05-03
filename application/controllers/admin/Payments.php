<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/crud_model', 'crud_model');
		$this->load->model('admin/user_model', 'user_model'); 
	}

	public function index(){

		$data['title'] = 'Payments';
		$data['payments'] = $this->crud_model->get_all('payments');
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/payments',$data);
		$this->load->view('admin/includes/_footer');

	}

	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('payments', array('id' => $id));
		$this->session->set_flashdata('success', 'Payments has been deleted successfully!');
		redirect(base_url('admin/payments'));
	}
	
}


	?>