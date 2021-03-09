<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('kontak');
        $this->db->order_by('id_kontak', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "kontak" => $this->input->post('kontak'),
        ];

        $this->db->insert('kontak', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "kontak" => $this->input->post('kontak'),
        ];

        $this->db->where('id_kontak', $this->input->post('id_kontak'));
        $this->db->update('kontak', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_kontak', $id);
        $this->db->delete('kontak');
    }

}
