<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asuransi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('asuransi');
        // $this->db->order_by('id_asuransi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "asuransi" => $this->input->post('asuransi'),
        ];

        $this->db->insert('asuransi', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "asuransi" => $this->input->post('asuransi'),
        ];

        $this->db->where('id_asuransi', $this->input->post('id_asuransi'));
        $this->db->update('asuransi', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_asuransi', $id);
        $this->db->delete('asuransi');
    }
}
