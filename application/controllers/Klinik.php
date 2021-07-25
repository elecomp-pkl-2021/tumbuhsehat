<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Klinik extends CI_Controller
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

    function filter_profil()
    {
        $id_user = $this->session->userdata('id_user');
        $cabang = $this->Cabang_model->get_cabang2();
        $dokter = $this->Dokter_model->get_dokter();
        $id = $_GET['id'];
        $tgl = $_GET['tgl'];
        if ($id == 0) {
            $data['janji_datang'] = $this->Klinik_model->get_janji_datang_profil_klinik()->result();
        } else {
            if ($tgl == 0) {
                $data['janji_datang'] = $this->Klinik_model->get_janji_datang_profil_klinik_2($id)->result();
            } else {
                $data['janji_datang'] = $this->Klinik_model->get_janji_datang_profil_klinik_3($tgl, $id)->result();
            }
        }

        $this->load->view('pages/home/klinik/filter_profil', $data);
    }

    function filter_profil_2()
    {
        $id_user = $this->session->userdata('id_user');
        $cabang = $this->Cabang_model->get_cabang2();
        $dokter = $this->Dokter_model->get_dokter2();
        $id = $_GET['id'];
        $tgl = $_GET['tgl'];
        if ($id == 0) {
            $konf = '1';
            $st = '2';
            $this->db->select('*');
            $this->db->from('booking a');
            $this->db->join('rencana b', 'a.id_booking=b.id_booking');
            $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
            $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
            $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
            $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
            $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
            $this->db->where('a.konfirmasi', $konf);
            $this->db->where('a.status', $st);
            $this->db->where('f.status', $st);
            $this->db->order_by('b.tanggal_rencana', 'asc');
            $this->db->order_by('b.jam_rencana_mulai', 'asc');
            $this->db->order_by('b.jam_rencana_selesai', 'asc');
            $data = $this->db->get('')->result();
        } else {
            if ($tgl == 0) {
                $konf = '1';
                $st = '2';
                $this->db->select('*');
                $this->db->from('booking a');
                $this->db->join('rencana b', 'a.id_booking=b.id_booking');
                $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
                $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
                $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
                $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
                $this->db->join('jadwal_dokter g', ' a.id_dokter=g.id_dokter');
                $this->db->where('a.konfirmasi', $konf);
                $this->db->where('a.status', $st);
                $this->db->where('f.status', $st);
                $this->db->where('a.id_dokter', $id);
                $this->db->order_by('b.tanggal_rencana', 'asc');
                $this->db->order_by('b.jam_rencana_mulai', 'asc');
                $this->db->order_by('b.jam_rencana_selesai', 'asc');
                $data = $this->db->get('')->result();
            } else {
                $konf = '1';
                $st = '2';
                $this->db->select('*');
                $this->db->from('booking a');
                $this->db->join('rencana b', 'a.id_booking=b.id_booking');
                $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
                $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
                $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
                $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
                $this->db->join('jadwal_dokter g', ' a.id_dokter=g.id_dokter');
                $this->db->where('a.konfirmasi', $konf);
                $this->db->where('a.status', $st);
                $this->db->where('f.status', $st);
                $this->db->where('a.id_dokter', $id);
                $this->db->where('b.tanggal_rencana', $tgl);
                $this->db->order_by('b.tanggal_rencana', 'asc');
                $this->db->order_by('b.jam_rencana_mulai', 'asc');
                $this->db->order_by('b.jam_rencana_selesai', 'asc');
                $data = $this->db->get('')->result();
            }
        }
        if (!empty($data)) {
            foreach ($data as $result) : ?>
                <?php if ($result->konfirmasi == '1') { ?>
                    <?php
                    $jam = $result->jam_mulai . '-' . $result->jam_tutup;
                    $a = 0;
                    $b = 1;
                    $a++;
                    if ($result->jam_rencana_mulai . '-' . $result->jam_rencana_selesai == $jam) {
                        if ($a <= $b) { ?>
                            <div class="timeline">
                                <div class="entry">
                                    <div class="title">
                                        <font style="text-align: right;">
                                            <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                                            <?php
                                            switch ($namahari) {
                                                case 'Sunday':
                                                    $hari_ini = "Minggu";
                                                    break;

                                                case 'Monday':
                                                    $hari_ini = "Senin";
                                                    break;

                                                case 'Tuesday':
                                                    $hari_ini = "Selasa";
                                                    break;

                                                case 'Wednesday':
                                                    $hari_ini = "Rabu";
                                                    break;

                                                case 'Thursday':
                                                    $hari_ini = "Kamis";
                                                    break;

                                                case 'Friday':
                                                    $hari_ini = "Jumat";
                                                    break;

                                                case 'Sataturday':
                                                    $hari_ini = "Sabtu";
                                                    break;

                                                default:
                                                    $hari_ini = "Tidak di ketahui";
                                                    break;
                                            }
                                            ?>
                                            <p><?php echo $hari_ini ?></p>
                                            <?php $tgl = date('d M', strtotime($result->tanggal_rencana)); ?>
                                            <h3><b><?php echo $tgl ?></b></h3>
                                            <p><?php echo $result->jam_mulai_periksa; ?>-<?php echo $result->jam_selesai_periksa; ?></p>
                                        </font>
                                    </div>
                                    <div class="body">
                                        <p style="font-size: 12px;"><i>
                                                <?php
                                                $awal  = strtotime($result->tanggal_rencana . $result->jam_selesai_periksa);
                                                $akhir = time();
                                                $diff  = $akhir - $awal;
                                                $jam   = floor($diff / (60 * 60));
                                                $menit = $diff - $jam * (60 * 60);
                                                if ($akhir > $awal) {
                                                    echo $jam .  ' jam, ' . floor($menit / 60) . ' menit yang lalu';
                                                } else {
                                                    echo 'Waktu tersisa tinggal ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                                                }
                                                ?>
                                            </i></p>
                                        <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> -
                                                <?php echo $result->hubungan  ?></b></p>
                                        <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                                        <div class="form-group">
                                            <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                                                Pemeriksaan Selesai</font><br><br>
                                            <a href="<?php echo base_url() ?>klinik/metode_bayar/<?php echo $result->id_booking ?>/<?php echo $result->id_rekam_medis ?>.html" type="button" class="col-md-10 btn-bayar">Proses Bayar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                } ?>
            <?php endforeach;
        } else {
            ?>
            <font style="text-align: center;">
                <h4>Tidak Ada Data</h4>
            </font>
            <?php
        }
    }

    function filter_profil_3()
    {
        $id_user = $this->session->userdata('id_user');
        $cabang = $this->Cabang_model->get_cabang2();
        $dokter = $this->Dokter_model->get_dokter2();
        $id = $_GET['id'];
        $tgl = $_GET['tgl'];
        if ($id == 0) {
            $stt = '1';
            $this->db->select('*');
            $this->db->from('booking a');
            $this->db->join('rencana b', 'a.id_booking=b.id_booking');
            $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
            $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
            $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
            $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
            $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
            $this->db->where('f.status', $stt);
            $this->db->where('a.status', $stt);
            $this->db->order_by('b.tanggal_rencana', 'asc');
            $this->db->order_by('b.jam_rencana_mulai', 'asc');
            $this->db->order_by('b.jam_rencana_selesai', 'asc');
            $data = $this->db->get('')->result();
        } else {
            if ($tgl == 0) {
                $stt = '1';
                $this->db->select('*');
                $this->db->from('booking a');
                $this->db->join('rencana b', 'a.id_booking=b.id_booking');
                $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
                $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
                $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
                $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
                $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
                $this->db->where('a.id_dokter', $id);
                $this->db->where('f.status', $stt);
                $this->db->where('a.status', $stt);
                $this->db->order_by('b.tanggal_rencana', 'asc');
                $this->db->order_by('b.jam_rencana_mulai', 'asc');
                $this->db->order_by('b.jam_rencana_selesai', 'asc');
                $data = $this->db->get('')->result();
            } else {
                $stt = '1';
                $this->db->select('*');
                $this->db->from('booking a');
                $this->db->join('rencana b', 'a.id_booking=b.id_booking');
                $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
                $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
                $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
                $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
                $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
                $this->db->where('a.id_dokter', $id);
                $this->db->where('b.tanggal_rencana', $tgl);
                $this->db->where('f.status', $stt);
                $this->db->where('a.status', $stt);
                $this->db->order_by('b.tanggal_rencana', 'asc');
                $this->db->order_by('b.jam_rencana_mulai', 'asc');
                $this->db->order_by('b.jam_rencana_selesai', 'asc');
                $data = $this->db->get('')->result();
            }
        }
        if (!empty($data)) {
            foreach ($data as $result) : ?>
                <?php if ($result->konfirmasi == '1') { ?>
                    <?php
                    $jam = $result->jam_mulai . '-' . $result->jam_tutup;
                    $a = 0;
                    $b = 1;
                    $a++;
                    if ($result->jam_rencana_mulai . '-' . $result->jam_rencana_selesai == $jam) {
                        if ($a <= $b) { ?>
                            <div class="timeline">
                                <div class="entry">
                                    <div class="title">
                                        <font style="text-align: right;">
                                            <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                                            <?php
                                            switch ($namahari) {
                                                case 'Sunday':
                                                    $hari_ini = "Minggu";
                                                    break;

                                                case 'Monday':
                                                    $hari_ini = "Senin";
                                                    break;

                                                case 'Tuesday':
                                                    $hari_ini = "Selasa";
                                                    break;

                                                case 'Wednesday':
                                                    $hari_ini = "Rabu";
                                                    break;

                                                case 'Thursday':
                                                    $hari_ini = "Kamis";
                                                    break;

                                                case 'Friday':
                                                    $hari_ini = "Jumat";
                                                    break;

                                                case 'Sataturday':
                                                    $hari_ini = "Sabtu";
                                                    break;

                                                default:
                                                    $hari_ini = "Tidak di ketahui";
                                                    break;
                                            }
                                            ?>
                                            <p><?php echo $hari_ini ?></p>
                                            <?php $tgl = date('d M', strtotime($result->tanggal_rencana)); ?>
                                            <h3><b><?php echo $tgl ?></b></h3>
                                            <p><?php echo $result->jam_mulai ?>-<?php echo $result->jam_tutup ?></p>
                                        </font>
                                    </div>
                                    <div class="body">
                                        <p style="font-size: 12px;"><i>
                                                <?php
                                                $awal  = strtotime($result->tanggal_rencana . $result->jam_mulai);
                                                $akhir = time();
                                                $diff  = $akhir - $awal;
                                                $jam   = floor($diff / (60 * 60));
                                                $menit = $diff - $jam * (60 * 60);
                                                if ($akhir > $awal) {
                                                    echo 'Terlambat: ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                                                } else {
                                                    echo 'Waktu tersisa tinggal ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                                                }
                                                ?>
                                            </i></p>
                                        <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> -
                                                <?php echo $result->hubungan  ?></b></p>
                                        <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                                        <div class="form-group">
                                            <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                                                Sedang Pemeriksaan</font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                } ?>
            <?php endforeach;
        } else {
            ?>
            <font style="text-align: center;">
                <h4>Tidak Ada Data</h4>
            </font>
            <?php
        }
    }

    function filter_tanggal()
    {
        $id_user = $this->session->userdata('id_user');
        $cabang = $this->Cabang_model->get_cabang2();
        $dokter = $this->Dokter_model->get_dokter2();
        $tgl = $_GET['tgl'];
        $id = $_GET['id'];
        if ($tgl == 0) {
            $data['janji_datang'] = $this->Klinik_model->get_janji_datang_klinik()->result();
        } else {
            if ($id == 0) {
                $data['janji_datang'] = $this->Klinik_model->get_janji_datang_klinik_2($tgl)->result();
            } else {
                $data['janji_datang'] = $this->Klinik_model->get_janji_datang_klinik_3($tgl, $id)->result();
            }
        }

        $this->load->view('pages/home/klinik/filter_tanggal', $data);
    }

    function filter_tanggal_2()
    {
        $id_user = $this->session->userdata('id_user');
        $cabang = $this->Cabang_model->get_cabang2();
        $dokter = $this->Dokter_model->get_dokter2();
        $tgl = $_GET['tgl'];
        $id = $_GET['id'];
        if ($tgl == 0) {
            $stat = '1';
            $st = '2';
            $this->db->select('*');
            $this->db->from('booking a');
            $this->db->join('rencana b', 'a.id_booking=b.id_booking');
            $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
            $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
            $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
            $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
            $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
            $this->db->where('a.konfirmasi', $stat);
            $this->db->where('a.status', $st);
            $this->db->where('f.status', $st);
            $this->db->order_by('b.tanggal_rencana', 'asc');
            $this->db->order_by('b.jam_rencana_mulai', 'asc');
            $this->db->order_by('b.jam_rencana_selesai', 'asc');
            $data = $this->db->get('')->result();
        } else {
            if ($id == 0) {
                $stat = '1';
                $st = '2';
                $this->db->select('*');
                $this->db->from('booking a');
                $this->db->join('rencana b', 'a.id_booking=b.id_booking');
                $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
                $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
                $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
                $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
                $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
                $this->db->where('a.konfirmasi', $stat);
                $this->db->where('a.status', $st);
                $this->db->where('f.status', $st);
                $this->db->where('b.tanggal_rencana', $tgl);
                $this->db->order_by('b.tanggal_rencana', 'asc');
                $this->db->order_by('b.jam_rencana_mulai', 'asc');
                $this->db->order_by('b.jam_rencana_selesai', 'asc');
                $data = $this->db->get('')->result();
            } else {
                $stat = '1';
                $st = '2';
                $this->db->select('*');
                $this->db->from('booking a');
                $this->db->join('rencana b', 'a.id_booking=b.id_booking');
                $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
                $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
                $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
                $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
                $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
                $this->db->where('a.konfirmasi', $stat);
                $this->db->where('a.status', $st);
                $this->db->where('f.status', $st);
                $this->db->where('b.tanggal_rencana', $tgl);
                $this->db->where('a.id_dokter', $id);
                $this->db->order_by('b.tanggal_rencana', 'asc');
                $this->db->order_by('b.jam_rencana_mulai', 'asc');
                $this->db->order_by('b.jam_rencana_selesai', 'asc');
                $data = $this->db->get('')->result();
            }
        }
        if (!empty($data)) {
            foreach ($data as $result) : ?>
                <?php if ($result->konfirmasi == '1') { ?>
                    <?php
                    $jam = $result->jam_mulai . '-' . $result->jam_tutup;
                    $a = 0;
                    $b = 1;
                    $a++;
                    if ($result->jam_rencana_mulai . '-' . $result->jam_rencana_selesai == $jam) {
                        if ($a <= $b) { ?>
                            <div class="timeline">
                                <div class="entry">
                                    <div class="title">
                                        <font style="text-align: right;">
                                            <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                                            <?php
                                            switch ($namahari) {
                                                case 'Sunday':
                                                    $hari_ini = "Minggu";
                                                    break;

                                                case 'Monday':
                                                    $hari_ini = "Senin";
                                                    break;

                                                case 'Tuesday':
                                                    $hari_ini = "Selasa";
                                                    break;

                                                case 'Wednesday':
                                                    $hari_ini = "Rabu";
                                                    break;

                                                case 'Thursday':
                                                    $hari_ini = "Kamis";
                                                    break;

                                                case 'Friday':
                                                    $hari_ini = "Jumat";
                                                    break;

                                                case 'Sataturday':
                                                    $hari_ini = "Sabtu";
                                                    break;

                                                default:
                                                    $hari_ini = "Tidak di ketahui";
                                                    break;
                                            }
                                            ?>
                                            <p><?php echo $hari_ini ?></p>
                                            <?php
                                            $tgl = date('d M', strtotime($result->tanggal_rencana));
                                            ?>
                                            <h3><b><?php echo $tgl ?></b></h3>
                                            <p><?php echo $result->jam_mulai_periksa; ?>-<?php echo $result->jam_selesai_periksa; ?></p>
                                        </font>
                                    </div>
                                    <div class="body">
                                        <p style="font-size: 12px;"><i>
                                                <?php
                                                $awal  = strtotime($result->tanggal_rencana . $result->jam_selesai_periksa);
                                                $akhir = time();
                                                $diff  = $akhir - $awal;
                                                $jam   = floor($diff / (60 * 60));
                                                $menit = $diff - $jam * (60 * 60);
                                                if ($akhir > $awal) {
                                                    echo $jam .  ' jam, ' . floor($menit / 60) . ' menit yang lalu';
                                                } else {
                                                    echo 'Waktu tersisa tinggal ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                                                }
                                                ?>
                                            </i></p>
                                        <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> -
                                                <?php echo $result->hubungan  ?></b></p>
                                        <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                                        <div class="form-group">
                                            <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                                                Pemeriksaan Selesai</font><br><br>
                                            <a href="<?php echo base_url() ?>klinik/metode_bayar/<?php echo $result->id_booking ?>/<?php echo $result->id_rekam_medis ?>.html" type="button" class="col-md-10 btn-bayar">Proses Bayar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                } ?>
            <?php endforeach;
        } else {
            ?>
            <font style="text-align: center;">
                <h4>Tidak Ada Data</h4>
            </font>
            <?php
        }
    }

    function filter_tanggal_3()
    {
        $id_user = $this->session->userdata('id_user');
        $cabang = $this->Cabang_model->get_cabang2();
        $dokter = $this->Dokter_model->get_dokter2();
        $tgl = $_GET['tgl'];
        $id = $_GET['id'];
        if ($tgl == 0) {
            $stt = '1';
            $this->db->select('*');
            $this->db->from('booking a');
            $this->db->join('rencana b', 'a.id_booking=b.id_booking');
            $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
            $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
            $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
            $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
            $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
            $this->db->where('f.status', $stt);
            $this->db->where('a.status', $stt);
            $this->db->order_by('b.tanggal_rencana', 'asc');
            $this->db->order_by('b.jam_rencana_mulai', 'asc');
            $this->db->order_by('b.jam_rencana_selesai', 'asc');
            $data = $this->db->get('')->result();
        } else {
            if ($id == 0) {
                $stt = '1';
                $this->db->select('*');
                $this->db->from('booking a');
                $this->db->join('rencana b', 'a.id_booking=b.id_booking');
                $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
                $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
                $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
                $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
                $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
                $this->db->where('b.tanggal_rencana', $tgl);
                $this->db->where('f.status', $stt);
                $this->db->where('a.status', $stt);
                $this->db->order_by('b.tanggal_rencana', 'asc');
                $this->db->order_by('b.jam_rencana_mulai', 'asc');
                $this->db->order_by('b.jam_rencana_selesai', 'asc');
                $data = $this->db->get('')->result();
            } else {
                $stt = '1';
                $this->db->select('*');
                $this->db->from('booking a');
                $this->db->join('rencana b', 'a.id_booking=b.id_booking');
                $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
                $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
                $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
                $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
                $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
                $this->db->where('b.tanggal_rencana', $tgl);
                $this->db->where('a.id_dokter', $id);
                $this->db->where('f.status', $stt);
                $this->db->where('a.status', $stt);
                $this->db->order_by('b.tanggal_rencana', 'asc');
                $this->db->order_by('b.jam_rencana_mulai', 'asc');
                $this->db->order_by('b.jam_rencana_selesai', 'asc');
                $data = $this->db->get('')->result();
            }
        }
        if (!empty($data)) {
            foreach ($data as $result) : ?>
                <?php if ($result->konfirmasi == '1') { ?>
                    <?php
                    $jam = $result->jam_mulai . '-' . $result->jam_tutup;
                    $a = 0;
                    $b = 1;
                    $a++;
                    if ($result->jam_rencana_mulai . '-' . $result->jam_rencana_selesai == $jam) {
                        if ($a <= $b) { ?>
                            <div class="timeline">
                                <div class="entry">
                                    <div class="title">
                                        <font style="text-align: right;">
                                            <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                                            <?php
                                            switch ($namahari) {
                                                case 'Sunday':
                                                    $hari_ini = "Minggu";
                                                    break;

                                                case 'Monday':
                                                    $hari_ini = "Senin";
                                                    break;

                                                case 'Tuesday':
                                                    $hari_ini = "Selasa";
                                                    break;

                                                case 'Wednesday':
                                                    $hari_ini = "Rabu";
                                                    break;

                                                case 'Thursday':
                                                    $hari_ini = "Kamis";
                                                    break;

                                                case 'Friday':
                                                    $hari_ini = "Jumat";
                                                    break;

                                                case 'Sataturday':
                                                    $hari_ini = "Sabtu";
                                                    break;

                                                default:
                                                    $hari_ini = "Tidak di ketahui";
                                                    break;
                                            }
                                            ?>
                                            <p><?php echo $hari_ini ?></p>
                                            <?php $tgl = date('d M', strtotime($result->tanggal_rencana)); ?>
                                            <h3><b><?php echo $tgl ?></b></h3>
                                            <p><?php echo $result->jam_mulai ?>-<?php echo $result->jam_tutup ?></p>
                                        </font>
                                    </div>
                                    <div class="body">
                                        <p style="font-size: 12px;"><i>
                                                <?php
                                                $awal  = strtotime($result->tanggal_rencana . $result->jam_mulai);
                                                $akhir = time();
                                                $diff  = $akhir - $awal;
                                                $jam   = floor($diff / (60 * 60));
                                                $menit = $diff - $jam * (60 * 60);
                                                if ($akhir > $awal) {
                                                    echo 'Terlambat: ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                                                } else {
                                                    echo 'Waktu tersisa tinggal ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                                                }
                                                ?>
                                            </i></p>
                                        <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> -
                                                <?php echo $result->hubungan  ?></b></p>
                                        <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                                        <div class="form-group">
                                            <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                                                Sedang Pemeriksaan</font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                } ?>
            <?php endforeach;
        } else {
            ?>
            <font style="text-align: center;">
                <h4>Tidak Ada Data</h4>
            </font>
<?php
        }
    }

    public function update_rencana_h_profil()
    {
        $data_booking = array(
            'id_cabang' => $this->input->post('id_cabang'),
            'id_dokter' => $this->input->post('id_dokter'),
        );

        $data_rencana = array(
            'id_booking' => $this->input->post('id_booking'),
            'tanggal_rencana' => $this->input->post('tanggal_rencana'),
            'jam_rencana_mulai' => $this->input->post('jam_rencana_mulai'),
            'jam_rencana_selesai' => $this->input->post('jam_rencana_selesai'),
        );

        $this->Klinik_model->update_stat_book($this->input->post('id_booking'), $data_booking);
        $this->Klinik_model->update_rencana($this->input->post('id_rcn'), $data_rencana);

        redirect('Home');
    }
}
