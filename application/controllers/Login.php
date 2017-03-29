<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
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
	}

	// Show login page
	public function index() {
		
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('login_form');
			//$this->load->view('template/footer');
	}

}
