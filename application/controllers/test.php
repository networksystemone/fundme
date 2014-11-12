<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('my_gofundme');
	}

	public function index() {
		$this->load->model('my_gofundme_model');
    	$my_gofundme = $this->my_gofundme_model->get_info();

    	//calculate time interval
    	$last_fetched = new DateTime($my_gofundme['last_fetched']);
    	$now = new DateTime('now');
    	$interval = $now->diff($last_fetched);

    	//fetch if over 10 minutes since last time
    	if ($interval->i >= 1) {
	    	$html = $this->getHTML($my_gofundme['url'], 10);
			
			preg_match('/Recent Donations \((.*)\)/i', $html, $match);
			$my_gofundme['num_donations'] = $match[1];

			preg_match('/Raised: <strong class="txt1">\$(.*)<\/strong>/i', $html, $match);
			$my_gofundme['raised'] = $match[1];

			preg_match('/Goal: <strong class="txt1">\$(.*)<\/strong>/i', $html, $match);
			$my_gofundme['goal'] = $match[1];

			echo $this->my_gofundme_model->update_info($my_gofundme);
		}

		print_r(array(
			'num_donations'	=>	$my_gofundme['num_donations'],
			'raised'		=>	$my_gofundme['raised'],
			'goal'			=>	$my_gofundme['goal'],
			'days_to_go'	=>	$my_gofundme['days_to_go']
			));
	}

	function getHTML($url,$timeout)
	{
	    $ch = curl_init($url); // initialize curl with given url
	    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
	    curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
	    return @curl_exec($ch);
	}
}