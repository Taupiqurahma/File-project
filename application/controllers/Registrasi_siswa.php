<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_siswa extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('model_siswa');
        $this->load->library('session');
        $this->load->library('Datatables');
        $this->load->library('form_validation');
        $this->load->model('model_pembayaran');
        $this->load->model('model_kontak');

        if ($this->session->userdata('akses')=='2') {
            redirect(base_url('Dashboard_admin'));
        }
        elseif ($this->session->userdata('masuk')!= TRUE) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {

        $data['pembayaran'] = $this->db->get_where('pembayaran', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['akun']= $this->db->get_where('akun', [
            'email' => $this->session->userdata('email')
        ])->row_array();


        $data['peserta']= $this->db->get_where('peserta', [
            'kode_daftar' => $this->session->userdata('kode_daftar')
        ])->row_array();
        $id = $this->session->userdata('kode_daftar');
        $data['cekkode'] = $this->model_siswa->cekkode($id)->row_array();
        $data["status"] = $this->model_pembayaran->getstatus();
        

        $this->load->view('dash_header/header',$data);
        $this->load->view('V_registrasi', $data );
        $this->load->view('dash_header/footer');   
    }


    private function _sendEmail($param)
    {
        $input = $this->input->post();

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
        $ci->email->subject('Info');

        $data_kirim .="<p>KODE PENDAFTARAN : ".$input['kode_daftar'].""
        .  "<p>NAMA LENGKAP : ".$input['nama_lengkap']."<br>"
        . "TANGGAL LAHIR : ".$input['tanggal_lahir']."</p>";

        $data_kirim .="<p>Terimakasih ".$input['nama_panggilan']." anda telah melakukan pengisian formulir <br>"
        . "Silahkan lakukan pelunasan biaya pendaftaran (Uang Bangunan) sebesar Rp.850.000 untuk kompetesi keahlian (Administrasi Perkantoran) /Rp.950.000 untuk kompetensi keahlian (Multimedia). Pembayaran pelunasan bisa dibayarkan secara transfer dan melakukan kofirmasi pembayaran di web atau bisa dilakukan secara langsung dengan membayar via tunai ke panitia PPDB di sekolah pada hari kerja mulai pukul 08.00 s/d pukul 13.00 WIB dengan membawa bukti pendaftaran atau bukti penerimaan yang tersedia pada menu pengumuman di web PPDB.</p>";      

        $ci->email->message($data_kirim);

        if($ci->email->send()) {
            return true;
        }else{
         echo "gagal";
     }

 }

 public function crud_siswa()
 {

    $this->model_siswa->createdata();
    $this->session->set_flashdata('sukses', 'Data formulir terkirim, selanjutnya silahkan upload berkas persyaratan');
        redirect(site_url('Dashboard_siswa/upload'));
  

}


public function daftarpeserta()
{
      /*  $data['result'] = $this->model_siswa->getAlldata();
        $this->load->view('templates/header');
        $this->load->view('V_daftarpeserta', $data);
        $this->load->view('templates/footer');
    */

        $this->load->view('dash_header/header');
        $this->load->view('V_daftarpeserta');
        $this->load->view('dash_header/footer');
    }
    
    public function json_data_peserta()
    { 
        $query = $this->model_siswa->json_data_peserta();
        echo $query;

    }





    
}
