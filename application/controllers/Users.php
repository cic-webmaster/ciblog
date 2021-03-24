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

	public function login() {
		$data['title'] = 'Login';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		} else {
			// Login details
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$user_id = $this->user_model->login($username,$password);
			if($user_id) {
				//Create Session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'loggedin' => true,
				);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin', 'You are now logged in.');
				redirect('posts');
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', 'Login is invalid.');
				redirect('users/login');
			}
			
		}
	}

	public function logout(){
		//Unset userdata
		$this->session->unset_userdata('loggedin');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('user_logged_out', 'You are now logged out.');
		redirect('users/login');
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