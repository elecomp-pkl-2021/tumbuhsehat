<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('', 'refresh');
        }
        $this->load->model('Cabang_model');
        $this->load->model('Dokter_model');
        $this->load->model('Klinik_model');
        $this->load->model('Pasien_model');
    }

    public function pemeriksaan($id_pasien = 16)
    {

        $data = [
            'title' => 'Pemeriksaan Pasien | Tumbuh Sehat',
            'judulHalaman' => 'Data Pemeriksaan',
            'subJudulHalaman' => 'Pemeriksaan Pasien<b> Alif faizal </b>',
            'iconHalaman' => 'ik-calendar',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li> <li class="breadcrumb-item active">Jadwal Pemeriksaan</i></li>',
        ];

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_dokter');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/dokter/pemeriksaan');
        $this->load->view('components/footer');
        // end resepsionis
    }

    public function get_conversion_rate($id_dokter)
    {
        $cr = $_GET['cr'];
        if ($cr == 0) {
            $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_id');
            $this->db->from('rekam_medis a');
            $this->db->join('booking b', 'a.id_booking = b.id_booking');
            $this->db->where('b.konfirmasi', '1');
            $this->db->where('b.status', '3');
            $this->db->where('a.status', '3');
            $this->db->where('b.id_dokter', $id_dokter);
            $data = $this->db->get('')->result();

            $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_all_id');
            $this->db->from('rekam_medis a');
            $this->db->join('booking b', 'a.id_booking = b.id_booking');
            $this->db->where('b.konfirmasi', '1');
            $this->db->where('b.id_dokter', $id_dokter);
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

    public function get_e_rekam_medis($id_dokter)
    {
        $cr = $_GET['cr'];
        if ($cr == 0) {
            $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_id');
            $this->db->from('rekam_medis a');
            $this->db->join('booking b', 'a.id_booking = b.id_booking');
            $this->db->where('b.konfirmasi', '1');
            $this->db->where('b.status', '2');
            $this->db->where('a.status', '2');
            $this->db->where('b.id_dokter', $id_dokter);
            $data = $this->db->get('')->result();

            $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_all_id');
            $this->db->from('rekam_medis a');
            $this->db->join('booking b', 'a.id_booking = b.id_booking');
            $this->db->where('b.konfirmasi', '1');
            $this->db->where('b.id_dokter', $id_dokter);
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
