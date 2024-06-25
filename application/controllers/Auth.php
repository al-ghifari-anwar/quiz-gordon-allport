<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser');
    }

    public function index()
    {
        $this->load->view('Auth/Index');
    }

    public function start()
    {
        $post = $this->input->post();

        $data = [
            'name_user' => $post['name_user'],
            'asal_user' => $post['asal_user'],
            'level_user' => 'User',
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $query = $this->db->insert('tb_user', $data);

        if ($query) {
            $getUser = $this->MUser->getById($this->db->insert_id());
            $dataSes = [
                'id_user' => $getUser['id_user'],
                'name_user' => $getUser['name_user'],
                'asal_user' => $getUser['asal_user'],
                'level_user' => $getUser['level_user'],
                'updated_at' => date("Y-m-d H:i:s")
            ];
            $this->session->set_userdata($dataSes);
            redirect('');
        } else {
            echo "gagal";
        }
    }

    public function admin()
    {
        $this->load->view('Auth/Admin');
    }

    public function admin_start()
    {
        $post = $this->input->post();

        $username_admin = $post['username_admin'];

        $query = $this->db->get_where('tb_admin', ['username_admin' => $username_admin])->row_array();

        if ($query) {
            if (md5($post['password_admin']) == $query['password_admin']) {
                $dataSes = [
                    'id_user' => $query['id_admin'],
                    'username_admin' => $query['username_admin'],
                    'password_admin' => $query['password_admin'],
                    'level_user' => 'Admin',
                    'updated_at' => date("Y-m-d H:i:s")
                ];
                $this->session->set_userdata($dataSes);
                redirect('Home');
            } else {
                redirect('login/admin');
            }
        } else {
            echo "gagal";
        }
    }
}
