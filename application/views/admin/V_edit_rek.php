</br>
</br>
<div class="container">
<div class="panel panel-success">
<div class="panel-heading">
<h3  class="text-center" class="panel-title"></h3>
</div>
<div class="panel-body">
<?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
  
   
  <h1><div class="text-center"> Atur Data Rekening</h1></div>
<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
    <span class="sr-only">100% Complete</span>
  </div>
</div>
<?php foreach($info as $p){ ?>
<form action="<?php echo base_url(). 'Dashboard_admin/update_rek'; ?>" method="post">    

   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  name="id" readonly placeholder="Kode Daftar" value=<?php echo $p->id ?> >
    </div>
  </div>
 


  <div class="form-group">
    <label for="nama_rekening" class="col-sm-2 control-label">Nama Rekening</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_rekening"  name="nama_rekening" placeholder="Kode Daftar" value="<?php echo $p->nama_rekening ?>" >
    </div>
  </div>

  <div class="form-group">
    <label for="nomor_rekening" class="col-sm-2 control-label">Nomer Rekening</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  name="nomor_rekening" placeholder="Kode Daftar" value="<?php echo $p->nomor_rekening ?>" >
    </div>
  </div>

  <div class="form-group">
    <label for="info1" class="col-sm-2 control-label">Informasi1</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="info1"  name="info1" placeholder="Kode Daftar" value="<?php echo $p->info1 ?> " >
    </div>
  </div>


  <div class="form-group">
    <label for="info2" class="col-sm-2 control-label">Informasi2</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="info2"  name="info2" placeholder="Kode Daftar" value="<?php echo $p->info2 ?>" >
    </div>
  </div>


  <div class="form-group">
    <label for="info3" class="col-sm-2 control-label">Informasi3</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="info3"  name="info3" placeholder="Kode Daftar" value="<?php echo $p->info3 ?>" >
    </div>
  </div>


  <div class="form-group">
    <label for="info4" class="col-sm-2 control-label">Informasi4</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="info4"  name="info4" placeholder="Kode Daftar" value="<?php echo $p->info4 ?>" >
    </div>
  </div>


  <div class="form-group">
    <label for="info5" class="col-sm-2 control-label">Informasi5</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="info5"  name="info5" placeholder="Kode Daftar" value="<?php echo $p->info5 ?>" >
    </div>
  </div>


  <div class="form-group">
    <label for="info6" class="col-sm-2 control-label">Informasi6</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="info6"  name="info6" placeholder="Kode Daftar" value="<?php echo $p->info6 ?>" >
    </div>
  </div>


  <div class="form-group">
    <label for="info7" class="col-sm-2 control-label">Informasi7</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="info7"  name="info7" placeholder="Kode Daftar" value="<?php echo $p->info7 ?>" >
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
    
<br>
 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

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
          <a class="btn btn-primary" href=<?php echo base_url(); ?>Dashboard_admin/logout>Logout</a>
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

</body>

</html>

    </form>
    <?php } ?>
  </div>  
</div>


