<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('', 'refresh');
        }
        $this->load->model('Pasien_model');
        $this->load->model('Cabang_model');
        $this->load->model('Dokter_model');
        $this->load->model('Jadwaldokter_model');
    }

    function show_ubah_janji_akan_datang($id_booking)
    {
        $data = $this->Pasien_model->get_by_id_janji_akan_datang($id_booking)->row();
        //print_r($this->db->last_query()); 
        echo json_encode($data);
    }

    function show_ubah_janji_akan_datang_2($id_booking)
    {
        $data = $this->Pasien_model->get_by_id_janji_akan_datang_2($id_booking)->row();
        echo json_encode($data);
    }

    public function get_dokter()
    {
        echo json_encode($this->Dokter_model->get_dokter2()->result_array());
    }

    public function get_cabang()
    {
        echo json_encode($this->Cabang_model->get_cabang2()->result_array());
    }

    function show_jadwal_dokter_janji($id_booking, $id_dokter, $tgl)
    {
        $html = '';
        $timestamp2 = strtotime($tgl);
        $day2 = date('D', $timestamp2);
        $dokter = $this->Dokter_model->get_dokter_id3($id_booking, $day2);
        $output = [];

        $html .= '<div class="col-lg-12" style="margin-bottom: 23px;">';
        $html .= '<div class="col-lg-4">';
        $html .= '<p style="text-align: center;">Pagi/Siang</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Rencana_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Jadwaldokter_model->kuota_booking($id_dokter, $day);
            if ($result->ket == "Pagi/Siang") {
                $html .= '<a href="#" onclick="cek_jadwal_janji(' . $result->id_jadwal . ')" id="jadwal_janji' . $result->id_jadwal . '" class="btn salmon stil1" style="float: right;margin-top: 7%;background-color:#ddd; color:black" ' . ($jadwal > $result->kuota ? "disabled" : "") . '>' . $result->jam_mulai . ' - ' . $result->jam_tutup . '</a><br /><br />';
            }
        endforeach;
        $html .= '</div>';
        $html .= '<div class="col-lg-4">';
        $html .= '<p style="text-align: center;">Sore</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Rencana_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Jadwaldokter_model->kuota_booking($id_dokter, $day);
            if ($result->ket == "Sore") {
                $html .= '<a href="#" onclick="cek_jadwal_janji(' . $result->id_jadwal . ')" id="jadwal_janji' . $result->id_jadwal . '" class="btn salmon stil1" style="float: right;margin-top: 7%;background-color:#ddd; color:black" ' . ($jadwal > $result->kuota ? "disabled" : "") . '>' . $result->jam_mulai . ' - ' . $result->jam_tutup . '</a><br /><br />';
            }
        endforeach;
        $html .= '</div>';
        $html .= '<div class="col-lg-4">';
        $html .= '<p style="text-align: center;">Malam</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Rencana_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Jadwaldokter_model->kuota_booking($id_dokter, $day);
            if ($result->ket == "Malam") {
                $html .= '<a href="#" onclick="cek_jadwal_janji(' . $result->id_jadwal . ')" id="jadwal_janji' . $result->id_jadwal . '" class="btn salmon stil1" style="float: right;margin-top: 7%;background-color:#ddd; color:black" ' . ($jadwal > $result->kuota ? "disabled" : "") . '>' . $result->jam_mulai . ' - ' . $result->jam_tutup . '</a><br /><br />';
            }
        endforeach;
        $html .= '</div>';

        $html .= '</div>';
        $output = ["output" => $html];
        echo json_encode($output);
    }

    public function get_jadwal($id)
    {
        $data = $this->Jadwaldokter_model->get_jadwal($id);
        //print_r($this->db->last_query());
        echo json_encode($data);
    }
}
