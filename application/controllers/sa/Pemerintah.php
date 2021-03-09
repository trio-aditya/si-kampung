<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemerintah extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Pemerintah_model');
        $this->load->model('K_perangkat_desa_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['kategori'] = $this->K_perangkat_desa_model->get_data($id);
        $x['pemerintah'] = $this->Pemerintah_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/pemerintah/home', $x);
    }

    //Tambah Data berupa File
    public function proses_tambah_data()
    {

        $user_id = $this->session->userdata('id_user');
        $nama = $this->input->post('nama');
        $jabatan_id = $this->input->post('jabatan_id');

        $config['upload_path']          = './assets/admin/upload/pemerintah/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/pemerintah');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $pemerintah = [
                "nama" => $nama,
                "foto" => $data['upload_data']['file_name'],
                "jabatan_id" => $jabatan_id,
                'user_id' => $user_id,
            ];
        }

        $this->db->insert('pemerintah', $pemerintah);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Tambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pemerintah');
    }


    public function detail($id)
    {
        $x['pemerintah'] = $this->Pemerintah_model->editdata($id);

        $this->template->load('layouts/sa/template', 'content/sa/pemerintah/detail', $x);
    }

    public function proses_edit_data()
    {
        $id = $this->input->post('id_pemerintah');
        $data = $this->Pemerintah_model->editdata($id);
        $nama = './assets/admin/upload/pemerintah/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {

            $config['upload_path']          = './assets/admin/upload/pemerintah/';
            $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data['error_upload'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', ' ');
                redirect('sa/pemerintah');
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $name = $upload_data['foto'];

                $data = array(
                    'foto' => $name
                );

                $update = $this->Pemerintah_model->proses_edit_data();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('sa/pemerintah');
            }
        }
    }

    public function hapus_data($id)
    {
        $data = $this->Pemerintah_model->hapus($id);
        $nama = './assets/admin/upload/pemerintah/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Pemerintah_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/pemerintah');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/pemerintah');
        }
    }
}
