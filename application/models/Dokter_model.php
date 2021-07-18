<?php
class Dokter_model extends CI_Model
{
    public function get_dokter()
    {
        $query = $this->db->get('dokter');
        return $query->result();
    }

    public function get_dokter2()
    {
        return $this->db->get('dokter');
    }

    public function get_dokter_by_id($id)
    {
        return $this->db->get_where('dokter', ['id_user' => $id])->result();
    }

    public function get_nama_dokter($id)
    {
        $nama = $this->db->get_where('dokter', ['id_dokter' => $id])->row_array();
        return $nama['nama_dokter'];
    }

    function get_dokter_id3($id, $day)
    {
        $this->db->select('*');
        $this->db->from('jadwal_dokter a');
        $this->db->join('booking b', 'a.id_dokter=b.id_dokter');
        $this->db->where('b.id_booking', $id);
        $this->db->where('a.hari', $day);
        $query = $this->db->get();
        return $query;
    }

    public function get_jam_praktek_tersedia($id, $day)
    {
        return $this->db->query('SELECT `jam_mulai`, `jam_tutup`,`ket` 
                                FROM `jadwal_dokter` 
                                WHERE `id_dokter` =' . $id . ' 
                                    AND `hari` = "' . $day . '" 
                                    AND `kuota` > 0 ')->result_array();
    }
}