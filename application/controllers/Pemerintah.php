<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemerintah extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
        $this->load->model('K_perangkat_desa_model');
        $this->load->model('Pemerintah_model');
        $this->load->model('Kepala_desa_model');

		$this->ip_address = $_SERVER['REMOTE_ADDR'];
		$this->time = date('Y-m-d H:i:s');
	}
	public function index()
	{

		$x['kepala_desa'] = $this->Kepala_desa_model->data();
		$x['pemerintah'] = $this->Pemerintah_model->get_data();

		$this->load->view('layouts/header');
		$this->load->view('layouts/main_menu');
		 $this->load->view('content/user/pemerintah/home', $x);
		$this->load->view('layouts/footer');
		
	}
}
