<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Providers extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/crud_model', 'crud_model');
		$this->load->model('admin/user_model', 'user_model');
	}

	public function index(){

		$data['title'] = 'Service Providers';
		$data['providers'] = $this->crud_model->select_all('service_providers');

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/providers',$data);
		$this->load->view('admin/includes/_footer');

	}


	//-----------------------------------------------------------
	public function add(){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('service', 'service', 'trim|required');
			$this->form_validation->set_rules('phone', 'Mobile No.', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/providers/add'),'refresh');
			}
			else{

				if(!empty($_FILES['photo']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'photo', 'image', '99097152');
					if($result['status'] == 1){
						$photo = $path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/providers/add'),'refresh');
					}
				} else {

					$photo = base_url("uploads/no-image.png");
				}


				if(!empty($_FILES['id_proof']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'id_proof', 'image', '99097152');
					if($result['status'] == 1){
						$id_proof = $path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/providers/add'),'refresh');
					}
				} else {

					$id_proof = "";
				}

				if(!empty($_FILES['address_proof']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'address_proof', 'image', '99097152');
					if($result['status'] == 1){
						$address_proof = $path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/providers/add'),'refresh');
					}
				} else {

					$address_proof = "";
				}

				$data = array(
							'name' => $this->input->post('name'),
							'email' => $this->input->post("email"),
							'phone' => $this->input->post("phone"),
							'age' => $this->input->post("age"),
							'gender' => $this->input->post('gender'),
							'service_id' => $this->input->post('service'),
							'location' => $this->input->post("location"),
							"photo" => base_url($photo),
							"id_proof" => base_url($id_proof),
							"address_proof" => base_url($address_proof),
							"longitude" => $this->input->post("longitude"),
							"latitude" => $this->input->post("latitude"),
							"status" => $this->input->post("status"),
							"is_verify" => $this->input->post("verify"),
							"created_at" => date("Y-m-d H:i:s")
				);

				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->insert('service_providers', $data);

				if($result){

					$this->session->set_flashdata('success', 'Service Provider has been added successfully!');
					redirect(base_url('admin/providers/add'));
				}
			}
		}
		else{

			$data['title'] = 'Add Service Provider';
			$data['services'] = $this->crud_model->select_all("services");

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/providers-add', $data);
			$this->load->view('admin/includes/_footer');

		}

		//write php code for today date


	}

	//-----------------------------------------------------------
	public function edit($id){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('service', 'service', 'trim|required');
			$this->form_validation->set_rules('phone', 'Mobile No.', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/providers/edit/'.$id),'refresh');
			}
			else{

				if(!empty($_FILES['photo']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'photo', 'image', '99097152');
					if($result['status'] == 1){
						$photo = $path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/providers/edit/'.$id),'refresh');
					}
				} else {

					$photo = $this->input->post('old_photo');
				}


				if(!empty($_FILES['id_proof']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'id_proof', 'image', '99097152');
					if($result['status'] == 1){
						$id_proof = $path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/providers/edit/'.$id),'refresh');
					}
				} else {

					$id_proof = $this->input->post('old_id_proof');
				}

				if(!empty($_FILES['address_proof']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'address_proof', 'image', '99097152');
					if($result['status'] == 1){
						$address_proof = $path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/providers/edit/'.$id),'refresh');
					}
				} else {

					$address_proof = $this->input->post('old_address_proof');
				}

				$data = array(
							'name' => $this->input->post('name'),
							'email' => $this->input->post("email"),
							'phone' => $this->input->post("phone"),
							'age' => $this->input->post("age"),
							'gender' => $this->input->post('gender'),
							'service_id' => $this->input->post('service'),
							'location' => $this->input->post("location"),
							"photo" => base_url($photo),
							"id_proof" => base_url($id_proof),
							"address_proof" => base_url($address_proof),
							"longitude" => $this->input->post("longitude"),
							"latitude" => $this->input->post("latitude"),
							"status" => $this->input->post("status"),
							"is_verify" => $this->input->post("verify"),
							"created_at" => date("Y-m-d H:i:s")
				);

				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->update('service_providers', $data, ["id"=>$id]);

				if($result){

					$this->session->set_flashdata('success', 'Service Provider has been updated successfully!');
					redirect(base_url('admin/providers/edit/'.$id));
				}
			}
		}
		else{

			$data['title'] = 'Update Service Provider';

			$data['provider'] = $this->crud_model->select_row('service_providers', ["id"=>$id]);
			$data['services'] = $this->crud_model->select_all("services");

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/providers-edit', $data);
			$this->load->view('admin/includes/_footer');

		}


	}


	//-----------------------------------------------------------
	public function delete($id = 0)
	{

		$this->db->delete('service_providers', array('id' => $id));
		$this->session->set_flashdata('success', 'Service Provider has been deleted successfully!');
		redirect(base_url('admin/providers'));

	}


}


	?>