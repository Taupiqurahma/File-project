<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laporan extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('Model_laporan');
  }
  
  public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter'];
            if($filter == '1'){ 
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Laporan Tahun '.$tahun;
                $url_cetak = 'Laporan/cetak?filter=3&tahun='.$tahun;
                $peserta = $this->Model_laporan->view_by_year($tahun);
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Laporan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'Laporan/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $peserta = $this->Model_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Model_laporan
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Laporan Tahun '.$tahun;
                $url_cetak = 'Laporan/cetak?filter=3&tahun='.$tahun;
                $peserta = $this->Model_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Model_laporan
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Laporan';
            $url_cetak = 'Laporan/cetak';
            $peserta = $this->Model_laporan->view_all(); // Panggil fungsi view_all yang ada di Model_laporan
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['peserta'] = $peserta;
        $data['option_tahun'] = $this->Model_laporan->option_tahun();
         $data['admin']= $this->db->get_where('admin')->row_array();
  

        $this->load->view('admin/header', $data);
    $this->load->view('admin/laporan', $data);
  }
  
  public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal = $_GET['tanggal'];
                
                $ket = 'Data Laporan Tanggal '.date('d-m-y', strtotime($tanggal));
                $Laporan = $this->Model_laporan->view_by_date($tanggal); // Panggil fungsi view_by_date yang ada di Model_laporan
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Laporan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $Laporan = $this->Model_laporan->view_by_month($bulan, $tahun); 
            }else{ 
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Laporan Tahun '.$tahun;
                $Laporan = $this->Model_laporan->view_by_year($tahun); 
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Laporan';
            $Laporan = $this->Model_laporan->view_all(); 
        }
        
        $data['ket'] = $ket;
        $data['Laporan'] = $Laporan;
        
    ob_start();
    $this->load->view('print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('application/third_party/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
  
    $pdf->Output('Data Laporan.pdf', 'D');
  }

  function cetak_lap()
  {
     $tahun = $this->input->get('tahun');
     $data['ket'] = 'Data Laporan Tahun '.$tahun;
     $status = $this->input->get('status');
     $data['peserta'] = $this->Model_laporan->view_by_year($tahun,$status);
     $data['option_tahun'] = $this->Model_laporan->option_tahun();
     $data['admin']= $this->db->get_where('admin')->row_array();
     $this->load->view('admin/laporan_print', $data);
  }
}