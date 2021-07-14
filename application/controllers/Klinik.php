<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Klinik extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->model('Dokter_model');
    }

    public function buat_jadwal_view(){
        $id_pasien = $this->input->post("id_pasien");
        $id_cabang = $this->input->post("id_cabang");
        $id_dokter = $this->input->post("id_dokter");

        if ($id_pasien == "" || $id_cabang == "" || $id_dokter == "") {
            // ini nanti diganti alert 
            echo "<script>alert('Pastikan data terisi semua!');history.go(-1);</script>";
            redirect('/home');
        } 
        
        $nama_pasien = $this->Pasien_model->get_nama_pasien($id_pasien);
        $nama_dokter = $this->Dokter_model->get_nama_dokter($id_dokter);
        
        $data = [
            'title' => 'Buat Jadwal | Tumbuh Sehat',
            'judulHalaman' => 'Buat Jadwal Pemeriksaan',
            'subJudulHalaman' => 'Buat Jadwal Pemeriksaan <b>'. $nama_pasien .'</b> dengan Dokter <b>'.$nama_dokter.'</b>',
            'iconHalaman' => 'ik-home',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li> <li class="breadcrumb-item active">Jadwal Pemeriksaan</i></li>'
        ];   
        
        $this->load->view('components/header', $data);
        if ($this->session->userdata('level') == "Owner") {
            $this->load->view('components/sidebar_owner');
        }elseif ($this->session->userdata('level') == "Klinik") {
            $this->load->view('components/sidebar_resepsionis');
        }else {
            $this->load->view('components/sidebar_dokter');
        }
        
        $this->load->view('components/breadcrumbs', $data);
        
        if ($this->session->userdata('level') == "Owner" || $this->session->userdata('level') == "Klinik") {
            $this->load->view('pages/home/resepsionis/buat-jadwal', $data);
        }else {
            $this->load->view('pages/home/dokter/index');
        }
        
        $this->load->view('components/footer');
        // end resepsionis
    }

    public function buat_jadwal()
    {
        
        
    }
}