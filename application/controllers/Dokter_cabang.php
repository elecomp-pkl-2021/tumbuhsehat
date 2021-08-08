<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_cabang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "Superadmin") {
            redirect('','refresh');
        }

        $this->load->model('dokter_model');
        $this->load->model('cabang_model');
        
    }
    

    public function index()
    {
        $data['title'] = "Data Lokasi Cabang Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Lokasi Cabang Dokter";
        $data['subJudulHalaman'] = "Daftar dokter yang berkerja di cabang klinik";
        $data['iconHalaman'] = "ik-map-pin";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Lokasi Cabang Dokter</li>';

        $data['cabang'] = $this->dokter_model->get_cabang_dokter();
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/dokter/cabang_dokter/index', $data);
        $this->load->view('components/footer');    
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Lokasi Cabang Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Lokasi Cabang Dokter";
        $data['subJudulHalaman'] = "Tambah dokter yang berkerja di cabang klinik";
        $data['iconHalaman'] = "ik-map-pin";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('cabang-dokter').'">Data Lokasi Cabang Dokter</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';

        $data['dokter'] = $this->dokter_model->get_dokter();
        $data['cabang'] = $this->cabang_model->get_cabang();

        $this->form_validation->set_rules(
            'id_dokter',
            'Dokter',
            'required',
                array(
                    'required' => '%s masih belum dipilih!',
                )
        );

        $this->form_validation->set_rules(
            'id_cabang',
            'Cabang klinik',
            'required',
                array(
                    'required' => '%s masih belum dipilih!',
                )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/dokter/cabang_dokter/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->dokter_model->tambah_cabang_dokter();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('cabang-dokter');
        }

    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Lokasi Cabang Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Lokasi Cabang Dokter";
        $data['subJudulHalaman'] = "Edit dokter yang berkerja di cabang klinik";
        $data['iconHalaman'] = "ik-map-pin";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('cabang-dokter').'">Data Lokasi Cabang Dokter</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';

        $data['dokter'] = $this->dokter_model->get_dokter();
        $data['cabang'] = $this->cabang_model->get_cabang();
        $data['dok_cabang'] = $this->dokter_model->get_cabang_dokter_by_id($id);
        
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/dokter/cabang_dokter/edit', $data);
        $this->load->view('components/footer');
    }

    public function edit_cabang_aksi($id)
    {
        $update = $this->dokter_model->edit_cabang_dokter();
        if ($update) {
            $this->session->set_flashdata('gagal', 'diedit!');
        } else {
            $this->session->set_flashdata('berhasil', 'diedit!');
        }
        redirect('cabang-dokter');
    }

    public function hapus($id)
    {
        $delete = $this->dokter_model->hapus_cabang_dokter($id);
        if ($delete) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('cabang-dokter');
    }

}

/* End of file Dokter_cabang.php */

?>
