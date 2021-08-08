<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('login_session');
        $this->db->where('email', $email); 
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1)
        {
            return $query->result();
        } else {
            return false;
        }
    }
    function where($where){     
        //$this->db->join('tab_akses_menu','tab_akses_menu.id_posisi=karyawan.id_posisi');
    return $this->db->get_where('login_session',$where);
}
}

/* End of file Login_model.php */