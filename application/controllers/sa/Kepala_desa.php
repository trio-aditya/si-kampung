<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala_desa extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kepala_desa_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['kepala_desa'] = $this->Kepala_desa_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/kepala_desa/home', $x);
    }

    //Tambah Data berupa File
    public function proses_tambah_data()
    {

        $user_id = $this->session->userdata('id_user');
        $nama = $this->input->post('nama');
        $periode = $this->input->post('periode');
        $sambutan = $this->input->post('sambutan');

        $config['upload_path']          = './assets/admin/upload/kepala_desa/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/kepala_desa');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $kepala_desa = [
                "nama" => $nama,
                "foto" => $data['upload_data']['file_name'],
                "periode" => $periode,
                "sambutan" => $sambutan,
                'user_id' => $user_id,
            ];
        }

        $this->db->insert('kepala_desa', $kepala_desa);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Tambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/kepala_desa');
    }


    public function detail($id)
    {
        $x['kepala_desa'] = $this->Kepala_desa_model->editdata($id);

        $this->template->load('layouts/sa/template', 'content/sa/kepala_desa/detail', $x);
    }

    public function proses_edit_data()
    {
        $id = $this->input->post('id_kepala_desa');
        $data = $this->Kepala_desa_model->editdata($id);
        $user_id = $this->session->userdata('id_user');
        $nama = './assets/admin/upload/kepala_desa/' . $data['foto'];

        $config['upload_path']          = './assets/admin/upload/kepala_desa/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $update = $this->Kepala_desa_model->proses_edit_data_tanpa_foto();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sa/kepala_desa');
        }
        if (is_readable($nama) && unlink($nama)) {
            $upload_data = array('upload_data' => $this->upload->data());
            $name = $upload_data['foto'];

            $data = array(
                'foto' => $name
            );

            $update = $this->Kepala_desa_model->proses_edit_data();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sa/kepala_desa');
        }
    }

    public function hapus_data($id)
    {
        $data = $this->Kepala_desa_model->hapus($id);
        $nama = './assets/admin/upload/kepala_desa/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Kepala_desa_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/kepala_desa');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/kepala_desa');
        }
    }
}
