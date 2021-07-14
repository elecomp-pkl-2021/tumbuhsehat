<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {

    public function getAllDokter()
    {
        $query = $this->db->get('dokter');
        return $query->result_array();
    }

    public function getDokterById($id)
    {
        return $this->db->get_where('dokter', ['id_user' => $id])->result();
    }

}

/* End of file Dokter_model.php */


?>
