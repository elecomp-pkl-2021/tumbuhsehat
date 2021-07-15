<?php

class Rencana_model extends CI_Model
{

    function get_rencana_sebelum()
    {
        $konf = '1';
        $this->db->select('a.tanggal_rencana');
        $this->db->distinct('a.tanggal_rencana');
        $this->db->from('rencana a');
        $this->db->join('booking b', 'a.id_booking=b.id_booking');
        $this->db->where('b.konfirmasi', $konf);
        $this->db->where_not_in('b.status', 3);
        $this->db->where_not_in('b.status', 2);
        $this->db->group_by('a.id_booking');
        $this->db->order_by('a.tanggal_rencana', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function jmlh_booking($id_dokter, $tgl_rencana, $jam_mulai, $jam_selesai)
    {
        $sql = $this->db->query("
        SELECT IFNULL(COUNT(b.id_booking),0) AS jml_booking
        FROM rencana r
        JOIN booking b ON r.id_booking = b.id_booking
        WHERE b.id_dokter = $id_dokter 
        AND r.tanggal_rencana = '$tgl_rencana' AND r.jam_rencana_mulai = '$jam_mulai' AND r.jam_rencana_selesai = '$jam_selesai'
        GROUP BY r.jam_rencana_mulai, r.jam_rencana_selesai");

        if ($sql->row() == NULL) {
            return 0;
        } else {
            return $sql->row()->jml_booking;
        }
    }
}
