<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_Maps');
    }

    public function index()
    {    
        $data['admin']= $this->db->get_where('admin')->row_array();
        
        $data["maps"] = $this->model_Maps->getAll();
        $this->load->view("admin/header", $data);
        $this->load->view("admin/V_maps", $data);     
    }

    public function update()
    {
        $data = array(
            'link' => $this->input->post('link'),
            'height' => $this->input->post('height'),
            'width' => $this->input->post('width')
        );

        $this->model_Maps->updateMaps($data);
        $this->session->set_flashdata('maps', 'Maps Berhasil di update');

        redirect(site_url('Maps'));

    }
}









