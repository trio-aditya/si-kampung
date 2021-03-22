<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('pendidikan');
        // $this->db->order_by('id_pendidikan', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "pendidikan" => $this->input->post('pendidikan'),
        ];

        $this->db->insert('pendidikan', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "pendidikan" => $this->input->post('pendidikan'),
        ];

        $this->db->where('id_pendidikan', $this->input->post('id_pendidikan'));
        $this->db->update('pendidikan', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_pendidikan', $id);
        $this->db->delete('pendidikan');
    }
}
