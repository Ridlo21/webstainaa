<?php 
class Model_download extends CI_model{
    function index($start,$limit){
        return $this->db->query("SELECT * FROM download ORDER BY id_download DESC LIMIT $start,$limit");
    }

    function updatehits($file){
        return $this->db->query("UPDATE download set hits=hits+1 where nama_file='".$this->db->escape_str($file)."'");
    }

    function hitungdownload(){
        return $this->db->query("SELECT * FROM download");
    }

    function download(){
        return $this->db->query("SELECT * FROM download ORDER BY id_download DESC");
    }

    function download_tambah(){
        $config['upload_path'] = 'asset/files/';
        $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('b');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'hits'=>'0');
            }else{
            		$datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_file'=>$hasil['file_name'],
                                    'tgl_posting'=>date('Y-m-d'),
                                    'hits'=>'0');
            }
        $this->db->insert('download',$datadb);
    }

    function download_edit($id){
        return $this->db->query("SELECT * FROM download where id_download='$id'");
    }

    function download_update(){
        $config['upload_path'] = 'asset/files/';
        $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('b');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'hits'=>'0');
            }else{
            		$datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_file'=>$hasil['file_name'],
                                    'tgl_posting'=>date('Y-m-d'),
                                    'hits'=>'0');
            }
        $this->db->where('id_download',$this->input->post('id'));
        $this->db->update('download',$datadb);
    }

    function download_delete($id){
        return $this->db->query("DELETE FROM download where id_download='$id'");
    }
}