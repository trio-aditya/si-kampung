<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('tgl_indo_helper');
		$this->load->database();
		$this->load->model('Slider_model');
		$this->load->model('Slider_utama_model');
		$this->load->model('Potensi_model');
		$this->load->model('Berita_model');
		$this->load->model('Kategori_berita_model');
		$this->load->model('Kepala_desa_model');

		$this->ip_address = $_SERVER['REMOTE_ADDR'];
		$this->time = date('Y-m-d H:i:s');
	}
	public function index()
	{

		// //style
		// $config['full_tag_open'] = '<nav><ul class="pagination">';
		// $config['full_tag_close'] = '</ul></nav>';

		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li class="page-item">';
		// $config['first_tag_close'] = '</li>';

		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li class="page-item">';
		// $config['last_tag_close'] = '</li>';

		// $config['next_link'] = '&raquo';
		// $config['next_tag_open'] = '<li class="page-item">';
		// $config['next_tag_close'] = '</li>';

		// $config['prev_link'] = '&laquo';
		// $config['prev_tag_open'] = '<li class="page-item">';
		// $config['prev_tag_close'] = '</li>';

		// $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		// $config['cur_tag_close'] = '</a></li>';

		// $config['num_tag_open'] = '<li class="page-item">';
		// $config['num_tag_close'] = '</li>';

		// $config['attributes'] = array('class' => 'page-link');

        // //pagination
		// $this->load->library('pagination');

		//  //pagination
		//  $this->load->library('pagination');

		//  //config
		//  $config['base_url'] = 'http://localhost/si-kampung/index';
		//  $config['total_rows'] = $this->Berita_model->countBerita();
		//  $config['per_page'] = 2;
 
		//  //inisiasi
		//  $this->pagination->initialize($config);

		// $x['start'] = $this->uri->segment(0);

		$x['slider'] = $this->Slider_model->data();
		$x['slider_utama'] = $this->Slider_utama_model->get_data();
		$x['potensi'] = $this->Potensi_model->get_data();
		$x['berita'] = $this->Berita_model->get_data();
		$x['kategori'] = $this->Kategori_berita_model->get_data();
		$x['kepala_desa'] = $this->Kepala_desa_model->data();

		$this->load->view('layouts/header');
		$this->load->view('layouts/main_menu');
		$this->load->view('welcome_message', $x);
		$this->load->view('layouts/footer');
		
	}
}
