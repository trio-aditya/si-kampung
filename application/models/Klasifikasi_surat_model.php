<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi_surat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('klasifikasi_surat');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "kode" => $this->input->post('kode'),
            "nama_klasifikasi" => $this->input->post('nama_klasifikasi'),
        ];

        $this->db->insert('klasifikasi_surat', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "kode" => $this->input->post('kode'),
            "nama_klasifikasi" => $this->input->post('nama_klasifikasi'),
        ];

        $this->db->where('id_klasifikasi_surat', $this->input->post('id_klasifikasi_surat'));
        $this->db->update('klasifikasi_surat', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_klasifikasi_surat', $id);
        $this->db->delete('klasifikasi_surat');
    }
}
