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
				
				if ( $marked != 1 and $valid ){
				
				
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
						$this->load->view('home_page', $data);	
					}
					else{
						
						$data['display_message'] = "Inserted student ".$s_id." marks successfully ...";
						$this->load->view('home_page', $data);	
					}	
				}		
				
				
		}
		
	}




		public function new_faculty_insert() {
			
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('picture_url', 'Picture', 'trim|required|xss_clean');
		$this->form_validation->set_rules('ingredients', 'Ingredients', 'trim|required|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');	
		$this->form_validation->set_rules('veg', 'Veg', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			 $this->load->view('admin');
		} else {
			$data = array(
			'title' => $this->input->post('title'),
			'photo_link' => $this->input->post('picture_url'),
			'ingredients' => $this->input->post('ingredients'),
			'price' => $this->input->post('price'),
			'veg' => $this->input->post('veg')
			
			);
			
			$result = $this->food_database->food_insert($data);
		
			if ($result == TRUE) {
				$data['message_display'] = 'Food Added Successfully !';
				$this->load->view('admin_page', $data);
				//header("location: ../admin");
			} else {
				$data['message_display'] = 'Food already exist!';
				$this->load->view('admin_page', $data);
			}
		}
			
	}







	/*
	// Validate and store registration data in database
	public function new_user_registration() {
		
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration_form');
		} else {
			$data = array(
			'user_name' => $this->input->post('username'),
			'user_email' => $this->input->post('email_value'),
			'user_password' => $this->input->post('password')
			);
			
			$result = $this->login_database->registration_insert($data);
		
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login_form', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('registration_form', $data);
			}
		}
	}
	*/

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
				$this->load->view('login_page.php', $data); // admin_page initially 
			}
		}
	}

}
