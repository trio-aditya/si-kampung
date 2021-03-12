<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpm_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('lpm');
        $this->db->join('user', 'user.id_user = lpm.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('lpm');
        $this->db->where('id_lpm', $id);
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

        $this->db->where('id_lpm', $this->input->post('id_lpm'));
        $this->db->update('lpm', $data);
    }

    //proses edit data file tanpa file
    public function proses_edit_data_tanpa_foto()
    {
        $user_id = $this->session->userdata('id_user');
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            "nama" => $this->input->post('nama'),
            "jabatan" => $this->input->post('jabatan'),
            'user_id' => $user_id,
        ];

        $this->db->where('id_lpm', $this->input->post('id_lpm'));
        $this->db->update('lpm', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('lpm');
        $this->db->where('id_lpm', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_lpm', $id);
        $this->db->delete('lpm');
    }
}
