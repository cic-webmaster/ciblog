<?php
 class User_model extends CI_model{
 	public function register($enc_password) {
 		//Get the register data
 		$name = $this->input->post('name');
 		$data = array(
 			'name' => $this->db->escape($name),
 			'email' => $this->input->post('email'),
 			'zipcode' => $this->input->post('zipcode'),
 			'username' => $this->input->post('username'),
 			'password' => $enc_password
 		);
 		//Insert data to database
 		$this->db->insert('users', $data);
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