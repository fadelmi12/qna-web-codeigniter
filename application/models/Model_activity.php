<?php

class Model_activity extends CI_Model
{

    public function save_activity($datalog)
    {
        $this->db->insert('t_aktivitas', $datalog);
        return true;
    }
}
