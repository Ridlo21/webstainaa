<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{
    public function index()
    {
        $jumlah = $this->model_berita->hitungberitautama()->num_rows();
        // $data['title'] = title();
        // $data['description'] = description();
        // $data['keywords'] = keywords();
        $config['base_url'] = base_url() . 'utama/index';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 5;
        if ($this->uri->segment('3') != '') {
            $dari = $this->uri->segment('3');
        } else {
            $dari = 0;
        }

        if (is_numeric($dari)) {
            $data = array(
                'utama' => $this->model_berita->utama($dari, $config['per_page'])
            );
        } else {
            redirect('utama');
        }
        $this->pagination->initialize($config);
        $this->load->view('utama/header', $data);
        $this->load->view('utama/public_html/beranda');
        $this->load->view('utama/footer');
    }

    public function tentang()
    {
        $jumlah = $this->model_berita->hitungberitautama()->num_rows();
        $data['title'] = title();
        $data['description'] = description();
        $data['keywords'] = keywords();
        $config['base_url'] = base_url() . 'utama/index';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 5;
        if ($this->uri->segment('3') != '') {
            $dari = $this->uri->segment('3');
        } else {
            $dari = 0;
        }

        if (is_numeric($dari)) {
            $data['utama'] = $this->model_berita->utama($dari, $config['per_page']);
        } else {
            redirect('utama');
        }
        $this->pagination->initialize($config);
        $this->load->view('utama/header', $data);
        $this->load->view('utama/public_html/tentang');
        $this->load->view('utama/footer');
    }

    public function profilstainaa()
    {
        $this->load->view('utama/header');
        $this->load->view('utama/public_html/profilstainaa');
        $this->load->view('utama/footer');
    }

    public function struktur()
    {
        $this->load->view('utama/header');
        $this->load->view('utama/public_html/struktur');
        $this->load->view('utama/footer');
    }

    public function visimisi()
    {
        $this->load->view('utama/header');
        $this->load->view('utama/public_html/visimisi');
        $this->load->view('utama/footer');
    }

    public function tujuan()
    {
        $this->load->view('utama/header');
        $this->load->view('utama/public_html/tujuan');
        $this->load->view('utama/footer');
    }



    // public function pendidikan()
    // {
    //     $jumlah = $this->model_berita->hitungberitautama()->num_rows();
    //     $data['title'] = title();
    //     $data['description'] = description();
    //     $data['keywords'] = keywords();
    //     $config['base_url'] = base_url() . 'utama/index';
    //     $config['total_rows'] = $jumlah;
    //     $config['per_page'] = 5;
    //     if ($this->uri->segment('3') != '') {
    //         $dari = $this->uri->segment('3');
    //     } else {
    //         $dari = 0;
    //     }

    //     if (is_numeric($dari)) {
    //         $data['utama'] = $this->model_berita->utama($dari, $config['per_page']);
    //     } else {
    //         redirect('utama');
    //     }
    //     $this->pagination->initialize($config);
    //     $this->load->view('utama/header', $data);
    //     $this->load->view('utama/public_html/pendidikan');
    //     $this->load->view('utama/footer');
    // }

    public function PAI()
    {
        // $jumlah = $this->model_berita->hitungberitautama()->num_rows();
        $data['title'] = title();
        $data['description'] = description();
        $data['keywords'] = keywords();
        // $config['base_url'] = base_url() . 'utama/index';
        // $config['total_rows'] = $jumlah;
        // $config['per_page'] = 5;
        // if ($this->uri->segment('3') != '') {
        //     $dari = $this->uri->segment('3');
        // } else {
        //     $dari = 0;
        // }

        // if (is_numeric($dari)) {
        //     $data['utama'] = $this->model_berita->utama($dari, $config['per_page']);
        // } else {
        //     redirect('utama');
        // }
        // $this->pagination->initialize($config);
        $this->load->view('utama/header', $data);
        $this->load->view('utama/public_html/PAI');
        $this->load->view('utama/footer');
    }

    public function profilpai()
    {
        $this->load->view('utama/header');
        $this->load->view('utama/public_html/profilpai');
        $this->load->view('utama/footer');
    }

    public function HES()
    {
        // $jumlah = $this->model_berita->hitungberitautama()->num_rows();
        $data['title'] = title();
        $data['description'] = description();
        $data['keywords'] = keywords();
        // $config['base_url'] = base_url() . 'utama/index';
        // $config['total_rows'] = $jumlah;
        // $config['per_page'] = 5;
        // if ($this->uri->segment('3') != '') {
        //     $dari = $this->uri->segment('3');
        // } else {
        //     $dari = 0;
        // }

        // if (is_numeric($dari)) {
        //     $data['utama'] = $this->model_berita->utama($dari, $config['per_page']);
        // } else {
        //     redirect('utama');
        // }
        // $this->pagination->initialize($config);
        $this->load->view('utama/header', $data);
        $this->load->view('utama/public_html/HES');
        $this->load->view('utama/footer');
    }


    public function kemahasiswaan()
    {
        $jumlah = $this->model_berita->hitungberitautama()->num_rows();
        $data['title'] = title();
        $data['description'] = description();
        $data['keywords'] = keywords();
        $config['base_url'] = base_url() . 'utama/index';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 5;
        if ($this->uri->segment('3') != '') {
            $dari = $this->uri->segment('3');
        } else {
            $dari = 0;
        }

        if (is_numeric($dari)) {
            $data['utama'] = $this->model_berita->utama($dari, $config['per_page']);
        } else {
            redirect('utama');
        }
        $this->pagination->initialize($config);
        $this->load->view('utama/header', $data);
        $this->load->view('utama/public_html/kemahasiswaan');
        $this->load->view('utama/footer');
    }

    public function BEM()
    {
        $this->load->view('utama/header');
        $this->load->view('utama/public_html/bem');
        $this->load->view('utama/footer');
    }
    public function UKM()
    {
        $this->load->view('utama/header');
        $this->load->view('utama/public_html/ukm');
        $this->load->view('utama/footer');
    }

    public function pendaftaran()
    {
        $jumlah = $this->model_berita->hitungberitautama()->num_rows();
        $data['title'] = title();
        $data['description'] = description();
        $data['keywords'] = keywords();
        $config['base_url'] = base_url() . 'utama/index';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 5;
        if ($this->uri->segment('3') != '') {
            $dari = $this->uri->segment('3');
        } else {
            $dari = 0;
        }

        if (is_numeric($dari)) {
            $data['utama'] = $this->model_berita->utama($dari, $config['per_page']);
        } else {
            redirect('utama');
        }
        $this->pagination->initialize($config);
        $this->load->view('utama/header', $data);
        $this->load->view('utama/public_html/pendaftaran');
        $this->load->view('utama/footer');
    }

    // public function semua_agenda()
    // {
    //     $jumlah = $this->model_berita->hitungberitautama()->num_rows();
    //     $data['title'] = title();
    //     $data['description'] = description();
    //     $data['keywords'] = keywords();
    //     $config['base_url'] = base_url() . 'utama/index';
    //     $config['total_rows'] = $jumlah;
    //     $config['per_page'] = 5;
    //     if ($this->uri->segment('3') != '') {
    //         $dari = $this->uri->segment('3');
    //     } else {
    //         $dari = 0;
    //     }

    //     if (is_numeric($dari)) {
    //         $data['utama'] = $this->model_berita->utama($dari, $config['per_page']);
    //     } else {
    //         redirect('utama');
    //     }
    //     $this->pagination->initialize($config);
    //     $this->load->view('utama/header', $data);
    //     $this->load->view('utama/public_html/semua_agenda');
    //     $this->load->view('utama/footer');
    // }

    // public function detail_agenda()
    // {
    //     $id = $this->uri->segment(3);
    //     $data['row'] = $this->model_agenda->agenda_detail($id);

    // }
}
