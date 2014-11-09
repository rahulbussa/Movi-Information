<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movie extends CI_Controller {

	

	public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->Model('Movie_model');
        }


	public function index()
	{
		$this->load->view('home');
	}

	public function getdata($movie){
		

		$this->Movie_model->getMovieData($movie);
	

	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */