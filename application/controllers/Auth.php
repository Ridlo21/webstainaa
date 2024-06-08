<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function users(){
		if (isset($_POST['submit'])){
			$this->model_auth->register_users();
			redirect('auth/success');
		}else{
			$data['title'] = 'Pendaftaran Sebagai Users';
			$data['title'] = title();
			$data['description'] = description();
			$data['keywords'] = keywords();
			$this->template->load('phpmu-one/template','phpmu-one/view_register_users',$data);
		}
	}

	public function penulis(){
		if (isset($_POST['submit'])){
			$this->model_auth->register_users();
			redirect('auth/success');
		}else{
			$data['title'] = 'Pendaftaran Sebagai Penulis';
			$data['title'] = title();
			$data['description'] = description();
			$data['keywords'] = keywords();
			$this->template->load('phpmu-one/template','phpmu-one/view_register_penulis',$data);
		}
	}

	function login(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->db->query("SELECT * FROM users where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND blokir='N'");
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['level']));
				
				redirect('main');
			}else{
				$data['title'] = 'Log In &rsaquo; Pengguna';
				$data['description'] = description();
				$data['keywords'] = keywords();
				$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
			}
		}else{
			$data['title'] = 'Log In &rsaquo; Pengguna';
			$data['title'] = title();
			$data['description'] = description();
			$data['keywords'] = keywords();
			$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}
}
