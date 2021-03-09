<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('user', 'user.id_user = berita.user_id');
        $this->db->join('kategori_berita', 'kategori_berita.id_kategoriberita = berita.kategori_id');
        $this->db->limit(15);
        $this->db->order_by('id_berita', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data($limit, $start){
        return $this->db->get('berita', $limit, $start)->result_array();
    }

    //Search
    public function get_search($keyword){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->like('judul_berita',$keyword);
        // $this->db->or_like('harga',$keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function kategori($id){
        $this->db->select('*');
        $this->db->from('kategori_berita');
        // $this->db->join('user', 'user.id_user = berita.user_id');
        $this->db->join('berita', 'berita.kategori_id = kategori_berita.id_kategoriberita');
        $this->db->limit(5);
        $this->db->order_by('id_kategoriberita', 'DESC');
        $this->db->where('id_kategoriberita', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countBerita() {
        return $this->db->get('berita')->num_rows();
    }

    //digunakan untuk menampilkan data
    public function editdata($id)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('kategori_berita', 'kategori_berita.id_kategoriberita = berita.kategori_id');
        $this->db->where('id_berita', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    //proses edit data file
    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            "judul_berita" => $this->input->post('judul_berita'),
            "isi" => $this->input->post('isi'),
            "foto" => $nama['upload_data']['file_name'],
            "kategori_id" => $this->input->post('kategori_id'),
            'user_id' => $user_id,
            "tanggal_update" => date('Y-m-d H:i:s'),
        ];

        $this->db->where('id_berita', $this->input->post('id_berita'));
        $this->db->update('berita', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id_berita', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->delete('berita');
    }

    public function search($keyword){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->like('judul_berita',$keyword);
		// $this->db->or_like('harga',$keyword);
		return $this->db->get()->result();
	}
}
