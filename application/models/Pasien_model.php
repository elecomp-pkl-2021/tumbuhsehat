<?php
class Pasien_model extends CI_Model
{

    public $table = 'pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function get_data_keluarga($id_user)
    {
        return $this->db->get_where('pasien', array('id_user' => $id_user))->result();
    }

    function get_pasien_byIdKeluarga($id){
        return $this->db->get_where('pasien', ['id_user' => $id])->result_array();
    }

    function get_nama_pasien($id){
        $nama = $this->db->get_where('pasien', ['id_pasien' => $id])->row_array();
        return $nama['nama_depan'].' '.$nama['nama_belakang'];
    }
}