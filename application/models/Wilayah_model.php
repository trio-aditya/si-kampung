<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('wilayah');
        $this->db->order_by('id_wilayah', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $id = $this->session->userdata('id_user');
        $data = [
            "wilayah" => $this->input->post('wilayah'),
            "user_id" => $id,
        ];

        $this->db->insert('wilayah', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "wilayah" => $this->input->post('wilayah'),
        ];

        $this->db->where('id_wilayah', $this->input->post('id_wilayah'));
        $this->db->update('wilayah', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_wilayah', $id);
        $this->db->delete('wilayah');
    }

}
