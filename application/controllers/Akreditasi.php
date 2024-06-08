<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Akreditasi extends CI_Controller
{
    public function akreditasi_all()
    {
        $name = $this->uri->segment('3');
        // $jumlah = $this->model_akreditasi->hitungakreditasi($name)->num_rows();
        // $config['base_url'] = base_url() . 'akreditasi/' . $name . '/';
        // $config['total_rows'] = $jumlah;
        // $config['per_page'] = 3;
        // $config['next_link'] = '<i class="icofont-rounded-right"></i>';
        // $config['prev_link'] = '<i class="icofont-rounded-left"></i>';
        // $config['first_link'] = 'Awal';
        // $config['last_link'] = 'Akhir';
        // $config['full_tag_open'] = '<ul class="justify-content-center">';
        // $config['full_tag_close'] = '</ul>';
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li class="active"><a href="#">';
        // $config['cur_tag_close'] = '</a></li>';
        // $config['prev_tag_open'] = '<li>';
        // $config['prev_tag_close'] = '</li>';
        // $config['next_tag_open'] = '<li>';
        // $config['next_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li>';
        // $config['last_tag_close'] = '</li>';
        // $config['first_tag_open'] = '<li>';
        // $config['first_tag_close'] = '</li>';
        // if ($this->uri->segment('4') != '') {
        //     $dari = $this->uri->segment('4');
        // } else {
        //     $dari = 0;
        // }

        $data = array('akreditasi_data' => $this->model_akreditasi->akreditasi_get($name));

        $this->load->view('utama/header');
        $this->load->view('utama/public_html/akreditasi', $data);
        $this->load->view('utama/footer');
    }
}
