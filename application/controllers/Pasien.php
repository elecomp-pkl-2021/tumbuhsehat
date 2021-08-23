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
        $data['informasi'] = $this->Pasien_informasi_model->get_informasi_all();
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

    public function index_dokter()
      {
          $data['informasi'] = $this->Pasien_informasi_model->get_informasi_all();
          $data['title'] = "Pasien | Tumbuh Sehat";
          $data['judulHalaman'] = "Informasi Pasien";
          $data['subJudulHalaman'] = "Daftar pasien klinik Tumbuh Sehar";
          $data['iconHalaman'] = "ik-users";
          $data['breadcrumbs'] = '
              <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
              <li class="breadcrumb-item active">Informasi Pasien</li>';
          
          $this->load->view('components/header', $data);
          $this->load->view('components/sidebar_dokter');
          $this->load->view('components/breadcrumbs', $data);
          $this->load->view('pages/home/index', $data);
          $this->load->view('components/footer');
      }
  
      // public function get_informasi_pasien_dokter(){
      //     $id_user = $this->session->userdata('id_user');
      //     $dokter = $this->Pasien_informasi_model->get_dokter($id_user);
      //     echo json_encode($this->Pasien_informasi_model->get_data_pemeriksaan($dokter->id_dokter)->result());
      // }
  
      
      public function  get_informasi_pasien_dokter(){
          $id_user = $this->session->userdata('id_user');
          $dokter = $this->Pasien_informasi_model->get_dokter($id_user);
          echo json_encode($this->Pasien_informasi_model->get_informasi_pasien($dokter->id_dokter)->result());
      }
  
  
      public function detail_informasi_pasien2($id_pasien, $id_booking)
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
          $dokter = $this->Data_pasien_model->get_dokter();
          $data['dokter'] = $dokter;
          $data['info'] = $this->Pasien_informasi_model->show_informasi($id_pasien, $id_booking);
          $data['info_umum'] = $this->Pasien_informasi_model->get_umum($id_pasien, $id_booking);
          $data['info_klinis'] = $this->Pasien_informasi_model->get_klinis($id_pasien);
          $data['info_penunjang'] = $this->Pasien_informasi_model->get_penunjang($id_pasien);
          $data['info_summary'] = $this->Pasien_informasi_model->get_summary($id_pasien);
          $data['info_odontogram'] = $this->Pasien_informasi_model->get_odontogram($id_pasien);
          $data['info_asuransi'] = $this->Pasien_informasi_model->get_asuransi($id_pasien, $id_booking);
          $data['info_bayar'] = $this->Pasien_informasi_model->get_pembayaran($id_pasien, $id_booking);
          $data['tanggal_periksa_penunjang'] = $this->Pasien_informasi_model->get_tanggal_pemeriksaan($id_pasien);
          $data['_informasi_pasien'] = 1;
          $data['content'] = 'dokter/detail_informasi_pasien';
          $this->load->view('template/template', $data);
          endforeach;
      }
  
      function filter_informasi_pasien2()
      {
        $id_user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('dokter a');
        $this->db->join('login_session b', 'a.id_user=b.id_user');
        $this->db->where('a.id_user', $id_user);
        $dokter = $this->db->get('')->result();
        foreach ($dokter as $key) :
          $id_dokter2 = $key->id_dokter;
        endforeach;
        if (!empty($_GET['id_dokter'])) {
          $id_dokter = $_GET['id_dokter'];
        } else if (empty($_GET['id_dokter'])) {
          $id_dokter = $id_dokter2;
        }
        $tgl = $_GET['tgl'];
    
    
        $konf = '1';
        $this->db->select('b.tanggal_rencana,b.jam_rencana_mulai, b.jam_rencana_selesai,d.nama_dokter,c.nama_depan,c.nama_belakang,c.hubungan,f.id_rekam_medis,a.status,c.id_pasien,a.id_booking,c.id_user');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('login_session g', 'a.id_user=g.id_user');
        $this->db->where('a.konfirmasi', $konf);
    
        if ($tgl != 0) {
          $this->db->where('b.tanggal_rencana', $tgl);
        }
        $this->db->where('a.id_dokter', $id_dokter);
        $this->db->where_not_in('a.status', 3);
        $this->db->where_not_in('a.status', 2);
        $this->db->group_by('a.id_booking');
        $this->db->order_by('b.tanggal_rencana', 'desc');
        $data = $this->db->get('')->result();
        if (!empty($data)) {
          ?>
          <?php foreach ($data as $result) : ?>
              <div class="container">
                <div class="row" style="margin-bottom : 25px ">
                    <div class="col-6">
                      <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                      <h6><b><?php echo $tgl ?> </b></h6>
                          <h9 style="font-weight: bold;"><?php echo $result->jam_rencana_mulai ?>-<?php echo $result->jam_rencana_selesai ?></h9>
                          <p>Drg. <?php echo $result->nama_dokter ?></p>
                          <?php if ($result->status == 0) { ?>
                              <font style="background: #FFFF00; color: #000;" class="label label-warning">Menunggu <br> Pendaftaran</font>
                          <?php } elseif ($result->status == 1) { ?>
                              <span class="badge badge-pill badge-success">Sudah Terdaftar</span>
                          <?php } ?>
                    </div>
                    <div class="col-6">
                      <h6 style="font-weight: bold ;"><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></h6>
                      <p style="font-size: 10px;">No. Rekam Medis <?php echo $result->id_rekam_medis ?></p>
                      <p style="font-size: 10px;">
                          <?php
                          if ($result->hubungan == 'Anda') {
                          echo "Atas nama sendiri ";
                          } elseif ($result->hubungan == 'Anak') {
                          echo $result->hubungan . " " . "<span id ='hubung_id'></span>";
                          } elseif ($result->hubungan == 'Ibu') {
                          echo $result->hubungan . " " . "<span id ='hubung_id2'></span>";
                          } elseif ($result->hubungan == 'Ayah') {
                          echo $result->hubungan . " " . "<span id ='hubung_id3'></span>";
                          } elseif ($result->hubungan == 'Istri') {
                          echo $result->hubungan . " " . "<span id ='hubung_id4'></span>";
                          } elseif ($result->hubungan == 'Suami') {
                          echo $result->hubungan . " " . "<span id ='hubung_id5'></span>";
                          } elseif ($result->hubungan == 'Saudara') {
                          echo $result->hubungan . " " . "<span id ='hubung_id6'></span>";
                          }
                          ?>
                      </p>
                      <select hidden name="id_user" id="id_user">
                          <option value="0" selected></option>
                      </select>
                      <a href="<?php echo site_url('Pasien/detail_informasi_pasien/' . $result->id_pasien . '/' . $result->id_booking . '/' . $result->id_rekam_medis) ?>" class="btn btn-anim" style="height: 35px; width: 70px; background-color: #19b5fe; color: white; border-radius: 5px"><span> Lihat</span></a>
                    </div>
                </div>
            </div>
          <?php endforeach; ?>
    
          <script>
            $(document).ready(function() {
              hubungan_pasien();
              $('#id_user').change(function() {
                // let a = $(this).val();
                // console.log(a);
              });
            });
    
            function hubungan_pasien() {
              var id = $('#id_user').val();
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id2').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id3').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id4').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id5').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id6').html(data);
                }
              });
            }
          </script>
        <?php
        } else {
        ?>
          <font style="text-align: center;">
            <h4>Tidak Ada Data</h4>
          </font>
          <?php
        }
      }

      function filter_informasi_pasien(){
    
        $tgl = $_GET['tgl'];
    
        $konf = '1';
        $this->db->select('b.tanggal_rencana,b.jam_rencana_mulai, b.jam_rencana_selesai ,d.nama_dokter,c.nama_depan,c.nama_belakang,c.hubungan,f.id_rekam_medis,a.status,c.id_pasien,a.id_booking,c.id_user');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('login_session g', 'a.id_user=g.id_user');
        $this->db->where('a.konfirmasi', $konf);
    
        if ($tgl != 0) {
          $this->db->where('b.tanggal_rencana', $tgl);
        }
    
        $this->db->where_not_in('a.status', 3);
        $this->db->where_not_in('a.status', 2);
        $this->db->group_by('a.id_booking');
        $this->db->order_by('b.tanggal_rencana', 'desc');
        $data = $this->db->get('')->result();
    
    
        if (!empty($data)) {
        ?>
        <?php foreach ($data as $result) : ?>
          <div class="container">
              <div class="row" style="margin-bottom : 25px ">
                  <div class="col-6">
                    <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                    <h6><b><?php echo $tgl ?> </b></h6>
                        <h9 style="font-weight: bold;"><?php echo $result->jam_rencana_mulai ?>-<?php echo $result->jam_rencana_selesai ?></h9>
                        <p>Drg. <?php echo $result->nama_dokter ?></p>
                        <?php if ($result->status == 0) { ?>
                            <font style="background: #FFFF00; color: #000;" class="label label-warning">Menunggu <br> Pendaftaran</font>
                        <?php } elseif ($result->status == 1) { ?>
                            <span class="badge badge-pill badge-success">Sudah Terdaftar</span>
                        <?php } ?>
                  </div>
                  <div class="col-6">
                    <h6 style="font-weight: bold ;"><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></h6>
                    <p style="font-size: 10px;">No. Rekam Medis <?php echo $result->id_rekam_medis ?></p>
                    <p style="font-size: 10px;">
                        <?php
                        if ($result->hubungan == 'Anda') {
                        echo "Atas nama sendiri ";
                        } elseif ($result->hubungan == 'Anak') {
                        echo $result->hubungan . " " . "<span id ='hubung_id'></span>";
                        } elseif ($result->hubungan == 'Ibu') {
                        echo $result->hubungan . " " . "<span id ='hubung_id2'></span>";
                        } elseif ($result->hubungan == 'Ayah') {
                        echo $result->hubungan . " " . "<span id ='hubung_id3'></span>";
                        } elseif ($result->hubungan == 'Istri') {
                        echo $result->hubungan . " " . "<span id ='hubung_id4'></span>";
                        } elseif ($result->hubungan == 'Suami') {
                        echo $result->hubungan . " " . "<span id ='hubung_id5'></span>";
                        } elseif ($result->hubungan == 'Saudara') {
                        echo $result->hubungan . " " . "<span id ='hubung_id6'></span>";
                        }
                        ?>
                    </p>
                    <select hidden name="id_user" id="id_user">
                        <option value="0" selected></option>
                    </select>
                    <a href="<?php echo site_url('Pasien/detail_informasi_pasien/' . $result->id_pasien . '/' . $result->id_booking . '/' . $result->id_rekam_medis) ?>" class="btn btn-anim" style="height: 35px; width: 70px; background-color: #19b5fe; color: white; border-radius: 5px"><span> Lihat</span></a>
                  </div>
              </div>
          </div>
          <?php endforeach; ?>
            <!-- 
                <?php foreach ($data as $result) : ?>
                    <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                    <h5><b><?php echo $tgl ?> </b></h5>
                    <div class="col-md-12 d" style="margin: 2px;">
                    <p>Layoutrgfsfew</p>
                    <div class="col-md-6" style="text-align: left;">
                        <h5 style="font-weight: bold; font: size 5;"><?php echo $result->jam_rencana_mulai ?> - <?php echo $result->jam_rencana_selesai ?></h5>
                        <h6>Drg. <?php echo $result->nama_dokter ?></h6>
                        <br>
                        <?php if ($result->status == 0) { ?>
                        <font style="background: #FFFF00; color: #000;" class="label label-warning">Menunggu <br> Pendaftaran</font>
                        <?php } elseif ($result->status == 1) { ?>
                        <h6 class="label label-success">Sudah Terdaftar</h6>
                        <?php } ?>
                    </div>
                    <div class="col-md-6" style="padding-right: 10px;">
                        <h6 style="font-weight: bold ;"><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></h6>
                        <p style="font-size: 10px;">No. Rekam Medis <?php echo $result->id_rekam_medis ?></p>
                        <p style="font-size: 10px;">
                        <?php
                        if ($result->hubungan == 'Anda') {
                            echo "Atas nama sendiri ";
                        } elseif ($result->hubungan == 'Anak') {
                            echo $result->hubungan . " " . "<span id ='hubung_id'></span>";
                        } elseif ($result->hubungan == 'Ibu') {
                            echo $result->hubungan . " " . "<span id ='hubung_id2'></span>";
                        } elseif ($result->hubungan == 'Ayah') {
                            echo $result->hubungan . " " . "<span id ='hubung_id3'></span>";
                        } elseif ($result->hubungan == 'Istri') {
                            echo $result->hubungan . " " . "<span id ='hubung_id4'></span>";
                        } elseif ($result->hubungan == 'Suami') {
                            echo $result->hubungan . " " . "<span id ='hubung_id5'></span>";
                        } elseif ($result->hubungan == 'Saudara') {
                            echo $result->hubungan . " " . "<span id ='hubung_id6'></span>";
                        }
                        ?>
                        </p>
                        <select hidden name="id_user" id="id_user">
                        <option value="0" selected></option>
                        </select>
                        <a href="<?php echo site_url('Pasien/detail_informasi_pasien/' . $result->id_pasien . '/' . $result->id_booking) ?>" class="btn btn-anim" style="height: 35px; width: 70px; background-color: #f40049; color: white; border-radius: 5px"><span> Lihat</span></a>
                    </div>
                    </div>
                <?php endforeach; ?> 
            -->
    
          <script>
            $(document).ready(function() {
              hubungan_pasien();
              $('#id_user').change(function() {
                // let a = $(this).val();
                // console.log(a);
              });
            });
    
            function hubungan_pasien() {
              var id = $('#id_user').val();
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id2').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id3').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id4').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id5').html(data);
                }
              })
              $.ajax({
                url: "<?= base_url('Pasien/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                  id: id
                },
                success: function(data) {
                  // console.log(data);
                  $('#hubung_id6').html(data);
                }
              });
            }
          </script>
        <?php
        } else {
        ?>
          <font style="text-align: center;">
            <h4>Tidak Ada Data</h4>
          </font>
          <?php
        }
    }
  
      public function get_informasi_pasien3($nama2="", $tgl_lahir2="", $rekam_medis2=""){
     
        $nama3 =  $this->uri->segment(3);
        if ($nama3=='0') {
            $nama="0";
        }else{
            $nama =  $this->uri->segment(3);
        }
  
        $tgl_lahir3 = $this->uri->segment(4);
        if ($tgl_lahir3=='0') {
            $tgl_lahir="0";
        }else{
            $tgl_lahir = $this->uri->segment(4);
        }
  
        $rekam_medis3 = $this->uri->segment(5);
        if ($rekam_medis3=='0') {
            $rekam_medis="0";
        }else{
            $rekam_medis = $this->uri->segment(5);
        }
  
        // $id_user = $this->session->userdata('id_user');
        // $dokter = $this->Home_model->get_dokter($id_user);
  
        echo json_encode($this->Pasien_informasi_model->get_informasi_pasien_all3($nama, $tgl_lahir, $rekam_medis)->result());
    }




    
    public function get_informasi_pasien2($nama2="", $tgl_lahir2="", $rekam_medis2=""){
   
        $nama3 =  $this->uri->segment(3);
        if ($nama3=='0') {
            $nama="0";
        }else{
            $nama =  $this->uri->segment(3);
        }
    
        $tgl_lahir3 = $this->uri->segment(4);
        if ($tgl_lahir3=='0') {
            $tgl_lahir="0";
        }else{
            $tgl_lahir = $this->uri->segment(4);
        }
    
        $rekam_medis3 = $this->uri->segment(5);
        if ($rekam_medis3=='0') {
            $rekam_medis="0";
        }else{
            $rekam_medis = $this->uri->segment(5);
        }
    
        $id_user = $this->session->userdata('id_user');
        $dokter = $this->Pasien_informasi_model->get_dokter($id_user);
    
        echo json_encode($this->Pasien_informasi_model->get_informasi_pasien2($nama, $tgl_lahir, $rekam_medis, $dokter->id_dokter)->result());
        // $this->Klinik_model->get_register_janji($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai,$kode_booking)->result();
        // print_r($this->db->last_query());
    }  

    public function get_informasi_pasien(){
        echo json_encode($this->Pasien_informasi_model->get_informasi_pasien_all()->result());
        // $this->Pasien_informasi_model->get_informasi_pasien_all()->result();
        // print_r($this->db->last_query());
    }
    




    
}



