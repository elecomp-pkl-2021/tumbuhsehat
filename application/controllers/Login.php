<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('components/header_auth');
        $this->load->view('pages/auth/login');
        $this->load->view('components/footer_auth');
        
    }

}

/* End of file Login.php */
