<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_Maps');
		if ($this->session->userdata('akses')=='1') {
			redirect(base_url('Dashboard_siswa'));
		}elseif ($this->session->userdata('akses')=='2') {
			redirect(base_url('Dashboard_admin'));
		}
	}

	public function index()
	{
		$data["maps"] = $this->model_Maps->getAll();
        

		$this->load->view('V_home', $data);
		$this->load->view('footer');
	}

	public function daftarpeserta()
	{
		$this->load->view('V_daftarpeserta');
		$this->load->view('footer');
	}


}
