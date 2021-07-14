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
}
