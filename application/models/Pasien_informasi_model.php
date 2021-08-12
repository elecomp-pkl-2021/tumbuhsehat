<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_informasi_model extends CI_Model {

    public function get_informasi($id_pasien, $id_booking)
	{
		$this->db->select('c.no_hp,c.email,c.nama_depan,c.nama_belakang,c.jenis_kelamin,c.tanggal_lahir,c.hubungan,a.status,e.id_rekam_medis,b.tanggal_rencana,b.jam_rencana_mulai, b.jam_rencana_selesai,d.nama_dokter')
            ->from('booking a')
            ->join('rencana b','a.id_booking=b.id_booking')
            ->join('pasien c','a.id_pasien=c.id_pasien')
            ->join('dokter d',' a.id_dokter=d.id_dokter')
            ->join('rekam_medis e','a.id_booking=e.id_booking')
            ->where('a.konfirmasi', 1)
            ->where('a.id_pasien' , $id_pasien)
            ->where('a.id_booking' , $id_booking)
            ->order_by('b.tanggal_rencana', 'DESC');
        $query = $this->db->get();
        return $query->row_array();
	}

    public function get_informasi_umum($id_pasien, $id_booking)
	{
		$this->db->select('*')
            ->from('booking a')
            ->join('pasien b','a.id_pasien=b.id_pasien')
            ->join('info_orang_terdekat c','a.id_pasien=c.id_pasien')
            ->where('a.id_pasien' , $id_pasien)
            ->where('c.id_booking' , $id_booking)
            ->where('a.id_booking' , $id_booking);
        $query = $this->db->get();
        return $query->row_array();
	}

    public function get_klinis($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_klinis_umum e','a.id_booking=e.id_booking');
        $this->db->join('pemeriksaan_klinis_khusus f','a.id_booking=f.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('f.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        $this->db->order_by('d.tanggal_periksa', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pemeriksaan_klinis($id_pasien, $tgl)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d', 'a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_klinis_umum e', 'a.id_booking=e.id_booking');
        $this->db->join('pemeriksaan_klinis_khusus f', 'a.id_booking=f.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('f.id_pasien', $id_pasien);
        
        if ($tgl != 0) {
        $this->db->where('d.tanggal_periksa', $tgl);
        }

        $this->db->order_by('d.tanggal_periksa desc');
        $this->db->where('a.konfirmasi', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_penunjang($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_penunjang e','a.id_booking=e.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        $this->db->order_by('d.tanggal_periksa', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pemeriksaan_penunjang($id_pasien, $tgl)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d', 'a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_penunjang e', 'a.id_booking=e.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);

        if ($tgl != 0) {
            $this->db->where('d.tanggal_periksa', $tgl);
        }

        $this->db->where('a.konfirmasi', 1);
        $this->db->order_by('d.tanggal_periksa', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_summary($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_penunjang e','a.id_booking=e.id_booking');
        $this->db->join('pemeriksaan_klinis_umum f','a.id_booking=f.id_booking');
        $this->db->join('pemeriksaan_klinis_khusus g','a.id_booking=g.id_booking');
        $this->db->join('dokter h','a.id_dokter=h.id_dokter');
        $this->db->join('pilih_layanan i','d.id_rekam_medis=i.id_rekam_medis');
        $this->db->join('layanan j','i.id_layanan=j.id_layanan');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('f.id_pasien', $id_pasien);
        $this->db->where('g.id_pasien', $id_pasien);
        $this->db->where('i.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        return $this->db->get();
    }

    public function get_odontogram($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        $this->db->order_by('d.tanggal_periksa', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    public function get_summary_rekam_medis($id_pasien=null, $dokter=null, $tgl=null){
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_penunjang e','a.id_booking=e.id_booking');
        $this->db->join('pemeriksaan_klinis_umum f','a.id_booking=f.id_booking');
        $this->db->join('pemeriksaan_klinis_khusus g','a.id_booking=g.id_booking');
        $this->db->join('dokter h','a.id_dokter=h.id_dokter');
        $this->db->join('pilih_layanan i','d.id_rekam_medis=i.id_rekam_medis');
        $this->db->join('layanan j','i.id_layanan=j.id_layanan');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('f.id_pasien', $id_pasien);
        $this->db->where('g.id_pasien', $id_pasien);
        $this->db->where('i.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);

        if($dokter !=""){
            $this->db->where('a.id_dokter', $dokter);
        }

        if($tgl !=""){
            $this->db->where('d.tanggal_periksa', $tgl);
        }
        return $this->db->get();
    }

    public function get_pembayaran($id_pasien, $id_booking){
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana d','a.id_booking=d.id_booking');
        $this->db->join('metode_pembayaran e','e.id_metode = d.id_metode');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('a.id_booking', $id_booking);
        $this->db->where('a.konfirmasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_one_rawat_by_id($id, $tgl_awal){
		$qry = "
				SELECT t.* FROM pemeriksaan_odontogram t  WHERE t.id_pasien = '$id' AND t.tgl_pemeriksaan = '$tgl_awal';
				";

		$data = $this->db->query($qry);
		
		if($data->num_rows() > 0) return $data->result();
		else return false;
	}

    function get_medis_pasien($id_rekam_medis, $id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('pasien b', 'a.id_pasien=b.id_pasien');
        $this->db->join('rekam_medis c', 'a.id_booking=c.id_booking', 'a.id_booking=c.id_booking');
        $this->db->join('rencana d', 'a.id_booking=d.id_booking');
        $this->db->where('c.id_rekam_medis', $id_rekam_medis);
        $this->db->where('a.id_pasien', $id_pasien);
        return $this->db->get();
        // return $this->db->get_where('pasien', array('id_pasien' => $id));
    }

    public function get_check_id() {
		$this->db->select('id_rekam_medis, id_pasien, tgl_pemeriksaan');
		$this->db->from('pemeriksaan_odontogram');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Pasien_informasi_model.php */
?>
