<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {
    function __construct(){
        parent::__construct();
        if ($this->session->userdata('akses')=='1') {
            redirect(base_url('Dashboard_siswa'));
        }elseif ($this->session->userdata('akses')=='2') {
            redirect(base_url('Registrasi_siswa'));
            
            $this->load->library('session');
            $this->load->model('model_kode');
        }
    }

    public function index()
    {

        $data['akun']= $this->db->get_where('akun', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['peserta']= $this->db->get_where('peserta', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->load->view('dash_header/header');
        $this->load->view('V_verifikasi', $data );
        $this->load->view('dash_header/footer');   
        
    }


    

    
    

}


