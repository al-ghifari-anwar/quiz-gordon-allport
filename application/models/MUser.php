<?php

class MUser extends CI_Model
{
    public $name_user;
    public $asal_user;
    public $updated_at;

    public function get()
    {
        $query = $this->db->get('tb_user')->result_array();

        return $query;
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();

        return $query;
    }

    public function create()
    {
        $post = json_decode(file_get_contents('php://input'), true) != null ? json_decode(file_get_contents('php://input'), true) : $this->input->post();
        $this->name_user = $post['name_user'];
        $this->asal_user = $post['asal_user'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->insert('tb_user', $this);

        if ($query) {
            $getUser = $this->db->get_where('tb_user', ['id_user' => $this->db->insert_id()])->row_array();
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menambah data user',
                'detail' => $getUser
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menambah data user',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function update($id)
    {
        $post = json_decode(file_get_contents('php://input'), true);
        $this->name_user = $post['name_user'];
        $this->asal_user = $post['asal_user'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->update('tb_user', $this, ['id_user' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil mengubah data user'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal mengubah data user',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function delete($id)
    {
        $query = $this->db->delete('tb_user', ['id_user' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menghapus data user'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menghapus data user',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }
}
