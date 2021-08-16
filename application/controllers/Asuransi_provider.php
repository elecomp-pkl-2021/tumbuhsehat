<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Asuransi_provider extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Superadmin') {
            redirect('','refresh');
        }
        $this->load->model('asuransi_model');
    }
    
    public function index()
    {
        $data['title'] = "Data Provider Asuransi | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Provider Asuransi";
        $data['subJudulHalaman'] = "Daftar Provider Asuransi di Klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-shield";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Provider Asuransi</li>';

        $data['provider'] = $this->asuransi_model->get_provider_asuransi();
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/asuransi/asuransi_provider/index');
        $this->load->view('components/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Provider Asuransi | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Provider Asuransi";
        $data['subJudulHalaman'] = "Tambah data provider asuransi baru";
        $data['iconHalaman'] = "ik-shield";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('provider-asuransi').'">Data Provider Asuransi</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';
        
        $this->form_validation->set_rules(
            'nama_provider',
            'Nama Provider Asuransi',
            'required|is_unique[asuransi_provider.nama_provider]',
                array(
                    'required'  => '%s masih kosong loh!',
                    'is_unique' => '%s sudah terdaftar!'
                )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/asuransi/asuransi_provider/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->asuransi_model->tambah_provider_asuransi();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('provider-asuransi');
        }

    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Provider Asuransi | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Provider Asuransi";
        $data['subJudulHalaman'] = "Edit data provider asuransi dengan data yang baru";
        $data['iconHalaman'] = "ik-shield";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('provider-asuransi').'">Data Provider Asuransi</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';

        $data['provider'] = $this->asuransi_model->get_provider_asuransi_by_id($id);

        $this->form_validation->set_rules(
            'nama_provider',
            'Nama Provider Asuransi',
            'required',
                array(
                    'required'  => '%s masih kosong loh!',
                )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/asuransi/asuransi_provider/edit', $data);
            $this->load->view('components/footer');
        } else {
            $update = $this->asuransi_model->edit_provider_asuransi();
            if ($update) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('provider-asuransi');
        }
    }

    public function hapus($id)
    {
        $delete = $this->asuransi_model->hapus_provider_asuransi($id);
        if ($delete) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('provider-asuransi');
    }

}

/* End of file Asuransi_provider.php */

?>
