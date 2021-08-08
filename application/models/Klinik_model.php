<?php
class Klinik_model extends CI_Model
{
    function get_pasien()
    {
        $query = $this->db->get('pasien');
        return $query;
    }
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
    function insert_pasien($data)
    {
        $query = $this->db->insert("pasien", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    function insert_login($data)
    {
        $query = $this->db->insert("login_session", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    function get_iduser($nama_d, $tgl, $nama_b)
    {
        $this->db->where('nama_depan_u', $nama_d);
        $this->db->where('tanggal_lahir', $tgl);
        $this->db->where('nama_belakang_u', $nama_b);
        return $this->db->get('login_session')->row();
    }
    public function cekkode($where)
    {
        $subquery = $this->db->select('kode_verifikasi')
            ->from('temp_verifikasi')
            ->where('kode_verifikasi is not null', NULL, FALSE)
            ->get_compiled_select();

        return $this->db->where('kode_verifikasi in (' . $subquery . ')', NULL, FALSE)
            ->where('kode_verifikasi', $where)
            ->get('temp_verifikasi');
    }
    function insert_verifikasi($data)
    {
        $query = $this->db->insert("temp_verifikasi", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    function changeActiveState($key)
    {
        $this->load->database();
        $data = array(
            'active' => 1
        );

        $this->db->where('md5(id_user)', $key);
        $this->db->update('mytable', $data);

        return true;
    }
}
