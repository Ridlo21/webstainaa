<?php
class Model_akreditasi extends CI_model
{
    function viewAll()
    {
        $this->db->select('*');
        $this->db->from("tb_akreditasi");
        $this->db->order_by('id_akreditasi', "DESC");
        return $this->db->get()->result_array();
    }

    function detail_akreditasi($id)
    {
        $this->db->select('*');
        $this->db->from("tb_detail_akreditasi");
        $this->db->where('id_akreditasi', $id);
        return $this->db->get()->num_rows();
    }

    function detail_akreditasi_all($id)
    {
        $this->db->select('*');
        $this->db->from("tb_detail_akreditasi");
        $this->db->join('tb_akreditasi', 'tb_akreditasi.id_akreditasi = tb_detail_akreditasi.id_akreditasi');
        $this->db->where('tb_detail_akreditasi.id_akreditasi', $id);
        $this->db->order_by('tb_detail_akreditasi.id_detail', "DESC");
        return $this->db->get()->result_array();
    }
}
