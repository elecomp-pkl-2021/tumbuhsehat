<?php
class Jadwaldokter_model extends CI_Model
{
    public $table = 'pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function kuota_booking($id_dokter, $day)
    {
        $sql = $this->db->query("
        SELECT
        kuota
        FROM jadwal_dokter
        WHERE id_dokter = $id_dokter 
        AND hari = '$day' ");

        if ($sql->row() == NULL) {
            return 0;
        } else {
            return $sql->row()->kuota;
        }
    }

    public function get_jadwal($id)
    {
        $this->db->from('jadwal_dokter');
        $this->db->where('id_jadwal', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
