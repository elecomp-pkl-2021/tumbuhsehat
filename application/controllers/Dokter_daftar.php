<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_daftar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "Superadmin") {
            redirect('','refresh');
        }

        $this->load->model('dokter_model');
        $this->load->model('auth_model');
    }
    

    public function index()
    {
        $data['title'] = "Data Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Data Dokter";
        $data['subJudulHalaman'] = "Daftar dokter yang sudah terdaftar";
        $data['iconHalaman'] = "ik-users";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item active">Data Dokter</li>';

        $data['dokter'] = $this->dokter_model->get_dokter();
        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/dokter/daftar_dokter/index',$data);
        $this->load->view('components/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Tambah Data Dokter";
        $data['subJudulHalaman'] = "Tambah data dokter yang baru";
        $data['iconHalaman'] = "ik-users";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('dokter/daftar-dokter').'">Data Dokter</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>';
        
        $data['last_id_user'] = $this->auth_model->get_latest_id_user();

        $this->form_validation->set_rules(
            'nama_depan_u',
            'Nama depan dokter',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'nama_belakang_u',
            'Nama belakang dokter',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal lahir dokter',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis kelamin dokter',
            'required',
            array(
                'required' => '%s masih belum dipilih!',
            )
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat dokter',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'no_hp',
            'Nomor hp dokter',
            'required|numeric',
            array(
                'required'  => '%s masih kosong!',
                'numeric'   => '%s harus angka!'
            )
        );

        if (empty($_FILES['img_diri']['name'])) {
            $this->form_validation->set_rules(
                'img_diri',
                'Foto Dokter',
                'required',
                array(
                    'required' => '%s masih belum diupload!',
                )
            );
        }

        $this->form_validation->set_rules(
            'spesialis',
            'Spesialis dokter',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'pengalaman',
            'Lama pengalaman dokter',
            'required|numeric',
            array(
                'required'  => '%s masih kosong!',
                'numeric'   => '%s harus angka!'
            )
        );

        $this->form_validation->set_rules(
            'sharingfee_pers',
            'Sharing fee dokter',
            'required|numeric',
            array(
                'required'  => '%s masih kosong!',
                'numeric'   => '%s harus angka!'
            )
        );

        $this->form_validation->set_rules(
            'email',
            'Email dokter',
            'required|valid_email',
            array(
                'required'      => '%s masih kosong!',
                'valid_email'   => 'format %s salah!'
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password dokter',
            'required',
            array(
                'required'  => '%s masih kosong!',
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/dokter/daftar_dokter/tambah', $data);
            $this->load->view('components/footer');
        } else {
            $nama_foto = $this->upload_foto_dokter();
            $insert_dokter = $this->dokter_model->tambah_dokter($nama_foto);
            $insert_akun_dokter = $this->auth_model->tambah_akun_dokter();
            if ($insert_dokter && $insert_akun_dokter) {
                $this->session->set_flashdata('gagal', 'ditambahkan!');
            } else {
                $this->session->set_flashdata('berhasil', 'ditambahkan!');
            }
            redirect('daftar-dokter','refresh');
        }
    }

    private function upload_foto_dokter()
    {
        $config['upload_path']          = './uploads/foto_dokter';
        $config['allowed_types']        = 'jpeg|jpg|png|gif|svg';
        $config['max_size']             = '2048';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('img_diri')) {
            return $this->upload->data('file_name');
        }
    }

    public function edit($id_dokter, $id_user)
    {
        $data['title'] = "Edit Data Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Edit Data Dokter";
        $data['subJudulHalaman'] = "Edit data dokter dengan data baru";
        $data['iconHalaman'] = "ik-users";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('dokter/daftar-dokter').'">Data Dokter</a></li>
            <li class="breadcrumb-item active">Edit Data</li>';
        
        $data['dokter'] = $this->dokter_model->get_dokter_by_id_dokter($id_dokter);
        $data['user'] = $this->auth_model->get_user_by_id($id_user);

        $this->form_validation->set_rules(
            'nama_depan_u',
            'Nama depan dokter',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'nama_belakang_u',
            'Nama belakang dokter',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal lahir dokter',
            'required',
                array(
                    'required' => '%s masih kosong loh!',
                )
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat dokter',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'no_hp',
            'Nomor hp dokter',
            'required|numeric',
            array(
                'required'  => '%s masih kosong!',
                'numeric'   => '%s harus angka!'
            )
        );

        $this->form_validation->set_rules(
            'spesialis',
            'Spesialis dokter',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'pengalaman',
            'Lama pengalaman dokter',
            'required|numeric',
            array(
                'required'  => '%s masih kosong!',
                'numeric'   => '%s harus angka!'
            )
        );

        $this->form_validation->set_rules(
            'sharingfee_pers',
            'Sharing fee dokter',
            'required|numeric',
            array(
                'required'  => '%s masih kosong!',
                'numeric'   => '%s harus angka!'
            )
        );

        $this->form_validation->set_rules(
            'email',
            'Email dokter',
            'required|valid_email',
            array(
                'required'      => '%s masih kosong!',
                'valid_email'   => 'format %s salah!'
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password dokter',
            'required',
            array(
                'required'  => '%s masih kosong!',
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('components/sidebar_superadmin');
            $this->load->view('components/breadcrumbs', $data); 
            $this->load->view('pages/superadmin/dokter/daftar_dokter/edit',$data);
            $this->load->view('components/footer');
        } else {
            $nama_foto = $this->edit_foto_dokter();
            $update_dokter = $this->dokter_model->edit_dokter($nama_foto);
            $update_akun_dokter = $this->auth_model->edit_akun_dokter();
            if ($update_dokter && $update_akun_dokter) {
                $this->session->set_flashdata('gagal', 'diedit!');
            } else {
                $this->session->set_flashdata('berhasil', 'diedit!');
            }
            redirect('daftar-dokter','refresh');
        }
    }

    private function edit_foto_dokter()
    {
        $id = $this->input->post('id_dokter');
        if (empty($_FILES['img_diri']['name'])) {
            $foto = $this->input->post('img_diri_last');
        } else {
            $this->hapus_foto_dokter($id);
            $foto = $this->upload_foto_dokter();
        }
        return $foto;
    }

    public function detail($id_dokter, $id_user)
    {
        $data['title'] = "Detail Data Dokter | Tumbuh Sehat";
        $data['judulHalaman'] = "Detail Data Dokter";
        $data['subJudulHalaman'] = "Tampilan data dokter secara detail";
        $data['iconHalaman'] = "ik-users";
        $data['breadcrumbs'] = '
            <li class="breadcrumb-item"><a href="'.base_url('home').'"><i class="ik ik-home"></i></a></li>
            <li class="breadcrumb-item"><a href="'.base_url('dokter/daftar-dokter').'">Data Dokter</a></li>
            <li class="breadcrumb-item active">Detail Data</li>';

        $data['dokter'] = $this->dokter_model->get_dokter_by_id_dokter($id_dokter);
        $data['user']   = $this->auth_model->get_user_by_id($id_user);
        $data['cabang'] = $this->dokter_model->get_cabang_dokter_by_id_dokter($id_dokter);
        $data['jadwal'] = $this->dokter_model->get_jadwal_dokter_by_id_dokter($id_dokter);

        $this->load->view('components/header', $data);
        $this->load->view('components/sidebar_superadmin');
        $this->load->view('components/breadcrumbs', $data); 
        $this->load->view('pages/superadmin/dokter/daftar_dokter/detail', $data);
        $this->load->view('components/footer');
    }

    public function hapus($id_dokter, $id_user)
    {
        $this->hapus_foto_dokter($id_dokter);
        $delete_dokter = $this->dokter_model->hapus_dokter($id_dokter);
        $delete_akun_dokter = $this->auth_model->hapus_akun_dokter($id_user);
        if ($delete_dokter && $delete_akun_dokter) {
            $this->session->set_flashdata('gagal', 'dihapus!');
        } else {
            $this->session->set_flashdata('berhasil', 'dihapus!');
        }
        redirect('daftar-dokter');
    }

    private function hapus_foto_dokter($id)
    {
        $this->db->where('id_dokter', $id);
        $query = $this->db->get('dokter');
        $row = $query->row();
        unlink("./uploads/foto_dokter/$row->foto");
    }

}

/* End of file Dokter_daftar.php */

?>
