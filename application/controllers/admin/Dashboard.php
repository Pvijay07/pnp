<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/dashboard_model', 'dashboard_model');
		$this->load->model('admin/crud_model', 'crud_model');
	}

	//--------------------------------------------------------------------------
	public function index(){

		$data['title'] = 'Dashboard';

		$data['total_students'] = 1;
		$data['total_teachers'] = 1;
		$data['total_courses'] = 1;
		$data['total_categories'] = 1;
		$data['total_bookings'] = 1;
		$data['total_enquiries'] = 1;
		$data['pending_gurus'] = 1;

    	$this->load->view('admin/includes/_header');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/includes/_footer');

	}

	public function enquiries(){

		$data['title'] = 'Enquiries';

		$data['enquiries'] = $this->crud_model->get_all("enquiries");

    	$this->load->view('admin/includes/_header');
		$this->load->view('admin/enquiries', $data);
		$this->load->view('admin/includes/_footer');

	}


	public function contact_enquiries(){

		$data['title'] = 'Contact Enquiries';

		$data['enquiries'] = $this->crud_model->get_all("contact_enquiries");

    	$this->load->view('admin/includes/_header');
		$this->load->view('admin/contact-enquiries', $data);
		$this->load->view('admin/includes/_footer');

	}



}

?>