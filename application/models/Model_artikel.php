<?php

class Model_artikel extends CI_Model
{

    public function get_article_dashboard()
    {
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        // $this->db->join('t_artikeltag', 't_artikeltag.id_artikel=t_artikel.id_artikel', 'left');
        // $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        // $this->db->where('status_hidden=0');
        $this->db->order_by('t_artikel.id_artikel', 'ASC');
        $this->db->group_by('judul_artikel');
        // $this->db->limit(3);

        return $this->db->get();
    }
    public function get_more_article($limit, $offset)
    {
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        // $this->db->join('t_artikeltag', 't_artikeltag.id_artikel=t_artikel.id_artikel', 'left');
        // $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        // $this->db->where('status_hidden=0');
        $this->db->order_by('t_artikel.id_artikel', 'ASC');
        $this->db->limit($limit, $offset);
        $this->db->group_by('judul_artikel');
        return $this->db->get();
    }

    public function get_article($id_Tag)
    {
        $this->db->select('*');
        $this->db->from('t_artikeltag');
        $this->db->join('t_artikel', 't_artikel.id_artikel=t_artikeltag.id_artikel', 'left');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        // $this->db->where('t_artikel.status_hidden=0');
        $this->db->order_by('t_artikel.id_artikel', 'ASC');
        $this->db->where('t_artikeltag.idTag=' . $id_Tag);
        $this->db->group_by('judul_artikel');
        // $this->db->limit(3);

        return $this->db->get();
    }
    public function get_more_tag($id_Tag, $limit, $offset)
    {
        $this->db->select('*');
        $this->db->from('t_artikeltag');
        $this->db->join('t_artikel', 't_artikel.id_artikel=t_artikeltag.id_artikel', 'left');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        // $this->db->where('t_artikel.status_hidden=0');
        $this->db->order_by('t_artikel.id_artikel', 'ASC');
        $this->db->where('t_artikeltag.idTag=' . $id_Tag);
        $this->db->limit($limit, $offset);
        $this->db->group_by('judul_artikel');
        return $this->db->get();
    }

    public function get_tag_dashboard()
    {
        $this->db->select('*');
        $this->db->from('t_tag');
        $this->db->join('kategori_tag', 't_tag.id_kategori_tag=kategori_tag.id_kategori_tag', 'left');
        return $this->db->get();
    }

    public function get_tag_kategori()
    {
        return $this->db->get('kategori_tag');
    }


    public function get_tag($where)
    {
        return $this->db->get_where('t_tag', $where);
    }

    public function get_tag_article($id_artikel)
    {
        $this->db->select('*');
        $this->db->from('t_artikeltag');
        $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        $this->db->where('id_artikel=' . $id_artikel);

        return $this->db->get();
    }

    public function get_tag_article_dashboard()
    {
        $this->db->select('*');
        $this->db->from('t_artikeltag');
        $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        return $this->db->get();
    }

    public function detail_artikel($slug)
    {
        $this->db->where('t_artikel.slug', $slug);
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->join('t_user', 't_user.id_user=t_artikel.id_user', 'left');
        // $this->db->join('t_artikeltag', 't_artikeltag.id_artikel=t_artikel.id_artikel', 'left');
        // $this->db->join('t_tag', 't_tag.idTag=t_artikeltag.idTag', 'left');
        // // return $this->db->get_where($table,$where);
        return $this->db->get();
    }

    public function artikel_save($slug)
    {
        $this->db->where('t_artikel.slug', $slug);
        $this->db->select('*');
        $this->db->from('t_artikelbookmark`');
        $this->db->join('t_artikel', 't_artikel.id_artikel = t_artikelbookmark.id_artikel');
        return $this->db->get();
    }

    public function tampil_kategori_tag()
    {
        return $this->db->get('kategori_tag');
    }

    public function tampil_sub_kategori_tag($id_kategori_tag)
    {
        $this->db->select('*');
        $this->db->from('t_tag`');
        $this->db->where('id_kategori_tag', $id_kategori_tag);
        return $this->db->get();
    }

    public function list_artikel_tag($idTag)
    {
        $this->db->select('*');
        $this->db->from('t_artikel`');
        $this->db->join('t_artikeltag', 't_artikeltag.id_artikel = t_artikel.id_artikel', 'left');
        $this->db->join('t_tag', 't_tag.idTag = t_artikeltag.idTag', 'left');
        $this->db->join('t_user', 't_user.id_user = t_artikel.id_user', 'left');
        $this->db->where('t_tag.idTag', $idTag);
        $this->db->group_by('judul_artikel');
        return $this->db->get();
    }

    public function artikel_belum_verif()
    {
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->join('t_user', 't_user.id_user = t_artikel.id_user', 'left');
        $this->db->where('t_artikel.status_tampil', '0');
        return $this->db->get();
    }

    public function cek_status_artikel($id_artikel)
    {
        $this->db->select('status_tampil');
        $this->db->from('t_artikel');
        $this->db->where('id_artikel', $id_artikel);
        return $this->db->get();
    }

    public function get_artikel($id_artikel)
    {
        $this->db->select('*');
        $this->db->from('t_artikel');
        $this->db->where('id_artikel', $id_artikel);
        return $this->db->get();
    }
    public function upload_artikel($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function upload_artikeltag($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_artikel($table, $data, $where)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }
    public function pembelian()
    {
        return $this->db->get('t_beliartikel');
    }
}
