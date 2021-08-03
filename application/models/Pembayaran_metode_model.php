<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_metode_model extends CI_Model {

    // metode pembayaran
    public function get_metode_pembayaran()
    {
        $query = $this->db->get('metode_pembayaran');
        return $query->result();
    }

    public function get_metode_pembayaran_by_id($id)
    {
        return $this->db->get_where('metode_pembayaran', ['id_metode' => $id])->row_array();
    }

    public function tambah_metode_pembayaran()
    {
        $data = [
            "nama_metode" => $this->input->post('nama_metode', true),
        ];
        $this->db->insert('metode_pembayaran', $data);
    }

    public function edit_metode_pembayaran()
    {
        $data = [
            "nama_metode" => $this->input->post('nama_metode', true),
        ];
        $this->db->where('id_metode', $this->input->post('id_metode'));
        $this->db->update('metode_pembayaran', $data);
    }

    public function hapus_metode_pembayaran($id)
    {
        $this->db->where('id_metode', $id);
        $this->db->delete('metode_pembayaran');
    }
    // end of metode pembayaran

}

/* End of file Pembayaran.php */


?>
