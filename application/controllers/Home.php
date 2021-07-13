<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Klinik_model');
        $this->load->model('Cabang_model');
        $this->load->model('Dokter_model');
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
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_resepsionis');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/resepsionis/index', $data);
        $this->load->view('components/footer');
        // end resepsionis
    }
}

/* End of file Home.php */
