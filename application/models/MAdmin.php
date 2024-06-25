<?php

class MAdmin extends CI_Model
{
    public $username_admin;
    public $password_admin;
    public $updated_at;

    public function get()
    {
        $query = $this->db->get('tb_admin')->result_array();

        return $query;
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_admin', ['id_admin' => $id])->row_array();

        return $query;
    }

    public function create()
    {
        $post = json_decode(file_get_contents('php://input'), true);
        $this->username_admin = $post['username_admin'];
        $this->password_admin = md5($post['password_admin']);
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->insert('tb_admin', $this);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menambah data admin',
                'detail' => $this->db->insert_id()
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menambah data admin',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function update($id)
    {
        $post = json_decode(file_get_contents('php://input'), true);
        $this->username_admin = $post['username_admin'];
        $this->password_admin = md5($post['password_admin']);
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->update('tb_admin', $this, ['id_admin' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil mengubah data admin'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal mengubah data admin',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function delete($id)
    {
        $query = $this->db->delete('tb_admin', ['id_admin' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menghapus data admin'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menghapus data admin',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }
}
