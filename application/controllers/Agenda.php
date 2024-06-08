<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Agenda extends CI_Controller
{
	public function index()
	{
		if (isset($_POST['kata'])) {
			$keyword = strip_tags($this->input->post('kata'));
			$data['title'] = 'Hasil Pencarian dengan keyword : <span>' . $keyword . '</span>';
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['berita'] = $this->model_berita->semua_berita_cari(0, 5, $keyword);
		} else {
			$data['title'] = 'Semua Berita ';
			$data['description'] = description();
			$data['keywords'] = keywords();
			$jumlah = $this->model_agenda->hitungagenda()->num_rows();
			$config['base_url'] = base_url() . 'agenda/index';
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
			if ($this->uri->segment('3') != '') {
				$dari = $this->uri->segment('3');
			} else {
				$dari = 0;
			}

			if (is_numeric($dari)) {
				$data['agenda'] = $this->model_agenda->semua_agenda($dari, $config['per_page']);
			} else {
				redirect('agenda');
			}
			$this->pagination->initialize($config);
		}
		$this->load->view('utama/header');
		$this->load->view('utama/public_html/semua_agenda', $data);
		$this->load->view('utama/footer');
	}

	public function detail()
	{
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM agenda where tema_seo='" . $this->db->escape_str($ids) . "'");
		$row = $dat->row();
		$total = $dat->num_rows();
		if ($total == 0) {
			redirect('main');
		}
		$data['title'] = $row->tema;
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['record'] = $this->model_agenda->agenda_detail($ids)->row_array();
		$data['infoterbaru'] = $this->model_berita->info_terbaru(6);
		$this->model_agenda->agenda_dibaca_update($ids);
		// $this->template->load('phpmu-one/template', 'phpmu-one/view_agenda_detail', $data);
		$this->load->view('utama/header');
		$this->load->view('utama/public_html/detail_agenda', $data);
		$this->load->view('utama/footer');
	}
}
