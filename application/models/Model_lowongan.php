<?php 
class Model_lowongan extends CI_model{
    function detail($id){
        return $this->db->query("SELECT * FROM lowongan where judul_seo='".$this->db->escape_str($id)."'");
    }

    function semua_lowongan($start, $limit){
        return $this->db->query("SELECT * FROM lowongan ORDER BY id_lowongan DESC LIMIT $start,$limit");
    }

    function hitunglowongan(){
        return $this->db->query("SELECT * FROM lowongan");
    }

    function lowker(){
        return $this->db->query("SELECT * FROM lowongan ORDER BY id_lowongan DESC");
    }

    function lowker_tambah(){
        $config['upload_path'] = 'asset/files/';
        $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('g');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'nama_perusahaan'=>$this->db->escape_str($this->input->post('b')),
                                    'deskripsi_perusahaan'=>$this->input->post('c'),
                                    'posisi'=>$this->db->escape_str($this->input->post('d')),
                                    'deadline'=>tgl_simpan($this->input->post('e')),
                                    'keterangan'=>$this->input->post('f'),
                                    'tanggal_posting'=>date('Y-m-d'),
                                    'username'=>$this->session->username);
            }else{
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'nama_perusahaan'=>$this->db->escape_str($this->input->post('b')),
                                    'deskripsi_perusahaan'=>$this->input->post('c'),
                                    'posisi'=>$this->db->escape_str($this->input->post('d')),
                                    'deadline'=>tgl_simpan($this->input->post('e')),
                                    'keterangan'=>$this->input->post('f'),
                                    'file_pendukung'=>$hasil['file_name'],
                                    'tanggal_posting'=>date('Y-m-d'),
                                    'username'=>$this->session->username);
            }
        $this->db->insert('lowongan',$datadb);
    }

    function lowker_edit($id){
        return $this->db->query("SELECT * FROM lowongan where id_lowongan='$id'");
    }

    function lowker_update(){
        $config['upload_path'] = 'asset/files/';
        $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('g');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'nama_perusahaan'=>$this->db->escape_str($this->input->post('b')),
                                    'deskripsi_perusahaan'=>$this->input->post('c'),
                                    'posisi'=>$this->db->escape_str($this->input->post('d')),
                                    'deadline'=>tgl_simpan($this->input->post('e')),
                                    'keterangan'=>$this->input->post('f'),
                                    'tanggal_posting'=>date('Y-m-d'),
                                    'username'=>$this->session->username);
            }else{
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'nama_perusahaan'=>$this->db->escape_str($this->input->post('b')),
                                    'deskripsi_perusahaan'=>$this->input->post('c'),
                                    'posisi'=>$this->db->escape_str($this->input->post('d')),
                                    'deadline'=>tgl_simpan($this->input->post('e')),
                                    'keterangan'=>$this->input->post('f'),
                                    'file_pendukung'=>$hasil['file_name'],
                                    'tanggal_posting'=>date('Y-m-d'),
                                    'username'=>$this->session->username);
            }
        $this->db->where('id_lowongan',$this->input->post('id'));
        $this->db->update('lowongan',$datadb);
    }

    function lowker_delete($id){
        return $this->db->query("DELETE FROM lowongan where id_lowongan='$id'");
    }
}