<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_cacat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('jenis_cacat');
        // $this->db->order_by('id_jenis_cacat', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "jenis_cacat" => $this->input->post('jenis_cacat'),
        ];

        $this->db->insert('jenis_cacat', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "jenis_cacat" => $this->input->post('jenis_cacat'),
        ];

        $this->db->where('id_jenis_cacat', $this->input->post('id_jenis_cacat'));
        $this->db->update('jenis_cacat', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_jenis_cacat', $id);
        $this->db->delete('jenis_cacat');
    }
}
