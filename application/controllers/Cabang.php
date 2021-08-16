<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "Superadmin") {
            redirect('','refresh');
        }
        $this->load->model('cabang_model');
    }
    
    public function index()
    {
        $data['title'] = "Data Cabang Klinik | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Cabang Klinik";
        $data['subJudulHalaman'] = "Daftar cabang Klinik Tumbuh Sehar";
        $data['iconHalaman'] = "ik-map-pin";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Cabang Klinik</li>';

        $data['cabang'] = $this->cabang_model->get_cabang();
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/cabang/index');
        $this->load->view('components/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Cabang Klinik | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Cabang Klinik";
        $data['subJudulHalaman'] = "Tambah data cabang klinik baru";
        $data['iconHalaman'] = "ik-map-pin";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('metode-pembayaran').'">Data Cabang Klinik</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';
        
        $this->form_validation->set_rules(
            'nama_cabang',
            'Nama Cabang',
            'required|is_unique[cabang.nama_cabang]',
                array(
                    'required'  => '%s masih kosong loh!',
                    'is_unique' => '%s sudah terdaftar!'
                )
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/cabang/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->cabang_model->tambah_cabang();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('cabang');
        }

    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Cabang Klinik | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Cabang Klinik";
        $data['subJudulHalaman'] = "Edit data cabang klinik dengan data yang baru";
        $data['iconHalaman'] = "ik-map-pin";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('metode-pembayaran').'">Data Cabang Klinik</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';

        $data['cabang'] = $this->cabang_model->get_cabang_by_id($id);

        $this->form_validation->set_rules(
            'nama_cabang',
            'Nama Cabang',
            'required|is_unique[cabang.nama_cabang]',
                array(
                    'required'  => '%s masih kosong loh!',
                    'is_unique' => '%s sudah terdaftar!'
                )
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/cabang/edit', $data);
            $this->load->view('components/footer');
        } else {
            $update = $this->cabang_model->edit_cabang();
            if ($update) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('cabang');
        }
    }

    public function hapus($id)
    {
        $delete = $this->cabang_model->hapus_cabang($id);
        if ($delete) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('cabang');
    }

}

/* End of file Cabang.php */
