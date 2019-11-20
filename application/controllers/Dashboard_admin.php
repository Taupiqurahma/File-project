 <?php 

 class Dashboard_admin extends CI_Controller{

   function __construct(){
    parent::__construct();
    $this->load->model('model_siswa');
    $this->load->model('model_kontak');
    $this->load->model('model_pengaturan');
    $this->load->model('model_info');
    $this->load->model('model_pembayaran');
    $this->load->helper('url');
    $this->load->model('Model_laporan');

    $this->load->library('pdf');
    
    $this->load->library('Datatables');
    if ($this->session->userdata('akses')=='1') {
      redirect(base_url('Dashboard_siswa'));
    }
    elseif ($this->session->userdata('masuk')!= TRUE) {
     redirect(base_url('admin'));
   }
   
 }

 public function index(){
  $data['admin']= $this->db->get_where('admin')->row_array();
  

  $data["jumlahSiswa"] = $this->model_siswa->jumlahSiswa();
  $data["jumlahPembayaran"] = $this->model_pembayaran->jumlahPembayaran();
      $data["jumlahPelunasan"] = $this->model_pembayaran->jumlahPelunasan();
      $data["jumlahDiterima"] = $this->model_siswa->jumlahDiterima();
      $data["jumlahPembelian"] = $this->model_pembayaran->jumlahPembelian();
  

  $data["pelunasan"] = $this->model_pembayaran->pelunasan()->result();
  $this->load->view('admin/header', $data);
  $this->load->view('admin/V_admin');
  $this->load->view('admin/footer');
}

public function logout()
{
	session_destroy();
	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Kamu telah berhasil keluar ! </div>');
	redirect(base_url('admin'));
}

public function listPeserta()
{
  $data['admin']= $this->db->get_where('admin')->row_array();
  $data['pesan']= $this->db->get_where('pesan')->row_array();
        $data['option_tahun'] = $this->Model_laporan->option_tahun();
  
  $this->load->view('admin/header', $data);
  $this->load->view('admin/V_listpeserta');
}

public function json_data_peserta()
{ 
  $query = $this->model_siswa->json_data_peserta();
  echo $query;
}

public function edit($id_peserta)
{
  $where = array('id_peserta' => $id_peserta);
  $data['admin']= $this->db->get_where('admin')->row_array();
  $data['peserta'] = $this->model_siswa->edit_data($where,'peserta')->result();
  $this->load->view('admin/header',$data);
  $this->load->view('admin/v_edit_form',$data);
}

public function update(){
  $kode_daftar = $this->input->post('kode_daftar');
  $email = $this->input->post('email');
  $nama_lengkap = $this->input->post('nama_lengkap');
  $nama_panggilan = $this->input->post('nama_panggilan');
  $jenis_kelamin = $this->input->post('jenis_kelamin');
  $agama = $this->input->post('agama');
  $kewarganegaraan = $this->input->post('kewarganegaraan');
  $tempat_lahir = $this->input->post('tempat_lahir');
  $tanggal_lahir = $this->input->post('tanggal_lahir');
  $alamat = $this->input->post('alamat');
  $status_anak = $this->input->post('status_anak');
  $anak_ke = $this->input->post('anak_ke');
  $jumlah_saudara = $this->input->post('jumlah_saudara');
  $tinggal_pada = $this->input->post('tinggal_pada');
  $asal_sekolah = $this->input->post('asal_sekolah');
  $no_handphone = $this->input->post('no_handphone');
  $hobi = $this->input->post('hobi');
  $nama_ayah = $this->input->post('nama_ayah');
  $nama_ibu = $this->input->post('nama_ibu');
  $pendidikan_ayah = $this->input->post('pendidikan_ayah');
  $pendidikan_ibu = $this->input->post('pendidikan_ibu');
  $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
  $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
  $penghasilan_ayah = $this->input->post('penghasilan_ayah');
  $penghasilan_ibu = $this->input->post('penghasilan_ibu');
  $status_pendaftaran = $this->input->post('status_pendaftaran');
  $data = array('nama_lengkap'=>$nama_lengkap, 'status_pendaftaran'=>$status_pendaftaran, 'agama'=>$agama,  );
  $this->db->where('kode_daftar',$kode_daftar);
  $this->db->update('peserta',$data);
  redirect('Dashboard_admin/listPeserta');
}

function hapus($id_peserta)
{
  $where = array('id_peserta' => $id_peserta);
  $this->model_siswa->hapus_data($where,'peserta');
  redirect('Dashboard_admin/listPeserta');
}

function hapus_pesan($inbox_id)
{
  $where = array('inbox_id' => $inbox_id);
  $this->model_siswa->hapus_data($where,'pesan');
  redirect('inbox_admin');
}

function hapus_berkas($kode_berkas)
{
  $where = array('kode_berkas' => $kode_berkas);
  $this->model_siswa->hapus_data($where,'berkas');
  redirect('Dashboard_admin/berkas');
}


public function export()
{
  $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
  $pdf->AddPage();
        // setting jenis font yang akan digunakan
  $pdf->SetFont('Arial','B',16);
        // mencetak string
  $pdf->Image('assets/admin/img/1122.png') ;
  $pdf->Cell(250,7, 'SEKOLAH MENENGAH KEJURUAN CAKRAWALA',0,1,'C');
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(250,7,'DAFTAR PESERTA DIDIK BARU',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
  $pdf->Cell(10,7,'',0,1);
  
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(50,6,'ID PESERTA',1,0);
  $pdf->Cell(50,6,'KODE DAFTAR',1,0);
  $pdf->Cell(50,6,'NAMA SISWA',1,0);
  $pdf->Cell(50,6,'ASAL SEKOLAH',1,0);
  $pdf->Cell(43,6,'JURUSAN',1,0);
  $pdf->Cell(30,6,'JENIS KELAMIN',1,1);
  $pdf->SetFont('Arial','',10);
  $peserta = $this->db->get('peserta')->result();
  foreach ($peserta as $row){
    $pdf->Cell(50,6,$row->id_peserta,1,0);
    $pdf->Cell(50,6,$row->kode_daftar,1,0);
    $pdf->Cell(50,6,$row->nama_lengkap,1,0);
    $pdf->Cell(50,6,$row->asal_sekolah,1,0);
    $pdf->Cell(43,6,$row->jurusan,1,0);
    $pdf->Cell(30,6,$row->jenis_kelamin,1,1); 
  }
  $pdf->Output();
}


public function inbox_admin()
{
  $this->load->view('admin/V_inbox');;
}

public function pengaturan()
{
  $data["pengaturan"] = $this->model_pengaturan->getAll();
  $data['admin']= $this->db->get_where('admin')->row_array();
  $this->load->view('admin/header',$data);
  $this->load->view('admin/pengaturan', $data);   
  $this->load->view('admin/footer');        
}

public function edit_pengaturan()
{
  $data = array (
   'pengumuman' => $this->input->post('pengumuman'),
   'daftar' => $this->input->post('daftar')
 );
  $this->model_pengaturan->updatePengumuman($data); 
  $this->session->set_flashdata('pengumuman', 'Pengumuman dan daftar sudah di update');
  
  redirect(site_url('dashboard_admin/pengaturan'));
  
}

public function rekening()
{
 $data['admin']= $this->db->get_where('admin')->row_array();
 $data['pesan']= $this->db->get_where('pesan')->row_array();
 
 $this->load->view('admin/header', $data);
 $this->load->view('admin/V_rekening');

 
}

public function json_data_rekening()
{ 
  $query = $this->model_info->json_data_rekening();
  echo $query;
}

public function edit_rek($id)
{
  $where = array('id' => $id);
  $data['admin']= $this->db->get_where('admin')->row_array();
  $data['info'] = $this->model_info->edit_data($where,'info')->result();
  $this->load->view('admin/header',$data);
  $this->load->view('admin/v_edit_rek',$data);
}

public function update_rek()
{
  $id = $this->input->post('id');
  $nomor_rekening = $this->input->post('nomor_rekening');
  $nama_rekening = $this->input->post('nama_rekening');
  $info1 = $this->input->post('info1');
  $info2 = $this->input->post('info2');
  $info3 = $this->input->post('info3');
  $info4 = $this->input->post('info4');
  $info5 = $this->input->post('info5');
  $info6 = $this->input->post('info6');
  $info7 = $this->input->post('info7');
  $data = array('nama_rekening'=>$nama_rekening,'nomor_rekening'=>$nomor_rekening, 'info1'=>$info1, 'info2'=>$info2, 'info3'=>$info3, 'info4'=>$info4, 'info5'=>$info5, 'info6'=>$info6, 'info7'=>$info7, );
  $this->db->where('id',$id);
  $this->db->update('info',$data);
  redirect('Dashboard_admin/rekening');
}


  private function _sendEmail()
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
        $ci->email->subject('E-formulir');

        $data_kirim .="<p>KODE PENDAFTARAN : ".$input['kode_pelunasan'].""
        .  "<p>NAMA LENGKAP : ".$input['nama_lengkap']."<br>"
        . "TANGGAL LAHIR : ".$input['status']."</p>";

        $data_kirim .="<p>Terimakasih ".$input['status_pendaftaran']." anda telah melakukan pengisian formulir <br>"
        . "Silahkan lakukan pelunasan biaya pendaftaran (Uang Bangunan) sebesar Rp.850.000 untuk kompetesi keahlian (Administrasi Perkantoran) /Rp.950.000 untuk kompetensi keahlian (Multimedia). Pembayaran pelunasan bisa dibayarkan secara langsung dengan panitia PPDB di sekolah pada jam kerja mulai pukul 08.00 s/d pukul 13.00 WIB dengan membawa bukti pendaftaran atau bukti penerimaan yang tersedia pada menu pengumuman di web PPDB.</p>";      

        $ci->email->message($data_kirim);
        if($ci->email->send()) {
            return true;
        }else{
         echo "gagal";
     }

 }


function bukti_valid()
{
   $kode_pelunasan = $this->input->post('kode_pelunasan');
   $email = $this->input->post('email');
    $nama_lengkap = $this->input->post('nama_lengkap');
     $id_peserta = $this->input->post('id_peserta');
      $status = $this->input->post('status');
       $status_pendaftaran = $this->input->post('status');
   $this->db->set('status','Valid');
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


  public function berkas()
  {
   $data['admin']= $this->db->get_where('admin')->row_array();
   $data['pesan']= $this->db->get_where('pesan')->row_array();

    $data["berkas"] = $this->model_siswa->berkas();

   $this->load->view('admin/header', $data);
   $this->load->view('admin/V_aktivasi', $data);
   $this->load->view('admin/footer');
 }


}