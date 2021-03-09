<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('slider');
        // $this->db->join('user', 'user.id_user = slider.user_id');
        // $this->db->limit(3);
        $this->db->order_by('id_slider', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data()
    {
        $this->db->select('*');
        $this->db->from('slider');
        // $this->db->join('user', 'user.id_user = slider.user_id');
        $this->db->limit(5);
        $this->db->order_by('id_slider', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function slider_utama()
    {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->limit(1);
        $this->db->order_by('id_slider', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('id_slider', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //proses edit data file
    public function proses_edit_data()
    {
        // $user_id = $this->session->userdata('id_user');
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            "pesan" => $this->input->post('pesan'),
            "foto" => $nama['upload_data']['file_name'],
            // 'user_id' => $user_id,
            "tanggal_update" => date('Y-m-d H:i:s'),
        ];

        $this->db->where('id_slider', $this->input->post('id_slider'));
        $this->db->update('slider', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('id_slider', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_slider', $id);
        $this->db->delete('slider');
    }
}
