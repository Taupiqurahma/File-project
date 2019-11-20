<?php
defined('BASEPATH') or exit ('No Direct Script Access Allowed');

class model_siswa extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    private $table = "peserta";
    private $table2 = "pesan";
    private $table3 = "berkas";
    private $table4 = "pelunasan";
    private $table5 = "pembayaran";


    public $kode_daftar;

    public function rules()
    {
        return [
            ['field' => 'nama_lengkap',
            'label' => 'nama_lengkap',
            'rules' => 'required'],

            ['field' => 'nomor_rekening',
            'label' => 'Nomor_rekening',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'waktu',
            'label' => 'Waktu',
            'rules' => 'required'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required']
        ];
    } 


    function json_data_peserta(){
        $this->datatables->select('id_peserta,'
            .'peserta.kode_daftar as  kode_daftar,'
            .'peserta.email as  email,'
            .'peserta.nama_lengkap as nama_lengkap,'
            .'peserta.nama_panggilan as nama_panggilan,'
            .'peserta.jenis_kelamin as jenis_kelamin,'
            .'peserta.alamat as alamat,'
            .'peserta.asal_sekolah as asal_sekolah,'
        );
        $this->datatables->from('peserta');
        $this->datatables->add_column('view1','<a href="'. base_url('Dashboard_admin/edit/$1').'"><button class="btn btn-sm btn-success fa fa-edit"   ></button></a>','id_peserta');
        $this->datatables->add_column('view2','<a href="'. base_url('Dashboard_admin/hapus/$1').'"><button class="btn btn-sm btn-success  fa fa-trash-alt"   ></button></a>','id_peserta');
        return $this->datatables->generate();	
    }

    private function kode_otomatis(){
        $this->db->select('right(id_peserta,3) as kode', false);
        $this->db->order_by('id_peserta','desc');
        $this->db->limit(1);
        $query=$this->db->get('peserta');
        if($query->num_rows()<>0){
            $data=$query->row();
            $kode=intval($data->kode)+1;
        }else{
            $kode=1;
        }

        $kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
        $kodejadi='PSB'.$kodemax;

        return $kodejadi;
    }

    public function createdata()
    {
       $char = date('dmy');
       $data = array 
       (
           'id_peserta' => ($char. $this->kode_otomatis()),
           'kode_daftar' => $this->input->post('kode_daftar'),
           'email' => $this->input->post('email'),
           'nama_lengkap' => $this->input->post('nama_lengkap'),
           'nama_panggilan' => $this->input->post('nama_panggilan'),
           'jenis_kelamin' => $this->input->post('jenis_kelamin'),
           'agama' => $this->input->post('agama'),
           'jurusan' => $this->input->post('jurusan'),
           'kewarganegaraan' => $this->input->post('kewarganegaraan'),
           'tempat_lahir' => $this->input->post('tempat_lahir'),
           'tanggal_lahir' => $this->input->post('tanggal_lahir'),
           'alamat' => $this->input->post('alamat'),
           'status_anak' => $this->input->post('status_anak'),
           'anak_ke' => $this->input->post('anak_ke'),
           'jumlah_saudara' => $this->input->post('jumlah_saudara'),
           'tinggal_pada' => $this->input->post('tinggal_pada'),
           'asal_sekolah' => $this->input->post('asal_sekolah'),
           'no_handphone' => $this->input->post('no_handphone'),
           'hobi' => $this->input->post('hobi'),
           'nama_ayah' => $this->input->post('nama_ayah'),
           'nama_ibu' => $this->input->post('nama_ibu'),
           'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
           'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
           'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
           'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
           'penghasilan_ayah' => $this->input->post('penghasilan_ayah'),
           'penghasilan_ibu' => $this->input->post('penghasilan_ibu'),
           'persetujuan_ortu' => $this->input->post('persetujuan_ortu'),
           'gambar' => $this->_uploadImage('gambar'),
       );

       $this->db->insert('peserta', $data);
   }

   private function _uploadImage()
   {
    $config['upload_path']          = './upload/';
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
    public function select_by_id($id_peserta)
    {
      $this->db->select('*');
      $this->db->from('peserta');
      $this->db->where('id_peserta',$id_peserta);

      return $this->db->get()->row();
  }



public function getAlldata()
{
    $query = $this->db->get('peserta');
    return $query->result();
}

public function jumlahSiswa()
{
    $sql = "SELECT count(kode_daftar) as kode_daftar FROM peserta";
    $result = $this->db->query($sql);
    return $result->row()->kode_daftar;
}

public function getById($id_peserta)
{
    return $this->db->get_where($this->_table, ["id_peserta" => $id_peserta])->row();
}

public function edit_data($where,$table)
{		
  return $this->db->get_where($table,$where);
}

public	function hapus_data($where,$table)
{
  $this->db->where($where);
  $this->db->delete($table);
}

function get_where($tabel,$where)
{
    $this->db->where($where);
    return $this->db->get($tabel);
}

public	function cek_user($kode_daftar)
{
    $this->db->where('kode_daftar',$kode_daftar);
    $query = $this->db->get('peserta');
    return $query->result_array();
}

public function kode_daftar($kode_daftar)
{
    $this->db->where('kode_daftar', $kode_daftar);
    return $query= $this->db->get($this->table)->result();

}

function tampil_peserta($email)
{
	return $this->db->query("SELECT * FROM peserta where email='$email'");
}

function tampil_pelunasan($email)
{
	return $this->db->query("SELECT * FROM pelunasan where email='$email'");
}

public function jumlahDiterima(){
    $this->db->select("count(status_pendaftaran) as status_pendaftaran");
    $this->db->from($this->table);
    $this->db->where('status_pendaftaran',"Diterima");
    return $this->db->get()->row()->status_pendaftaran;
}


public function getAllberkas()
{
  $query = $this->db->get('berkas');
  return $query->result();
}

function berkas()
{

    return $this->db->get($this->table3)->result();
}

function pelunasan()
{

    return $this->db->get($this->table4)->result();
}

function pembayaran()
{

    return $this->db->get($this->table5)->result();
}

function cekkode($id)
{
    return $this->db->query("SELECT * FROM peserta where kode_daftar = '$id'");
}



}

