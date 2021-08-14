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
}

/* End of file Login.php */
