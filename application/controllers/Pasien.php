<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_model');
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
        echo "Garap gengg add pasien, iki keluarga id ne wes metu = " . $id_user;
    }
}