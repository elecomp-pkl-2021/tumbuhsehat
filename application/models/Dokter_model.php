<?php
class Dokter_model extends CI_Model
{
    public function get_dokter()
    {
        $query = $this->db->get('dokter');
        return $query->result();
    }

    public function get_dokter_by_id($id)
    {
        return $this->db->get_where('dokter', ['id_user' => $id])->result();
    }
}
