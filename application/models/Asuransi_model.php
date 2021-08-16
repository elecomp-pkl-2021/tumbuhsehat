<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Asuransi_model extends CI_Model {

    /* CRUD Kategori Asuransi */
    function get_kategori_asuransi()
    {
        return $this->db->get('asuransi_kategori')->result();
    }

    public function get_kategori_asuransi_by_id($id)
    {
        return $this->db->get_where('asuransi_kategori', ['id_kategori' => $id])->row_array();
    }

    public function tambah_kategori_asuransi()
    {
        $data = [
            "nama_kategori"   => $this->input->post('nama_kategori', true),
        ];
        $this->db->insert('asuransi_kategori', $data);
    }

    public function edit_kategori_asuransi()
    {
        $data = [
            "nama_kategori"   => $this->input->post('nama_kategori', true),
        ];
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('asuransi_kategori', $data);
    }

    public function hapus_kategori_asuransi($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('asuransi_kategori');
    }
    /* END of CRUD Kategori Asuransi */

    
    /* CRUD Provider Asuransi */
    function get_provider_asuransi()
    {
        return $this->db->get('asuransi_provider')->result();
    }

    public function get_provider_asuransi_by_id($id)
    {
        return $this->db->get_where('asuransi_provider', ['id_provider' => $id])->row_array();
    }

    public function tambah_provider_asuransi()
    {
        $data = [
            "nama_provider"   => $this->input->post('nama_provider', true),
        ];
        $this->db->insert('asuransi_provider', $data);
    }

    public function edit_provider_asuransi()
    {
        $data = [
            "nama_provider"   => $this->input->post('nama_provider', true),
        ];
        $this->db->where('id_provider', $this->input->post('id_provider'));
        $this->db->update('asuransi_provider', $data);
    }

    public function hapus_provider_asuransi($id)
    {
        $this->db->where('id_provider', $id);
        $this->db->delete('asuransi_provider');
    }
    /* END of CRUD Kategori Asuransi */

}

/* End of file Asuransi_model.php */

?>