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

    public function register(){
        $data = [
            "nama_depan_u" => $this->input->post('nama_depan_u', true),
            "nama_belakang_u" => $this->input->post('nama_belakang_u', true),
            "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
            "no_hp" => $this->input->post('no_hp', true),
            "password" => $this->input->post('password', true)
        ];
        $this->db->insert('login_session', $data);
    }
}

/* End of file Login_model.php */