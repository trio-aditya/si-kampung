<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_surat_model extends CI_Model
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
        $this->db->join('user', 'user.id_user = cetak_surat.user_id');
        $this->db->join('surat', 'surat.id_surat = cetak_surat.surat_id');
        $this->db->join('klasifikasi_surat', 'klasifikasi_surat.id_klasifikasi_surat = surat.klasifikasi_surat_id');
        $this->db->join('penduduk', 'penduduk.id_penduduk = cetak_surat.penduduk_id');
        $this->db->order_by('id_cetak_surat', 'DESC');
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
            "tanggal_update" => date('Y-m-d H:i:s'),
            "user_id" => $user_id,
        ];

        $this->db->insert('cetak_surat', $data);
    }

    //digunakan untuk menampilkan data
    public function detaildata($id)
    {
        $this->db->select('*');
        $this->db->from('cetak_surat');
        $this->db->join('penduduk', 'penduduk.id_penduduk = cetak_surat.penduduk_id');
        $this->db->join('surat', 'surat.id_surat = cetak_surat.surat_id');
        $this->db->join('klasifikasi_surat', 'klasifikasi_surat.id_klasifikasi_surat = surat.klasifikasi_surat_id');
        $this->db->where('id_cetak_surat', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "keterangan" => $this->input->post('keterangan'),
        ];

        $this->db->where('id_cetak_surat', $this->input->post('id_cetak_surat'));
        $this->db->update('cetak_surat', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_cetak_surat', $id);
        $this->db->delete('cetak_surat');
    }
}
