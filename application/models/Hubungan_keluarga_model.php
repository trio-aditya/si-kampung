<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hubungan_keluarga_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('hubungan_keluarga');
        // $this->db->order_by('id_hubungan_keluarga', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "hubungan_keluarga" => $this->input->post('hubungan_keluarga'),
        ];

        $this->db->insert('hubungan_keluarga', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "hubungan_keluarga" => $this->input->post('hubungan_keluarga'),
        ];

        $this->db->where('id_hubungan_keluarga', $this->input->post('id_hubungan_keluarga'));
        $this->db->update('hubungan_keluarga', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_hubungan_keluarga', $id);
        $this->db->delete('hubungan_keluarga');
    }
}
