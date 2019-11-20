<?php
class Inbox_admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_kontak');
		$this->load->library('Datatables');
	}

	function index()
	{
		$data['admin']= $this->db->get_where('admin')->row_array();
		$data["jumlahPesan"] = $this->model_kontak->jumlahPesan();
		$data["inbox_email"] = $this->model_kontak->get_all_inbox();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/V_inbox', $data);
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/inbox');
	}

	public function json_data_inbox()
	{ 
		$query = $this->model_kontak->json_data_inbox();
		echo $query;

	}


}