<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_jadwal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level')!="Superadmin") {
            redirect('','refresh');
        }
        $this->load->model('dokter_model');
    }
    
    public function index()
    {
        $data['title'] = "Data Jadwal Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Jadwal Dokter";
        $data['subJudulHalaman'] = "Daftar jadwal dokter yang sudah terdaftar";
        $data['iconHalaman'] = "ik-calendar";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Jadwal Dokter</li>';

        $data['jadwal'] = $this->dokter_model->get_jadwal_dokter();

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/dokter/jadwal_dokter/index',$data);
        $this->load->view('components/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Jadwal Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Jadwal Dokter";
        $data['subJudulHalaman'] = "Tambah data jadwal dokter baru";
        $data['iconHalaman'] = "ik-calendar";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('jadwal-dokter').'">Data Jadwal Dokter</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';
        
        $data['ket'] = ['Pagi/Siang','Sore','Malam'];
        $data['dokter'] = $this->dokter_model->get_dokter();

        $data['list_hari'] = array( 
            array(  'day'  =>   'Mon',
                    'hari'  =>  'Senin'),
            array(  'day'  =>   'Tue',
                    'hari'  =>  'Selasa'),
            array(  'day'  =>   'Wed',
                    'hari'  =>  'Rabu'),
            array(  'day'  =>   'Thur',
                    'hari'  =>  'Kamis'),
            array(  'day'  =>   'Fri',
                    'hari'  =>  'Jumat'),
            array(  'day'  =>   'Sat',
                    'hari'  =>  'Sabtu'),
            array(  'day'  =>   'Sun',
                    'hari'  =>  'Minggu'),    
        );
        
        
        $this->form_validation->set_rules(
            'hari',
            'Hari',
            'required',
                array(
                    'required' => '%s masih belum dipilih!',
                )
        );

        $this->form_validation->set_rules(
            'jam_mulai',
            'Jam mulai',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );

        $this->form_validation->set_rules(
            'jam_tutup',
            'Jam tutup',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );

        $this->form_validation->set_rules(
            'id_dokter',
            'Dokter',
            'required',
            array(
                'required' => '%s masih belum dipilih!',
            )
        );

        $this->form_validation->set_rules(
            'kuota',
            'Kuota Pasien',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );

        $this->form_validation->set_rules(
            'ket',
            'Keterangan waktu',
            'required',
            array(
                'required' => '%s masih belum dipilih!',
            )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/dokter/jadwal_dokter/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->dokter_model->tambah_jadwal_dokter();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('jadwal-dokter');
        }

    }

    public function edit($id)
    {
        $data['title'] = "Edit Jadwal Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Jadwal Dokter";
        $data['subJudulHalaman'] = "Edit data jadwal dokter dengan data baru";
        $data['iconHalaman'] = "ik-calendar";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('jadwal-dokter').'">Data Jadwal Dokter</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';
        
        $data['ket'] = ['Pagi/Siang','Sore','Malam'];
        $data['dokter'] = $this->dokter_model->get_dokter();
        $data['jadwal'] = $this->dokter_model->get_jadwal_dokter_by_id($id);
        
        $data['list_hari'] = array( 
            array(  'day'  =>   'Mon',
                    'hari'  =>  'Senin'),
            array(  'day'  =>   'Tue',
                    'hari'  =>  'Selasa'),
            array(  'day'  =>   'Wed',
                    'hari'  =>  'Rabu'),
            array(  'day'  =>   'Thur',
                    'hari'  =>  'Kamis'),
            array(  'day'  =>   'Fri',
                    'hari'  =>  'Jumat'),
            array(  'day'  =>   'Sat',
                    'hari'  =>  'Sabtu'),
            array(  'day'  =>   'Sun',
                    'hari'  =>  'Minggu'),    
        );
        
        
        
        $this->form_validation->set_rules(
            'jam_mulai',
            'Jam mulai',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );

        $this->form_validation->set_rules(
            'jam_tutup',
            'Jam tutup',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );

        $this->form_validation->set_rules(
            'kuota',
            'Kuota Pasien',
            'required|numeric',
            array(
                'required' => '%s masih kosong loh!',
                'numeric' => 'Hei, %s harus diisi angka!'
            )
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/dokter/jadwal_dokter/edit', $data);
            $this->load->view('components/footer');
        } else {
            $insert = $this->dokter_model->edit_jadwal_dokter();
            if ($insert) {
                $this->session->set_flashdata('gagal', 'diedit!');
            } else {
                $this->session->set_flashdata('berhasil', 'diedit!');
            }
            redirect('jadwal-dokter');
        }

    }

    public function hapus($id)
    {
        $delete = $this->dokter_model->hapus_jadwal_dokter($id);
        if ($delete) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('jadwal-dokter');
    }

}

/* End of file Dokter_jadwal.php */

?>
