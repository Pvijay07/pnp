<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/crud_model', 'crud_model');
		$this->load->model('admin/user_model', 'user_model');
	}

	public function index(){

		$data['title'] = 'Packages';
		$data['packages'] = $this->crud_model->select_all('packages');

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/packages',$data);
		$this->load->view('admin/includes/_footer');

	}


	//-----------------------------------------------------------
	public function add(){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('category', 'Category', 'trim|required');
			$this->form_validation->set_rules('content', 'Description', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/courses/add'),'refresh');
			}
			else{

				if(!empty($_FILES['image']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'image', 'image', '99097152');
					if($result['status'] == 1){
						$image = $path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/courses/add'),'refresh');
					}
				} else {

					$image = "";
				}

				$data = array(
					'name' => $this->input->post('name'),
					'category' => $this->input->post("category"),
					'image' => $image,
					'content' => $this->input->post("content"),
					'status' => $this->input->post('status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->add('courses', $data);

				if($result){

					$this->session->set_flashdata('success', 'Course has been added successfully!');
					redirect(base_url('admin/courses/add'));
				}
			}
		}
		else{

			$data['title'] = 'Add Course';
			$data['categories'] = $this->crud_model->get_all("category");

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/course-add', $data);
			$this->load->view('admin/includes/_footer');

		}

	}

	//-----------------------------------------------------------
	public function edit($id){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('category', 'Category', 'trim|required');
			$this->form_validation->set_rules('content', 'Description', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/courses/edit.'.$id),'refresh');
			}
			else{

				if(!empty($_FILES['image']['name']))
				{
					$path = "uploads/";
					$result = $this->functions->file_insert($path, 'image', 'image', '99097152');
					if($result['status'] == 1){
						$image = $path.$result['msg'];
					}
					else{

						$this->session->set_flashdata('errors', $result['msg']);
						redirect(base_url('admin/courses/edit.'.$id),'refresh');
					}
				} else {

					$image = $this->input->post('old_image');
				}

				$data = array(
							'name' => $this->input->post('name'),
							'category' => $this->input->post("category"),
							'image' => $image,
							'content' => $this->input->post("content"),
							'status' => $this->input->post('status')
				);

				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->edit('courses', $data, $id);

				if($result){

					$this->session->set_flashdata('success', 'Category has been updated successfully!');
					redirect(base_url('admin/courses/edit/'.$id));
				}
			}
		}
		else{

			$data['title'] = 'Edit Course';

			$data['course'] = $this->crud_model->get_by_id('courses', $id);
			$data['categories'] = $this->crud_model->get_all("category");

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/course-edit', $data);
			$this->load->view('admin/includes/_footer');

		}


	}


	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		$course_info = $this->crud_model->get_by_id("courses",$id);

		$check = $this->crud_model->check_availability("guru_courses",array("course"=>$course_info->category));

		if($check == 0){
			$this->db->delete('courses', array('id' => $id));
			$this->session->set_flashdata('success', 'Course has been deleted successfully!');
			redirect(base_url('admin/courses'));
		} else {
			$this->session->set_flashdata('success', 'This Course has been assigned to Others');
			redirect(base_url('admin/courses'));
		}

	}


}


	?>