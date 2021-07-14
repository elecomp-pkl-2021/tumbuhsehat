<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Klinik extends CI_Controller
{

    public function add_booking()
    {
        $id_pasien = $this->input->post("id_pasien");
        $id_cabang = $this->input->post("id_cabang");
        $id_dokter = $this->input->post("id_dokter");
        if ($id_pasien == "" || $id_cabang == "" || $id_dokter == "") {
            echo "<script>alert('Pastikan data terisi semua!');history.go(-1);</script>";
        } else {
            echo "Garap den data dah masuk" . $id_pasien . $id_cabang . $id_dokter;
        }
    }
}
