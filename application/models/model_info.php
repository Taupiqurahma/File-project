<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_info extends CI_Model
{
    private $_table = "info";

    public $id;
    public $gambar;
    public $nomor_rekening;
    public $nama_rekenging;



    // Mengambil semua data

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    function json_data_rekening(){
        $this->datatables->select('id,'
            .'info.nama_rekening as nama_rekening,'
            .'info.nomor_rekening as nomor_rekening,'
            .'info.info1 as info1,'
            .'info.info2 as info2,'
            .'info.info3 as info3,'
            .'info.info4 as info4,'
            .'info.info5 as info5,'
            .'info.info6 as info6,'
            .'info.info7 as info7,'
        );
        $this->datatables->from('info');
        $this->datatables->add_column('view1','<a href="'. base_url('Dashboard_admin/edit_rek/$1').'"><button class="btn btn-sm btn-success fa fa-edit"   ></button></a>','id');
        return $this->datatables->generate();	
    }

    function edit_data($where,$_table)
    {		
       return $this->db->get_where($_table,$where);
   }


   public function update($id, $data)
   {   
    $post = $this->input->post();     
    $this->nomor_rekening = $post["nomor_rekening"];
    $this->nama_rekening = $post["nama_rekening"];
    $this->db->where('id', $id);
    $this->db->update($this->_table, $data);
    }










}
