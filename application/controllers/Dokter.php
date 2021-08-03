<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('', 'refresh');
        }
        $this->load->model('Cabang_model');
        $this->load->model('Dokter_model');
        $this->load->model('Klinik_model');
        $this->load->model('Pasien_model');
    }

    public function index(){
        $id_user = $this->session->userdata('id_user');
        $id_dokter = $this->Dokter_model->get_dokter_id($id_user);

        $data = [
            'title' => 'Home | Tumbuh Sehat',
            'judulHalaman' => 'Home',
            'subJudulHalaman' => 'Selamat datang di <b>Tumbuh Sehat</b>',
            'iconHalaman' => 'ik-home',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li>',
            'dokter' => $this->Dokter_model->get_dokter(),
            'cabang' => $this->Cabang_model->get_cabang(),
            'daftarPasien' =>  $this->Dokter_model->getDaftarPasien($id_dokter)
        ];

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_dokter');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/dokter/index',$data);
        $this->load->view('components/footer');
        $this->load->view('pages/home/dokter/dokter-script',$data);
    }

    public function pemeriksaan($id_pasien = 16)
    {
        $data = [
            'title' => 'Pemeriksaan Pasien | Tumbuh Sehat',
            'judulHalaman' => 'Data Pemeriksaan',
            'subJudulHalaman' => 'Pemeriksaan Pasien<b> Alif faizal </b>',
            'iconHalaman' => 'ik-calendar',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li> <li class="breadcrumb-item active">Jadwal Pemeriksaan</i></li>',
        ];

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_dokter');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/dokter/pemeriksaan');
        $this->load->view('components/footer');
        // end resepsionis
    }
}
