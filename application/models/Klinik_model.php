<?php
class Klinik_model extends CI_Model
{
    function tampil($nama = null, $tgl_lahir = null, $no_hp = null, $email = null)
    {
        $level = 'Pasien';
        if ($nama != "") {
            $this->db->like('nama_depan_u', $nama);
        }

        if ($tgl_lahir != "") {
            $this->db->like('tanggal_lahir', $tgl_lahir);
        }

        if ($no_hp != "") {
            $this->db->like('no_hp', $no_hp);
        }

        if ($email != "") {
            $this->db->like('email', $email);
        }

        $this->db->select('DATE_FORMAT(tanggal_lahir, "%d-%m-%Y") as tanggal');
        $this->db->select('nama_depan_u');
        $this->db->select('nama_belakang_u');
        $this->db->select('no_hp');
        $this->db->select('email');
        $this->db->select('id_user');
        $this->db->where('level', $level);
        return $this->db->get('login_session')->result();
    }

    public function get_janji_datang_profil_klinik()
    {
        $stt = '0';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('a.status', $stt);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }

    public function get_janji_datang_profil_klinik_2($id)
    {
        $stt = '0';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('a.id_dokter', $id);
        $this->db->where('a.status', $stt);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }

    public function get_janji_datang_profil_klinik_3($tgl, $id)
    {
        $stt = '0';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->where('a.id_dokter', $id);
        $this->db->where('a.status', $stt);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }

    public function get_janji_datang_klinik()
    {
        $stt = '0';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('a.status', $stt);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }

    public function get_janji_datang_klinik_2($tgl)
    {
        $stt = '0';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->where('a.status', $stt);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }

    public function get_janji_datang_klinik_3($tgl, $id)
    {
        $stt = '0';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->where('a.id_dokter', $id);
        $this->db->where('a.status', $stt);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana_mulai', 'asc');
        $this->db->order_by('b.jam_rencana_selesai', 'asc');
        return $this->db->get();
    }
    public function get_konfirmasi_janji($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai)
    {
        $konf = '0';

        //

        if ($nama != '0') {
            $this->db->like('c.nama_depan', $nama);
        }

        if ($tgl_lahir != '0') {
            $this->db->like('c.tanggal_lahir', $tgl_lahir);
        }

        if ($rekam_medis != '0') {
            $this->db->like('a.id_booking', $rekam_medis);
        }

        if ($id_dokter != '0') {
            $this->db->like('d.nama_dokter', $id_dokter);
        }

        if ($tanggal_rencana != '0') {
            $this->db->like('b.tanggal_rencana', $tanggal_rencana);
        }

        if ($jam_rencana_mulai != '0') {
            $this->db->like('b.jam_rencana_mulai', $jam_rencana_mulai);
        }

        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', 'a.id_dokter=f.id_dokter');
        // $this->db->where('curdate() <= b.tanggal_rencana');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->group_by('a.id_booking');
        return $this->db->get();
    }
    public function add_rekam_medis($data)
    {

        $query = $this->db->insert("rekam_medis", $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function update_booking($id, $data)
    {
        $this->db->where("id_booking", $id);
        $this->db->update("booking", $data);
    }

    function update_stat_book($id, $data)
    {
        $this->db->where("id_booking", $id);
        $this->db->update("booking", $data);
    }
    public function ajax_get_terima($id_pasien)
    {
        $konf = '0';
        $this->db->select('c.nama_depan, 
						  c.nama_belakang,
						  d.nama_dokter,
						  e.nama_cabang,
						  DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tgl,
						  b.jam_rencana_mulai,
						  b.jam_rencana_selesai,
						  b.id_booking,
						  a.id_pasien,
						  a.id_dokter');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', 'a.id_dokter=f.id_dokter');
        // $this->db->where('curdate() <= b.tanggal_rencana');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->group_by('a.id_booking');
        $query = $this->db->get();
        return $query->row();
    }
    function update_rencana($id, $data)
    {
        $this->db->where("id_rcn", $id);
        $this->db->update("rencana", $data);
    }
    function get_data_pembayaran()
    {
        $status = '2';
        $status_b = '2';
        $this->db->select('c.nama_depan, c.nama_belakang, DATE_FORMAT(c.tanggal_lahir, "%d-%m-%Y") as tanggal_lahir, e.id_rekam_medis, d.nama_dokter, DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tanggal_rencana,b.jam_rencana_mulai, b.jam_rencana_selesai, a.id_booking');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
        $this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
        $this->db->where('e.status', $status);
        $this->db->where('a.status', $status_b);
        return $this->db->get();
    }
    public function get_data_pembayaran2($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai, $kode_booking)
    {
        $status = '2';
        $status_b = '2';
        //    echo 
        if ($nama != '0') {
            $this->db->like('CONCAT(c.nama_depan, " ", c.nama_belakang)', $nama);
        }

        if ($tgl_lahir != '0') {
            $this->db->like('c.tanggal_lahir', $tgl_lahir);
        }

        if ($rekam_medis != '0') {
            $this->db->like('e.id_rekam_medis', $rekam_medis);
        }

        if ($id_dokter != '0') {
            $this->db->like('d.nama_dokter', $id_dokter);
        }

        if ($tanggal_rencana != '0') {
            $this->db->like('b.tanggal_rencana', $tanggal_rencana);
        }

        if ($jam_rencana_mulai != '0') {
            $this->db->like('b.jam_rencana_mulai', $jam_rencana_mulai);
        }
        $this->db->select('c.nama_depan, c.nama_belakang, DATE_FORMAT(c.tanggal_lahir, "%d-%m-%Y") as tanggal_lahir, e.id_rekam_medis, d.nama_dokter, DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tanggal_rencana,b.jam_rencana_mulai, b.jam_rencana_selesai, a.id_booking');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
        $this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
        $this->db->where('e.status', $status);
        $this->db->where('a.status', $status_b);

        if ($kode_booking != '0') {
            $this->db->where('a.id_booking', $kode_booking);
        }


        return $this->db->get();
    }

    public function get_register_janji($nama, $tgl_lahir, $rekam_medis, $id_dokter, $tanggal_rencana, $jam_rencana_mulai, $kode_booking)
    {
        $status = '0';
        $konf = '1';
        //    echo 
        if ($nama != '0') {
            $this->db->like("CONCAT_WS(' ',c.nama_depan,c.nama_belakang)", str_replace(' ', ' ', $nama), 'both');
        }

        if ($tgl_lahir != '0') {
            $this->db->like('c.tanggal_lahir', $tgl_lahir);
        }

        if ($rekam_medis != '0') {
            $this->db->like('e.id_rekam_medis', $rekam_medis);
        }

        if ($id_dokter != '0') {
            $this->db->like('d.nama_dokter', $id_dokter);
        }

        if ($tanggal_rencana != '0') {
            $this->db->like('b.tanggal_rencana', $tanggal_rencana);
        }

        if ($jam_rencana_mulai != '0') {
            $this->db->like('b.jam_rencana_mulai', $jam_rencana_mulai);
        }
        $this->db->select(',c.nama_depan, c.nama_belakang, DATE_FORMAT(c.tanggal_lahir, "%d-%m-%Y") as tanggal_lahir, e.id_rekam_medis, d.nama_dokter, DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tanggal_rencana, b.jam_rencana_mulai, b.jam_rencana_selesai,a.id_pasien');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
        $this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
        $this->db->where('e.status', $status);
        $this->db->where('a.status', $status);
        $this->db->where('a.konfirmasi', $konf);

        if ($kode_booking != '0') {
            $this->db->where('a.id_booking', $kode_booking);
        }


        return $this->db->get();
    }

    function get_register_janji2()
    {
        $status = '0';
        $konf = '1';
        $this->db->select('c.nama_depan, c.nama_belakang, DATE_FORMAT(c.tanggal_lahir, "%d-%m-%Y") as tanggal_lahir, e.id_rekam_medis, d.nama_dokter, DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tanggal_rencana, b.jam_rencana_mulai, b.jam_rencana_selesai,a.id_pasien, b.id_booking');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
        $this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
        $this->db->where('e.status', $status);
        $this->db->where('a.status', $status);
        $this->db->where('a.konfirmasi', $konf);

        return $this->db->get();
    }

    function get_register_ubah_terlambat()
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
        $this->db->group_by('a.id_booking');
        return $this->db->get();
    }

    public function ajax_get_daftar($id_booking)
    {
        $status = '0';
        $konf = '1';
        $this->db->select('c.nama_depan,
						   c.nama_belakang, 
						   DATE_FORMAT(c.tanggal_lahir, "%d-%m-%Y") as tanggal_lahir, 
						   e.id_rekam_medis, 
						   d.nama_dokter, 
						   g.nama_cabang,
						   DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tanggal_rencana, 
						   b.jam_rencana_mulai, 
						   b.jam_rencana_selesai,
						   a.id_pasien,
						   a.id_booking,
						   a.id_dokter');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
        $this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
        $this->db->where('e.status', $status);
        $this->db->where('a.status', $status);
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.id_booking', $id_booking);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_r($id)
    {
        $this->db->where('id_booking', $id);
        return $this->db->delete('rekam_medis');
    }

    public function add_antrian($data)
    {
        $query = $this->db->insert("antrian", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
