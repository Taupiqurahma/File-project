<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')=='1') {
			redirect(base_url('Dashboard_siswa'));
		}elseif ($this->session->userdata('akses')=='2') {
			redirect(base_url('Dashboard_admin'));
		}
		$this->load->library('form_validation');
		
		
	}


	public function index()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('V_login');
		}else{
			//validasi
			$this->_login();
		}
		
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$akun = $this->db->get_where('akun', ['email' => $email])->row_array();
		$this->session->set_userdata('masuk',TRUE);
		if($akun){
			if($akun['is_active'] == 1) {

				if (password_verify($password, $akun['password'])){

					$data  = [
						'email' => $akun['email'],
						'kode_daftar' => $akun['kode_daftar'],	

					];
				$this->session->set_userdata('akses','1');
				$this->session->set_userdata($data);
				redirect('Dashboard_siswa');


			}else{
				$this->session->set_flashdata('message', '<div class="border border-danger" role="alert">password salah ! </div>');
				redirect('Login');
			}	

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Email belum di aktivasi, Silahkan cek email untuk lakukan aktivasi ! </div>');
			redirect('Login');
		}

	}else{
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Email belum di registrasi ! </div>');
		redirect('Login');
	}
}

public function logout()
{
	$this->session->unset_userdata('email');
	$this->session_destroy();
	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Kamu telah berhasil keluar ! </div>');
	redirect('Login');
}



}


