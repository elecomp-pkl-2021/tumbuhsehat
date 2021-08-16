<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_informasi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_informasi_model');
        $this->load->model('Pemeriksaan_model');
        
        
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

    public function create_load()
    {
        $tgl_awal = $_GET['tgl_awal'];
        $id_pasien = $_GET['id_pasien3'];
        $rawat = $this->Pasien_informasi_model->get_one_rawat_by_id($id_pasien, $tgl_awal);
        if ($rawat!=null) {
            $data_rawat = json_decode(json_encode($rawat[0]), true);
            $rawat = array_merge($data_rawat, array("detail_rawat" => array()));
            $data['rawat'] = $rawat;
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_odontogram', $data);
        }else{
            $this->load->view('pages/pasien/detail_pasien_tab/pemeriksaan_404');
        }
        
    }

    public function get_summary_rekam_medis($id_pasien=null, $dokter=null,$tgl=null){
        echo json_encode($this->Pasien_informasi_model->get_summary_rekam_medis($id_pasien,$dokter, $tgl)->result());
    }

    public function getTemp($idSvg, $id_pasien, $tgl_pemeriksaan)
    {
        $data = $this->Pemeriksaan_model->get_temp_by_id_pasien($idSvg, $id_pasien, $tgl_pemeriksaan);
        echo json_encode($data);
    }

    public function ajax_check_id()
    {
        $data = $this->Pasien_informasi_model->get_check_id();
        echo json_encode($data);
    }

}

/* End of file Pasien_informasi.php */

?>
