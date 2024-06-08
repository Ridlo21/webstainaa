<?php
class Model_idn extends CI_model
{
    public function menu_idn()
    {
        $this->db->from('idn');
        $query = $this->db->get();
        return $query->result();
    }

    function menu_website_tambah()
    {
        $datadb = array(
            // 'id_parent' => $this->db->escape_str($this->input->post('b')),
            // 'nama_menu' => $this->db->escape_str($this->input->post('c')),
            'nama' => $this->db->escape_str($this->input->post('a')),
            // 'aktif' => $this->db->escape_str('Ya'),
            // 'position' => $this->db->escape_str($this->input->post('d')),
            // 'urutan' => $this->db->escape_str($this->input->post('e'))
        );
        $this->db->insert('idn', $datadb);
    }
}
