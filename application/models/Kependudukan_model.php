<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kependudukan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('kependudukan');
        $this->db->order_by('id_kependudukan', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data()
    {
        $this->db->select('*');
        $this->db->from('kependudukan');
        $this->db->order_by('id_kependudukan', 'DESC');
        // $this->db->join('berita', 'berita.kategori_id = kependudukan.id_kependudukan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "nik" => $this->input->post('nik'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
        ];

        $this->db->insert('kependudukan', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "kategori" => $this->input->post('kategori'),
        ];

        $this->db->where('id_kependudukan', $this->input->post('id_kependudukan'));
        $this->db->update('kependudukan', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_kependudukan', $id);
        $this->db->delete('kependudukan');
    }
}
