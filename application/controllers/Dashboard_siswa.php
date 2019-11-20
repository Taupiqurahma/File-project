 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_siswa extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     if ($this->session->userdata('akses')=='2') {
        redirect(base_url('Halaman_admin'));
    }
    elseif ($this->session->userdata('masuk')!= TRUE) {
     redirect(base_url('login'));
 }
 $this->load->model('model_kontak');
 $this->load->model('model_info');
 $this->load->model('model_pengaturan');
 $this->load->model('model_pembayaran');
 $this->load->library('form_validation');
 $this->load->model('model_Siswa');
 $this->load->library('ciqrcode');
 $this->load->helper('url');

}

public function index()
{
	$data['akun'] = $this->db->get_where('akun', [
     'email' => $this->session->userdata('email')
 ])->row_array();



	$data["pengumuman"] = $this->model_pengaturan->getPengumuman();
    $data["daftar"] = $this->model_pengaturan->getDaftar();
    $data["tampil"] = $this->model_info->getAll();


    $data['pembayaran']= $this->db->get_where('pembayaran')->row_array();


    $this->load->view('dash_header/header', $data);
    $this->load->view('Beranda_calonsiswa', $data);
    $this->load->view('dash_header/footer');
}


public function add()
{
 $nomor_rekening = $this->security->xss_clean($this->input->post("nomor_rekening"));
 $rekening = $this->model_pembayaran->cek_nomor_rekening($nomor_rekening);
 $tanggal = $this->model_pembayaran->cek_tanggal($nomor_rekening);


        // echo $waktu;
        // var_dump($waktu);
        // exit;

 if (empty($rekening)) {
    $this->form_validation->set_rules('kode_daftar', 'kode_daftar','required|is_unique[pembayaran.kode_daftar]');
    if($this->form_validation->run() == TRUE){
        $registrasi = $this->model_pembayaran;
        $validation = $this->form_validation;
        $validation->set_rules($registrasi->rules());

        if ($validation->run()) {
            $registrasi->save();
            $this->session->set_flashdata('sukses', 'Registrasi berhasil dikirim. Silahkan tunggu aktivasi kode daftar atau silahkan cek peserta');
        }
        redirect(site_url('Dashboard_siswa'));
    }else{

        $this->session->set_flashdata('tidak_sukses', 'kode_daftar sudah digunakan untuk registrasi.');
        redirect(site_url('Dashboard_siswa')); 
    } 

}else if(!empty($rekening) && $tanggal == $this->input->post("tanggal")){
    $this->form_validation->set_rules('kode_daftar', 'kode_daftar','required|is_unique[pembayaran.kode_daftar]');
    if($this->form_validation->run() == TRUE){
        $registrasi = $this->model_pembayaran;
        $validation = $this->form_validation;
        $validation->set_rules($registrasi->rules());

        if ($validation->run()) {
            $registrasi->save();
            $this->session->set_flashdata('sukses', 'Registrasi berhasil dikirim. Silahkan tunggu aktifasi kode_daftar');

        }
        redirect(site_url('Dashboard_siswa'));
    }else{

        $this->session->set_flashdata('tidak_sukses', 'kode_daftar sudah digunakan untuk registrasi.');
        redirect(site_url('Dashboard_siswa')); 
    } 
}else if(!empty($rekening) && $tanggal != $this->input->post("tanggal")){
    $this->form_validation->set_rules('kode_daftar', 'kode_daftar','required|is_unique[pembayaran.kode_daftar]');
    if($this->form_validation->run() == TRUE){
        $registrasi = $this->model_pembayaran;
        $validation = $this->form_validation;
        $validation->set_rules($registrasi->rules());

        if ($validation->run()) {
            $registrasi->save();
            $this->session->set_flashdata('sukses', 'Registrasi berhasil dikirim. Silahkan tunggu aktifasi kode_daftar');

        }
        redirect(site_url('Dashboard_siswa'));
    }else{

        $this->session->set_flashdata('tidak_sukses', 'kode_daftar sudah digunakan untuk registrasi.');
        redirect(site_url('Dashboard_siswa')); 
    } 
}else if(!empty($rekening) && $tanggal != $this->input->post("tanggal")){
    $this->form_validation->set_rules('kode_daftar', 'kode_daftar','required|is_unique[pembayaran.kode_daftar]');
    if($this->form_validation->run() == TRUE){
        $registrasi = $this->model_pembayaran;
        $validation = $this->form_validation;
        $validation->set_rules($registrasi->rules());

        if ($validation->run()) {
            $registrasi->save();
            $this->session->set_flashdata('sukses', 'Registrasi berhasil dikirim. Silahkan tunggu aktifasi kode_daftar');

        }
        redirect(site_url('Dashboard_siswa'));
    }else{

        $this->session->set_flashdata('tidak_sukses', 'kode_daftar sudah digunakan untuk registrasi.');
        redirect(site_url('Dashboard_siswa')); 
    } 
}else if(!empty($rekening) && $tanggal == $this->input->post("tanggal")){
    $this->session->set_flashdata('tidak_sukses', 'Maaf Kartu sudah pernah digunakan untuk registrasi');
    redirect(site_url('Dashboard_siswa'));
}


}


public function logout()
{
	session_destroy();
	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Kamu telah berhasil keluar ! </div>');
	redirect(base_url('Login'));
}

public function user()
{	
	$data['akun'] = $this->db->get_where('akun', [
     'email' => $this->session->userdata('email')
 ])->row_array();

	$this->load->view('dash_header/header');
	$this->load->view('V_user', $data);
	$this->load->view('dash_header/footer');	
}

public function kontak()
{
    $this->load->view('dash_header/header');
    $this->load->view('V_kontak');
    $this->load->view('dash_header/footer');	
}
public function kirim_pesan(){
  $nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
  $email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
  $pesan=htmlspecialchars(trim($this->input->post('pesan',TRUE)),ENT_QUOTES);
  $this->model_kontak->kirim_pesan($nama,$email,$pesan);
  echo $this->session->set_flashdata('msg',"<div class='alert alert-info'>Terima kasih telah menghubungi kami.</div>");
  redirect('Dashboard_siswa/kontak');
}

public function upload()
{
    $data['peserta'] = $this->db->get_where('peserta', [
        'email' => $this->session->userdata('email')
    ])->row_array();
    $peserta = $this->db->get_where('peserta', [
        'email' => $this->session->userdata('email')
    ])->row_array();
    $id = $peserta['id_peserta'];
    $where = array('id_peserta' => $id, );
    $data['cekberkas'] = $this->model_Siswa->get_where('berkas',$where)->row_array();
    $this->load->view('dash_header/header');
    $this->load->view('V_upload', $data);
    $this->load->view('dash_header/footer');
}

function aksi_upload()
{


    $data = array 
    (
        'id_peserta' => $this->input->post('id_peserta'),
        'skhun' => $this->_uploadImage1('skhun'),
        'ijazah' => $this->_uploadImage2('ijazah'),
        'kk' => $this->_uploadImage3('kk'),
    );

    $this->db->insert('berkas', $data);
    $this->session->set_flashdata('sukses', 'Berkas Persyaratan telah terkirim, selanjutnya silahkan lakukan pelunasan pembayaran via tf atau tunai secara langsung ke pihak sekolah');
    redirect('Dashboard_siswa/bayar');
}

private function _uploadImage1()
{
    $config['upload_path']          = './upload/berkas/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['overwrite']            = false;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('skhun')) {
            return $this->upload->data("file_name");
        }else{
            echo "gambar tidak sesuai formaat";
        }


    }


    private function _uploadImage2()
    {
        $config['upload_path']          = './upload/berkas/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = false;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ijazah')) {
            return $this->upload->data("file_name");
        }

    }

    private function _uploadImage3()
    {
        $config['upload_path']          = './upload/berkas/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = false;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('kk')) {
            return $this->upload->data("file_name");
        }

    }

    public function pengumuman()
    {
       $data['akun'] = $this->db->get_where('akun', [
        'email' => $this->session->userdata('email')
    ])->row_array();
       $data["pengumuman"] = $this->model_pengaturan->getPengumuman();


       $this->load->view('dash_header/header', $data);
       $this->load->view('V_pengumuman', $data);
       $this->load->view('dash_header/footer');


   }

   public function detailpengumuman() {

        //settingang pada barcode 


    $kode_daftar = $this->security->xss_clean($this->input->post("kode_daftar"));
    $cek = $this->model_Siswa->cek_user($kode_daftar);
    if(count($cek) == 1){
        $this->session->set_userdata(array(
            'kode_daftar'         => "kode_daftar",
            'kode_daftar'      => $cek[0]['kode_daftar'],
        ));

         $params['data'] = $kode_daftar;
        $params['level'] = 'H';
        $params['size'] =5;

        //settingan untuk membuat file barcode dalam format .png dan di simpan dalam folder assets
        $params['savename'] = FCPATH . "assets/images/barcode/".$kode_daftar.".png";
        //mulai menggenerate barcode
        $this->ciqrcode->generate($params);

        

        $data["detailPengumuman"] = $this->model_Siswa->kode_daftar($kode_daftar);
        $this->load->view('dash_header/header');
        $this->load->view('V_detail_pengumuman', $data);
        $this->load->view('dash_header/footer');

    }else{
        $this->session->set_flashdata('pendaftar', 'Maaf kode pendaftaran Anda Tidak Terdaftar Sebagai Peserta');
        redirect(site_url('Dashboard_siswa/pengumuman'));

    }
}


public function cetak_form()
{
    $email = $this->session->userdata('email');
 $data['peserta'] = $this->model_Siswa->tampil_peserta($email)->row_array();
 $this->load->view('V_cetakform', $data);
}

public function cetak()
{   

    $kode_daftar=$this->uri->segment(3);
    $data["detailpengumuman"] = $this->model_Siswa->kode_daftar($kode_daftar);

    $this->load->view('V_cetakpengumuman', $data);    
}

public function bayar()
{
    $email = $this->session->userdata('email');
    $data['formulir'] = $this->model_Siswa->tampil_peserta($email)->row_array();
    $data['pelunasan'] = $this->model_Siswa->tampil_pelunasan($email)->row_array();

    $this->load->view('dash_header/header',$data);
    $this->load->view('V_pembayaran');
    $this->load->view('dash_header/footer');    
}

function simpan_pelunasan()
{
    $config['upload_path'] = "./upload/pelunasan";
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload("file")) {
        $data = $this->upload->data();

            //Resize and Compress Image
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'upload/pelunasan/' . $data['file_name'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '60%';
        $config['width'] = 100;
        $config['height'] = 100;
        $config['new_image'] = 'upload/pelunasan/thumbnail/'. $data['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $email = $this->session->userdata('email');
        $tanggal = $this->input->post('tanggal');
        $an = $this->input->post('atas_nama');
        $norek = $this->input->post('norek');
        $nama_siswa = $this->input->post('nama_siswa');
        $image = $data['file_name'];

        $data = array(
            'email' => $email, 
            'tanggal_bayar' => $tanggal, 
            'nomor_rekening' => $norek, 
            'atas_nama' => $an, 
            'bukti_tf' => $image, 
        );
        $this->db->insert('pelunasan',$data);
        redirect(base_url('Dashboard_siswa/bayar'));

    }else{
        echo "gagal";
    }
}

function hapus_pembayaran()
{
    $id = $this->uri->segment(3);
    $foto = $this->db->get_where('pelunasan', ['kode_pelunasan'=>$id]);

    if ($foto->num_rows() > 0) {
        $pros = $foto->row();
        $name = $pros->bukti_tf;

        if (file_exists($lok = FCPATH . '/upload/pelunasan/' . $name)) {
            unlink($lok);
        }
        if (file_exists($lok = FCPATH . '/upload/pelunasan/thumbnail/' . $name)) {
            unlink($lok);
        }
    }
    $this->db->where('kode_pelunasan',$id);
    $this->db->delete('pelunasan');
    $this->bayar($id);
}

function upload_ulang_berkas()
{
    $id = $this->uri->segment(3);
    $foto = $this->db->get_where('berkas', ['kode_berkas'=>$id]);

    if ($foto->num_rows() > 0) {
        $pros = $foto->row();
        $name = $pros->skhun;

        if (file_exists($lok = FCPATH . '/upload/berkas/' . $name)) {
            unlink($lok);
        }
    }
    if ($foto->num_rows() > 0) {
        $pros = $foto->row();
        $name = $pros->ijazah;

        if (file_exists($lok = FCPATH . '/upload/berkas/' . $name)) {
            unlink($lok);
        }
    }
    if ($foto->num_rows() > 0) {
        $pros = $foto->row();
        $name = $pros->kk;

        if (file_exists($lok = FCPATH . '/upload/berkas/' . $name)) {
            unlink($lok);
        }
    }
    $this->db->where('kode_berkas',$id);
    $this->db->delete('berkas');
    $this->session->set_flashdata('sukses', '<div class="alert alert-warning" role="alert">
        Silahkan Upload Ulang Berkas  ! </div>');
    redirect(base_url('Dashboard_siswa/upload'));
}
}
