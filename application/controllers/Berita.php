<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends CI_Controller
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
			$jumlah = $this->model_berita->hitungberita()->num_rows();
			$config['base_url'] = base_url() . 'berita/index';
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
				$data['berita'] = $this->model_berita->semua_berita($dari, $config['per_page']);
			} else {
				redirect('berita');
			}
			$this->pagination->initialize($config);
		}
		$this->load->view('utama/header');
		$this->load->view('utama/public_html/semua_berita', $data);
		$this->load->view('utama/footer');
	}

	public function detail()
	{
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM berita where judul_seo='" . $this->db->escape_str($ids) . "'");
		$row = $dat->row();
		$total = $dat->num_rows();
		if ($total == 0) {
			redirect('main');
		}
		$data['title'] = cetak($row->judul);
		$data['description'] = cetak($row->isi_berita);
		$data['keywords'] = keywords();
		$data['record'] = $this->model_berita->berita_detail($ids)->row_array();
		$data['infoterbaru'] = $this->model_berita->info_terbaru(6);
		$this->model_berita->berita_dibaca_update($ids);
		$this->template->load('phpmu-one/template', 'phpmu-one/view_berita', $data);
	}

	public function kategori()
	{
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM kategori where kategori_seo='" . $this->db->escape_str($ids) . "'");
		$row = $dat->row();
		$total = $dat->num_rows();
		if ($total == 0) {
			redirect('main');
		}

		$jumlah = $this->model_berita->hitungberitakategori($row->id_kategori)->num_rows();
		$config['base_url'] = base_url() . 'berita/kategori/' . $row->kategori_seo;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5;
		if ($this->uri->segment('4') != '') {
			$dari = $this->uri->segment('4');
		} else {
			$dari = 0;
		}

		if (is_numeric($dari)) {
			$data['kategori'] = $this->model_berita->detail_kategori($row->id_kategori, $dari, $config['per_page']);
		} else {
			redirect('berita');
		}
		$this->pagination->initialize($config);
		$data['title'] = $row->nama_kategori;
		$data['description'] = description();
		$data['keywords'] = keywords();
		$this->template->load('phpmu-one/template', 'phpmu-one/view_kategori', $data);
	}


	public function detail_berita()
	{
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM berita where judul_seo='" . $this->db->escape_str($ids) . "'");
		$row = $dat->row();
		$total = $dat->num_rows();
		if ($total == 0) {
			redirect('utama');
		}
		$data['title'] = cetak($row->judul);
		$data['description'] = cetak($row->isi_berita);
		$data['keywords'] = keywords();
		$data['record'] = $this->model_berita->berita_detail($ids)->row_array();
		$data['infoterbaru'] = $this->model_berita->info_terbaru(6);
		$this->model_berita->berita_dibaca_update($ids);
		$this->load->view('utama/header', $data);
		$this->load->view('utama/public_html/detail_berita');
		$this->load->view('utama/footer');
	}
}
