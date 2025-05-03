<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Refferals extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/referals_model', 'referals_model');
		$this->load->model('admin/user_model', 'user_model'); 
		// load CSV library
        $this->load->library('CSVReader');
	}

	public function index(){

		$data['title'] = 'Refferal List';
		$data['refferals'] = $this->referals_model->get_all_refferals();

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/refferals/refferal_list',$data);
		$this->load->view('admin/includes/_footer');
	}
	
	

	//-----------------------------------------------------------
	public function change_status(){   

		$this->user_model->change_status();
	}

	

	//-----------------------------------------------------------
	public function edit($id = 0){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('student', 'Student', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile No.', 'trim|required');
			$this->form_validation->set_rules('course', 'Course', 'trim|required');
			$this->form_validation->set_rules('user', 'User', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				
				$data['view'] = 'admin/refferals/refferal_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'student' => $this->input->post('student'),
					'mobile' => $this->input->post('mobile'),
					'course' => $this->input->post('course'),
					'user_id' => $this->input->post('user'),
					'status' => $this->input->post('status'),
					'amount' => $this->input->post('amount'),
					'payment_type' => $this->input->post('payment_type'),
					'txn_id' => $this->input->post('txn_id'),
					'reason' => $this->input->post('reason')
				);
				
				if($this->input->post('status') == 1){
					$user = $this->user_model->get_user_by_id($this->input->post('user'));
					$this->db->where('id', $this->input->post('user'));
					$this->db->update('ci_users', array("earnings"=>$user['earnings']+$this->input->post('amount')));
				}

				$data = $this->security->xss_clean($data);
				$result = $this->referals_model->edit($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Refferals has been updated successfully!');
					redirect(base_url('admin/refferals'));
				}
			}
		}
		else{
			$data['title'] = 'Edit User';
			$data['user_info'] = $this->referals_model->get_refferal_id($id);
			$data['users'] = $this->user_model->get_all_users();
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/refferals/refferal_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('refferals', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/refferals'));
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

		$filename = 'refferals_'.date('Y-m-d').'.csv'; 

		$storData = array();
        $metaData[] = array(
						'id' => 'S.No.', 
						'student' => 'Student Name', 
						'mobile' => 'Mobile No.', 
						'course' => 'Course Name',
						'refer_by' => 'Reffered By',
						'payment' => 'Payment Info',
						'created_at' => 'Reffered Date & Time',
						'status' => 'Status',
						'amount' => 'Amount',
						'reason' => 'Reason'
						);       
       
        // get data 
		$data = $this->referals_model->get_all_refferals();

		$i=1;
        foreach($data as $key=>$row) {
			$user_info = $this->referals_model->get_user_by_id($row->user_id);

			if($row->status==1) $status = 'Success'; elseif($row->status==2) $status = 'Fail'; else $status = 'New';

            $storData[] = array(
                'id' => $i,
				'student' => $row->student,
                'mobile' => $row->mobile,
                'course' => $row->course,
				'refer_by' => $user_info->name,
				'payment' => $user_info->payment_type.'-'.$user_info->upi_mobile,
				'created_at' => $row->created_at,
				'status' => $status,
				'amount' => $row->amount,
				'reason' => $row->reason
            );
			$i++;
        }
        $data = array_merge($metaData,$storData);
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        foreach ($data as $data) {
            fputcsv($handle, $data);
        }
            fclose($handle);
        exit;
	}

	public function sendsms(){

		$this->load->library('setupfile');
		$this->setupfile->send("9494904886", "Hello there this is message");
	}


}


	?>