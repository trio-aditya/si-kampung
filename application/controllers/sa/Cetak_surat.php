<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_surat extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('tgl_indo_helper');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Cetak_surat_model');
        $this->load->model('Pengaturan_surat_model');
        $this->load->model('Penduduk_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['cetak_surat'] = $this->Pengaturan_surat_model->get_data($id);
        $x['penduduk'] = $this->Penduduk_model->get_data();

        $this->template->load('layouts/sa/template', 'content/sa/surat/cetak_surat', $x);
    }

    //Proses Tambah Data
    public function proses_tambah_data()
    {
        $this->Cetak_surat_model->proses_tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/arsip_surat');
    }
}
