<?php
class Pasien_model extends CI_Model
{

    public $table = 'pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function get_pasien($id_user)
    {
        return $this->db->get_where('pasien', array('id_user' => $id_user))->result();
    }
}
