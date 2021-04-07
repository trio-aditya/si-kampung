<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_surat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->join('user', 'user.id_user = surat.user_id');
        $this->db->join('klasifikasi_surat', 'klasifikasi_surat.id_klasifikasi_surat = surat.klasifikasi_surat_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->where('id_surat', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //proses edit data file
    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            "klasifikasi_surat_id" => $this->input->post('klasifikasi_surat_id'),
            "nama_layanan" => $this->input->post('nama_layanan'),
            "surat" => $nama['upload_data']['file_name'],
            'user_id' => $user_id,
        ];

        $this->db->where('id_surat', $this->input->post('id_surat'));
        $this->db->update('surat', $data);
    }

    //proses edit data tanpa file
    public function proses_edit_data_tanpa_surat()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "klasifikasi_surat_id" => $this->input->post('klasifikasi_surat_id'),
            "nama_layanan" => $this->input->post('nama_layanan'),
            'user_id' => $user_id,
        ];

        $this->db->where('id_surat', $this->input->post('id_surat'));
        $this->db->update('surat', $data);
    }

    //digunakan untuk menampilkan data surat
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->where('id_surat', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_surat', $id);
        $this->db->delete('surat');
    }
}
