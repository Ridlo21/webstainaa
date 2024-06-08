<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function artikel_all()
    {
        $name = $this->uri->segment('3');
        $jumlah = $this->model_artikel->hitungartikel($name)->num_rows();
        $config['base_url'] = base_url() . 'artikel/artikel_all/' . $name . '/';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 3;
        $config['next_link'] = '<i class="icofont-rounded-right"></i>';
        $config['prev_link'] = '<i class="icofont-rounded-left"></i>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        if ($this->uri->segment('4') != '') {
            $dari = $this->uri->segment('4');
        } else {
            $dari = 0;
        }

        if (is_numeric($dari)) {
            // $data['agenda'] = $this->model_agenda->semua_agenda();
            $data = array(
                'himpunan' => $this->model_artikel->himpunan_edit('himpunan', array('nama_himpunan' => $name))->row_array(),
                'artikel' => $this->model_artikel->artikelByHimpunan($name, $dari, $config['per_page'])
            );
        } else {
            redirect('agenda');
        }
        $this->pagination->initialize($config);

        $this->load->view('utama/header');
        $this->load->view('utama/public_html/semua_artikel', $data);
        $this->load->view('utama/footer');
    }

    public function detail()
    {
        $name = $this->uri->segment('3');
        $seo = $this->uri->segment('4');
        $data = array(
            'artikel' => $this->model_artikel->artikelByMonth($name, $seo),
            'row' => $this->model_artikel->artikel_edit('artikel', array('judul_seo' => $seo))->row_array(),
        );
        $this->load->view('utama/header');
        $this->load->view('utama/public_html/detail_artikel', $data);
        $this->load->view('utama/footer');
    }
}
