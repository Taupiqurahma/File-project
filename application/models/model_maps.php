<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_Maps extends CI_Model
{
    private $_table = "maps";

    // Mengambil semua data

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function updateMaps()
    {
        $post = $this->input->post();

        $this->link = $post["link"];
        $this->height = $post["height"];
        $this->width = $post["width"];

        $this->db->where('id', 0);
        $this->db->update($this->_table, $this);
        
    }
    



  


    
      
}

