<?php
class Cabang_model extends CI_Model
{
    function get_cabang()
    {
        return $this->db->get('cabang')->result();
    }

    function get_cabang2()
    {
        return $this->db->get('cabang');
    }

    public function get_cabang_by_id($id)
    {
        return $this->db->get_where('cabang', ['id_cabang' => $id])->row_array();
    }

    public function tambah_cabang()
    {
        $data = [
            "nama_cabang"   => $this->input->post('nama_cabang', true),
            "alamat"     => $this->input->post('alamat', true),
        ];
        $this->db->insert('cabang', $data);
    }

    public function edit_cabang()
    {
        $data = [
            "nama_cabang"   => $this->input->post('nama_cabang', true),
            "alamat"     => $this->input->post('alamat', true),
        ];
        $this->db->where('id_cabang', $this->input->post('id_cabang'));
        $this->db->update('cabang', $data);
    }

    public function hapus_cabang($id)
    {
        $this->db->where('id_cabang', $id);
        $this->db->delete('cabang');
    }
}
