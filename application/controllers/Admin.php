<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('marks_database');
	}
	
	public function index(){
			$data = $this->session->userdata ; 
			//print_r($data);
			
			if (isset($data['logged_in'])) {
				
				if( $data['logged_in']['admin'] == 1 ){
					
					$all_data =  $this->marks_database->get_all_students_data();
					//result = $this->marks_database->get_students_to_grade($faculty_id);
					$data['all_student_data'] = $all_data ;
					
					$this->load->view('template/header');
					$this->load->view('template/navigation');
					$this->load->view('admin_page.php',$data);
					//$this->load->view('template/footer');

				}
				else{
					
					// if non admin, but user tries to login to admin, he goes to user page	
					//$this->load->view('home_page.php');
					header("location: home");
				}
			}
			else{
				
				header("location: login");
				
			}
	}
	
	
	public function faculty_insert(){
		
		
		
		
	}
	
	
}