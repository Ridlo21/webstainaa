<?php
class Model_akreditasi extends CI_model
{
    function akreditasi_get($name)
    {
        return $this->db->query("SELECT * FROM tb_akreditasi WHERE fakultas = '$name'");
    }
}
