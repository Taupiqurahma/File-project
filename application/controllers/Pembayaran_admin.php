<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
       if ($this->session->userdata('akses')=='1') {
      redirect(base_url('Dashboard_siswa'));
    }
    elseif ($this->session->userdata('masuk')!= TRUE) {
     redirect(base_url('admin'));
   }
    $this->load->model('model_pembayaran');
        $this->load->model('model_siswa');
    $this->load->model('model_Kontak');
    $this->load->library('Datatables');
    $this->load->helper('form', 'url');
    $this->load->library('form_validation');
  }


  public function index()
  {
    $data['admin']= $this->db->get_where('admin')->row_array();
    $data['pesan']= $this->db->get_where('pesan')->row_array();
    $data["pembayaran"] = $this->model_pembayaran->pembayaran()->result();
    $data["pelunasan"] = $this->model_pembayaran->pelunasan()->result();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/v_pembayaran');  
    $this->load->view('admin/footer');  
  }


  public function json_data_pembayaran()
  { 
    $query = $this->model_pembayaran->json_data_pembayaran();
    echo $query;
  }

  public function aktivasi()
  {
   $data['admin']= $this->db->get_where('admin')->row_array();
   $data['pesan']= $this->db->get_where('pesan')->row_array();

    $data["berkas"] = $this->model_siswa->berkas();

   $this->load->view('admin/header', $data);
   $this->load->view('admin/V_aktivasi', $data);
 }

 public function json_data_aktivasi()
 { 
  $query = $this->model_pembayaran->json_data_aktivasi();
  echo $query;
}

public function edit_aktif($kode_daftar)
{
  $where = array('kode_daftar' => $kode_daftar);
  $data['admin']= $this->db->get_where('admin')->row_array();
  $data['akun'] = $this->model_pembayaran->edit_data($where,'akun')->result();
  $this->load->view('admin/header',$data);
  $this->load->view('admin/v_aktivasibyr',$data);
}

private function _sendEmail($param)
{
  $input = $this->input->post();


  $ci = get_instance();
  $ci->load->library('email');
  $config['protocol'] = "smtp";
  $config['smtp_host'] = "ssl://smtp.googlemail.com";
  $config['smtp_port'] = "465";
  $config['smtp_user'] = 'isi dengan email anda';
  $config['smtp_pass'] = 'isi dengan password email anda';
  $config['charset'] = "utf-8";
  $config['mailtype'] = "html";
  $config['newline'] = "\r\n";
  $ci->email->initialize($config);
  $ci->email->from('isi dengan email anda', 'PPDB');
  $list = array($this->input->post('email'));
  $ci->email->to($list);
  $ci->email->subject('Aktivasi Kode Daftar');
  
  $data_kirim .="<p>NAMA        : ".$input['nama']."<p>"
  .  "<p>EMAIL        : ".$input['email']."<br>"
  . "STATUS KODE DAFTAR : ".$input['status']."<br>";
  $data_kirim .="<p>Terimakasih anda telah melakukan pembelian formulir<br>"
  . "Silahkan segera lengkapi data formulir pada sistem kami.!</p>";  
  $ci->email->message($data_kirim);

  if($ci->email->send()) {
    return true;
  }else{
   echo "gagal";
 }

}



public function updateakun(){
  $kode_daftar = $this->input->post('kode_daftar');
  $nama = $this->input->post('nama');
  $email = $this->input->post('email');
  $status = $this->input->post('status');
  $data = array('status'=>$status, );
  $this->db->where('kode_daftar',$kode_daftar);
  $this->db->update('akun',$data);
  $this->_sendEmail();
  redirect('Pembayaran_admin/aktivasi');

}


public function detail()
{
  $id=$this->uri->segment(3);
  $data['admin']= $this->db->get_where('admin')->row_array();
  
   $data["pembayaran"] = $this->model_pembayaran->pembayaran()->result();
  $this->load->view("admin/header",$data);
  $this->load->view('admin/V_detailpembayaran', $data);
}




public function edit($id_pembayaran)
{
  $where = array('id_pembayaran' => $id_pembayaran);
  $data['admin']= $this->db->get_where('admin')->row_array();
  $this->load->view('admin/v_edit_verif',$data);
  $data['pembayaran'] = $this->model_pembayaran->edit_data($where,'pembayaran')->result();
  $this->load->view('admin/header',$data);
}

public function pelunasan()
{
   $data['admin']= $this->db->get_where('admin')->row_array();
     $data["pelunasan"] = $this->model_siswa->pelunasan();
   $this->load->view('admin/header',$data);
  $this->load->view('admin/v_pelunasan');
}

public function beli_formulir()
{
   $data['admin']= $this->db->get_where('admin')->row_array();
     $data["pembayaran"] = $this->model_siswa->pembayaran();
   $this->load->view('admin/header',$data);
  $this->load->view('admin/v_pembelian_form');
}

public function bukti_valid()
{
   $kode_pelunasan = $this->input->post('kode_pelunasan');
   $email = $this->input->post('email');
    $nama_lengkap = $this->input->post('nama_lengkap');
     $id_peserta = $this->input->post('id_peserta');
      $status = $this->input->post('status');
       $status_pendaftaran = $this->input->post('status');
   $this->db->set('status','Terverifikasi');
   $this->db->where('kode_pelunasan',$kode_pelunasan,'nama_lengkap',$nama_lengkap);
   $this->db->update('pelunasan');
   if ($email) {
      $this->db->set('status_pendaftaran','Diterima');
      $this->db->where('email',$email);
      $this->db->update('peserta');
      $this->_sendEmail();
      redirect(base_url('Dashboard_admin'));
   }
}
function bukti_gagal()
{
  $id = $this->uri->segment(3);
   $this->db->set('status','Tidak Valid');
   $this->db->where('kode_pelunasan',$id);
   $this->db->update('pelunasan');
   redirect(base_url('Dashboard_admin'));
}

function bukti_ok()
{
   $id_pembayaran = $this->input->post('id_pembayaran');
   $email = $this->input->post('email');
    $nama = $this->input->post('nama');
     $kode_daftar = $this->input->post('kode_daftar');
      $status_bayar = $this->input->post('status_bayar');
       $status = $this->input->post('status');
   $this->db->set('status_bayar','Valid');
   $this->db->where('id_pembayaran',$id_pembayaran,'nama',$nama);
   $this->db->update('pembayaran');
   if ($email) {
      $this->db->set('status','Aktif');
      $this->db->where('email',$email);
      $this->db->update('akun');
      $this->_sendEmail();
      redirect(base_url('Pembayaran_admin'));
   }
}
function bukti_belumvalid()
{
  $id = $this->uri->segment(3);
   $this->db->where('id_pembayaran',$id);
   $this->db->delete('pembayaran');
   redirect(base_url('Pembayaran_admin'));
}





}




