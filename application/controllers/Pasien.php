<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('', 'refresh');
        }
        $this->load->model('Pasien_model');
        $this->load->model('Pasien_informasi_model');
        $this->load->model('Dokter_model');
        
    }

    function ajax_get_pasien($id)
    {
        $this->db->where('id_pasien', $id);
        echo json_encode($this->db->get('pasien')->result());
    }

    public function getDataPasien($id_user)
    {
        header('Access-Control-Allow-Origin: *');
        echo json_encode($this->Pasien_model->get_pasien_byIdKeluarga($id_user));
    }

    public function tambahPasienBaruWithId($id_user)
    {
        echo "Garap gengg add pasien, iki keluarga id ne wes metu = " . $id_user;
    }

    public function index()
    {
        $data['title'] = "Pasien | Tumbuh Sehat";
        $data['judulHalaman'] = "Informasi Pasien";
        $data['subJudulHalaman'] = "Daftar pasien klinik Tumbuh Sehar";
        $data['iconHalaman'] = "ik-users";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Informasi Pasien</li>';
        
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_resepsionis');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/pasien/index');
        $this->load->view('components/footer');
    }

    public function detail_informasi_pasien($id_pasien, $id_booking)
    {
        $data['title'] = "Pasien | Tumbuh Sehat";
        $data['judulHalaman'] = "Informasi Pasien";
        $data['subJudulHalaman'] = "Daftar pasien klinik Tumbuh Sehar";
        $data['iconHalaman'] = "ik-users";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('pasien').'">Informasi Pasien</a></li>
            <li class="breadcrumb-item active">Detail Informasi Pasien</li>';
            
        $this->load->view('components/header', $data);
        
        if ($this->session->userdata('level') == "Owner") {
            $this->load->view('components/sidebar_owner');
        } elseif ($this->session->userdata('level') == "Klinik") {
            $this->load->view('components/sidebar_resepsionis');
        } else {
            $this->load->view('components/sidebar_dokter');
        }

        $this->load->view('components/breadcrumbs', $data);
        
        $data['info'] = $this->Pasien_informasi_model->get_informasi($id_pasien, $id_booking);
        $data['info_umum'] = $this->Pasien_informasi_model->get_informasi_umum($id_pasien, $id_booking);
        $data['info_klinis'] = $this->Pasien_informasi_model->get_klinis($id_pasien);
        $data['info_penunjang'] = $this->Pasien_informasi_model->get_penunjang($id_pasien);
        $data['info_bayar'] = $this->Pasien_informasi_model->get_pembayaran($id_pasien, $id_booking);
        $data['dokter'] = $this->Dokter_model->get_dokter();

        $this->load->view('pages/pasien/detail_pasien', $data);
        $this->load->view('components/footer'); 
    }
}
