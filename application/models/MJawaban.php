<?php

class MJawaban extends CI_Model
{
    public $id_user;
    public $id_soal;
    public $id_pilihan;
    public $point_jawaban;
    public $updated_at;

    public function get()
    {
        $query = $this->db->get('tb_jawaban')->result_array();

        return $query;
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_jawaban', ['id_jawaban' => $id])->row_array();

        return $query;
    }

    public function getScoreByIdUser($id_user)
    {
        $this->db->select("id_user, SUM(point_jawaban) AS point_jawaban");
        $query = $this->db->get_where('tb_jawaban', ['id_user' => $id_user])->row_array();

        return $query;
    }

    public function create()
    {
        $post = json_decode(file_get_contents('php://input'), true);
        $this->id_user = $post['id_user'];
        $this->id_soal = $post['id_soal'];
        $this->id_pilihan = $post['id_pilihan'];
        $this->point_jawaban = $post['point_jawaban'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->insert('tb_jawaban', $this);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menambah data jawaban',
                'detail' => $this->db->insert_id()
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menambah data jawaban',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function update($id)
    {
        $post = json_decode(file_get_contents('php://input'), true);
        $this->id_user = $post['id_user'];
        $this->id_soal = $post['id_soal'];
        $this->id_pilihan = $post['id_pilihan'];
        $this->point_jawaban = $post['point_jawaban'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->update('tb_jawaban', $this, ['id_jawaban' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil mengubah data jawaban'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal mengubah data jawaban',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function delete($id)
    {
        $query = $this->db->delete('tb_jawaban', ['id_jawaban' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menghapus data jawaban'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menghapus data jawaban',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }
}
