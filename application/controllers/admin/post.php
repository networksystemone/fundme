<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class post extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('post_model');
		$this->load->library(array('form_validation', 'session'));

		if ($this->session->userdata('status') == 0)
			redirect('admin/auth/login');
	}

	public function index() {
		$data['posts_list'] = $this->post_model->get_posts_list();

		$this->load->view('post/index', $data);
	}

	public function create() {
		$data = array();

		$this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {
			$post['content'] = $this->form_validation->set_value('content');

			if ($this->post_model->create_post($post)) {
				redirect('admin/post');
			} else {
				$data['error'] = 'Create post fail';
			}
		}

		$this->load->view('post/create', $data);
	}

	public function edit($post_id) {
		$data = array();

		$post = $this->post_model->get_post($post_id);

		$this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {
			$post['content'] = $this->form_validation->set_value('content');

			if ($this->post_model->update_post($post)) {
				redirect('admin/post');
			} else {
				$data['error'] = 'Edit post fail';
			}
		}

		$data['post'] = $post;
		$this->load->view('post/edit', $data);
	}

	public function delete($post_id) {
		$data = array();

		$post = $this->post_model->get_post($post_id);

		$this->form_validation->set_rules('id', 'id', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {
			if ($this->post_model->delete_post($this->form_validation->set_value('id'))) {
				redirect('admin/post');
			} else {
				$data['error'] = 'Delete post fail';
			}
		}

		$data['post'] = $post;
		$this->load->view('post/delete', $data);
	}
}