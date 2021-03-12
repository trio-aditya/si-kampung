<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpd extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Bpd_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['bpd'] = $this->Bpd_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/bpd/home', $x);
    }

    //Tambah Data berupa File
    public function proses_tambah_data()
    {

        $user_id = $this->session->userdata('id_user');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');

        $config['upload_path']          = './assets/admin/upload/bpd/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/bpd');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $bpd = [
                "nama" => $nama,
                "foto" => $data['upload_data']['file_name'],
                "jabatan" => $jabatan,
                'user_id' => $user_id,
            ];
        }

        $this->db->insert('bpd', $bpd);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Tambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/bpd');
    }


    public function detail($id)
    {
        $x['bpd'] = $this->Bpd_model->editdata($id);

        $this->template->load('layouts/sa/template', 'content/sa/bpd/detail', $x);
    }

    public function proses_edit_data()
    {
        $id = $this->input->post('id_bpd');
        $data = $this->Bpd_model->editdata($id);
        $nama = './assets/admin/upload/bpd/' . $data['foto'];

        $config['upload_path']          = './assets/admin/upload/bpd/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $update = $this->Bpd_model->proses_edit_data_tanpa_foto();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sa/bpd');
        }
        if (is_readable($nama) && unlink($nama)) {
            $upload_data = array('upload_data' => $this->upload->data());
            $name = $upload_data['foto'];

            $data = array(
                'foto' => $name
            );

            $update = $this->Bpd_model->proses_edit_data();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sa/bpd');
        }
    }

    public function hapus_data($id)
    {
        $data = $this->Bpd_model->hapus($id);
        $nama = './assets/admin/upload/bpd/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Bpd_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/bpd');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/bpd');
        }
    }
}
