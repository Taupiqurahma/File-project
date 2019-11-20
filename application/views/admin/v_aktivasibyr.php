
<div class="container">
<div class="panel panel-success">
<div class="panel-heading">
<h3  class="text-center" class="panel-title">Aktifkan kode pendaftaran</h3>
</div>
<div class="panel-body">
<?php foreach ($akun as $p): ?>
                <div>

                    <form action="<?php echo base_url('pembayaran_admin/updateakun'); ?>" method="post">
                   <input type="text" name="kode_daftar" class="form-control" value="<?php echo $p->kode_daftar ?>"
                            readonly /><br>

                         <label class="control-label">Aktifkan kode</label>
                            <select style="height:35px" class="form-control" name="status" id="status">
                                <option value="<?php echo $p->status ?>"><?php echo $p->status ?></option>
                                <option value="Aktif">Aktifkan</option>
                                <option value="Belum aktif">Nonaktifkan</option>
                            </select><br>

                        
                        
                        <input type="text" name="nama" class="form-control" value="<?php echo $p->nama ?>"
                            readonly /><br>
                        <input type="text" name="email" class="form-control"
                            value="<?php echo $p->email ?>" readonly /><br>
                        <button class="btn btn-success  pull-right" type="submit">Aktifkan</button>
                    </form>
                    <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Batal</button>
                </div>
                <?php endforeach; ?>
            
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
    
  </div>  
</div>

