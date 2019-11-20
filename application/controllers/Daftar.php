<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('recaptcha');
        if ($this->session->userdata('akses')=='1') {
            redirect(base_url('Dashboard_siswa'));
        }elseif ($this->session->userdata('akses')=='2') {
            redirect(base_url('Dashboard_admin'));
        }
    }

    public function index()
    {

// Catch the user's answer
        $captcha_answer = $this->input->post('g-recaptcha-response');

// Verify user's answer
        $response = $this->recaptcha->verifyResponse($captcha_answer);

// Processing ...
        if ($response['success']) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]');
            $this->form_validation->set_rules('kode_daftar', 'Nomor induk siswa nasional', 'required|trim');
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
                'matches' => 'password tidak sama!',
                'min_length' => 'password terlalu pendek!'
            ]);

            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            if ($this->form_validation->run() == false) {
                $this->load->view('V_daftar');
            }else{
                $email = $this->input->post('email', true);
                $kode_daftar = ($char. $this->input->post('kode_daftar', true));
                $char = date('dm');
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'kode_daftar' => ($char. $this->input->post('kode_daftar', true)),
                    'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                    'is_active' => 0,
                    'date' => time(),
                    'status' => 'belum aktif'
                ];

                $token = bin2hex(openssl_random_pseudo_bytes(32));
                $user_token =[
                    'email' => $email,
                    'kode_daftar' => $kode_daftar,
                    'token' => $token,
                    'date' => time()
                ];
                $this->db->insert('akun', $data);
                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'verify');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Silahkan cek email, untuk aktivasi akun terlebih dahulu ! </div>');
                redirect('Login');
            }       

    // Your success code here
        } else {
    // Something goes wrong
            $this->load->view('V_daftar');
        }
    }
    


    private function kode_otomatis()
    {
        $this->db->select('right(kode,3) as kode', false);
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


    private function _sendEmail($token, $type)
    {

        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = 'ppdbcakrawala@gmail.com';
        $config['smtp_pass'] = 'ppdbonline';
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $ci->email->initialize($config);
        $ci->email->from('ppdbcakrawala.mail@gmail.com', 'PPDB');
        $list = array($this->input->post('email'));
        $ci->email->to($list);
        if ($type == 'verify') {
            $ci->email->subject('Verifikasi Akun');
            $ci->email->message('Terima kasih telah mengunjungi website PPDB Online SMK Cakrawala Bojonggede-Bogor, Guna melanjutkan proses pendaftaran. Segera Verifikasi akun anda, silahkan klik link disini => : <a href="'. base_url() .'Daftar/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Aktivasi</a>');
        }

        if($ci->email->send()) {
            return true;
        }else{
           echo "gagal";
       }

   }


   public function verify()
   {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $akun = $this->db->get_where('akun',['email' => $email])->row_array();
    if ($akun) {
        $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();

        if ($user_token) {
            if (time()- $user_token['date'] < (60*60*24)) {
                $this->db->set('is_active',1);
                $this->db->where('email', $email);

                $this->db->update('akun');
                $this->db->delete('user_token', ['email' => $email]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .' Telah di aktivasi! Silahkan login. </div>');
                redirect('Login');
            }else{
                $this->db->delete('akun',['email' => $email]);
                $this->db->delete('user_token',['email' => $email]);

                $this->session->set_flashdata('pesan','aktivasi sudah kadaluwarsa');
                redirect('Login');
            }
        }else{
            $this->session->set_flashdata('pesan','token tidak ditemukan');
            redirect('Login');
        }
    }else{
        $this->session->set_flashdata('pesan','gagal verifikasi akun tidak ditemukan');
        redirect('Login');
    }
}
}

