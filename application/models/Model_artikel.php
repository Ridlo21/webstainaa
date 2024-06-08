<?php
class Model_artikel extends CI_model
{
    function himpunan_tambah()
    {
        $config['upload_path'] = 'asset/gambar_artikel/cover_himpunan';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('b');
        $hasil = $this->upload->data();
        // $ex = explode(' - ', $this->input->post('f'));
        // $exx = explode('/', $ex[0]);
        // $exy = explode('/', $ex[1]);
        // $mulai = $exx[2] . '-' . $exx[0] . '-' . $exx[1];
        // $selesai = $exy[2] . '-' . $exy[0] . '-' . $exy[1];
        if ($hasil['file_name'] == '') {
            $datadb = array(
                'nama_himpunan' => $this->db->escape_str($this->input->post('a'))
            );
        } else {
            $datadb = array(
                'nama_himpunan' => $this->db->escape_str($this->input->post('a')),
                'gambar' => $hasil['file_name'],
            );
        }
        $this->db->insert('himpunan', $datadb);
    }

    public function himpunan_edit($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    function himpunan_update()
    {
        $config['upload_path'] = 'asset/gambar_artikel/cover_himpunan';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('b');
        $hasil = $this->upload->data();
        if ($hasil['file_name'] == '') {
            $datadb = array(
                'nama_himpunan' => $this->db->escape_str($this->input->post('a'))
            );
        } else {
            $datadb = array(
                'nama_himpunan' => $this->db->escape_str($this->input->post('a')),
                'gambar' => $hasil['file_name'],

            );
        }
        $this->db->where('idhimpunan', $this->input->post('id'));
        $this->db->update('himpunan', $datadb);
    }

    function artikel()
    {
        return $this->db->query("SELECT * FROM artikel ORDER BY idartikel DESC");
    }

    function hitungartikel($name)
    {
        return $this->db->query("SELECT * FROM artikel WHERE nama_himpunan = '$name'");
    }

    function artikelByHimpunan($name, $start, $limit)
    {
        return $this->db->query("SELECT * FROM artikel WHERE nama_himpunan = '$name' ORDER BY idartikel DESC LIMIT $start,$limit");
    }

    function artikelByMonth($name, $seo)
    {
        $tgl = date('m');
        return $this->db->query("SELECT * FROM artikel WHERE nama_himpunan = '$name' AND MONTH(tgl_rilis) = '$tgl' AND judul_seo NOT IN ('$seo') ORDER BY idartikel DESC");
    }

    function artikel_tambah()
    {
        $config['upload_path'] = 'asset/gambar_artikel/foto_artikel';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);

        $this->upload->do_upload('c');
        $this->upload->do_upload('f');
        $this->upload->data();
        if ($_FILES['c']['name'] === '') {
            $dataA = "";
        } else {
            $dataA = $_FILES['c']['name'];
        }

        if ($_FILES['f']['name'] == null) {
            $dataB = "default.gif";
        } else {
            $dataB =  $_FILES['f']['name'];
        }

        $datadb = array(
            'judul_artikel' => $this->db->escape_str($this->input->post('a')),
            'judul_seo' => seo_title($this->db->escape_str($this->input->post('a'))),
            'isi_artikel' => $this->input->post('b'),
            'gambar' => $dataA,
            'nama_himpunan' => $this->db->escape_str($this->input->post('d')),
            'penulis' => $this->db->escape_str($this->input->post('e')),
            'foto_penulis' => $dataB,
            'email' => $this->db->escape_str($this->input->post('g')),
            'kontak_penulis' => $this->db->escape_str($this->input->post('h')),
            'tgl_rilis' => date('Y-m-d')
        );
        $this->db->insert('artikel', $datadb);
    }

    public function artikel_edit($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    function artikel_update()
    {
        $config['upload_path'] = 'asset/gambar_artikel/foto_artikel';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $this->upload->do_upload('f');
        $this->upload->data();
        $dataA = $_FILES['c']['name'];
        $dataB = $_FILES['f']['name'];
        if ($dataA == '' & $dataB == null) {
            $datadb = array(
                'judul_artikel' => $this->db->escape_str($this->input->post('a')),
                'judul_seo' => seo_title($this->db->escape_str($this->input->post('a'))),
                'isi_artikel' => $this->input->post('b'),
                'nama_himpunan' => $this->db->escape_str($this->input->post('d')),
                'penulis' => $this->db->escape_str($this->input->post('e')),
                'email' => $this->db->escape_str($this->input->post('g')),
                'kontak_penulis' => $this->db->escape_str($this->input->post('h')),
                'tgl_rilis' => date('Y-m-d')
            );
        } else {
            $datadb = array(
                'judul_artikel' => $this->db->escape_str($this->input->post('a')),
                'judul_seo' => seo_title($this->db->escape_str($this->input->post('a'))),
                'isi_artikel' => $this->input->post('b'),
                'gambar' => $dataA,
                'nama_himpunan' => $this->db->escape_str($this->input->post('d')),
                'penulis' => $this->db->escape_str($this->input->post('e')),
                'foto_penulis' => $dataB,
                'email' => $this->db->escape_str($this->input->post('g')),
                'kontak_penulis' => $this->db->escape_str($this->input->post('h')),
                'tgl_rilis' => date('Y-m-d')
            );
        }
        $this->db->where('idartikel', $this->input->post('id'));
        $this->db->update('artikel', $datadb);
    }
}
