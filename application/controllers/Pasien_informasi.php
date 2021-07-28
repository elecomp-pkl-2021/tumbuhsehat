<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_informasi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_informasi_model');
        
    }
    
    public function filter_pemeriksaan_klinis_umum()
    {
        $tgl = $_POST['tgl'];
        $id_pasien = $_POST['id'];
        $data['info_klinis_umum'] = $this->Pasien_informasi_model->get_pemeriksaan_klinis($id_pasien, $tgl);
        if (!empty($data['info_klinis_umum'])) { 
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_klinis_umum', $data);
        } else {
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_404');
        }
    }

    public function filter_pemeriksaan_klinis_khusus()
    {
        $tgl = $_POST['tgl'];
        $id_pasien = $_POST['id'];
        $data['info_klinis_khusus'] = $this->Pasien_informasi_model->get_pemeriksaan_klinis($id_pasien, $tgl);
        if (!empty($data['info_klinis_khusus'])) { 
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_klinis_khusus', $data);
        } else {
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_404');
        }
    }

    public function filter_pemeriksaan_penunjang_radiologi()
    {
        $tgl = $_POST['tgl'];
        $id_pasien = $_POST['id'];
        $data['info_radiologi'] = $this->Pasien_informasi_model->get_pemeriksaan_penunjang($id_pasien, $tgl);
        if (!empty($data['info_radiologi'])) { 
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_penunjang_radiologi', $data);
        } else {
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_404');
        }
    }

    public function download_foto_radiologi($foto)
    {
        force_download('uploads/foto_radiologi/'.$foto, NULL);
    }

    public function filter_pemeriksaan_penunjang_laboratorium()
    {
        $tgl = $_POST['tgl'];
        $id_pasien = $_POST['id'];
        $data['info_lab'] = $this->Pasien_informasi_model->get_pemeriksaan_penunjang($id_pasien, $tgl);
        if (!empty($data['info_lab'])) { 
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_penunjang_laboratorium', $data);
        } else {
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_404');
        }
    }

    public function download_foto_laboratorium($foto)
    {
        force_download('uploads/foto_laboratorium/'.$foto, NULL);
    }

    public function get_summary_rekam_medis($id_pasien=null, $dokter=null,$tgl=null){
        echo json_encode($this->Pasien_informasi_model->get_summary_rekam_medis($id_pasien,$dokter, $tgl)->result());
    }

}

/* End of file Pasien_informasi.php */

?>
