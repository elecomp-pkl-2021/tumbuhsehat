<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_janji extends CI_Controller {
    
    public function index()
    {
        $data['title'] = "Konfirmasi Janji | Tumbuh Sehat";
        $data['judulHalaman'] = "Konfirmasi Janji";
        $data['subJudulHalaman'] = "Daftar konfirmasi janji yang sudah masuk";
        $data['iconHalaman'] = "ik-calendar";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="home"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Konfirmasi Janji</li>';
            
        $this->load->view('components/header', $data);
        if ($this->session->userdata('level') == "Owner") {
            $this->load->view('components/sidebar_owner');
        } elseif ($this->session->userdata('level') == "Klinik") {
            $this->load->view('components/sidebar_resepsionis');
        } elseif ($this->session->userdata('level') == "Superadmin") {
            $this->load->view('components/sidebar_superadmin');
        } else{
            $this->load->view('components/sidebar_dokter');
        }
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/konfirmasi_janji/index');
        $this->load->view('components/footer');
    }

}

/* End of file Konfirmasi_janji.php */
