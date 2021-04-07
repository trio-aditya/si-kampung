<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_surat extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Pengaturan_surat_model');
        $this->load->model('Klasifikasi_surat_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['surat'] = $this->Pengaturan_surat_model->get_data($id);
        $x['klasifikasi_surat'] = $this->Klasifikasi_surat_model->get_data();

        $this->template->load('layouts/sa/template', 'content/sa/surat/pengaturan_surat', $x);
    }

    //Tambah Data berupa File
    public function proses_tambah_data()
    {

        $user_id = $this->session->userdata('id_user');
        $klasifikasi_surat_id = $this->input->post('klasifikasi_surat_id');
        $nama_layanan = $this->input->post('nama_layanan');

        $config['upload_path']          = './assets/admin/upload/surat/';
        $config['allowed_types']        = 'rtf|doc|docx';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('surat')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/pengaturan_surat');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $surat = [
                "klasifikasi_surat_id" => $klasifikasi_surat_id,
                "nama_layanan" => $nama_layanan,
                "surat" => $data['upload_data']['file_name'],
                'user_id' => $user_id,
            ];
        }

        $this->db->insert('surat', $surat);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Tambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pengaturan_surat');
    }


    public function detail($id)
    {
        $x['surat'] = $this->Pengaturan_surat_model->editdata($id);

        $this->template->load('layouts/sa/template', 'content/sa/pengaturan_surat/detail', $x);
    }

    public function proses_edit_data()
    {
        $id = $this->input->post('id_surat');
        $data = $this->Pengaturan_surat_model->editdata($id);
        $nama = './assets/admin/upload/surat/' . $data['surat'];

        $config['upload_path']          = './assets/admin/upload/surat/';
        $config['allowed_types']        = 'rtf|doc|docx';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('surat')) {
            $update = $this->Pengaturan_surat_model->proses_edit_data_tanpa_surat();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sa/pengaturan_surat');
        }
        if (is_readable($nama) && unlink($nama)) {
            $upload_data = array('upload_data' => $this->upload->data());
            $name = $upload_data['surat'];

            $data = array(
                'surat' => $name
            );

            $update = $this->Pengaturan_surat_model->proses_edit_data();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sa/pengaturan_surat');
        }
    }

    public function hapus_data($id)
    {
        $data = $this->Pengaturan_surat_model->hapus($id);
        $nama = './assets/admin/upload/surat/' . $data['surat'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Pengaturan_surat_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/pengaturan_surat');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/pengaturan_surat');
        }
    }
}
