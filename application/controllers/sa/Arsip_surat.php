<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_surat extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('tgl_indo_helper');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Arsip_surat_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['arsip_surat'] = $this->Arsip_surat_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/surat/arsip_surat', $x);
    }

    public function print($id)
    {
        // $id = $this->session->userdata('id_user');
        // $x['user'] = $this->session->userdata('id_user');
        $x['arsip_surat'] = $this->Arsip_surat_model->detaildata($id);

        // $this->template->load('layouts/sa/template', 'content/sa/surat/print_surat');
        $this->load->view('content/sa/surat/print_surat', $x);
    }

    public function proses_edit_data()
    {
        $this->Arsip_surat_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/arsip_surat');
    }

    public function hapus_data($id)
    {
        $this->Arsip_surat_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/arsip_surat');
    }
}
