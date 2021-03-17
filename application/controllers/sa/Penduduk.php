<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Penduduk_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['penduduk'] = $this->Penduduk_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/penduduk/home', $x);
    }

    public function add()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['penduduk'] = $this->Penduduk_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/penduduk/add', $x);
    }


    //Tambah Data berupa File
    public function proses_tambah_data()
    {

        $user_id = $this->session->userdata('id_user');
        $nama = $this->input->post('nama');
        $periode = $this->input->post('periode');
        $sambutan = $this->input->post('sambutan');

        $config['upload_path']          = './assets/admin/upload/penduduk/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/penduduk');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $penduduk = [
                "nama" => $nama,
                "foto" => $data['upload_data']['file_name'],
                "periode" => $periode,
                "sambutan" => $sambutan,
                'user_id' => $user_id,
            ];
        }

        $this->db->insert('penduduk', $penduduk);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Tambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/penduduk');
    }


    public function detail($id)
    {
        $x['penduduk'] = $this->Penduduk_model->editdata($id);

        $this->template->load('layouts/sa/template', 'content/sa/penduduk/detail', $x);
    }

    public function proses_edit_data()
    {
        $id = $this->input->post('id_penduduk');
        $data = $this->Penduduk_model->editdata($id);
        $user_id = $this->session->userdata('id_user');
        $nama = './assets/admin/upload/penduduk/' . $data['foto'];

        $config['upload_path']          = './assets/admin/upload/penduduk/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $update = $this->Penduduk_model->proses_edit_data_tanpa_foto();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sa/penduduk');
        }
        if (is_readable($nama) && unlink($nama)) {
            $upload_data = array('upload_data' => $this->upload->data());
            $name = $upload_data['foto'];

            $data = array(
                'foto' => $name
            );

            $update = $this->Penduduk_model->proses_edit_data();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sa/penduduk');
        }
    }

    public function hapus_data($id)
    {
        $data = $this->Penduduk_model->hapus($id);
        $nama = './assets/admin/upload/penduduk/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Penduduk_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/penduduk');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/penduduk');
        }
    }
}
