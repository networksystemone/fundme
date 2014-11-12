<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact_me extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('email_model');
	}

	public function index() {
		$this->load->view('header');
		$this->load->view('contact_me/index');
		$this->load->view('footer');
	}

	function send_email()
	{
		$this->form_validation->set_rules('name', 'Your name', 'trim|required|xss_clean|max_length[256]');
		$this->form_validation->set_rules('email', 'Your email', 'trim|required|xss_clean|valid_email|max_length[80]');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean|max_length[256]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {
			$data = array(
				'name'	=> $this->form_validation->set_value('name'),
				'email'	=> $this->form_validation->set_value('email'),
				'subject'	=> $this->form_validation->set_value('subject'),
				'message'	=> $this->form_validation->set_value('message'),
				);

		    $this->load->library('email');
		    $this->email->set_newline("\r\n");
		    $this->email->from($data['email'], $data['name']);
		    $this->email->to('contact@phatpham.com');
		    $this->email->subject('[Fundme] ' . $data['subject']);
		    $this->email->message($data['message']);

		    $data['sent'] = $this->email->send();
		    $this->email_model->create_email($data);
		} else {
			echo 0;
		}
	}
}