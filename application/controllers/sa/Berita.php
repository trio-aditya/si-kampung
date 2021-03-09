<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Berita_model');
        $this->load->model('Kategori_berita_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['kategori'] = $this->Kategori_berita_model->get_data($id);
        $x['berita'] = $this->Berita_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/berita/home', $x);
    }

    //Tambah Data berupa File
    public function proses_tambah_data()
    {

        $user_id = $this->session->userdata('id_user');
        $judul_berita = $this->input->post('judul_berita');
        $isi = $this->input->post('isi');
        $kategori_id = $this->input->post('kategori_id');
        $tanggal_update = date('Y-m-d H:i:s');

        $config['upload_path']          = './assets/admin/upload/berita/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/berita');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $berita = [
                "judul_berita" => $judul_berita,
                "isi" => $isi,
                "foto" => $data['upload_data']['file_name'],
                "kategori_id" => $kategori_id,
                'user_id' => $user_id,
                "tanggal_update" => $tanggal_update,
            ];
        }

        $this->db->insert('berita', $berita);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Tambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/berita');
    }


    public function detail($id)
    {
        $x['berita'] = $this->Berita_model->editdata($id);

        $this->template->load('layouts/sa/template', 'content/sa/berita/detail', $x);
    }

    public function proses_edit_data()
    {
        $id = $this->input->post('id_berita');
        $data = $this->Berita_model->editdata($id);
        $nama = './assets/admin/upload/berita/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {

            $config['upload_path']          = './assets/admin/upload/berita/';
            $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data['error_upload'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', ' ');
                redirect('sa/berita');
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $name = $upload_data['foto'];

                $data = array(
                    'foto' => $name
                );

                $update = $this->Berita_model->proses_edit_data();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('sa/berita');
            }
        }
    }

    public function hapus_data($id)
    {
        $data = $this->Berita_model->hapus($id);
        $nama = './assets/admin/upload/berita/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Berita_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/berita');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/berita');
        }
    }
}
