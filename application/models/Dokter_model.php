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

    public function get_dokter_by_id_user($id)
    {
        return $this->db->get_where('dokter', ['id_user' => $id])->result();
    }

    public function get_dokter_by_id_dokter($id)
    {
        return $this->db->get_where('dokter', ['id_dokter' => $id])->row_array();
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

    public function tambah_dokter($nama_foto)
    {
        $nama_dokter = 'drg. '.$this->input->post('nama_depan_u', true)." ". $this->input->post('nama_belakang_u', true);
        $data = [
            "id_user"         => $this->input->post('id_user', true),
            "nama_dokter"     => $nama_dokter,
            "spesialis"       => $this->input->post('spesialis', true),
            "pengalaman"      => $this->input->post('pengalaman', true),
            "foto"            => $nama_foto,
            "sharingfee_pers" => $this->input->post('sharingfee_pers', true),

        ];
        $this->db->insert('dokter', $data);
    }

    public function edit_dokter($nama_foto)
    {
        $nama_dokter = 'drg. '.$this->input->post('nama_depan_u', true)." ". $this->input->post('nama_belakang_u', true);
        $data = [
            "id_user"         => $this->input->post('id_user', true),
            "nama_dokter"     => $nama_dokter,
            "spesialis"       => $this->input->post('spesialis', true),
            "pengalaman"      => $this->input->post('pengalaman', true),
            "foto"            => $nama_foto,
            "sharingfee_pers" => $this->input->post('sharingfee_pers', true),

        ];

        $this->db->where('id_dokter', $this->input->post('id_dokter'));
        $this->db->update('dokter', $data);
    }

    public function hapus_dokter($id_dokter)
    {
        $this->db->where('id_dokter', $id_dokter);
        $this->db->delete('dokter');
    }

    public function get_cabang_dokter()
    {
        $this->db->select('cabang_dokter.id_cbdokter as id_cbdokter, dokter.nama_dokter as nama_dokter, cabang.nama_cabang as nama_cabang');
        $this->db->from('cabang_dokter');
        $this->db->join('dokter', 'cabang_dokter.id_dokter = dokter.id_dokter');
        $this->db->join('cabang', 'cabang_dokter.id_cabang = cabang.id_cabang');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_cabang_dokter_by_id($id_cbdokter)
    {
        return $this->db->get_where('cabang_dokter', ['id_cbdokter' => $id_cbdokter])->row_array();
    }

    public function get_cabang_dokter_by_id_dokter($id_dokter)
    {
        $this->db->select('cabang_dokter.id_cbdokter as id_cbdokter, dokter.nama_dokter as nama_dokter, cabang.nama_cabang as nama_cabang, cabang.alamat as alamat');
        $this->db->from('cabang_dokter');
        $this->db->join('dokter', 'cabang_dokter.id_dokter = dokter.id_dokter');
        $this->db->join('cabang', 'cabang_dokter.id_cabang = cabang.id_cabang');
        $this->db->where('cabang_dokter.id_dokter', $id_dokter);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah_cabang_dokter()
    {
        $data = [
            "id_cabang"     => $this->input->post('id_cabang', true),
            "id_dokter"     => $this->input->post('id_dokter', true),
        ];
        $this->db->insert('cabang_dokter', $data);
    }

    public function edit_cabang_dokter()
    {
        $data = [
            "id_cabang"     => $this->input->post('id_cabang', true),
            "id_dokter"     => $this->input->post('id_dokter', true),
        ];

        $this->db->where('id_cbdokter', $this->input->post('id_cbdokter'));
        $this->db->update('cabang_dokter', $data);
    }

    public function hapus_cabang_dokter($id_cbdokter)
    {
        $this->db->where('id_cbdokter', $id_cbdokter);
        $this->db->delete('cabang_dokter');
    }

    public function get_jadwal_dokter()
    {
        $this->db->select('jadwal_dokter.*, dokter.nama_dokter as nama_dokter');
        $this->db->from('jadwal_dokter');
        $this->db->join('dokter', 'jadwal_dokter.id_dokter = dokter.id_dokter');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_jadwal_dokter_by_id($id_jadwal)
    {
        return $this->db->get_where('jadwal_dokter', ['id_jadwal' => $id_jadwal])->row_array();
    }

    public function get_jadwal_dokter_by_id_dokter($id_dokter)
    {
        return $this->db->get_where('jadwal_dokter', ['id_dokter' => $id_dokter])->result();
    }

    public function tambah_jadwal_dokter()
    {
        $data = [
            "hari"          => $this->input->post('hari', true),
            "jam_mulai"     => $this->input->post('jam_mulai', true),
            "jam_tutup"     => $this->input->post('jam_tutup', true),
            "id_dokter"     => $this->input->post('id_dokter', true),
            "kuota"         => $this->input->post('kuota', true),
            "ket"           => $this->input->post('ket', true),
        ];
        $this->db->insert('jadwal_dokter', $data);
    }

    public function edit_jadwal_dokter()
    {
        $data = [
            "hari"          => $this->input->post('hari', true),
            "jam_mulai"     => $this->input->post('jam_mulai', true),
            "jam_tutup"     => $this->input->post('jam_tutup', true),
            "id_dokter"     => $this->input->post('id_dokter', true),
            "kuota"         => $this->input->post('kuota', true),
            "ket"           => $this->input->post('ket', true),
        ];

        $this->db->where('id_jadwal', $this->input->post('id_jadwal'));
        $this->db->update('jadwal_dokter', $data);
    }

    public function hapus_jadwal_dokter($id_jadwal)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->delete('jadwal_dokter');
    }

    public function getJadwal($id, $hari)
    {
        return $this->db->get_where('jadwal_dokter', ['id_dokter' => $id, 'hari' => $hari])->row_array();
    }

    public function updateKuotaPemeriksaan($id, $hari, $kuota)
    {
        $this->db->update('jadwal_dokter', ['kuota' => $kuota], ['id_dokter' => $id, 'hari' => $hari]);
    }

    public function searchPasien($id_dokter, $kode_booking, $filter_jam, $filter_nama, $filter_tgl_lahir, $filter_status)
    {
        $konf = '1';
        $this->db->select('a.id_booking ,d.nama_depan, d.nama_belakang, b.jam_rencana_mulai, b.jam_rencana_selesai, DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tanggal_rencana, DATE_FORMAT(d.tanggal_lahir, "%d-%m-%Y") as tanggal_lahir, c.id_rekam_medis, a.status, d.id_pasien, e.nama_dokter');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('rekam_medis c', 'a.id_booking=c.id_booking');
        $this->db->join('pasien d', 'a.id_pasien=d.id_pasien');
        $this->db->join('dokter e', ' a.id_dokter=e.id_dokter');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.id_dokter', $id_dokter);
        $this->db->like('a.id_booking', $kode_booking);
        // $this->db->like('a.id_booking', $kode_booking);
        $this->db->order_by('d.id_pasien', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getDaftarPasien($id_dokter)
    {
        $this->db->select('a.id_booking ,d.nama_depan, d.nama_belakang, b.jam_rencana_mulai, b.jam_rencana_selesai, DATE_FORMAT(b.tanggal_rencana, "%d-%m-%Y") as tanggal_rencana, DATE_FORMAT(d.tanggal_lahir, "%d-%m-%Y") as tanggal_lahir, c.id_rekam_medis, a.status, d.id_pasien, e.nama_dokter');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('rekam_medis c', 'a.id_booking=c.id_booking');
        $this->db->join('pasien d', 'a.id_pasien=d.id_pasien');
        $this->db->join('dokter e', ' a.id_dokter=e.id_dokter');
        $this->db->where('a.status !=', 2);
        $this->db->where('a.konfirmasi', 1);
        $this->db->or_where('a.konfirmasi', 0);
        $this->db->where('a.id_dokter', $id_dokter);
        $this->db->order_by('d.id_pasien', 'DESC');
        return $this->db->get()->result_array();
    }

    function get_dokter_id($id_user)
    {
        $this->db->select('a.id_dokter');
        $this->db->from('dokter a');
        $this->db->join('login_session b', 'a.id_user=b.id_user');
        $this->db->where('a.id_user', $id_user);
        return $this->db->get()->row()->id_dokter;
    }
}
