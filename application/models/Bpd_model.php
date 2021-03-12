<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpd_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('bpd');
        $this->db->join('user', 'user.id_user = bpd.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('bpd');
        $this->db->where('id_bpd', $id);
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
            "jabatan" => $this->input->post('jabatan'),
            'user_id' => $user_id,
        ];

        $this->db->where('id_bpd', $this->input->post('id_bpd'));
        $this->db->update('bpd', $data);
    }

    //proses edit data tanpa file
    public function proses_edit_data_tanpa_foto()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "nama" => $this->input->post('nama'),
            "jabatan" => $this->input->post('jabatan'),
            'user_id' => $user_id,
        ];

        $this->db->where('id_bpd', $this->input->post('id_bpd'));
        $this->db->update('bpd', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('bpd');
        $this->db->where('id_bpd', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_bpd', $id);
        $this->db->delete('bpd');
    }
}
