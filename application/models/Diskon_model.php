<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Diskon_model extends CI_Model {

    public function get_diskon()
    {
        $query = $this->db->get('diskon');
        return $query->result();
    }

    public function get_diskon_by_id($id)
    {
        return $this->db->get_where('diskon', ['id_diskon' => $id])->row_array();
    }

    public function tambah_diskon()
    {
        $data = [
            "nama_diskon"       => $this->input->post('nama_diskon', true),
            "status_diskon"     => $this->input->post('status_diskon', true),
            "nilai_diskon"      => $this->input->post('nilai_diskon', true),
        ];
        $this->db->insert('diskon', $data);
    }

    public function edit_diskon()
    {
        $data = [
            "nama_diskon"       => $this->input->post('nama_diskon', true),
            "status_diskon"     => $this->input->post('status_diskon', true),
            "nilai_diskon"      => $this->input->post('nilai_diskon', true),
        ];
        $this->db->where('id_diskon', $this->input->post('id_diskon'));
        $this->db->update('diskon', $data);
    }

    public function hapus_diskon($id)
    {
        $this->db->where('id_diskon', $id);
        $this->db->delete('diskon');
    }

}

/* End of file Diskon_model.php */

?>