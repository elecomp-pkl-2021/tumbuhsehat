<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('components/header_auth');
        $this->load->view('pages/auth/login');
        $this->load->view('components/footer_auth');
        
    }

    public function forgotPassword()
    {
        $this->load->view('components/header_auth');
        $this->load->view('pages/auth/forgot-password');
        $this->load->view('components/footer_auth');
        
    }
    public function kirimEmail(){

        $data = array(
    
          'email' => $this->input->post('email', TRUE),
    
        );
    
        $user = $this->Admin->where($data);
    
        if($user->num_rows() > 0){
    
          $token = substr(sha1(rand()), 0, 30);
    
          $tokens = base64_encode($token);
    
                  // var_dump($tokens);
    
                  // die;
    
          $user_token = array(
    
            'email' => $this->input->post('email'),
    
            'token' => $tokens,
    
            'date_created' => time()
    
          );
    
    
    
          $this->db->insert('tokens', $user_token);
    
    
    
          $this->_sendEmail($tokens);
    
        }else{
    
          echo "<script>alert('Email belum terdaftar');history.go(-1);</script>";
    
        }
    
        
    
        
    
    
    
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    
        // if($this->form_validation->run() == false){
    
        //   $data = array(
    
        //     'title' => 'Lupa Password'
    
        //   );
    
        //   $this->load->view('lupa_pass_email', $data);
    
        // } else{
    
        //   $email = $this->input->post('email');
    
        //   $user = $this->db->get_where('login_session', ['email' => $email])->row_array();
    
        //   if($user){
    
        //     $token = substr(sha1(rand()), 0, 30);
    
        //     $tokens = base64_encode($token);
    
        //           // var_dump($tokens);
    
        //           // die;
    
        //     $user_token = array(
    
        //       'email' => $this->input->post('email'),
    
        //       'token' => $tokens,
    
        //       'date_created' => time()
    
        //     );
    
    
    
        //     $this->db->insert('tokens', $user_token);
    
    
    
        //     $this->_sendEmail($tokens);
    
        //   } else{
    
        //         // $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert> Email belum terdaftar.
    
        //         // </div>');
    
        //     echo "<script>alert('Email belum terdaftar');history.go(-1);</script>";
    
        //   }
    
        // }
    
      }

}

/* End of file Login.php */
