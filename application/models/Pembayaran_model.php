<?php

class Pembayaran_model extends CI_Model
{
    public function getPembayaran(){
        return $this->db->get('metode_pembayaran')->result_array();
    }
}