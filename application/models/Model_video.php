<?php
class Model_video extends CI_model
{
    function hitungvideo()
    {
        return $this->db->query("SELECT * FROM video");
    }

    function semua_video($start, $limit)
    {
        return $this->db->query("SELECT * FROM video ORDER BY id_video DESC LIMIT $start,$limit");
    }
}
