<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_metode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "Superadmin") {
            redirect('','refresh');
        }
        $this->load->model('pembayaran_metode_model');
        
    }
    
    public function index()
    {
        $data['title'] = "Data Metode Pembayaran | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Metode Pembayaran";
        $data['subJudulHalaman'] = "Daftar metode pembayaran yang sudah terdaftar";
        $data['iconHalaman'] = "ik-credit-card";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Metode Pembayaran</li>';

        $data['pembayaran'] = $this->pembayaran_metode_model->get_metode_pembayaran();
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/metode_pembayaran/index', $data);
        $this->load->view('components/footer');    
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Metode Pembayaran | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Metode Pembayaran";
        $data['subJudulHalaman'] = "Tambah data metode pembayaran baru";
        $data['iconHalaman'] = "ik-credit-card";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('metode-pembayaran').'">Data Metode Pembayaran</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';
        
        $this->form_validation->set_rules(
            'nama_metode',
            'Nama Metode',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/metode_pembayaran/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->pembayaran_metode_model->tambah_metode_pembayaran();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('metode-pembayaran');
        }

    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Metode Pembayaran | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Metode Pembayaran";
        $data['subJudulHalaman'] = "Edit data metode pembayaran dengan data yang baru";
        $data['iconHalaman'] = "ik-credit-card";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('metode-pembayaran').'">Data Metode Pembayaran</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';

        $data['pembayaran'] = $this->pembayaran_metode_model->get_metode_pembayaran_by_id($id);

        $this->form_validation->set_rules(
            'nama_metode',
            'Nama Metode',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/metode_pembayaran/edit', $data);
            $this->load->view('components/footer');
        } else {
            $update = $this->pembayaran_metode_model->edit_metode_pembayaran();
            if ($update) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('metode-pembayaran');
        }
    }

    public function hapus($id)
    {
        $delete = $this->pembayaran_metode_model->hapus_metode_pembayaran($id);
        if ($delete) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('metode-pembayaran');
    }

}

/* End of file Pembayaran_metode.php */


?>
