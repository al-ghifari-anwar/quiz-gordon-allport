<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partisipan extends CI_Controller
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
        $data['menu'] = 'partisipan';
        $data['submenu'] = '';
        $data['title'] = 'Partisipan';
        $this->db->select('name_user, tb_user.created_at, SUM(point_jawaban) as point_jawaban');
        $this->db->join('tb_jawaban', 'tb_jawaban.id_user = tb_user.id_user');
        $this->db->group_by('tb_jawaban.id_user');
        $this->db->order_by('SUM(point_jawaban)');
        $data['partisipans'] = $this->db->get('tb_user')->result_array();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Partisipan/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }
}
