<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('marks_database');
	}
	
	private function  logged_in(){
		
		$data = $this->session->userdata ; 
				
		if (isset($data['logged_in'])) {
				
			if( $data['logged_in']['admin'] == 1 ){
					
					return 1 ;
			}{
				return 0 ;
				
			}
			
		}
		else{
			
			return -1 ;
		}
		
	}
	
	
	
	
	
	
	public function index(){
			if( $this->logged_in() == 1 ){			
					$all_s_data =  $this->marks_database->get_all_students_data();
					
					if($all_s_data){
						
						$data['all_student_data'] = $all_s_data ;		
					}else{
							
						$data['error_message'] = "No Student data Found!";	
					}
					
					$all_f_data = $this->marks_database->get_all_faculty_data();
					
					if($all_f_data){
						
						$data['all_faculty_data'] = $all_f_data ;
					}else{
						
						$data['all_faculty_data'] = "Couldnt get Faculty data!";
					}
					
					$this->load->view('template/header');
					$this->load->view('template/navigation');
					$this->load->view('admin_page.php',$data);
					//$this->load->view('template/footer');

			}
			else if(logged_in == 0 ){		
					// if non admin, but user tries to login to admin, he goes to user page	
					//$this->load->view('home_page.php');
					header("location: home");
			}
			else{
					
					header("location: login");	
			}
			
			
	}
	
	
	public function faculty_insert(){
		
		if( $this->logged_in() == 1 ){
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_faculty_insert.php');
			
		}else if ( $this->logged_in() == 0 ) {
				
				header("location: ../home");
			
		}else{
			
			    header("location: ../login");
		}	
		
	}
	
	public function student_insert(){
		
		if( $this->logged_in() == 1 ){
				$all_faculty = $this->marks_database->get_all_faculty_data();
				$data['faculty_list'] = $all_faculty ;
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('admin_student_insert.php',$data);
				
		}else if ( $this->logged_in() == 0 ) {
				
				header("location: ../home");
			
		}else{
			
			    header("location: ../login");
		}	
		
	}
	
	
	public function marks_reset(){
			
			
			
		if( $this->logged_in() == 1 ){
			
			$all_marks = $this->marks_database->get_all_marks();
		
			if($all_marks){
				$data['mark_list'] = $all_marks ;
			}else{
				$data['error_message'] = "No marks set Yet ... " ;
			}
			
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('admin_marks_reset.php',$data);
			
		}else if ( $this->logged_in() == 0 ) {
				
				header("location: ../home");
			
		}else{
			
			    header("location: ../login");
		}	
		
	}
	
	
	public function student_delete(){
			
			
			
		if( $this->logged_in() == 1 ){
			
			$all_students = $this->marks_database->get_only_students_data();
		
			if($all_students){
				$data['student_list'] = $all_students ;
			}else{
				$data['error_message'] = "Couldn't fetch students ... " ;
			}
			
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('admin_student_delete.php',$data);
			
		}else if ( $this->logged_in() == 0 ) {
				
				header("location: ../home");
			
		}else{
			
			    header("location: ../login");
		}	
		
	}
	
	public function faculty_delete(){
			
			
			
		if( $this->logged_in() == 1 ){
			
			$all_faculty = $this->marks_database->get_all_faculty_data();
		
			if($all_faculty){
				$data['faculty_list'] = $all_faculty ;
			}else{
				$data['error_message'] = "Couldn't fetch students ... " ;
			}
			
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('admin_faculty_delete.php',$data);
			
		}else if ( $this->logged_in() == 0 ) {
				
				header("location: ../home");
			
		}else{
			
			    header("location: ../login");
		}	
		
	}
	
}
