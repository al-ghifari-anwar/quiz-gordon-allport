<?php

class MSoal extends CI_Model
{
    public $text_soal;
    public $updated_at;

    public function get()
    {
        $query = $this->db->get('tb_soal')->result_array();

        return $query;
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_soal', ['id_soal' => $id])->row_array();

        return $query;
    }

    public function getRandomSoal()
    {
        $this->db->order_by('RAND()');
        $query = $this->db->get('tb_soal', 1)->row_array();

        return $query;
    }

    public function create()
    {
        $post = $this->input->post();
        $this->text_soal = $post['text_soal'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->insert('tb_soal', $this);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menambah data soal',
                'detail' => $this->db->insert_id()
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menambah data soal',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->text_soal = $post['text_soal'];
        $this->updated_at = date("Y-m-d H:i:s");

        $query = $this->db->update('tb_soal', $this, ['id_soal' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil mengubah data soal'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal mengubah data soal',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }

    public function delete($id)
    {
        $query = $this->db->delete('tb_soal', ['id_soal' => $id]);

        if ($query) {
            $return = [
                'code' => 200,
                'status' => 'ok',
                'msg' => 'Berhasil menghapus data soal'
            ];
            return $return;
        } else {
            $return = [
                'code' => 400,
                'status' => 'failed',
                'msg' => 'Gagal menghapus data soal',
                'detail' => $this->db->error()
            ];
            return $return;
        }
    }
}
