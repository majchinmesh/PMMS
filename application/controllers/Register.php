<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class register extends CI_Controller {
	
	public function index(){
	
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('registration_form.php');
			$this->load->view('template/footer');
	}
}
