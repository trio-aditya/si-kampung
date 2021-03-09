<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_berita_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('kategori_berita');
        $this->db->order_by('id_kategoriberita', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data()
    {
        $this->db->select('*');
        $this->db->from('kategori_berita');
        $this->db->order_by('id_kategoriberita', 'DESC');
        $this->db->join('berita', 'berita.kategori_id = kategori_berita.id_kategoriberita');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "kategori" => $this->input->post('kategori'),
        ];

        $this->db->insert('kategori_berita', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "kategori" => $this->input->post('kategori'),
        ];

        $this->db->where('id_kategoriberita', $this->input->post('id_kategoriberita'));
        $this->db->update('kategori_berita', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_kategoriberita', $id);
        $this->db->delete('kategori_berita');
    }

}
