<?php 
class Model_main extends CI_model{
    function logo(){
        return $this->db->query("SELECT * FROM logo");
    }

    function logo_update(){
        $config['upload_path'] = 'asset/logo/';
        $config['allowed_types'] = 'gif|jpg|png|JPG';
        $config['max_size'] = '2000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('logo');
        $hasil=$this->upload->data();
            $datadb = array('gambar'=>$hasil['file_name']);
        $this->db->where('id_logo',$this->input->post('id'));
        $this->db->update('logo',$datadb);
    }

    function identitas(){
        return $this->db->query("SELECT * FROM identitas ORDER BY id_identitas DESC LIMIT 1");
    }

    function identitas_update(){
            $config['upload_path'] = 'asset/images/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = '500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('i');
            $hasil=$this->upload->data();

            if ($hasil['file_name']==''){
                    $datadb = array('nama_website'=>$this->db->escape_str($this->input->post('a')),
                                    'email'=>$this->db->escape_str($this->input->post('b')),
                                    'url'=>$this->db->escape_str($this->input->post('c')),
                                    'facebook'=>$this->db->escape_str($this->input->post('d')),
                                    'keterangan'=>$this->db->escape_str($this->input->post('ket')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('f')),
                                    'meta_deskripsi'=>$this->db->escape_str($this->input->post('g')),
                                    'meta_keyword'=>$this->db->escape_str($this->input->post('h')),
                                    'maps'=>$this->db->escape_str($this->input->post('j')));
            }else{
                    $datadb = array('nama_website'=>$this->db->escape_str($this->input->post('a')),
                                    'email'=>$this->db->escape_str($this->input->post('b')),
                                    'url'=>$this->db->escape_str($this->input->post('c')),
                                    'facebook'=>$this->db->escape_str($this->input->post('d')),
                                    'keterangan'=>$this->db->escape_str($this->input->post('ket')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('f')),
                                    'meta_deskripsi'=>$this->db->escape_str($this->input->post('g')),
                                    'meta_keyword'=>$this->db->escape_str($this->input->post('h')),
                                    'favicon'=>$hasil['file_name'],
                                    'maps'=>$this->db->escape_str($this->input->post('j')));
            }
            $this->db->where('id_identitas',1);
            $this->db->update('identitas',$datadb);
    }

    function pesan_masuk(){
        return $this->db->query("SELECT * FROM hubungi ORDER BY id_hubungi DESC");
    }

    function pesan_baru($limit){
        return $this->db->query("SELECT * FROM hubungi ORDER BY id_hubungi DESC LIMIT $limit");
    }

    function pesan_masuk_view($id){
        return $this->db->query("SELECT * FROM hubungi where id_hubungi='$id'");
    }

    function pesan_masuk_kirim(){
        $nama           = $this->input->post('a');
        $email           = $this->input->post('b');
        $subject         = $this->input->post('c');
        $message         = $this->input->post('isi')." <br><hr><br> ".$this->input->post('d');
        
        $this->email->from('robby.prihandaya@gmail.com', 'PHPMU.COM');
        $this->email->to($email);
        $this->email->cc('');
        $this->email->bcc('');

        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();
        
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

    }

    function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function kunjungan(){
        $ip      = $_SERVER['REMOTE_ADDR'];
        $tanggal = date("Y-m-d");
        $waktu   = time(); 
        $cekk = $this->db->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
        $rowh = $cekk->row_array();
        if($cekk->num_rows() == 0){
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>'1', 'online'=>$waktu);
            $this->db->insert('statistik',$datadb);
        }else{
            $hitss = $rowh['hits'] + 1;
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>$hitss, 'online'=>$waktu);
            $array = array('ip' => $ip, 'tanggal' => $tanggal);
            $this->db->where($array);
            $this->db->update('statistik',$datadb);
        }
    }

    function kirim_Pesan(){
        if ($this->input->post('cek')==''){
            $nama       = cetak($this->input->post('a'));
            $email      = cetak($this->input->post('b'));
            $subjek     = cetak($this->input->post('c'));
            $pesan      = cetak($this->input->post('d'));
                $datadb = array('nama'=>$nama,
                                'email'=>$email,
                                'subjek'=>$subjek,
                                'pesan'=>$pesan,
                                'tanggal'=>date('Y-m-d'),
                                'jam'=>date('H:i:s'),
                                'dibaca'=>'N');
            $this->db->insert('hubungi',$datadb);
        }
    }
}