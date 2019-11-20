<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_pembayaran extends CI_Model
{
    private $_table = "pembayaran";
     private $_table1 = "akun";
      private $_table2 = "pelunasan";
   
    public $kode_daftar;
    public $nomor_rekening;
    public $tanggal;
    public $gambar;
    public $email;
    public $tanggal_registrasi;
    
    public function rules()
    {
        return [
            ['field' => 'kode_daftar',
            'label' => 'kode_daftar',
            'rules' => 'required'],

            ['field' => 'nomor_rekening',
            'label' => 'Nomor_rekening',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required']
        ];
    } 

    public function getAll()
    {   
        // $this->db->order_by("tanggal_registrasi", "desc");
        return $this->db->get($this->_table)->result();
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pembayaran" => $id])->row();
    }

    public function getByNisn($kode)
    {
        return $this->db->get_where($this->_table, ["kode_daftar" => $kode])->row();
    }

    public function id_pembayaran($id)
    {
        $this->db->where('id_pembayaran', $id);
        return $query= $this->db->get($this->_table)->result();

    }
    
    public function edit_data($kode_daftar,$_table1)
    {       
    return $this->db->get_where($_table1,$kode_daftar);
    }

   private function kode_otomatis(){
        $this->db->select('right(id_pembayaran,3) as kode', false);
        $this->db->order_by('id_pembayaran','desc');
        $this->db->limit(1);
        $query=$this->db->get('pembayaran');
        if($query->num_rows()<>0){
            $data=$query->row();
            $kode=intval($data->kode)+1;
        }else{
            $kode=1;
        }

        $kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
        $kodejadi='BYR'.$kodemax;

        return $kodejadi;
    }
    
    public function save()
    {
          
        $this->id_pembayaran = $this->kode_otomatis();
        $post = $this->input->post();
        $this->kode_daftar = $post["kode_daftar"];
        $this->nomor_rekening = $post["nomor_rekening"];
        $this->tanggal = $post["tanggal"];
        $this->nama_pengirim = $post["nama_pengirim"];
        $this->email = $post["email"];
        $this->gambar = $this->_uploadImage();
        

    $this->db->insert($this->_table, $this);
    
    }

    
    private function _uploadImage()
    {
        $config['upload_path']          = './upload/pembayaran/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= false;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                return $this->upload->data("file_name");
            }
    
    }

    function cek_tanggal($nomor_rekening){
        $this->db->select('tanggal');
        $this->db->where('nomor_rekening', $nomor_rekening);
        $query = $this->db->get('pembayaran');
        return $query->row()->tanggal;
    }


    function cek_nomor_rekening($nomor_rekening){
        $this->db->select('nomor_rekening');
        $this->db->where('nomor_rekening',$nomor_rekening);
        $query = $this->db->get('pembayaran');
        return $query->row()->nomor_rekening;
    }


  


   public function updatePembayaran($id_pembayaran)
    {
        $post = $this->input->post();

        $this->status = $post["status"];
        
        $this->db->where('id_pembayaran' );
        $this->db->update($this->_table, $this);
    }

    public function getstatus(){
        $sql = "SELECT status FROM akun ";
        $result = $this->db->query($sql);
         return $result->row()->status;
    
    }

     public function jumlahPembayaran(){
        $this->db->select("count(status) as status");
        $this->db->from($this->_table2);
        $this->db->where('status',"Tunggu");
        return $this->db->get()->row()->status;
    }


     public function jumlahPelunasan(){
        $sql = "SELECT count(nomor_rekening) as nomor_rekening FROM pelunasan";
        $result = $this->db->query($sql);
        return $result->row()->nomor_rekening;
    }

     public function jumlahPembelian(){
        $sql = "SELECT count(nomor_rekening) as nomor_rekening FROM pembayaran";
        $result = $this->db->query($sql);
        return $result->row()->nomor_rekening;
    }

   

public function pelunasan()
{
    return $this->db->query("SELECT * FROM pelunasan a, peserta b
     where a.status='Tunggu'
     and a.email=b.email
     group by a.kode_pelunasan");
}

public function pembayaran()
{
    return $this->db->query("SELECT * FROM pembayaran a, akun b
     where a.status_bayar='belum valid'
     and a.email=b.email
     group by a.id_pembayaran");
}

}