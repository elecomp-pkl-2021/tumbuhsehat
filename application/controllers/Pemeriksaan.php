<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
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
        $this->load->model('Api_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Booking_model');
    }

    public function buat_jadwal_view()
    {
        $id_pasien = $this->input->post("id_pasien");
        $id_keluarga = $this->input->post("akun_klg");
        $id_cabang = $this->input->post("id_cabang");
        $id_dokter = $this->input->post("id_dokter");

        if ($id_pasien == "" || $id_cabang == "" || $id_dokter == "") {
            // ini nanti diganti alert 
            echo "<script>alert('Pastikan data terisi semua!');history.go(-1);</script>";
            redirect('/home');
        }

        $data_pasien = $this->Pasien_model->get_pasien_byId($id_pasien);
        $list_org_dekat = $this->Pasien_model->get_pasien_byIdKeluarga($id_keluarga);
        $nama_pasien = $this->Pasien_model->get_nama_pasien($id_pasien);
        $nama_dokter = $this->Dokter_model->get_nama_dokter($id_dokter);
        $list_pembayaran = $this->Pembayaran_model->getPembayaran();
        
        $data = [
            'title' => 'Buat Jadwal | Tumbuh Sehat',
            'judulHalaman' => 'Buat Jadwal Pemeriksaan',
            'subJudulHalaman' => 'Buat Jadwal Pemeriksaan <b>' . $nama_pasien . '</b> dengan Dokter <b>' . $nama_dokter . '</b>',
            'iconHalaman' => 'ik-calendar',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li> <li class="breadcrumb-item active">Jadwal Pemeriksaan</i></li>',
            'id_dokter' => $id_dokter,
            'id_pasien' => $id_pasien,
            'id_keluarga' => $id_keluarga,
            'id_cabang' => $id_cabang,
            'data_pasien' => $data_pasien,
            'list_org_dekat' => $list_org_dekat,
            'list_pembayaran' => $list_pembayaran,
        ];

        // var_dump($data);die;

        $this->load->view('components/header', $data);
        if ($this->session->userdata('level') == "Owner") {
            $this->load->view('components/sidebar_owner');
        } elseif ($this->session->userdata('level') == "Klinik") {
            $this->load->view('components/sidebar_resepsionis');
        }elseif ($this->session->userdata('level') == "Superadmin") {
            $this->load->view('components/sidebar_superadmin');
        } else {
            $this->load->view('components/sidebar_dokter');
        }

        $this->load->view('components/breadcrumbs', $data);

        if ($this->session->userdata('level') != "Dokter") {
            $this->load->view('pages/home/resepsionis/buat-jadwal', $data);
        } else {
            $this->load->view('pages/home/dokter/index');
        }

        $this->load->view('components/footer');
        // end resepsionis
    }

    public function konfirmasi_view($idBooking){
        $data = [
            'title' => 'Buat Jadwal | Tumbuh Sehat',
            'judulHalaman' => 'Buat Jadwal Pemeriksaan',
            'subJudulHalaman' => 'Rencana Pemeriksaan Berhasil Di buat!',
            'iconHalaman' => 'ik-calendar',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li> <li class="breadcrumb-item">Jadwal Pemeriksaan</li><li class="breadcrumb-item active">Konfirmasi Jadwal Pemeriksaan</li>',
            'booking' => $this->Booking_model->getDataBooking($idBooking),
        ];
        
        $this->load->view('components/header', $data);
        if ($this->session->userdata('level') == "Owner") {
            $this->load->view('components/sidebar_owner');
        } elseif ($this->session->userdata('level') == "Klinik") {
            $this->load->view('components/sidebar_resepsionis');
        } else {
            $this->load->view('components/sidebar_dokter');
        }

        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/resepsionis/konfirmasi',$data);
        $this->load->view('components/footer');
    }

    public function json_get_jam_praktik_dokter($id, $day)
    {
        echo json_encode($this->Dokter_model->get_jam_praktek_tersedia($id, $day));
    }

    function addJadwal($id_booking){
        if (!$this->input->post('wkt-pemeriksaan',true)) {
            echo "Gagal! Waktu Pemeriksaan Belum di set";
            return;
        }
        $wkt = explode("-",$this->input->post('wkt-pemeriksaan',true));
        $wkt_start = $wkt[0];
        $wkt_end = $wkt[1];
        $tgl = $this->input->post('tgl_pemeriksaan');
        $tgl_rencana = date("Y-m-d", strtotime($tgl));
        $data = [
            'id_booking' => $id_booking,
            'tanggal_rencana' => $tgl_rencana,
            'jam_rencana_mulai' => $wkt_start,
            'jam_rencana_selesai' => $wkt_end,
            'tanggal_keluhan' => $this->input->post('tgl_keluhan',true),
            'keluhan' => $this->input->post('keluhan',true),
            'id_metode' => $this->input->post('jns-pembayaran',true),
            'id_provider' => 0,
            'id_kategori' => 0,
        ];
        $this->db->insert('rencana',$data);
    }

    function addBooking($id_booking){
        $data = [
            'id_booking' => $id_booking,
            'id_user' => $this->input->post('id_keluarga',true),
            'id_pasien' => $this->input->post('id_pasien',true),
            'id_cabang' => $this->input->post('id_cabang',true),
            'id_dokter' => $this->input->post('id_dokter',true),
            'konfirmasi' => 0,
            'alasan_tolak' => null,
            'status' => 0,
        ];
        $this->db->insert('booking',$data);
    }

    function updateDataDiri(){
        $data = [
            'id_pasien' => $this->input->post('id_pasien'),
            'id_user' => $this->input->post('id_keluarga'),
            'nama_depan' => $this->input->post('first-name',true),
            'nama_belakang' => $this->input->post('last-name',true),
            'tempat_lahir' => $this->input->post('tmp-lahir',true),
            'tanggal_lahir' => $this->input->post('tgl-lahir',true),
            'jenis_kelamin' => $this->input->post('jns-kelamin',true),
            'status_nikah' => $this->input->post('status-pernikahan',true),
            'pekerjaan' => $this->input->post('pekerjaan',true),
            'pendidikan' => $this->input->post('pendidikan',true),
            'jenis_id' => $this->input->post('jns-id',true),
            'no_id' => $this->input->post('no-id',true),
            'alamat' => $this->input->post('jalan',true),
            'city_id' => $this->input->post('kota',true),
            'province_id' => $this->input->post('provinsi',true),
            'kode_pos' => $this->input->post('kodepos',true),
            'provinsi' => $this->input->post('provinsi-nama',true),
            'kota_kab' => $this->input->post('kota-nama',true),
            'email' => $this->input->post('email',true),
            'no_hp' => $this->input->post('no-hp',true),
            'gol_darah' => $this->input->post('gol-dar',true),
            'alergi' => $this->input->post('alergi',true),
            'riwayat_penyakit' => $this->input->post('rwyt-penyakit',true),
        ];
        $this->db->update('pasien', $data, ['id_pasien' => $data['id_pasien']]);
    }

    function addOrangDekat($id_booking){
        $id_org_dekat = $this->input->post('org_dekat');
        if($id_org_dekat != ""){
            #jika orang dekat dari list keluarga
            # 1.Ambil data pasien berdasar id yang diinput.
            $query = $this->db->get_where('pasien',['id_pasien' => $id_org_dekat])->row_array();
            $data = [
                'id_booking' => $id_booking,
                'id_pasien' => $this->input->post('id_pasien',true),
                'nama_depan_dekat' => $query['nama_depan'],
                'nama_belakang_dekat' => $query['nama_belakang'],
                'tempat_lahir_dekat' => $query['tempat_lahir'],
                'tanggal_lahir_dekat' => $query['tanggal_lahir'],
                'jenis_kelamin_dekat' => $query['jenis_kelamin'],
                'hubungan_dekat' => $query['hubungan'],
                'jenis_id_dekat' => $query['jenis_id'],
                'no_id_dekat' => $query['no_id'],
                'alamat_dekat' => $query['alamat'],
                'kota_kab_dekat' => $query['kota_kab'],
                // 'kota_kab_dekat' => $query['city_id'],
                'provinsi_dekat' => $query['provinsi'],
                'kode_pos_dekat' => $query['kode_pos'],
                'email_dekat' => $query['email'],
                'no_hp_dekat' => $query['no_hp']
            ];
            # 2.Add ke tabel info_orang_dekat
            $this->db->insert('info_orang_terdekat',$data);
            return;
        }
        #jika input data baru orang dekat
        $this->addOrangDekatBaru($id_booking);
    }

    function addOrangDekatBaru($id_booking){
        # 1. Add pasien baru ke akun keluarga
        $this->_addData();
        # 2. Ambil data pasien berdasar id
        $id = $this->db->select_max('id_pasien')->get('pasien')->row_array()['id_pasien'];
        $query = $this->db->get_where('pasien', ['id_pasien' => $id])->row_array();
        # 3. Simpan data ke dalam variabel
        $data = [
            'id_booking' => $id_booking,
            'id_pasien' => $this->input->post('id_pasien',true),
            'nama_depan_dekat' => $query['nama_depan'],
            'nama_belakang_dekat' => $query['nama_belakang'],
            'tempat_lahir_dekat' => $query['tempat_lahir'],
            'tanggal_lahir_dekat' => $query['tanggal_lahir'],
            'jenis_kelamin_dekat' => $query['jenis_kelamin'],
            'hubungan_dekat' => $query['hubungan'],
            'jenis_id_dekat' => $query['jenis_id'],
            'no_id_dekat' => $query['no_id'],
            'alamat_dekat' => $query['alamat'],
            'kota_kab_dekat' => $query['kota_kab'],
            // 'kota_kab_dekat' => $query['city_id'],
            'provinsi_dekat' => $query['provinsi'],
            'kode_pos_dekat' => $query['kode_pos'],
            'email_dekat' => $query['email'],
            'no_hp_dekat' => $query['no_hp']
        ];
        # 4. Add data ke dalam tabel info_orang_terdekat
        $this->db->insert('info_orang_terdekat',$data);
    }

    private function _addData(){
        $data = [
            'id_user' => $this->input->post('id_keluarga'),
            'hubungan' => $this->input->post('hubungan-od',true),
            'nama_depan' => $this->input->post('first-name-od',true),
            'nama_belakang' => $this->input->post('last-name-od',true),
            'tempat_lahir' => $this->input->post('tmp-lahir-od',true),
            'tanggal_lahir' => $this->input->post('tgl-lahir-od',true),
            'jenis_kelamin' => $this->input->post('jns-kelamin-od',true),
            'status_nikah' => $this->input->post('status-pernikahan-od',true),
            'pekerjaan' => $this->input->post('pekerjaan-od',true),
            'pendidikan' => $this->input->post('pendidikan-od',true),
            'jenis_id' => $this->input->post('jns-id-od',true),
            'no_id' => $this->input->post('no-id-od',true),
            'alamat' => $this->input->post('jalan-od',true),
            'city_id' => $this->input->post('kota-od',true),
            'province_id' => $this->input->post('provinsi-od',true),
            'kode_pos' => $this->input->post('kodepos-od',true),
            'provinsi' => $this->input->post('provinsi-nama-od',true),
            'kota_kab' => $this->input->post('kota-nama-od',true),
            'email' => $this->input->post('email-od',true),
            'no_hp' => $this->input->post('no-hp-od',true),
            'gol_darah' => '',
            'alergi' => '',
            'riwayat_penyakit' => '',
        ];
        $this->db->insert('pasien',$data);
    }

    function addSurvei(){
        $data = [
            'id_pasien' => $this->input->post('id_pasien',true),
            'survey1' => $this->input->post('survei-kunjungan',true),
            'survey2' => $this->input->post('survei-klinik',true),
            'survey3' => $this->input->post('survei-kontak',true),
            'survey4' => $this->input->post('survei-ads',true),
        ];
        $this->db->insert('survey',$data);
    }

    function cekJadwalDokter(){
        $id_dokter = $this->input->post("id_dokter");
        $hari = $this->input->post("day");
        $prevKuota = $this->Dokter_model->getJadwal($id_dokter,$hari)['kuota'];
        if ($prevKuota<1) {
            # kuota habis
            # registrasi gagal
            # return redirect ke mana kek yg penting gagal
        }
        $curKuota = $prevKuota - 1;
        $this->Dokter_model->updateKuotaPemeriksaan($id_dokter,$hari,$curKuota);
    }

    private function addJadwalValidation(){

    }

    function addJadwalPemeriksaan(){
        $id_booking = base64_encode(substr(md5(rand()), 0, 9));
        
        $this->cekJadwalDokter();
        $this->addJadwalValidation();
        $this->addJadwal($id_booking);
        $this->addBooking($id_booking);
        $this->updateDataDiri();
        $this->addOrangDekat($id_booking);
        $this->addSurvei();

        return redirect('Pemeriksaan/konfirmasi_view/'.$id_booking);
    }
}