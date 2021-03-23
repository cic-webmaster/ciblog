<?php 
	class Category_model extends CI_Model {
		public function __construct()
			{
				$this->load->database();
			}

		public function get_posts_by_category($id){

			$this->db->order_by('posts.id', 'DESC');
			$this->db->join('posts_categories', 'posts_categories.id = posts.category_id');
			$query = $this->db->get_where('posts', array('category_id' => $id));
			return $query->result_array();
		}

		public function get_category_name($id) {
			$query = $this->db->get_where('posts_categories', array('id' => $id));
			return $query->row();
		}

		public function create(){
			$data = array(
				'name' => $this->input->post('category_name')
			);
			// for security
			// $data = $this->security->xss_clean($data);
			// return $this->db->insert('posts_categories', html_escape($data));
			return $this->db->insert('posts_categories', $data);
		}
	}