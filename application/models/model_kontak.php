<?php
class model_kontak extends CI_Model{


public function json_data_inbox(){

$this->datatables->select('inbox_id,'
.'pesan.inbox_tanggal as  inbox_tanggal,'
.'pesan.inbox_nama as  inbox_nama,'
.'pesan.inbox_email as inbox_email,'
.'pesan.inbox_pesan as inbox_pesan,'
);

$this->datatables->from('pesan');
$this->datatables->add_column('view2','<a href="'. base_url('Dashboard_admin/hapus_pesan/$1').'"><button class="btn btn-sm btn-success  fa fa-trash-alt"></button></a>','inbox_id');


return $this->datatables->generate();	

}
	function kirim_pesan($nama,$email,$pesan){
		$hsl=$this->db->query("INSERT INTO pesan(inbox_nama,inbox_email,inbox_pesan) VALUES ('$nama','$email','$pesan')");
		return $hsl;
	}

	function get_all_inbox(){
		$hsl=$this->db->query("SELECT pesan.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM pesan ORDER BY inbox_id DESC");
		return $hsl;
	}

	function hapus_kontak($kode){
		$hsl=$this->db->query("DELETE FROM pesan WHERE inbox_id='$kode'");
		return $hsl;
	}

	function update_status_kontak(){
		$hsl=$this->db->query("UPDATE pesan SET inbox_status='0'");
		return $hsl;
	}

	 public function jumlahPesan(){
        $sql = "SELECT count(inbox_id) as inbox_id FROM pesan";
        $result = $this->db->query($sql);
        return $result->row()->inbox_id;
    }
}