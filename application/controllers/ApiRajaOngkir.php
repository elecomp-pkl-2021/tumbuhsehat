<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiRajaOngkir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('', 'refresh');
        }
        $this->load->model('Api_model');
    }

    public function get_api_kota(){
        echo $this->Api_model->showCity();
    }

    public function get_api_provinsi(){
		echo $this->Api_model->showProvince();
	}

	public function get_api_kodepos($kota){
            $idkota = $this->input->get('id');
			$city = $this->Api_model->showKodePos($idkota);
			echo $city;
  }

	public function get_api_kota_byProvinsi($province){
			$kode_pos = $this->Api_model->showCity2($province);
			echo $kode_pos;

	}
}