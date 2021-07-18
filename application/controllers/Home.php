<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('', 'refresh');
        }
        $this->load->model('Klinik_model');
        $this->load->model('Cabang_model');
        $this->load->model('Dokter_model');
        $this->load->model('Rencana_model');
    }


    public function index()
    {
        // start resepsionis
        $data['title'] = "Home | Tumbuh Sehat";
        $data['judulHalaman'] = "Home";
        $data['subJudulHalaman'] = "Selamat datang di <b>Tumbuh Sehat</b>";
        $data['iconHalaman'] = "ik-home";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item active"><i class="ik ik-home"></i></li>';

        $data['keluarga'] = $this->Klinik_model->tampil();

        $data['dokter'] = $this->Dokter_model->get_dokter();
        $data['cabang'] = $this->Cabang_model->get_cabang();
        $data['rencana_sebelum'] = $this->Rencana_model->get_rencana_sebelum();
        $this->load->view('components/header', $data);

        if ($this->session->userdata('level') == "Owner") {
            $this->load->view('components/sidebar_owner');
        } elseif ($this->session->userdata('level') == "Klinik") {
            $this->load->view('components/sidebar_resepsionis');
        } else {
            $this->load->view('components/sidebar_dokter');
        }

        $this->load->view('components/breadcrumbs', $data);

        if ($this->session->userdata('level') == "Owner" || $this->session->userdata('level') == "Klinik") {
            $this->load->view('pages/home/resepsionis/index', $data);
        } else {
            $this->load->view('pages/home/dokter/index');
        }

        $this->load->view('components/footer');
        // end resepsionis
    }
    function buatAkunKeluarga()
    {
        $data['title'] = "Home | Tumbuh Sehat";
        $data['judulHalaman'] = "Buat Akun Keluarga";
        $data['subJudulHalaman'] = "Selamat datang di <b>Tumbuh Sehat</b>";
        $data['iconHalaman'] = "ik ik-edit bg-blue";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item active"><i class="ik ik-edit bg-blue"></i></li>';

        // extra script for select2 dropdown search
      $data['extraHeaderScript'] = '<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>';
      
      $data['_antrian'] = 1;
      $data['content'] = 'klinik/tambah_pasien';
      $this->load->view('components/header', $data);
      $this->load->view('components/sidebar_resepsionis');
      $this->load->view('components/breadcrumbs', $data);
      $this->load->view('pages/home/resepsionis/buatAkunKeluarga', $data);
      $this->load->view('components/footer');
  
      // if($this->input->post('kirim'))
      // {
      //   $nama_depan = $this->input->post('nama_depan');
      //   $
      // }
  
    }
}

/* End of file Home.php */
