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
}