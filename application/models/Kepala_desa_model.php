<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala_desa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('kepala_desa');
        $this->db->join('user', 'user.id_user = kepala_desa.user_id');
        $this->db->order_by('id_kepala_desa', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data()
    {
        $this->db->select('*');
        $this->db->from('kepala_desa');
        $this->db->join('user', 'user.id_user = kepala_desa.user_id');
        $this->db->order_by('id_kepala_desa', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('kepala_desa');
        $this->db->where('id_kepala_desa', $id);
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
            "periode" => $this->input->post('periode'),
            "sambutan" => $this->input->post('sambutan'),
            'user_id' => $user_id,
        ];

        $this->db->where('id_kepala_desa', $this->input->post('id_kepala_desa'));
        $this->db->update('kepala_desa', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('kepala_desa');
        $this->db->where('id_kepala_desa', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_kepala_desa', $id);
        $this->db->delete('kepala_desa');
    }
}
