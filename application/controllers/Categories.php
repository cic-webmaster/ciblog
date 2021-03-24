<?php 
	class Categories extends CI_Controller {
		public function index(){
		
			$data['title'] = 'Categories';

			$data['categories'] = $this->post_model->get_categories();
			
			// $data = $this->security->xss_clean($data);

			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		public function posts($id){
			
			$data['title'] = $this->category_model->get_category_name($id)->name;
			$data['posts'] = $this->category_model->get_posts_by_category($id);

			$this->load->view('templates/header');
			$this->load->view('categories/view', $data);
			$this->load->view('templates/footer');
		}

		public function create() {

			if (!$this->session->userdata('loggedin')) {
				redirect('users/login');
			}
			
			$data['title'] = 'Create Categories';

			$this->form_validation->set_rules('category_name', 'Category Name', 'required');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
			} else {

				$this->category_model->create();
				$this->session->set_flashdata('category_created', 'Category Created');
				redirect('categories');
			}
		}
	}