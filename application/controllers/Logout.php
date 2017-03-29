



<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Logout extends CI_Controller {
	
	public function index(){
			
				$sess_array = array(
				'username' => ''
				);
				$this->session->unset_userdata('logged_in', $sess_array);
				$data['message_display'] = 'Successfully Logout';
		
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('logout.php');
			//$this->load->view('template/footer');
	}
}
