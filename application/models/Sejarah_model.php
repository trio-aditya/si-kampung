<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sejarah_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('sejarah');
        $this->db->order_by('id_sejarah', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $id = $this->session->userdata('id_user');
        $data = [
            "sejarah" => $this->input->post('sejarah'),
            "user_id" => $id,
        ];

        $this->db->insert('sejarah', $data);
    }

    public function proses_edit_data()
    {
        $data = [
            "sejarah" => $this->input->post('sejarah'),
        ];

        $this->db->where('id_sejarah', $this->input->post('id_sejarah'));
        $this->db->update('sejarah', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_sejarah', $id);
        $this->db->delete('sejarah');
    }

}
