<?php

class MNilai extends CI_Model
{
    public $id_user;
    public $point_nilai;
    public $updated_at;

    public function get()
    {
        $query = $this->db->get('tb_nilai')->result_array();

        return $query;
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_nilai', ['id_nilai' => $id])->row_array();

        return $query;
    }

    public function create()
    {
        $post = $this->input->post();
        $this->id_user = $post['id_user'];
        $this->point_nilai = $post['point_nilai'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->insert('tb_nilai', $this);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menambah data nilai',
                'detail' => $this->db->insert_id()
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menambah data nilai',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id_user = $post['id_user'];
        $this->point_nilai = $post['point_nilai'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->update('tb_nilai', $this, ['id_nilai' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil mengubah data nilai'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal mengubah data nilai',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function delete($id)
    {
        $query = $this->db->delete('tb_nilai', ['id_nilai' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menghapus data nilai'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menghapus data nilai',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }
}
