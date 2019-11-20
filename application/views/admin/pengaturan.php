<div class="panel panel-default ">
    <div class="panel-heading">
        <h4 style="font-family:roboto; text-align:center; font-weight:bold">PENGATURAN JADWAL WEB PPDB</h4>
    </div>

    <div class="col-lg-6"><br><br>
        <?php foreach($pengaturan as $p): ?>
        <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Atur aktif dan non aktif pengumuman dan daftar
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <form role="form" method="post" action="<?php echo base_url('dashboard_admin/edit_pengaturan'); ?>">
                        <div>

                            <label class="control-label">Pengumuman</label>
                            <select style="height:35px" class="form-control" name="pengumuman" id="pengumuman">
                                <option value="<?php echo $p->pengumuman ?>"><?php echo $p->pengumuman ?></option>
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                            </select><br>

                            <label class="control-label">Daftar dan Registrasi</label>
                            <select style="height:35px" class="form-control" name="daftar" id="pengumuman">
                                <option value="<?php echo $p->daftar ?>"><?php echo $p->daftar ?></option>
                                <option value="Buka">Buka</option>
                                <option value="Tutup" placeholder="Tutup">Tutup</option>
                            </select>
                        </div><br>
                        <p style="text-align:center; font-weight:bold; color:green">
                            <?php echo $this->session->flashdata('pengumuman');?></p>
                        <div>
                            <button class="btn btn-primary col-md-2 pull-right">Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <?php endforeach; ?>

         </div>
     </div>
