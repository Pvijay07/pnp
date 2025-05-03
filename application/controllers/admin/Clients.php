<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/crud_model', 'crud_model');
		$this->load->model('admin/user_model', 'user_model');
	}

	public function index(){

		$data['title'] = 'Clients';
		$data['clients'] = $this->crud_model->select_all('ci_users');

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/clients',$data);
		$this->load->view('admin/includes/_footer');

	}


	//-----------------------------------------------------------
	public function edit($id){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/clients/edit/'.$id),'refresh');
			}
			else{

				if(!empty($_FILES['photo']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'photo', 'image', '99097152');
					if($result['status'] == 1){
						$image = base_url().$path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/clients/edit/'.$id),'refresh');
					}
				} else {

					$image = $this->input->post('old_photo');
				}

				$data = array(
							'name' => $this->input->post('name'),
							'email' => $this->input->post("email"),
							'profile_pic' => $image,
							'is_active' => $this->input->post('status'),
							'updated_at' => date("Y-m-d H:i:s")
				);

				if(!empty($data['password'])){
					$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}

				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->update('ci_users', $data, ["id"=>$id]);

				if($result){

					$this->session->set_flashdata('success', 'Profile has been updated successfully!');
					redirect(base_url('admin/clients/edit/'.$id));
				}
			}
		}
		else{

			$data['title'] = 'Update Client';
			$data['heading'] = 'My Profile';
			$data['client'] = $this->crud_model->select_row('ci_users', ["id"=>$id]);

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/client-edit', $data);
			$this->load->view('admin/includes/_footer');

		}


	}

	//-----------------------------------------------------------
	public function pets($id){

		$data['title'] = 'Update Client Info';
		$data['heading'] = 'My Pets';
		$data['client'] = $this->crud_model->select_row('ci_users', ["id"=>$id]);
		$data['pets'] = $this->crud_model->select('pets', ["customer_id"=>$id]);

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/client-pets',$data);
		$this->load->view('admin/includes/_footer');

	}

	//-----------------------------------------------------------
	public function bookings($id){

		$data['title'] = 'Update Client Info';
		$data['heading'] = 'My Bookings';
		$data['client'] = $this->crud_model->select_row('ci_users', ["id"=>$id]);
		$data['pets'] = $this->crud_model->select('pets', ["customer_id"=>$id]);

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/client-bookings',$data);
		$this->load->view('admin/includes/_footer');

	}


	//-----------------------------------------------------------
	public function delete($id = 0)
	{

		$this->db->delete('ci_users', array('id' => $id));
		$this->session->set_flashdata('success', 'Client has been deleted successfully!');
		redirect(base_url('admin/clients'));
	}


}
?>