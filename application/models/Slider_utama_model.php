<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_utama_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('slider_utama');
        $this->db->order_by('id_slider_utama', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Menampilkan data slider untuk user    
    public function get_data_user()
    {
        $this->db->select('*');
        $this->db->from('slider_utama');
        $this->db->limit(1);
        $this->db->order_by('id_slider_utama', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('slider_utama');
        $this->db->where('id_slider_utama', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //proses edit data file
    public function proses_edit_data()
    {
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            "judul" => $this->input->post('judul'),
            "pesan" => $this->input->post('pesan'),
            "foto" => $nama['upload_data']['file_name'],
            "tanggal_update" => date('Y-m-d H:i:s'),
        ];

        $this->db->where('id_slider_utama', $this->input->post('id_slider_utama'));
        $this->db->update('slider_utama', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('slider_utama');
        $this->db->where('id_slider_utama', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_slider_utama', $id);
        $this->db->delete('slider_utama');
    }
}
