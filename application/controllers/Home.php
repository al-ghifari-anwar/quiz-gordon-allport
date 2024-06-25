<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level_user') == null) {
            redirect('login');
        }
        if ($this->session->userdata('level_user') == 'User') {
            redirect('soal');
        }
    }

    public function index()
    {
        $data['menu'] = 'dashboard';
        $data['submenu'] = '';
        $data['title'] = 'Dashboard';
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Home/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }
}
