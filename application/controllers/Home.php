<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Home | Tumbuh Sehat";
        $data['judulHalaman'] = "Home";
        $data['subJudulHalaman'] = "Selamat datang di <b>Tumbuh Sehat</b>";
        $data['iconHalaman'] = "ik-home";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item active"><i class="ik ik-home"></i></li>';
        
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_resepsionis');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/index');
        $this->load->view('components/footer');
    }
}

/* End of file Home.php */
