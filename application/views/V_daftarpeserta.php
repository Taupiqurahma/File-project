</br>
</br>
<div class="container">
<h5><div class="text-center"> Daftar Calon Peserta Didik yang telah mendaftar </div> </h5>
<P class="text-justify">PASTIKAN NAMA ANDA TELAH TERDAFTAR </P>


<table style="width:100%;" id="data_user" class="table table-striped table-condensed table-sm table-bordered  table-hover table-sm"><thead>
<tr role="row">
<th  align="center" aria-controls="datatable-fixed-header"  >No</th>
<th  align="center" aria-controls="datatable-fixed-header"  >email</th>
<th  align="center" aria-controls="datatable-fixed-header"  >Nama Lengkap</th>
<th  align="center" aria-controls="datatable-fixed-header"  >Nama Panggilan</th>
<th  align="center" aria-controls="datatable-fixed-header"  >Jenis Kelamin</th>
<th  align="center" aria-controls="datatable-fixed-header"  >Alamat</th>
<th  align="center" aria-controls="datatable-fixed-header"  >Asal Sekolah</th>
</thead>
<tbody align="center">
</table>


</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
{
return {
"iStart": oSettings._iDisplayStart,
"iEnd": oSettings.fnDisplayEnd(),
"iLength": oSettings._iDisplayLength,
"iTotal": oSettings.fnRecordsTotal(),
"iFilteredTotal": oSettings.fnRecordsDisplay(),
"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
};
};

var t = $("#data_user").dataTable({
initComplete: function() {
var api = this.api();
$('#data_user')
.off('.DT')
.on('keyup.DT', function(e) {
if (e.keyCode == 13) {
api.search(this.value).draw();
}
});
},
oLanguage: {
sProcessing: "loading..."
},
processing: true,
serverSide: true,
ajax: {"url": "<?php echo base_url('Registrasi_siswa/json_data_peserta') ?> ", 
"type": "POST",
data: function ( d ) {
d.token = '<?php echo $this->security->get_csrf_hash(); ?>';
}
},
columns: [
{
"data": "kode_daftar",
"orderable": false
},
{"data": "email"},
{"data": "nama_lengkap"},
{"data": "nama_panggilan"},
{"data": "jenis_kelamin"},
{"data": "alamat"},
{"data": "asal_sekolah"},




],
order: [[0, 'desc']],
rowCallback: function(row, data, iDisplayIndex) {
var info = this.fnPagingInfo();
var page = info.iPage;
var length = info.iLength;
var index = page * length + (iDisplayIndex + 1);
$('td:eq(0)', row).html(index);
}
});
});
    </script>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>