<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potensi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('potensi');
        $this->db->join('user', 'user.id_user = potensi.user_id');
        $this->db->limit(15);
        $this->db->order_by('id_potensi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data($limit, $start){
        return $this->db->get('potensi', $limit, $start)->result_array();
    }

    public function countPotensi() {
        return $this->db->get('potensi')->num_rows();
    }

    //Search
    public function get_search($keyword){
        $this->db->select('*');
        $this->db->from('potensi');
        $this->db->like('judul',$keyword);
        // $this->db->or_like('harga',$keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('potensi');
        $this->db->where('id_potensi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //proses edit data file
    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            "judul" => $this->input->post('judul'),
            "isi" => $this->input->post('isi'),
            "foto" => $nama['upload_data']['file_name'],
            'user_id' => $user_id,
            "tanggal_update" => date('Y-m-d H:i:s'),
        ];

        $this->db->where('id_potensi', $this->input->post('id_potensi'));
        $this->db->update('potensi', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('potensi');
        $this->db->where('id_potensi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_potensi', $id);
        $this->db->delete('potensi');
    }
}
