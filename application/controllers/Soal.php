<?php

class Soal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MSoal');
        $this->load->model('MPilihan');
        $this->load->model('MUser');
        $this->load->model('MJawaban');
    }

    public function index()
    {
        if ($this->session->userdata('count_soal') == null) {
            $this->session->set_userdata(['count_soal' => 1]);
        } else {
            $this->session->set_userdata(['count_soal' => $this->session->userdata('count_soal') + 1]);
        }
        $data['title'] = 'Quiz';
        $data['soal'] = $this->MSoal->getRandomSoal();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Soal/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function save()
    {
        $post = $this->input->post();

        $getPilihan = $this->MPilihan->getById($post['id_pilihan']);

        $data = [
            'id_user' => $post['id_user'],
            'id_soal' => $post['id_soal'],
            'id_pilihan' => $post['id_pilihan'],
            'point_jawaban' => $getPilihan['is_correct'] == 1 ? 25 : 0,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $query = $this->db->insert('tb_jawaban', $data);

        if ($query) {
            if ($this->session->userdata('count_soal') == 4) {
                redirect('soal/score');
            } else {
                redirect('soal');
            }
        } else {
            echo "Error";
        }
    }

    public function score()
    {
        $data['title'] = 'Selesai';
        $data['jawaban'] = $this->MJawaban->getScoreByIdUser($this->session->userdata('id_user'));
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Soal/Score');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function finish()
    {
        $this->session->sess_destroy();

        redirect('');
    }
}
