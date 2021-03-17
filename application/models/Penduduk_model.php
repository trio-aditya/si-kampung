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
            "nama" => $this->input->post('nama'),
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
