<?php

class MPilihan extends CI_Model
{
    public $name_pilihan;
    public $text_pilihan;
    public $is_correct;
    public $updated_at;

    public function get()
    {
        $query = $this->db->get('tb_pilihan')->result_array();

        return $query;
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_pilihan', ['id_pilihan' => $id])->row_array();

        return $query;
    }

    public function getByIdSoal($id_soal)
    {
        $query = $this->db->get_where('tb_pilihan', ['id_soal' => $id_soal])->result_array();

        return $query;
    }

    public function create()
    {
        $post = $this->input->post();
        $this->name_pilihan = $post['name_pilihan'];
        $this->text_pilihan = $post['text_pilihan'];
        $this->is_correct = $post['is_correct'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->insert('tb_pilihan', $this);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menambah data pilihan',
                'detail' => $this->db->insert_id()
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menambah data pilihan',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->name_pilihan = $post['name_pilihan'];
        $this->text_pilihan = $post['text_pilihan'];
        $this->is_correct = $post['is_correct'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->update('tb_pilihan', $this, ['id_pilihan' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil mengubah data pilihan'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal mengubah data pilihan',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function delete($id)
    {
        $query = $this->db->delete('tb_pilihan', ['id_pilihan' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menghapus data pilihan'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menghapus data pilihan',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }
}
