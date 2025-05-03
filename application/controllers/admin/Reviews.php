<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/crud_model', 'crud_model');
		$this->load->model('admin/user_model', 'user_model'); 
	}

	public function index(){

		$data['title'] = 'Reviews';
		$data['reviews'] = $this->crud_model->get_all('reviews');

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/reviews',$data);
		$this->load->view('admin/includes/_footer');

	}


	//-----------------------------------------------------------
	public function add(){

		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('guru', 'Guru Name', 'trim|required');
			$this->form_validation->set_rules('student', 'Student Name', 'trim|required');
			$this->form_validation->set_rules('rating', 'Rating', 'trim|required');
			$this->form_validation->set_rules('review', 'Review', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/reviews/add'),'refresh');
			
			}  else {
	
				$data = array(
					'guru_id' => $this->input->post('guru'),
					'student_id' => $this->input->post("student"),
					'rating' => $this->input->post("rating"),
					'review' => $this->input->post('review'),
					'created_at' => date("Y-m-d H:i:s")
				);
				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->add('reviews', $data);
				
				if($result){

					$this->session->set_flashdata('success', 'Review has been added successfully!');
					redirect(base_url('admin/reviews/add'));
				}
			}
		}
		else{

			$data['title'] = 'Add Review';
			$data['gurus'] = $this->crud_model->get_by_arry("ci_users", array('user_type' => 'Teacher'), "ORDER BY name ASC");
			$data['students'] = $this->crud_model->get_by_arry("ci_users", array('user_type' => 'Student'), "ORDER BY name ASC");

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/review-add', $data);
			$this->load->view('admin/includes/_footer');

		}			
		
	}

	//-----------------------------------------------------------
	public function edit($id){

		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('guru', 'Guru Name', 'trim|required');
			$this->form_validation->set_rules('student', 'Student Name', 'trim|required');
			$this->form_validation->set_rules('rating', 'Rating', 'trim|required');
			$this->form_validation->set_rules('review', 'Review', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/reviews/edit.'.$id),'refresh');
			}
			else{

				$data = array(
					'guru_id' => $this->input->post('guru'),
					'student_id' => $this->input->post("student"),
					'rating' => $this->input->post("rating"),
					'status' => $this->input->post("status"),
					'review' => $this->input->post('review')
				);

				$data = $this->security->xss_clean($data);
				$result = $this->crud_model->edit('reviews', $data, $id);
								
				if($result){

					$this->session->set_flashdata('success', 'Review has been updated successfully!');
					redirect(base_url('admin/reviews/edit/'.$id));
				}
			}
		}
		else{

			$data['title'] = 'Edit Review';
			
			$data['gurus'] = $this->crud_model->get_by_arry("ci_users", array('user_type' => 'Teacher'), "ORDER BY name ASC");
			$data['students'] = $this->crud_model->get_by_arry("ci_users", array('user_type' => 'Student'), "ORDER BY name ASC");

			$data['review_info'] = $this->crud_model->get_by_id('reviews', $id);

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/review-edit', $data);
			$this->load->view('admin/includes/_footer');
			
		}	
		
		
	}
	

	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		$course_info = $this->crud_model->get_by_id("courses",$id);
		
		$check = $this->crud_model->check_availability("category",array("id"=>$course_info->category));
		
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