<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diskon_model extends CI_Model
{
    public $table = 'diskon';


    function __construct()
    {
        parent::__construct();
    }

    // get all

    function diskon_active()
    {
        $this->db->where('status_diskon', '1');
        return $this->db->get($this->table);
    }

    function diskon_pil_active($id_rekam_medis)
    {
        $this->db->select('*');
        $this->db->from('diskon a');
        $this->db->join('pilih_layanan b', 'a.id_diskon=b.id_diskon');
        $this->db->join('rekam_medis c', 'b.id_rekam_medis=c.id_rekam_medis');
        $this->db->where('a.status_diskon', '1');
        $this->db->where('c.id_rekam_medis', $id_rekam_medis);
        return $this->db->get('');
    }
    
    public function getDiskonByRekamMedis($id_rekam_medis)
    {
        $query = $this->db->query("SELECT * FROM diskon d JOIN pilih_layanan p ON d.id_diskon = p.id_diskon WHERE p.id_rekam_medis = '$id_rekam_medis'");
        return $query->result_array();
    }

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
