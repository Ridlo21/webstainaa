<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Albums extends CI_Controller
{
	public function index()
	{
		if (isset($_POST['kata'])) {
			$keyword = strip_tags($this->input->post('kata'));
			$data['title'] = 'Hasil Pencarian dengan keyword : <span>' . $keyword . '</span>';
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['berita'] = $this->model_albums->semua_berita_cari(0, 5, $keyword);
		} else {
			$data['title'] = 'Semua Albums ';
			$data['description'] = description();
			$data['keywords'] = keywords();
			$jumlah = $this->model_albums->hitungalbum()->num_rows();
			$config['base_url'] = base_url() . 'albums/index';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 2;
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
				$data['album'] = $this->model_albums->semua_album($dari, $config['per_page']);
			} else {
				redirect('albums');
			}
			$this->pagination->initialize($config);
		}
		$this->load->view('utama/header');
		$this->load->view('utama/public_html/list_album', $data);
		$this->load->view('utama/footer');
	}

	// public function detail()
	// {
	// 	$query = $this->model_utama->view_where('album', array('album_seo' => $this->uri->segment(3)));
	// 	if ($query->num_rows() <= 0) {
	// 		redirect('utama');
	// 	} else {
	// 		$row = $query->row_array();
	// 		$jumlah = $this->model_utama->view_where('gallery', array('id_album' => $row['id_album']))->num_rows();
	// 		$config['base_url'] = base_url() . 'albums/detail/' . $this->uri->segment(3);
	// 		$config['total_rows'] = $jumlah;
	// 		$config['per_page'] = 12;
	// 		if ($this->uri->segment('4') == '') {
	// 			$dari = 0;
	// 		} else {
	// 			$dari = $this->uri->segment('4');
	// 		}
	// 		$data['title'] = "Albums $row[jdl_album]";
	// 		$data['description'] = description();
	// 		$data['keywords'] = keywords();
	// 		$data['rows'] = $row;
	// 		if (is_numeric($dari)) {
	// 			$data['detailalbum'] = $this->model_utama->view_join_two('gallery', 'users', 'album', 'username', 'id_album', array('gallery.id_album' => $row['id_album']), 'id_gallery', 'DESC', $dari, $config['per_page']);
	// 		} else {
	// 			redirect('main');
	// 		}
	// 		$this->pagination->initialize($config);

	// 		$dataa = array('hits_album' => $row['hits_album'] + 1);
	// 		$where = array('id_album' => $row['id_album']);
	// 		$this->model_utama->update('album', $dataa, $where);
	// 		// $this->template->load('phpmu-one/template', 'phpmu-one/detailalbum', $data);
	// 		$this->load->view('utama/header');
	// 		$this->load->view('utama/public_html/detail_album', $data);
	// 		$this->load->view('utama/footer');
	// 	}
	// }

	// public function index()
	// {
	// 	if (isset($_POST['kata'])) {
	// 		$keyword = strip_tags($this->input->post('kata'));
	// 		$data['title'] = 'Hasil Pencarian dengan keyword : <span>' . $keyword . '</span>';
	// 		$data['description'] = description();
	// 		$data['keywords'] = keywords();
	// 		$data['berita'] = $this->model_berita->semua_berita_cari(0, 5, $keyword);
	// 	} else {
	// 		$data['title'] = 'Semua Berita ';
	// 		$data['description'] = description();
	// 		$data['keywords'] = keywords();
	// 		$jumlah = $this->model_berita->hitungberita()->num_rows();
	// 		$config['base_url'] = base_url() . 'berita/index';
	// 		$config['total_rows'] = $jumlah;
	// 		$config['per_page'] = 5;
	// 		$config['next_link'] = '<i class="icofont-rounded-right"></i>';
	// 		$config['prev_link'] = '<i class="icofont-rounded-left"></i>';
	// 		$config['first_link'] = 'Awal';
	// 		$config['last_link'] = 'Akhir';
	// 		$config['full_tag_open'] = '<ul class="justify-content-center">';
	// 		$config['full_tag_close'] = '</ul>';
	// 		$config['num_tag_open'] = '<li>';
	// 		$config['num_tag_close'] = '</li>';
	// 		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	// 		$config['cur_tag_close'] = '</a></li>';
	// 		$config['prev_tag_open'] = '<li>';
	// 		$config['prev_tag_close'] = '</li>';
	// 		$config['next_tag_open'] = '<li>';
	// 		$config['next_tag_close'] = '</li>';
	// 		$config['last_tag_open'] = '<li>';
	// 		$config['last_tag_close'] = '</li>';
	// 		$config['first_tag_open'] = '<li>';
	// 		$config['first_tag_close'] = '</li>';
	// 		if ($this->uri->segment('3') != '') {
	// 			$dari = $this->uri->segment('3');
	// 		} else {
	// 			$dari = 0;
	// 		}

	// 		if (is_numeric($dari)) {
	// 			$data['berita'] = $this->model_berita->semua_berita($dari, $config['per_page']);
	// 		} else {
	// 			redirect('berita');
	// 		}
	// 		$this->pagination->initialize($config);
	// 	}
	// 	$this->load->view('utama/header');
	// 	$this->load->view('utama/public_html/list_berita', $data);
	// 	$this->load->view('utama/footer');
	// }


	public function detail()
	{
		$query = $this->model_utama->view_where('album', array('album_seo' => $this->uri->segment(3)));
		if ($query->num_rows() <= 0) {
			redirect('utama');
		} else {
			$row = $query->row_array();
			$jumlah = $this->model_utama->view_where('gallery', array('id_album' => $row['id_album']))->result_array();
			$data['title'] = "Albums $row[jdl_album]";
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['rows'] = $row;
			$data['record'] = $jumlah;
			$this->load->view('utama/header');
			$this->load->view('utama/public_html/detail_album', $data);
			$this->load->view('utama/footer');
		}
	}
}
