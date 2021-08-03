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
        $this->load->model('Rencana_model');
        $this->load->model('Cabang_model');
        $this->load->model('Dokter_model');
        $this->load->model('Jadwaldokter_model');
        $this->load->model('Klinik_model');
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
        $html .= '<div class="row">';
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

        $html .= '</div>';
        $output = ["output" => $html];
        echo json_encode($output);
    }

    public function get_konfirmasi_janji($nama = "", $tgl_lahir = "", $rekam_medis = "", $id_dokter = "", $tanggal_rencana = "", $jam_rencana_mulai = "")
    {

        $nama3 =  $this->uri->segment(3);
        if ($nama3 == '0') {
            $nama = "0";
        } else {
            $nama =  $this->uri->segment(3);
        }

        $tgl_lahir3 = $this->uri->segment(4);
        if ($tgl_lahir3 == '0') {
            $tgl_lahir = "0";
        } else {
            $tgl_lahir = $this->uri->segment(4);
        }

        $rekam_medis3 = $this->uri->segment(5);
        if ($rekam_medis3 == '0') {
            $rekam_medis = "0";
        } else {
            $rekam_medis = $this->uri->segment(5);
        }

        $id_dokter3 = $this->uri->segment(6);
        if ($id_dokter3 == '0') {
            $id_dokter = "0";
        } else {
            $id_dokter = $this->uri->segment(6);
        }

        $tanggal_rencana3 = $this->uri->segment(7);
        if ($tanggal_rencana3 == '0') {
            $tanggal_rencana = "0";
        } else {
            $tanggal_rencana = $this->uri->segment(7);
        }

        $jam_rencana_mulai3 = $this->uri->segment(8);
        if ($jam_rencana_mulai3 == '0') {
            $jam_rencana_mulai = "0";
        } else {
            $jam_rencana_mulai = $this->uri->segment(8);
        }

        echo json_encode($this->Klinik_model->get_konfirmasi_janji($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai)->result());
        // $this->Klinik_model->get_konfirmasi_janji()->result();
        // print_r($this->db->last_query());
    }
    public function konfirmasi()
    {
        $konfirmasi = '1';
        $data_booking = array(
            'konfirmasi' => $konfirmasi,
        );

        $rekam_medis = substr(md5(rand()), 0, 9);
        $id_rekam_medis = base64_encode($rekam_medis);
        $status = '0';
        $data_rekam_medis = array(
            'id_rekam_medis' => $id_rekam_medis,
            'id_booking' => $this->input->post('id_booking'),
            'id_pasien' => $this->input->post('id_pasien'),
            'status' => $status,
        );

        $this->Klinik_model->add_rekam_medis($data_rekam_medis);
        $this->Klinik_model->update_booking($this->input->post('id_booking'), $data_booking);

        redirect(site_url('owner/konfirmasi_janji'));
    }

    public function konfirmasi_tolak()
    {
        $konfirmasi = '2';
        $stt = '4';
        $data_booking = array(
            'konfirmasi' => $konfirmasi,
            'status' => $stt,
            'alasan_tolak' => $this->input->post('alasan_tolak'),
        );

        $this->Klinik_model->update_booking($this->input->post('id_booking'), $data_booking);

        redirect(site_url('owner/konfirmasi_janji'));
    }
    public function ajax_get_terima($id_pasien)
    {
        $data = $this->Klinik_model->ajax_get_terima($id_pasien);
        //print_r($this->db->last_query());
        echo json_encode($data);
    }

    public function get_data_pembayaran()
    {
        echo json_encode($this->Klinik_model->get_data_pembayaran()->result());
    }
    public function get_data_pembayaran2($nama2 = "", $tgl_lahir2 = "", $rekam_medis2 = "", $id_dokter2 = "", $tanggal_rencana2 = "", $jam_rencana_mulai2 = "", $kode_booking2 = "")
  {

    $nama3 =  $this->uri->segment(3);
    if ($nama3 == '0') {
      $nama = "0";
    } else {
      $nama =  $this->uri->segment(3);
    }

    $tgl_lahir3 = $this->uri->segment(4);
    if ($tgl_lahir3 == '0') {
      $tgl_lahir = "0";
    } else {
      $tgl_lahir = $this->uri->segment(4);
    }

    $rekam_medis3 = $this->uri->segment(5);
    if ($rekam_medis3 == '0') {
      $rekam_medis = "0";
    } else {
      $rekam_medis = $this->uri->segment(5);
    }

    $id_dokter3 = $this->uri->segment(6);
    if ($id_dokter3 == '0') {
      $id_dokter = "0";
    } else {
      $id_dokter = $this->uri->segment(6);
    }

    $tanggal_rencana3 = $this->uri->segment(7);
    if ($tanggal_rencana3 == '0') {
      $tanggal_rencana = "0";
    } else {
      $tanggal_rencana = $this->uri->segment(7);
    }

    $jam_rencana_mulai3 = $this->uri->segment(8);
    if ($jam_rencana_mulai3 == '0') {
      $jam_rencana_mulai = "0";
    } else {
      $jam_rencana_mulai = $this->uri->segment(8);
    }

    $kode_booking3 = $this->uri->segment(9);
    // echo 'kode_booking'.$kode_booking3;
    if ($kode_booking3 == '0') {
      $kode_booking = "0";
      //   echo "iku";
    } else {
      $kode_booking = $this->uri->segment(9);
      // echo "iki";
    }


    echo json_encode($this->Klinik_model->get_data_pembayaran2($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai, $kode_booking)->result());
    // $this->Klinik_model->get_register_janji($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai,$kode_booking)->result();
    // print_r($this->db->last_query());
  }

}
