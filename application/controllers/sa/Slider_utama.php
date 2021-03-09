<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_utama extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Slider_utama_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['slider_utama'] = $this->Slider_utama_model->get_data($id);

        $this->template->load('layouts/sa/template', 'content/sa/slider_utama/home', $x);
    }

    //Tambah Data berupa File
    public function proses_tambah_data()
    {
        $judul = $this->input->post('judul');
        $pesan = $this->input->post('pesan');
        $tanggal_update = date('Y-m-d H:i:s');

        $config['upload_path']          = './assets/admin/upload/slider/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/slider_utama');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $slider_utama = [
                "judul" => $judul,
                "pesan" => $pesan,
                "foto" => $data['upload_data']['file_name'],
                "tanggal_update" => $tanggal_update,
            ];
        }

        $this->db->insert('slider_utama', $slider_utama);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Tambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/slider_utama');
    }


    public function detail($id)
    {
        $x['slider_utama'] = $this->Slider_utama_model->editdata($id);

        $this->template->load('layouts/sa/template', 'content/sa/slider_utama/detail', $x);
    }

    public function proses_edit_data()
    {
        $id = $this->input->post('id_slider_utama');
        $data = $this->Slider_utama_model->editdata($id);
        $nama = './assets/admin/upload/slider/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {

            $config['upload_path']          = './assets/admin/upload/slider/';
            $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data['error_upload'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', ' ');
                redirect('sa/slider_utama');
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $name = $upload_data['foto'];

                $data = array(
                    'foto' => $name
                );

                $update = $this->Slider_utama_model->proses_edit_data();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('sa/slider_utama');
            }
        }
    }

    public function hapus_data($id)
    {
        $data = $this->Slider_utama_model->hapus($id);
        $nama = './assets/admin/upload/slider/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Slider_utama_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/slider_utama');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/slider_utama');
        }
    }
}
