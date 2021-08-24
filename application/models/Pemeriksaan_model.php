<?php

class Pemeriksaan_model extends CI_Model
{
    public function getLastPemeriksaanPenunjang($id_pasien){
        return $this->db->limit(1)
                        ->order_by('id_pemeriksaan_penunjang', 'DESC')
                        ->get_where('pemeriksaan_penunjang', ['id_pasien'=> $id_pasien])->row_array();
    }
    
    public function getLastPemeriksaanUmum($id_pasien){
        return $this->db->limit(1)
                        ->order_by('id_pemeriksaan_umum', 'DESC')
                        ->get_where('pemeriksaan_klinis_umum', ['id_pasien'=> $id_pasien])->row_array();
    }
    
    public function getLastPemeriksaanKhusus($id_pasien){
        return $this->db->limit(1)
                        ->order_by('id_pemeriksaan_khusus', 'DESC')
                        ->get_where('pemeriksaan_klinis_khusus', ['id_pasien'=> $id_pasien])->row_array();
    }

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

    public function getTanggalPemeriksaanUmum($id_pasien){
        return $this->db->select('date')
                        ->get_where('pemeriksaan_klinis_umum', ['id_pasien'=> $id_pasien,'date !=' => null])
                        ->result_array();
    }
    
    public function getTanggalPemeriksaanKhusus($id_pasien){
        return $this->db->select('date')
                        ->get_where('pemeriksaan_klinis_khusus', ['id_pasien'=> $id_pasien,'date !=' => null])
                        ->result_array();
    }
    
    public function getTanggalPemeriksaanPenunjang($id_pasien){
        return $this->db->select('date')
                        ->get_where('pemeriksaan_penunjang', ['id_pasien'=> $id_pasien,'date !=' => null])
                        ->result_array();
    }

    public function getPemeriksaanUmumByDate($id_pasien, $date){
        return $this->db->limit(1)
                        ->order_by('id_pemeriksaan_umum', 'DESC')
                        ->get_where('pemeriksaan_klinis_umum', ['id_pasien'=> $id_pasien,'date' => $date])->row_array();
    }
    
    public function getPemeriksaanPenunjangByDate($id_pasien, $date){
        return $this->db->limit(1)
                        ->order_by('id_pemeriksaan_penunjang', 'DESC')
                        ->get_where('pemeriksaan_penunjang', ['id_pasien'=> $id_pasien,'date' => $date])->row_array();
    }
    
    public function getPemeriksaanKhususByDate($id_pasien, $date){
        return $this->db->limit(1)
                        ->order_by('id_pemeriksaan_khusus', 'DESC')
                        ->get_where('pemeriksaan_klinis_khusus', ['id_pasien'=> $id_pasien,'date' => $date])->row_array();
    }

}

/* End of file Pemeriksaan_model.php */
?>
