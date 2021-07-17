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

    function get_pasien_byIdKeluarga($id)
    {
        return $this->db->get_where('pasien', ['id_user' => $id])->result_array();
    }

    function get_nama_pasien($id)
    {
        $nama = $this->db->get_where('pasien', ['id_pasien' => $id])->row_array();
        return $nama['nama_depan'] . ' ' . $nama['nama_belakang'];
    }

    function get_pasien_byId($id)
    {
        return $this->db->get_where('pasien', ['id_pasien' => $id])->row_array();
    }

    public function get_by_id_janji_akan_datang_2($id_booking)
    {
        $stt = '0';
        $stt1 = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('a.status', $stt);
        $this->db->or_where('a.status', $stt1);
        $this->db->where('a.id_booking', $id_booking);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }

    public function get_by_id_janji_akan_datang($id_booking)
    {
        $stt0 = '0';
        $stt1 = '1';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->group_start();
        //$this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.status', $stt0);
        $this->db->or_where('a.status', $stt1);
        $this->db->group_end();
        //$this->db->where('b.tanggal_rencana = CURDATE()');
        $this->db->where('a.id_booking', $id_booking);
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }
}
