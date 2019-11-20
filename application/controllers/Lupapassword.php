<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupapassword extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->library('form_validation');
  }


  public function index()
  {
   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
   if($this->form_validation->run() == false) {
       $this->load->view('V_lupapassword');
   }else{
       $email = $this->input->post('email');
       $akun = $this->db->get_where('akun', ['email' => $email, 'is_active' => 1])->row_array();

       if($akun){ 
           $token = bin2hex(openssl_random_pseudo_bytes(32));
           $user_token =[
             'email' => $email,
             'token' => $token,
             'date' => time()
         ];

         $this->db->insert('user_token', $user_token);
         
         $this->_sendEmail($token, 'lupa');

         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Silahkan cek email untuk melakukan ubah kata sandi </div>');
         redirect('Lupapassword');

     } else {
       
       $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Email belum terdaftar atau belum terverifikasi ! </div>');
       redirect('Lupapassword');

   }

}

}

private function _sendEmail($token, $type)
{

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
    if ($type == 'lupa') {
        $this->email->subject('Ubah Password');
        $ci->email->message('Berdasarkan permintaan ubah kata sandi (password) yang anda lakukan pada sistem kami. Segera Ubah password akun anda agar tetap bisa melanjutkan pendaftaran, silahkan klik link disini => : <a href="'. base_url() .'Lupapassword/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ubah</a>');
    }


    if($ci->email->send()) {
        return true;
    }else{
       echo "gagal";
   }
   
}

public function reset_password()
{
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $akun = $this->db->get_where('akun', ['email' => $email])->row_array();

    if ($akun) { 
        $user_token = $this->db->get_where('user_token', ['token'=>$token])->row_array();

        if ($user_token) {

            $this->session->set_userdata('reset_email', $email);
            $this->changePassword();


        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ubah kata sandi gagal! Token salah.</div>');
            redirect('Login');
        }

    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ubah kata sandi gagal! Email salah.</div>');
        redirect('Login');
    }
}

public function changePassword()
{
    if(!$this->session->userdata('reset_email')){
        redirect('Login');

    }

    $this->form_validation->set_rules('password1', 'Kata Sandi', 'trim|required|min_length[4]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Konfirmasi Kata Sandi', 'trim|required|min_length[4]|matches[password1]');


    if($this->form_validation->run() == false) {
        $this->load->view('V_changePassword');
    }else{
        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $email = $this->session->userdata('reset_email');

        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('akun');

        $this->session->unset_userdata('reset_email');
        
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ubah kata sandi berhasil, silahkan login.</div>');
        redirect('Login');

    }
    
}

}

