<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
        $this->load->model('Kontak_model');

		$this->ip_address = $_SERVER['REMOTE_ADDR'];
		$this->time = date('Y-m-d H:i:s');
	}
	public function index()
	{

		$x['kontak'] = $this->Kontak_model->get_data();

		$this->load->view('layouts/header');
		$this->load->view('layouts/main_menu');
		 $this->load->view('content/user/kontak/home', $x);
		$this->load->view('layouts/footer');
		
	}

	public function proses_tambah_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "subjek" => $this->input->post('subjek'),
            "isi_pesan" => $this->input->post('isi_pesan'),
            "tanggal_kirim" => $this->input->post('tanggal_kirim'),
        ];

        $this->db->insert('kontak', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Terimakasih! Pesan anda berhasil dikirim.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('kontak');
    }
}
