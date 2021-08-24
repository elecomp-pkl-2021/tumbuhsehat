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
        $this->load->model('Diskon_model');
        $this->load->model('Metode_model');
        $this->load->model('Asuransi_model');
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

        redirect(site_url('konfirmasi_janji/index'));
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

        redirect(site_url('konfirmasi_janji/index'));
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

    public function metode_bayar($id_booking, $id_rekam_medis)
    {
        $id_booking = $this->uri->segment(3);
        $data = array(
            'title' => 'Metode Pembayaran',
            'pembayaran' => $this->Klinik_model->edit_pembayaran($id_booking),
        );
        $bayar = $this->Klinik_model->get_proses_bayar($id_booking);
        // print_r($this->db->last_query());
        $data['bayar'] = $bayar;
        $layanan = $this->Klinik_model->get_layanan($id_booking);
        //print_r($this->db->last_query());
        $data['layanan'] = $layanan;
        $diskon = $this->Diskon_model->diskon_active();
        $data['diskon'] = $diskon;
        $diskon = $this->Diskon_model->diskon_pil_active($id_rekam_medis);
        $data['diskon_pil'] = $diskon;
        $data['diskonnya'] = $this->Diskon_model->getDiskonByRekamMedis($id_rekam_medis);
        $metode = $this->Metode_model->get_all();
        $data['metodebayar'] = $metode;
        $data['_pembayaran'] = 1;
        $data['total'] = $this->Klinik_model->get_total($id_rekam_medis);
        $asuransi = $this->Asuransi_model->get_provider_asuransi();
        $data['asuransi'] = $asuransi;
        $provider = $this->Klinik_model->get_id_provider($id_booking);
        $data['asuransiid'] = $this->Asuransi_model->get_provider_asuransi_by_id($provider['id_provider']);
        $data['kategori_asuransi'] = $this->Asuransi_model->get_kategori_asuransi();
        $kategorias = $this->Klinik_model->get_id_kategori($id_booking);
        $data['kategorias'] = $this->Asuransi_model->get_kategori_asuransi_by_id($kategorias['id_kategori']);
        // print_r($this->db->last_query());
        $data['title'] = "Pembayaran | Tumbuh Sehat";
        $data['judulHalaman'] = "Pembayaran";
        $data['subJudulHalaman'] = "Daftar Pembayaran";
        $data['iconHalaman'] = "ik-credit-card";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="home"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Pembayaran</li>';
        // print_r($data['diskonnya']);
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_resepsionis');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/Pembayaran/metode_pembayaran', $data);
        $this->load->view('components/footer');
    }
    public function update_bayar()
    {
        $status_r = '3';
        $id = $this->input->post('id_rekam_medis');
        $grand = $this->grandtotal($id);
        $data_bayar = array(
            'diagnosis'   => $this->input->post('diagnosa'),
            'grandtotal'  => $this->input->post('grandtotal'),
            'status'      => $status_r,
        );
        $status_b = '3';
        $data_booking = array(
            'status' => $status_b,
        );

        $data_rencana = array(
            'id_metode' => $this->input->post('jenis_pembayaran'),
            'id_provider' => $this->input->post('id_provider'),
            'id_kategori' => $this->input->post('id_kategori'),
            'nomor_asuransi' => $this->input->post('no_asuransi'),
            'foto_asuransi' => $this->_uploadImage(),
        );

        $data_pilih = array(
            'id_diskon' => $this->input->post('id_diskon')
        );
        $this->Klinik_model->update_booking($this->input->post('id_booking'), $data_booking);
        $this->Klinik_model->update_rekam_medis($this->input->post('id_booking'), $data_bayar);
        $this->Klinik_model->update_rencana_bayar($this->input->post('id_booking'), $data_rencana);
        $this->Klinik_model->update_pilih_layanan($this->input->post('id_rekam_medis'), $data_pilih);
        redirect(site_url('pembayaran/index'));
    }

    public function grandtotal($id_rekam_medis)
    {

        $id3 = $_GET['diskon'];

        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rekam_medis b', 'a.id_booking=b.id_booking');
        $this->db->join('pilih_layanan c', 'b.id_rekam_medis=c.id_rekam_medis');
        $this->db->join('layanan d', 'c.id_layanan=d.id_layanan');
        $this->db->where('b.id_rekam_medis', $id_rekam_medis);
        $data = $this->db->get('')->result();

        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->where('id_diskon', $id3);
        $disk = $this->db->get('')->result();

        foreach ($data as $key) :
            foreach ($disk as $value) :
                if ($id3 != 0) {
                    $subtotal = $key->subtotal;
                    $diskon = $value->nilai_diskon;
                    $grand = $subtotal * ($diskon / 100);
                    $total = $subtotal - $grand;
                    echo '' . $total;
                } elseif ($id3 == 0) {
                    $total = $key->subtotal;
                    echo '' . $total;
                } else {
                    $total = $key->subtotal;
                    echo '' . $total;
                }

            endforeach;
        endforeach;
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './images/asuransi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->input->post('id_booking');
        $config['overwrite']            = true;
        $config['max_size']             = 4096; // 1MB
        $config['encrypt_name']         = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto_asuransi')) {
            return $this->upload->data("file_name");
        }
        return $this->upload->display_errors();
    }
}
