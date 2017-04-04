<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_help extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		
		// Load form validation library
		$this->load->library('form_validation');
		
		// Load session library
		$this->load->library('session');
		
		// Load database
		$this->load->model('login_database');
		$this->load->model('marks_database');
		
	}

	// Show login page
	public function index() {
		$this->load->view('index.html');
	}
	
	private function velidate($marks , $is_sup )
	{
		if ($marks == "") {
			
			return false ;
		}			
			
		if($is_sup == 1 ){
			
			if ($marks > 60 or $marks < 0 ){
					
					return FALSE;
			}			
		}
		else{
			
			if ($marks > 40 or $marks < 0 ){
					
					return FALSE;
			}
			
		}
		
		return TRUE ;
	}
	
	public function give_marks()
	{
		$all_marks = $this->input->post('marks');
		
		
		$data = $this->session->userdata ; 
				
		$faculty_id =  $data['logged_in']['user_id'];
	
		$result = $this->marks_database->get_students_to_grade($faculty_id);
		
		
		foreach($result as $student ) {
		 		$marks_id = $student->m_id ; 
		 		$f_id = $student->m_f_id ;
				$s_id = $student->m_s_id ;
				$is_sup = $student->m_is_sup ;
				$marked = $student->m_marked ;
				$marks = $student->m_marks ;
				
				$marks = "" ;
				if (isset($all_marks[$marks_id])){
					
					$marks = $all_marks[$marks_id] ;
				}
				
				$valid = $this->velidate($marks,$is_sup);
				
				if (!$valid and $marked != 1 ) {
					
						$data['error_message'] = "Marks not valid ...";
						$this->load->view('template/header');
						$this->load->view('template/navigation');
						$this->load->view('home_page', $data);
					
						return ;
				}
				
				if ( $marked != 1  ){
				
				
					$data = array(
					'm_id' => $marks_id ,
					'm_f_id' => $f_id,
					'm_s_id' => $s_id,
					'm_marked' => 1 ,
					'm_is_sup' => $is_sup,
					'm_marks' => $marks
					);
					
					$result = $this->marks_database->marks_insert($data);
					
					if(!$result){
						
						$data['error_message'] = "Problem inserting the marks ...";
						$this->load->view('template/header');
						$this->load->view('template/navigation');
						$this->load->view('home_page', $data);	
					}
					else{
						
						$data['display_message'] = "Inserted student ".$s_id." marks successfully ...";
						$this->load->view('template/header');
						$this->load->view('template/navigation');
						$this->load->view('home_page', $data);	
					}	
				}
				
				else{
					
						$data['error_message'] = "Already marked ...";
						$this->load->view('template/header');
						$this->load->view('template/navigation');
						$this->load->view('home_page', $data);
					
				}		
				
				
		}
		
	}


	public function new_faculty_insert() {
			
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');	
		
		
		if ($this->form_validation->run() == FALSE) {
			$data["error_message"]= "There was some mistake in the values filled";
			 $this->load->view('admin_faculty_insert',$data);
		} else {
			$data = array(
			'f_user_name' => $this->input->post('username'),
			'f_password' => $this->input->post('password'),
			'f_name' => $this->input->post('name'),
			'f_email' => $this->input->post('email'),
			'admin' => 0
			);
			
			$result = $this->marks_database->faculty_insert($data);
		
			if ($result == TRUE) {
				$data['message_display'] = 'Faculty Added Successfully !';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_faculty_insert', $data);
				//header("location: ../admin");
			} else {
				$data['message_display'] = 'Faculty with that username '. $data['f_user_name'] .' already exist!';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_faculty_insert', $data);
			}
		}
			
	}


	private function array_has_dupes($array) {
   		return count($array) !== count(array_unique($array));
	}


	public function new_student_insert() {
			
			//$valid = validate_faculties();
			$f_array = Array (
				$this->input->post('Supervisor'),
				$this->input->post('Exeminar_1'),
				$this->input->post('Exeminar_2'),
				$this->input->post('Exeminar_3')
			);
			 
			 //print_r($f_array);	
			 //return ; 
			if( $this->array_has_dupes($f_array) ){
				
				$data["error_message"]= "No multiple faculties for same student." ;
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_student_insert',$data);
				
			}
			
			//print_r( $this->input->post('supervisor') );
			
			//return ;
			
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');	
		$this->form_validation->set_rules('roll', 'Roll', 'trim|required|xss_clean');	
		
		
		if ($this->form_validation->run() == FALSE) {
			 $data["error_message"]= "There was some mistake in the values filled";
			 $this->load->view('template/header');
			 $this->load->view('template/navigation');
			 $this->load->view('admin_student_insert',$data);
		} else {
			$data = array(
			's_name' => $this->input->post('name'),
			's_roll' => $this->input->post('roll'),
			's_email' => $this->input->post('email'),
			's_sup_id'=> $this->input->post('Supervisor'),
			's_ex1_id' => $this->input->post('Exeminar_1'),
			's_ex2_id' => $this->input->post('Exeminar_2'),
			's_ex3_id' => $this->input->post('Exeminar_3')
			);
			
			$result = $this->marks_database->student_insert($data);
		
			if ($result == TRUE) {
				$data['message_display'] = 'Student Added Successfully !';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_student_insert', $data);
				//header("location: ../admin");
			} else {
				$data['error_message'] = 'Student '. $data['s_name'] .' Already present in the database.';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_student_insert', $data);
			}
		}
			
	}


	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				
				if( $this->session->userdata['logged_in']['admin'] == 1 ){
					
					header("location: ../admin");
					//$this->load->view('admin_page');	
				}else{
					
					header("location: ../home");
					//$this->load->view('home_page');
				}
				
			}else{
				$this->load->view('login_form');
			}
		} else {
			$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
					);
			$result = $this->login_database->login($data);
			
			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				if ($result != false) {
					$session_data = array(
					'user_id' => $result[0]->f_id,
					'username' => $result[0]->f_user_name,
					'email' => $result[0]->f_email,
					'admin' => $result[0]->admin,
					'name' => $result[0]->f_name,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					
					if( $session_data['admin'] == 1 ){
						
						header("location: ../admin");
						//$this->load->view('admin_page');	
					}else{
						
						header("location: ../home");
						//$this->load->view('home_page');
					}
					
					
				}
			} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);

				$data['session_ua'] = $this->session ;
				print_r($this->session->userdata);
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('login_page.php', $data); // admin_page initially 
			}
		}
	}

	public function marks_reset(){
			$data = $this->input->post('marks_id');
				
			if(sizeof($data)  > 0 ){
				
				foreach ( $data as $id => $m_id ) {
			
				$this->db->set('m_marked',0);
				$this->db->where('m_id', $m_id);
				$this->db->update('marks');
				
				$this->db->set('m_marks',0);
				$this->db->where('m_id', $m_id);
				$this->db->update('marks');
			
				}
			
			
				$data_['message_display'] = 'Marks reset Successfully !';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_marks_reset', $data_);		
				
			}
			else{
				$data_['error_message'] = 'No marks were selected.';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_marks_reset', $data_);		
			}
			
			
		
	}



	public function student_delete(){
			$data = $this->input->post('student_id');
				
			if(sizeof($data)  > 0 ){
				
				foreach ( $data as $id => $s_id ) {
		
					$this->db->where('m_s_id', $s_id);
					$this->db->delete('marks');
					
					if($this->db->affected_rows() > 0 ){
						
						$this->db->where('s_id', $s_id);
						$this->db->delete('students');	
						
					}
					else{
						$data_['error_message'] = "Marks couldn't be deleted";
						$this->load->view('template/header');
						$this->load->view('template/navigation');
						$this->load->view('admin_student_delete', $data_);		
						
					}
				
				}
				
				$data_['message_display'] = 'Students Deleted Successfully !';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_student_delete', $data_);		
				
			}
			else{
				$data_['error_message'] = 'No students were selected.';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_student_delete', $data_);		
			}
			
	}


	public function faculty_delete(){
			$data = $this->input->post('faculty_id');
		    if(sizeof($data)  > 0 ){
				foreach ( $data as $id => $f_id ) {
					$this->db->select("m_s_id");
					$this->db->where('m_f_id',$f_id);
					$this->db->from('marks');
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$data_['error_message'] = 'Faculty assigned to some student! Please reasigne and then try again.';
						$this->load->view('template/header');
						$this->load->view('template/navigation');
						$this->load->view('admin_faculty_delete', $data_);	
						return;
					}else{ // this means the faculty was not assigned to any 1 , therefore direclty delete 
						
						
						$this->db->where('f_id', $f_id);
						$this->db->delete('faculty');
						
					}
				}
				
				$data_['message_display'] = 'Faculty Deleted Successfully !';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_faculty_delete', $data_);		
				
			}
			else{
				$data_['error_message'] = 'No faculty were selected.';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_faculty_delete', $data_);		
			}
			
	}
	

	public function faculty_delete_forcefully(){
			$data = $this->input->post('faculty_id');
		    if(sizeof($data)  > 0 ){
				foreach ( $data as $id => $f_id ) {
					$this->db->select("m_s_id");
					$this->db->where('m_f_id',$f_id);
					$this->db->from('marks');
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$all_student_ids =  $query->result();
						//print_r($all_student_ids);
						//return;
						foreach( $all_student_ids as $student ) {
							$s_id =  $student->m_s_id ;
							$this->db->where('m_s_id', $s_id);
							$this->db->delete('marks');		
								if($this->db->affected_rows() > 0 ){
									$this->db->where('s_id', $s_id);
									$this->db->delete('students');	
								}
								else{
									$data_['error_message'] = "Marks couldn't be deleted";
									$this->load->view('template/header');
									$this->load->view('template/navigation');
									$this->load->view('admin_faculty_delete', $data_);			
								}	
						}
						$this->db->where('f_id', $f_id);
						$this->db->delete('faculty');
					}else{ // this means the faculty was not assigned to any 1 , therefore direclty delete 
						
						
						$this->db->where('f_id', $f_id);
						$this->db->delete('faculty');
						
					}
				}
				
				$data_['message_display'] = 'Faculty Deleted Successfully !';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_faculty_delete', $data_);		
				
			}
			else{
				$data_['error_message'] = 'No faculty were selected.';
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_faculty_delete', $data_);		
			}
			
	}



// end
}
