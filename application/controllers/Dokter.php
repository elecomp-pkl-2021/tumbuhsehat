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
        $this->load->model('Layanan_model');
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $id_dokter = $this->Dokter_model->get_dokter_id($id_user);

        $data = [
            'title' => 'Home | Tumbuh Sehat',
            'judulHalaman' => 'Home',
            'subJudulHalaman' => 'Selamat datang di <b>Tumbuh Sehat</b>',
            'iconHalaman' => 'ik-home',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li>',
            'dokter' => $this->Dokter_model->get_dokter(),
            'cabang' => $this->Cabang_model->get_cabang(),
            'daftarPasien' =>  $this->Dokter_model->getDaftarPasien($id_dokter)
        ];

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_dokter');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/dokter/index', $data);
        $this->load->view('components/footer');
        $this->load->view('pages/home/dokter/dokter-script', $data);
    }

    public function getDaftarPasienByIdDokter()
    {
        $id_user = $this->session->userdata('id_user');
        $id_dokter = $this->Dokter_model->get_dokter_id($id_user);
        echo json_encode($this->Dokter_model->getDaftarPasien($id_dokter));
    }

    public function filterDataJadwalPemeriksaanPasien()
    {
        $id_user = $this->session->userdata('id_user');
        $id_dokter = $this->Dokter_model->get_dokter_id($id_user);

        $kode_booking = $this->input->post('kode_booking');
        $filter_jam = $this->input->post('filter_jam');
        $filter_nama = $this->input->post('filter_nama');
        $filter_tgl_lahir = $this->input->post('filter_tgl_lahir');
        $filter_status = $this->input->post('filter_status');
        echo json_encode($this->Dokter_model->searchPasien($id_dokter, $kode_booking, $filter_jam, $filter_nama, $filter_tgl_lahir, $filter_status));
    }

    public function pemeriksaan($id_pasien, $id_rekam_medis)
    {
        $pasien1 = $this->Pasien_model->get_medis_pasien($id_rekam_medis, $id_pasien)->row_array();
        $pasien2 = $this->Pasien_model->get_medis_pasien($id_rekam_medis, $id_pasien);
        $data = [
            'title' => 'Pemeriksaan Pasien | Tumbuh Sehat',
            'judulHalaman' => 'Data Pemeriksaan',
            'subJudulHalaman' => 'Pemeriksaan Pasien <b>' . $pasien1['nama_depan'] . ' ' . $pasien1['nama_belakang'] . '</b>',
            'iconHalaman' => 'ik-calendar',
            'breadcrumbs' => '<li class="breadcrumb-item active"><i class="ik ik-home"></i></li> <li class="breadcrumb-item active">Jadwal Pemeriksaan</i></li>',
            'layanan' => $this->Layanan_model->getLayananAktif(),
            'diskon' => $this->Layanan_model->getDiskonAktif()
        ];

        $idk_psn = $this->session->userdata('id_kpesan');
        if (!empty($idk_psn)) {
            $id_kpesan = $this->session->userdata('id_kpesan');
        } else {
            $id_kpesan = $this->randomString();
            $data['id_kpesan'] = $id_kpesan;
        }

        $tgl_awal = date('Y-m-d');

        $rawat = $this->Pasien_model->get_one_rawat_by_id_medis($id_pasien, $tgl_awal, $id_rekam_medis);
        $data_rawat = json_decode(json_encode(@$rawat[0]), true);
        if ($data_rawat && is_array($data_rawat)) {
            $rawat = array_merge(@$data_rawat, array("detail_rawat" => array()));
        }

        $data['rawat'] = $rawat;
        $data['pasien'] = $pasien1;
        $data['pasien2'] = $pasien2;
        $data['_jadwal_pemeriksaan'] = 1;
        $data['id_pasien'] = $id_pasien;

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_dokter');
        $this->load->view('components/breadcrumbs', $data);
        $this->load->view('pages/home/dokter/pemeriksaan', $data);
        $this->load->view('components/footer');
        // end resepsionis
    }

    public function ajax_check_id()
    {
        //$date = date('Y-m-d');
        $data = $this->Pasien_model->get_check_id();
        echo json_encode($data);
    }

    public function ajax_add_temp()
    {
        $data = array(
            'idSvg' => $this->input->post('idSvg'),
            'idPemeriksaan' => $this->input->post('id_pemeriksaan'),
            'ket_pemeriksaan' => $this->input->post('control'),
            'session_id' => $this->input->post('session_id')
        );

        $this->Pasien_model->add_svg($data);
        echo json_encode(array('status' => TRUE));
    }

    public function ajax_id_svg($id, $idpemeriksaan, $session_id)
    {
        $data = $this->Pasien_model->get_by_id_svg($id, $idpemeriksaan, $session_id);
        echo json_encode($data);
    }

    function randomString($length = 10)
    {
        $str = "";
        $characters = array_merge(range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }

    private function _updateRekam()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = array(
            'jam_selesai_periksa' =>  date("H:i:s"),
            'status' => '2',
            'elemen_gigi' => $this->input->post('elemen_gigi'),
            'keluhan_utama' => $this->input->post('anamnesa'),
            'diagnosis' => $this->input->post('diagnosa'),
            'keadaan_umum' => $this->input->post('kondisi-kesehatan'),
            'subtotal' => $this->input->post('subtotal'),
            'grandtotal' => $this->input->post('grandtotal')
        );

        $this->db->update('rekam_medis', $data, ['id_rekam_medis' => $this->input->post('id_rm')]);
    }

    private function _updatePasien()
    {
        $data = [
            'id_pasien' => $this->input->post('id_pasien'),
            'id_user' => $this->input->post('id_keluarga'),
            'nama_depan' => $this->input->post('first-name', true),
            'nama_belakang' => $this->input->post('last-name', true),
            'tempat_lahir' => $this->input->post('tmp-lahir', true),
            'tanggal_lahir' => $this->input->post('tgl-lahir', true),
            'jenis_kelamin' => $this->input->post('jns-kelamin', true),
            'status_nikah' => $this->input->post('status-pernikahan', true),
            'pekerjaan' => $this->input->post('pekerjaan', true),
            'pendidikan' => $this->input->post('pendidikan', true),
            'jenis_id' => $this->input->post('jns-id', true),
            'no_id' => $this->input->post('no-id', true),
            'alamat' => $this->input->post('jalan', true),
            'city_id' => $this->input->post('kota', true),
            'province_id' => $this->input->post('provinsi', true),
            'kode_pos' => $this->input->post('kode-pos', true),
            'provinsi' => $this->input->post('provinsi-nama', true),
            'kota_kab' => $this->input->post('kota-nama', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('no-hp', true),
            'gol_darah' => $this->input->post('gol-dar', true),
            'alergi' => $this->input->post('alergi', true),
            'riwayat_penyakit' => $this->input->post('rwyt-penyakit', true),
        ];
        $this->db->update('pasien', $data, ['id_pasien' => $data['id_pasien']]);
    }

    private function _updateBooking()
    {
        // ini buat update tabel booking
    }

    private function _updateOdontogram()
    {
        // ini buat update odontogram
    }

    private function _addPemeriksaanUmum()
    {
    }

    private function _addPemeriksaanKhusus()
    {
    }

    private function _addPemeriksaanPenunjang()
    {
    }

    private function _addPilihLayanan()
    {
    }

    // ODONTOGRAM
    public function create_odontogram_periksa()
    {
        $data_pemeriksaan_odontogram = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'id_booking' => $this->input->post('id_booking'),
            'id_rekam_medis' => $this->input->post('id_rekam_medis'),
            'odontogram' => $this->input->post('odontogram'),
            'tgl_pemeriksaan' => date('Y-m-d')
        );

        $this->Pasien_model->insert_pemeriksaan_odontogram($data_pemeriksaan_odontogram);
        //print_r($this->db->last_query());

        echo json_encode(array('status' => TRUE));
    }

    public function getTemp($idSvg, $idPemeriksaan)
    {
        $data = $this->Pasien_model->get_temp($idSvg, $idPemeriksaan);
        echo json_encode($data);
    }

    public function create_action_periksa()
    {
        $id_pemeriksaan_penunjang = $this->input->post('id_pemeriksaan_penunjang');
        $id_pasien = $this->input->post('id_pasien');
        $id_booking = $this->input->post('id_booking');
        $id_rekam_medis = $this->input->post('id_rekam_medis');
        $gigi = $this->input->post('gigi');
        $keterangan_radiologi = $this->input->post('keterangan_radiologi');
        $laboratorium = $this->input->post('laboratorium');
        $keterangan_laboratorium = $this->input->post('keterangan_laboratorium');
        $foto_radiologi = $this->input->post('foto_radiologi');
        $foto_laboratorium = $this->input->post('foto_laboratorium');
        $odontogram = $this->input->post('odontogram');

        $config['upload_path']          = './assets/foto';
        $config['allowed_types']        = 'jpg|png|jpeg|gif';
        $config['max_size']             = 15000000;
        $config['max_width']            = 1024000;
        $config['max_height']           = 7680000;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_radiologi');
        $file1 = $this->upload->data();
        $foto_radiologi = $file1['file_name'];
        $this->upload->do_upload('foto_laboratorium');
        $file2 = $this->upload->data();
        $foto_laboratorium = $file2['file_name'];

        $data_pemeriksaan_penunjang = array(
            'id_pemeriksaan_penunjang' => $id_pemeriksaan_penunjang,
            'id_pasien' => $id_pasien,
            'id_booking' => $id_booking,
            'id_rekam_medis' => $id_rekam_medis,
            'gigi' => $gigi,
            'keterangan_radiologi' => $keterangan_radiologi,
            'keterangan_laboratorium' => $keterangan_laboratorium,
            'foto_radiologi' => $foto_radiologi,
            'foto_laboratorium' => $foto_laboratorium
        );

        $panoramik = $this->input->post('panoramik');
        $sefalometri = $this->input->post('sefalometri');
        $transcranial = $this->input->post('transcranial');
        $dental_regio = $this->input->post('dental_regio');

        $laboratorium1 = $this->input->post('laboratorium1');
        $laboratorium2 = $this->input->post('laboratorium2');

        if ($laboratorium1 != NULL) {
            $data_pemeriksaan_penunjang['laboratorium'] = $laboratorium1;
        } elseif ($laboratorium2 != NULL) {
            $data_pemeriksaan_penunjang['laboratorium'] = $laboratorium2;
        }

        if ($panoramik != NULL) {
            $data_pemeriksaan_penunjang['radiologi'] = $panoramik;
        }
        if ($sefalometri != NULL) {
            $data_pemeriksaan_penunjang['radiologi'] = $sefalometri;
        }
        if ($transcranial != NULL) {
            $data_pemeriksaan_penunjang['radiologi'] = $transcranial;
        }
        if ($dental_regio != NULL) {
            $data_pemeriksaan_penunjang['radiologi'] = $dental_regio;
        }
        /*========================== 2 */
        if ($panoramik != NULL) {
            if ($sefalometri != NULL) {
                $data_pemeriksaan_penunjang['radiologi'] = $panoramik . "," . $sefalometri;
            }
        }
        if ($panoramik != NULL) {
            if ($transcranial != NULL) {
                $data_pemeriksaan_penunjang['radiologi'] = $panoramik . "," . $transcranial;
            }
        }
        if ($panoramik != NULL) {
            if ($dental_regio != NULL) {
                $data_pemeriksaan_penunjang['radiologi'] = $panoramik . "," . $dental_regio;
            }
        }
        if ($sefalometri != NULL) {
            if ($transcranial != NULL) {
                $data_pemeriksaan_penunjang['radiologi'] = $sefalometri . "," . $transcranial;
            }
        }
        if ($sefalometri != NULL) {
            if ($dental_regio != NULL) {
                $data_pemeriksaan_penunjang['radiologi'] = $sefalometri . "," . $dental_regio;
            }
        }
        if ($transcranial != NULL) {
            if ($dental_regio != NULL) {
                $data_pemeriksaan_penunjang['radiologi'] = $transcranial . "," . $dental_regio;
            }
        }
        /*=============================== 3 */
        if ($panoramik != NULL) {
            if ($sefalometri != NULL) {
                if ($transcranial != NULL) {
                    $data_pemeriksaan_penunjang['radiologi'] = $panoramik . "," . $sefalometri . "," . $transcranial;
                }
            }
        }
        if ($panoramik != NULL) {
            if ($sefalometri != NULL) {
                if ($dental_regio != NULL) {
                    $data_pemeriksaan_penunjang['radiologi'] = $panoramik . "," . $sefalometri . "," . $dental_regio;
                }
            }
        }
        if ($panoramik != NULL) {
            if ($transcranial != NULL) {
                if ($dental_regio != NULL) {
                    $data_pemeriksaan_penunjang['radiologi'] = $panoramik . "," . $transcranial . "," . $dental_regio;
                }
            }
        }
        if ($sefalometri != NULL) {
            if ($transcranial != NULL) {
                if ($dental_regio != NULL) {
                    $data_pemeriksaan_penunjang['radiologi'] = $sefalometri . "," . $transcranial . "," . $dental_regio;
                }
            }
        }
        /*============================= 4 panom*/
        if ($panoramik != NULL) {
            if ($sefalometri != NULL) {
                if ($transcranial != NULL) {
                    if ($dental_regio != NULL) {
                        $data_pemeriksaan_penunjang['radiologi'] = $panoramik . "," . $sefalometri . "," . $transcranial . "," . $dental_regio;
                    }
                }
            }
        }

        date_default_timezone_set("Asia/Jakarta");
        $jam = date("H:i:s");
        $status = '2';
        $data_rekam = array(
            'jam_selesai_periksa' => $jam,
            'status' => $status,
            'elemen_gigi' => $this->input->post('elemen_gigi'),
            'keluhan_utama' => $this->input->post('keluhan_utama'),
            'diagnosis' => $this->input->post('diagnosis'),
            'keadaan_umum' => $this->input->post('keadaan_umum'),
            'subtotal' => $this->input->post('subtotal'),
            'grandtotal' => $this->input->post('grandtotal')
        );

        $data_booking = array(
            'status' => $status,
        );

        $data_pasien = array(
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'status_nikah' => $this->input->post('status_nikah'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'pendidikan' => $this->input->post('pendidikan'),
            'jenis_id' => $this->input->post('jenis_id'),
            'no_id' => $this->input->post('no_id'),
            'alamat' => $this->input->post('alamat'),
            'kota_kab' => $this->input->post('kota_kab'),
            'provinsi' => $this->input->post('provinsi'),
            'kode_pos' => $this->input->post('kode_pos'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'gol_darah' => $this->input->post('gol_darah'),
            'alergi' => $this->input->post('alergi'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
        );

        $data_pemeriksaan_umum = array(
            'id_pemeriksaan_umum' => $this->input->post('id_pemeriksaan_umum'),
            'id_pasien' => $this->input->post('id_pasien'),
            'id_booking' => $this->input->post('id_booking'),
            'id_rekam_medis' => $this->input->post('id_rekam_medis'),
            'wajah' => $this->input->post('wajah'),
            'subkanan_kondisi' => $this->input->post('subkanan_kondisi'),
            'subkiri_kondisi' => $this->input->post('subkiri_kondisi'),
            'lainnya' => $this->input->post('lainnya'),
            'stain' => $this->input->post('stain'),
            'kalkulus' => $this->input->post('kalkulus'),


        );

        $data_pemeriksaan_odontogram = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'id_booking' => $this->input->post('id_booking'),
            'id_rekam_medis' => $this->input->post('id_rekam_medis'),
            'odontogram' => $this->input->post('odontogram'),
            'tgl_pemeriksaan' => date('Y-m-d')
        );


        $bibir1 = $this->input->post('bibir1');
        $bibir2 = $this->input->post('bibir2');
        $submandibula_kanan1 = $this->input->post('submandibula_kanan1');
        $submandibula_kanan2 = $this->input->post('submandibula_kanan2');
        $submandibula_kiri1 = $this->input->post('submandibula_kiri1');
        $submandibula_kiri2 = $this->input->post('submandibula_kiri2');
        $gingiva1 = $this->input->post('gingiva1');
        $gingiva2 = $this->input->post('gingiva2');
        $debris1 = $this->input->post('debris1');
        $debris2 = $this->input->post('debris2');
        $mukosa1 =  $this->input->post('mukosa1');
        $mukosa2 =  $this->input->post('mukosa2');
        $palatum1 = $this->input->post('palatum1');
        $palatum2 = $this->input->post('palatum2');
        $lidah1 = $this->input->post('lidah1');
        $lidah2 = $this->input->post('lidah2');
        $dasar_mulut1 = $this->input->post('dasar_mulut1');
        $dasar_mulut2 = $this->input->post('dasar_mulut2');

        if ($bibir1 != NULL) {
            $data_pemeriksaan_umum['bibir'] = $bibir1;
        } elseif ($bibir2 != NULL) {
            $data_pemeriksaan_umum['bibir'] = $bibir2;
        }
        if ($submandibula_kanan1 != NULL) {
            $data_pemeriksaan_umum['submandibula_kanan'] = $submandibula_kanan1;
            if ($submandibula_kanan2 != NULL) {
                $data_pemeriksaan_umum['submandibula_kanan'] = $submandibula_kanan1 . "," . $submandibula_kanan2;
            }
        } elseif ($submandibula_kanan2 != NULL) {
            $data_pemeriksaan_umum['submandibula_kanan'] = $submandibula_kanan2;
            if ($submandibula_kanan1 != NULL) {
                $data_pemeriksaan_umum['submandibula_kanan'] = $submandibula_kanan2 . "," . $submandibula_kanan1;
            }
        }
        if ($submandibula_kiri1 != NULL) {
            $data_pemeriksaan_umum['submandibula_kiri'] = $submandibula_kiri1;
            if ($submandibula_kiri2 != NULL) {
                $data_pemeriksaan_umum['submandibula_kiri'] = $submandibula_kiri1 . "," . $submandibula_kiri2;
            }
        } elseif ($submandibula_kiri2 != NULL) {
            $data_pemeriksaan_umum['submandibula_kiri'] = $submandibula_kiri2;
            if ($submandibula_kiri1 != NULL) {
                $data_pemeriksaan_umum['submandibula_kiri'] = $submandibula_kiri2 . "," . $submandibula_kiri1;
            }
        }
        if ($gingiva1 != NULL) {
            $data_pemeriksaan_umum['gingiva'] = $gingiva1;
        } elseif ($gingiva2 != NULL) {
            $data_pemeriksaan_umum['gingiva'] = $gingiva2;
        }
        if ($debris1 != NULL) {
            $data_pemeriksaan_umum['debris'] = $debris1;
        } elseif ($debris2 != NULL) {
            $data_pemeriksaan_umum['debris'] = $debris2;
        }
        if ($mukosa1 != NULL) {
            $data_pemeriksaan_umum['mukosa'] = $mukosa1;
        } elseif ($mukosa2 != NULL) {
            $data_pemeriksaan_umum['mukosa'] = $mukosa2;
        }
        if ($palatum1 != NULL) {
            $data_pemeriksaan_umum['palatum'] = $palatum1;
        } elseif ($palatum2 != NULL) {
            $data_pemeriksaan_umum['palatum'] = $palatum2;
        }
        if ($lidah1 != NULL) {
            $data_pemeriksaan_umum['lidah'] = $lidah1;
        } elseif ($lidah2 != NULL) {
            $data_pemeriksaan_umum['lidah'] = $lidah2;
        }
        if ($dasar_mulut1 != NULL) {
            $data_pemeriksaan_umum['dasar_mulut'] = $dasar_mulut1;
        } elseif ($dasar_mulut2 != NULL) {
            $data_pemeriksaan_umum['dasar_mulut'] = $dasar_mulut2;
        }

        $data_pemeriksaan_umum['date'] = date('Y-m-d');

        $data_pemeriksaan_khusus = array(
            'id_pemeriksaan_khusus' => $this->input->post('id_pemeriksaan_khusus'),
            'id_pasien' => $this->input->post('id_pasien'),
            'id_booking' => $this->input->post('id_booking'),
            'id_rekam_medis' => $this->input->post('id_rekam_medis'),
            'keterangan' => $this->input->post('keterangan_khusus'),
            'date' => date('Y-m-d')

        );

        $data_pilih_layanan = array(
            'id_pil_layanan' => $this->input->post('id_pil_layanan'),
            'id_pasien' => $this->input->post('id_pasien'),
            'id_rekam_medis' => $this->input->post('id_rekam_medis'),
            'id_layanan' => $this->input->post('id_layanan'),
            'jumlah' => $this->input->post('jumlah'),
            'detail_layanan' => $this->input->post('detail_layanan'),
            'id_diskon' => $this->input->post('id_diskon'),
        );

        $this->Pemeriksaan_model->update_rekam($this->input->post('id_rekam_medis'), $data_rekam);
        $this->Pemeriksaan_model->update_booking($id_booking, $data_booking);
        $this->Pemeriksaan_model->insert_pemeriksaan_umum($data_pemeriksaan_umum);
        $this->Pemeriksaan_model->insert_pemeriksaan_khusus($data_pemeriksaan_khusus);
        $this->Pemeriksaan_model->insert_pemeriksaan_penunjang($data_pemeriksaan_penunjang);
        $this->Pemeriksaan_model->insert_pilih_layanan($data_pilih_layanan);
        $this->Pemeriksaan_model->update_pasien($this->input->post('id_pasien'), $data_pasien);
        $this->Pemeriksaan_model->update_pemeriksaan_odontogram($data_pemeriksaan_odontogram, $this->input->post('id_booking'));
        //print_r($this->db->last_query());

        echo json_encode(array('status' => TRUE));

        // $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
        //     </div>');

        // //redirect
        // redirect(site_url('doctor'));
    }
}
