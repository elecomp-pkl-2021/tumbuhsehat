<?php
class Pasien_model extends CI_Model
{

    public $table = 'pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function get_data_keluarga($id_user)
    {
        return $this->db->get_where('pasien', array('id_user' => $id_user))->result();
    }

    function get_pasien_byIdKeluarga($id)
    {
        return $this->db->get_where('pasien', ['id_user' => $id])->result_array();
    }

    function get_nama_pasien($id)
    {
        $nama = $this->db->get_where('pasien', ['id_pasien' => $id])->row_array();
        return $nama['nama_depan'] . ' ' . $nama['nama_belakang'];
    }

    function get_pasien_byId($id)
    {
        return $this->db->get_where('pasien', ['id_pasien' => $id])->row_array();
    }

    public function get_by_id_janji_akan_datang_2($id_booking)
    {
        $stt = '0';
        $stt1 = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('a.status', $stt);
        $this->db->or_where('a.status', $stt1);
        $this->db->where('a.id_booking', $id_booking);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }

    public function get_by_id_janji_akan_datang($id_booking)
    {
        $stt0 = '0';
        $stt1 = '1';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->group_start();
        //$this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.status', $stt0);
        $this->db->or_where('a.status', $stt1);
        $this->db->group_end();
        //$this->db->where('b.tanggal_rencana = CURDATE()');
        $this->db->where('a.id_booking', $id_booking);
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }

    function get_by_id_ubah_terlambat($id)
    {
        $status = '0';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
        $this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
        $this->db->where('curdate() > b.tanggal_rencana');
        $this->db->where('e.status', $status);
        $this->db->where('a.status', $status);
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.id_booking', $id);
        $this->db->group_by('a.id_booking');
        $query = $this->db->get();
        return $query->row();
    }

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

    public function get_by_id_ubah($id)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
        $this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
        $this->db->where('a.id_booking', $id);
        $query = $this->db->get();
        return $query->row();
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

    function get_one_rawat_by_id_medis($id, $tgl_awal, $id_rekam_medis)
    {
        $qry = "
				SELECT t.* FROM pemeriksaan_odontogram t  WHERE t.id_pasien = '$id' AND t.tgl_pemeriksaan = '$tgl_awal' AND t.id_rekam_medis='$id_rekam_medis';
				";

        $data = $this->db->query($qry);

        if ($data->num_rows() > 0) return $data->result();
        else return false;
    }

    public function get_check_id()
    {
        $this->db->select('id_rekam_medis, id_pasien, tgl_pemeriksaan');
        $this->db->from('pemeriksaan_odontogram');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_svg($data)
    {
        $this->db->insert('temp', $data);
        return $this->db->insert_id();
    }

    public function get_by_id_svg($id, $idpemeriksaan, $session_id)
    {
        $this->db->from('temp');
        $this->db->where('idSvg', $id);
        $this->db->where('idPemeriksaan', $idpemeriksaan);
        $this->db->where('session_id', $session_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert_pemeriksaan_odontogram($data)
    {

        $query = $this->db->insert("pemeriksaan_odontogram", $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function get_temp($idSvg, $idPemeriksaan)
    {
        $query = $this->db->query("SELECT ket_pemeriksaan, idSvg FROM temp WHERE idSvg = '$idSvg' AND idPemeriksaan = '$idPemeriksaan'");
        return $query->row();
    }
}
