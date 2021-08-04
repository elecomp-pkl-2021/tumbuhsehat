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

<<<<<<< HEAD
    public function index(){
=======
    public function index()
    {
>>>>>>> 532fd060347fe60409b40f94ac21a23888139621
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
<<<<<<< HEAD
        $this->load->view('pages/home/dokter/index',$data);
        $this->load->view('components/footer');
        $this->load->view('pages/home/dokter/dokter-script',$data);
    }

    public function pemeriksaan($id_pasien = 16)
=======
        $this->load->view('pages/home/dokter/index', $data);
        $this->load->view('components/footer');
        $this->load->view('pages/home/dokter/dokter-script', $data);
    }

    public function getDaftarPasienByIdDokter()
    {
        $id_user = $this->session->userdata('id_user');
        $id_dokter = $this->Dokter_model->get_dokter_id($id_user);
        echo json_encode($this->Dokter_model->getDaftarPasien($id_dokter));
    }

    public function filterDataJadwalPemeriksaanPasien()
    {
        $id_user = $this->session->userdata('id_user');
        $id_dokter = $this->Dokter_model->get_dokter_id($id_user);

        $kode_booking = $this->input->post('kode_booking');
        $filter_jam = $this->input->post('filter_jam');
        $filter_nama = $this->input->post('filter_nama');
        $filter_tgl_lahir = $this->input->post('filter_tgl_lahir');
        $filter_status = $this->input->post('filter_status');
        echo json_encode($this->Dokter_model->searchPasien($id_dokter, $kode_booking, $filter_jam, $filter_nama, $filter_tgl_lahir, $filter_status));
    }

    public function pemeriksaan($id_pasien, $id_rekam_medis)
>>>>>>> 532fd060347fe60409b40f94ac21a23888139621
    {
        $data = [
            'title' => 'Pemeriksaan Pasien | Tumbuh Sehat',
            'judulHalaman' => 'Data Pemeriksaan',
            'subJudulHalaman' => 'Pemeriksaan Pasien<b> Alif faizal </b>',
            'iconHalaman' => 'ik-calendar',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li> <li class="breadcrumb-item active">Jadwal Pemeriksaan</i></li>',
        ];

        $idk_psn = $this->session->userdata('id_kpesan');
        if (!empty($idk_psn)) {
            $id_kpesan = $this->session->userdata('id_kpesan');
        } else {
            $id_kpesan = $this->randomString();
            $data['id_kpesan'] = $id_kpesan;
        }

        $tgl_awal = date('Y-m-d');

        $rawat = $this->Pasien_model->get_one_rawat_by_id_medis($id_pasien, $tgl_awal, $id_rekam_medis);
        $data_rawat = json_decode(json_encode(@$rawat[0]), true);
        if ($data_rawat && is_array($data_rawat)) {
            $rawat = array_merge(@$data_rawat, array("detail_rawat" => array()));
        }

        $data['rawat'] = $rawat;
        $pasien1 = $this->Pasien_model->get_medis_pasien($id_rekam_medis, $id_pasien);
        $data['pasien'] = $pasien1;
        $data['_jadwal_pemeriksaan'] = 1;
        $data['id_pasien'] = $id_pasien;

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_dokter');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/dokter/pemeriksaan');
        $this->load->view('components/footer');
        // end resepsionis
    }

    public function ajax_check_id()
    {
        //$date = date('Y-m-d');
        $data = $this->Pasien_model->get_check_id();
        echo json_encode($data);
    }

    public function ajax_add_temp()
    {
        $data = array(
            'idSvg' => $this->input->post('idSvg'),
            'idPemeriksaan' => $this->input->post('id_pemeriksaan'),
            'ket_pemeriksaan' => $this->input->post('control'),
            'session_id' => $this->input->post('session_id')
        );

        $this->Pasien_model->add_svg($data);
        echo json_encode(array('status' => TRUE));
    }

    public function ajax_id_svg($id, $idpemeriksaan, $session_id)
    {
        $data = $this->Pasien_model->get_by_id_svg($id, $idpemeriksaan, $session_id);
        echo json_encode($data);
    }

    function randomString($length = 10)
    {
        $str = "";
        $characters = array_merge(range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }
}
