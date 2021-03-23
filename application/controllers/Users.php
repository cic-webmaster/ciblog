<?php
 class Users extends CI_Controller{
	public function register() {
		$data['title'] = 'Register';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		} else {
			//Encrypt password
			$enc_password = md5($this->input->post('password'));
			$this->user_model->register($enc_password);
			// Set message
			$this->session->set_flashdata('user_registered', 'You are now registered and can log in.');
			redirect('posts');
		}
	}

	// Check username exists
	function check_username_exists($username) {
		$this->form_validation->set_message('check_username_exists', 'That Username is taken. Please choose a different one.');
		if ($this->user_model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}

	function check_email_exists($email) {
		$this->form_validation->set_message('check_email_exists', 'That Email is taken. Please choose a different one.');
		if ($this->user_model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}
}