<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dokter_model');
        $this->load->model('Klinik_model');
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

    private function prosesLogin()
    {
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
                $cekDokter = $this->dokter_model->get_dokter_by_id_user($this->session->userdata('id_user'));
                foreach ($cekDokter as $row);
                $this->session->set_userdata('id_dokter', $row->id_dokter);
                $this->session->set_userdata('nama_dokter', $row->nama_dokter);
                redirect('home/dokter', 'refresh');
            }

            redirect('home', 'refresh');
        } else {
            $this->session->set_flashdata('gagal_login', 'Cek kembali email dan password!');
            redirect('');
        }
    }

    public function Register()
    {

        $data['title'] = "Register | Tumbuh Sehat";
        $this->form_validation->set_rules(
            'nama_depan',
            'Nama Depan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'nama_belakang',
            'Nama Belakang',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
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
            'handphone',
            'Handphone',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header_auth', $data);
            $this->load->view('pages/auth/register', $data);
            $this->load->view('components/footer_auth');
        } else {
            $this->prosesRegister();
        }
    }

    private function prosesRegister()
    {
        $data_login = array(
            'nama_depan_u' => $this->input->post('nama_depan'),
            'nama_belakang_u' => $this->input->post('nama_belakang'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('handphone'),
            'password' => md5($this->input->post('password')),
            'view_password' => $this->input->post('password'),
            'level' => 'Pasien',
        );

        $this->Klinik_model->simpan($data_login);
        $data = $this->Klinik_model->get_id_last();
        $data_pasien = array(
            'id_user' => $data->id_user,
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('handphone'),
        );
        $this->Klinik_model->insert_pasien($data_pasien);
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
        </div>');

        redirect(site_url('home'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }

    public function forgotPassword()
    {
        $data['title'] = "Forget Password| Tumbuh Sehat";
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s masih kosong!',
                'valid_email' => '%s format emailnya salah!',
            )
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header_auth', $data);
            $this->load->view('pages/auth/forgot-password', $data);
            $this->load->view('components/footer_auth');
        } else {
            $this->kirimEmail();
        }
    }
    public function kirimEmail()
    {
        $data = array(
            'email' => $this->input->post('email', TRUE),
        );
        $user = $this->auth_model->where($data);
        if ($user->num_rows() > 0) {
            $token = substr(sha1(rand()), 0, 30);
            $tokens = base64_encode($token);
            $user_token = array(
                'email' => $this->input->post('email'),
                'token' => $tokens,
                'date_created' => time()
            );
            $this->db->insert('tokens', $user_token);
            $this->_sendEmail($tokens);
        } else {
            $this->session->set_flashdata('gagal_reset', 'Email belum terdaftar.');
            redirect(base_url('auth/forgotPassword'));
        }
    }
    private function _sendEmail($token)
    {
        $config = array();
        $config['charset']      = 'utf-8';
        $config['useragent']    = 'Codeigniter';
        $config['protocol']     = "smtp";
        $config['mailtype']     = "html";
        $config['smtp_host']    = "ssl://mail.robertlawoffice.com";
        $config['smtp_port']    = "465";
        $config['smtp_timeout'] = "400";
        $config['smtp_user']    = "owner@robertlawoffice.com";
        $config['smtp_pass']    = "l*KdFl#qnn%m";
        $config['crlf']         = "\r\n";
        $config['newline']      = "\r\n";
        $config['wordwrap']     = TRUE;

        // Memanggil library email dengan set konfigurasi untuk pengiriman email
        $this->email->initialize($config);
        $this->email->from($config['smtp_user']);
        $this->email->to($this->input->post('email'));
        $this->email->subject('Lupa Kata Sandi');
        $this->email->message('Klik link ini untuk mengubah Kata Sandi Anda <a href="' . base_url() . 'auth/reset_pass?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Kata Sandi</a>');

        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
        } else {
            $this->session->set_flashdata('berhasil_reset', 'Email sudah dikirim, silahkan cek email anda.');
            redirect(base_url('auth/forgotPassword'));
        }

        //redirect(base_url(''));

    }

    public function reset_pass()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('login_session', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('tokens', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                echo "<script>alert('Token Salah');history.go(-1);</script>";
                redirect(base_url('Login/index'));
            }
        } else {
            echo "<script>alert('Email belum terdaftar');history.go(-1);</script>";
            redirect(base_url('Login/index'));
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect(base_url(''));
        }

        $data['title'] = "Forget Password| Tumbuh Sehat";
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required|min_length[5]',
            array(
                'required' => '%s masih kosong!',
                'min_length[5]' => '%s minimal 5 karakter'
            )
        );
        $this->form_validation->set_rules(
            'k_password',
            'Konfirmasi Password',
            'trim|required|min_length[5]|matches[password]',
            array(
                'required' => '%s masih kosong!',
                'min_length[5]' => '%s minimal 5 karakter',
                'matches[password]' => '%s tidak sama'
            )
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header_auth', $data);
            $this->load->view('pages/auth/reset-password');
            $this->load->view('components/footer_auth');
        } else {
            $password = md5($this->input->post("password"));
            $view_password = $this->input->post("password");
            $email = $this->session->userdata('reset_email');
            $this->db->set('view_password', $view_password);
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('login_session');
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('berhasil_reset', 'silahkan login kembali.');
            redirect(base_url(''));
        }
    }
}

/* End of file Login.php */