</br>
</br>
<div class="container">
<div class="panel panel-success">
<div class="panel-heading">
<h3  class="text-center" class="panel-title">Formulir Pendaftaran</h3>
</div>
<div class="panel-body">
<?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
  
   
  <h1>Data Siswa</h1>
<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
    <span class="sr-only">100% Complete</span>
  </div>
</div>
<?php foreach($pembayaran as $p){ ?>
<form action="<?php echo base_url(). 'Pembayaran_admin/addCode'; ?>" method="post">    

   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Id Daftar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  name="id_pembayaran" readonly placeholder="Kode Daftar" value=<?php echo $p->id_pembayaran ?> >
    </div>
  </div>
 



  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kode Daftar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  name="kode_daftar" readonly placeholder="Kode Daftar" value=<?php echo $p->kode_daftar ?> >
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kode Daftar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  name="kode" readonly placeholder="Kode Daftar" value=<?php echo $p->kode_daftar ?> >
    </div>
  </div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  name="nama_pengirim" readonly placeholder="Email" value=<?php echo $p->nama_pengirim ?> >
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Nama Lengkap</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="text" placeholder="Nama_lengkap" name= "nomor_rekening" value='<?php echo $p->nomor_rekening ?>'>
      <div style="color: red;">
      <?= form_error('nama_lengkap','<div class="text-danger pl-3">', '</div>'); ?>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Nama Panggilan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Panggilan" name="tanggal" value="<?php echo $p->tanggal ?>" >
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
          <a class="btn btn-primary" href=<?php echo base_url(); ?>"Dashboard_admin/logout">Logout</a>
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

