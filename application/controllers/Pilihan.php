<?php

class Pilihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPilihan');
        $this->output->set_content_type('application/json');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->MPilihan->create();

            $this->output->set_output(json_encode($result));
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $query = $this->MPilihan->get();

            $result = [
                'code' => 200,
                'status' => 'ok',
                'results' => $query
            ];

            $this->output->set_output(json_encode($result));
        }
    }

    public function by_soal($id_soal)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $query = $this->MPilihan->getByIdSoal($id_soal);

            $result = [
                'code' => 200,
                'status' => 'ok',
                'results' => $query
            ];

            $this->output->set_output(json_encode($result));
        }
    }

    public function single($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $query = $this->MPilihan->getById($id);

            $result = [
                'code' => 200,
                'status' => 'ok',
                'results' => $query
            ];

            $this->output->set_output(json_encode($result));
        }
    }
}
