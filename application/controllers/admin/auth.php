<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('user_model');
	}

	public function login() {
		if ($this->session->userdata('status') == 1)
			redirect('admin/post');

		$data = array();

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {
			$username = $this->form_validation->set_value('username');
			$password = md5($this->form_validation->set_value('password') . '@phatpham.com');

			if ($this->user_model->login($username, $password)) {
				$this->session->set_userdata('status', 1);
				redirect('admin/post');
			} else {
				$data['error'] = 'Login fail';
			}
		}

		$this->load->view('auth/login', $data);
	}

	public function logout() {
		$this->session->set_userdata('status', 0);
		redirect('admin/auth/login');
	}
}