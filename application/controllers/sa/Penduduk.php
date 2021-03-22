<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('tgl_indo_helper');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Pendidikan_model');
        $this->load->model('Pendidikan_sekarang_model');
        $this->load->model('Pekerjaan_model');
        $this->load->model('Agama_model');
        $this->load->model('Akseptor_model');
        $this->load->model('Asuransi_model');
        $this->load->model('Jenis_cacat_model');
        $this->load->model('Golongan_darah_model');
        $this->load->model('Hubungan_keluarga_model');
        $this->load->model('Sakit_menahun_model');

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
        $x['pendidikan'] = $this->Pendidikan_model->get_data();
        $x['pendidikan_sekarang'] = $this->Pendidikan_sekarang_model->get_data();
        $x['pekerjaan'] = $this->Pekerjaan_model->get_data();
        $x['agama'] = $this->Agama_model->get_data();
        $x['akseptor'] = $this->Akseptor_model->get_data();
        $x['asuransi'] = $this->Asuransi_model->get_data();
        $x['golongan_darah'] = $this->Golongan_darah_model->get_data();
        $x['jenis_cacat'] = $this->Jenis_cacat_model->get_data();
        $x['sakit_menahun'] = $this->Sakit_menahun_model->get_data();
        $x['hubungan_keluarga'] = $this->Hubungan_keluarga_model->get_data();

        $this->template->load('layouts/sa/template', 'content/sa/penduduk/add', $x);
    }


    //Tambah Data berupa File
    public function proses_tambah_data()
    {

        $user_id = $this->session->userdata('id_user');

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
                "nik" => $this->input->post('nik'),
                "foto" => $data['upload_data']['file_name'],
                "nama" => $this->input->post('nama'),
                "no_kk" => $this->input->post('no_kk'),
                "hubungan_keluarga_id" => $this->input->post('hubungan_keluarga_id'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "agama_id" => $this->input->post('agama_id'),
                "status_penduduk" => $this->input->post('status_penduduk'),
                "no_akta" => $this->input->post('no_akta'),
                "tempat_lahir" => $this->input->post('tempat_lahir'),
                "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                "waktu_kelahiran" => $this->input->post('waktu_kelahiran'),
                "tempat_dilahirkan" => $this->input->post('tempat_dilahirkan'),
                "jenis_kelahiran" => $this->input->post('jenis_kelahiran'),
                "anak_ke" => $this->input->post('anak_ke'),
                "penolong_kelahiran" => $this->input->post('penolong_kelahiran'),
                "berat_badan" => $this->input->post('berat_badan'),
                "panjang_lahir" => $this->input->post('panjang_lahir'),
                "pendidikan_id" => $this->input->post('pendidikan_id'),
                "pendidikan_ditempuh_id" => $this->input->post('pendidikan_ditempuh_id'),
                "pekerjaan_id" => $this->input->post('pekerjaan_id'),
                "status_warga_negara" => $this->input->post('status_warga_negara'),
                "nomor_kitas" => $this->input->post('nomor_kitas'),
                "nik_ayah" => $this->input->post('nik_ayah'),
                "nama_ayah" => $this->input->post('nama_ayah'),
                "nik_ibu" => $this->input->post('nik_ibu'),
                "nama_ibu" => $this->input->post('nama_ibu'),
                "dusun" => $this->input->post('dusun'),
                "rt" => $this->input->post('rt'),
                "rw" => $this->input->post('rw'),
                "no_telepon" => $this->input->post('no_telepon'),
                "email" => $this->input->post('email'),
                "alamat_sebelumnya" => $this->input->post('alamat_sebelumnya'),
                "alamat_sekarang" => $this->input->post('alamat_sekarang'),
                "status_perkawinan" => $this->input->post('status_perkawinan'),
                "no_akta_nikah" => $this->input->post('no_akta_nikah'),
                "tanggal_perkawinan" => $this->input->post('tanggal_perkawinan'),
                "golongan_darah_id" => $this->input->post('golongan_darah_id'),
                "jenis_cacat_id" => $this->input->post('jenis_cacat_id'),
                "sakit_menahun_id" => $this->input->post('sakit_menahun_id'),
                "akseptor_kb_id" => $this->input->post('akseptor_kb_id'),
                "asuransi_id" => $this->input->post('asuransi_id'),
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

    public function edit($id)
    {
        // $id_user = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['penduduk'] = $this->Penduduk_model->editdata($id);
        $x['pendidikan'] = $this->Pendidikan_model->get_data();
        $x['pendidikan_sekarang'] = $this->Pendidikan_sekarang_model->get_data();
        $x['pekerjaan'] = $this->Pekerjaan_model->get_data();
        $x['agama'] = $this->Agama_model->get_data();
        $x['akseptor'] = $this->Akseptor_model->get_data();
        $x['asuransi'] = $this->Asuransi_model->get_data();
        $x['golongan_darah'] = $this->Golongan_darah_model->get_data();
        $x['jenis_cacat'] = $this->Jenis_cacat_model->get_data();
        $x['sakit_menahun'] = $this->Sakit_menahun_model->get_data();
        $x['hubungan_keluarga'] = $this->Hubungan_keluarga_model->get_data();

        $this->template->load('layouts/sa/template', 'content/sa/penduduk/edit', $x);
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
