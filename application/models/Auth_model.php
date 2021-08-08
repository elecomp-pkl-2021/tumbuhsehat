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
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function where($where)
    {
        //$this->db->join('tab_akses_menu','tab_akses_menu.id_posisi=karyawan.id_posisi');
        return $this->db->get_where('login_session', $where);
    }


    public function get_latest_id_user()
    {
        $this->db->select('id_user');
        $this->db->from('login_session');
        $this->db->order_by('id_user', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_where('login_session', ['id_user' => $id])->row_array();
    }

    public function tambah_akun_dokter()
    {
        $data = [
            "id_user"           => $this->input->post('id_user', true),
            "nama_depan_u"      => $this->input->post('nama_depan_u', true),
            "nama_belakang_u"   => $this->input->post('nama_belakang_u', true),
            "tanggal_lahir"     => $this->input->post('tanggal_lahir', true),
            "jenis_kelamin"     => $this->input->post('jenis_kelamin', true),
            "alamat"            => $this->input->post('alamat', true),
            "no_hp"             => $this->input->post('no_hp', true),
            "email"             => $this->input->post('email', true),
            "password"          => md5($this->input->post('password', true)),
            "view_password"     => $this->input->post('password', true),
            "level"             => $this->input->post('level', true),
        ];
        $this->db->insert('login_session', $data);
    }

    public function edit_akun_dokter()
    {
        $data = [
            "nama_depan_u"      => $this->input->post('nama_depan_u', true),
            "nama_belakang_u"   => $this->input->post('nama_belakang_u', true),
            "tanggal_lahir"     => $this->input->post('tanggal_lahir', true),
            "jenis_kelamin"     => $this->input->post('jenis_kelamin', true),
            "alamat"            => $this->input->post('alamat', true),
            "no_hp"             => $this->input->post('no_hp', true),
            "email"             => $this->input->post('email', true),
            "password"          => md5($this->input->post('password', true)),
            "view_password"     => $this->input->post('password', true),
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('login_session', $data);
    }

    public function hapus_akun_dokter($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('login_session');
    }
}

/* End of file Login_model.php */