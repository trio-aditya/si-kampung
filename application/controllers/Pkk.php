<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkk extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
        $this->load->model('Pkk_model');

		$this->ip_address = $_SERVER['REMOTE_ADDR'];
		$this->time = date('Y-m-d H:i:s');
	}
	public function index()
	{

		$x['pkk'] = $this->Pkk_model->get_data();

		$this->load->view('layouts/header');
		$this->load->view('layouts/main_menu');
		 $this->load->view('content/user/pkk/home', $x);
		$this->load->view('layouts/footer');
		
	}
}
