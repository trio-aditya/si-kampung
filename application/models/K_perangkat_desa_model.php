<?php
defined('BASEPATH') or exit('No direct script access allowed');

class K_perangkat_desa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('kategori_perangkat_desa');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "kategori_pd" => $this->input->post('kategori_pd'),
        ];

        $this->db->insert('kategori_perangkat_desa', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "kategori_pd" => $this->input->post('kategori_pd'),
        ];

        $this->db->where('id_kategoripd', $this->input->post('id_kategoripd'));
        $this->db->update('kategori_perangkat_desa', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_kategoripd', $id);
        $this->db->delete('kategori_perangkat_desa');
    }

}
