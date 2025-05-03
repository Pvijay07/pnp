<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/crud_model', 'crud_model');
		$this->load->model('admin/user_model', 'user_model');

	}

	public function index(){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('name', 'Website Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('timezone', 'Time Zone', 'trim|required');
			$this->form_validation->set_rules('copyright', 'Copyrights', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data['view'] = 'admin/refferals/refferal_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'application_name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'timezone' => $this->input->post('timezone'),
					'currency' => $this->input->post('currency'),
					'copyright' => $this->input->post('copyright'),
					'address' => $this->input->post('address'),
					'email_from' => $this->input->post('email_from'),
					'smtp_host' => $this->input->post('smtp_host'),
					'smtp_port' => $this->input->post('port'),
					'smtp_user' => $this->input->post('username'),
					'smtp_port' => $this->input->post('port'),
					'smtp_pass' => $this->input->post('password'),
					'smtp_port' => $this->input->post('port')
				);

				if($this->input->post('password') != '')
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->edit('ci_general_settings', $data, 1);
				if($result){
					$this->session->set_flashdata('success', 'Settings has been updated successfully!');
					redirect(base_url('admin/settings'));
				}
			}
		}
		else{

			$data['title'] = 'Settings';
			$data['settings'] = $this->crud_model->select_row('ci_general_settings', ["id"=>1]);

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/settings',$data);
			$this->load->view('admin/includes/_footer');

		}
	}




}


?>