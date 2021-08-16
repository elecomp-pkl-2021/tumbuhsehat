<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('', 'refresh');
        }
        $this->load->model('Pasien_model');
        $this->load->model('Pasien_informasi_model');
        $this->load->model('Dokter_model');
        $this->load->model('Klinik_model');
    }

    function ajax_get_pasien($id)
    {
        $this->db->where('id_pasien', $id);
        echo json_encode($this->db->get('pasien')->result());
    }

    public function getDataPasien($id_user)
    {
        header('Access-Control-Allow-Origin: *');
        echo json_encode($this->Pasien_model->get_pasien_byIdKeluarga($id_user));
    }

    public function tambahPasienBaruWithId($id_user)
    {
        // echo "Garap gengg add pasien, iki keluarga id ne wes metu = " . $id_user;
        $data['user'] = $this->Pasien_model->get_user($id_user);
        $data['title'] = "Tambah Pasien Baru | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Pasien Baru";
        $data['subJudulHalaman'] = "Selamat datang di <b>Tumbuh Sehat</b>";
        $data['iconHalaman'] = "ik-home";
        $data['breadcrumbs'] = '
        <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
        <li class="breadcrumb-item active">Buat Profil Pasien Baru</li>';
        $this->form_validation->set_rules(
            'nama_depan',
            'Nama Depan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'nama_belakang',
            'Nama Belakang',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'hubungan',
            'Hubungan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'no_hp',
            'No Hp',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s masih kosong!',
                'valid_email' => '%s format emailnya salah!',
            )
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_resepsionis');
            $this->load->view('components/breadcrumbs', $data);
            $this->load->view('pages/home/resepsionis/tambahPasien', $data);
            $this->load->view('components/footer');
        } else {
            $this->add_profil_pasien();
        }
    }
    public function add_profil_pasien()
    {
        $data_pasien = array(
            'id_user' => $this->input->post('id_user'),
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'hubungan' => $this->input->post('hubungan'),
        );
        $insert_data = $this->Klinik_model->insert_pasien($data_pasien);
        if ($insert_data) {
            $this->session->set_flashdata('gagal', 'ditambahkan!');
        } else {
            $this->session->set_flashdata('berhasil', 'ditambahkan!');
        }
        redirect(site_url('home'));
    }

    public function index()
    {
        $data['title'] = "Pasien | Tumbuh Sehat";
        $data['judulHalaman'] = "Informasi Pasien";
        $data['subJudulHalaman'] = "Daftar pasien klinik Tumbuh Sehar";
        $data['iconHalaman'] = "ik-users";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Informasi Pasien</li>';

        $this->load->view('components/header', $data);

        if ($this->session->userdata('level') == "Owner") {
            $this->load->view('components/sidebar_owner');
        } elseif ($this->session->userdata('level') == "Klinik") {
            $this->load->view('components/sidebar_resepsionis');
        } elseif ($this->session->userdata('level') == "Superadmin") {
            $this->load->view('components/sidebar_superadmin');
        } else {
            $this->load->view('components/sidebar_dokter');
        }
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/pasien/index');
        $this->load->view('components/footer');
    }

    public function detail_informasi_pasien($id_pasien, $id_booking, $id_rekam_medis)
    {
        $data['title'] = "Pasien | Tumbuh Sehat";
        $data['judulHalaman'] = "Informasi Pasien";
        $data['subJudulHalaman'] = "Daftar pasien klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-users";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="' . base_url('pasien') . '">Informasi Pasien</a></li>
            <li class="breadcrumb-item active">Detail Informasi Pasien</li>';

        $this->load->view('components/header', $data);

        if ($this->session->userdata('level') == "Owner") {
            $this->load->view('components/sidebar_owner');
        } elseif ($this->session->userdata('level') == "Klinik") {
            $this->load->view('components/sidebar_resepsionis');
        } elseif ($this->session->userdata('level') == "Superadmin") {
            $this->load->view('components/sidebar_superadmin');
        } else {
            $this->load->view('components/sidebar_dokter');
        }

        $this->load->view('components/breadcrumbs', $data);

        $data['pasien'] = $this->Pasien_informasi_model->get_medis_pasien($id_rekam_medis, $id_pasien);
        $data['info'] = $this->Pasien_informasi_model->get_informasi($id_pasien, $id_booking);
        $data['info_umum'] = $this->Pasien_informasi_model->get_informasi_umum($id_pasien, $id_booking);
        $data['info_klinis'] = $this->Pasien_informasi_model->get_klinis($id_pasien);
        $data['info_penunjang'] = $this->Pasien_informasi_model->get_penunjang($id_pasien);
        $data['info_odontogram'] = $this->Pasien_informasi_model->get_odontogram($id_pasien);
        $data['info_bayar'] = $this->Pasien_informasi_model->get_pembayaran($id_pasien, $id_booking);
        $data['dokter'] = $this->Dokter_model->get_dokter();

        $this->load->view('pages/pasien/detail_pasien', $data);
        $this->load->view('components/footer');
    }
}
