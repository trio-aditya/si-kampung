<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pendidikan_sekarang_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('pendidikan_sekarang');
        // $this->db->order_by('id_pendidikan_sekarang', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "pendidikan_sekarang" => $this->input->post('pendidikan_sekarang'),
        ];

        $this->db->insert('pendidikan_sekarang', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "pendidikan_sekarang" => $this->input->post('pendidikan_sekarang'),
        ];

        $this->db->where('id_pendidikan_sekarang', $this->input->post('id_pendidikan_sekarang'));
        $this->db->update('pendidikan_sekarang', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_pendidikan_sekarang', $id);
        $this->db->delete('pendidikan_sekarang');
    }
}
