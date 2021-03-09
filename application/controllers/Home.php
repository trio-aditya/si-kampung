<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->check_login();

    $this->load->model('Auth_model');
    $this->load->model('Pemerintah_model');
    $this->load->model('Bpd_model');
    $this->load->model('Lpm_model');
    $this->load->model('Pkk_model');
    $this->load->model('Karang_taruna_model');

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function index()
  {


    $perangkat_desa = $this->Pemerintah_model->get_data();
    $bpd = $this->Bpd_model->get_data();
    $lpm = $this->Lpm_model->get_data();
    $pkk = $this->Pkk_model->get_data();
    $karang_taruna = $this->Karang_taruna_model->get_data();

    $x['perangkat_desa'] = count($perangkat_desa);
    $x['bpd'] = count($bpd);
    $x['lpm'] = count($lpm);
    $x['pkk'] = count($pkk);
    $x['karang_taruna'] = count($karang_taruna);
    
     $this->template->load('layouts/sa/template', 'content/home', $x);
  }
}
