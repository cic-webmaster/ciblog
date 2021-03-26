<?php
 class User_model extends CI_model{
 	public function register($enc_password) {
 		//Get the register database
 		$data = array(
 			'name' => $this->input->post('name'),
 			'email' => $this->input->post('email'),
 			'zipcode' => $this->input->post('zipcode'),
 			'username' => $this->input->post('username'),
 			'password' => $enc_password
 		);
 		//Insert data to database
 		$this->db->insert('users', $data);
 	}
 	// Log in
 	public function login($username, $password){
 		$this->db->where('username', $username);
 		$this->db->where('password', $password);
 		$result = $this->db->get('users');

 		if ($result->num_rows() == 1) {
 			return $result->row(0)->id;
 		} else {
 			return false;
 		}
 	}
 	public function check_username_exists($username){
 		// Check if username exists in the database
 		$query = $this->db->get_where('users', array('username'=>$username));
 		// Check result if empty
 		if (empty($query->row_array())) {
 			return true;
 		} else {
 			return false;
 		}
 	}

 	public function check_email_exists($email){
 		$query = $this->db->get_where('users', array('email'=>$email));

 		if (empty($query->row_array())) {
 			return true;
 		} else {
 			return false;
 		}
 	}
 }