<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sakit_menahun_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('sakit_menahun');
        // $this->db->order_by('id_sakit_menahun', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "sakit_menahun" => $this->input->post('sakit_menahun'),
        ];

        $this->db->insert('sakit_menahun', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "sakit_menahun" => $this->input->post('sakit_menahun'),
        ];

        $this->db->where('id_sakit_menahun', $this->input->post('id_sakit_menahun'));
        $this->db->update('sakit_menahun', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_sakit_menahun', $id);
        $this->db->delete('sakit_menahun');
    }
}
