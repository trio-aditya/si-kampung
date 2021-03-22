<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akseptor_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('akseptor');
        // $this->db->order_by('id_akseptor', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "akseptor" => $this->input->post('akseptor'),
        ];

        $this->db->insert('akseptor', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "akseptor" => $this->input->post('akseptor'),
        ];

        $this->db->where('id_akseptor', $this->input->post('id_akseptor'));
        $this->db->update('akseptor', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_akseptor', $id);
        $this->db->delete('akseptor');
    }
}
