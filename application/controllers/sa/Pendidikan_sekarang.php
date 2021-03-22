<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan_sekarang extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Pendidikan_sekarang_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['pendidikan_sekarang'] = $this->Pendidikan_sekarang_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/data/pendidikan_sekarang', $x);
    }

    public function proses_tambah_data()
    {
        $this->Pendidikan_sekarang_model->proses_tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pendidikan_sekarang');
    }

    public function proses_edit_data()
    {
        $this->Pendidikan_sekarang_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pendidikan_sekarang');
    }

    public function hapus_data($id)
    {
        $this->Pendidikan_sekarang_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pendidikan_sekarang');
    }
}
