<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('global');
    }

    public function index()
    {
        $data['title'] = "Pembayaran | Tumbuh Sehat";
        $data['judulHalaman'] = "Pembayaran";
        $data['subJudulHalaman'] = "Daftar Pembayaran";
        $data['iconHalaman'] = "ik-credit-card";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="home"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Pembayaran</li>';
            
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
        $this->load->view('pages/Pembayaran/index');
        $this->load->view('components/footer');
    }

    public function hitungTotalBayar($harga, $qty, $diskon = null){
        $total_harga = $harga * $qty;
        if($diskon != null){
            $bayar = $total_harga - ($total_harga * ($diskon/100));
        }else{
            $bayar = $total_harga;
        }
        $data = [
            'harga_satuan_rp' => rupiah($harga),
            'total_harga_rp' => rupiah($total_harga),
            'bayar_rp' => rupiah($bayar),
            'total_harga' => $total_harga,
            'bayar' => $bayar,
        ];
        echo json_encode($data);
    }
}