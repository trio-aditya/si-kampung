<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemerintah_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('pemerintah');
        $this->db->join('user', 'user.id_user = pemerintah.user_id');
        $this->db->join('kategori_perangkat_desa', 'kategori_perangkat_desa.id_kategoripd = pemerintah.jabatan_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('pemerintah');
        $this->db->join('kategori_perangkat_desa', 'kategori_perangkat_desa.id_kategoripd = pemerintah.jabatan_id');
        $this->db->where('id_pemerintah', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //proses edit data file
    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            "nama" => $this->input->post('nama'),
            "foto" => $nama['upload_data']['file_name'],
            "jabatan_id" => $this->input->post('jabatan_id'),
            'user_id' => $user_id,
        ];

        $this->db->where('id_pemerintah', $this->input->post('id_pemerintah'));
        $this->db->update('pemerintah', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('pemerintah');
        $this->db->where('id_pemerintah', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_pemerintah', $id);
        $this->db->delete('pemerintah');
    }
}
