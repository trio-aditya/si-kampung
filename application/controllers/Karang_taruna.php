<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karang_taruna extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
        $this->load->model('Karang_taruna_model');

		$this->ip_address = $_SERVER['REMOTE_ADDR'];
		$this->time = date('Y-m-d H:i:s');
	}
	public function index()
	{

		$x['karang_taruna'] = $this->Karang_taruna_model->get_data();

		$this->load->view('layouts/header');
		$this->load->view('layouts/main_menu');
		 $this->load->view('content/user/karang_taruna/home', $x);
		$this->load->view('layouts/footer');
		
	}
}
