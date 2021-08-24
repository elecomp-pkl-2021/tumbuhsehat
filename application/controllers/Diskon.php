<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Diskon extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "Superadmin") {
            redirect('','refresh');
        }
        $this->load->model('diskon_model');
    }
    
    public function index()
    {
        $data['title'] = "Data Diskon Klinik | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Diskon Klinik";
        $data['subJudulHalaman'] = "Daftar diskon Klinik Tumbuh Sehar";
        $data['iconHalaman'] = "ik-tag";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Diskon Klinik</li>';

        $data['diskon'] = $this->diskon_model->get_diskon();
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/diskon/index');
        $this->load->view('components/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Diskon Klinik | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Diskon Klinik";
        $data['subJudulHalaman'] = "Tambah data diskon klinik baru";
        $data['iconHalaman'] = "ik-tag";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('diskon').'">Data Diskon Klinik</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';
        
        $this->form_validation->set_rules(
            'nama_diskon',
            'Nama Diskon',
            'required|is_unique[diskon.nama_diskon]',
                array(
                    'required'  => '%s masih kosong loh!',
                    'is_unique' => '%s sudah terdaftar!'
                )
        );

        $this->form_validation->set_rules(
            'nilai_diskon',
            'Persentase nilai diskon',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );

        $this->form_validation->set_rules(
            'status_diskon',
            'Status Diskon',
            'required',
            array(
                'required' => '%s masih belum dipilih!',
            )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/diskon/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->diskon_model->tambah_diskon();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('diskon');
        }

    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Diskon Klinik | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Diskon Klinik";
        $data['subJudulHalaman'] = "Edit data diskon klinik dengan data yang baru";
        $data['iconHalaman'] = "ik-tag";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('metode-pembayaran').'">Data Diskon Klinik</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';

        $data['diskon'] = $this->diskon_model->get_diskon_by_id($id);

        $this->form_validation->set_rules(
            'nama_diskon',
            'Nama Diskon',
            'required',
                array(
                    'required'  => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'nilai_diskon',
            'Persentase nilai diskon',
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
            $this->load->view('pages/superadmin/diskon/edit', $data);
            $this->load->view('components/footer');
        } else {
            $update = $this->diskon_model->edit_diskon();
            if ($update) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('diskon');
        }
    }

    public function hapus($id)
    {
        $delete = $this->diskon_model->hapus_diskon($id);
        if ($delete) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('diskon');
    }

}

/* End of file Diskon.php */

?>