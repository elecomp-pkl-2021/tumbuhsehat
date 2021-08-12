<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model {

    function get_temp($idSvg, $idPemeriksaan)
    {
        $query = $this->db->query("SELECT ket_pemeriksaan, idSvg FROM temp WHERE idSvg = '$idSvg' AND idPemeriksaan = '$idPemeriksaan'");
        return $query->row();
    }

    public function get_temp_by_id_pasien($idSvg, $id_pasien, $tgl_pemeriksaan)
    {
        $query = $this->db->query("SELECT temp.ket_pemeriksaan, temp.idSvg, temp.idPemeriksaan,pemeriksaan_odontogram.id_pasien, pemeriksaan_odontogram.tgl_pemeriksaan from temp join pemeriksaan_odontogram on temp.idPemeriksaan = pemeriksaan_odontogram.id_rekam_medis WHERE pemeriksaan_odontogram.id_pasien = '$id_pasien' and pemeriksaan_odontogram.tgl_pemeriksaan = '$tgl_pemeriksaan' AND temp.idSvg = '$idSvg'");
        return $query->row();
    }

}

/* End of file Pemeriksaan_model.php */
?>
