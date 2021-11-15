<?php
class Model_dashboard extends CI_Model
{
    public function get_question_dashboard($price, $time)
    {
        if ($price != null && $time == null) {
            if ($price == 0) {
                $this->db->order_by('harga', 'ASC');
            } else {
                $this->db->order_by('harga', 'DESC');
            }
        } elseif ($price == null && $time != null) {
            if ($time == 0) {
                $this->db->order_by('waktu_question', 'ASC');
            } else {
                $this->db->order_by('waktu_question', 'DESC');
            }
        } elseif ($price != null && $time != null) {
            if ($price == 0 && $time == 0) {
                $this->db->order_by('harga', 'ASC');
                $this->db->order_by('waktu_question', 'ASC');
            } elseif ($price == 1 && $time == 1) {
                $this->db->order_by('harga', 'DESC');
                $this->db->order_by('waktu_question', 'DESC');
            } elseif ($price == 1 && $time == 0) {
                $this->db->order_by('harga', 'DESC');
                $this->db->order_by('waktu_question', 'ASC');
            } elseif ($price == 0 && $time == 1) {
                $this->db->order_by('harga', 'ASC');
                $this->db->order_by('waktu_question', 'DESC');
            }
        }
        $this->db->select('*');
        $this->db->from('t_pertanyaan');
        $this->db->join('t_user', 't_user.id_user=t_pertanyaan.id_user', 'left');
        $this->db->join('t_kategori', 't_kategori.id_kategori=t_pertanyaan.id_kategori', 'left');
        $this->db->where('status_hidden=0');
        $this->db->order_by('waktu_question', 'DESC');
        $this->db->limit(5);

        return $this->db->get();
    }

    public function get_article_dashboard()
    {
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        // $this->db->join('t_artikeltag', 't_artikeltag.id_artikel=t_artikel.id_artikel', 'left');
        // $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        // $this->db->where('status_hidden=0');
        $this->db->order_by('t_artikel.id_artikel', 'DESC');
        $this->db->limit(3);

        return $this->db->get();
    }
    public function get_article_populer()
    {
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        // $this->db->join('t_artikeltag', 't_artikeltag.id_artikel=t_artikel.id_artikel', 'left');
        // $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        // $this->db->where('status_hidden=0');
        $this->db->order_by('t_artikel.jumlah_view', 'DESC');
        $this->db->limit(3);

        return $this->db->get();
    }

    public function get_tag_dashboard()
    {
        $this->db->select('*');
        $this->db->from('t_tag');
        $this->db->join('kategori_tag', 't_tag.id_kategori_tag=kategori_tag.id_kategori_tag', 'left');
        return $this->db->get();
    }
    public function get_tag_article_dashboard()
    {
        $this->db->select('*');
        $this->db->from('t_artikeltag');
        $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        return $this->db->get();
    }
    public function get_tag_kategori()
    {
        return $this->db->get('kategori_tag');
    }

    public function get_tag_article($id_artikel)
    {
        $this->db->select('*');
        $this->db->from('t_artikeltag');
        $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        $this->db->where('id_artikel=' . $id_artikel);

        return $this->db->get();
    }

    public function get_kategori_dasboard()
    {
        $this->db->select('*');
        $this->db->from('t_kategori');

        return $this->db->get();
    }

    public function get_activity_dasboard()
    {
        $this->db->select('*');
        $this->db->from('t_aktivitas');
        $this->db->join('t_user', 't_user.id_user=t_aktivitas.id_user', 'left');
        $this->db->order_by('waktu_aktivitas', 'DESC');
        $this->db->limit(10);


        return $this->db->get();
    }

    public function get_like_dasboard()
    {
        $this->db->select('*');
        $this->db->from('t_like');
        $this->db->where('status_like', '1');
        return $this->db->get();
    }

    public function tambah_pertanyaan($table, $data)
    {
        $this->db->insert($table, $data);
        return true;
    }
}
