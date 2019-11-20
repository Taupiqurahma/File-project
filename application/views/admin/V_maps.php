<div class="panel panel-default ">
    <div class="panel-heading">
        <h4 style="font-family:roboto; text-align:center; font-weight:bold">Pengaturan Maps</h4>
    </div>

    <div class="col-lg-12"><br><br>
        <?php foreach($maps as $m): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Setting Maps
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <form role="form" method="post" action="<?php echo base_url('Maps/update'); ?>">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td>Link Google Maps</td>
                                    <td>
                                        <input class="form-control" type="text" name="link" id="link"
                                            value="<?php echo $m->link ?>" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td>
                                        <input class="form-control" type="text" name="height" id="height"
                                            value="<?php echo $m->height ?>" required="">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Width</td>
                                    <td>
                                    <input class="form-control" type="text" name="width" id="width"
                                            value="<?php echo $m->width ?>" required="">
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table><button type="submit" class="btn btn-primary pull-right" name="update"
                            id="update">Update</button>
                    </form>
                    <p style="text-align:center; font-weight:bold; color:green">
                        <?php echo $this->session->flashdata('maps');?></p>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
        <!-- /.panel -->
        <?php endforeach; ?>
    </div>
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


</div>