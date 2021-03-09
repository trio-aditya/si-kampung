<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('tgl_indo_helper');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kontak_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['kontak'] = $this->Kontak_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/kontak/home', $x);
    }

    public function hapus_data($id)
    {
        $this->Kontak_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/kontak');
    }

}
