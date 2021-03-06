<?php 
	class Posts extends CI_Controller {
		public function index(){

			$data['title'] = 'Latest Post';

			$data['posts'] = $this->post_model->get_posts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL) {
			$data['post'] = $this->post_model->get_posts($slug);	
			$data['post_cat'] = $this->post_model->my_cat($slug);
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);

			if (empty($data['post'])) {
				show_404();
			}

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');

		}

		public function create() {
			//Check session
			if (!$this->session->userdata('loggedin')) {
				redirect('users/login');
			}

			$data['title'] = 'Create Post';

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {

				//Upload image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2048';
				$config['max_height'] = '2048';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($post_image);
				// Set alert flashdata
				$this->session->set_flashdata('post_created', 'Post created.');
				redirect('posts');
			}
		}

		public function delete($id) {
			if (!$this->session->userdata('loggedin')) {
				redirect('users/login');
			}

			$this->post_model->delete_post($id);
			$this->session->set_flashdata('post_deleted', 'Post deleted.');
			redirect('posts');

		}

		public function edit($slug) {

			if (!$this->session->userdata('loggedin')) {
				redirect('users/login');
			}

			$data['title'] = 'Edit Post';
			$data['post'] = $this->post_model->get_posts($slug);
			$data['categories'] = $this->post_model->get_categories();

			if (empty($data['post'])) {
				show_404();
			}
			$this->session->set_flashdata('post_edited', 'Post edited.');
			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update($id){
			
			if (!$this->session->userdata('loggedin')) {
				redirect('users/login');
			}

			$this->post_model->update_post($id);
			$slug = $this->post_model->get_slug();
			$this->session->set_flashdata('post_updated', 'Post updated.');
			redirect('posts/'.$slug);
		}
	}