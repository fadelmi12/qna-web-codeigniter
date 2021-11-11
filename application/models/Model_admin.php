<?php
class Model_admin extends CI_Model
{

    public function getUser()
    {
        $this->db->select('*');
        return $this->db->get('t_user');
    }
    public function QuestiontCount()
    {
        // $this->db->select('id_pertanyaan');
        return $this->db->get('t_pertanyaan');
    }
    public function ArtikelCount()
    {
        // $this->db->select('id_artikel');
        // return $this->db->get('t_artikel');
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->join('t_artikeltag', 't_artikeltag.id_artikel = t_artikel.id_artikel');
        return $this->db->get();
    }
    public function tampil_kategori()
    {
        return $this->db->get('t_kategori');
    }
    public function tambah_kategori($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function hapus_quest($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function tampil_question($nama, $status_hidden)
    {
        if ($status_hidden != "") {
            $this->db->where('t_pertanyaan.status_hidden', $status_hidden);
            $this->db->select('*');
            $this->db->from('t_pertanyaan');
            $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
            $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
            $this->db->order_by('waktu_question', 'DESC');
            return $this->db->get();
        }
        $this->db->where('t_kategori.nama_kategori', $nama);
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->order_by('waktu_question', 'DESC');


        return $this->db->get();
    }
    public function detail_question($id)
    {
        $this->db->where('t_pertanyaan.id_pertanyaan', $id);
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->order_by('waktu_question', 'DESC');
        return $this->db->get();
    }
    public function update_hidden_quest($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return true;
    }
    public function update_hidden_ans($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return true;
    }
    public function tampil_edit_jawaban($id)
    {
        $this->db->where('t_jawaban.id_pertanyaan', $id);
        $this->db->select('*');
        $this->db->from('t_jawaban');
        $this->db->join('t_user', 't_user.id_user=t_jawaban.id_user', 'left');
        return $this->db->get();
    }
    public function daftar_user()
    {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->join('t_profile', 't_profile.id_user=t_user.id_user', 'left');
        return $this->db->get();
    }

    public function kontak()
    {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->join('t_profile', 't_profile.id_user=t_user.id_user', 'left');
        $this->db->where('role_id=2');
        return $this->db->get();
    }

    public function data_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->join('t_profile', 't_profile.id_user=t_user.id_user', 'left');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id=t_profile.provinsi', 'left');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id=t_profile.kota', 'left');
        $this->db->where('t_user.id_user', $id_user);
        return $this->db->get();
    }

    public function tampil_pesan()
    {
        $this->db->select('*');
        $this->db->from('t_message');
        $this->db->join('t_user', 't_user.id_user=t_message.id_user', 'left');
        $this->db->join('t_pertanyaan', 't_pertanyaan.id_pertanyaan=t_message.id_pertanyaan', 'left');
        $this->db->where('t_message.status_baca','1');
        return $this->db->get();
    }

    public function tampil_pesan_blm_trbca()
    {
        $this->db->select('*');
        $this->db->from('t_message');
        $this->db->join('t_user', 't_user.id_user=t_message.id_user', 'left');
        $this->db->join('t_pertanyaan', 't_pertanyaan.id_pertanyaan=t_message.id_pertanyaan', 'left');
        $this->db->where('t_message.status_baca','0');
        return $this->db->get();
    }

    public function update_read($data, $table)
    {
        $this->db->update($table, $data);
    }

    public function penarikan_sukses()
    {
        $this->db->select('*');
        $this->db->from('t_penarikan');
        $this->db->join('t_profile', 't_profile.id_profile=t_penarikan.id_profile', 'left');
        $this->db->where('t_penarikan.status_terkirim', '1');
        return $this->db->get();
    }

    public function penarikan_batal()
    {
        $this->db->select('*');
        $this->db->from('t_penarikan');
        $this->db->join('t_profile', 't_profile.id_profile=t_penarikan.id_profile', 'left');
        $this->db->where('t_penarikan.status_terkirim', '0');
        return $this->db->get();
    }

    public function log_login()
    {
        $this->db->select('*');
        $this->db->from('log_login');
        return $this->db->get();
    }
}
