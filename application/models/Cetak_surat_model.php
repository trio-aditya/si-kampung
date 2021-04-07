<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_surat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('cetak_surat');
        // $this->db->order_by('id_cetak_surat', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $user_id = $this->session->userdata('id_user');

        $data = [
            "surat_id" => $this->input->post('surat_id'),
            "penduduk_id" => $this->input->post('penduduk_id'),
            "keperluan" => $this->input->post('keperluan'),
            "keterangan" => $this->input->post('keterangan'),
            "dari" => $this->input->post('dari'),
            "sampai" => $this->input->post('sampai'),
            "tanggal_update" => date('Y-m-d'),
            "user_id" => $user_id,
        ];

        $this->db->insert('cetak_surat', $data);
    }
}
