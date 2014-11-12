<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class My_gofundme {
	public function fetch_data()
    {
    	$this->ci =& get_instance();

    	$this->ci->load->model('my_gofundme_model');
    	$my_gofundme = $this->ci->my_gofundme_model->get_info();

    	//calculate time interval
    	$last_fetched = new DateTime($my_gofundme['last_fetched']);
    	$now = new DateTime('now');
    	$diff = $now->diff($last_fetched);
    	$interval = ($diff->d * 24 + $diff->h) * 60 + $diff->i;
    	//print_r($diff);

    	//fetch if over interval minutes since last time
    	if ($interval >= $my_gofundme['interval']) {
	    	$html = $this->getHTML(trim($my_gofundme['url']), 5);
			
			if ($html != false && !empty($html)) {
				preg_match('/Raised by\s*<span>(.*)<\/span>\s*people/i', $html, $match);
				$my_gofundme['num_donations'] = $match[1];

				preg_match('/<\/span>(.*)<span class="of">/i', $html, $match);
				$my_gofundme['raised'] = $match[1];

				//echo 'num_donations = ' . $my_gofundme['num_donations'] . '</br>';
				//echo 'raised = ' . $my_gofundme['raised'] . '</br>';
			}

			//calculate days to go
			$now = new DateTime('now');
    		$interval = $now->diff(new DateTime($my_gofundme['end_date']));
    		$my_gofundme['days_to_go'] = $interval->days;

			$this->ci->my_gofundme_model->update_info($my_gofundme);
		}

		return array(
			'my_gofundme_url'=>	$my_gofundme['url'],
			'num_donations'	=>	$my_gofundme['num_donations'],
			'raised'		=>	$my_gofundme['raised'],
			'goal'			=>	$my_gofundme['goal'],
			'days_to_go'	=>	$my_gofundme['days_to_go']
			);
    }

	function getHTML($url, $timeout)
	{
	    $ch = curl_init($url); // initialize curl with given url
	    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to connect
	    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);	// max. seconds to excute
	    curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
	    return @curl_exec($ch);
	}
}

/* End of file my_gofundme.php */