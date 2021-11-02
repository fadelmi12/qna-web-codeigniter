<?php
class Model_pertanyaan extends CI_Model
{


    public function get_question($nama)
    {
        $this->db->where('t_kategori.nama_kategori', $nama);
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->where('status_hidden=0');
        $this->db->order_by('waktu_question', 'DESC');

        return $this->db->get();
    }
    public function detail_tanya($id)
    {
        $this->db->where('t_pertanyaan.id_pertanyaan', $id);
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->where('status_hidden=0');

        return $this->db->get();
    }
    public function countlike($id)
    {
        $this->db->where('id_pertanyaan', $id);
        $this->db->select('*');
        $this->db->from('t_like');
        $this->db->where('status_like=1');
        return $this->db->get();
    }
    public function jawab($id)
    {
        $this->db->where('t_jawaban.id_pertanyaan', $id);
        $this->db->select('*');
        $this->db->from('t_jawaban');
        $this->db->join('t_user', 't_user.id_user=t_jawaban.id_user', 'left');
        $this->db->order_by('waktu_jawab', 'DESC');
        $this->db->where('status_sembunyi=0');
        return $this->db->get();
    }
    public function update_status_jawab($where, $data)
    {
        $this->db->where($where);
        $this->db->update('t_jawaban', $data);
    }
    public function set_status_jawab($prt, $data)
    {
        $this->db->where('id_pertanyaan', $prt);
        $this->db->update('t_pertanyaan', $data);
    }
    public function get_like_dasboard()
    {
        $this->db->select('*');
        $this->db->from('t_like');
        $this->db->where('status_like', '1');
        return $this->db->get();
    }
    public function get_love()
    {
        $this->db->select('*');
        $this->db->from('t_love');
        $this->db->where('status_love', '1');
        return $this->db->get();
    }

    public function getAllQuestions()
    {
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->where('status_hidden=0');

        return $this->db->get();
    }
    public function tambah_jawaban($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->like('pertanyaan', $keyword);
        $this->db->or_like('nama_user', $keyword);
        $this->db->or_like('nama_kategori', $keyword);
        return $this->db->get();
    }


    public function sudah_bookmark($id_user, $id_pertanyaan)
    {
        //$this->db->where('id_user', $id_user);
        $this->db->where('id_pertanyaan', $id_pertanyaan);
        return $this->db->get('t_bookmark');
    }
    public function update_pertanyaan($table, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_quest($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function insert_report($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function get_report()
    {
        return $this->db->get('t_message');
    }
    public function get_question_more($nama, $limit, $offset)
    {
        $this->db->where('t_kategori.nama_kategori', $nama);
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->where('status_hidden=0');
        $this->db->order_by('waktu_question', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }
    public function get_keyword_search($keyword, $limit, $offset)
    {
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->like('pertanyaan', $keyword);
        $this->db->or_like('nama_user', $keyword);
        $this->db->or_like('nama_kategori', $keyword);
        $this->db->limit($limit, $offset);
        return $this->db->get();
    }
}
