<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('user_login', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}

// Read data using username and password
public function login($data) {

	$condition = "f_user_name =" . "'" . $data['username'] . "' AND " . "f_password =" . "'" . $data['password'] . "'";
	$this->db->select('*');
	$this->db->from('faculty');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();
	
	if ($query->num_rows() == 1) {
		return true;
	} else {
		return false;
	}
}

// Read data from database to show data in admin page
public function read_user_information($username) {
	
	$condition = "f_user_name =" . "'" . $username . "'";
	$this->db->select('*');
	$this->db->from('faculty');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();
	
	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}
}

}

?>