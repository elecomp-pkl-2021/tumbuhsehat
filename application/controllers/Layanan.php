<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level')!="Superadmin") {
            redirect('','refresh');
        }
        $this->load->model('layanan_model');
    }
    
    public function index()
    {
        $data['title'] = "Data Layanan | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Layanan Klinik";
        $data['subJudulHalaman'] = "Daftar layanan yang sudah terdaftar";
        $data['iconHalaman'] = "ik-git-commit";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Layanan</li>';

        $data['layanan'] = $this->layanan_model->get_layanan();
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/layanan/index');
        $this->load->view('components/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Layanan | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Layanan Klinik";
        $data['subJudulHalaman'] = "Tambah data layanan baru";
        $data['iconHalaman'] = "ik-git-commit";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('layanan').'">Data Layanan</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';
        
        $this->form_validation->set_rules(
            'layanan',
            'Nama layanan',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'harga',
            'Nominal harga layanan',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );

        $this->form_validation->set_rules(
            'status',
            'Status layanan',
            'required',
            array(
                'required' => '%s masih belum dipilih!',
            )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/layanan/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->layanan_model->tambah_layanan();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('layanan');
        }

    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Layanan | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Layanan Klinik";
        $data['subJudulHalaman'] = "Edit data layanan dengan data yang baru";
        $data['iconHalaman'] = "ik-git-commit";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('layanan').'">Data Layanan</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';

        $data['layanan'] = $this->layanan_model->get_layanan_by_id($id);

        $this->form_validation->set_rules(
            'layanan',
            'Nama layanan',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'harga',
            'Nominal harga layanan',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/layanan/edit', $data);
            $this->load->view('components/footer');
        } else {
            $update = $this->layanan_model->edit_layanan();
            if ($update) {
                $this->session->set_flashdata('gagal', 'diedit!');
            } else {
                $this->session->set_flashdata('berhasil', 'diedit!');
            }
            redirect('layanan');
        }
    }

    public function hapus($id)
    {
        $delete = $this->layanan_model->hapus_layanan($id);
        if ($delete) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('layanan');
    }

}

/* End of file Layanan.php */


?>
