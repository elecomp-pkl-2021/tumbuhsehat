<?php
class Cabang_model extends CI_Model
{
    function get_cabang()
    {
        return $this->db->get('cabang')->result();
    }
}