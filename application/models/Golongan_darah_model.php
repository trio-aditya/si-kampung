<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan_darah_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('golongan_darah');
        // $this->db->order_by('id_golongan_darah', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "golongan_darah" => $this->input->post('golongan_darah'),
        ];

        $this->db->insert('golongan_darah', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "golongan_darah" => $this->input->post('golongan_darah'),
        ];

        $this->db->where('id_golongan_darah', $this->input->post('id_golongan_darah'));
        $this->db->update('golongan_darah', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_golongan_darah', $id);
        $this->db->delete('golongan_darah');
    }
}
