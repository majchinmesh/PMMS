<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('marks_database');
	}
	
	public function index(){
			$data = $this->session->userdata ; 
			
			
			
			
			if (isset($data['logged_in'])) {
				
				$faculty_id =  $data['logged_in']['user_id'];
	
				$result = $this->marks_database->get_students_to_grade($faculty_id);
				$all_s_data = $this->marks_database->get_only_students_data();
				
				//print_r($result);
				//return;
				
				if($result){
					
					$data['students'] = $result ;
			
						
				}else{
					
					$data['students'] = FALSE ;
					
				}	
			
				$data['s_data'] = $all_s_data;
	
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('home_page.php',$data);
				//$this->load->view('template/footer');
			}
			else{
				
				header("location: login");
				
			}
	}
}
