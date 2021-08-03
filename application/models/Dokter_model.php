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

    public function getJadwal($id, $hari){
        return $this->db->get_where('jadwal_dokter', ['id_dokter' => $id, 'hari' =>$hari])->row_array();
    }

    public function updateKuotaPemeriksaan($id,$hari,$kuota){
        $this->db->update('jadwal_dokter',['kuota' => $kuota], ['id_dokter' => $id, 'hari' => $hari]);
    }

    public function getDaftarPasien($id_dokter){
        $konf = '1';
		$this->db->select('a.id_booking ,d.nama_depan, d.nama_belakang, b.jam_rencana_mulai, b.jam_rencana_selesai, DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tanggal_rencana, DATE_FORMAT(d.tanggal_lahir, "%d-%m-%Y") as tanggal_lahir, c.id_rekam_medis, a.status, d.id_pasien, e.nama_dokter');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('rekam_medis c', 'a.id_booking=c.id_booking');
		$this->db->join('pasien d', 'a.id_pasien=d.id_pasien');
		$this->db->join('dokter e', ' a.id_dokter=e.id_dokter');
		$this->db->where('a.konfirmasi', $konf);
		$this->db->where('a.id_dokter', $id_dokter);
		$this->db->order_by('d.id_pasien', 'DESC');
		return $this->db->get()->result_array();
    }

    function get_dokter_id($id_user){
		$this->db->select('a.id_dokter');
		$this->db->from('dokter a');
		$this->db->join('login_session b', 'a.id_user=b.id_user');
		$this->db->where('a.id_user', $id_user);
		return $this->db->get()->row()->id_dokter;
	}
}