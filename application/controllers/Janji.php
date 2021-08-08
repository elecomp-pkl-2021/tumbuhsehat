<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Janji extends CI_Controller
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
        $this->load->model('Rekam_medis_model');
        $this->load->model('Booking_model');
    }

    public function index()
    {
        $data['title'] = "Daftar / Ubah Janji | Tumbuh Sehat";
        $data['judulHalaman'] = "Daftar / Ubah Janji";
        $data['subJudulHalaman'] = "Daftar ubah janji klinik tumbuh sehat";
        $data['iconHalaman'] = "ik-check-circle";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="home"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Daftar / Ubah Janji</li>';

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_resepsionis');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/daftar_ubah_janji/index');
        $this->load->view('components/footer');
    }


    public function get_register_janji($nama2 = "", $tgl_lahir2 = "", $rekam_medis2 = "", $id_dokter2 = "", $tanggal_rencana2 = "", $jam_rencana_mulai2 = "", $kode_booking2 = "")
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


        echo json_encode($this->Klinik_model->get_register_janji($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai, $kode_booking)->result());
        // $this->Klinik_model->get_register_janji($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai,$kode_booking)->result();
        // print_r($this->db->last_query());
    }

    public function get_register_janji2()
    {
        echo json_encode($this->Klinik_model->get_register_janji2()->result());
        // $this->Klinik_model->get_register_janji2()->result();
        // print_r($this->db->last_query());
    }

    public function get_register_ubah_terlambat()
    {
        echo json_encode($this->Klinik_model->get_register_ubah_terlambat()->result());
        // $this->Klinik_model->get_konfirmasi_janji()->result();
        // print_r($this->db->last_query());
    }

    public function ajax_get_daftar($id_booking)
    {
        $data = $this->Klinik_model->ajax_get_daftar($id_booking);
        //  print_r($this->db->last_query());
        echo json_encode($data);
    }

    function ajax_get_ubah_terlambat($id_booking)
    {
        $data = $this->Pasien_model->get_by_id_ubah_terlambat($id_booking);
        echo json_encode($data);
    }

    public function create($id)
    {
        $this->cart->destroy();


        /* $id_rekam_medis = $this->Rekam_medis_model->get_id_last();

          foreach ($id_rekam_medis as $a) {
          $idr = $a['id_rekam_medis'];
          } */
        $layanan = $this->layanan_model->get_all();
        $row      = $this->model_booking->get_by_id($id);
        $row2     = $this->admin->get_by_id($row->id_user);

        if ($row) {
            $data = array(
                //'id_rekam_medis' 				=> $idr+1,
                'layanan'                         => $layanan,
                'id_booking'                     => $row->id_user,
                // 'foto' => $row->foto,
                'nama'                             => $row->nama,
                'alamat'                         => $row2->alamat,
                'tanggal_lahir'                 => $row2->tanggal_lahir,
                'email'                         => $row2->email,
                'no_hp'                         => $row2->no_hp,
                'keluhan_utama'                 => $row->keluhan_utama,
                'riwayat_penyakit'                 => $row->riwayat_penyakit,
                'riwayat_alergi_obat'             => $row->riwayat_alergi_obat,
                'riwayat_pengobatan_sebelumnya' => $row->riwayat_pengobatan_sebelumnya/* ,
                      'button' 						=> 'Tambah',
                      //'action' 						=> site_url('rekam_medis/create_action'),
                      'id_rekam_medis' 				=> set_value('id_rekam_medis'),
                      'tanggal' 						=> set_value('tanggal'),
                      'nama_pasien' 					=> set_value('nama_pasien'),
                      'diagnosis' 					=> set_value('diagnosis'),
                      'tanggal_next_control' 			=> set_value('tanggal_next_control'), */
            );
        }

        $antrian = $this->antrian_model->get_by_id_pasien($id);
        $rekam_medis = $this->Rekam_medis_model->get_by_id($antrian->id_rekam_medis);

        $data['for_dokter_obat'] = $this->obat_model->tampil_result();

        $data['id_booking']         = $id;
        $data['id_rekam_medis']  = $antrian->id_rekam_medis;
        $data['keluhan_utama']   = $rekam_medis->keluhan_utama;
        $data['layanan_layanan'] = $this->layanan_model->get_all();
        $data['obat_obat']          = $this->obat_model->get_all();


        $data['_rekam_medis'] = 1;
        $data['content']       = 'rekam_medis/rekam_medis_form';
        $this->load->view('template_dokter', $data);
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

        redirect(site_url('konfirmasi_janji'));
    }

    public function update_rencana()
    {
        $konf_b = '0';
        $data_book = array(
            'konfirmasi' => $konf_b,
        );
        $data_rencana = array(
            'id_booking' => $this->input->post('id_booking'),
            'tanggal_rencana' => $this->input->post('tanggal_rencana_date'),
            'jam_rencana_mulai' => $this->input->post('jam_rencana_mulai'),
            'jam_rencana_selesai' => $this->input->post('jam_rencana_selesai'),
        );
        $this->Klinik_model->update_stat_book($this->input->post('id_booking'), $data_book);
        $this->Klinik_model->delete_r($this->input->post('id_booking'));

        $this->Klinik_model->update_rencana($this->input->post('id_rcn'), $data_rencana);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
    </div>');
        redirect(site_url('janji'));
    }

    public function update_janji()
    {
        $stat_b = '1';
        $data_book = array(
            'status' => $stat_b,
        );
        $data_antrian = array(
            'id_booking' => $this->input->post('id_booking'),
            'id_pasien' => $this->input->post('id_pasien'),
            'id_dokter' => $this->input->post('id_dokter'),
            'id_rekam_medis' => $this->input->post('id_rekam_medis'),
        );
        $this->Klinik_model->update_stat_book($this->input->post('id_booking'), $data_book);
        // print_r($this->db->last_query());
        $this->Klinik_model->add_antrian($data_antrian);
        redirect(site_url('janji'));
    }

    function show_jadwal_dokter($id_booking, $id_dokter, $tgl)
    {
        $html = '';
        $timestamp2 = strtotime($tgl);
        $day2 = date('D', $timestamp2);
        $dokter = $this->Pasien_model->get_dokter_id3($id_booking, $day2);
        $output = [];

        $html .= '<div class="row mb-4">';
        $html .= '<div class="col-lg-4 text-center">';
        $html .= '<p>Pagi/Siang</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Pasien_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Pasien_model->kuota_booking($id_dokter, $day);
            if ($result->ket == "Pagi/Siang") {
                $html .= '<a href="#" onclick="cek_jadwal(' . $result->id_jadwal . ')" id="jadwal' . $result->id_jadwal . '" class="btn salmon stil1" style="margin-top: 7%;background-color:#ddd; color:black" ' . ($jadwal > $result->kuota ? "disabled" : "") . '>' . $result->jam_mulai . ' - ' . $result->jam_tutup . '</a><br /><br />';
            }
        endforeach;
        $html .= '</div>';
        $html .= '<div class="col-lg-4 text-center">';
        $html .= '<p>Sore</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Pasien_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Pasien_model->kuota_booking($id_dokter, $day);
            if ($result->ket == "Sore") {
                $html .= '<a href="#" onclick="cek_jadwal(' . $result->id_jadwal . ')" id="jadwal' . $result->id_jadwal . '" class="btn salmon stil1" style="margin-top: 7%;background-color:#ddd; color:black" ' . ($jadwal > $result->kuota ? "disabled" : "") . '>' . $result->jam_mulai . ' - ' . $result->jam_tutup . '</a><br /><br />';
            }
        endforeach;
        $html .= '</div>';
        $html .= '<div class="col-lg-4 text-center">';
        $html .= '<p>Malam</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Pasien_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Pasien_model->kuota_booking($id_dokter, $day);
            if ($result->ket == "Malam") {
                $html .= '<a href="#" onclick="cek_jadwal(' . $result->id_jadwal . ')" id="jadwal' . $result->id_jadwal . '" class="btn salmon stil1" style="margin-top: 7%;background-color:#ddd; color:black" ' . ($jadwal > $result->kuota ? "disabled" : "") . '>' . $result->jam_mulai . ' - ' . $result->jam_tutup . '</a><br /><br />';
            }
        endforeach;
        $html .= '</div>';
        $html .= '</div>';

        $output = ["output" => $html];
        echo json_encode($output);
    }

    function show_jadwal_dokter_janji($id_booking, $id_dokter, $tgl)
    {
        $html = '';
        $timestamp2 = strtotime($tgl);
        $day2 = date('D', $timestamp2);
        $dokter = $this->Pasien_model->get_dokter_id3($id_booking, $day2);
        $output = [];

        $html .= '<div class="row mb-4">';
        $html .= '<div class="col-lg-4 text-center">';
        $html .= '<p>Pagi/Siang</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Pasien_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Pasien_model->kuota_booking($id_dokter, $day);
            if ($result->ket == "Pagi/Siang") {
                $html .= '<a href="#" onclick="cek_jadwal_janji(' . $result->id_jadwal . ')" id="jadwal_janji' . $result->id_jadwal . '" class="btn salmon stil1" style="float: right;margin-top: 7%;background-color:#ddd; color:black" ' . ($jadwal > $result->kuota ? "disabled" : "") . '>' . $result->jam_mulai . ' - ' . $result->jam_tutup . '</a><br /><br />';
            }
        endforeach;
        $html .= '</div>';
        $html .= '<div class="col-lg-4 text-center">';
        $html .= '<p style="text-align: center;">Sore</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Pasien_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Pasien_model->kuota_booking($id_dokter, $day);
            if ($result->ket == "Sore") {
                $html .= '<a href="#" onclick="cek_jadwal_janji(' . $result->id_jadwal . ')" id="jadwal_janji' . $result->id_jadwal . '" class="btn salmon stil1" style="float: right;margin-top: 7%;background-color:#ddd; color:black" ' . ($jadwal > $result->kuota ? "disabled" : "") . '>' . $result->jam_mulai . ' - ' . $result->jam_tutup . '</a><br /><br />';
            }
        endforeach;
        $html .= '</div>';
        $html .= '<div class="col-lg-4 text-center">';
        $html .= '<p style="text-align: center;">Malam</p>';
        foreach ($dokter->result() as $result) :
            $jam_mulai = $result->jam_mulai;
            $jam_selesai =  $result->jam_tutup;
            $jadwal = $this->Pasien_model->jmlh_booking($id_dokter, $tgl, $jam_mulai, $jam_selesai);

            $timestamp = strtotime($tgl);
            $day = date('D', $timestamp);
            $kuota = $this->Pasien_model->kuota_booking($id_dokter, $day);
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
        $data = $this->Booking_model->get_jadwal($id);
        //print_r($this->db->last_query());
        echo json_encode($data);
    }

    function show_ubah_janji($id_booking)
    {
        $data = $this->Pasien_model->get_by_id_ubah($id_booking);
        echo json_encode($data);
    }
}
