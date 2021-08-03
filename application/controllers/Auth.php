<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dokter_model');
    }
    

    public function index()
    {
        $data['title'] = "Login | Tumbuh Sehat";
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s masih kosong!',
                'valid_email' => '%s format emailnya salah!',
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s masih kosong!'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header_auth', $data);
            $this->load->view('pages/auth/login', $data);
            $this->load->view('components/footer_auth');
        } else {
            $this->proseslogin();
        }
    }

    private function prosesLogin(){
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars(md5($this->input->post('password')));

        $ceklogin = $this->auth_model->login($email, $password);

        if ($ceklogin) {
            foreach ($ceklogin as $row);
            $this->session->set_userdata('id_user', $row->id_user);
            $this->session->set_userdata('nama_depan', $row->nama_depan_u);
            $this->session->set_userdata('nama_belakang', $row->nama_belakang_u);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('password', $row->password);
            $this->session->set_userdata('level', $row->level);
            
            if ($this->session->userdata('level') == "Dokter") {
                $cekDokter = $this->dokter_model->get_dokter_by_id($this->session->userdata('id_user'));
                foreach ($cekDokter as $row);
                $this->session->set_userdata('id_dokter', $row->id_dokter);
                $this->session->set_userdata('nama_dokter', $row->nama_dokter);
                redirect('home/dokter', 'refresh');
            }
            
            redirect('home', 'refresh');
        } else {
            $this->session->set_flashdata('gagal-login', 'Cek kembali email dan password!');
            redirect('');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }

}

/* End of file Login.php */