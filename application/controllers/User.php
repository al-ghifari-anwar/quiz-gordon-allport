<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser');
        $this->output->set_content_type('application/json');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->MUser->create();

            $this->output->set_output(json_encode($result));
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $query = $this->MUser->get();

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
            $query = $this->MUser->getById($id);

            $result = [
                'code' => 200,
                'status' => 'ok',
                'results' => $query
            ];

            $this->output->set_output(json_encode($result));
        }
    }
}
