<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/crud_model', 'crud_model');
		$this->load->model('admin/user_model', 'user_model'); 
	}

	public function index(){

		$data['title'] = 'Bookings';
		$data['bookings'] = $this->crud_model->get_all('bookings');

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/bookings',$data);
		$this->load->view('admin/includes/_footer');

	}

	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('bookings', array('id' => $id));
		$this->session->set_flashdata('success', 'Booking has been deleted successfully!');
		redirect(base_url('admin/bookings'));
	}
	
}


	?>