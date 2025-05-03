<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/crud_model', 'crud_model');
		$this->load->model('admin/user_model', 'user_model');
	}

	public function index(){

		$data['title'] = 'Services';
		$data['services'] = $this->crud_model->select_all('services');

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/services',$data);
		$this->load->view('admin/includes/_footer');

	}


	//-----------------------------------------------------------
	public function add(){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/services/add'),'refresh');
			}
			else{

				if(!empty($_FILES['image']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'image', 'image', '99097152');
					if($result['status'] == 1){
						$image = base_url().$path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/services/add'),'refresh');
					}
				} else {

					$image = "";
				}

				$data = array(
					'name' => $this->input->post('name'),
					'icon' => $image,
					'banner' => "",
					'status' => $this->input->post('status')
				);

				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->insert('services', $data);

				if($result){

					$this->session->set_flashdata('success', 'Service has been added successfully!');
					redirect(base_url('admin/services/add'));
				}
			}
		}
		else{

			$data['title'] = 'Add Service';

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/service-add', $data);
			$this->load->view('admin/includes/_footer');

		}

	}

	//-----------------------------------------------------------
	public function edit($id){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/services/edit/'.$id),'refresh');
			}
			else{

				if(!empty($_FILES['image']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'image', 'image', '99097152');
					if($result['status'] == 1){
						$image = base_url().$path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/services/edit/'.$id),'refresh');
					}
				} else {

					$image = $this->input->post('old_image');
				}

				$data = array(
					'name' => $this->input->post('name'),
					'icon' => $image,
					'status' => $this->input->post('status')
				);

				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->update('services', $data, ["id"=>$id]);

				if($result){

					$this->session->set_flashdata('success', 'Category has been updated successfully!');
					redirect(base_url('admin/services/edit/'.$id));
				}
			}
		}
		else{

			$data['title'] = 'Edit Service';

			$data['service'] = $this->crud_model->select_row('services', ['id'=>$id]);

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/service-edit', $data);
			$this->load->view('admin/includes/_footer');

		}


	}


	//-----------------------------------------------------------
	public function delete($id = 0)
	{

		$check = $this->crud_model->check_availability("courses",array("category"=>$id));
		if($check == 0){
			$this->db->delete('category', array('id' => $id));
			$this->session->set_flashdata('success', 'Category has been deleted successfully!');
			redirect(base_url('admin/category'));
		} else {
			$this->session->set_flashdata('success', 'This Category has been assigned to Others');
			redirect(base_url('admin/category'));
		}
	}


}


	?>