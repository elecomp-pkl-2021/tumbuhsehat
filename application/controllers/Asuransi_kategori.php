<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Asuransi_kategori extends CI_Controller {

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
        $data['title'] = "Data Kategori Asuransi | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Kategori Asuransi";
        $data['subJudulHalaman'] = "Daftar kategori Asuransi di Klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-shield";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Kategori Asuransi</li>';

        $data['kategori'] = $this->asuransi_model->get_kategori_asuransi();
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/asuransi/asuransi_kategori/index');
        $this->load->view('components/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Kategori Asuransi | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Kategori Asuransi";
        $data['subJudulHalaman'] = "Tambah data kategori asuransi baru";
        $data['iconHalaman'] = "ik-shield";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('kategori-asuransi').'">Data Kategori Asuransi</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';
        
        $this->form_validation->set_rules(
            'nama_kategori',
            'Nama Kategori Asuransi',
            'required|is_unique[asuransi_kategori.nama_kategori]',
                array(
                    'required'  => '%s masih kosong loh!',
                    'is_unique' => '%s sudah terdaftar!'
                )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/asuransi/asuransi_kategori/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->asuransi_model->tambah_kategori_asuransi();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('kategori-asuransi');
        }

    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Kategori Asuransi | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Kategori Asuransi";
        $data['subJudulHalaman'] = "Edit data kategori asuransi dengan data yang baru";
        $data['iconHalaman'] = "ik-shield";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('kategori-asuransi').'">Data Kategori Asuransi</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';

        $data['kategori'] = $this->asuransi_model->get_kategori_asuransi_by_id($id);

        $this->form_validation->set_rules(
            'nama_kategori',
            'Nama Kategori Asuransi',
            'required',
                array(
                    'required'  => '%s masih kosong loh!',
                )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/asuransi/asuransi_kategori/edit', $data);
            $this->load->view('components/footer');
        } else {
            $update = $this->asuransi_model->edit_kategori_asuransi();
            if ($update) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('kategori-asuransi');
        }
    }

    public function hapus($id)
    {
        $delete = $this->asuransi_model->hapus_kategori_asuransi($id);
        if ($delete) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('kategori-asuransi');
    }

}

/* End of file Asuransi_kategori.php */

?>
