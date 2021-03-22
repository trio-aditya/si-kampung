<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('user', 'user.id_user = penduduk.user_id');
        $this->db->join('hubungan_keluarga', 'hubungan_keluarga.id_hubungan_keluarga = penduduk.hubungan_keluarga_id');
        $this->db->join('agama', 'agama.id_agama = penduduk.agama_id');
        $this->db->join('golongan_darah', 'golongan_darah.id_golongan_darah = penduduk.golongan_darah_id');
        $this->db->join('jenis_cacat', 'jenis_cacat.id_jenis_cacat = penduduk.jenis_cacat_id');
        $this->db->join('sakit_menahun', 'sakit_menahun.id_sakit_menahun = penduduk.sakit_menahun_id');
        $this->db->join('akseptor', 'akseptor.id_akseptor = penduduk.akseptor_kb_id');
        $this->db->join('asuransi', 'asuransi.id_asuransi = penduduk.asuransi_id');
        $this->db->join('pendidikan', 'pendidikan.id_pendidikan = penduduk.pendidikan_id');
        $this->db->join('pendidikan_sekarang', 'pendidikan_sekarang.id_pendidikan_sekarang = penduduk.pendidikan_ditempuh_id');
        $this->db->join('pekerjaan', 'pekerjaan.id_pekerjaan = penduduk.pekerjaan_id');
        $this->db->order_by('id_penduduk', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function data()
    // {
    //     $this->db->select('*');
    //     $this->db->from('penduduk');
    //     $this->db->join('user', 'user.id_user = penduduk.user_id');
    //     $this->db->order_by('id_penduduk', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->where('id_penduduk', $id);
        $this->db->join('hubungan_keluarga', 'hubungan_keluarga.id_hubungan_keluarga = penduduk.hubungan_keluarga_id');
        $this->db->join('agama', 'agama.id_agama = penduduk.agama_id');
        $this->db->join('golongan_darah', 'golongan_darah.id_golongan_darah = penduduk.golongan_darah_id');
        $this->db->join('jenis_cacat', 'jenis_cacat.id_jenis_cacat = penduduk.jenis_cacat_id');
        $this->db->join('sakit_menahun', 'sakit_menahun.id_sakit_menahun = penduduk.sakit_menahun_id');
        $this->db->join('akseptor', 'akseptor.id_akseptor = penduduk.akseptor_kb_id');
        $this->db->join('asuransi', 'asuransi.id_asuransi = penduduk.asuransi_id');
        $this->db->join('pendidikan', 'pendidikan.id_pendidikan = penduduk.pendidikan_id');
        $this->db->join('pendidikan_sekarang', 'pendidikan_sekarang.id_pendidikan_sekarang = penduduk.pendidikan_ditempuh_id');
        $this->db->join('pekerjaan', 'pekerjaan.id_pekerjaan = penduduk.pekerjaan_id');
        $query = $this->db->get();
        return $query->row_array();
    }

    //proses edit data file
    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            "nik" => $this->input->post('nik'),
            "foto" => $nama['upload_data']['file_name'],
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

        $this->db->where('id_penduduk', $this->input->post('id_penduduk'));
        $this->db->update('penduduk', $data);
    }

    public function proses_edit_data_tanpa_foto()
    {
        $user_id = $this->session->userdata('id_user');
        $tanpa_foto = [
            "nik" => $this->input->post('nik'),
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

        $this->db->where('id_penduduk', $this->input->post('id_penduduk'));
        $this->db->update('penduduk', $tanpa_foto);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->where('id_penduduk', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_penduduk', $id);
        $this->db->delete('penduduk');
    }
}
