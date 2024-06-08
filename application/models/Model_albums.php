<?php
class Model_albums extends CI_model
{
    function hitungalbum()
    {
        return $this->db->query("SELECT * FROM album");
    }

    function semua_album($start, $limit)
    {
        return $this->db->query("SELECT * FROM album ORDER BY id_album DESC LIMIT $start,$limit");
    }
}
