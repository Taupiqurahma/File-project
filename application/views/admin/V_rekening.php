</br>
</br>
<div class="container">
<h5><div class="text-center"> Pengaturan rekening </div> </h5>



<table style="width:100%;" id="data_rekening" class="table table-striped table-condensed table-sm table-bordered  table-hover table-sm"><thead>
<tr role="row">
<th  align="center" aria-controls="datatable-fixed-header"  >No</th>
<th  align="center" aria-controls="datatable-fixed-header"  >nama rekening</th>
<th  align="center" aria-controls="datatable-fixed-header"  >nomer rekening</th>
<th  align="center" aria-controls="datatable-fixed-header"  >informasi</th>
<th  align="center" aria-controls="datatable-fixed-header"  >informasi</th>
<th  align="center" aria-controls="datatable-fixed-header"  >informasi</th>
<th  align="center" aria-controls="datatable-fixed-header"  >informasi</th>
<th  align="center" aria-controls="datatable-fixed-header"  >informasi</th>
<th  align="center" aria-controls="datatable-fixed-header"  >informasi</th>
<th  align="center" aria-controls="datatable-fixed-header"  >informasi</th>
<th  align="center" aria-controls="datatable-fixed-header"  ></th>
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

var t = $("#data_rekening").dataTable({
initComplete: function() {
var api = this.api();
$('#data_rekening')
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
ajax: {"url": "<?php echo base_url('Dashboard_admin/json_data_rekening') ?> ", 
"type": "POST",
data: function ( d ) {
d.token = '<?php echo $this->security->get_csrf_hash(); ?>';
}
},
columns: [
{
"data": "id",
"orderable": false
},
{"data": "nama_rekening"},
{"data": "nomor_rekening"},
{"data": "info1"},
{"data": "info2"},
{"data": "info3"},
{"data": "info4"},
{"data": "info5"},
{"data": "info6"},
{"data": "info7"},
{"data": "view1"},



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
  </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PPDB SMK Cakrawala 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
</div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="Dashboard_admin/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/admin/js/sb-admin-2.min.js"></script>
    <!-- Data Tables -->
    <script src="<?php echo base_url();?>assets/datatables/datatables.min.js" ></script>
    <link href="<?php echo base_url();?>assets/datatables/datatables.min.css" rel="stylesheet">



</body>

</html>
  