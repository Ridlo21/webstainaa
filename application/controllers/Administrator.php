<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Administrator extends CI_Controller
{
	function index()
	{
		if (isset($_POST['submit'])) {
			if ($this->input->post()) {
				$username = $this->input->post('a');
				$cek_user = $this->model_app->cek_user($username, 'users');
				$row_user = $cek_user->row_array();
				$total_user = $cek_user->num_rows();
				if ($total_user > 0) {
					$password = hash("sha512", md5($this->input->post('b')));
					$cek_pass = $this->model_app->cek_pass($password, 'users');
					$row_pass = $cek_pass->row_array();
					$total_pass = $cek_pass->num_rows();
					if ($total_pass > 0) {
						$this->session->set_userdata('upload_image_file_manager', true);
						$this->session->set_userdata(array(
							'username' => $row_pass['username'],
							'foto' => $row_pass['foto'],
							'level' => $row_pass['level'],
							'id_session' => $row_pass['id_session']
						));
						redirect($this->uri->segment(1) . '/home');
					} else {
						echo $this->session->set_flashdata('message', '<div class="alert alert-danger"><center>Password Salah!!</center></div>');
						redirect($this->uri->segment(1) . '/index');
					}
				} else {
					echo $this->session->set_flashdata('message', '<div class="alert alert-danger"><center>Username Salah!!</center></div>');
					redirect($this->uri->segment(1) . '/index');
				}
			}
		} else {
			if ($this->session->level != '') {
				redirect($this->uri->segment(1) . '/home');
			} else {
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login', $data);
			}
		}
	}
	
	function reset_password()
	{
		if (isset($_POST['submit'])) {
			$usr = $this->model_app->edit('users', array('username' => $this->input->post('a')));
			if ($usr->num_rows() >= 1 ) {
				if ($this->input->post('b') == $this->input->post('c')) {
					$row = $usr->row_array();
					$data = array(
						'password' => hash("sha512", md5($this->input->post('b'))),
						'id_session' => md5($this->input->post('b'))
					);
					$where = array('username' => $this->input->post('a'));
					$this->model_app->update('users', $data, $where);
					
					$this->session->set_userdata('upload_image_file_manager', true);
					$this->session->set_userdata(array(
						'username' => $row['username'],
						'foto' => $row['foto'],
						'level' => $row['level'],
						'id_session' => $row['id_session']
					));
					redirect($this->uri->segment(1) . '/home');
				} else {
					echo $this->session->set_flashdata('msg', '<div class="msg alert alert-danger"><center> Password Tidak Sama !! </center></div>');
					redirect($this->uri->segment(1) . '/resetpassword');
				}
			} else {
				echo $this->session->set_flashdata('msg', '<div class="msg alert alert-danger"><center> Username Tidak Terdaftar !! </center></div>');
				redirect($this->uri->segment(1) . '/resetpassword');
			}
		} else {
			$data['title'] = 'Reset Password';
			$this->load->view('administrator/view_reset', $data);
		}
	}
	
	function resetpassword()
	{
		// $this->session->set_userdata(array('id_session' => $this->uri->segment(3)));
		$data['title'] = 'Reset Password !';
		$this->load->view('administrator/view_reset', $data);
	}

	function home()
	{
		cek_session_admin();
		$this->template->load('administrator/template', 'administrator/view_home');
	}

	function identitaswebsite()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_main->identitas_update();
			redirect('administrator/identitaswebsite');
		} else {
			$data['record'] = $this->model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_identitas/view_identitas', $data);
		}
	}

	function idn()
	{
		cek_session_admin();
		$this->load->model('Model_idn');
		$data['record'] = $this->Model_idn->menu_idn();
		$this->template->load('administrator/template', 'administrator/mod_idn/view_idn', $data);
	}

	function tambah_idn()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_menu->menu_idn_tambah();
			redirect('administrator/idn');
		} else {
			// $data['record'] = $this->model_menu->menu_utama();
			$this->template->load('administrator/template', 'administrator/mod_idn/view_idn_tambah');
		}
	}

	function edit_idn()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_menu->menu_idn_update();
			redirect('administrator/idn');
		} else {
			$data['rows'] = $this->model_menu->idn_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_idn/view_idn_edit', $data);
		}
	}

	// Controller Modul Menu Website

	function menuwebsite()
	{
		cek_session_admin();
		$data['record'] = $this->model_menu->menu_website();
		$this->template->load('administrator/template', 'administrator/mod_menu/view_menu', $data);
	}

	function delete_idn()
	{
		$id = $this->uri->segment(3);
		$this->model_menu->idn_delete($id);
		redirect('administrator/idn');
	}



	// Controller Modul Halaman Baru

	function halamanbaru()
	{
		cek_session_admin();
		$data['record'] = $this->model_halaman->halamanstatis();
		$this->template->load('administrator/template', 'administrator/mod_halaman/view_halaman', $data);
	}

	function tambah_halamanbaru()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_halaman->halamanstatis_tambah();
			redirect('administrator/halamanbaru');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_halaman/view_halaman_tambah');
		}
	}

	function edit_halamanbaru()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_halaman->halamanstatis_update();
			redirect('administrator/halamanbaru');
		} else {
			$data['rows'] = $this->model_halaman->halamanstatis_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_halaman/view_halaman_edit', $data);
		}
	}

	function delete_halamanbaru()
	{
		$id = $this->uri->segment(3);
		$this->model_halaman->halamanstatis_delete($id);
		redirect('administrator/halamanbaru');
	}

	// Controller Modul List Berita

	function listberita()
	{
		cek_session_admin();
		$data['record'] = $this->model_berita->list_berita();
		$data['rss'] = $this->model_utama->view_joinn('berita', 'users', 'kategori', 'username', 'id_kategori', 'id_berita', 'DESC', 0, 10);
		$data['iden'] = $this->model_utama->view_where('identitas', array('id_identitas' => 1))->row_array();
		$this->load->view('administrator/rss', $data);
		$this->template->load('administrator/template', 'administrator/mod_berita/view_berita', $data);
	}

	function tambah_listberita()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_berita->list_berita_tambah();
			redirect('administrator/listberita');
		} else {
			// $data['tag'] = $this->model_berita->tag_berita();
			// 			$data['record'] = $this->model_berita->kategori_berita();
			$this->template->load('administrator/template', 'administrator/mod_berita/view_berita_tambah');
		}
	}

	function cepat_listberita()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_berita->list_berita_cepat();
			redirect('administrator/listberita');
		} else {
			redirect('administrator/listberita');
		}
	}

	function edit_listberita()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_berita->list_berita_update();
			redirect('administrator/listberita');
		} else {
			// 			$data['tag'] = $this->model_berita->tag_berita();
			// 			$data['record'] = $this->model_berita->kategori_berita();
			$data['rows'] = $this->model_berita->list_berita_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_berita/view_berita_edit', $data);
		}
	}

	function delete_listberita()
	{
		$id = $this->uri->segment(3);
		$this->model_berita->list_berita_delete($id);
		redirect('administrator/listberita');
	}


	// Controller Modul Kategori Berita

	function kategoriberita()
	{
		cek_session_admin();
		$data['record'] = $this->model_berita->kategori_berita();
		$this->template->load('administrator/template', 'administrator/mod_kategori/view_kategori', $data);
	}

	function tambah_kategoriberita()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_berita->kategori_berita_tambah();
			redirect('administrator/kategoriberita');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_kategori/view_kategori_tambah');
		}
	}

	function edit_kategoriberita()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_berita->kategori_berita_update();
			redirect('administrator/kategoriberita');
		} else {
			$data['rows'] = $this->model_berita->kategori_berita_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_kategori/view_kategori_edit', $data);
		}
	}

	function delete_kategoriberita()
	{
		$id = $this->uri->segment(3);
		$this->model_berita->kategori_berita_delete($id);
		redirect('administrator/kategoriberita');
	}



	// Controller Modul Menu Group

	function menugroup()
	{
		cek_session_admin();
		$data['record'] = $this->model_menu->menugroup();
		$this->template->load('administrator/template', 'administrator/mod_menugroup/view_menugroup', $data);
	}

	function edit_menugroup()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_menu->menugroup_update();
			redirect('administrator/menugroup');
		} else {
			$data['rows'] = $this->model_menu->menugroup_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_menugroup/view_menugroup_edit', $data);
		}
	}



	// Controller Modul List Berita

	function menugrouplist()
	{
		cek_session_admin();
		$data['record'] = $this->model_menu->menugrouplist();
		$this->template->load('administrator/template', 'administrator/mod_menugroup_list/view_menugroup_list', $data);
	}

	function tambah_menugrouplist()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_menu->menugrouplist_tambah();
			redirect('administrator/menugrouplist');
		} else {
			$data['record'] = $this->model_menu->menugroup();
			$this->template->load('administrator/template', 'administrator/mod_menugroup_list/view_menugroup_list_tambah', $data);
		}
	}

	function edit_menugrouplist()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_menu->menugrouplist_update();
			redirect('administrator/menugrouplist');
		} else {
			$data['record'] = $this->model_menu->menugroup();
			$data['rows'] = $this->model_menu->menugrouplist_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_menugroup_list/view_menugroup_list_edit', $data);
		}
	}

	function delete_menugrouplist()
	{
		$id = $this->uri->segment(3);
		$this->model_menu->menugrouplist_delete($id);
		redirect('administrator/menugrouplist');
	}




	// Controller Modul Tag Berita

	function tagberita()
	{
		cek_session_admin();
		$data['record'] = $this->model_berita->tag_berita();
		$this->template->load('administrator/template', 'administrator/mod_tag/view_tag', $data);
	}

	function tambah_tagberita()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_berita->tag_berita_tambah();
			redirect('administrator/tagberita');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_tag/view_tag_tambah');
		}
	}

	function edit_tagberita()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_berita->tag_berita_update();
			redirect('administrator/tagberita');
		} else {
			$data['rows'] = $this->model_berita->tag_berita_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_tag/view_tag_edit', $data);
		}
	}

	function delete_tagberita()
	{
		$id = $this->uri->segment(3);
		$this->model_berita->tag_berita_delete($id);
		redirect('administrator/tagberita');
	}



	// Controller Modul Iklan Home

	function iklanhome()
	{
		cek_session_admin();
		$data['record'] = $this->model_iklan->iklan_tengah();
		$this->template->load('administrator/template', 'administrator/mod_iklanhome/view_iklanhome', $data);
	}

	function tambah_iklanhome()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_iklan->iklan_tengah_tambah();
			redirect('administrator/iklanhome');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_iklanhome/view_iklanhome_tambah');
		}
	}

	function edit_iklanhome()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_iklan->iklan_tengah_update();
			redirect('administrator/iklanhome');
		} else {
			$data['rows'] = $this->model_iklan->iklan_tengah_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_iklanhome/view_iklanhome_edit', $data);
		}
	}

	function delete_iklanhome()
	{
		$id = $this->uri->segment(3);
		$this->model_iklan->iklan_tengah_delete($id);
		redirect('administrator/iklanhome');
	}



	// Controller Modul Download

	function download()
	{
		cek_session_admin();
		$data['record'] = $this->model_download->download();
		$this->template->load('administrator/template', 'administrator/mod_download/view_download', $data);
	}

	function tambah_download()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_download->download_tambah();
			redirect('administrator/download');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_download/view_download_tambah');
		}
	}

	function edit_download()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_download->download_update();
			redirect('administrator/download');
		} else {
			$data['rows'] = $this->model_download->download_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_download/view_download_edit', $data);
		}
	}

	function delete_download()
	{
		$id = $this->uri->segment(3);
		$this->model_download->download_delete($id);
		redirect('administrator/download');
	}




	// Controller Modul Lowker

	function lowker()
	{
		cek_session_admin();
		$data['record'] = $this->model_lowongan->lowker();
		$this->template->load('administrator/template', 'administrator/mod_lowker/view_lowker', $data);
	}

	function tambah_lowker()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_lowongan->lowker_tambah();
			redirect('administrator/lowker');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_lowker/view_lowker_tambah');
		}
	}

	function edit_lowker()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_lowongan->lowker_update();
			redirect('administrator/lowker');
		} else {
			$data['rows'] = $this->model_lowongan->lowker_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_lowker/view_lowker_edit', $data);
		}
	}

	function delete_lowker()
	{
		$id = $this->uri->segment(3);
		$this->model_lowongan->lowker_delete($id);
		redirect('administrator/lowker');
	}



	// Controller Modul Iklan Sidebar

	function iklansidebar()
	{
		cek_session_admin();
		$data['record'] = $this->model_iklan->iklan_sidebar();
		$this->template->load('administrator/template', 'administrator/mod_iklansidebar/view_iklansidebar', $data);
	}

	function tambah_iklansidebar()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_iklan->iklan_sidebar_tambah();
			redirect('administrator/iklansidebar');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_iklansidebar/view_iklansidebar_tambah');
		}
	}

	function edit_iklansidebar()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_iklan->iklan_sidebar_update();
			redirect('administrator/iklansidebar');
		} else {
			$data['rows'] = $this->model_iklan->iklan_sidebar_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_iklansidebar/view_iklansidebar_edit', $data);
		}
	}

	function delete_iklansidebar()
	{
		$id = $this->uri->segment(3);
		$this->model_iklan->iklan_sidebar_delete($id);
		redirect('administrator/iklansidebar');
	}



	// Controller Modul Logo

	function logowebsite()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_main->logo_update();
			redirect('administrator/logowebsite');
		} else {
			$data['record'] = $this->model_main->logo();
			$this->template->load('administrator/template', 'administrator/mod_logowebsite/view_logowebsite', $data);
		}
	}



	// Controller Modul Template Website

	function templatewebsite()
	{
		cek_session_admin();
		$data['record'] = $this->model_main->template();
		$this->template->load('administrator/template', 'administrator/mod_template/view_template', $data);
	}

	function tambah_templatewebsite()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_main->template_tambah();
			redirect('administrator/templatewebsite');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_template/view_template_tambah');
		}
	}

	function edit_templatewebsite()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_main->template_update();
			redirect('administrator/templatewebsite');
		} else {
			$data['rows'] = $this->model_main->template_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_template/view_template_edit', $data);
		}
	}

	function delete_templatewebsite()
	{
		$id = $this->uri->segment(3);
		$this->model_main->template_delete($id);
		redirect('administrator/templatewebsite');
	}




	// Controller Modul Agenda

	function agenda()
	{
		cek_session_admin();
		$data['record'] = $this->model_agenda->agenda();
		$this->template->load('administrator/template', 'administrator/mod_agenda/view_agenda', $data);
	}

	function tambah_agenda()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_agenda->agenda_tambah();
			redirect('administrator/agenda');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_agenda/view_agenda_tambah');
		}
	}

	function edit_agenda()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_agenda->agenda_update();
			redirect('administrator/agenda');
		} else {
			$data['rows'] = $this->model_agenda->agenda_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_agenda/view_agenda_edit', $data);
		}
	}

	function delete_agenda()
	{
		$id = $this->uri->segment(3);
		$this->model_agenda->agenda_delete($id);
		redirect('administrator/agenda');
	}




	// Controller Modul YM

	function ym()
	{
		cek_session_admin();
		$data['record'] = $this->model_main->ym();
		$this->template->load('administrator/template', 'administrator/mod_ym/view_ym', $data);
	}

	function tambah_ym()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_main->ym_tambah();
			redirect('administrator/ym');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_ym/view_ym_tambah');
		}
	}

	function edit_ym()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_main->ym_update();
			redirect('administrator/ym');
		} else {
			$data['rows'] = $this->model_main->ym_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_ym/view_ym_edit', $data);
		}
	}

	function delete_ym()
	{
		$id = $this->uri->segment(3);
		$this->model_main->ym_delete($id);
		redirect('administrator/ym');
	}




	// Controller Modul Pesan Masuk

	function pesanmasuk()
	{
		cek_session_admin();
		$data['record'] = $this->model_main->pesan_masuk();
		$this->template->load('administrator/template', 'administrator/mod_pesanmasuk/view_pesanmasuk', $data);
	}

	function detail_pesanmasuk()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		$this->db->query("UPDATE hubungi SET dibaca='Y' where id_hubungi='$id'");
		if (isset($_POST['submit'])) {
			$this->model_main->pesan_masuk_kirim();
			$data['rows'] = $this->model_main->pesan_masuk_view($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_pesanmasuk/view_pesanmasuk_detail', $data);
		} else {
			$data['rows'] = $this->model_main->pesan_masuk_view($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_pesanmasuk/view_pesanmasuk_detail', $data);
		}
	}




	// Controller Modul User

	function manajemenuser()
	{
		cek_session_admin();
		$data['record'] = $this->model_users->users();
		$this->template->load('administrator/template', 'administrator/mod_users/view_users', $data);
	}

	function tambah_manajemenuser()
	{
		cek_session_admin();
		$id = $this->session->username;
		if (isset($_POST['submit'])) {
			$this->model_users->users_tambah();
			redirect('administrator/manajemenuser');
		} else {
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_users/view_users_tambah', $data);
		}
	}

	function edit_manajemenuser()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_users->users_update();
			redirect('administrator/manajemenuser');
		} else {
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_users/view_users_edit', $data);
		}
	}

	function delete_manajemenuser()
	{
		$id = $this->uri->segment(3);
		$this->model_users->users_delete($id);
		redirect('administrator/manajemenuser');
	}




	// Controller Modul Modul

	function manajemenmodul()
	{
		cek_session_admin();
		$data['record'] = $this->model_modul->modul();
		$this->template->load('administrator/template', 'administrator/mod_modul/view_modul', $data);
	}

	function tambah_manajemenmodul()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_modul->modul_tambah();
			redirect('administrator/manajemenmodul');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_modul/view_modul_tambah');
		}
	}

	function edit_manajemenmodul()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_modul->modul_update();
			redirect('administrator/manajemenmodul');
		} else {
			$data['rows'] = $this->model_modul->modul_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_modul/view_modul_edit', $data);
		}
	}

	function delete_manajemenmodul()
	{
		$id = $this->uri->segment(3);
		$this->model_modul->modul_delete($id);
		redirect('administrator/manajemenmodul');
	}

	// Controller Modul Album

	function album()
	{
		if ($this->session->level == 'admin') {
			$data['record'] = $this->model_app->view_ordering('album', 'id_album', 'DESC');
		} else {
			$data['record'] = $this->model_app->view_where_ordering('album', array('username' => $this->session->username), 'id_album', 'DESC');
		}
		$this->template->load('administrator/template', 'administrator/mod_album/view_album', $data);
	}

	function tambah_album()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/img_album/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('c');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'jdl_album' => $this->input->post('a'),
					'album_seo' => seo_title($this->input->post('a')),
					'keterangan' => $this->input->post('b'),
					'aktif' => 'Y',
					'hits_album' => '0',
					'tgl_posting' => date('Y-m-d'),
					'jam' => date('H:i:s'),
					'hari' => hari_ini(date('w')),
					'username' => $this->session->username
				);
			} else {
				$data = array(
					'jdl_album' => $this->input->post('a'),
					'album_seo' => seo_title($this->input->post('a')),
					'keterangan' => $this->input->post('b'),
					'gbr_album' => $hasil['file_name'],
					'aktif' => 'Y',
					'hits_album' => '0',
					'tgl_posting' => date('Y-m-d'),
					'jam' => date('H:i:s'),
					'hari' => hari_ini(date('w')),
					'username' => $this->session->username
				);
			}

			$this->model_app->insert('album', $data);
			redirect('administrator/album');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_album/view_album_tambah');
		}
	}

	function edit_album()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/img_album/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('c');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'jdl_album' => $this->input->post('a'),
					'album_seo' => seo_title($this->input->post('a')),
					'keterangan' => $this->input->post('b'),
					'aktif' => $this->input->post('d')
				);
			} else {
				$data = array(
					'jdl_album' => $this->input->post('a'),
					'album_seo' => seo_title($this->input->post('a')),
					'keterangan' => $this->input->post('b'),
					'gbr_album' => $hasil['file_name'],
					'aktif' => $this->input->post('d')
				);
			}
			$where = array('id_album' => $this->input->post('id'));
			$this->model_app->update('album', $data, $where);
			redirect('administrator/album');
		} else {
			if ($this->session->level == 'admin') {
				$proses = $this->model_app->edit('album', array('id_album' => $id))->row_array();
			} else {
				$proses = $this->model_app->edit('album', array('id_album' => $id, 'username' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$this->template->load('administrator/template', 'administrator/mod_album/view_album_edit', $data);
		}
	}

	function delete_album()
	{
		if ($this->session->level == 'admin') {
			$id = array('id_album' => $this->uri->segment(3));
		} else {
			$id = array('id_album' => $this->uri->segment(3), 'username' => $this->session->username);
		}
		$this->model_app->delete('album', $id);
		redirect('administrator/album');
	}


	// Controller Modul Gallery

	function gallery()
	{
		if ($this->session->level == 'admin') {
			$data['record'] = $this->model_app->view_join_one('gallery', 'album', 'id_album', 'id_gallery', 'DESC');
		} else {
			$data['record'] = $this->model_app->view_join_where('gallery', 'album', 'id_album', array('gallery.username' => $this->session->username), 'id_gallery', 'DESC');
		}
		$this->template->load('administrator/template', 'administrator/mod_gallery/view_gallery', $data);
	}

	function tambah_gallery()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/img_galeri/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('d');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'id_album' => $this->input->post('a'),
					'username' => $this->session->username,
					'jdl_gallery' => $this->input->post('b'),
					'gallery_seo' => seo_title($this->input->post('b')),
					'keterangan' => $this->input->post('c')
				);
			} else {
				$data = array(
					'id_album' => $this->input->post('a'),
					'username' => $this->session->username,
					'jdl_gallery' => $this->input->post('b'),
					'gallery_seo' => seo_title($this->input->post('b')),
					'keterangan' => $this->input->post('c'),
					'gbr_gallery' => $hasil['file_name']
				);
			}
			$this->model_app->insert('gallery', $data);
			redirect('administrator/gallery');
		} else {
			$data['record'] = $this->model_app->view_ordering('album', 'id_album', 'DESC');
			$this->template->load('administrator/template', 'administrator/mod_gallery/view_gallery_tambah', $data);
		}
	}

	function edit_gallery()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/img_galeri/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('d');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'id_album' => $this->input->post('a'),
					'username' => $this->session->username,
					'jdl_gallery' => $this->input->post('b'),
					'gallery_seo' => seo_title($this->input->post('b')),
					'keterangan' => $this->input->post('c')
				);
			} else {
				$data = array(
					'id_album' => $this->input->post('a'),
					'username' => $this->session->username,
					'jdl_gallery' => $this->input->post('b'),
					'gallery_seo' => seo_title($this->input->post('b')),
					'keterangan' => $this->input->post('c'),
					'gbr_gallery' => $hasil['file_name']
				);
			}
			$where = array('id_gallery' => $this->input->post('id'));
			$this->model_app->update('gallery', $data, $where);
			redirect('administrator/gallery');
		} else {
			$record = $this->model_app->view_ordering('album', 'id_album', 'DESC');
			if ($this->session->level == 'admin') {
				$proses = $this->model_app->edit('gallery', array('id_gallery' => $id))->row_array();
			} else {
				$proses = $this->model_app->edit('gallery', array('id_gallery' => $id, 'username' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses, 'record' => $record);
			$this->template->load('administrator/template', 'administrator/mod_gallery/view_gallery_edit', $data);
		}
	}

	function delete_gallery()
	{
		if ($this->session->level == 'admin') {
			$id = array('id_gallery' => $this->uri->segment(3));
		} else {
			$id = array('id_gallery' => $this->uri->segment(3), 'username' => $this->session->username);
		}
		$this->model_app->delete('gallery', $id);
		redirect('administrator/gallery');
	}


	// Controller Modul Video

	function video()
	{
		if ($this->session->level == 'admin') {
			$data['record'] = $this->model_app->view_join_one('video', 'playlist', 'id_playlist', 'id_video', 'DESC');
		} else {
			$data['record'] = $this->model_app->view_join_where('video', 'playlist', 'id_playlist', array('video.username' => $this->session->username), 'id_video', 'DESC');
		}
		$this->template->load('administrator/template', 'administrator/mod_video/view_video', $data);
	}

	function tambah_video()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/img_video/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('d');
			$hasil = $this->upload->data();

			if ($this->input->post('f') != '') {
				$tag_seo = $this->input->post('f');
				$tag = implode(',', $tag_seo);
			} else {
				$tag = '';
			}

			if ($hasil['file_name'] == '') {
				$data = array(
					'id_playlist' => $this->input->post('a'),
					'username' => $this->session->username,
					'jdl_video' => $this->input->post('b'),
					'video_seo' => seo_title($this->input->post('b')),
					'keterangan' => $this->input->post('c'),
					'video' => '',
					'youtube' => str_replace("watch?v=", "embed/", $this->input->post('e')),
					'dilihat' => '0',
					'hari' => hari_ini(date('w')),
					'tanggal' => date('Y-m-d'),
					'jam' => date('H:i:s'),
					'tagvid' => $tag
				);
			} else {
				$data = array(
					'id_playlist' => $this->input->post('a'),
					'username' => $this->session->username,
					'jdl_video' => $this->input->post('b'),
					'video_seo' => seo_title($this->input->post('b')),
					'keterangan' => $this->input->post('c'),
					'gbr_video' => $hasil['file_name'],
					'video' => '',
					'youtube' => $this->input->post('e'),
					'dilihat' => '0',
					'hari' => hari_ini(date('w')),
					'tanggal' => date('Y-m-d'),
					'jam' => date('H:i:s'),
					'tagvid' => $tag
				);
			}
			$this->model_app->insert('video', $data);
			redirect('administrator/video');
		} else {
			$data['record'] = $this->model_app->view_ordering('playlist', 'id_playlist', 'DESC');
			// $data['tag'] = $this->model_app->view_ordering('tagvid', 'id_tag', 'DESC');
			$this->template->load('administrator/template', 'administrator/mod_video/view_video_tambah', $data);
		}
	}

	function edit_video()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/img_video/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('d');
			$hasil = $this->upload->data();

			if ($this->input->post('f') != '') {
				$tag_seo = $this->input->post('f');
				$tag = implode(',', $tag_seo);
			} else {
				$tag = '';
			}

			if ($hasil['file_name'] == '') {
				$data = array(
					'id_playlist' => $this->input->post('a'),
					'username' => $this->session->username,
					'jdl_video' => $this->input->post('b'),
					'video_seo' => seo_title($this->input->post('b')),
					'keterangan' => $this->input->post('c'),
					'video' => '',
					'youtube' => $this->input->post('e'),
					'tagvid' => $tag
				);
			} else {
				$data = array(
					'id_playlist' => $this->input->post('a'),
					'username' => $this->session->username,
					'jdl_video' => $this->input->post('b'),
					'video_seo' => seo_title($this->input->post('b')),
					'keterangan' => $this->input->post('c'),
					'gbr_video' => $hasil['file_name'],
					'video' => '',
					'youtube' => $this->input->post('e'),
					'tagvid' => $tag
				);
			}

			$where = array('id_video' => $this->input->post('id'));
			$this->model_app->update('video', $data, $where);
			redirect('administrator/video');
		} else {
			$record = $this->model_app->view_ordering('playlist', 'id_playlist', 'DESC');
			// $tag = $this->model_app->view_ordering('tagvid', 'id_tag', 'DESC');
			if ($this->session->level == 'admin') {
				$proses = $this->model_app->edit('video', array('id_video' => $id))->row_array();
			} else {
				$proses = $this->model_app->edit('video', array('id_video' => $id, 'username' => $this->session->username))->row_array();
			}

			$data = array('rows' => $proses, 'record' => $record);
			$this->template->load('administrator/template', 'administrator/mod_video/view_video_edit', $data);
		}
	}

	function delete_video()
	{
		if ($this->session->level == 'admin') {
			$id = array('id_video' => $this->uri->segment(3));
		} else {
			$id = array('id_video' => $this->uri->segment(3), 'username' => $this->session->username);
		}
		$this->model_app->delete('video', $id);
		redirect('administrator/video');
	}


	// Controller Modul Playlist

	function playlist()
	{
		$data['record'] = $this->model_app->view_ordering('playlist', 'id_playlist', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_playlist/view_playlist', $data);
	}

	function tambah_playlist()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/img_playlist/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('b');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'jdl_playlist' => $this->input->post('a'),
					'username' => $this->session->username,
					'playlist_seo' => seo_title($this->input->post('a')),
					'aktif' => 'Y'
				);
			} else {
				$data = array(
					'jdl_playlist' => $this->input->post('a'),
					'username' => $this->session->username,
					'playlist_seo' => seo_title($this->input->post('a')),
					'gbr_playlist' => $hasil['file_name'],
					'aktif' => 'Y'
				);
			}
			$this->model_app->insert('playlist', $data);
			redirect('administrator/playlist');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_playlist/view_playlist_tambah');
		}
	}

	function edit_playlist()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/img_playlist/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('b');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'jdl_playlist' => $this->input->post('a'),
					'username' => $this->session->username,
					'playlist_seo' => seo_title($this->input->post('a')),
					'aktif' => $this->input->post('c')
				);
			} else {
				$data = array(
					'jdl_playlist' => $this->input->post('a'),
					'username' => $this->session->username,
					'playlist_seo' => seo_title($this->input->post('a')),
					'gbr_playlist' => $hasil['file_name'],
					'aktif' => $this->input->post('c')
				);
			}
			$where = array('id_playlist' => $this->input->post('id'));
			$this->model_app->update('playlist', $data, $where);
			redirect('administrator/playlist');
		} else {
			$proses = $this->model_app->edit('playlist', array('id_playlist' => $id))->row_array();
			$data = array('rows' => $proses);
			$this->template->load('administrator/template', 'administrator/mod_playlist/view_playlist_edit', $data);
		}
	}

	function delete_playlist()
	{
		$id = array('id_playlist' => $this->uri->segment(3));
		$this->model_app->delete('playlist', $id);
		redirect('administrator/playlist');
	}


	// Controller Modul Tag Video

	function tagvideo()
	{
		if ($this->session->level == 'admin') {
			$data['record'] = $this->model_app->view_ordering('tagvid', 'id_tag', 'DESC');
		} else {
			$data['record'] = $this->model_app->view_where_ordering('tagvid', array('username' => $this->session->username), 'id_tag', 'DESC');
		}
		$this->template->load('administrator/template', 'administrator/mod_tagvideo/view_tag', $data);
	}

	function tambah_tagvideo()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'nama_tag' => $this->db->escape_str($this->input->post('a')),
				'username' => $this->session->username,
				'tag_seo' => seo_title($this->input->post('a')),
				'count' => '0'
			);
			$this->model_app->insert('tagvid', $data);
			redirect('administrator/tagvideo');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_tagvideo/view_tag_tambah');
		}
	}

	function edit_tagvideo()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'nama_tag' => $this->db->escape_str($this->input->post('a')),
				'username' => $this->session->username,
				'tag_seo' => seo_title($this->input->post('a'))
			);
			$where = array('id_tag' => $this->input->post('id'));
			$this->model_app->update('tagvid', $data, $where);
			redirect('administrator/tagvideo');
		} else {
			if ($this->session->level == 'admin') {
				$proses = $this->model_app->edit('tagvid', array('id_tag' => $id))->row_array();
			} else {
				$proses = $this->model_app->edit('tagvid', array('id_tag' => $id, 'username' => $this->session->username))->row_array();
			}

			$data = array('rows' => $proses);
			$this->template->load('administrator/template', 'administrator/mod_tagvideo/view_tag_edit', $data);
		}
	}

	function delete_tagvideo()
	{
		if ($this->session->level == 'admin') {
			$id = array('id_tag' => $this->uri->segment(3));
		} else {
			$id = array('id_tag' => $this->uri->segment(3), 'username' => $this->session->username);
		}
		$this->model_app->delete('tagvid', $id);
		redirect('administrator/tagvideo');
	}



	// Controller Modul Link Terkait

	function linkterkait()
	{
		$data['record'] = $this->model_app->view_ordering('link_terkait', 'id_link_terkait', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_linkterkait/view_linkterkait', $data);
	}

	function edit_linkterkait()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'judul_menu' => $this->input->post('a'),
				'detail_menu' => $this->input->post('b'),
				'link' => $this->input->post('c')
			);
			$where = array('id_link_terkait' => $this->input->post('id'));
			$this->model_app->update('link_terkait', $data, $where);
			redirect('administrator/linkterkait');
		} else {
			$proses = $this->model_app->edit('link_terkait', array('id_link_terkait' => $id))->row_array();
			$data = array('rows' => $proses);
			$this->template->load('administrator/template', 'administrator/mod_linkterkait/view_linkterkait_edit', $data);
		}
	}

	// Controller Modul jabatan

	function jabatan()
	{
		$data['record'] = $this->model_app->view_ordering('jabatan', 'id_jabatan', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_jabatan/view_jabatan', $data);
	}

	function tambah_jabatan()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'jabatan' => $this->db->escape_str($this->input->post('a')),
			);
			$this->model_app->insert('jabatan', $data);
			redirect('administrator/jabatan');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_jabatan/view_jabatan_tambah');
		}
	}

	function edit_jabatan()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'jabatan' => $this->input->post('a'),
			);
			$where = array('id_jabatan' => $this->input->post('id'));
			$this->model_app->update('jabatan', $data, $where);
			redirect('administrator/jabatan');
		} else {
			$proses = $this->model_app->edit('jabatan', array('id_jabatan' => $id))->row_array();
			$data = array('rows' => $proses);
			$this->template->load('administrator/template', 'administrator/mod_jabatan/view_jabatan_edit', $data);
		}
	}
	function delete_jabatan()
	{
		cek_session_admin();
		$id = array('id_jabatan' => $this->uri->segment(3));
		$this->model_app->delete('jabatan', $id);
		redirect($this->uri->segment(1) . '/jabatan');
	}

	// Controller Modul jabatan

	function struktur()
	{
		$data['record'] = $this->model_app->view_join_one('struktur', 'jabatan', 'id_jabatan', 'id_struktur', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_struktur/view_struktur', $data);
	}
	function tambah_struktur()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/foto_struktur/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('d');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'nama' => $this->input->post('a'),
					'id_jabatan' => $this->input->post('b'),
					'tgl_diangkat' => $this->input->post('c'),
					'status' => 'Aktif'
				);
			} else {
				$data = array(
					'nama' => $this->input->post('a'),
					'id_jabatan' => $this->input->post('b'),
					'tgl_diangkat' => $this->input->post('c'),
					'foto' => $hasil['file_name'],
					'status' => 'Aktif'
				);
			}
			$this->model_app->insert('struktur', $data);
			redirect('administrator/struktur');
		} else {
			$data['record'] = $this->db->from('jabatan')->get();
			$this->template->load('administrator/template', 'administrator/mod_struktur/view_struktur_tambah', $data);
		}
	}

	function edit_struktur()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/foto_struktur/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('e');
			$hasil = $this->upload->data();
			$i = $this->input->post('id');
			if ($hasil['file_name'] == '') {
				$data = array(
					'nama' => $this->input->post('a'),
					'id_jabatan' => $this->input->post('b'),
					'tgl_diangkat' => $this->input->post('c'),
					'status' =>  $this->input->post('d')
				);
			} else {
				unlink('asset/foto_struktur/' . $this->input->post('f'));
				$data = array(
					'nama' => $this->input->post('a'),
					'id_jabatan' => $this->input->post('b'),
					'tgl_diangkat' => $this->input->post('c'),
					'foto' => $hasil['file_name'],
					'status' =>  $this->input->post('d')
				);
			}
			$where = array('id_struktur' => $i);
			$this->model_app->update('struktur', $data, $where);
			redirect('administrator/struktur');
		} else {
			$proses = $this->model_app->edit('struktur', array('id_struktur' => $id))->row_array();
			$u = $this->db->from('jabatan')->get();
			$data = array('rows' => $proses, 'record' => $u);
			$this->template->load('administrator/template', 'administrator/mod_struktur/view_struktur_edit', $data);
		}
	}

	function delete_struktur()
	{
		cek_session_admin();
		$id = array('id_struktur' => $this->uri->segment(3));
		$this->model_app->delete('struktur', $id);
		redirect($this->uri->segment(1) . '/struktur');
	}

	// Controller Modul Slide Fotos

	function slide_fotos()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_ordering('slidephoto', 'id_photo', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_photo/view_photo', $data);
	}

	function tambah_slidephoto()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/foto_slide/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000	'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('a');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] != null) {
				$data = array(
					'photo' => $hasil['file_name'],
				);
			}
			$this->model_app->insert('slidephoto', $data);
			redirect('administrator/slide_fotos');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_photo/view_slidephoto_tambah');
		}
	}

	function edit_slidephoto()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/foto_slide/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('a');
			$hasil = $this->upload->data();
			$i = $this->input->post('id');
			if ($hasil['file_name'] == '') {
				$data = array(
					'photo' => $this->input->post('b'),
				);
			} else {
				unlink('asset/foto_slide/' . $this->input->post('b'));
				$data = array(
					'photo' => $hasil['file_name'],
				);
			}
			$where = array('id_photo' => $i);
			$this->model_app->update('slidephoto', $data, $where);
			redirect('administrator/slide_fotos');
		} else {
			$proses = $this->model_app->edit('slidephoto', array('id_photo' => $id))->row_array();
			$data = array('rows' => $proses);
			$this->template->load('administrator/template', 'administrator/mod_photo/view_slidephoto_edit', $data);
		}
	}

	function delete_slidephoto()
	{
		cek_session_admin();
		$id = array('id_photo' => $this->uri->segment(3));
		$this->model_app->delete('slidephoto', $id);
		redirect($this->uri->segment(1) . '/slide_fotos');
	}

	// Model Controller Visi Misi

	public function visi_misi()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_join_one('visi_misi', 'idn', 'id_idn', 'id', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_visi_misi/view_visi_misi', $data);
	}

	function tambah_visi_misi()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
				'id_idn' => $this->input->post('a'),
				'isi' => $this->input->post('b'),
				'visi_misi' => $this->input->post('c'),
			);
			$this->model_app->insert('visi_misi', $data);
			redirect('administrator/visi_misi');
		} else {
			$data['record'] = $this->db->get_where('idn');
			$this->template->load('administrator/template', 'administrator/mod_visi_misi/view_visi_misi_tambah', $data);
		}
	}

	function edit_visi_misi()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'id_idn' => $this->input->post('a'),
				'isi' => $this->input->post('b'),
				'visi_misi' => $this->input->post('c'),
			);
			$where = array('id' => $this->input->post('id'));
			$this->model_app->update('visi_misi', $data, $where);
			redirect('administrator/visi_misi');
		} else {
			$proses = $this->model_app->edit('visi_misi', array('id' => $id))->row_array();
			$u = $this->db->from('idn')->get();
			$data = array('rows' => $proses, 'record' => $u);
			$this->template->load('administrator/template', 'administrator/mod_visi_misi/view_visi_misi_edit', $data);
		}
	}

	function delete_visi_misi()
	{
		cek_session_admin();
		$id = array('id' => $this->uri->segment(3));
		$this->model_app->delete('visi_misi', $id);
		redirect($this->uri->segment(1) . '/visi_misi');
	}

	// Model Controller Tujuan

	public function tujuan()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_join_one('tujuan', 'idn', 'id_idn', 'idtujuan', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_tujuan/view_tujuan', $data);
	}

	function tambah_tujuan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
				'id_idn' => $this->input->post('a'),
				'isi' => $this->input->post('b'),
			);
			$this->model_app->insert('tujuan', $data);
			redirect('administrator/tujuan');
		} else {
			$data['record'] = $this->db->get_where('idn');
			$this->template->load('administrator/template', 'administrator/mod_tujuan/view_tujuan_tambah', $data);
		}
	}

	function edit_tujuan()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'id_idn' => $this->input->post('a'),
				'isi' => $this->input->post('b'),
			);
			$where = array('idtujuan' => $this->input->post('id'));
			$this->model_app->update('tujuan', $data, $where);
			redirect('administrator/tujuan');
		} else {
			$proses = $this->model_app->edit('tujuan', array('idtujuan' => $id))->row_array();
			$u = $this->db->from('idn')->get();
			$data = array('rows' => $proses, 'record' => $u);
			$this->template->load('administrator/template', 'administrator/mod_tujuan/view_tujuan_edit', $data);
		}
	}

	function delete_tujuan()
	{
		cek_session_admin();
		$id = array('idtujuan' => $this->uri->segment(3));
		$this->model_app->delete('tujuan', $id);
		redirect($this->uri->segment(1) . '/tujuan');
	}

	// Model Controller Sejarah

	public function sejarah()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_join_one('profile', 'idn', 'id_idn', 'idprofile', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_sejarah/view_sejarah', $data);
	}

	function tambah_sejarah()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
				'id_idn' => $this->input->post('a'),
				'isi' => $this->input->post('b'),
			);
			$this->model_app->insert('profile', $data);
			redirect('administrator/sejarah');
		} else {
			$data['record'] = $this->db->get_where('idn');
			$this->template->load('administrator/template', 'administrator/mod_sejarah/view_sejarah_tambah', $data);
		}
	}

	function edit_sejarah()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'id_idn' => $this->input->post('a'),
				'isi' => $this->input->post('b'),
			);
			$where = array('idprofile' => $this->input->post('id'));
			$this->model_app->update('profile', $data, $where);
			redirect('administrator/sejarah');
		} else {
			$proses = $this->model_app->edit('profile', array('idprofile' => $id))->row_array();
			$u = $this->db->from('idn')->get();
			$data = array('rows' => $proses, 'record' => $u);
			$this->template->load('administrator/template', 'administrator/mod_sejarah/view_sejarah_edit', $data);
		}
	}

	function delete_sejarah()
	{
		cek_session_admin();
		$id = array('idprofile' => $this->uri->segment(3));
		$this->model_app->delete('profile', $id);
		redirect($this->uri->segment(1) . '/sejarah');
	}

	// Model Controller Artikel

	public function himpunan()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view('himpunan');
		$this->template->load('administrator/template', 'administrator/mod_himpunan/view_himpunan', $data);
	}

	function tambah_himpunan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_artikel->himpunan_tambah();
			redirect('administrator/himpunan');
		} else {
			$this->template->load('administrator/template', 'administrator/mod_himpunan/view_himpunan_tambah');
		}
	}

	function edit_himpunan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = $this->model_artikel->himpunan_update();
			redirect('administrator/himpunan');
			// echo $data;
		} else {
			$data['rows'] = $this->model_artikel->himpunan_edit('himpunan', array('idhimpunan' => $id))->row_array();
			$this->template->load('administrator/template', 'administrator/mod_himpunan/view_himpunan_edit', $data);
		}
	}

	public function artikel()
	{
		cek_session_admin();
		$data['record'] = $this->model_artikel->artikel();
		$this->template->load('administrator/template', 'administrator/mod_artikel/view_artikel', $data);
	}

	function tambah_artikel()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$this->model_artikel->artikel_tambah();
			redirect('administrator/artikel');
		} else {
			$data['record'] = $this->model_app->view('himpunan');
			$this->template->load('administrator/template', 'administrator/mod_artikel/view_artikel_tambah', $data);
		}
	}

	function edit_artikel()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = $this->model_artikel->artikel_update();
			redirect('administrator/artikel');
			// echo $data;
		} else {
			$data = array(
				'rows' => $this->model_artikel->artikel_edit('artikel', array('idartikel' => $id))->row_array(),
				'record' => $this->model_app->view('himpunan')
			);
			$this->template->load('administrator/template', 'administrator/mod_artikel/view_artikel_edit', $data);
		}
	}

	// Model Controller Dosen Tetap

	public function dosen_tetap()
	{
		cek_session_admin();
		$data['record'] = $this->model_app->view_join_one('dosen_tetap', 'idn', 'id_idn', 'iddosen', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_dsn_tetap/view_dosen', $data);
	}

	function tambah_dosen_tetap()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
				'nidn' => $this->input->post('a'),
				'namalengkap' => $this->input->post('b'),
				'id_idn' => $this->input->post('c'),
				'status' => 'Aktif',
			);
			$this->model_app->insert('dosen_tetap', $data);
			redirect('administrator/dosen_tetap');
		} else {
			$data['record'] = $this->db->get_where('idn');
			$this->template->load('administrator/template', 'administrator/mod_dsn_tetap/view_dosen_tambah', $data);
		}
	}


	function edit_dosen_tetap()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'nidn' => $this->input->post('a'),
				'namalengkap' => $this->input->post('b'),
				'id_idn' => $this->input->post('c'),
				'status' => $this->input->post('d'),
			);
			$where = array('iddosen' => $this->input->post('id'));
			$this->model_app->update('dosen_tetap', $data, $where);
			redirect('administrator/dosen_tetap');
		} else {
			$proses = $this->model_app->edit('dosen_tetap', array('iddosen' => $id))->row_array();
			$u = $this->db->from('idn')->get();
			$data = array('rows' => $proses, 'record' => $u);
			$this->template->load('administrator/template', 'administrator/mod_dsn_tetap/view_dosen_edit', $data);
		}
	}

	function delete_dosen_tetap()
	{
		cek_session_admin();
		$id = array('iddosen' => $this->uri->segment(3));
		$this->model_app->delete('dosen_tetap', $id);
		redirect($this->uri->segment(1) . '/dosen_tetap');
	}

	// Model Controller Akreditasi

	public function akreditasi()
	{
		cek_session_admin();
		$data['record'] = $this->model_akreditasi->viewAll();
		$this->template->load('administrator/template', 'administrator/mod_akreditasi/view_akreditasi', $data);
	}

	function tambah_akreditasi()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
				'fakultas' => $this->input->post('a'),
				'noButir' => $this->input->post('b'),
			);
			$this->model_app->insert('tb_akreditasi', $data);
			redirect('administrator/akreditasi');
		} else {
			$data['record'] = $this->db->get_where('tb_akreditasi');
			$this->template->load('administrator/template', 'administrator/mod_akreditasi/view_akreditasi_tambah', $data);
		}
	}


	function edit_akreditasi()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'fakultas' => $this->input->post('a'),
				'noButir' => $this->input->post('b'),
			);
			$where = array('id_akreditasi' => $this->input->post('id'));
			$this->model_app->update('tb_akreditasi', $data, $where);
			redirect('administrator/akreditasi');
		} else {
			$proses = $this->model_app->edit('tb_akreditasi', array('id_akreditasi' => $id))->row_array();
			$u = $this->db->from('tb_akreditasi')->get();
			$data = array('rows' => $proses, 'record' => $u);
			$this->template->load('administrator/template', 'administrator/mod_akreditasi/view_akreditasi_edit', $data);
		}
	}

	function hapus_akreditasi()
	{
		cek_session_admin();
		$id = array('id_akreditasi' => $this->uri->segment(3));
		$this->model_app->delete('tb_akreditasi', $id);
		redirect($this->uri->segment(1) . '/akreditasi');
	}

	function setting_akreditasi() {
		$id = $this->uri->segment(3);
		$proses = $this->model_app->edit('tb_akreditasi', array('id_akreditasi' => $id))->row_array();
		$u = $this->model_akreditasi->detail_akreditasi_all($id);
		$data = array('rows' => $proses, 'record' => $u);
		$this->template->load('administrator/template', 'administrator/mod_akreditasi/view_setting_akreditasi', $data);
	}

	function tambah_detail_akreditasi() {
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$data = array(
				'link' => $this->input->post('a'),
				'keterangan' => $this->input->post('b'),
				'id_akreditasi' => $this->input->post('id'),
			);
			$this->model_app->insert('tb_detail_akreditasi', $data);
			redirect('administrator/setting_akreditasi/'.$this->input->post('id').'');
		} 
	}

	function hapus_detail_akreditasi()
	{
		cek_session_admin();
		$t = $this->uri->segment(4);
		$id = array('id_detail' => $this->uri->segment(3));
		$this->model_app->delete('tb_detail_akreditasi', $id);
		redirect($this->uri->segment(1) . '/setting_akreditasi'.'/'.$t);
	}

	function delete_pesanmasuk()
	{
		cek_session_admin();
		$id = array('id_hubungi' => $this->uri->segment(3));
		$this->model_app->delete('hubungi', $id);
		redirect($this->uri->segment(1) . '/pesanmasuk');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('utama');
	}
}
