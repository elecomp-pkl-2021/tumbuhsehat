<?php

defined('BASEPATH') or exit('No direct script access allowed');

class register extends CI_Controller
{

    public function index()
    {
        $this->load->view('components/header_auth');
        $this->load->view('pages/auth/register');
        $this->load->view('components/footer_auth');
    }

    public function registrasi()

    {

        $data = array(



            'nama_depan_u' => $this->input->post("nama_depan"),

            'nama_belakang_u' => $this->input->post("nama_belakang"),

            'tanggal_lahir' => $this->input->post("tanggal_lahir"),

            'jenis_kelamin' => $this->input->post("jenis_kelamin"),

            'alamat' => $this->input->post("alamat"),

            'email' => $this->input->post("email"),

            'no_hp' => $this->input->post("no_hp"),

            'password' => md5($this->input->post("password")),

            'view_password' => $this->input->post("password"),

            'level' => $this->input->post("level"),



        );



        $this->Admin->simpan($data);



        $id_user = $this->Admin->get_id_last();



        $data_pasien = array(

            //'id_pasien' => $this->input->post('id_pasien'),

            'id_user' => $id_user->id_user,

            'nama_depan' => $this->input->post('nama_depan'),

            'nama_belakang' => $this->input->post('nama_belakang'),

            'hubungan' => $this->input->post('hubungan'),

            'tanggal_lahir' => $this->input->post('tanggal_lahir'),

            'jenis_kelamin' => $this->input->post('jenis_kelamin'),

            'alamat' => $this->input->post("alamat"),

            'email' => $this->input->post('email'),

            'no_hp' => $this->input->post('no_hp'),

        );

        $this->Data_pasien_model->insert_pasien($data_pasien);

        echo "<script>alert('Anda telah melakukan registrasi. Silahkan Login');history.go(-1);</script>";

        redirect(base_url('Login/index'));
    }
}

/* End of file Login.php */
