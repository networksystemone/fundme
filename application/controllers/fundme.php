<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fundme extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('my_gofundme', 'form_validation'));
		$this->load->model('post_model');
	}

	public function index() {
		//fetch data from gofundme
		$data = $this->my_gofundme->fetch_data();
		$data['posts_list'] = $this->post_model->get_posts_list(15);
		$data['num_posts'] = count($data['posts_list']);
		$data['total_posts'] = $this->post_model->total_posts();

		$this->load->view('header');
		$this->load->view('fundme/index', $data);
		$this->load->view('footer');
	}

	public function load_more_post() {
		$this->form_validation->set_rules('offset', 'offset', 'integer|required');

		if ($this->form_validation->run()) {
			$posts_list = $this->post_model->get_posts_list(15, $this->form_validation->set_value('offset'));
			$num_posts = count($posts_list);
			$total_posts = $this->post_model->total_posts();

			$list = array();
			foreach ($posts_list as $post) {
				$item = array(
					'post_content'	=> auto_link(nl2br($post['content']), 'both', true),
					'datetime'		=> date('H:i:s - m/d/Y', strtotime($post['date_created']))
					);
				array_push($list, $item);
			}

			echo json_encode(array(
				'posts_list' => $list,
				'num_posts' => $num_posts,
				'total_posts' => $total_posts,
				'code' => 1,
				'info' => 'success'
				));
		} else {
			echo json_encode(array(
				'code' => 0,
				'info' => 'Error happens. Please try again later.'
				));
		}
	}
}