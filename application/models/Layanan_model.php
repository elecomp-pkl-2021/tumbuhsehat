<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

    public function get_layanan()
    {
        $query = $this->db->get('layanan');
        return $query->result();
    }

    public function get_layanan_by_id($id)
    {
        return $this->db->get_where('layanan', ['id_layanan' => $id])->row_array();
    }

    public function tambah_layanan()
    {
        $data = [
            "layanan"   => $this->input->post('layanan', true),
            "harga"     => $this->input->post('harga', true),
            "status"    => $this->input->post('status', true),
        ];
        $this->db->insert('layanan', $data);
    }

    public function edit_layanan()
    {
        $data = [
            "layanan"   => $this->input->post('layanan', true),
            "harga"     => $this->input->post('harga', true),
            "status"    => $this->input->post('status', true),
        ];
        $this->db->where('id_layanan', $this->input->post('id_layanan'));
        $this->db->update('layanan', $data);
    }

    public function hapus_layanan($id)
    {
        $this->db->where('id_layanan', $id);
        $this->db->delete('layanan');
    }

    public function getLayananAktif(){
        return $this->db->get_where('layanan',['status' => '1'])->result_array();
    }

    public function getDiskonAktif(){
        return $this->db->get_where('diskon', ['status_diskon' => '1'])->result_array();
    }

}

/* End of file Layanan_model.php */

?>