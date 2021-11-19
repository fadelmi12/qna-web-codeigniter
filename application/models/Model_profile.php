<?php

class Model_profile extends CI_Model
{

    public function getProfile($id)
    {
        $this->db->where('t_user.id_user', $id);
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->join('t_profile', 't_profile.id_user=t_user.id_user', 'left');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id=t_profile.provinsi', 'left');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id=t_profile.kota', 'left');
        $this->db->join('t_bank', 't_bank.id_bank=t_profile.id_bank', 'left');
        return $this->db->get();
    }

    public function getProfile_wa($no_wa)
    {
        $this->db->where('t_profile.no_hp', $no_wa);
        $this->db->select('*');
        $this->db->from('t_profile');
        return $this->db->get();
    }

    public function getAfiliate($afil)
    {
        $this->db->where('t_user.kode_afiliasi', $afil);
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->join('t_profile', 't_profile.id_user=t_user.id_user', 'left');
        return $this->db->get();
    }

    public function get_no_wa()
    {
        $this->db->select('no_hp');
        $this->db->from('t_profile');
        return $this->db->get();
    }

    public function get_table_where($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }

    public function QuestCount($id)
    {
        $this->db->where('t_user.id_user', $id);
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->where('status_hidden=0');
        return $this->db->get();
    }
    public function ArCount($id)
    {
        $this->db->where('t_artikel.id_user', $id);
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        $this->db->join('t_artikeltag', 't_artikel.id_artikel=t_artikeltag.id_artikel', 'left');
        return $this->db->get();
    }

    public function RiwayatJawab()
    {
        $query = "select k.nama_kategori, p.pertanyaan, j.jawaban, j.waktu_jawab, u.nama_user from t_jawaban j join t_pertanyaan p on p.id_pertanyaan = j.id_pertanyaan join t_user u on j.id_user = u.id_user join t_kategori k on p.id_kategori = k.id_kategori where j.id_user = 1 and j.jawaban_benar = 1";
        return $this->db->query($query)->result_array();
    }

    public function bookmark_profile($id)
    {
        $this->db->where('t_bookmark.id_user', $id);
        $this->db->select('*');
        $this->db->from('t_bookmark');
        $this->db->join('t_pertanyaan', 't_pertanyaan.id_pertanyaan=t_bookmark.id_pertanyaan', 'left');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->where('status_bookmark=1');
        return $this->db->get();
    }

    public function artikel_saving($id)
    {
        $this->db->where('t_artikelbookmark.id_user', $id);
        $this->db->select('*');
        $this->db->from('t_artikelbookmark');
        $this->db->join('t_artikel', 't_artikel.id_artikel=t_artikelbookmark.id_artikel', 'left');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        $this->db->join('t_artikeltag', 't_artikel.id_artikel=t_artikeltag.id_artikel', 'left');
        $this->db->group_by('judul_artikel');
        // $this->db->where('status_bookmark=1');
        return $this->db->get();
    }

    public function riwayat_jawab($id)
    {
        $this->db->where('t_jawaban.id_user', $id);
        $this->db->select('*');
        $this->db->from('t_jawaban');
        $this->db->join('t_pertanyaan', 't_pertanyaan.id_pertanyaan=t_jawaban.id_pertanyaan', 'left');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        return $this->db->get();
    }

    public function get_prov()
    {
        $this->db->select('*');
        $this->db->from('wilayah_provinsi');
        return $this->db->get();
    }

    public function get_kota($where)
    {
        $this->db->select('*');
        $this->db->from('wilayah_kabupaten');
        $this->db->where($where);
        return $this->db->get();
    }

    public function update_profil($table, $data, $where)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }
    public function get_wallet($id)
    {
        $this->db->select('*');
        $this->db->from('t_profile');
        $this->db->where('id_user', $id);
        return $this->db->get();
    }

    public function getTransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('t_transaksi');
        $this->db->where('id_user', $id);
        $this->db->order_by('transaction_time', 'DESC');
        return $this->db->get();
    }
    public function edit_wallet($data, $where)
    {
        $this->db->where($where);
        $query = $this->db->update('t_profile', $data);
        return $query;
    }
    public function edit_wallet_article($data)
    {
        $this->db->update_batch('t_profile', $data, 'id_user');
    }
    public function riwayat_penarikan($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function penarikan($id)
    {
        $this->db->select('*');
        $this->db->from('t_penarikan');
        $this->db->where('id_user', $id);
    }
    public function get_penarikan($id)
    {
        $this->db->where('t_penarikan.id_user', $id);
        $this->db->select('*');
        $this->db->from('t_penarikan');
        $this->db->join('t_user', 't_penarikan.id_user=t_user.id_user', 'left');
        $this->db->join('t_profile', 't_user.id_user=t_profile.id_user', 'left');
        return $this->db->get();
    }
    public function get_log_money($id)
    {
        $this->db->where('log_money.id_user', $id);
        $this->db->select('*');
        $this->db->from('log_money');
        $this->db->join('t_user', 'log_money.id_user=t_user.id_user', 'left');
        $this->db->join('t_profile', 't_user.id_user=t_profile.id_user', 'left');
        $this->db->order_by('tgl_log', 'DESC');
        return $this->db->get();
    }
}
