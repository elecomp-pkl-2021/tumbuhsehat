<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('', 'refresh');
        }
        $this->load->model('Laporan_model');
        $this->load->model('Klinik_model');
        $this->load->model('Pasien_model');
    }

    public function harian()
    {
        if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $id_dokter = 0;
            $interval = 6;
            $data['harian'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        }
        $laporan = $this->Klinik_model->get_laporan();
        $dokter = $this->Pasien_model->get_dokter_filter();
        $data['dokter'] = $dokter;
        $data['laporan'] = $laporan;
        $data['_laporan_transaksi'] = 1;
        $data['title'] = "Laporan Harian | Tumbuh Sehat";
        $data['judulHalaman'] = "Laporan Harian";
        $data['subJudulHalaman'] = "Laporan Harian Klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-book";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Laporan Harian</li>';

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
        $this->load->view('pages/laporan/harian/index');
        $this->load->view('components/footer');
    }

    public function pemeriksaan()
    {
        if ($this->session->userdata('level') == "Dokter") {
            $id_user = $this->session->userdata('id_user');
            $this->db->select('*');
            $this->db->from('dokter a');
            $this->db->join('login_session b', 'a.id_user=b.id_user');
            $this->db->where('a.id_user', $id_user);
            $dokter = $this->db->get('')->result();

            foreach ($dokter as $key) :
                $id_dokter = $key->id_dokter;
                $nama_dokter = $key->nama_dokter;
                $spesialis = $key->spesialis;
                $laporan = $this->Laporan_model->get_laporan_pemeriksaan($id_dokter);
                $lap_fee = $this->Laporan_model->get_fee_dokter($id_dokter);
                $data['laporan'] = $laporan;
                $data['harian'] = $this->Laporan_model->get_laporan_pendapatan($id_dokter);
                $data['nama_dokter'] = $nama_dokter;
                $data['spesialis'] = $spesialis;
                $data['id_dokter'] = $id_dokter;
                $data['lap_fee'] = $lap_fee;
                $data['_laporan_pemeriksaan'] = 1;
            endforeach;
        } else {
            if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
                $id_dokter = 0;
                $currentDate = date('Y-m-d');
                $endDate = $currentDate;
                $interval = 6;
                $data['harian'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
            }
            $lap_sf = $this->Klinik_model->get_feedokter();
            $data['lap_sf'] = $lap_sf;
            $laporan = $this->Klinik_model->get_laporan();
            $dokter = $this->Pasien_model->get_dokter_filter();
            $data['dokter'] = $dokter;
            $data['laporan'] = $laporan;
            $data['_laporan_transaksi'] = 1;
        }

        $data['title'] = "Laporan Pemeriksaan | Tumbuh Sehat";
        $data['judulHalaman'] = "Laporan Pemeriksaan";
        $data['subJudulHalaman'] = "Laporan Pemeriksaan Klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-book";
        $data['breadcrumbs'] = '
                    <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
                    <li class="breadcrumb-item active">Laporan Pemeriksaan</li>';

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
        if ($this->session->userdata('level') == "Dokter") {
            $this->load->view('pages/laporan/pemeriksaan/dokter/laporan_pemeriksaan');
        } else {
            $this->load->view('pages/laporan/pemeriksaan/owner/laporan_pemeriksaan');
        }
        $this->load->view('components/footer');
    }

    public function pemeriksaan_m()
    {

        if ($this->session->userdata('level') == "Dokter") {
            $id_user = $this->session->userdata('id_user');
            $this->db->select('*');
            $this->db->from('dokter a');
            $this->db->join('login_session b', 'a.id_user=b.id_user');
            $this->db->where('a.id_user', $id_user);
            $dokter = $this->db->get('')->result();

            foreach ($dokter as $key) :
                $id_dokter = $key->id_dokter;
                $nama_dokter = $key->nama_dokter;
                $spesialis = $key->spesialis;
                $laporan = $this->Laporan_model->get_laporan_pemeriksaan($id_dokter);
                $lap_fee = $this->Laporan_model->get_fee_dokter($id_dokter);
                $data['lap_fee'] = $lap_fee;
                $data['laporan'] = $laporan;
                $data['harian'] = $this->Laporan_model->get_laporan_pendapatan_m($id_dokter);
                $data['nama_dokter'] = $nama_dokter;
                $data['spesialis'] = $spesialis;
                $data['id_dokter'] = $id_dokter;
                $data['_laporan_pemeriksaan'] = 1;
            endforeach;
        } else {
            $laporan = $this->Klinik_model->get_laporan();
            $dokter = $this->Pasien_model->get_dokter_filter();
            $data['harian'] = $this->Klinik_model->get_laporan_pendapatan_m();
            $data['dokter'] = $dokter;
            $data['laporan'] = $laporan;
            $data['_laporan_transaksi'] = 1;
        }

        $data['title'] = "Laporan Pemeriksaan | Tumbuh Sehat";
        $data['judulHalaman'] = "Laporan Pemeriksaan";
        $data['subJudulHalaman'] = "Laporan Pemeriksaan Klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-book";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Laporan Pemeriksaan</li>';

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
        if ($this->session->userdata('level') == "Dokter") {
            $this->load->view('pages/laporan/pemeriksaan/dokter/laporan_pemeriksaan_m');
        } else {
            $this->load->view('pages/laporan/pemeriksaan/owner/laporan_pemeriksaan_m');
        }
        $this->load->view('components/footer');
    }

    public function pemeriksaan_b()
    {
        if ($this->session->userdata('level') == "Dokter") {
            $id_user = $this->session->userdata('id_user');
            $this->db->select('*');
            $this->db->from('dokter a');
            $this->db->join('login_session b', 'a.id_user=b.id_user');
            $this->db->where('a.id_user', $id_user);
            $dokter = $this->db->get('')->result();

            foreach ($dokter as $key) :
                $id_dokter = $key->id_dokter;
                $nama_dokter = $key->nama_dokter;
                $spesialis = $key->spesialis;
                $laporan = $this->Laporan_model->get_laporan_pemeriksaan($id_dokter);
                $lap_fee = $this->Laporan_model->get_fee_dokter($id_dokter);
                $data['lap_fee'] = $lap_fee;
                $data['laporan'] = $laporan;
                $data['harian'] = $this->Laporan_model->get_laporan_pendapatan_b($id_dokter);
                $data['nama_dokter'] = $nama_dokter;
                $data['spesialis'] = $spesialis;
                $data['id_dokter'] = $id_dokter;
                $data['_laporan_pemeriksaan'] = 1;;
            endforeach;
        } else {
            $laporan = $this->Klinik_model->get_laporan();
            $dokter = $this->Pasien_model->get_dokter_filter();
            $data['laporan'] = $laporan;
            $data['dokter'] = $dokter;
            $data['harian'] = $this->Klinik_model->get_laporan_pendapatan_b();
            $data['_laporan_transaksi'] = 1;
        }

        $data['title'] = "Laporan Pemeriksaan | Tumbuh Sehat";
        $data['judulHalaman'] = "Laporan Pemeriksaan";
        $data['subJudulHalaman'] = "Laporan Pemeriksaan Klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-book";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Laporan Pemeriksaan</li>';

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
        if ($this->session->userdata('level') == "Dokter") {
            $this->load->view('pages/laporan/pemeriksaan/dokter/laporan_pemeriksaan_b');
        } else {
            $this->load->view('pages/laporan/pemeriksaan/owner/laporan_pemeriksaan_b');
        }
        $this->load->view('components/footer');
    }

    function filter_laporan_harian()
    {
        if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $id_dokter = 0;
            $interval = 6;
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        }
        if (!empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $id_dokter = $_GET['id_dokter'];
            $interval = 6;
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        }
        if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $endDate = $_GET['endDate'];
            $id_dokter = 0;
            $interval = 6;
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        }
        if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $endDate = $_GET['endDate'];
            $id_dokter = $_GET['id_dokter'];
            $interval = 6;
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        }
        $this->load->view('pages/laporan/harian/filter_laporan_harian_chart', $data);
    }

    public function filter_laporan_pemeriksaan()
    {
        if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = $_GET['id_dokter'];
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['startDate'];
            $interval = 0;
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])) {
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $interval = 6;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])) {
            $endDate = $_GET['startDate'];
            $interval = 0;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        }
        $this->load->view('pages/laporan/pemeriksaan/owner/filter_harian_chart_owner', $data);
    }

    public function filter_laporan_pemeriksaan_m()
    {
        if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = $_GET['id_dokter'];
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['startDate'];
            $interval = 0;
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])) {
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $interval = 49;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])) {
            $endDate = $_GET['startDate'];
            $interval = 0;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter, $endDate, $interval);
        }
        $this->load->view('pages/laporan/pemeriksaan/owner/filter_mingguan_chart_owner', $data);
    }

    public function filter_laporan_pemeriksaan_b()
    {
        if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = $_GET['id_dokter'];
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['startDate'];
            $interval = 0;
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])) {
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $interval = 364;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])) {
            $endDate = $_GET['startDate'];
            $interval = 0;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter, $endDate, $interval);
        }
        $this->load->view('pages/laporan/pemeriksaan/owner/filter_bulanan_chart_owner', $data);
    }

    public function pemeriksaan_t()
    {
        $laporan = $this->Klinik_model->get_laporan();
        $dokter = $this->Pasien_model->get_dokter_filter();
        $data['laporan'] = $laporan;
        $data['dokter'] = $dokter;
        $data['harian'] = $this->Klinik_model->get_laporan_pendapatan_t();
        $data['_laporan_transaksi'] = 1;

        $data['title'] = "Laporan Pemeriksaan | Tumbuh Sehat";
        $data['judulHalaman'] = "Laporan Pemeriksaan";
        $data['subJudulHalaman'] = "Laporan Pemeriksaan Klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-book";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Laporan Pemeriksaan</li>';

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
        $this->load->view('pages/laporan/pemeriksaan/owner/laporan_pemeriksaan_t');
        $this->load->view('components/footer');
    }

    public function filter_laporan_pemeriksaan_t()
    {
        if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = $_GET['id_dokter'];
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['startDate'];
            $interval = 0;
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])) {
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $interval = 4379;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])) {
            $endDate = $_GET['startDate'];
            $interval = 0;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter, $endDate, $interval);
        }
        $this->load->view('pages/laporan/pemeriksaan/owner/filter_tahunan_chart_owner', $data);
    }

    public function get_e_rekam_medis()
    {
        if ($this->session->userdata('level') == "Dokter") {
            $cr = $_GET['cr'];
            if ($cr == 0) {
                $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_id');
                $this->db->from('rekam_medis a');
                $this->db->join('booking b', 'a.id_booking = b.id_booking');
                $this->db->where('b.konfirmasi', '1');
                $this->db->where('b.status', '2');
                $this->db->where('a.status', '2');
                $data = $this->db->get('')->result();

                $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_all_id');
                $this->db->from('rekam_medis a');
                $this->db->join('booking b', 'a.id_booking = b.id_booking');
                $this->db->where('b.konfirmasi', '1');
                $all = $this->db->get('')->result();

                foreach ($data as $key) {
                    foreach ($all as $value) {
                        $total = ($key->jml_id * 100) / $value->jml_all_id;
                        $hasil = substr($total, 0, 4);
                        echo $hasil . "%";
                    }
                }
            }
        } else {
            $cr = $_GET['cr'];
            if ($cr == 0) {
                $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_id');
                $this->db->from('rekam_medis a');
                $this->db->join('booking b', 'a.id_booking = b.id_booking');
                $this->db->where('b.konfirmasi', '1');
                $this->db->where('b.status', '2');
                $this->db->where('a.status', '2');
                $data = $this->db->get('')->result();

                $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_all_id');
                $this->db->from('rekam_medis a');
                $this->db->join('booking b', 'a.id_booking = b.id_booking');
                $this->db->where('b.konfirmasi', '1');
                $all = $this->db->get('')->result();

                foreach ($data as $key) {
                    foreach ($all as $value) {
                        $total = ($key->jml_id * 100) / $value->jml_all_id;
                        $hasil = substr($total, 0, 4);
                        echo $hasil . "%";
                    }
                }
            }
        }
    }

    public function get_conversion_rate()
    {
        if ($this->session->userdata('level') == "Dokter") {
            $cr = $_GET['cr'];
            if ($cr == 0) {
                $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_id');
                $this->db->from('rekam_medis a');
                $this->db->join('booking b', 'a.id_booking = b.id_booking');
                $this->db->where('b.konfirmasi', '1');
                $this->db->where('b.status', '3');
                $this->db->where('a.status', '3');
                $data = $this->db->get('')->result();

                $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_all_id');
                $this->db->from('rekam_medis a');
                $this->db->join('booking b', 'a.id_booking = b.id_booking');
                $this->db->where('b.konfirmasi', '1');
                $all = $this->db->get('')->result();

                foreach ($data as $key) {
                    foreach ($all as $value) {
                        $total = ($key->jml_id * 100) / $value->jml_all_id;
                        $hasil = substr($total, 0, 4);
                        echo $hasil . "%";
                    }
                }
            }
        } else {
            $cr = $_GET['cr'];
            if ($cr == 0) {
                $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_id');
                $this->db->from('rekam_medis a');
                $this->db->join('booking b', 'a.id_booking = b.id_booking');
                $this->db->where('b.konfirmasi', '1');
                $this->db->where('b.status', '3');
                $this->db->where('a.status', '3');
                $data = $this->db->get('')->result();

                $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_all_id');
                $this->db->from('rekam_medis a');
                $this->db->join('booking b', 'a.id_booking = b.id_booking');
                $this->db->where('b.konfirmasi', '1');
                $all = $this->db->get('')->result();

                foreach ($data as $key) {
                    foreach ($all as $value) {
                        $total = ($key->jml_id * 100) / $value->jml_all_id;
                        $hasil = substr($total, 0, 4);
                        echo $hasil . "%";
                    }
                }
            }
        }
    }

    public function get_hubungan_pasien($id_user)
    {
        $id = $_GET['id'];
        if ($id == 0) {
            $this->db->select('*');
            $this->db->from('pasien');
            $this->db->where('id_user', $id_user);
            $this->db->like('hubungan', 'Anda');
            $data = $this->db->get('')->result();
            foreach ($data as $key) {
                echo $key->nama_depan . " " . $key->nama_belakang;
            }
        }
    }

    public function export_harian()
    {
        $data['title'] = 'Laporan Total Pendapatan Harian';
        $data['harian'] = $this->Klinik_model->get_harian('', date("Y-m-d"), 1);

        $this->load->view('pages/laporan/vw_laporan_pendapatan_harian', $data);
    }

    public function export_per_dokter()
    {
        $data['title'] = 'Laporan Pendapatan Harian Dokter';
        $data['perdokter'] = $this->Klinik_model->get_perdokter();

        $this->load->view('pages/laporan/vw_laporan_perdokter', $data);
    }

    public function export_detail()
    {
        $data['title'] = 'Laporan Detail Pemeriksaan';
        $data['laporan'] = $this->Klinik_model->get_laporan();

        $this->load->view('pages/laporan/vw_laporan_detail', $data);
    }

    function data_booking()
    {
        $booking = $this->Data_admin_model->get_booking();
        $data['booking'] = $booking;
        $data['_resepsionis'] = 1;
        $data['content'] = 'admin/data_booking';
        $this->load->view('template_admin', $data);
    }

    public function export_detail_pemeriksaan()
    {
        $id_user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('dokter a');
        $this->db->join('login_session b', 'a.id_user=b.id_user');
        $this->db->where('a.id_user', $id_user);
        $dokter = $this->db->get('')->result();

        foreach ($dokter as $key) :
            $id_dokter = $key->id_dokter;
            $nama_dokter = $key->nama_dokter;
            $spesialis = $key->spesialis;
            $data['nama_dokter'] = $nama_dokter;
            $data['spesialis'] = $spesialis;
            $data['title'] = 'Laporan Detail Pemeriksaan Dokter ' . $nama_dokter;
            $data['laporan'] = $this->Laporan_model->get_laporan_pemeriksaan($id_dokter);

            $this->load->view('pages/laporan/pemeriksaan/dokter/vw_laporan_detail', $data);
        endforeach;
    }

    public function export_pemeriksaan()
    {
        if ($this->session->userdata('level') == "Dokter") {
            $id_user = $this->session->userdata('id_user');
            $this->db->select('*');
            $this->db->from('dokter a');
            $this->db->join('login_session b', 'a.id_user=b.id_user');
            $this->db->where('a.id_user', $id_user);
            $dokter = $this->db->get('')->result();

            foreach ($dokter as $key) :
                $id_dokter = $key->id_dokter;
                $nama_dokter = $key->nama_dokter;
                $spesialis = $key->spesialis;
                $data['nama_dokter'] = $nama_dokter;
                $data['spesialis'] = $spesialis;
                $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Harian Dokter ' . $nama_dokter;
                $data['harian'] = $this->Laporan_model->get_laporan_pendapatan($id_dokter);

                $this->load->view('pages/laporan/pemeriksaan/dokter/vw_laporan_pendapatan_pemeriksaan', $data);
            endforeach;
        } else {
            $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Harian';
            $data['harian'] = $this->Laporan_model->get_laporan_pendapatan();

            $this->load->view('pages/laporan/pemeriksaan/owner/vw_laporan_pendapatan_pemeriksaan', $data);
        }
    }

    public function export_pemeriksaan_m()
    {
        if ($this->session->userdata('level') == "Dokter") {
            $id_user = $this->session->userdata('id_user');
            $this->db->select('*');
            $this->db->from('dokter a');
            $this->db->join('login_session b', 'a.id_user=b.id_user');
            $this->db->where('a.id_user', $id_user);
            $dokter = $this->db->get('')->result();

            foreach ($dokter as $key) :
                $id_dokter = $key->id_dokter;
                $nama_dokter = $key->nama_dokter;
                $spesialis = $key->spesialis;
                $data['nama_dokter'] = $nama_dokter;
                $data['spesialis'] = $spesialis;
                $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Mingguan Dokter ' . $nama_dokter;
                $data['harian'] = $this->Laporan_model->get_laporan_pendapatan_m($id_dokter);

                $this->load->view('pages/laporan/pemeriksaan/dokter/vw_laporan_pendapatan_pemeriksaan_m', $data);
            endforeach;
        } else {
            $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Mingguan';
            $data['harian'] = $this->Laporan_model->get_laporan_pendapatan_m();

            $this->load->view('pages/laporan/pemeriksaan/owner/vw_laporan_pendapatan_pemeriksaan_m', $data);
        }
    }

    public function export_pemeriksaan_b()
    {
        if ($this->session->userdata('level') == "Dokter") {
            $id_user = $this->session->userdata('id_user');
            $this->db->select('*');
            $this->db->from('dokter a');
            $this->db->join('login_session b', 'a.id_user=b.id_user');
            $this->db->where('a.id_user', $id_user);
            $dokter = $this->db->get('')->result();

            foreach ($dokter as $key) :
                $id_dokter = $key->id_dokter;
                $nama_dokter = $key->nama_dokter;
                $spesialis = $key->spesialis;
                $data['nama_dokter'] = $nama_dokter;
                $data['spesialis'] = $spesialis;
                $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Bulanan Dokter ' . $nama_dokter;
                $data['harian'] = $this->Laporan_model->get_laporan_pendapatan_b($id_dokter);

                $this->load->view('pages/laporan/pemeriksaan/dokter/vw_laporan_pendapatan_pemeriksaan_b', $data);
            endforeach;
        } else {
            $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Bulanan';
            $data['harian'] = $this->Laporan_model->get_laporan_pendapatan_b();

            $this->load->view('pages/laporan/pemeriksaan/owner/vw_laporan_pendapatan_pemeriksaan_b', $data);
        }
    }

    public function export_pemeriksaan_t()
    {
        $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Tahunan';
        $data['harian'] = $this->Laporan_model->get_laporan_pendapatan_t();

        $this->load->view('pages/laporan/pemeriksaan/owner/vw_laporan_pendapatan_pemeriksaan_t', $data);
    }

    public function sharingfee_dokter()
    {
        if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $id_dokter = 0;
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $interval = 6;
            $data['harian'] = $this->Klinik_model->get_harian($id_dokter, $endDate, $interval);
        }
        $lap_sf = $this->Klinik_model->get_feedokter();
        $laporan = $this->Klinik_model->get_laporan();
        $dokter = $this->Pasien_model->get_dokter_filter();
        $data['dokter'] = $dokter;
        $data['laporan'] = $laporan;
        $data['lap_sf'] = $lap_sf;
        $data['_laporan_transaksi'] = 1;

        $data['title'] = "Laporan Pemeriksaan | Tumbuh Sehat";
        $data['judulHalaman'] = "Laporan Pemeriksaan";
        $data['subJudulHalaman'] = "Laporan Pemeriksaan Klinik Tumbuh Sehat";
        $data['iconHalaman'] = "ik-book";
        $data['breadcrumbs'] = '
                    <li class="breadcrumb-item"><a href="' . base_url('home') . '"><i class="ik ik-home"></i></a></li>
                    <li class="breadcrumb-item active">Laporan Pemeriksaan</li>';

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
        $this->load->view('pages/laporan/pemeriksaan/owner/laporan_sharingfee');
        $this->load->view('components/footer');
    }

    public function filter_sharingfee()
    {
        if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = $_GET['id_dokter'];
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->get_feedokter($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['startDate'];
            $interval = 0;
            $data['harian2'] = $this->Klinik_model->get_feedokter($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])) {
            $currentDate = date('Y-m-d');
            $endDate = $currentDate;
            $interval = 6;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->get_feedokter($id_dokter, $endDate, $interval);
        } else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])) {
            $endDate = $_GET['startDate'];
            $interval = 0;
            $id_dokter = $_GET['id_dokter'];
            $data['harian2'] = $this->Klinik_model->get_feedokter($id_dokter, $endDate, $interval);
        } else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])) {
            $id_dokter = 0;
            $endDate = $_GET['endDate'];
            $interval = $_GET['interval'];
            $data['harian2'] = $this->Klinik_model->get_feedokter($id_dokter, $endDate, $interval);
        }
        $this->load->view('pages/laporan/pemeriksaan/owner/filter_sharingfee_chart_owner', $data);
    }
}
