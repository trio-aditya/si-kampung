<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('pekerjaan');
        // $this->db->order_by('id_pekerjaan', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "pekerjaan" => $this->input->post('pekerjaan'),
        ];

        $this->db->insert('pekerjaan', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "pekerjaan" => $this->input->post('pekerjaan'),
        ];

        $this->db->where('id_pekerjaan', $this->input->post('id_pekerjaan'));
        $this->db->update('pekerjaan', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_pekerjaan', $id);
        $this->db->delete('pekerjaan');
    }
}
