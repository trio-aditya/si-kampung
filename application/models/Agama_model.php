<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agama_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('agama');
        // $this->db->order_by('id_agama', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "agama" => $this->input->post('agama'),
        ];

        $this->db->insert('agama', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "agama" => $this->input->post('agama'),
        ];

        $this->db->where('id_agama', $this->input->post('id_agama'));
        $this->db->update('agama', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_agama', $id);
        $this->db->delete('agama');
    }
}
